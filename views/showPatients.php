<?PHP
    
	include "../controller/PatientC.php";
	$PatientC=new PatientC();
	$listePatients=$PatientC->afficherPatients($_GET['login']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <title>Health - Medical Website Template</title>
<!--

Template 2098 Health

http://www.tooplate.com/view/2098-health

-->
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="Tooplate">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="./front/css/bootstrap.min.css">
     <link rel="stylesheet" href="./front/css/font-awesome.min.css">
     <link rel="stylesheet" href="./front/css/animate.css">
     <link rel="stylesheet" href="./front/css/owl.carousel.css">
     <link rel="stylesheet" href="./front/css/owl.theme.default.min.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="./front/css/tooplate-style.css">

</head>

<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

<?php include ('./front/header.html'); ?>
		<div class="container">
		<button><a href="front/index.php">HOME</a></button>
        <hr>
	    <H2>Patient space </H2>
			<?PHP
				
				foreach($listePatients as $patient){
					
				  echo "<HR>";
			      echo $patient['CIN_patient'];
				  echo "<HR>";
			      echo $patient['Nom_patient'];
				  echo "<HR>";
				  echo $patient['Prenom_patient'];
				  echo "<HR>";
				  echo $patient['date_patient'];
				  echo "<HR>";
				  echo $patient['nbreFamilleEnCharge'];
				  echo "<HR>";
				  echo $patient['situationFamiliale'];
				  echo "<HR>";
				  echo $patient['Login_patient'];
				  echo "<HR>";
				  /*echo $patient['MDP_patient'];
				  echo "<HR>";*/
				  echo $patient['phone_patient'];
				  echo "<HR>";
				  echo $patient['Adresse_patient'];
				  echo "<HR>";
				  echo "</BR>";
				  echo "<a href=\"modifierPatient.php?CIN_patient=", $patient['CIN_patient'], "\"> Modifier </a>";
				  echo "<a href=\"supprimerPatient.php?CIN_patient=", $patient['CIN_patient'], "\"> Supprimer </a>";
				}
			?>
			</div>
	 <!-- SCRIPTS -->
     <script src="./front/js/jquery.js"></script>
     <script src="./front/js/bootstrap.min.js"></script>
     <script src="./front/js/jquery.sticky.js"></script>
     <script src="./front/js/jquery.stellar.min.js"></script>
     <script src="./front/js/wow.min.js"></script>
     <script src="./front/js/smoothscroll.js"></script>
     <script src="./front/js/owl.carousel.min.js"></script>
     <script src="./front/js/custom.js"></script>

</body>
</html>
