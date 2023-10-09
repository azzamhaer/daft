<?php session_start(); /* Starts the session */

if(!isset($_SESSION['UserData']['Username'])){
	header("location:login.php");
	exit;
}
?>

<?php
require_once '../db.php';

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the input data from the form
    $product_name = $_POST["product_name"];
    $image_url = $_POST["image_url"];
    $description = $_POST["description"];
    $price = $_POST["price"];

    // SQL query to insert a new product into the database
    $sql = "INSERT INTO catalog (product_name, image_url, description, price) VALUES (?, ?, ?, ?)";

    // Prepare and execute the SQL statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssd", $product_name, $image_url, $description, $price);

    if ($stmt->execute()) {
        echo "Product added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and database connection
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
</head>
<body>
    <h2>Add a New Product</h2>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="product_name">Product Name:</label>
        <input type="text" name="product_name" required><br><br>

        <label for="image_url">Image URL:</label>
        <input type="text" name="image_url" required><br><br>

        <label for="description">Description:</label>
        <textarea name="description" rows="4" cols="50" required></textarea><br><br>

        <label for="price">Price:</label>
        <input type="number" name="price" required><br><br>

        <input type="submit" value="Add Product">
    </form>
</body>
</html>
