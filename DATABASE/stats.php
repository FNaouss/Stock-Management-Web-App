<?php
    include('connexion.php');
    $pdostatDep=$bdd->prepare('select SUM(prixAch*qte_achat)from produit join achat on produit.idProd=achat.id_prod');
    $pdostatDep->execute();
    $dep=$pdostatDep->fetch(PDO::FETCH_NUM);
    $pdostatRev=$bdd->prepare('select SUM(prixV*qte_vente)from produit join vente on produit.idProd=vente.id_prod');
    $pdostatRev->execute();
    $rev=$pdostatRev->fetch(PDO::FETCH_NUM);
?>