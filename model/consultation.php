<?php

 	class Consultation{
 		
 		 private int $num_rdv;
		 private date $date_rdv;
		 private string $objet_rdv;

 		function __consrtruct(date $date_rdv, string $objet_rdv){

 			$this->date_rdv = $date_rdv;
 			$this->objet_rdv = $objet_rdv;
 		}

 		function getID(): int{
 			return $this->num_rdv;
 		}

 		function getDate_rdv(): date{
 			return $this->date_rdv; 
 		}

 		function getObjet_rdv(): string{
 			return $this->objet_rdv; 
 		}

 		function setID(int $num_rdv): void{
 			$this->num_rdv;
 		}

 		function setDate_rdv(string $date_rdv): void{
 			$this->date_rdv;
 		}

 		function setObjet_rdv(string $objet_rdv): void{
 			$this->objet_rdv;
 		}
 	} 
 ?>