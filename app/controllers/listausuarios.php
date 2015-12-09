<?php
/**
 * CONTROLADOR de listar usuarios
 */
if(! isset($_SESSION['loginok'])){//Si no está iniciada la sesión muestra error
    
    include_once CTRL_PATH.'error404.php';
}
else if ($_SESSION['tipousuario'] != 'A'){//Solo puede ver la lista de usuarios los administradores
    include_once CTRL_PATH.'error404.php';
}
else{
    include_once MODEL_PATH.'login.php';
    include_once HELP_PATH.'help_usuarios.php';

    $usuarios = GetUsuarios();

    include_once VIEW_PATH.'listausuarios.php';

}
