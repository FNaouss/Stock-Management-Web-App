<?php
session_start();
if(!isset($_SESSION['user'])){    

  header("location:index.php");
}
try{
    include("./connexion.php");
    include("./show_categories.php");
    if(isset($_GET['edit'])){
        $id=$_GET['edit'];
    }
    if(isset($_POST['modifier'])){
    $cat=$_POST['cat'];
    $pdostat=$bdd->prepare("update categorie set designation='".$cat."' where id_cat=".$id."");
    $pdostat->execute();
    header("location:../categories.php");
}
}
catch(PDOException $e){
    $e->getMessage();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Modifier Catégorie</title>
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
  		<div class="mb-3">
    <label  class="form-label">Catégorie</label>
    <input type="text" name="cat" placeholder="enter new category's name">
  		</div>
  		
  	<button type="submit" class="btn btn-dark" name="modifier"><i class="fas fa-edit"></i> Modifier</button>
</form> 
	</div>
            </div>
</div>
</body>
</html>