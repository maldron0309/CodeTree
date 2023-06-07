<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <style>
        body {
            background-color: #f2f2f2;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .title {
            font-size: 25px;
            font-weight: bold;
            text-align: center;
            margin-top: 15px;
            margin-bottom: 15px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input[type="text"],
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .submit-btn {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            animation: pulse 1s infinite;
        }

        .submit-btn input[type="submit"] {
            height: 40px;
            width: 100px;
            font-size: 16px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .submit-btn input[type="submit"]:hover {
            background-color: #45a049;
        }

        .author {
            text-align: right;
            font-style: italic;
            color: #888;
        }

    </style>
</head>

<body>
    <?php
    session_start();
    $URL = "./login.php";
    $write_action_num = $_GET['iswrite'];

    if (!isset($_SESSION['userid'])) {
    ?>

        <script>
            alert("로그인이 필요합니다.");
            location.replace("<?php echo $URL ?>");
        </script>
    <?php
    }
    if (isset($_POST['submit-btn'])) {
        // 게시물 작성 후 게시판으로 돌아가기
        header('Location: gamedev.php');
        exit;
    }
    
    ?>

    <div class="container">
        <form method="post" action='iswrite<?php echo $write_action_num; ?>.php'>
            <div class="title">게시글 작성하기</div>
            <div class="form-group">
                <label for="name">작성자</label>
                <div class="author"><?= $_SESSION['userid'] ?></div>
                <input type="hidden" name="name" value="<?= $_SESSION['userid'] ?>">
            </div>

            <div class="form-group">
                <label for="title">제목</label>
                <input type="text" name="title">
            </div>

            <div class="form-group">
                <label for="content">내용</label>
                <textarea name="content" cols="30" rows="10"></textarea>
            </div>

            <div class="submit-btn">
                <input type="submit" value="작성">
            </div>
        </form>
    </div>
</body>

</html>
