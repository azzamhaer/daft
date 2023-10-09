
<?php
session_start();
include("db.php"); // Include your database connection script

if (isset($_SESSION["username"])) {
    $user_id = $_SESSION["id"];
    $product_id = $_GET["product_id"];
    $quantity = $_GET["quantity"];

    // Check if the product is already in the cart for this user
    $check_query = "SELECT * FROM cart WHERE user_id = $user_id AND product_id = $product_id";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        // If the product is already in the cart, increment the quantity
        $row = mysqli_fetch_assoc($check_result);
        $existing_quantity = $row["quantity"];
        $new_quantity = $existing_quantity + $quantity;

        // Update the quantity in the cart
        $update_query = "UPDATE cart SET quantity = $new_quantity WHERE user_id = $user_id AND product_id = $product_id";
        mysqli_query($conn, $update_query);
    } else {
        // Insert a new row if the product is not in the cart
        $insert_query = "INSERT INTO cart (user_id, product_id, quantity) VALUES ($user_id, $product_id, $quantity)";
        mysqli_query($conn, $insert_query);
    }

    // Redirect back to the product listing page or cart page
    header("Location: catalog.php");
    exit();
} else {
    // User is not logged in, handle accordingly
    header("Location: login.php");
    exit();
}
?>

