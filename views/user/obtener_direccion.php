<?php
    /**
     * Funcion para obtener la informacion de una direccion
     * 
     * @Autor: Jonathan Laux
     * @Fecha Creacion: 10/07/2022
     * @Fecha Revision:
    */

    /**
     * Funcionalidad de busqueda e ordenamiento 
     */
        // include("../../config/conexion.php");

    /**
     * Funcionalidad de la ejecucion de todos los regitros  
     */   

    function obtener_direccion($conexion,$idDireccion){
        $salida = array();
        $stmt = $conexion->prepare("SELECT
                                        idDireccion,
                                        nombre,
                                        siglas,
                                        descripcion
                                    FROM
                                        direccion
                                    WHERE
                                        idDireccion = :idDireccion");
        $stmt->bindParam(':idDireccion',$idDireccion,PDO::PARAM_INT);
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        foreach($resultado as $fila){
            $salida["idDireccion"] = $fila["idDireccion"];
            $salida["nombre"] = $fila["nombre"];
            $salida["siglas"] = $fila["siglas"];
            $salida["descripcion"] = $fila["descripcion"];
        }
        return $salida;

    }


    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        include("../../config/conexion.php");
        if(isset($_GET['direccion'])){
            echo json_encode(obtener_direccion($conexion,$_GET['direccion']));
        }
    }    

    ?>