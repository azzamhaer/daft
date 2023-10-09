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
        <link rel="stylesheet" href="assets/css/about.css">

        <!--=============== AOS ===============-->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

        

        <title>DAFT Store | About Us</title>
    </head>
    <body>

    <?php include_once 'header.php'; ?>

    <?php
if (isset($_SESSION['username'])) {
    include_once('cart.php');
} ?>

    <div class="intro">
        <h1 class="intro-txt">About the DAFT Store</h1>
            <video class="" preload="true">
                <source src="https://jagocyber.com/video-for-daft/about.mp4" type="video/mp4" />
            </video> 
    </div>

        <!--==================== MAIN ====================-->
        <main class="main">

                    <!--==================== ABOUT ====================-->
                <section>
                <div class="kotak1">
                        <div class="colom">
                    <div class="atas">
                        <br><br><Br>
                    <h1 style="font-size: var(--biggest-font-size)">About Us</h1><br>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum.In the first place we have granted to God, and by this our present charter confirmed for us and our heirs forever that the English Church shall be free, and shall have her rights entire, and her liberties inviolate; and we will that it be thus observed; which is apparent from</p>
                </div><br>
                <div class="foto">
                    <img src="https://i.ibb.co/FhgPJt8/Rectangle-116.png" alt="A group of People" data-aos="zoom-in" data-aos-duration="1500"/><br>
                </div><br>
                </div><br>
           </div>

            <div class="kotak2">
                <div class="atas">
                    <h1 style="font-size: var(--biggest-font-size)">Our Story</h1><br>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum.In the first place we have granted to God, and by this our present charter confirmed for us and our heirs forever that the English Church shall be free, and shall have her rights entire, and her liberties inviolate; and we will that it be thus observed; which is apparent from</p>
                </div><br>
                <div class="foto">
                    <div class="tess">
                        <div class="feature" data-aos="fade-down-right" data-aos-duration="1500">
                            <img src="https://i.ibb.co/FYTKDG6/Rectangle-118-2.png" alt="Alexa featured foto"/>
                        </div>
                        <div class="feature" data-aos="fade-up-right" data-aos-duration="1500">
                            <img src="https://i.ibb.co/fGmxhVy/Rectangle-119.png" alt="Olivia featured foto"/>
                        </div>
                        <div class="feature" data-aos="fade-up-left" data-aos-duration="1500">
                            <img src="https://i.ibb.co/Pc6XVVC/Rectangle-120.png" alt="Liam featured foto"/>
                        </div>
                        <div class="feature" data-aos="fade-down-left" data-aos-duration="1500">
                            <img src="https://i.ibb.co/7nSJPXQ/Rectangle-121.png" alt="Elijah featured foto"/>
                        </div>
                    </div>
                </div>
            </div>
                </section>


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

        <!--=============== AOS js ===============-->
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

        <!--=============== Scroll Magic ===============-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.8/ScrollMagic.js" integrity="sha512-UgS0SVyy/0fZ0i48Rr7gKpnP+Jio3oC7M4XaKP3BJUB/guN6Zr4BjU0Hsle0ey2HJvPLHE5YQCXTDrx27Lhe7A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.8/plugins/animation.gsap.js" integrity="sha512-judXDFLnOTJsUwd55lhbrX3uSoSQSOZR6vNrsll+4ViUFv+XOIr/xaIK96soMj6s5jVszd7I97a0H+WhgFwTEg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.8/plugins/debug.addIndicators.js" integrity="sha512-mq6TSOBEH8eoYFBvyDQOQf63xgTeAk7ps+MHGLWZ6Byz0BqQzrP+3GIgYL+KvLaWgpL8XgDVbIRYQeLa3Vqu6A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>

        <script src="assets/js/about.js"></script>
<script>
AOS.init();
</script>

    </body>
</html>