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
    include("funciones_mediacarrusel.php");

	if(isset($_POST["idMedia"])){
			$query = $conexion->prepare("SELECT
											activo
										FROM
											mediacarrusel
										WHERE
											idMedia  = ". $_POST["idMedia"]);
											$query->execute();
			$data = $query->fetchAll();

			foreach ($data as $valores):
				$Estado = $valores["activo"];  
			endforeach;


		/* Validar operacion cambio estado*/
			if ($Estado == 1 ) {
					$stmt = $conexion->prepare("UPDATE
													mediacarrusel
												SET
													activo = 0
												WHERE
													idMedia =:id ");
			}else{
					$stmt = $conexion->prepare("UPDATE
													mediacarrusel
												SET
													activo = 1
												WHERE
													idMedia =:id ");
			}

			$resultado = $stmt->execute(

			array(
				':id'      => $_POST["idMedia"]
			));


			if (!empty($resultado)){
			echo 'Registro Actualizo Estado.';
			}
}
?>