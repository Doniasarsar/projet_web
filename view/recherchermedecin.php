<?php
    include "../controller/medecinC.php";

	$medecinC = new medecinC();
	$error = "";

	if (
        isset($_POST["idmedecin"]) 
    ){
		if (
            !empty($_POST["idmedecin"]) 
        ) {
            $medecin = new medecin(
                $_POST['idmedecin'],
				'',
				'',
				0
            );
            
            $medecinC->recherchermedecin($_POST['idmedecin']);
        }
        else
            $error = "Information Manquante";
	}

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
		<button><a href="showmedecins.php">Retour à la liste</a></button>
        <hr>
        <form action="" method="POST">
			<table align="center">
				<tr>
                    <td>
                        <label for="idmedecin">idmedecin a rechercher:
                        </label>
                    </td>
                    <td><input type="number" name="idmedecin" id="idmedecin" maxlength="20" ></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Rechercher" name = "rechercher"> 
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
        </form>
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