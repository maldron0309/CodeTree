<?php
$connect = mysqli_connect('localhost', 'root', '1234', 'codetree') or die("connect failed");

$id = $_POST['id'];
<<<<<<< HEAD
$pw = $_POST['password'];
=======
$pw = $_POST['pw'];
>>>>>>> 3691acaae23517bbc2c7446a732feb88a4656169

$date = date('Y-m-d H:i:s');

//id 중복 확인
$query1 = "select * from member where id='$id'";
$result1 = $connect->query($query1);
$count = mysqli_num_rows($result1);

if ($count) {
    echo "<script>alert('이미 존재하는 ID입니다.'); history.back();</script>";
} else {
    $query = "insert into member(id, password, date, permit) values('$id', '$pw', '$date', 0)";
    $result = $connect->query($query);

    if ($result) {
        echo "<script>alert('회원가입에 성공하였습니다.'); location.replace('./login.php');</script>";
    } else {
        echo "<script>alert('회원가입에 실패하였습니다.');</script>";
    }
}

mysqli_close($connect);
?>
