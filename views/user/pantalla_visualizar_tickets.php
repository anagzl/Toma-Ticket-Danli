<!DOCTYPE html>
<html lang="es" style="scrollbar-width : none; overflow:hidden;">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="">


    <title>Visualización de Tickets</title>
		<!-- Favicon   -->
        
		<link rel="icon" type="image/png" sizes="32x32" href="../../img/logoInstitucion/logo_sin_letras - copia.png">
		<!-- Responsible  -->
    	<link href="../../assets/desingLogin2/bootstrap-3.2.0.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="../../assets/desingLogin2/jquery-1.11.1.min.js"></script>
		<script src="../../assets/bootstrap/js/bootstrap.min.js"></script> 
        <script src="../../assets/sweetalert2/dist/sweetalert2.all.min.js"></script>
		<!-- Login  -->
		<link href="../../assets/desingLogin2/login.css" rel="stylesheet" id="bootstrap-css">
		<script src="../../assets/desingLogin2/login.js"></script>
		<link href="../../assets/desingLogin2/reloj.css" rel="stylesheet">
		<script src="../../assets/desingLogin2/reloj.js"></script>
		<!-- Icons bootstrap -->
		<link rel="stylesheet" href="../../assets/bootstrap-icons-1.8.1/bootstrap-icons.css"> 
        <!-- Valores globales scss -->
        <link rel="stylesheet" href="../../assets/global.scss"> 
</head>

<body>
    <div class="panel panel-info">
        <div class="row panel-heading">
            <div class="row text-center">
                <img class="sidebar-card-illustration mb-2"  width="30%" height="0%" src="../../img/logoInstitucion/LOGO IP 3-03.png" alt="...">
            </div>
        </div>
        <div class="container-fluid" style="height:550px;"> <!-- Container start -->
            <div class="row panel-body">
                <div class="col-md-4">
                    <div class="row text-center" style="margin-top:-5%;">
                        <div class="col-md-12">
                            <!-- <p style="color:black; font-size:250%; margin:0">TICKET:</p>
                            <p id="numeroTicket" style="color:black; font-size:300%; margin:0;">...</p>
                            <p style="color:black; font-size:250%; margin:0;">Favor pasar a:</p>
                            <p id="numeroVentanilla" style="color:black; font-size:310%; margin:0;">Ventanilla</p> -->
                        </div>
                    </div>
                    <div class="row text-center" >
                        <div class="col-md-12">
                            <p style="color:black; font-size:250%; margin:0">Historial de Tickets</p>
                            <div class="table-responsive">
                                <table id="tablaTickets" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="color:white; background:#88CFE1; text-align:center; font-size:125%;">TICKET</th>
                                            <th style="color:white; background:#88CFE1; text-align:center; font-size:125%;">VENTANILLA</th>
                                        </tr>
                                    </thead>
                                    <tbody id="bodyTablaTicketsLlamados">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8" >
                    <video  width="100%" height="150%" controls>
                    </video> 
                </div>
            </div>
                <footer class="footer bg-white" style="position: fixed;
                                                    left: 0;
                                                    bottom: 0;
                                                    width: 100%;
                                                    background-color: #88CFE1;
                                                    text-align: center;">
                    <div class="row text-center">
                        <div class="col-sm-1">
                            <img src="../../img/logoInstitucion/logo_sin_letras.png" width="65%;" height="100%;">  
                        </div>
                        <div class="col-sm-11">
                            <div class="text-center" style="font-size:100%">
                            IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM
                            </div>
                        </div>
                    </div>
                </footer>
            
        </div><!-- Container end -->	
    </div>


</body>
</html>
<script type="text/javascript" src="../../controllers/visualizar_tickets_controller.js"></script>
