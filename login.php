<?php
session_start();

// Check if the user is already logged in
if (isset($_SESSION['username'])) {
   // Redirect the user to their dashboard or another appropriate page
   header('Location: index.php');
   exit();
}

include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validate user credentials
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            // Successful login
            $_SESSION["username"] = $username;
            $_SESSION["id"] = $row['id'];
            header("Location: index.php"); // Redirect to a dashboard page
            exit();
        }
    }

    // Invalid credentials, redirect back to login page with an error message
    header("Location: login.php?login_error=1");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>DAFT Store | Auth</title>
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/login.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>



      <div class="wrapper">
         <div class="title-text">
            <div class="title login">
               Login
            </div>
            <div class="title signup">
               Signup
            </div>
         </div>
         <div class="form-container">
            <div class="slide-controls">
               <input type="radio" name="slide" id="login" checked>
               <input type="radio" name="slide" id="signup">
               <label for="login" class="slide login">Login</label>
               <label for="signup" class="slide signup">Signup</label>
               <div class="slider-tab"></div>
            </div>
                <!-- Error Messages (if any) -->
    <?php
    if (isset($_GET["login_error"])) {
        echo "<p style='color: red;'>Invalid username or password.</p>";
    }
    if (isset($_GET["signup_error"])) {
        echo "<p style='color: red;'>Signup failed. Please try again.</p>";
    }
    if (isset($_GET["signup_success"])) {
        echo "<p style='color: green;'>Signup successful. You can now log in.</p>";
    }
    ?>
            <div class="form-inner">
                
               <form action="login.php" method="post" class="login">
                  <div class="field">
                     <input type="text" placeholder="Username" name="username" required>
                  </div>
                  <div class="field">
                     <input type="password" placeholder="Password" name="password" required>
                  </div>
                  <div class="pass-link">
                     <a href="#">Forgot password?</a>
                  </div>
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input type="submit" value="Login">
                  </div>
                  <br>
                  <div>
                    <a href="index.php">← Back to home</a>
                  </div>
               </form>
               <form action="signup.php" method="post" class="signup">
                  <div class="field">
                     <input type="text" placeholder="Username" name="signup_username" required>
                  </div>
                  <div class="field">
                     <input type="password" placeholder="Password" name="signup_password" required>
                  </div>
                  <div class="field">
                     <input type="text" placeholder="Home Address" name="address" required>
                  </div>
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input type="submit" value="Signup">
                  </div>
                  <br>
                  <div>
                    <a href="index.php">← Back to home</a>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <script>
         const loginText = document.querySelector(".title-text .login");
         const loginForm = document.querySelector("form.login");
         const loginBtn = document.querySelector("label.login");
         const signupBtn = document.querySelector("label.signup");
         const signupLink = document.querySelector("form .signup-link a");
         signupBtn.onclick = (()=>{
           loginForm.style.marginLeft = "-50%";
           loginText.style.marginLeft = "-50%";
         });
         loginBtn.onclick = (()=>{
           loginForm.style.marginLeft = "0%";
           loginText.style.marginLeft = "0%";
         });
         signupLink.onclick = (()=>{
           signupBtn.click();
           return false;
         });
      </script>



</body>
</html>
