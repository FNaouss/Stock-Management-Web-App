<?php
session_start();
if(!isset($_SESSION['user'])){    

  header("location:index.php");
}
try{
    include("./connexion.php");
    if(isset($_POST['modifier'])){
    $old=$_POST['old'];
    $new=$_POST['new'];
    $email=$_SESSION['user'];
    $pdostatmdp=$bdd->prepare("select PASSWORD from login where username = '".$email."'");
    $pdostatmdp->execute();
    $mdp=$pdostatmdp->fetch(PDO::FETCH_NUM);
    echo $mdp[0];
    if($old==$mdp[0]){
    $pdostat=$bdd->prepare("update login set PASSWORD='".$new."' where username='".$email."'");
    $pdostat->execute();
    header("location:../index.php");
    session_destroy();
    }
    else{
        header("location:./password.php");
    }
}
}
catch(PDOException $e){
    $e->getMessage();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Modifier Mot de Passe</title>
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
    <label  class="form-label">Ancien Mot de Passe</label>
    <input type="password" name="old" placeholder="enter your current password">
  		</div>
  		<div class="mb-3">
    <label  class="form-label">Nouveau Mot de Passe</label>
    <input type="password" name="new" placeholder="enter new Password">
  		</div>
  		
  	<button type="submit" class="btn btn-dark" name="modifier"><i class="fas fa-edit"></i> Modifier</button>
</form> 
	</div>
            </div>
</div>
</body>
</html>