<?php
session_Start();
// Fonction de déconnexion

    // On remplit le cookie par une valeur fausse pour ne pas être réutilisé
    setcookie("sid", "session ended", time()+3600);

    // Invalidation de l'objet $_SESSION
    session_unset();

    // Destruction de l'objet $_SESSION
    session_destroy();

    // On redirige l'utilisateur vers la page d'accueil
    //header('HTTP/1.1 401 Unauthorized ou Authorization required');
    header("location: index.php");
    exit;



?>