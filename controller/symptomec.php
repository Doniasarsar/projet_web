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
			   <a href="index.html" class="navbar-brand"><i class=""></i>TogeherVersusCorona</a>
		  </div>

		  <!-- MENU LINKS -->
		  <div class="collapse navbar-collapse">
			   <ul class="nav navbar-nav navbar-right">
					<li><a href="#top" class="smoothScroll">Accueil</a></li>
					<li><a href="#about" class="smoothScroll">A propos de nous </a></li>
					<li><a href="#team" class="smoothScroll">Symptome</a></li>
					<li><a href="#news" class="smoothScroll">News</a></li>
		  
					<li class="appointment-btn"><a href="#appointment">S'inscrire</a></li>
			   </ul>
		  </div>

	 </div>
</section>
<?PHP
	include "../config.php";
	require_once '../model/symptome.php';

	class symptomec {
		
		function ajoutersymptome($symptome){
			$sql="INSERT INTO symptome (code_sympt,libelle_sympt,description_sympt, valeur_sympt) 
			VALUES ('',:libelle_sympt,:description_sympt, :valeur_sympt)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
			
				$query->execute([
					'libelle_sympt' => $symptome->getlibelle_sympt(),
					'description_sympt' => $symptome->getdescription_sympt(),
					'valeur_sympt' => $symptome->getvaleur_sympt()
					
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		function affichersymptome(){
			
			$sql="SELECT * FROM symptome";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}

		function supprimersymptome($code_sympt){
			$sql="DELETE FROM symptome WHERE code_sympt= :code_sympt";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':code_sympt',$code_sympt);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function modifiersymptome($symptome, $code_sympt){
			//  var_dump($code_sympt, $symptome);
			//  die();
			
		try {
			$db = config::getConnexion();
			$query = $db->prepare(
				'UPDATE symptome SET 
				 libelle_sympt= :libelle_sympt, 
						description_sympt= :description_sympt,
						valeur_sympt= :valeur_sympt
					WHERE code_sympt= :code_sympt'
			
		
			);

			
		
			if ($query->execute([
				 'libelle_sympt' => $symptome->getlibelle_sympt(),
					'description_sympt' => $symptome->getdescription_sympt(),
					'valeur_sympt' => $symptome->getvaleur_sympt(),
				'code_sympt' => $code_sympt]
				
				))
			{

				echo "success";
			// 	var_dump($query);
			// die();
	
			}
			else echo "failure";

			echo $query->rowCount() . " records UPDATED successfully <br>";
		} catch (PDOException $e) {

			echo $e->getMessage();
		
		}
	}
























		function recuperersymptome($code_sympt){
			$sql="SELECT * from symptome where code_sympt=$code_sympt";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$user=$query->fetch();
				return $user;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

		function recuperersymptome1($code_sympt){
			$sql="SELECT * from symptome where code_sympt=$code_sympt";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();
				
				$user = $query->fetch(PDO::FETCH_OBJ);
				return $user;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
	}

?>
<!-- SCRIPTS -->
<script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/jquery.sticky.js"></script>
     <script src="js/jquery.stellar.min.js"></script>
     <script src="js/wow.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/custom.js"></script>