
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
	require_once '../model/maladie.php';

	class maladieC {
		
		function ajoutermaladie($maladie){
			$sql="INSERT INTO maladie (id_maladie, nom_maladie, type_maladie, gravite_maladie,desc_maladie) 
			VALUES ('',:nom_maladie,:type_maladie,:gravite_maladie, :desc_maladie)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
			
				$query->execute([
					'nom_maladie' => $maladie->getnom_maladie(),
					'type_maladie' => $maladie->gettype_maladie(),
					'gravite_maladie' => $maladie->getgravite_maladie(),
					'desc_maladie' => $maladie->getdesc_maladie()
					

				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		function affichermaladie(){
			
			$sql="SELECT * FROM maladie";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}

		function supprimermaladie($id_maladie){
			$sql="DELETE FROM maladie WHERE id_maladie= :id_maladie";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id_maladie',$id_maladie);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function modifiermaladie($maladie, $id_maladie){
			// var_dump($id_med, $medicament);
			// die();
			
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					"UPDATE maladie SET 
						nom_maladie = :nom_maladie, 
						type_maladie = :type_maladie,
						gravite_maladie = :gravite_maladie,
						desc_maladie = :desc_maladie
						
					WHERE id_maladie = :id_maladie"
				);
				$query->execute([
					'nom_maladie' => $maladie->getNom_maladie(),
					'type_maladie' => $maladie->gettype_maladie(),
					'gravite_maladie' => $maladie->getgravite_maladie(),
					'desc_maladie' => $maladie->getdesc_maladie(),
					'id_maladie' => $id_maladie

				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function recuperermaladie($id_maladie){
			$sql="SELECT * from maladie where id_maladie=$id_maladie";
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

		function recuperermaladie1($id_maladie){
			$sql="SELECT * from maladie where id_maladie=$id_maladie";
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