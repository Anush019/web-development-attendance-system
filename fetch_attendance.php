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
$selectedDate = $_GET['date']; // Get the date from JavaScript

$sql = "SELECT * FROM test WHERE Employee_id = $user AND Date = '$selectedDate'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        $dayStatus = ($row['In_Time'] == '00:00:00') ? 'Absent' : 'Present';

        $data = array(
            'Employee_id' => $row['Employee_id'],
            'Date' => $row['Date'],
            'Shift' => "11",
            'First_Section' => $dayStatus,
            'Second_Section' => $dayStatus,
            'In_Time' => $row['In_Time'],
            'Out_Time' => $row['Out_Time'],
            'Total_Hours' => $row['Total_Hours'],
            'Late_In' => $row['Late_In'],
            'Early_Out' => $row['Early_Out'],
            'Day_Status' => $dayStatus
        );
        echo json_encode($data);
    }
} else {
    echo ".";
}

$conn->close();
?>
