<?php
/**
 * Obtener el primer elemento de la cola general 
 * 
 * @Autor: Jonathan Laux
 * @Fecha Creacion: 20/06/2022
 * @Autor Revision: Luis Estrada
 * @Fecha Revision: 19/09/2022
*/

/**
 * Configuracion de conexion
 */
    // include("../../config/conexion.php");

/**
 * Obtener primer elemento de la cola, este elemento es el que sera llamado
 * y mostrado en la pantalla
 * 
 */   

 // metodo que devuelve el siguiente elemento de la cola
 function obtener_primer_elemento_colageneral($conn){
    $salida = array();
    $stmt = $conn->prepare("SELECT
                                idColaGeneral,
                                TicketRegistroInmueble_idTicketRegistroInmueble,
                                TicketPropiedadIntelectual_idTicketPropiedadIntelectual,
                                TicketCatastro_idTicketCatastro,
                                TicketPredial_idTicketPredial
                            FROM
                                colageneral
                            ORDER BY
                                idColaGeneral ASC
                            LIMIT 0, 1;");

    $stmt->execute();

    $resultado = $stmt->fetchAll();

    foreach($resultado as $fila){
        $salida["idColaGeneral"] = $fila["idColaGeneral"];
        $salida["TicketRegistroInmueble_idTicketRegistroInmueble"] = $fila["TicketRegistroInmueble_idTicketRegistroInmueble"];
        $salida["TicketPropiedadIntelectual_idTicketPropiedadIntelectual"] = $fila["TicketPropiedadIntelectual_idTicketPropiedadIntelectual"];
        $salida["TicketCatastro_idTicketCatastro"] = $fila["TicketCatastro_idTicketCatastro"];
        $salida["TicketPredial_idTicketPredial"] = $fila["TicketPredial_idTicketPredial"];
    }
    return $salida;
 }

 // funcion para obtener el ticket en la cola general que sigue despues del ticket con
 // el id especificado 
//  function obtener_ticket_despues_de_idcolageneral($idColaGeneral,$conn){
//     $salida = array();
//     $stmt = $conn->prepare("SELECT 
//                                 idColaGeneral,
//                                 TicketRegistroInmueble_idTicketRegistroInmueble,
//                                 TicketPropiedadIntelectual_idTicketPropiedadIntelectual,
//                                 TicketCatastro_idTicketCatastro,
//                                 TicketPredial_idTicketPredial   
//                             FROM
//                                 colageneral
//                             WHERE idColaGeneral > :idColaGeneral
//                             ORDER BY
//                                 idColaGeneral ASC
//                             LIMIT 0, 1;");
//     $stmt->bindParam(":idColaGeneral",$idColaGeneral,PDO::PARAM_INT);

//     $stmt->execute();

//     $resultado = $stmt->fetchAll();

//     foreach($resultado as $fila){
//         $salida["idColaGeneral"] = $fila["idColaGeneral"];
//         $salida["TicketRegistroInmueble_idTicketRegistroInmueble"] = $fila["TicketRegistroInmueble_idTicketRegistroInmueble"];
//         $salida["TicketPropiedadIntelectual_idTicketPropiedadIntelectual"] = $fila["TicketPropiedadIntelectual_idTicketPropiedadIntelectual"];
//         $salida["TicketCatastro_idTicketCatastro"] = $fila["TicketCatastro_idTicketCatastro"];
//         $salida["TicketPredial_idTicketPredial"] = $fila["TicketPredial_idTicketPredial"];
//     }

//     return $salida;

//  }

 if($_SERVER['REQUEST_METHOD'] === 'GET'){
    include("../../config/conexion.php");
    echo json_encode(obtener_primer_elemento_colageneral($conexion));
 }



?>