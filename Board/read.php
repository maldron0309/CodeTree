<!DOCTYPE html>
<html>
<head>
<title>read_Board</title>
    <meta charset='utf-8'>
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

    .read_btn {
        text-align: center;
        margin-top: 40px;
    }

    .list_btn,
    .read_btn1 {
        height: 45px;
        width: 120px;
        font-size: 20px;
        text-align: center;
        background-color: #4CAF50;
        border: none;
        color: #ffffff;
        border-radius: 5px;
        margin: 10px;
        cursor: pointer;
    }

    .list_btn:hover,
    .read_btn1:hover {
        background-color: #008800; 
    }
    .back-btn {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .back-btn a {
            text-decoration: none;
            font-size: 16px;
            color: #888;
        }
</style>
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
        $hit = "update board set hit = hit + 1 where number = $number";
        $connect->query($hit);
        ?>
        <table class="read_table">
            <tr>
                <td colspan="4" class="read_title"><?php echo $rows['title'] ?></td>
            </tr>
            <tr>
                <td class="read_id">작성자</td>
                <td class="read_id2"><?php echo $rows['id'] ?></td>
                <td class="read_hit">조회수</td>
                <td class="read_hit2"><?php echo $rows['hit'] + 1 ?></td>
            </tr>
            <tr>
                <td colspan="4" class="read_content">
<?php echo $rows['content'] ?>
</td>
</tr>
</table>
<div class="read_btn">
        <button class="list_btn" onclick="location.href='index.php'">홈으로</button>
        <div class="back-btn">
            <a href="javascript:history.back()">뒤로 가기</a>
        </div>
        <?php

        if (isset($_SESSION['userid']) and $_SESSION['userid'] == $rows['id']) { ?>
            <button class="read_btn1" onclick="location.href='./modify.php?number=<?= $number ?>'">수정</button>
            <button class="read_btn1" onclick="ask()">삭제</button>
            <script>
                function ask() {
                    if (confirm("게시글을 삭제하시겠습니까?")) {
                        window.location = "delete.php?number=<?= $number ?>"
                    }
                }
            </script>
        <?php } ?>
    </div>
</div>
</body>
</html>
    