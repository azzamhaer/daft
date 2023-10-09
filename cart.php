<!--==================== CART ====================-->
<div class="cart" id="cart">
    <i class='bx bx-x cart__close' id="cart-close"></i>
    <h2 class="cart__title-center">My Cart</h2>
    <div class="cart__container">

        <?php
        // Include the database connection
        include("db.php");

        // Check if the user is logged in (replace this with your authentication logic)
        if (!isset($_SESSION['username'])) {
            header("Location: login.php"); // Redirect to the login page if not logged in
            exit();
        }

        // Retrieve the user's cart items from the database
        $user_id = $_SESSION['id'];

        $sql = "SELECT c.id, c.product_id, c.quantity, p.product_name, p.image_url, p.price
        FROM cart c
        INNER JOIN catalog p ON c.product_id = p.id
        WHERE c.user_id = $user_id AND status = 'unpaid'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>

                <article class="cart__card">
                <div class="cart__box">
                        <img src="<?php echo $row["image_url"] ?>" alt="" class="cart__img">
                    </div>

                    <div class="cart__details">
                        <h3 class="cart__title"><?php echo $row["product_name"] ?></h3>
                        <span class="cart__price"><?php echo $row["price"] ?></span>

                        <div class="cart__amount">
                            <div class="cart__amount-content">
                                <span class="cart__amount-box">
                                <a href="minus-cart.php?product_id=<?php echo $row["product_id"] ?>"><i class='bx bx-minus' ></i></a>
                                </span>

                                <span class="cart__amount-number"><?php echo $row["quantity"] ?></span>

                                <span class="cart__amount-box">
                                    <a href="plus-cart.php?product_id=<?php echo $row["product_id"] ?>"><i class='bx bx-plus' ></i></a> 
                                </span>
                            </div>

                            <a href="delete-cart.php?cart_id=<?php echo $row["id"] ?>"><i class='bx bx-trash-alt cart__amount-trash' ></i></a> 
                        </div>
                    </div>
                </article>

            <?php }
            // Display the checkout button only if there are rows in the cart
            ?>
            <div class="cart__prices">
                <span class="cart__prices-item"></span>
                <span class="cart__prices-total"><a href="checkout.php" class="button button--gray button--small">Checkout</a></span>
            </div>
        <?php } else {
            echo '<p style="text-align: center;">Your cart is empty.<br>Start shopping now!</p>';
        } ?>

    </div>
</div>
