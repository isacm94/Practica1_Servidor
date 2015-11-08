<html>
	<head>
		<meta charset="UTF-8">
		<title>Buscar Tarea</title>
		
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
		
		<link rel="stylesheet" type="text/css" href="../../assets/css/estilos_alta.css">
	</head>
	<body>
		<br><br>

		<form action="" class="form-group" method="POST">
				
			<div class="container">
				<div class="panel panel-default">
					<div class="panel-heading"><h3 class="list-group-item-heading"><b>Buscar Tarea</b></h3></div>

					<div class="panel-body">
						
						<div class="row">
							<!-- 1ª COLUMNA -->
							<div class="col-md-2">

								<div class="form-group">
								
								    <p>
								    	<p><b>Fecha Creación</b></p>
								    
								    	<p><?php echo CreaSelect('fechaC_operador', $opciones_fecha,' style=" width: 70px;" ')?></p>
									</p>

								    <input type="text" class="form-control" placeholder="dd-mm-yyyy" name="fecha_creacion" value="<?=ValorPost('fecha_creacion')?>">
								 </div>

							</div>
							
							<!-- 2ª COLUMNA -->
							<div class="col-md-2">

								<div class="form-group">
								
								    <p>
								    	<p><b>Fecha Realización</b></p>
								    
								    	<p><?php echo CreaSelect('fechaR_operador', $opciones_fecha, ' style=" width: 70px;" ')?></p>
									</p>

								    <input type="text" class="form-control" placeholder="dd-mm-yyyy" name="fecha_realizacion" value="<?=ValorPost('fecha_realizacion')?>">
								 </div>

							</div>
							
							<!-- 3ª COLUMNA -->
							<div class="col-md-4">
								<div class="form-group">
									<p>
								    	<p><b>Estado</b></p>
								  		<p><?= CreaRadioBuscar('estado', array('pendiente' => 'Pendiente', 'realizada' => 'Realizada', 'cancelada' => 'Cancelada'));?></p>
									</p>
								</div>								
							</div>
							
							<!-- 4ª COLUMNA -->
							<div class="col-md-2">

								<div class="form-group">
									<p>
								    	<p><b>Provincia</b></p>
								  		<p><?php echo CreaSelectCon1ValorVacio('provincia', $Provincias, $valorDefecto='Elige una provincia', '')?>	</p>
									</p>
								</div>							
														
							</div>	

							<!-- 5ª COLUMNA -->
							<div class="col-md-2">
								
								<div class="form-group">
									<p>
								    	<p><b>Teléfono</b></p>
								  		<p><input type="text" class="form-control" placeholder="Teléfono" name="telefono" value="<?=ValorPost('telefono')?>">	</p>
									</p>
								</div>							
														
							</div>					
						</div><!-- fin row -->
						
						<?php 
							if(! empty($errores))
								MuestraError($errores);
						?>

						<!-- BOTON BUSCAR -->
								<p>
									<button type="submit" class="btn btn-block btn-comun"><span class="glyphicon glyphicon-search"></span> Búsqueda</button>
								</p>
					</div><!-- fin panel-body -->
				</div> <!-- fin panel-default -->
			</div><!-- fin container -->
		</form> 

	</body>
</html>
