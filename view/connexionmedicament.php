<?php
    include_once '../model/medicament.php';
    include_once '../controller/medicamentc.php';

    $error = "";

    // create user
    $medicament = null;

    // create an instance of the controller
    $medicamentc = new medicamentc();
    if (
        isset($_POST["nom_med"]) && 
        isset($_POST["dosage_med"]) &&
        isset($_POST["desc_med"])
    ) {
        if (
            !empty($_POST["nom_med"]) && 
            !empty($_POST["dosage_med"]) && 
            !empty($_POST["desc_med"])
        ) {
            $medicament = new medicament(
                $_POST['nom_med'],
                $_POST['dosage_med'], 
                $_POST['desc_med']
            );
            $medicamentc->ajoutermedicament($medicament);
            header('Location:affichermedicament.php');
        }
        else
            $error = "Missing information";
    }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>medicament</title>
</head>
    <body>
        <button><a href="affichermedicament.php">Retour à la liste</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
        
        <form action="" method="POST">
            <table border="1" align="center">

                <form action="" method="POST">
            <table align="center" border="1">
                <tr>
                    <td rowspan='4' colspan='1'>
						Fiche medicament
					</td>
					  <tr>
                   
                    <td>
                        <label for="nom_med">nom medicament:
                        </label>
                    </td>
                    <td>
						<input type="text" name="nom_med" id="nom_med"  >
					</td>
				</tr>
				<tr>
					<td>
						<label for="dosage_med">dosage medicament:
						</label>
					</td>								
					<td>
						<input type="text" name="dosage_med" id="dosage_med" maxlength="20"  >
					</td>
				</tr>
                <tr>
                    <td>
                        <label for="desc_med">description medicament:
                        </label>
                    </td>
                    <td><input type="text" name="desc_med" id="desc_med" maxlength="20" ></td>
                </tr>
				
               
        
                
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Envoyer"> 
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>