//funcion que se ejecuta al inicio
function init(){
    $("#formLogin").on("submit",function(e){
        if (($('#usuario').val().length == 0) || ($('#clave').val().length == 0)){
            alert("El campo esta vacío.");  
        }
    })

    /* Establecer el foco en un campo de entrada en un formulario HTML */
    window.onload = function () {
        document.getElementById("usuario").focus();
    }
    
    }
    
    
    //funcion limpiar
    function limpiar(){
        $("#usuario").val("");
        $("#clave").val("");
        setTimeout('document.location.reload()',2000);
    }

init();