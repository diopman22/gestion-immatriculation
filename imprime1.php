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
        $cni=$donnees['cni_ou_passeport'];
        $sexe=$donnees['sexe'];
        $profession=$donnees['profession'];
        $sit_mat=$donnees['situation_matrimonial'];
        $discipline=$donnees['discipline'];
        $date_del=$donnees['date_delivrance'];
        $date_fin=$donnees['date_fin_validite'];      
        $teint=$donnees['teint'];
        $taille=$donnees['taille'];
        $num=$donnees['immatriculation'];      
        $photo=$donnees['photo'];
        $adresse_sen=$donnees['adresse_senegal'];
        $adresse_gon=$donnees['adresse_gondwana'];
        $email=$donnees['email'];
        $scan_cni=$donnees['scan_cni'];
        $pere=$donnees['prenom_pere'];
        $prenom_mere=$donnees['prenom_mere'];
        $nom_mere=$donnees['nom_mere'];
    }
    $reponse->closeCursor();
    $an=substr($datenaiss, 0,4);
    $mois=substr($datenaiss,5,2);
    $jour=substr($datenaiss,8,2);
    if(!empty($id))
    {
?>
  <page style="font-size: 12pt"  backimgy="bottom">
    <table cellspacing="0" style="width: 100%; text-align: center; font-size: 25px">
        <tr>
            <td style="width:50%" >
                <h1><b>CARTE CONSULAIRE</b></h1>
                HAUT COMMISSARIAT DU SENEGAL<br><br>
                    AU GONDWANA
            </td>
            <td style="width:50%"></td>
        </tr>      
    </table>
    <br><br>
    <table cellspacing="0" style="width: 100%; text-align: center; font-size: 25px">
        <tr>
            <td style="width:100%"><b>N°:<?php echo $num; ?></b></td>
        </tr>
    </table>
    <br><br><br><br>
    <table cellspacing="0" style="width: 100%;  font-size: 20px">
        <tr>
            <td style="width:70%">
                <table cellspacing="0" style="width: 100%; text-align: left; font-size: 15pt;">
                    <tr>
                        <td style="width:60%; text-align:left">
                            Pr&eacute;nom : <b><i><?php echo $prenom; ?></i></b><br>
                            nom :<b><i><?php echo $nom; ?></i></b><br>
                            N&eacute;(e) le : <b><i><?php echo $jour.'/'.$mois.'/'.$an; ?></i></b><br>
                            &aacute; :<b><i> <?php echo $lieunaiss; ?></i></b><br>
                            De:<b><i><?php echo $pere; ?></i></b><br>
                            et de:<b><i> <?php echo $prenom_mere.' '.strtoupper($nom_mere); ?></i></b><br>
                            CNI/passeport:<b><i> <?php echo $cni; ?></i></b><br>
                            Profession:<b><i> <?php echo $profession; ?></i></b><br>
                            Adresse :<b><i> <?php echo $adresse_sen; ?></i></b>
                        </td>
                        <td style="width:40%"></td>
                    </tr>
                </table>
            </td>
            <td style="width:30%">
                <img src="<?php echo $photo ?>" style="height:200px;width:100px; float:left" position="absolute" >
            </td>
             
        </tr>
    </table>
    <br><br><br><br>
    <table cellspacing="0" style="width: 100%;  font-size: 15pt">
        <tr>
            <td style="width:20%;text-align:left">
                Signalement
            </td>
            <td style="width:40%; text-align:left">
                Teint: <?php echo $teint; ?><br>
                Taille :<?php echo $taille.' cm'; ?><br>
                Fait le: <b><i><?php echo substr($date_del,8,2).'/'.substr($date_del,5,2).'/'.substr($date_del,0,4);?></i></b>
            </td>
            <td style="width:40%">
                Timbre
            </td>
        </tr>
    </table>
    <br><br><br><br>
        <table cellspacing="0" style="width: 100%;  font-size: 15pt">
        <tr>
            <td style="width:50%;text-align:left">
                Valable jusqu'au: <b><i><?php echo substr($date_fin,8,2).'/'.substr($date_fin,5,2).'/'.substr($date_fin,0,4);?></i></b>
            </td>
            <td style="width:25%"></td>
            <td style="width:25%"></td>
        </tr>
        </table>
        <br><br><br><br><br><br><br>
        <table cellspacing="0" style="width: 100%;  font-size: 15pt">
        <tr>
            <td style="width:30%;text-align:left">
                Empreinte index gauche
            </td>
            <td style="width:35%">
                Signature du titulaire
            </td>
            <td style="width:35%">
                L'ambassadeur Haut<br>Commissaire
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
        $html2pdf->Output("carte_consulaire.pdf");
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
?>