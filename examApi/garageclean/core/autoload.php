<?php 

spl_autoload_register(function($nomDeClasse){


$nomDeClasseCorrect = str_replace("\\", "/", $nomDeClasse);


require_once "core/".$nomDeClasseCorrect.".php";

});