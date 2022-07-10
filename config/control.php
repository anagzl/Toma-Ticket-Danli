<?php
		date_default_timezone_set('America/Tegucigalpa');
		require("ldap.php");
		header("Content-Type: text/html; charset=utf-8");
		$usr = $_POST["usuario"];
		$usuario = mailboxpowerloginrd($usr,$_POST["clave"]);
		if($usuario == "0" || $usuario == ''){
			$_SERVER = array();
			$_SESSION = array();
			echo"<script> alert('Usuario o clave incorrecta. Vuelva a digitarlos por favor.'); window.location.href='../views/user/login.php'; </script>";
		}else{
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
				// crear jornada para usuario si es de ventanilla
				require_once('funciones_jornadalaboral.php');
				$resultado = obtener_jornadalaboral($conexion,$datosUsuario["idEmpleado"],date("Y-m-d"));
				if(empty($resultado)){
					//si o existe una jornada para el dia se crea una
					crear_jornadalaboral($conexion,$datosUsuario['Ventanilla_idVentanilla'],$datosUsuario["idEmpleado"],null,date("Y-m-d"),date("h:i:sa"));
					echo"<script>window.location.href='../views/user/llamar_tickets.php'; </script>";
				}else{
					// si ya existe jornada para el dia solo se redirige al usuario
					echo"<script>window.location.href='../views/user/llamar_tickets.php'; </script>";
				}
			}else{
				echo"<script> alert('Ese usuario no esta registrado en este sistema.'); window.location.href='../views/user/login.php'; </script>";
			}

		}
?>
