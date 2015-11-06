<?php
/*Incluimos el fichero de la clase*/
include_once '\\..\\..\\install\\classdb.php'; 

/**
 * Devuelve un array con los datos de tareas
 */
function EliminarEnBD($id)
{
	/*Creamos la instancia del objeto. Ya estamos conectados*/
	$bd = Db::getInstance();	

	/*Ejecutamos la query*/
	$bd->Eliminar('tarea', $id);
}