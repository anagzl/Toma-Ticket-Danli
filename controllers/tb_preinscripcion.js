
/**autor: Jonathan Laux
* Funcionalidad para guardar un usuario en la base de datos
*modificacación 03/08/2022  
*/

// abrir el modal si el cliente no esta inscrito o imprimir el ticket enseguida si lo esta
$(document).ready(function() {
    $('#submit-button').on('submit', function(e){
        e.preventDefault();
        var idUsuario = document.getElementById("idUsuario").value;
        var usuarioJson;
        $.get(`obtener_ingreso_cliente.php?idUsuario=${idUsuario}`,
            function(data,status){
                usuarioJson = JSON.parse(data);
                if(usuarioJson == ""){ // verificar si el empleado existe
                /*  desplega modal para llenado de datos cliente */
                    $('#modal').modal('show');
                }else{
                    // el usuario ya existe, solo se crea la bitacora y se imprime el ticket
                    alert("Usuario ya registrado!")
                }
            });
        });
  });

    function registrar(){
         $(document).on('submit','#formularioCreacioningreso_cliente',function(event){
             event.preventDefault();
                var idUsuario                   = $("#idUsuario").val();
                var primerNombre                = $("#primerNombre").val();
                var segundoNombre               = $("#segundoNombre").val();
                var primerApellido              = $("#primerApellido").val();
                var segundoApellido             = $("#segundoApellido").val();
                var correo                      = $("#correo").val();
                var numeroCelular               = $("#numeroCelular").val();   

                if(idUsuario != '' && primerNombre != '' && primerApellido != ''){
                    /* Primero crear el usuario */
                    $.post(`crear_usuario.php`,
                    {
                        idUsuario : idUsuario,      
                        primerNombre : primerNombre,
                        segundoNombre : segundoNombre,
                        primerApellido : primerApellido,
                        segundoApellido : segundoApellido,
                        numeroCelular : numeroCelular,
                        correo : correo
                    },function(data,status){
                        if(data > 0){
                            alert("Usuario creado con exito");
                            location.reload();
                        }else{
                            alert("Error al crear el empleado.")
                        }
                    })
                }
            });  
    }



var modal = document.getElementById("modal");

var btnAceptar = document.getElementById("btnAceptar");  
var spanClosemodal = document.getElementsByClassName("close")[0];
var btnOmitir = document.getElementsByClassName("btnOmitir")[0];
  

// cerrar modal con boton
    function coloseModal(){
    $('.modal').fadeOut();
    $('#modal').modal('hide')
}

    window.onclick = function(){
        if(event.target == modal){
            modal.style.display = "none";
        }
     } 
    //cerrar modal con boton de la X
   spanClosemodal.onclick = function() {
        $('.modal').fadeOut();
        $('#modal').modal('hide')
    }
