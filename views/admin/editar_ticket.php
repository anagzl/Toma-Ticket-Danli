<?php
    /**
     * Formato de funcion para carga de informacion en el datetable
     *
     * @Autor: Jonathan Laux
     * @Fecha Creacion: 10/07/2022
    */
    /**
     * Se incluyen la conexion y la funciones creadas para poder gestionar la creacion
     */

    function editar_catastro($conexion){
        $stmt = $conexion->prepare("UPDATE
                                        ticketcatastro
                                    SET
                                        Empleado_idEmpleado = :idEmpleado,
                                        marcarRellamado = :marcarRellamado,
                                        llamando = :llamando
                                    WHERE
                                        idTicketCatastro = :idTicket;");

        $stmt->bindParam(':idTicket',$_POST['idTicket']);
        $stmt->bindParam(':idEmpleado',$_POST['idEmpleado']);
        $stmt->bindParam(':marcarRellamado',$_POST['marcarRellamado']);
        $stmt->bindParam(':llamando',$_POST['llamando']);

        $resultado = $stmt->execute();
        /* Validar que no este vacio el resultado */
        if(!empty($resultado)){
            echo "Registro actualizado.";
        }else{
            echo "Error al actualizar";
        }
    }

    function editar_predial($conexion){
        $stmt = $conexion->prepare("UPDATE
                                        ticketpredial
                                    SET
                                        Empleado_idEmpleado = :idEmpleado,
                                        marcarRellamado = :marcarRellamado,
                                        llamando = :llamando
                                    WHERE
                                        idTicketPredial = :idTicket;");

        $stmt->bindParam(':idTicket',$_POST['idTicket']);
        $stmt->bindParam(':idEmpleado',$_POST['idEmpleado']);
        $stmt->bindParam(':marcarRellamado',$_POST['marcarRellamado']);
        $stmt->bindParam(':llamando',$_POST['llamando']);

        $resultado = $stmt->execute();
        /* Validar que no este vacio el resultado */
        if(!empty($resultado)){
            echo "Registro actualizado.";
        }else{
            echo "Error al actualizar";
        }
    }

    function editar_intelectual($conexion){
        $stmt = $conexion->prepare("UPDATE
                                        ticketpropiedadintelectual
                                    SET
                                        Empleado_idEmpleado = :idEmpleado,
                                        marcarRellamado = :marcarRellamado,
                                        llamando = :llamando
                                    WHERE
                                        idTicketPropiedadIntelectual = :idTicket;");

        $stmt->bindParam(':idTicket',$_POST['idTicket']);
        $stmt->bindParam(':idEmpleado',$_POST['idEmpleado']);
        $stmt->bindParam(':marcarRellamado',$_POST['marcarRellamado']);
        $stmt->bindParam(':llamando',$_POST['llamando']);

        $resultado = $stmt->execute();
        /* Validar que no este vacio el resultado */
        if(!empty($resultado)){
            echo "Registro actualizado.";
        }else{
            echo "Error al actualizar";
        }
    }

    function editar_registro($conexion){
        $stmt = $conexion->prepare("UPDATE
                                        ticketregistroinmueble
                                    SET
                                        Empleado_idEmpleado = :idEmpleado,
                                        marcarRellamado = :marcarRellamado,
                                        llamando = :llamando
                                    WHERE
                                        idTicketRegistroInmueble = :idTicket;");

        $stmt->bindParam(':idTicket',$_POST['idTicket']);
        $stmt->bindParam(':idEmpleado',$_POST['idEmpleado']);
        $stmt->bindParam(':marcarRellamado',$_POST['marcarRellamado']);
        $stmt->bindParam(':llamando',$_POST['llamando']);

        $resultado = $stmt->execute();
        /* Validar que no este vacio el resultado */
        if(!empty($resultado)){
            echo "Registro actualizado.";
        }else{
            echo "Error al actualizar";
        }
    }


    /* Validar operacion Editar*/
    if(isset($_POST["direccion"])){
        include("../../config/conexion.php");
        switch($_POST["direccion"]){
            case 1:
                editar_catastro($conexion);
                break;
            case 3:
                editar_predial($conexion);
                break;
            case 2:
                editar_intelectual($conexion);
                break;
            case 4:
                editar_registro($conexion);
                break;
        }
    }


  ?>