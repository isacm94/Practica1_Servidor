<?php

//Escribe los datos en la lista
function EscribeTarea($tareas){
	foreach ($tareas as $key => $tarea) {
		
		echo '<tr>';

			echo '<td>'.$tarea['id'].'</td>';

			foreach ($tarea as $key => $value) {	

					if($key == 'id')
						$id = $value;

					else if($key == 'tbl_provincias_cod')//Para escribir el nombre de la provincia y no el código		
						echo '<td>'.GetNombreProvincias($value).'</td>';
					else if($key == 'fecha_creacion' || $key == 'fecha_realizacion'){ //Cambiar formato a ddmmyyyy							
						$date = new DateTime($value);
						echo '<td>'.date_format($date, 'd-m-Y').'</td>';	
					}
					else 
						echo '<td>'.$value.'</td>';
			}
				
			echo '<td> <a href="modificar.php?id='.$id.'"class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span> Modificar</a><br><br>';
			
			echo '<a href="eliminar.php?id='.$id.'" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Eliminar&nbsp;&nbsp;</td>';
		echo '</tr>';
	}
	

}

