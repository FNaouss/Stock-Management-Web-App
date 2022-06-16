<?php
session_start();
if(!isset($_SESSION['user'])){    

  header("location:index.php");
}
if(isset($_POST['add'])){
$lib=$_POST['name'];
$ref=$_POST['ref'];
$quantite=$_POST['quantite'];
$pa=$_POST['pa'];
$pv=$_POST['pv'];
$cat=$_POST['id_cat'];

$src=$_FILES['photo']['tmp_name'];
$dest=$ref.".png";
move_uploaded_file($src,$dest);}
try{
	include("connexion.php");
	$pdostat=$bdd->prepare("insert into produit(libelle,reference,Qté,prixAch,prixV,id_cat,photo)values('".$lib."','".$ref."',".$quantite.",".$pa.",".$pv.",".$cat.",'".$dest."')");
	$pdostat->execute();
	header("location:../produits.php");
}
catch(PDOException $e){
	$e->getMessage();
}
?>