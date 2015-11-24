<?php

function EscribeUsuarios($usuarios){
	foreach ($usuarios as $key => $usuario) {
		echo '<tr>';

			//echo '<td>'.$usuarios['id'].'</td>';

			foreach ($usuario as $key => $value) {	
                            if($value == 'A')
                                echo '<td>Administrador</td>';
                            else if($value == 'O')
                                echo '<td>Operario</td>';
                            else
                                echo "<td>$value</td>";
                            
                            if($key == 'id')
                                $id = $value;
                                
			}
				
			echo '<td>';
				
                            echo '<p><a href="?ctrl=modificarusuario&id='.$id.'" class="btn btn-warning" title="Modificar Usuario"><span class="glyphicon glyphicon-pencil"></span></a>';
                                echo '&nbsp;&nbsp;';
                            echo '<a href="?ctrl=eliminarusuario&id='.$id.'" class="btn btn-danger" title="Eliminar Usuario"><span class="glyphicon glyphicon-trash"></span></a></p>';				
			echo '</td>';
		echo '</tr>';
	}	

}

function EscribeCampoUsuario($id, $name, $tipo=''){
    
    $usuario = GetUnUsuario($id);
    
    return $usuario[$name];
}

