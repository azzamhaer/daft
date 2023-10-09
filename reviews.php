
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

        <title>DAFT Store | Reviews</title>
    </head>
    <body>

    <?php include_once 'header.php'; ?>

    <?php
if (isset($_SESSION['username'])) {
    include_once('cart.php');
} ?>
    
        

        <!--==================== MAIN ====================-->
        <main class="main">

                                <!--==================== TESTIMONIAL ====================-->
<br>
            <section class="testimonial section container">
            <h1 style="font-size: var(--biggest-font-size)">Our Reviews</h1><br>
                <div class="testimonial__container grid">
                    <div class="swiper testimonial-swiper">
                        <div class="swiper-wrapper">
                            <div class="testimonial__card swiper-slide">
                                <div class="testimonial__quote">
                                    <i class='bx bxs-quote-alt-left' ></i>
                                </div>
                                <p class="testimonial__description">
                                    They are the best Sneakers that one acquires, also they are always with the latest 
                                    news and trends, with a very comfortable price and especially with the attention 
                                    you receive, they are always attentive to your questions.
                                </p>
                                <h3 class="testimonial__date">October 1. 2023</h3>
        
                                <div class="testimonial__perfil">
                                    <img src="assets/img/azzam.png" alt="" class="testimonial__perfil-img">
        
                                    <div class="testimonial__perfil-data">
                                        <span class="testimonial__perfil-name">Azzam H.</span>
                                        <span class="testimonial__perfil-detail">Backend Developer</span>
                                    </div>
                                </div>
                            </div>

                            <div class="testimonial__card swiper-slide">
                                <div class="testimonial__quote">
                                    <i class='bx bxs-quote-alt-left' ></i>
                                </div>
                                <p class="testimonial__description">
                                    They are the best Sneakers that one acquires, also they are always with the latest 
                                    news and trends, with a very comfortable price and especially with the attention 
                                    you receive, they are always attentive to your questions.
                                </p>
                                <h3 class="testimonial__date">October 1. 2023</h3>
        
                                <div class="testimonial__perfil">
                                    <img src="assets/img/fatur.png" alt="" class="testimonial__perfil-img">
        
                                    <div class="testimonial__perfil-data">
                                        <span class="testimonial__perfil-name">Fathur R.</span>
                                        <span class="testimonial__perfil-detail">System Developer</span>
                                    </div>
                                </div>
                            </div>

                            <div class="testimonial__card swiper-slide">
                                <div class="testimonial__quote">
                                    <i class='bx bxs-quote-alt-left' ></i>
                                </div>
                                <p class="testimonial__description">
                                    They are the best Sneakers that one acquires, also they are always with the latest 
                                    news and trends, with a very comfortable price and especially with the attention 
                                    you receive, they are always attentive to your questions.
                                </p>
                                <h3 class="testimonial__date">October 1. 2023</h3>
        
                                <div class="testimonial__perfil">
                                    <img src="assets/img/taqi.png" alt="" class="testimonial__perfil-img">
        
                                    <div class="testimonial__perfil-data">
                                        <span class="testimonial__perfil-name">Qiandra T.</span>
                                        <span class="testimonial__perfil-detail">Animation Developer</span>
                                    </div>
                                </div>
                            </div>

                            <div class="testimonial__card swiper-slide">
                                <div class="testimonial__quote">
                                    <i class='bx bxs-quote-alt-left' ></i>
                                </div>
                                <p class="testimonial__description">
                                    They are the best Sneakers that one acquires, also they are always with the latest 
                                    news and trends, with a very comfortable price and especially with the attention 
                                    you receive, they are always attentive to your questions.
                                </p>
                                <h3 class="testimonial__date">October 1. 2023</h3>
        
                                <div class="testimonial__perfil">
                                    <img src="assets/img/dafa.png" alt="" class="testimonial__perfil-img">
        
                                    <div class="testimonial__perfil-data">
                                        <span class="testimonial__perfil-name">Daffa M.</span>
                                        <span class="testimonial__perfil-detail">Frontend Developer</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="swiper-button-next">
                            <i class='bx bx-right-arrow-alt' ></i>
                        </div>
                        <div class="swiper-button-prev">
                            <i class='bx bx-left-arrow-alt' ></i>
                        </div>
                    </div>

                    <div class="testimonial__images">
                        <div class="testimonial__square"></div>
                        <img src="assets/img/hero-3.png" alt="" class="testimonial__img">
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

<script>
AOS.init();
</script>

    </body>
</html>