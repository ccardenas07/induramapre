<?php
// redirecciona a una nueva direccion 
function redirect_to( $location = NULL ) {
  if ($location != NULL) {
    header("Location: {$location}");
    exit;
  }
}
// convierte la fecha ingresada por el usuario en una valida para el ingreso a MYSQL
function date2mysql($year, $month, $day) {
  return checkdate($month, $day, $year) ? "$year-$month-$day" :
  false;
} 

// verifica que no hayan campos vacios
function check_input($data){
	$error = 0;
	foreach($data as $key => $value ){
		if(empty($data[$key])){
			$error++;
		}
	}
	if($error == 0){
		return true;
	} else { return false; }
}

// autocarga de clases
function __autoload($class_name) {
	$class_name = strtolower($class_name);
  $path = LIB_PATH.DS."{$class_name}.php";
  if(file_exists($path)) {
    require_once($path);
  } else {
		die("The file {$class_name}.php could not be found.");
	}
}

// carga plantillas definidas para la salida en HTML
function include_layout_template($template="") {
	include(SITE_ROOT.DS.'public'.DS.'layouts'.DS.$template);
}

?>