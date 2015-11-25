<?php

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

function AñadirUsuario($tipo, $usuario, $clave){  


    /*Creamos la instancia del objeto. Ya estamos conectados*/
    $bd = Db::getInstance();	

    /*Ejecutamos la query*/
    $bd->Insertar('usuarios', array('tipo' => $tipo, 'usuario' => $usuario, 'clave' => $clave));  
    
}

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

function ExisteUsuarioByID($id){
    
    $bd = Db::getInstance();
	
    $sql = "SELECT COUNT(*) as cont
                    FROM `usuarios`
                        WHERE `id` LIKE '$id'";

    /*Ejecutamos la query*/
    $bd->Consulta($sql);

    /*Obtenemos los resultados*/
    $cont = $bd->LeeRegistro();

    if($cont['cont'] > 0)
        return true;
    else
        return false;
}

function GetUsuarios(){
    /*Creamos la instancia del objeto. Ya estamos conectados*/
    $bd = Db::getInstance();
    
    $sql = 'SELECT id as id, usuario as nombre, tipo as tipo FROM `usuarios`';

    /*Ejecutamos la query*/
    $bd->Consulta($sql);

    // Creamos el array donde se guardarán las provincias
    $usuarios = Array();	

    /*Realizamos un bucle para ir obteniendo los resultados*/
    while ($line = $bd->LeeRegistro())
    {
            $usuarios[] = $line;	 
    }
    return $usuarios;
}

function GetTipo($usuario){
    /*Creamos la instancia del objeto. Ya estamos conectados*/
    $bd = Db::getInstance();
    
    $sql = "SELECT tipo
                FROM `usuarios`
                    WHERE `usuario` LIKE '$usuario'";
    
    /*Ejecutamos la query*/
    $bd->Consulta($sql);

    // Creamos el array donde se guardarán las provincias
    $usuarios = Array();	

    $line = $bd->LeeRegistro();
    
    return $line['tipo'];
}

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

function GetID($usuario){
    /*Creamos la instancia del objeto. Ya estamos conectados*/
    $bd = Db::getInstance();
    
    $sql = "SELECT id
                FROM `usuarios`
                    WHERE `usuario` LIKE '$usuario'";
    
    /*Ejecutamos la query*/
    $bd->Consulta($sql);

    // Creamos el array donde se guardarán las provincias
    $usuarios = Array();	

    $line = $bd->LeeRegistro();
    
    return $line['id'];
}
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

function ModificaUsuarioEnBD($registro, $id)
{

	/*Creamos la instancia del objeto. Ya estamos conectados*/
	$bd = Db::getInstance();	

	/*Ejecutamos la query*/
	$bd->Modificar('usuarios', $registro, $id);
}

function EliminarUsuarioEnBD($id)
{
	/*Creamos la instancia del objeto. Ya estamos conectados*/
	$bd = Db::getInstance();	

	/*Ejecutamos la query*/
	$bd->Eliminar('usuarios', $id);
}

