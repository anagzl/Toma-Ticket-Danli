<?php 
//incluir la conexion de base de datos
require "../config/conexion_db.php";
//Para traer datos de sesion para la vista
session_start();

class asistencia{

//implementamos nuestro constructor
public function __construct(){

}


/**
 * Verifica si el usario existen en la table de usuario 
 * 
 * @Autor: Luis Estrada 
 * @Fecha Creacion: 15/03/2022
 * @Fecha Revision:
*/
public function verificar_numero_identidad($numero_identidad){
	
	$sql = "SELECT
    idUsuario,
    primerNombre,
    segundoNombre,
    primerApellido,
    segundoApellido,
    numeroCelular,
    correo,
    Genero_idGenero,
    TipoUsuario_idTipoUsuario,
    Rol_idRol
FROM
    usuario
			WHERE
			idUsuario ='$numero_identidad'";


			if ($sql !=null) {
				$_SESSION["verificar_numero_identidad"]="* Exito";
				/* return ejecutarConsulta($sql); */
			} else {
				$_SESSION["verificar_numero_identidad"]="- Fracaso";
/* 				$sql = ["id_numero_identidad"=>0];
				return $sql; */
			}

			 return ejecutarConsulta($sql);
}

/**
 * Realiza una consulta trayendo toda la asistencia que posee registro el usuario con esa identidad proporcionada 
 * 
 * @Autor: Luis Estrada 
 * @Fecha Creacion: 15/03/2022
 * @Fecha Revision:
*/

public function seleccionar_asistencia_persona($numer_identidad){
    $sql = "SELECT * FROM asistencia WHERE Usuario_id_numero_identidad = '$numer_identidad'";

	return ejecutarConsulta($sql);
}

/**
 * Funcion para verificar que tipo de empleado es si es sindicalizado o no sindicalizado devolviendo minutosPorMes,minutoMaxiParaEntrarNormal,horaInicioLaboral, los minutos segun ley 
 * 
 * @Autor: Luis Estrada 
 * @Fecha Creacion: 27/04/2022
 * @Fecha Revision:
*/

public function verificar_tipo_empleado_control_horas($numero_identidad){
	$sql = "SELECT
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
				id_numero_identidad = '".$numero_identidad."'";

	return ejecutarConsulta($sql);
/* return ejecutarConsultaSimpleFila($sql);
 */

}

/**
 * Verifica que si hay un registro para el mes y el año sino devulve una bandera -1
 * 
 * @Autor: Luis Estrada 
 * @Fecha Creacion: 27/04/2022
 * @Fecha Revision:
*/
public function verificar_tabla_bitacora_minutos_del_mes_empleados_para_sanciones($numer_identidad,$fechaAnio,$fechaMes){
		$sql = "SELECT
					minutosDelMesRestantes,
					segundosDelMesRestantes
				FROM
					tablabitacoraminutosdelmesempleadosparasanciones
				WHERE
					Usuario_id_numero_identidad='$numer_identidad' AND fechaAño='$fechaAnio' AND fechaMes='$fechaMes'";

		/* Validacion si la consulta tira un null */
/* 		if ($sql !=null) {
			return ejecutarConsulta($sql);	
		} else {
			$sql = ["idTablaTemporalHorasDelMes"=>-1];
			return $sql;
		} */
		return ejecutarConsulta($sql);	
}


/**
 * Logica de registro de bitacora por primera vez al mes 
 * 
 * @Autor: Luis Estrada 
 * @Fecha Creacion: 27/04/2022
 * @Fecha Revision:
*/
public function registrar_tabla_bitacora_minutos_del_mes_empleados_para_sanciones($numer_identidad,$AnioActual,$mesActual,$minutosPorMes,$inicioHoraLaboral,$minutoMaximo,$HoraActual,$MinutoActual,$segundosActual){
	date_default_timezone_set('America/Tegucigalpa');
	$fecha_modificacion =  date("Y-m-d h:i:s A");
/* 	echo "inicioHoraLaboral ".$inicioHoraLaboral."<br/>";
	echo "minutoMaximo ".$minutoMaximo."<br/>";
	echo "HoraActual ".$HoraActual."<br/>";
	echo "MinutoActual ".$MinutoActual."<br/>";
	echo "segundosActual".$segundosActual."<br/>";
	echo "minutosPorMes ".$minutosPorMes."<br/>"; */

	if(($HoraActual==$inicioHoraLaboral)){
		//hora normal
		if($segundosActual==0){
			$minutosDelMesRestantes=$minutosPorMes - ($MinutoActual-$minutoMaximo);//un minuto de los segundos
			$segundosDelMesRestantes= 0;
		}else{
			$minutosDelMesRestantes=$minutosPorMes - ($MinutoActual-$minutoMaximo)-1;//resta un minuto de los segundos que falta quitarle
			$segundosDelMesRestantes= 60 - $segundosActual;
		}
	
/* 		echo "Calculo de horas IF 1 <br/>";
		echo "minutosDelMesRestantes: ". $minutosDelMesRestantes."<br/>";
		echo "segundosDelMesRestantes: ". $segundosDelMesRestantes."<br/>"; */
	
	}else{
		//restar mas de los minutos conviertiendo horas en minutos 
		if($segundosActual==0 && $MinutoActual>=$minutoMaximo){
			$minutosDelMesRestantes=$minutosPorMes - ($MinutoActual-$minutoMaximo) -(($HoraActual-$inicioHoraLaboral)*60);//un minuto de los segundos
			$segundosDelMesRestantes= 0;
		}else{
			$minutosDelMesRestantes=$minutosPorMes - ($MinutoActual-$minutoMaximo)-1-(($HoraActual-$inicioHoraLaboral)*60);//resta un minuto de los segundos que falta quitarle
			$segundosDelMesRestantes= 60 - $segundosActual;
		}
/* 	
		echo "Calculo de horas IF 2 <br/>";
		echo "minutosDelMesRestantes: ". $minutosDelMesRestantes."<br/>";
		echo "segundosDelMesRestantes: ". $segundosDelMesRestantes."<br/>"; */
	}

	$sql = "INSERT INTO tablabitacoraminutosdelmesempleadosparasanciones(
		Usuario_id_numero_identidad,
		fechaAño,
		fechaMes,
		minutosDelMesRestantes,
		segundosDelMesRestantes,
		fechaModificacion
	)
	VALUES(
		'$numer_identidad',
		'$AnioActual',
		'$mesActual',
		'$minutosDelMesRestantes',
		'$segundosDelMesRestantes',
		'$fecha_modificacion'
	)";

