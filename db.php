<?php
// Establish a database connection
$hostname = "localhost";
$username = "root";
$password = "";
$database = "shop";

$conn = mysqli_connect($hostname, $username, $password, $database);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>