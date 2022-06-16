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
	$pdostat=$bdd->prepare("insert into client(nom,email,adresse,numTel) values('".$name."','".$email."','".$adresse."',".$num.")");
	$pdostat->execute();
}
catch(PDOException $e){
	$e->getMessage();
}
header('location:../clients.php');
?>