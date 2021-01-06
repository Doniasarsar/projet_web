<?PHP
  class Dossier
  {
    private $idDossier;
    private $date_dossier;
    private $description_dossier;
    private $observation_dossier;
  
	function __construct(int $idDossier, string $date_dossier, string $description_dossier, string $observation_dossier){
			
      $this->idDossier=$idDossier;
      $this->date_dossier=$date_dossier;
      $this->description_dossier=$description_dossier;
      $this->observation_dossier=$observation_dossier;
    }
		
    public function getIdDossier()
    {
      return $this->idDossier;
    }
  
    public function getdate_dossier()
    {
      return $this->date_dossier;
    }
  
    public function getdescription_dossier()
    {
      return $this->description_dossier;
    }
  
    public function getobservation_dossier()
    {
      return $this->observation_dossier;
    }

    public function setIdDossier($id)
    {
      $this->idDossier = $id;
    }
  
    public function setdate_dossier($date_dossier)
    {
      $this->date_dossier = $date_dossier;
    }
  
    public function setdescription_dossier($description_dossier)
    {
      $this->description_dossier = $description_dossier;
    }
  
    public function setobservation_dossier($observation_dossier)
    {
      $this->observation_dossier = $observation_dossier;
    }
  }
?>