<?php
include_once 'help_lista.php'; //funciones

//define('APPVIEW', __DIR__.'\\..\\views\\');
define('APPCTRL', __DIR__);//directorio actual
define('APPMOD', __DIR__.'\\..\\models\\');

//Incluir modelo
include_once APPMOD.'tareas.php';
include_once APPMOD.'provincias.php';

//PAGINACIÓN

// Ruta URL desde la que ejecutamos el script
$myURL='lista.php'; 


$nElementosxPagina = 10;

// Calculamos el n�mero de p�gina que mostraremos
if (isset($_GET['pag']))
{
	// Leemos de GET el n�mero de p�gina
	$nPag = $_GET['pag'];
}
else 
{
	// Mostramos la primera p�gina
	$nPag = 1;
}

// Calculamos el registro por el que se empieza en la sentencia LIMIT
$nReg = ($nPag-1) * $nElementosxPagina;
 
$tareas = array();
$tareas = GetTareas($nReg, $nElementosxPagina);


$totalRegistros = GetNumRegistrosTareas();

$totalPaginas = $totalRegistros/$nElementosxPagina;

if(is_float($totalPaginas))
	$totalPaginas++;

echo "<p>Nº Registros: $totalRegistros</p>";

//Muestra Formulario lista
include_once '\\..\\views\\lista.php'; 

MuestraPaginador($nPag, $totalPaginas, $myURL);


// -----------------------------------------------------------------------

/**
 * Muestra un paginador para una lista de elementos
 * 
 * @param int $pag_actual
 * @param unknown $nPags
 * @param unknown $url
 */
function MuestraPaginador($pag_actual, $nPags, $url)
{
	// Mostramos paginador
	echo '<div style="text-align=center">';
		echo EnlaceAPagina($url, 1, 'Inicio');
		echo EnlaceAPagina($url, $pag_actual-1, 'Anterior ', $pag_actual>1);
		
			
		echo EnlaceAPagina($url, $pag_actual+1, 'Siguiente', $pag_actual<$nPags);
		echo EnlaceAPagina($url, $nPags, 'Fin');
		
		echo '<br>'; //Siguiente linea
		for($pag=1; $pag<=$nPags; $pag++)
		{
			echo EnlaceAPagina($url, $pag, $pag, $pag_actual!=$pag);
		}
	echo "</div>";
}

/**
 * Devuelve el texto de un enlace (etiqueta <a>) a la p�gina $url si el enlace est� activo,
 * en otro caso solo devuelve el texto 
 * 
 * @param string $url		URL de la p�gina que muestra la lista
 * @param int $pag			N� de p�gina al cual enlazamos
 * @param string $texto		Texto del enlace
 * @param bool $activo		Se muestra enlace (true) o no (false)	
 * @return string
 */
function EnlaceAPagina($url, $pag, $texto, $activo=true)
{
	if ($activo)
		return '  <a href="'.$url.'?pag='.$pag.'">'.$texto.'</a>  ';
	else 
		return $texto;
}
