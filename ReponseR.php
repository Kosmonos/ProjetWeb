<?php
	include '../config.php';
	include_once '../Model/Reponse.php';
	class ReponseR {

		public function afficherbyname($namerecherche)
        {
            try {
                $db = config::getConnexion();
    
                $querry = $db->prepare('select * from Reponse where messagee like "%'.$namerecherche.'%"');
                $querry->execute();
                $result = $querry->fetchAll();
                return $result;
            } catch (PDOException $th) {
                $th->getMessage();
            }
        }
		function afficherreponse(){
			$sql="SELECT * FROM reponse";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function supprimerreponse($Idreponse){
			$sql="DELETE FROM reponse WHERE Idreponse=:Idreponse";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':Idreponse', $Idreponse);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function ajouterreponse($reponse){
			$sql="INSERT INTO reponse (Idreponse,messagee, EmailClient,numreclamation) 
			VALUES (:Idreponse,:messagee,:EmailClient,:numreclamation)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'Idreponse' => $reponse->getIdreponse(),
					'messagee' => $reponse->getmessagee(),
					'EmailClient' => $reponse->getEmailClient(),
					'numreclamation' => $reponse->getnumreclamation()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recupererreponse($Idreponse){
			$sql="SELECT * from reponse where Idreponse=$Idreponse";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$reponse=$query->fetch();
				return $reponse;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifierreponse($reponse, $Idreponse){
			try {
				$db = config::getConnexion();

				$sql = "UPDATE reponse
				SET 
				Idreponse= $reponse->Idreponse,
				messagee= '$reponse->messagee', 
				EmailClient= '$reponse->EmailClient', 
				numreclamation= '$reponse->numreclamation'
			WHERE Idreponse = '$Idreponse'";
				
				$db->query($sql);
			
				
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function classementreponse(){
			$sql="SELECT Idreponse,messagee,EmailClient,numreclamation FROM Reponse order by Idreponse desc";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}

		function classementreponse1(){
			$sql="SELECT Idreponse,messagee,EmailClient,numreclamation FROM Reponse order by EmailClient asc";
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