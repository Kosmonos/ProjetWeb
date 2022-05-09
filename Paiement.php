<?php
	class Paiement{
		private $IdPaiement;
		private $Montant;
		private $Email;
		private $TypePaiement;
		function __construct($IdPaiement, $Montant, $Email, $TypePaiement){
			$this->IdPaiement=$IdPaiement;
			$this->Montant=$Montant;
			$this->Email=$Email;
			$this->TypePaiement=$TypePaiement;
		}
		function getIdPaiement(){
			return $this->IdPaiement;
		}
		function getMontant(){
			return $this->Montant;
		}
		function getEmail(){
			return $this->Email;
		}
		function getTypePaiement(){
			return $this->TypePaiement;
		}
		function setIdPaiement(int $IdPaiement){
			$this->IdPaiement=$IdPaiement;
		}
		function setMontant(float $Montant){
			$this->Montant=$Montant;
		}
		function setEmail(string $Email){
			$this->Email=$Email;
		}
		function setTypePaiement(string $TypePaiement){
			$this->TypePaiement=$TypePaiement;
		}
		
		
	}


?>
