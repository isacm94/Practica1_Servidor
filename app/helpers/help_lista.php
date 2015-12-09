<?php

/**
 * HELP funcion usada en lista de tareas
 */

/**
 * Función que muestra los datos de todas las tareas en forma de tabla en la vista
 * @param Array $tareas Tareas a mostrar
 */
function EscribeTarea($tareas) {
    foreach ($tareas as $key => $tarea) {

        echo '<tr>'; //Inicio fila

        foreach ($tarea as $key => $value) {

            if ($key == 'id')
                $id = $value;
            else {

                if ($key == 'tbl_provincias_cod')//Para escribir el nombre de la provincia y no el código		
                    echo '<td>' . GetNombreProvincias($value) . '</td>';
                else if ($key == 'fecha_creacion' || $key == 'fecha_realizacion') { //Cambiar formato a ddmmyyyy							
                    $date = new DateTime($value);
                    echo '<td>' . date_format($date, 'd-m-Y') . '</td>';
                } else
                    echo '<td>' . $value . '</td>';
            }
        }

        echo '<td>'; //Inicio de columna de opciones

        if (isset($_SESSION['tipousuario']) && $_SESSION['tipousuario'] == 'O') {
            echo '<p><a href="?ctrl=completartarea&id=' . $id . '" class="btn btn-primary btn-success" title="Completar tarea"><span class="glyphicon glyphicon-ok"></span></a></p>';
        }

        if (isset($_SESSION['tipousuario']) && $_SESSION['tipousuario'] == 'A') {
            echo '<p><a href="?ctrl=modificar&id=' . $id . '"class="btn btn-warning" title="Modificar Tarea"><span class="glyphicon glyphicon-pencil"></span></a></p>';

            echo '<a href="?ctrl=eliminar&id=' . $id . '" class="btn btn-danger" title="Eliminar Tarea"><span class="glyphicon glyphicon-trash"></span></a>';
        }
        echo '</td>'; //Fin de columna de opciones
        echo '</tr>'; //Fin fila
    }
}
