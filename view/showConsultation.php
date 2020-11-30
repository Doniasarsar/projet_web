<?php
	include "../controller/consultationC.php";

	$consultationC = new ConsultationC();
	$listeConsultations = $consultationC->afficherConsultations();
 ?>

 <html>
 	<head>
 		<meta charset="utf-8">
 		<meta name="viewport" content="width=device-width, initial-scale=1.0">
 		<title>Afficher les consultations</title>
 	</head>
 	<body>
 		<h1><b>MUSIC</b></h1>
 		<table>
 			<?php
 				foreach ($listeConsultations as $consultation) {  
 			 ?>
 			<tr>
 				<b>Consultation</b><?php echo $consultation['idConsultation']; ?>
 				<img src="<?php echo $consultation['image']; ?>" alt = "NOT FOUND">	
 				<br> 
 				<?php echo $consultation['prix']; ?> dt
 				<a href="modifierConsultation.php?idConsultation = <?php echo $consultation['idConsultation']; ?>">Modifier</a>
 				<a href="supprimerConsultation.php?idConsultation = <?php echo $consultation['idConsultation']; ?>"> Supprimer</a> 
 				<br>
 			</tr>
 		</table>
            <?php
            	} 
             ?>
 	</body>
 </html>