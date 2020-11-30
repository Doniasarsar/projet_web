<?php
	include "../Controller/consultationC.php";
	include "../Model/Consultation.php";

	$consultationC = new ConsultationC();
	$error = "";

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
		$consultationC->modifierConsultation($consultation, $_GET['num_rdv']); 
		header('refresh:5;url = showConsultation.php');
	}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Change Consultation</title>
 </head>
 <body>
 	<?php
 		if (isset($GET['num_rdv'])){
 			$consultation = $consultationC->recupererConsultation($_GET['num_rdv']);
 		} 
 	 ?>

 	 <form action="" method="POST">
			<h1><b>New Consultation</b></h1>
			<label for="num_rdv" >num_rdv:</label>
			<input type="int" name="num_rdv" value="<?php echo $consultation['num_rdv'] ?>" disabled>
			<label for="date_rdv">Date_rdv:</label><br>
			<input type="date" name="date_rdv" id="date_rdv"  min="2020-12-01" value="<?php echo $consultation['date_rdv'] ?>"><br>
			<label>objet_rdv:</label>
			<input type="text" name="objet_rdv" id="objet_rdv">
			<br><br>
			<input type="submit" name="submit">	
		</form>
 </body>
 </html>