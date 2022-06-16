<?php
session_start();
if(!isset($_SESSION['user'])){    

  header("location:index.php");
}
try{
    include("connexion.php");
    include("show_categories.php");
    if(isset($_GET['edit'])){
        $id=$_GET['edit'];
        $pdostatModP=$bdd->prepare("SELECT photo, libelle,reference,Qté,prixAch, prixV,designation FROM produit JOIN categorie ON produit.id_cat=categorie.id_cat where idProd=$id");
        $pdostatModP->execute();
        $row1=$pdostatModP->fetch(PDO::FETCH_NUM);
    }
    if(isset($_POST['modifier'])){
        $lib=$_POST['lib'];
        $ref=$_POST['ref'];
        $quantite=$_POST['quantite'];
        $pa=$_POST['pa'];
        $pv=$_POST['pv'];
        $cat=$_POST['id_cat'];
        $photo=$_POST['photo'];
        $pdostat=$bdd->prepare("update produit set photo='".$photo."', libelle='".$lib."',reference='".$ref."',Qté=".$quantite.",prixAch=".$pa.",prixV=".$pv.",id_cat=".$cat." where idProd=".$id."");
        $pdostat->execute();
        header("location:../produits.php");
}}
catch(PDOException $e){
    $e->getMessage();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Modifier Produit</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    </head>
<body>
<div class="row">
            <div class="col-4">
            </div>
            <div class="col-4">
            <div class="fo" style="width: 100%;text-align: center;margin: auto;margin-top: 70px;">
    <form style="width: 100%;" method="post">
    <div class="mb-3 mt-3">
                <label class="form-label">Image (Only PNG files are supported)</label>
                <input class="form-control" type="file" name="photo" value="<?php echo $row1[0] ?>"/>
        </div>
    	<div class="mb-3 mt-3">
   	<label class="form-label" for="name">Libelle</label>
   	<input class="form-control" type="text" name="lib" value="<?php echo $row1[1] ?>" >
    
  		</div>
  		<div class="mb-3 mt-3">
    <label class="form-label">Référence</label>
    <input type="text" class="form-control" id="ref" value="<?php echo $row1[2] ?>" name="ref">
  		</div>
  		<div class="mb-3">
    <label  class="form-label">Quantité</label>
   	<input type="number" class="form-control" id="quantite" value="<?php echo $row1[3] ?>" name="quantite">
  		</div>
  		<div class="mb-3">
    <label  class="form-label">Prix d'achat</label>
   	<input type="number" class="form-control" id="pa" value="<?php echo $row1[4] ?>" name="pa" >
  		</div>
  		<div class="mb-3">
    <label  class="form-label">Prix de vente</label>
   	<input type="number" class="form-control" id="pv" value="<?php echo $row1[5] ?>" name="pv" >
  		</div>
  		<div class="mb-3">
    <label  class="form-label">Catégorie</label>
   	    <select class="form-select "name="id_cat" id="id_cat">
        <?php while($row=$pdstat->fetch(PDO::FETCH_NUM)){
            echo "<option value='".$row[0]."'>".$row[1]."</option>";
         } ?>
        </select>
  		</div>
  		
  	<button type="submit" class="btn btn-dark" name="modifier"><i class="fas fa-edit"></i> Modifier</button>
</form> 
	</div>
            </div>
</div>
</body>
</html>