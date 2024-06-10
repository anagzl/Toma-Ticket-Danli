<?php
/**
 * Formato de funcion para carga de informacion en el datetable
 *
 * @Autor: Jonathan Laux
 * @Fecha Creacion: 08/07/2022
 * @Autor:
 * @Fecha Revision:
*/

/**
 * Funcionalidad de busqueda e ordenamiento
 */  @session_start();
    include("funciones_ticket.php");

   
    function llenar_datatable_registro_inmueble(){
        include("../../config/conexion.php");
        $query="";

        $salida= array();
    
        $query ="SELECT
                    t.idTicketRegistroInmueble AS idTicket,
                    t.Bitacora_idBitacora,
                    t.Bitacora_Sede_idSede,
                    t.Empleado_idEmpleado,
                    t.disponibilidad,
                    t.preferencia,
                    t.vecesLlamado,
                    t.marcarRellamado,
                    t.sigla,
                    t.numero,
                    t.llamando,
                    b.Tramite_idTramite,
                    tr.nombreTramite
                FROM
                    ticketregistroinmueble AS t
                INNER JOIN bitacora AS b
                ON
                    b.idBitacora = t.Bitacora_idBitacora
                INNER JOIN tramite AS tr
                ON
                    tr.idTramite = b.Tramite_idTramite;";
    
        if(isset($_POST["search"]["value"])){
            /* Filtar por numero */
            $query .=" WHERE idTicket ='".$_POST["search"]["value"]."' ";

            /* Filtar por telefono */
            // $query .=' OR idVentanilla LIKE "%'.$_POST["search"]["value"].'%" ';
            
            /* Filtar por telefono */
            // $query .=' OR d.nombre LIKE "%'.$_POST["search"]["value"].'%" ';
        } 
    
    
    /**
     * Funcionalidad ordenamiento 
     */    
            if(isset($_POST["order"])){
                /* ordenar */
                $query .=' ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
    
            }else{
                $query .=' ORDER BY idTicket ASC';
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
                $ventanilla = obtener_empleado_ventanilla_registro_inmueble($fila["idTicket"]);
                $sub_array = array();
                $sub_array[]=$fila['sigla'] . (($fila['numero'] == null) ? $fila["idTicket"] : $fila['numero']);
                $sub_array[]=$fila["Bitacora_idBitacora"];
                $sub_array[]=$fila["nombreTramite"];
                $sub_array[]=(empty($ventanilla)) ? "Sin atender" : "Ventanilla " .$ventanilla["numero"];
                $sub_array[]=($fila["preferencia"] == 0) ? "No" : "Si";
                $sub_array[]=($fila["marcarRellamado"] == 0) ? "No" : "Esperando rellamado";

                $sub_array[]='<button type="button" name="asignarVentanilla" id="'.$fila["idTicket"].'" class="btn btn-info editar" style="color:white;"><i class="bi bi-pencil-square"></i> Editar </button>';
    
                if($fila["disponibilidad"]== 1){
                    $sub_array[]='<button type="button"name="borrar" id="'.$fila["idTicket"].'" class="btn btn-success borrar"><i class="bi bi-toggle-on"></i> Habilitado</button>';
                }else{
                    $sub_array[]='<button type="button"name="borrar" id="'.$fila["idTicket"].'" class="btn btn-danger borrar"><i  class="bi bi-toggle-off"></i> Deshabilitado </button>';
                }
    
                $datos[] = $sub_array;
    
            }
    
    /**
     * Funcionalidad de la ejecucion de todos los regitros para la salida 
     */    
    
            $salida = array(
                "draw"               => intval($_POST["draw"]),
                "recordsTotal"       => $filtered_rows,
                "recordsFiltered"    => obtener_todos_registros_ticket_registro_inmueble(),
                "data"               => $datos
            );
    
            /* Mando los datos en formato json */
            return $salida;
    }

    function llenar_datatable_registro_vehicular(){
        include("../../config/conexion.php");
        $query="";

        $salida= array();
    
        $query ="SELECT
                    t.idticketpropiedadintelectual AS idTicket,
                    t.Bitacora_idBitacora,
                    t.Bitacora_Sede_idSede,
                    t.Empleado_idEmpleado,
                    t.disponibilidad,
                    t.preferencia,
                    t.vecesLlamado,
                    t.marcarRellamado,
                    t.sigla,
                    t.numero,
                    t.llamando,
                    b.Tramite_idTramite,
                    tr.nombreTramite
                FROM
                    ticketpropiedadintelectualAS t
                INNER JOIN bitacora AS b
                ON
                    b.idBitacora = t.Bitacora_idBitacora
                INNER JOIN tramite AS tr
                ON
                    tr.idTramite = b.Tramite_idTramite;";
    
        if(isset($_POST["search"]["value"])){
            /* Filtar por numero */
            $query .=" WHERE idTicket ='".$_POST["search"]["value"]."' ";

            /* Filtar por telefono */
            // $query .=' OR idVentanilla LIKE "%'.$_POST["search"]["value"].'%" ';
            
            /* Filtar por telefono */
            // $query .=' OR d.nombre LIKE "%'.$_POST["search"]["value"].'%" ';
        } 
    
    
    /**
     * Funcionalidad ordenamiento 
     */    
            if(isset($_POST["order"])){
                /* ordenar */
                $query .=' ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
    
            }else{
                $query .=' ORDER BY idTicket ASC';
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
                $ventanilla = obtener_empleado_ventanilla_vehicular($fila["idTicket"]);
                $sub_array = array();
                $sub_array[]=$fila['sigla'] . (($fila['numero'] == null) ? $fila["idTicket"] : $fila['numero']);
                $sub_array[]=$fila["Bitacora_idBitacora"];
                $sub_array[]=$fila["nombreTramite"];
                $sub_array[]=(empty($ventanilla)) ? "Sin atender" : "Ventanilla " .$ventanilla["numero"];
                $sub_array[]=($fila["preferencia"] == 0) ? "No" : "Si";
                $sub_array[]=($fila["marcarRellamado"] == 0) ? "No" : "Esperando rellamado";

                $sub_array[]='<button type="button" name="asignarVentanilla" id="'.$fila["idTicket"].'" class="btn btn-info editar" style="color:white;"><i class="bi bi-pencil-square"></i> Editar </button>';
    
                if($fila["disponibilidad"]== 1){
                    $sub_array[]='<button type="button"name="borrar" id="'.$fila["idTicket"].'" class="btn btn-success borrar"><i class="bi bi-toggle-on"></i> Habilitado</button>';
                }else{
                    $sub_array[]='<button type="button"name="borrar" id="'.$fila["idTicket"].'" class="btn btn-danger borrar"><i  class="bi bi-toggle-off"></i> Deshabilitado </button>';
                }
    
                $datos[] = $sub_array;
    
            }
    
    /**
     * Funcionalidad de la ejecucion de todos los regitros para la salida 
     */    
    
            $salida = array(
                "draw"               => intval($_POST["draw"]),
                "recordsTotal"       => $filtered_rows,
                "recordsFiltered"    => obtener_todos_registros_ticket_vehicular(),
                "data"               => $datos
            );
    
            /* Mando los datos en formato json */
            return $salida;
    }

    if(isset($_POST['direccion'])){
        switch($_POST['direccion']){
            case 1: //catastro
                echo json_encode(llenar_datatable_registro_inmueble());
                break;
            case 2:
                echo json_encode(llenar_datatable_registro_vehicular());
                break;
           /*  case 3:
                echo json_encode(llenar_datatable_propiedad_intelectual());
                break;
            case 4:
                echo json_encode(llenar_datatable_registro_inmueble());
                break; */
        }
    }else{
        echo "Especifica una direccion";
    }

    