<?php
    /**
     * Formato de funcion para carga de informacion en el datetable
     * 
     * @Autor: Ana Zavala
     * @Fecha Creacion: 26/05/2022
     *  @Fecha Modifcacion: 17/06/2022
    
    */
    /**
     * Se incluyen la conexion y la funciones creadas para poder gestionar la creacion
     */
        include("../../config/conexion.php");
        include("funciones_ingreso_cliente.php");

    /* Validar operacion Crear   */
    /* if ($_POST["operacion"]=="Crear"){ */
        
    $stmt= $conexion -> prepare("INSERT INTO usuario(
              
                idUsuario,
                primerNombre,
                segundoNombre,
                primerApellido,
                segundoApellido,
                numeroCelular,
           /*       banderaWhastapp,
                banderaEncuesta,  */
                correo
    )
    VALUES(
           
                :idUsuario,
                :primerNombre,
                :segundoNombre,
                :primerApellido,
                :segundoApellido,
                :numeroCelular,
          /*       :banderaWhastapp,
                :banderaEncuesta, */
                :correo
        
            )");


        $resultado = $stmt-> execute(
        array(
           
            ':idUsuario'                    => $_POST["idUsuario"],  
            ':primerNombre'                  => $_POST["primerNombre"],
            ':segundoNombre'                 => $_POST["segundoNombre"],  
            ':primerApellido'               => $_POST["primerApellido"],
            ':segundoApellido'              => $_POST["segundoApellido"],  
            ':numeroCelular'                => $_POST["numeroCelular"],
          /*   ':banderaWhastapp'           => 1,
            ':banderaEncuesta'              => 1, */
            ':correo'                        => $_POST["correo"]
         
            )

    );
    /* Validar que no este vacio el resultado */
    if (!empty($resultado)){
        echo 'BIENVENIDO AL IP.';
   

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
    $hora = date("H:i:s");
    

    $resultado = $stmt-> execute(
        array(
         
            ':Sede_idSede'                   => 1,
            ':Usuario_idUsuario'             => $_POST['idUsuario'],
            ':Tramite_idTramite'             => $_POST['tramite'],
            ':Direccion_idDireccion'         => $_POST['direccion'],
            ':fecha'                         => $fecha_completa, 
            ':horaGeneracionTicket'          => $hora,
            ':horaEntrada'                   => null,
            ':horaSalida'                    => null,   
            ':Observacion'                   => null
        )
    );

    $idBitacora = $conexion->lastInsertId();
    
    }else{
        echo "Ocurrio un error";
    }
    ?>
