<?php
session_start();
if(!isset($_SESSION['user'])){    

  header("location:index.php");
}
include("./DATABASE/show_commandes.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Virgin's Orders</title>
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
                <a href="#">Commandes</a>
                <a href="clients.php">Clients</a>
                </div>
                </div>
                <div class="dropdown">
                    <button class="dropbtn bg-dark">Settings</button>
                        <div class="dropdown-content bg-dark">
                    <a href="#">Profil</a>
                    <a href="./DATABASE/password.php">Change Password </a>
                    <a href="index.php">Log Out</a>
                        </div>
                </div>
        </nav>
        <section style="margin-top:80px;">
            <div class="row">
            <div class="col-2">
            </div>
  			<div class="col-8">
            <h5 class="card-title" style="text-align: center;padding: 20px;">Nos Ventes</h5>    	
      
  	<table class="table-dark table-hover table-striped table-bordered" style="width: 100%;">
  <thead>
    <tr>
      <th scope="col">Actions</th>
      <th scope="col">iD</th>
      <th scope="col">Produit</th>
      <th scope="col">Quantité</th>
      <th scope="col">Client</th>
      <th scope="col">Date</th>
      <th scope="col">Facture</th>
    </tr>
  </thead>
  <tbody>
      <?php while($row=$pdostatCM->fetch(PDO::FETCH_NUM)){
      ?>
   <tr>
      <td><a href="./DATABASE/deletecmd.php?delete=<?php echo $row['0']?>"><i class="fas fa-user-slash"></i></a>
      <a href="./DATABASE/updatecmd.php?edit=<?php echo $row['0']?>"><i class="fas fa-user-edit"></i></a></td>
<td><?php echo $row['0']?></td>
 <td><?php echo $row['1'] ?></td>
<td><?php echo $row['2']?></td>
<td><?php echo $row['3']?></td>
<td><?php echo $row['4']?></td>
<td><?php echo $row['5']?></td>
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