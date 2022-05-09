<?php
    include_once '../Model/Paiement.php';
    include_once '../Controller/PaiementC.php';

    $error = "";

    // create paiement
    $reservation = null;

    // create an instance of the controller
    $paiementC = new PaiementC();
    if (
        isset($_POST["IdPaiement"]) &&
		isset($_POST["Montant"]) &&		
        isset($_POST["Email"]) &&
        isset($_POST["TypePaiement"]) 
    ) {
        if (
            !empty($_POST["IdPaiement"]) && 
			!empty($_POST['Montant']) &&
            !empty($_POST["Email"]) && 
            !empty($_POST["TypePaiement"]) 
        ) {
            $paiement = new Paiement(
                $_POST['IdPaiement'],
				$_POST['Montant'],
                $_POST['Email'], 
                $_POST['TypePaiement']
            );
            $paiementC->modifierpaiement($paiement, $_POST["IdPaiement"]);
            header('Location:afficherListePaiements.php');
        }
        else
            $error = "Missing information";
    }    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHMIN - Bootstrap Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com
">
    <link rel="preconnect" href="https://fonts.gstatic.com
" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap
" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css
" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css
" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">


        <!-- Content Start -->
        <div class="content">


            <!-- form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                             <div>
                                <button><a href="afficherListePaiements.php" class="btn btn-primary">Retour à la liste des paiements</a></action>  </button>
                            </div> 
                             <div id="error">
            <?php echo $error; ?>
        </div>
            
        <?php
            if (isset($_GET['IdPaiement'])){
                $paiement = $paiementC->recupererpaiement($_GET['IdPaiement']);
                ?>
               
                            
                           <form action="" method="POST">

                               
                           
                            <div class="mb-3">
                                    <input type="hidden" class="form-control" id="IdPaiement" name="IdPaiement"value="<?php echo $paiement['IdPaiement']; ?>" maxlength="20">
                            </div>

                            <div class="mb-3">
                                    <label for="Montant" class="form-label">Montant:</label>
                                    <input type="number" class="form-control" id="Montant" name="Montant"value="<?php echo $paiement['Montant']; ?>" maxlength="20">
                            </div>

                            <div class="mb-3">
                                    <label for="Email" class="form-label">Email:</label>
                                    <input type="email" class="form-control" id="Email" name="Email" value="<?php echo $paiement['Email']; ?>" > 
                            </div>

                            <div class="mb-3">
                                    <label for="TypePaiement" class="form-label">TypePaiement</label>
                                    <input type="text" class="form-control" id="TypePaiement" name="TypePaiement"value="<?php echo $paiement['TypePaiement']; ?>" > 
                            </div>
                            
                            <div>
                                <button type="submit" class="btn btn-primary">Modifier  </button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
      
            <!-- form End -->

        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js
"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js
"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>
      <?php
        }
        ?>

</html>