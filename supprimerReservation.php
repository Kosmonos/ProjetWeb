<?php
	include '../Controller/ReservationC.php';
	$ReservationC=new ReservationC();
	$ReservationC->supprimerReservation($_GET["IdReservation"]);
	header('Location:afficherListeReservations.php');
?>