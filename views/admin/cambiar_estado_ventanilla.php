<?php

/**
 * Formato de cambio de estado
 *
 * @Autor: Jonathan Laux
 * @Fecha Creacion: 06/07/2022
*/

/**
 * Traer la conexion y la funciones
 */
    include("../../config/conexion.php");
    include("funciones_ventanilla.php");

	if(isset($_POST["idVentanilla"])){
			$query = $conexion->prepare("SELECT
											estado
										FROM
											ventanilla
										WHERE
											idVentanilla  = ". $_POST["idVentanilla"]);
											$query->execute();
			$data = $query->fetchAll();

			foreach ($data as $valores):
				$Estado = $valores["estado"];  
			endforeach;


		/* Validar operacion cambio estado*/
			if ($Estado == 1 ) {
					$stmt = $conexion->prepare("UPDATE
													ventanilla
												SET
													estado = 0
												WHERE
													idVentanilla =:id ");
			}else{
					$stmt = $conexion->prepare("UPDATE
													ventanilla
												SET
													estado = 1
												WHERE
													idVentanilla =:id ");
			}

			$resultado = $stmt->execute(

			array(
				':id'      => $_POST["idVentanilla"]
			));


			if (!empty($resultado)){
			echo 'Registro Actualizo Estado.';
			}
}
?>
