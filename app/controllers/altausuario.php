<?php

$correcto = true;
$errores = array();

include_once MODEL_PATH.'login.php';

if(! isset($_POST['anhadirusuario']))
    include_once VIEW_PATH.'altausuario.php';
else{
       
        
    if(ExisteUsuario($_POST['usuario'])){
        
        $errores['existeusuario'] = TRUE;
        $correcto = FALSE;           
        
    }
    else if($_POST['clave'] != $_POST['claverepetida']){//Si el usuario no existe, comprueba que las claves sean iguales
        $errores['clavesdistintas'] = TRUE;
        $correcto = FALSE;
    }
    
    if(! $correcto){
        include_once VIEW_PATH.'altausuario.php';
    }
    
    else{
        AñadirUsuario($_POST['tipo'], $_POST['usuario'], $_POST['clave']);
        include_once CTRL_PATH.'listausuarios.php';
    }
}