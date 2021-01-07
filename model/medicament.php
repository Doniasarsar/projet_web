<!DOCTYPE html>
<html lang="en">
<head>

     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="Tooplate">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/animate.css">
     <link rel="stylesheet" href="css/owl.carousel.css">
     <link rel="stylesheet" href="css/owl.theme.default.min.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css/tooplate-style.css">

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
</body>
	 </html>
     
 
<?PHP
	class medicament {
		private ?int $id_med = null;
		private ?string $nom_med = null;
		private ?string $dosage_med = null;
		private ?string $desc_med = null;
		
		
	
		function __construct(string $nom_med , string $dosage_med, string $desc_med){
			
			$this->nom_med=$nom_med;
			$this->dosage_med=$dosage_med;
			$this->desc_med=$desc_med;
		
	
		}
		
		function getid_med(): int{
			return $this->id_med;
		}
		function getnom_med(): string{
			return $this->nom_med;
		}
		
		function getdosage_med(): string{
			return $this->dosage_med;
		}
		function getdesc_med(): string{
			return $this->desc_med;
		}
		
	function setnom_med(string $nom_med): void{
			$this->nom_med=$nom_med;
		}
		function setdosage_med(string $dosage_med): void{
			$this->dosage_med;
		}
		function setdesc_med(string $desc_med): void{
			$this->desc_med=$desc_med;
		}
		
	}
?>