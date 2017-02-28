<?php
include("connexion.php");
   # on va verifier ici si l'admin existe
    $req='select * from admin where login="'.$login.'"';
    $result = $bdd->query($req);
    while ($donnees= $result->fetch()) {
        $id=$donnees['id_admin'];
        $pwd_from_serveur=$donnees['password'];
        $type=$donnees['type'];
    }
    $result->closeCursor();
    if(!empty($id))
    {
      if(($pwd_from_serveur==$password)){
        #recuperation des variables de session
        $_SESSION["login"]=$login;
        $_SESSION["password"]=$pwd_from_serveur;
        $_SESSION["id"]=$id;
        $_SESSION['type']=$type;
         #redirection
        header("location:accueil.php");
      }else
        {
          ?>
           <div class="alert alert-danger">
          <b>Erreur!</b> Login ou mot de passe incorrect! Veuillez les corriger svp!
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
      <?php
        }
    }else
    {
        ?>
           <div class="alert alert-danger">
          <b>Erreur!</b>Login ou mot de passe incorrect! Veuillez les corriger svp!
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
      <?php
    }


    


?>