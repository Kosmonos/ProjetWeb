<?php
	include '../config.php';
	include_once '../Model/Paiement.php';
	class PaiementC {
		function afficherpaiements(){
			$sql="SELECT * FROM paiement";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimerpaiement($IdPaiement){
			$sql="DELETE FROM paiement WHERE IdPaiement=:IdPaiement";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':IdPaiement', $IdPaiement);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function ajouterpaiement($paiement){
			$sql="INSERT INTO paiement (IdPaiement, Montant, Email, TypePaiement) 
			VALUES (:IdPaiement,:Montant,:Email,:TypePaiement)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'IdPaiement' => $paiement->getIdPaiement(),
					'Montant' => $paiement->getMontant(),
					'Email' => $paiement->getEmail(),
					'TypePaiement' => $paiement->getTypePaiement()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recupererpaiement($IdPaiement){
			$sql="SELECT * from paiement where IdPaiement=$IdPaiement";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$paiement=$query->fetch();
				return $paiement;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifierpaiement($paiement, $IdPaiement){
			try {
				$db = config::getConnexion();	
             	$sql = "UPDATE paiement 
				SET 
				IdPaiement=:IdPaiement,
				Montant=:Montant, 
				Email=:Email, 
				TypePaiement=:TypePaiement 
			WHERE IdPaiement =:paiementID ";
                 $query = $db->prepare($sql);
	             $query->bindValue(':IdPaiement', $paiement->getIdPaiement());
		         $query->bindValue(':Montant', $paiement->getMontant());
		         $query->bindValue(':Email', $paiement->getEmail());
		         $query->bindValue(':TypePaiement', $paiement->getTypePaiement());
		         $query->bindValue(':paiementID', $IdPaiement);
                 $query->execute();	
			} catch (PDOException $e) {
				
				echo ($e->getMessage());
			}
		}
	}
?>
