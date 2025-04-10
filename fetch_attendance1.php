<?php
// Establish database connection
$hostname = "sql307.infinityfree.com";
$username = "if0_36166084";
$password = "8810JBnxGE";
$database = "if0_36166084_hyundai";

$conn = mysqli_connect($hostname, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

session_start();

// Check if the user is logged in, redirect to login page if not
if (!isset($_SESSION['user'])) {
  header("Location: index.php");
  exit();
}

$user = $_SESSION['user'];
$date = $_GET['date']; // Get the date from JavaScript

$sql = "SELECT * FROM test WHERE Employee_id = $user AND Date = '$date'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Output day status based on 'In Time' column
  while ($row = $result->fetch_assoc()) {
    $inTime = $row['In_Time'];
    $dayStatus = ($inTime == '00:00:00') ? 'Absent' : 'Present';
    echo $dayStatus;
  }
} else {
  echo ".";
}

$conn->close();
?>
