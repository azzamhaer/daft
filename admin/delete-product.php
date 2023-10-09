<?php session_start(); /* Starts the session */

if(!isset($_SESSION['UserData']['Username'])){
	header("location:login.php");
	exit;
}
?>

<?php
require_once '../db.php';

// Check if the 'id' parameter is provided in the URL
if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    // Query to delete the product with the given ID from the 'catalog' table
    $deleteQuery = "DELETE FROM catalog WHERE id = $productId";

    if ($conn->query($deleteQuery) === TRUE) {
        echo "Product deleted successfully.";
    } else {
        echo "Error deleting product: " . $conn->error;
    }
} else {
    echo "Product ID not provided.";
}

// Close the database connection
$conn->close();
?>
