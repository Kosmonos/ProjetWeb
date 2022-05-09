<?php
	include '../Controller/PaiementC.php';
	$paiementC=new PaiementC();
	$paiementC->supprimerpaiement($_GET["IdPaiement"]);
	header('Location:afficherListePaiements.php');
?>