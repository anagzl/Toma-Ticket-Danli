<?php
/**
 * Obtencion de registros de tramite 
 * 
 * @Autor: Jonathan Laux
 * @Fecha Creacion: 07/07/2022
 * @Fecha Revision:
*/

/**
 * Configuracion de cone
 */

/**
 * Funcionalidad de la ejecucion de registro unico 
 * 
 */    

function obtener_tramites($conexion){
    $salida = array();
    $stmt = $conexion->prepare("SELECT
                                    idTramite,
                                    Direccion_idDireccion,
                                    nombreTramite,
                                    descripcionTramite
                                FROM
                                    tramite;");
    $stmt->execute();
    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $json = json_encode($resultado);
    return $json;
}

function obtener_tramites_direccion($idDireccion,$conexion){
    $salida = array();
    $stmt = $conexion->prepare("SELECT
                                    idTramite,
                                    Direccion_idDireccion,
                                    nombreTramite,
                                    descripcionTramite
                                FROM
                                    tramite
                                WHERE Direccion_idDireccion = :idDireccion;");
    $stmt->bindParam(":idDireccion",$idDireccion,PDO::PARAM_INT);
    $stmt->execute();
    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $json = json_encode($resultado);
    return $json;
}

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    include("../../config/conexion.php");
    if(isset($_GET['direccion'])){
        echo obtener_tramites_direccion($_GET['direccion'],$conexion);
    }else{
        echo obtener_tramites($conexion);
    }
}
?>