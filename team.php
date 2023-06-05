<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <link rel="stylesheet" href=".css">
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
    <p style="font-size:25px; text-align:center"><b>팀 모집 게시판</b></p>

    <table align="center">
        <thead align="center">
            <tr>
                <td width="50" align="center">번호</td>
                <td width="500" align="center">제목</td>
                <td width="100" align="center">작성자</td>
                <td width="200" align="center">날짜</td>
                <td width="50" align="center">조회수</td>
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
                    <td width="50" align="center"><?php echo $total ?></td>
                    <td width="500" align="center">
                        <a href="../board/read.php?number=<?php echo $rows['number'] ?>">
                            <?php echo $rows['title'] ?>
                        </a>
                    </td>
                    <td width="100" align="center"><?php echo $rows['id'] ?></td>
                    <td width="200" align="center"><?php echo $rows['date'] ?></td>
                    <td width="50" align="center"><?php echo $rows['hit'] ?></td>
                    </tr>
                    <?php
                    $total--;
                }
                ?>
        </tbody>
    </table>

    <div class="text">
        <font style="cursor: hand" onClick="location.href='../board/write.php?write_action_num=1'">글쓰기</font>
    </div>
<?php
} else {
    echo "<p>로그인 후 이용해주세요.</p>";
}
?>
</body>
</html>