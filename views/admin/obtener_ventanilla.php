<?php
    /**
     * Funcion para cargar una ventanilla ya sea por su id o por su nombre de usuario usado en el login
     * 
     * @Autor: Jonathan Laux
     * @Fecha Creacion: 07/07/2022
     * @Fecha Revision:
    */

    /**
     * Funcionalidad de busqueda e ordenamiento 
     */
        // include("../../config/conexion.php");

    /**
     * Funcionalidad de la ejecucion de todos los regitros  
     */   

    function obtener_ventanilla_id($idVentanilla){
        include("../../config/conexion.php");
        $salida = array();
        $stmt = $conexion->prepare("SELECT
                                        v.idVentanilla,
                                        v.Direccion_idDireccion,
                                        v.numero,
                                        tv.descripcion AS tramites_habilitados,
                                        v.estado
                                    FROM
                                        ventanilla AS v
                                    LEFT OUTER JOIN tramiteshabilitadoventanilla AS tv
                                    ON
                                        tv.Ventanilla_idVentanilla = idVentanilla
                                    WHERE
                                        idVentanilla = :idVentanilla;");
        $stmt->bindParam(':idVentanilla',$idVentanilla,PDO::PARAM_INT);
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        foreach($resultado as $fila){
            $salida["idVentanilla"] = $fila["idVentanilla"];
            $salida["Direccion_idDireccion"] = $fila["Direccion_idDireccion"];
            $salida["numero"] = $fila["numero"];
            $salida["estado"] = $fila["estado"];
            $salida["tramites_habilitados"] = $fila["tramites_habilitados"];
        }
        return $salida;
    }


    // obtener ventanilla por id
    if($_SERVER["REQUEST_METHOD"] == "GET"){
        if(isset($_GET['idVentanilla'])){
            echo json_encode(obtener_ventanilla_id($_GET['idVentanilla']));
        }
    }
    

    ?>
