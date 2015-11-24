<?php 



function ModificaTareaEnBD($tabla, $registro, $id)
{

	/*Creamos la instancia del objeto. Ya estamos conectados*/
	$bd = Db::getInstance();	

	/*Ejecutamos la query*/
	$bd->Modificar($tabla, $registro, $id);
}