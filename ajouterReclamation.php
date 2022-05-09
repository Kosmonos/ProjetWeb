<?php
    include_once '../Model/Reclamation.php';
    include_once '../Controller/ReclamationR.php';

    $error = "";

    // create reclamation
    $reclamation = null;

    // create an instance of the controller
    $reclamationR = new ReclamationR();
    if (
        isset($_POST["numreclamation"]) &&
	     	isset($_POST["nom"]) &&		
        isset($_POST["prenom"]) &&
        isset($_POST["email"]) && 
        isset($_POST["datereclamation"])
    ) {
        if (
            !empty($_POST["numreclamation"]) && 
		      	!empty($_POST['nom']) &&
            !empty($_POST["prenom"]) && 
            !empty($_POST["email"]) && 
            !empty($_POST["datereclamation"])
        ) {
            $reclamation = new Reclamation(
                $_POST['numreclamation'],
	         			$_POST['nom'],
                $_POST['prenom'], 
                $_POST['email'],
                $_POST['datereclamation']
            );
            $reclamationR->ajouterreclamation($reclamation);
            header('Location:afficherListeReclamations.php');
        }
        else
            $error = "Missing information";
    }

    
?>
<!--**<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>
    <body>
        <button><a href="afficherListeAdherents.php">Retour à la liste des adherents</a></button>
        <hr>
        
        <div id="error">
        </div>
        
        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="numadherent">Numéro Adherent:
                        </label>
                    </td>
                    <td><input type="text" name="numadherent" id="numadherent" maxlength="20"></td>
                </tr>
				<tr>
                    <td>
                        <label for="nom">Nom:
                        </label>
                    </td>
                    <td><input type="text" name="nom" id="nom" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="prenom">Prenom:
                        </label>
                    </td>
                    <td><input type="text" name="prenom" id="prenom" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="adresse">Adresse:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="adresse" id="adresse">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="email">Adresse mail:
                        </label>
                    </td>
                    <td>
                        <input type="email" name="email" id="email">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="date">Date d'inscription:
                        </label>
                    </td>
                    <td>
                        <input type="date" name="dateins" id="dateins" >
                    </td>
                </tr>              
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Envoyer"> 
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>**-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Deposer une réclamation</title>
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

      <h1 class="logo me-auto me-lg-0"><a href="index.html">reclamation<span>.</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
  
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <a href="reponse.html" class="get-started-btn scrollto">Vérifier si ma réclamation est traitée</a>
      
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
        <h2 class="tm-block-title">Reclamation</h2>
        <p class="text-white">Reclamation</p>
      
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
        <form class="tm-signup-form row" method="POST" action="">
          <div class="form-group col-lg-6">
            <label for="name">Numero de réclamation</label>
            <input
              name="numreclamation"
              type="int"
              class="form-control validate"
              pattern="[0-9]+"
            />
          </div>
          <div class="form-group col-lg-6">
            <label for="email">email</label>
            <input
              name="email"
              type="email"
              class="form-control validate"
            />
          </div>
          <div class="form-group col-lg-6">
            <label for="prenom">message</label>
            <input
              name="prenom"
              type="varchar"
              class="form-control validate"
              required pattern="[a-zA-Z-\.]{3,12}">
          </div>
          <div class="form-group col-lg-6">
            <label for="nom">Nom</label>
            <input
              name="nom"
              type="varchar"
              class="form-control validate"
              required pattern="[a-zA-Z-\.]{3,12}">
          </div>
          <div class="form-group col-lg-6">
            <label for="date">date</label>
            <input
              name="datereclamation"
              type="date"
              class="form-control validate"
            />
          </div>
          <div class="form-group col-lg-6">
            <button class="btn btn-primary btn-block text-uppercase" onmousedown="bleep.play()" type="submit"> CONFIRMER</button>
            <script>
                         var bleep=new Audio();
                         bleep.src="ab.mp3";
                      </script>
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