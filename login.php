<?php
session_start();

function hashmdp($mdp){
	$min= 1000;
	$max=9999;
	$cleAl = random_int($min, $max);
	$mdp_concatene = $cleAl.$mdp;
	$mdp_hash = password_hash($mdp_concatene, PASSWORD_DEFAULT);
	sauvegardeMdp($mdp_concatene);
	return $mdp_hash;
	}

function sauvegardeMdp($mdp_concatene){
	$base_cleMdP = fopen('mdp.csv', 'a+');
	fwrite($base_cleMdP, $mdp_concatene);
	fwrite($base_cleMdP, ";", 1);
	fclose($base_cleMdP);
	}


function ecritureCSV(){
	$nomFamille = $_POST['nomFam'];
	$prenom = $_POST['prenom'];
	$aMail = $_POST['addMail'];
	$num = $_POST['numero'];
	$aPostale = $_POST['addPostale'];
	$fili = $_POST['filiere'];
	$groupeTD = $_POST['gpTD'];
	$photoP = $_POST['pp'];
	$mdp = $_POST['pwd'];
	$mdp2 = $_POST['pwd2'];
	
	//on vérifie que les 2 mots de passes sont identiques
	if ($mdp=$mdp2){
		$mdp_hash = hashmdp($mdp);
		$donneeEtu = array($fili, $groupeTD, $nomFamille, $prenom, $aMail, $num, $aPostale, $mdp_hash);
		foreach ($donneeEtu as $line)
			$baseCSVdonnee = fopen('inscrits_etu.csv', 'a+');
			fputcsv($baseCSVdonnee,$donneeEtu, ";");
			fclose($baseCSVdonnee);
			
		}
	else{
		echo("Les 2 mots de passe que vous avez rentrez ne sont pas identique");
		}
	

}	
	
ecritureCSV();
	
?> 
