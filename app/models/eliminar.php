<?php

/**
 * Función que borra una tarea en la base de datos
 * @param Int $id Campo identificador de la tarea a eliminar
 */
function EliminarEnBD($id)
{
    /*Creamos la instancia del objeto. Ya estamos conectados*/
    $bd = Db::getInstance();	

    /*Ejecutamos la query*/
    $bd->Eliminar('tarea', $id);
}