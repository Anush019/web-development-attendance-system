<?php
// Include the database connection file
include "connection.php";

// Check if the POST data is received
if (isset ($_POST['id']) && isset ($_POST['status']) && isset ($_POST['table'])) {
    // Sanitize and validate input
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $table = mysqli_real_escape_string($conn, $_POST['table']);

    // Update the status in the specified table
    $sql = "UPDATE $table SET status = '$status' WHERE Employee_id = '$id'";
    $result = mysqli_query($conn, $sql);

    // Check if the query was successful
    if ($result) {
        // Send a success response back to the client
        echo "success";
    } else {
        // Send an error response back to the client
        echo "error";
    }
} else {
    // If the POST data is not received, send an error response back to the client
    echo "error";
}
?>