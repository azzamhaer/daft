<?php
session_start();

require_once 'db.php';

$user_id = $_SESSION['id']; // Make sure to replace 'user_id' with your actual session variable name.

if (isset($user_id)) {
    // SQL query to update rows with the specified user_id
    $sql = "UPDATE cart SET status = 'Waiting' WHERE user_id = $user_id";

    if ($conn->query($sql) === TRUE) {
        header("Location: orders.php");
    } else {
        echo "Error updating status: " . $conn->error;
    }
} else {
    echo "User ID not found in session.";
}

// Close the database connection
$conn->close();
?>

