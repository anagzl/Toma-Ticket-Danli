<?php
/**
 * Modificar registros de bitacora
 * 
 * @Autor: Jonathan Laux
 * @Fecha Creacion: 26/05/2022
 * @Fecha Revision:
*/

/**
 * Configuracion de conexion
 */
    include("../../config/conexion.php");

/**
 * Obtener ultimo elemento de la cola dependiendo de la direccion,
 * solo se podra obtener un ticket del area y tramite 
 * correspondiente mientras este disponible
 * 
 */    
if(isset($_GET['tramites']) && isset($_GET['direccion'])){
    //para concatenar todos los tramites habilitados en la ventanilla y filtrar
    //el ticket seleccionado de acuerdo a ellos
    $tramitesArray = explode(",",$_GET['tramites']); // separar los tramites y guardarlos en un array
    $stringTramites = "";   //para guardar la string
    for($i = 0; $i < count($tramitesArray); $i++){  
        $stringTramites =  $stringTramites ."tm.nombreTramite = '" . $tramitesArray[$i] . "'" ;
        $stringTramites .= (count($tramitesArray) - 1 == $i) ? "" : " OR "; //evaluar si anadir un OR o no al final
    }
    switch($_GET['direccion']){
        case 1: //catastro 
            $salida = array();
            $stmt = $conexion->prepare("SELECT
                                        tc.idTicketCatastro AS idTicket,
                                        tc.Bitacora_idBitacora,
                                        tc.Bitacora_Sede_idSede,
                                        tc.disponibilidad,
                                        tc.preferencia,
                                        tc.vecesLlamado,
                                        b.idBitacora,
                                        b.Tramite_idTramite,
                                        tm.nombreTramite,
                                        b.Direccion_idDireccion,
                                        d.siglas
                                    FROM
                                        ticketcatastro AS tc
                                    INNER JOIN bitacora AS b
                                    ON
                                        b.idBitacora = tc.Bitacora_idBitacora
                                    INNER JOIN direccion AS d
                                    ON
                                        d.idDireccion = b.Direccion_idDireccion
                                    INNER JOIN tramite AS tm
                                    ON
                                        tm.idTramite = b.Tramite_idTramite
                                    WHERE
                                        ($stringTramites)  AND tc.disponibilidad = 1
                                    ORDER BY
                                        idTicketCatastro ASC
                                    LIMIT 0, 1;");
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            foreach($resultado as $fila){
                $salida["idTicket"] = $fila["idTicket"];
                $salida["Bitacora_idBitacora"] = $fila["Bitacora_idBitacora"];
                $salida["Bitacora_Sede_idSede"] = $fila["Bitacora_Sede_idSede"];
                $salida["disponibilidad"] = $fila["disponibilidad"];
                $salida["preferencia"] = $fila["preferencia"];
                $salida["siglas"] = $fila["siglas"];
                $salida["vecesLlamado"] = $fila["vecesLlamado"];
            }
           
            $json = json_encode($salida);
            echo $json;
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
                                        WHERE
                                            ($stringTramites) AND tp.disponibilidad = 1
                                        ORDER BY
                                            idTicketPredial ASC
                                        LIMIT 0, 1;");
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            foreach($resultado as $fila){
                $salida["idTicket"] = $fila["idTicket"];
                $salida["Bitacora_idBitacora"] = $fila["Bitacora_idBitacora"];
                $salida["Bitacora_Sede_idSede"] = $fila["Bitacora_Sede_idSede"];
                $salida["disponibilidad"] = $fila["disponibilidad"];
                $salida["preferencia"] = $fila["preferencia"];
                $salida["siglas"] = $fila["siglas"];
                $salida["vecesLlamado"] = $fila["vecesLlamado"];
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
                                        WHERE
                                            ($stringTramites) AND ti.disponibilidad = 1
                                        ORDER BY
                                            idTicketPropiedadIntelectual ASC
                                        LIMIT 0, 1;");
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            foreach($resultado as $fila){
                $salida["idTicket"] = $fila["idTicket"];
                $salida["Bitacora_idBitacora"] = $fila["Bitacora_idBitacora"];
                $salida["Bitacora_Sede_idSede"] = $fila["Bitacora_Sede_idSede"];
                $salida["disponibilidad"] = $fila["disponibilidad"];
                $salida["preferencia"] = $fila["preferencia"];
                $salida["siglas"] = $fila["siglas"];
                $salida["vecesLlamado"] = $fila["vecesLlamado"];
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
                                        WHERE
                                            ($stringTramites)  AND ti.disponibilidad = 1
                                        ORDER BY
                                            idTicketRegistroInmueble ASC
                                        LIMIT 0, 1;");
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            foreach($resultado as $fila){
                $salida["idTicket"] = $fila["idTicket"];
                $salida["Bitacora_idBitacora"] = $fila["Bitacora_idBitacora"];
                $salida["Bitacora_Sede_idSede"] = $fila["Bitacora_Sede_idSede"];
                $salida["disponibilidad"] = $fila["disponibilidad"];
                $salida["preferencia"] = $fila["preferencia"];
                $salida["siglas"] = $fila["siglas"];
                $salida["vecesLlamado"] = $fila["vecesLlamado"];
            }
            $json = json_encode($salida);
            echo $json;
            break;
    }
    
}
?>