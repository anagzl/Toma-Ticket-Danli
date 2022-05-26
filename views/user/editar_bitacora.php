<?php
/**
 * Modificar registros de bitacora
 * 
 * @Autor: Jonathan Laux
 * @Fecha Creacion: 26/05/2022
 * @Fecha Revision:
*/

/**
 * Configuracion de cone
 */
    include("../../config/conexion.php");

/**
 * Editar hora de entrada
 * 
 */    

if (isset($_POST["idBitacora"])) {
    $stmt = $conexion->prepare("UPDATE
                                    bitacora
                                SET
                                    horaEntrada = :horaEntrada
                                WHERE
                                    idBitacora = :idBitacora");
    $resultado = $stmt->execute(
        array(
            ':horaEntrada'  => $_POST["horaEntrada"],
            ':idBitacora'  => $_POST["idBitacora"]
        )
    );
    if (!empty($resultado)) {
        echo 'Registro actualizado';
    }
}
?>