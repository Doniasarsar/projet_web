<?PHP
	include "../config.php";
	include "../Model/admin.php";

	class adminC {
		
		
		function verification_MDP($Login_admin,$MDP_admin){
				$sql="SELECT count(*) AS nbre from admin where Login_admin='$Login_admin' and MDP_admin='$MDP_admin'";
				$db = config::getConnexion();
				try{
					$query=$db->prepare($sql);
					$query->execute();

					$admin=$query->fetch();
					if ($admin['nbre'] == 0){
					echo "<script language=\"javascript\"> alert(\"Incorrect Login or Password \");</script>";
			
					echo "<html><head><title>Redirection en HTML</title>
                          <meta http-equiv=\"refresh\" content=\"0; URL=.\\front\\login_admin.php\">
                          </head><body></body></html>";
					}
					else 
					
					echo  "<html><head><title>Redirection en HTML</title>
                          <meta http-equiv=\"refresh\" content=\"0; URL=.\\back\\index.html\">
                          </head><body></body></html>";
						  
					}
					catch (Exception $e){
						echo '<h3>Erreur: '.$e->getMessage().'</h3>';
										}
										
				
			}		
}
		
		
?>