<?php
/**
 * CONTROLADOR de eliminar tarea
 */
if(! isset($_GET['id'])){//Si no llega un id muestra error
    
    include_once CTRL_PATH.'error404.php';  
}
else if(! isset($_SESSION['loginok'])){//Si no está iniciada la sesión muestra el login
    
    include_once CTRL_PATH.'login.php';
}
else if ($_SESSION['tipousuario'] != 'A'){//Solo puede eliminar administradores
    include_once CTRL_PATH.'error404.php';
}
else {
    //incluimos modelo de tareas para mostar la tarea correspondiente
    include_once MODEL_PATH.'tareas.php'; 		

    //Obtenemos un array con los datos de la tarea
    $tarea = Array();
    $tarea = GetUnaTarea($_GET['id']);

    //incluimos modelo de eliminar para borrar la tarea
    include_once MODEL_PATH.'eliminar.php'; 

    if(! GetExisteTarea($_GET['id'])){
        include_once CTRL_PATH.'error404.php';
    }
    else{

        if(! $_POST){
                include_once VIEW_PATH.'eliminar.php'; //Mostramos vista con los datos de la tarea
        }
        else{

            if(isset($_POST['sieliminar'])){
                    EliminarEnBD($_GET['id']);		
                    include_once CTRL_PATH.'lista.php';	
            }
            else if(isset($_POST['noeliminar'])){
                    include_once CTRL_PATH.'lista.php';
            }
        }
    }
}







