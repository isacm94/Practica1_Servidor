<?php
//define('APPCLASSDB', __DIR__.'\\..\\..\\install\\clasdb.php');
/*Incluimos el fichero de la clase*/
include_once '\\..\\..\\install\\classdb.php'; 

/**
 * Devuelve un array con los datos de las provincias
 */
function GetBuscador($fc_inicio, $fc_fin, $fr_inicio, $fr_fin, $estado)
{
	/*Creamos la instancia del objeto. Ya estamos conectados*/
	$bd = Db::getInstance();
	
	/*Creamos una query sencilla*/
	$sql = 'SELECT cod as cod, nombre as nom
					FROM `tbl_provincias`';
	
	/*Ejecutamos la query*/
	$bd->Consulta($sql);
	
	// Creamos el array donde se guardarán las provincias
	$tareas = Array();
	
	/*Realizamos un bucle para ir obteniendo los resultados*/
	while ($reg = $bd->LeeRegistro())
	{
		$tareas[$reg['cod']] = $reg;	 
	}
	return $tareas;
}