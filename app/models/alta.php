<?php

/**
 * Función que añade una tarea a la base de datos
 * @param String $tarea Nombre de la tabla donde se añade 
 * @param Array $registro Datos que
 */
function InsertaTareaEnBD($tarea, $registro)
{
    /*Creamos la instancia del objeto. Ya estamos conectados*/
    $bd = Db::getInstance();	

    /*Ejecutamos la query*/
    $bd->Insertar($tarea, $registro);
}
