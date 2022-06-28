<?php
    /**
     * Formato de funcion para carga de informacion en el datetable
     * 
     * @Autor: Ana Zavala
     * @Fecha Creacion: 14/06/2022
    
    */
    /**
     * Se incluyen la conexion y la funciones creadas para poder gestionar la creacion
     */
        include("../../config/conexion.php");
        include("funciones_bitacora.php");

    /* Validar operacion Crear   */
    /* if ($_POST["operacion"]=="Crear"){ */

    /*  Si se crea una bitacora con un numreoTicket, esta bitacora es producto de una reasignacion,
    para guardar ambas transacciones se crea una nueva bitacora y en numeroTicket se guarda el numero de bitacoar anterior,
    esto con el fin de poder escanear y atender el ticket con el mismo ticket */
        
    $stmt= $conexion -> prepare("INSERT INTO bitacora(
                                    Sede_idSede,
                                    Usuario_idUsuario,
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
                                    :Sede_idSede,
                                    :Usuario_idUsuario,
                                    :Tramite_idTramite,
                                    :Direccion_idDireccion,
                                    :fecha,
                                    :horaGeneracionTicket,
                                    :horaEntrada,
                                    :horaSalida,
                                    :Observacion,
                                    :numeroTicket
                                    )");
    $stmt->bindParam(":Sede_idSede", $_POST['Sede_idSede'],PDO::PARAM_INT);
    $stmt->bindParam(":Usuario_idUsuario",$_POST['Usuario_idUsuario'],PDO::PARAM_INT);
    $stmt->bindParam(":Tramite_idTramite",$_POST['Tramite_idTramite'],PDO::PARAM_INT);
    $stmt->bindParam(":Direccion_idDireccion",$_POST['Direccion_idDireccion'],PDO::PARAM_INT);
    $stmt->bindParam(":fecha",$_POST['fecha']);
    $stmt->bindParam(":horaGeneracionTicket",$_POST['horaGeneracionTicket']);
    $null = null;

    //verificar si el valor es nulo para poder enviar un dato null
    if($_POST['horaEntrada'] == null){
        $stmt->bindParam(":horaEntrada",$null,PDO::PARAM_NULL);
    }else{
        $stmt->bindParam(":horaEntrada",$_POST['horaEntrada']);
    }

    if($_POST['horaSalida'] == null){
        $stmt->bindParam(":horaSalida",$null,PDO::PARAM_NULL);
    }else{
        $stmt->bindParam(":horaSalida",$_POST['horaSalida'],PDO::PARAM_STR);
    }

    if($_POST['Observacion'] == null){
        $stmt->bindParam(":Observacion",$null,PDO::PARAM_NULL);
    }else{
        $stmt->bindParam(":Observacion",$_POST['Observacion'],PDO::PARAM_STR);
    }

    if($_POST['numeroTicket'] == null){
        $stmt->bindParam(":numeroTicket",$null,PDO::PARAM_NULL);
    }else{
        $stmt->bindParam(":numeroTicket",$_POST['numeroTicket'],PDO::PARAM_INT);
    }


    $resultado = $stmt->execute();
    $id = $conexion->lastInsertId(); //devolver el id de la bitacora recien creada
    /* Validar que no este vacio el resultado */
    if (!empty($resultado)){
        echo $id;
    }else{
        echo "No se pudo crear la bitacora.";
    }
/* } */


?>