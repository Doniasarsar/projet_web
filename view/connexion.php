<?php
    include_once '../model/maladie.php';
    include_once '../controller/maladieC.php';

    $error = "";

    // create user
    $maladie= null;

    // create an instance of the controller
    $maladieC = new maladieC();
    if (
        isset($_POST["nom_maladie"]) && 
        isset($_POST["type_maladie"]) &&
        isset($_POST["gravite_maladie"]) && 
        isset($_POST["desc_maladie"]) 
    ) {
        if (
            !empty($_POST["nom_maladie"]) && 
            !empty($_POST["type_maladie"]) && 
            !empty($_POST["gravite_maladie"]) && 
            !empty($_POST["desc_maladie"])
        ) {
            $maladie= new maladie(
                $_POST['nom_maladie'],
                $_POST['type_maladie'], 
                $_POST['gravite_maladie'],
                $_POST['desc_maladie']
            );
            $maladieC->ajoutermaladie($maladie);
            header('Location:affichermaladies.php');
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
    <title>maladie </title>
</head>
    <body>
        <button><a href="affichermaladies.php">Retour a la liste</a></button>
        <hr>
        
       
        
        <form action="" method="POST">
            <table border="1" align="center">

                <tr>
                    <td rowspan='4' colspan='1'>Fiche maladie</td>
                    <td>
                        <label for="nom_maladie">Nom maladie:
                        </label>
                    </td>
                    <td><input type="text" name="nom_maladie" id="nom_maladie"  maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="type_maladie">type maladie:
                        </label>
                    </td>
                    <td><input type="text" name="type_maladie" id="type_maladie" maxlength="20"></td>
                </tr>
				 <tr>
                    <td>
                        <label for="gravite_maladie">gravite maladie:
                        </label>
                    </td>
                    <td><input type="text" name="gravite_maladie" id="gravite_maladie" maxlength="20"></td>
                </tr>
				 <tr>
                    <td>
                        <label for="desc_maladie">description maladie:
                        </label>
                    </td>
                    <td><input type="text" name="desc_maladie" id="desc_maladie" maxlength="20"></td>
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