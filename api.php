<?php

function get_list_etu($pdo) { //je passe en paramètre mon objet PDO précédemment créé afin d'exécuter ma requête

/*$sql = "SELECT * FROM articles"; $exe = $pdo->query($sql); //création de la requête Sql pour aller chercher tous les articles*/

$Liste_usr = array(); //création d'un tableau qui va contenir tous nos etudiants


//version Mysql
while($result = $exe->fetch(PDO::FETCH_OBJ)) { //Exécution de la requête définie plus haut

array_push($Liste_article, array("ID" => $result->ID, "Titre" => $result->Titre, "Date" => $result->Date)); //on ajoute tous les articles dans notre tableau

}

$bddEtu= fopen("inscrits_etu.csv", "r");//--> descripteur
$tailleBDD = len($bddEtu);


//while fin du fichier
for ($i=0; $i<$tailleBDD; $i++){
	fread();
	File();
	explode();
	
	
	}





return $Liste_usr; //on renvoie le tableau contenant tous nos articles

}



?>
