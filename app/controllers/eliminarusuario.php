<?php

/**
 * CONTROLADOR de eliminar usuario
 */
if (!isset($_SESSION['loginok']) || !isset($_GET['id'])) {//Si no está iniciada la sesión o no se le pasa id muestra error
    include_once CTRL_PATH . 'error404.php';
} else if ($_SESSION['tipousuario'] != 'A') {//Solo puede eliminar usuarios los administradores
    include_once CTRL_PATH . 'error404.php';
} else {
    include_once MODEL_PATH . 'login.php';
    include_once HELP_PATH . 'help_usuarios.php';



    if (!ExisteUsuarioByID($_GET['id'])) {
        include_once CTRL_PATH . 'error404.php';
    } else {

        if (!$_POST) {
            include_once VIEW_PATH . 'eliminarusuario.php'; //Mostramos vista con los datos de la tarea
        } else {

            if (isset($_POST['sieliminar'])) {
                EliminarUsuarioEnBD($_GET['id']);
                include_once CTRL_PATH . 'listausuarios.php';
            } else if (isset($_POST['noeliminar'])) {
                include_once CTRL_PATH . 'listausuarios.php';
            }
        }
    }
}
