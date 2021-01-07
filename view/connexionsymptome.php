<?php
    include_once '../model/symptome.php';
    include_once '../controller/symptomec.php';

    $error = "";

    // create user
    $symptome= null;

    // create an instance of the controller
    $symptomec = new symptomec();
		if (
		isset($_POST["libelle_sympt"]) && 
        isset($_POST["description_sympt"]) &&
        isset($_POST["valeur_sympt"]) 
	){
		if (
            !empty($_POST["libelle_sympt"]) && 
            !empty($_POST["description_sympt"]) && 
            !empty($_POST["valeur_sympt"])
        ) {
            $symptome= new symptome(
                $_POST['libelle_sympt'],
                $_POST['description_sympt'], 
                $_POST['valeur_sympt']
			);
			
            $symptomec->ajoutersymptome($symptome);
            header('refresh:5;url=affichersymptome.php');
        }
        else
            $error = "Missing information";}
            
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>symptome </title>
</head>
    <body>
        <button><a href="affichersymptome.php">Retour a la liste</a></button>
        <hr>
        
       
        
        <form action="" method="POST">
            <table border="1" align="center">

                <tr>
                    <td rowspan='3' colspan='1'>Fiche symptome </td>
                    
                   
                    <td>
                        <label for="libelle_sympt">libelle symptome:
                        </label>
                    </td>
					
                    <td>
						<input type="text" name="libelle_sympt" id="libelle_sympt"  >
				</td>
				</tr>
				
				
					<td>
						<label for="description_sympt">description symptome:
						</label>
					</td>								
					<td>
						<input type="text" name="description_sympt" id="description_sympt" maxlength="20" >
					</td>
				</tr>
                <tr>
                    <td>
                        <label for="valeur_sympt">valeur symptome:
                        </label>
						</td>
						<td><input type="text" name="valeur_sympt" id="valeur_sympt" maxlength="20"></td>
						
                
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