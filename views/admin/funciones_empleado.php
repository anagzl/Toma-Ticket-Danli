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

 function obtener_todos_registros_empleado(){
    include('../../config/conexion.php');
    $stmt=$conexion->prepare("SELECT * FROM empleado");
                               
    $stmt->execute();
    $resultado = $stmt->fetchAll();

    return $stmt->rowCount();
}

// funcion para obtener un empleado de acuerdo al id de empleado
function obtener_empleado_id($idEmpleado){
    include('../../config/conexion.php');
        $salida = array();
        $stmt=$conexion->prepare("SELECT
                                    e.idEmpleado,
                                    e.Rol_idRol,
                                    e.Usuario_idUsuario,
                                    u.primerNombre,
                                    u.primerApellido,
                                    e.Ventanilla_idVentanilla,
                                    e.correoInstitucional,
                                    e.login,
                                    e.estado
                                FROM
                                    empleado AS e
                                INNER JOIN usuario AS u
                                ON
                                    u.idUsuario = e.Usuario_idUsuario
                                WHERE
                                    e.idEmpleado = :idEmpleado");
        $stmt->bindParam(':idEmpleado',$idEmpleado,PDO::PARAM_INT);
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        foreach($resultado as $fila){
            $salida["idEmpleado"] = $fila["idEmpleado"];
            $salida["Rol_idRol"] = $fila["Rol_idRol"];
            $salida["Usuario_idUsuario"] = $fila["Usuario_idUsuario"];
            $salida["primerNombre"] = $fila["primerNombre"];
            $salida["primerApellido"] = $fila["primerApellido"];   
            $salida["correoInstitucional"] = $fila["correoInstitucional"];  
            $salida["login"] = $fila["login"]; 
        }
        return $salida;
}



?>