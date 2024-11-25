<?php
if (isset($_POST['submitBtn'])) {
	include("config.php");
	$sql = "INSERT INTO feedback (name,movie,feedback)
	VALUES ('$_POST[name]','$_POST[movie]','$_POST[feedback]')";
	if (!mysqli_query($con,$sql)){
		die('Error: ' . mysqli_error($con));
	}
	else {
		echo '<script>alert("Successfully submit your feedback!");
		window.location.href= "contact.php";
		</script>';
	}

	mysqli_close($con);
 }

?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Contact Us</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 

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
  include "header.php";
  ?>
<!-- End Header -->

  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container-fluid">

    <div class="row justify-content-center">
          <div class="col-xl-10">
            <ol>
              <li><a href="admin_homepage.php">Home</a></li>
              <li>Contact Us</li>
            </ol>
            <h2>Contact Us</h2>
          </div>
        </div>

      </div>
</section><!-- End Breadcrumbs -->
    <section class="inner-page">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-10">
<div class="container">
          <div class = "contact-box">
                <div class = "contact-left">
                    <h1>Connect With Us</h1>  
                    <p>If you wish to know more about us or like to contact us, do always feel free to get in touch with us !</p>
                    <p2>We do also have an Facebook and Instagram account so do follow us on Facebook and Instagram @ Tiny Paw Pets</p2>
                    </br>
                    </br>
                    </br>

                   <h3>Send your feedback here </h3>
                   <form action="contact.php" method="post" class="my-login-validation" novalidate="">
                   </br>
                   </br>

                        <div class = "input-row">
                            <div class = "input-group">
                                <label for="name"> Name   </label>

                                <input class="text " type="text" name="name" placeholder="name" id="name"required>
                            
                            </div>
                        </div>
                        </br>
                        <div class = "input-row">
                        <div class = "input-group">
                                <label for="movie"> Movie  </label>
                                <input class="text " type="text" name="movie" placeholder="movie" id="movie"required>
                            
                            </div>
                        </div>
                        </br>
                        <div class = "input-row">
                             <div class = "input-group">
                                <label for="feedback"> Feedback </label>
                                <input class="text " type="text" name="feedback" placeholder="feedback" id="feedback"required>
                                </br>
                            </div>
                        </div>
                        </br>
                        </br>

                        <input class="btn btn-primary" type="submit" id="submitBtn"></input>
                   </form>
                </div>
                <div class = "contact-right">
             
                </div>
          </div>
        </div>

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