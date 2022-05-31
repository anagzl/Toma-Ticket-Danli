<?php
/**
 * Numero de tickets en cola
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
 * Seleccionar count de la cola dependiendo de la direccion
 * 
 */    
if(isset($_GET['direccion'])){
    switch(strtolower($_GET['direccion'])){
        case "catastro":
            $salida = array();
            $stmt = $conexion->prepare("SELECT
                                            COUNT(*) AS personas_cola
                                        FROM
                                            ticketcatastro
                                        WHERE disponibilidad = 1;");
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            $json = json_encode($resultado);
            echo $resultado[0]['personas_cola'];
            break;
        case "regulacion predial":
            $salida = array();
            $stmt = $conexion->prepare("SELECT
                                            COUNT(*) AS personas_cola
                                        FROM
                                            ticketpredial
                                        WHERE disponibilidad = 1;");
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            $json = json_encode($resultado);
            echo $resultado[0]['personas_cola'];
            break;
        case "propiedad intelectual":
            $salida = array();
            $stmt = $conexion->prepare("SELECT
                                            COUNT(*) AS personas_cola
                                        FROM
                                            ticketpropiedadintelectual
                                        WHERE disponibilidad = 1;");
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            $json = json_encode($resultado);
            echo $resultado[0]['personas_cola'];
            break;
        case "registro inmueble":
            $salida = array();
            $stmt = $conexion->prepare("SELECT
                                            COUNT(*) AS personas_cola
                                        FROM
                                            ticketregistroinmueble
                                        WHERE disponibilidad = 1;");
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            $json = json_encode($resultado);
            echo $resultado[0]['personas_cola'];
            break;
    }
}
    
?>