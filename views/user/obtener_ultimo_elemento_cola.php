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

/**
 * Obtener ultimo elemento de la cola dependiendo de la direccion y los tramites,
 * solo se podra obtener un ticket del area y tramite 
 * correspondiente mientras este disponible
 * 
 */   

 //funcion para obtener un ticket de catastro segun el tramite o los tramites especificados
 function obtener_ultimo_ticket_catastro($stringTramites,$conexion){

    $banderaPreferencial=1;
    $banderaNoPreferencial=2;
    $salida = array();
    $stmt = $conexion->prepare("SELECT
                                    tc.idTicketCatastro AS idTicket,
                                    tc.Bitacora_idBitacora,
                                    tc.Bitacora_Sede_idSede,
                                    tc.disponibilidad,
                                    tc.preferencia,
                                    tc.vecesLlamado,
                                    tc.sigla AS sigla_ticket,
                                    tc.numero,
                                    tc.llamando,
                                    b.idBitacora,
                                    b.horaGeneracionTicket,
                                    b.Tramite_idTramite,
                                    b.numeroTicket,
                                    u.primerNombre,
                                    u.primerApellido,
                                    tm.nombreTramite,
                                    b.Direccion_idDireccion
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
                                INNER JOIN usuario AS u
                                ON
                                    u.idUsuario = b.Usuario_idUsuario
                                WHERE
                                    ($stringTramites)  AND tc.disponibilidad = 1 AND tc.preferencia = 1 AND llamando = 0
                                ORDER BY
                                    b.horaGeneracionTicket ASC
                                LIMIT 0, 1;");
    $stmt->execute();
    // verificar si hay tickets para el tramite y direccion correspondiente que esten
    // marcados como preferencial, los tickets marcados con preferencia se llaman primero siempre y cuando esten disponibles
    if($stmt->rowCount() == 0){
        // si no hay tickets marcados con preferencia se procedera a seleccionar el primer ticket disponible
        // para el tramite y direccion seleccionadas
        $stmt = $conexion->prepare("SELECT
                                tc.idTicketCatastro AS idTicket,
                                tc.Bitacora_idBitacora,
                                tc.Bitacora_Sede_idSede,
                                tc.disponibilidad,
                                tc.preferencia,
                                tc.vecesLlamado,
                                tc.sigla AS sigla_ticket,
                                tc.numero,
                                b.idBitacora,
                                b.horaGeneracionTicket,
                                b.Tramite_idTramite,
                                b.numeroTicket,
                                u.primerNombre,
                                u.primerApellido,
                                tm.nombreTramite,
                                b.Direccion_idDireccion
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
                            INNER JOIN usuario AS u
                            ON
                                u.idUsuario = b.Usuario_idUsuario
                            WHERE
                                ($stringTramites)  AND tc.disponibilidad = 1 AND llamando = 0
                            ORDER BY
                                b.horaGeneracionTicket ASC
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
                $salida["vecesLlamado"] = $fila["vecesLlamado"];
                $salida["primerNombre"] = $fila["primerNombre"];
                $salida["primerApellido"] = $fila["primerApellido"];
                $salida["sigla_ticket"] = $fila["sigla_ticket"];
                $salida["numero"] = $fila["numero"];
                $salida["Direccion_idDireccion"] = $fila["Direccion_idDireccion"];
                $salida["numeroTicket"] = $fila["numeroTicket"];
            }
        $json = json_encode($salida);
        return $json;
 }


 function obtener_ultimo_ticket_intelectual($stringTramites,$conexion){


    $salida = array();
    $stmt = $conexion->prepare("SELECT
                                    ti.idTicketPropiedadIntelectual AS idTicket,
                                    ti.Bitacora_idBitacora,
                                    ti.Bitacora_Sede_idSede,
                                    ti.disponibilidad,
                                    ti.preferencia,
                                    ti.vecesLlamado,
                                    ti.sigla AS sigla_ticket,
                                    ti.numero,
                                    ti.llamando,
                                    b.idBitacora,
                                    b.Tramite_idTramite,
                                    b.horaGeneracionTicket,
                                    b.numeroTicket,
                                    u.primerNombre,
                                    u.primerApellido,
                                    tm.nombreTramite,
                                    b.Direccion_idDireccion
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
                                    ($stringTramites) AND ti.disponibilidad = 1 AND ti.preferencia = 1 AND ti.llamando = 0
                                ORDER BY
                                    b.horaGeneracionTicket ASC
                                LIMIT 0, 1;");
    $stmt->execute();
    // verificar si hay tickets para el tramite y direccion correspondiente que esten
    // marcados como preferencial, los tickets marcados con preferencia se llaman primero siempre y cuando esten disponibles
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
                                        ti.sigla AS sigla_ticket,
                                        ti.numero,
                                        ti.llamando,
                                        b.idBitacora,
                                        b.Tramite_idTramite,
                                        b.horaGeneracionTicket,
                                        b.numeroTicket,
                                        u.primerNombre,
                                        u.primerApellido,
                                        tm.nombreTramite,
                                        b.Direccion_idDireccion
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
                                        ($stringTramites) AND ti.disponibilidad = 1 AND ti.llamando = 0
                                    ORDER BY
                                        b.horaGeneracionTicket ASC
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
                $salida["vecesLlamado"] = $fila["vecesLlamado"];
                $salida["primerNombre"] = $fila["primerNombre"];
                $salida["primerApellido"] = $fila["primerApellido"];
                $salida["sigla_ticket"] = $fila["sigla_ticket"];
                $salida["numero"] = $fila["numero"];
                $salida["Direccion_idDireccion"] = $fila["Direccion_idDireccion"];
                $salida["numeroTicket"] = $fila["numeroTicket"];
            }
        $json = json_encode($salida);
        return $json;
 }

if(isset($_GET['tramites']) && isset($_GET['direccion'])){
    include("../../config/conexion.php");
    // para concatenar todos los tramites habilitados en la ventanilla y filtrar
    // el ticket seleccionado de acuerdo a ellos
    $tramitesArray = explode(",",$_GET['tramites']); // separar los tramites y guardarlos en un array
    $stringTramites = "";   //para guardar la string
    for($i = 0; $i < count($tramitesArray); $i++){  
        $stringTramites =  $stringTramites ."tm.nombreTramite = '" . $tramitesArray[$i] . "'" ;
        $stringTramites .= (count($tramitesArray) - 1 == $i) ? "" : " OR "; //evaluar si anadir un OR o no al final
    }
    switch($_GET['direccion']){
        case 1: //catastro 
            //si se reciben tramites entonces se llama un ticket por el tramite, de lo contrario se llama un ticket solo por direccion
           if($_GET['tramites'] != ''){
                echo obtener_ultimo_ticket_catastro($stringTramites,$conexion);
    
            break;
           }
        case 2: //propiedad intelectual
            if($_GET['tramites'] != ''){
                echo obtener_ultimo_ticket_intelectual($stringTramites,$conexion);
    
            break;
           
    }
}
}
?>