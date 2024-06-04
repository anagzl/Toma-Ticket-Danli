<?php

/**
 * Formato de cambio de estado
 *
 * @Autor: Ana Zavala
 * @Fecha Creacion: 7/10/2022
*/

/**
 * Traer la conexion y la funciones
 */
    include("../../config/conexion.php");
    include("funciones_usuario.php");

	if(isset($_POST["idUsuario"])){
			$query = $conexion->prepare("SELECT
											estado
										FROM
											usuario
										WHERE
											idUsuario  = ". $_POST["idUsuario"]);
											$query->execute();
			$data = $query->fetchAll();

			foreach ($data as $valores):
				$Estado = $valores["estado"];  
			endforeach;


		/* Validar operacion cambio estado*/
			if ($Estado == 1 ) {
					$stmt = $conexion->prepare("UPDATE
													usuario
												SET
													estado = 0
												WHERE
                                                idUsuario =:id ");
			}else{
					$stmt = $conexion->prepare("UPDATE
													usuario
												SET
													estado = 1
												WHERE
                                                idUsuario =:id ");
			}

			$resultado = $stmt->execute(

			array(
				':id'      => $_POST["idUsuario"]
			));


			if (!empty($resultado)){
			echo 'Registro Actualizado.';
			}
}
?>
