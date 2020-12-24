<?PHP
    
	include "../controller/PatientC.php";
	$patientC = new patientC();
	$patientC->validation_patient($_GET['login']);
	
	
	
?>
