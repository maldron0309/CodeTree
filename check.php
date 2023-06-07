<?php
$connect = mysqli_connect("localhost", "root", "1234", "codetree") or die("fail");

$id = $_POST['id'];

$query = "SELECT id FROM board2 WHERE id = '$id'";
$result = mysqli_query($connect, $query);

$count = mysqli_num_rows($result);

if ($count > 0) {
    echo "fail";
} else {
    echo "success";
}

mysqli_close($connect);
?>
