<?php
session_start();
if(!isset($_SESSION['user'])){    

  header("location:index.php");
}
include('show_products.php');
        if(isset($_POST['add2'])){
        $idProd=$_POST['prod'];
        $qte=$_POST['qte'];
        $date=$_POST['date'];
        $idF=$_POST['idF'];
        
        $pdostatA=$bdd->prepare("insert into approvisionnement(date_ach,id_fournisseur) values('".$date."',".$idF.")");
        $pdostatA->execute();
        $pdostatiD=$bdd->prepare("select id_achat from approvisionnement order by id_achat DESC limit 1");
        $pdostatiD->execute();
        $pdostatiD=$pdostatiD->fetch(PDO::FETCH_NUM);
        $iDA=$pdostatiD[0];

        $pdostatAA=$bdd->prepare("insert into achat(id_prod,id_achat,qte_achat)values(".$idProd.",".$iDA.",".$qte.");update produit set Qté=Qté+".$qte." where idProd=".$idProd."");
        $pdostatAA->execute();
        $pdostatFidF=$bdd->prepare("update fournisseur set Fidélité=Fidélité+1 where id_fournisseur=".$idF."");
        $pdostatFidF->execute();
        header("location:addappro.php");
        }
        if(isset($_POST['fin'])){
        $idProd=$_POST['prod'];
        $qte=$_POST['qte'];
        $date=$_POST['date'];
        $idF=$_POST['idF'];
        
        $pdostatA=$bdd->prepare("insert into approvisionnement(date_ach,id_fournisseur) values('".$date."',".$idF.")");
        $pdostatA->execute();
        $pdostatiD=$bdd->prepare("select id_achat from approvisionnement order by id_achat DESC limit 1");
        $pdostatiD->execute();
        $pdostatiD=$pdostatiD->fetch(PDO::FETCH_NUM);
        $iDA=$pdostatiD[0];

        $pdostatAA=$bdd->prepare("insert into achat(id_prod,id_achat,qte_achat)values(".$idProd.",".$iDA.",".$qte.");update produit set Qté=Qté+".$qte." where idProd=".$idProd."");
        $pdostatAA->execute();
        $pdostatFidF=$bdd->prepare("update fournisseur set Fidélité=Fidélité+1 where id_fournisseur=".$idF."");
        $pdostatFidF->execute();
        header("location:../appro.php");
        }

?>