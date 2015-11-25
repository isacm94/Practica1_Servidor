<div class="container">	
    <br>
	<div class="row">	
		<div class="col-md-4"></div>
		<div class="col-md-4">			
                    <div class="well">
                        <form role="form" method="POST">
                                    <h3>Login</h3>
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
                               
                                    <?php 
                                          if(isset($loginok) && ! $loginok):?>
                                            <div class="alert alert-danger">
                                                <b>¡Error!</b> Usuario o contraseña incorrectos
                                            </div> 
                                    <?php endif; ?>
                                
                                
                                
                                <input type="submit" name="login" value="Entrar" class="btn btn-comun">                               
                                
                        </form>                   
	    
                    </div><!-- final well -->	
		</div> <!-- final col-md-4-->
                
	</div>
    <br><br>
</div><!-- final container -->



