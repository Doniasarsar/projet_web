<?php
    include "prescriptionC.php";

	$prescriptionC = new prescriptionC();
	$error = "";

	if (
        isset($_POST["num_pres"]) 
    ){
		if (
            !empty($_POST["num_pres"]) 
        ) {
            $prescription = new prescription(
                $_POST['num_pres'],
				'',
				'',
				''
            );
            
            $prescriptionC->rechercherprescription($_POST['num_pres']);
        }
        else
            $error = "Information Manquante";
	}

?>
<html>
	<head>
		<title>Rechercher prescription</title>
	</head>
	<body>
		<button><a href="showprescriptions.php">Retour à la liste</a></button>
        <hr>
        <form action="" method="POST">
			<table align="center">
				<tr>
                    <td>
                        <label for="num_pres">num_pres a rechercher:
                        </label>
                    </td>
                    <td><input type="number" name="num_pres" id="num_pres" maxlength="20" ></td>
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
		
	</body>
</html>