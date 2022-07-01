<?php
@session_start();
if($_SESSION["autentica"] != "SIP"){
	header("Location: ../../views/user/login.php");
	exit();
}
?>
