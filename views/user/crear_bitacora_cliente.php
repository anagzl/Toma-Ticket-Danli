>
<?php
    /**
     * Formato de funcion para carga de informacion en el datetable
     * 
     * @Autor: Ana Zavala
     * @Fecha Creacion: 10/06/2022
    
    */
    /**
     * Se incluyen la conexion y la funciones creadas para poder gestionar la creacion
     */
        include("../../config/conexion.php");
        include("funciones_bitacora.php");

    /* Validar operacion Crear   */
    /* if ($_POST["operacion"]=="Crear"){ */
        
    $stmt= $conexion -> prepare("INSERT INTO bitacora(
                                idBitacora,
                                Sede_idSede,
                                Usuario_idUsuario,
                                Instituciones_idInstituciones,
                                Tramite_idTramite,
                                Direccion_idDireccion,
                                fecha,
                                horaGeneracionTicket,
                                horaEntrada,
                                horaSalida,
                                Observacion,
                                numeroTicket
    )
    VALUES(
                :idBitacora,
                :Sede_idSede,
                :Usuario_idUsuario,
                :Instituciones_idInstituciones,
                :Tramite_idTramite,
                :Direccion_idDireccion,
                :fecha,
                :horaGeneracionTicket,
                :horaEntrada,
                :horaSalida,
                :Observacion,
                :numeroTicket
        
            )");


        $resultado = $stmt-> execute(
        array(
         
            ':idBitacora'                      => $_POST["idBitacora"],  
            ':Sede_idSede'                     => $_POST["Sede_idSede"],   
            ':Usuario_idUsuario'               => $_POST["Usuario_idUsuario"], 
            ':Instituciones_idInstituciones'   => $_POST["Instituciones_idInstituciones"], 
            ':Tramite_idTramite'               => $_POST["Tramite_idTramite"],
            ':Direccion_idDireccion'           => $_POST["Direccion_idDireccion"],  
            ':fecha'                           => $_POST["fecha"],
            ':horaGeneracionTicket'            => $_POST["horaGeneracionTicket"],  
            ':horaEntrada'                     => $_POST["horaEntrada"],
            ':horaSalida'                      => $_POST["horaSalida"],
            ':Observacion'                     => $_POST["Observacion"],  
            ':numeroTicket'                    => $_POST["numeroTicket"]
          
            )

    );
    /* Validar que no este vacio el resultado */
    if (!empty($resultado)){
        echo 'Registrado';
    }else{
        echo "Registro Vacio.";
    }
/* } */


?>