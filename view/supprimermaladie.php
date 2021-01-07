<?PHP
	include "../controller/maladieC.php";

	$maladieC=new maladieC();
	
	if (isset($_POST["id_maladie"])){
		$maladieC->supprimermaladie($_POST["id_maladie"]);
		header('Location:affichermaladie.php');
	}

?>