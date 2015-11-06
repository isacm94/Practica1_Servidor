<html>
	<head>
		<meta charset="UTF-8">
		<title>vista Buscar</title>
		
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
		
		<link rel="stylesheet" type="text/css" href="../../assets/css/estilos_alta.css">
	</head>
	<body>
		<br><br>

		<form action="" class="form-group" method="POST">
				
			<div class="container">
				<div class="panel panel-default">
					<div class="panel-heading">Buscar</div>

					<div class="panel-body">
						
						<div class="row">
							<!-- 1ª COLUMNA -->
							<div class="col-md-3">

								<div class="form-group">

								    <p>
								    	<p><b>Fecha Creación</b></p>
								    </p>
								    	<p><?php echo CreaSelect('fecha_creacion', $opciones_fecha, $valorDefecto='',' style=" width:60px;" ')?>
									

								    <input type="text" class="form-control" placeholder="dd-mm-yyyy" name="fecha_creacion" style="width: 103px;"></p>
								 </div>

							</div>
							
							<!-- 2ª COLUMNA -->
							<div class="col-md-3">

								<div class="form-group">
								
								    <p>
								    	<p><b>Fecha Realización</b></p>
								    
								    	<p><?php echo CreaSelect('fecha_realizacion', $opciones_fecha, $valorDefecto='',' style=" width:60px;" ')?></p>
									</p>

								    <input type="text" class="form-control" placeholder="dd-mm-yyyy" name="fecha_realizacion">
								 </div>

							</div>
							
							<!-- 3ª COLUMNA -->
							<div class="col-md-3">
								<div class="form-group">
									<p>
								    	<p><b>Estado</b></p>
								  		<p><input type="text" class="form-control" placeholder="Estado" name="estado"></p>
									</p>
								</div>								
							</div>
							
							<!-- 4ª COLUMNA -->
							<div class="col-md-3">
								<div class="form-group">
									<p>
								    	<p><b>Provincia</b></p>
								  		<p><input type="text" class="form-control" placeholder="Provincia" name="provincia"></p>
									</p>
								</div>		
								
								<!-- BOTON BUSCAR -->
								<p>
									<button type="button" class="btn btn-comun"><span class="glyphicon glyphicon-search"></span> Buscar</button>
								</p>						
							</div>						
						</div><!-- fin row -->

					</div><!-- fin panel-body -->
				</div> <!-- fin panel-default -->
			</div><!-- fin container -->
		</form> 

	</body>
</html>
