<?php
	include '../config.php';
	include_once '../Model/Reservation.php';
	class ReservationC {
		function afficherListeReservations(){
			$sql="SELECT * FROM reservation";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimerreservation($IdReservation){
			$sql="DELETE FROM reservation WHERE IdReservation=:IdReservation";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':IdReservation', $IdReservation);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function ajouterreservation($reservation){
			$sql="INSERT INTO reservation (IdReservation,IdUser,IdVehicule,DateReservation) 
			VALUES (:IdReservation,:IdUser,:IdVehicule,:DateReservation)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'IdReservation' => $reservation->getIdReservation(),
					'IdUser' => $reservation->getIdUser(),
					'IdVehicule' => $reservation->getIdVehicule(),
					'DateReservation' => $reservation->getDateReservation()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recupererreservation($IdReservation){
			$sql="SELECT * from reservation where IdReservation=$IdReservation";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$reservation=$query->fetch();
				return $reservation;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifierreservation($reservation, $IdReservation){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE reservation SET 
						IdReservation= :IdReservation, 
						IdUser= :IdUser, 
						IdVehicule= :IdVehicule,
						DateReservation= :DateReservation
					WHERE IdReservation= :IdReservation'
				);
				$query->execute([
					'IdReservation' => $reservation,
					'IdUser' => $reservation->getIdUser(),
					'IdVehicule' => $reservation->getIdVehiculer(),
					'DateReservation' => $reservation->getDateReservation(),
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
?>