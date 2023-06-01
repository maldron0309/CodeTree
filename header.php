<?php
$connect = mysqli_connect('localhost', 'root', '1234', 'codetree') or die("connect failed");

$query = "select * from board order by number desc";
$result = mysqli_query($connect, $query);
$total = mysqli_num_rows($result);

session_start();
?>

</div>
</div>
</div>

<header>
  <div id="logo">
    <img src="./img/logo.png" alt="">
  </div>
  <style>
    body {
      margin: 0;
      background-color: #f1f1f1;
    }

    header {
      background-color: #fff;
      padding: 10px;
      border-bottom: 1px solid #ccc;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    #logo {
      font-weight: bold;
      font-size: 24px;
      color: #333;
    }

    nav ul {
      list-style-type: none;
      display: flex;
      margin: 0;
      padding: 0;
    }

    nav ul li {
      margin-right: 10px;
    }

    nav ul li a {
      text-decoration: none;
      color: #777;
      padding: 5px;
    }

    .slide_wrap {
      background-color: #f8f8f8;
    }

    .dropdown {
      margin-right: 60px;
      margin-left: auto;
    }

    #profile-img {
      width: 40px;
      height: 40px;
      margin-right: 100px;
    }

    .dropdown-menu {
      display: none;
      position: absolute;
      z-index: 1;
      background-color: #fff;
      border: 1px solid #ccc;
      border-radius: 4px;
      padding: 5px;
      top: 50px;
      right: 10px;
    }

    .dropdown-menu a {
      display: block;
      padding: 5px;
      text-decoration: none;
      color: #333;
    }

    .board-container {
      display: flex;
      justify-content: center;
    }

    .board {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin: 20px;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .board img {
      width: 100px;
      height: 100px;
      margin-bottom: 10px;
    }
  </style>
<div class="dropdown">
  <?php
  if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
    echo "<span style='padding-right: 50px; margin-left: -10px;'>$userid 님</span>";
    echo "<img id='profile-img' src='./img/profile.png' alt='Profile Image' onclick='toggleDropdown()' style='margin-left: -10px;'>";
    echo "<div class='dropdown-menu' id='dropdownMenu' style='padding: 10px;'>";
    echo "<a class='dropdown-item' href='#'>프로필</a>";
    echo "<a class='dropdown-item' href='./islogout.php'>로그아웃</a>";
    echo "</div>";
  } else {
    echo "<a class='navbar-brand' href='./login.php'>로그인</a>";
  }
  ?>
</div>
</header>
