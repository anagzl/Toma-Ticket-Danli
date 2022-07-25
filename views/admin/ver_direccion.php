<!-- Llamado de la cabeza del -->
<?php
require 'header.php';
?>


<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
                        <!-- Page Heading -->
                        <h1 class="h3 mb-2 text-gray-800"><i class="bi bi-clipboard-fill"></i>  Tablero de Direcciones </h1>
                    <p class="mb-4">Área donde se puede visualizar las direcciones y modificar sus descripciones.</p>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body"> 
                            <!-- Begin Page Content -->
                            <div class="container-fluid">
                                <!-- Page Heading -->
                                                <!-- DataTales Example -->

                                                    <div class="card-header py-3">
                                                        <h6 class="m-0 font-weight-bold text-primary"><i class="bi bi-calendar4-week"></i> &nbsp; Registro de Direcciones</h6>
                                                    </div>
                                                    <div class="card-body">
                                                    <!-- <button id="crear" type="button" class="btn btn-outline-info btn-lg mb-2"><i class="bi bi-plus-circle mr-2"></i>Crear</button> -->
                                                            <div class="table-responsive"><!-- inicio de table responsive -->
                                                                    <!-- Tabla  -->
                                                                    <table id="datos_tramites" class="table table-hover">
                                                                        <!-- Encabezado -->
                                                                        <thead ><!-- class="table-dark" -->
                                                                            <!-- Creacion de fila de encabezados -->
                                                                            <tr>
                                                                                <!-- Columnas -->
                                                                                <th><i class="bi bi-hash"></i>  Id Dirección </th>
                                                                                <th><i class="bi bi-list-check"></i> Nombre</th>
                                                                                <th><i class="bi bi-card-list"></i> Siglas</th>
                                                                                <th><i class="bi bi-geo-alt-fill"></i> Descripción</th>
                                                                                <th><i class="bi bi-pencil-square"></i> Editar</th>
                                                                            </tr>
                                                                        </thead>
                                                                    </table>
                                                            </div><!-- fin de table responsive -->
                                                    </div>
                                                </div>
                            </div>

                            <!-- /.container-fluid -->  

                <!-- Creacion del modal  -->  
                <div class="modal fade" id="modalDireccion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <!-- Colocando el nombre del modal para que el boton sepa que se va desplegar  -->
                                    <label for=""><i class="bi bi-flag-fill"></i>&nbsp;Dirección:</label> 
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                            </div>
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <!-- Creacion del formulario -->
                                        <form method="POST" id="formularioDireccion" enctype="multipart/form-data">
                                            <label for="idDireccion"><i class="bi bi-list-ol"></i>&nbsp;Id de dirección:</label> 
                                            <input type="text" name="idDireccion" id="idDireccion" class="form-control" disabled> <!-- icono estado -->
                                            <br/>
                                            <label for="nombreDireccion"><i class="bi bi-envelope"></i></i>&nbsp; Nombre de la Dirección:</label> <!-- icono estado -->
                                            <input type="text" name="nombreDireccion" id="nombreDireccion"class="form-control" disabled>
                                            <br/>
                                            <label for="descripcionDireccion"><i class="bi bi-card-list"></i></i>&nbsp; Descripción de la Dirección:</label> <!-- icono estado -->
                                            <textarea name="descripcionDireccion" id="descripcionDireccion" class="form-control" rows="3" placeholder="Descripción del Trámite" required></textarea>
                                            <br/>
                                            <label for="siglasDireccion"><i class="bi bi-calendar-date"></i></i>&nbsp;Siglas de la Dirección:</label> <!-- icono estado -->   
                                            <input type="text" name="siglasDireccion" id="siglasDireccion"class="form-control">                                      
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
<script src="../../controllers/tb_direccion.js"></script>

<!-- Llamdo del pie del documento -->
<?php
require 'footer.php';
?>