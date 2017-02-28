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
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Inscription d'un citoyen gondwanien</h4>
                </div>
                <div class="col-md-offset-1 col-md-9">
                    <div class="panel panel-info">
                        <div class="panel-body">
                              <form action="inscrire.php" method="POST" id="form" enctype="multipart/form-data">
                                <div class="row">
                                        <h4 class="page-head-line">Contacts</h4>
                                    <div class="col-xs-6 col-md-4">   
                                        <label for="text">Email</label> 
                                        <input type="email" name="email"  class="form-control" tabindex="1" required  placeholder="exemple@mail.com"> <br/>
                                        <label for="text">Numéro Tel:</label>
                                        <input type="text" class="form-control" name="num_tel" tabindex="2"  required  placeholder="Téléphone"><br/>
                                        <label for="text">Adresse Sénégal</label>
                                        <input type="text" class="form-control" name="adresse_sen" tabindex="3"  required  placeholder="adresse Sénégal"><br/>
                                    </div>
                                    <div class="col-xs-6 col-md-4">
                                        <label for="text">Adresse</label>                          
                                        <input type="text" class="form-control"tabindex="4" name="adresse"required placeholder="adresse"><br/>
                                        <label for="text">Numéro Tel Sénégal</label>
                                        <input type="text" class="form-control" name="num_tel_sen" tabindex="5"  required  placeholder="Tel Sénégal"><br/>
                                    </div>
                                    <div class="col-xs-6 col-md-4">
                                        <label for="text">Adresse professionnelle</label>
                                        <input type="text" class="form-control" name="adresse_pro" tabindex="6"  required  placeholder="adresse professionnelle"><br/>
                                        <label for="text">Adresse domicile</label>
                                        <input type="text" class="form-control" name="adresse_dom" tabindex="7"  required  placeholder="adresse domicile"><br/>
                                    </div>
                                  </div>
                                  <hr>
                                 <div class="row">
                                        <h4 class="page-head-line">Parents et pièce</h4>
                                    <div class="col-xs-6 col-md-4">   
                                        <label for="text">Prénom du père:</label> 
                                        <input type="text" name="prenom_pere"  class="form-control" tabindex="8" required  placeholder="prénom père"> <br/>
                                        <label for="text">Scan CNI ou passeport:</label> 
                                        <input type="file" name="scan"  class="filestyle" tabindex="9" required autofocus> <br/>
                                    </div>
                                    <div class="col-xs-6 col-md-4">
                                        <label for="text">Prénom de la mère:</label>
                                        <input type="text" class="form-control" name="prenom_mere" tabindex="10"  required  placeholder="prénom mère"><br/>
                                        <label for="text">Nom de la mère:</label>
                                        <input type="text" class="form-control" name="nom_mere" tabindex="11"  required  placeholder="nom mère"><br/>
                                    </div>
                                    <div class="col-xs-6 col-md-4">
                                        <label for="text">Prénom conjoint(e):</label>
                                        <input type="text" class="form-control" name="prenom_conjoint" tabindex="12"  placeholder="prénom conjoint(e)"><br/>
                                        <label for="text">Nom conjoint(e):</label>
                                        <input type="text" class="form-control" name="nom_conjoint" tabindex="13"  placeholder="nom conjoint(e)"><br/>
                                    </div>
                                  </div>

                               </form>    
                        </div>
                        <div class="panel-footer">
                            <button type="submit" class="btn btn-info" name="enregistrer"  tabindex="14"form="form">Enregistrer</button>
                            <button type="reset" class="btn btn-warning pull-right" form="form">annuler</button>
                       </div>
                    </div>                
                </div>
            </div>
        </div>
    </div>
    <?php 
include 'connexion.php';


