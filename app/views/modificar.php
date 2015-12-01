			
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

                        <div class="row">
                            <div class="col-md-12">
                                <label>Descripción:</label>

                                <textarea rows="3" class="form-control" placeholder="Introduce la Descripción" name="descripcion"><?= CargaDatos($_GET['id'], 'descripcion') ?></textarea>
                                <?= VerError('descripcion', $errores) ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label>Persona de Contacto:</label>

                                <input type="text" class="form-control" placeholder="Introduce la Persona de Contacto" name="persona_contacto" value="<?= CargaDatos($_GET['id'], 'persona_contacto') ?>">

                                <?= VerError('persona_contacto', $errores) ?>			   
                            </div>


                            <div class="col-md-4">
                                <label>Telefono de Contacto:</label>

                                <input type="tel" class="form-control" placeholder="Introduce el Telefono de Contacto" name="telefono_contacto" value="<?= CargaDatos($_GET['id'], 'telefono_contacto') ?>">
                                <?= VerError('telefonoContacto', $errores) ?>			        
                            </div>


                            <div class="col-md-4">
                                <label>Correo de Contacto: </label>

                                <input type="email" class="form-control" placeholder="Introduce un Correo de Contacto" name="correo_contacto" value="<?= CargaDatos($_GET['id'], 'correo_contacto') ?>">
                                <?= VerError('correoContacto', $errores) ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <label>Dirección:</label>

                                <input type="text" class="form-control" placeholder="Introduce una Dirección" name="direccion" value="<?= CargaDatos($_GET['id'], 'direccion') ?>">
                            </div>


                            <div class="col-md-3">
                                <label>Población:</label>

                                <input type="text" class="form-control" placeholder="Introduce la Población" name="poblacion" value="<?= CargaDatos($_GET['id'], 'poblacion') ?>">
                            </div>


                            <div class="col-md-3">
                                <label>Código Postal:</label>

                                <input type="text" class="form-control" placeholder="Introduce el CP" name="cp" value="<?= CargaDatos($_GET['id'], 'cp') ?>" maxlength="5" >
                                <?= VerError('cp', $errores) ?>
                            </div>


                            <div class="col-md-3">
                                <label>Provincia:</label>

                                <?php echo CreaSelect('tbl_provincias_cod', $Provincias, CargaDatos($_GET['id'], 'tbl_provincias_cod')) ?>		
                            </div>
                        </div>

                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label>Estado:</label>
                                <div>
                                    <?= CreaRadio('estado', array('pendiente' => 'Pendiente', 'realizada' => 'Realizada', 'cancelada' => 'Cancelada'), $_GET['id']); ?>
                                </div>
                            </div>

                            <div class="col-md-5">
                                <label>Operario Encargado</label>

                                <input type="text" class="form-control" placeholder="Introduce el Operario Encargado" name="operario_encargado" value="<?= ValorPost('operario_encargado') ?>">
                                <?= VerError('operario_encargado', $errores) ?>
                            </div>


                            <div class="col-md-3">
                                <label >Fecha Realización:</label>

                                <input type="text" class="form-control" placeholder="dd-mm-aaaa" name="fecha_realizacion" value="<?= CargaDatos($_GET['id'], 'fecha_realizacion') ?>">
                                <?= VerError('fecha_realizacion', $errores) ?>
                                <?= VerError('fechaRealizacionVacia', $errores) ?>
                            </div>

                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                            <label>Anotaciones Anteriores:</label>

                            <textarea rows="3" class="form-control" placeholder="Anotaciones Anteriores" name="anotaciones_anteriores"><?= CargaDatos($_GET['id'], 'anotaciones_anteriores') ?></textarea>
                            </div>


<div class="col-md-6">
                            <label>Anotaciones Posteriores:</label>

                            <textarea rows="3" class="form-control" placeholder="Anotaciones Posteriores" name="anotaciones_posteriores"><?= CargaDatos($_GET['id'], 'anotaciones_posteriores') ?></textarea>
</div>

                        </div>
                        <br>


                        
                            <input type="submit" class="btn btn-comun" value="Enviar">
                        

                    </form>

                </div><!-- fin panel body-->
            </div><!-- fin panel panel-default -->
        </div><!-- fin 2ª columna -->
        <!-- 3ª COLUMNA -->
        <div class="col-md-1"></div>
    </div> <!--Fin row-->

</div><!--fin container-->