	return ejecutarConsulta($sql);
}


/**
 * Logica de registro de bitacora por primera vez al mes 
 * 
 * @Autor: Luis Estrada 
 * @Fecha Creacion: 27/04/2022
 * @Fecha Revision:
*/
public function actualizacion_tabla_bitacora_minutos_del_mes_empleados_para_sanciones($numer_identidad,$AnioActual,$mesActual,$minutosDelMesRestantes,$segundosDelMesRestantes,$inicioHoraLaboral,$minutoMaximo,$HoraActual,$MinutoActual,$segundosActual){
	date_default_timezone_set('America/Tegucigalpa');
	$fecha_modificacion =  date("Y-m-d h:i:s A");

	if(($HoraActual==$inicioHoraLaboral)){
		//hora normal
		if($segundosActual==0){
			$minutosDelMesRestantes=$minutosDelMesRestantes - ($MinutoActual-$minutoMaximo);//un minuto de los segundos
			$segundosDelMesRestantes= 0;
		}else{
			$minutosDelMesRestantes=$minutosDelMesRestantes - ($MinutoActual-$minutoMaximo)-1;//resta un minuto de los segundos que falta quitarle
			$segundosDelMesRestantes= 60 - $segundosActual;
		}

	}else{
		//restar mas de los minutos conviertiendo horas en minutos 
		if($segundosActual==0){
			$minutosDelMesRestantes=$minutosDelMesRestantes - ($MinutoActual-$minutoMaximo) -(($HoraActual-$inicioHoraLaboral)*60);//un minuto de los segundos
			$segundosDelMesRestantes= 0;
		}else{
			$minutosDelMesRestantes=$minutosDelMesRestantes - ($MinutoActual-$minutoMaximo)-1-(($HoraActual-$inicioHoraLaboral)*60);//resta un minuto de los segundos que falta quitarle
			$segundosDelMesRestantes= 60 - $segundosActual;
		}
	}

	$sql = "UPDATE
				tablabitacoraminutosdelmesempleadosparasanciones
			SET
				minutosDelMesRestantes = '$minutosDelMesRestantes',
				segundosDelMesRestantes = '$segundosDelMesRestantes',
				fechaModificacion = '$fecha_modificacion'
			WHERE
				Usuario_id_numero_identidad = '$numer_identidad' 
			AND 
				fechaAño = '$AnioActual'
			AND 
				fechaMes = '$mesActual'";

	return ejecutarConsulta($sql);
}



