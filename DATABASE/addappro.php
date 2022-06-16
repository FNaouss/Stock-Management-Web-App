<?php
session_start();
if(!isset($_SESSION['user'])){    

  header("location:index.php");
}    
include('show_products.php');
    try{
        include('connexion.php');
        if(isset($_POST['ajouter'])){
            $idFourn=$_POST['fourni'];
            $date=$_POST['date'];
        }
    }
    catch(PDOException $e){
        $e->getMessage();
    }
?>


<!DOCTYPE html>
<html>
<head>
  <title>Ajouter Approvisionnement</title>
  <meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

</head>
<body>
<div class="row">
<div class="col-4">
</div>
<div class="col-4">
<form method="post" style="width: 100%;text-align: center;margin: auto;margin-top: 70px;" action="addappro2.php">
<div class="mb-3">
    <label class="form-label">Date</label>
   	<input type="date" class="form-control" value="<?php echo $date ?>" name="date" disabled>
    <input value="<?php echo $date; ?>"  type="hidden" name="date" />
</div>
<div class="mb-3">
    <label class="form-label">Fournisseur</label>
   	<input type="text" class="form-control" value="<?php echo $idFourn ?>" name="idF" disabled>
    <input value="<?php echo $idFourn; ?>"  type="hidden" name="idF" />
</div>
<div class="mb-3">
    <label class="form-label">Produit</label>
    <select class="form-select" name="prod">
        <?php while($row=$pdostat->fetch(PDO::FETCH_NUM)){
        ?>
        <option value="<?php echo $row['1']?>"><?php echo $row['2']?></option>
        <?php }
        ?>
    </select>
</div>
<div class="mb-3">
    <label  class="form-label">Quantité</label>
   	<input type="number" class="form-control" id="qte" placeholder="Enter quantity" name="qte">
  		</div>
    <button class="btn btn-dark" name="add2" type="submit"><i class="fas fa-plus"></i> Passer au produit suivant</button>
    <button class="btn btn-dark" name="fin" type="submit"><i class="fas fa-undo-alt"></i> Fin</button>
</form>
        </div>
        </div>
</body>
</html>