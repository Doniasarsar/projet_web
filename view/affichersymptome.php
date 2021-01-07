<?PHP
	include "../controller/symptomec.php";

	$symptomec=new symptomec();
	$liste=$symptomec->affichersymptome();

?>

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> Afficher Liste symptome </title>
    </head>
    <body>
		<button><a href="connexionsymptome.php">Ajouter une symptome </a></button>
		<hr>
		<table border=1 align = 'center'>
			<tr>
				<th>code symptome</th>
				<th>libelle symptome</th>
				<th>description symptome</th>
				<th>valeur symptome </th>
				<th>supprimer</th>
				<th>modifier</th>
			</tr>

			<?PHP
				foreach($liste as $symptome){
			?>
				<tr>
					<td><?PHP echo $symptome['code_sympt']; ?></td>
					<td><?PHP echo $symptome['libelle_sympt']; ?></td>
					<td><?PHP echo $symptome['description_sympt']; ?></td>
					<td><?PHP echo $symptome['valeur_sympt']; ?></td>
					
					<td>
						<form method="POST" action="supprimersymptome.php">
						<input type="submit" name="supprimer" value="supprimer">
						<input type="hidden" value=<?PHP echo $symptome['code_sympt']; ?> name="code_sympt">
						</form>
					</td>
					<td>
						<a href="modifiersymptome.php?code_sympt=<?PHP echo $symptome['code_sympt']; ?>"> Modifier </a>
					</td>
				</tr>
			<?PHP
				}
			?>
		</table>
	</body>
</html>