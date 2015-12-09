<?php

/**
 * MODELO de buscar tarea
 */

/**
 * Función que devuelve un array con los datos que coincidan con la búsqueda
 * @param String $condicion Requisitos que tiene que cumplir la búsqueda
 * @param Int $nReg Número de registro
 * @param Int $nElementosxPagina Número de elementos a mostrar por página
 * @return Array Tareas
 */
function GetBusqueda($condicion, $nReg, $nElementosxPagina) {
    /* Creamos la instancia del objeto. Ya estamos conectados */
    $bd = Db::getInstance();

    /* Creamos una query sencilla */
    $sql = "SELECT * FROM `tarea` WHERE  $condicion LIMIT $nReg, $nElementosxPagina;";

    /* Ejecutamos la query */
    $bd->Consulta($sql);

    // Creamos el array donde se guardarán las tareas
    $tareas = Array();

    /* Realizamos un bucle para ir obteniendo los resultados */
    while ($reg = $bd->LeeRegistro()) {
        $tareas[] = $reg;
    }
    return $tareas;
}

/**
 * Función que devuelve el número total de registros de la búsqueda
 * @param String $condicion Requisitos que tiene que cumplir la busqueda
 * @return Int Número total de regitros
 */
function GetNumRegistrosBusqueda($condicion) {
    /* Creamos la instancia del objeto. Ya estamos conectados */
    $bd = Db::getInstance();

    /* Creamos una query sencilla */
    $sql = "SELECT count(*) as num FROM `tarea` WHERE  $condicion;";

    /* Ejecutamos la query */
    $bd->Consulta($sql);

    /* Realizamos un bucle para ir obteniendo los resultados */
    while ($reg = $bd->LeeRegistro()) {
        $numRegistros = $reg;
    }
    return $numRegistros['num'];
}
