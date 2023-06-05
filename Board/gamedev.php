<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href=".css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            font-size: 30px;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table thead tr th {
            background-color: #f5f5f5;
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        table tbody tr td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        table tbody tr.even {
            background-color: #f5f5f5;
        }

        .text {
            text-align: center;
            margin-top: 20px;
        }

        .text a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4caf50;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .text a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <button onclick="location.href='./index.php'" style="center; font-size:15.5px;">홈으로</button>
    <?php
    $connect = mysqli_connect('localhost', 'root', '1234', 'codetree') or die("connect failed");
    $query = "select * from board order by number desc";
    $result = mysqli_query($connect, $query);
    $total = mysqli_num_rows($result);
    session_start();
    ?>
    <button onclick="location.href='../board/login.php'" style="float:right; font-size:15.5px;">로그인</button>
    <br />
    <?php
    if (isset($_SESSION['userid'])) {
        ?>
        <h1>게임개발 게시판</h1>

        <table align="center">
            <thead>
                <tr>
                    <th width="50">번호</th>
                    <th width="500">제목</th>
                    <th width="100">작성자</th>
                    <th width="200">날짜</th>
                    <th width="50">조회수</th>
                </tr>
            </thead>

            <tbody>
                <?php
                while ($rows = mysqli_fetch_assoc($result)) {
                    if ($total % 2 == 0) {
                        ?>
                        <tr class="even">
                        <?php } else { ?>
                        <tr>
                        <?php } ?>
                        <td><?php echo $total ?></td>
                        <td>
                            <a href="../board/read.php?number=<?php echo $rows['number'] ?>">
                                <?php echo $rows['title'] ?>
                            </a>
                        </td>
                        <td><?php echo $rows['id'] ?></td>
                        <td><?php echo $rows['date'] ?></td>
                        <td><?php echo$rows['hit'] ?></td>
</tr>
<?php
                 $total--;
             }
             ?>
</tbody>
</table>

    <div class="text">
        <a href="../board/write.php?write_action_num=1">글쓰기</a>
    </div>
<?php
} else {
    echo "<p>로그인 후 이용해주세요.</p>";
}
?>
</body>
</html>
