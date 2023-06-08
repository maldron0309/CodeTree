<?php

$connect = mysqli_connect("localhost", "root", "1234", "codetree");

$id = $_POST['id'];
$pw = $_POST['password'];

$date = date('Y-m-d');

if (isset($_POST['check_duplicate'])) {
    // 중복 체크 요청인 경우
    $query = "select * from member where id = ?";
    $stmt = mysqli_prepare($connect, $query);

    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);
    
    $result = mysqli_stmt_get_result($stmt);
    $count = mysqli_num_rows($result);

    if ($count) {
        echo json_encode(array('result' => 'duplicate'));
    } else {
        echo json_encode(array('result' => 'available'));
    }
} else {

    // id 중복 확인
    $query = "select * from member where id = ?";
    $stmt = mysqli_prepare($connect, $query);
    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $count = mysqli_num_rows($result);

    if ($count) {
        echo "<script>alert('이미 존재하는 ID입니다.'); history.back();</script>";
    } else {
        
        $hashedPassword = $pw;

        $query = "insert into member (id, password, date, permit) values (?, ?, ?, 0)";
        $stmt = mysqli_prepare($connect, $query);
        mysqli_stmt_bind_param($stmt, "sss", $id, $hashedPassword, $date);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            echo "<script>alert('회원가입에 성공하였습니다.'); location.replace('login.php');</script>";
        } else {
            echo "<script>alert('회원가입에 실패하였습니다.');</script>";
        }
    }
}

mysqli_close($connect);
?>
