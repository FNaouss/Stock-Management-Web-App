<?php
session_start();
if(!isset($_SESSION['user'])){    

  header("location:index.php");
}
try{
    include("./connexion.php");
    if($_GET['delete']){   
    $id=$_GET['delete'];
    $pdostat=$bdd->prepare("Delete from client where id_cli = '$id'");
    $pdostat->execute();
header("location:../clients.php");
    }
}
catch(PDOException $e){
    $e->getMessage();
}
?>