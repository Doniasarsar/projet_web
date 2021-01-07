<?PHP
	class maladie {
		private ?int $id_maladie = null;
		private ?string $nom_maladie = null;
		private ?string $type_maladie = null;
		private ?string $gravite_maladie = null;
		private ?string $desc_maladie = null;
		
		
		function __construct(string $nom_maladie , string $type_maladie, string $gravite_maladie, string $desc_maladie){
			
			$this->nom_maladie=$nom_maladie;
			$this->type_maladie=$type_maladie;
			$this->gravite_maladie=$gravite_maladie;
			$this->desc_maladie=$desc_maladie;
	
		}
		
		function getid_maladie(): int{
			return $this->id_maladie;
		}
		function getnom_maladie(): string{
			return $this->nom_maladie;
		}
		function gettype_maladie(): string{
			return $this->type_maladie;
		}
		function getgravite_maladie(): string{
			return $this->gravite_maladie;
		}
		function getdesc_maladie(): string{
			return $this->desc_maladie;
		}
		
	function setnom_maladie(string $nom_maladie): void{
			$this->nom_maladie=$nom_maladie;
		}
		function settype_maladie(string $type_maladie): void{
			$this->type_maladie;
		}
		function setgravite_maladie(string $gravite_maladie): void{
			$this->gravite_maladie=$gravite_maladie;
		}
		function setdesc_maladie(string $desc_maladie): void{
			$this->desc_maladie=$desc_maladie;
		}
	}
?>