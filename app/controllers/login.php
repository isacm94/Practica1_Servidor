<?php

include_once MODEL_PATH.'login.php';

if(! $_POST)
    include_once VIEW_PATH.'login.php';
else{
    
    
    if(LoginOK($_POST['usuario'], $_POST['clave'])){//Sesión correcta
        
        $_SESSION['usuario'] = $_POST['usuario'];
        $_SESSION['clave'] = $_POST['clave'];
        $_SESSION['loginok'] = "TRUE";   
        $_SESSION['horainicio'] = date('h:i:s');
        $_SESSION['tipousuario'] = GetTipo($_POST['usuario']);
        

        //include_once CTRL_PATH.'principal.php';
        header('Location: index.php');  
        
    }
    else{
        $loginok = FALSE;//Variable usada para mostrar error en la vista
        include_once VIEW_PATH.'login.php';
    }
     
            
}
    