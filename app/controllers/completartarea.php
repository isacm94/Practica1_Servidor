<?php
	
	//incluimos modelo de tareas para mostar la tarea correspondiente
	include_once MODEL_PATH.'tareas.php'; 	

	//Obtenemos un array con los datos de la tarea
	$tarea = Array();
	$tarea = GetUnaTarea($_GET['id']);

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



	



	
