<!-- Llamado de la cabeza del -->
<?php
require 'header.php';
?>

<!-- Custom css -->
<link href="../../assets/desingLogin2/carrusel.css" rel="stylesheet" type="text/css"> 

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
                        <!-- Page Heading -->
                        <h1 class="h3 mb-2 text-gray-800"><i class="bi bi-clipboard-fill"></i>  Tablero de Carrusel </h1>
                    <p class="mb-4">Área para administrar archivos de carrusel</p>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body"> 
                            <!-- Begin Page Content -->
                            <div class="container-fluid">
                                <!-- Page Heading -->
                                    <!-- DataTable Media -->
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary"><i class="bi bi-film"></i> &nbsp; Media Carrusel </h6>
                                        </div>
                                        <div class="card-body">
                                        <button id="crear" type="button" class="btn btn-outline-info btn-lg mb-2"><i class="bi bi-cloud-arrow-up mr-2"></i>Subir Archivo</button>
                                                <div class="table-responsive"><!-- inicio de table responsive -->
                                                        <!-- Tabla  -->
                                                        <table id="datos_media" class="table table-hover">
                                                            <!-- Encabezado -->
                                                            <thead ><!-- class="table-dark" -->
                                                                <!-- Creacion de fila de encabezados -->
                                                                <tr>
                                                                    <!-- Columnas -->
                                                                    <th><i class="bi bi-hash"></i> Id </th>
                                                                    <th><i class="bi bi-archive"></i> Archivo</th>
                                                                    <th><i class="bi bi-binoculars"></i> Examinar</th>
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
                <div class="modal fade" id="modalSubirMedia" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <!-- Colocando el nombre del modal para que el boton sepa que se va desplegar  -->
                                    <label for=""><i class="bi bi-flag-fill"></i>&nbsp;Media:</label> 
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                            </div>
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <!-- Creacion del formulario -->
                                        <form method="POST" id="formularioMediaCarrusel" enctype="multipart/form-data">
                                            <input type="hidden" name="idMedia" id="idMedia" class="form-control">
                                            <!-- <label for="descripcion"><i class="bi bi-list-ol"></i>&nbsp;Descripción:</label> 
                                            <input type="text" name="descripcion" id="descripcion" class="form-control" required> 
                                            <br/> -->
                                            <label for="ruta"><i class="bi bi-file-arrow-up"></i></i>&nbsp; Seleccione el Archivo a Subir:</label> <!-- icono estado -->
                                            <input type="file" class="form-control" id="ruta" name="ruta">
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

<!-- The Modal -->
<div id="modalMedia" class="modal-image">
  <span class="close-modal-image" id="cerrarModalImg">&times;</span>
  <div id="contenido">
  </div>
</div>

<!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body"> 
        <!-- DataTable Mensajes -->
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="bi bi-body-text"></i> &nbsp; Carrusel de Texto </h6>
        </div>
        <div class="card-body">
        <button id="crearMensaje" type="button" class="btn btn-outline-info btn-lg mb-2"><i class="bi bi-plus-circle mr-2"></i> Nuevo Mensaje</button>
                <div class="table-responsive"><!-- inicio de table responsive -->
                        <!-- Tabla  -->
                        <table id="datos_mensajes" class="table table-hover">
                            <!-- Encabezado -->
                            <thead ><!-- class="table-dark" -->
                                <!-- Creacion de fila de encabezados -->
                                <tr>
                                    <!-- Columnas -->
                                    <th><i class="bi bi-hash"></i> Id </th>
                                    <th><i class="bi bi-list"></i> Descripcion</th>
                                    <th><i class="bi bi-pencil-square"></i> Editar</th>
                                    <th><i class="bi bi-toggles"></i> Cambiar Estado</th>
                                </tr>
                            </thead>
                        </table>
                </div><!-- fin de table responsive -->
        </div>
    </div>

      <!-- Creacion del modal  -->  
        <div class="modal fade" id="modalMensajes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <!-- Colocando el nombre del modal para que el boton sepa que se va desplegar  -->
                            <label for=""><i class="bi bi-flag-fill"></i>&nbsp; Mensaje:</label> 
                            <button type="button" class="btn-close" data-bs-dismiss="modalMensajes" aria-label="Close"></button>
                        </div>
                    </div>
                        <div class="modal-content">
                            <div class="modal-body">
                                <!-- Creacion del formulario -->
                                <form method="POST" id="formularioMensajes" enctype="multipart/form-data">
                                    <input type="hidden" name="idMensajeCarrusel" id="idMensajeCarrusel" class="form-control">
                                    <label for="mensaje"><i class="bi bi-list"></i></i>&nbsp; Especifique el mensaje:</label> <!-- icono estado -->
                                    <textarea class="form-control" name="mensaje" id="mensaje" cols="30" rows="10" maxlength="300"></textarea>
                                    <div id="the-count">
                                        <span id="current">0</span>
                                        <span id="maximum">/ 300</span>
                                    </div>
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
    <script src="../../controllers/tb_carrusel.js"></script>

<!-- Llamdo del pie del documento -->
<?php
require 'footer.php';
?>