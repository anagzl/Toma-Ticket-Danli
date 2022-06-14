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
$numero = 15;
$arrayNumeros = str_split($numero);

//crear arreglo
if ($numero < 20){
    echo "<script>var sonidos = new Array();
    sonidos.push(new Audio('../../files/Voz/Número.mp3'));
    sonidos.push(new Audio('../../files/Voz/$numero.mp3'));
";
}else{
    if($numero < 100 && $numero > 19){
        echo "<script>var sonidos = new Array();
        sonidos.push(new Audio('../../files/Voz/Número.mp3'));
        sonidos.push(new Audio('../../files/Voz/$arrayNumeros[0]0.mp3'));
        sonidos.push(new Audio('../../files/Voz/y.mp3'));
        sonidos.push(new Audio('../../files/Voz/$arrayNumeros[1].mp3'));";
    }else{
        echo "<script>var sonidos = new Array();
        sonidos.push(new Audio('../../files/Voz/Número.mp3'));
        sonidos.push(new Audio('../../files/Voz/$arrayNumeros[0]00.mp3'));
        sonidos.push(new Audio('../../files/Voz/$arrayNumeros[1]0.mp3'));
        sonidos.push(new Audio('../../files/Voz/y.mp3'));
        sonidos.push(new Audio('../../files/Voz/$arrayNumeros[2].mp3'));
        ";
    }
}
    




// for($i = 0; $i < count($arrayNumeros); $i++){
//     echo "sonidos.push(new Audio('../../files/Voz/$arrayNumeros[$i]00.mp3'));";
// }

//reproducir audios secuencialmente
echo "
var i = -1;
playSnd();
function playSnd() {
    i++;
    if (i == sonidos.length) return;
    sonidos[i].addEventListener('ended', playSnd);
    sonidos[i].play();
}</script>";

?>