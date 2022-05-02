<?php 
/**
 * Formato de conexion a la BD 
 * 
 * @Autor: Luis Estrada 
 * @Fecha Creacion: 01/03/2022
 * @Fecha Revision:
*/

/**
 * Definir la conexion a la BD
 */

require_once "global.php";

$conexionMysqli=new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
mysqli_query($conexionMysqli, 'SET NAMES "'.DB_ENCODE.'"');

//muestra posible error en la conexion
if (mysqli_connect_errno()) {
	printf("Ups parece que falló en la conexion con la base de datos: %s\n",mysqli_connect_error());

	exit();
}

if (!function_exists('ejecutarConsulta')) {

	function ejecutarConsulta($sql){
	global $conexionMysqli;
	$query=$conexionMysqli->query($sql);

	return $query;
	}

	function ejecutarConsultaSimpleFila($sql){

		global $conexionMysqli;
		$query=$conexionMysqli->query($sql);
		$row=$query->fetch_assoc();

		return $row;
		}

	function ejecutarConsulta_retornarID($sql){
		global $conexionMysqli;
		$query=$conexionMysqli->query($sql);

		return $conexionMysqli->insert_id;
	}

	function limpiarCadena($str){
		global $conexionMysqli;
		$str=mysqli_real_escape_string($conexionMysqli,trim($str));

		return htmlspecialchars($str);
	}


}
/* 	 cerrar la conexión
	$conexion->close(); */
?>