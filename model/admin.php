<?PHP
  class admin
  {
	private $Login_admin;
	private $MDP_admin;
  
	function __construct(string $Login_admin, string $MDP_admin){
			
	  $this->Login_admin=$Login_admin;
	  $this->MDP_admin=$MDP_admin;
    }
		
	public function getLogin_admin()
    {
      return $this->Login_admin;
    }
	
	public function getMDP_admin()
    {
      return $this->MDP_admin;
    }
  
	
	public function setLogin_admin($Login_admin)
    {
      $this->Login_admin = $Login_admin;
    }
	
	public function setMDP_admin($MDP_admin)
    {
      $this->MDP_admin = $MDP_admin;
    }
  }
?>