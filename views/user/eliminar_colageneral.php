<?php 
/**
 * 
 * @Autor: Jonathan Laux 
 * @Fecha Creacion: 22/06/2022
 * @Fecha Revision: 
 * @Autor Revision:  
*/


/**
 * Funcion para eliminar un registro de la cola general
 */

 function eliminar_colageneral($idColaGeneral,$conn){
        $stmt = $conn->prepare("DELETE FROM colageneral 
                                WHERE idColaGeneral = :idColaGeneral");
        $stmt->bindParam(":idColaGeneral",$idColaGeneral,PDO::PARAM_INT);
        $resultado = $stmt->execute();
        return $resultado;
 }

 if(isset($_POST['idColaGeneral'])){
    include ('../../config/conexion.php');
    eliminar_colageneral($_POST['idColaGeneral'],$conexion);
 }




?>