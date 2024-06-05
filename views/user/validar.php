<?php
function validar_dni($dni){
	$letra = substr($dni, -1);
	$numeros = substr($dni, 0, -1);
	if ( substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros%23, 1) == $letra && strlen($letra) == 1 && strlen ($numeros) == 13 ){
		echo 'valido';
	}else{
		echo 'no valido';
	}
}
 
validar_dni('73547889F'); // válido
validar_dni('73547889M'); // no válido
validar_dni('73547889'); // no válido


