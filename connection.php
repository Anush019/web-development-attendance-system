<?php
$hostname= "";
$username= "";
$password="E";
$database= "";

$conn= mysqli_connect($hostname, $username, $password, $database);

if (!$conn) {
    die("connection failed: ". mysqli_connect_error());
}
// echo "database connection is okay";
?>