<?php session_start(); /* Starts the session */

if(!isset($_SESSION['UserData']['Username'])){
	header("location:login.php");
	exit;
}
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $user_id = $_GET["id"];
    
    // Include your database connection code here (similar to users.php)
    include("../db.php");

    // Check if the user with the provided ID exists
    $check_sql = "SELECT * FROM users WHERE id = $user_id";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows == 1) {
        // User exists, proceed with deletion
        $delete_sql = "DELETE FROM users WHERE id = $user_id";
        
        if ($conn->query($delete_sql) === TRUE) {
            // Record deleted successfully
            header("Location: users.php");
        } else {
            // Error deleting record
            echo "Error deleting record: " . $conn->error;
        }
    } else {
        // User not found
        echo "User not found.";
    }

    // Close the database connection
    $conn->close();
} else {
    // Invalid request
    echo "Invalid request.";
}
?>
