<?php
include_once 'helps.php'; //funciones

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

//Cargamos el modelo de tarea para cargar los datos correspondientes a la tarea desde la base de datos
include_once '\\..\\models\\tareas.php';

//Cargamos el modelo de modificar para modfificar una tarea en la base de datos
include_once '\\..\\models\\modificar.php';

if(! $_POST){
	include APPVIEW.'modificar.php'; //formulario alta
}
else {
	
	//ERRORES
	if(empty($_POST['descripcion'])){
		$errores['descripcion'] = 'Campo descripción vacío';
		$correcto = FALSE;
	}
	
	if(empty($_POST['persona_contacto'])){
		$errores['personaContacto'] = 'Campo persona contacto vacío';
		$correcto = FALSE;
	}
		
	if (empty($_POST['telefono_contacto']) || ! FormatoCorrectoTelefono($_POST['telefono_contacto'])){
		$errores['telefonoContacto'] = 'Campo teléfono vacío o formato incorrecto';
		$correcto = FALSE;
	}
	
	if(! empty($_POST['cp']) && ! FormatoCorrectoCP($_POST['cp'])){ //Si existe y no tiene el formato correcto --> error
		$errores['cp'] = 'Formato incorrecto de código postal';
		$correcto = FALSE;
	}
	
	if (empty($_POST['correo_contacto']) || ! FormatoCorrectoCorreo($_POST['correo_contacto'])){
		$errores['correoContacto'] = 'Campo correo vacío o formato incorrecto';
		$correcto = FALSE;
	}
	
	if(empty($_POST['fecha_realizacion'])){//compruebo si esta vacio
		$errores['fechaRealizacionVacia'] = 'Campo fecha vacío';
		$correcto = FALSE;
	}
	else if(! FechaCorrecta($_POST['fecha_realizacion'])){ //Si no lo está comprobamos su formato y si es posterior a la fecha actual
		$errores['fecha_realizacion'] = 'Formato de fecha incorrecta o fecha introducida anterior a la actual';
		$correcto = FALSE;
	}	
	
	
	if(! $correcto){
		include APPVIEW.'modificar.php'; //formulario modificar
	}
	else{	

		//modificar en la bd 
		$dateRealizacion = new Datetime($_POST['fecha_realizacion']);
		$estado = ucwords($_POST['estado']);//Pone en mayusculas en la primera letra

		$campos = CreaArrayTarea(	 
				$_POST['descripcion'], $_POST['persona_contacto'], $_POST['telefono_contacto'], $_POST['correo_contacto'],
				$_POST['direccion'], $_POST['poblacion'], $_POST['cp'], $_POST['tbl_provincias_cod'], $estado, 
				$_POST['operario_encargado'],  date_format($dateRealizacion, 'Y-m-d'), 
				$_POST['anotaciones_anteriores'], $_POST['anotaciones_posteriores']);
		
		ModificaTareaEnBD('tarea', $campos, $_GET['id']);
		
		//muestra lista		
		include_once 'lista.php';
	}
		

		
	
}


