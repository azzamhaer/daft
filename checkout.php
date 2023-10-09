<?php
// Start or resume the session
session_start();

require_once 'db.php';

// Check if the user is logged in or has a valid user_id in the session
if (!isset($_SESSION['username'])) {
    // Redirect to the login page or handle unauthorized access
    header("Location: login.php"); // Replace login.php with your login page URL
    exit();
}

// Retrieve user_id from the session
$user_id = $_SESSION['id'];

// SQL query to retrieve cart data and product details
$sql = "SELECT c.product_id, c.quantity, p.product_name, p.image_url, p.price
        FROM cart c
        JOIN catalog p ON c.product_id = p.id
        WHERE c.user_id = $user_id AND status = 'unpaid'";

$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error);
}

?> 

<!doctype html>
<html>
<head>
<meta charset='utf-8'>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
<title>DAFT Store | Checkout</title>
<link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
<link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<style>
::-webkit-scrollbar {
width: 8px;
}
/* Track */
::-webkit-scrollbar-track {
background: #f1f1f1; 
}
/* Handle */
::-webkit-scrollbar-thumb {
background: #888; 
}
/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
background: #555; 
} body{
    background: #ffb556;
    min-height: 100vh;
    vertical-align: middle;
    display: flex;
    font-family: sans-serif;
    font-size: 0.8rem;
    font-weight: bold;
}
.title{
    margin-bottom: 5vh;
}
.card{
    margin: auto;
    max-width: 950px;
    width: 90%;
    box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    border-radius: 1rem;
    border: transparent;
}
@media(max-width:767px){
    .card{
        margin: 3vh auto;
    }
}
.cart{
    background-color: #fff;
    padding: 4vh 5vh;
    border-bottom-left-radius: 1rem;
    border-top-left-radius: 1rem;
}
@media(max-width:767px){
    .cart{
        padding: 4vh;
        border-bottom-left-radius: unset;
        border-top-right-radius: 1rem;
    }
}
.summary{
    background-color: #ddd;
    border-top-right-radius: 1rem;
    border-bottom-right-radius: 1rem;
    padding: 4vh;
    color: rgb(65, 65, 65);
}
@media(max-width:767px){
    .summary{
    border-top-right-radius: unset;
    border-bottom-left-radius: 1rem;
    }
}
.summary .col-2{
    padding: 0;
}
.summary .col-10
{
    padding: 0;
}.row{
    margin: 0;
}
.title b{
    font-size: 1.5rem;
}
.main{
    margin: 0;
    padding: 2vh 0;
    width: 100%;
}
.col-2, .col{
    padding: 0 1vh;
}
a{
    padding: 0 1vh;
}
.close{
    margin-left: auto;
    font-size: 0.7rem;
}
img{
    width: 3.5rem;
}
.back-to-shop{
    margin-top: 4.5rem;
}
h5{
    margin-top: 4vh;
}
hr{
    margin-top: 1.25rem;
}
form{
    padding: 2vh 0;
}
select{
    border: 1px solid rgba(0, 0, 0, 0.137);
    padding: 1.5vh 1vh;
    margin-bottom: 4vh;
    outline: none;
    width: 100%;
    background-color: rgb(247, 247, 247);
}
input{
    border: 1px solid rgba(0, 0, 0, 0.137);
    padding: 1vh;
    margin-bottom: 4vh;
    outline: none;
    width: 100%;
    background-color: rgb(247, 247, 247);
}
input:focus::-webkit-input-placeholder
{
      color:transparent;
}
.btn{
    background-color: #ff9019;
    border-color: #ffa94d;
    color: white;
    width: 100%;
    font-size: 0.7rem;
    margin-top: 4vh;
    padding: 1vh;
    border-radius: 25px;
}
.btn:focus{
    box-shadow: none;
    outline: none;
    box-shadow: none;
    color: white;
    -webkit-box-shadow: none;
    -webkit-user-select: none;
    transition: none; 
}
.btn:hover{
    color: white;
}
a{
    color: black; 
}
a:hover{
    color: black;
    text-decoration: none;
}
 #code{
    background-image: linear-gradient(to left, rgba(255, 255, 255, 0.253) , rgba(255, 255, 255, 0.185)), url("https://img.icons8.com/small/16/000000/long-arrow-right.png");
    background-repeat: no-repeat;
    background-position-x: 95%;
    background-position-y: center;
}
</style>
                                </head>
                                <body className='snippet-body'>
                                <div class="card">
            <div class="row">
                <div class="col-md-8 cart">
                    <div class="title">
                        <div class="row">
                            <div class="col"><h4><b>Shopping Cart</b></h4></div>
                            <div class="col align-self-center text-right text-muted">Showing all carts</div>
                        </div>
                    </div>  


        <?php
        $total = 0;
        while ($row = $result->fetch_assoc()) {
            $subtotal = $row['price'] * $row['quantity'];
            $total += $subtotal;
        ?>
                    <div class="row border-top border-bottom">
                        <div class="row main align-items-center">
                            <div class="col-2"><img class="img-fluid" src="<?php echo $row['image_url']; ?>"></div>
                            <div class="col">
                                <div class="row text-muted">Shoes</div>
                                <div class="row"><?php echo $row['product_name']; ?></div>
                            </div>
                            <div class="col">
                                <?php echo $row['quantity']; ?>
                            </div>
                            <div class="col">$<?php echo $subtotal; ?> </div>
                        </div>
                    </div>

                    <?php
        }
        ?>

                    <div class="back-to-shop"><a href="catalog.php">&leftarrow; <span class="text-muted">Back to shop</span></a></div>
                </div>
                <div class="col-md-4 summary">
                    <div><h5><b>Summary</b></h5></div>
                    <hr>

                    <form>
                        <p>SHIPPING</p>
                        <select><option class="text-muted" disabled selected>Free shipping cost</option></select>
                        <p>COUPON CODE</p>
                        <input id="code" placeholder="Enter your code">
                    </form>
                    <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                        <div class="col">TOTAL PRICE</div>
                        <div class="col text-right">$<?php echo $total; ?></div>
                    </div>
                    <button class="btn"><a href="pay.php"><i class='bx bxs-lock-alt'></i> CONTINUE TO CHECKOUT</a></button>
                </div>
            </div>
            
        </div>
                                <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
                                <script type='text/javascript' src='#'></script>
                                <script type='text/javascript' src='#'></script>
                                <script type='text/javascript' src='#'></script>
                                <script type='text/javascript'>#</script>
                                <script type='text/javascript'>var myLink = document.querySelector('a[href="#"]');
                                myLink.addEventListener('click', function(e) {
                                  e.preventDefault();
                                });</script>
                            
                                </body>
                            </html>

                            <?php
// Close the database connection
$conn->close();
?>