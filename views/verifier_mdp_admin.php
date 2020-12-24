<?php
    include "../controller/adminC.php";

	$adminC = new adminC();
	$error = "";
	if (
        isset($_POST["Login_admin"]) && 
		isset($_POST["MDP_admin"])  
    ){
		if (
            !empty($_POST["Login_admin"]) && 
			!empty($_POST["MDP_admin"]) 
        ) {
            
            $adminC->verification_MDP($_POST['Login_admin'],$_POST['MDP_admin']);
        }
        else
            $error = "Information Manquante";
	}

?>
