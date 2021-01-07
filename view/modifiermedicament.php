<?php
	include "../controller/medicamentc.php";
	include_once '../model/medicament.php';

	$medicamentc = new medicamentc();
	$error = "";
    $med =[];
     
	if (
		isset($_POST["id_med"]) && 
        isset($_POST["nom_med"]) &&
        isset($_POST["dosage_med"]) && 
        isset($_POST["desc_med"])  
       
	)
		
    {
        $med = new medicament(
            $_POST["nom_med"], 
            $_POST["dosage_med"],
            $_POST["desc_med"]
                
			);
			
            $medicamentc->modifiermedicament($med, $_GET['id_med']);
            header('refresh:1;url=affichermedicament.php');
    }
    else
        $error = "Missing information";
   
    if (array_key_exists ('id_med',$_GET)){
    $med=$medicamentc->recuperermedicament($_GET['id_med']);
    }
    else {
    
         header('refresh:5;url=affichermedicament.php');
        
    }
?>
<html>
	<head>
		<title>Modifier medicament</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
		<button><a href="affichermedicament.php">Retour à la liste</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
		
		<form action="" method="POST">
            <table align="center" border ='1'>
                <tr>
                    <td rowspan='4' colspan='1'>
						Fiche medicament
					</td>
                    <td>
                        <label for="id_med">Id medicament:
                        </label>
                    </td>
                    <td>
						<input type="text" name="id_med" id="id_med"  value = "<?php echo array_key_exists ('id_med',$med)?$med['id_med']:''; ?>"  >
					</td>
				</tr>
				<tr>
					<td>
						<label for="nom_med">Nom medicament:
						</label>
					</td>
					<td>
						<input type="text" name="nom_med" id="nom_med" maxlength="20" value = "<?php echo array_key_exists ('nom_med',$med)?$med['nom_med']:''; ?>">
					</td>
				</tr>
                <tr>
                    <td>
                        <label for="dosage_med">dosage medicament :
                        </label>
                    </td>
                    <td><input type="text" name="dosage_med" id="dosage_med" maxlength="20" value = "<?php echo array_key_exists ('dosage_med',$med)?$med['dosage_med']:''; ?>"></td>
                </tr>
                
                <tr>
                    <td>
                        <label for="desc_med">desc medicament :
                        </label>
                    </td>
                    <td><input type="text" name="desc_med" id="desc_med" maxlength="20" value = "<?php echo array_key_exists ('desc_med',$med)?$med['desc_med']:''; ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Modifier" name = "modifer"> 
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
        </form>
		
	</body>
</html>