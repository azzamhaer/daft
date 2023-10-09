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

        <title>DAFT Store | Privacy Policy</title>
    </head>
    <body>

    <?php include_once 'header.php'; ?>

    <?php
if (isset($_SESSION['username'])) {
    include_once('cart.php');
} ?>

        

        <!--==================== MAIN ====================-->
        <main class="main">

                    <!--==================== ABOUT ====================-->
                    <div class="kotak1">
                <div class="colom">
                    <div class="atas">
                        <br><br><Br>
                    <h1 style="font-size: var(--biggest-font-size)">Privacy Policy for DAFT Store</h1><br>

<p>At DAFT Store, accessible from daft.store, one of our main priorities is the privacy of our visitors. This Privacy Policy document contains types of information that is collected and recorded by DAFT Store and how we use it. 
If you have additional questions or require more information about our Privacy Policy, do not hesitate to contact us.</p>

<br>
<h2>Log Files</h2>

<p>DAFT Store follows a standard procedure of using log files. These files log visitors when they visit websites. All hosting companies do this and a part of hosting services' analytics. The information collected by log files include internet protocol (IP) addresses, browser type, Internet Service Provider (ISP), date and time stamp, referring/exit pages, and possibly the number of clicks. These are not linked to any information that is personally identifiable. The purpose of the information is for analyzing trends, administering the site, tracking users' movement on the website, and gathering demographic information. Our Privacy Policy was created with the help of the <a href="https://www.privacypolicyonline.com/privacy-policy-generator/">Privacy Policy Generator</a>.</p>

<br>
<h2>Cookies and Web Beacons</h2>

<p>Like any other website, DAFT Store uses "cookies". These cookies are used to store information including visitors' preferences, and the pages on the website that the visitor accessed or visited. The information is used to optimize the users' experience by customizing our web page content based on visitors' browser type and/or other information.</p>

<br>
<h2>Privacy Policies</h2>

<P>You may consult this list to find the Privacy Policy for each of the advertising partners of DAFT Store.</p>

<p>Third-party ad servers or ad networks uses technologies like cookies, JavaScript, or Web Beacons that are used in their respective advertisements and links that appear on DAFT Store, which are sent directly to users' browser. They automatically receive your IP address when this occurs. These technologies are used to measure the effectiveness of their advertising campaigns and/or to personalize the advertising content that you see on websites that you visit.</p>

<p>Note that DAFT Store has no access to or control over these cookies that are used by third-party advertisers.</p>

<br>
<h2>Third Party Privacy Policies</h2>

<p>DAFT Store's Privacy Policy does not apply to other advertisers or websites. Thus, we are advising you to consult the respective Privacy Policies of these third-party ad servers for more detailed information. It may include their practices and instructions about how to opt-out of certain options. </p>

<p>You can choose to disable cookies through your individual browser options. To know more detailed information about cookie management with specific web browsers, it can be found at the browsers' respective websites. What Are Cookies?</p>

<br>
<h2>Children's Information</h2>

<p>Another part of our priority is adding protection for children while using the internet. We encourage parents and guardians to observe, participate in, and/or monitor and guide their online activity.</p>

<p>DAFT Store does not knowingly collect any Personal Identifiable Information from children under the age of 13. If you think that your child provided this kind of information on our website, we strongly encourage you to contact us immediately and we will do our best efforts to promptly remove such information from our records.</p>

<br>
<h2>Online Privacy Policy Only</h2>

<p>This Privacy Policy applies only to our online activities and is valid for visitors to our website with regards to the information that they shared and/or collect in DAFT Store. This policy is not applicable to any information collected offline or via channels other than this website.</p>

<br>
<h2>Consent</h2>

<p>By using our website, you hereby consent to our Privacy Policy and agree to its Terms and Conditions.</p>
                </div><br>
                </div><br>
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

        <!--=============== AOS js ===============-->
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
AOS.init();
</script>

    </body>
</html>