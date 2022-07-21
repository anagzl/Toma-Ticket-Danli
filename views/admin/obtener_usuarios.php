<?php
    /**
     * Formato de funcion para carga de informacion en el datetable para obtenes todos
     * 
     * @Autor:Ana Zavala
     * @Fecha Creacion: 07/09/2022
     * @Fecha Revision:
    */

    /**
     * Funcionalidad de busqueda e ordenamiento 
     */
        include("../../config/conexion.php");
        include("funciones_usuario.php");

        $query="";

        $salida= array();

        $query ="SELECT * FROM usuario ";

            if(isset($_POST["search"]["value"])){
                /* Filtar por idUsuario */
                $query .=' WHERE idUsuario LIKE "%'.$_POST["search"]["value"].'%"';
                  /* Filtar por numeroIdentidad */
                $query .=' OR numeroIdentidad LIKE "%'.$_POST["search"]["value"].'%"';  
                
                /* Filtar por primer  nombre */
                $query .=' OR primerNombre LIKE "%'.$_POST["search"]["value"].'%"';

                /* Filtar por segundo nombre */
                $query .=' OR segundoNombre LIKE "%'.$_POST["search"]["value"].'%"';

                /* Filtar por primer apellido */
                $query .=' OR primerApellido LIKE "%'.$_POST["search"]["value"].'%"';

                /* Filtar por segundo apellido */
                $query .=' OR segundoApellido LIKE "%'.$_POST["search"]["value"].'%"';
                
                /* Filtar por numero celular */
                $query .=' OR numeroCelular LIKE "%'.$_POST["search"]["value"].'%"';
                /* Filtar por correo */
                $query .=' OR correo LIKE "%'.$_POST["search"]["value"].'%"';
            }


    /**
     * Funcionalidad ordenamiento 
     */    
            if(isset($_POST["order"])){
                /* ordenar */
                $query .=' ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';

            }else{
                $query .=' ORDER BY idUsuario ';
            }


            /* Funcionalidad para obtener la cantidad si hay por lo menos un registro  */
            if($_POST["length"] !=-1){
                $query .= ' LIMIT '. $_POST["start"].','.$_POST["length"];

            }

    /**
     * Funcionalidad de la ejecucion de todos los regitros  
     */    

            $stmt = $conexion->prepare($query);
            $stmt ->execute();
            $resultado = $stmt->fetchAll();
            $datos= array();
            $filtered_rows = $stmt->rowCount();
            foreach($resultado as $fila){
                $sub_array = array();
                $sub_array[]=$fila["idUsuario"];
                $sub_array[]=$fila["numeroIdentidad"];
                $sub_array[]=$fila["primerNombre"]; 
                $sub_array[]=$fila["segundoNombre"];
                $sub_array[]=$fila["primerApellido"]; 
                $sub_array[]=$fila["segundoApellido"];
                $sub_array[]=$fila["numeroCelular"]; 
                $sub_array[]=$fila["correo"]; 
     
                /* Funcionalidad para editar */
                $sub_array[]='<button type="button" name="  editar" id="'.$fila["idUsuario"].'" class="btn btn-info btn-xs editar"><i class="bi bi-pencil-square"></i> Actualizar </button>';
            
      if($fila["estado"]== 1 )
                {
                    $sub_array[]='<button type="button"name="borrar" id="'.$fila["idUsuario"].'" class="btn btn-success borrar"><i class="bi bi-toggle-on"></i> Habilitado</button>';
                }
                else
            {
                $sub_array[]='<button type="button"name="borrar" id="'.$fila["idUsuario"].'" class="btn btn-danger borrar"><i  class="bi bi-toggle-off"></i> Deshabilitado </button>';
        
            } 
                    $datos[] = $sub_array;

            }

    /**
     * Funcionalidad de la ejecucion de todos los regitros para la salida 
     */    
            
        /* Validar que no este vacio el resultado */
        

            $salida = array(
                "draw"               => intval($_POST["draw"]),
                "recordsTotal"       => $filtered_rows,
                "recordsFiltered"    => obtener_todos_registros_usuarios(),
                "data"               => $datos
            );

            /* Mando los datos en formato json */
            echo json_encode($salida);
    ?>