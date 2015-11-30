<?php

/**
 * @param string $name Nombre del campo
 * @param array $opciones Opciones que tiene el select
 * 			clave array=valor option
 * 			valor array=texto option
 * @param string $valorDefecto Valor seleccionado
 * @return string Código HTML generado
 */
function CreaSelectCon1ValorVacio($name, $opciones, $valorDefecto='', $tamanho='')
{ 	
    $valorElegido = '';

    if(isset($_POST[$name]))
            $valorElegido = $_POST[$name];

    $html="\n".'<select class="form-control" name="'.$name.'" '.$tamanho.' >';

    $html.= "\n\t<option value='defecto' selected></option>";

    foreach($opciones as $key=>$text)
    {   
        if($valorElegido == $key)		
            $select ='selected="selected"';

        else
                $select="";

        $html.= "\n\t<option value=$key $select>$text</option>";
    }

    $html.="\n</select>";

    return $html;
}

/**
 * Función que muestra un mensaje por cada error producido
 * @param Array $errores Errores producidos
 */
function MuestraError($errores){

    echo '<div class="alert alert-danger">';

        foreach ($errores as $key => $value) {
                echo "<b>¡Error!</b> $value<br>";
        }

    echo '</div>';
}

/**
 * Función que genera una condición, a ejecutar en una consulta de tareas, según los campos escogidos
 * @return String Condición generada
 */
function CreaCondicionConsulta(){

    $condiciones = array();

    if(! EMPTY($_POST['fecha_creacion']))
            $condiciones['fc'] = 'fecha_creacion '. GetOperador($_POST['fechaC_operador']) . ' "' . CambiaFormatoFecha($_POST['fecha_creacion']). '" ';

    if(! EMPTY($_POST['fecha_realizacion']))
            $condiciones['fr'] = 'fecha_realizacion ' . GetOperador($_POST['fechaR_operador']) . ' "' . CambiaFormatoFecha($_POST['fecha_realizacion']). '" ';

    if($_POST['provincia'] != 'defecto')
            $condiciones['prov'] = 'tbl_provincias_cod = '. $_POST['provincia'];

    if(! EMPTY($_POST['telefono']))
            $condiciones['telefono'] = 'telefono_contacto LIKE "'. $_POST['telefono'] . '%"';

    if(! EMPTY($_POST['estado']) && $_POST['estado'] != 'defecto')
            $condiciones['estado'] = 'estado LIKE "' . $_POST['estado'] . '"';	

    return  implode(' AND ', $condiciones);	
}

/**
 * Función que devuelve un operador de condición correspondiente a un texto
 * @param String $textoOperador Texto del operador
 * @return string Operador
 */
function GetOperador($textoOperador){

    switch ($textoOperador){
        case 'mayor':{
            return '>';
            break;
        }
        
        case 'mayorigual':{
            return '>=';
            break;
        }
        
        case 'menor':{
            return '<';
            break;
        }
        
        case 'menorigual':{
            return '<=';
            break;
        }
        
        case 'igual':{
            return '=';
            break;
        }
        
        default : {
            return 'error';
            break;        
        }
    }
}

/**
 * Función que cambia el formato de un fecha, de dd-mm-aaa a yyyy-mm-dd
 * @param String $fecha Fecha a convertir
 * @return DateTime Fecha Cambiada
 */
function CambiaFormatoFecha($fecha){

    $date= new Datetime($fecha);//Convierte a datetime

    return date_format($date, 'Y-m-d');

}

