<?php
/**
 * Formato de funcion para carga de informacion en el datetable
 *
 * @Autor: Jonathan Laux
 * @Fecha Creacion: 20/07/2022
 * @Autor:
 * @Fecha Revision:
*/

/**
 * Funcionalidad de busqueda e ordenamiento
 */  @session_start();
    include("../../config/conexion.php");
    include("funciones_mensajescarrusel.php");

    $query="";

    $salida= array();

    $query ="SELECT
                idMensajesCarrusel,
                mensaje,
                activo
            FROM
                mensajescarrusel;";

            if(isset($_POST["search"]["value"])){
                /* Filtar por id */
                $query .=" WHERE idMensajesCarrusel ='".$_POST["search"]["value"]."' ";

                 /* Filtar por ruta */
                 $query .=' OR mensaje LIKE "%'.$_POST["search"]["value"].'%" ';
             
            } 


/**
 * Funcionalidad ordenamiento 
 */    
        if(isset($_POST["order"])){
            /* ordenar */
            $query .=' ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';

        }else{
            $query .=' ORDER BY idMensajesCarrusel ASC';
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
            $sub_array[]=$fila["idMensajesCarrusel"];
            $sub_array[]=$fila["mensaje"];
            $sub_array[]='<button type="button" name="editar" id="'.$fila["idMensajesCarrusel"].'" class="btn btn-info btn-xs editar" style="color:white;"><i class="bi bi-pencil-square"></i> Actualizar </button>';

            if($fila["activo"]== 1){
                $sub_array[]='<button type="button" name="borrarMensaje" id="'.$fila["idMensajesCarrusel"].'" class="btn btn-success"><i class="bi bi-toggle-on"></i> Habilitado</button>';
            }else{
                $sub_array[]='<button type="button" name="borrarMensaje" id="'.$fila["idMensajesCarrusel"].'" class="btn btn-danger"><i  class="bi bi-toggle-off"></i> Deshabilitado </button>';
            }

            $datos[] = $sub_array;

        }

/**
 * Funcionalidad de la ejecucion de todos los regitros para la salida 
 */    

        $salida = array(
            "draw"               => intval($_POST["draw"]),
            "recordsTotal"       => $filtered_rows,
            "recordsFiltered"    => obtener_todos_registros_mensajescarrusel(),
            "data"               => $datos
        );

        /* Mando los datos en formato json */
        echo json_encode($salida);