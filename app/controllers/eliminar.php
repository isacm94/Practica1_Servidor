<?php
	
	//incluimos modelo de tareas para mostar la tarea correspondiente
	include_once '\\..\\models\\tareas.php'; 	

	//Obtenemos un array con los datos de la tarea
	$tarea = Array();
	$tarea = GetUnaTarea($_GET['id']);

	//incluimos modelo de eliminar para borrar la tarea
	include_once '\\..\\models\\eliminar.php'; 

	if(! $_POST){
		include_once '\\..\\views\\eliminar.php'; //Mostramos vista con los datos de la tarea
	}
	else{

		if(isset($_POST['sieliminar'])){
			EliminarEnBD($_GET['id']);		
			include_once '\\..\\controllers\\lista.php';	
		}
		else if(isset($_POST['noeliminar'])){
			include_once '\\..\\controllers\\lista.php';
		}
	}



	



	
