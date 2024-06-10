<?php 
/**
 * Formato de funcion para carga de informacion en el datetable
 * 
 * @Autor: Jonathan Laux 
 * @Fecha Creacion: 08/07/2022
 * @Fecha Revision:
*/
@session_start(); 

/**
 * Funcion para obtener todos los registros para el datatable de ticket
 */
// obtiene todos los registro disponibless en la cola de tickets de catastro
    /* function obtener_todos_registros_ticket_catastro(){
        include('../../config/conexion.php');
        $stmt=$conexion->prepare("SELECT
                                    idTicketCatastro,
                                    Bitacora_idBitacora,
                                    Bitacora_Sede_idSede,
                                    Empleado_idEmpleado,
                                    disponibilidad,
                                    preferencia,
                                    vecesLlamado,
                                    marcarRellamado,
                                    sigla,
                                    numero,
                                    llamando
                                FROM
                                    ticketcatastro");
        $stmt->execute();
        $resultado = $stmt->fetchAll();

        return $stmt->rowCount();
    }

    // obtener los datos de la ventanilla que atendio un ticket
    function obtener_empleado_ventanilla_catastro($idTicket){
        include('../../config/conexion.php');
        $salida = array();
        $stmt=$conexion->prepare("SELECT
                                    t.idTicketCatastro,
                                    t.Empleado_idEmpleado,
                                    e.idEmpleado,
                                    e.Ventanilla_idVentanilla,
                                    v.numero,
                                    v.idVentanilla
                                FROM
                                    ticketcatastro AS t
                                INNER JOIN empleado AS e
                                ON
                                    e.idEmpleado = t.Empleado_idEmpleado
                                INNER JOIN ventanilla AS v
                                ON
                                    v.idVentanilla = e.Ventanilla_idVentanilla
                                WHERE
                                    idTicketCatastro = :idTicket");
        $stmt->bindParam(':idTicket',$idTicket,PDO::PARAM_INT);
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($resultado as $fila){
            $salida["Ventanilla_idVentanilla"] = $fila["Ventanilla_idVentanilla"];
            $salida["numero"] = $fila["numero"];
        }
        return $salida;
    }

    // obtiene todos los registro disponibless en la cola de tickets de predial
    function obtener_todos_registros_ticket_regularizacion_predial(){
        include('../../config/conexion.php');
        $stmt=$conexion->prepare("SELECT
                                    idTicketPredial,
                                    Bitacora_idBitacora,
                                    Bitacora_Sede_idSede,
                                    Empleado_idEmpleado,
                                    disponibilidad,
                                    preferencia,
                                    vecesLlamado,
                                    marcarRellamado,
                                    sigla,
                                    numero,
                                    llamando
                                FROM
                                    ticketpredial");
        $stmt->execute();
        $resultado = $stmt->fetchAll();

        return $stmt->rowCount();
    } */

     // obtener los datos de la ventanilla que atendio un ticket
    /*  function obtener_empleado_ventanilla_predial($idTicket){ */
    /*     include('../../config/conexion.php'); */
    /*     $salida = array(); */
    /*     $stmt=$conexion->prepare("SELECT */
    /*                                 t.idTicketPredial, */
    /*                                 t.Empleado_idEmpleado, */
    /*                                 e.idEmpleado, */
    /*                                 e.Ventanilla_idVentanilla, */
    /*                                 v.numero, */
    /*                                 v.idVentanilla */
    /*                             FROM */
    /*                                 ticketpredial AS t */
    /*                             INNER JOIN empleado AS e */
    /*                             ON */
    /*                                 e.idEmpleado = t.Empleado_idEmpleado */
    /*                             INNER JOIN ventanilla AS v */
    /*                             ON */
    /*                                 v.idVentanilla = e.Ventanilla_idVentanilla */
    /*                             WHERE */
    /*                             idTicketPredial = :idTicket"); */
    /*     $stmt->bindParam(':idTicket',$idTicket,PDO::PARAM_INT); */
    /*     $stmt->execute(); */
    /*     $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC); */
    /*     foreach($resultado as $fila){ */
    /*         $salida["Ventanilla_idVentanilla"] = $fila["Ventanilla_idVentanilla"]; */
    /*         $salida["numero"] = $fila["numero"]; */
    /*     } */
    /*     return $salida; */
    /* } */

   // obtiene todos los registro disponibles en la cola de tickets de propiedad intelectual
  
 // obtiene todos los registro disponibless en la cola de tickets de propiedad intelectual
 function obtener_todos_registros_ticket_registro_inmueble(){
    include('../../config/conexion.php');
    $stmt=$conexion->prepare("SELECT
                                idTicketRegistroInmueble,
                                Bitacora_idBitacora,
                                Bitacora_Sede_idSede,
                                Empleado_idEmpleado,
                                disponibilidad,
                                preferencia,
                                vecesLlamado,
                                marcarRellamado,
                                sigla,
                                numero,
                                llamando
                            FROM
                                ticketregistroinmueble");
    $stmt->execute();
    $resultado = $stmt->fetchAll();

    return $stmt->rowCount();
}

 // obtener los datos de la ventanilla que atendio un ticket
 function obtener_empleado_ventanilla_registro_inmueble($idTicket){
    include('../../config/conexion.php');
    $salida = array();
    $stmt=$conexion->prepare("SELECT
                                t.idTicketRegistroInmueble,
                                t.Empleado_idEmpleado,
                                e.idEmpleado,
                                e.Ventanilla_idVentanilla,
                                v.numero,
                                v.idVentanilla
                            FROM
                                ticketregistroinmueble AS t
                            INNER JOIN empleado AS e
                            ON
                                e.idEmpleado = t.Empleado_idEmpleado
                            INNER JOIN ventanilla AS v
                            ON
                                v.idVentanilla = e.Ventanilla_idVentanilla
                            WHERE
                                idTicketRegistroInmueble = :idTicket");
    $stmt->bindParam(':idTicket',$idTicket,PDO::PARAM_INT);
    $stmt->execute();
    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($resultado as $fila){
        $salida["Ventanilla_idVentanilla"] = $fila["Ventanilla_idVentanilla"];
        $salida["numero"] = $fila["numero"];
    }
    return $salida;
}

function obtener_todos_registros_ticket_vehicular(){
    include('../../config/conexion.php');
    $stmt=$conexion->prepare("SELECT
                                idticketpropiedadintelectual,
                                Bitacora_idBitacora,
                                Bitacora_Sede_idSede,
                                Empleado_idEmpleado,
                                disponibilidad,
                                preferencia,
                                vecesLlamado,
                                marcarRellamado,
                                sigla,
                                numero,
                                llamando
                            FROM
                                ticketpropiedadintelectual");
    $stmt->execute();
    $resultado = $stmt->fetchAll();

    return $stmt->rowCount();
}

 // obtener los datos de la ventanilla que atendio un ticket
 function obtener_empleado_ventanilla_vehicular($idTicket){
    include('../../config/conexion.php');
    $salida = array();
    $stmt=$conexion->prepare("SELECT
                                t.idticketpropiedadintelectual,
                                t.Empleado_idEmpleado,
                                e.idEmpleado,
                                e.Ventanilla_idVentanilla,
                                v.numero,
                                v.idVentanilla
                            FROM
                                ticketpropiedadintelectual AS t
                            INNER JOIN empleado AS e
                            ON
                                e.idEmpleado = t.Empleado_idEmpleado
                            INNER JOIN ventanilla AS v
                            ON
                                v.idVentanilla = e.Ventanilla_idVentanilla
                            WHERE
                                idticketpropiedadintelectual = :idTicket");
    $stmt->bindParam(':idTicket',$idTicket,PDO::PARAM_INT);
    $stmt->execute();
    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($resultado as $fila){
        $salida["Ventanilla_idVentanilla"] = $fila["Ventanilla_idVentanilla"];
        $salida["numero"] = $fila["numero"];
    }
    return $salida;
}



?>