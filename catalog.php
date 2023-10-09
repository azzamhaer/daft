<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--=============== FAVICON ===============-->
        <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

        <!--=============== BOXICONS ===============-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

        <!--=============== SWIPER CSS ===============--> 
        <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">

        <!--=============== CSS ===============-->
        <link rel="stylesheet" href="assets/css/styles.css">

        <title>DAFT Store | Catalog</title>
    </head>
    <body>

    <?php include_once 'header.php'; ?>

    <?php
if (isset($_SESSION['username'])) {
    include_once('cart.php');
} ?>

        <!--==================== MAIN ====================-->
        <main class="main">
            <!--==================== PRODUCTS ====================-->
            <section class="products section container" id="products">
                <h2 class="section__title">
                    Products
                </h2>

                <div class="products__container grid">

                <?php
require_once 'db.php';

 // Retrieve catalog items from the database
$sql = "SELECT * FROM catalog";
$result = mysqli_query($conn, $sql);

// Display catalog items
while ($row = mysqli_fetch_assoc($result)) {

    ?>

                    <article class="products__card">
                        <a href="detail.php?id=<?php echo $row['id']; ?>"><img src="<?php echo $row['image_url']; ?>" width="400" height="649" alt="<?php echo $row['product_name']; ?>" class="products__img"></a>

                        <h3 class="products__title"><?php echo $row['product_name']; ?></h3>
                        <span class="products__price"><?php echo $row['price']; ?></span>
                        <br><br><br>
                        <button class="products__button">
                            <a class="add" href="add-to-cart.php?product_id=<?php echo $row['id']; ?>&quantity=1"> ADD TO CART </a>
                        </button>

                    </article>
                    <?php
}

// Close the database connection
mysqli_close($conn);
?>
                </div>
            </section>
          
            <?php include_once 'newsletter.php'; ?>
            
        </main>

        <?php include_once 'footer.php'; ?>

        <!--=============== SCROLL UP ===============-->
        <a href="#" class="scrollup" id="scroll-up"> 
            <i class='bx bx-up-arrow-alt scrollup__icon' ></i>
        </a>

        <!--=============== SWIPER JS ===============-->
        <script src="assets/js/swiper-bundle.min.js"></script>

        <!--=============== MAIN JS ===============-->
        <script src="assets/js/main.js"></script>
    </body>
</html>
