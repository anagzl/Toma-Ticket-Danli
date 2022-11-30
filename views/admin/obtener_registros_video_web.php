<?php
/**
 * Formato de funcion para carga de informacion en el datetable
 *
 * @Autor: Luis Estrada
 * @Fecha Creacion: 10/08/2022
 * @Autor:
 * @Fecha Revision:
*/

/**
 * Funcionalidad de busqueda e ordenamiento
 */  @session_start();
    include("../../config/conexion.php");
    include("funciones_video_web.php");

    $query="";

    $salida= array();

    $query =" SELECT
                idMediaVideoWeb,
                direccionURL,
               /*  descripcionDelVideo, */
                activo
            FROM
                mediavideoweb;";

            if(isset($_POST["search"]["value"])){
                /* Filtar por id */
                $query .=" WHERE idMediaVideoWeb ='".$_POST["search"]["value"]."' ";

                 /* Filtar por ruta */
                $query .=' OR descripcionDelVideo LIKE "%'.$_POST["search"]["value"].'%" ';
            }


/**
 * Funcionalidad ordenamiento
 */
        if(isset($_POST["order"])){
            /* ordenar */
            $query .=' ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';

        }else{
            $query .=' ORDER BY idMediaVideoWeb ASC';
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
            $sub_array[]=$fila["idMediaVideoWeb"];
          /*   $sub_array[]=$fila["descripcionDelVideo"]; */
            $sub_array[]=$fila["direccionURL"]; 
/*             $sub_array[]='<button type="button" name="editar" id="'.$fila["idMediaVideoWeb"].'" class= "btn btn-infor" style="color:white;"><i class="bi bi-pencil-square"></i> Examinar </button>'; */
          /*   $sub_array[]='<button type="button" name="examinar" id="'.$fila["idMediaVideoWeb"].'" class="btn btn-info" style="color:white;"><i class="bi bi-search"></i> Examinar </button>'; */
            if($fila["activo"]== 1){
                $sub_array[]='<button type="button" name="borrarweb" id="'.$fila["idMediaVideoWeb"].'" class="btn btn-success"><i class="bi bi-toggle-on"></i> Habilitado</button>';
            }else{
                $sub_array[]='<button type="button" name="borrarweb" id="'.$fila["idMediaVideoWeb"].'" class="btn btn-danger"><i  class="bi bi-toggle-off"></i> Deshabilitado </button>';
            }

            $sub_array[]='<button type="button" name="borrarweb" id="'.$fila["idMediaVideoWeb"].'" class="btn btn-danger" style="color:white;"><i class="bi bi-trash-fill"></i> Eliminar </button>';

            $datos[] = $sub_array;

        
        }

/**
 * Funcionalidad de la ejecucion de todos los regitros para la salida
 */

        $salida = array(
            "draw"               => intval($_POST["draw"]),
            "recordsTotal"       => $filtered_rows,
            "recordsFiltered"    => obtener_todos_registros_video_web(),
            "data"               => $datos
        );

        /* Mando los datos en formato json */
        echo json_encode($salida);

        