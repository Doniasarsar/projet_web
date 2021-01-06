<?PHP
  class medecin
  {
    private $idmedecin;
    private $nom;
    private $prenom;
    private $numero_de_telephone;
    private $Login_medecin;
  
	function __construct(int $idmedecin, string $nom, string $prenom, int $numero_de_telephone, string $Login_medecin){
			
      $this->idmedecin=$idmedecin;
      $this->nom=$nom;
      $this->prenom=$prenom;
      $this->numero_de_telephone=$numero_de_telephone;
      $this->Login_medecin=$Login_medecin;
    }
		
    public function getIdmedecin()
    {
      return $this->idmedecin;
    }
  
    public function getnom()
    {
      return $this->nom;
    }
  
    public function getprenom()
    {
      return $this->prenom;
    }
  
    public function getnumero_de_telephone()
    {
      return $this->numero_de_telephone;
    }

    public function getLogin_medecin()
    {
      return $this->Login_medecin;
    }

    public function setIdmedecin($id)
    {
      $this->idmedecin = $id;
    }
  
    public function setnom($nom)
    {
      $this->nom = $nom;
    }
  
    public function setprenom($prenom)
    {
      $this->prenom = $prenom;
    }
  
    public function setnumero_de_telephone($numero_de_telephone)
    {
      $this->numero_de_telephone = $numero_de_telephone;
    }

    public function setLogin_medecin($Login_medecin)
    {
      $this->Login_medecin = $Login_medecin;
    }
  }
?>