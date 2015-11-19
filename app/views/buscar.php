
	<div class="container">
		<form action="" class="form-group" method="POST">
				
			
			<div class="panel panel-default">
				<div class="panel-heading"><h3 class="list-group-item-heading"><b>Buscar Tarea</b></h3></div>

				<div class="panel-body">
					
					<div class="row">
						<!-- 1ª COLUMNA -->
						<div class="col-md-2">

							<div class="form-group">
							
							    <p>
							    	<p style="font-size: 14pt;"><b>Fecha Creación</b></p>
							    
							    	<p><?php echo CreaSelect('fechaC_operador', $opciones_fecha,' style=" width: 90px;" ')?></p>
								</p>

							    <input type="text" class="form-control" placeholder="dd-mm-yyyy" name="fecha_creacion" value="<?=ValorPost('fecha_creacion')?>">
							 </div>

						</div>
						
						<!-- 2ª COLUMNA -->
						<div class="col-md-2">

							<div class="form-group">
							
							    <p>
							    	<p style="font-size: 14pt;"><b>Fecha Realización</b></p>
							    
							    	<p><?php echo CreaSelect('fechaR_operador', $opciones_fecha, ' style=" width: 90px;" ')?></p>
								</p>

							    <input type="text" class="form-control" placeholder="dd-mm-yyyy" name="fecha_realizacion" value="<?=ValorPost('fecha_realizacion')?>">
							 </div>

						</div>
						
						<!-- 3ª COLUMNA -->
						<div class="col-md-4">
							<div class="form-group">
								<p>
							    	<p style="font-size: 14pt;"><b>Estado</b></p>
							  		<p><?= CreaRadioBuscar('estado', array('pendiente' => 'Pendiente', 'realizada' => 'Realizada', 'cancelada' => 'Cancelada'));?></p>
								</p>
							</div>								
						</div>
						
						<!-- 4ª COLUMNA -->
						<div class="col-md-2">
							<div class="form-group">
								<p>
							    	<p style="font-size: 14pt;"><b>Provincia</b></p>
							  		<p><?php echo CreaSelectCon1ValorVacio('provincia', $Provincias, $valorDefecto='Elige una provincia', '')?>	</p>
								</p>
							</div>							
													
						</div>	

						<!-- 5ª COLUMNA -->
						<div class="col-md-2">
							
							<div class="form-group">
								<p>
							    	<p style="font-size: 14pt;"><b>Teléfono</b></p>
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
	</form> 
</div><!-- fin container -->

