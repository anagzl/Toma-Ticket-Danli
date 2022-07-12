<?php
/**
 * Formato de funcion para carga de informacion en el datetable
 *
 * @Autor: Jonathan Laux
 * @Fecha Creacion: 09/07/2022
 * @Autor:
 * @Fecha Revision:
*/

/**
 * Funcionalidad de busqueda e ordenamiento
 */  @session_start();
    include("../../config/conexion.php");
    include("funciones_jornadalaboral.php");

    if(isset($_POST['fechaInicial']) && isset($_POST['fechaFinal'])){
        $query="";

        $salida= array();
    
        $query ="SELECT
                    j.idJornadaLaboral,
                    j.Ventanilla_idVentanilla,
                    -- j.TipoJornadaLaboral_idTipoJornadaLaboral,
                    j.obs,
                    j.horasFueraVentanilla,
                    j.minutosFueraVentanilla,
                    j.segundosFueraVentanilla,
                    j.fecha,
                    j.Empleado_idEmpleado,
                    v.numero AS numero_ventanilla,
                    e.Usuario_idUsuario,
                    u.primerNombre,
                    u.primerApellido
                FROM
                    jornadalaboral AS j
                INNER JOIN ventanilla AS v
                ON
                    v.idVentanilla = j.Ventanilla_idVentanilla
                INNER JOIN empleado AS e
                ON
                    e.idEmpleado = j.Empleado_idEmpleado
                INNER JOIN usuario AS u
                ON
                    u.idUsuario = e.Usuario_idUsuario";
    
                if(isset($_POST["search"]["value"])){
                    /* Filtar por numero */
                    $query .=" WHERE (j.idJornadaLaboral ='".$_POST["search"]["value"]."' ";
    
                     /* Filtrar por numero de ventanilla */
                     $query .=' OR v.numero LIKE "'.$_POST["search"]["value"].'" ';
                    
                    /* Filtrar por nombre */
                    $query .=' OR u.primerNombre LIKE "%'.$_POST["search"]["value"].'%" ';
    
                    /* Filtrar por apellido */
                    $query .=' OR u.primerApellido LIKE "%'.$_POST["search"]["value"].'%")';

                    /* Fecha */

                    $query .= "AND (j.fecha BETWEEN '" .$_POST['fechaInicial']. "' AND '".$_POST['fechaFinal']. "')";


                } 
    
    
    /**
     * Funcionalidad ordenamiento 
     */    
            if(isset($_POST["order"])){
                /* ordenar */
                $query .=' ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
    
            }else{
                $query .=' ORDER BY j.idJornadaLaboral ASC';
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
                $sub_array[]=$fila["idJornadaLaboral"];
                $sub_array[]="Ventanilla ".$fila["numero_ventanilla"];
                $sub_array[]=str_pad((string)$fila["horasFueraVentanilla"],2,"0",STR_PAD_LEFT). ":" .str_pad((string)$fila["minutosFueraVentanilla"],2,"0",STR_PAD_LEFT). ":" .str_pad((string)$fila["segundosFueraVentanilla"],2,"0",STR_PAD_LEFT);  //str pad para zerofill
                $sub_array[]=$fila["fecha"];
                $sub_array[]=$fila["primerNombre"]. " " .$fila["primerApellido"];
                $sub_array[]=$fila["Usuario_idUsuario"];
    
    
    
                // if($fila["estado"]== 1){
                //     $sub_array[]='<button type="button"name="borrar" id="'.$fila["idTramite"].'" class="btn btn-success borrar"><i class="bi bi-toggle-on"></i> Habilitado</button>';
                // }else{
                //     $sub_array[]='<button type="button"name="borrar" id="'.$fila["idTramite"].'" class="btn btn-danger borrar"><i  class="bi bi-toggle-off"></i> Deshabilitado </button>';
                // }
    
                $datos[] = $sub_array;
    
            }
    
    /**
     * Funcionalidad de la ejecucion de todos los regitros para la salida 
     */    
    
            $salida = array(
                "draw"               => intval($_POST["draw"]),
                "recordsTotal"       => $filtered_rows,
                "recordsFiltered"    => obtener_todos_registros_jornada_fecha($_POST['fechaInicial'],$_POST['fechaFinal']),
                "data"               => $datos
            );
    
            /* Mando los datos en formato json */
            echo json_encode($salida);
    }
    else{
        echo "Especifica una fecha inicial y final";
    }

  