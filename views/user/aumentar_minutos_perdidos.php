<?php
/**
 * Aumentar el tiempo perdido cada vez que se pierde un minuto en la jornada
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
 * Editar los minutos perdidos en la jornada laboral
 * 
 */    
if(isset($_POST['idJornadaLaboral'])){
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