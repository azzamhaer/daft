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

    // Query to retrieve the product with the given ID from the 'catalog' table
    $selectQuery = "SELECT id, product_name, image_url, description, price FROM catalog WHERE id = $productId";
    $result = $conn->query($selectQuery);

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $productId = $row['id'];
        $productName = $row['product_name'];
        $imageUrl = $row['image_url'];
        $description = $row['description'];
        $price = $row['price'];
    } else {
        echo "Product not found.";
        exit();
    }
} else {
    echo "Product ID not provided.";
    exit();
}

// Handle form submission for updating the product
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newProductName = $_POST['product_name'];
    $newImageUrl = $_POST['image_url'];
    $newDescription = $_POST['description'];
    $newPrice = $_POST['price'];

    // Query to update the product with the new data
    $updateQuery = "UPDATE catalog SET product_name = '$newProductName', image_url = '$newImageUrl', description = '$newDescription', price = '$newPrice' WHERE id = $productId";

    if ($conn->query($updateQuery) === TRUE) {
        header("Location: products.php");
    } else {
        echo "Error updating product: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>
    <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo $productId; ?>">
        <label for="product_name">Product Name:</label>
        <input type="text" name="product_name" value="<?php echo $productName; ?>"><br><br>
        <label for="image_url">Image URL:</label>
        <input type="text" name="image_url" value="<?php echo $imageUrl; ?>"><br><br>
        <label for="description">Description:</label>
        <textarea name="description"><?php echo $description; ?></textarea><br><br>
        <label for="price">Price:</label>
        <input type="text" name="price" value="<?php echo $price; ?>"><br><br>
        <input type="submit" value="Update Product">
    </form>
</body>
</html>
