<?php
/**
 * Modificar registros de bitacora
 *
 * @Autor: Jonathan Laux
 * @Fecha Creacion: 13/06/2022
 * @Autor Revision: Luis Estrada
 * @Fecha Revision: 19/09/2022
 *
 * @Descripcion de modificacion 19/09/2022: Modificacion de la sigla de RP a DP por solicitud de regularizacion predial.
*/

/**
 * Configuracion de conexion
 */
    // include("../../config/conexion.php");

/**
 * Crear un ticket dependiendo del area
 *
 */

function crear_ticket_registro($conn){
    $stmt = $conn->prepare("INSERT INTO ticketcatastro(
                                    Bitacora_idBitacora,
                                    Bitacora_Sede_idSede,
                                    Empleado_idEmpleado,
                                    disponibilidad,
                                    preferencia,
                                    vecesLlamado,
                                    marcarRellamado,
                                    sigla,
                                    numero
                                )
                                VALUES(
                                    :Bitacora_idBitacora,
                                    :Bitacora_Sede_idSede,
                                    :Empleado_idEmpleado,
                                    :disponibilidad,
                                    :preferencia,
                                    :vecesLlamado,
                                    :marcarRellamado,
                                    :sigla,
                                    :numero
                                )");
    $stmt->bindParam(":Bitacora_idBitacora",$_POST["Bitacora_idBitacora"]);
    $stmt->bindParam(":Bitacora_Sede_idSede",$_POST["Bitacora_Sede_idSede"]);
    $stmt->bindParam(":disponibilidad",$_POST["disponibilidad"]);
    $stmt->bindParam(":preferencia",$_POST["preferencia"]);
    $stmt->bindParam(":vecesLlamado",$_POST["vecesLlamado"]);
    $stmt->bindParam(":marcarRellamado",$_POST["marcarRellamado"]);
    $null = null;
    if($_POST['numero'] == null){
        $stmt->bindParam(":numero",$null,PDO::PARAM_NULL);
    }else{
        $stmt->bindParam(":numero",$_POST['numero'],PDO::PARAM_INT);
    }

    if($_POST['Empleado_idEmpleado'] == null){
        $stmt->bindParam(":Empleado_idEmpleado",$null,PDO::PARAM_NULL);
    }else{
        $stmt->bindParam(":Empleado_idEmpleado",$_POST['Empleado_idEmpleado'],PDO::PARAM_INT);
    }

    // si la sigla es null entonces se usa la sigla de la direccion por defecto
    if($_POST['sigla'] == null){
        $siglaDireccion = "RI";
        $stmt->bindParam(":sigla",$siglaDireccion);
    }else{
        $stmt->bindParam(":sigla",$_POST['sigla']);
    }

    $resultado = $stmt->execute();
    $idTicket = $conn->lastInsertId();
    return $idTicket;
}


function crear_ticket_vehicular($conn){
            $stmt = $conn->prepare("INSERT INTO ticketpropiedadintelectual(
                Bitacora_idBitacora,
                Bitacora_Sede_idSede,
                Empleado_idEmpleado,
                disponibilidad,
                preferencia,
                vecesLlamado,
                marcarRellamado,
                sigla,
                numero
            )
            VALUES(
                :Bitacora_idBitacora,
                :Bitacora_Sede_idSede,
                :Empleado_idEmpleado,
                :disponibilidad,
                :preferencia,
                :vecesLlamado,
                :marcarRellamado,
                :sigla,
                :numero
            )");
        $stmt->bindParam(":Bitacora_idBitacora",$_POST["Bitacora_idBitacora"]);
        $stmt->bindParam(":Bitacora_Sede_idSede",$_POST["Bitacora_Sede_idSede"]);
        $stmt->bindParam(":disponibilidad",$_POST["disponibilidad"]);
        $stmt->bindParam(":preferencia",$_POST["preferencia"]);
        $stmt->bindParam(":vecesLlamado",$_POST["vecesLlamado"]);
        $stmt->bindParam(":marcarRellamado",$_POST["marcarRellamado"]);
        $null = null;
        //aplicar valor null en caso de que lo sean
        if($_POST['numero'] == null){
        $stmt->bindParam(":numero",$null,PDO::PARAM_NULL);
        }else{
        $stmt->bindParam(":numero",$_POST['numero'],PDO::PARAM_INT);
        }

        if($_POST['Empleado_idEmpleado'] == null){
        $stmt->bindParam(":Empleado_idEmpleado",$null,PDO::PARAM_NULL);
        }else{
        $stmt->bindParam(":Empleado_idEmpleado",$_POST['Empleado_idEmpleado'],PDO::PARAM_INT);
        }

        // si la sigla es null entonces se usa la sigla de la direccion por defecto
        if($_POST['sigla'] == null){
        $siglaDireccion = "RV";
        $stmt->bindParam(":sigla",$siglaDireccion);
        }else{
        $stmt->bindParam(":sigla",$_POST['sigla']);
        }

        $resultado = $stmt->execute();
        $idTicket = $conn->lastInsertId();
        return $idTicket;
}



if(isset($_POST['idDireccion'])){
    include("../../config/conexion.php");
    switch($_POST['idDireccion']){
        case 1: //catastro 
            echo crear_ticket_registro($conexion);
            break;
        case 2: //RV 
            echo crear_ticket_vehicular($conexion);
            break;

    }

}
?>