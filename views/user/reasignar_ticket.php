<?php
/**
 * Reasignar ticket a otra area
 * 
 * @Autor: Jonathan Laux
 * @Fecha Creacion: 01/06/2022
 * @Fecha Revision:
*/

/**
 * Configuracion de conexion 
 */
    include("../../config/conexion.php");

/**
 * Reasignar ticket a otra cola
 * 
 */    
if(isset($_POST['tramite']) && isset($_POST['area'])){
    switch($_POST['area']){
        case '1':
        $stmt = $conexion->prepare("INSERT INTO ticketcatastro(
                                        Bitacora_idBitacora,
                                        Bitacora_Sede_idSede,
                                        disponibilidad,
                                        preferencia,
                                        vecesLlamado
                                    )
                                    VALUES(
                                        :Bitacora_idBitacora,
                                        :Bitacora_Sede_idSede,
                                        :disponibilidad,
                                        :preferencia,
                                        :vecesLlamado'
                                    )");
        $resultado = $stmt->execute(
        array(
            "Bitacora_idBitacora" => $_POST['Bitacora_idBitacora'],
            "Bitacora_Sede_idSede" => $_POST['Bitacora_Sede_idSede'],
            "disponibilidad" => $_POST['disponibilidad'],
            "preferencia" => $_POST['preferencia'],
            "vecesLlamado" => $_POST['vecesLlamado']
        )
        );
        if ($resultado) {
        echo 'Reasignado con exito';
        }
        break;
        case '2':
            $stmt = $conexion->prepare("INSERT INTO ticket(
                                            Bitacora_idBitacora,
                                            Bitacora_Sede_idSede,
                                            disponibilidad,
                                            preferencia,
                                            vecesLlamado
                                        )
                                        VALUES(
                                            :Bitacora_idBitacora,
                                            :Bitacora_Sede_idSede,
                                            :disponibilidad,
                                            :preferencia,
                                            :vecesLlamado'
                                        )");
        $resultado = $stmt->execute(
        array(
        "Bitacora_idBitacora" => $_POST['Bitacora_idBitacora'],
        "Bitacora_Sede_idSede" => $_POST['Bitacora_Sede_idSede'],
        "disponibilidad" => $_POST['disponibilidad'],
        "preferencia" => $_POST['preferencia'],
        "vecesLlamado" => $_POST['vecesLlamado']
        )
        );
        if ($resultado) {
        echo 'Reasignado con exito';
        }
        break;
        case '3':
        break;
        case '4':
        break;
    }
    
}

?>