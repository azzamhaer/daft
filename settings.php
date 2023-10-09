<?php
session_start();
require_once("db.php");

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$loggedInUser = null;

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $loggedInUser = $result->fetch_assoc();
    }

    $stmt->close();
}

$message = "";
$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update'])) {
        $newEmail = $_POST['new_email'];
        $newAddress = $_POST['new_address'];
        $oldPassword = $_POST['old_password'];
        $newPassword = $_POST['new_password'];
        $confirmPassword = $_POST['confirm_password'];

        if (!empty($oldPassword)) {
            if (password_verify($oldPassword, $loggedInUser['password'])) {
                if (!empty($newEmail)) {
                    // Update email
                    $sql = "UPDATE users SET email = ? WHERE username = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("ss", $newEmail, $username);

                    if ($stmt->execute()) {
                        $loggedInUser['email'] = $newEmail;
                        $message = "Email updated successfully!";
                    } else {
                        $error = "Error updating email: " . $stmt->error;
                    }

                    $stmt->close();
                }

                if (!empty($newAddress)) {
                    // Update address
                    $sql = "UPDATE users SET address = ? WHERE username = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("ss", $newAddress, $username);

                    if ($stmt->execute()) {
                        $loggedInUser['address'] = $newAddress;
                        $message = "Address updated successfully!";
                    } else {
                        $error = "Error updating address: " . $stmt->error;
                    }

                    $stmt->close();
                }

                if (!empty($newPassword)) {
                    if ($newPassword === $confirmPassword) {
                        // Update password
                        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                        $sql = "UPDATE users SET password = ? WHERE username = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("ss", $hashedPassword, $username);

                        if ($stmt->execute()) {
                            $message = "Password updated successfully!";
                        } else {
                            $error = "Error updating password: " . $stmt->error;
                        }

                        $stmt->close();
                    } else {
                        $error = "Passwords do not match!";
                    }
                }
            } else {
                $error = "Incorrect old password!";
            }
        } else {
            $error = "Please enter your old password to make changes.";
        }
    }
}

$conn->close();
?>

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
        <link rel="stylesheet" href="assets/css/settings.css">
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>

        <!--=============== FONT ===============-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">


        <title>DAFT Store | Settings</title>
    </head>
    <body>

    <br><br><Br><br><br><br>
    

    <div class="container">
              <div class="row">
                      <div class="col-lg-4"><br><br><br>
                        <div class="profile-card-4 z-depth-3">
                          <div class="card">
                            <div class="card-body1 text-center rounded-top">
                            <div class="user-box">
                            </div>
                            <h5 class="mb-1 text-white">Profile</h5>
                            <h6 class="text-light">DAFT Account</h6><br>
                          </div>
                            <div class="card-body">
                              <ul class="list-group shadow-none">
                              <li class="list-group-item">
                                <div class="list-icon">
                                  <i class="fa fa-phone-square"></i>
                                </div>
                                <div class="list-details">
                                  <span><?php echo $loggedInUser['username']; ?></span><br>
                                  <small>User Name</small>
                                </div>
                              </li>
                              <li class="list-group-item">
                                <div class="list-icon">
                                  <i class="fa fa-envelope"></i>
                                </div>
                                <div class="list-details">
                                  <span><?php echo $loggedInUser['email']; ?></span><br>
                                  <small>Email Address</small>
                                </div>
                              </li>
                              
                              </ul>
                            </div>
                            <div class="card-footer text-center">
                              <a href="javascript:void()" class="btn-social btn-facebook waves-effect waves-light m-1"><i class="fa fa-facebook"></i></a>
                              <a href="javascript:void()" class="btn-social btn-google-plus waves-effect waves-light m-1"><i class="fa fa-google-plus"></i></a>
                              <a href="javascript:void()" class="list-inline-item btn-social btn-behance waves-effect waves-light"><i class="fa fa-behance"></i></a>
                              <a href="javascript:void()" class="list-inline-item btn-social btn-dribbble waves-effect waves-light"><i class="fa fa-dribbble"></i></a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-8">
                        <div class="card z-depth-3">
                          <div class="card-body">
                          <ul class="nav nav-pills nav-pills-primary nav-justified">
                              <li class="eedit">
                                  <a ><i class="icon-note"></i> <span class="hidden-xs">Edit</span></a>
                              </li>
                          </ul>
                          
                              <div id="edit">
                                  <form action="" method="post">
                                      <div class="form-group row">
                                          <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                          <div class="col-lg-9">
                                              <input class="form-control" type="email" name="new_email" value="<?php echo $loggedInUser['email']; ?>" placeholder="Email"> 
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label class="col-lg-3 col-form-label form-control-label">Address</label>
                                          <div class="col-lg-9">
                                          <textarea name="new_address" class="form-control"><?php echo $loggedInUser['address']; ?></textarea><br>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label class="col-lg-3 col-form-label form-control-label">New Password</label>
                                          <div class="col-lg-9">
                                              <input class="form-control" type="password" placeholder="new password" name="new_password">
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label class="col-lg-3 col-form-label form-control-label">Confirm password</label>
                                          <div class="col-lg-9">
                                              <input class="form-control" type="password" placeholder="confirm password" name="confirm_password">
                                          </div>
                                      </div>
                                      <hr>
                                      <br>
                                      <p>Please enter your password to make any changes</p>
                                      <div class="form-group row">
                                          <label class="col-lg-3 col-form-label form-control-label" for="old_password">Old Password</label>
                                          <div class="col-lg-9">
                                              <input class="form-control" type="password" placeholder="old password" name="old_password" required >
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label class="col-lg-3 col-form-label form-control-label"></label>
                                          <div class="col-lg-9">
                                          <a href="index.php" class="tombol">← BACK</a>
                                              <input class="tombol" id="tombol" type="submit" name="update" value="Update Profile">
                                          </div>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </div>
                    </div>
                    </div>
                  </div>
              </div>
        </main>

        <!--=============== SCROLL UP ===============-->
        <a href="#" class="scrollup" id="scroll-up"> 
            <i class='bx bx-up-arrow-alt scrollup__icon' ></i>
        </a>

        <!--=============== SWIPER JS ===============-->
        <script src="assets/js/swiper-bundle.min.js"></script>

        <!--=============== MAIN JS ===============-->
        <script src="assets/js/main.js"></script>

        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js'></script>
    </body>
</html>