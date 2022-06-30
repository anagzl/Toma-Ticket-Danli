  
/**autor: Ana Zavala
* Funcionalidad de Crear un registro nuevo
*modificacación 21/06/2022  
*/

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

                console.log(primerNombre);

                //valores almacenados en la sesion necesarios para la creacion de la bitacora y el ticket
                let preferencia = sessionStorage.getItem("preferencial");
                let direccion = sessionStorage.getItem("direccion");
                let tramite = sessionStorage.getItem("tramite");
                if(idUsuario != '' && primerNombre != '' && segundoNombre != '' && primerApellido != '' && segundoApellido != '' && numeroCelular != ''&& correo != ''){
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
                    });                   
                }
            });
            
    }