<?PHP
	class symptome {
		private ?int $code_sympt = null;
		private ?string $libelle_sympt = null;
		private ?string $description_sympt = null;
		private ?string $valeur_sympt = null;
		
		
		
		function __construct(string $libelle_sympt , string $description_sympt, string $valeur_sympt){
			
			$this->libelle_sympt=$libelle_sympt;
			$this->description_sympt=$description_sympt;
			$this->valeur_sympt=$valeur_sympt;
			
	
		}
		
		function getcode_sympt(): int{
			return $this->$code_sympte;
		}
		function getlibelle_sympt(): string{
			return $this->libelle_sympt;
		}
		
		function getdescription_sympt(): string{
			return $this->description_sympt;
		}
		function getvaleur_sympt(): string{
			return $this->valeur_sympt;
		}
		
	function setlibelle_sympt(string $libelle_sympt): void{
			$this->libelle_sympt=$libelle_sympt;
		}
		function setdescription_sympt(string $description_sympt): void{
			$this->description_sympt;
		}
		function setvaleur_sympt(string $valeur_sympt): void{
			$this->valeur_sympt=$valeur_sympt;
		}
		
	}
?>