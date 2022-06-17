<?php
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
				echo"<script>window.location.href='../views/user/admin.php'; </script>";
			}else{
				echo"<script>window.location.href='../views/user/llamar_tickets.php'; </script>";
			}
			
		}
?>
