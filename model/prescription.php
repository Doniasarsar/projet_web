<?PHP
  class prescription
  {
    private $num_pres;
    private $desc_pres;
    private $date_pres;
    private $nom_med;
    private $dosage_med;
    private $desc_med;
    private $motif_hosp;
    private $date_hosp;
    private $type_analy;
    private $nature_analy;
    private $desc_analy;
  
  function __construct (string $desc_pres, string  $date_pres, string  $nom_med, string $dosage_med, string $desc_med,  string $motif_hosp,string $date_hosp,string  $type_analy,string  $nature_analy, string $desc_analy ){
			 
      $this->num_pres=$num_pres;
      $this->desc_pres=$desc_pres;
      $this->date_pres=$date_pres;
      $this->nom_med=$nom_med;
      $this->dosage_med=$dosage_med;
      $this->desc_med=$desc_med;
      $this->motif_hosp=$motif_hosp;
      $this->date_hosp=$date_hosp;
      $this->type_analy=$type_analy;
      $this->nature_analy=$nature_analy;
      $this->desc_analy=$desc_analy;

 }
    public function getnum_pres()
    {
      return $this->num_pres;
    }
  
    
    public function getdesc_pres()
    {
      return $this->desc_pres;
    }

    public function getdate_pres()
    {
      return $this->date_pres;
    }
  
    public function getnom_med()
    {
      return $this->nom_med;
    }
  
    public function getdosage_med()
    {
      return $this->dosage_med;
    }

    public function getdesc_med()
    {
      return $this->desc_med;
    }

    public function getmotif_hosp()
    {
     return $this->motif_hosp ;
    }

    public function getdate_hosp()
    {
      return $this->date_hosp ;
    }

    public function gettype_analy()
    {
      return $this->type_analy;
    }

    public function getnature_analy()
    {
      return $this->nature_analy;
    }

    public function getdesc_analy()
    {
     return $this->desc_analy ;
    }

    public function setnum_pres($num_pres)
    {
      $this->num_pres = $num_pres;
    }

    public function setdesc_pres($desc_pres)
    {
      $this->desc_pres = $desc_pres;
    }

    public function setdate_pres($date_pres)
    {
      $this->date_pres = $date_pres;
    }
  
    public function setnom_med($nom_med)
    {
      $this->nom_med = $nom_med;
    }
  
    public function setdosage_med($dosage_med)
    {
      $this->dosage_med = $dosage_med;
    }

    public function setdesc_med($desc_med)
    {
      $this->desc_med = $desc_med;
    }

    public function setmotif_hosp($motif_hosp)
    {
      $this->motif_hosp = $motif_hosp;
    }

    public function setdate_hosp($date_hosp)
    {
      $this->date_hosp = $date_hosp;
    }

    public function settype_analy($type_analy)
    {
      $this->type_analy = $type_analy;
    }

    public function setnature_analy($nature_analy)
    {
      $this->nature_analy = $nature_analy;
    }

    public function setdesc_analy($desc_analy)
    {
      $this->desc_analy = $desc_analy;
    }

  }
?>