<?php
include_once 'help_alta.php'; //funciones

define('APPVIEW', __DIR__.'\\..\\views\\');
define('APPCTRL', __DIR__);//directorio actual
//define('APPMOD', __DIR__.'\\..\\models\\');

$errores = Array();
$correcto = TRUE;

//Cargamos las provincias desde la bd para poder crear select en la vista
include_once '\\..\\models\\provincias.php';
$Provincias = Provincias();

if(! $_POST){
	include APPVIEW.'alta.php'; //formulario alta
}
else {
	
	//ERRORES
	if(empty($_POST['descripcion'])){
		$errores['descripcion'] = 'Campo descripción vacío';
		$correcto = FALSE;
	}
	
	if(empty($_POST['personaContacto'])){
		$errores['personaContacto'] = 'Campo persona contacto vacío';
		$correcto = FALSE;
	}
		
	if (empty($_POST['telefonoContacto']) || ! FormatoCorrectoTelefono($_POST['telefonoContacto'])){
		$errores['telefonoContacto'] = 'Campo teléfono vacío o formato incorrecto';
		$correcto = FALSE;
	}
	
	if(! empty($_POST['cp']) && ! FormatoCorrectoCP($_POST['cp'])){ //Si existe y no tiene el formato correcto --> error
		$errores['cp'] = 'Formato incorrecto de código postal';
		$correcto = FALSE;
	}
	
	if (empty($_POST['correoContacto']) || ! FormatoCorrectoCorreo($_POST['correoContacto'])){
		$errores['correoContacto'] = 'Campo correo vacío o formato incorrecto';
		$correcto = FALSE;
	}
	
	if(empty($_POST['fechaRealizacion'])){//compruebo si esta vacio
		$errores['fechaRealizacionVacia'] = 'Campo fecha vacío';
		$correcto = FALSE;
	}
	else if(! FechaCorrecta($_POST['fechaRealizacion'])){ //Si no lo está comprobamos su formato y si es posterior a la fecha actual
		$errores['fechaRealizacion'] = 'Formato de fecha incorrecta o fecha introducida anterior a la actual';
		$correcto = FALSE;
	}	
	
	
	if(! $correcto){
		include APPVIEW.'alta.php'; //formulario alta
	}
	else{	
		
		CreaArrayTarea($_POST['descripcion'], $_POST['personaContacto'], $_POST['telefonoContacto'], $_POST['cp'],
				 $_POST['direccion'], $_POST['poblacion'], $_POST['cp'], 'Pendiente',
				 date('d-m-Y'), null, $_POST['provincia'], $_POST['fechaRealizacion'], 
				 $_POST['anotacionesAnte'], null);
		//include APPVIEW.'lista.php'; //controlador que muestra la lista
		
		echo 'inserto';
	}
		

		
	
}


