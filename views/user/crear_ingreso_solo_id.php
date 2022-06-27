<?php
    /**
     * Formato de funcion para carga de informacion en el datetable
     * 
     * @Autor: Ana Zavala
     * @Fecha Creacion: 24/06/2022
     * Modificacion:27/06/2022
     * 
     
    
    */
    /**
     * Se incluyen la conexion y la funciones creadas para poder gestionar la creacion
     */
        include("../../config/conexion.php");
        include("funciones_ingreso_solo_id.php");

    /* Validar operacion Crear   */
    /* if ($_POST["operacion"]=="Crear"){ */
        if(!preg_match("/^[01][0-9][0-3][0-9][12][0-9][0-9][0-9][0-9]{5}$/",$_POST["idUsuario"]))
    
        {
         echo "Número de Identidad Inválida ejemplo:0801202200576";
      
        }
    $stmt= $conexion -> prepare("INSERT INTO usuario(
                idUsuario
    )
    VALUES(
                :idUsuario
            )");
        $resultado = $stmt-> execute(
        array(   
               ':idUsuario'           => $_POST["idUsuario"]
            )
           );
       
    /* Validar que no este vacio el resultado */
    if (!empty($resultado)){
        echo 'BIENVENIDO AL IP. ';

        $stmt= $conexion -> prepare("INSERT INTO bitacora(     
          
            Sede_idSede,
            Usuario_idUsuario,
            Tramite_idTramite,
            Direccion_idDireccion,
            fecha,
            horaGeneracionTicket,
            horaEntrada,
            horaSalida,
            Observacion
        )
        VALUES(

            :Sede_idSede,
            :Usuario_idUsuario,
            :Tramite_idTramite, 
            :Direccion_idDireccion,
            :fecha,
            :horaGeneracionTicket,
            :horaEntrada,
            :horaSalida,
            :Observacion
            )");
    /* Definición de uso horario para ingresar fecha y hora de creacion   */
    date_default_timezone_set('America/Tegucigalpa');
    $fecha_completa  = date("Y-m-d H:i:s A");
    

    $resultado = $stmt-> execute(
        array(
         
            ':Sede_idSede'                   => 1,
            ':Usuario_idUsuario'             => 1,
            ':Usuario_idUsuario'             => 1, 
            ':Tramite_idTramite'             => 1,
            ':Direccion_idDireccion'         => 1,
            ':fecha'                         => $fecha_completa, 
            ':horaGeneracionTicket'          => null,
            ':horaEntrada'                   => null,
            ':horaSalida'                    => null,   
            ':Observacion'                   => null
        )
        );
   
    

    }
    ?>

    