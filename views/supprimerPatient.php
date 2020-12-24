<?php
    include "../controller/patientC.php";

	$patientC = new patientC();
	$error = "";

	if (
        isset($_POST["Nom_patient"]) &&
        isset($_POST["Prenom_patient"]) && 
		isset($_POST["date_patient"]) &&
		isset($_POST["Login_patient"]) && 
		isset($_POST["MDP_patient"]) && 
		isset($_POST["phone_patient"]) &&
        isset($_POST["Adresse_patient"])
    ){
		if (
            !empty($_POST["Nom_patient"]) && 
            !empty($_POST["Prenom_patient"]) && 
			!empty($_POST["date_patient"]) && 
			!empty($_POST["Login_patient"]) && 
			!empty($_POST["MDP_patient"]) &&
			!empty($_POST["phone_patient"]) &&
            !empty($_POST["Adresse_patient"])
        ) {
            $patient = new Patient(
                $_POST['CIN_patient'],
				$_POST['Nom_patient'],
                $_POST['Prenom_patient'], 
                $_POST['date_patient'],			
				0,
				"",
				$_POST['Login_patient'],
				$_POST['MDP_patient'],
				$_POST['phone_patient'],
				$_POST['Adresse_patient'] 
            );
            
            $patientC->supprimerPatient($_GET['CIN_patient']);
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
			if (isset($_GET['CIN_patient'])){
				$patient = $patientC->recupererPatient($_GET['CIN_patient']);
		?>
		<form action="" method="POST">
            <table align="center">
                <tr>
                    <td>
                        <label for="CIN_patient">CIN:
                        </label>
                    </td>
                    <td><input type="number" name="CIN" id="CIN" maxlength="20" disabled value = "<?php echo $patient['CIN_patient']; ?>">
					<input type="hidden" name="CIN_patient" value = "<?php echo $patient['CIN_patient']; ?>"></td>
                </tr>
				<tr>
                    <td>
                        <label for="Nom_patient">Name:
                        </label>
                    </td>
                    <td><input type="text" name="Nom" id="Nom" maxlength="20" disabled value = "<?php echo $patient['Nom_patient']; ?>">
					<input type="hidden" name="Nom_patient" id="Nom_patient" value = "<?php echo $patient['Nom_patient']; ?>"></td>
                </tr>
                <tr>
                    <td>
                        <label for="Prenom_patient">Last name:
                        </label>
                    </td>
                    <td><input type="text" name="Prenom" id="Prenom" maxlength="20" disabled value = "<?php echo $patient['Prenom_patient']; ?>">
					<input type="hidden" name="Prenom_patient" id="Prenom_patient" value = "<?php echo $patient['Prenom_patient']; ?>"></td>
                </tr>
                 <tr>
                    <td>
                        <label for="date_patient">Date of birth:
                        </label>
                    </td>
                    <td><input type="date" name="date" id="date"min="1900-01-01" max="2002-01-01" disabled value = "<?php echo $patient['date_patient']; ?>">
					<input type="hidden" name="date_patient" id="date_patient" value = "<?php echo $patient['date_patient']; ?>"></td>
                </tr>
				<tr>
                    <td>
                        <label for="Login_patient">Login:
                        </label>
                    </td>
                    <td><input type="text" name="Login" id="Login" maxlength="20" disabled value = "<?php echo $patient['Login_patient']; ?>">
					<input type="hidden" name="Login_patient" id="Login_patient" value = "<?php echo $patient['Login_patient']; ?>"></td>
                </tr>
				<tr>
                    <td>
                        <label for="MDP_patient">Password:
                        </label>
                    </td>
                    <td><input type="password" name="MDP" id="MDP" maxlength="20" disabled value = "<?php echo $patient['MDP_patient']; ?>">
					<input type="hidden" name="MDP_patient" id="MDP_patient" value = "<?php echo $patient['MDP_patient']; ?>"></td>
                </tr>
				<tr>
                    <td>
                        <label for="phone_patient">Phone Number:
                        </label>
                    </td>
                    <td><input type="number" name="phone" id="phone" disabled value = "<?php echo $patient['phone_patient']; ?>">
					<input type="hidden" name="phone_patient" id="phone_patient"value = "<?php echo $patient['phone_patient']; ?>"></td>
                </tr>
                <tr>
                    <td>
                        <label for="Adresse_patient">Adresse_patient:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="Adresse" id="Adresse" maxlength="20" disabled value = "<?php echo $patient['Adresse_patient']; ?>">
						<input type="hidden" name="Adresse_patient" id="Adresse_patient"value = "<?php echo $patient['Adresse_patient']; ?>">
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