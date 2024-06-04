<?php 
/**
 * Obtencion de registro de las veces que ha sido llamado un ticket en la pantalla de dashboard que muestra los tickets
 * 
 * @Autor: Jonathan Laux
 * @Fecha Creacion: 03/06/2022
 * @Fecha Revision:
*/

include("../../config/conexion.php");
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $salida = array();
    $query = $conexion->prepare("SELECT
                                    idMensajesCarrusel,
                                    mensaje,
                                    activo
                                FROM
                                    mensajescarrusel;");
    $query->execute();
    $data = $query->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($data);
}


?>


