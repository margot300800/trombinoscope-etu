<?php

define("USER", "root");//je défini le nom d'utilisateur pour se connecter à la base de donné

define("PASSWORD", "uNmoTdEpAsseAl2aToire");//je défini le mot de passe

define("DNS", 'inscrits_etu.csv');// nom de domaine --> à garder ?

//Pour accèder aux bases Mysql
/*try { $pdo = new PDO(DNS, USER, PASSWORD); }//je crée mon objet PDO qui va me servir plus tard pour les requêtes

catch (PDOException $e) {

die($e->getMessage());

}*/

?>
