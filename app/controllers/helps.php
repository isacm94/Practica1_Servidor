<?php

function FormatoCorrectoTelefono($telefono){
	
	$telefono = str_replace (' ' , '', $telefono); //devuelve cadena sin espacios
	$telefono = str_replace ('-' , '', $telefono); //devuelve cadena sin guiones

	$expresion = '/^[9|8|6|7][0-9]{8}$/'; //formato español
	
	if(preg_match($expresion, $telefono)){
		return TRUE;
	}
	else{ 
		return FALSE;
	} 
 
}

function FormatoCorrectoCorreo($correo){

	if(filter_var($correo, FILTER_VALIDATE_EMAIL))
		return TRUE;
	
	else
		return FALSE;
	
}

function FormatoCorrectoCP($cp)
{	
	$patron =  '/^[0-9]{5}$/'; //solo 5 números
	
	if (preg_match($patron, $cp)) 
		return TRUE;	
	else
		return FALSE;
}

function FormatoFechaCorrecto($fecha){

	define('DIA', 0);
	define('MES', 1);
	define('YEAR', 2);

	$array_fecha = explode("-", $fecha);

	if (count($array_fecha)!= 3)
		return FALSE;
	else {
	$dia = $array_fecha[DIA];
	$mes = $array_fecha[MES];
	$year = $array_fecha[YEAR];
	
	return checkdate($mes, $dia, $year);	 }	
}
function FechaCorrecta($fecha){
	
	if(FormatoFechaCorrecto($fecha))//si el formato es correcto, comprobamos que la fecha de realización sea posterior a la de hoy
	{
		if(strtotime($fecha) > strtotime(date('d-m-Y')))//la fecha es correcta
			return TRUE;
		else
			return FALSE;
	}	
	else 
		return FALSE;
}

function ValorPost($nombreCampo, $valorPorDefecto='')
{
	if (isset($_POST[$nombreCampo]))
		return $_POST[$nombreCampo];
		else
			return $valorPorDefecto;
}

function VerError($campo, $errores){

	if(isset($errores[$campo])){
		echo '<div class="alert alert-danger">';
			echo '<strong>¡Error! </strong>'.$errores[$campo];
		echo '</div>';
	}
}
/**
 *
 * @param string $name Nombre del campo
 * @param array $opciones Opciones que tiene el select
 * 			clave array=valor option
 * 			valor array=texto option
 * @param string $valorDefecto Valor seleccionado
 * @return string
 */
function CreaSelect($name, $opciones, $valorDefecto='', $tamanho='')
{ 	

	$html="\n".'<select class="form-control" name="'.$name.'" '.$tamanho.' >';

	foreach($opciones as $key=>$text)
	{
		if ($key == $valorDefecto)			
			$select ='selected="selected"';
		
		else
			$select="";
		$html.= "\n\t<option value=$key $select>$text</option>";
	}
	$html.="\n</select>";

	return $html;
}

function CreaArrayTarea($descripcion, $pc, $tc, $correo, $dir, $pob, $cp, $codProvincia, $estado, 
			 $operario, $fR, $anotAnt, $anotPost){

	//CAMBIAR LOS NOMBRES DE LOS CAMPOS en el array y ponerlo ogial q en la bd
	$tarea = array(/*'id'=> '', AUTONUMERICO*/					
				   'descripcion' => $descripcion, 
				   'persona_contacto'=> $pc, 
				   'telefono_contacto'=> $tc, 
				   'correo_contacto' => $correo, 
				   'direccion'=> $dir, 
				   'poblacion'=> $pob, 
				   'cp' => $cp, 
				   'tbl_provincias_cod' => $codProvincia,
				   'estado' => $estado, /*la tarea empieza en pendiente*/
			       'operario_encargado' => $operario,//no se asigna el operario en alta, sería en modficiar
				   'fecha_realizacion' => $fR,
				   'anotaciones_anteriores'=> $anotAnt,
				   'anotaciones_posteriores'=> $anotPost				   
	);
	
	return $tarea;
}

//vista MODIFICAR
function CreaRadio($name, $values, $id){
	
	$valorGuardado = CargaDatos($id, $name);
	

	$html = '';
	
	$numRespuestas = count($values);
		
	foreach ($values as $key => $value) {	
		$html.= '<label class="radio-inline">';
			$html.= '<input type="radio" name="'.$name.'" value="'.$key.'" ';
			$html.= CheckIfValue($name, $key);
			$html.= $value == $valorGuardado ? ' checked ' : '';
		$html.='>'.$value.'</label>';
	}
	
	return $html;
}

//radioButton
function CheckIfValue($nombreCampo, $valor)
{
	if (isset($_POST[$nombreCampo]) && $_POST[$nombreCampo]==$valor )
	{
		return ' checked ';
	}
	else
	{
		return '';
	}
}

//Carga los datos correspondiente en el formulario de modificar
function CargaDatos($id, $name){
	
	$tarea = GetUnaTarea($id);


	if($name == 'fecha_realizacion'){
		$dateRealizacion = new Datetime($tarea[0][$name]);
		return date_format($dateRealizacion, 'd-m-Y');
	}
	else
		return $tarea[0][$name];
}