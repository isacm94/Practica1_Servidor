<?php

/*Incluimos el fichero de la clase*/
include_once '\\..\\..\\install\\classdb.php';

/**
 * Inserta una tarea en la base de datos
 */
function InsertaTareaEnBD($tarea, $registro)
{

	/*Creamos la instancia del objeto. Ya estamos conectados*/
	$bd = Db::getInstance();	

	/*Ejecutamos la query*/
	$bd->Insertar($tarea, $registro);
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