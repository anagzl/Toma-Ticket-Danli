<?php
/**
 * Validacion de hora y fecha de asistencia.
 * @Autor:Ana
 * @Fecha Creacion: 25/05/2022
 * 
**/

// Desactivar toda las notificaciónes del PHP
error_reporting(0);

//Para traer datos de sesion para la vista
/* session_start(); */

/**
 * Definir las intancias a utilizar para el funcionamiento
 **/
	require_once "../models/registrar_asistencia_models.php";

	$asistencia=new asistencia();
	$codigo_persona=isset($_POST["Usuario_id_numero_identidad"])? limpiarCadena($_POST["Usuario_id_numero_identidad"]):"";

	/* Verificar si la persona existe en el sistema  si exiteste entra al if sino tira un msj de identidad no encontrado */
		/* Prueba de envio */
/*  		$codigo_persona="0801199601821"; */

		$result=$asistencia->verificar_numero_identidad($codigo_persona);
		$result ? $Encontrado=True: $Encontrado=False ;
/* 		echo $result ? "Encontrado ".$Encontrado=True."<br/>" : "No Encontrado ".$Encontrado=False ."<br/>";
*/

/* 		if($Encontrado){
			echo "Identidad encontrada: ".$Encontrado."<br/>";
		}else{
			echo "Identidad encontrada bandera: ".$Encontrado."<br/>";
		} */

	if($Encontrado) {
/* 		echo "Prueba de verificacion de identidad ".$_SESSION["verificar_numero_identidad"]; */
			/* Definicion de formato de hora */
			date_default_timezone_set('America/Tegucigalpa');
			$fecha =  date("Y-m-d ");

			/* Captura de la hora, minutos, segundos*/
			$HoraActual = intval(date("H")); //  hora actual 
			$MinutoActual = intval(date("i")); // minuto actual
			$segundosActual =intval(date("s")); //segundo actual 

			/* Configuracion de restriccion de hora inicio laboral  */
			$restrinccion=$asistencia->verificar_tipo_empleado_control_horas($codigo_persona);
			/* Entrando al if  */
			$restrinccion ? $EncontradoTipoEmpleadoControlHoras=True : $EncontradoTipoEmpleadoControlHoras=False ;

/* 			$reg_restrinccion=$restrinccion->fetch_object(); */
			/*$inicioHoraLaboral= 8; # Desde las ocho de la mañana.
			$minutoMaximo= 5; # Hasta 5 minutos */
			if($EncontradoTipoEmpleadoControlHoras){
/* 				$idTipoEmpleadoControlHoras=$reg_restrinccion->idTipoEmpleadoControlHoras;
				$inicioHoraLaboral= $reg_restrinccion->horaInicioLaboral;
				$minutoMaximo= $reg_restrinccion->minutoMaxiParaEntrarNormal;
				$finHoraLaboral= $reg_restrinccion-> horafinLaboral;
				$minutosPorMes= $reg_restrinccion-> minutosPorMes;  */

				include("../config/conexion.php"); 

				$query = $conexion->prepare("SELECT
					tech.idTipoEmpleadoControlHoras as idTipoEmpleadoControlHoras,
					tech.minutosPorMes as minutosPorMes,
					tech.minutoMaxiParaEntrarNormal as minutoMaxiParaEntrarNormal,
					tech.horaInicioLaboral as horaInicioLaboral,
					tech.horafinLaboral as horafinLaboral
				FROM
					usuario AS u
				INNER JOIN tipoempleadocontrolhoras AS tech
				ON
					u.TipoEmpleadoControlHoras_idTipoEmpleadoControlHoras = tech.idTipoEmpleadoControlHoras
				WHERE
					id_numero_identidad = '$codigo_persona'
					");
		
					$query->execute();
					$data = $query->fetchAll();
		
				foreach ($data as $valores):
					$idTipoEmpleadoControlHoras=$valores["idTipoEmpleadoControlHoras"];
					$inicioHoraLaboral= $valores["horaInicioLaboral"];
					$minutoMaximo= $valores["minutoMaxiParaEntrarNormal"];
					$finHoraLaboral= $valores["horafinLaboral"]  ;
					$minutosPorMes= $valores["minutosPorMes"];
				endforeach;

			}else{
				//por defecto
				$inicioHoraLaboral= 8; # Desde las ocho de la mañana.
				$minutoMaximo= 5; # Hasta 5 minutos
				$finHoraLaboral= 17; # Hata las 5 es la salida normal las ocho de la mañana.
				$minutosPorMes= 120;
				$idTipoEmpleadoControlHoras=1;
			}

/*  			echo "<br/>";
			echo "idTipoEmpleadoControlHoras ".$idTipoEmpleadoControlHoras."<br/>";
			echo "inicioHoraLaboral ".$inicioHoraLaboral."<br/>";
			echo "minutoMaximo ".$minutoMaximo."<br/>";
			echo "finHoraLaboral ".$finHoraLaboral."<br/>";
			echo "minutosPorMes ".$minutosPorMes."<br/>";  */


			/* Restriccion de hora de salida  */
			$finPlazoMarcoIngresoLaboral= 9; # Desde las ocho de la mañana.
			$horafinPlazoMarcoSalidaLaboral= 23; # Maximo de hora marcada es a las 23:59:59 pm
			$minutofinPlazoMarcoSalidaLaboral= 59;
			$segundofinPlazoMarcoSalidaLaboral= 59;

			/* Hora de visualizador de msj */
			$hoy_ver = $HoraActual.":".$MinutoActual.":".$segundosActual;
			/*Hora formateada del dia de hoy  */
			$hoy_ver =date("h:i:s A");

			/* Verificacion de si se realizo el registro de entrada de la persona con la identidad */
			$respuesta_verificar_entrada=$asistencia->verificar_entrada($codigo_persona,$fecha);
			$reg=$respuesta_verificar_entrada->fetch_object();

			/* Validacion de si el registro $reg->tipo == 0 el usuario no ha ingresado una entrada en el dia de hoy */
			if( (intval($reg->tipo) == 0) ){
					/* Comprobacio de registro de hora normal con las condiciones de marcaje favorable */
					if((($HoraActual ==  $inicioHoraLaboral) && ($MinutoActual <=  $minutoMaximo)) || (($HoraActual <  $inicioHoraLaboral) && ($MinutoActual >=  0))){
						$tipo =1; /* ENTRADA */
						$rspta=$asistencia->registrar_entrada($codigo_persona,$tipo);
						echo $rspta ? '<div class="alert alert-success"> Bienvenido, Ingreso de entrada registrado a las <i class="bi bi-watch"></i> '.$hoy_ver.'</div>
						<script>
						Swal.fire(
							"Marcado de entrada registrado",
							"Registrado a las '.$hoy_ver.' ",
							"success"
						);
						</script>':
						'No se pudo registrar el ingreso entrada tarde.';

					}elseif ((($HoraActual >= $inicioHoraLaboral) && ($MinutoActual >  $minutoMaximo))) {
						$tipo =3;/*ENTRADA TARDE  */
						$rspta=$asistencia->registrar_entrada($codigo_persona,$tipo);
						echo $rspta ? '<div class="alert alert-warning"> Bienvenido, Ingreso de entrada tardia registrado a las <i class="bi bi-watch"></i> '.$hoy_ver.'</div>
						<script>
						Swal.fire(
							"Marcado de entrada tardia registrado",
							"Registrado a las '.$hoy_ver.'",
							"success"
						);
						</script>
						' :
						'No se pudo registrar el ingreso entrada tarde.';

						/* Logica de disminucion de minutos mensuales por llegar tarde   */
						$AnioActual = intval(date("Y")); //  anio yyyy actual
						$mesActual = intval(date("m")); // mes en numeros

							include("../config/conexion.php"); 

							$query = $conexion->prepare("SELECT
															minutosDelMesRestantes,
															segundosDelMesRestantes
														FROM
															tablabitacoraminutosdelmesempleadosparasanciones
														WHERE
															Usuario_id_numero_identidad='$codigo_persona'
															AND fechaAño='$AnioActual'
															AND fechaMes='$mesActual'
								");
					
								$query->execute();
								$data = $query->fetchAll();
					
								/* Captura de dato de  antes de actualizar */
							foreach ($data as $valores):

								if($minutosDelMesRestantes==null && $segundosDelMesRestantes==null){
									$minutosDelMesRestantes= $minutosPorMes;
									$segundosDelMesRestantes= 0;
								}else{
									$minutosDelMesRestantes= $valores["minutosDelMesRestantes"];
									$segundosDelMesRestantes= $valores["segundosDelMesRestantes"];
								}
							endforeach;


							if(is_null($minutosDelMesRestantes)){
/* 								echo "<br/> Entro a crecion de bitacora del mes "; */
								$creacion_bitacora_del_mes_usuario=$asistencia->registrar_tabla_bitacora_minutos_del_mes_empleados_para_sanciones(
									$codigo_persona,
									$AnioActual,
									$mesActual,
									$minutosPorMes,
									$inicioHoraLaboral,
									$minutoMaximo,
									$HoraActual,
									$MinutoActual,
									$segundosActual);
							}else{
								//hay registro del mes proceder a restar
								$actualizar_bitacora_usuario=$asistencia->actualizacion_tabla_bitacora_minutos_del_mes_empleados_para_sanciones(
									$codigo_persona,
									$AnioActual,
									$mesActual,
									$minutosDelMesRestantes,
									$segundosDelMesRestantes,
									$inicioHoraLaboral,
									$minutoMaximo,
									$HoraActual,
									$MinutoActual,
									$segundosActual);
							}


						include("../config/conexion.php"); 

						$query = $conexion->prepare("SELECT
														minutosDelMesRestantes,
														segundosDelMesRestantes
													FROM
														tablabitacoraminutosdelmesempleadosparasanciones
													WHERE
														Usuario_id_numero_identidad='$codigo_persona'
														AND fechaAño='$AnioActual'
														AND fechaMes='$mesActual'
							");

							$query->execute();
							$data = $query->fetchAll();

							/* Captura de dato de  antes de actualizar */
						foreach ($data as $valores):
							$minutosDelMesRestantesMsj= $valores["minutosDelMesRestantes"];
							$segundosDelMesRestantesMsj= $valores["segundosDelMesRestantes"];
						endforeach;

						echo $rspta ? '<div class="alert alert-warning"><i class="bi bi-megaphone-fill"></i> Minutos de gracia del mes fueron actualizados, aún  dispone de  <i class="bi bi-clock-history"></i> '.$minutosDelMesRestantesMsj .' minutos y '.$segundosDelMesRestantesMsj .' segundos  de llegar a negativo se tendra una penalización monetaria. <i class="bi bi-emoji-frown-fill"></i> </div>
						<script>
						Swal.fire(
							"Marcado de entrada tardia registrado",
							"Registrado a las <i class="bi bi-watch"></i> '.$hoy_ver.'",
							"success"
						);
						</script>
						' :
						'No se pudo registrar el ingreso entrada tarde.';

					}

				}else{
					$formatoFecha=strtotime($reg ->fecha);
					if( $formatoFecha == strtotime($fecha)){
						if ((intval($reg->tipo) ==1 || intval($reg->tipo) ==3)) {
							if (($HoraActual <  $finHoraLaboral)) {
								$tipo = 2;/*SALIDA  */
								$rspta=$asistencia->registrar_salida($codigo_persona,$tipo);
								echo $rspta ? '<div class="alert alert-success"> Salida registrada a las <i class="bi bi-watch"></i> '.$hoy_ver.'</div> 
								<script>
								Swal.fire(
									"Marcado de salida  registrado",
									"Registrado a las  <i class="bi bi-watch"></i>'.$hoy_ver.'.",
									"success"
								);
								</script>
								' :
								'No se pudo registrar la salida.';
							}else{
								$tipo = 4;/*SALIDA CON HORAS EXTRA */
								$rspta=$asistencia->registrar_salida($codigo_persona,$tipo);
								echo $rspta ? '<div class="alert alert-success">  Salida registrada a las <i class="bi bi-watch"></i> '.$hoy_ver.'</div>
								<script>
								Swal.fire(
									"Marcado de salida  registrado",
									"Registrado a las <i class="bi bi-watch"></i>'.$hoy_ver.'.",
									"success"
								);
								</script>
								' :
								'No se pudo registrar la salida ';
							}

							/* Logica de llenado para tabla  controlhorasmensuales*/
							/* Preparacion de datos para envio a la funcion  */
							$numer_identidad=$_POST["Usuario_id_numero_identidad"] ;
							$hora_ingreso_salida = $HoraActual.":".$MinutoActual.":".$segundosActual;

							$horaEntrada=$reg->hora;
							$horaSalida= $hora_ingreso_salida;
							$scripts=$asistencia->llenadoControlHorasMensuales($numer_identidad,$fecha,$horaEntrada,$horaSalida);

							echo $scripts ? '<div class="alert alert-success">Jornada Laboral Completada con <i class="bi bi-watch"></i> '.
								 $_SESSION["horaLaboral"].' horas con 
								'.$_SESSION["minutosLaboradas"].' minutos y 
								'.$_SESSION["segundosLaboradas"].' segundos laborados.</div>
							<script>
							Swal.fire(
								"Actualización Jornada Laboral Completada",
								"Salida registrada a las  '.$hoy_ver.'.",
								"success"
							);
							</script>' :
							'No se pudo registrar Actualización Jornada Laboral Completada';



						}elseif((intval($reg->tipo) ==2 || intval($reg->tipo) ==4)){
							echo '<div class="alert alert-info"><i class="bi bi-info-square-fill"></i> Ya has registrado la  salida del dia de hoy.</div>
							<script>
							Swal.fire(
								"Mensaje",
								"Ya has registrado la  salida del dia de hoy.",
								"info"
							);
							</script>
							';
						}
					}
				}
	}else {
		echo "Seccion ".$_SESSION["verificar_numero_identidad"];
			echo '<div class="alert alert-danger">
			<i class="icon fa fa-warning"></i> No hay empleado registrado con ese código. </div>
			<script>
			Swal.fire(
				"Verifique el ingreso de la identidad",
				"<i class="icon fa fa-warning"></i> No hay empleado registrado con ese código.  ",
				"error"
			);
			</script>
			';
		}
?>