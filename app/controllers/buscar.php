<?php
include_once "helps.php";
include_once "help_buscar.php";

//Cargamos las provincias desde la bd para poder crear select en la vista
include_once '\\..\\models\\provincias.php';
$Provincias = GetProvincias();

$opciones_fecha = Array(
							'mayor' => '>',
							'mayorigual' => '>=',
							'menor' => '<',
							'menorigual' => '<=',
							'igual' => '=');

//Cargamos modelo de a consulta de busqueda
include_once '\\..\\models\\buscar.php';

$errores = Array();
$correcto = TRUE;

if(! $_POST){
	include_once "\\..\\views\\buscar.php";
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
			include_once "\\..\\views\\buscar.php";
			include_once "\\..\\controllers\\paginacion_buscar.php";
		}
		else{			
			include_once "\\..\\views\\buscar.php";
			include_once "\\..\\views\\algunacondicion_buscar.php";
		}
	}
}