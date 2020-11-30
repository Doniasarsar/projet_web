<?php
	include "../config.php";
	require_once "../Model/Consultation.php";

	class ConsultationC {

		function ajouterConsultation($Consultation) {
			$sql = "INSERT INTO consultation (date_rdv, objet_rdv) VALUES (:date_rdv, :objet_rdv)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);

				$query->execute([
					'date_rdv' => $Consultation->getDate_rdv(),
					'objet_rdv' => $Consultation->getObjet_rdv()
				]);
			}
			catch(Exception $e) {
				echo 'Erreur: '.$e->getMessage();
			}
		}

		function afficherConsultations() {
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

		function supprimerConsultation($num_rdv) {
			$sql = "DELETE FROM consultation WHERE num_rdv = :num_rdv";
			$db = config::getConnexion();
			$req = $db->prepare($sql);
			$req->bindValue(':num_rdv',$num_rdv);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

		function modifierConsultation($consultation, $num_rdv) {
			try{
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPADTE consultation SET 
					date_rdv = :date_rdv,
					objet_rdv = :objet_rdv
						WHERE num_rdv = :num_rdv'
				);
			
			$query->execute([
				'date_rdv' => $consultation->getDate_rdv(),
				'objet_rdv' => $consultation->getObjet_rdv(),
				'num_rdv' => $num_rdv
			]);
			echo $query->rowCount() . " records UPDATED successfully <br>";
		    } catch (PDOException $e) {
		    	$e->getMessage();
		    }

	     }
	     
	     function recupererConsultation($num_rdv){
			$sql="SELECT * from consultation where num_rdv = $num_rdv";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$user=$query->fetch();
				return $consultation;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}	    
	}
 ?>