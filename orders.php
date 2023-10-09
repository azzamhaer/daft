<?php
// Include your database connection code here
require_once ('db.php');

// Start the session (if not already started)
session_start();

// Check if the user is logged in and retrieve their user ID
if (!isset($_SESSION['id'])) {
    // Redirect to the login page or perform appropriate actions
    header("Location: login.php");
    exit();
}

// Get the user ID of the logged-in user
$user_id = $_SESSION['id'];

// Query to retrieve cart items for the logged-in user
$sql = "SELECT id, user_id, product_id, status FROM cart WHERE user_id = $user_id AND status IN ('Waiting', 'Pending')";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="assets/css/settings.css">
     <link rel="stylesheet" href="assets/css/orders.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
    <title>DAFT Store | Orders</title>
</head>
<body><br><br><br>
    <header class="text-center text-white">
    <h1 class="display-4">Your Orders</h1>
    <p class="lead mb-0"> <a href="https://datatables.net/examples/styling/bootstrap4.html" class="text-white font-italic">
        <u></u></a></p>
    <p class="font-italic">
      <a href="https://bootstrapious.com" class="text-white">
      </a>
    </p>
  </header>
  <div class="row py-5">
    <div class="col-lg-10 mx-auto">
      <div class="card rounded shadow border-0">
        <div class="card-body p-5 bg-white rounded">
          <div class="table-responsive">
            <table id="example" style="width:100%" class="table table-striped table-bordered">
                <tr>
                  <th >ID</th>
                  <th>Packaging Number</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
<tr>
<td><?php echo $row['id'] ?></td>
<td><?php echo $row['product_id'] ?></td>
<td><?php echo $row['status'] ?></td>
<td><a href="payment.php?id=<?php echo $row['id'] ?>" id="satu">Pay now</a></td>
                <?php
            }
        } else {
            echo "<tr><td colspan='3'>No order yet</td></tr>";
        }
        ?>
            </table> 
            <a href="index.php" class="tombol">← BACK</a>
          </div>
          <script src="assets/js/basket.js"></script>
          <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
          <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
          <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
          <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
