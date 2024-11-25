<?php 
 if (isset($_POST['submitBtn'])) {
	include("config.php");
session_start();

	if(!isset($_SESSION['login'])){
		header("Location: admin_login.php");
	}

	if(isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION);
		header("Location: admin_login.php");
	}
 }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tilly E-Ticketing </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>
<body>

  <!-- ======= Header ======= -->
  <?php
  include "admin_header.php";
  ?>
  <!-- ======= Hero Section ======= -->
<section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(assets/img/slide/cinema1.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animated fadeInDown">Who are we? </h2>
              <p class="animated fadeInUp">Since our doors first opened in 2021, we've provided many moviegoers with memories of a memorable day out.</p>
              <a href="admin_ticket" class="btn-get-started animated fadeInUp scrollto">Add New Movie</a>
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/cinema2.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animated fadeInDown">Tilly Indulge</h2>
              <p class="animated fadeInUp">Malaysia's top luxury cinema, awaits you, or relax in the wonderful comfort of our Beanieplex venues. Bring your kids for some family-friendly fun, or treat your eyes to the breathtaking clarity of the world's largest cinema LED screen, Samsung ONYX. To top it all off, immerse yourself in the most immersive movie experience on the planet - IMAX®. You have a choice!</p>
              <a href="view" class="btn-get-started animated fadeInUp scrollto">Edit Movie Details</a>
            </div>
          </div>
        </div>


      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>
      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section><!-- End Hero -->

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <?php
include "footer.php";
?>
</body>

</html>