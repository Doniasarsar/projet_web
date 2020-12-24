<?php
    include "../controller/secretaireC.php";

	$secretaireC = new secretaireC();
	$error = "";

	if (
        isset($_POST["Nom_secretaire"]) &&
        isset($_POST["Prenom_secretaire"]) && 
		isset($_POST["date_secretaire"]) &&
		isset($_POST["Login_secretaire"]) && 
		isset($_POST["MDP_secretaire"]) && 
		isset($_POST["phone_secretaire"]) &&
        isset($_POST["Adresse_secretaire"])
    ){
		if (
            !empty($_POST["Nom_secretaire"]) && 
            !empty($_POST["Prenom_secretaire"]) && 
			!empty($_POST["date_secretaire"]) && 
			!empty($_POST["Login_secretaire"]) && 
			!empty($_POST["MDP_secretaire"]) &&
			!empty($_POST["phone_secretaire"]) &&
            !empty($_POST["Adresse_secretaire"])
        ) {
            $secretaire = new secretaire(
                $_POST['CIN_secretaire'],
				$_POST['Nom_secretaire'],
                $_POST['Prenom_secretaire'], 
                $_POST['date_secretaire'],
				"",			
				0,
				$_POST['Login_secretaire'],
				$_POST['MDP_secretaire'],
				$_POST['phone_secretaire'],
				$_POST['Adresse_secretaire'] 
            );
            
            $secretaireC->supprimersecretaire($_GET['CIN_secretaire']);
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

		<form>
			<input type = "button" value = "Retour à la liste"  onclick = "history.back()">
		</form>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
		
		<?php
			if (isset($_GET['CIN_secretaire'])){
				$secretaire = $secretaireC->recuperersecretaire($_GET['CIN_secretaire']);
		?>
		<form action="" method="POST">
            <table align="center">
                <tr>
                    <td>
                        <label for="CIN_secretaire">CIN:
                        </label>
                    </td>
                    <td><input type="number" name="CIN" id="CIN" maxlength="20" disabled value = "<?php echo $secretaire['CIN_secretaire']; ?>">
					<input type="hidden" name="CIN_secretaire" value = "<?php echo $secretaire['CIN_secretaire']; ?>"></td>
                </tr>
				<tr>
                    <td>
                        <label for="Nom_secretaire">Name:
                        </label>
                    </td>
                    <td><input type="text" name="Nom" id="Nom" maxlength="20" disabled value = "<?php echo $secretaire['Nom_secretaire']; ?>">
					<input type="hidden" name="Nom_secretaire" id="Nom_secretaire" value = "<?php echo $secretaire['Nom_secretaire']; ?>"></td>
                </tr>
                <tr>
                    <td>
                        <label for="Prenom_secretaire">Last name:
                        </label>
                    </td>
                    <td><input type="text" name="Prenom" id="Prenom" maxlength="20" disabled value = "<?php echo $secretaire['Prenom_secretaire']; ?>">
					<input type="hidden" name="Prenom_secretaire" id="Prenom_secretaire" value = "<?php echo $secretaire['Prenom_secretaire']; ?>"></td>
                </tr>
                 <tr>
                    <td>
                        <label for="date_secretaire">Date of birth:
                        </label>
                    </td>
                    <td><input type="date" name="date" id="date"min="1900-01-01" max="2002-01-01" disabled value = "<?php echo $secretaire['date_secretaire']; ?>">
					<input type="hidden" name="date_secretaire" id="date_secretaire" value = "<?php echo $secretaire['date_secretaire']; ?>"></td>
                </tr>
				<tr>
                    <td>
                        <label for="Login_secretaire">Login:
                        </label>
                    </td>
                    <td><input type="text" name="Login" id="Login" maxlength="20" disabled value = "<?php echo $secretaire['Login_secretaire']; ?>">
					<input type="hidden" name="Login_secretaire" id="Login_secretaire" value = "<?php echo $secretaire['Login_secretaire']; ?>"></td>
                </tr>
				<tr>
                    <td>
                        <label for="MDP_secretaire">Password:
                        </label>
                    </td>
                    <td><input type="password" name="MDP" id="MDP" maxlength="20" disabled value = "<?php echo $secretaire['MDP_secretaire']; ?>">
					<input type="hidden" name="MDP_secretaire" id="MDP_secretaire" value = "<?php echo $secretaire['MDP_secretaire']; ?>"></td>
                </tr>
				<tr>
                    <td>
                        <label for="phone_secretaire">Phone Number:
                        </label>
                    </td>
                    <td><input type="number" name="phone" id="phone" disabled value = "<?php echo $secretaire['phone_secretaire']; ?>">
					<input type="hidden" name="phone_secretaire" id="phone_secretaire"value = "<?php echo $secretaire['phone_secretaire']; ?>"></td>
                </tr>
                <tr>
                    <td>
                        <label for="Adresse_secretaire">Adresse_secretaire:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="Adresse" id="Adresse" maxlength="20" disabled value = "<?php echo $secretaire['Adresse_secretaire']; ?>">
						<input type="hidden" name="Adresse_secretaire" id="Adresse_secretaire"value = "<?php echo $secretaire['Adresse_secretaire']; ?>">
                    </td>
                </tr>
                <?php echo "vous souhaitez vraimment supprimer ce compte ?"?>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Supprimer" name = "Supprimer"> 
                    </td>
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
