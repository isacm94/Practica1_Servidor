<?php

if(! $_POST)
    include_once VIEW_PATH."setup.php";
else{
    $fichero = fopen('config.php', 'w', true);

	if(! $fichero)
	{
	   echo '<h1>No se puede abrir el fichero.</h1>';
	}

	$cadena ="<?php ";
	$cadena.= ' $db_conf'."= array(
		'servidor'=>'".$_POST['servidor']."',
		'usuario'=>'".$_POST['usuario']."',
		'password'=>'".$_POST['password']."',
		'base_datos'=>'".$_POST['base_datos']."');";


	fwrite($fichero, $cadena, strlen($cadena));

	header("Location: index.php");
}