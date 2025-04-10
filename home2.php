<?php
include('connection.php');
session_start();

// Check if the user is logged in, redirect to login page if not
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

$username = $_SESSION['user'];

// Query to retrieve user information from personal_info table
$sql = "SELECT * FROM team_info WHERE Employee_id = '$username'";
$result = mysqli_query($conn, $sql);

if (!$result) {
    // Query execution failed, show error message
    echo "Error: " . mysqli_error($conn);
} else {
    // Fetch user information
    $row = mysqli_fetch_assoc($result);
    $employeeId = $row['Employee_id'];
    $manager = $row['manager'];
    $members = $row['members'];
    $schedule = $row['schedule'];
    $department = $row['department'];
}
$sql = "SELECT user_type FROM personal_info WHERE Employee_id = '$username'";
$result = mysqli_query($conn, $sql);

if (!$result) {
    // Query execution failed, show error message
    echo "Error: " . mysqli_error($conn);
} else {
    // Fetch user information and user type
    $row = mysqli_fetch_assoc($result);
    $userType = $row['user_type']; // Assuming 'User_type' is the column name
}

// Determine which navigation file to include based on user type
$navigationFile = ($userType === 'Admin') ? "navigation1.html" : "navigation.html";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Portal</title>
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
  height: 95.5vh;
  margin: -20px 0 50px;
}

form {
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
  width: 1050px;
  top: 12%;
  max-width: 100%;
  min-height: 511px;
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
  z-index: 10;
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
  background: linear-gradient(to bottom , #3498db, #000);
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

.logo-container {
    position: absolute;
    top: 0;
    left: 50%;
    transform: translateX(-50%);
    z-index: 999;
    margin-top: 20px;
  }

  .logo {
    width: 200px;
    height: auto;
  }
        
.section-buttons {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
            position: relative;
        }

        .section-button {
            width: 200px;
            height: 200px;
            background: linear-gradient(to bottom , #2980b9, #3498db);

            color: #fff;
            border: none;
            border-radius: 10px;
            padding-top: 10px;
            margin-top: 30px ;
            cursor: pointer;
            transition: background-color 0.3s;
            position: relative;
            z-index: 998;
        }

        .section-button img {
            width: 100px;
            height: 100px;
            display: block;
            margin: auto;
            margin-bottom: 10px;

        }

        .section-button:hover {
            background-color: #0056b3;
            z-index: 999;
        }
        .section-buttons {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

    </style>
</head>
<body>

<?php include($navigationFile); ?>
<div class="container" id="container">
  <div class="form-container sign-in-container">
    <form action="#">
    <!-- <h1>Welcome, <?php echo $name; ?>!</h1> -->
    <p>Employee ID: <?php echo $employeeId; ?></p>
    <p>Department: <?php echo $department; ?></p>
    <p>Manager: <?php echo $manager; ?></p>
    <p>Members: <?php echo $members; ?></p>
    <p>Schedule: <?php echo $schedule; ?></p>
    </form>
  </div>
  <div class="overlay-container">
    <div class="overlay">
      <div class="overlay-panel overlay-left">
        
      </div>
      <div class="overlay-panel overlay-right">
        <div class="section-buttons">
            <!-- Attendance & Leave section button -->
            <button class="section-button" onclick="loadPage1()">
                <img src="month.png" alt="Attendance & Leave">
                Monthly Attendance 
            </button>

            <!-- Team Detail section button -->
            <button class="section-button" onclick="loadPage2()">
    <img src="User.png" alt="">
    User info
</button>
        </div>
</div>
    </div>
  </div>
</div>
<div class="logo-container">
  <a href="home.php">
    <img src="Hyundai_Wia_logo.png" alt="Logo" class="logo">
  </a>
</div>
<script>
    function openPage(url) {
        window.open(url, '_blank');
    }

    function loadPage1() {
        window.location.href = 'monthtest.php';
    }
    function loadPage2() {
        window.location.href = 'home.php';
    }
</script>
</body>
</html>