<?php
    include_once '../Model/Paiement.php';
    include_once '../Controller/PaiementC.php';

    $error = "";
    // create paiement
    $paiement = null;

    // create an instance of the controller
    $paiementC = new PaiementC();
    if (isset($_POST["Montant"]) &&		
        isset($_POST["Email"]) &&	
        isset($_POST["TypePaiement"]) 	
    ) {
        if (!empty($_POST['Montant']) &&
            !empty($_POST["Email"])&& 
            !empty($_POST["TypePaiement"])	
        ) {
            $paiement = new Paiement(
                $_POST['IdPaiement'],
	         			$_POST['Montant'],
                $_POST['Email'],
                $_POST['TypePaiement']
            );
            $paiementC->ajouterPaiement($paiement);


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

  <title>Faire une réservation</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i
" rel="stylesheet">
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

      <h1 class="logo me-auto me-lg-0"><a href="index.html">Paiement<span>.</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
  
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <a href="formpaypal.html" class="POST">Utilisez PayPal</a>
      
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
        <h2 class="tm-block-title">Paiement</h2>
        <p class="text-white">Paiement</p>
      
      </div>
    </div>
  </div>
  <!-- row -->
  <form class="tm-signup-form row" method="POST" action="">
  <div class="container mt-5">
    <div class="row tm-content-row">
      <div class="col-12 tm-block-col">
        <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
        <h2 class="tm-block-title"></h2>
          <div class="form-group col-lg-6">
            <label for="Montant">Montant</label>
            <input
              
              name="Montant"
              type="number"
              class="form-control validate"
            />
          </div>
          <div class="form-group col-lg-6">
            <label for="Email">Email</label>
            <input
              
              name="Email"
              type="email"
              class="form-control validate"
            />
          </div>
          <div class="form-group col-lg-6">
            <label for="TypePaiement">TypePaiement</label>
            <input
              name="TypePaiement"
              type="text"
              class="form-control validate"
            />
          </div>
          <div class="form-group col-lg-6">
            <button href="" class="btn btn-primary btn-block text-uppercase"  type="submit"> CONFIRMER</button>
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