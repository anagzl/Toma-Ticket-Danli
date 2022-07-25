<!-- Llamado de la cabeza del -->
<?php
require 'header.php';
?>


<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
                        <!-- Page Heading -->
                        <h1 class="h3 mb-2 text-gray-800"><i class="bi bi-clipboard-fill"></i>  Tablero General De Toma tickets </h1>
                    <p class="mb-4">Área donde se puede visualizar y dar seguimiento al flujo de usuarios que tiene el tomatickets <br/>Se puede <i class="bi bi-binoculars-fill"></i> filtrar por:   </p>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body"> 
                            <!-- Begin Page Content -->
                            <div class="container-fluid">
                                <!-- Page Heading -->


                                                <!-- DataTales Example -->

                                                    <div class="card-header py-3">
                                                        <h6 class="m-0 font-weight-bold text-primary"><i class="bi bi-calendar4-week"></i> &nbsp; Bitácora De Toma tickets</h6>
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
                                                            <div class="table-responsive"><!-- inicio de table responsive -->
                                                                    <!-- Tabla  -->
                                                                    <table id="datos_bitacora_tomatickets" class="table table-hover">
                                                                        <!-- Encabezado -->
                                                                        <thead ><!-- class="table-dark" -->
                                                                            <!-- Creacion de fila de encabezados -->
                                                                            <tr>
                                                                                <!-- Columnas -->
<!--                                                                                 <th> # </th> -->
                                                                                <th><i class="bi bi-hash"></i>  Caso </th>
                                                                                <th><i class="bi bi-geo-alt-fill"></i> Sede</th>
                                                                                <th><i class="bi bi-person-fill"></i> Cliente / Identidad </th>
                                                                                <th><i class="bi bi-calendar-heart"></i> Tramite</th>
                                                                                <th><i class="bi bi-calendar3"></i> Direccion</th>
                                                                                <th><i class="bi bi-calendar2-event"></i> Fecha </th>
                                                                                <th><i class="bi bi-calendar2-event"></i> Hora De Generación Ticket </th>
                                                                                <th><i class="bi bi-hourglass-top"></i> Hora De Entrada </th>
                                                                                <th><i class="bi bi-hourglass-bottom"></i>  Hora De Salida</th>
                                                                                <th><i class="bi bi-chat-square-text"></i> Observacion</th>
                                                                                <th><i class="bi bi-person-workspace"></i> Atendido Por</th>
                                                                            </tr>
                                                                        </thead>
                                                                    </table>
                                                            </div><!-- fin de table responsive -->
                                                    </div>
                                                </div>
                            </div>
                            <!-- /.container-fluid -->  

                    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Datatable con botones -->
<script type="text/javascript" src="../../assets/datatables2/jQuery-3.6.0/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="../../assets/datatables2/datatables.min.js"></script>
<script type="text/javascript" src="../../assets/datatables2/Buttons-2.2.3/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="../../assets/datatables2/pdfmake-0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="../../assets/datatables2/pdfmake-0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="../../assets/datatables2/datatables.min.js"></script>
<script type="text/javascript" src="../../assets/datatables2/Buttons-2.2.3/js/buttons.html5.min.js"></script>

<!--  Bootstrap  -->
<script src="../../assets/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>

<!--  Controlador para ver asistencia  -->
<script src="../../controllers/tb_bitacora_tomatickets.js"></script>

<!-- Llamdo del pie del documento -->
<?php
require 'footer.php';
?>