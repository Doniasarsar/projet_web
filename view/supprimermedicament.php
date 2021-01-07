<?PHP
	include "../controller/medicamentc.php";

	$medicamentc=new medicamentc();
	
	if (isset($_POST["id_med"])){
		$medicamentc->supprimermedicament($_POST["id_med"]);
		header('Location:affichermedicament.php');
	}

?>