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
$req='select * from etat_civil, contacts, piece, parents  where etat_civil.id_etat_civil=contacts.id_etat_civil and etat_civil.id_etat_civil=piece.id_etat_civil and etat_civil.id_etat_civil=parents.id_etat_civil order by etat_civil.id_etat_civil';
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
        $adresse_sen=$donnees['adresse_senegal'];
        $adresse_gon=$donnees['adresse_gondwana'];
        $teint=$donnees['teint'];
        $taille=$donnees['taille'];
        $num=$donnees['immatriculation'];
        $email=$donnees['email'];
        $photo=$donnees['photo'];
        $scan_cni=$donnees['scan_cni'];
        $pere=$donnees['prenom_pere'];
        $prenom_mere=$donnees['prenom_mere'];
        $nom_mere=$donnees['nom_mere'];

    }
    $reponse->closeCursor();
    if(!empty($id))
    {
?>

   <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Suppression d'un citoyen gondwanien</h4>
                </div>
                  <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table  table-bordered table-striped table-condensed" id="mytable">
                            <thead>
                              <tr class="active info">
                                <th>#</th>
                                <th>Prénom et nom</th>
                                <th>Numéro</th>
                                <th>CNI ou passeport</th>
                                <th>Action</th>                      
                              </tr>
                            </thead>  
                            <tbody>
                              <?php
                                  $req='select * from etat_civil, contacts, piece, parents  where etat_civil.id_etat_civil=contacts.id_etat_civil and etat_civil.id_etat_civil=piece.id_etat_civil and etat_civil.id_etat_civil=parents.id_etat_civil order by etat_civil.id_etat_civil';
                                    $reponse = $bdd->query($req);
                                    $i=1;
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
                                            $teint=$donnees['teint'];
                                            $taille=$donnees['taille'];
                                            $num=$donnees['immatriculation'];
                                            $tel=$donnees['num_tel_senegal'];
                                             $adresse_sen=$donnees['adresse_senegal'];
                                                            
                              ?>  <tr>
                              <form method="post" action="supprimer.php">
                                <td> <?php echo $i;  ?></td>
                                <td> <?php echo $prenom.' '.strtoupper($nom); ?></td>
                                <td> <?php echo $num;?></td>
                                <td> <?php echo $cni;$i++;?></td>
                                <input type="hidden" name="id" value="<?php echo $id;  ?>" />
                                <td> <input type="submit" class="btn btn-info"  value="supprimer" onclick="return confirm('Voulez vous vraiment effectue la suppression?');" name="delete"></td>
                                </form>
                              </tr>
                          
                             <?php  

                                }$reponse->closeCursor();
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <?php
  }else{
       echo "<script langage='javascript'> alert(\"La base de données est vide. Veuillez insérer pour pouvoir supprimer!\")</script>";
        echo"<script langage='javascript'>document.location.href='accueil.php'</script>";        
}
?>
<?php
    if(isset($_REQUEST["delete"]))
  {
    $id= $_REQUEST["id"];
    $bdd->exec("DELETE from etat_civil where id_etat_civil='".$id."'");
   echo "<script langage='javascript'> alert(\"suppression effectue avec succes\")</script>"; 
   echo "<script langage='javascript'> document.location.href='supprimer.php'</script>"; 

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
    <script src="assets/js/dataTables.bootstrap.js"></script>
    <script src="assets/js/jquery.dataTables.js"></script>
    <script>
 $(document).ready(function() {
     $('#mytable').dataTable();
    });

 </script>
<script type="text/javascript">
jQuery(function($) {

  //Preloader
  var preloader = $('.preloader');
  $(window).load(function(){
    preloader.remove();
  });
});
</script>

</body>
</html>
