<?php
	
	//incluimos modelo de tareas para mostar la tarea correspondiente
	include_once '\\..\\models\\tareas.php'; 	

	//Obtenemos un array con los datos de la tarea
	$tarea = Array();
	$tarea = GetUnaTarea($_GET['id']);

	//Incluimos el modelo de modificar para cambiar el estado y las anotaciones posteriores
	include_once '\\..\\models\\modificar.php';

	if(! $_POST){
		include_once '\\..\\views\\completartarea.php'; //Mostramos vista con los datos de la tarea
	}
	else{
		ModificaTareaEnBD('tarea', array('estado'=> $_POST['estado'], 
										  'anotaciones_posteriores' => $_POST['anotaciones_posteriores']),
																										$_GET['id']);
		include_once '\\..\\controllers\\lista.php'; //Mostramos vista con los datos de la tarea
	}



	



	
