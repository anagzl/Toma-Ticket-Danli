<?php
/**
 * Crear registros de cola general
 * 
 * @Autor: Jonathan Laux
 * @Fecha Creacion: 13/06/2022
 * @Fecha Revision:20
*/

/**
 * Configuracion de conexion
 */
    // include("../../config/conexion.php");

/**
 * Crear un ticket en la cola general para que pueda ser visualizado por los clientes 
 */    

 // Funcion para crear ticket, se envia la conexion como parametro para poder incluir 
 // y usar este funcion desde otros files php
 function crear_colageneral($idTicket,$idDireccion,$conn){
    $stmt = $conn->prepare("INSERT INTO colageneral(
                                TicketRegistroInmueble_idTicketRegistroInmueble,
                                TicketPropiedadIntelectual_idTicketPropiedadIntelectual,
                                TicketCatastro_idTicketCatastro,
                                TicketPredial_idTicketPredial
                            )
                            VALUES(
                                :idTicketRegistroInmueble,
                                :idTicketPropiedadIntelectual,
                                :idTicketCatastro,
                                :idTicketRegularizacionPredial
                            )");
    $null = null;
    // Solo 1 direccion por ticket, las demas deben ser nulas
    switch($idDireccion){
        case 1: //catastro
            $stmt->bindParam(":idTicketRegistroInmueble",$null,PDO::PARAM_NULL);
            $stmt->bindParam(":idTicketPropiedadIntelectual",$null,PDO::PARAM_NULL);
            $stmt->bindParam(":idTicketCatastro",$idTicket,PDO::PARAM_INT);
            $stmt->bindParam(":idTicketRegularizacionPredial",$null,PDO::PARAM_NULL);
        break;
        /* case 1: //regularizacion predial
            $stmt->bindParam(":idTicketRegistroInmueble",$null,PDO::PARAM_NULL);
            $stmt->bindParam(":idTicketPropiedadIntelectual",$null,PDO::PARAM_NULL);
            $stmt->bindParam(":idTicketCatastro",$null,PDO::PARAM_NULL);
            $stmt->bindParam(":idTicketRegularizacionPredial",$idTicket,PDO::PARAM_INT);
        break; */
        case 2: //propiedad intelectual
            $stmt->bindParam(":idTicketRegistroInmueble",$null,PDO::PARAM_NULL);
            $stmt->bindParam(":idTicketPropiedadIntelectual",$idTicket,PDO::PARAM_INT);
            $stmt->bindParam(":idTicketCatastro",$null,PDO::PARAM_NULL);
            $stmt->bindParam(":idTicketRegularizacionPredial",$null,PDO::PARAM_NULL);
        break;
       /*  case 4: //registro inmueble
            $stmt->bindParam(":idTicketRegistroInmueble",$idTicket,PDO::PARAM_INT);
            $stmt->bindParam(":idTicketPropiedadIntelectual",$null,PDO::PARAM_NULL);
            $stmt->bindParam(":idTicketCatastro",$null,PDO::PARAM_NULL);
            $stmt->bindParam(":idTicketRegularizacionPredial",$null,PDO::PARAM_NULL);
        break; */
    }

    $stmt->execute();
    if(!empty($stmt)){
        echo "Registrado";
    }else{
        echo "registro vacio";
    }
 }

 if(isset($_POST['idDireccion']) && isset($_POST['idTicket'])){
    include("../../config/conexion.php");
    crear_colageneral($_POST['idTicket'],$_POST['idDireccion'],$conexion);
 }

?>