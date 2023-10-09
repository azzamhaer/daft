<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--=============== FAVICON ===============-->
        <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

        <!--=============== BOXICONS ===============-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        

        <!--=============== SWIPER CSS ===============--> 
        <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">

        <!--=============== CSS ===============-->
        <link rel="stylesheet" href="assets/css/index.css">
        <link rel="stylesheet" href="assets/css/marquee.css">
        <link rel="stylesheet" href="assets/css/gsap.css">

        <title>DAFT Store | Homepage</title>
    </head>
    <body>

    <?php include_once 'header.php'; ?>

    <?php
if (isset($_SESSION['username'])) {
    include_once('cart.php');
} ?>

        

        <!--==================== MAIN ====================-->
            <!--==================== HOME ====================-->
            <div class="home" id="home">
                <div class="home__container container grid">
                    <div class="home__img-bg">
                        <img src="assets/img/hero-1.png" alt="" class="home__img">
                    </div>
    
                    <div class="home__social">
                        <a href="https://www.facebook.com/" target="_blank" class="home__social-link">
                            Facebook
                        </a>
                        <a href="https://twitter.com/" target="_blank" class="home__social-link">
                            Twitter
                        </a>
                        <a href="https://www.instagram.com/" target="_blank" class="home__social-link">
                            Instagram
                        </a>
                    </div>
    
                    <div class="home__data">
                        <h1 class="home__title move-text parallax-two" id="home-txt">THE SHOES STORE <br> THAT SELLING SIMPLICITY.</h1>
                        <p class="home__description">
                        Welcome to the DAFT Thrift Store. A very user-friendly online shoe store. easy to buy. fast to enjoy.
                        </p>
                        <span class="home__price">/////////////////////////////</span>

                        <div class="home__btns">

                            <br>
                            <button onclick="location.href='about.php';" class="button home__button">Discover More →</button>
                        </div>
                    </div>
                </div>
            </div>
<br>
            <!--==================== MARQUEE ====================-->
            <div class="marquee1"><div class="marquee-content msmall scroll">
                    <div class="text-block strokeme">
                        <span class="bold">10% Discount</span> on Prepaid Orders.
                    </div>
                </div>
                <div class="marquee-content msmall scroll">
                    <div class="text-block strokeme">
                        <span class="bold">10% Discount</span>  on Prepaid Orders.
                    </div>
                </div>
                <div class="marquee-content msmall scroll">
                    <div class="text-block strokeme">
                        <span class="bold">10% Discount</span>  on Prepaid Orders.
                    </div>
                </div>
                <div class="marquee-content msmall scroll">
                    <div class="text-block strokeme">
                        <span class="bold">10% Discount</span>  on Prepaid Orders.
                    </div>
                </div>
            </div>

            <!--==================== ANIMATION ====================-->
            <div class="container-slide">
                <div class="wrapper section">
                    <section class="intro">
                        <div class="line"></div>
                    </section>

                    <section class="story About">
                        <div class="block"></div>
                        <img src="assets/img/hero-4.png" alt=""><span class="huge-text">About</span>
                        <div class="caption">
                             Explore our curated selection of shoes, ranging from classic pumps and sneakers to funky boots and stylish sandals.    
                        </div>
                        <div class="quote">
                            Give you a branded shoes with Affordable price
                        </div>
                    </section>
                    
                    <section class="story Testimony ">
                        <div class="block"></div>
                        <img src="assets/img/hero-8.png" width="200px" alt=""><span class="huge-text">Story</span>
                        <div class="caption">
                            Our store was established on October 1, 2023. It goes on like time never stops. Continue to provide products with Incomparable Quality, Affordable, Fast Delivery, Fast Respone, And branded Products  
                        </div>

                        <div class="quote">
                            Get your favorite shoes right now!
                        </div>
                    </section>
                </div>

                <br><br><br><br><br><br><br><br><br><br><br><br>

            <!--==================== STORY ====================-->
            <div class="story section container">
                <div class="story__container grid">
                    <div class="story__data">
                        <h2 class="section__title story__section-title">
                            Hi there.
                        </h2>
    
                        <h1 class="story__title">
                        INTERESTED IN <br> OUR PRODUCTS?
                        </h1>
    
                        <p class="story__description">
                        Please choose the type and design of shoes according to your needs and tastes, here, only at DAFT Store!
                        </p>
    
                        <button onclick="location.href='catalog.php';" class="button home__button">See Catalog Now! →</button>
                    </div>

                    <div class="story__images">
                        <img src="assets/img/hero-2.png" alt="" class="story__img">
                    </div>
                </div>
            </div>
                
                       
            

        </main>
        <br><br>
        
