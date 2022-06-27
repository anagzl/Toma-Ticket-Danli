  
/**autor: Ana Zavala
* Funcionalidad de Crear un registro nuevo solo ingresando id
*fecha_creacion 24/06/2022  
  modifficaciones 27/06/2022
*/
function registrar_solo_id(){
  
  
                 var idUsuario  =   $("#idUsuario").val();
                 /* Validar campos que no lo envien */
                 if(idUsuario != '' ){
                   $.post(`crear_ingreso_solo_id.php`,
                   {
                    idUsuario : idUsuario
                   },
                   function(data,status){
                        alert(data);
                   });
                  
                     }
                     else{/* Si los campos estan vacios */
                         alert("Algunos campos son obligatorios.");
                         
                        }
                
                   $.get(`ticket_para_prueba.php?idTicket=2&direccion=1`,function(data,status){});
                    window.open('imprimir_ticket.php', '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes'); 
                    }