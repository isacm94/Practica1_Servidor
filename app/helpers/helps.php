<?php

/**
 * Función que comprueba que el formato de teléfono sea correcto.
 * El teléfono debe empezar por 9, 8, 6 o 7 seguidor de 8 dígitos del 0 al 9
 * @param String $telefono Número de teléfono
 * @return boolean True si el formato es correcto
 */
function FormatoCorrectoTelefono($telefono){
	
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
 * @return Array Tarea
 */
function CreaArrayTarea() {
    
    $dateRealizacion = new Datetime($_POST['fechaRealizacion']);//Convierte a datetime
    
    $tarea = array(/* 'id'=> '', AUTONUMERICO */
        'descripcion' => $_POST['descripcion'],
        'persona_contacto' => $_POST['personaContacto'],
        'telefono_contacto' => $_POST['telefonoContacto'],
        'correo_contacto' => $_POST['correoContacto'],
        'direccion' => $_POST['direccion'],
        'poblacion' => $_POST['poblacion'],
        'cp' => $_POST['cp'],
        'tbl_provincias_cod' => $_POST['provincia'],
        'estado' => 'Pendiente', /* la tarea empieza en pendiente */
        'operario_encargado' =>  null, //no se asigna el operario en alta, sería en modficiar
        'fecha_realizacion' => date_format($dateRealizacion, 'Y-m-d'),
        'anotaciones_anteriores' => $_POST['anotacionesAnte'],
        'anotaciones_posteriores' => null
    );

    return $tarea;
}

//vista MODIFICAR
function CreaRadio($name, $values, $id) {

    $valorGuardado = CargaDatos($id, $name);

    $html = '';

    $numRespuestas = count($values);

    foreach ($values as $key => $value) {
        $html.= '<label class="radio-inline">';
        $html.= '<input type="radio" name="' . $name . '" value="' . $key . '" ';
        $html.= CheckIfValue($name, $key);
        $html.= $value == $valorGuardado ? ' checked ' : '';
        $html.='>' . $value . '</label>';
    }

    return $html;
}

//radioButton
function CheckIfValue($nombreCampo, $valor) {
    if (isset($_POST[$nombreCampo]) && $_POST[$nombreCampo] == $valor) {
        return ' checked ';
    } else {
        return '';
    }
}

//Carga los datos correspondiente en el formulario de modificar
function CargaDatos($id, $name) {

    $tarea = GetUnaTarea($id);


    if ($name == 'fecha_realizacion') {
        $dateRealizacion = new Datetime($tarea[0][$name]);
        return date_format($dateRealizacion, 'd-m-Y');
    } else
        return $tarea[0][$name];
}
