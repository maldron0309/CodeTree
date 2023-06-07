<?php
$connect = mysqli_connect("localhost", "root", "1234", "codetree");

$id = $_POST['id'];

$query = "select id from board2 where id = '$id'";
$result = mysqli_query($connect, $query);

$count = mysqli_num_rows($result);

if ($count > 0) {
    echo "fail";
} else {
    echo "success";
}

mysqli_close($connect);
?>
