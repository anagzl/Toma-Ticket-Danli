<!-- Llamado de la cabeza del -->
<?php
require 'header.php';
?>


<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
                        <!-- Page Heading -->
                        <h1 class="h3 mb-2 text-gray-800"><i class="bi bi-clipboard-fill"></i>  Tablero de Ventanillas </h1>
                    <p class="mb-4">Área donde se puede modificar y crear nuevas ventanillas</p>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body"> 
                            <!-- Begin Page Content -->
                            <div class="container-fluid">
                                <!-- Page Heading -->
                                                <!-- DataTales Example -->

                                                    <div class="card-header py-3">
                                                        <h6 class="m-0 font-weight-bold text-primary"><i class="bi bi-calendar4-week"></i> &nbsp; Registro de Ventanillas</h6>
                                                    </div>
                                                    <div class="card-body">
                                                    <button id="botonCrear" type="button" class="btn btn-outline-info btn-lg mb-2" data-bs-toggle="modal" data-bs-target="#modalVentanilla"><i class="bi bi-plus-circle mr-2"></i>Crear</button>
                                                            <div class="table-responsive"><!-- inicio de table responsive -->
                                                                    <!-- Tabla  -->
                                                                    <table id="datos_ventanilla" class="table table-hover">
                                                                        <!-- Encabezado -->
                                                                        <thead ><!-- class="table-dark" -->
                                                                            <!-- Creacion de fila de encabezados -->
                                                                            <tr>
                                                                                <!-- Columnas -->
<!--                                                                                 <th> # </th> -->
                                                                                <th><i class="bi bi-hash"></i>  Número </th>
                                                                                <th><i class="bi bi-geo-alt-fill"></i> Dirección</th>
                                                                                <th><i class="bi bi-list-check"></i> Trámites Habilitados</th>
                                                                                <th><i class="bi bi-person-circle"></i> Encargado</th>
                                                                                <th><i class="bi bi-pencil-square"></i> Editar</th>
                                                                                <th><i class="bi bi-toggles"></i> Cambiar Estado</th>
                                                                            </tr>
                                                                        </thead>
                                                                    </table>
                                                            </div><!-- fin de table responsive -->
                                                    </div>
                                                </div>
                            </div>

                            <!-- /.container-fluid -->  

                <!-- Creacion del modal  -->  
                <div class="modal fade" id="modalVentanilla" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <!-- Colocando el nombre del modal para que el boton sepa que se va desplegar  -->
                                    <label for=""><i class="bi bi-flag-fill"></i>&nbsp;Ventanilla:</label> 
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                            </div>
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <!-- Creacion del formulario -->
                                        <form method="POST" id="formularioVentanilla" enctype="multipart/form-data">
                                            <label for="idVentanilla"><i class="bi bi-list-ol"></i>&nbsp;Id de ventanilla:</label> 
                                            <input type="text" name="idVentanilla" id="idVentanilla" class="form-control" disabled> <!-- icono estado -->
                                            <br/>
                                            <label for="numVentanilla"><i class="bi bi-envelope"></i></i>&nbsp;Número de Ventanilla:</label> <!-- icono estado -->
                                            <input type="text" name="numVentanilla" id="numVentanilla"class="form-control">
                                            <br/>
                                            <label for="direccion"><i class="bi bi-calendar-date"></i></i>&nbsp;Seleccione la Dirección de la Ventanilla:</label> <!-- icono estado -->
                                            <select name="direccion" id="direccion" class="form-control">
                                            <option value="0" style="color:black;">Seleccione la Dirección de la Ventanilla</option>
                                            <?php
                                                    include("../../config/conexion.php");
                                                    $query = $conexion->prepare("SELECT idDireccion,
                                                                                        nombre
                                                                                        FROM direccion");
                                                    $query->execute();
                                                    $data = $query->fetchAll();

                                                    foreach ($data as $valores):
                                                    echo '<option value="'.$valores["idDireccion"].'">'.$valores["nombre"].'</option>';
                                                    endforeach;
                                            ?>
                                            </select>
                                            <br/>
                                            <label for="usuario"><i class="bi bi-person-circle"></i></i>&nbsp;Ingrese el Usuario Asignado:</label> <!-- icono estado -->
                                            <div class="s2-example" data-select2-id="select2-data-4-vod2">
                                                <select class="js-example-templating js-states form-control select2-hidden-accesible" data-select2-id="select2-data-1-bepc" aria-hidden="true" tabindex="-1" name="empleado" id="empleado">
                                                    <option value="0">Seleccione un empleado</option>
                                                    <?php
                                                    include("../../config/conexion.php");
                                                    // obtener usuarios disponibles de ventanilla
                                                    $query = $conexion->prepare("SELECT
                                                                                    e.idEmpleado,
                                                                                    e.Usuario_idUsuario,
                                                                                    e.Rol_idRol,
                                                                                    e.Ventanilla_idVentanilla,
                                                                                    e.correoInstitucional,
                                                                                    e.login,
                                                                                    e.estado,
                                                                                    u.primerNombre,
                                                                                    u.primerApellido
                                                                                FROM
                                                                                    empleado AS e
                                                                                INNER JOIN usuario AS u
                                                                                ON
                                                                                    u.idUsuario = e.Usuario_idUsuario
                                                                                WHERE
                                                                                    e.estado = 1 AND e.Rol_idRol = 2");
                                                    $query->execute();
                                                    $data = $query->fetchAll();
                                                    foreach ($data as $valores):
                                                    echo '<option value="'.$valores["idEmpleado"].'" title="'.$valores["Usuario_idUsuario"].'">'.$valores["primerNombre"].' '.$valores["primerApellido"].'</option>';
                                                    endforeach;
                                                    ?>
                                                </select>
                                            </div>
                                            <br/>
                                            <label for="tramitesDireccion"><i class="bi bi-check-square"></i>&nbsp;Seleccione los Trámites Habilitados:</label> <!-- icono estado -->
                                            <br/>
                                            <div id="tramitesDireccion" style="overflow-y: scroll; height:125px;"> 
                                            </div>  
                                            <div class="modal-footer">
                                                <input type="submit" name="action" id="action" class="btn btn-outline-info btn-lg" value="Crear">
                                                <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Cerrar</button>
                                                <!-- Funcionalidad para crear o editar llamada por el input -->
                                            </div>                                          
                                        </form>       
                                    </div><!--  -->
                                </div><!-- modal-dialog -->
                    </div><!-- modal fade -->
                </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<!-- End of Main Content -->

    <!--  JavaScript -->
    <!-- Jquery  -->
    <script src="../../assets/jquery-3.6.0/jquery-3.6.0.min.js"></script>

    <!-- Data tables -->
    <script charset="utf8"  src="../../assets/datatables/js/jquery.dataTables.min.js" ></script>
    <!--     <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script> -->

    <!--  Bootstrap  -->
    <script src="../../assets/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>


    <!--  Controlador para ver asistencia  -->
    <script src="../../controllers/tb_ventanilla.js"></script>

<!-- Llamdo del pie del documento -->
<?php
require 'footer.php';
?>