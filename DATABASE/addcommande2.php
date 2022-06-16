<?php
session_start();
if(!isset($_SESSION['user'])){    

  header("location:index.php");
}
    include("connexion.php");
try{
    if(isset($_POST['insfact'])){
        $pdostatCmd=$bdd->prepare("insert into facture(date_fact) values (now())");
        $pdostatCmd->execute();
    
        header("location:addcommande.php");
    }
    if(isset($_POST['ajouter'])){

        $idProd=$_POST['idProd'];
        $qte=$_POST['qte'];
        $idCli=$_POST['idCli'];

        $pdostatCmd2=$bdd->prepare("select id_fact from facture order by id_fact DESC limit 1");
        $pdostatCmd2->execute();
        $pdostatCmd2=$pdostatCmd2->fetch(PDO::FETCH_NUM);
        $idFact=$pdostatCmd2[0];

        $pdostatCmd3=$bdd->prepare("insert into commande(date_cmd,id_cli,id_facture) values(now(),".$idCli.",".$idFact.")");
        $pdostatCmd3->execute();


        $pdostatCmd4=$bdd->prepare("select id_cmd from commande order by id_cmd DESC limit 1;");
        $pdostatCmd4->execute();
        $pdostatCmd4=$pdostatCmd4->fetch(PDO::FETCH_NUM);
        $idCmd=$pdostatCmd4[0];
        

        $pdostatCmd5=$bdd->prepare("insert into vente(id_prod,id_cmd,qte_vente) values(".$idProd.",".$idCmd.",".$qte.")");
        $pdostatCmd5->execute();

        $pdostatCmd6=$bdd->prepare("update produit set Qté=Qté-".$qte." where idProd=".$idProd."");
        $pdostatCmd6->execute();
        header("location:addcommande.php");

    }
}catch(PDOException $e){
    $e->getMessage();
}
?>