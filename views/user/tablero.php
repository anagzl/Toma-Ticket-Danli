
<!-- Llamado de la cabeza del -->
<?php
require 'header.php';
?>


<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
                        <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><i class="bi bi-clipboard-fill"></i> Tablero Personal </h1>
                    <p class="mb-4">Área donde se puede visualizar y dar seguimiento a determinados indicadores de asistencia y desempeño.</p>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body"> 
                            <!-- Begin Page Content -->
                            <div class="container-fluid">
                                <!-- Page Heading -->
                                                <!-- DataTales Example -->
                                                    <div class="card-header py-3">
                                                        <h6 class="m-0 font-weight-bold text-primary"><i class="bi bi-calendar4-week"></i> &nbsp; Bitácora De Asistencia Personal</h6>
                                                    </div>
                                                    <div class="card-body">
                                                            <div class="table-responsive"><!-- inicio de table responsive -->
                                                                    <!-- Tabla  -->
                                                                    <table id="datos_asistencia_usuario" class="table table-hover">
                                                                        <!-- Encabezado -->
                                                                        <thead ><!-- class="table-dark" -->
                                                                            <!-- Creacion de fila de encabezados -->
                                                                            <tr>
                                                                                <!-- Columnas -->
                                                                                <th><i class="bi bi-calendar-week-fill"></i> Fecha</th>
                                                                                <th><i class="bi bi-alarm-fill"></i> Hora</th>
                                                                                <th><i class="bi bi-sunglasses"></i> Tipo De Asitencia</th>
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


<!-- Modal -->
<div class="modal fade" id="modalnotificacionesRRHH" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"> <strong>Comunicación Institucional  RRHH </strong> </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="row ">                
			<div class="text-center">
						<img class="sidebar-card-illustration mb-2"  width="480" height="110" src="../../img/logoInstitucion/Nuevo Logo IP 2022 Horizontal.png" alt="...">
			</div>
            <br>
            <p>
            El Sistema de Control de Personal (SCP) es un programa diseñado para asistir en la gestión de Control Horario y de Asistencia de Personal, agilizando el proceso administrativo para el proceso de incidencias de empleados, además de disminuir la probabilidad de errores humanos y validar la autenticidad del registro de entrada y salida de cada empleado de forma fácil, eficaz y eficiente.
            </p>
            <p>Para su correcto uso debe leer los manueles de uso del sistema. Ubicado en apartado de  <a href="ver_faqs.php" target="_blank">FAQs</a>
             en el menú lateral izquierdo en el Sistema Control De Personal. O en la parte superior derecha en Ver Manualas del  <a href="http://portal.ip.gob.hn/" target="_blank">portal.ip.gob.hn</a>. 

            </p>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn  btn-outline-info  btn-lg" data-bs-dismiss="modal">Close</button>
      <!--   <button type="button" class="btn btn-primary">Understood</button> -->
      </div>
    </div>
  </div>
</div>

</div>
<!-- End of Main Content -->
    <!-- Jquery  -->
    <script src="../../assets/jquery-3.6.0/jquery-3.6.0.min.js"></script>

    <!-- Data tables -->
    <script charset="utf8"  src="../../assets/datatables/js/jquery.dataTables.min.js" ></script>
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script> 

    <!--  Bootstrap  -->
    <script src="../../assets/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>

    <!--  Controlador para ver asistencia  -->
    <script src="../../controllers/tb_asistencia_usuario.js"></script>

<!-- Llamdo del pie del documento -->
<?php
require 'footer.php';
?>