<?php
    /**
     * Formato de funcion para carga de informacion en el datetable
     * 
     * @Autor: Ana Zavala
     * @Fecha Creacion: 24/06/2022
     
    
    */
    /**
     * Se incluyen la conexion y la funciones creadas para poder gestionar la creacion
     */
        include("../../config/conexion.php");
        include("funciones_ingreso_solo_id.php");

    /* Validar operacion Crear   */
    /* if ($_POST["operacion"]=="Crear"){ */
        
    $stmt= $conexion -> prepare("INSERT INTO usuario(
              
                idUsuario,
                primerNombre,
                segundoNombre,
                primerApellido,
                segundoApellido,
                numeroCelular,
                correo
    )
    VALUES(
           
                :idUsuario,
                :primerNombre,
                :segundoNombre,
                :primerApellido,
                :segundoApellido,
                :numeroCelular,
                :correo
        
            )");


        $resultado = $stmt-> execute(
        array(
           
            ':idUsuario'                    => $_POST["idUsuario"], 
            ':primerNombre'                 => null,
            ':segundoNombre'                => null,  
            ':primerApellido'               =>null,
            ':segundoApellido'              => null,  
            ':numeroCelular'                => null,
            ':correo'                       => null
         
            )

);
$stmt->debugDumpParams();
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