public function registrar_entrada($numer_identidad,$tipo){
	date_default_timezone_set('America/Tegucigalpa');
	$fecha_completa  = date("Y-m-d H:i:s A");
	
	$fecha =  date("Y-m-d ");
	$hora = date("H:i:s A");
	$nombre_host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
	$direcion_ip =$_SERVER["REMOTE_ADDR"];
	$sql = "INSERT INTO asistencia( fecha, hora, TipoDeAsitencia_idTipoDeAsitencia, Usuario_id_numero_identidad, nombreDelEquipoDondeRealizoAsistencia, direccionDeRedDelEquipo)
				VALUES ('$fecha','$hora', $tipo, '$numer_identidad', '$nombre_host','$direcion_ip')";

	return ejecutarConsulta($sql);
}

public function registrar_salida($numer_identidad,$tipo){
	date_default_timezone_set('America/Tegucigalpa');
	$fecha_completa  = date("Y-m-d H:i:s A");
	
	$fecha =  date("Y-m-d ");
	$hora = date("H:i:s A");
	$nombre_host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
	$direcion_ip =$_SERVER["REMOTE_ADDR"];
/* 	if(isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARTDED_FOR'] != '') {
		$direcion_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
		$direcion_ip = $_SERVER['REMOTE_ADDR'];
	} */
	$sql = "INSERT INTO asistencia( fecha, hora, TipoDeAsitencia_idTipoDeAsitencia, Usuario_id_numero_identidad, nombreDelEquipoDondeRealizoAsistencia, direccionDeRedDelEquipo)
	VALUES ('$fecha','$hora', $tipo, '$numer_identidad', '$nombre_host','$direcion_ip')";

    return ejecutarConsulta($sql);
}


public function verificar_tipo_control_hora_estado_sindicato ($numer_identidad){
	include("../../config/conexion.php"); 

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
	id_numero_identidad = '$numero_identidad'
	");

	$query->execute();
	$data = $query->fetchAll();

foreach ($data as $valores):
	$idTipoEmpleadoControlHoras=$valores["idTipoEmpleadoControlHoras"];
	$inicioHoraLaboral= $valores["minutosPorMes"];
	$minutoMaximo= $valores["minutoMaxiParaEntrarNormal"];
	$finHoraLaboral= $valores["horaInicioLaboral"];
	$minutosPorMes= $valores["horafinLaboral"];
endforeach; 

$_SESSION["idTipoEmpleadoControlHoras"]=$idTipoEmpleadoControlHoras;
$_SESSION["inicioHoraLaboral"]=$inicioHoraLaboral;
$_SESSION["minutoMaximo"]=$minutoMaximo;
$_SESSION["finHoraLaboral"]=$finHoraLaboral;
$_SESSION["minutosPorMes"]=$minutosPorMes;

}

