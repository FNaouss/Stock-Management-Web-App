<?php
include('connexion.php');

$pdostatF=$bdd->prepare("select * from fournisseur order by id_fournisseur");
$pdostatF->execute();
$pdostatTopF=$bdd->prepare("select * from fournisseur order by Fidélité limit 3");
$pdostatTopF->execute();
?>