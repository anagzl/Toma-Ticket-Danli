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
 * Editar hora de entrada
 * 
 */    
    $salida = array();
    $stmt = $conexion->prepare("SELECT
                                    COUNT(*) AS count_catastro
                                FROM
                                    ticketcatastro;");
    $stmt->execute();
    $resultado = $stmt->fetchAll();
    $json = json_encode($resultado);
    echo $resultado[0]['count_catastro'];
?>