public function verificar_tabla_bitacora_minutos_empleados($numer_identidad,$fechaAnio,$fechaMes){

	include("../../config/conexion.php"); 

	$query = $conexion->prepare("SELECT
	minutosDelMesRestantes,
	segundosDelMesRestantes
FROM
	tablabitacoraminutosdelmesempleadosparasanciones
WHERE
	Usuario_id_numero_identidad='$numer_identidad' AND fechaAño='$fechaAnio' AND fechaMes='$fechaMes' ");

	$query->execute();
	$data = $query->fetchAll();

foreach ($data as $valores):
	$minutosDelMesRestantes= $valores["minutosDelMesRestantes"];
	$segundosDelMesRestantes= $valores["segundosDelMesRestantes"];
endforeach; 

$_SESSION["minutosDelMesRestantes"]=$minutosDelMesRestantes;
$_SESSION["segundosDelMesRestantes"]=$segundosDelMesRestantes;

	/* return ejecutarConsulta($sql);	 */
}


public function llenadoControlHorasMensuales($numer_identidad,$fecha,$horaEntrada,$horaSalida){
	date_default_timezone_set('America/Tegucigalpa');
/* 	$fecha =  date("Y-m-d ");
	$horaEntrada="08:04:41";
	$horaSalida="17:04:48"; */
/* 	$horaLaboral=0;
	$minutosLaboradas=0;
	$segundosLaboradas=0; */

	/* Utiliza tabulador y nueva línea como caracteres de tokenización, así  */
	$tokHoraEntrada = strtok($horaEntrada, ":");

	$bandera=0;
	while ($tokHoraEntrada !== false) {
		/* echo "Dato=$tokHoraEntrada<br />"; */
		if($bandera==0){
			$horaEntradaLocal=intval($tokHoraEntrada);
			/* echo "horaEntradaLocal : ".$horaEntradaLocal."<br/>"; */
		}

		if($bandera==1){
			$minutoEntradaLocal=intval($tokHoraEntrada);
			/* echo "minutoEntradaLocal : ".$minutoEntradaLocal."<br/>"; */
		}

		if($bandera==2){
			$segundoEntradaLocal=intval($tokHoraEntrada);
			/* echo "segundoEntradaLocal : ".$segundoEntradaLocal."<br/>"; */
		}
		$tokHoraEntrada = strtok(":");
		$bandera++;
	}

	$tokHoraSalida = strtok($horaSalida, ":");
	$bandera=0;

	while ($tokHoraSalida !== false) {
		/* echo "Dato=$tokHoraSalida<br />"; */
		if($bandera==0){
			$horaSalidaLocal=intval($tokHoraSalida);
			/* echo "horaSalidaLocal : ".$horaSalidaLocal."<br/>"; */
		}

		if($bandera==1){
			$minutoSalidaLocal=intval($tokHoraSalida);
			/* echo "minutoSalidaLocal : ".$minutoSalidaLocal."<br/>"; */
		}

		if($bandera==2){
			$segundoSalidaLocal=intval($tokHoraSalida);
			/* echo "segundoSalidaLocal : ".$segundoSalidaLocal."<br/>"; */
		}
		$tokHoraSalida= strtok(":");
		$bandera++;
	}


	/* Determinado horas laborales empleadas */
	if($horaSalidaLocal>=$horaEntradaLocal){
		$tiempoLaboralHoras=$horaSalidaLocal-$horaEntradaLocal;
	}else{
		$tiempoLaboralHoras=0;
	}

	if($minutoSalidaLocal>=$minutoEntradaLocal){
		$tiempoLaboralMinutos=$minutoSalidaLocal-$minutoEntradaLocal;
	}else{
		$datoMinutoBandera= $minutoSalidaLocal-$minutoEntradaLocal;
		$tiempoLaboralMinutos= 60+$datoMinutoBandera; //minutos negativos se le restan a la hora anterio
        if($tiempoLaboralHoras>0){
            --$tiempoLaboralHoras;//se disminuitia la hora para se acorde a los minutos que quedarian
        }
	}

	if($segundoSalidaLocal>=$segundoEntradaLocal){
		$tiempoLaboralSegundos=$segundoSalidaLocal-$segundoEntradaLocal;
	}else{
		$datoSegundoBandera= $segundoSalidaLocal-$segundoEntradaLocal;
		$tiempoLaboralSegundos= 60+$datoSegundoBandera; //minutos negativos se le restan a la hora anterio
        --$tiempoLaboralMinutos;//se disminuitia la los minutos  para se acorde a los segundos que quedarian
	}

	if($tiempoLaboralHoras==0){
		$horaLaboral=0;
	}else{
		$horaLaboral= $tiempoLaboralHoras;/*  + 1 */
	}

	$minutosLaboradas=$tiempoLaboralMinutos;
	$segundosLaboradas=$tiempoLaboralSegundos;


/* 	echo "<br/>";
	echo "Tiempo Laboral Horas: ". $tiempoLaboralHoras. "<br/>" ;
	echo "Tiempo Laboral Minutos: ". $tiempoLaboralMinutos . "<br/>";
	echo "Tiempo Laboral Segundos: ". $tiempoLaboralSegundos. "<br/>"; */

	$sqlControlHoras = "INSERT INTO controlhorasmensuales(
		Usuario_id_numero_identidad,
		fecha,
		horaEntrada,
		horaSalida,
		horasLaboradas,
		minutosLaborados,
		segundoLaborados
	)
	VALUES(
		'$numer_identidad',
		'$fecha',
		'$horaEntrada',
		'$horaSalida',
		'$horaLaboral',
		'$minutosLaboradas',
		'$segundosLaboradas'
	)";

	$_SESSION["horaLaboral"]=$horaLaboral;
	$_SESSION["minutosLaboradas"]=$minutosLaboradas;
	$_SESSION["segundosLaboradas"]=$segundosLaboradas;


    return ejecutarConsulta($sqlControlHoras);
}


