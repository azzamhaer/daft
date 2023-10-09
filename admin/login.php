<?php session_start(); /* Starts the session */
	
	/* Check Login form submitted */	
	if(isset($_POST['Submit'])){
		/* Define username and associated password array */
		$logins = array('admin' => 'admin','azzam' => 'azzam');
		
		/* Check and assign submitted Username and Password to new variable */
		$Username = isset($_POST['Username']) ? $_POST['Username'] : '';
		$Password = isset($_POST['Password']) ? $_POST['Password'] : '';
		
		/* Check Username and Password existence in defined array */		
		if (isset($logins[$Username]) && $logins[$Username] == $Password){
			/* Success: Set session variables and redirect to Protected page  */
			$_SESSION['UserData']['Username']=$logins[$Username];
			header("location:index.php");
			exit;
		} else {
			/*Unsuccessful attempt: Set error message */
			$msg="<span style='color:red'>Invalid username or password!</span>";
		}
	}
?>
<!DOCTYPE html>
<!-- Page protected by super secure login script. -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DAFT Store | Admin</title>
    <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="form-wrapper">
        <h2>Sign In</h2>

        <form action="login.php" method="post">
            <div class="form-control">
                <input type="text" name="Username" autocomplete="off" required>
                <label>Username</label>
            </div>
            <div class="form-control">
                <input type="password" name="Password" autocomplete="off" required>
                <label>Password</label>
            </div>
    <?php if(isset($msg)){?>
    <tr>
      <td colspan="2" align="center" valign="top"><?php echo $msg;?></td>
    </tr>
    <?php } ?>
            <button type="submit" name="Submit">Sign In</button>
            <div class="form-help"> 
                <div class="remember-me">
                    <input type="checkbox" id="remember-me">
                    <label for="remember-me">Remember me</label>
                </div>
                <a href="https://t.me/azzamhaer">Need help?</a>
            </div>
        </form>
        <small>
            This page is protected by Google reCAPTCHA to ensure you're not a robot. 
            <a href="https://support.google.com/recaptcha/answer/6080904?hl=en" target="_blank">Learn more.</a>
        </small>
    </div>
</body>
</html>