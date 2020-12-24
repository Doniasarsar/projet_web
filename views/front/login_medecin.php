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

     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/animate.css">
     <link rel="stylesheet" href="css/owl.carousel.css">
     <link rel="stylesheet" href="css/owl.theme.default.min.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css/tooplate-style.css">

</head>

<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">


<?php include ('header.html'); ?>
<div class="container">
		<button><a href="index.php">HOME</a></button>
        <hr>
				<form id="appointment-form" role="form" method="post" action="../verifier_mdp_medecin.php">
					<tr>
						<hr><td rowspan='4' colspan='1'>Connection medecin</td><hr>
						<td>
							<label for="login">Login:
							</label>
						</td>
						<td><input type="text" id="Login_medecin" name="Login_medecin" placeholder="ex: aaa@aaa.com" required pattern=".+@.+."></td>
						<td>
							<label for="password">Password:
							</label>
						</td><input type="password" id="MDP_medecin" name="MDP_medecin" placeholder="********" required minlength="8" maxlength="20"></td>
						<td>
					</tr>
					<tr>
						<td></td>
						<td>
							<input type="submit" value="connect" name = "connect"> 
						</td>
						<td>
							<input type="reset" value="Annuler" >
						</td>
					</tr>
				</form>  
				</div>

     <!-- SCRIPTS -->
     <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/jquery.sticky.js"></script>
     <script src="js/jquery.stellar.min.js"></script>
     <script src="js/wow.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/custom.js"></script>

</body>
</html>