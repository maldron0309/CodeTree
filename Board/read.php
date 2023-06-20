

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #ffffff;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #dddddd;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h2 {
            margin: 0;
            padding: 10px;
            background-color: #555555;
            color: #ffffff;
            border-radius: 5px;
        }

        .read_table {
            border: 1px solid #dddddd;
            margin-top: 30px;
            width: 100%;
        }

        .read_title {
            height: 45px;
            font-size: 23.5px;
            text-align: center;
            background-color: #555555;
            color: #ffffff;
        }

        .read_table td {
            padding: 10px;
        }

        .read_id,
        .read_hit {
            background-color: #eeeeee;
            width: 80px;
            text-align: center;
            font-weight: bold;
        }

        .read_id2,
        .read_hit2 {
            background-color: #f1f1f1;
            padding-left: 10px;
        }

        .read_content {
            padding: 20px;
            border-top: 1px solid #dddddd;
            min-height: 300px;
        }

        .btn-container {
            text-align: left;
            margin-top: 20px;
        }

        .btn {
            height: 30px;
            width: 100px;
            font-size: 14px;
            text-align: center;
            background-color: #4CAF50;
            border: none;
            color: #ffffff;
            border-radius: 5px;
            margin-right: 10px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #008800;
        }

        .comment-container {
            margin-top: 30px;
        }

        .comment-container h3 {
            margin-bottom: 10px;
        }

        textarea {
            width: 100%;
            min-height: 100px;
            resize: vertical;
            padding: 10px;
            border: 1px solid #ddd;
            font-size: 14px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #444;
            padding: 10px;
            color: #fff;
            font-size: 14px;
            cursor: pointer;
        }

        .comment-list {
            margin-top: 30px;
        }

        .comment-list h3 {
            margin-bottom: 20px;
        }

        .comment-list p {
            margin: 0;
        }

        .comment {
            margin-bottom: 30px;
            border-bottom: 1px solid #dddddd;
            padding-bottom: 10px;
        }
        .back-btn a {
            display: inline-block;
            height: 30px;
            line-height: 30px;
            width: 100px;
            font-size: 14px;
            text-align: center;
            background-color: #4CAF50;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            margin-right: 10px;
            cursor: pointer;
        }
        .back-btn a:hover {
            background-color: #008800;
        }

        .btn-container {
            display: flex;
            align-items: center;
            margin-top: 20px;
        }
    </style>
    <title>Read Board</title>
</head>

<body>
    <div class="container">
        <?php
        $connect = mysqli_connect("localhost", "root", "1234", "codetree");
        $number = $_GET['number'];

        session_start();

        $query = "select title, content, date, hit, id from board where number = $number";
        $result = $connect->query($query);
        $rows = mysqli_fetch_assoc($result);

        if ($rows) {
            $hit = "update board set hit = hit + 1 where number = $number";
            $connect->query($hit);
        } else {
            echo "게시글을 찾을 수 없습니다.";
            exit;
        }
        ?>

        <table class="read_table">
            <tr>
                <td colspan="4" class="read_title"><?php echo $rows['title'] ?></td>
            </tr>
            <tr>
                <td class="read_id">작성자</td>
                <td class="read_id2"><?php echo $rows['id'] ?></td>
                <td class="read_hit">조회수</td>
                <td class="read_hit2"><?php echo $rows['hit'] ?></td>
            </tr>
            <?php if ($rows['content']) { ?>
                <tr>
                    <td colspan="4" class="read_content"><?php echo $rows['content'] ?></td>
                </tr>
            <?php } else { ?>
                <tr>
                    <td colspan="4" class="read_content">게시글을 찾을 수 없습니다.</td>
                </tr>
            <?php } ?>
        </table>

        
        <div class="btn-container">
            <button class="btn" onclick="location.href='../index.php'">홈으로</button>
            
            <div class = "back-btn">
                <a href="javascript:history.back()">뒤로 가기</a>
            </div>
          
            <?php
            if (isset($_SESSION['userid']) && $_SESSION['userid'] == $rows['id']) { ?>
                <button class="btn" onclick="location.href='./modify.php?number=<?= $number ?>'">수정</button>
                <button class="btn" onclick="ask()">삭제</button>
                <script>
                    function ask() {
                        if (confirm("게시글을 삭제하시겠습니까?")) {
                            window.location = "./delete.php?number=<?= $number ?>";
                        }
                    }
                </script>
            <?php } ?>
        </div>

        <div class="comment-container">
            <h3>댓글 작성</h3>
            <form action="comment_process.php" method="post">
                <input type="hidden" name="board_number" value="<?php echo $number; ?>">
                <textarea name="content" placeholder="댓글 내용을 입력하세요."></textarea>
                <input type="submit" value="댓글 작성">
            </form>
        </div>

        <div class="comment-list">
            <h3>댓글 목록</h3>
            <?php
            $comment_query = "SELECT * FROM comment WHERE board_number = $number ORDER BY created_at DESC";
            $comment_result = $connect->query($comment_query);

            while ($comment_row = mysqli_fetch_assoc($comment_result)) {
            ?>
                <div class="comment">
                    <p><strong><?php echo $comment_row['user_id']; ?></strong></p>
                    <p><?php echo nl2br($comment_row['content']); ?></p>
                    <p><?php echo $comment_row['created_at']; ?></p>
                    <hr>
                </div>
            <?php } ?>
        </div>
    </div>
</body>

</html>
