<?php

/**
 * Formato de cambio de estado
 *
 * @Autor: Jonathan Laux
 * @Fecha Creacion: 08/07/2022
*/

/**
 * Traer la conexion y la funciones
 */
    // include("funciones_ventanilla.php");

    function cambiar_estado_ticket_catastro($idTicket){
        include("../../config/conexion.php");
        $query = $conexion->prepare("SELECT
										disponibilidad
                                    FROM
                                        ticketcatastro
                                    WHERE
                                        idTicketCatastro  = ".$idTicket);
            $query->execute();
			$data = $query->fetchAll();

			foreach ($data as $valores):
				$Estado = $valores["disponibilidad"];  
			endforeach;


		/* Validar operacion cambio estado*/
			if ($Estado == 1 ) {
					$stmt = $conexion->prepare("UPDATE
													ticketcatastro
												SET
                                                    disponibilidad = 0
												WHERE
													idTicketCatastro =:id ");
			}else{
					$stmt = $conexion->prepare("UPDATE
													ticketcatastro
												SET
                                                    disponibilidad = 1,
													vecesLlamado = 0
												WHERE
													idTicketCatastro =:id ");
			}

			$resultado = $stmt->execute(

			array(
				':id'      => $idTicket
			));

			if (!empty($resultado)){
			return 'Registro Actualizo Estado.';
			}

    }

    function cambiar_estado_ticket_predial($idTicket){
        include("../../config/conexion.php");
        $query = $conexion->prepare("SELECT
										disponibilidad
                                    FROM
                                        ticketpredial
                                    WHERE
                                        idTicketPredial  = ".$idTicket);
            $query->execute();
			$data = $query->fetchAll();

			foreach ($data as $valores):
				$Estado = $valores["disponibilidad"];  
			endforeach;


		/* Validar operacion cambio estado*/
			if ($Estado == 1 ) {
					$stmt = $conexion->prepare("UPDATE
													ticketpredial
												SET
                                                    disponibilidad = 0
												WHERE
                                                idTicketPredial =:id ");
			}else{
					$stmt = $conexion->prepare("UPDATE
													ticketpredial
												SET
                                                    disponibilidad = 1,
													vecesLlamado = 0
												WHERE
                                                idTicketPredial =:id ");
			}

			$resultado = $stmt->execute(

			array(
				':id'      => $idTicket
			));

			if (!empty($resultado)){
			return 'Registro Actualizo Estado.';
			}

    }

    function cambiar_estado_ticket_intelectual($idTicket){
        include("../../config/conexion.php");
        $query = $conexion->prepare("SELECT
										disponibilidad
                                    FROM
                                        ticketpropiedadintelectual
                                    WHERE
                                        idTicketPropiedadIntelectual  = ".$idTicket);
            $query->execute();
			$data = $query->fetchAll();

			foreach ($data as $valores):
				$Estado = $valores["disponibilidad"];  
			endforeach;


		/* Validar operacion cambio estado*/
			if ($Estado == 1 ) {
					$stmt = $conexion->prepare("UPDATE
													ticketpropiedadintelectual
												SET
                                                    disponibilidad = 0
												WHERE
                                                    idTicketPropiedadIntelectual =:id ");
			}else{
					$stmt = $conexion->prepare("UPDATE
													ticketpropiedadintelectual
												SET
                                                    disponibilidad = 1,
													vecesLlamado = 0
												WHERE
                                                    idTicketPropiedadIntelectual =:id ");
			}

			$resultado = $stmt->execute(

			array(
				':id'      => $idTicket
			));

			if (!empty($resultado)){
			return 'Registro Actualizo Estado.';
			}

    }

    function cambiar_estado_ticket_registro($idTicket){
        include("../../config/conexion.php");
        $query = $conexion->prepare("SELECT
										disponibilidad
                                    FROM
                                        ticketregistroinmueble
                                    WHERE
                                        idTicketRegistroInmueble  = ".$idTicket);
            $query->execute();
			$data = $query->fetchAll();

			foreach ($data as $valores):
				$Estado = $valores["disponibilidad"];  
			endforeach;


		/* Validar operacion cambio estado*/
			if ($Estado == 1 ) {
					$stmt = $conexion->prepare("UPDATE
													ticketregistroinmueble
												SET
                                                    disponibilidad = 0
												WHERE
                                                    idTicketRegistroInmueble =:id ");
			}else{
					$stmt = $conexion->prepare("UPDATE
													ticketregistroinmueble
												SET
                                                    disponibilidad = 1,
													vecesLlamado = 0
												WHERE
                                                    idTicketRegistroInmueble =:id ");
			}

			$resultado = $stmt->execute(

			array(
				':id'      => $idTicket
			));

			if (!empty($resultado)){
			return 'Registro Actualizo Estado.';
			}

    }

	if(isset($_POST["idTicket"]) && isset($_POST['direccion'])){
			switch($_POST['direccion']){
                case 1: //catastro
                    echo cambiar_estado_ticket_catastro($_POST['idTicket']);
                    break;
                case 2: // regularizacion predial
                    echo cambiar_estado_ticket_predial($_POST['idTicket']);
                    break;
                case 3: // 
                    echo cambiar_estado_ticket_intelectual($_POST['idTicket']);
                    break;
                case 4:
                    echo cambiar_estado_ticket_registro($_POST['idTicket']);
                    break;
            }
    }
?>
