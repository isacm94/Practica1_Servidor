<?php
//session_start();

// definimos constantes que facilitan el trabajo
define('CTRL_PATH', __DIR__.'/controllers/');
define('MODEL_PATH', __DIR__.'/models/');
define('VIEW_PATH', __DIR__.'/views/');
define('TEMPLATE_PATH', __DIR__.'/plantilla/');
define('HELP_PATH', __DIR__.'/helpers/');

include(TEMPLATE_PATH.'cabecera.php'); 
?>
<!-- Cuerpo -->
<header style="color: black;">
    <?php

            // Cuerpo del controlador frontal
            $ctrl=isset($_GET['ctrl']) ? $_GET['ctrl'] : 'principal';

            // Nombre del fichero a incluir
            $file=CTRL_PATH.$ctrl.'.php';
            if (file_exists($file))
            {
                    echo $file;
                include($file);
            }
            else
            {   // Error 404
                include(CTRL_PATH.'error404.php');
            }
    ?>
</header> 
<?php 
include(TEMPLATE_PATH.'pie.php');
?>
