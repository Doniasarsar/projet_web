<?PHP
	include "../config.php";
	include "../Model/medecin.php";

	class medecinC {
		
		function affichermedecins(){
			
			$sql="SELECT * FROM medecin";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}

		function ajoutermedecin($medecin){
			$sql="INSERT INTO medecin (idmedecin, nom, prenom, numero_de_telephone,Login_medecin) 
			      VALUES (:v1, :v2, :v3, :v4, :v5)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
			
				$query->execute([
					'v1' => $medecin->getIdmedecin(),
					'v2' => $medecin->getnom(),
					'v3' => $medecin->getprenom(),
					'v4' => $medecin->getnumero_de_telephone(),
					'v5' => $medecin->getLogin_medecin()
				]);
				$destinataire = $medecin->getLogin_medecin();
				$sujet = "Activer votre compte" ;
				$entete = "From: mestiriyassine69@gmail.com" ;
 				$message = 'Bienvenue sur TogetherVersusCovid,'.$medecin->getLogin_medecin();
				 ini_set('SMTP','smtp.topnet.tn');
 				mail($destinataire, $sujet, $message, $entete);
						
                echo " Nouveau medecin a été créé avec succès <br>";				
			}
			
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		function supprimermedecin($idmedecin){
			$sql="DELETE FROM medecin WHERE idmedecin= :v1";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':v1',$idmedecin);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifiermedecin($medecin, $idmedecin){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE medecin SET 
						nom = :v1, 
						prenom = :v2,
						numero_de_telephone = :v3
					WHERE idmedecin = :v4'
				);
				$query->execute([
					'v1' => $medecin->getnom(),
					'v2' => $medecin->getprenom(),
					'v3' => $medecin->getnumero_de_telephone(),
					'v4' => $medecin->getIdmedecin(),
					'v5' => $medecin->getLogin_medecin()					
				]);
				echo $query->rowCount() . " medecins modifiés avec succès <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function recuperermedecin($idmedecin){
			$sql="SELECT * from medecin where idmedecin=$idmedecin";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$medecin=$query->fetch();
				return $medecin;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function recherchermedecin($idmedecin){
			$sql="SELECT count(*) AS nbre from medecin where idmedecin=$idmedecin";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$medecin=$query->fetch();
				if ($medecin['nbre'] == 0)
				  echo "<script language=\"javascript\"> alert(\"medecin $idmedecin inexistant\");</script>";
				else 
				  echo "<script language=\"javascript\"> alert(\"medecin $idmedecin existe dans la BD\");</script>";
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
	}
?>