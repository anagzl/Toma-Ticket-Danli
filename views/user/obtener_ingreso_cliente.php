<?php
    /**
     * Formato de funcion para carga de informacion en el datetable de Estado
     * 
     * @Autor: Ana Zavala
     * @Fecha Creacion: 25/05/2022
     * @Fecha Revision:
    */

    /**
     * Funcionalidad de busqueda e ordenamiento 
     */
        include("../../config/conexion.php");
        include("funciones_ingreso_cliente.php");
    
    /**
     * Funcionalidad de la ejecucion de todos los regitros  
     */    

    if($_GET['num_identidad']){
        $salida = array();
        $stmt = $conexion ->prepare(" SELECT
                                        idUsuario
                                    FROM
                                        usuario
                                    WHERE
                                        num_identidad = :num_identidad");
        $stmt->execute(
            array(
                ':num_identidad'    => $_GET['num_identidad']
            )
        );
        $resultado = $stmt->fetchAll();
        foreach($resultado as $fila){
            $salida['idUsuario']  = $fila['idUsuario'];
        }
        echo json_encode($salida);
    }

    ?>