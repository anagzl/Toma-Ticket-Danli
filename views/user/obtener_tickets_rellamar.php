<?php
/**
 * Obtener los ticket que el usuario marco para rellamar
 * 
 * @Autor: Jonathan Laux
 * @Fecha Creacion: 02/06/2022
 * @Fecha Revision:
*/

/**
 * Configuracion de conexion
 */
    include("../../config/conexion.php");

/**
 * Funcionalidad para obtener tickets que el usuario
 * marco anteriormente para rellamar
 * 
 */    
if (isset($_GET['idEmpleado']) && isset($_GET['idDireccion'])) {
    switch($_GET['idDireccion']){
        case 1: //catastro
            $stmt = $conexion->prepare("SELECT
                                            tc.idTicketCatastro AS idTicket,
                                            tc.Bitacora_idBitacora,
                                            b.Direccion_idDireccion,
                                            d.siglas,
                                            b.Tramite_idTramite,
                                            t.nombreTramite,
                                            tc.Bitacora_Sede_idSede,
                                            tc.Empleado_idEmpleado,
                                            tc.disponibilidad,
                                            tc.preferencia,
                                            tc.marcarRellamado,
                                            tc.vecesLlamado,
                                            tc.sigla as siglas_ticket,
                                            tc.numero
                                        FROM
                                            ticketcatastro AS tc
                                        INNER JOIN bitacora AS b
                                        ON
                                            b.idBitacora = tc.Bitacora_idBitacora
                                        INNER JOIN tramite AS t
                                        ON
                                            t.idTramite = b.Tramite_idTramite
                                        INNER JOIN direccion AS d
                                        ON
                                            d.idDireccion = b.Direccion_idDireccion
                                        WHERE
                                            Empleado_idEmpleado = :idEmpleado AND marcarRellamado = 1;");
            $stmt->execute(
                array(
                    ':idEmpleado' => $_GET['idEmpleado']
                )
            );
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);           
            $json = json_encode($resultado);
            echo $json;
        break;
        case 2: //regulacion predial
            $salida = array();
            $stmt = $conexion->prepare("SELECT
                                            tp.idTicketPredial AS idTicket,
                                            tp.Bitacora_idBitacora,
                                            b.Direccion_idDireccion,
                                            d.siglas,
                                            b.Tramite_idTramite,
                                            t.nombreTramite,
                                            tp.Bitacora_Sede_idSede,
                                            tp.Empleado_idEmpleado,
                                            tp.disponibilidad,
                                            tp.preferencia,
                                            tp.marcarRellamado,
                                            tp.vecesLlamado,
                                            tp.sigla as siglas_ticket,
                                            tp.numero
                                        FROM
                                            ticketpredial AS tp
                                        INNER JOIN bitacora AS b
                                        ON
                                            b.idBitacora = tp.Bitacora_idBitacora
                                        INNER JOIN tramite AS t
                                        ON
                                            t.idTramite = b.Tramite_idTramite
                                        INNER JOIN direccion AS d
                                        ON
                                            d.idDireccion = b.Direccion_idDireccion
                                        WHERE
                                            Empleado_idEmpleado = :idEmpleado AND marcarRellamado = 1;");
            $stmt->execute(
                array(
                    ':idEmpleado' => $_GET['idEmpleado']
                )
            );
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $json = json_encode($resultado);
            echo $json;
        break;
        case 3: //propiedad intelectual
            $salida = array();
            $stmt = $conexion->prepare("SELECT
                                            ti.idTicketPropiedadIntelectual AS idTicket,
                                            ti.Bitacora_idBitacora,
                                            b.Direccion_idDireccion,
                                            d.siglas,
                                            b.Tramite_idTramite,
                                            t.nombreTramite,
                                            ti.Bitacora_Sede_idSede,
                                            ti.Empleado_idEmpleado,
                                            ti.disponibilidad,
                                            ti.preferencia,
                                            ti.marcarRellamado,
                                            ti.vecesLlamado,
                                            ti.sigla as siglas_ticket,
                                            ti.numero
                                        FROM
                                            ticketpropiedadintelectual AS ti
                                        INNER JOIN bitacora AS b
                                        ON
                                            b.idBitacora = ti.Bitacora_idBitacora
                                        INNER JOIN tramite AS t
                                        ON
                                            t.idTramite = b.Tramite_idTramite
                                        INNER JOIN direccion AS d
                                        ON
                                            d.idDireccion = b.Direccion_idDireccion
                                        WHERE
                                            Empleado_idEmpleado = :idEmpleado AND marcarRellamado = 1;");
            $stmt->execute(
                array(
                    ':idEmpleado' => $_GET['idEmpleado']
                )
            );
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $json = json_encode($resultado);
            echo $json;
        break;
        case 4: //registro inmueble
            $salida = array();
            $stmt = $conexion->prepare("SELECT
                                            tri.idTicketRegistroInmueble AS idTicket,
                                            tri.Bitacora_idBitacora,
                                            b.Direccion_idDireccion,
                                            d.siglas,
                                            b.Tramite_idTramite,
                                            t.nombreTramite,
                                            tri.Bitacora_Sede_idSede,
                                            tri.Empleado_idEmpleado,
                                            tri.disponibilidad,
                                            tri.preferencia,
                                            tri.marcarRellamado,
                                            tri.vecesLlamado,
                                            tri.sigla as siglas_ticket,
                                            tri.numero
                                        FROM
                                            ticketregistroinmueble AS tri
                                        INNER JOIN bitacora AS b
                                        ON
                                            b.idBitacora = tri.Bitacora_idBitacora
                                        INNER JOIN tramite AS t
                                        ON
                                            t.idTramite = b.Tramite_idTramite
                                        INNER JOIN direccion AS d
                                        ON
                                            d.idDireccion = b.Direccion_idDireccion
                                        WHERE
                                            Empleado_idEmpleado = :idEmpleado AND marcarRellamado = 1;");
            $stmt->execute(
                array(
                    ':idEmpleado' => $_GET['idEmpleado']
                )
            );
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $json = json_encode($resultado);
            echo $json;
        break;
    }
    
}
?>