<?php session_start(); /* Starts the session */

if(!isset($_SESSION['UserData']['Username'])){
	header("location:login.php");
	exit;
}
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>DAFT | Users</title>
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
<h1>Users</h1>
<br><hr><br>
<h4><a href="add-user.php">ADD USER</a></h4>
<br>
<?php
require_once '../db.php';

// Query to retrieve all rows from the "users" table
$userQuery = "SELECT * FROM users";
$userResult = $conn->query($userQuery);

// Check if there are any rows in the result set
if ($userResult->num_rows > 0) {

    while ($row = $userResult->fetch_assoc()) {
?>

<table id="tablex">
<tr>
  <th>ID</th>
  <th>Username</th>
  <th>Email</th>
  <th>Address</th>
  <th>Delete</th>
</tr>
<tr>
  <td><?php echo $row['id'] ?></td>
  <td><?php echo $row['username'] ?></td>
  <td><?php echo $row['email'] ?></td>
  <td><?php echo $row['address'] ?></td>
  <td><a href="delete-user.php?id=<?php echo $row['id'] ?>">DELETE</a></td>
</tr>
</table>

<?php
    }

    echo "</table>";
} else {
    echo "No user found in the database.";
}

// Close the database connection
$conn->close();
?>

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
