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
        <link rel="stylesheet" href="assets/css/contact.css">

        <title>DAFT Store | Homepage</title>
    </head>
    <body>

    <?php include_once 'header.php'; ?>

    <?php
if (isset($_SESSION['username'])) {
    include_once('cart.php');
} ?>

        

        <!--==================== MAIN ====================-->
        <main class="main">

                    <!--==================== CONTACT ====================-->
                    <div class="background">
  <div class="container">
    <div class="screen">
      <div class="screen-header">
        <div class="screen-header-left">
          <div class="screen-header-button close"></div>
          <div class="screen-header-button maximize"></div>
          <div class="screen-header-button minimize"></div>
        </div>
        <div class="screen-header-right">
          <div class="screen-header-ellipsis"></div>
          <div class="screen-header-ellipsis"></div>
          <div class="screen-header-ellipsis"></div>
        </div>
      </div>
      <div class="screen-body">
        <div class="screen-body-item left">
          <div class="app-title">
            <span>CONTACT</span>
            <span>US</span>
          </div>
          <div class="app-contact">CONTACT INFO : +62 81 314 928 595</div>
        </div>
        <div class="screen-body-item">
          <div class="app-form">
            <div class="app-form-group">
              <input class="app-form-control" placeholder="NAME" >
            </div>
            <div class="app-form-group">
              <input class="app-form-control" placeholder="EMAIL">
            </div>
            <div class="app-form-group">
              <input class="app-form-control" placeholder="CONTACT NO">
            </div>
            <div class="app-form-group message">
              <input class="app-form-control" placeholder="MESSAGE">
            </div>
            <div class="app-form-group buttons">
              <button class="app-form-button">CANCEL</button>
              <button class="app-form-button">SEND</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

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