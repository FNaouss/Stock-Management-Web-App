<?php
session_start();
if(!isset($_SESSION['user'])){    

  header("location:index.php");
}
include("./DATABASE/show_clients.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Virgin's Clients</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./css/clients.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    
</head>
<body>
	<div class="pos-f-t">
        <nav class="navbar navbar-dark bg-dark">
            <a href="dashboard.php"><img src="./images/virgin.png" style="width: 70px"></a>
            
                <form class="form-inline bg-dark">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-sm btn-outline-secondary" type="submit" style="color: white">Search</button>
                </form>
                <button class="dropbtn bg-dark"><a href="./DATABASE/addcommande.php" style="color:white;text-decoration:none;">Passer une commande</a></button>
                <div class="dropdown">
                <button class="dropbtn bg-dark">Produits</button>
                <div class="dropdown-content bg-dark">
                    <a href="produits.php">Stock</a>
                    <a href="categories.php">Catégories</a>
                </div>
                </div>
                <div class="dropdown">
                <button class="dropbtn bg-dark">Achats</button>
                <div class="dropdown-content bg-dark">
                <a href="appro.php">Approvisionnements</a>
                <a href="fournisseurs.php">Fournisseurs</a>
                </div>
                </div>
                <div class="dropdown">
                <button class="dropbtn bg-dark">Ventes</button>
                <div class="dropdown-content bg-dark">
                <a href="commandes.php">Commandes</a>
                <a href="clients.php">Clients</a>
                </div>
                </div>
                <div class="dropdown">
                    <button class="dropbtn bg-dark">Settings</button>
                        <div class="dropdown-content bg-dark">
                    <a href="profile.php">Profil</a>
                    <a href="./DATABASE/password.php">Change Password </a>
                    <form action="index.php" method="post"><button type="submit" name="logout" class="btn btn-dark">Log Out</button></form>
                        </div>
                </div>
        </nav>
        <section style="margin-top:80px;">
            <div class="row">
            <div class="col-3">
            <div class="fo" style="width: 90%;text-align: center;margin: auto;margin-top: 70px;">
    <form style="width: 100%;" method="post" action="./DATABASE/addclient.php">
    	<div class="mb-3 mt-3">
   	<label class="form-label" for="name">Nom</label>
   	<input class="form-control" type="text" name="name" placeholder="Enter your name" required>
    
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
   	<input type="tel" class="form-control" id="numéro" placeholder="Enter number" name="num" required>
  		</div>
  		
  	<button type="submit" class="btn btn-dark"><i class="fas fa-plus"></i> Ajouter</button>
</form> 
	</div>
            </div>
  			<div class="col-9">
            <h5 class="card-title" style="text-align: center;padding: 20px;">Nos Clients</h5>    	
      
  	<table class="table-dark table-hover table-striped table-bordered" style="width: 100%;">
  <thead>
    <tr>
      <th scope="col">Actions</th>
      <th scope="col">iD</th>
      <th scope="col">Nom</th>
      <th scope="col">Email</th>
      <th scope="col">Adresse</th>
      <th scope="col">Numéro de téléphone</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach ($pdostatCli as $client) {
      ?>
   <tr>
      <td><a href="./DATABASE/gererclient.php?delete=<?php echo $client['id_cli']?>"><i class="fas fa-user-slash"></i></a>
      <a href="./DATABASE/updateclient.php?edit=<?php echo $client['id_cli']?>"><i class="fas fa-user-edit"></i></a></td>
<td><?php echo $client['id_cli']?></td>
 <td><?php echo $client['nom'] ?></td>
<td><?php echo $client['email']?></td>
<td><?php echo $client['adresse']?></td>
<td>0<?php echo $client['numTel']?></td>
    </tr>
  	<?php
  	}
  	?>
  </tbody>
</table>
  			</div>
  		</div>
            
</body>
</html>