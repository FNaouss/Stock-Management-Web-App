<?php
include('facture.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture</title>
</head>
<body style="text-align:center;">
    <h1>Facture n°<?php echo $idfacture[0] ?></h1>
    <table style="margin:auto;">
        <tr>
            <td>Produit</td>
            <td>Quantité</td>
            <td>Prix</td>
        </tr>
            <?php $tmp=0;
    while($row=$pdostatpdf->fetch(PDO::FETCH_NUM)){ ?>
                <tr>
                    <td><?php echo $row['0']?></td>
                    <td><?php echo $row['1']?></td>
                    <td><?php echo $row['2']; $tmp=$tmp+$row[2];?></td>
                </tr>
            <?php } ?>
            <tr>
                <td>Total</td>
                <td></td>
                <td><?php echo $tmp ?></td>
            </tr>
    </table>
</body>
</html>