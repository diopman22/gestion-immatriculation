<?php
	if(isset($_REQUEST["connexion"])){
    $login=$_REQUEST["login"];
    $password=sha1($_REQUEST["password"]);
    include("connexion.php");	
    include 'verification.php';
} 
?>