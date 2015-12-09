<?php
/**
 * CONTROLADOR de modificar usuario
 */
if(! isset($_SESSION['loginok']) || ! isset($_GET['id'])){//Si no está iniciada la sesión o no se le pasa id muestra error
    
    include_once CTRL_PATH.'error404.php';
}
else if ($_SESSION['tipousuario'] != 'A'){//Solo puede eliminar usuarios los administradores
    include_once CTRL_PATH.'error404.php';
}
else{
    $correcto = true;
    $errores = array();

    include_once MODEL_PATH.'login.php';
    include_once HELP_PATH.'help_usuarios.php';

    if(! ExisteUsuarioByID($_GET['id'])){
            include_once CTRL_PATH.'error404.php';
    }
    else{
        if(! isset($_POST['modificarusuario']))
            include_once VIEW_PATH.'modificarusuario.php';
        else{

            if($_POST['clave'] != EscribeCampoUsuario($_GET['id'], 'clave')){ //CLAVE INTRODUCIDA CORRECTA
                $correcto = FALSE;
                $errores['claveincorrecta'] = TRUE;
            }
            else if($_POST['clavenueva'] != $_POST['clavenuevarep']){ //CLAVES NUEVAS IGUALES
                $errores['clavesdistintas'] = TRUE;
                $correcto = FALSE;
            }
            else if(ExisteNuevoNombreUsuario($_POST['usuario'], $_GET['id'])){//Comprobar que el nuevo nombre no sea uno de los usuarios ya guardados
                $errores['existenuevonombre'] = TRUE;
                $correcto = FALSE;
            }
            
            if(! $correcto)
                include_once VIEW_PATH.'modificarusuario.php';
            else {
                $_SESSION['usuario'] = $_POST['usuario'];
                if(empty($_POST['clavenueva']) && empty($_POST['clavenuevarep']))//Si estan vacias las dos claves, solo se modificar el nombre de usuario
                    ModificaUsuarioEnBD(array('usuario'=>$_POST['usuario']), $_GET['id']);              
                
                else
                    ModificaUsuarioEnBD(array('usuario' => $_POST['usuario'], 'clave' => $_POST['clavenueva']), $_GET['id']);
             
                
                header('Location: index.php?ctrl=listausuarios');

            }

        }
    }
}


