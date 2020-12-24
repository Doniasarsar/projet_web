<?php
    include "../controller/dossierC.php";

	$dossierC = new dossierC();
	$error = "";

	if (isset($_POST["idDossier"]) &&
        isset($_POST["date_dossier"]) &&
        isset($_POST["description_dossier"]) && 
        isset($_POST["observation_dossier"])
    ){
		if (!empty($_POST["idDossier"]) &&
            !empty($_POST["date_dossier"]) && 
            !empty($_POST["description_dossier"]) && 
            !empty($_POST["observation_dossier"])
        ) {
            $dossier = new Dossier(
                $_POST['idDossier'],
				$_POST['date_dossier'],
                $_POST['description_dossier'], 
                $_POST['observation_dossier']
            );
            
            $dossierC->ajouterDossier($dossier);
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
		<div class="container"> 
		<button><a href="showDossiers.php">Retour à la liste</a></button>
        <hr>
        <form action="" method="POST">
			<table align="center">
				<tr>
					<td rowspan='4' colspan='1'>Nouveau Dossier</td>
                    <td>
                        <label for="idDossier">idDossier:
                        </label>
                    </td>
                    <td><input type="number" name="idDossier" id="idDossier" maxlength="20" required ></td>
                </tr>
				<tr>
                    <td>
                        <label for="date_dossier">date_dossier:
                        </label>
                    </td>
                    <td><input type="text" name="date_dossier" id="date_dossier" maxlength="20" required></td>
                </tr>
                <tr>
                    <td>
                        <label for="description_dossier">description_dossier:
                        </label>
                    </td>
                    <td><input type="text" name="description_dossier" id="description_dossier" maxlength="100" required></td>
                </tr>
                
                <tr>
                    <td>
                        <label for="observation_dossier">observation_dossier:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="observation_dossier" id="observation_dossier" maxlength="100" required></td>
                </tr>
                
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Ajouter" name = "ajouter"> 
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
        </form>
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