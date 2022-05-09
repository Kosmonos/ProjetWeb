<?php
	class Reponse{
        public $Idreponse=null;
        public $messagee=null;
		public $EmailClient=null;
		public $numreclamation=null;
		function __construct($Idreponse,$messagee, $EmailClient, $numreclamation ){
            $this->Idreponse=$Idreponse;
            $this->messagee=$messagee;
			$this->EmailClient=$EmailClient;
			$this->numreclamation=$numreclamation;
			
		}
        function getIdreponse(){
			return $this->Idreponse;
		}

		function getmessagee(){
			return $this->messagee;
				}
	
		function getEmailClient(){
			return $this->EmailClient;
				}

		function getnumreclamation(){
			return $this->numreclamation;
		}
		
		
	
		function setIdreponse(string $Idreponse){
			$this->Idreponse=$Idreponse;
		}
		function setmessagee(string $messagee){
			$this->messagee=$messagee;
		}

		function setEmailClient(string $EmailClient){
			$this->EmailClient=$EmailClient;
		}
		function setnumreclamation(){
			$this->numreclamation=$numreclamation;
		}

		
	}


?>