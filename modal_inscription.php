  <div class="modal fade" id="monmodal">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button class="close" type="button" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i></button>
                  <h4 class="modal-title">Nouvel état civil</h4>
                </div>
                <div class="modal-body">
                  <?php if ($_SESSION["type"]=="admin") {
                    ?>
                    <form action="immatriculation.php" method="POST" id="form" enctype="multipart/form-data">
                    <?php
                  }else{
                    ?>
                    <form action="immatriculation2.php" method="POST" id="form" enctype="multipart/form-data">
                      <?php
                  }
                    ?>
                    <div class="row">
                        <div class="col-md-6">
                           <label for="text">Nom:</label> 
                           <input type="text" name="nom"  class="form-control" tabindex="1" required autofocus placeholder="nom"> <br/>
                            
                           <label for="text">Date de naissance:</label> 
                           <input type="date" name="datenaiss"  class="form-control" tabindex="3" required autofocus> <br/>
                            
                           <label for="text">sexe:</label> 
                           <select name="sexe"  class="form-control" tabindex="5" required autofocus>
                            <option>M</option>
                            <option>F</option> 
                           </select><br/>
                           <label for="text">Situation matrimoniale:</label> 
                           <select name="matrimoniale"  class="form-control" tabindex="7" required autofocus>
                            <option>Marié(e)</option>
                            <option>Célibataire</option> 
                            <option>Veuf ou veuve</option> 
                            <option>C'est compliqué</option> 
                           </select><br/>
                           <label for="text">Date de délivrance:</label> 
                          <input type="date" name="date_delivrance"  class="form-control" tabindex="9" required autofocus> <br/>
                          <label for="text">Discipline:</label> 
                          <input type="text" name="discipline"  class="form-control" tabindex="11" autofocus placeholder="discipline"> <br/>
                          <label for="text">Photo:</label> 
                          <input type="file" name="photo"  class="filestyle" tabindex="13" required autofocus> <br/>
                          <label for="text">Taille(cm):</label> 
                          <input type="number" name="taille" min=25 max=300 class="form-control" tabindex="15" required autofocus> <br/>
                           
                       </div>
                       <div class="col-sm-6 col-xs-6 col-md-6 col-md-6">
                          <label for="text">Prénom:</label> 
                          <input type="text" name="prenom"  class="form-control" tabindex="2" required autofocus placeholder="prénom"> <br/>
                          <label for="text">Lieu de naissance:</label> 
                          <input type="text" name="lieunaiss"  class="form-control" tabindex="4" required autofocus placeholder="lieu de naissance"> <br/>
                          <label for="text">Profession:</label> 
                          <input type="text" name="profession"  class="form-control" tabindex="6" required autofocus placeholder="profession"> <br/>
                          <label for="text">Numéro CNI ou passeport:</label> 
                          <input type="text" name="cni"  class="form-control" tabindex="8" required autofocus placeholder="CNI ou passeport"> <br/>
                          <label for="text">Date fin validité:</label> 
                          <input type="date" name="date_fin"  class="form-control" tabindex="10" required autofocus> <br/>
                          <label for="text">Date entrée gondwana:</label> 
                          <input type="date" name="date_entree"  class="form-control" tabindex="12" required autofocus> <br/>
                          <label for="text">Teint:</label> 
                           <select name="teint"  class="form-control" tabindex="14" required autofocus>
                            <option>Noir</option>
                            <option>clair</option> 
                           </select><br/>
                       </div>
                    </div>
                    </form>   
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-info" name="enregistrer"  tabindex="15" form="form">Enregistrer</button>
                  <button type="reset" class="btn btn-warning" data-dismiss="modal">annuler</button>
                </div>
              </div>
            </div>
  </div>
	
<?php 
include 'connexion.php';
include("fonctions.php");

if(isset($_REQUEST["enregistrer"])){
#recuperation des données de l'utilisateur
  $nom=$_REQUEST["nom"];
  $prenom=$_REQUEST["prenom"];
  $datenaiss=$_REQUEST["datenaiss"];
  $cni=$_REQUEST["cni"];
  $lieunaiss=$_REQUEST["lieunaiss"];
  $date_delivrance=$_REQUEST["date_delivrance"];
  $sexe=$_REQUEST["sexe"];
  $date_entree=$_REQUEST["date_entree"];
  $date_fin=$_REQUEST["date_fin"];
  $profession=$_REQUEST["profession"];
  $situ=$_REQUEST["matrimoniale"];
  $teint=$_REQUEST["teint"];
  $discipline=$_REQUEST["discipline"];
  $taille=$_REQUEST["taille"];
  
  $repertoire='photo/';
  $format = array('jpg','gif','png','jpeg','pdf');
  if (isset($_FILES["photo"])){
    $fichier = $_FILES["photo"];
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

// On va verifier si le login nexiste pas dans la base de donnees
  $req='select * from etat_civil where cni_ou_passeport="'.$cni.'"';
  $result = $bdd->query($req);
    while ($donnees= $result->fetch()) {
        $id_user=$donnees['id_etat_civil'];
    }
    $result->closeCursor();
    
    $requ='select * from etat_civil order by id_etat_civil DESC LIMIT 1';
    $resultat = $bdd->query($requ);
    while ($donnees= $resultat->fetch()) {
        $imm=$donnees['immatriculation'];
    }
    $resultat->closeCursor();
   
    $num=genere_numero($imm);
    $photo = 'photo/'.$fichier["name"];
    if(empty($id_user)){
    # on sait ici que le login saisi nexiste pas dans la base de donné// On enregistre ici
      if($ok==0){
         $req=$bdd->prepare('INSERT INTO etat_civil VALUES("","'.$nom.'","'.$prenom.'", "'.$datenaiss.'", "'.$lieunaiss.'",
          "'.$sexe.'", "'.$profession.'", "'.$situ.'", "'.$cni.'", "'.$date_delivrance.'", "'.$date_fin.'",
           "'.$discipline.'", "'.$date_entree.'", "'.$photo.'", "'.$teint.'", "'.$taille.'","'.$num.'")');
         $req->execute(array(
          'nom'=>$nom,
          'prenom'=>$prenom,
          'date_naissance'=>$datenaiss,
          'lieu_naissance'=>$lieunaiss,
          'sexe'=>$sexe,
          'profession'=>$profession,
          'situation_matrimonial'=>$situ,
          'cni_ou_passeport'=>$cni,
          'date_delivrance'=>$date_delivrance,
          'date_fin_validite'=>$date_fin,
          'discipline'=>$discipline,
          'date_entree_gondwana'=>$date_entree,
          'photo'=>$photo,
          'teint'=>$teint,
          'taille'=>$taille,
          'immatriculation'=>$num));


        echo "<script langage='javascript'> alert(\"état civil ajouté avec succés\")</script>";        
        ?>
      
      <?php
        $_SESSION["id"]=$bdd -> lastInsertId();
          echo"<script langage='javascript'>document.location.href='inscrire.php'</script>";
        }else{
            echo "<script langage='javascript'> alert(\"erreur d'upload du fichier\")</script>";
        }

    }else
    {
      // ici on sait que le CNI ou passeport saisi existe dga dans la base
  
           echo "<script langage='javascript'> alert(\"CNI ou passeport déjà existant\")</script>";
      
    }
     


}

?>

