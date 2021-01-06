<?php
    include "../controller/specialiteC.php";

	$specialiteC = new specialiteC();
	$error = "";

	if (
        isset($_POST["libelleSpecialite"]) &&
        isset($_POST["descSpecialite"]) 
    ){
		if (
            !empty($_POST["libelleSpecialite"]) && 
            !empty($_POST["descSpecialite"]) 
        ) {
            $specialite = new specialite(
                $_GET['idSpecialite'],
				$_POST['libelleSpecialite'],
                $_POST['descSpecialite']

            );
            
            $specialiteC->supprimerspecialite($_GET['idSpecialite']);
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
		<button><a href="showspecialite.php">Retour à la liste</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
		
		<?php
			if (isset($_GET['idSpecialite'])){
				$specialite = $specialiteC->recupererspecialite($_GET['idSpecialite']);
		?>
		<form action="" method="POST">
            <table align="center">
                <tr>
                    <td rowspan='3' colspan='1'>Fiche specialite</td>
                    <td>
                        <label for="libelleSpecialite">libelleSpecialite:
                        </label>
                    </td>
                    <td><input type="text" name="libelleSpecialite" id="libelleSpecialite" maxlength="20" value = "<?php echo $specialite['libelleSpecialite']; ?>"></td>
                </tr>
                <tr>
                    <td>
                        <label for="descSpecialite">descSpecialite:
                        </label>
                    </td>
                    <td><input type="text" name="descSpecialite" id="descSpecialite" maxlength="20" value = "<?php echo $specialite['descSpecialite']; ?>"></td>
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