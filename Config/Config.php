<?php

//dominio de nuestra pagina web
const base_url = "http://localhost/PW-PeritoMoreno";
define('SITE_LANG', 'es');



/* #######################*/
/* Directorios de la app  */
/* #######################*/
define('DS', DIRECTORY_SEPARATOR);

define("ROOT", dirname( __DIR__ ));
define("CONTROLLER" , ROOT.DS."Controllers");
define('VIEW', ROOT.DS. 'Views');
define('TEMPLATE', VIEW .DS. 'Template');
define('IMAGE_PATH', ROOT .DS. 'ASSETS'.DS."img");





/* #######################*/
/* Informacion del sitio  */
/* #######################*/

define('SITE_NAME', 'Perito Moreno');
define('SITE_CHARSET', 'utf-8');
define('SITE_VERSION', '1.0.0');
define('SITE_LOGO', 'EscudoPeritoMoreno.jpg');
define('SITE_FAVICON', 'favicon.ico');
define('SITE_DESC', 'Municipalidad PeritoMoreno');
define('SITE_LOGO_MAIN', 'SantaCruz-PeritoMoreno.png');
define('SITE_ICON_NEW', '<i class="bi bi-plus-square"></i> ');
define('SITE_ICON_LIST', '<i class="bi bi-card-list"></i> ');
define('SITE_ICON_REPLY', '<i class="bi bi-reply-fill"></i> ');

/* ###################*/
/* Archivos publicos  */
/* ###################*/
define('ASSETS', base_url.'/Assets');
define('CSS', ASSETS.'/css');
define('FONTS', ASSETS.'/css/fonts');
define('JS', ASSETS.'/js');
define('IMAGE', ASSETS.'/img');
define('PERFIL', ASSETS.'/img/perfil');
define('FAVICON', ASSETS.'/favicon');
define('PLUGINS', ASSETS.'/plugins');
define('UPLOADS', ASSETS.'/uploads');

/* #################################*/
/* Constantes pagina de navegación  */
/* #################################*/

const DASHBOARD = 0;
const NOTICIA = 1;#
const USUARIO = 2;#
const GOBIERNO = 3;#
const CONTACTO = 4;#
const HISTORIA = 5;#
const CATEGORIAS = 6;
const NOTICIAS = 7;
const ROLES = 9;
const EJECUTIVO = 10;
const LEGISLATIVO = 11;
const JUDICIAL = 12;
const CONTACTOS = 13;
const SECTORES = 14;
const PERMISOS = 15;



/* ##########################################*/
/* Constantes para conexion a base de datos  */
/* ##########################################*/

const DB_HOST = "localhost";
const DB_NAME = "sistema_municipio";
const DB_USER = "root";
const DB_PASSWORD = "";
const DB_CHARSET = "utf8";

/* ##########################################*/
/* Controller y method por default - error   */
/* ##########################################*/
define("CONTROLLER_DEFAULT", "Home");
define("METHOD_DEFAULT", "index");
define("CONTROLLER_ERROR", "Error404");