if(isset($_REQUEST["enregistrer"])){
#recuperation des contacts
  $email=$_REQUEST["email"];
  $num_tel=$_REQUEST["num_tel"];
  $adresse=$_REQUEST["adresse"];
  $adresse_dom=$_REQUEST["adresse_dom"];
  $adresse_pro=$_REQUEST["adresse_pro"];
  $adresse_sen=$_REQUEST["adresse_sen"];
  $num_tel_sen=$_REQUEST["num_tel_sen"];
#recuperation des infos parents
  $prenom_pere=$_REQUEST["prenom_pere"];
  $prenom_mere=$_REQUEST["prenom_mere"];
  $nom_mere=$_REQUEST["nom_mere"];
  $prenom_conjoint=$_REQUEST["prenom_conjoint"];
  $nom_conjoint=$_REQUEST["nom_conjoint"];
#upload du fichier image
  $repertoire='pieces/';
  $format = array('jpg','gif','png','jpeg','pdf');
  if (isset($_FILES["scan"])){
    $fichier = $_FILES["scan"];
    $extension  = pathinfo($fichier['name'], PATHINFO_EXTENSION);
    // On verifie l'extension du fichier
    if(in_array(strtolower($extension),$format))
    {
      if(!(move_uploaded_file($fichier["tmp_name"], $repertoire.$fichier["name"])))
        $ok=1;
      else
        $ok=0;        
    }
    else
      $ok=1;
  }

    
$piece= 'pieces/'.$fichier["name"];
    

// On va verifier si contacts nexiste pas dans la base de donnees
  $requ1='select * from contacts where num_tel_gondwana="'.$num_tel.'"';
  $result2 = $bdd->query($requ1);
    while ($donnees= $result2->fetch()) {
        $id_contacts=$donnees['id_contacts'];
    }
    $result2->closeCursor();
  
    if(empty($id_contacts)){
      if($ok==0){
        #insertion de ses contacts
        $req2=$bdd->prepare('INSERT INTO contacts VALUES("","'.$email.'","'.$num_tel.'", "'.$adresse.'", "'.$num_tel_sen.'", "'.$adresse_sen.'", "'.$adresse_pro.'", "'.$adresse_dom.'", "'.$_SESSION['id'].'")');
         $req2->execute(array(
          'email'=>$email,
          'num_tel_gondwana'=>$num_tel,
          'adresse_gondwana'=>$adresse,
          'num_tel_senegal'=>$num_tel_sen,
          'adresse_senegal'=>$adresse_sen,
          'adresse_pro'=>$adresse_pro,
          'adresse_domicile'=>$adresse_dom,
          'id_etat_civil'=>$_SESSION['id']));

         #insertion de ses parents
        $req3=$bdd->prepare('INSERT INTO parents VALUES("","'.$prenom_pere.'","'.$prenom_mere.'", "'.$nom_mere.'", "'.$prenom_conjoint.'", "'.$nom_conjoint.'", "'.$_SESSION['id'].'")');
         $req3->execute(array(
          'prenom_pere'=>$prenom_pere,
          'prenom_mere'=>$prenom_mere,
          'nom_mere'=>$nom_mere,
          'prenom_conjoint'=>$prenom_conjoint,
          'nom_conjoint'=>$nom_conjoint,
          'id_etat_civil'=>$_SESSION['id']));
        #insertion de ses pieces
        $req4=$bdd->prepare('INSERT INTO piece VALUES("","'.$_SESSION['id'].'", "'.$piece.'")');
         $req4->execute(array(
          'id_etat_civil'=>$_SESSION['id'],
          'scan_cni'=>$piece));


        echo "<script langage='javascript'> alert(\"infos supplémentaires ajoutés avec succés\")</script>";        
        ?>
      <?php
          echo"<script langage='javascript'>document.location.href='lister.php'</script>";
        }else{ echo "<script langage='javascript'> alert(\"erreur d'upload du fichier\")</script>";}
        }else
    {
      #ici on sait que tel saisi existe dga dans la base
           echo "<script langage='javascript'> alert(\"tel déjà existant\")</script>";
    }
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
