<?php

/**
 * Formato de cambio de do
 *
 * @Autor: Ana Zavala
 * @Fecha Creacion: 07/08/2022
*/

/**
 * Traer la conexion y la funciones
 */
    include("../../config/conexion.php");
    include("funciones_empleado.php");

	if(isset($_POST["idEmpleado"])){
			$query = $conexion->prepare("SELECT
											estado
										FROM
											empleado
										WHERE
											idEmpleado  = ". $_POST["idEmpleado"]);
											$query->execute();
			$data = $query->fetchAll();

			foreach ($data as $valores):
				$Estado = $valores["estado"];  
			endforeach;


		/* Validar operacion cambio estado*/
			if ($Estado == 1 ) {
					$stmt = $conexion->prepare(" UPDATE 
													empleado
												SET
													estado = 0
												WHERE
													idEmpleado =:id ");
			}else{
					$stmt = $conexion->prepare("UPDATE
													empleado
												SET
													estado = 1
												WHERE
													idEmpleado =:id ");
			}

			$resultado = $stmt->execute(

			array(
				':id'      => $_POST["idEmpleado"]
			));


			if (!empty($resultado)){
			echo 'Registro Actualizado .';
			}
}
?>
