<?PHP
	include "../config.php";
	include "../Model/specialite.php";

	class specialiteC {
		
		function afficherspecialites(){
			
			$sql="SELECT * FROM specialite";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}

		function ajouterspecialite($specialite){
			$sql="INSERT INTO specialite (idSpecialite, libelleSpecialite, descSpecialite) 
			      VALUES (:v1, :v2, :v3)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
			
				$query->execute([
					'v1' => $specialite->getidSpecialite(),
					'v2' => $specialite->getlibelleSpecialite(),
					'v3' => $specialite->getdescSpecialite(),
			
				]);		
                echo " nouvelle specialite a été créé avec succès <br>";				
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		function supprimerspecialite($idSpecialite){
			$sql="DELETE FROM specialite WHERE idSpecialite= :v1";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':v1',$idSpecialite);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifierspecialite($specialite, $idSpecialite){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE specialite SET 
						libelleSpecialite = :v1, 
						descSpecialite = :v2
					WHERE idSpecialite = :v3'
				);
				$query->execute([
					'v1' => $specialite->getlibelleSpecialite(),
					'v2' => $specialite->getdescSpecialite(),
					'v3' => $specialite->getidSpecialite()					
				]);
				echo $query->rowCount() . " specialites modifiés avec succès <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function recupererspecialite($idSpecialite){
			$sql="SELECT * from specialite where idSpecialite=$idSpecialite";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$specialite=$query->fetch();
				return $specialite;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function rechercherspecialite($idSpecialite){
			$sql="SELECT count(*) AS nbre from specialite where idSpecialite=$idSpecialite";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$specialite=$query->fetch();
				if ($specialite['nbre'] == 0)
				  echo "<script language=\"javascript\"> alert(\"specialite $idSpecialite inexistant\");</script>";
				else 
				  echo "<script language=\"javascript\"> alert(\"specialite $idSpecialite existe dans la BD\");</script>";
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
	}
?>