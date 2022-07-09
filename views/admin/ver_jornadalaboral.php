<!-- Llamado de la cabeza del -->
<?php
require 'header.php';
?>

    <!-- container-fluid -->
    <div class="container-fluid">
        <!-- Page heading -->
        <h1 class="h3 mb-2 text-gray-800"><i class="bi bi-clipboard-fill"></i>  Tablero de Bitácora de Empleados </h1>
        <p class="mb-4">En esta área podra visualizar la jornada de una fecha específica de un empleado, el tiempo que estuvo en pausa y la ventanilla en la cual estuvo asignado.</p>
        <!-- Datatables example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <!-- Begin page content -->
                <div class="container-fluid">
                    <!-- Datatables example -->
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary"><i class="bi bi-calendar4-week"></i> &nbsp; Registro de Jornadas</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-row align-items-center mb-2">
                            <div class="col-1">
                                <label for="fechaInicio">Fecha Inicial:</label>
                            </div>
                            <div class="col-4">
                                <input id="fechaInicio" class="form-control" type="date" />
                            </div>
                            <div class="col-1">
                                <label for="fechaFinal">Fecha Final:</label>
                            </div>
                            <div class="col-4">
                                <input id="fechaFinal" class="form-control" type="date" />
                            </div>
                            <div class="col-2">
                                <button id="buscarFecha" class="form-control" type="button"><i class="bi bi-search mr-2"></i>Buscar</button>
                            </div>
                        </div>
                        <div class="table-responsive"> <!-- Inicio tabla -->
                            <!-- Tabla -->
                            <table id="datos_jornada" class="table table-hover">
                                <!-- Table Header -->
                                <thead>
                                    <!-- Encabezados -->
                                    <tr>
                                        <th><i class="bi bi-hash"></i>  Id Jornada </th>
                                        <th><i class="bi bi-shop-window"></i> Ventanilla</th>
                                        <th><i class="bi bi-stopwatch"></i> Tiempo en Pausa</th>
                                        <th><i class="bi bi-calendar"></i> Fecha</th>
                                        <th><i class="bi bi-person-circle"></i> Empleado</th>
                                        <th><i class="bi bi-person-badge-fill"></i> Identidad</th>
                                    </tr>
                                </thead>
                            </table>
                        </div> <!-- Fin table responsive -->
                    </div> <!-- Fin card body -->
                </div> <!-- Fin container fluid -->
            </div> <!-- Fin card body -->
        </div> <!-- Fin card shadow -->
    </div><!-- Fin container fluid -->

<!-- Jquery  -->
<script src="../../assets/jquery-3.6.0/jquery-3.6.0.min.js"></script>
<!-- Data tables -->
<script charset="utf8"  src="../../assets/datatables/js/jquery.dataTables.min.js" ></script>
<!--  Bootstrap  -->
<script src="../../assets/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
<!--  Controlador para ver jornadalaboral  -->
<script src="../../controllers/tb_jornadalaboral.js"></script>

<!-- Llamdo del pie del documento -->
<?php
require 'footer.php';
?>