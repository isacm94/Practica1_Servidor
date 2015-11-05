<?php 

/*Incluimos el fichero de la clase*/
include_once '\\..\\..\\install\\classdb.php';

/**
 * Inserta una tarea en la base de datos
 */
function ModificaTareaEnBD($tabla, $registro, $id)
{

	/*Creamos la instancia del objeto. Ya estamos conectados*/
	$bd = Db::getInstance();	

	/*Ejecutamos la query*/
	$bd->Modificar($tabla, $registro, $id);
}