<?php
include("db.php");

// Check if the user is already logged in
if (isset($_SESSION['username'])) {
    // Redirect the user to their dashboard or another appropriate page
    header('Location: index.php');
    exit();
 }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $signup_username = $_POST["signup_username"];
    $signup_password = $_POST["signup_password"];
    $address = $_POST["address"];

    // Hash the password
    $hashed_password = password_hash($signup_password, PASSWORD_DEFAULT);

    // Insert user data into the database
    $sql = "INSERT INTO users (username, password, address) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $signup_username, $hashed_password, $address);

    if ($stmt->execute()) {
        // Registration successful, redirect to login page
        header("Location: login.php?signup_success=1");
        exit();
    } else {
        // Registration failed, redirect back to signup page with an error message
        header("Location: signup.php?signup_error=1");
        exit();
    }
}
?>



