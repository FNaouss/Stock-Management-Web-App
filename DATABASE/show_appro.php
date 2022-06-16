<?php

    try{
        include('connexion.php');
        $pdostatAp=$bdd->prepare("select approvisionnement.id_achat,Libelle,qte_achat,nom,date_ach from (approvisionnement join fournisseur on approvisionnement.id_fournisseur=fournisseur.id_fournisseur )join(achat join produit on idProd=id_prod) on approvisionnement.id_achat=achat.id_achat order by id_achat");
        $pdostatAp->execute();
    }
    catch(PODException $e){
        $e->getMessage();
    }
?>