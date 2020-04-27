<?php

$nomFamille = $_POST['nomFam'];
$prenom = $_POST['prenom'];
$aMail = $_POST['addMail'];
$num = $_POST['numero'];
$aPostale = $_POST['addPostale'];
$f = $_POST['filiere'];
$groupeTD = $_POST['gpTD'];
$photoP = $_POST['pp'];
$mdp = $_POST['pwd'];
$mdp2 = $_PODT['pwd2'];
$baseCSVdonnee = fopen('inscrits.csv', 'a+');

// on vérifie que les champs sont bien remplis
if(isset($_POST['pseudo'])){
	echo("Vous n'avez pas remplis tous les champs");
	
	}
else{
	
	//on vérifie que les 2 mots de passes sont identiques
	if ($mdp=$mdp2){
		$baseCSVdonnee = fopen('inscrits.csv', 'a+');
		
		fwrite($baseCSVdonnee, $f);
		fwrite($baseCSVdonnee, ";", 1);
		
		fwrite($baseCSVdonnee, $groupeTD);
		fwrite($baseCSVdonnee, ";", 1);
		
		fwrite($baseCSVdonnee, $nomFamille);
		fwrite($baseCSVdonnee, ";", 1);
		
		fwrite($baseCSVdonnee, $prenom);
		fwrite($baseCSVdonnee, ";", 1);
		
		fwrite($baseCSVdonnee, $aMail);
		fwrite($baseCSVdonnee, ";", 1);
		
		fwrite($baseCSVdonnee, $num);
		fwrite($baseCSVdonnee, ";", 1);
		
		fwrite($baseCSVdonnee, $aPostale);
		
		fwrite($baseCSVdonnee, ";", 1);
		fwrite($baseCSVdonnee, $pwd);
		
		fclose($baseCSVdonnee);
		}
	else{
		echo("Les 2 mots de passe que vous avez rentrez ne sont pas identique");
		}
	
	}
?> 
