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
