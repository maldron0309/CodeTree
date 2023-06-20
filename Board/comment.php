<?php
session_start();

$connect = mysqli_connect("localhost", "root", "1234", "codetree");

$content = $_POST['content'];
$board_number = $_POST['board_number'];
$user_id = $_SESSION['userid'];
$created_at = date('Y-m-d H:i:s');

$query = "INSERT INTO comment (board_number, user_id, content, created_at) VALUES('$board_number', '$user_id', '$content', '$created_at')";

$result = $connect->query($query);

if ($result) {
    echo "<script>
            alert('댓글이 작성되었습니다.');
            window.location = 'read.php?number=$board_number';
          </script>";
} else {
    echo "<script>
            alert('댓글 작성에 실패하였습니다.');
            window.history.back();
          </script>";
}
?>
