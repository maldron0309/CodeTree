<?php
$connect = mysqli_connect("localhost", "root", "1234", "codetree");

$id = $_POST['name'];
$title = $_POST['title'];
$content = $_POST['content'];
$date = date('Y-m-d');

$URL = 'team.php';




$query = "insert into board4(title, content, date, hit, id) 
        values ('$title', '$content', '$date', 0, '$id')";


$result = mysqli_query($connect, $query);
if ($result) {
    echo "<script>alert('게시글이 등록되었습니다.'); location.href='$URL';</script>";
} else {
    echo "게시글 등록에 실패하였습니다.";
}

mysqli_close($connect);
?>
