<?php
session_start();
require_once 'config.php';
$user = $_SESSION['user'] ?? null;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Spp Online</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">
    <link href="assets/frontend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/frontend/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/frontend/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/frontend/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/frontend/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/frontend/css/variables.css" rel="stylesheet">
    <link href="assets/frontend/css/main.css" rel="stylesheet">
</head>

<body>

<?php include_once 'views/layouts/frontend/header.php'; ?>

<section id="hero-animated" class="hero-animated d-flex align-items-center">
    <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative" data-aos="zoom-out">
        <img src="assets/frontend/img/hero-carousel/hero-carousel-3.svg" class="img-fluid animated">
        <h2>Welcome to <span>SPP Online Apps</span></h2>
        <p>Et voluptate esse accusantium accusamus natus reiciendis quidem voluptates similique aut.</p>
        <div class="d-flex">
            <a href="#about" class="btn-get-started scrollto">Get Started</a>
            <a href="https://www.youtube.com/watch?v=sAuEeM_6zpk" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Tutorial</span></a>
        </div>
    </div>
</section>

<main id="main">

    <?php include_once 'views/layouts/frontend/services-section.php'; ?>

    <?php include_once 'views/layouts/frontend/about.php'; ?>

    <?php include_once 'views/layouts/frontend/client-section.php'; ?>

    <?php include_once 'views/layouts/frontend/cta-section.php'; ?>

    <?php include_once 'views/layouts/frontend/features-section.php'; ?>

    <?php include_once 'views/layouts/frontend/services.php'; ?>

    <?php include_once 'views/layouts/frontend/faq-section.php'; ?>

</main><!-- End #main -->

<?php include_once 'views/layouts/frontend/footer.php'; ?>

<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="assets/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/frontend/vendor/aos/aos.js"></script>
<script src="assets/frontend/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/frontend/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/frontend/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/frontend/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/frontend/js/main.js"></script>

</body>

</html>