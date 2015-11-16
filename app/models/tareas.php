<?php
//define('APPCLASSDB', __DIR__.'\\..\\..\\install\\clasdb.php');
/*Incluimos el fichero de la clase*/
include_once '\\..\\..\\install\\classdb.php'; 

/**
 * Devuelve un array con los datos de tareas
 */
function GetTareas($nReg, $nElementosxPagina)
{
	/*Creamos la instancia del objeto. Ya estamos conectados*/
	$bd = Db::getInstance();
	
	/*Creamos una query sencilla*/
	$sql = 'SELECT  * FROM `tarea`  LIMIT '.$nReg.', '.$nElementosxPagina;
	
	/*Ejecutamos la query*/
	$bd->Consulta($sql);
	
	// Creamos el array donde se guardarán las provincias
	$tareas = Array();	
	
	/*Realizamos un bucle para ir obteniendo los resultados*/
	while ($line = $bd->LeeRegistro())
	{
		$tareas[] = $line;	 
	}
	return $tareas;
}
/**
 * Devuelve el número de registros guardado en la bd
 */
function GetNumRegistrosTareas()
{
	/*Creamos la instancia del objeto. Ya estamos conectados*/
	$bd = Db::getInstance();
	
	/*Creamos una query sencilla*/
	$sql = 'SELECT  count(*) as numRegistros FROM `tarea`';
	
	/*Ejecutamos la query*/
	$bd->Consulta($sql);
		
	/*Realizamos un bucle para ir obteniendo los resultados*/
	while ($line = $bd->LeeRegistro())
	{
		$numRegistros = $line;	 
	}

	/*
	echo '<pre>';
		print_r($numRegistros);
	echo '</pre>';*/
	return $numRegistros['numRegistros'];
}

//Función que pasándole un id de una tarea te devuelve un array con sus datos
function GetUnaTarea($id)
{
	/*Creamos la instancia del objeto. Ya estamos conectados*/
	$bd = Db::getInstance();
	
	/*Creamos una query sencilla*/
	$sql = 'SELECT * FROM `tarea` where id='.$id.'';
	
	/*Ejecutamos la query*/
	$bd->Consulta($sql);
	
	// Creamos el array donde se guardarán las provincias
	$tareas = Array();
	
	
	/*Realizamos un bucle para ir obteniendo los resultados*/
	while ($line = $bd->LeeRegistro())
	{
		$tareas[] = $line;	 
	}
	return $tareas;
}

function GetExisteTarea($id){

	/*Creamos la instancia del objeto. Ya estamos conectados*/
	$bd = Db::getInstance();
	
	/*Creamos una query sencilla*/
	$sql = 'SELECT count(*) as total FROM `tarea` where id='.$id;
	
	/*Ejecutamos la query*/
	$bd->Consulta($sql);

	/*Obtenemos resultado*/
	$line = $bd->LeeRegistro();
	
	echo "<h1>".$line['total']."</h1>";

	if($line['total'] > 0)
		return true;
	else
		return false;
}

/*
// OTRA FORMA que nos permitirá tener más de una consulta abierta

/*Ejecutamos la query*/
//$rs=$bd->Consulta($sql);

/*Realizamos un bucle para ir obteniendo los resultados*/
/*
while ($reg=$bd->LeeRegistro($rs))
{
	echo $reg['NOMBRE'].'<br />';
}
*/