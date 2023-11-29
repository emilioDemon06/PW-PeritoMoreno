<?php
session_set_cookie_params(60*60*24);
session_start();
require_once "Helpers/Helpers.php";
require_once "Config/Config.php";

$url = !empty($_GET["url"]) ?  $_GET["url"] : CONTROLLER_DEFAULT. "/". METHOD_DEFAULT;

$array = explode("/", $url);

$controller = $array[0];
$method = METHOD_DEFAULT;
$param = "";

if (!empty($array[1])) {
	if ($array[1] != "") {
		$method = $array[1];
	}
}

if (!empty($array[2])) {
	if ($array[2] != "") {
		for ($i=2; $i < count($array); $i++) { 
			$param .= $array[$i].",";
		}
		$param = trim($param,",");
	}
}


require_once "Config/App/Autoload.php";


$diController = CONTROLLER. DS .$controller .".php";
$errorController = CONTROLLER. DS . CONTROLLER_ERROR.".php"; 

if (file_exists($diController)) {
	require_once $diController;
	$controller = new $controller();
	if (method_exists($controller,$method)) {
	 	$controller->{$method}($param);
	 }else{
	 	require_once $errorController;
	 }
}else{
	require_once $errorController;
}

