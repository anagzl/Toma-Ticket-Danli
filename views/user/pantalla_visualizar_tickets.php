<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="es" style="scrollbar-width : none; overflow:hidden;">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Portal del Instituto De La Propiedad HN">
    <meta name="author" content="">


    <title>Visualización de Tickets</title>
		<!-- Favicon   -->
        
		<link rel="icon" type="image/png" sizes="32x32" href="../../img/logoInstitucion/logo_sin_letras - copia.png">
		<!-- Responsible  -->
    	<link href="../../assets/desingLogin2/bootstrap-3.2.0.min.css" rel="stylesheet" id="bootstrap-css">
        <link href="../../assets/desingLogin2/rowPrueba.css" rel="stylesheet">
		<script src="../../assets/bootstrap/js/bootstrap.min.js"></script> 
		<script src="../../assets/desingLogin2/jquery-1.11.1.min.js"></script>
        <script src="../../assets/sweetalert2/dist/sweetalert2.all.min.js"></script>
		<!-- Login  -->
		<link href="../../assets/desingLogin2/login.css" rel="stylesheet" id="bootstrap-css">
		<script src="../../assets/desingLogin2/login.js"></script>
		<link href="../../assets/desingLogin2/reloj.css" rel="stylesheet">
		<script src="../../assets/desingLogin2/reloj.js"></script>
		<!-- Icons bootstrap -->
		<link rel="stylesheet" href="../../assets/bootstrap-icons-1.8.1/bootstrap-icons.css"> 
</head>

<body>
    <div class="panel panel-info">
        <div class="row panel-heading">
            <div class="row text-center">
                <img class="sidebar-card-illustration mb-2"  width="400" height="80" src="../../img/logoInstitucion/LOGO IP 3-03.png" alt="...">
            </div>
        </div>
        <div class="container-fluid"> <!-- Container start -->
            <div class="row panel-body">
                <div class="col-md-4">
                    <div class="row text-center" style="margin-top:-20px;">
                        <div class="col-md-12">
                            <p style="color:black; font-size:50px; margin:0">TICKET:</p>
                            <p id="numeroTicket" style="color:black; font-size:100px; margin:0;">...</p>
                            <p style="color:black; font-size:50px; margin:0;">Favor pasar a:</p>
                            <p id="numeroVentanilla" style="color:black; font-size:90px; margin:0;">Ventanilla</p>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table id="tablaTickets" class="table table-striped tabled-bordered">
                                    <thead>
                                        <tr>
                                            <th style="color:white; background:#88CFE1; text-align:center; font-size:30px;">TICKET</th>
                                            <th style="color:white; background:#88CFE1; text-align:center; font-size:30px">VENTANILLA</th>
                                        </tr>
                                    </thead>
                                    <tbody id="bodyTablaTicketsLlamados">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <video class="h-100" width="1030" height="670" controls>
                    </video> 
                </div>
            </div>
        </div><!-- Container end -->
        <div class="row panel-info panel-heading">
				<footer class="sticky-footer bg-white ">
                    <div class="row text-center">
                        <div class="col-lg-11">
                            <div class="container my-auto">
                            LOREM IPSUM LOREM IPSUM LOREM IPSUMLOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <img src="../../img/logoInstitucion/logo_sin_letras.png" width="60px;" height="60px;">  
                        </div>
                    </div>
				    
				</footer>
		</div>
        <!--fin panel-heading  -->
    </div>


</body>
</html>
<script type="text/javascript" src="../../controllers/visualizar_tickets_controller.js"></script>
