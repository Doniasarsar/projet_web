<?PHP
	include "prescriptionC.php";

	$prescriptionC=new prescriptionC();
	$listeprescriptions=$prescriptionC->afficherprescriptions();

	
	

?>

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> Afficher Liste prescriptions </title>
    </head>
    <body>
	    <H1>Listes Des prescriptions</H1>
		<a href="ajouterprescription.php"> Ajouter </a>
		</BR>
		<a href="rechercherprescription.php"> rechercher </a>
		
			<?PHP
				foreach($listeprescriptions as $prescription){
					
				  echo "<HR>";
				  echo $prescription['num_pres'];
				  echo "<HR>";
				  echo $prescription['desc_pres'];
				  echo "<HR>";
			      echo $prescription['date_pres'];
				  echo "<HR>";
				  echo $prescription['nom_med'];
				  echo "<HR>";
				  echo $prescription['dosage_med'];
				  echo "<HR>";
				  echo $prescription['desc_med'];
				  echo "<HR>";
				  echo $prescription['motif_hosp'];
				  echo "<HR>";
				  echo $prescription['date_hosp'];
				  echo "<HR>";
				  echo $prescription['type_analy'];
				  echo "<HR>";
				  echo $prescription['nature_analy'];
				  echo "<HR>";
				  echo $prescription['desc_analy'];
				  echo "</BR>";
	
				  echo "<a href=\"modifierprescription.php?num_pres=", $prescription['num_pres'], "\"> Modifier </a>";
				  echo "<a href=\"supprimerprescription.php?num_pres=", $prescription['num_pres'], "\"> Supprimer </a>";
				}
			?>
	</body>
</html>
