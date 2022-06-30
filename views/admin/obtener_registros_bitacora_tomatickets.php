<?php
/**
 * Formato de funcion para carga de informacion en el datetable
 *
 * @Autor: Luis Estrada
 * @Fecha Creacion: 30/06/2022
 * @Autor:
 * @Fecha Revision:
*/

/**
 * Funcionalidad de busqueda e ordenamiento
 */  @session_start();
    include("../../config/conexion.php");
    include("funciones_bitacora_tickets.php");

    $query="";

    $salida= array();

    $query ="SELECT
                idBitacora,
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
            FROM
                bitacora ";

            if(isset($_POST["search"]["value"])){
                /* Filtar por nombre */
                $query .=" WHERE Usuario_idUsuario ='".$_POST["search"]["value"]."' ";
                
                /* Filtar por telefono */
                $query .=' OR  fecha LIKE "%'.$_POST["search"]["value"].'%"';

                /* Filtar por telefono */
                $query .=' OR Direccion_idDireccion LIKE "%'.$_POST["search"]["value"].'%" ';
            } 


/**
 * Funcionalidad ordenamiento 
 */    
        if(isset($_POST["order"])){
            /* ordenar */
            $query .=' ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';

        }else{
            $query .=' ORDER BY idBitacora DESC, Sede_idSede DESC';
        }


        /* Funcionalidad para obtener la cantidad si hay por lo menos un registro  */
        if($_POST["length"] !=-1){
            $query .= ' LIMIT '. $_POST["start"].','.$_POST["length"];

        }

/**
 * Funcionalidad de la ejecucion de todos los regitros  
 */    

        $stmt = $conexion->prepare($query);
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        $datos = array();
        $filtered_rows = $stmt->rowCount();

        foreach($resultado  as $fila){
            $sub_array = array();
            $sub_array[]=$fila["idBitacora"];
            $sub_array[]=$fila["Sede_idSede"];
            $sub_array[]=$fila["Usuario_idUsuario"];
            $sub_array[]=$fila["Tramite_idTramite"];
            $sub_array[]=$fila["Direccion_idDireccion"];
            $sub_array[]=$fila["fecha"];
            $sub_array[]=$fila["horaGeneracionTicket"];
            $sub_array[]=$fila["horaEntrada"];
            $sub_array[]=$fila["horaSalida"];
            $sub_array[]=$fila["Observacion"];
            $sub_array[]=$fila["numeroTicket"];

            $datos[] = $sub_array;

        }

/**
 * Funcionalidad de la ejecucion de todos los regitros para la salida 
 */    

        $salida = array(
            "draw"               => intval($_POST["draw"]),
            "recordsTotal"       => $filtered_rows,
            "recordsFiltered"    => obtener_todos_registros_bitacora_tickets(),
            "data"               => $datos
        );

        /* Mando los datos en formato json */
        echo json_encode($salida);