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
                                                            <div class="table-responsive"><!-- inicio de table responsive -->
                                                                    <!-- Tabla  -->
                                                                    <table id="datos_ventanilla" class="table table-hover">
                                                                        <!-- Encabezado -->
                                                                        <thead ><!-- class="table-dark" -->
                                                                            <!-- Creacion de fila de encabezados -->
                                                                            <tr>
                                                                                <!-- Columnas -->
<!--                                                                                 <th> # </th> -->
                                                                                <th><i class="bi bi-hash"></i>  Numero </th>
                                                                                <th><i class="bi bi-geo-alt-fill"></i> Dirección</th>
                                                                                <th><i class="bi bi-geo-alt-fill"></i> Trámites Habilitados</th>
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