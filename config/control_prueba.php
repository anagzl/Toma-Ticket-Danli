<?php
		$usr = $_POST["usuario"];
		include("conexion.php");
		require_once("../views/user/obtener_empleado.php");
		$datosUsuario = obtener_empleado_usuario($usr,$conexion);
		session_start();
		$_SESSION["user"] = $usuario;
		$_SESSION["login"] = $usr;
		$_SESSION["autentica"] = "SIP";
		if(empty($datosUsuario)){
				echo"<script> alert('Ese usuario no esta registrado en este sistema.'); window.location.href='../views/user/login.php'; </script>";
			}

			if($datosUsuario['Rol_idRol'] == '1'){
				echo"<script>window.location.href='../views/admin/tablero.php'; </script>";
			}elseif($datosUsuario['Rol_idRol'] == '2'){
				echo"<script>window.location.href='../views/user/llamar_tickets.php'; </script>";
			}else{
				echo"<script> alert('Ese usuario no esta registrado en este sistema.'); window.location.href='../views/user/login.php'; </script>";
			}

		
?>