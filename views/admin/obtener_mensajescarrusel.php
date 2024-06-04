<?php
    /**
     * Funcion para cargar media ya sea por su id
     * 
     * @Autor: Jonathan Laux
     * @Fecha Creacion: 20/07/2022
     * @Fecha Revision:
    */

    /**
     * Funcionalidad de busqueda e ordenamiento 
     */
        // include("../../config/conexion.php");

    /**
     * Funcionalidad de la ejecucion de todos los regitros  
     */   

    function obtener_mensajescarrusel_id($idMensajesCarrusel){
        include("../../config/conexion.php");
        $salida = array();
        $stmt = $conexion->prepare("SELECT
                                        idMensajesCarrusel,
                                        mensaje,
                                        activo
                                    FROM
                                        mensajescarrusel
                                    WHERE idMensajesCarrusel = :idMensajesCarrusel");
        $stmt->bindParam(':idMensajesCarrusel',$idMensajesCarrusel,PDO::PARAM_INT);
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        foreach($resultado as $fila){
            $salida["idMensajesCarrusel"] = $fila["idMensajesCarrusel"];
            $salida["mensaje"] = $fila["mensaje"];
            $salida["activo"] = $fila["activo"];
        }
        return $salida;
    }


    // obtener mensaje de carrusel por id
    if($_SERVER["REQUEST_METHOD"] == "GET"){
        if(isset($_GET['idMensajesCarrusel'])){
            echo json_encode(obtener_mensajescarrusel_id($_GET['idMensajesCarrusel']));
        }
    }
    

    ?>