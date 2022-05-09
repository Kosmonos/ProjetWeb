<?php
	include '../config.php';
	include_once '../Model/Reclamation.php';
	class ReclamationR {
		function afficherreclamations(){
			$sql="SELECT * FROM reclamation";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}

		public function afficherbyname($namerecherche)
        {
            try {
                $db = config::getConnexion();
    
                $querry = $db->prepare('select * from Reclamation where Nom like "%'.$namerecherche.'%"');
                $querry->execute();
                $result = $querry->fetchAll();
                return $result;
            } catch (PDOException $th) {
                $th->getMessage();
            }
        }

		function supprimerreclamation($numreclamation){
			$sql="DELETE FROM reclamation WHERE numreclamation=:numreclamation";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':numreclamation', $numreclamation);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function ajouterreclamation($reclamation){
			$sql="INSERT INTO reclamation (numreclamation, Nom, Prenom, Email, datereclamation) 
			VALUES (:numreclamation,:Nom,:Prenom, :Email, :datereclamation)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'numreclamation' => $reclamation->getnumreclamation(),
					'Nom' => $reclamation->getNom(),
					'Prenom' => $reclamation->getPrenom(),
					'Email' => $reclamation->getEmail(),
					'datereclamation' => $reclamation->getdatereclamation()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recupererreclamation($numreclamation){
			$sql="SELECT * from reclamation where numreclamation=$numreclamation";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$reclamation=$query->fetch();
				return $reclamation;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		
		function modifierreclamation($reclamation, $numreclamation){
			try {
				$db = config::getConnexion();

				$sql = "UPDATE reclamation 
				SET 
				numreclamation= $reclamation->numreclamation,
				Nom= '$reclamation->nom', 
				Prenom='$reclamation->prenom', 
				Email= '$reclamation->email', 
				datereclamation= '$reclamation->datereclamation'
			WHERE numreclamation = '$numreclamation'";
				
				$db->query($sql);
			
				
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

		function classementreclamation(){
			$sql="SELECT * FROM reclamation order by numreclamation";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}

		function classementreclamation1(){
			$sql="SELECT * FROM reclamation order by nom";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}

		function classementreclamation2(){
			$sql="SELECT * FROM reclamation order by datereclamation";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
	

	}
?>