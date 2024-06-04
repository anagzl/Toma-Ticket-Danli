     
/**
* Funcionalidad de Crear un registro nuevo y guardar en bitacora
*/

function crear_bitacora(){

    $(document).on('submit','#formularioCreacionbitacora_cliente',function(event){
        event.preventDefault();
  
        
           var idBitacora                = $("#idBitacora").val();
           var Sede_idSede               = $("#Sede_idSede").val();
           var Usuario_idUsuario         = $("#Usuario_idUsuario").val();
           var Tramite_idTramite         = $("#Tramite_idTramite").val();
           var Direccion_idDireccion     = $("#Direccion_idDireccion").val();
           var fecha                     = $("#fecha").val();
           var horaGeneracionTicket      = $("#horaGeneracionTicket").val();
           var horaEntrada               = $("#horaEntrada").val();
           
           var horaSalida                = $("#horaSalida").val();
           var Observacion               = $("#Observacion").val();
       /*     var numeroTicket               = $("#numeroTicket").val(); */


           let formData = new FormData(this)
           formData.append('idBitacora', idBitacora);

       /* Validar campos que no lo envien v*/
           if(idBitacora != '' && Sede_idSede != '' && Usuario_idUsuario != '' && Tramite_idTramite != ''&& Direccion_idDireccion != '' && fecha != '' && horaGeneracionTicket != ''&& horaEntrada != ''&& horaSalida != ''
           && Observacion != '' /* && numeroTicket != '' */){
               $.ajax({
                   url:"crear_bitacora_cliente.php",
                       method:'POST',
                       data:formData,
                       contentType:false,
                       processData:false,
                       success:function(data){
                       alert(data); 

                       
                       $('#formularioCreacionbitacora_cliente')[0].reset();
                       $('#modal').modal('hide');
                       $('#cerrar').click(); //Esto simula un click sobre el botón close de la modal, por lo que no se debe preocupar por qué clases agregar o qué clases sacar.
                       $('.modal-backdrop').remove();//eliminamos el backdrop del modal
                      /*  dataTable.ajax.reload();
                       location.reload(); */
                   }
               });

           }
           else{/* Si los campos estan vacios */
               alert("Algunos campos son obligatorios.");
           }
       });


       }
       