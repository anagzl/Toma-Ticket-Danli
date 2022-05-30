<?php
/**
 * Aumentar el registro por 1 para un ticket en especifico
 * 
 * @Autor: Jonathan Laux
 * @Fecha Creacion: 30/05/2022
 * @Fecha Revision:
*/

/**
 * Configuracion de conexion 
 */
    include("../../config/conexion.php");

/**
 * Editar las veces que se llama el ticket
 * 
 */    
    if(isset($_POST['idBitacora'])){
        $resultado = $stmt->fetchAll();
    $stmt = $conexion->prepare("UPDATE
                                    ticketcatastro
                                SET
                                    vecesLlamado = vecesLlamado + 1
                                WHERE
                                    ticketcatastro.Bitacora_idBitacora = :idBitacora;");
    $resultado = $stmt->execute(
        array(
            "idBitacora" => $_POST['idBitacora']
        )
    );

    if (!empty($resultado)) {
        echo 'Registro actualizado';
    }
    }

?>