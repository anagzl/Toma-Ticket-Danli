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
    include("../../config/conexion.php");

/**
 * Crear un ticket dependiendo del area
 * 
 */    
if(isset($_POST['idDireccion'])){
    switch($_POST['idDireccion']){
        case 1: //catastro 
            $stmt = $conexion->prepare("INSERT INTO ticketcatastro(
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
            $stmt->bindParam(":Empleado_idEmpleado",$_POST["Empleado_idEmpleado"]);
            $stmt->bindParam(":disponibilidad",$_POST["disponibilidad"]);
            $stmt->bindParam(":preferencia",$_POST["preferencia"]);
            $stmt->bindParam(":vecesLlamado",$_POST["vecesLlamado"]);
            $stmt->bindParam(":marcarRellamado",$_POST["marcarRellamado"]);
            $stmt->bindParam(":sigla",$_POST["sigla"]);
            if($_POST['numero'] == null){
                $stmt->bindParam(":numero",NULL,PDO::PARAM_NULL);
            }else{
                $stmt->bindParam(":numero",$_POST['numero'],PDO::PARAM_INT);
            }
            
            $stmt->execute();
            if (!empty($resultado)){
                echo 'Registrado';
            }else{
                echo "Registro Vacio.";
            }
            break;
        case 2:  //regulacion predial
            $salida = array();
            $stmt = $conexion->prepare("SELECT
                                            tp.idTicketPredial AS idTicket,
                                            tp.Bitacora_idBitacora,
                                            tp.Bitacora_Sede_idSede,
                                            tp.disponibilidad,
                                            tp.preferencia,
                                            tp.vecesLlamado,
                                            b.idBitacora,
                                            b.Tramite_idTramite,
                                            u.primerNombre,
                                            u.primerApellido,
                                            tm.nombreTramite,
                                            b.Direccion_idDireccion,
                                            d.siglas
                                        FROM
                                            ticketpredial AS tp
                                        INNER JOIN bitacora AS b
                                        ON
                                            b.idBitacora = tp.Bitacora_idBitacora
                                        INNER JOIN direccion AS d
                                        ON
                                            d.idDireccion = b.Direccion_idDireccion
                                        INNER JOIN tramite AS tm
                                        ON
                                            tm.idTramite = b.Tramite_idTramite
                                        INNER JOIN usuario AS u
                                        ON
                                            u.idUsuario = b.Usuario_idUsuario
                                        WHERE
                                            ($stringTramites) AND tp.disponibilidad = 1 AND tp.preferencia = 1
                                        ORDER BY
                                            idTicketPredial ASC
                                        LIMIT 0, 1;");
            $stmt->execute();
            if($stmt->rowCount() == 0){
                // si no hay tickets marcados con preferencia se procedera a seleccionar el primer ticket disponible
                // para el tramite y direccion seleccionadas
                $stmt = $conexion->prepare("SELECT
                                                tp.idTicketPredial AS idTicket,
                                                tp.Bitacora_idBitacora,
                                                tp.Bitacora_Sede_idSede,
                                                tp.disponibilidad,
                                                tp.preferencia,
                                                tp.vecesLlamado,
                                                b.idBitacora,
                                                b.Tramite_idTramite,
                                                u.primerNombre,
                                                u.primerApellido,
                                                tm.nombreTramite,
                                                b.Direccion_idDireccion,
                                                d.siglas
                                            FROM
                                                ticketpredial AS tp
                                            INNER JOIN bitacora AS b
                                            ON
                                                b.idBitacora = tp.Bitacora_idBitacora
                                            INNER JOIN direccion AS d
                                            ON
                                                d.idDireccion = b.Direccion_idDireccion
                                            INNER JOIN tramite AS tm
                                            ON
                                                tm.idTramite = b.Tramite_idTramite
                                            INNER JOIN usuario AS u
                                            ON
                                                u.idUsuario = b.Usuario_idUsuario
                                            WHERE
                                                ($stringTramites) AND tp.disponibilidad = 1
                                            ORDER BY
                                                idTicketPredial ASC
                                            LIMIT 0, 1;");
                $stmt->execute();
            }
            $resultado = $stmt->fetchAll();
            foreach($resultado as $fila){
                $salida["idTicket"] = $fila["idTicket"];
                $salida["Bitacora_idBitacora"] = $fila["Bitacora_idBitacora"];
                $salida["Bitacora_Sede_idSede"] = $fila["Bitacora_Sede_idSede"];
                $salida["disponibilidad"] = $fila["disponibilidad"];
                $salida["preferencia"] = $fila["preferencia"];
                $salida["siglas"] = $fila["siglas"];
                $salida["vecesLlamado"] = $fila["vecesLlamado"];
                $salida["primerNombre"] = $fila["primerNombre"];
                $salida["primerApellido"] = $fila["primerApellido"];
            }
            $json = json_encode($salida);
            echo $json;
            break;
        case 3: //propiedad intelectual
            $salida = array();
            $stmt = $conexion->prepare("SELECT
                                            ti.idTicketPropiedadIntelectual AS idTicket,
                                            ti.Bitacora_idBitacora,
                                            ti.Bitacora_Sede_idSede,
                                            ti.disponibilidad,
                                            ti.preferencia,
                                            ti.vecesLlamado,
                                            b.idBitacora,
                                            b.Tramite_idTramite,
                                            u.primerNombre,
                                            u.primerApellido,
                                            tm.nombreTramite,
                                            b.Direccion_idDireccion,
                                            d.siglas
                                        FROM
                                            ticketpropiedadintelectual AS ti
                                        INNER JOIN bitacora AS b
                                        ON
                                            b.idBitacora = ti.Bitacora_idBitacora
                                        INNER JOIN direccion AS d
                                        ON
                                            d.idDireccion = b.Direccion_idDireccion
                                        INNER JOIN tramite AS tm
                                        ON
                                            tm.idTramite = b.Tramite_idTramite
                                        INNER JOIN usuario AS u
                                        ON
                                            u.idUsuario = b.Usuario_idUsuario
                                        WHERE
                                            ($stringTramites) AND ti.disponibilidad = 1 AND ti.preferencia = 1
                                        ORDER BY
                                            idTicketPropiedadIntelectual ASC
                                        LIMIT 0, 1;");
            $stmt->execute();
            if($stmt->rowCount() == 0){
                // si no hay tickets marcados con preferencia se procedera a seleccionar el primer ticket disponible
                // para el tramite y direccion seleccionadas
                $stmt = $conexion->prepare("SELECT
                                                ti.idTicketPropiedadIntelectual AS idTicket,
                                                ti.Bitacora_idBitacora,
                                                ti.Bitacora_Sede_idSede,
                                                ti.disponibilidad,
                                                ti.preferencia,
                                                ti.vecesLlamado,
                                                b.idBitacora,
                                                b.Tramite_idTramite,
                                                u.primerNombre,
                                                u.primerApellido,
                                                tm.nombreTramite,
                                                b.Direccion_idDireccion,
                                                d.siglas
                                            FROM
                                                ticketpropiedadintelectual AS ti
                                            INNER JOIN bitacora AS b
                                            ON
                                                b.idBitacora = ti.Bitacora_idBitacora
                                            INNER JOIN direccion AS d
                                            ON
                                                d.idDireccion = b.Direccion_idDireccion
                                            INNER JOIN tramite AS tm
                                            ON
                                                tm.idTramite = b.Tramite_idTramite
                                            INNER JOIN usuario AS u
                                            ON
                                                u.idUsuario = b.Usuario_idUsuario
                                            WHERE
                                                ($stringTramites) AND ti.disponibilidad = 1
                                            ORDER BY
                                                idTicketPropiedadIntelectual ASC
                                            LIMIT 0, 1;");
                $stmt->execute();
            }
            $resultado = $stmt->fetchAll();
            foreach($resultado as $fila){
                $salida["idTicket"] = $fila["idTicket"];
                $salida["Bitacora_idBitacora"] = $fila["Bitacora_idBitacora"];
                $salida["Bitacora_Sede_idSede"] = $fila["Bitacora_Sede_idSede"];
                $salida["disponibilidad"] = $fila["disponibilidad"];
                $salida["preferencia"] = $fila["preferencia"];
                $salida["siglas"] = $fila["siglas"];
                $salida["vecesLlamado"] = $fila["vecesLlamado"];
                $salida["primerNombre"] = $fila["primerNombre"];
                $salida["primerApellido"] = $fila["primerApellido"];
            }
            $json = json_encode($salida);
            echo $json;
            break;
        case 4: //registro inmueble
            $salida = array();
            $stmt = $conexion->prepare("SELECT
                                            tri.idTicketRegistroInmueble AS idTicket,
                                            tri.Bitacora_idBitacora,
                                            tri.Bitacora_Sede_idSede,
                                            tri.disponibilidad,
                                            tri.preferencia,
                                            tri.vecesLlamado,
                                            b.idBitacora,
                                            b.Tramite_idTramite,
                                            u.primerNombre,
                                            u.primerApellido,
                                            tm.nombreTramite,
                                            b.Direccion_idDireccion,
                                            d.siglas
                                        FROM
                                            ticketregistroinmueble AS tri
                                        INNER JOIN bitacora AS b
                                        ON
                                            b.idBitacora = tri.Bitacora_idBitacora
                                        INNER JOIN direccion AS d
                                        ON
                                            d.idDireccion = b.Direccion_idDireccion
                                        INNER JOIN tramite AS tm
                                        ON
                                            tm.idTramite = b.Tramite_idTramite
                                        INNER JOIN usuario AS u
                                        ON
                                            u.idUsuario = b.Usuario_idUsuario
                                        WHERE
                                            ($stringTramites)  AND tri.disponibilidad = 1 AND tri.preferencia = 1
                                        ORDER BY
                                            idTicketRegistroInmueble ASC
                                        LIMIT 0, 1;");
            $stmt->execute();
            if($stmt->rowCount() == 0){
                // si no hay tickets marcados con preferencia se procedera a seleccionar el primer ticket disponible
                // para el tramite y direccion seleccionadas
                $stmt = $conexion->prepare("SELECT
                                                tri.idTicketRegistroInmueble AS idTicket,
                                                tri.Bitacora_idBitacora,
                                                tri.Bitacora_Sede_idSede,
                                                tri.disponibilidad,
                                                tri.preferencia,
                                                tri.vecesLlamado,
                                                b.idBitacora,
                                                b.Tramite_idTramite,
                                                u.primerNombre,
                                                u.primerApellido,
                                                tm.nombreTramite,
                                                b.Direccion_idDireccion,
                                                d.siglas
                                            FROM
                                                ticketregistroinmueble AS tri
                                            INNER JOIN bitacora AS b
                                            ON
                                                b.idBitacora = tri.Bitacora_idBitacora
                                            INNER JOIN direccion AS d
                                            ON
                                                d.idDireccion = b.Direccion_idDireccion
                                            INNER JOIN tramite AS tm
                                            ON
                                                tm.idTramite = b.Tramite_idTramite
                                            INNER JOIN usuario AS u
                                            ON
                                                u.idUsuario = b.Usuario_idUsuario
                                            WHERE
                                                ($stringTramites)  AND tri.disponibilidad = 1
                                            ORDER BY
                                                idTicketRegistroInmueble ASC
                                            LIMIT 0, 1;");
                $stmt->execute();
            }
            $resultado = $stmt->fetchAll();
            foreach($resultado as $fila){
                $salida["idTicket"] = $fila["idTicket"];
                $salida["Bitacora_idBitacora"] = $fila["Bitacora_idBitacora"];
                $salida["Bitacora_Sede_idSede"] = $fila["Bitacora_Sede_idSede"];
                $salida["disponibilidad"] = $fila["disponibilidad"];
                $salida["preferencia"] = $fila["preferencia"];
                $salida["siglas"] = $fila["siglas"];
                $salida["vecesLlamado"] = $fila["vecesLlamado"];
                $salida["primerNombre"] = $fila["primerNombre"];
                $salida["primerApellido"] = $fila["primerApellido"];
            }
            $json = json_encode($salida);
            echo $json;
            break;
    }
    
}
?>