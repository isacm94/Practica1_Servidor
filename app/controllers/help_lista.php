<?php

//Escribe los datos en la lista
function EscribeTarea($tareas){

/*
	echo '<pre>';
		print_r($tareas);
	echo '</pre>';*/
	foreach ($tareas as $key => $tarea) {
		
		echo '<tr>';

			echo '<td>'.$tarea['id'].'</td>';

			foreach ($tarea as $key => $value) {	

					if($key == 'id')
						$id = $value;

					else if($key == 'tbl_provincias_cod')//Para escribir el nombre de la provincia y no el código		
						echo '<td>'.GetNombreProvincias($value).'</td>';	
					else 
						echo '<td>'.$value.'</td>';
			}

			echo '<td> <a href="modificar.php?id='.$id.'">Modificar</a> </td>';

		echo '</tr>';
	}
	

}
