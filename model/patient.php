<?PHP
  class Patient
  {
    private $CIN_patient;
    private $Nom_patient;
    private $Prenom_patient;
	private $date_patient;
	private $nbreFamilleEnCharge;
	private $situationFamiliale;
	private $Login_patient;
	private $MDP_patient;
	private $phone_patient;
    private $Adresse_patient;
  
	function __construct(int $CIN_patient, string $Nom_patient, string $Prenom_patient, string $date_patient, int $nbreFamilleEnCharge, string $situationFamiliale, string $Login_patient, string $MDP_patient, int $phone_patient, string $Adresse_patient){
			
      $this->CIN_patient=$CIN_patient;
      $this->Nom_patient=$Nom_patient;
      $this->Prenom_patient=$Prenom_patient;
	  $this->date_patient=$date_patient;
	  $this->nbreFamilleEnCharge=$nbreFamilleEnCharge;
	  $this->situationFamiliale=$situationFamiliale;
	  $this->Login_patient=$Login_patient;
	  $this->MDP_patient=$MDP_patient;
	  $this->phone_patient=$phone_patient;
      $this->Adresse_patient=$Adresse_patient;
    }
		
    public function getCIN_patient()
    {
      return $this->CIN_patient;
    }
  
    public function getNom_patient()
    {
      return $this->Nom_patient;
    }
  
    public function getPrenom_patient()
    {
      return $this->Prenom_patient;
    }
	
	public function getdate_patient()
    {
      return $this->date_patient;
    }
	
	public function getnbreFamilleEnCharge()
    {
      return $this->nbreFamilleEnCharge;
    }
	
	public function getsituationFamiliale()
    {
      return $this->situationFamiliale;
    }
	
	public function getLogin_patient()
    {
      return $this->Login_patient;
    }
	
	public function getMDP_patient()
    {
      return $this->MDP_patient;
    }
  
	public function getphone_patient()
    {
      return $this->phone_patient;
    }
	
    public function getAdresse_patient()
    {
      return $this->Adresse_patient;
    }

    public function setCIN_patient($id)
    {
      $this->CIN_patient = $id;
    }
  
    public function setNom_patient($Nom_patient)
    {
      $this->Nom_patient = $Nom_patient;
    }
  
    public function setPrenom_patient($Prenom_patient)
    {
      $this->Prenom_patient = $Prenom_patient;
    }
	
	public function setdate_patient($date_patient)
    {
      $this->date_patient = $date_patient;
    }
	
	public function setnbreFamilleEnCharge($nbreFamilleEnCharge)
    {
      $this->nbreFamilleEnCharge = $nbreFamilleEnCharge;
    }
	
	public function setsituationFamiliale($situationFamiliale)
    {
      $this->situationFamiliale = $situationFamiliale;
    }
	
	public function setLogin_patient($Login_patient)
    {
      $this->Login_patient = $Login_patient;
    }
	
	public function setMDP_patient($MDP_patient)
    {
      $this->MDP_patient = $MDP_patient;
    }
	
	public function setphone_patient($phone_patient)
    {
      $this->phone_patient = $phone_patient;
    }
  
    public function setAdresse_patient($Adresse_patient)
    {
      $this->Adresse_patient = $Adresse_patient;
    }
  }
?>