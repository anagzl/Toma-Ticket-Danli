  
/**autor: Ana Zavala
* Funcionalidad de Crear un registro nuevo
*modificacación 21/06/2022  
*/

     function registrar(){

         $(document).on('submit','#formularioCreacioningreso_cliente',function(event){
             event.preventDefault();
                var idUsuario                   = $("#idUsuario").val();
             /*   var num_identidad               = $("#num_identidad").val(); */
                var primerNombre                = $("#primerNombre").val();
                var segundoNombre               = $("#segundoNombre").val();
                var primerApellido              = $("#primerApellido").val();
                var segundoApellido             = $("#segundoApellido").val();
                var correo                      = $("#correo").val();
                var numeroCelular               = $("#numeroCelular").val();
                var Genero_idGenero             = $("#Genero_idGenero").val();
                var TipoUsuario_idTipoUsuario   = $("#TipoUsuario_idTipoUsuario").val();
                var Rol_idRol                   = $("#Rol_idRol").val();
   

                let formData = new FormData(this)
                formData.append('idUsuario', idUsuario);

            /* Validar campos que no lo envien v*/
                if(idUsuario != '' && /* num_identidad != '' && */ primerNombre != '' && segundoNombre != ''&& primerApellido != '' && segundoApellido != '' && numeroCelular != ''&& correo != ''&& Genero_idGenero != ''
                && TipoUsuario_idTipoUsuario != '' && Rol_idRol != ''){
                    $.ajax({
                        url:"crear_ingreso_cliente.php",
                            method:'POST',
                            data:formData,
                            contentType:false,
                            processData:false,
                            success:function(data){
                            alert(data); 

                            
                            $('#formularioCreacioningreso_cliente')[0].reset();
                            $('#modal').modal('hide');
                            $('#cerrar').click(); //Esto simula un click sobre el botón close de la modal, por lo que no se debe preocupar por qué clases agregar o qué clases sacar.
                            $('.modal-backdrop').remove();//eliminamos el backdrop del modal
                            dataTable.ajax.reload();
                            location.reload();
                        }
                    });

                }
                else{/* Si los campos estan vacios */
                    alert("Algunos campos son obligatorios.");
                }
            });
             $.get(`ticket_para_prueba.php?idTicket=2&direccion=1`,function(data,status){});
            window.open('imprimir_ticket.php', '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes'); 
            }