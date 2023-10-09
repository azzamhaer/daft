<?php session_start(); /* Starts the session */

if(!isset($_SESSION['UserData']['Username'])){
	header("location:login.php");
	exit;
}
?>

<?php
require_once '../db.php';

// Retrieve user data from the form
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
$email = $_POST['email'];
$address = $_POST['address'];

// Insert data into the database
$sql = "INSERT INTO users (username, password, email, address) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->execute([$username, $password, $email, $address]);

// Redirect back to the admin dashboard or a success page
header("Location: users.php");
exit();
?>