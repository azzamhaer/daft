<?php
session_start();

// Include the database connection
include("db.php");

// Check if the user is logged in (replace this with your authentication logic)
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to the login page if not logged in
    exit();
}

$user_id = $_SESSION['id'];

// Function to update the cart quantity in the database
function updateCartQuantity($conn, $user_id, $product_id, $quantity) {
    $sql = "UPDATE cart SET quantity = $quantity WHERE user_id = $user_id AND product_id = $product_id";
    $conn->query($sql);
}

// Function to remove a product from the cart
function removeFromCart($conn, $user_id, $product_id) {
    $sql = "DELETE FROM cart WHERE user_id = $user_id AND product_id = $product_id";
    $conn->query($sql);
}

// Check if the product_id was provided
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    // Get the current quantity in the cart
    $sql = "SELECT quantity FROM cart WHERE user_id = $user_id AND product_id = $product_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $current_quantity = $row['quantity'];

        // Decrease the quantity (minimum is 1)
        $new_quantity = max($current_quantity - 1, 1);

        if ($current_quantity != $new_quantity) {
            // Update the cart in the database
            updateCartQuantity($conn, $user_id, $product_id, $new_quantity);
        } else {
            // If the quantity becomes 1 after the decrease, remove the product from the cart
            removeFromCart($conn, $user_id, $product_id);
        }
    }
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
exit();
?>
