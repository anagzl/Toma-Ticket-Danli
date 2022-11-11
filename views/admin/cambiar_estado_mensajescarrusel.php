<?php

/**
 * Formato de cambio de estado
 *
 * @Autor: Jonathan Laux
 * @Fecha Creacion: 20/07/2022
*/

/**
 * Traer la conexion y la funciones
 */
    include("../../config/conexion.php");
    include("funciones_mensajescarrusel.php");

	if(isset($_POST["idMensajesCarrusel"])){
			$query = $conexion->prepare("SELECT
											activo
										FROM
											mensajescarrusel
										WHERE
											idMensajesCarrusel  = ". $_POST["idMensajesCarrusel"]);
			$query->execute();
			$data = $query->fetchAll();

			foreach ($data as $valores):
				$Estado = $valores["activo"];  
			endforeach;


		/* Validar operacion cambio estado*/
			if ($Estado == 1 ) {
					$stmt = $conexion->prepare("UPDATE
													mensajescarrusel
												SET
													activo = 0
												WHERE
													idMensajesCarrusel =:id ");
			}else{
					$stmt = $conexion->prepare("UPDATE
													mensajescarrusel
												SET
													activo = 1
												WHERE
													idMensajesCarrusel =:id ");
			}

			$resultado = $stmt->execute(

			array(
				':id'      => $_POST["idMensajesCarrusel"]
			));


			if (!empty($resultado)){
			echo 'Registro Actualizo Estado.';
			}
}
?>