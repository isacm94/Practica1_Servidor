<?php 

/**
 * 
 */

/**
 * Función que devuelve un array con los datos de tareas
 * @param Int $nReg Número de registro
 * @param Int $nElementosxPagina Número de elementos a mostrar por página
 * @return Array Tareas y sus datos
 */
function GetTareas($nReg, $nElementosxPagina)
{
    /*Creamos la instancia del objeto. Ya estamos conectados*/
    $bd = Db::getInstance();
    
    $sql = 'SELECT  * FROM `tarea`  LIMIT '.$nReg.', '.$nElementosxPagina;

    /*Ejecutamos la query*/
    $bd->Consulta($sql);

    // Creamos el array donde se guardarán las provincias
    $tareas = Array();	

    /*Realizamos un bucle para ir obteniendo los resultados*/
    while ($line = $bd->LeeRegistro())
    {
        $tareas[] = $line;	 
    }
    return $tareas;
}


/**
 * Función que devuelve el número de tareas guardadas en la Base de Datos
 * @return Int Número de tareas guardadas
 */
function GetNumRegistrosTareas()
{
    /*Creamos la instancia del objeto. Ya estamos conectados*/
    $bd = Db::getInstance();

    /*Creamos una query sencilla*/
    $sql = 'SELECT  count(*) as numRegistros FROM `tarea`';

    /*Ejecutamos la query*/
    $bd->Consulta($sql);

    /*Realizamos un bucle para ir obteniendo los resultados*/
    $line = $bd->LeeRegistro();
        
    return $line['numRegistros'];
}


/**
 * Función que pasándole un id de una tarea te devuelve un array con sus datos
 * @param Int $id Identificador de la tarea
 * @return Array Tarea
 */
function GetUnaTarea($id)
{
    /*Creamos la instancia del objeto. Ya estamos conectados*/
    $bd = Db::getInstance();

    /*Creamos una query sencilla*/
    $sql = 'SELECT * FROM `tarea` where id='.$id.'';

    /*Ejecutamos la query*/
    $bd->Consulta($sql);

    // Creamos el array donde se guardarán las provincias
    $tareas = Array();


    /*Realizamos un bucle para ir obteniendo los resultados*/
    while ($line = $bd->LeeRegistro())
    {
            $tareas[] = $line;	 
    }
    return $tareas;
}

/**
 * Función que comprueba si existe una tarea a través de su ID
 * @param Int $id Identificador de la tarea
 * @return boolean True si existe
 */
function GetExisteTarea($id){

    /*Creamos la instancia del objeto. Ya estamos conectados*/
    $bd = Db::getInstance();

    /*Creamos una query sencilla*/
    $sql = 'SELECT count(*) as total FROM `tarea` where id='.$id;

    /*Ejecutamos la query*/
    $bd->Consulta($sql);

    /*Obtenemos resultado*/
    $line = $bd->LeeRegistro();

    if($line['total'] > 0)
        return true;
    else
        return false;
}
