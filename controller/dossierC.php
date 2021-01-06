<?PHP
	include "../config.php";
	include "../Model/Dossier.php";

	class DossierC {
		
		function afficherDossiers(){
			
			$sql="SELECT * FROM dossiermedical";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				echo '<h3>Erreur: '.$e->getMessage().'</h3>';
			}	
		}

		function ajouterDossier($dossier){
			$sql="INSERT INTO dossiermedical (idDossier,date_dossier, description_dossier, observation_dossier) 
			      VALUES (:v1, :v2, :v3, :v4)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
			
				$query->execute([
					'v1' => $dossier->getIdDossier(),
					'v2' => $dossier->getdate_dossier(),
					'v3' => $dossier->getdescription_dossier(),
					'v4' => $dossier->getobservation_dossier()
				]);		
                echo "<script language=\"javascript\"> alert(\"Nouveau dossier a été créé avec succès\");</script>";
				echo "<html><head><title>Redirection en HTML</title>
                          <meta http-equiv=\"refresh\" content=\"0; URL=.\\showDossiers.php\">
				</head><body></body></html>";				
			}
			catch (Exception $e){
				echo '<h3>Erreur: '.$e->getMessage().'</h3>';
			}			
		}
		
		function supprimerDossier($idDossier){
			$sql="DELETE FROM dossiermedical WHERE idDossier= :v1";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':v1',$idDossier);
			echo "<script language=\"javascript\"> alert(\"dossier supprimer avec succès\");</script>";
			
					echo "<html><head><title>Redirection en HTML</title>
                          <meta http-equiv=\"refresh\" content=\"0; URL=.\\showDossiers.php\">
                          </head><body></body></html>";
			try{
				$req->execute();
			}
			catch (Exception $e){
				echo '<h3>Erreur: '.$e->getMessage().'</h3>';
			}
		}
		
		
		function modifierDossier($dossier, $idDossier){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE dossiermedical SET 
						date_dossier = :v1, 
						description_dossier = :v2,
						observation_dossier = :v3
					WHERE idDossier = :v4'
				);
				$query->execute([
					'v1' => $dossier->getdate_dossier(),
					'v2' => $dossier->getdescription_dossier(),
					'v3' => $dossier->getobservation_dossier(),
					'v4' => $dossier->getIdDossier()					
				]);
				echo "<script language=\"javascript\"> alert(\"Dossier modifier avec succès\");</script>";
			
					echo  "<html><head><title>Redirection en HTML</title>
                          <meta http-equiv=\"refresh\" content=\"0; URL=.\\showDossiers.php\">
                          </head><body></body></html>";
			} catch (PDOException $e) {
				echo '<h3>Erreur: '.$e->getMessage().'</h3>';
			}
		}
		function recupererDossier($idDossier){
			$sql="SELECT * from dossiermedical where idDossier=$idDossier";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$dossier=$query->fetch();
				return $dossier;
			}
			catch (Exception $e){
				echo '<h3>Erreur: '.$e->getMessage().'</h3>';
			}
		}
		function rechercherDossier($idDossier){
			$sql="SELECT count(*) AS nbre from dossiermedical where idDossier=$idDossier";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$dossier=$query->fetch();
				if ($dossier['nbre'] == 0)
				{
					echo "<script language=\"javascript\"> alert(\"dossier $idDossier inexistant\");</script>";
					echo  "<html><head><title>Redirection en HTML</title>
                          <meta http-equiv=\"refresh\" content=\"0; URL=.\\dossier.php\">
                          </head><body></body></html>";
				}
				else 
				  echo "<script language=\"javascript\"> alert(\"dossier $idDossier existe dans la BD\");</script>";
			}
			catch (Exception $e){
				echo '<h3>Erreur: '.$e->getMessage().'</h3>';
			}
		}
		function rechercher($idDossier){
		$sql="SElECT * From dossiermedical WHERE idDossier=$idDossier";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	}
?>