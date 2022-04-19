<?php
	class Reservation{
		private $IdReservation;
		private $IdUser;
		private $IdVehicule;
		private $DateReservation;
		function __construct($IdReservation, $IdUser, $IdVehicule, $DateReservation){
			$this->IdReservation=$IdReservation;
			$this->IdUser=$IdUser;
			$this->IdVehicule=$IdVehicule;
			$this->DateReservation=$DateReservation;
		}
		function getIdReservation(){
			return $this->IdReservation;
		}
		function getIdUser(){
			return $this->IdUser;
		}
		function getIdVehicule(){
			return $this->IdVehicule;
		}
		function getDateReservation(){
			return $this->DateReservation;
		}
		function setIdReservation(int $IdReservation){
			$this->IdReservation=$IdReservation;
		}
		function setIdUser(int $IdUser){
			$this->IdUser=$IdUser;
		}
		function setIdVehicule(int $IdVehicule){
			$this->IdVehicule=$IdVehicule;
		}
		function setDateReservation(string $DateReservation){
			$this->DateReservation=$DateReservation;
		}
		
	}


?>