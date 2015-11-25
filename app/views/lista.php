
<div class="container">		

        <?php 
                if(EMPTY($tareas))
                        include_once 'noexistendatos.php';
                else {

        ?>
        <div class="panel-default" style="background-color: white; border-radius: 3px;">
                <div class="panel-heading"><h3 class="list-group-item-heading"><b>Listado de Tareas</b></h3></div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <br>

                                <table class="table table-hover table-striped table-bordered" style="background-color: white;">

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
                                <br>
                        </div><!-- final col-md-12 -->
                    <?php } /*Fin ELSE*/?>
                    <br>
                    <?php 
                            if(!empty($tareas))//Solo lo muestra si existen datos
                                    MuestraPaginador($nPag, $totalPaginas, $myURL);
                    ?>

                    </div><!-- final row -->
                </div><!-- final panel-body -->
        </div><!-- final panel-default -->
</div><!-- final container -->



