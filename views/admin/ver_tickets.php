<!-- Llamado de la cabeza del -->
<?php
require 'header.php';
?>


<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><i class="bi bi-clipboard-fill"></i>  Tablero de Tickets </h1>
        <p class="mb-4">Área donde se puede visualizar la cola de tickets en tiempo real. Nota: Solo se podran visualizar los tickets del dia de hoy, a los 00:00 se reiniciara el contador, los tickets de hoy no seran validos el dia de mañana para ninguna operación.</p>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-body"> 
                    <!-- Container Fluid -->
                    <div class="container-fluid">
                        <!-- Page Heading -->
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary"><i class="bi bi-calendar4-week"></i> &nbsp; Registro de Tickets</h6>
                            </div>
                            <div class="card-body">
                                <div class="row text-center">
                                    <div class="col-1">
                                        <label class="form-select~label align-middle" for="direccion">Dirección:</label>
                                    </div>
                                    <div class="col-4">
                                        <select class="form-select align-middle" name="direccion" id="direccion">
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
                                    </div>
                                </div>
                                </div>
                                    <div class="table-responsive"><!-- inicio de table responsive -->
                                            <!-- Tabla  -->
                                            <table id="datos_tickets" class="table table-hover">
                                                <!-- Encabezado -->
                                                <thead ><!-- class="table-dark" -->
                                                    <!-- Creacion de fila de encabezados -->
                                                    <tr>
                                                        <!-- Columnas -->
                                                        <th><i class="bi bi-hash"></i>  Número </th>
                                                        <th><i class="bi bi-hash"></i>  Ticket </th>
                                                        <th><i class="bi bi-list-check"></i> Trámite </th>
                                                        <th><i class="bi bi-shop-window"></i> Ventanilla</th>
                                                        <th><i class="bi bi-toggles"></i> Estado</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                    </div><!-- fin de table responsive -->
                            </div>
                        </div>
                    </div>

                            <!-- /.container-fluid -->  

               
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
<script src="../../controllers/tb_tickets.js"></script>

<!-- Llamdo del pie del documento -->
<?php
require 'footer.php';
?>