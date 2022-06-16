<?php
    include ("connexion.php");
    $pdostatFact=$bdd->prepare("select * from facture order by id_fact DESC limit 1");
    $pdostatFact->execute();
    $facture=$pdostatFact->fetch(PDO::FETCH_NUM);

    
    $pdostatFact2=$bdd->prepare("select id_fact from facture order by id_fact DESC limit 1");
    $pdostatFact2->execute();
    $idfacture=$pdostatFact2->fetch(PDO::FETCH_NUM);
?>