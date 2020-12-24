<?php
    include "../controller/patientC.php";

	$patientC = new patientC();
	$error = "";
	
	if (isset($_POST["CIN_patient"]) &&
        isset($_POST["Nom_patient"]) &&
        isset($_POST["Prenom_patient"]) && 
		isset($_POST["date_patient"]) && 
		isset($_POST["nbreFamilleEnCharge"]) && 
		isset($_POST["situationFamiliale"]) && 
		isset($_POST["Login_patient"]) && 
		isset($_POST["MDP_patient"]) &&
		isset($_POST["phone_patient"]) && 		
        isset($_POST["Adresse_patient"])
    ){
		if (!empty($_POST["CIN_patient"]) &&
            !empty($_POST["Nom_patient"]) && 
            !empty($_POST["Prenom_patient"]) && 
			!empty($_POST["date_patient"]) &&
			!empty($_POST["nbreFamilleEnCharge"]) &&
			!empty($_POST["situationFamiliale"]) && 
			!empty($_POST["Login_patient"]) && 
			!empty($_POST["MDP_patient"]) &&
			!empty($_POST["phone_patient"]) &&
            !empty($_POST["Adresse_patient"])
        ) {
            $patient = new Patient(
                $_POST['CIN_patient'],
				$_POST['Nom_patient'],
                $_POST['Prenom_patient'], 
                $_POST['date_patient'],			
				$_POST['nbreFamilleEnCharge'], 
				$_POST['situationFamiliale'], 
				$_POST['Login_patient'],
				$_POST['MDP_patient'],
				$_POST['phone_patient'],
				$_POST['Adresse_patient'] 				
            );          
            $patientC->ajouterPatient($patient);
        }
        else
            echo "Information Manquante";		
	}
	
	else
            echo "Information Manquante";

?>



