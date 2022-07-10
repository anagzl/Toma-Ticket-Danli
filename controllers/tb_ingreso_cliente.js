
/**autor: Ana Zavala
* Funcionalidad de Crear un registro nuevo
*modificacación 21/06/2022  
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
                  registrar_visita();
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


                //valores almacenados en la sesion necesarios para la creacion de la bitacora y el ticket
                let preferencia = sessionStorage.getItem("preferencial");
                let direccion = sessionStorage.getItem("direccion");
                let tramite = sessionStorage.getItem("tramite");
                if(idUsuario != '' && primerNombre != '' && primerApellido != '' && numeroCelular != ''&& correo != ''){
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
                        // si el usuario se creo con exito se crea una bitacora
                        if(data){
                            var currentTime = new Date();
                            const date = new Date().toJSON().slice(0,10);  //fecha actual  
                            var horaActual = ("0" + currentTime.getHours()).slice(-2) + ":" + ("0" + currentTime.getMinutes()).slice(-2) + ":" + ("0" + currentTime.getSeconds()).slice(-2);   //hora actual
                            $.post(`crear_bitacora_cliente.php`,
                            {
                                Sede_idSede : 1,
                                Usuario_idUsuario : idUsuario,
                                Tramite_idTramite : tramite,
                                Direccion_idDireccion : direccion,
                                fecha : date,
                                horaGeneracionTicket : horaActual,
                                horaEntrada : null,
                                horaSalida : null,
                                Observacion : null,
                                numeroTicket : null
                            },
                            function(data,status){
                                if(data != 0){
                                    $.post(`crear_ticket.php`,
                                    {
                                        idDireccion : direccion,
                                        Bitacora_idBitacora : data,
                                        Bitacora_Sede_idSede : 1,
                                        Empleado_idEmpleado : null,
                                        disponibilidad : 1,
                                        preferencia : preferencia,
                                        vecesLlamado : 0,
                                        marcarRellamado : 0,
                                        sigla: null,
                                        numero : null
                                    },function(data,status){
                                        sessionStorage.setItem('idTicket',data);
                                        window.open('imprimir_ticket.php', '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');
                                        window.location.replace('preferencia.php');
                                    });
                                }
                            });
                        }
                    });                   
                }
            });
            
    }

    function registrar_solo_id(){

        //valores almacenados en la sesion necesarios para la creacion de la bitacora y el ticket
        let preferencia = sessionStorage.getItem("preferencial");
        let direccion = sessionStorage.getItem("direccion");
        let tramite = sessionStorage.getItem("tramite");
        var idUsuario  =   $("#idUsuario").val();
     
        if(idUsuario != '' ){
               /* Primero crear el usuario */
               $.post(`crear_usuario.php`,
               {
                   idUsuario : idUsuario,
                   primerNombre : null,  //campos nulos
                   segundoNombre : null,
                   primerApellido : null,
                   segundoApellido : null,
                   numeroCelular : null,
                   correo : null
               },function(data,status){
                   // si el usuario se creo con exito se crea una bitacora
                   if(data){
                       var currentTime = new Date();
                       const date = new Date().toJSON().slice(0,10);  //fecha actual  
                       var horaActual = ("0" + currentTime.getHours()).slice(-2) + ":" + ("0" + currentTime.getMinutes()).slice(-2);   //hora actual
                       $.post(`crear_bitacora_cliente.php`,
                       {
                           Sede_idSede : 1,
                           Usuario_idUsuario : idUsuario,
                           Tramite_idTramite : tramite,
                           Direccion_idDireccion : direccion,
                           fecha : date,
                           horaGeneracionTicket : horaActual,
                           horaEntrada : null,
                           horaSalida : null,
                           Observacion : null,
                           numeroTicket : null
                       },
                       function(data,status){
                           if(data != 0){
                               $.post(`crear_ticket.php`,
                               {
                                   idDireccion : direccion,
                                   Bitacora_idBitacora : data,
                                   Bitacora_Sede_idSede : 1,
                                   Empleado_idEmpleado : null,
                                   disponibilidad : 1,
                                   preferencia : preferencia,
                                   vecesLlamado : 0,
                                   marcarRellamado : 0,
                                   sigla: null,
                                   numero : null
                               },function(data,status){
                                   sessionStorage.setItem('idTicket',data);
                                   window.open('imprimir_ticket.php', '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');
                                   window.location.replace('preferencia.php');
                               });
                           }
                       });
                   }
               });                   
        }                   
     }
     
     //Para registrara la visita de un cliente existente (Bitacora, creacion e impresion de ticket)
     function registrar_visita(){
        //valores almacenados en la sesion necesarios para la creacion de la bitacora y el ticket
        let preferencia = sessionStorage.getItem("preferencial");
        let direccion = sessionStorage.getItem("direccion");
        let tramite = sessionStorage.getItem("tramite");
        var idUsuario  =   $("#idUsuario").val();
     
        // crear bitacora con el usuario existente
           var currentTime = new Date();
           const date = new Date().toJSON().slice(0,10);  //fecha actual  
           var horaActual = ("0" + currentTime.getHours()).slice(-2) + ":" + ("0" + currentTime.getMinutes()).slice(-2);   //hora actual
           $.post(`crear_bitacora_cliente.php`,
           {
                 Sede_idSede : 1,
                 Usuario_idUsuario : idUsuario,
                 Tramite_idTramite : tramite,
                 Direccion_idDireccion : direccion,
                 fecha : date,
                 horaGeneracionTicket : horaActual,
                 horaEntrada : null,
                 horaSalida : null,
                 Observacion : null,
                 numeroTicket : null
           },
           function(data,status){
                 if(data != 0){
                    $.post(`crear_ticket.php`,
                    {
                       idDireccion : direccion,
                       Bitacora_idBitacora : data,
                       Bitacora_Sede_idSede : 1,
                       Empleado_idEmpleado : null,
                       disponibilidad : 1,
                       preferencia : preferencia,
                       vecesLlamado : 0,
                       marcarRellamado : 0,
                       sigla: null,
                       numero : 1
                    },function(data,status){
                       sessionStorage.setItem('idTicket',data);
                       window.open('imprimir_ticket.php', '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');
                       window.location.replace('preferencia.php');
                    });
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
     
//     function enviar(event) {
//       event.preventDefault();
// }