<?php
    /**
     * Formato de funcion para carga de informacion en el datetable para obtenes todos
     * 
     * @Autor:Ana Zavala
     * @Fecha Creacion: 26/05/2022
     * @Fecha Revision:
    */

    /**
     * Funcionalidad de busqueda e ordenamiento 
     */
        include("../../config/conexion.php");
        include("funciones_datos_cliente.php");

        $query="";

        $salida= array();

        $query ="SELECT * FROM usuario ";

            if(isset($_POST["search"]["value"])){
                /* Filtar por idTipoUsuario */
                $query .=' WHERE idUsuario LIKE "%'.$_POST["search"]["value"].'%"';
                
                /* Filtar por nombre */
                $query .=' OR num_identidad LIKE "%'.$_POST["search"]["value"].'%"';

                   /* Filtar por primer_nombre */
                   $query .=' OR primerNombre LIKE "%'.$_POST["search"]["value"].'%"';



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
                 $sub_array[]=$fila["num_identidad"]; 
                 $sub_array[]=$fila["primerNombre"]; 
                 $sub_array[]=$fila["segundoNombre"]; 
                 $sub_array[]=$fila["primerApellido"]; 
                 $sub_array[]=$fila["segundoApellido"]; 
                 $sub_array[]=$fila["numCelular"]; 
                 $sub_array[]=$fila["correo"]; 
                 $sub_array[]=$fila["Genero_idGenero"]; 
                 $sub_array[]=$fila["idTipoUsuario"]; 

            }

    /**
     * Funcionalidad de la ejecucion de todos los regitros para la salida 
     */    
            
        /* Validar que no este vacio el resultado */
        

            $salida = array(
                "draw"               => intval($_POST["draw"]),
                "recordsTotal"       => $filtered_rows,
                "recordsFiltered"    => obtener_todos_registros_datos_cliente(),
                "data"               => $datos
            );

            /* Mando los datos en formato json */
            echo json_encode($salida);
    ?>