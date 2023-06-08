<?php
session_start();

$connect = mysqli_connect("localhost", "root", "1234", "codetree");

$id = $_POST['id'];
$pw = $_POST['password']; 

$query = "select * from member where id='$id'";
$result = $connect->query($query);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();

    if ($row['password'] == $pw) {
        $_SESSION['userid'] = $id;

        if (isset($_SESSION['userid'])) {
            header("Location: ../index.php");
            exit();
        } else {
            echo "세션 저장 실패";
        }
    } else {
        echo "<script>alert('아이디 또는 비밀번호를 확인해주세요.'); history.back();</script>";
    }
} else {
    echo "<script>alert('아이디 또는 비밀번호를 확인해주세요.'); history.back();</script>";
}

$connect->close();
?>
