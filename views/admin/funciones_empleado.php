<?php 
/**
 * Formato de funcion para carga de informacion en el datetable
 * 
 * @Autor: Jonathan Laux 
 * @Fecha Creacion: 07/07/2022
 * @Fecha Revision:
*/
@session_start(); 

/**
 * Funcion para obtener todos los registros para el datatable de ventanilla
 */

 // devuelve una lista de empleados segun el estado solicitado
 function obtener_empleados_estado($estado){
    include('../../config/conexion.php');
    $stmt=$conexion->prepare("SELECT
                                e.idEmpleado,
                                e.Usuario_idUsuario,
                                e.Rol_idRol,
                                e.Ventanilla_idVentanilla,
                                e.correoInstitucional,
                                e.login,
                                e.estado,
                                u.primerNombre,
                                u.primerApellido
                            FROM
                                empleado AS e
                            INNER JOIN usuario AS u
                            ON
                                u.idUsuario = e.Usuario_idUsuario
                            WHERE
                                e.estado = :estado");
    $stmt->bindParam(":estado",$estado,PDO::PARAM_INT);
    $stmt->execute();
    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $resultado;
 }

 //obtener empleados asignados a cierta ventanilla
 function obtener_empleados_ventanilla($idVentanilla){
    include('../../config/conexion.php');
    $stmt=$conexion->prepare("SELECT
                                e.idEmpleado,
                                e.Usuario_idUsuario,
                                e.Rol_idRol,
                                e.Ventanilla_idVentanilla,
                                e.correoInstitucional,
                                e.login,
                                e.estado,
                                u.primerNombre,
                                u.primerApellido
                            FROM
                                empleado AS e
                            INNER JOIN usuario AS u
                            ON
                                u.idUsuario = e.Usuario_idUsuario
                            WHERE
                                e.Ventanilla_idVentanilla = :idVentanilla");
    $stmt->bindParam(":idVentanilla",$idVentanilla,PDO::PARAM_INT);
    $stmt->execute();
    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $resultado;
 }



?>