<!-- 
     * Formato de funcion para carga de informacion de cliente 
     *
     * @Autor: Ana Zavala
     * @Fecha Creacion: 23/05/2022
     * @Autor Revision: Ana Zavala
    
     -->


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Portal del Instituto De La Propiedad HN">
    <meta name="author" content="">

    <title>Servicios </title>
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
		<div class="panel panel-info container">
			<div class="row panel-heading">
			<!-- <a href="ver_manuales.php" data-toggle="tooltip" data-placement="top" title="Ver Manuales para el uso correcto del sistema" style="color: #FFF;" ><i class="bi bi-info-square-fill"></i> Ver Manuales</a> -->
				<div class="row ">
					<div class="text-center">
						<img class="sidebar-card-illustration mb-2"  width="400" height="80" src="../../img/logoInstitucion/LOGO IP 3-03.png" alt="...">
					</div>
					<br>
				</div>
		        </div>
<!--   inicio modal -->
             <!--    <div class="modal-content"> -->
                    <div class="row panel-body" >
                        <div class="row text-center">
                        <!-- Crea una Cookie con un tiempo de 4 minutos -->
				<?php							
				setcookie("PRESENTAR", 1 , time()+ 60); 
              
				?>
                          <h1 style="color: #88cfe1;"><b> Ingrese su número de identidad: </b></h1> 
                             <input type="text" name="idUsuario" id="idUsuario"  style="width:400px; height:30px;color:black;"> 

                             <h1 style="color: #88cfe1;"><b> Ingrese su tipo de institucion: </b></h1> 
                             <input type="text" name="Instituciones_idInstituciones" id="Instituciones_idInstituciones"  style="width:400px; height:30px;color:black;">
                           
                       
                          <div class="row text-center">
					             
                                            
										    <br>
                                            
                                            <input type="submit" class="btn btn-outline-info btn-lg" style="background-color:#88cfe1 !important;" name="Aceptar" onclick="hizoClick()" value="Aceptar"> 
                        
                                            </div> 
                                            </div> 
                                            <!--  validar que se ingresen todos los registros -->
                                            <script>
                                                
                                            function hizoClick() {
                                            var idUsuario = document.getElementById("idUsuario").value;
                                            var TipoUsuario_idTipoUsuario = document.getElementById("Instituciones_idInstituciones").value;




                                            if (idUsuario == "" || TipoUsuario_idTipoUsuario == "") {
                                                alert("Debes completar  campos" ); 
                                           /*validar que se si Existe o No el Cliente*/
                                                } 
                                            else {
                                             

                                                // obtener datos de Usuario 
                                            $.get(`obtener_ingreso_cliente.php?idUsuario=${idUsuario}`,function(data,status){
                                                var usuarioJson = JSON.parse(data);
                                              if(usuarioJson == ""){
                                               alert("Cliente NO Registrado")

                                        

                                      /*  desplega modal para llenado de datos cliente */
                                           document.getElementById("modal").style.display = 'block'
                              
                                    }
                                            });
                                            }

                                            }
                                            </script>        
  </div>
                                   </div>
                                        </div>
                                             </div> <!-- fin footer -->


                   <!--  <label for="idUsuario"><i class="bi bi-gender-ambiguous"></i>&nbsp;Crear:</label>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                   
                                                                
          <!-- Modal llenado datos usuario -->
                 <div class="modal" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                   <div class="modal-dialog"> 
                     <div class="modal-content">
				      <span class="close">&times;</span> <!-- cerraR de la X -->
                      <div class="modal-header"> 
                      <!-- <form action="obtener_ingreso_cliente.php" method="POST"> -->
				      <h3 class="modal-title" style="color:black; text-align:center;">Por Favor Proporcione los siguientes datos</h3> 
                      
					  </div>
				   <!--  creacion de formulario -->
                        <form method="POST"  id="formularioCreacioningreso_cliente" enctype="multipart/form-data"
                         onsubmit="event.prevetDefault(); sendDataProduct()">
                            <div class="modal-content">
                                    <div class="modal-body">	
									<form>
									    <div class="mb-3">
									
                                        <label for="primerNombre" style="color:black;">Nombre:</label><br>
                                        <div class = "form-group"> 
										
                                        <input type="text"  placeholder = "Primer nombre " name="primerNombre" id="primerNombre"  required style="width:150px height:30px;color:black; ">
                                        <input type="text"  placeholder = "Segundo nombre " name="segundoNombre" id="segundoNombre" required  style="width:51px height:30px;color:black;">
										<br>
										<label for="primerApellido" style="color:black;">Apellido:</label><br>
                                        <input type="text"  placeholder = "Primer Apellido " name="primerApellido" id="primerApellido" required style="width:50px height:30px;color:black;">
										<input type="text"  placeholder = "Segundo Apellido " name="segundoApellido" id="segundoApellido"  required style="width:50px height:30px;color:black;">
										<br>
										<label for="numeroCelular" style="color:black;">Celular:</label><br>
                                        <input type="text"  placeholder = "Celular" name="numeroCelular" id="numeroCelular" required  style="width: 412px; height:30px;color:black;">
										<br>
										<!-- <br>
										<label for="Telefono" style="color:black;">Telefono:</label><br>
                                        <input type="text"  placeholder = "Telefono Fijo" name="Telefono_fijo" id="Telefono_fijo"  style="width: 350px; height:30px;color:black;"> -->
										
										<br>
										<label for="correo" style="color:black;">Correo Electronico:</label><br>
                                        <input type="text"  placeholder = "Correo Electronico" name="correo" id="correo" required style="width:412px; height:30px;color:black;">
										<br>
									
                                        <label for="idGenero" style="color:black;">Genero:</label><br>
                                                 <select class="form-select" aria-label="Default select example" name="idGenero"id="idGenero" style="width:412px; height:30px;color:black;">
                                        </div> 
                                        <option value="idGenero">Seleccione el Genero</option>
										<br>
										<?php
                                        include("../../config/conexion.php");
                                        $query = $conexion->prepare("SELECT idGenero,nombre,siglas FROM genero");
                                        $query->execute();
                                        $data = $query->fetchAll();
                                            foreach ($data as $valores):
                                                echo '<option value="'.$valores["idGenero"].'">'.$valores["nombre"].'</option>';
                                            endforeach;
											?>
										</div>
										<div class="mb-3">
                                        </select>          
                                         <br>
										
										<label for="idTipoUsuario" style="color:black;">Tipo de Cliente:</label><br>
                                                 <select class="form-select" aria-label="Default select example" name="idTipoUsuario" id="idTipoUsuario" style="width:412px; height:30px;color:black;">
                                         </div> 
										 <br>
                                        <option value="TipoUsuario_idTipoUsuario">Seleccione el Tipo de Cliente</option>
										<?php
                                        include("../../config/conexion.php");
                                        $query = $conexion->prepare("SELECT idTipoUsuario,nombre FROM tipousuario");
                                        $query->execute();
                                        $data = $query->fetchAll();
                                            foreach ($data as $valores):
                                                echo '<option value="'.$valores["idTipoUsuario"].'">'.$valores["nombre"].'</option>';
                                            endforeach;
											?>
											</select>
                                            <br>
										<br>
                                            <label for="Rol_idRol" style="color:black;">Rol:</label>
                                            <br>
                                        <input type="text"  placeholder = "Rol_idRol" name="Rol_idRol" id="Rol_idRol" required style="width:412px; height:30px;color:black;">
										<br>
									
											<br>
									     <div class="modal-footer">
										<!--  <div class="row text-center">
                                       -->
                                       
                                          <!--   <input type="hidden" name="idUsuarios" id="idUsuarios"> -->

                                         <!-- <button type="button" class="btn btn-secondary btn-lg" style="background-color:#88cfe1 !important; " onclick=" CrearrModal();"><i class= "bi bi-plus-circle-fill"> </i>Aceptar</button>  -->
