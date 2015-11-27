<?php
function CreaRadioBuscar($name, $values){
	
	$html = '';
	
	$numRespuestas = count($values);
		
	foreach ($values as $key => $text) {	
		$html.= '<label class="radio-inline">';
			$html.= '<input type="radio" name="'.$name.'" value="'.$key.'" ';
			$html.= CheckIfValue($name, $key);
		$html.='>'.$text.'</label>';
	}
	
	return $html;
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
function CreaSelectCon1ValorVacio($name, $opciones, $valorDefecto='', $tamanho='')
{ 	
	$valorElegido = '';

	if(isset($_POST[$name]))
		$valorElegido = $_POST[$name];

	$html="\n".'<select class="form-control" name="'.$name.'" '.$tamanho.' >';

	$html.= "\n\t<option value='defecto' selected></option>";

	foreach($opciones as $key=>$text)
	{
		//if ($key == $valorDefecto)	
		if($valorElegido == $key)		
			$select ='selected="selected"';
		
		else
			$select="";

		$html.= "\n\t<option value=$key $select>$text</option>";
	}
	$html.="\n</select>";

	return $html;
}

function MuestraError($errores){

	echo '<div class="alert alert-danger">';

	foreach ($errores as $key => $value) {
		echo "<b>¡Error!</b> $value<br>";
	}

	echo '</div>';
}

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

function GetOperador($textoOperador){

	if($textoOperador == 'mayor')
		return '>';
	if($textoOperador == 'mayorigual')
		return '>=';
	if($textoOperador == 'menor')
		return '<';
	if($textoOperador == 'menorigual')
		return '<=';
	if($textoOperador == 'igual')
		return '=';
}

function CambiaFormatoFecha($fecha){

	$date= new Datetime($fecha);

	return date_format($date, 'Y-m-d');

}

