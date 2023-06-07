<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
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

        .login-button {
          display: block;
          width: 100%;
          padding: 10px;
          background-color: #1f9a50;
          color: #FFF;
          font-size: 16px;
          font-weight: bold;
          text-align: center;
          border: none;
          border-radius: 5px;
          cursor: pointer;
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
        <h1><a href="index.php">CodeTree</a></h1>
        <form action="islogin.php" method="POST">
            <div class="form-group">  
                <label for="id">ID:</label>
                <input type="text" id="id" name="id" placeholder="Enter your ID">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter your password">
            </div>
            <button class="login-button" type="submit">Log In</button>
        </form>
        <form action="register.php" method="POST">
            <button class="signup-button" type="submit">Sign Up</button>
        </form>
    </div>
</body>
</html>
