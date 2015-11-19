<?php
if($_POST)//Primera vez
    $_SESSION['post'] = $_POST;

else if(isset($_SESSION['post'])) //Resto de veces
    $_POST = $_SESSION['post'];

include_once HELP_PATH.'helps.php';
include_once HELP_PATH.'help_buscar.php';

//Cargamos las provincias desde la bd para poder crear select en la vista
include_once MODEL_PATH.'provincias.php';
$Provincias = GetProvincias();

$opciones_fecha = Array(
							'mayor' => '>',
							'mayorigual' => '>=',
							'menor' => '<',
							'menorigual' => '<=',
							'igual' => '=');

//Cargamos modelo de a consulta de busqueda
include_once MODEL_PATH.'buscar.php';

$errores = Array();
$correcto = TRUE;

if(! $_POST){
	include_once VIEW_PATH.'buscar.php';
}
else{
	
	if( !EMPTY($_POST['fecha_creacion']) && ! FormatoFechaCorrecto($_POST['fecha_creacion'])){ //Comprobamos su formato
		$errores['fecha_creacion'] = 'Formato de fecha de creación incorrecta';
		$correcto = FALSE;
	}	
	
	if( !EMPTY($_POST['fecha_realizacion']) && ! FormatoFechaCorrecto($_POST['fecha_realizacion'])){ //Comprobamos su formato 
		$errores['fecha_realizacion'] = 'Formato de fecha de realización incorrecta';
		$correcto = FALSE;
	}

	if (!EMPTY($_POST['telefono']) && ! is_numeric($_POST['telefono'])){
		$errores['telefono'] = 'El teléfono debe ser númerico';
		$correcto = FALSE;
	}

	if(! $correcto)
		include_once "\\..\\views\\buscar.php";

	else{
			
		$condicion = CreaCondicionConsulta();

		if (! EMPTY($condicion)){ //Si se ha introducido algún campo de condición
			include_once VIEW_PATH.'buscar.php';
			include_once CTRL_PATH.'paginacion_buscar.php';
		}
		else{			
			include_once VIEW_PATH.'buscar.php';
			include_once VIEW_PATH.'algunacondicion_buscar.php';
		}
	}
}