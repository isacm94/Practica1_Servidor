			
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
                                <label style='float: left;'>Descripción:</label>

                                <textarea rows="3" class="form-control" placeholder="Introduce la Descripción" name="descripcion"><?= CargaDatos($_GET['id'], 'descripcion') ?></textarea>
                                <?= VerError('descripcion', $errores) ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label style='float: left;'>Persona de Contacto:</label>

                                <input type="text" maxlength="50" class="form-control" placeholder="Introduce la Persona de Contacto" name="persona_contacto" value="<?= CargaDatos($_GET['id'], 'persona_contacto') ?>">

                                <?= VerError('persona_contacto', $errores) ?>			   
                            </div>


                            <div class="col-md-4">
                                <label style='float: left;'>Telefono de Contacto:</label>

                                <input type="text" maxlength="9" class="form-control" placeholder="Introduce el Telefono de Contacto" name="telefono_contacto" value="<?= CargaDatos($_GET['id'], 'telefono_contacto') ?>">
                                <?= VerError('telefonoContacto', $errores) ?>			        
                            </div>


                            <div class="col-md-4">
                                <label style='float: left;'>Correo de Contacto: </label>

                                <input type="email" maxlength="30" class="form-control" placeholder="Introduce un Correo de Contacto" name="correo_contacto" value="<?= CargaDatos($_GET['id'], 'correo_contacto') ?>">
                                <?= VerError('correoContacto', $errores) ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <label style='float: left;'>Dirección:</label>

                                <input type="text" maxlength="100" class="form-control" placeholder="Introduce una Dirección" name="direccion" value="<?= CargaDatos($_GET['id'], 'direccion') ?>">
                            </div>


                            <div class="col-md-3">
                                <label style='float: left;'>Población:</label>

                                <input type="text" maxlength="100" class="form-control" placeholder="Introduce la Población" name="poblacion" value="<?= CargaDatos($_GET['id'], 'poblacion') ?>">
                            </div>


                            <div class="col-md-3">
                                <label style='float: left;'>Código Postal:</label>

                                <input type="text" maxlength="5" class="form-control" placeholder="Introduce el CP" name="cp" value="<?= CargaDatos($_GET['id'], 'cp') ?>" maxlength="5" >
                                <?= VerError('cp', $errores) ?>
                            </div>


                            <div class="col-md-3">
                                <label style='float: left;'>Provincia:</label>

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
                                <label style='float: left;'>Operario Encargado</label>

                                <input type="text" maxlength="50" class="form-control" placeholder="Introduce el Operario Encargado" name="operario_encargado" value="<?= ValorPost('operario_encargado') ?>">
                                <?= VerError('operario_encargado', $errores) ?>
                            </div>


                            <div class="col-md-3">
                                <label style='float: left;' >Fecha Realización:</label>

                                <input type="text" maxlength="10" class="form-control" placeholder="dd-mm-aaaa" name="fecha_realizacion" value="<?= CargaDatos($_GET['id'], 'fecha_realizacion') ?>">
                                <?= VerError('fecha_realizacion', $errores) ?>
                                <?= VerError('fechaRealizacionVacia', $errores) ?>
                            </div>

                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <label style='float: left;'>Anotaciones Anteriores:</label>

                                <textarea rows="3" class="form-control" placeholder="Anotaciones Anteriores" name="anotaciones_anteriores"><?= CargaDatos($_GET['id'], 'anotaciones_anteriores') ?></textarea>
                            </div>


                            <div class="col-md-6">
                                <label style='float: left;'>Anotaciones Posteriores:</label>

                                <textarea rows="3" class="form-control" placeholder="Anotaciones Posteriores" name="anotaciones_posteriores"><?= CargaDatos($_GET['id'], 'anotaciones_posteriores') ?></textarea>
                            </div>

                        </div>
                        <br>                        
                        <input type="submit" class="btn btn-block btn-comun" value="Enviar">


                    </form>

                </div><!-- fin panel body-->
            </div><!-- fin panel panel-default -->
        </div><!-- fin 2ª columna -->
        <!-- 3ª COLUMNA -->
        <div class="col-md-1"></div>
    </div> <!--Fin row-->

</div><!--fin container-->
