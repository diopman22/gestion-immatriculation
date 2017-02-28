<?php

	//Fonction qui insere le chemin d'acces d'un fichier dans la base de donnees 
	function insereFichier($chemin)// $chemin = 'images/'.$_FILES["photo"]["name"]
	$bdd = new Base::getBDD();//instance de connexion a la base de donnees
	$req = $bdd->prepare("insert into etat_civil values(:chemin) ");
	$rep->execute(array(
		'chemin'=>$chemin));

	//Fonction qui recupere les donnees dans le serveur
	function recupFichier($id){
		$bdd = new Base::getBDD();
		$req = $bdd->prepare("select photo from etat_civil where id_etat_civil =:id");
		$rep->execute(array(
			'id'=>$id));
		return $rep;

	}


	//Integrer la ou on veut faire un upload d'un fichier image
	$format = ["png", "jpeg" "jpg" "pdf"];
	if (isset($_FILES["photo"])){
		$fichier = $_FILES["photo"];
		$i = 0;
		for ($i,$i<count($format);$i++){
			if ($fichier["type"]==$format[$i])
				break;
		}
		if ($i!=count($format)){

			if(!(move_uploaded_file($fichier["tmp_name"], $repertoire.$fichier["name"])))
				echo utf8_decode("Fichier non enregistré");
			else
				echo utf8_decode("Fichier enregistré");
		}
		else
			echo "format de fichier image non pris en compte";

	}


	//Traitement a faire pour charger un fichier photo
	if ($donnee = $recupFichier($id)->fetch()){
		$photo = $donnee["photo"];
		?>
		<img src="<?php echo $photo ?>" name="profil">
	}
?>