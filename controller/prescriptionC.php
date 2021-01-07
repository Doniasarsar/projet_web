<?PHP
	include "config.php";
	include "prescription.php";

	class prescriptionC {
		
		function afficherprescriptions(){
			
			$sql="SELECT * FROM prescription";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}

		function ajouterprescription($prescription){
			$sql="INSERT INTO prescription (desc_pres, date_pres, nom_med, dosage_med,desc_med,motif_hosp,date_hosp,type_analy,nature_analy,desc_analy) 
			      VALUES (:a1, :v2, :v3, :v4, :v5, :v6, :v7, :v8, :v9, :v10)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
			
				$query->execute([
					'a1' => $prescription->getdesc_pres(),
					'v2' => $prescription->getdate_pres(),
					'v3' => $prescription->getnom_med(),
					'v4' => $prescription->getdosage_med(),
					'v5' => $prescription->getdesc_med(),
					'v6' => $prescription->getmotif_hosp(),
					'v7' => $prescription->getdate_hosp(),
					'v8' => $prescription->gettype_analy(),
					'v9' => $prescription->getnature_analy(),
					'v10' => $prescription->getdesc_analy()
					
				]);		
                echo " Nouveau prescription a été créé avec succès <br>";				
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		function supprimerprescription($num_pres){
			$sql="DELETE FROM prescription WHERE num_pres= :v1";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':v1',$num_pres);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifierprescription($prescription, $num_pres){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE prescription SET 
					    desc_pres = :a1,
						date_pres = :v1, 
						nom_med = :v2,
						dosage_med = :v3,
						desc_med = :v4,
						motif_hosp = :v5,
						date_hosp = :v6,
						type_analy = :v7,
						nature_analy = :v8,
						desc_analy = :v9
					WHERE num_pres = :v10'
				);
				$query->execute([
					'a1' => $prescription->getdesc_pres(),
					'v1' => $prescription->getdate_pres(),
					'v2' => $prescription->getnom_med(),
					'v3' => $prescription->getdosage_med(),
					'v4' => $prescription->getdesc_med(),
					'v5' => $prescription->getmotif_hosp(),
					'v6' => $prescription->getdate_hosp(),
					'v7' => $prescription->gettype_analy(),
					'v8' => $prescription->getnature_analy(),
					'v9' => $prescription->getdesc_analy(),
					'v10' => $prescription->getnum_pres()					
				]);
				echo $query->rowCount() . " prescriptions modifiés avec succès <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function recupererprescription($num_pres){
			$sql="SELECT * from prescription where num_pres=$num_pres";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$prescription=$query->fetch();
				return $prescription;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function rechercherprescription($num_pres){
			$sql="SELECT count(*) AS nbre from prescription where num_pres=$num_pres";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$prescription=$query->fetch();
				if ($prescription['nbre'] == 0)
				  echo "<script language=\"javascript\"> alert(\"prescription $num_pres inexistant\");</script>";
				else 
				  echo "<script language=\"javascript\"> alert(\"prescription $num_pres existe dans la BD\");</script>";
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
	}
?>