<?php
	class Reclamation{
		public $numreclamation=null;
		public $nom=null;
		public $prenom=null;
		public $email=null;
		public $datereclamation;
		public $password=null;
		function __construct($numreclamation, $nom, $prenom, $email, $datereclamation){
			$this->numreclamation=$numreclamation;
			$this->nom=$nom;
			$this->prenom=$prenom;
			$this->email=$email;
			$this->datereclamation=$datereclamation;
		}
		function getnumreclamation(){
			return $this->numreclamation;
		}
		function getNom(){
			return $this->nom;
		}
		function getPrenom(){
			return $this->prenom;
		}
		function getEmail(){
			return $this->email;
		}
		function getdatereclamation(){
			return $this->datereclamation;
		}
		function setNom(string $nom){
			$this->nom=$nom;
		}
		function setPrenom(string $prenom){
			$this->prenom=$prenom;
		}
		function setEmail(string $email){
			$this->email=$email;
		}
		function setdatereclamation(string $datereclamation){
			$this->datereclamation=$datereclamation;
		}
		
	}


?>