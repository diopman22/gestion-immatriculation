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
include("fonctions.php");

if (isset($_GET["id"])) {
$id= $_GET["id"];
$req='select * from etat_civil, contacts, piece, parents  where etat_civil.id_etat_civil="'.$id.'" and contacts.id_etat_civil="'.$id.'" and parents.id_etat_civil="'.$id.'" group by etat_civil.id_etat_civil';
$reponse = $bdd->query($req);
  while ($donnees= $reponse->fetch()) {
       $id=$donnees['id_etat_civil'];
        $nom=$donnees['nom'];
        $prenom=$donnees['prenom'];
        $profession=$donnees['profession'];
        $sit_mat=$donnees['situation_matrimonial'];  
        $teint=$donnees['teint'];
        $taille=$donnees['taille'];
        $adresse_sen=$donnees['adresse_senegal'];
        $adresse_gon=$donnees['adresse_gondwana'];
        $email=$donnees['email'];
        $tel_sen=$donnees['num_tel_senegal'];
        $tel_gon=$donnees['num_tel_gondwana'];
        $num=$donnees['immatriculation'];
    }
    $reponse->closeCursor();
    if(!empty($id))
    {
       
?>
   <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Modification du citoyen <?php echo $prenom.' '.strtoupper($nom)?></h4>
                </div>
                 <div class="col-md-offset-1 col-md-9">
                    <div class="panel panel-info">
                        <div class="panel-body">
                              <form action="modif.php" method="POST" id="form"  >
                                <div class="row">
                                        <h4 class="page-head-line">ETAT CIVIL</h4>
                                    <div class="col-xs-6 col-md-4">   
                                        <label for="text">Profession</label> 
                                        <input type="text" name="profession"  class="form-control" tabindex="1" required value="<?php echo $profession ?>"> <br/>
                                        <label for="text">Situation matrimoniale:</label>
                                        <input type="text" class="form-control" name="sit_mat" tabindex="2"  required value="<?php echo $sit_mat ?>" ><br/>
                                    </div>
                                    <div class="col-xs-6 col-md-4">
                                        <label for="text">Teint:</label>                          
                                        <input type="text" class="form-control"tabindex="3" name="teint"required value="<?php echo $teint ?>"><br/>
                                        <label for="text">Taille(cm):</label>
                                        <input type="number" class="form-control" name="taille" tabindex="4"  min=25 max=300 required value="<?php echo $taille ?>"><br/>
                                        <label for="text">Numéro:</label>                          
                                        <input type="text" class="form-control"tabindex="9" readonly name="num" required value="<?php echo $num ?>"><br/>
                                    </div>
                                  </div>
                                  <hr>
                                 <div class="row">
                                        <h4 class="page-head-line">CONTACTS</h4>
                                    <div class="col-xs-6 col-md-4">
                                        <label for="text">Adresse Sénégal</label>
                                        <input type="text" class="form-control" name="adresse_sen" tabindex="5"  required value="<?php echo $adresse_sen ?>"><br/>
                                        <label for="text">Adresse Gondwana</label>
                                        <input type="text" class="form-control" name="adresse_gon" tabindex="6"  required value="<?php echo $adresse_gon ?>"><br/>
                                    </div>
                                    <div class="col-xs-6 col-md-4">
                                        <label for="text">Email:</label>
                                        <input type="email" class="form-control" name="email" tabindex="7"  required value="<?php echo $email ?>"><br/>
                                        <label for="text">Tel Sénégal:</label>
                                        <input type="text" class="form-control" name="tel_sen" tabindex="8"  required value="<?php echo $tel_sen ?>"><br/>
                                        <label for="text">id</label>                          
                                        <input type="text" class="form-control"tabindex="10" readonly name="id" required value="<?php echo $id ?>"><br/>

                                    </div>
                                  </div>

                               </form>    
                        </div>
                        <div class="panel-footer">
                            <button type="submit" class="btn btn-info" name="enregistrer"  form="form">Enregistrer</button>
                            <button type="reset" class="btn btn-warning pull-right" form="form">annuler</button>
                       </div>
            </div>       
        </div>
    </div>
    </div>
</div>
<?php
  }else{
       echo "<script langage='javascript'> alert(\"La base de données est vide. Veuillez insérer pour pouvoir modifier!\")</script>";
           
}
}else{
        echo"<script langage='javascript'>document.location.href='modifier.php'</script>"; 
}
?>

 <?php 
include 'connexion.php';

if(isset($_REQUEST["enregistrer"])){
  $profession=$_REQUEST["profession"];
  $situ=$_REQUEST["sit_mat"];
  $teint=$_REQUEST["teint"];
  $taille=$_REQUEST["taille"];
  $num=$_REQUEST["num"];
#recuperation des contacts
  $email=$_REQUEST["email"];
  $adresse_sen=$_REQUEST["adresse_sen"];
  $adresse_gon=$_REQUEST["adresse_gon"];
  $num_tel_sen=$_REQUEST["tel_sen"];
  $id=$_REQUEST["id"];

  $bdd->exec('UPDATE etat_civil set profession="'.$profession.'", situation_matrimonial="'.$situ.'", teint="'.$teint.'", taille="'.$taille.'" where immatriculation="'.$num.'"');
  $bdd->exec('UPDATE contacts set email="'.$email.'", adresse_senegal="'.$adresse_sen.'", adresse_gondwana="'.$adresse_gon.'", num_tel_senegal="'.$num_tel_sen.'" where id_etat_civil="'.$id.'"');
  
    echo "<script langage='javascript'> alert(\"modification effectuee avec succes\")</script>"; 
   
    echo "<script langage='javascript'>document.location.href='modifier.php'</script>";
 
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
