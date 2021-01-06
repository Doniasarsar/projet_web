<?PHP
  class medecin
  {
    private $CIN_medecin;
    private $Nom_medecin;
    private $Prenom_medecin;
	private $date_medecin;
	private $specialite;
	private $fonction;
	private $Login_medecin;
	private $MDP_medecin;
	private $phone_medecin;
    private $Adresse_medecin;
  
	function __construct(int $CIN_medecin, string $Nom_medecin, string $Prenom_medecin, string $date_medecin, string $specialite, string $fonction, string $Login_medecin, string $MDP_medecin, int $phone_medecin, string $Adresse_medecin){
			
      $this->CIN_medecin=$CIN_medecin;
      $this->Nom_medecin=$Nom_medecin;
      $this->Prenom_medecin=$Prenom_medecin;
	  $this->date_medecin=$date_medecin;
	  $this->specialite=$specialite;
	  $this->fonction=$fonction;
	  $this->Login_medecin=$Login_medecin;
	  $this->MDP_medecin=$MDP_medecin;
	  $this->phone_medecin=$phone_medecin;
      $this->Adresse_medecin=$Adresse_medecin;
    }
		
    public function getCIN_medecin()
    {
      return $this->CIN_medecin;
    }
  
    public function getNom_medecin()
    {
      return $this->Nom_medecin;
    }
  
    public function getPrenom_medecin()
    {
      return $this->Prenom_medecin;
    }
	
	public function getdate_medecin()
    {
      return $this->date_medecin;
    }
	
	public function getspecialite()
    {
      return $this->specialite;
    }
	
	public function getnbreMedecin()
    {
      return $this->fonction;
    }
	
	public function getLogin_medecin()
    {
      return $this->Login_medecin;
    }
	
	public function getMDP_medecin()
    {
      return $this->MDP_medecin;
    }
  
	public function getphone_medecin()
    {
      return $this->phone_medecin;
    }
	
    public function getAdresse_medecin()
    {
      return $this->Adresse_medecin;
    }

    public function setCIN_medecin($id)
    {
      $this->CIN_medecin = $id;
    }
  
    public function setNom_medecin($Nom_medecin)
    {
      $this->Nom_medecin = $Nom_medecin;
    }
  
    public function setPrenom_medecin($Prenom_medecin)
    {
      $this->Prenom_medecin = $Prenom_medecin;
    }
	
	public function setdate_medecin($date_medecin)
    {
      $this->date_medecin = $date_medecin;
    }
	
	public function setspecialite($specialite)
    {
      $this->specialite = $specialite;
    }
	
	public function setnbreMedecin($fonction)
    {
      $this->fonction = $fonction;
    }
	
	public function setLogin_medecin($Login_medecin)
    {
      $this->Login_medecin = $Login_medecin;
    }
	
	public function setMDP_medecin($MDP_medecin)
    {
      $this->MDP_medecin = $MDP_medecin;
    }
	
	public function setphone_medecin($phone_medecin)
    {
      $this->phone_medecin = $phone_medecin;
    }
  
    public function setAdresse_medecin($Adresse_medecin)
    {
      $this->Adresse_medecin = $Adresse_medecin;
    }
  }
?>