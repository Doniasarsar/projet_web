<?php
    include "../controller/medecinC.php";

	$medecinC = new medecinC();
	$error = "";
	
	if (isset($_POST["CIN_medecin"]) &&
        isset($_POST["Nom_medecin"]) &&
        isset($_POST["Prenom_medecin"]) && 
		isset($_POST["date_medecin"]) && 
		isset($_POST["specialite"]) && 
		isset($_POST["fonction"]) && 
		isset($_POST["Login_medecin"]) && 
		isset($_POST["MDP_medecin"]) &&
		isset($_POST["phone_medecin"]) && 		
        isset($_POST["Adresse_medecin"])
    ){
		if (!empty($_POST["CIN_medecin"]) &&
            !empty($_POST["Nom_medecin"]) && 
            !empty($_POST["Prenom_medecin"]) && 
			!empty($_POST["date_medecin"]) &&
			!empty($_POST["specialite"]) &&
			!empty($_POST["fonction"]) && 
			!empty($_POST["Login_medecin"]) && 
			!empty($_POST["MDP_medecin"]) &&
			!empty($_POST["phone_medecin"]) &&
            !empty($_POST["Adresse_medecin"])
        ) {
            $medecin = new medecin(
                $_POST['CIN_medecin'],
				$_POST['Nom_medecin'],
                $_POST['Prenom_medecin'], 
                $_POST['date_medecin'],			
				$_POST['specialite'], 
				$_POST['fonction'], 
				$_POST['Login_medecin'],
				$_POST['MDP_medecin'],
				$_POST['phone_medecin'],
				$_POST['Adresse_medecin'] 				
            );          
            $medecinC->ajoutermedecin($medecin);
        }
        else
            echo "Information Manquante";		
	}
	
	else
            echo "Information Manquante";

?>



