<?php
session_start();
  if(!isset($_SESSION['user'])){    
  
    header("location:index.php");
  }

  include('./DATABASE/connexion.php');
  include('./DATABASE/show_fournisseurs.php');
  include('./DATABASE/show_clients.php');
  include('./DATABASE/stats.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Virgin Megastore</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./css/dashboard.css">
</head>
<body>
    <div class="pos-f-t">
        <nav class="navbar navbar-dark bg-dark">
            <img src="./images/virgin.png" style="width: 70px">
            
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
        <section>
            <div class="center" style="margin-top:80px;">
              <div class="container px-4">
  <div class="row gx-5">
    <div class="col">
     <div class="p-3 border bg-danger">
       <h2>Dépenses</h2>
      <?php echo $dep[0]." DHS";?>
      </div>
    </div>
    <div class="col">
      <div class="p-3 border bg-danger">
        <h2>Revenus</h2>
      <?php echo $rev[0]." DHS";?>

        </div>
    </div>
  </div>
</div>
            <h5 class="card-title" style="text-align: center;padding: 20px;">Top Clients</h5>
            <table class="table-dark tabdash">
  <thead>
    <tr>
      <th scope="col">iD</th>
      <th scope="col">Nom</th>
      <th scope="col">Email</th>
      <th scope="col">Adresse</th>
      <th scope="col">Numéro de téléphone</th>
      <th scope="col">Points de Fidélité</th>
    </tr>
  </thead>
  <tbody>
    <?php
      while($r=$pdostatTopC->fetch(PDO::FETCH_NUM)){
    ?>
    <tr>
      <td><?php echo $r[0]?></td>
      <td><?php echo $r[1]?></td>
      <td><?php echo $r[2]?></td>
      <td><?php echo $r[3]?></td>
      <td>0<?php echo $r[4]?></td>
      <td><?php echo $r[5]?></td>
    </tr>
    <?php }?>
  </tbody>
</table>
<button type="button" class="btn btn-primary"><a href="clients.php">Voir plus</a></button>
    <h5 class="card-title" style="text-align: center;padding: 20px;">Top Fournisseurs</h5>
    <table class="table-dark tabdash">
      <thead>
    <tr>
      <th scope="col">iD</th>
      <th scope="col">Nom</th>
      <th scope="col">Email</th>
      <th scope="col">Adresse</th>
      <th scope="col">Numéro de téléphone</th>
      <th scope="col">Points de Fidélité</th>
    </tr>
  </thead>
  <tbody>
    <?php
      while($row=$pdostatTopF->fetch(PDO::FETCH_NUM)){
    ?>
    <tr>
      <td><?php echo $row[0]?></td>
      <td><?php echo $row[1]?></td>
      <td><?php echo $row[2]?></td>
      <td><?php echo $row[3]?></td>
      <td>0<?php echo $row[4]?></td>
      <td><?php echo $row[5]?></td>
    </tr>
    <?php }?>
  </tbody>
</table>
<button type="button" class="btn btn-primary"><a href="fournisseurs.php">Voir plus</a> </button>
            </div>
        </section>
</body>
</html>