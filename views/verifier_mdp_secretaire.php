<?php
    include "../controller/secretaireC.php";

	$secretaireC = new secretaireC();
	$error = "";
	if (
        isset($_POST["Login_secretaire"]) && 
		isset($_POST["MDP_secretaire"])  
    ){
		if (
            !empty($_POST["Login_secretaire"]) && 
			!empty($_POST["MDP_secretaire"]) 
        ) {
            
            $secretaireC->verification_MDP($_POST['Login_secretaire'],$_POST['MDP_secretaire']);
        }
        else
            $error = "Information Manquante";
	}

?>
