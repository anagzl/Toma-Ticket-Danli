<?php
/**
 * Modificar registros de bitacora
 * 
 * @Autor: Jonathan Laux
 * @Fecha Creacion: 13/06/2022
 * @Fecha Revision:
*/

/**
 * Configuracion de conexion
 */
    // include("../../config/conexion.php");

/**
 * Crear un ticket dependiendo del area
 * 
 */    

function crear_ticket_catastro($conn){
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
        $siglaDireccion = "C";
        $stmt->bindParam(":sigla",$siglaDireccion);
    }else{
        $stmt->bindParam(":sigla",$_POST['sigla']);
    }

    $resultado = $stmt->execute();
    $idTicket = $conn->lastInsertId();
    return $idTicket;
}

function crear_ticket_predial($conn){
    $stmt = $conn->prepare("INSERT INTO ticketpredial(
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
        $siglaDireccion = "RP";
        $stmt->bindParam(":sigla",$siglaDireccion);
    }else{
        $stmt->bindParam(":sigla",$_POST['sigla']);
    }

    $resultado = $stmt->execute();
    $idTicket = $conn->lastInsertId();
    return $idTicket;
}

function crear_ticket_propiedad_intelectual($conn){
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
        $siglaDireccion = "PI";
        $stmt->bindParam(":sigla",$siglaDireccion);
    }else{
        $stmt->bindParam(":sigla",$_POST['sigla']);
    }

    $resultado = $stmt->execute();
    $idTicket = $conn->lastInsertId();
    return $idTicket;
}

function crear_ticket_registro($conn){
    $stmt = $conn->prepare("INSERT INTO ticketregistroinmueble(
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
        $siglaDireccion = "RI";
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
            echo crear_ticket_catastro($conexion);
            break;
        case 2:  //regulacion predial
            echo crear_ticket_predial($conexion);
                break;
        case 3: //propiedad intelectual
            echo crear_ticket_propiedad_intelectual($conexion);
            break;
        case 4: //registro inmueble
            echo crear_ticket_registro($conexion);
            break;
    }
 
}
?>