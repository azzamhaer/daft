<?php
session_start();
include("db.php"); // Include your database connection script

if (isset($_SESSION["username"]) && isset($_GET["cart_id"])) {
    $user_id = $_SESSION["id"];
    $cart_id = $_GET["cart_id"];

    // Query to delete the cart item for the user
    $delete_query = "DELETE FROM cart WHERE user_id = $user_id AND id = $cart_id";
    mysqli_query($conn, $delete_query);

    // Redirect back to the cart page
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
} else {
    // User is not logged in or cart_id is not provided, handle accordingly
    header("Location: login.php");
    exit();
}
?>
