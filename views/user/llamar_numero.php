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
$numero = 154;
$numeroVentanilla = 5;
$siglasTicket = "RP";

$arrayNumeros = str_split($numero);
$length = count($arrayNumeros);

// debug_to_console($length);

echo "<script> var numeros = new Array();
ticket = new Audio('../../files/Voz/Ticket.mp3');
siglas = new Audio('../../files/Voz/$siglasTicket.mp3');
";

//si el numero de ticket tiene 3 digitos
if($length == 3){
    if($arrayNumeros[0] == '1'){
        if($numero == 100){
            echo "numeros.push(new Audio('../../files/Voz/100.mp3'));";
        }else{
            echo "numeros.push(new Audio('../../files/Voz/ciento.mp3'));";
        }
    }else{
        echo "numeros.push(new Audio('../../files/Voz/$arrayNumeros[0]00.mp3'));";
    }
    if($arrayNumeros[1] == '1'){
        echo "numeros.push(new Audio('../../files/Voz/$arrayNumeros[1]$arrayNumeros[2].mp3'));";
    }else{
        if($arrayNumeros[1] == '0'){
            echo "numeros.push(new Audio('../../files/Voz/$arrayNumeros[2].mp3'));";
        }else{
            echo "numeros.push(new Audio('../../files/Voz/$arrayNumeros[1]0.mp3'));
            numeros.push(new Audio('../../files/Voz/y.mp3'));
            numeros.push(new Audio('../../files/Voz/$arrayNumeros[2].mp3'));";
        }
    }
}else{
    if($arrayNumeros[0] == '1'){
        echo "numeros.push(new Audio('../../files/Voz/$arrayNumeros[0]$arrayNumeros[1].mp3'));";
    }else{
        if($arrayNumeros[0] == '0'){
            echo "numeros.push(new Audio('../../files/Voz/$arrayNumeros[1].mp3'));";
        }else{
            echo "numeros.push(new Audio('../../files/Voz/$arrayNumeros[0]0.mp3'));
            numeros.push(new Audio('../../files/Voz/y.mp3'));
            numeros.push(new Audio('../../files/Voz/$arrayNumeros[1].mp3'));";
        }
    }
    
}

echo "mensajeVentanilla = new Audio('../../files/Voz/Favor pasar a la ventanilla.mp3');";

echo "numeroVentanilla = new Audio('../../files/Voz/$numeroVentanilla.mp3');";

echo "
reproducirAudio();
function reproducirAudio(){
    playTicketSigla();
    playNumeros();
    playNumeroVentanilla();
}

function playSonido(sonido){
    sonido.play();
}

function playTicketSigla(){
    ticket.play(); 
    setTimeout(playSonido,1500,siglas);
    return;
}

function playNumeros(){
    if(numeros.length == 1){
        numeros[0].play();
    }else{
        if(numeros.length == 2){
            numeros[0].play();
            setTimeout(playSonido,2000,numeros[1]);
        }else{
            numeros[0].play();
            setTimeout(playSonido,2000,numeros[1]);
            setTimeout(playSonido,3000,numeros[2]);
            setTimeout(playSonido,4000,numeros[3]);
        }
    }
    return;
}

function playNumeroVentanilla(){
    setTimeout(playSonido,1000,mensajeVentanilla);
    setTimeout(playSonido,2000,numeroVentanilla);
    return;
}


</script>";



// function debug_to_console($data) {
//     $output = $data;
//     if (is_array($output))
//         $output = implode(',', $output);

//     echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
// }
    
//reproducir audios secuencialmente
// echo "
// var i = -1;
// playSnd();
// function playSnd() {
//     i++;
//     if (i == numeros.length) return;
//     numeros[i].addEventListener('ended', playSnd);
//     numeros[i].play();
// }</script>";

?>