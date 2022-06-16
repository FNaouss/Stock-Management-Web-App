<?php
session_start();
if(!isset($_SESSION['user'])){    

  header("location:index.php");
}
    include('connexion.php');
    include('show_products.php');
    include('show_fournisseurs.php');
    include('show_appro.php');
    try{
        if(isset($_GET['edit'])){
            $id=$_GET['edit'];
        }
        if(isset($_POST['modifier'])){
            $idProd=$_POST['prod'];
            $idFourni=$_POST['fourni'];
            $date=$_POST['date'];
            $pdostat=$bdd->prepare("update approvisionnement set date_ach= '".$date."',id_fournisseur=".$idFourni." where id_achat=".$id."; update achat set id_prod=".$idProd." where id_achat=".$id."");
            $pdostat->execute();
            header("location:../appro.php");
        }
    }
    catch(PDOException $e){
        $e->getMessage();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Modifier Client</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="./css/updateclient.Css">
    </head>
<body>
<div class="row">
            <div class="col-4">
            </div>
            <div class="col-4">
            <div class="fo" style="width: 100%;text-align: center;margin: auto;margin-top: 70px;">
    <form style="width: 100%;" method="post">
    	<div class="mb-3 mt-3">
   	<label class="form-label">Produit</label>
        <select class="form-select" name="prod">
        <?php   while($row=$pdostat->fetch(PDO::FETCH_NUM)){
            echo "<option value='".$row[1]."'>".$row[2]."</option>";
        }
        ?>
        </select>
  		</div>
  		<div class="mb-3">
    <label for="adresse" class="form-label">Fournisseur</label>
    <select class="form-select "name="fourni">
        <?php while($row=$pdostatF->fetch(PDO::FETCH_NUM)){
            echo "<option value='".$row[0]."'>".$row[1]."</option>";
         } ?>
    </select>
  		</div>
  		<div class="mb-3">
    <label class="form-label">Date d'achat</label>
   	<input type="date" class="form-control" placeholder="Enter date" name="date" >
  		</div>
  		
  	<button type="submit" class="btn btn-dark" name="modifier"><i class="fas fa-edit"></i> Modifier</button>
</form> 
	</div>
            </div>
</div>
</body>
</html>