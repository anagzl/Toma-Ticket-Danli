<?php
    /**
     * Funcion para cargar una ventanilla ya sea por su id o por su nombre de usuario usado en el login
     * 
     * @Autor: Jonathan Laux
     * @Fecha Creacion: 08/07/2022
     * @Fecha Revision:
    */

    /**
     * Funcionalidad de busqueda e ordenamiento 
     */
        // include("../../config/conexion.php");

    /**
     * Funcionalidad de la ejecucion de todos los regitros  
     */   

    function obtener_tramite_id($idTramite){
        include("../../config/conexion.php");
        $salida = array();
        $stmt = $conexion->prepare("SELECT
                                        idTramite,
                                        Direccion_idDireccion,
                                        nombreTramite,
                                        descripcionTramite,
                                        estado
                                    FROM
                                        tramite
                                    WHERE
                                        idTramite = :idTramite");
        $stmt->bindParam(':idTramite',$idTramite,PDO::PARAM_INT);
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        foreach($resultado as $fila){
            $salida["idTramite"] = $fila["idTramite"];
            $salida["Direccion_idDireccion"] = $fila["Direccion_idDireccion"];
            $salida["nombreTramite"] = $fila["nombreTramite"];
            $salida["descripcionTramite"] = $fila["descripcionTramite"];
            $salida["estado"] = $fila["estado"];
        }
        return $salida;
    }


    // obtener ventanilla por id
    if($_SERVER["REQUEST_METHOD"] == "GET"){
        if(isset($_GET['idTramite'])){
            echo json_encode(obtener_tramite_id($_GET['idTramite']));
        }
    }
    

    ?>
