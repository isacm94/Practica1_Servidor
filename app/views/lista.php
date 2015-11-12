
		<div class="container">		
					
			<div class="row">
				<div class="col-xs-12">

					<?php 
						if(EMPTY($tareas))
							include_once 'noexistendatos.php';
						else {

					?>
					<div class="table-responsive ">
						<br>
					
						<table class="table table-hover table-striped table-bordered">
			  			
				  			<tbody>

				  				<tr>
				  					<th>#ID</th>
				  					<th>Descripción</th>
				  					<th>Persona</th>
				  					<th>Teléfono</th>
				  					<th>Correo</th>
				  					<th>Dirección</th>
				  					<th>Población</th>
				  					<th>CP</th>
				  					<th>Provincia</th>
				  					<th>Estado</th>
				  					<th>Fecha Creación</th>
				  					<th>Operario</th>
				  					<th>Fecha Realización</th>
				  					<th>Anotaciones Anteriores</th>
				  					<th>Anotaciones Posteriores</th>
				  					<th>Opciones</th>
				  				</tr>

				  				<?=EscribeTarea(GetTareas($nReg, $nElementosxPagina))?>
				  				
				  			</tbody>

			  			</table>
					</div><!-- Fin div table-responsive -->

					<?php } /*Fin ELSE*/?>
					<br>
				</div><!-- Fin div col-xs-12 -->
			</div>
		</div>



