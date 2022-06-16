<?php
    try{
        include('connexion.php');
        $pdostatCM=$bdd->prepare('select commande.id_cmd, libelle,qte_vente,client.nom,commande.date_cmd,commande.id_facture from (commande join client on commande.id_cli=client.id_cli)join (produit join vente on idProd=id_prod) on vente.id_cmd=commande.id_cmd');
        $pdostatCM->execute();
    }
    catch(PDOException $e){
        $e->getMessage();
    }
?>