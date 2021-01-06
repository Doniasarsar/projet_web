<?PHP
  class specialite
  {
    private $idSpecialite;
    private $libelleSpecialite;
    private $descSpecialite;

  
	function __construct(int $idSpecialite, string $libelleSpecialite, string $descSpecialite){
			
      $this->idSpecialite=$idSpecialite;
      $this->libelleSpecialite=$libelleSpecialite;
      $this->descSpecialite=$descSpecialite;
   
    }
		
    public function getidSpecialite()
    {
      return $this->idSpecialite;
    }
  
    public function getlibelleSpecialite()
    {
      return $this->libelleSpecialite;
    }
  
    public function getdescSpecialite()
    {
      return $this->descSpecialite;
    }
  


    public function setidSpecialite($id)
    {
      $this->idSpecialite = $id;
    }
  
    public function setlibelleSpecialite($libelleSpecialite)
    {
      $this->libelleSpecialite = $libelleSpecialite;
    }
  
    public function setdescSpecialite($descSpecialite)
    {
      $this->descSpecialite = $descSpecialite;
    }
  
   
  }
?>