<?php session_start(); /* Starts the session */

if(!isset($_SESSION['UserData']['Username'])){
	header("location:login.php");
	exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add User</title>
</head>
<body>
    <h1>Add User</h1>
    <form action="add-user-process.php" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password" required><br>
        
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>
        
        <label for="address">Address:</label>
        <textarea name="address" rows="4"></textarea><br>
        
        <input type="submit" value="Add User">
    </form>
</body>
</html>
