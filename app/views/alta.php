
		<div class="container">		
					
			<div class="row">
				<!-- 1ª COLUMNA -->
				<div class="col-md-1">
				</div>
				<!-- 2ª COLUMNA -->
				<div class="col-md-10">
					
					<div class="panel panel-default">

						<div class="panel-heading"><h3 class="list-group-item-heading"><b>Añadir Tarea</b></h3></div>

						<div class="panel-body">
						
							<form class="form-horizontal" action="index.php?ctrl=alta" method="POST">
								
								
								<div class="row">
									<div class="col-md-11">								
										<div class="form-group">
								        <label class="control-label col-xs-3">Descripción:</label>
								        <div class="col-xs-9">
								            <textarea rows="3" class="form-control" placeholder="Introduce la Descripción" name="descripcion"><?=ValorPost('descripcion')?></textarea>
											<?=VerError('descripcion', $errores)?>
										</div>
								    	</div>
								    </div>
								</div>
							

								<div class="row">
									<div class="col-md-4" style="margin: 5px;">
							    		<div class="form-group">
									        <label>Persona de Contacto:</label>

								            <input type="text" class="form-control" placeholder="Persona de Contacto" name="personaContacto" value="<?=ValorPost('personaContacto')?>">
											<?=VerError('personaContacto', $errores)?>										 
							    		</div>
							    	</div>

							    	<div class="col-md-3" style="margin: 5px;">
							    		<div class="form-group">
									        <label>Telefono de Contacto:</label>

									        <input type="tel" class="form-control" placeholder="Telefono de Contacto" name="telefonoContacto" value="<?=ValorPost('telefonoContacto')?>">
									        <?=VerError('telefonoContacto', $errores)?>			        
									              
									    </div>
							    	</div>
									
									<div class="col-md-4" style="margin: 5px;">										
										<div class="form-group">
									        <label>Correo de Contacto: </label>

								            <input type="email" class="form-control" placeholder="Correo de Contacto" name="correoContacto" value="<?=ValorPost('correoContacto')?>">
											<?=VerError('correoContacto', $errores)?>											
									    </div>								
									</div>

							    </div>
								
							    
							    
							    
							    
							    
							    <div class="form-group">
							        <label class="control-label col-xs-3">Dirección:</label>
							        <div class="col-xs-9">
							            <input type="text" class="form-control" placeholder="Introduce una Dirección" name="direccion" value="<?=ValorPost('direccion')?>">
							        </div>
							    </div>
							    
							    <div class="form-group">
							        <label class="control-label col-xs-3">Población:</label>
							        <div class="col-xs-9">
							            <input type="text" class="form-control" placeholder="Introduce la Población" name="poblacion" value="<?=ValorPost('direccion')?>">
							        </div>
							    </div>
							    
							    <div class="form-group">
							        <label class="control-label col-xs-3">Código Postal:</label>
							        <div class="col-xs-9">
							            <input type="text" class="form-control" placeholder="Introduce el CP" name="cp" value="<?=ValorPost('cp')?>" maxlength="5" >
							            <?=VerError('cp', $errores)?>
							        </div>
							    </div>
							    
							    <!-- HACER SELECT CON PROVINCIAS -->
							     <div class="form-group">
							        <label class="control-label col-xs-3">Provincia:</label>
							        <div class="col-xs-9">
							    		<?php echo CreaSelect('provincia', $Provincias)?>		
							   		</div>
							    </div>
							    
							    <div class="form-group">
							        <label class="control-label col-xs-3">Fecha Realización:</label>
							        <div class="col-xs-9">
							            <input type="text" class="form-control" placeholder="dd-mm-aaaa" name="fechaRealizacion" value="<?=ValorPost('fechaRealizacion')?>">
							            <?=VerError('fechaRealizacion', $errores)?>
							            <?=VerError('fechaRealizacionVacia', $errores)?>
							        </div>
							    </div>
							    
							    <div class="form-group">
							        <label class="control-label col-xs-3">Anotaciones Anteriores:</label>
							        <div class="col-xs-9">
							            <textarea rows="3" class="form-control" placeholder="Anotaciones Anteriores" name="anotacionesAnte"><?=ValorPost('anotacionesAnte')?></textarea>
							        </div>
							    </div>
							    
							    <br>
							    
							    <div class="form-group">
							        <div class="col-xs-offset-3 col-xs-9">
							            <input type="submit" class="btn btn-comun"value="Enviar">
							        </div>
							    </div>
							</form>
						</div><!-- fin panel body-->
					</div><!-- fin panel panel-default -->
				</div><!-- fin 2ª columna -->
				<!-- 3ª COLUMNA -->
				<div class="col-md-1"></div>
			</div> <!--Fin row-->

		</div><!--fin container-->

