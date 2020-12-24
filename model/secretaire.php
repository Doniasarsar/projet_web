<?PHP
  class secretaire
  {
    private $CIN_secretaire;
    private $Nom_secretaire;
    private $Prenom_secretaire;
	private $date_secretaire;
	private $specialite;
	private $nbreMedecin;
	private $Login_secretaire;
	private $MDP_secretaire;
	private $phone_secretaire;
    private $Adresse_secretaire;
  
	function __construct(int $CIN_secretaire, string $Nom_secretaire, string $Prenom_secretaire, string $date_secretaire, string $specialite, int $nbreMedecin, string $Login_secretaire, string $MDP_secretaire, int $phone_secretaire, string $Adresse_secretaire){
			
      $this->CIN_secretaire=$CIN_secretaire;
      $this->Nom_secretaire=$Nom_secretaire;
      $this->Prenom_secretaire=$Prenom_secretaire;
	  $this->date_secretaire=$date_secretaire;
	  $this->specialite=$specialite;
	  $this->nbreMedecin=$nbreMedecin;
	  $this->Login_secretaire=$Login_secretaire;
	  $this->MDP_secretaire=$MDP_secretaire;
	  $this->phone_secretaire=$phone_secretaire;
      $this->Adresse_secretaire=$Adresse_secretaire;
    }
		
    public function getCIN_secretaire()
    {
      return $this->CIN_secretaire;
    }
  
    public function getNom_secretaire()
    {
      return $this->Nom_secretaire;
    }
  
    public function getPrenom_secretaire()
    {
      return $this->Prenom_secretaire;
    }
	
	public function getdate_secretaire()
    {
      return $this->date_secretaire;
    }
	
	public function getspecialite()
    {
      return $this->specialite;
    }
	
	public function getnbreMedecin()
    {
      return $this->nbreMedecin;
    }
	
	public function getLogin_secretaire()
    {
      return $this->Login_secretaire;
    }
	
	public function getMDP_secretaire()
    {
      return $this->MDP_secretaire;
    }
  
	public function getphone_secretaire()
    {
      return $this->phone_secretaire;
    }
	
    public function getAdresse_secretaire()
    {
      return $this->Adresse_secretaire;
    }

    public function setCIN_secretaire($id)
    {
      $this->CIN_secretaire = $id;
    }
  
    public function setNom_secretaire($Nom_secretaire)
    {
      $this->Nom_secretaire = $Nom_secretaire;
    }
  
    public function setPrenom_secretaire($Prenom_secretaire)
    {
      $this->Prenom_secretaire = $Prenom_secretaire;
    }
	
	public function setdate_secretaire($date_secretaire)
    {
      $this->date_secretaire = $date_secretaire;
    }
	
	public function setspecialite($specialite)
    {
      $this->specialite = $specialite;
    }
	
	public function setnbreMedecin($nbreMedecin)
    {
      $this->nbreMedecin = $nbreMedecin;
    }
	
	public function setLogin_secretaire($Login_secretaire)
    {
      $this->Login_secretaire = $Login_secretaire;
    }
	
	public function setMDP_secretaire($MDP_secretaire)
    {
      $this->MDP_secretaire = $MDP_secretaire;
    }
	
	public function setphone_secretaire($phone_secretaire)
    {
      $this->phone_secretaire = $phone_secretaire;
    }
  
    public function setAdresse_secretaire($Adresse_secretaire)
    {
      $this->Adresse_secretaire = $Adresse_secretaire;
    }
  }
?>