<?php
	
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



	



	
