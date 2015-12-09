<?php

/**
 * CONTROLADOR de añadir usuario
 */
include_once HELP_PATH.'helps.php';

if (!isset($_SESSION['loginok'])) {//Si no está iniciada la sesión muestra error
    include_once CTRL_PATH . 'error404.php';
} else if ($_SESSION['tipousuario'] != 'A') {//Solo añadir usuarios los administradores
    include_once CTRL_PATH . 'error404.php';
} else {
    $correcto = true;
    $errores = array();

    include_once MODEL_PATH . 'login.php';

    if (!isset($_POST['anhadirusuario']))
        include_once VIEW_PATH . 'altausuario.php';
    else {
        if (!EMPTY($_POST['usuario']) && !EMPTY($_POST['clave']) && !EMPTY($_POST['claverepetida'])){
                if (ExisteUsuario($_POST['usuario'])) {
                $errores['existeusuario'] = TRUE;
                $correcto = FALSE;
            } else if ($_POST['clave'] != $_POST['claverepetida']) {//Si el usuario no existe, comprueba que las claves sean iguales
                $errores['clavesdistintas'] = TRUE;
                $correcto = FALSE;
            }

            if (!$correcto) {
                include_once VIEW_PATH . 'altausuario.php';
            } else {
                AnhadirUsuario($_POST['tipo'], $_POST['usuario'], $_POST['clave']);
                include_once CTRL_PATH . 'listausuarios.php';
            }
        }
        else{
            include_once VIEW_PATH.'altausuario.php';
        }
    }
}