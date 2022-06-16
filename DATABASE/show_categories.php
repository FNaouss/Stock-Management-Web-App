<?php
include('connexion.php');

$pdstat=$bdd->prepare("select * from categorie order by id_cat");
$pdstat->execute();
?>