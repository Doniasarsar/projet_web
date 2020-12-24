<?php
    include "../controller/patientC.php";

	$patientC = new patientC();
	$error = "";
	if (
        isset($_POST["Login_patient"]) && 
		isset($_POST["MDP_patient"])  
    ){
		if (
            !empty($_POST["Login_patient"]) && 
			!empty($_POST["MDP_patient"]) 
        ) {
            
            $patientC->verification_MDP($_POST['Login_patient'],$_POST['MDP_patient']);
        }
        else
            $error = "Information Manquante";
	}

?>
