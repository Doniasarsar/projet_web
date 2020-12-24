<?PHP
	include "../config.php";
	include "../Model/medecin.php";

	class medecinC {
		
		function affichermedecins($Login_medecin){
			
			$sql="SELECT * FROM medecin where Login_medecin='$Login_medecin'";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				echo '<h3>Erreur: '.$e->getMessage().'</h3>';
			}	
		}
		function affichermedecin(){
			
			$sql="SELECT * FROM medecin";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				echo '<h3>Erreur: '.$e->getMessage().'</h3>';
			}	
		}

		function ajoutermedecin($medecin){
			$sql="INSERT INTO medecin (CIN_medecin,Nom_medecin,Prenom_medecin,date_medecin,specialite,fonction,Login_medecin,MDP_medecin,phone_medecin,Adresse_medecin) 
			      VALUES (:v1, :v2, :v3, :v4, :v5, :v6, :v7, :v8, :v9, :v10)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'v1' => $medecin->getCIN_medecin(),
					'v2' => $medecin->getNom_medecin(),
					'v3' => $medecin->getPrenom_medecin(),
					'v4' => $medecin->getdate_medecin(),
					'v5' => $medecin->getspecialite(),
					'v6' => $medecin->getnbreMedecin(),
					'v7' => $medecin->getLogin_medecin(),
					'v8' => $medecin->getMDP_medecin(),
					'v9' => $medecin->getphone_medecin(),
					'v10' => $medecin->getAdresse_medecin()
				]);	
				$destinataire = $medecin->getLogin_medecin();
				$sujet = "Activer votre compte" ;
				$entete = "From: TogetherVersusCovid@gmail.com" ;
 				$message = 'Bienvenue sur votre plateform:TogetherVersusCovid,
			
				Mr/Mme '.$medecin->getNom_medecin().$medecin->getPrenom_medecin().
				
				
				'              
				votre login est :'.$medecin->getLogin_medecin().
				'              				
				votre mots de passe est :'.$medecin->getMDP_medecin().
				'
				Pour acceder à votre compte, veuillez cliquer sur le lien ci-dessous
				ou copier/coller dans votre navigateur Internet.
				
				http://localhost/new%20projet%20web/views/front/login_medecin.php';
				
				
 				mail($destinataire, $sujet, $message, $entete);
				echo "<script language=\"javascript\"> alert(\"Nouveau medecin a été créé avec succès\");</script>";
				echo "<html><head><title>Redirection en HTML</title>
                          <meta http-equiv=\"refresh\" content=\"0; URL=.\\showmedecin.php\">
				</head><body></body></html>";
			
			}
			catch (Exception $e){
				echo '<h3>Erreur: '.$e->getMessage().'</h3>';
			}		
			
		}
		
		function supprimermedecin($CIN_medecin){
			$sql="DELETE FROM medecin WHERE CIN_medecin= :v1";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':v1',$CIN_medecin);
			echo "<script language=\"javascript\"> alert(\"medecin supprimer avec succès\");</script>";
			
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
		
		function modifiermedecin($medecin){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE medecin SET 
						Nom_medecin = :v1, 
						Prenom_medecin = :v2,
						date_medecin = :v3,
						Login_medecin = :v4,
						MDP_medecin = :v5,
						phone_medecin = :v6,
						Adresse_medecin = :v7
					WHERE CIN_medecin = :v8'
				);
				$query->execute([
					
					'v1' => $medecin->getNom_medecin(),
					'v2' => $medecin->getPrenom_medecin(),
					'v3' => $medecin->getdate_medecin(),
					'v4' => $medecin->getLogin_medecin(),
					'v5' => $medecin->getMDP_medecin(),
					'v6' => $medecin->getphone_medecin(),
					'v7' => $medecin->getAdresse_medecin(),
					'v8' => $medecin->getCIN_medecin()	
				]);
				$login = $medecin->getLogin_medecin();
				echo "<script language=\"javascript\"> alert(\"medecin modifier avec succès\");</script>";
			
					echo  "<html><head><title>Redirection en HTML</title>
                          <meta http-equiv=\"refresh\" content=\"0; URL=.\\showmedecins.php?login=$login\">
                          </head><body></body></html>";
			} catch (PDOException $e) {
				echo '<h3>Erreur: '.$e->getMessage().'</h3>';
			}
		}
		function recuperermedecin($CIN_medecin){
			$sql="SELECT * from medecin where CIN_medecin=$CIN_medecin";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$medecin=$query->fetch();
				return $medecin;
			}
			catch (Exception $e){
				echo '<h3>Erreur: '.$e->getMessage().'</h3>';
			}
		}
		function recherchermedecin($CIN_medecin){
			$sql="SELECT count(*) AS nbre from medecin where CIN_medecin=$CIN_medecin";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$medecin=$query->fetch();
				if ($medecin['nbre'] == 0)
				  echo "<script language=\"javascript\"> alert(\"medecin $CIN_medecin inexistant\");</script>";
				else 
				  echo "<script language=\"javascript\"> alert(\"medecin $CIN_medecin existe dans la BD\");</script>";
			}
			catch (Exception $e){
				echo '<h3>Erreur: '.$e->getMessage().'</h3>';
			}
		}
		function verification_MDP($Login_medecin,$MDP_medecin){
				$sql="SELECT count(*) AS nbre from medecin where Login_medecin='$Login_medecin' and MDP_medecin='$MDP_medecin'";
				$db = config::getConnexion();
				try{
					$query=$db->prepare($sql);
					$query->execute();

					$medecin=$query->fetch();
					if ($medecin['nbre'] == 0){
					echo "<script language=\"javascript\"> alert(\"Incorrect Login or Password\");</script>";
			
					echo "<html><head><title>Redirection en HTML</title>
                          <meta http-equiv=\"refresh\" content=\"0; URL=.\\front\\Login_medecin.php\">
                          </head><body></body></html>";
					}
					else 
					
					echo  "<html><head><title>Redirection en HTML</title>
                          <meta http-equiv=\"refresh\" content=\"0; URL=.\\showmedecins.php?login=$Login_medecin\">
                          </head><body></body></html>";
						  
					}
					catch (Exception $e){
						echo '<h3>Erreur: '.$e->getMessage().'</h3>';
										}
										
				
			}
		
}
		
		
?>