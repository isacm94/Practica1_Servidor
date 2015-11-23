			
		<div class="container">		
					
			<div class="row">
				<!-- 1ª COLUMNA -->
				<div class="col-md-1"></div>
				<!-- 2ª COLUMNA -->
				<div class="col-md-10">
					
					<div class="panel panel-default">
						
						<div class="panel-heading"><h3 class="list-group-item-heading"><b>Modificar Tarea</b></h3></div>

						<div class="panel-body">
							
							<form class="form-horizontal" method="POST">
	
								<div class="form-group">
							        <label class="control-label col-xs-3">Descripción:</label>
							        <div class="col-xs-9">
							            <textarea rows="3" class="form-control" placeholder="Introduce la Descripción" name="descripcion"><?=CargaDatos($_GET['id'], 'descripcion')?></textarea>
										<?=VerError('descripcion', $errores)?>
									</div>
							    </div>
								
							    <div class="form-group">
							        <label class="control-label col-xs-3">Persona de Contacto:</label>
							        <div class="col-xs-9">
							            <input type="text" class="form-control" placeholder="Introduce la Persona de Contacto" name="persona_contacto" value="<?=CargaDatos($_GET['id'], 'persona_contacto')?>">
											
										<?=VerError('persona_contacto', $errores)?>			   
								   </div>
							    </div>
							    
							    <div class="form-group">
							        <label class="control-label col-xs-3" >Telefono de Contacto:</label>
							        <div class="col-xs-9">
							            <input type="tel" class="form-control" placeholder="Introduce el Telefono de Contacto" name="telefono_contacto" value="<?=CargaDatos($_GET['id'], 'telefono_contacto')?>">
							        	<?=VerError('telefonoContacto', $errores)?>			        
							        </div>       
							    </div>
							    
							    <div class="form-group">
							        <label class="control-label col-xs-3">Correo de Contacto: </label>
							        <div class="col-xs-9">
							            <input type="email" class="form-control" placeholder="Introduce un Correo de Contacto" name="correo_contacto" value="<?=CargaDatos($_GET['id'], 'correo_contacto')?>">
										<?=VerError('correoContacto', $errores)?>
									</div>
							    </div>
							    
							    <div class="form-group">
							        <label class="control-label col-xs-3">Dirección:</label>
							        <div class="col-xs-9">
							            <input type="text" class="form-control" placeholder="Introduce una Dirección" name="direccion" value="<?=CargaDatos($_GET['id'], 'direccion')?>">
							        </div>
							    </div>
							    
							    <div class="form-group">
							        <label class="control-label col-xs-3">Población:</label>
							        <div class="col-xs-9">
							            <input type="text" class="form-control" placeholder="Introduce la Población" name="poblacion" value="<?=CargaDatos($_GET['id'], 'poblacion')?>">
							        </div>
							    </div>
							    
							    <div class="form-group">
							        <label class="control-label col-xs-3">Código Postal:</label>
							        <div class="col-xs-9">
							            <input type="text" class="form-control" placeholder="Introduce el CP" name="cp" value="<?=CargaDatos($_GET['id'], 'cp')?>" maxlength="5" >
							            <?=VerError('cp', $errores)?>
							        </div>
							    </div>

							    <div class="form-group">
							        <label class="control-label col-xs-3">Provincia:</label>
							        <div class="col-xs-9">
							    		<?php echo CreaSelect('tbl_provincias_cod', $Provincias, CargaDatos($_GET['id'], 'tbl_provincias_cod')) ?>		
							   		</div>
							    </div>
								
								<!--RADIOBUTTON ESTADOS-->
                                                            <div class="form-group">
							        <label class="control-label col-xs-3">Estados:</label>
							        <div class="col-xs-9">
							        	<?= CreaRadio('estado', array('pendiente' => 'Pendiente', 'realizada' => 'Realizada', 'cancelada' => 'Cancelada'), $_GET['id']);?>
									</div>
							    </div>
							    
							    <div class="form-group">
							        <label class="control-label col-xs-3">Operario Encargado</label>
							        <div class="col-xs-9">
							            <input type="text" class="form-control" placeholder="Introduce el Operario Encargado" name="operario_encargado" value="<?=ValorPost('operario_encargado')?>">
							            <?=VerError('operario_encargado', $errores)?>
							        </div>
							    </div>
							    
							    <div class="form-group">
							        <label class="control-label col-xs-3">Fecha Realización:</label>
							        <div class="col-xs-9">
							            <input type="text" class="form-control" placeholder="dd-mm-aaaa" name="fecha_realizacion" value="<?=CargaDatos($_GET['id'], 'fecha_realizacion')?>">
							            <?=VerError('fecha_realizacion', $errores)?>
							            <?=VerError('fechaRealizacionVacia', $errores)?>
							        </div>
							    </div>
							    
							    <div class="form-group">
							        <label class="control-label col-xs-3">Anotaciones Anteriores:</label>
							        <div class="col-xs-9">
							            <textarea rows="3" class="form-control" placeholder="Anotaciones Anteriores" name="anotaciones_anteriores"><?=CargaDatos($_GET['id'], 'anotaciones_anteriores')?></textarea>
							        </div>
							    </div>

							    <div class="form-group">
							        <label class="control-label col-xs-3">Anotaciones Posteriores:</label>
							        <div class="col-xs-9">
							            <textarea rows="3" class="form-control" placeholder="Anotaciones Posteriores" name="anotaciones_posteriores"><?=CargaDatos($_GET['id'], 'anotaciones_posteriores')?></textarea>
							        </div>
							    </div>
							    
							    <br>
							    
							    <div class="form-group">
							        <div class="col-xs-offset-3 col-xs-9">
							            <input type="submit" class="btn btn-comun" value="Enviar">
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
