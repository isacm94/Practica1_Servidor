<?php
include_once 'helps.php'; //funciones de alta
include_once 'help_lista.php'; //funciones de listas

define('APPVIEW', __DIR__.'\\..\\views\\');
//define('APPCTRL', __DIR__);//directorio actual
//define('APPMOD', __DIR__.'\\..\\models\\');

$errores = Array();
$correcto = TRUE;

//Cargamos las provincias desde la bd para poder crear select en la vista
include_once '\\..\\models\\provincias.php';
$Provincias = GetProvincias();

//Cargamos el modelo de alta para hacer la insercción en la base de datos
include_once '\\..\\models\\alta.php';

//Cargamos el modelo de tareas para obtner un array de tareas de la base de datos
//include_once '\\..\\models\\tareas.php';

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

		$dateRealizacion = new Datetime($_POST['fechaRealizacion']);

		$campos = CreaArrayTarea(	 
				$_POST['descripcion'], $_POST['personaContacto'], $_POST['telefonoContacto'], $_POST['correoContacto'],
				$_POST['direccion'], $_POST['poblacion'], $_POST['cp'],$_POST['provincia'], 'Pendiente', 
				null/*ESTADO*/,  date_format($dateRealizacion, 'Y-m-d'), 
				$_POST['anotacionesAnte'], null);

		
		
		InsertaTareaEnBD('tarea', $campos);
		include 'lista.php'; //muestra la lista
		
		
	}
		

		
	
}

