<?php
/**
 * CONTROLADOR de listar tareas
 */
include_once HELP_PATH . 'help_paginacion.php';

if (!isset($_SESSION['loginok'])) {

    include_once CTRL_PATH . 'login.php';
} else {
    include_once HELP_PATH . 'help_lista.php';

    //Incluir modelo
    include_once MODEL_PATH . 'tareas.php';
    include_once MODEL_PATH . 'provincias.php';

    //PAGINACIÓN
    // Ruta URL desde la que ejecutamos el script
    $myURL = '?ctrl=lista&'; //Con contralador frontal

    $nElementosxPagina = 10;

    // Calculamos el número de página que mostraremos
    if (isset($_GET['pag'])) {
        // Leemos de GET el número de página
        $nPag = $_GET['pag'];
    } else {
        // Mostramos la primera página
        $nPag = 1;
    }

    // Calculamos el registro por el que se empieza en la sentencia LIMIT
    $nReg = ($nPag - 1) * $nElementosxPagina;

    $tareas = array();
    $tareas = GetTareas($nReg, $nElementosxPagina);

    $totalRegistros = GetNumRegistrosTareas();

    $totalPaginas = $totalRegistros / $nElementosxPagina;

    if (is_float($totalPaginas)) {
        $totalPaginas = intval($totalPaginas);
        $totalPaginas++;
    }

    //Muestra Vista lista
    include_once VIEW_PATH . 'lista.php';
}