<?php include_once 'footer.php'; ?>

        <!--=============== SCROLL UP ===============-->
        <a href="#" class="scrollup" id="scroll-up"> 
            <i class='bx bx-up-arrow-alt scrollup__icon' ></i>
        </a>

        <!--=============== SWIPER JS ===============-->
        <script src="assets/js/swiper-bundle.min.js"></script>

        <!--=============== MAIN JS ===============-->
        <script src="assets/js/main.js"></script>
        <script src="assets/js/gsap.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
        <script src="https://unpkg.com/split-type"></script>



        <script>
            document.addEventListener('DOMContentLoaded', () => {

            const sections = gsap.utils.toArray('section');

            let scrollTween = gsap.to(sections, {
                xPercent: -100 * (sections.length - 1),
                ease: 'none',
                scrollTrigger: {
                    trigger: '.wrapper',
                    pin: true,
                    scrub: 0.5,
                    snap: 1 / (sections.length - 1),
                    start: 'top top',
                    end: 3000,
                }
            })

            gsap.to('.logo', {
                fontSize: '2.5rem',
                top: '4rem',
                scrollTrigger: {
                    trigger: '.logo',
                    start: 'top top',
                    end: 1500,
                    scrub: 0.5,
                }
            })

            gsap.to('.line', {
                height: '10rem',
                scrollTrigger: {
                    trigger: '.line',
                    scrub: 0.5,
                    start: 'center center',
                    end: 2000,
                }
            })

            document.querySelectorAll('.story').forEach(el => {

                gsap.to(el.querySelector('.caption'), {
                    x: 0,
                    y: 0,
                    scrollTrigger: {
                        containerAnimation: scrollTween,
                        trigger: el.querySelector('.caption'),
                        start: 'top bottom',
                        end: '+=1000',
                        scrub: 0.5,
                    }
                })

                gsap.to(el.querySelector('.quote'), {
                    y: 0,
                    ease: 'none',
                    scrollTrigger: {
                        containerAnimation: scrollTween,
                        trigger: el.querySelector('.quote'),
                        start: 'top bottom',
                        end: '+=20%',
                        scrub: 0.5,
                    }
                })

                gsap.to(el.querySelector('.nickname'), {
                    y: 0,
                    ease: 'none',
                    scrollTrigger: {
                        containerAnimation: scrollTween,
                        trigger: el.querySelector('.nickname'),
                        start: 'top bottom',
                        end: '+=10%',
                        scrub: 0.5,
                    }
                })

                gsap.to(el.querySelector('.block'), {
                    x: 0,
                    ease: 'none',
                    scrollTrigger: {
                        containerAnimation: scrollTween,
                        trigger: el.querySelector('.block'),
                        start: 'top bottom',
                        end: '+=' + window.innerWidth,
                        scrub: 0.5,
                    }
                })

                gsap.to(el.querySelector('img'), {
                    y: 0,
                    ease: 'none',
                    scrollTrigger: {
                        containerAnimation: scrollTween,
                        trigger: el.querySelector('img'),
                        start: 'top bottom',
                        end: '+=50%',
                        scrub: 0.5,
                    }
                })

                gsap.to(el.querySelector('.huge-text'), {
                    y: 0,
                    ease: 'none',
                    scrollTrigger: {
                        containerAnimation: scrollTween,
                        trigger: el.querySelector('.huge-text'),
                        start: 'top bottom',
                        end: '+=100%',
                        scrub: 0.5,
                    }
                })

            })

            })

                // const homeTxt = new SplitType('#home-txt')

            gsap.to(".char", {
                y: 0,
                stagger: 0.05,
                delay: 0.2,
                duration: 0.1
            })
        </script>
    </body>
</html>