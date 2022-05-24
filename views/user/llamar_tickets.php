<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Portal del Instituto De La Propiedad HN">
    <meta name="author" content="">

    <title>Manejo de Tickets</title>
		<!-- Favicon   -->
		<link rel="icon" type="image/png" sizes="32x32" href="../../img/logoInstitucion/logo_sin_letras.png">
		<!-- Responsible  -->
    	<link href="../../assets/desingLogin2/bootstrap-3.2.0.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="../../assets/desingLogin2/bootstrap-3.2.0.min.js"></script> 
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
	<div class="abs-center-1">
		<div class="panel panel-info container" >
			<div class="row panel-heading"> <!-- iniciopanel-heading -->
			    </div>
						<div class="row panel-body" >
                            <div class="container-fluid">
                                <button id="btnEscanear" class="btn btn-outline-info btn-lg" style="background-color:#88cfe1; font-size:30px;"><i class="bi bi-qr-code" style="padding-right:5px;"></i>Escanear</button> 
                                <div class="row">
                                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                        <h2 id="numeroVentanilla" style="color: #000000; font-size:25px;"><b>Ventanilla 5</b></h2>
                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-right">
                                        <h2 id="horaActual" style="color: #000000; font-size:25px;">15/05/2022 15:30:06</h2>
                                    </div>
                                </div>
                                <div class="row">
                                    <h2 id="area" style="color: #000000; font-size:25px; margin-left: 15px;">Catastro</h2>
                                </div>
                                <div class="row">
                                    <p id="personasEspera" style="color: #000000; font-size:25px; margin-left:15px;">Personas en espera:</p>
                                </div>
                            </div>
							<div class="column text-center">
								<h1 style="color: #000000; font-size: 150px;"><b>TICKET</b></h1>
                                <h1 id="numeroTicket" style="font-size:150px; color: #000000">C005</h1>
							</div>
                            <div class="row">
                                <div class="col-3 col-sm-3">
                                <button id="btnPausa" type="button" class="btn btn-outline-info btn-lg login100-form-btn" style="width: 100%; background-color:#88cfe1; font-size:40px;" ><i class="bi bi-pause-btn-fill" style="padding-right:10px;"></i>Pausar</button>
                                </div>
                            <div class="col-3 col-sm-3">
                                <button id="btnSiguiente" type="button" class="btn btn-outline-info btn-lg login100-form-btn" style="width: 100%; background-color:#88cfe1; font-size:40px;"><i class="bi bi-telephone-fill" style="padding-right:10px;"></i>Siguiente</button>
                            </div>
                            <div class="col-3 col-sm-3">
                                <button id="btnReasignar" type="button" class="btn btn-outline-info btn-lg login100-form-btn" style="width: 100%; background-color:#88cfe1; font-size:40px "><i class="bi bi-pencil-square" style="padding-right:10px;"></i>Reasignar</button>
                            </div>
                            <div class="col-3 col-sm-3">
                                <button id="btnRellamado" type="button" class="btn btn-outline-info btn-lg login100-form-btn" style="width: 100%; background-color:#88cfe1; font-size:40px "><img src="../../img/desing/recall_icon.png" height ="40" width="40" style="margin-right:8px;"></img>Rellamado</button>
                            </div>
						</div>
        <!-- Modal Reasignación -->
        <div id="modalReasignacion" class="modal" aria-hidden="true" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <div class="modal-header">
                        <h3 class="modal-title" style="color:black; text-align:center;">Seleccione el área y el trámite para reasignado</h3>
                    </div>
                        <form action="POST" enctype="multipart/form-data">
                            <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="row text-center">
                                            <label for="Area" style="color:black;">Área:</label><br>
                                            <select class="form-select" aria-label="Default select example" name="Area" id="Area" style="width:300px; height:30px; color:black;">
                                                <option value="" style="color:black;">Seleccione un area a la cual remitir el ticket</option>
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
                                                <br>
                                            <label for="Tramite" style="color:black;">Trámite:</label><br>
                                            <select class="form-select" aria-label="Default select example" name="Tramite" id="Tramite" style="width:300px; height:30px; color:black;">
                                                <option value="">Seleccione el trámite</option>
                                                <?php
                                                    include("../../config/conexion.php");
                                                    $query = $conexion->prepare("SELECT idTramite,
                                                                                        nombreTramite,
                                                                                        descripcionTramite
                                                                                 FROM `tramite`");
                                                    $query->execute();
                                                    $data = $query->fetchAll();

                                                    foreach ($data as $valores):
                                                    echo '<option value="'.$valores["idTramite"].'">'.$valores["nombreTramite"].'</option>';
                                                    endforeach;
                                                    ?>
                                            </select>  
                                        </div>                                              
                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" class="btn btn-outline-info btn-lg" style="background-color:#88cfe1 !important;" value="Reasignar">
                                    </div>
                            </div>
                        </form> 
                </div>
            </div>     
        </div> <!-- Fin de modal -->

        <!-- Modal Rellamado -->
        <div id="modalRellamado" class="modal" aria-hidden="true" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <div class="modal-header">
                        <h3 class="modal-title" style="color:black; text-align:center;">Especifique el numero de ticket a llamar de nuevo</h3>
                    </div>
                        <form action="POST" enctype="multipart/form-data">
                            <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="row text-center">
                                            <label for="txtTicket" style="color:black;">Ticket:</label><br>
                                            <input type="text" id="txtTicket" style="color:black;">
                                        </div>                                              
                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" class="btn btn-outline-info btn-lg" style="background-color:#88cfe1 !important;" value="Rellamar">
                                    </div>
                            </div>
                        </form> 
                </div>
            </div>     
        </div> 
        <!-- Fin de modal -->
						 
						
			</div><!--fin panel-heading  -->                    
	</div><!-- Fin del div centrado mx-auto -->	
</body>
</html>
<script>
    var btnEscanear = document.getElementById("btnEscanear");
    var btnPausar = document.getElementById("btnPausa");
    var modalReasignar = document.getElementById("modalReasignacion");
    var btnReasignar = document.getElementById("btnReasignar");
    var modalRellamado = document.getElementById("modalRellamado");
    var btnRellamar = document.getElementById("btnRellamado");
    var btnLlamarSiguiente = document.getElementById("btnSiguiente")
    var spanCloseModalReasignar = document.getElementsByClassName("close")[0];
    var spanCloseModalRellamado = document.getElementsByClassName("close")[1];

    btnPausa.onclick = function(){
        if(btnPausar.textContent === "Pausar"){
            btnPausar.innerHTML = '<i class="bi bi-play-btn-fill" style="padding-right:10px;"></i>Reanudar'
            btnPausar.style.background = 'red';
        }else
        if(btnPausar.textContent === "Reanudar"){
            btnPausar.innerHTML = '<i class="bi bi-pause-btn-fill" style="padding-right:10px;"></i>Pausar';
            btnPausar.style.background = 'green';
        }
    }

    btnEscanear.onclick = function(){
        Swal.fire({
            title: 'Por favor escanee el codigo QR del ticket.',
            input: 'text',
            inputAttributes: {
                editable: 'false'
            }
        })
    }
    

    btnLlamarSiguiente.onclick = function(){
    }

    btnReasignar.onclick = function(){
        modalReasignar.style.display = "block";
    }

    btnRellamado.onclick = function(){
        modalRellamado.style.display = "block";
    }

    //cerrar modal al presionar fuera del mismo
    window.onclick = function(){
        if(event.target == modalReasignar){
            modalReasignar.style.display = "none";
        }
        if(event.target == modalRellamado){
            modalRellamado.style.display = "none";
        }
    }

    //cerrar modal con boton de X
    spanCloseModalReasignar.onclick = function() {
        modalReasignar.style.display = "none";
    }

    spanCloseModalRellamado.onclick = function(){
        modalRellamado.style.display = "none";
    }

</script>