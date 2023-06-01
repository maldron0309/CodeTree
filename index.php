<!DOCTYPE html>
<html>
<head>
<?php include 'header.php'; ?>

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
  </style>
</head>
<body>
  <div class="slide_wrap">
    <div class="slide">
      <div class="slide_item item1">CodeTree에 오신 것을 환영합니다!!</div>
      <div class="slide_item item2">여러분들의 정보로 CodeTree를 키워주세요</div>
      <div class="slide_item item3">Hello, CodeTree!</div>
      <div class="slide_prev_button slide_button">◀</div>
<div class="slide_next_button slide_button">▶</div>
<ul class="slide_pagination"></ul>
</div>
</div>
<a href="./Board/gamedev.php">
<div class="board-container">
  <div class="board">
    <div class="board-img">
      <img src="./img/game.png" alt="">
    </div>
    <div class="board-title">게임 개발 게시판</div>
  </div>
</a>

  <div class="board">
    <div class="board-img">
      <img src="./img/web.png" alt="">
    </div>
    <div class="board-title">웹 개발 게시판</div>
  </div>

  <div class="board">
    <div class="board-img">
      <img src="./img/app.png" alt="">
    </div>
    <div class="board-title">앱 개발 게시판</div>
  </div>

  <div class="board">
    <div class="board-img">
      <img src="./img/team.png" alt="">
    </div>
    <div class="board-title">팀 모집 게시판</div>
  </div>
</div>

<script>
  function toggleDropdown() {
    let dropdownMenu = document.getElementById("dropdownMenu");
    dropdownMenu.style.display = dropdownMenu.style.display === "none" ? "block" : "none";
  }
</script>
<script src="./js/slide.js"></script>
<script src="./js/profile.js"></script>
<footer class="footer">
    <div class="container">
      <p class="copy">&copy; CodeTree</p>
    </div>
  </footer>
</body>
</html>

