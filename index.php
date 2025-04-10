<?php 
    include("connection.php");
    include("login.php")
    ?>


<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Portal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href=
"images.png"
          type="image/x-icon">
    <style>
@import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

* {
  box-sizing: border-box;
}

body {
  background: linear-gradient(to bottom right, #3498db, #ffff);
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  font-family: 'Montserrat', sans-serif;
  height: 100vh;
  margin: -20px 0 50px;
}

h1 {
  font-weight: bold;
  margin: 0;
  color: whitesmoke;
}

h2 {
  text-align: center;
}

p {
  font-size: 14px;
  font-weight: 100;
  line-height: 20px;
  letter-spacing: 0.5px;
  margin: 20px 0 30px;
}

span {
  font-size: 12px;
}

a {
  color: #333;
  font-size: 14px;
  text-decoration: none;
  margin: 15px 0;
}

button {
  border-radius: 5px;
/*  border: 1px solid #000;*/
  background: linear-gradient(to bottom right, #2980b9, #3498db);
  color: #FFFFFF;
  font-size: 12px;
  font-weight: bold;
  padding: 12px 45px;
  letter-spacing: 1px;
  text-transform: uppercase;
  transition: transform 80ms ease-in;
}

button:active {
  transform: scale(0.95);
}

button:focus {
  outline: none;
}

button.ghost {
  background-color: transparent;
  border-color: #FFFFFF;
}

form {
  background: linear-gradient(to bottom , #3498db, #000);
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  padding: 0 50px;
  height: 100%;
  text-align: center;
}

input {
  background-color: #eee;
  border: none;
  padding: 12px 15px;
  margin: 8px 0;
  width: 100%;
}

.container {
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
  0 10px 10px rgba(0,0,0,0.22);
  position: relative;
  overflow: hidden;
  width: 768px;
  max-width: 100%;
  min-height: 480px;
}

.form-container {
  position: absolute;
/*  background: linear-gradient(to right, #FF4B2B, #FF416C);*/
  top: 0;
  height: 100%;
  transition: all 0.6s ease-in-out;
}

.sign-in-container {
  left: 0;
  width: 50%;
  z-index: 2;
}

.container.right-panel-active .sign-in-container {
  transform: translateX(100%);
}

.container.right-panel-active .sign-up-container {
  transform: translateX(100%);
  opacity: 1;
  z-index: 5;
  animation: show 0.6s;
}

@keyframes show {
  0%, 49.99% {
    opacity: 0;
    z-index: 1;
  }
  
  50%, 100% {
    opacity: 1;
    z-index: 5;
  }
}

.overlay-container {
  position: absolute;
  top: 0;
  left: 50%;
  width: 50%;
  height: 100%;
  overflow: hidden;
  transition: transform 0.6s ease-in-out;
  z-index: 100;
}

.container.right-panel-active .overlay-container{
  transform: translateX(-100%);
}

.overlay {
  /*background: #FF416C;
  
  background: -webkit-linear-gradient(to right, #FF4B2B, #FF416C);
  background: linear-gradient(to right, #FF4B2B, #FF416C);
  background-repeat: no-repeat;
  background-size: cover;*/
  background-position: 0 0;
  color: #FFFFFF;
  position: relative;
  left: -100%;
  height: 100%;
  width: 200%;
    transform: translateX(0);
  transition: transform 0.6s ease-in-out;
}

.container.right-panel-active .overlay {
    transform: translateX(50%);
}

.overlay-panel {
  position: absolute;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  padding: 0 40px;
  text-align: center;
  top: 0;
  height: 100%;
  width: 50%;
  transform: translateX(0);
  transition: transform 0.6s ease-in-out;
}

.overlay-left img,
.overlay-right img {
  max-width: 100%;
  height: auto;
  display: block;
}
.overlay-left {
  transform: translateX(-20%);
}

.container.right-panel-active .overlay-left {
  transform: translateX(0);
}

.overlay-right {

  right: 0;
  transform: translateX(0);
}

.container.right-panel-active .overlay-right {
  transform: translateX(20%);
}
.password-input {
        padding-right: 30px; /* Adjust padding to make space for the eye icon */
        position: relative;
    }

    .toggle-password {
        position: absolute;
        top: 56%;
        right: 60px; /* Adjust right position as needed */
        transform: translateY(-50%);
        cursor: pointer;
        opacity: 0.3; /* Adjust opacity as needed */
        transition: opacity 0.3s ease; /* Add a smooth transition effect */
    }

    .toggle-password:hover {
        opacity: 0.7; /* Increase opacity on hover if desired */
    }
    

    </style>
</head>
<body>

<div class="container" id="container">
  <div class="form-container sign-in-container">
    <form name="form" action="login.php" onsubmit="return isvalid()" method="POST">

      <h1>Log in</h1>
      <input type="text" id="user" name="user" placeholder="Employee ID" />
      <input type="password" id="pass" name="pass" placeholder="Password" class="password-input" />
<i class="toggle-password fas fa-eye" onclick="togglePasswordVisibility()"></i>
      
      <button type="submit" id="btn" value="Login" name = "submit">Log In</button>
    </form>
  </div>

  <div class="overlay-container">
    <div class="overlay">
      <div class="overlay-panel overlay-left">
      </div>
      <div class="overlay-panel overlay-right">
  <img src="\Hyundai_Wia_logo.png" alt="Right Image">
</div>
    </div>
  </div>
</div>
<script>
            function isvalid(){
                var user = document.form.user.value;
                var pass = document.form.pass.value;
                if(user.length=="" && pass.length==""){
                    alert(" Username and password field is empty!!!");
                    return false;
                }
                else if(user.length==""){
                    alert(" Username field is empty!!!");
                    return false;
                }
                else if(pass.length==""){
                    alert(" Password field is empty!!!");
                    return false;
                }
                
            }


             function togglePasswordVisibility() {
                var passwordField = document.getElementById('pass');
                var icon = document.querySelector('.toggle-password');

             if (passwordField.type === 'password') {
                passwordField.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
    }
  }
        </script>
</body>
</html>
