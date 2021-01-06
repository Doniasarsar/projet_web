<?php
    include "../controller/medecinC.php";

	$medecinC = new medecinC();
	$error = "";

	if (
        isset($_POST["nom"]) &&
        isset($_POST["prenom"]) && 
        isset($_POST["numero_de_telephone"])
    ){
		if (
            !empty($_POST["nom"]) && 
            !empty($_POST["prenom"]) && 
            !empty($_POST["numero_de_telephone"])
        ) {
            $medecin = new medecin(
                $_GET['idmedecin'],
				$_POST['nom'],
                $_POST['prenom'], 
                $_POST['numero_de_telephone']
                $_POST['Login_medecin']
            );
            
            $medecinC->supprimermedecin($_GET['idmedecin']);
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
        
        <div id="error">
            <?php echo $error; ?>
        </div>
		
		<?php
			if (isset($_GET['idmedecin'])){
				$medecin = $medecinC->recuperermedecin($_GET['idmedecin']);
		?>
		<form action="" method="POST">
            <table align="center">
                <tr>
                    <td rowspan='3' colspan='1'>Fiche medecin</td>
                    <td>
                        <label for="nom">nom:
                        </label>
                    </td>
                    <td><input type="text" name="nom" id="nom" maxlength="20" value = "<?php echo $medecin['nom']; ?>"></td>
                </tr>
                <tr>
                    <td>
                        <label for="prenom">prenom:
                        </label>
                    </td>
                    <td><input type="text" name="prenom" id="prenom" maxlength="20" value = "<?php echo $medecin['prenom']; ?>"></td>
                </tr>
                
                <tr>
                    <td>
                        <label for="numero_de_telephone">numero_de_telephone:
                        </label>
                    </td>
                    <td>
                        <input type="number" name="numero_de_telephone" id="numero_de_telephone" maxlength="8" value = "<?php echo $medecin['numero_de_telephone']; ?>">
                    </td>
                </tr>
                
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Supprimer" name = "supprimer"> 
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
        </form>
		<?php
		}
        ?>
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