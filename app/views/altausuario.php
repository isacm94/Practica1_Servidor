<div class="container">	
	<div class="row">	
		<div class="col-md-4"></div>
		<div class="col-md-4">			
                    <div class="well">
                        <form role="form" method="POST">
                                    <h3>Añadir Usuario</h3>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                            <input type="text" class="form-control" placeholder="Usuario" name="usuario" autofocus/>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                            <input type="password" class="form-control" placeholder="Contraseña" name="clave"/>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                            <input type="password" class="form-control" placeholder="Repite Contraseña" name="claverepetida"/>
                                        </div>
                                    </div>
                               
                                    <?php 
                                          if(isset($errores['clavesdistintas'])):?>
                                            <div class="alert alert-danger">
                                                <b>¡Error!</b> Contraseña incorrectas
                                            </div> 
                                    <?php endif; ?>
                                    
                                    <label>Tipo:&nbsp;</label>
                                    <label class="radio-inline"><input type="radio" name="tipo" value="A" checked>Administrador</label>
                                    <label class="radio-inline"><input type="radio" name="tipo" vlaue="O">Operario</label>
                                
                                    <?php 
                                          if(isset($errores['existeusuario'])):?>
                                            <div class="alert alert-danger">
                                                <b>¡Error!</b> El usuario ya existe
                                            </div> 
                                    <?php endif; ?>
                                    
                                <input type="submit" name="anahdirusuario" value="Enviar" class="btn btn-comun">

                        </form>                   
	    
                    </div><!-- final well -->	
		</div> <!-- final col-md-4-->
	</div>
</div><!-- final container -->

