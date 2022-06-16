<?php
session_start();
if(!isset($_SESSION['user'])){    

  header("location:index.php");
}
    try{
    include('connexion.php');
    if(isset($_GET['delete'])){
        $id=$_GET['delete'];
        $pdostat=$bdd->prepare("delete from approvisionnement where id_achat=".$id."");
        $pdostat->execute();
        header("location:../appro.php");
    }}
catch(PDOException $e){
    $e->getMessage();
}
?>