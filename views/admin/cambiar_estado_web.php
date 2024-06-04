<?php

/**
 * Formato de cambio de estado
 *
 * @Autor: Ana Zavala
 * @Fecha Creacion: 01/09/2022
*/

/**
 * Traer la conexion y la funciones
 */
    include("../../config/conexion.php");
    include("funciones_video_web.php");

	if(isset($_POST["idMediaVideoWeb"])){
			$query = $conexion->prepare("SELECT
				activo
				FROM
				mediavideoweb
			WHERE
			idMediaVideoWeb  = ". $_POST["idMediaVideoWeb"]);
		              $query->execute();
			$data = $query->fetchAll();

			foreach ($data as $valores):
				$Estado = $valores["activo"];  
			endforeach;


		/* Validar operacion cambio estado*/
			if ($Estado == 1 ) {
					$stmt = $conexion->prepare("UPDATE
					mediavideoweb
						SET
						activo = 0
						WHERE
						idMediaVideoWeb =:id ");
			}else{
					$stmt = $conexion->prepare("UPDATE
					mediavideoweb
					SET
					activo = 1
					WHERE
					idMediaVideoWeb =:id ");
			}

			$resultado = $stmt->execute(

			array(
				':id'      => $_POST["idMediaVideoWeb"]
			));


			if (!empty($resultado)){
			echo 'Registro Actualizo Estado.';
			}
}
?>