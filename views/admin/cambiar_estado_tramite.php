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
    include("../../config/conexion.php");
    include("funciones_tramite.php");

	if(isset($_POST["idTramite"])){
			$query = $conexion->prepare("SELECT
											estado
										FROM
											tramite
										WHERE
											idTramite  = ". $_POST["idTramite"]);
											$query->execute();
			$data = $query->fetchAll();

			foreach ($data as $valores):
				$Estado = $valores["estado"];  
			endforeach;


		/* Validar operacion cambio estado*/
			if ($Estado == 1 ) {
					$stmt = $conexion->prepare("UPDATE
													tramite
												SET
													estado = 0
												WHERE
													idTramite =:id ");
			}else{
					$stmt = $conexion->prepare("UPDATE
													tramite
												SET
													estado = 1
												WHERE
													idTramite =:id ");
			}

			$resultado = $stmt->execute(

			array(
				':id'      => $_POST["idTramite"]
			));


			if (!empty($resultado)){
			echo 'Registro Actualizo Estado.';
			}
}
?>
