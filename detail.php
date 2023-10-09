<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>DAFT Store | Product Detail</title>
  <link rel="stylesheet" href="assets/css/detail.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Vendor Script -->
  <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous">
  </script>
</head>

<body>

<?php
    // Check if the 'id' parameter is set in the URL
    if (isset($_GET['id'])) {
        $product_id = $_GET['id'];

        require_once 'db.php';

        // Query the database to retrieve product details
        $sql = "SELECT id, product_name, image_url, description, price FROM catalog WHERE id = $product_id";
        $result = $conn->query($sql);

        // Check if the query returned any results
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

?>



    <div class="container">
        <div class="imgBx">
            <img src="<?php echo $row['image_url']; ?>" alt="Nike Jordan Proto-Lyte Image">
        </div>
        <div class="details">
            <div class="content">
                <h2><?php echo $row['product_name']; ?><br>
                    <span>Running Collection</span>
                </h2>
                <p>
                <?php echo $row['description']; ?>
                </p>
                <h3>$ <?php echo $row['price']; ?></h3><br><br><br>
                <a href="add-to-cart.php?product_id=<?php echo $row['id']; ?>&quantity=1"><button>Buy Now →</button></a>
                <a href="catalog.php"><button>← Go back</button></a>
            </div>
        </div>
    </div>

<?php 
} else {
    echo "Product not found.";
}
} else {
echo "Product ID is missing.";
}
?>

    <!-- Footer -->
    <footer>
        <a href="index.php">DAFT Store</a>
    </footer>


    <script>
        // Change The Picture and Associated Element Color when Color Options Are Clicked.
        $(".product-colors span").click(function() {
            $(".product-colors span").removeClass("active");
            $(this).addClass("active");
            $(".active").css("border-color", $(this).attr("data-color-sec"))
            $("body").css("background", $(this).attr("data-color-primary"));
            $(".content h2").css("color", $(this).attr("data-color-sec"));
            $(".content h3").css("color", $(this).attr("data-color-sec"));
            $(".container .imgBx").css("background", $(this).attr("data-color-sec"));
            $(".container .details button").css("background", $(this).attr("data-color-sec"));
            $(".imgBx img").attr('src', $(this).attr("data-pic"));
        });
    </script>

</body>

</html>
<!-- partial -->
  
</body>
</html>
