<?php

function LoginOK($usuario, $clave){
    
    $user = "admin";
    $pass = "admin";
    
    /*
    echo "<br><br><br><br><br><br><h1>USUARIO: $user == $usuario<br>";
    echo "CONTRASEÑA: $pass == $clave</h1>";
    */
    if($user == $usuario && $pass == $clave){        
        return TRUE;   
    }
    else
        return FALSE;
    
}

