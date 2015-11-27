<?php

if(! isset($_GET['id'])){//Si no llega un id muestra error
    
    include_once CTRL_PATH.'error404.php';  
}
else if(! isset($_SESSION['loginok'])){//Si no está iniciada la sesión muestra el login
    
    include_once CTRL_PATH.'login.php';
}
else if ($_SESSION['tipousuario'] != 'O'){//Solo puede completar taareas operarios
    include_once CTRL_PATH.'error404.php';
}
else {
	
    //incluimos modelo de tareas para mostar la tarea correspondiente
    include_once MODEL_PATH.'tareas.php'; 	

    //Obtenemos un array con los datos de la tarea
    $tarea = Array();
    $tarea = GetUnaTarea($_GET['id']);

    if(GetExisteTarea($_GET['id'])){

            //Incluimos el modelo de modificar para cambiar el estado y las anotaciones posteriores
            include_once MODEL_PATH.'modificar.php';

            if(! $_POST){
                    include_once VIEW_PATH.'completartarea.php'; //Mostramos vista con los datos de la tarea
            }
            else{
                    ModificaTareaEnBD('tarea', array('estado'=> $_POST['estado'], 
                                                                                      'anotaciones_posteriores' => $_POST['anotaciones_posteriores']),
                                                                                                                                                                                                                    $_GET['id']);
                    include_once CTRL_PATH.'lista.php'; //Mostramos vista con los datos de la tarea
            }

    }
    else{
            include_once CTRL_PATH.'error404.php';
    }

}
	



	
