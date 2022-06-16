<?php
session_start();
if(!isset($_SESSION['user'])){    

  header("location:index.php");
}
include('show_products.php');
include('show_clients.php');
include('facture.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Buy Products</title>
  <meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../css/clients.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
</head>
<body>
<div class="pos-f-t">
        <nav class="navbar navbar-dark bg-dark">
            <img src="../images/virgin.png" style="width: 70px">
            
                <form class="form-inline bg-dark">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-sm btn-outline-secondary" type="submit" style="color: white">Search</button>
                </form>
                <button class="dropbtn bg-dark"><a href="./DATABASE/addcommande.php" style="color:white;text-decoration:none;">Passer une commande</a></button>
                <div class="dropdown">
                <button class="dropbtn bg-dark">Produits</button>
                <div class="dropdown-content bg-dark">
                    <a href="../produits.php">Stock</a>
                    <a href="../categories.php">Catégories</a>
                </div>
                </div>
                <div class="dropdown">
                <button class="dropbtn bg-dark">Achats</button>
                <div class="dropdown-content bg-dark">
                <a href="../appro.php">Approvisionnements</a>
                <a href="../fournisseurs.php">Fournisseurs</a>
                </div>
                </div>
                <div class="dropdown">
                <button class="dropbtn bg-dark">Ventes</button>
                <div class="dropdown-content bg-dark">
                <a href="../commandes.php">Commandes</a>
                <a href="../clients.php">Clients</a>
                </div>
                </div>
                <div class="dropdown">
                    <button class="dropbtn bg-dark">Settings</button>
                        <div class="dropdown-content bg-dark">
                    <a href="profile.php">Profil</a>
                    <a href="password.php">Change Password</a>
                    <form action="../index.php" method="post"><button type="submit" name="logout" class="btn btn-dark">Log Out</button></form>
                        </div>
                </div>
        </nav>
        <div class="row" style="margin-top:80px;">
          <div class="col-8">
            <div style="text-align:center;">
            <form action="addcommande2.php" method="post">
              <button class="btn btn-dark"type="submit" name="insfact">Nouvelle Facture</button>
            </form>
            <br>
            <h1> Facture n°<?php echo $facture[0]." : ".$facture[1]."</h1>" ;?>
            <br>
          <label class="form-label">Client</label>
    <select class="form-select" name="cli">
        <?php while($row=$pdostatCli->fetch(PDO::FETCH_NUM)){
            echo "<option value='".$row[0]."'>".$row[1]."</option>";
            $id=$row[0];
         } ?>
    </select>
        </div>
            
            <table>
        <?php  
        while($row=$pdostat->fetch(PDO::FETCH_NUM)){
        ?>
              <tr>
                <td>
                <img src="../images/<?php echo $row[0];?>" style="width:300px;">
                </td>
                <td>
                <h2><?php echo $row[1]."-".$row[2]." : ".$row[7] ?></h2>
                <p>
                  <?php
                    if($row[4]<=0){
                      echo "Out Of Stock";}
                      else{
                 echo "Notre magasin met en vente " .$row[4]." ".$row[2]." à ".$row[6]." DHS";
                    }
                  ?>
                  <form method="post" action="addcommande2.php">
                  <input type="number" class="form-control" name="idCli" value="<?php echo $id ?>" hidden>
                  <input type="number" class="from-control" name="idProd" value="<?php echo $row[1] ?>" hidden>
   	              <input type="number" class="form-control" id="qte" placeholder="Enter quantity" name="qte" style="width:250px;">
                  <button type="submit" class="btn btn-dark" name="ajouter"><i class="fas fa-shopping-cart"></i> Ajouter au panier</button>
                  </form>
                </p>
                </td>
              </tr>
          
        <?php } ?> 
                  </table>
                  <div style="text-align:center;">
                  <button class="btn btn-dark" type="submit" name="Valider"><a href="genpdf.php">Générer la facture</a></button>
                  </div>
          </div>
    </div>
</div>
</body>
</html>