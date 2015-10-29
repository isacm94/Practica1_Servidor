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

	$dia = $array_fecha[DIA];
	$mes = $array_fecha[MES];
	$year = $array_fecha[YEAR];
	
	return checkdate($mes, $dia, $year);	 	
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
