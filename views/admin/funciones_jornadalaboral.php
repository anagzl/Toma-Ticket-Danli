<?php 
/**
 * Formato de funcion para carga de informacion en el datetable
 * 
 * @Autor: Jonathan Laux 
 * @Fecha Creacion: 09/07/2022
 * @Fecha Revision:
*/
@session_start(); 

/**
 * Funcion para obtener todos los registros para el datatable de jornada laboral
 */

 // obtiene todos los registro disponibless en la cola de tickets de catastro
 function obtener_todos_registros_jornada_fecha($fechaInicial,$fechaFinal){
    include('../../config/conexion.php');
    $stmt=$conexion->prepare("SELECT
                                idJornadaLaboral,
                                Ventanilla_idVentanilla,
                                TipoJornadaLaboral_idTipoJornadaLaboral,
                                obs,
                                horasFueraVentanilla,
                                minutosFueraVentanilla,
                                segundosFueraVentanilla,
                                fecha,
                                Empleado_idEmpleado
                            FROM
                                jornadalaboral
                            WHERE
                                fecha BETWEEN :fechaInicial AND :fechaFinal;");
    $stmt->bindParam(":fechaInicial",$fechaInicial,PDO::PARAM_STR);
    $stmt->bindParam(":fechaFinal",$fechaFinal,PDO::PARAM_STR);
    $stmt->execute();
    $resultado = $stmt->fetchAll();

    return $stmt->rowCount();
}

 // devuelve una lista de empleados segun el estado solicitado
 function obtener_jornadas_fecha($fechaInicial,$fechaFinal){
    include('../../config/conexion.php');
    $stmt=$conexion->prepare("SELECT
                                idJornadaLaboral,
                                Ventanilla_idVentanilla,
                                TipoJornadaLaboral_idTipoJornadaLaboral,
                                obs,
                                horasFueraVentanilla,
                                minutosFueraVentanilla,
                                segundosFueraVentanilla,
                                fecha,
                                Empleado_idEmpleado
                            FROM
                                jornadalaboral
                            WHERE
                                fecha BETWEEN :fechaInicial AND :fechaFinal");
    $stmt->bindParam(":fechaInicial",$fechaInicial,PDO::PARAM_STR);
    $stmt->bindParam(":fechaFinal",$fechaFinal,PDO::PARAM_STR);

    $stmt->execute();
    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $resultado;
 }




?>