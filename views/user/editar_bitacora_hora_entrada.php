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

if (isset($_POST["idBitacora"]) && isset($_POST['horaEntrada'])) {
    $stmt = $conexion->prepare("UPDATE
                                    bitacora
                                SET
                                    horaEntrada = :horaEntrada
                                WHERE
                                    idBitacora = :idBitacora");
    $stmt->bindValue("horaEntrada", $_POST['horaEntrada']);
    $stmt->bindValue("idBitacora", $_POST['idBitacora']);
    $resultado = $stmt->execute();
    if (!empty($resultado)) {
        echo 'Registro actualizado';
    }
}
?>