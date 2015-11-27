<?php
include_once HELP_PATH.'help_lista.php';

//Incluir modelo
include_once MODEL_PATH.'buscar.php';
include_once MODEL_PATH.'provincias.php';

//PAGINACIÓN
if($_POST)//Primera vez
     $_SESSION['post'] = $_POST;
else //Resto de veces
     $_POST = $_SESSION['post'];

// Ruta URL desde la que ejecutamos el script
$myURL='?ctrl=buscar&'; 

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
$tareas = GetBusqueda($condicion, $nReg, $nElementosxPagina);

$totalRegistros = GetNumRegistrosBusqueda($condicion);

if($totalRegistros > 0){
	$totalPaginas = $totalRegistros/$nElementosxPagina;

	if(is_float($totalPaginas)){
		$totalPaginas = intval($totalPaginas);
		$totalPaginas++;
	}

	//Muestra Formulario lista
	include_once VIEW_PATH.'paginacion_buscar.php'; 

	
}
else
	include_once VIEW_PATH.'noexistendatos_buscar.php';


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
	echo '<div class="paginador">';
		echo EnlaceAPagina($url, 1, 'Inicio');
		echo EnlaceAPagina($url, $pag_actual-1, 'Anterior', $pag_actual>1);
			//Números Páginas
			for($pag=1; $pag<=$nPags; $pag++)
			{
				echo EnlaceAPagina($url, $pag, $pag, $pag_actual!=$pag);
			}
		echo EnlaceAPagina($url, $pag_actual+1, 'Siguiente', $pag_actual<$nPags);
		echo EnlaceAPagina($url, $nPags, 'Fin');
		
		
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
	switch ($texto) {
		case 'Inicio':{
			if ($activo)
				return ' <a class="btn btn-inicio-fin" href="'.$url.'pag='.$pag.'" title="Página Inicial"><span class="glyphicon glyphicon-backward"></span></a>  ';
			else 
				return ' <a class="btn btn-default"  title="Página Inicial"><span class="glyphicon glyphicon-backward"></span></a>  ';
		}			
		break;
		
		case 'Fin':{
			if ($activo)
				return ' <a class="btn btn-inicio-fin" href="'.$url.'pag='.$pag.'" title="Página Final"><span class="glyphicon glyphicon-forward"></span></a>  ';
			else 
				return ' <a class="btn btn-inicio-fin" title="Página Final"><span class="glyphicon glyphicon-forward"></span></a>  ';
		}			
		break;

		case 'Anterior':{
			if ($activo)
				return ' <a class="btn btn-anterior-siguiente" href="'.$url.'pag='.$pag.'" title="Anterior Página"><span class="glyphicon glyphicon-chevron-left"></span></a>  ';
			else 
				return ' <a class="btn btn-anterior-siguiente" title="Anterior Página"><span class="glyphicon glyphicon-chevron-left"></span></a>  ';
		}			
		break;

		case 'Siguiente':{
			if ($activo)
				return ' <a class="btn btn-anterior-siguiente" href="'.$url.'pag='.$pag.'" title="Siguiente Página"><span class="glyphicon glyphicon-chevron-right"></span></a>  ';
			else 
				return ' <a class="btn btn-anterior-siguiente" title="Siguiente Página"><span class="glyphicon glyphicon-chevron-right"></span></a>  ';
		}			
		break;

		case is_numeric($texto):{ //Números de las paginas
			if ($activo)
				return '  <a class="btn btn-num-paginas" href="'.$url.'pag='.$pag.'">'.$texto.'</a>  ';
			else 
				return '  <a class="btn btn-num-paginas" href="'.$url.'pag='.$pag.'" style="font: bold 15px sans-serif;">'.$texto.'</a>  ';
		}
	    break;

	    default:
	    	return '<h1>ERROR</h1>';
	    	break;
	}
	
}
