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
				
			echo '<td>';
                                
                                if(isset($_SESSION['tipousuario'])&& $_SESSION['tipousuario'] == 'O'){
                                    echo '<p><a href="?ctrl=completartarea&id='.$id.'" class="btn btn-primary btn-success" title="Completar tarea"><span class="glyphicon glyphicon-ok"></span></a></p>';
                                }
                                
                                if(isset($_SESSION['tipousuario'])&& $_SESSION['tipousuario'] == 'A'){
                                    echo '<p><a href="?ctrl=modificar&id='.$id.'"class="btn btn-warning" title="Modificar Tarea"><span class="glyphicon glyphicon-pencil"></span></a></p>';
				
                                    echo '<a href="?ctrl=eliminar&id='.$id.'" class="btn btn-danger" title="Eliminar Tarea"><span class="glyphicon glyphicon-trash"></span></a>';				
                                }
			echo '</td>';
		echo '</tr>';
	}
	

}

