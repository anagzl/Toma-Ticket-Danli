<?php
/**
 * Modificar registros de bitacora
 * 
 * @Autor: Jonathan Laux
 * @Fecha Creacion: 06/06/2022
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

if (isset($_POST["idBitacora"]) && isset($_POST['horaSalida'])) {
    $stmt = $conexion->prepare("UPDATE
                                    bitacora
                                SET
                                    horaSalida = :horaSalida
                                WHERE
                                    idBitacora = :idBitacora");
    $stmt->bindValue("horaSalida", $_POST['horaSalida']);
    $stmt->bindValue("idBitacora", $_POST['idBitacora']);
    $resultado = $stmt->execute();
    if (!empty($resultado)) {
        echo 'Registro actualizado';
    }
}
?>