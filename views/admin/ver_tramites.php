<!-- Llamado de la cabeza del -->
<?php
require 'header.php';
?>


<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
                        <!-- Page Heading -->
                        <h1 class="h3 mb-2 text-gray-800"><i class="bi bi-clipboard-fill"></i>  Tablero de Trámites </h1>
                    <p class="mb-4">Área donde se puede modificar y crear nuevos trámites</p>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body"> 
                            <!-- Begin Page Content -->
                            <div class="container-fluid">
                                <!-- Page Heading -->
                                                <!-- DataTales Example -->

                                                    <div class="card-header py-3">
                                                        <h6 class="m-0 font-weight-bold text-primary"><i class="bi bi-calendar4-week"></i> &nbsp; Registro de Tramites</h6>
                                                    </div>
                                                    <div class="card-body">
                                                    <button id="crear" type="button" class="btn btn-outline-info btn-lg mb-2"><i class="bi bi-plus-circle mr-2"></i>Crear</button>
                                                            <div class="table-responsive"><!-- inicio de table responsive -->
                                                                    <!-- Tabla  -->
                                                                    <table id="datos_tramites" class="table table-hover">
                                                                        <!-- Encabezado -->
                                                                        <thead ><!-- class="table-dark" -->
                                                                            <!-- Creacion de fila de encabezados -->
                                                                            <tr>
                                                                                <!-- Columnas -->
                                                                                <th><i class="bi bi-hash"></i>  Id Trámite </th>
                                                                                <th><i class="bi bi-list-check"></i> Nombre</th>
                                                                                <th><i class="bi bi-card-list"></i> Descripción</th>
                                                                                <th><i class="bi bi-geo-alt-fill"></i> Dirección</th>
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
                <div class="modal fade" id="modalTramite" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <!-- Colocando el nombre del modal para que el boton sepa que se va desplegar  -->
                                    <label for=""><i class="bi bi-flag-fill"></i>&nbsp;Trámite:</label> 
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                            </div>
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <!-- Creacion del formulario -->
                                        <form method="POST" id="formularioTramite" enctype="multipart/form-data">
                                            <label for="idTramite"><i class="bi bi-list-ol"></i>&nbsp;Id de trámite:</label> 
                                            <input type="text" name="idTramite" id="idTramite" class="form-control" disabled> <!-- icono estado -->
                                            <br/>
                                            <label for="nombreTramite"><i class="bi bi-envelope"></i></i>&nbsp; Nombre del trámite:</label> <!-- icono estado -->
                                            <input type="text" name="nombreTramite" id="nombreTramite"class="form-control">
                                            <br/>
                                            <label for="descripcionTramite"><i class="bi bi-envelope"></i></i>&nbsp; Descripción del trámite:</label> <!-- icono estado -->
                                            <textarea name="descripcionTramite" id="descripcionTramite" class="form-control" rows="3" placeholder="Descripción del Trámite" required></textarea>
                                            <br/>
                                            <label for="direccion"><i class="bi bi-calendar-date"></i></i>&nbsp;Seleccione la Dirección del Trámite:</label> <!-- icono estado -->
                                            <select name="direccion" id="direccion" class="form-control">
                                            <option value="0" style="color:black;">Seleccione la Dirección del Trámite</option>
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
    <script src="../../controllers/tb_tramites.js"></script>

<!-- Llamdo del pie del documento -->
<?php
require 'footer.php';
?>