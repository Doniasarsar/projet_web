<?php
    include "../controller/secretaireC.php";

	$secretaireC = new secretaireC();
	$error = "";
	
	if (isset($_POST["CIN_secretaire"]) &&
        isset($_POST["Nom_secretaire"]) &&
        isset($_POST["Prenom_secretaire"]) && 
		isset($_POST["date_secretaire"]) && 
		isset($_POST["specialite"]) && 
		isset($_POST["nbreMedecin"]) && 
		isset($_POST["Login_secretaire"]) && 
		isset($_POST["MDP_secretaire"]) &&
		isset($_POST["phone_secretaire"]) && 		
        isset($_POST["Adresse_secretaire"])
    ){
		if (!empty($_POST["CIN_secretaire"]) &&
            !empty($_POST["Nom_secretaire"]) && 
            !empty($_POST["Prenom_secretaire"]) && 
			!empty($_POST["date_secretaire"]) &&
			!empty($_POST["specialite"]) &&
			!empty($_POST["nbreMedecin"]) && 
			!empty($_POST["Login_secretaire"]) && 
			!empty($_POST["MDP_secretaire"]) &&
			!empty($_POST["phone_secretaire"]) &&
            !empty($_POST["Adresse_secretaire"])
        ) {
            $secretaire = new secretaire(
                $_POST['CIN_secretaire'],
				$_POST['Nom_secretaire'],
                $_POST['Prenom_secretaire'], 
                $_POST['date_secretaire'],			
				$_POST['specialite'], 
				$_POST['nbreMedecin'], 
				$_POST['Login_secretaire'],
				$_POST['MDP_secretaire'],
				$_POST['phone_secretaire'],
				$_POST['Adresse_secretaire'] 				
            );          
            $secretaireC->ajoutersecretaire($secretaire);
        }
        else
            echo "Information Manquante";		
	}
	
	else
            echo "Information Manquante";

?>



