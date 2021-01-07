<form action="" method="POST">
<input type="text" name="search">
<input type="submit" name="submit" value="Search">
</form>

<?php
$search_value=$_POST["search"];
$con=new mysqli("localhost","root","","covid");
if($con->connect_error){
    echo 'Connection Faild: '.$con->connect_error;
    }else{
        // $sql="select * from information where First_Name like '%$search_value%'";
        // $sql="SELECT nom_maladie FROM maladie WHERE nom_maladie LIKE '%".$_POST["search"]."%'";

        $sql="SELECT maladie.id,maladie.nom_maladie FROM emp INNER JOIN medicament on maladie.nom_maladie = medicament.nom_med WHERE nom_maladie LIKE '%".$_POST["search"]."%'" ;

// $result=mysql_query($qry) or die(mysql_error());

        $res=$con->query($sql);

        while($row=$res->fetch_assoc()){
            echo 'MALADIE :  '.$row["nom_maladie"];


            }       

        }
?>