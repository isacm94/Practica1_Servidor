<?php

/**
 * Función que comprueba que un usuario y una clave sean correctos
 * @param String $usuario Usuario a comprobar
 * @param String $clave Clave del usuario a comprobar
 * @return boolean True si la clave corresponde al usuario
 */
function LoginOK($usuario, $clave){
        
    /*Creamos la instancia del objeto. Ya estamos conectados*/
    $bd = Db::getInstance();

    $sql = "SELECT usuario as user, clave as pass
                FROM `usuarios`
                    WHERE `usuario` LIKE '$usuario'";

    /*Ejecutamos la query*/
    $bd->Consulta($sql);
        
    /*Obtenemos los resultados*/
    $user = $bd->LeeRegistro();
    
    if($user['pass'] == $clave) 
        return TRUE;   
    
    else
        return FALSE;
    
}

/**
 * Función que inserta en la Base de Datos un nuevo usuario
 * @param Char $tipo Administrador -> A, Operario -> O
 * @param String $usuario Nombre de usuario
 * @param String $clave Contraseña de usuario
 */
function AñadirUsuario($tipo, $usuario, $clave){  

    /*Creamos la instancia del objeto. Ya estamos conectados*/
    $bd = Db::getInstance();	

    $bd->Insertar('usuarios', array('tipo' => $tipo, 'usuario' => $usuario, 'clave' => $clave));  
    
}

/**
 * Función que comprueba si un usuario está guardado en la Base de Datos a través de su nombre
 * @param String $usuario Nombre de usuario
 * @return boolean True si existe
 */
function ExisteUsuario($usuario){
    
    $bd = Db::getInstance();
	
    $sql = "SELECT COUNT(*) as cont
                    FROM `usuarios`
                        WHERE `usuario` LIKE '$usuario'";

    /*Ejecutamos la query*/
    $bd->Consulta($sql);

    /*Obtenemos los resultados*/
    $cont = $bd->LeeRegistro();

    if($cont['cont'] > 0)
        return true;
    else
        return false;
}

/**
 * Función que comprueba si un usuario está guardado en la Base de Datos a través de su ID
 * @param Int $id Campo identificador del usuario
 * @return boolean True si existe 
 */
function ExisteUsuarioByID($id){
    
    $bd = Db::getInstance();
	
    $sql = "SELECT COUNT(*) as cont
                    FROM `usuarios`
                        WHERE `id` LIKE '$id'";

    /*Ejecutamos la query*/
    $bd->Consulta($sql);

    $cont = $bd->LeeRegistro(); //Guardamos el resulado de la consulta
    
    if($cont['cont'] > 0)
        return true;
    else
        return false;
}

/**
 * Función que devuelve todos los usuarios guardados en la Base de Datos con los campos de id, nombre y tipo
 * @return Array Usuarios
 */
function GetUsuarios(){
    /*Creamos la instancia del objeto. Ya estamos conectados*/
    $bd = Db::getInstance();
    
    $sql = 'SELECT id as id, usuario as nombre, tipo as tipo 
            FROM `usuarios`';

    /*Ejecutamos la query*/
    $bd->Consulta($sql);

    // Creamos el array donde se guardarán los usuarios
    $usuarios = Array();	

    /*Realizamos un bucle para ir obteniendo los resultados*/
    while ($line = $bd->LeeRegistro())
    {
            $usuarios[] = $line;	 
    }
    return $usuarios;
}

/**
 * Función que devuelve el tipo de un usuario
 * @param String $usuario Nombre del usuario
 * @return Char A -> Administrador, O -> Operario
 */
function GetTipo($usuario){
    /*Creamos la instancia del objeto. Ya estamos conectados*/
    $bd = Db::getInstance();
    
    $sql = "SELECT tipo
                FROM `usuarios`
                    WHERE `usuario` LIKE '$usuario'";
    
    /*Ejecutamos la query*/
    $bd->Consulta($sql);

    $line = $bd->LeeRegistro();
    
    return $line['tipo'];
}
/**
 * Función que te devuelve un usuario y su clave a través de su ID
 * @param Int $id Identificador del usuario
 * @return Array Usuario y clave
 */
function GetUnUsuario($id){
    /*Creamos la instancia del objeto. Ya estamos conectados*/
    $bd = Db::getInstance();
    
    $sql = "SELECT usuario, clave
                FROM `usuarios`
                    WHERE `id`=$id";

    /*Ejecutamos la query*/
    $bd->Consulta($sql);

    // Creamos el array donde se guardarán las provincias
    $usuario = Array();	

    /*Realizamos un bucle para ir obteniendo los resultados*/
    while ($line = $bd->LeeRegistro())
    {
        $usuario[] = $line;	 
    }
    
    return $usuario[0];
}

/**
 * Función que te devuelve el ID de un usuario a través de su nombre
 * @param String $usuario Nombre de usuario
 * @return Int Identificador de usuario
 */
function GetID($usuario){
    /*Creamos la instancia del objeto. Ya estamos conectados*/
    $bd = Db::getInstance();
    
    $sql = "SELECT id
                FROM `usuarios`
                    WHERE `usuario` LIKE '$usuario'";
    
    /*Ejecutamos la query*/
    $bd->Consulta($sql);	

    $line = $bd->LeeRegistro();
    
    return $line['id'];
}

/**
 * Función que comprueba que un nombre exista y no corresponda al ID pasado por parámetro
 * @param String $nuevonombre Nombre de usuario
 * @param Int $id Identificador del usuario
 * @return boolean True si existe
 */
function ExisteNuevoNombreUsuario($nuevonombre, $id){
    
    $bd = Db::getInstance();
	
    $sql = "SELECT COUNT(*) as cont
                    FROM `usuarios`
                        WHERE `usuario` LIKE '$nuevonombre'
                            AND `id` NOT LIKE '$id'";

    /*Ejecutamos la query*/
    $bd->Consulta($sql);

    /*Obtenemos los resultados*/
    $cont = $bd->LeeRegistro();

    if($cont['cont'] > 0)
        return true;
    else
        return false;
}

/**
 * Función que actualiza los datos de un usuario en la Base de Datos
 * @param Array $registro Datos a actualizar
 * @param Int $id Identificador del usuario
 */
function ModificaUsuarioEnBD($registro, $id)
{

    /*Creamos la instancia del objeto. Ya estamos conectados*/
    $bd = Db::getInstance();	

    /*Ejecutamos la query*/
    $bd->Modificar('usuarios', $registro, $id);
}

/**
 * Función que borra un usuario en la Base de Datos a través de su ID
 * @param Int $id Identificador del usuario
 */
function EliminarUsuarioEnBD($id)
{
	/*Creamos la instancia del objeto. Ya estamos conectados*/
	$bd = Db::getInstance();	

	/*Ejecutamos la query*/
	$bd->Eliminar('usuarios', $id);
}

