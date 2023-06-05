<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>회원가입 페이지</title>
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
    </style>
</head>
<body>
    <div class="container">
        <h1>CodeTree</h1>
        <form action="isregister.php" method="POST">
            <div class="form-group">  
                <label for="id">ID:</label>
                <input type="text" id="id" name="id" placeholder="Enter your ID">
                <button class="check-button" type="button" onclick="checkDuplicate()">중복체크</button>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter your password">
            </div>
            <button class="signup-button" type="submit">Sign Up</button>
        </form>
    </div>

    <script>
        function checkDuplicate() {
            // 중복 체크 로직 구현
            alert("중복 체크 기능은 구현되지 않았습니다.");
        }
    </script>
</body>
</html>
