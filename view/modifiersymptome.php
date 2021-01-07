<?php
	include "../controller/symptomec.php";
	include_once '../Model/symptome.php';

	$symptomec = new symptomec();
    $error = "";
    $sympt =[];
    //  var_dump($_POST);
    //  die();
	
	if (
        isset($_POST["code_sympt"])&&
		isset($_POST["libelle_sympt"]) && 
        isset($_POST["description_sympt"]) &&
        isset($_POST["valeur_sympt"]) 
    )
    
    
	 {
            $sympt= new symptome(
                $_POST['libelle_sympt'],
                $_POST['description_sympt'], 
                $_POST['valeur_sympt']
			);
            $symptomec->modifiersymptome($sympt, $_GET['code_sympt']);
            header('refresh:1;url=affichersymptome.php');
        }
        else
            $error = "Missing information";

            if (array_key_exists ('code_sympt',$_GET)){
                $sympt=$symptomec->recuperersymptome($_GET['code_sympt']);
                }
                else {
                
                     header('refresh:10;url=affichersymptome.php');
	}

?>
<html>
	<head>
		<title>Modifier symptome</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
		<button><a href="affichersymptome.php">Retour a la liste</a></button>
        <hr>
        
      
		
		
		<form action="" method="POST">
            <table align="center" border="1">
                <tr>
                    <td rowspan='5' colspan='1'>
						Fiche maladie
					</td>
					  <tr>
                    <td>
                        <label for="code_sympt">code symptome:
                        </label>
                    </td>
                    <td><input type="text" name="code_sympt" id="code_sympt" maxlength="20" value ="<?php echo array_key_exists ('code_sympt',$sympt)?$sympt['code_sympt']:''; ?>" ></td>
                </tr>
                    <td>
                        <label for="libelle_sympt">libelle symptome:
                        </label>
                    </td>
                    <td>
						<input type="text" name="libelle_sympt" id="libelle_sympt" value ="<?php echo array_key_exists ('libelle_sympt',$sympt)?$sympt['libelle_sympt']:''; ?>">
					</td>
				</tr>
				<tr>
					<td>
						<label for="description_sympt">description symptome:
						</label>
					</td>								
					<td>
						<input type="text" name="description_sympt" id="description_sympt" maxlength="20" value = "<?php echo array_key_exists ('description_sympt',$sympt)?$sympt['description_sympt']:''; ?>">
					</td>
				</tr>
                <tr>
                    <td>
                        <label for="valeur_sympt">valeur symptome:
                        </label>
                    </td>
                    <td><input type="text" name="valeur_sympt" id="valeur_sympt" maxlength="20" value = "<?php echo array_key_exists ('valeur_sympt',$sympt)?$sympt['valeur_sympt']:''; ?>"></td>
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