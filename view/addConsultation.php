<?php
	include_once '../Model/Consultation.php';
	include_once '../Controller/consultationC.php';

	$error = "";
	$consultation = null;

	$consultationC = new ConsultationC();
	if (
		isset($_POST['date_rdv']) && 
        isset($_POST["objet_rdv"])
	) {
		if (!empty($_POST["date_rdv"]) && 
            !empty($_POST["objet_rdv"])
		) {
			$consultation = new ConsultationC(
				$_POST['date_rdv'],
				$_POST['objet_rdv']
			);
			$consultationC->ajouterConsultation($consultation);
			header('Location:showConsultation.php');
		}
		else
			$error = "Missing information";
	}
 ?>

<!DOCTYPE html>
<html lang = "en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add Consultation</title>
</head>
<body>

	<div id="error">
		<?php echo $error; ?>
	</div>
	
		<form action="" method="POST">
			<h1><b>New Consultation</b></h1>
			<label for="date_rdv">Date_rdv:</label><br>
			<input type="date" name="date_rdv" id="date_rdv" value="2020-12-01" min="2020-12-01" ><br>
			<label>objet_rdv:</label>
			<input type="text" name="objet_rdv" id="objet_rdv">
			<br><br>
			<input type="submit" name="submit">	
		</form>
</body>
</html>