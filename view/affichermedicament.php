<?PHP
	include "../controller/medicamentc.php";

	$medicamentc=new medicamentc();
	$listeUsers=$medicamentc->affichermedicament();

?>

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> Afficher Liste medicament </title>
    </head>
    <body>
		<button><a href="connexionmedicament.php">Ajouter une medicament </a></button>
		<hr>
		<table border=1 align = 'center'>
			<tr>
				<th>id medicament</th>
				<th>nom medicament</th>
	<th>dosage medicament </th>			
			<th>description medicament</th>
			
				<th>supprimer</th>
				<th>modifier</th>
			</tr>

			<?PHP
				foreach($listeUsers as $medicament){
			?>
				<tr>
					<td><?PHP echo $medicament['id_med']; ?></td>
					<td><?PHP echo $medicament['nom_med']; ?></td>
					<td><?PHP echo $medicament['dosage_med']; ?></td>
					<td><?PHP echo $medicament['desc_med']; ?></td>
					
					<td>
						<form method="POST" action="supprimermedicament.php">
						<input type="submit" name="supprimer" value="supprimer">
						<input type="hidden" value=<?PHP echo $medicament['id_med']; ?> name="id_med">
						</form>
					</td>
					<td>
						<a href="modifiermedicament.php?id_med=<?PHP echo $medicament['id_med']; ?>"> Modifier </a>
					</td>
				</tr>
			<?PHP
				}
			?>
		</table>
	</body>
</html>