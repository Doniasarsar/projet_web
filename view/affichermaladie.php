<?PHP
	include "../controller/maladieC.php";

	$maladieC=new maladieC();
	$listeUsers=$maladieC->affichermaladie();

?>


    <body>
		<button><a href="connexion.php">Ajouter une maladie </a></button>
		<hr>
		<table border=1 align = 'center'>
			<tr>
				<th>Id</th>
				<th>Nom maladie</th>
				<th>type maladie</th>
				<th>gravite maladie </th>
				<th>description maladie</th>
				<th>supprimer</th>
				<th>modifier</th>
			</tr>

			<?PHP
				foreach($listeUsers as $maladie){
			?>
				<tr>
					<td><?PHP echo $maladie['id_maladie']; ?></td>
					<td><?PHP echo $maladie['nom_maladie']; ?></td>
					<td><?PHP echo $maladie['type_maladie']; ?></td>
					<td><?PHP echo $maladie['gravite_maladie']; ?></td>
					<td><?PHP echo $maladie['desc_maladie']; ?></td>
					<td>
						<form method="POST" action="supprimermaladie.php">
						<input type="submit" name="supprimer" value="supprimer">
						<input type="hidden" value=<?PHP echo $maladie['id_maladie']; ?> name="id_maladie">
						</form>
					</td>
					<td>
						<a href="modifiermaladie.php?id_maladie=<?PHP echo $maladie['id_maladie']; ?>"> Modifier </a>
					</td>
				</tr>
			<?PHP
				}
			?>
		</table>
	</body>
	
</html>