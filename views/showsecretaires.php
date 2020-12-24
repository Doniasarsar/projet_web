<?PHP
    
	include "../controller/secretaireC.php";
	$secretaireC=new secretaireC();
	$listesecretaires=$secretaireC->affichersecretaires($_GET['login']);
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
	    <H2>secretaire space </H2>
			<?PHP
				
				foreach($listesecretaires as $secretaire){
					
				  echo "<HR>";
			      echo $secretaire['CIN_secretaire'];
				  echo "<HR>";
			      echo $secretaire['Nom_secretaire'];
				  echo "<HR>";
				  echo $secretaire['Prenom_secretaire'];
				  echo "<HR>";
				  echo $secretaire['date_secretaire'];
				  echo "<HR>";
				  echo $secretaire['specialite'];
				  echo "<HR>";
				  echo $secretaire['nbreMedecin'];
				  echo "<HR>";
				  echo $secretaire['Login_secretaire'];
				  echo "<HR>";
				  /*echo $secretaire['MDP_secretaire'];
				  echo "<HR>";*/
				  echo $secretaire['phone_secretaire'];
				  echo "<HR>";
				  echo $secretaire['Adresse_secretaire'];
				  echo "<HR>";
				  echo "</BR>";
				  echo "<a href=\"modifiersecretaire.php?CIN_secretaire=", $secretaire['CIN_secretaire'], "\"> Modifier </a>";
				  echo "<a href=\"supprimersecretaire.php?CIN_secretaire=", $secretaire['CIN_secretaire'], "\"> Supprimer </a>";
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
