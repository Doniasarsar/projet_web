<?PHP
	include "consultationC.php";

	$consultationC=new consultationC();
	$listeconsultations=$consultationC->afficherconsultations();

	
	

?>

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> Afficher Liste consultations </title>
    </head>
    <body>
	    <H1>Listes Des Consultations</H1>
		<a href="ajouterconsultation.php"> Ajouter </a>
		</BR>
		<a href="rechercherconsultation.php"> rechercher </a>
		
			<?PHP
				foreach($listeconsultations as $consultation){
					
				  echo "<HR>";
				  echo $consultation['numRdv'];
				  echo "<HR>";
			      echo $consultation['dateRdv'];
				  echo "<HR>";
			      echo $consultation['heureRdv'];
				  echo "</BR>";
				  echo $consultation['objetRdv'];
				  echo "<a href=\"modifierconsultation.php?numRdv=", $consultation['numRdv'], "\"> Modifier </a>";
				  echo "<a href=\"supprimerconsultation.php?numRdv=", $consultation['numRdv'], "\"> Supprimer </a>";
				}
			?>
	</body>
</html>
