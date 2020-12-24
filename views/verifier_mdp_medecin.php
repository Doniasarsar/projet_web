<?php
    include "../controller/medecinC.php";

	$medecinC = new medecinC();
	$error = "";
	if (
        isset($_POST["Login_medecin"]) && 
		isset($_POST["MDP_medecin"])  
    ){
		if (
            !empty($_POST["Login_medecin"]) && 
			!empty($_POST["MDP_medecin"]) 
        ) {
            
            $medecinC->verification_MDP($_POST['Login_medecin'],$_POST['MDP_medecin']);
        }
        else
            $error = "Information Manquante";
	}

?>
