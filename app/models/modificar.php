<?php

/**
 * MODELO de modificar tarea
 */

/**
 * Función que actualiza una tarea en la Base de Datos a través de su Id
 * @param String $tabla Nombre de la tabla donde se modifica
 * @param Array $registro Datos a actualizar
 * @param Int $id Identificador del usuario
 */
function ModificaTareaEnBD($tabla, $registro, $id) {
    /* Creamos la instancia del objeto. Ya estamos conectados */
    $bd = Db::getInstance();

    $bd->Modificar($tabla, $registro, $id);
}
