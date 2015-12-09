<?php
/**
 * HELP funciones usadas añadir y modificar un usuario
 */

/**
 * Función que comprueba que el formato de teléfono sea correcto.
 * El teléfono debe empezar por 9, 8, 6 o 7 seguidor de 8 dígitos del 0 al 9
 * @param String $telefono Número de teléfono
 * @return boolean True si el formato es correcto
 */
function FormatoCorrectoTelefono($telefono) {

    $telefono = str_replace(' ', '', $telefono); //devuelve cadena sin espacios
    $telefono = str_replace('-', '', $telefono); //devuelve cadena sin guiones

    $expresion = '/^[9|8|6|7][0-9]{8}$/'; //formato español

    if (preg_match($expresion, $telefono)) {
        return TRUE;
    } else {
        return FALSE;
    }
}

/**
 * Función que comprueba si una dirección de email/correo es correcta
 * @param String $correo Email/correo a comprueba
 * @return boolean True si es correcto
 */
function FormatoCorrectoCorreo($correo) {

    if (filter_var($correo, FILTER_VALIDATE_EMAIL))
        return TRUE;
    else
        return FALSE;
}

/**
 * Funció que comprueba que el código postal tenga 5 números
 * @param String $cp Código Postal
 * @return boolean True si es correcto
 */
function FormatoCorrectoCP($cp) {
    $patron = '/^[0-9]{5}$/'; //solo 5 números

    if (preg_match($patron, $cp))
        return TRUE;
    else
        return FALSE;
}

/**
 * Función que comprueba que si la fecha tiene el formato correcto sea mayor a la actual
 * @param String $fecha Fecha a comprobar
 * @return boolean True si es correcto
 */
function FechaCorrecta($fecha) {

    if (FormatoFechaCorrecto($fecha)) {//si el formato es correcto, comprobamos que la fecha de realización sea posterior a la de hoy
        if (strtotime($fecha) > strtotime(date('d-m-Y')))//la fecha es correcta
            return TRUE;
        else
            return FALSE;
    } else
        return FALSE;
}

/**
 * Función que comprueba que el formato de una fecha sea correecto
 * Formato --> dd-mm-aaaa
 * @param String $fecha Fecha a comprobar
 * @return boolean True si es correcto
 */
function FormatoFechaCorrecto($fecha) {
    $DIA = 0;
    $MES = 1;
    $YEAR = 2;

    $array_fecha = explode("-", $fecha);

    if (count($array_fecha) != 3)
        return FALSE;

    else {
        $dia = $array_fecha[$DIA];
        $mes = $array_fecha[$MES];
        $year = $array_fecha[$YEAR];

        return checkdate($mes, $dia, $year);
    }
}

/**
 * Función que devuelve el valor de un campo si ha sido introducido anteriormente
 * @param String $nombreCampo Atributo 'name' del campo
 * @param String $valorPorDefecto Valo vacío
 * @return String Vacío o valor del campo
 */
function ValorPost($nombreCampo, $valorPorDefecto = '') {
    if (isset($_POST[$nombreCampo]))
        return $_POST[$nombreCampo];
    else
        return $valorPorDefecto;
}

/**
 * Función que muestra un mensaje si se ha producido un error en un campo
 * @param String $campo Nombre del campo, atributo 'name'
 * @param Array $errores Errores producidos
 */
function VerError($campo, $errores) {

    if (isset($errores[$campo])) {
        echo '<div class="alert alert-danger">';
        echo '<strong>¡Error! </strong>' . $errores[$campo];
        echo '</div>';
    }
}

/**
 * Función que crea una lista desplegable
 * @param String $name Nombre del campo
 * @param Array $opciones Opciones que tiene el select
 * 			clave array=valor option
 * 			valor array=texto option
 * @param String $valorDefecto Valor seleccionado
 * @return String HTML generado
 */
function CreaSelect($name, $opciones, /* $valorDefecto='', */ $tamanho = '') {
    //Para guardar el valor si se ha elegido anteriormente
    $valorElegido = '';
    if (isset($_POST[$name]))
        $valorElegido = $_POST[$name];

    $html = "\n" . '<select class="form-control" name="' . $name . '" ' . $tamanho . ' >';

    foreach ($opciones as $key => $text) {
        //if ($key == $valorDefecto)	
        if ($valorElegido == $key)
            $select = 'selected="selected"';
        else
            $select = "";

        $html.= "\n\t<option value=$key $select>$text</option>";
    }
    $html.="\n</select>";

    return $html;
}

/**
 * Función que crea un array con los campos introducidos de Tarea
 * @param String $descripcion Descripción   
 * @param String $pc Persona de Contacto
 * @param String $tc Teléfono de Contacto
 * @param String $correo Correo electrónico
 * @param String $dir Dirección
 * @param String $pob Población
 * @param String $cp Código Postal
 * @param String $codProvincia Código de Provincia
 * @param String $estado Estado
 * @param String $operario Operario Encargado
 * @param String $fR Fecha de Realización
 * @param String $anotAnt Anotaciones Anteriores
 * @param String $anotPost Anotaciones Posteriores
 * @return Array Tarea 
 */
function CreaArrayTarea($descripcion, $pc, $tc, $correo, $dir, $pob, $cp, $codProvincia, $estado, $operario, $fR, $anotAnt, $anotPost) {

    $tarea = array(/* 'id'=> '', AUTONUMERICO */
        'descripcion' => $descripcion,
        'persona_contacto' => $pc,
        'telefono_contacto' => $tc,
        'correo_contacto' => $correo,
        'direccion' => $dir,
        'poblacion' => $pob,
        'cp' => $cp,
        'tbl_provincias_cod' => $codProvincia,
        'estado' => $estado, /* la tarea empieza en pendiente */
        'operario_encargado' => $operario, //no se asigna el operario en alta, sería en modficiar
        'fecha_realizacion' => $fR,
        'anotaciones_anteriores' => $anotAnt,
        'anotaciones_posteriores' => $anotPost
    );

    return $tarea;
}

//vista MODIFICAR

/**
 * Función que crea RadioButtons
 * @param String $name Nombre del campo
 * @param Array $values Datos de los RadioButtons
 * @param String $id ID de la tarea
 * @return String Código HTML generado
 */
function CreaRadio($name, $values, $id) {

    $valorGuardado = CargaDatos($id, $name);

    $html = '';

    $numRespuestas = count($values);

    foreach ($values as $value => $text) {
        $html.= '<label class="radio-inline">';
        $html.= '<input type="radio" name="' . $name . '" value="' . $value . '" ';
        $html.= $text == $valorGuardado ? ' checked ' : '';
        $html.='>' . $text . '</label>';
    }

    return $html;
}

/**
 * Carga los datos guardados en cada input del formulario de modificar
 * @param String $id ID de la tarea
 * @param String $name Nombre del campo
 * @return String Dato del campo
 */
function CargaDatos($id, $name) {

    $tarea = GetUnaTarea($id);

    if ($name == 'fecha_realizacion') {
        $dateRealizacion = new Datetime($tarea[0][$name]);
        return date_format($dateRealizacion, 'd-m-Y');
    } else
        return $tarea[0][$name];
}
