<html>
	<head>
		<meta charset="UTF-8">
		<title>vista LISTA</title>
		
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
		
		<link rel="stylesheet" type="text/css" href="../../assets/css/estilos_alta.css">
	</head>
	<body>
		<div class="row">
		<div class="col-xs-12">
		<div class="table-responsive ">
		
			<table class="table table-hover table-striped table-bordered">
  			
	  			<tbody>

	  				<tr>
	  					<th>#</th>
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
		</div>
		</div>
		</div>
	</body>
</html>
