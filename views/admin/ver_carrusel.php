<!-- Llamado de la cabeza del -->
<?php
require 'header.php';
?>


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
                                                <!-- DataTales Example -->

                                                    <div class="card-header py-3">
                                                        <h6 class="m-0 font-weight-bold text-primary"><i class="bi bi-film"></i> &nbsp; Media Carrusel </h6>
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
                                                                                <th><i class="bi bi-list-check"></i> Nombre </th>
                                                                                <!-- <th><i class="bi bi-geo-alt-fill"></i> Borrar</th> -->
                                                                                <th><i class="bi bi-pencil-square"></i> Acciones</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <?php
                                                                            $path    = './../../files/carruselMedia';
                                                                            $files = scandir($path);
                                                                            $files = array_diff(scandir($path), array('.', '..'));
                                                                            $i = 0; 
                                                                        foreach($files as $file):
                                                                            ?><tr>  
                                                                                <td><?=$file;?></td>
                                                                                <td>
                                                                                    <button type="button" name="examinar" id="<?=$file;?>" class="btn btn-info btn-xs editar mr-2" style="color:white;"><i class="bi bi-search"></i> Examinar </button>
                                                                                    <button type="button" name="borrar" id="<?=$file;?>" class="btn btn-danger borrar"><i  class="bi bi-x-circle"></i> Borrar </button>
                                                                                </td>
                                                                            </tr>
                                                                        <?php  
                                                                        endforeach;?>
                                                                        </tbody>
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

        <!-- Modal para mostrar  -->
        <div class="modal fade" id="modalMedia" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>                                         
                    </div>
                    <img id="imgModal">
                </div>
            </div>
        </div>

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
    <script src="../../controllers/tb_carrusel.js"></script>

<!-- Llamdo del pie del documento -->
<?php
require 'footer.php';
?>