<div class="container">	
    <div class="row well">
        <div class="col-md-12">
            <div class="col-md-3 column">
               <ul class="nav nav-pills nav-stacked well">
                   <li><a href="?ctrl=listausuarios"><span class="glyphicon glyphicon-chevron-right"></span> Listar</a></li>
                   
                   <li class="active"><a href="?ctrl=altausuario" class="active2">&nbsp;&nbsp;<span class="glyphicon glyphicon-chevron-right"></span> Añadir</a></li>
                                    
                </ul>
            </div>
            <div class="col-md-9" style="border: 1px solid #dadada">
                <div class="col-md-3"></div>
		<div class="col-md-5">	
                        <form role="form" method="POST" action="?ctrl=altausuario">
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
                                            <input type="password" class="form-control" placeholder="Confirme Contraseña" name="claverepetida"/>
                                        </div>
                                    </div>
                               
                                    <?php 
                                          if(isset($errores['clavesdistintas'])):?>
                                            <div class="alert alert-danger">
                                                <b>¡Error!</b> Contraseñas incorrectas
                                            </div> 
                                    <?php endif; ?>
                                    
                                    <label>Tipo:&nbsp;</label>
                                    <label class="radio-inline"><input type="radio" name="tipo" value="A" checked>Administrador</label>
                                    <label class="radio-inline"><input type="radio" name="tipo" value="O">Operario</label>
                                
                                    <?php 
                                          if(isset($errores['existeusuario'])):?>
                                            <div class="alert alert-danger">
                                                <b>¡Error!</b> El usuario ya existe
                                            </div> 
                                    <?php endif; ?>
                                    
                                <input type="submit" name="anhadirusuario" value="Enviar" class="btn btn-comun">

                        </form>                   
	    	
		</div> <!-- final col-md-4-->
            </div>
            
        </div>
       
    </div>
</div>        








            
	

