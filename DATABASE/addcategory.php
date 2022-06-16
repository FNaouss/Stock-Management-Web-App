<?php
session_start();
if(!isset($_SESSION['user'])){    

  header("location:index.php");
}
if(isset($_POST['add']))
$des=$_POST['name'];

try{
	include("connexion.php");
	$pdostat=$bdd->prepare("insert into categorie(designation)values('".$des."')");
	$pdostat->execute();
    header("location:../categories.php");
}
catch(PDOException $e){
	$e->getMessage();
}
?>