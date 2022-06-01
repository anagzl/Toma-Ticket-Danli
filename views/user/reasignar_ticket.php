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
if(isset($_POST['idJornadaLaboral']) && isset($_POST['area'])){
    $stmt = $conexion->prepare("UPDATE
                                    jornadalaboral
                                SET
                                    tiempoFueraVentanilla = tiempoFueraVentanilla + 1
                                WHERE
                                    jornadalaboral.idJornadaLaboral = :idJornadaLaboral;");
    $resultado = $stmt->execute(
        array(
            "idJornadaLaboral" => $_POST['idJornadaLaboral']
            )
        );
    if ($resultado) {
        echo 'Registro actualizado';
    }
}

?>