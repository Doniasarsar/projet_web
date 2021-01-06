<?PHP
	include "../config.php";
	include "../Model/secretaire.php";

	class secretaireC {
		
		function affichersecretaires($Login_secretaire){
			
			$sql="SELECT * FROM secretaire where Login_secretaire='$Login_secretaire'";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				echo '<h3>Erreur: '.$e->getMessage().'</h3>';
			}	
		}
		function affichersecretaire(){
			
			$sql="SELECT * FROM secretaire";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				echo '<h3>Erreur: '.$e->getMessage().'</h3>';
			}	
		}

		function ajoutersecretaire($secretaire){
			$sql="INSERT INTO secretaire (CIN_secretaire,Nom_secretaire,Prenom_secretaire,date_secretaire,specialite,nbreMedecin,Login_secretaire,MDP_secretaire,phone_secretaire,Adresse_secretaire) 
			      VALUES (:v1, :v2, :v3, :v4, :v5, :v6, :v7, :v8, :v9, :v10)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'v1' => $secretaire->getCIN_secretaire(),
					'v2' => $secretaire->getNom_secretaire(),
					'v3' => $secretaire->getPrenom_secretaire(),
					'v4' => $secretaire->getdate_secretaire(),
					'v5' => $secretaire->getspecialite(),
					'v6' => $secretaire->getnbreMedecin(),
					'v7' => $secretaire->getLogin_secretaire(),
					'v8' => $secretaire->getMDP_secretaire(),
					'v9' => $secretaire->getphone_secretaire(),
					'v10' => $secretaire->getAdresse_secretaire()
				]);	
				$destinataire = $secretaire->getLogin_secretaire();
				$sujet = "Activer votre compte" ;
				$entete = "From: TogetherVersusCovid@gmail.com" ;
 				$message = 'Bienvenue sur votre plateform:TogetherVersusCovid,
			
				Mr/Mme '.$secretaire->getNom_secretaire().$secretaire->getPrenom_secretaire().
				
				
				'              
				votre login est :'.$secretaire->getLogin_secretaire().
				'              				
				votre mots de passe est :'.$secretaire->getMDP_secretaire().
				'
				Pour acceder à votre compte, veuillez cliquer sur le lien ci-dessous
				ou copier/coller dans votre navigateur Internet.
				
				http://localhost/new%20projet%20web/views/front/login_secretaire.php';
				
				
 				mail($destinataire, $sujet, $message, $entete);
				echo "<script language=\"javascript\"> alert(\"Nouveau secretaire a été créé avec succès\");</script>";
				echo "<html><head><title>Redirection en HTML</title>
                          <meta http-equiv=\"refresh\" content=\"0; URL=.\\showsecretaire.php\">
				</head><body></body></html>";
			
			}
			catch (Exception $e){
				echo '<h3>Erreur: '.$e->getMessage().'</h3>';
			}		
			
		}
		
		function supprimersecretaire($CIN_secretaire){
			$sql="DELETE FROM secretaire WHERE CIN_secretaire= :v1";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':v1',$CIN_secretaire);
			echo "<script language=\"javascript\"> alert(\"secretaire supprimer avec succès\");</script>";
			
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
		
		function modifiersecretaire($secretaire){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE secretaire SET 
						Nom_secretaire = :v1, 
						Prenom_secretaire = :v2,
						date_secretaire = :v3,
						Login_secretaire = :v4,
						MDP_secretaire = :v5,
						phone_secretaire = :v6,
						Adresse_secretaire = :v7
					WHERE CIN_secretaire = :v8'
				);
				$query->execute([
					
					'v1' => $secretaire->getNom_secretaire(),
					'v2' => $secretaire->getPrenom_secretaire(),
					'v3' => $secretaire->getdate_secretaire(),
					'v4' => $secretaire->getLogin_secretaire(),
					'v5' => $secretaire->getMDP_secretaire(),
					'v6' => $secretaire->getphone_secretaire(),
					'v7' => $secretaire->getAdresse_secretaire(),
					'v8' => $secretaire->getCIN_secretaire()	
				]);
				$login = $secretaire->getLogin_secretaire();
				echo "<script language=\"javascript\"> alert(\"secretaire modifier avec succès\");</script>";
			
					echo  "<html><head><title>Redirection en HTML</title>
                          <meta http-equiv=\"refresh\" content=\"0; URL=.\\showsecretaires.php?login=$login\">
                          </head><body></body></html>";
			} catch (PDOException $e) {
				echo '<h3>Erreur: '.$e->getMessage().'</h3>';
			}
		}
		function recuperersecretaire($CIN_secretaire){
			$sql="SELECT * from secretaire where CIN_secretaire=$CIN_secretaire";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$secretaire=$query->fetch();
				return $secretaire;
			}
			catch (Exception $e){
				echo '<h3>Erreur: '.$e->getMessage().'</h3>';
			}
		}
		function recherchersecretaire($CIN_secretaire){
			$sql="SELECT count(*) AS nbre from secretaire where CIN_secretaire=$CIN_secretaire";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$secretaire=$query->fetch();
				if ($secretaire['nbre'] == 0)
				  echo "<script language=\"javascript\"> alert(\"secretaire $CIN_secretaire inexistant\");</script>";
				else 
				  echo "<script language=\"javascript\"> alert(\"secretaire $CIN_secretaire existe dans la BD\");</script>";
			}
			catch (Exception $e){
				echo '<h3>Erreur: '.$e->getMessage().'</h3>';
			}
		}
		function verification_MDP($Login_secretaire,$MDP_secretaire){
				$sql="SELECT count(*) AS nbre from secretaire where Login_secretaire='$Login_secretaire' and MDP_secretaire='$MDP_secretaire'";
				$db = config::getConnexion();
				try{
					$query=$db->prepare($sql);
					$query->execute();

					$secretaire=$query->fetch();
					if ($secretaire['nbre'] == 0){
					echo "<script language=\"javascript\"> alert(\"Incorrect Login or Password\");</script>";
			
					echo "<html><head><title>Redirection en HTML</title>
                          <meta http-equiv=\"refresh\" content=\"0; URL=.\\front\\login_secretaire.php\">
                          </head><body></body></html>";
					}
					else 
					
					echo  "<html><head><title>Redirection en HTML</title>
                          <meta http-equiv=\"refresh\" content=\"0; URL=.\\showsecretaires.php?login=$Login_secretaire\">
                          </head><body></body></html>";
						  
					}
					catch (Exception $e){
						echo '<h3>Erreur: '.$e->getMessage().'</h3>';
										}
										
				
			}
		
}
		
		
?>