<?php
session_start();
if(!isset($_SESSION['user'])){    

  header("location:index.php");
}
    include("./connexion.php");
    if(isset($_GET['delete'])){
        $id=$_GET['delete'];
    }
    $pdostat=$bdd->prepare("delete from categorie where id_cat=".$id."");
    $pdostat->execute();
    header("location:../categories.php");
?>