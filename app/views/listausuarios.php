<div class="container">	
    <div class="row well">
        <div class="col-md-12">
            <div class="col-md-3 column">
               <ul class="nav nav-pills nav-stacked well">
                   <li class="active"><a href="?ctrl=listausuarios" class="active2"><span class="glyphicon glyphicon-chevron-right"></span> Listar</a></li>
                   
                   <li><a href="?ctrl=altausuario">&nbsp;&nbsp;<span class="glyphicon glyphicon-chevron-right"></span> Añadir</a></li>
                                    
                </ul>
            </div>
            <div class="col-md-9">
                <h3>Lista de Usuarios</h3>
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>#ID</th>
                        <th>Nombre de usuario</th>
                        <th>Tipo</th>
                        <th>Opciones</th>
                    </tr>
                    
                    <?= EscribeUsuarios($usuarios);?>
                    
                </table>  
	    	
		
            </div>
            
        </div>
       
    </div>
</div>        








            
	

