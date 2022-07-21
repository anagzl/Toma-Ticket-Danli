<?php
    /**
     * Formato de funcion para carga de informacion en el datetable de Estado
     * 
     * @Autor: Ana Zavala
     * @Fecha Creacion: 03/06/2022
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




    if (isset($_GET["idUsuario"])) {
        $salida = array();
        $stmt = $conexion->prepare("SELECT * FROM usuario WHERE numeroIdentidad = '".$_GET["idUsuario"]."' LIMIT 1;");
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        foreach($resultado as $fila){
            $salida["idUsuario"]                   = $fila["idUsuario"];
            $salida["numeroIdentidad"]             = $fila["numeroIdentidad"];
            $salida["primerNombre"]                = $fila["primerNombre"];
            $salida["segundoNombre"]               = $fila["segundoNombre"];
            $salida["primerApellido"]              = $fila["primerApellido"];
            $salida["segundoApellido"]             = $fila["segundoApellido"];
            $salida["numeroCelular"]               = $fila["numeroCelular"];
            $salida["banderaWhastapp"]              = $fila["banderaWhastapp"];
            $salida["banderaEncuesta"]             = $fila["banderaEncuesta"]; 
            $salida["correo"]                      = $fila["correo"];
           
        }
        $stmt->execute();

        echo json_encode($salida);

    }

    ?>