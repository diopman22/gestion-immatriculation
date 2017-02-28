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
                               <?php if ($_SESSION["type"]=="admin") {
                                ?>
                                <li><a href="immatriculation.php"><h4><i class="fa fa-users fa-spin"></i> IMMATRICULATION</h4></a></li>&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php
                               }else{
                                ?>
                                <li><a href="immatriculation2.php"><h4><i class="fa fa-users fa-spin"></i> IMMATRICULATION</h4></a></li>&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php
                               }
                                ?>
                                <li><a href="statistiques.php"><h4><i class="fa fa-bar-chart fa-spin"></i> STATISTIQUES</h4></a></li>&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php if ($_SESSION["type"]=="admin") {
                                ?>
                                <li><a href="parametre/param_admin.php"><h4><i class="fa fa-cogs fa-spin"></i> PARAMETRES</h4></a></li>
                                <?php
                               }else{
                                ?>
                                <li><a href="parametre/param_agent.php"><h4><i class="fa fa-cogs fa-spin"></i> PARAMETRES</h4></a></li>
                                <?php
                               }
                                ?>
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
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Dashboard: <?php if ($_SESSION["type"]=="admin") echo"Administrateur du site";else echo"Agent du site"?></h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-3 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-one">
                        <i class="fa fa-users dashboard-div-icon"></i>
                        <hr>
                        <?php if ($_SESSION["type"]=="admin") {
                        ?>
                        <a href="immatriculation.php"><h3>Immatriculation</h3></a>
                        <?php
                        }else{
                        ?>
                        <a href="immatriculation2.php"><h3>Immatriculation</h3></a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="col-md-4 col-sm-3 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-two">
                        <i class="fa fa-bar-chart dashboard-div-icon"></i>
                        <hr>
                        <a href="statistiques.php"><h3>Statistiques</h3></a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-3 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-three">
                        <i class="fa fa-cogs dashboard-div-icon"></i>
                        <hr>
                        <?php if ($_SESSION["type"]=="admin") {
                        ?>
                        <a href="parametre/param_admin.php"><h3>Paramètres</h3></a>
                        <?php
                        }else{
                        ?>
                        <a href="parametre/param_agent.php"><h3>Paramètres</h3></a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
