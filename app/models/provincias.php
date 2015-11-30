<?php

/**
 * Función que devuelve un array con los datos de las provincias
 * @return Array Provincias, código y nombre 
 */
function GetProvincias()
{
    /*Creamos la instancia del objeto. Ya estamos conectados*/
    $bd = Db::getInstance();

    $sql = 'SELECT cod as cod, nombre as nom
                                    FROM `tbl_provincias`';

    /*Ejecutamos la query*/
    $bd->Consulta($sql);

    // Creamos el array donde se guardarán las provincias
    $Provincias = Array();

    /*Realizamos un bucle para ir obteniendo los resultados*/
    while ($reg = $bd->LeeRegistro())
    {
            $Provincias[$reg['cod']] = $reg['nom'];	 
    }
    return $Provincias;
}

/**
 * Función que devuelve el nombre de una provincia a través de su código
 * @param Int $cod Código de la provincia
 * @return String Nombre de la provincia
 */
function GetNombreProvincias($cod){

    /*Creamos la instancia del objeto. Ya estamos conectados*/
    $bd = Db::getInstance();

    /*Creamos una query sencilla*/
    $sql = 'SELECT nombre
            FROM `tbl_provincias`
                    where cod='.$cod;

    /*Ejecutamos la query*/
    $bd->Consulta($sql);

    /*Obtenemos los resultados*/
    $line = $bd->LeeRegistro();

    return $line['nombre'];
}
