<html>
	<head>
		<meta charset="UTF-8">
		<title>Lista de Tareas</title>
		
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
		
		<link rel="stylesheet" type="text/css" href="../../assets/css/estilos_paginador.css">
	</head>
	<body>
		<div>
			<div class="col-xs-12">

				<?php 
					if(EMPTY($tareas))
						include_once 'noexistendatos.php';
					else {

				?>
				<div class="table-responsive ">
					<br>
				
					<table class="table table-hover table-striped table-bordered">
		  			
			  			<tbody>

			  				<tr>
			  					<th>#ID</th>
			  					<th>Descripción</th>
			  					<th>Persona</th>
			  					<th>Teléfono</th>
			  					<th>Correo</th>
			  					<th>Dirección</th>
			  					<th>Población</th>
			  					<th>CP</th>
			  					<th>Provincia</th>
			  					<th>Estado</th>
			  					<th>Fecha Creación</th>
			  					<th>Operario</th>
			  					<th>Fecha Realización</th>
			  					<th>Anotaciones Anteriores</th>
			  					<th>Anotaciones Posteriores</th>
			  					<th>Opciones</th>
			  				</tr>

			  				<?=EscribeTarea(GetTareas($nReg, $nElementosxPagina))?>
			  				
			  			</tbody>

		  			</table>
				</div><!-- Fin div table-responsive -->

				<?php } /*Fin ELSE*/?>
				<br>
			</div><!-- Fin div col-xs-12 -->
		</div><!-- Fin div-->

	</body>
</html>
