<?php
    /**
     * Funcion para cargar media ya sea por su id
     * 
     * @Autor: Jonathan Laux
     * @Fecha Creacion: 19/07/2022
     * @Fecha Revision:
    */

    /**
     * Funcionalidad de busqueda e ordenamiento 
     */
        // include("../../config/conexion.php");

    /**
     * Funcionalidad de la ejecucion de todos los regitros  
     */   

    function obtener_mediacarrusel_id($idMedia){
        include("../../config/conexion.php");
        $salida = array();
        $stmt = $conexion->prepare("SELECT
                                        idMedia,
                                        ruta,
                                        activo,
                                        imagen
                                    FROM
                                        mediacarrusel
                                    WHERE idMedia = :idMedia");
        $stmt->bindParam(':idMedia',$idMedia,PDO::PARAM_INT);
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        foreach($resultado as $fila){
            $salida["idMedia"] = $fila["idMedia"];
            $salida["ruta"] = $fila["ruta"];
            $salida["activo"] = $fila["activo"];
            $salida["imagen"] = $fila["imagen"];
        }
        return $salida;
    }


    // obtener mediacarrusel por id
    if($_SERVER["REQUEST_METHOD"] == "GET"){
        if(isset($_GET['idMedia'])){
            echo json_encode(obtener_mediacarrusel_id($_GET['idMedia']));
        }
    }
    

    ?>