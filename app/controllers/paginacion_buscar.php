<?php
include_once HELP_PATH.'help_lista.php';
include_once HELP_PATH.'help_paginacion.php';
//Incluir modelo
include_once MODEL_PATH.'buscar.php';
include_once MODEL_PATH.'provincias.php';

//PAGINACIÓN
if($_POST)//Primera vez
     $_SESSION['post'] = $_POST;
else //Resto de veces
     $_POST = $_SESSION['post'];

// Ruta URL desde la que ejecutamos el script
$myURL='?ctrl=buscar&'; 

$nElementosxPagina = 10;

// Calculamos el n�mero de p�gina que mostraremos
if (isset($_GET['pag']))
{
	// Leemos de GET el n�mero de p�gina
	$nPag = $_GET['pag'];
}
else 
{
	// Mostramos la primera p�gina
	$nPag = 1;
}

// Calculamos el registro por el que se empieza en la sentencia LIMIT
$nReg = ($nPag-1) * $nElementosxPagina;

$tareas = array();
$tareas = GetBusqueda($condicion, $nReg, $nElementosxPagina);

$totalRegistros = GetNumRegistrosBusqueda($condicion);

if($totalRegistros > 0){
	$totalPaginas = $totalRegistros/$nElementosxPagina;

	if(is_float($totalPaginas)){
		$totalPaginas = intval($totalPaginas);
		$totalPaginas++;
	}

	//Muestra Formulario lista
	include_once VIEW_PATH.'paginacion_buscar.php'; 

	
}
else
	include_once VIEW_PATH.'noexistendatos_buscar.php';





