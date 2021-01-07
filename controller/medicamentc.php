<?PHP
	include "../config.php";
	require_once '../model/medicament.php';

	class medicamentc {
		
		function ajoutermedicament($medicament){
			$sql="INSERT INTO medicament (id_med, nom_med, dosage_med, desc_med) 
			VALUES ('',:nom_med,:dosage_med, :desc_med)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
			
				$query->execute([
					'nom_med' => $medicament->getnom_med(),
					'dosage_med' => $medicament->getdosage_med(),
					'desc_med' => $medicament->getdesc_med()
					
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		function affichermedicament(){
			
			$sql="SELECT * FROM medicament";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}

		function supprimermedicament($id_med){
			$sql="DELETE FROM medicament WHERE id_med= :id_med";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id_med',$id_med);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
	
		function modifiermedicament($medicament, $id_med){
			// var_dump($id_med, $medicament);
			// die();
			
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE medicament SET 
					 nom_med = :nom_med, 
						dosage_med = :dosage_med,
						desc_med = :desc_med
						
					WHERE id_med = :id_med'
			
				);
			
				if ($query->execute([
					'nom_med' => $medicament->getnom_med(),
					'dosage_med' => $medicament->getdosage_med(),
					'desc_med' => $medicament->getdesc_med(),
					
					
					'id_med' => $id_med
				]))
				{

					echo "success";
		
				}
				else echo "failure";

				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
	
				echo $e->getMessage();
			
			}
		}
		function recuperermedicament($id_med){
			$sql="SELECT * from medicament where id_med=$id_med";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$med=$query->fetch();
				return $med;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

		
	}

?>
<!-- SCRIPTS -->
<script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/jquery.sticky.js"></script>
     <script src="js/jquery.stellar.min.js"></script>
     <script src="js/wow.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/custom.js"></script>