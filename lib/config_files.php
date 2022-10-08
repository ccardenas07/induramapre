<?php
// Define las rutas iniciales
// Las define como rutas absolutas para asegurarse qye require_once funcione como se espera

// DIRECTORY_SEPARATOR es una constante PHP definida
// (\ Windows, / Unix)
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

defined('SITE_ROOT') ? null : 
	// la ruta en donde se encuentra el servidor localhost, en este caso 
	// en la maquina local es C:\AppServ\www\walker como ruta inicial
	// se la puede cambiar a la ruta inicial en otro localhost
	//define('SITE_ROOT', 'C:\xampp\htdocs\prueba_001_jr\includes');
//define('SITE_ROOT', DS.'home5'.DS.'walkerbr'.DS.'public_html'.DS.'plopchicle');
define('SITE_ROOT', DS.'home5'.DS.'walkerbr'.DS.'public_html'.DS.'plopchicle');
//die(SITE_ROOT); 
defined('LIB_PATH') ? null : define('LIB_PATH', 'http://walkerbrandlabs.com/plopchicle'.DS.'lib');
echo (LIB_PATH); 
// primero carga los archivos de ocnfiguracion
require_once(LIB_PATH.DS.'config_face.php');
require_once(LIB_PATH.DS.'config.php');

// carga funciones basicas, asi cualquier script puede usarlas
require_once(LIB_PATH.DS.'functions.php');

// carga funciones de facebook
require_once(LIB_PATH.DS.'facebook.class.php');
require_once(LIB_PATH.DS.'base_facebook.php');
require_once(LIB_PATH.DS.'facebook.php');

// carga objetos iniciales
//require_once(LIB_PATH.DS.'session.php');
require_once(LIB_PATH.DS.'database.php');



?>