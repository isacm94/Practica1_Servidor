<?php

include_once MODEL_PATH.'login.php';

if(! $_POST)
    include_once VIEW_PATH.'login.php';
else{
    
    
    if(LoginOK($_POST['usuario'], $_POST['clave'])== TRUE){//Sesión correcta
        session_start();
        $_SESSION['usuario'] = $_POST['usuario'];
        $_SESSION['clave'] = $_POST['clave'];
        $_SESSION['loginok'] = "TRUE";   
        $_SESSION['horainicio'] = date('h:i:s');

        //include_once CTRL_PATH.'principal.php';
         header('Location: index.php?ctrl=principal');  
        
    }
    else{
        $loginok = FALSE;//Variable usada para mostrar error en la vista
        include_once VIEW_PATH.'login.php';
    }
     
            
}
    