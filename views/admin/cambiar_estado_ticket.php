<?php

/**
 * Formato de cambio de estado
 *
 * @Autor: Ana Zavala 
 * @Fecha Creacion: 17/06/2024
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

    function cambiar_estado_ticket_vehicular($idTicket){
        include("../../config/conexion.php");
        $query = $conexion->prepare("SELECT
										disponibilidad
                                    FROM
                                        ticketpropiedadintelectual
                                    WHERE
                                        idTicketpropiedadintelectual  = ".$idTicket);
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
                                                   idTicketpropiedadintelectual=:id ");
			}else{
					$stmt = $conexion->prepare("UPDATE
													ticketpropiedadintelectual
												SET
                                                    disponibilidad = 1,
													vecesLlamado = 0
												WHERE
                                                    idTicketpropiedadintelectual =:id ");
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
               /*  case 1: //catastro
                    echo cambiar_estado_ticket_catastro($_POST['idTicket']);
                    break;
                case 2: // regularizacion predial
                    echo cambiar_estado_ticket_predial($_POST['idTicket']);
                    break; */
                case 1: // 
					echo cambiar_estado_ticket_catastro($_POST['idTicket']);
                    break;
                case 2:
                    echo cambiar_estado_ticket_vehicular($_POST['idTicket']);
                    break;
            }
    }
?>
