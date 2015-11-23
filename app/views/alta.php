
<div class="container">		

        <div class="row">
                <!-- 1ª COLUMNA -->
                <div class="col-md-1">
                </div>
                <!-- 2ª COLUMNA -->
                <div class="col-md-10">

                        <div class="panel panel-default">

                                <div class="panel-heading"><h3 class="list-group-item-heading"><b>Añadir Tarea</b></h3></div>

                                <div class="panel-body" style="padding: 30px;">

                                        <form class="form-horizontal" action="index.php?ctrl=alta" method="POST">
                                            
                                                <div class="row">
                                                        <div class="col-md-11">								
                                                            <div class="form-group">
                                                                <label style='float: left;'>Descripción:</label>
                                                                    <textarea rows="3" class="form-control" placeholder="Descripción" name="descripcion"><?=ValorPost('descripcion')?></textarea>
                                                                                <?=VerError('descripcion', $errores)?>
                                                               
                                                            </div>
                                                        </div>
                                                </div>


                                                <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label style='float: left;'>Persona de Contacto:</label>

                                                                <input type="text" class="form-control" placeholder="Persona de Contacto" name="personaContacto" value="<?=ValorPost('personaContacto')?>">
                                                                            <?=VerError('personaContacto', $errores)?>										 
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3" style="margin-left: 7.5px; margin-right:  7.5px;">
                                                                <div class="form-group">
                                                                    <label style='float: left;'>Telefono de Contacto:</label>

                                                                    <input type="tel" class="form-control" placeholder="Telefono de Contacto" name="telefonoContacto" value="<?=ValorPost('telefonoContacto')?>">
                                                                    <?=VerError('telefonoContacto', $errores)?>			        

                                                                 </div>
                                                        </div>

                                                        <div class="col-md-4">										
                                                            <div class="form-group">
                                                                <label style='float: left;'>Correo de Contacto: </label>

                                                                <input type="email" class="form-control" placeholder="Correo de Contacto" name="correoContacto" value="<?=ValorPost('correoContacto')?>">
                                                                            <?=VerError('correoContacto', $errores)?>											
                                                            </div>								
                                                        </div>

                                            </div>

                                            <div class="row">
                                                
                                                <div class="col-md-3" style="margin-right: 5px;">
                                                    <div class="form-group">
                                                        <label style='float: left;'>Dirección:</label>
                                                        
                                                        <input type="text" class="form-control" placeholder="Dirección" name="direccion" value="<?=ValorPost('direccion')?>">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-3"style="margin-right: 5px;">
                                                    <div class="form-group">
                                                        <label style='float: left;'>Población:</label>
                                                        
                                                        <input type="text" class="form-control" placeholder="Población" name="poblacion" value="<?=ValorPost('direccion')?>">
                                                        
                                                    </div>
                                                </div>

                                                <div class="col-md-3" style="margin-right: 5px;">
                                                    <div class="form-group">
                                                        <label style='float: left;'>Código Postal:</label>
                                                        
                                                        <input type="text" class="form-control" placeholder="CP" name="cp" value="<?=ValorPost('cp')?>" maxlength="5" >
                                                        <?=VerError('cp', $errores)?>
                                                       
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-2">
                                                    <!-- SELECT CON PROVINCIAS -->
                                                     <div class="form-group">
                                                        <label style='float: left;'>Provincia:</label>
                                                        
                                                         <?php echo CreaSelect('provincia', $Provincias)?>                                                              
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">        
                                                <div class="form-group col-md-3" style="margin-right: -8px;">
                                                    <label style='float: left;'>Fecha Realización:</label>

                                                    <input type="text" class="form-control" placeholder="dd-mm-aaaa" name="fechaRealizacion" value="<?=ValorPost('fechaRealizacion')?>">
                                                    <?=VerError('fechaRealizacion', $errores)?>
                                                    <?=VerError('fechaRealizacionVacia', $errores)?>

                                                </div>


                                                <div class="form-group col-md-9">
                                                    <label style='float: left;'>Anotaciones Anteriores:</label>

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

