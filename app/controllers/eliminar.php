<?php
	
	//incluimos modelo de tareas
	include_once '\\..\\models\\tareas.php'; 

	//Obtenemos un array con los datos de la tarea
	$tarea = Array();
	$tarea = GetUnaTarea($_GET['id']);

	/*
	echo '<pre>';
	print_r($tarea);
	echo '</pre>';*/

	include_once '\\..\\views\\eliminar.php'; //Mostramos vista con los datos de la tarea

	echo '<pre>';
	print_r($_GET);
	echo '</pre>';


	if(isset($_GET['sieliminar'])){
		echo "<h1>ELIMINAR</h1>";
		include_once '\\..\\controllers\\lista.php';
	}
	else if(isset($_GET['noeliminar'])){
		include_once '\\..\\controllers\\lista.php';
	}



	
