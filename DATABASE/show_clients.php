<?php
include('connexion.php');

$pdostatCli=$bdd->prepare("select * from client order by id_cli");
$pdostatCli->execute();
$pdostatTopC=$bdd->prepare("select * from client order by Fidélité limit 3");
$pdostatTopC->execute();
?>