<?php
    include "prescriptionC.php";

	$prescriptionC = new prescriptionC();
	$error = "";

	if (
        isset($_POST["date_pres"]) &&
        isset($_POST["nom_med"]) && 
        isset($_POST["heureRdv"])
    ){
		if (
            !empty($_POST["date_pres"]) && 
            !empty($_POST["nom_med"]) && 
            !empty($_POST["heureRdv"])
        ) {
            $prescription = new prescription(
                $_GET['num_pres'],
				$_POST['date_pres'],
                $_POST['nom_med'], 
                $_POST['heureRdv']
            );
            
            $prescriptionC->supprimerprescription($_GET['num_pres']);
        }
        else
            $error = "Information Manquante";
	}

?>
<html>
	<head>
		<title>Supprimer prescription</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
		<button><a href="showprescriptions.php">Retour à la liste</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
		
		<?php
			if (isset($_GET['num_pres'])){
				$prescription = $prescriptionC->recupererprescription($_GET['num_pres']);
		?>
		<form action="" method="POST">
            <table align="center">
                <tr>
                    <td rowspan='3' colspan='1'>Fiche prescription</td>
                    <td>
                        <label for="desc_pres">desc_pres:
                        </label>
                    </td>
                    <td><input type="text" name="desc_pres" id="desc_pres" maxlength="100" ></td>
                
                </tr>

                <tr>
                    <td>
                        <label for="date_pres">date_pres:
                        </label>
                    </td>
                    <td><input type="date" name="date_pres" id="date_pres"  min="2020-12-01" value = "<?php echo $prescription['date_pres']; ?>"></td>

                </tr>

                
                <tr>
                    <td>
                        <label for="nom_med">nom_med:
                        </label>
                    </td>
                    <td><input type="text" name="nom_med" id="nom_med" maxlength="20" value = "<?php echo $prescription['nom_med']; ?>"></td>
                </tr>
                
                <tr>
                    <td>
                        <label for="dosage_med">dosage_med:
                        </label>
                    </td>
                    <td>
                        <input type="number" name="dosage_med" id="dosage_med" <?php echo $prescription['dosage_med']; ?>">
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <label for="desc_med">desc_med:
                        </label>
                    </td>
                    <td><input type="text" name="desc_med" id="desc_med" maxlength="100" ></td>
                </tr>

                <tr>
                    <td>
                        <label for="motif_hosp">motif_hosp:
                        </label>
                    </td>
                    <td><input type="text" name="motif_hosp" id="motif_hosp" maxlength="100" ></td>
                </tr>

                <tr>
                    <td>
                        <label for="date_hosp">date_hosp:
                        </label>
                    </td>
                   
                    <td>  <input type="date" name="date_hosp" id="date_hosp" value="2020-12-01" min="2020-12-01" ></td>
                </tr>

                <tr>
                    <td>
                        <label for="type_analy">type_analy:
                        </label>
                    </td>
                    <td><input type="text" name="type_analy" id="type_analy" maxlength="100" ></td>
                </tr>
                
                <tr>
                    <td>
                        <label for="nature_analy">nature_analy:
                        </label>
                    </td>
                    <td><input type="text" name="nature_analy" id="nature_analy" maxlength="100" ></td>
                </tr>


                <tr>
                    <td>
                        <label for="desc_analy">desc_analy:
                        </label>
                    </td>
                    <td><input type="text" name="desc_analy" id="desc_analy" maxlength="100" ></td>
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
	</body>
</html>