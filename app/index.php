<?php
//Mostrar todos los errores
error_reporting(E_ALL);
ini_set('display_errors', '1');

session_start();

// definimos constantes que facilitan el trabajo
define('CTRL_PATH', __DIR__.'/controllers/');
define('MODEL_PATH', __DIR__.'/models/');
define('VIEW_PATH', __DIR__.'/views/');
define('TEMPLATE_PATH', __DIR__.'/plantilla/');
define('HELP_PATH', __DIR__.'/helpers/');

if(! file_exists('config.php')){
    include(TEMPLATE_PATH.'cabecera.php');

    echo '<header style="color: black;">';
        include(CTRL_PATH.'setup.php');
    echo '</header>';

    include(TEMPLATE_PATH.'pie.php');
}
else {

    /*Incluimos el fichero de la clase*/
    include_once '../install/classdb.php';

    include(TEMPLATE_PATH.'cabecera.php'); 
    ?>
    <!-- Cuerpo -->
    
        <?php

                // Cuerpo del controlador frontal
                $ctrl = isset($_GET['ctrl']) ? $_GET['ctrl'] : 'principal';

                // Nombre del fichero a incluir
                $file = CTRL_PATH.$ctrl.'.php';
                if (file_exists($file))
                {
                    //echo $file;
                    include_once($file);
                }
                else
                {   // Error 404
                    include_once(CTRL_PATH.'error404.php');
                }
        ?>
    </header> 
    <?php 
    include(TEMPLATE_PATH.'pie.php');
   
}
 ?>