//hay que agregar al codigo del servidor
public function verificar_entrada($numero_identidad, $fecha){
	$sql = "SELECT  a.TipoDeAsitencia_idTipoDeAsitencia as tipo, 
					a.fecha,
					a.hora 
			FROM asistencia as a 
			INNER JOIN tipodeasistencia as ta
			ON ta.idTipoDeAsistencia = a.TipoDeAsitencia_idTipoDeAsitencia
			WHERE Usuario_id_numero_identidad = '$numero_identidad' AND fecha='$fecha'  ORDER BY idAsistencia DESC LIMIT 1;";

	/* Validacion si la consulta tira un null */
/* 	if ($sql !=null) {
		return ejecutarConsulta($sql);	
	} else {
		$sql = ["tipo"=>0];
        return $sql;
	} */
 	return ejecutarConsulta($sql); 
}

public function verificar_salida($numero_identidad){
	date_default_timezone_set('America/Tegucigalpa');
	$fechaHoy = date("Y-m-d");
	$sql = "SELECT idasistencia, ta.nombre as tipo FROM asistencia as a 
			INNER JOIN tipodeasistencia as ta
			ON ta.idTipoDeAsistencia = a.TipoDeAsitencia_idTipoDeAsitencia
			WHERE Usuario_id_numero_identidad = '$numero_identidad' AND  fecha='$fechaHoy'. ' AND ta.nombre !='SALIDA'   order by idAsistencia DESC LIMIT 1;";
	/*if ($sql !==null) {
		return ejecutarConsulta($sql);	
	} else {
		$sql = ["tipo"=>"sin Dato"];
        return $sql;

	}*/
	return ejecutarConsulta($sql);
}



//listar registros
public function listar(){
	$sql="SELECT * FROM asistencia";
	return ejecutarConsulta($sql);
}



public function mostrar_usuario_individual($loginUsuario){
	$sql = "SELECT
				id_numero_identidad,
				nombres,
				apellidos,
				loginUsuario,
				imagen,
				fechaCreacion,
				fechaModificacion,
				tp.cargo asTipoUsuario_idTipoUsuario,
				du.nombre as Direccion_Unidad_idDireccion_Unidad,
				cu.siglas as Ubicacion ,
				e.nombre as Estado_idEstado,
				r.nombre as Roles_idRoles,
				g.nombre as Genero_idGenero
			FROM
				usuario as u 
			INNER JOIN tipousuario AS tp 
			ON u.TipoUsuario_idTipoUsuario = tp.idTipoUsuario
			INNER JOIN direccion_unidad as du 
			ON u.Direccion_Unidad_idDireccion_Unidad = du.idDireccion_Unidad
			INNER JOIN centroubicacion as cu 
			ON du.CentroUbicacion_idCentroUbicacion = cu.idCentroUbicacion
			INNER JOIN estado as e 
			ON u.Estado_idEstado = e.idEstado 
			INNER JOIN roles as r 
			ON u.Roles_idRoles = r.idRoles
			INNER JOIN genero AS g 
			ON U.Genero_idGenero = g.idGenero
			WHERE
				loginUsuario='".$loginUsuario."';";

	return ejecutarConsulta($sql);
}




}

?>
