<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>register_Page</title>
    <style>
        * {
          margin: 0;
          padding: 0;
          font-family: 'Poppins', 'sans-serif';
          box-sizing: border-box;
        }

        body {
          display: flex;
          justify-content: center;
          align-items: center;
          height: 100vh;
          background-color: #f5f5f5;
        }

        .container {
          width: 400px;
          background-color: #DDD;
          padding: 30px;
          border: 1px solid #000;
        }

        h1 {
          text-align: center;
          font-size: 24px;
          font-weight: bold;
          margin-bottom: 20px;
        }

        .form-group {
          margin-bottom: 20px;
        }

        .form-group label {
          display: block;
          margin-bottom: 5px;
          font-size: 14px;
          font-weight: bold;
        }

        .form-group input {
          width: 100%;
          padding: 10px;
          border: 1px solid #C2C7D0;
          border-radius: 5px;
        }

        .form-group .check-button {
          display: inline-block;
          padding: 5px 10px;
          background-color: #1f9a50;
          color: #FFF;
          font-size: 12px;
          font-weight: bold;
          text-align: center;
          border: none;
          border-radius: 5px;
          cursor: pointer;
          margin-top: 5px;
          margin-left: 1px;
        }

        .signup-button {
          display: block;
          width: 100%;
          padding: 10px;
          background-color: #3b5998;
          color: #FFF;
          font-size: 16px;
          font-weight: bold;
          text-align: center;
          border: none;
          border-radius: 5px;
          cursor: pointer;
          margin-top: 10px;
        }
        .container h1 a {
          color: black;
          text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><a href="./index.php">CodeTree</a></h1>
          <form action="./isregister.php" method="POST" onsubmit="return checkPasswordMatch();">
            <div class="form-group">  
                <label for="id">ID:</label>
                <input type="text" id="id" name="id" placeholder="Enter your ID">
                <button class="check-button" type="button" onclick="checkDuplicate()">중복체크</button>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter your password">
            </div>
            <div class="form-group">
  <label for="password_check">Confirm Password:</label>
  <input type="password" id="password_check" name="password_check" placeholder="Re-enter your password">
</div>
            <button class="signup-button" type="submit">Sign Up</button>
        </form>
    </div>


<script>
function checkDuplicate() {
  const id = document.getElementById("id").value;
  
  if (id.trim() === "") {
    alert("아이디를 입력하세요");
    document.getElementById("id").focus();
    return;
  }
  
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        if (xhr.responseText === "success") {
          alert("사용 가능한 아이디입니다.");
        } else {
          alert("중복된 아이디입니다.");
        }
      } else {
        alert("오류가 발생했습니다. 다시 시도하세요.");
      }
    }
  };
  
  xhr.open("POST", "check.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.send("id=" + id);
}

function checkPasswordMatch() {
  const password = document.getElementById("password").value;
  const password_check = document.getElementById("password_check").value;

  if (password !== password_check) {
    alert("비밀번호가 일치하지 않습니다. 다시 입력해주세요.");
    document.getElementById("password_check").focus();
    return false;
  }
  return true;
}

</script>

</body>
</html>
