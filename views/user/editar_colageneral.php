<?php
/**
 * Modificar registro de cola general
 * 
 * @Autor: Jonathan Laux
 * @Fecha Creacion: 30/05/2022
 * @Fecha Revision:
*/

/**
 * Configuracion de conexion
 */
    // include("../../config/conexion.php");

/**
 * Editar registro de cola general
 * 
 */    

 //funcion para editar la cola general enviandole el id de cola general
function editar_colageneral_idColaGeneral($idColageneral,$conn){
    $stmt = $conn->prepare("UPDATE
                                colageneral
                            SET
                                disponible = :disponible
                            WHERE
                                idColaGeneral = :idColaGeneral");

     $stmt->bindParam(':idColaGeneral',$idColageneral,PDO::PARAM_INT);
     $stmt->bindParam(':disponible',$_POST['disponible'],PDO::PARAM_INT);
 
     $resultado = $stmt->execute();
 
     if (!empty($resultado)) {
         return 'Registro actualizado';
     }
}

function editar_colageneral_idcatastro($idCatastro,$conn){
    $stmt = $conn->prepare("UPDATE
                                colageneral
                            SET
                                disponible = :disponible
                            WHERE
                                TicketCatastro_idTicketCatastro = :idTicketCatastro");

    $stmt->bindParam(':idTicketCatastro',$_POST['idTicketCatastro'],PDO::PARAM_INT);
    $stmt->bindParam(':disponible',$_POST['disponible'],PDO::PARAM_INT);

    $resultado = $stmt->execute();

    if (!empty($resultado)) {
    return 'Registro actualizado';
    }
}

function editar_colageneral_idpredial($idPredial,$conn){
    $stmt = $conn->prepare("UPDATE
                                colageneral
                            SET
                                disponible = :disponible
                            WHERE
                                TicketPredial_idTicketPredial = :idTicketPredial");

    $stmt->bindParam(':idTicketPredial',$_POST['idTicketCatastro'] , PDO::PARAM_INT);
    $stmt->bindParam(':disponible',$_POST['disponible'],PDO::PARAM_INT);

    $resultado = $stmt->execute();

    if (!empty($resultado)) {
    return 'Registro actualizado';
    }
}

function editar_colageneral_idpropiedadintelectual($idPropiedadIntelectual,$conn){
    $stmt = $conn->prepare("UPDATE
                                colageneral
                            SET
                                disponible = :disponible
                            WHERE
                                TicketPropiedadIntelectual_idTicketPropiedadIntelectual = :idTicketPropiedadIntelectual");

    $stmt->bindParam(':idTicketPropiedadIntelectual',$_POST['idTicketPropiedadIntelectual'] , PDO::PARAM_INT);
    $stmt->bindParam(':disponible',$_POST['disponible'],PDO::PARAM_INT);

    $resultado = $stmt->execute();

    if (!empty($resultado)) {
    return 'Registro actualizado';
    }
}

function editar_colageneral_idregistroinmueble($idRegistroInmueble,$conn){
    $stmt = $conn->prepare("UPDATE
                                colageneral
                            SET
                                disponible = :disponible
                            WHERE
                                TicketRegisrtoInmueble_idTicketRegistroInueble = :idTicketRegistroInmueble");

    $stmt->bindParam(':idTicketRegistroInmueble',$_POST['idTicketRegistroInmueble'] , PDO::PARAM_INT);
    $stmt->bindParam(':disponible',$_POST['disponible'],PDO::PARAM_INT);

    $resultado = $stmt->execute();

    if (!empty($resultado)) {
    return 'Registro actualizado';
    }
}


if (isset($_POST["idColaGeneral"])) {
    include("../../config/conexion.php");
    
    echo editar_colageneral($_POST['idColaGeneral']); 
}
?>