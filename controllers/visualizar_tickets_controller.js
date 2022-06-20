// obtener un ticket de la cola
var intervalo;
$(document).ready(function() {
    intervalo = setInterval(obtener_ticket_colageneral,2000);
});


function obtener_ticket_colageneral(){
    $.get(`obtener_ultimo_ticket_cola_general.php`,
    function(data,status){
        var ticketCola = JSON.parse(data);
        console.log(ticketCola);
        if(ticketCola.TicketRegistroInmueble_idTicketRegistroInmueble != null ){
            obtener_ticket(ticketCola.TicketRegistroInmueble_idTicketRegistroInmueble,4); //registro inmueble
        }else{
            if(ticketCola.TicketPropiedadIntelectual_idTicketPropiedadIntelectual != null){
                obtener_ticket(ticketCola.TicketPropiedadIntelectual_idTicketPropiedadIntelectual,3);
            }else{
                if(ticketCola.TicketCatastro_idTicketCatastro != null){
                    obtener_ticket(ticketCola.TicketCatastro_idTicketCatastro,1);
                }else{
                    if(ticketCola.ticketPredial_idTicketPredial != null){
                        obtener_ticket(ticketCola.ticketPredial_idTicketPredial,2);
                    }
                }
            }
        }
        
    });
}

// funcion para obtener ticket en la cola dependiendo de la direccion
function obtener_ticket(ticketId,direccionId){
    $.get(`obtener_ticket.php?idTicket=${ticketId}&direccion=${direccionId}`,
    function(data,status){
        // alert(data);
        var ticketJson = JSON.parse(data);
        console.log(ticketJson);
        document.getElementById("numeroTicket").innerText = ticketJson.siglas_ticket + ('000'+ticketJson.numero).slice(-3);
        document.getElementById("numeroVentanilla").innerText = "Ventanilla " + ticketJson.numero_ventanilla;
    });
}


