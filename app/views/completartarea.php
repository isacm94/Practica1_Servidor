<!-- VISTA de completar tarea -->

<div class="container">		

    <div class="row">
        <form action="" method="POST">

            <div class="panel-body">

                <div class = "panel panel-default">

                    <div class ="panel-heading"><h3 class="list-group-item-heading"><b>Tarea</b></h3></div>

                    <form class="form-group"  method="POST">

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
                                    <p>
                                        <label class="radio-inline">
                                            <input type="radio" name="estado" value="Pendiente"> Pendiente
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio"  name="estado" value="Realizada" checked> Realizada
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio"  name="estado" value="Cancelada"> Cancelada
                                        </label>

                                    </p>
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
                                    <p><textarea class="form-control" name="anotaciones_posteriores" rows="3"><?= $tarea[0]['anotaciones_posteriores']; ?></textarea></p>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="4">
                                    <input type="submit" name="completarTarea" class="btn btn-block btn-comun" value="Enviar"> 
                                </td>
                            </tr>
                        </table>

                    </form>

                </div> <!--fin panel-default -->

            </div><!--fin panel-body -->					

        </form> 

    </div> <!-- fin row -->
</div><!-- fin container -->