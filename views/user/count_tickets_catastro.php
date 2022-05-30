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
    $resultado = $stmt->fetchAll();
    $stmt = $conexion->prepare("SELECT
                                    COUNT(*) AS count_catastro
                                FROM
                                    ticketcatastro;");
    $resultado = $stmt->execute();
    echo $resultado[0]['count_catastro'];

?>