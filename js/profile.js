document.addEventListener("DOMContentLoaded", function() {
    let dropdownToggle = document.querySelector(".dropdown-toggle");
    let dropdownMenu = document.querySelector(".dropdown-menu");

    dropdownToggle.addEventListener("click", function() {
      dropdownToggle.classList.toggle("open"); // 드롭다운 토글 버튼에 open 클래스 추가/제거
      dropdownMenu.classList.toggle("open"); // 드롭다운 박스에 open 클래스 추가/제거

    });
  });
  