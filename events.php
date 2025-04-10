<?php
include('connection.php');
session_start();


$username = $_SESSION['user'];


$sql = "SELECT day, month, year FROM attendance WHERE Employee_id= '$username' AND status = 'Present'";
$result = $conn->query($sql);

$events = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $events[] = $row;
    }
}

$conn->close();

echo json_encode($events);
?>
