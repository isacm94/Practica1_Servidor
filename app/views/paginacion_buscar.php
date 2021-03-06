<!-- VISTA que muestra los resultados de buscar en forma de tabla y paginados -->					
<div class="container">	
    <div class="panel-default" style="background-color: white; border-radius: 3px; margin-top: -250px;">

        <div class="panel-heading"><h3 class="list-group-item-heading"><b>Número de Resultados: <?= $totalRegistros ?></b></h3></div>

        <div class="panel-body">

            <div class="row">

                <div class="col-md-12">
                    <div class="table-responsive ">					

                        <table class="table table-hover table-striped table-bordered">

                            <tbody>

                                <tr>
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

                                <?= EscribeTarea(GetBusqueda($condicion, $nReg, $nElementosxPagina)) ?>

                            </tbody>

                        </table>
                    </div><!-- Fin div table-responsive -->

                    <br>

                    <?php MuestraPaginador($nPag, $totalPaginas, $myURL); ?>
                </div><!-- Fin div col-md-12 -->

            </div><!-- final row -->

        </div><!-- final panel-body -->

    </div><!-- final panel-default -->
</div><!-- final container -->


