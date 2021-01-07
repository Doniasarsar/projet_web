<?php
	include "../controller/maladieC.php";
	include_once '../Model/maladie.php';

	$maladieC = new maladieC();
	$error = "";
    $mala =[];
    //  var_dump($_POST);
    //  die();
	if (
		isset($_POST["nom_maladie"]) && 
        isset($_POST["type_maladie"]) &&
        isset($_POST["gravite_maladie"]) && 
        isset($_POST["desc_maladie"]) 
	){
		$mala = new maladie(
            $_POST["nom_maladie"], 
            $_POST["type_maladie"],
            $_POST["gravite_maladie"],
            $_POST["desc_maladie"]);
			
            $maladieC->modifiermaladie($mala, $_GET['id_maladie']);
            header('refresh:1;url=affichermaladie.php');
        }
        else
            $error = "Missing information";

            if (array_key_exists ('id_maladie',$_GET)){
                $mala=$maladieC->recuperermaladie($_GET['id_maladie']);
                }
                else {
                
                     header('refresh:1;url=affichermaladie.php');
                    
                }
	

?>
<!DOCTYPE html>
<html lang="en">
	<head>

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="Tooplate">
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/font-awesome.min.css">
<link rel="stylesheet" href="../css/animate.css">
<link rel="stylesheet" href="../css/owl.carousel.css">
<link rel="stylesheet" href="../css/owl.theme.default.min.css">

<!-- MAIN CSS -->
<link rel="stylesheet" href="../css/tooplate-style.css">

            </head>
		

	<body>
    <title>Modifier maladie</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<button><a href="affichermaladie.php">Retour a la liste</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
		
		
		<form action="" method="POST">
            <table align="center" border="1">
                <tr>
                    <td rowspan='5' colspan='1'>
						Fiche maladie
					</td>
                    <td>
                        <label for="id_maladie">Id maladie:
                        </label>
                    </td>
                    <td>
						<input type="text" name="id_maladie" id="id_maladie" value ="<?php echo array_key_exists ('id_maladie',$mala)?$mala['id_maladie']:''; ?>"  >
                    
                    </td>
				</tr>
				<tr>
					<td>
						<label for="nom_maladie">Nom maladie:
						</label>
					</td>								
					<td>
						<input type="text" name="nom_maladie" id="nom_maladie" maxlength="20" value ="<?php echo array_key_exists ('nom_maladie',$mala)?$mala['nom_maladie']:''; ?>" >
					</td>
				</tr>
                <tr>
                    <td>
                        <label for="type_maladie">type_maladie:
                        </label>
                    </td>
                    <td><input type="text" name="type_maladie" id="type_maladie" maxlength="20" value ="<?php echo array_key_exists ('type_maladie',$mala)?$mala['type_maladie']:''; ?>" ></td>
                </tr>
				 <tr>
                    <td>
                        <label for="gravite_maladie">gravite maladie:
                        </label>
                    </td>
                    <td><input type="text" name="gravite_maladie" id="gravite_maladie" maxlength="20" value ="<?php echo array_key_exists ('gravite_maladie',$mala)?$mala['gravite_maladie']:''; ?>" ></td>
                </tr>
				 <tr>
                    <td>
                        <label for="desc_maladie">description maladie:
                        </label>
                    </td>
                    <td><input type="text" name="desc_maladie" id="desc_maladie" maxlength="20" value = "<?php echo array_key_exists ('desc_maladie',$mala)?$mala['desc_maladie']:''; ?>" ></td>
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