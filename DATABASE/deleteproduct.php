<?php
session_start();
if(!isset($_SESSION['user'])){    

  header("location:index.php");
}
    try{
    include('./connexion.php');
    if (isset($_GET['delete'])){
    $id=$_GET['delete'];
    $pdostat=$bdd->prepare("delete from produit where idProd=".$id."");
    $pdostat->execute();
    header("location: ../produits.php");
    }}
catch(PDOException $e){
    $e->getMessage();
}
?>