  
/**autor: Ana Zavala
* Funcionalidad de Crear un registro nuevo solo ingresando id
*fecha_creacion 24/06/2022  
*/
function registrar_solo_id(){

              $(document).on('submit','#formularioCreacioningreso_cliente',function(event){
                  event.preventDefault();
                     var idUsuario                   = $("#idUsuario").val();
                     var primerNombre                = NULL;
                     var segundoNombre               = NULL;
                     var primerApellido              = NULL;
                     var segundoApellido             = NULL;
                     var numeroCelular               = NULL;
                     var correo                      = NULL;

                     let formData = new FormData(this)
                     formData.append('idUsuario', idUsuario);
     
                 /* Validar campos que no lo envien */
                 if(idUsuario != '' && primerNombre != '' && segundoNombre != ''&& primerApellido != '' && segundoApellido != '' && numeroCelular != ''&& correo != '' ){
                         $.ajax({
                             url:"crear_ingreso_solo_id.php",
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
              /*  $.get(`ticket_para_prueba.php?idTicket=2&direccion=1`,function(data,status){});
                 window.open('imprimir_ticket.php', '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes'); */
                 }