<?php
session_start();
if(!isset($_SESSION['user'])){    

  header("location:index.php");
}
$name=$_POST['name'];
$email=$_POST['email'];
$adresse=$_POST['adresse'];
$num=$_POST['num'];

try{
	include("connexion.php");
	$pdostat=$bdd->prepare("insert into fournisseur(nom,email,adresse,num_tel) values('".$name."','".$email."','".$adresse."',".$num.")");
	$pdostat->execute();
header('location:../fournisseurs.php');
}
catch(PDOException $e){
	$e->getMessage();
}
?>