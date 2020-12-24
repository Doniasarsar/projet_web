<?PHP
	include "../config.php";
	include "../Model/Patient.php";

	class PatientC {
		
		function afficherPatients($Login_patient){
			
			$sql="SELECT * FROM Patient where Login_patient='$Login_patient'";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				echo '<h3>Erreur: '.$e->getMessage().'</h3>';
			}	
		}

		function ajouterPatient($patient){
			$sql="INSERT INTO Patient (CIN_patient,Nom_patient,Prenom_patient,date_patient,nbreFamilleEnCharge,situationFamiliale,Login_patient,MDP_patient,phone_patient,Adresse_patient,actif_patient) 
			      VALUES (:v1, :v2, :v3, :v4, :v5, :v6, :v7, :v8, :v9, :v10, 0)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'v1' => $patient->getCIN_patient(),
					'v2' => $patient->getNom_patient(),
					'v3' => $patient->getPrenom_patient(),
					'v4' => $patient->getdate_patient(),
					'v5' => $patient->getnbreFamilleEnCharge(),
					'v6' => $patient->getsituationFamiliale(),
					'v7' => $patient->getLogin_patient(),
					'v8' => $patient->getMDP_patient(),
					'v9' => $patient->getphone_patient(),
					'v10' => $patient->getAdresse_patient()
				]);	
				$destinataire = $patient->getLogin_patient();
				$sujet = "Activer votre compte" ;
				$entete = "From: TogetherVersusCovid@gmail.com" ;
 				$message = 'Bienvenue sur TogetherVersusCovid,
				Pour activer votre compte, veuillez cliquer sur le lien ci-dessous
				ou copier/coller dans votre navigateur Internet.
				
				http://localhost/new%20projet%20web/views/validation_patient.php?login='.$patient->getLogin_patient();
				
 				mail($destinataire, $sujet, $message, $entete);
					
					
				echo "<script language=\"javascript\"> alert(\"Nouveau patient a été créé avec succès un mail a été envoyé veuillez verifier votre boite mail pour l'activer \");</script>";
				echo "<html><head><title>Redirection en HTML</title>
                          <meta http-equiv=\"refresh\" content=\"0; URL=.\\front\\login.php\">
				</head><body></body></html>";
			
			}
			catch (Exception $e){
				echo '<h3>Erreur: '.$e->getMessage().'</h3>';
			}		
			
		}
		
		function supprimerPatient($CIN_patient){
			$sql="DELETE FROM Patient WHERE CIN_patient= :v1";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':v1',$CIN_patient);
			echo "<script language=\"javascript\"> alert(\"Patient supprimer avec succès\");</script>";
			
					echo "<html><head><title>Redirection en HTML</title>
                          <meta http-equiv=\"refresh\" content=\"0; URL=.\\front\\index.php\">
                          </head><body></body></html>";
			try{
				$req->execute();
			}
			catch (Exception $e){
				echo '<h3>Erreur: '.$e->getMessage().'</h3>';
			}
		}
		
		function modifierPatient($patient){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE Patient SET 
						Nom_patient = :v1, 
						Prenom_patient = :v2,
						date_patient = :v3,
						Login_patient = :v4,
						MDP_patient = :v5,
						phone_patient = :v6,
						Adresse_patient = :v7
					WHERE CIN_patient = :v8'
				);
				$query->execute([
					
					'v1' => $patient->getNom_patient(),
					'v2' => $patient->getPrenom_patient(),
					'v3' => $patient->getdate_patient(),
					'v4' => $patient->getLogin_patient(),
					'v5' => $patient->getMDP_patient(),
					'v6' => $patient->getphone_patient(),
					'v7' => $patient->getAdresse_patient(),
					'v8' => $patient->getCIN_patient()	
				]);
				$login = $patient->getLogin_patient();
				echo "<script language=\"javascript\"> alert(\"Patient modifier avec succès\");</script>";
			
					echo  "<html><head><title>Redirection en HTML</title>
                          <meta http-equiv=\"refresh\" content=\"0; URL=.\\showPatients.php?login=$login\">
                          </head><body></body></html>";
			} catch (PDOException $e) {
				echo '<h3>Erreur: '.$e->getMessage().'</h3>';
			}
		}
		function recupererPatient($CIN_patient){
			$sql="SELECT * from Patient where CIN_patient=$CIN_patient";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$patient=$query->fetch();
				return $patient;
			}
			catch (Exception $e){
				echo '<h3>Erreur: '.$e->getMessage().'</h3>';
			}
		}
		function rechercherPatient($CIN_patient){
			$sql="SELECT count(*) AS nbre from Patient where CIN_patient=$CIN_patient";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$patient=$query->fetch();
				if ($patient['nbre'] == 0)
				  echo "<script language=\"javascript\"> alert(\"Patient $CIN_patient inexistant\");</script>";
				else 
				  echo "<script language=\"javascript\"> alert(\"Patient $CIN_patient existe dans la BD\");</script>";
			}
			catch (Exception $e){
				echo '<h3>Erreur: '.$e->getMessage().'</h3>';
			}
		}
		function verification_MDP($Login_patient,$MDP_patient){
				$sql="SELECT count(*) AS nbre from Patient where Login_patient='$Login_patient' and MDP_patient='$MDP_patient' and actif_patient = 1 ";
				$db = config::getConnexion();
				try{
					$query=$db->prepare($sql);
					$query->execute();

					$patient=$query->fetch();
					if ($patient['nbre'] == 0){
					echo "<script language=\"javascript\"> alert(\"Incorrect Login or Password or account inactive \");</script>";
			
					echo "<html><head><title>Redirection en HTML</title>
                          <meta http-equiv=\"refresh\" content=\"0; URL=.\\front\\login.php\">
                          </head><body></body></html>";
					}
					else 
					
					echo  "<html><head><title>Redirection en HTML</title>
                          <meta http-equiv=\"refresh\" content=\"0; URL=.\\showPatients.php?login=$Login_patient\">
                          </head><body></body></html>";
						  
					}
					catch (Exception $e){
						echo '<h3>Erreur: '.$e->getMessage().'</h3>';
										}
										
				
			}
			
			function validation_patient($Login_patient){
				$db = config::getConnexion();
				$sql = $db->prepare("SELECT actif_patient FROM Patient WHERE Login_patient like :Login_patient ");
				if($sql->execute(array(':Login_patient' => $Login_patient)) && $row = $sql->fetch())
				{
					$actif_patient = $row['actif_patient']; // $actif_patient contiendra alors 0 ou 1
				}
 
 

				if($actif_patient == '1') // Si le compte est déjà actif on prévient
				{
					echo "<script language=\"javascript\"> alert(\"Votre compte est déjà actif !\");</script>";			
					echo "<html><head><title>Redirection en HTML</title>
                          <meta http-equiv=\"refresh\" content=\"0; URL=.\\front\\login.php\">
                          </head><body></body></html>";
					
				}
				else // Si ce n'est pas le cas on passe aux comparaisons
				{
						// La requête qui va passer notre champ actif de 0 à 1
						$sql = $db->prepare("UPDATE Patient SET actif_patient = 1 WHERE Login_patient like :Login_patient ");
						$sql->bindParam(':Login_patient', $Login_patient);
						$sql->execute();
						echo "<script language=\"javascript\"> alert(\"Votre compte a bien été activé\");</script>";			
						echo "<html><head><title>Redirection en HTML</title>
                          <meta http-equiv=\"refresh\" content=\"0; URL=.\\front\\login.php\">
                          </head><body></body></html>";
					
				}
										
				
			}
			
		
}
		
		
?>