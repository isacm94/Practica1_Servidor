<?php
//define('APPCLASSDB', __DIR__.'\\..\\..\\install\\clasdb.php');
/*Incluimos el fichero de la clase*/
include_once '\\..\\..\\install\\classdb.php'; 

/**
 * Devuelve un array con los datos de las provincias
 */
function GetBusqueda($condicion, $nReg, $nElementosxPagina)
{
	/*Creamos la instancia del objeto. Ya estamos conectados*/
	$bd = Db::getInstance();
	
	/*Creamos una query sencilla*/
	$sql = "SELECT * FROM `tarea` WHERE  $condicion LIMIT $nReg, $nElementosxPagina;";
	
	//echo "<pre>$sql</pre>";

	/*Ejecutamos la query*/
	$bd->Consulta($sql);
	
	// Creamos el array donde se guardarán las provincias
	$tareas = Array();
	
	/*Realizamos un bucle para ir obteniendo los resultados*/
	while ($reg = $bd->LeeRegistro())
	{
		$tareas[] = $reg;	 
	}
	return $tareas;
}

function GetNumRegistrosBusqueda($condicion)
{
	/*Creamos la instancia del objeto. Ya estamos conectados*/
	$bd = Db::getInstance();
	
	/*Creamos una query sencilla*/
	$sql = "SELECT count(*) as num FROM `tarea` WHERE  $condicion;";
	
	//echo "<pre>$sql</pre>";

	/*Ejecutamos la query*/
	$bd->Consulta($sql);
	
	// Creamos el array donde se guardarán las provincias
	$tareas = Array();
	
	/*Realizamos un bucle para ir obteniendo los resultados*/
	while ($reg = $bd->LeeRegistro())
	{
		$numRegistros = $reg;	 
	}
	return $numRegistros['num'];
}