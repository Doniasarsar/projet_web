<?php  
 $connect = mysqli_connect("localhost", "root", "", "covid");  
 if(isset($_POST["query"]))  
 {  
      $output = '';  
      $query = "SELECT * FROM maladie WHERE nom_maladie LIKE '%".$_POST["query"]."%' ORDER BY nom_maladie ";  
      $query1 = "SELECT * FROM medicament WHERE nom_med LIKE '%".$_POST["query"]."%' ORDER BY nom_med ";
      $result = mysqli_query($connect, $query);  
      $output = '<ul class="list-unstyled">';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '<li>'.$row["nom_maladie"].'</li>';  
           }  
      }  
      else  
      {  
           $output .= '<li>Maladie Not Found</li>';  
      }  
      $output .= '</ul>';  
      echo $output;  
 }  
 ?>