<?php
$connect = mysqli_connect('localhost', 'root', '1234', 'codetree') or die("connect failed");

$query = "select * from board order by number desc";
$result = mysqli_query($connect, $query);
$total = mysqli_num_rows($result);

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CodeTree</title>
  <link rel="stylesheet" href="./css/header.css">
  <link rel="stylesheet" href="./css/slide.css">
  <link rel="stylesheet" href="./css/profile.css">
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
      echo "<a href=\"./islogout.php\" class=\"sub-menu-link\">";
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

    function toggleMenu(){
      subMenu.classList.toggle("open-menu");
    }
  </script>
</nav>

  <div class="slide_wrap">
    <div class="slide">
      <div class="slide_item item1">CodeTree에 오신 것을 환영합니다!!</div>
      <div class="slide_item item2">여러분들의 정보로 CodeTree를 키워주세요</div>
      <div class="slide_item item3">Hello, CodeTree!</div>
      <div class="slide_prev_button slide_button">◀</div>
<div class="slide_next_button slide_button">▶</div>
<ul class="slide_pagination"></ul>
</div>
  <div class="container">
    <div class="board">
      <a href="./Board/gameDev.php">
        <img src="./img/game.png" alt="">
        <div class="board-title">게임 개발 게시판</div>
      </a>
    </div>

    <div class="board">
      <a href="./Board/webDev.php">
        <img src="./img/web.png" alt="">
        <div class="board-title">웹 개발 게시판</div>
      </a>
    </div>

    <div class="board">
      <a href="./Board/appDev.php">
        <img src="./img/app.png" alt="">
        <div class="board-title">앱 개발 게시판</div>
      </a>
    </div>

    <div class="board">
      <a href="./Board/team.php">
        <img src="./img/team.png" alt="">
        <div class="board-title">팀 구인/구직 게시판</div>
</a>
</div>
  </div>
  <script src="js/slide.js"></script>
  <footer class="footer">
    <div class="container">
      <p class="copy">&copy; CodeTree</p>
    </div>
  </footer>
</body>
</html>
