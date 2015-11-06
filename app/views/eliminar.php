<html>
<head>
		<title>Eliminar</title>
		<meta charset="UTF-8">

		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

		<!-- CSS PROPIO -->
		<link rel="stylesheet" type="text/css" href="../../assets/css/estilos_alta.css">
</head>
<body>

	<br><br>

	<form action="" method="GET">
			
		<div class="container">
			<div class="panel panel-default">
				<div class="panel-body">

				    
					<!-- campooculto -> Guarda el id de la tarea a eliminar -->
						
					<label class="control-label">¿Desea eliminar esta tarea?</label>
					
					<div class="btn-group">
						<!--<input type="submit" name="sieliminar" class="btn btn-comun" value="Sí"> -->
						<a href="..\controllers\lista.php?id=".<?=$_GET['id']?>."&sieliminar=si" class="btn btn-comun">Sí</a>
						<input type="submit" name="noeliminar" class="btn btn-comun" value="No">		
					</div>				
					<br><br>

					<div class = "panel panel-default">
					   <div class ="panel-heading"><h3 class="list-group-item-heading"><b>Tarea ID: <?= $tarea[0]['id']; ?></b></h3></div>

					    	<table class="table">
				        		<tr>
				        			<td colspan="4">
				        				<b>Descripción:</b>
				        				<p><?= $tarea[0]['descripcion']; ?></p>
				        			</td>
				        		</tr>
							
								<tr>
							        <td colspan="2">
							        	<b>Persona de Contacto:</b>
							        	<p><?= $tarea[0]['persona_contacto']; ?></p>
							        </td>

							        <td>
							        	<b>Teléfono:</b>
										<p><?= $tarea[0]['telefono_contacto']; ?></p>
							        </td>

							        <td>
							        	<b>Correo: </b> 
							        	<p><?= $tarea[0]['correo_contacto']; ?></p>
							        </td>
							    </tr>
							    	
							    <tr>
							        <td>
							        	<b>Dirección: </b>
							        	<p><?= $tarea[0]['direccion']; ?></p>
							        </td>

							        <td>
							        	<b>Población: </b>
							        	<p><?= $tarea[0]['poblacion']; ?></p>
							        </td>

							        <td>
							        	<b>CP: </b>
							        	<p><?= $tarea[0]['cp']; ?></p>
							        </td>

							        <td>
							        	<b>Provincia: </b>
							        	<p><?= $tarea[0]['tbl_provincias_cod']; ?></p>
							        </td>
							    </tr>

							    <tr>
							        <td>
							        	<b>Estado: </b> 
							        	<p><?= $tarea[0]['estado']; ?></p>
							        </td>

							        <td>
							        	<b>Fecha Creación: </b>
							        	<p><?= $tarea[0]['fecha_creacion']; ?></p>
							        </td>

							        <td>
							        	<b>Operario Encargado: </b>
							        	<p><?= $tarea[0]['operario_encargado']; ?></p>
							        </td>

							        <td>
							        	<b>Fecha Realización: </b>
							        	<p><?= $tarea[0]['fecha_realizacion']; ?></p>
							        </td>
							    </tr>

							    <tr>
				        			<td colspan="2">
				        				<b>Anotaciones Anteriores: </b>
				        				<p><?= $tarea[0]['anotaciones_anteriores']; ?></p>
				        			</td>

				        			<td colspan="2">
				        				<b>Anotaciones Posteriores: </b>
				        				<p><?= $tarea[0]['anotaciones_posteriores']; ?></p>
				        			</td>
				        		</tr>


							</table>


					</div>



				</div>
			</div>
		</div>
	</form> 


</body>
</html>