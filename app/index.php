<?php
// definimos constantes que facilitan el trabajo
define('CTRL_PATH', __DIR__.'/controllers/');
define('MODEL_PATH', __DIR__.'/models/');
define('VIEW_PATH', __DIR__.'/views/');
define('TEMPLATE_PATH', __DIR__.'/plantilla/');
define('HELP_PATH', __DIR__.'/helpers/');

include(TEMPLATE_PATH.'cabecera.php'); 
?>
<!-- Cuerpo -->
<!-- <header style="background-color: white; color: black;"> -->
<header style="color: black;">
<!-- 
	<div class="container">
		<div class="row"> -->
			<!--  <div class="col-lg-12">-->
				<?php
				 
					// Cuerpo del controlador frontal
					$ctrl=isset($_GET['ctrl']) ? $_GET['ctrl'] : 'principal';
					
					// Nombre del fichero a incluir
					$file=CTRL_PATH.$ctrl.'.php';
					if (file_exists($file))
					{
					    include($file);
					}
					else
					{   // Error 404
					    include(CTRL_PATH.'error404.php');
					}
				?>
			<!-- </div> 
    	</div>
	</div>-->
</header> 
<?php 
include(TEMPLATE_PATH.'pie.php');
?>
