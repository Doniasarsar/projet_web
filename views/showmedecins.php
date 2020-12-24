<?PHP
    
	include "../controller/medecinC.php";
	$medecinC=new medecinC();
	$listemedecins=$medecinC->affichermedecins($_GET['login']);
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
		<button><a href="showDossiers.php">Dossier medical</a></button>
        <hr>
	    <H2>medecin space </H2>
			<?PHP
				
				foreach($listemedecins as $medecin){
					
				  echo "<HR>";
			      echo $medecin['CIN_medecin'];
				  echo "<HR>";
			      echo $medecin['Nom_medecin'];
				  echo "<HR>";
				  echo $medecin['Prenom_medecin'];
				  echo "<HR>";
				  echo $medecin['date_medecin'];
				  echo "<HR>";
				  echo $medecin['specialite'];
				  echo "<HR>";
				  echo $medecin['fonction'];
				  echo "<HR>";
				  echo $medecin['Login_medecin'];
				  echo "<HR>";
				  /*echo $medecin['MDP_medecin'];
				  echo "<HR>";*/
				  echo $medecin['phone_medecin'];
				  echo "<HR>";
				  echo $medecin['Adresse_medecin'];
				  echo "<HR>";
				  echo "</BR>";
				  echo "<a href=\"modifiermedecin.php?CIN_medecin=", $medecin['CIN_medecin'], "\"> Modifier </a>";
				  echo "<a href=\"supprimermedecin.php?CIN_medecin=", $medecin['CIN_medecin'], "\"> Supprimer </a>";
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
