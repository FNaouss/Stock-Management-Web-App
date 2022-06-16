<?php
session_start();
if(!isset($_SESSION['user'])){    

  header("location:index.php");
}
try{
    
    include("./connexion.php");
        $id=$_GET['edit'];
    if(isset($_POST['modifier'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $adresse=$_POST['adresse'];
    $num=$_POST['num'];
    $pdostat=$bdd->prepare("update client set nom='".$name."', email='".$email."',adresse='".$adresse."' ,numTel='".$num."' where id_cli = ".$id."");
    $pdostat->execute();
    header("location:../clients.php");
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
   	<label class="form-label" for="name">Nom</label>
   	<input class="form-control" type="text" name="name" placeholder="Enter your name" >
    
  		</div>
  		<div class="mb-3 mt-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
  		</div>
  		<div class="mb-3">
    <label for="adresse" class="form-label">Adresse</label>
   	<input type="text" class="form-control" id="adresse" placeholder="Enter address" name="adresse">
  		</div>
  		<div class="mb-3">
    <label for="numéro" class="form-label">Numéro de téléphone</label>
   	<input type="tel" class="form-control" id="numéro" placeholder="Enter number" name="num" >
  		</div>
  		
  	<button type="submit" class="btn btn-dark" name="modifier"><i class="fas fa-edit"></i> Modifier</button>
</form> 
	</div>
            </div>
</div>
</body>
</html>