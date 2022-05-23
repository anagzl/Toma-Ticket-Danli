<?php 
/* 
* Funcion para reproducir el numero de ticket mediante audio
*
* @Autor: Jonathan Laux
* @Fecha Creacion: 23/05/2022
*
*
*/

// Este es un ejemplo
$numero = 300;
$arrayNumeros = str_split($numero);

//crear arreglo
echo "var sonidos = new Array();";

for($i = 0; $i < count($arrayNumeros); $i++){
    echo "sonidos.push(new Audio('../../files/Voz/$arrayNumeros[$i].mp3'));";
}

//reproducir audios secuencialmente
echo "
var i = -1;
playSnd();
function playSnd() {
    i++;
    if (i == sonidos.length) return;
    sonidos[i].addEventListener('ended', playSnd);
    sonidos[i].play();
}";

?>