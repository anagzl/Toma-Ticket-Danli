<?php
/**
 * Numero de tickets en cola
 * 
 * @Autor: Jonathan Laux
 * @Fecha Creacion: 26/05/2022
 * @Fecha Revision:
*/

/**
 * Configuracion de conexion 
 */

/**
 * Seleccionar count de la cola dependiendo de la direccion
 * 
 */    

 //funcion para obtener la cantidad de personas en cola para los tramites 
 //seleccionados en la direccion de catastro
 function obtener_count_catastro($tramites,$conexion){
    // echo $tramites;
    $salida = array();
    $stmt = $conexion->prepare("SELECT
                                    COUNT(*) AS personas_cola
                                FROM
                                    ticketcatastro
                                INNER JOIN bitacora AS b
                                ON
                                    b.idBitacora = ticketcatastro.Bitacora_idBitacora
                                INNER JOIN tramite AS tm
                                ON
                                    tm.idTramite = b.Tramite_idTramite
                                WHERE
                                    ($tramites) AND disponibilidad = 1 AND llamando = 0;");
    $stmt->execute();
    // $stmt->debugDumpParams();
    $resultado = $stmt->fetchAll();
    $json = json_encode($resultado);
    return $resultado[0]['personas_cola'];
 }


 //funcion para obtener la cantidad de personas en cola para los tramites 
 //seleccionados en la direccion de propiedad intelectual
 function obtener_count_intelectual($tramites,$conexion){
    $salida = array();
    $stmt = $conexion->prepare("SELECT
                                    COUNT(*) AS personas_cola
                                FROM
                                    ticketpropiedadintelectual
                                INNER JOIN bitacora AS b
                                ON
                                    b.idBitacora = ticketpropiedadintelectual.Bitacora_idBitacora
                                INNER JOIN tramite AS tm
                                ON
                                    tm.idTramite = b.Tramite_idTramite
                                WHERE
                                    ($tramites) AND disponibilidad = 1 AND llamando = 0;");
    $stmt->execute();
    $resultado = $stmt->fetchAll();
    $json = json_encode($resultado);
    return $resultado[0]['personas_cola'];
 }


if(isset($_GET['direccion'])){
    include("../../config/conexion.php");
    // para concatenar todos los tramites habilitados en la ventanilla y filtrar
    // el ticket seleccionado de acuerdo a ellos
    $tramitesArray = explode(",",$_GET['tramites']); // separar los tramites y guardarlos en un array
    $stringTramites = "";   //para guardar la string
    for($i = 0; $i < count($tramitesArray); $i++){  
        $stringTramites =  $stringTramites ."tm.nombreTramite = '" . $tramitesArray[$i] . "'" ;
        $stringTramites .= (count($tramitesArray) - 1 == $i) ? "" : " OR "; //evaluar si anadir un OR o no al final
    }
    switch(strtolower($_GET['direccion'])){
        case 1:
            echo obtener_count_catastro($stringTramites,$conexion);
            break;
        case 2:
            echo obtener_count_intelectual($stringTramites,$conexion);
            
            break;
        }
}
    
?>