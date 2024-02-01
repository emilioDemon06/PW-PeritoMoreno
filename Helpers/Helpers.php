<?php

/* ###############  
TEMPLATE DASHBOARD 
############### */
function header_dashboard($data=""){
	$view_header = "Views/Dashboard/Template/header.php";
	require_once $view_header;
}
function nav_dashboard(){
	$view_nav = "Views/Dashboard/Template/nav.php";
	require_once $view_nav;
}
function footer_dashboard($data=""){
	$view_footer = "Views/Dashboard/Template/footer.php";
	require_once $view_footer;
}

/* ###### 
#########  TEMPLATE INDEX PRINCIPAL ##########
##### */
function header_index($data=""){
	$view_header = "Views/Template/header-index.php";
	require_once $view_header;
}
function aside_index($data=""){
	$view_carousel = "Views/Template/aside-index.php";
	require_once $view_carousel;
}
function nav_index(){
	$view_nav = "Views/Template/nav-index.php";
	require_once $view_nav;
}
function footer_index($data=""){
	$view_footer = "Views/Template/footer-index.php";
	require_once $view_footer;
}

/* ###### 
#########  DEPURAR DATOS EN CANTIDAD QUE VIENE DEL CONTROLADOR ##########
##### */
//con punto concatena la variable
function debug($data){
	$format = print_r('<pre>');
	$format .= print_r($data);
	$format .= print_r('</pre>');

	return $format;
}

/* ###### 
######### funcion que instancia la ruta del favicon  ##########
##### */

function get_favicon()
{
	$path = FAVICON."/";//path
	$favicon = SITE_FAVICON;
	$type = "";
	$href = "";
	$placeholders = "<link rel='shortcut icon' href='%s' type='%s'>";

	switch (pathinfo($path . $favicon,PATHINFO_EXTENSION)) {
		case 'ico':
			$type='image/vnd.microsoft.icon';
			$href= $path . $favicon;
			break;
		case 'png':
			$type='image/png';
			$href= $path . $favicon;
			break;
		case 'gif':
			$type='image/gif';
			$href= $path . $favicon;
			break;
		case 'svg':
			$type='image/svg+xml';
			$href= $path . $favicon;
			break;
		case 'jpg':
			$type='image/jpg';
			$href= $path . $favicon;
			break;
		
		default:
			return false;
			break;
	}

	return sprintf($placeholders,$href,$type);
}

/* ###### 
######### funcion para traer la ruta del logo  ##########
##### */

function get_logo()
{
	$default_logo = SITE_LOGO;
	$placeholder_image = "https://via.placeholder.com/150x60";

	if (is_file(IMAGE_PATH.DS.$default_logo) == false) {
		return $placeholder_image;
	}else{

		return IMAGE .DS. $default_logo;
	}
	
}
/* ###### 
#########  Funcion para convertir un array en objeto ##########
##### */

function to_obj($array)
{
	return json_decode(json_encode($array));
}

/* ###### 
#########  Funcion para escapar de caracteres hackeables ##########
##### */
function limpiar($str)
{
	$datos = trim($str);//elimina los epacios en un string
	$datos = stripcslashes($datos);
	$datos = str_ireplace("<script>","",$datos);
	$datos = str_ireplace("</script>","",$datos);
	$datos = str_ireplace("<script src=>","",$datos);
	$datos = str_ireplace("<script type=>","",$datos);
	$datos = str_ireplace("SELECT * FROM","",$datos);
	$datos = str_ireplace("DELETE FROM","",$datos);
	$datos = str_ireplace("INSERT INTO","",$datos);
	$datos = str_ireplace("DROP TABLE","",$datos);
	$datos = str_ireplace("OR","",$datos);
	$datos = str_ireplace("DROP DATABASE","",$datos);
	$datos = str_ireplace("TRUNCATE TABLE","",$datos);
	$datos = str_ireplace("SHOW TABLES","",$datos);
	$datos = str_ireplace("SHOW DATABASES","",$datos);
	$datos = str_ireplace("<?php","",$datos);
	$datos = str_ireplace("?>","",$datos);
	$datos = str_ireplace("--","",$datos);
	$datos = str_ireplace("^","",$datos);
	$datos = str_ireplace("<","",$datos);
	$datos = str_ireplace("[","",$datos);
	$datos = str_ireplace("]","",$datos);
	$datos = str_ireplace("==","",$datos);
	$datos = str_ireplace("^","",$datos);
	$datos = str_ireplace("::","",$datos);
	$datos = trim($datos);
	$datos = stripcslashes($datos);
	return $datos;
}
/* ###### 
#########  Funcion que devuelve la fecha actual ##########
##### */
function now() 
{
	return date('Y-m-d H:i:s');
}

/* ###### 
#########  funcion para renombrar imagenes ##########
##### */
function renombrar_img($nombre_imagen)
{
	$remplazo = substr(sha1(rand(1,999)),0,-30).'_'.$nombre_imagen;
	return $remplazo;
}