<!--                                             <input type="submit"  class="btn btn-outline-info btn-lg" style="background-color:#88cfe1 !important;" class= "bi bi-plus-circle-fill" name="Aceptar" onclick="hizoClick()" value="Aceptar"> -->
                                            <button   type="submit"  class="btn btn-outline-info btn-lg" style="background-color:#88cfe1 !important;" onclick="registrar();" name="operacion" id="operacion"  class="btn btn-primary">Aceptar</button> 

                                           <!-- <input  type="button" name="imprimir" value="Imprimir" onclick="window.print();"> -->
                                             <button type="button" class="btn btn-secondary btn-lg" style="background-color:#FF0000 !important; " onclick=" coloseModal();"><i class= "bi bi-x-circle-fill"> </i>Cerrar</button> 
                                             

                                    </div>
                            </div>
                        </form> 
                </div>
            </div>     
		                    </div>
							         

						        	</div>
						  </div>
						                </div>
										</div>
										</div>

        </div> <!-- Fin de modal -->


 </body>
</html>
<script>
    var modal = document.getElementById("modal");

    var btnAceptar = document.getElementById("btnAceptar");  
 var spanClosemodal = document.getElementsByClassName("close")[0];
  

    //cerrar modal con boton
  function coloseModal(){
      $('.modal').fadeOut ();


  }
 /*  function CrearrModal(){
      $('.modal').fadeIn ();
  } */
    window.onclick = function(){
        if(event.target == modal){
            modal.style.display = "none";
       
        }
    } //cerrar modal con boton de la X
 spanClosemodal.onclick = function() {
        modal.style.display = "none";
    }

</script>
						 


<script src="../../controllers/tb_ingreso_cliente.js"></script>