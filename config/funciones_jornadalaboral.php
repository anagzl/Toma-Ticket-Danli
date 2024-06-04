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
                                    Empleado_idEmpleado = :idEmpleado AND fecha = :fecha
                                ORDER BY
                                    idJornadaLaboral
                                DESC
                                LIMIT 1; ");
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
 function crear_jornadalaboral($conexion,$idVentanilla,$idEmpleado,$obs,$fecha,$horaEntrada,$horasFuera,$minutosFuera,$segundosFuera){
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
                                :horasFueraVentanilla,
                                :minutosFueraVentanilla,
                                :segundosFueraVentanilla
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

     // horas fuera o null
     $cero = 0;
     if($horasFuera == null){
        $stmt->bindParam(":horasFueraVentanilla",$cero,PDO::PARAM_INT);
    }else{
        $stmt->bindParam(":horasFueraVentanilla",$horasFuera,PDO::PARAM_INT);
    }

    // minutos fuera o null
    if($minutosFuera == null){
        $stmt->bindParam(":minutosFueraVentanilla",$cero,PDO::PARAM_INT);
    }else{
        $stmt->bindParam(":minutosFueraVentanilla",$minutosFuera,PDO::PARAM_INT);
    }

    // segundos fuera o null
    if($segundosFuera == null){
        $stmt->bindParam(":segundosFueraVentanilla",$cero,PDO::PARAM_INT);
    }else{
        $stmt->bindParam(":segundosFueraVentanilla",$segundosFuera,PDO::PARAM_INT);
    }

    $resultado = $stmt->execute();
    return $resultado;
 }

// if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Empleado_idEmpleado'])){
//     include("../../config/conexion.php");
//     echo json_encode(crear_jornadalaboral($conexion));
// }
?>