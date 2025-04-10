<?php
include('connection.php');
session_start();

if (isset($_POST['submit'])) {
    $username = $_POST['user'];
    $password = $_POST['pass'];

    $sql = "SELECT * FROM users WHERE Employee_id = '$username' AND password = '$password'";  
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        // Query execution failed, show error message
        echo "Error: " . mysqli_error($conn);
    } else {
        $count = mysqli_num_rows($result);

        if ($count == 1) {
            // Set session variable for logged-in user
            $_SESSION['user'] = $username;
            header("Location: home.php");
            exit(); // Exit script after redirect
        } else {
            echo  '<script>
                        window.location.href = "index.php";
                        alert("Login failed. Invalid username or password!!");
                    </script>';
        }
    }
}
?>