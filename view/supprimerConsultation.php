<?php
	include "../Controller/consultationC.php";

	$consultationC = new ConsultationC();

	if(isset($_GET["num_rdv"])){
		echo "2";
		$consultationC->supprimerConsultation($_GET["num_rdv"]);
		header('Location:showConsultations.php');
	}
 ?>