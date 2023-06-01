<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="stylesheet" href="./css/login.css">
    <style>
        
.clearfix {
  clear: both
}

.container {
  margin: 15px auto;
  overflow: hidden;
  width: 460px;
  background-color: #DDD;
  padding: 30px 10px 10px;
}
.global-cont {
  width: 420px;
  background-color: #FFF;
  margin: auto;
  padding: 20px;
}
.inner-cont {
  margin: auto;
  overflow: hidden;
  width: 400px;
  background-color: #FFF;
  text-align: center;
  border: 1px solid #C2C7D0;
}
.inner-cont .sign {
  overflow: hidden;
}
.inner-cont .sign span {
  float: left;
  width: 50%;
  display: block;
  padding: 8px 0;
  font-size: 22px;
  font-weight: bold;
  cursor: pointer;
  background-color: #EEE;
  color: #919191;
}
.inner-cont .sign span.active {
  border-top: 2px solid #1f9a50;
  background-color: #FFF;
}
.inner-cont .sign-in-up {
  padding: 25px;
  background-color: #FFF;
}
.inner-cont .sign-in-up form {
  overflow: hidden;
  display: none;
}
.inner-cont .sign-in-up form > span,
.inner-cont .sign-in-up form > a {
  float: left;
  width: 50%;
  font-size: 12px;
}
.inner-cont .sign-in-up form > span {
  text-align: left;
}
.inner-cont .sign-in-up form > a {
  text-align: right;
  text-decoration: none;
  color: #1f9a50;
}
.inner-cont .sign-in-up form > a:hover {
  text-decoration: underline;
}
.inner-cont .sign-in-up form input:not([type="checkbox"]) {
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #C2C7D0;
  border-radius: 5px;
  box-sizing: border-box
}
.inner-cont .sign-in-up form input[type="submit"]{
  margin-top: 10px;
  background-color: #1f9a50;
  color: #FFF;
  font-size: 18px;
  font-weight: bold;
  cursor: pointer;
  transition: .3s
}
.inner-cont .sign-in-up form.active {
  display: block;
}
.inner-cont .divider {
  position: relative;
  margin-bottom: 15px;
}
.inner-cont .divider::after{
  content: "";
  height: 1px;
  width: 100%;
  background-color: #C2C7D0;
  position: absolute;
  top: 9px;
  left: 0;
}
.inner-cont .divider span {
  padding: 0 10px;
  background-color: #FFF;
  z-index: 2;
  position: relative;
}
.inner-cont .social-login button {
  float: left;
  padding: 10px 0 10px 30px;
  width: 150px;
  margin-bottom: 15px;
  display: block;
  border: 1px solid #C2C7D0;
  border-radius: 5px;
  position: relative;
  color: #FFF;
  font-weight: bold;
  cursor: pointer;
  transition: .3s
}
.inner-cont .social-login button.google ,
.inner-cont .social-login button.linkedin {
  margin-left: 50px;
}
.inner-cont .social-login button.facebook {
  background-color: #3b5998;
}
.inner-cont .social-login button.facebook::before {
  content: "\f09a";
}
.inner-cont .social-login button.google {
  background-color: #dd4b39;
}
.inner-cont .social-login button.google::before {
  content:"\f1a0";
}
.inner-cont .social-login button.github {
  background-color: #333;
}
.inner-cont .social-login button.github::before {
  content:"\f09b";
  font-family: fontAwesome;
}
.inner-cont .social-login button.linkedin {
  background-color: #0077b5;
}
.inner-cont .social-login button.linkedin::before {
  content:"\f0e1";
  font-family: fontAwesome;
}
.inner-cont .social-login button.facebook::before ,
.inner-cont .social-login button.google::before ,
.inner-cont .social-login button.github::before ,
.inner-cont .social-login button.linkedin::before {
  font-family: fontAwesome;
  position: absolute;
  top: 0;
  left: 0;
  font-size: 22px;
  border-right: 1px solid #C2C7D0;
  padding: 0 5px;
  width: 20px;
  height: 100%;
  line-height: 40px;
}
.inner-cont .social-login .why {
  overflow: hidden;
  margin: 0 0 10px;
}
.inner-cont .social-login .why a ,
.inner-cont .social-login .policy a  {
  font-size: 10px;
  text-decoration: none;
  color: #1f9a50
}
.inner-cont .social-login .why a:hover ,
.inner-cont .social-login .policy a:hover {
  text-decoration: underline;
}
.inner-cont .social-login .policy {
  font-size: 10px;
}
.inner-cont .sign-in-up form input[type="submit"]:hover ,
.inner-cont .social-login button:hover {
  opacity: .7
}
    </style>
    <script src="./js/login.js"></script>
    <script>
        window.addEventListener('DOMContentLoaded', (event) => {
            let spanOption = document.querySelectorAll(".sign span");

            spanOption.forEach(function (span) {
                span.addEventListener("click", function (e) {
                    // Remove class active
                    e.target.parentElement.querySelectorAll(".active").forEach(function (element) {
                        element.classList.remove("active");
                    });

                    // Add class active
                    e.target.classList.add("active");

                    if (e.target.classList.contains("sign-in")) {
                        document.querySelectorAll(".sign-in-up form").forEach(function (element) {
                            element.classList.remove("active");
                        });

                        document.querySelector(".sign-in-form").classList.add("active");
                    } else {
                        document.querySelectorAll(".sign-in-up form").forEach(function (element) {
                            element.classList.remove("active");
                        });

                        document.querySelector(".sign-up-form").classList.add("active");
                    }
                });
            });
        });
    </script>
</head>
<body>
  
    <div class="container">
        <div class="global-cont">
            <div class="inner-cont">
                <div class="sign">
                    <span class="active sign-in">Sign In</span>
                    <span class="sign-up">Sign Up</span>
                </div>
                <div class="sign-in-up">
                    <form class="sign-in-form active" action="islogin.php" method="POST">
                        <input type="text" placeholder="Id" name="id"> <!-- 수정된 부분 -->
                        <input type="password" placeholder="Password" name="pw"> <!-- 수정된 부분 -->
                        <input type="submit" value="Sign In">
                    </form>
                    <form class="sign-up-form" id="sign-up-form" method="POST" action="isregister.php">
                        <input type="text" placeholder="Id" name="id"> <!-- 수정된 부분 -->
                        <input type="password" placeholder="Password" name="pw"> <!-- 수정된 부분 -->
                        <input type="submit" value="Sign Up">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>