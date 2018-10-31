<?php

//Comment faire pour récupérer le slug
//Utilisation de la variable super globale SERVER
//c'est une variable créée par le server et alimenté
//aussi par le server. On ne doit que la consulter.
//Elles commencent par $_ et sont en majuscules 
//$_SERVER["REQUEST_URI"] => /users/add
$slug = $_SERVER["REQUEST_URI"];

//Suppression des GET dans l'url
$slugExploded = explode("?", $slug);
$slug = $slugExploded[0];


//logique de routing initiale
//http://localhost/users/add
//$users->add();


//Découper l'url pour distinguer le controller et l'action
$slugExploded = explode("/", trim($slug, "/"));
//J'ai donc deux variables $c et $a avec si besoin les controllers par defaut
$c = ucfirst( (!empty($slugExploded[0]))?$slugExploded[0]:"pages" )."Controller";
$a = ((isset($slugExploded[1]))?$slugExploded[1]:"default")."Action";
$cPath = "controllers/".$c.".class.php";
//Vérifier que le fichier et la class controller existe
if( file_exists($cPath) ){
	include $cPath;
	if( class_exists($c)){
		//Instance dynamique du controller
		$cObject = new $c();
		//Vérification de l'existance de la méthode
		if( method_exists($cObject, $a) ) {
			//Appel de la méthode	
			$cObject->$a();
		}else{
			die("L'action ".$a." n'existe pas");
		}
	}else{
		die("La class ".$c." n'existe pas");
	}
}else{
	die("Le fichier controller ".$c." n'existe pas");
}






