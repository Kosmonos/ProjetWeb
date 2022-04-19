<?php
    include_once '../Model/Reservation.php';
    include_once '../Controller/ReservationC.php';
    $error = "";

    // create reservation
    $reservation = null;

    // create an instance of the controller
    $reservationC = new ReservationC();
    if (
        isset($_POST["IdReservation"]) &&
	    isset($_POST["IdUser"]) &&		
        isset($_POST["IdVehicule"]) &&
        isset($_POST["DateReservation"])
    ) {
        if (
            !empty($_POST["IdReservation"]) && 
	      	!empty($_POST['IdUser']) &&
            !empty($_POST["IdVehicule"]) && 
            !empty($_POST["DateReservation"])
        ) {
            $reservation = new Reservation(
                $_POST['IdReservation'],
				$_POST['IdUser'],
                $_POST['IdVehicule'], 
                $_POST['DateReservation']
            );
            $reservationC->ajouterreservation($reservation);
            header('Location:afficherListeReservations.php');
        }
        else
            $error = "Missing information";
    }

    
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Faire une reservation</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
 <!-- Vendor CSS Files -->
 <link href="assets/vendor/aos/aos.css" rel="stylesheet">
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
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="index.html">reservation<span>.</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
  
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="reservation.html" class="get-started-btn scrollto">retour</a>
      
    </div>
</header><!-- End Header -->

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center justify-content-center">
  <div class="container" data-aos="fade-up">

  
</section><!-- End Hero -->
<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>





<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
<div class="container mt-5">
  <div class="row tm-content-row">
    <div class="col-12 tm-block-col">
      <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
        <h2 class="tm-block-title">RESERVATION</h2>
        <p class="text-white">RESERVATION</p>
      
      </div>
    </div>
  </div>
  <!-- row -->
  <div class="container mt-5">
    <div class="row tm-content-row">
      <div class="col-12 tm-block-col">
        <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
        <h2 class="tm-block-title"></h2>
        <form action="" method="POST" class="tm-signup-form row">
          <div class="form-group col-lg-6">
            <label for="IdReservation">Identifiant de la reservation</label>
            <input
              id="IdReservation"
              name="IdReservation"
              type="text"
              class="form-control validate"
            />
          </div>
          <div class="form-group col-lg-6">
            <label for="IdUser">Identifiant du l'utilisateur</label>
            <input
              id="IdUser"
              name="IdUser"
              type="text"
              class="form-control validate"
            />
          </div>
          <div class="form-group col-lg-6">
            <label for="IdVehicule">Identifiant du vehicule</label>
            <input
              id="IdVehicule"
              name="IdVehicule"
              type="text"
              class="form-control validate"
            />
          </div>
        <div class="form-group col-lg-6">
          <label for="DateReservation">date de la reservation</label>
          <input
            id="DateReservation"
            name="DateReservation"
            type="date"
            class="form-control validate"
          />
        </div>
          <div class="form-group col-lg-6">
            <label class="tm-hide-sm">&nbsp;</label>
            <button
              type="submit"
              class="btn btn-primary btn-block text-uppercase"
            >
              confirmer
            </button>
          </div>
          <div class="col-12">
            
          </div>
        </form>
      </div>
    </div>
    </div>
    
  </div>
</div>
</body>
</html>