<?php
ob_start();
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


<page style="font-size: 15pt"  backimgy="bottom">
    <table cellspacing="0" style="width: 100%; font-size: 25px">
        <tr>
            <td style="width:50%">
                <h2>CHANGEMENT D'ADRESSE<br>
                DANS LA CISCONSCRIPTION</h2><br><br><br>
                <b>Visas par le chef de Mission</b><br><br>
                ....................................<br>
                ....................................<br>
                ....................................<br>
                ....................................<br><br><br>
                                <b>NOTE</b><br><br><br>
                Cette carte doit être obligatoirement
                rendue en cas de départ définitif
            </td>
            <td style="width:50%" >
                <br><br><br>
                <h1><b>REPUBLIQUE DU SENEGAL</b></h1>
                <img src="assets/img/sen.png" style="width:100px; height:50px;" ><br><br>
                UN PEUPLE-UN BUT-UNE FOI<br><br>
                --------<br><br>
                <b>MINISTERE DES AFFAIRES</b><br>
                <b>ETRANGERES ET DES SENEGALAIS</b><br>
                <b>DE L'EXTERIEUR</b><br><br>
                HAUT COMMISSARIAT DU SENEGAL<br>
                AU GONDWANA<br><br>
                --------<br>
                <h1>CARTE <br>D'IDENTITE <br>CONSULAIRE</h1>
            </td>
        </tr>      
    </table>
</page>
<?php 
    $content = ob_get_clean();
    require_once( __DIR__ . "/html2pdf/html2pdf.class.php");
    try
    {
        $html2pdf = new HTML2PDF("P", "A4", "fr", "true","UTF-8");
        $html2pdf->setDefaultFont("Arial");
        $html2pdf->pdf->IncludeJS('print(true)');
         $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output("changement_adresse.pdf");
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
?>