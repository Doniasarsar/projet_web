<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


$mysqli = new mysqli("localhost", "root", "", "covid");

// if(isset($_POST['envoyer'])){ // si formulaire soumis
//     echo $_POST['nom_maladie'];
//     }
//     die;
/* Vérification de la connexion */
if ($mysqli->connect_errno) {
    printf("Echec de la connexion : %s\n", $mysqli->connect_error);
    exit();
}

//  $query = "SELECT id_med, nom_med, dosage_med FROM medicament";
$query = "SELECT * FROM maladie LEFT JOIN medicament ON maladie.nom_maladie=medicament.nom_maladie  WHERE maladie.nom_maladie = '$_POST[nom_maladie]'";

$result = $mysqli->query($query);


while($row = $result->fetch_array())
{
$rows[] = $row;

}

echo "<footer>
<table border=2 align = 'center'>
<tr>
<th>Nom maladie</th>
<th>Description maladie</th>
<th>Nom medicament</th>
<th>Description med</th>
<th>Type maladie</th>
</tr>
</footer>";

echo "<tr>";
echo "<br></br>";
foreach($rows as $row)
{
echo "<td>". $row['nom_maladie'] ."</td>\n"; 

echo "<td>".$row['desc_maladie']."</td>";

echo "<td>".$row['nom_med']."</td>";

echo "<td>".$row['desc_med']."</td>";

echo "<td>".$row['type_maladie']."</td>";
}

/* Tableau numérique */
// $row = $result->fetch_array(MYSQLI_NUM);
// printf ("%s %s %s\n", $row[0], $row[1],$row[2]);
// echo "<tableborder='2'>

// <tr>

// <th>test</th>

// <th>test2</th>

// <th>test3</th>

// </tr>"; 

// echo "<tr>";

//   echo "<td>" . $row[0] . "</td>";

//   echo "<td>" . $row[1] . "</td>";
//   echo "<td>" . $row[2] . "</td>";

//   echo "</tr>";
//   echo "</table>";

// /* Tableau associatif */
// $row = $result->fetch_array(MYSQLI_ASSOC);
// printf ("%s (%s)\n", $row["Name"], $row["CountryCode"]);

// /* Tableau associatif et numérique */
// $row = $result->fetch_array(MYSQLI_BOTH);
// printf ("%s (%s)\n", $row[0], $row["CountryCode"]);

/* Libération des résultats */
$result->free();

/* Fermeture de la connexion */
$mysqli->close();

require 'vendor/autoload.php';







$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = 4;                      
    // Enable verbose debug output
    $mail->isSMTP();                                            
    // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    
    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                  
     // Enable SMTP authentication
    $mail->Username   = 'mohamediheb.bouraoui@esprit.tn';                     // SMTP username
    $mail->Password   = '191JMT2847';                              
    // SMTP password
    // $mail->SMTPSecure = 'tls';  
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
      
     // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;  

$mail->setFrom('mohamediheb.bouraoui@esprit.tn', 'Mailer');
    $mail->addAddress('mohamediheb.bouraoui@esprit.tn');

// Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Consignes COVID 19';
   $mail->Body ="                                 BIENVENUE SUR NOTRE SITE WEB
   Nous sommes heureux de vous accueillir . 
   Alors voici quelque conseil à suivre pour se protéger de  cet épidémie , reposez-vous, buvez ‎abondamment et consommez des aliments nutritifs. ‎Restez dans une chambre séparée des autres ‎membres de la famille et utilisez une salle de bains ‎différente, si possible. Nettoyer et désinfecter ‎régulièrement les surfaces que vous touchez. 
   bon rétablissement.

   <div style='margin-left:150px;background-image:url(http://archive.customize.org/files/old/wallpaper/files/Surreal_Red_big.jpg); padding:50px;width:600px;'>
   <h1 style='color:#FFFFFF;font-family: Arial, Helvetica, sans-serif;text-align:center;line-height:2.5em;'>ToGetherversusCorona!</h1>
   <hr>
   <table>
   <tr><td style='text-align:center'>
   <div>
   <a href=''><img src='https://www.unilim.fr/recherche/wp-content/uploads/sites/12/2020/03/Recommandatons_gestes_barriere_Coronavirus_France.jpg' align='left' style='width:250px;height:250px;' alt=''/></a>
   <p style='color:#FFFFDD; font-family: Allura,cursive,Arial, Helvetica, sans-serif; font-size:20px'>'Have a prosperous Diwali.Hope this festival of lights,brings you every joy and happiness.May the lamps of joy,illuminate your life and fill your days with the bright sparkles of peace,mirth and good will.'</p>
   </div>
   </td>
   </tr>
   <tr>
   <td><div style='float:left;'><p style='color:#FFFFFF;font-family: Arial, Helvetica, sans-serif; font-size:20px'>'May the joy, cheer, Mirth and merriment Of this divine festival Surround you forever......'</p></div></td>
   </tr>
   </table>
   </div>";

$mail-> send();

// echo 'Message has been sent';
} catch (Exception $e) {
echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
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
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="../css/bootstrap.min.css">
     <link rel="stylesheet" href="../css/font-awesome.min.css">
     <link rel="stylesheet" href="../css/animate.css">
     <link rel="stylesheet" href="../css/owl.carousel.css">
     <link rel="stylesheet" href="../css/owl.theme.default.min.css">

     <!-- MAIN CSS -->
     <!-- <link rel="stylesheet" href="../css/tooplate-style.css"> -->

</head> 
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

     <!-- PRE LOADER -->
    <section class="preloader">
          <div class="spinner">

               <span class="spinner-rotate"></span>
               
          </div>
     </section>


     <!-- HEADER -->
     <header>
          <div class="container">
               <div class="row">

                    <div class="col-md-4 col-sm-5">
                        
                     <p>Bienvenue sur notre site TogetherVersusCorona
             

                         
                     </p>

                    </div>
                   

               </div>
          </div>
     </header>




     


     <!-- MENU -->
     <section class="navbar navbar-default navbar-static-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                    <a href="index.html" class="navbar-brand"><i class="row"></i>TogeherVersusCorona</a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                         <li><a href="#top" class="smoothScroll">Accueil</a></li>
                         <li><a href="#about" class="smoothScroll">A propos de nous </a></li>
                         <li><a href="#team" class="smoothScroll">Symptome</a></li>
                         <li><a href="#news" class="smoothScroll">News</a></li>
               
                         
                    </ul>
               </div>

          </div>
     </section>


     <body>
		
		<hr>
		<table border=1 align = 'center'>
			<tr>
				
			</tr>

			
		</table>
    </body>
    





<!-- FOOTER -->
<footer data-stellar-background-ratio="5">
          <div class="container">
               <div class="row">

                    <div class="col-md-4 col-sm-4">
                         
                    </div>

                    <div class="col-md-4 col-sm-4"> 
                         
                    </div>

                    <div class="col-md-4 col-sm-4"> 
                         
                    </div>

                    <div class="col-md-12 col-sm-12 border-top">
                         
                         
                         </div>   
                    </div>
                    
               </div>
          </div>
     </footer>
 <!-- SCRIPTS -->
 <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/jquery.sticky.js"></script>
     <script src="js/jquery.stellar.min.js"></script>
     <script src="js/wow.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/custom.js"></script>

     </html>