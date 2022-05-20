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
				    <div class="row ">
					    <div class="text-center">
					    </div>
					    <br>
				    </div>
			    </div>
						<div class="row panel-body" >
                            <div class="row text-right">
                                <h2 class="mr-4"style="color: #88cfe1; font-size: 45px;">15/05/2022 15:30:06</h2>
                            </div>
							<div class="row text-center">
								<h1 style="color: #88cfe1; font-size: 150px;"><b>TICKET</b></h1>
							</div>
							<div class="row text-center ">
                                <h1 style="font-size:150px; color: #88cfe1">C005</h1>
							        <div class="w-100"></div>
							</div>
                            <div class="row">
                                <div class="col-4 col-sm-4">
                                <button type="button" class="btn btn-outline-info btn-lg login100-form-btn" style="width: 100%; background-color:#88cfe1;" ><P style="font-size:40px">Terminar</P></button>
                                </div>
                            <div class="col-4 col-sm-4">
                                <button type="button" class="btn btn-outline-info btn-lg login100-form-btn" style="width: 100%; background-color:#88cfe1;"><i class="bi bi-telephone-fill"></i><P style="font-size:40px">Siguiente</P></button>
                            </div>
                            <div class="col-4 col-sm-4">
                                <button id="btnReasignar" type="button" class="btn btn-outline-info btn-lg login100-form-btn" style="width: 100%; background-color:#88cfe1;"><i class="bi bi-pencil-square"></i><P style="font-size:40px">Reasignar</P></button>
                            </div>
						</div>

        <!-- Modal -->
        <div id="modal" class="modal" tabindex="-1">
            <div class="modal-dialog">
                <form action="POST">
                    <div class="modal-content">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <h3 style="color:black; text-align:center;">Seleccione el área y el trámite</h3>
                                    <div class="row text-center">
                                        <label for="Area" style="color:black; padding-right:">Área:</label>
                                            <select class="form-select" aria-label="Default select example" name="Area" id="Area" style="width:300px; height:30px;">
                                                <option value="">Seleccione un area a la cual remitir el ticket</option>
                                            </select>
                                    </div>
                                    <p></p>
                                    <div class="row text-center">
                                        <label for="Tramite" style="color:black;">Trámite:</label>
                                            <select class="form-select" aria-label="Default select example" name="Tramite" id="Tramite" style="width:300px; height:30px;">
                                                <option value="">Seleccione el trámite</option>
                                            </select>
                                    </div>                                                   
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-primary" value="Reasignar">
                            </div>
                    </div>
                </form> 
            </div>     
        </div>
						 
									
			</div><!--fin panel-heading  -->                    
	</div><!-- Fin del div centrado mx-auto -->	
</body>
</html>
<script>
    var modal = document.getElementById("modal");
    var btn = document.getElementById("btnReasignar");

    btn.onclick = function(){
        modal.style.display = "block";
    }

    window.onclick = function(){
        if(event.target == modal){
            modal.style.display = "none";
        }
    }

    
</script>