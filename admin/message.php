<?php session_start(); /* Starts the session */

if(!isset($_SESSION['UserData']['Username'])){
	header("location:login.php");
	exit;
}
?>

<?php
require_once '../db.php';

// Query to get the total number of users
$userQuery = "SELECT COUNT(*) AS total_users FROM users";
$userResult = $conn->query($userQuery);
if ($userResult) {
    $userRow = $userResult->fetch_assoc();
    $totalUsers = $userRow['total_users'];
} else {
    $totalUsers = 0;
}

// Query to get the total number of items in the catalog
$catalogQuery = "SELECT COUNT(*) AS total_items FROM catalog";
$catalogResult = $conn->query($catalogQuery);
if ($catalogResult) {
    $catalogRow = $catalogResult->fetch_assoc();
    $totalCatalogItems = $catalogRow['total_items'];
} else {
    $totalCatalogItems = 0;
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>DAFT | Message</title>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://s3-us-west-2.amazonaws.com/s.cdpn.io/172203/font-awesome.min.css'><link rel="stylesheet" href="./style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">
</head>

<body>

<!-- NAVBAR -->
<?php require_once 'header.php'; ?>

      <!-- Page Content -->
      <div id="page-content-wrapper">
         <div class="container-fluid xyz">
            <div class="row">
               <div class="col-lg-12">
<h1>Message</h1>
<br><hr><br>
<h2>Total Users: <?php echo $totalUsers; ?></h2>
<h2>Total Products: <?php echo $totalCatalogItems; ?></h2>
               </div>
            </div>
         </div>
      </div>
      <!-- /#page-content-wrapper -->
   </div>
   <!-- /#wrapper -->
   <!-- jQuery -->

</body>

</html>
<!-- partial -->
  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script><script  src="./script.js"></script>

</body>
</html>
