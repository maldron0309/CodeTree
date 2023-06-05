<?php
$connect = mysqli_connect('localhost', 'root', '1234', 'codetree') or die("connect failed");

$query = "select * from board order by number desc";
$result = mysqli_query($connect, $query);
$total = mysqli_num_rows($result);

session_start();

// 로그아웃 버튼을 눌렀을 때 세션을 파기하고 로그인 페이지로 이동
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CodeTree</title>
  <link rel="stylesheet" href="./css/header.css">
  <style>
        footer.footer {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    background-color: lightgray;
    color: white;
    text-align: center;
    padding: 10px;
    font-weight: bold;
  }
    body {
      margin: 0;
      padding: 0;
      background-color: #f1f1f1;
    }

    .container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
    }

    .board {
      width: 200px;
      margin: 20px;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      text-align: center;
    }

    .board img {
      width: 100px;
      height: 100px;
      margin-bottom: 10px;
    }

    .board-title {
      font-size: 16px;
      font-weight: bold;
    }
   
nav:after {
  content: "";
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 1px;
  background-color: black;
}

.container {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  border-top: 1px solid black;
  padding-top: 20px;
  margin-top: 20px;
}
h1#title {
    margin-top: 20px;
    text-align: left;
    font-weight: bold;
    font-size: 24px;
    padding: 10px;
    border-bottom: 1px solid #ccc;
  }
  </style>
</head>
<body>
  <nav>
  <h1><a href="index.php">CodeTree</a></h1>
  <?php
    if (isset($_SESSION['userid'])) {
      $userid = $_SESSION['userid'];

      echo "<img src=\"img/user.png\" class=\"user-pic\" onclick=\"toggleMenu()\">";
      echo "<div class=\"sub-menu-wrap\" id=\"subMenu\">";
      echo "<div class=\"sub-menu\">";
      echo "<div class=\"user-info\">";
      echo "<img src=\"img/user.png\" alt=\"\">";
      echo "<h2>$userid</h2>";
      echo "</div>";
      echo "<hr>";
      echo "<a href=\"#\" class=\"sub-menu-link\">";
      echo "<img src=\"img/pro.png\" alt=\"\">";
      echo "<p>Edit Profile</p>";
      echo "<span>></span>";
      echo "</a>";
      echo "<a href=\"?logout\" class=\"sub-menu-link\">"; // 로그아웃 링크
      echo "<img src=\"img/logout.png\" alt=\"\">";
      echo "<p>Logout</p>";
      echo "<span>></span>";
      echo "</a>";
      echo "</div>";
      echo "</div>";
    } else {
      echo "<a href=\"./login.php\" class=\"login-btn\">Login</a>";
    }
    
  ?>
  <script>
    let subMenu = document.getElementById("subMenu");

    function toggleMenu() {
      subMenu.classList.toggle("open-menu");
    }
</script>
</nav>
    <h1 id="title">게임 개발 게시판</h1>
    <?php
      while ($row = mysqli_fetch_assoc($result)) {
        // ... Your existing PHP code ...
      }
    ?>
  </div>
  <footer class="footer">
    CodeTree &copy; 2023. All Rights Reserved.
  </footer>