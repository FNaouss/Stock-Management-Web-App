<?php
include('connexion.php');

$pdostat=$bdd->prepare("SELECT photo,idProd, libelle,reference,Qté,prixAch, prixV,designation FROM produit JOIN categorie ON produit.id_cat=categorie.id_cat");
$pdostat->execute();
?>