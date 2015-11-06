<?php
include_once "helps.php";

$opciones_fecha = Array(
							'mayor' => '>',
							'mayorigual' => '>=',
							'menor' => '<',
							'menorigual' => '<=',
							'igual' => '=');

if(! $_POST){
	include_once "\\..\\views\\buscar.php";
}
else{
	include_once "\\..\\views\\buscar.php";
}