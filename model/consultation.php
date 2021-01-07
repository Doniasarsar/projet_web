<?PHP
  class consultation
  {
    private $numRdv;
    private $dateRdv;
    private $objetRdv;
    private $heureRdv;
  
	function __construct( string $dateRdv, string $objetRdv, string $heureRdv){
			
     // $this->numRdv=$numRdv;
      $this->dateRdv=$dateRdv;
      $this->objetRdv=$objetRdv;
      $this->heureRdv=$heureRdv;
    }
		
    /*public function getnumRdv()
    {
      return $this->numRdv;
    }*/
  
    public function getdateRdv()
    {
      return $this->dateRdv;
    }
  
    public function getobjetRdv()
    {
      return $this->objetRdv;
    }
  
    public function getheureRdv()
    {
      return $this->heureRdv;
    }

    /*public function setnumRdv($id)
    {
      $this->numRdv = $id;
    }
  */
    public function setdateRdv($dateRdv)
    {
      $this->dateRdv = $dateRdv;
    }
  
    public function setobjetRdv($objetRdv)
    {
      $this->objetRdv = $objetRdv;
    }
  
    public function setheureRdv($heureRdv)
    {
      $this->heureRdv = $heureRdv;
    }
  }
?>