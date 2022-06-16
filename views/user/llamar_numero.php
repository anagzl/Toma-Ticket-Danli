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
$numero = 5;
$numeroVentanilla = 20;
$siglasTicket = "C";

$arrayNumeros = str_split($numero);
$length = count($arrayNumeros);


echo "<script> var numeros = new Array();
timbre = new Audio('../../files/Voz/timbre.mp3');
ticket = new Audio('../../files/Voz/Ticket.mp3');
siglas = new Audio('../../files/Voz/$siglasTicket.mp3');
";

//si el numero de ticket tiene 3 digitos
if($length == 3){
    if($arrayNumeros[0] == '1'){
        if($numero == 100){ //validar si se reproducira 100 o ciento
            echo "numeros.push(new Audio('../../files/Voz/100.mp3'));"; 
        }else{
            echo "numeros.push(new Audio('../../files/Voz/ciento.mp3'));";
        }
    }else{  // en caso de no ser cien solo se reproduce el audio del numero
        echo "numeros.push(new Audio('../../files/Voz/$arrayNumeros[0]00.mp3'));";
    }
    if($arrayNumeros[1] == '1'){    // validar si se reproducira un numero del 11 al 19 pues estos tienen pronunciacion unica
        echo "numeros.push(new Audio('../../files/Voz/$arrayNumeros[1]$arrayNumeros[2].mp3'));";
    }else{
        if($arrayNumeros[1] == '0'){    // si el decimal es 0 se reproducira solamente el numero en las unidades
            echo "numeros.push(new Audio('../../files/Voz/$arrayNumeros[2].mp3'));";
        }else{
            if($arrayNumeros[2] == '0'){    //validar si las unidades equivalen a 0, en ese caso solo reproducir el numero correspodiente al decimal
                echo "numeros.push(new Audio('../../files/Voz/$arrayNumeros[1]0.mp3'));";
            }else{  // reproducir decimal -> 'y' -> unidad
                echo "numeros.push(new Audio('../../files/Voz/$arrayNumeros[1]0.mp3'));
                numeros.push(new Audio('../../files/Voz/y.mp3'));
                numeros.push(new Audio('../../files/Voz/$arrayNumeros[2].mp3'));";
            }
        }
    }
}else{
    if($length == 2){
        if($arrayNumeros[0] == '1'){
            echo "numeros.push(new Audio('../../files/Voz/$arrayNumeros[0]$arrayNumeros[1].mp3'));";
        }else{
            if($arrayNumeros[0] == '0'){
                echo "numeros.push(new Audio('../../files/Voz/$arrayNumeros[1].mp3'));";
            }else{
                if($arrayNumeros[1] == '0'){    //validar si las unidades equivalen a 0, en ese caso solo reproducir el numero correspodiente al decimal
                    echo "numeros.push(new Audio('../../files/Voz/$arrayNumeros[0]0.mp3'));";
                }else{  // reproducir decimal -> 'y' -> unidad
                    echo "numeros.push(new Audio('../../files/Voz/$arrayNumeros[0]0.mp3'));
                    numeros.push(new Audio('../../files/Voz/y.mp3'));
                    numeros.push(new Audio('../../files/Voz/$arrayNumeros[1].mp3'));";
                }
            }
        }
    }else{
        echo "numeros.push(new Audio('../../files/Voz/$arrayNumeros[0].mp3'));";
    }  
}

echo "mensajeVentanilla = new Audio('../../files/Voz/Favor pasar a la ventanilla.mp3');
      numeroVentanilla = new Audio('../../files/Voz/$numeroVentanilla.mp3');";

echo "

// reproducir audios de ticket y sigla
var promise = new Promise(function (resolve,reject){
        timbre.play();
        setTimeout(playSonido,4000,ticket);
        setTimeout(playSonido,5350,siglas);
        resolve();
});

// una vez se terminen de reproducir los audios de ticket y sigla
// reproducir el numero
// Nota: No se reproduce el audio con un for porque con el evento de ended existe una pausa muy larga entre audios.
var promise2 = new Promise(async function (resolve,reject){
    await promise;
    setTimeout(function(){
        if(numeros.length == 1){
            numeros[0].play();
            numeros[0].addEventListener('ended',function(){ // resolver la promesa cuando se termine de reproducir el ultimo audio del arreglo
                resolve();
            });
        }else{
            if(numeros.length == 2){
                numeros[0].play();
                setTimeout(playSonido,1000,numeros[1]);
                numeros[1].addEventListener('ended',function(){
                    resolve();
                });
            }else{
                numeros[0].play();
                setTimeout(playSonido,800,numeros[1]);
                setTimeout(playSonido,1500,numeros[2]);
                setTimeout(playSonido,1800,numeros[3]);
                numeros[3].addEventListener('ended',function(){
                    resolve();
                });
            }
        }
    },5600);
});

// reproducir mensaje de ventanilla una vez se deje de reproducir el audio de 
// numeros
promise2.then((value) => {
    mensajeVentanilla.play();
    setTimeout(playSonido,2200,numeroVentanilla);
    setTimeout(playSonido,3000,timbre);
});

function playSonido(sonido){
    sonido.play();
}

</script>";
?>