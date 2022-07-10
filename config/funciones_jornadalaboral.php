<?php
/**
 * Funciones para verificar la jornada laboral de un empleado
 * 
 * @Autor: Jonathan Laux
 * @Fecha Creacion: 10/07/2022
 * @Fecha Revision:
*/

/**
 * Configuracion de conexion
 */
    // include("../../config/conexion.php");

/**
 * Crear un nuevo usuario
 * 
 */    

 // funcion para obtener una jornada laboral de un empleado y fecha
 function obtener_jornadalaboral($conexion,$idEmpleado,$fecha){
    $salida = array();
    $stmt = $conexion->prepare("SELECT
                                    idJornadaLaboral,
                                    Ventanilla_idVentanilla,
                                    Empleado_idEmpleado,
                                    obs,
                                    horasFueraVentanilla,
                                    minutosFueraVentanilla,
                                    segundosFueraVentanilla,
                                    fecha,
                                    horaEntrada,
                                    horaSalida
                                FROM
                                    jornadalaboral
                                WHERE
                                    Empleado_idEmpleado = :idEmpleado AND fecha = :fecha");
    $stmt->execute(
        array(
            "idEmpleado" => $idEmpleado,
            "fecha" => $fecha
        )
    );
    $resultado = $stmt->fetchAll();
    foreach($resultado as $fila){
        $salida["idJornadaLaboral"] = $fila["idJornadaLaboral"];
        $salida["Empleado_idEmpleado"] = $fila["Empleado_idEmpleado"];
        $salida["Ventanilla_idVentanilla"] = $fila["Ventanilla_idVentanilla"];
        $salida["horasFueraVentanilla"] = $fila["horasFueraVentanilla"];
        $salida["minutosFueraVentanilla"] = $fila["minutosFueraVentanilla"];
        $salida["segundosFueraVentanilla"] = $fila["segundosFueraVentanilla"];
    }

    return $salida;
 }

 // crear una jornada laboral
 function crear_jornadalaboral($conexion,$idVentanilla,$idEmpleado,$obs,$fecha,$horaEntrada){
    $stmt = $conexion->prepare("INSERT INTO jornadalaboral(
                                Ventanilla_idVentanilla,
                                Empleado_idEmpleado,
                                obs,
                                fecha,
                                horaEntrada,
                                horasFueraVentanilla,
                                minutosFueraVentanilla,
                                segundosFueraVentanilla
                            )
                            VALUES(
                                :Ventanilla_idVentanilla,
                                :Empleado_idEmpleado,
                                :obs,
                                :fecha,
                                :horaEntrada,
                                0,
                                0,
                                0
                            )");

    $stmt->bindParam(":Ventanilla_idVentanilla",$idVentanilla,PDO::PARAM_INT);
    $stmt->bindParam(":Empleado_idEmpleado",$idEmpleado,PDO::PARAM_INT);
    $stmt->bindParam(":fecha",$fecha,PDO::PARAM_STR);
    $stmt->bindParam(":horaEntrada",$horaEntrada,PDO::PARAM_STR);
    $null = null;                          
    // observacion o null
    if($obs == null){
        $stmt->bindParam(":obs",$null,PDO::PARAM_NULL);
    }else{
        $stmt->bindParam(":obs",$obs,PDO::PARAM_STR);
    }

    $resultado = $stmt->execute();
    return $resultado;
 }

// if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Empleado_idEmpleado'])){
//     include("../../config/conexion.php");
//     echo json_encode(crear_jornadalaboral($conexion));
// }
?>