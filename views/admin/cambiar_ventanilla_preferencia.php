<?php

/**
 * Formato de cambio de estado
 *
 * @Autor: Ana Zavala
 * @Fecha Creacion: 12/09/2022
*/

/**
 * Traer la conexion y la funciones
 */
    include("../../config/conexion.php");
    include("funciones_ventanilla.php");

	if(isset($_POST["idVentanilla"])){
			$query = $conexion->prepare("SELECT
			ventanilla_preferencia
			FROM
			ventanilla
				WHERE
				idVentanilla  = ". $_POST["idVentanilla"]);
				$query->execute();
			$data = $query->fetchAll();

			foreach ($data as $valores):
				$Preferencia = $valores["ventanilla_preferencia"];  
			endforeach;


		/* Validar operacion cambio estado*/
			if ($Preferencia == 1 ) {
					$stmt = $conexion->prepare("UPDATE
					ventanilla
					SET
					ventanilla_preferencia = 0
					WHERE
					idVentanilla =:id ");
			}else{
					$stmt = $conexion->prepare("UPDATE
					ventanilla
					SET
					ventanilla_preferencia = 1
					WHERE
					idVentanilla =:id ");
			}

			$resultado = $stmt->execute(

			array(
				':id'      => $_POST["idVentanilla"]
			));


			if (!empty($resultado)){
			echo 'Registro Actualizo.';
			}
}
?>
