<?php
    include("facture.php");
    use Dompdf\Dompdf;
    include("connexion.php");
    include("../dompdf/autoload.inc.php");
    include("facture.php");
    $pdostatpdf=$bdd->prepare("select libelle,qte_vente,prixV*qte_vente,client.nom from ((vente join produit on vente.id_prod=produit.idProd)join (facture join commande on id_fact=id_facture) on commande.id_cmd=vente.id_cmd)join client on client.id_cli=commande.id_cli where facture.id_fact=".$idfacture[0]."");
    $pdostatpdf->execute();
    ob_start();
    include("pdf.php");
    $html=ob_get_contents();
    ob_end_clean();
    $pdf=new dompdf();
    $pdf->loadHtml($html);
    $pdf->render();
    $fichier="facture.pdf";
    $pdf->stream($fichier);
    ?>