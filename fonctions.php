<?php
	include ("connexion.php");
	function genere_numero($imm){

		$num='';
		$date=date('Y');
		if (empty($imm)) {
			$num=$date.'-'.'00001';
		}else{
			$reponse=$imm;
			if (date('Y')==substr($reponse,0,4)) 
				$num=date('Y').'-'.str_pad((int)(substr($reponse, -5))+1,5,'0', STR_PAD_LEFT);
			else $num=date('Y').'-'.'00001';
			
		}
	return $num;
	}
?>