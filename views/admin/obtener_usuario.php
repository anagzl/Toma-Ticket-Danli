<?php
    /**
     * Formato de funcion para carga de informacion en el datetable de Estado
     * 
     * @Autor: Ana Zavala
     * @Fecha Creacion: 7/09/2022
     * @Fecha Revision:
    */

    /**
     * Funcionalidad de busqueda e ordenamiento 
     */
        include("../../config/conexion.php");
        include("funciones_usuario.php");

    /**
     * Funcionalidad de la ejecucion de todos los regitros  
     */    

    if (isset($_POST["idUsuario"])) {
        $salida = array();
        $stmt = $conexion->prepare("SELECT
        `idUsuario`,
        `numeroIdentidad`,
        `primerNombre`,
        `segundoNombre`,
        `primerApellido`,
        `segundoApellido`,
        `numeroCelular`,
    /*     `banderaWhastapp`,
        `banderaEncuesta`, */
        `correo`,
        `estado`
    FROM
        `usuario`
    WHERE idUsuario = '".$_POST["idUsuario"]."' LIMIT 1;");
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        foreach($resultado as $fila){
            $salida["idUsuario"]        = $fila["idUsuario"];
            $salida["numeroIdentidad"]  = $fila["numeroIdentidad"];
            $salida["primerNombre"]     = $fila["primerNombre"];
            $salida["segundoNombre"]    = $fila["segundoNombre"];
            $salida["primerApellido"]   = $fila["primerApellido"];
            $salida["segundoApellido"]  = $fila["segundoApellido"];
            $salida["numeroCelular"]    = $fila["numeroCelular"];
            $salida["correo"]           = $fila["correo"];

        $stmt->execute();
        $resultado = $stmt->fetchAll();
        foreach($resultado as $fila){
          
            $salida["idUsuario"]       = $fila["idUsuario"];
            $salida["numeroIdentidad"] = $fila["numeroIdentidad"];
            $salida["primerNombre"]    = $fila["primerNombre"];
            $salida["segundoNombre"]   = $fila["segundoNombre"];
            $salida["primerApellido"]  = $fila["primerApellido"];
            $salida["segundoApellido"] = $fila["segundoApellido"];
            $salida["numeroCelular"]   = $fila["numeroCelular"];
            $salida["correo"]          = $fila["correo"]; 

        }
        }

        echo json_encode($salida);

    }

    ?>