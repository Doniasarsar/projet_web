<?PHP
	include "../controller/symptomec.php";

	$symptomec=new symptomec();
	
	if (isset($_POST["code_sympt"])){
		$symptomec->supprimersymptome($_POST["code_sympt"]);
		header('Location:affichersymptome.php');
	}

?>