<?php
    include "../controller/medecinC.php";

	$medecinC = new medecinC();
	$error = "";
	if (
        isset($_POST["Nom_medecin"]) &&
        isset($_POST["Prenom_medecin"]) && 
		isset($_POST["date_medecin"]) &&
		isset($_POST["Login_medecin"]) && 
		isset($_POST["MDP_medecin"]) && 
		isset($_POST["phone_medecin"]) &&
        isset($_POST["Adresse_medecin"])
    ){
		if (
            !empty($_POST["Nom_medecin"]) && 
            !empty($_POST["Prenom_medecin"]) && 
			!empty($_POST["date_medecin"]) && 
			!empty($_POST["Login_medecin"]) && 
			!empty($_POST["MDP_medecin"]) &&
			!empty($_POST["phone_medecin"]) &&
            !empty($_POST["Adresse_medecin"])
        ) {
            $medecin = new medecin(
                $_POST['CIN_medecin'],
				$_POST['Nom_medecin'],
                $_POST['Prenom_medecin'], 
                $_POST['date_medecin'],
				"",			
				0,
				$_POST['Login_medecin'],
				$_POST['MDP_medecin'],
				$_POST['phone_medecin'],
				$_POST['Adresse_medecin'] 
            );
            $medecinC->modifiermedecin($medecin);
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
			if (isset($_GET['CIN_medecin'])){
				$medecin = $medecinC->recuperermedecin($_GET['CIN_medecin']);
		?>
		<form action="" method="POST">
            <table align="center">
                <tr>
                    <td>
                        <label for="CIN_medecin">CIN:
                        </label>
                    </td>
                    <td><input type="number" name="CIN" id="CIN" maxlength="8" disabled value = "<?php echo $medecin['CIN_medecin']; ?>">
					<input type="hidden" name="CIN_medecin" id="CIN_medecin" value = "<?php echo $medecin['CIN_medecin']; ?>"></td></td>
                </tr>
				<tr>
                    <td>
                        <label for="Nom_medecin">Name:
                        </label>
                    </td>
                    <td><input type="text" name="Nom_medecin" id="Nom_medecin" minlength="3" maxlength="20" value = "<?php echo $medecin['Nom_medecin']; ?>"></td>
                </tr>
                <tr>
                    <td>
                        <label for="Prenom_medecin">Last name:
                        </label>
                    </td>
                    <td><input type="text" name="Prenom_medecin" id="Prenom_medecin" minlength="3" maxlength="20" value = "<?php echo $medecin['Prenom_medecin']; ?>"></td>
                </tr>
                 <tr>
                    <td>
                        <label for="date_medecin">Date of birth:
                        </label>
                    </td>
                    <td><input type="date" name="date_medecin" id="date_medecin"min="1900-01-01" max="2002-01-01" value = "<?php echo $medecin['date_medecin']; ?>"></td>
                </tr>
				<tr>
                    <td>
                        <label for="Login_medecin">Login:
                        </label>
                    </td>
                    <td><input type="text" name="Login_medecin" id="Login_medecin" value = "<?php echo $medecin['Login_medecin']; ?>"></td>
                </tr>
				<tr>
                    <td>
                        <label for="MDP_medecin">Password:
                        </label>
                    </td>
                    <td><input type="password" name="MDP_medecin" id="MDP_medecin" minlength="8" maxlength="20" value = "<?php echo $medecin['MDP_medecin']; ?>"></td>
                </tr>
				<tr>
                    <td>
                        <label for="phone_medecin">Phone Number:
                        </label>
                    </td>
                    <td><input type="number" class="form-control" id="phone_medecin" name="phone_medecin" value = "<?php echo $medecin['phone_medecin']; ?>"></td>
                </tr>
				<tr>
                    <td>
                        <label for="Adresse_medecin">Adress:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="Adresse_medecin" id="Adresse_medecin" minlength="8" maxlength="100" value = "<?php echo $medecin['Adresse_medecin']; ?>">
                    </td>
                </tr>
                
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Modifier" name = "modifer"> 
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