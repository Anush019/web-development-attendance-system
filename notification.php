<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Notifications</title>
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
    height: 100vh; /* Set height to viewport height */
    margin: 0;
    padding: 0;
 font-family: 'Montserrat', sans-serif;
    overflow: hidden; /* Prevent body scrolling */
  }

  .container {
    width: 80%;
    margin: 20px auto;
    margin-top: 120px;
    padding: 20px;
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
    overflow-y: auto; /* Allow container scrolling */
    max-height: calc(100vh - 140px); /* Set max height to fit viewport */
  }

  h1 {
    text-align: center;
    font-size: 24px;
    margin-bottom: 20px;
  }

  .notification {
    background-color: #f9f9f9;
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 10px;
    cursor: pointer; /* Added cursor pointer */
  }

  .notification p {
    margin: 0;
  }

  .notification-details {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .column {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex: 1;
    padding: 0 10px;
    text-align: center;
    font-weight: bold;
  }

  /* Adjusted style for notification content */
  .notification-details > .column:not(:first-child) {
    font-weight: normal;
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
  /* Style for the clear button */
  .clear-button {
    position: absolute;
    right: 725px;
    padding: 10px 20px;
    background-color: #ff0000;
    color: #ffffff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }

  /* Added expanded class for showing detailed message */
  .notification.expanded .message-column {
    display: block;
  }

  .message-column {
    display: none;
    padding-top: 10px;
    border-top: 1px solid #ccc;
  }
  /*.sandwich-button {
            position: absolute;
            top: 30px;
            left: 10px;
            z-index: 999;
            background: none;
            border: none;
            cursor: pointer;
        }
        
        .sandwich-bar {
            width: 30px;
            height: 4px;
            background-color: #fff;
            margin: 6px 0;
        }*/
        

</style>
</head>
<?php include("navigation1.html"); ?>
<body>
<!-- Logo -->
<div class="logo-container">
  <a href="home.php">
    <img src="Hyundai_Wia_logo.png" alt="Logo" class="logo">
  </a>
</div>
<!-- <button class="sandwich-button" onclick="toggleMenu()">
    <div class="sandwich-bar"></div>
    <div class="sandwich-bar"></div>
    <div class="sandwich-bar"></div>
</button> -->


<div class="container">
  <h1>Notifications</h1>

  <!-- Column Headers -->
  <div class="notification">
    <div class="column">
      <div class="column">Source</div>
      <div class="column">Date</div>
      <div class="column">Type</div>
      <div class="column">Status</div>
    </div>
  </div>
<?php

// Retrieve leave requests from the database where Employee_id matches $_SESSION['user']
$sql = "SELECT * FROM request WHERE Employee_id = '{$_SESSION['user']}'";
$result = mysqli_query($conn, $sql);

// Check if there are any leave requests
if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        // Display each leave request as a notification
        echo '<div class="notification">';
        echo '<div class="notification-details">';
        echo '<div class="column">' . $row["username"] . '</div>';
        // Extracting only the date part of Created_at
        echo '<div class="column">' . date("d-m-Y", strtotime($row["Created_at"])) . '</div>';
        echo '<div class="column">Leave Request</div>';
        echo '<div class="column">' . $row["status"] . '</div>';
        echo '<div class="column message-column">Reason: ' . $row["reason"] . '</div>';
        echo '</div>';
        echo '</div>';
    }
}

// Retrieve Compoff requests from the database where Employee_id matches $_SESSION['user']
$sql = "SELECT * FROM compoff WHERE Employee_id = '{$_SESSION['user']}'";
$result = mysqli_query($conn, $sql);

// Check if there are any Compoff requests
if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        // Display each Compoff request as a notification
        echo '<div class="notification">';
        echo '<div class="notification-details">';
        echo '<div class="column">' . $row["username"] . '</div>';
        // Extracting only the date part of Created_at
        echo '<div class="column">' . date("d-m-Y", strtotime($row["Created_at"])) . '</div>';
        echo '<div class="column">Compoff Request</div>';
        echo '<div class="column">' . $row["status"] . '</div>';
        echo '<div class="column message-column">Overtime_Date_Hours: ' . $row["Overtime_Date_Hours"] . '</div>';
        echo '</div>';
        echo '</div>';
    }
}

// Retrieve Attendance regularization requests from the database where Employee_id matches $_SESSION['user']
$sql = "SELECT * FROM regularization WHERE Employee_id = '{$_SESSION['user']}'";
$result = mysqli_query($conn, $sql);

// Check if there are any Attendance regularization requests
if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        // Display each Attendance regularization request as a notification
        echo '<div class="notification">';
        echo '<div class="notification-details">';
        echo '<div class="column">' . $row["username"] . '</div>';
        // Extracting only the date part of Created_at
        echo '<div class="column">' . date("d-m-Y", strtotime($row["Created_at"])) . '</div>';
        echo '<div class="column">Attendance regularization </div>';
        echo '<div class="column">' . $row["status"] . '</div>';
        echo '<div class="column message-column">Absent Date: ' . $row["Absent_Date"] . '</div>';
        echo '</div>';
        echo '</div>';
    }
}

mysqli_close($conn);
?>


</div>
<!-- Clear All Button -->
<button class="clear-button" onclick="clearNotifications()">Clear All</button>

<script>
  function clearNotifications() {
    var container = document.querySelector('.container');
    var notifications = container.querySelectorAll('.notification');
    notifications.forEach(function(notification) {
      notification.remove();
    });
  }

  // Toggle expanded class on clicking notification
  document.querySelectorAll('.notification').forEach(function(notification) {
    notification.addEventListener('click', function() {
      this.classList.toggle('expanded');
    });
  });

  function openPage(url) {
        window.open(url, '_blank');
    }
    
    // function toggleMenu() {
    //     var navbar = document.getElementById("navbar");
    //     if (navbar.style.left === "-20%") {
    //         navbar.style.left = "0";
    //     } else {
    //         navbar.style.left = "-20%";
    //     }
    // }
</script>
</body>
</html>
