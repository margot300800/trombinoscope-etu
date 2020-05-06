<?php

define("filiere_csv", 0);
define("groupes_csv", 1);
define("nomFam_csv", 2);
define("prenom_csv", 3);
define("mail_csv", 4);
define("numero_csv", 5);
//define("", 6);


function genereCle(){
	$min = 1000;
	$max = 9999;
	$cle = rand($min, $max);
	$cle_hash = password_hash($cle, PASSWORD_DEFAULT);
	return ($cle_hash);
	}


function get_list_etu($JsonFili) {


$Liste_usr = array(); //création d'un tableau qui va contenir tous nos etudiants

$bddEtu= fopen("inscrits_etu.csv", "r");//--> descripteur
//$tailleBDD = sizeof($bddEtu);

$a=0;
$groupe= $JsonFili;
$groupe["etudiants"] = array();
/*array( "nomFili"      => $filiere,
				"groupes"      => $groupes,
				"etudiants" => array()
		);*/
    
 
//while fin du fichier
while($tab=fgetcsv("inscrits_etu.csv",1024,';')){
	$Liste_usr = fgets("inscrits_etu.csv",1024, ';');
	$a ++;
	//for ($i=0;$i<sizeof($bddEtu); $i++){
		//for($j=0; $j<sizeof($Liste_usr); $j++){
			if($filiere == $Liste_usr[filiere_csv] && $groupes == $Liste_usr[groupes_csv]){
				$etu= array();
				$etu["nom"]= $Liste_usr["nomFam_csv"] ;
				$etu["prenom"]= $Liste_usr["prenom_csv"];
				$etu["mail"]= $Liste_usr["mail_csv"];
				$etu["numero_tel"]= $Liste_usr["numero_csv"];
				$groupe ["etudiants"]= $etu;
			echo($etu);
				}
			//}
			
		//}
		
	}
	fclose("inscrits_etu.csv") ;

/*function lectureEtu("inscrits_etu.csv"){
	$etu= array();
	while(!feofbddEtu){
		$etu = fgets('inscrits_etu.csv',1024);
		
		}
	fclose('inscrits_etu.csv') ;
	echo $etu;
}
*/
$donnees=json_encode($groupe);


print_r( $donnees); //on renvoie le tableau avec tous les groupes et tous les etu

}

function jsonEnTableau($fichJson) {
 $array = json_decode($fichJson, true);
 //echo $array;
 return $array;
}

$fichJson = file_get_contents("filieres_groupes.json");

$FichierJson=jsonEnTableau($fichJson);

genereCle();
get_list_etu($FichierJson);

?>
