<?php
 
$dbh = new PDO("mysql:host=localhost;dbname=atelierphp;charset=utf8",'root','');
  
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
$stmt = $dbh->prepare("INSERT INTO prescription (desc_pres, date_pres, nom_med, dosage_med,desc_med,motif_hosp,date_hosp,type_analy,nature_analy,desc_analy) 
VALUES (:desc_pres,:date_pres,:nom_med,:dosage_med,:desc_med,:motif_hosp,:date_hosp,:type_analy,:nature_analy,:desc_analy)");
$stmt -> bindValue(':desc_pres', '$_POST["desc_pres"]');
$stmt -> bindValue(':date_pres', '$_POST["date_pres"]');
$stmt -> bindValue(':nom_med', '$_POST["nom_med"]');
$stmt -> bindValue(':dosage_med', '$_POST["dosage_med"]');
$stmt -> bindValue(':desc_med', '$_POST["desc_med"]');
$stmt -> bindValue(':motif_hosp', '$_POST["motif_hosp"]');
$stmt -> bindValue(':date_hosp', '$_POST["date_hosp"]');
$stmt -> bindValue(':type_analy', '$_POST["type_analy"]');
$stmt -> bindValue(':nature_analy', '$_POST["nature_analy"]');
$stmt -> bindValue(':desc_analy', '$_POST["desc_analy"]');

$stmt->execute();
$dbh = null;

 
?>