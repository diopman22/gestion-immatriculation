<?php
session_start();
if(!(isset($_SESSION["login"])))
{
  header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="author" content="Mansour Baro DIOP & Mohamed SAMB"/>
    <meta name="contact state" content="SENEGAL"/>
    <title>Gondwana Sénégal</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
</head>
<body>
    
    <!-- HEADER END-->

    <div class="navbar navbar-inverse set-radius-zero" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>

            <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1">
                 
                <div class="user-settings-wrapper">
                    <ul class="nav">
                        <div class="row">
                            <div class="col-md-offset-1 col-md-10">
                               <li><a href="accueil.php"><h4><i class="fa fa-spinner fa-spin"></i> ACCUEIL</h4></a></li>&nbsp;&nbsp;&nbsp;&nbsp;
                            </div>
                            <div class="col-md-1">
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                        <span class="glyphicon glyphicon-user" style="font-size: 25px;"></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-settings">
                                    <hr />
                                    <a href="deconnexion.php" class="btn btn-info "><i class="fa fa-edit">&nbsp;&nbsp;Déconnexion</i></a>
                                    <hr />
                                    </div>
                                </li>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>

        </div>
    </div>
    
    <?php 
include 'connexion.php';

if (isset($_GET["id"])) {
$id_= $_GET["id"];
$req='select * from etat_civil, contacts, piece, parents  where etat_civil.id_etat_civil="'.$id_.'" and contacts.id_etat_civil="'.$id_.'" and parents.id_etat_civil="'.$id_.'" group by etat_civil.id_etat_civil';
$reponse = $bdd->query($req);
  while ($donnees= $reponse->fetch()) {
        $id=$donnees['id_etat_civil'];

    }
    $reponse->closeCursor();
    if(!empty($id))
    {
       
?>
    
   <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Génération des documents</h4>
                </div>
                  
            </div>
             <div class="row">
                <div class="col-md-4 col-sm-3 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-one">
                        <i class="fa fa-print dashboard-div-icon"></i>
                        <hr>
                        <a  href="imprime1.php"><h3>Carte consulaire</h3></a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-3 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-two">
                        <i class="fa fa-print dashboard-div-icon"></i>
                        <hr>
                        <a  href="imprime2.php"><h3>Certificat d'immatriculation</h3></a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-3 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-three">
                        <i class="fa fa-print dashboard-div-icon"></i>
                        <hr>
                        <a  href="imprime3.php"><h3>Changement d'adresse</h3></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <?php
   $_SESSION['id']=$id;
  }else{
       echo "<script langage='javascript'> alert(\"La base de données est vide. Veuillez insérer pour pouvoir générer!\")</script>";
           
}
}else{
        echo"<script langage='javascript'>document.location.href='lister.php'</script>"; 
}
?>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    © 2015 67C | By : Mansour Baro DIOP & Mohamed SAMB
                </div>
            </div>
        </div>
    </footer>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>

</body>
</html>
