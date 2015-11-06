<html>
	<head>
		<meta charset="UTF-8">
		<title>vista ALTA</title>
		
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
		
		<link rel="stylesheet" type="text/css" href="../../assets/css/estilos_alta.css">
	</head>
	<body>
		<div style="width: 800px; margin-top: 40px; margin-left: 40px;">
		
			<form class="form-horizontal" method="POST">
			
				<div class="form-group">
			        <label class="control-label col-xs-3">Descripción:</label>
			        <div class="col-xs-9">
			            <textarea rows="3" class="form-control" placeholder="Introduce la Descripción" name="descripcion"><?=ValorPost('descripcion')?></textarea>
						<?=VerError('descripcion', $errores)?>
					</div>
			    </div>
				
			    <div class="form-group">
			        <label class="control-label col-xs-3">Persona de Contacto:</label>
			        <div class="col-xs-9">
			            <input type="text" class="form-control" placeholder="Introduce la Persona de Contacto" name="personaContacto" value="<?=ValorPost('personaContacto')?>">
						<?=VerError('personaContacto', $errores)?>				   
				   </div>
			    </div>
			    
			    <div class="form-group">
			        <label class="control-label col-xs-3" >Telefono de Contacto:</label>
			        <div class="col-xs-9">
			            <input type="tel" class="form-control" placeholder="Introduce el Telefono de Contacto" name="telefonoContacto" value="<?=ValorPost('telefonoContacto')?>">
			        	<?=VerError('telefonoContacto', $errores)?>			        
			        </div>       
			    </div>
			    
			    <div class="form-group">
			        <label class="control-label col-xs-3">Correo de Contacto: </label>
			        <div class="col-xs-9">
			            <input type="email" class="form-control" placeholder="Introduce un Correo de Contacto" name="correoContacto" value="<?=ValorPost('correoContacto')?>">
						<?=VerError('correoContacto', $errores)?>
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
		</div>
	</body>
</html>
