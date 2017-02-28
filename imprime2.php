<?php
session_start();
if(!(isset($_SESSION["login"])))
{
  header("location:index.php");
}
ob_start();
require ('connexion.php');


?>
<style type="text/css">
<!--
table
{
    width:  100%;
    border:none;
    border-collapse: collapse;
}
th
{
    text-align: center;
    border: solid 1px #eee;
    background: #f8f8f8;
}
td
{
    text-align: center;
     
    
}

-->
</style>

<?php 
   $id=$_SESSION['id'];
    $req='select * from etat_civil, contacts, piece, parents  where etat_civil.id_etat_civil="'.$id.'" and contacts.id_etat_civil="'.$id.'" and parents.id_etat_civil="'.$id.'" group by etat_civil.id_etat_civil';
    $reponse = $bdd->query($req);
  while ($donnees= $reponse->fetch()) {
        $id=$donnees['id_etat_civil'];
        $nom=$donnees['nom'];
        $prenom=$donnees['prenom'];
        $datenaiss=$donnees['date_naissance'];
        $lieunaiss=$donnees['lieu_naissance'];
        $sexe=$donnees['sexe'];
        $date_del=$donnees['date_delivrance'];
        $num=$donnees['immatriculation'];      
    }
    $reponse->closeCursor();
    $an=substr($datenaiss, 0,4);
    $mois=substr($datenaiss,5,2);
    $jour=substr($datenaiss,8,2);
    if(!empty($id))
    {
?>

<page style="font-size: 15pt"  backimgy="bottom">
    <table cellspacing="0" style="width: 100%; text-align: center; font-size: 25px">
        <tr>
            <td style="width:60%" >
                <h1><b>REPUBLIQUE DU SENEGAL</b></h1>
                <img src="assets/img/sen.png" style="width:100px; height:50px;" ><br>
                UN PEUPLE-UN BUT-UNE FOI<br>
                --------<br>
                <b>MINISTERE DES AFFAIRES</b><br>
                <b>ETRANGERES ET DES SENEGALAIS</b><br>
                <b>DE L'EXTERIEUR</b><br>
                HAUT COMMISSARIAT DU SENEGAL<br>
                AU GONDWANA<br>
            </td>
            <td style="width:40%"></td>
        </tr>      
    </table>
    <br><br>
    <table cellspacing="0" style="width: 100%; text-align: center; font-size: 25px">
        <tr>
            <td style="width:100%">
                <b><u>Certificat d'immatriculation</u></b><br><br><br>
            </td>
        </tr>
    </table>
    <table cellspacing="0" style="width: 100%; text-align: center; font-size: 20px">
        <tr>
            <td style="width:100%;text-align:left">
                Je soussigné Monsieur l'Ambassadeur et Haut Commissaire du Sénégal en Gondwana,
                atteste que <b>Monsieur <?php echo $prenom.' '.strtoupper($nom) ?></b> <?php if($sexe=='M') echo "né";else echo"née"?> le <?php echo $jour.'/'.$mois.'/'.$an ?> &aacute; <?php echo $lieunaiss ?> a été <?php if($sexe=='M') echo "immatriculé";else echo"immatriculée"?> au
                registre des sénégalais vivant au Gondwana le <b><?php echo substr($date_del,8,2).'/'.substr($date_del,5,2).'/'.substr($date_del,0,4);?></b> sous le numéro <b><?php echo $num; ?></b>. En
                foi de quoi ce certificat lui est délivré pour servir et valoir ce que de droit.
            </td>
        </tr>
    </table>
    <br><br><br><br>
    <table cellspacing="0" style="width: 100%; text-align: center; font-size: 20px">
        <tr>
            <td style="width:70%">
           </td>
            <td style="width:30%;text-align:right">
                <b>L'Ambassadeur haut commissaire</b>
            </td>
        </tr>
    </table>
</page>
<?php 
}
    $content = ob_get_clean();
    require_once( __DIR__ . "/html2pdf/html2pdf.class.php");
    try
    {
        $html2pdf = new HTML2PDF("P", "A4", "fr");
        $html2pdf->setDefaultFont("Arial");
        $html2pdf->pdf->IncludeJS('print(true)');
        $html2pdf->writeHTML($content);
        $html2pdf->Output("certificat_immatriculation.pdf");
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
?>