<?php
include_once MODEL_PATH.'login.php';
$correcto = true;
$errores = array();
if(! $_POST)
    include_once VIEW_PATH.'altausuario.php';
else{
    
    if($_POST['clave'] != $_POST['claverepetida']){
        $errores['clavesdistintas'] = TRUE;
        $correcto = FALSE;
    }
    else if(ExisteUsuario($_POST['usuario'])){//si las claves no están repetidas comprueba que el usuario exista
        
        $errores['existeusuario'] = TRUE;
        $correcto = FALSE;           
        
    }
    
    if(! $correcto)
        include_once VIEW_PATH.'altausuario.php';
    else {      
        AñadirUsuario($_POST['tipo'], $_POST['usuario'], $_POST['clave']);
        include_once VIEW_PATH.'altausuario.php';
    }
        
}