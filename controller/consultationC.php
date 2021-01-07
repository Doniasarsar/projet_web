<?PHP
	include "config.php";
	include "consultation.php";

	class consultationC {
		
		function afficherconsultations(){
			
			$sql="SELECT * FROM consultation";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}

		function ajouterconsultation($consultation){
			$sql="INSERT INTO consultation ( dateRdv, objetRdv, heureRdv) 
			      VALUES ( :v2, :v3, :v4)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
			
				$query->execute([
					//'v1' => $consultation->getnumRdv(),
					'v2' => $consultation->getdateRdv(),
					'v3' => $consultation->getobjetRdv(),
					'v4' => $consultation->getheureRdv()
				]);	
					
                echo " Nouveau consultation a été créé avec succès <br>";				
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		function supprimerconsultation($numRdv){
			$sql="DELETE FROM consultation WHERE numRdv= :v1";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':v1',$numRdv);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifierconsultation($consultation, $numRdv){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE consultation SET 
						dateRdv = :v1, 
						objetRdv = :v2,
						heureRdv = :v3
					WHERE numRdv = :v4'
				);
				$query->execute([
					'v1' => $consultation->getdateRdv(),
					'v2' => $consultation->getobjetRdv(),
					'v3' => $consultation->getheureRdv(),
					'v4' => $consultation->getnumRdv()					
				]);
				echo $query->rowCount() . " consultations modifiés avec succès <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function recupererconsultation($numRdv){
			$sql="SELECT * from consultation where numRdv=$numRdv";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$consultation=$query->fetch();
				return $consultation;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function rechercherconsultation($numRdv){
			$sql="SELECT count(*) AS nbre from consultation where numRdv=$numRdv";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$consultation=$query->fetch();
				if ($consultation['nbre'] == 0)
				  echo "<script language=\"javascript\"> alert(\"consultation $numRdv inexistant\");</script>";
				else 
				  echo "<script language=\"javascript\"> alert(\"consultation $numRdv existe dans la BD\");</script>";
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

		function triconsultation(){
			$sql="SELECT * FROM consultation order by dateRdv";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}
	}
?>