<?php
session_start();

$id = $_POST['AddMail'];
$mdp= $_POST['Pwd'];

$_SESSION["id"]=$id;

function connection ($id, $mdp){		
	$ligne = 1;
	$etu_csv = fopen("csv/inscrits_etu.csv", "a+");
	if ($id!=0) erreur(ERR_IS_CO);
	while($tab=fgetcsv($fic,1024,';')){
		$champs = count($tab);
		$ligne ++;
		$message='';
		//Oublie d'un champ
		if (empty($_POST['AddMail']) || empty($_POST['Pwd'])){
			$message = '<p>une erreur s\'est produite pendant votre identification.
		Vous devez remplir tous les champs</p>
		<p>Cliquez <a href="./connexion.php">ici</a> pour revenir</p>';
		}
	   //On vérifie le mot de passe
		else{        
			for($i=0; $i<$champs; $i ++){
				$login = explode(',', $tab[$i] );
				if ($username == $login[4] && $password == $login[7]){
					echo "Connexion Réussie !";
					return $login ;
				}
			}
		}
		return -1;
			
	}

}

function redirection($id, $mdp){
	if (connexion($id,$mdp) == -1){
	header('Location: login.html');
	}
	else{
	header('Location: modification.php');
}
	}





function erreur($err=''){
   $mess=($err!='')? $err:'Une erreur inconnue s\'est produite';
   exit('<p>'.$mess.'</p>
   <p>Cliquez <a href="./index.php">ici</a> pour revenir à la page d\'accueil</p></div></body></html>');
	}
	
	
?>

