// obtener un ticket de la cola
var intervalo;
$(document).ready(function() {
    intervalo = setInterval(obtener_ticket_colageneral,2000);
});

//obtiene el siguiente ticket de la cola general
var ticketCola;
function obtener_ticket_colageneral(){
    $.get(`obtener_ultimo_ticket_cola_general.php`,
    function(data,status){
        ticketCola = JSON.parse(data);
        if(ticketCola != ""){
            clearInterval(intervalo);
        }
        //carga los datos del tipo dependiendo a la direccion que pertenezca
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
var ticketJson; //guardar los datos del ticket que se esta mostrando
var intervaloRevisarDisponibilidad;
function obtener_ticket(ticketId,direccionId){
    $.get(`obtener_ticket.php?idTicket=${ticketId}&direccion=${direccionId}`,
    function(data,status){
        ticketJson = JSON.parse(data);
        if(ticketJson == ""){
            alert("ocurrio un error al obtener el ticket")
        }else{
            mostrar_ticket(ticketJson); //mostrar los datos del ticket en la pantalla
            intervaloRevisarDisponibilidad = setInterval(revisar_disponibilidad_ticket,2000,ticketJson.idTicket,direccionId);
        }
    });
}


//revisar en la cola correspondiente si el ticket esta disponible o no
function revisar_disponibilidad_ticket(ticketId,direccionId){
    $.get(`obtener_ticket.php?idTicket=${ticketId}&direccion=${direccionId}`,
    function(data,status){
        console.log(data);
        var ticket = JSON.parse(data);
        if(ticket == ""){
            alert("ocurrio un error al obtener el ticket disponbile");
        }else{
            console.log(ticket);
            console.log(ticket.llamando);
            if(ticket.llamando == 0){
                eliminar_colageneral(ticketCola.idColaGeneral);
                cargar_ticket_tabla(ticket.siglas_ticket+ticket.numero,ticket.numero_ventanilla);
                clearInterval(intervaloRevisarDisponibilidad);   //detener intervalo que verifica si el ticket esta disponible       
                intervalo = setInterval(obtener_ticket_colageneral,2000);         
            }
        }
    });

}

// funcion para eliminar la colageneral actual una vez ya no este disponible
function eliminar_colageneral(colaGeneralId){
    $.post(`eliminar_colageneral.php`,
    {
        idColaGeneral : colaGeneralId
    },
    function(data,status){
        obtener_ticket_colageneral(); //obtener el siguiente ticket en cola luego de eliminar el anterior
    });
}

function cargar_ticket_tabla(numeroTicket,numeroVentanilla){
    html = document.getElementById("bodyTablaTicketsLlamados").innerHTML;
    html += `<tr><td style="color:black; font-size:25px;">${numeroTicket}</td>`;
    html += `<td style="color:black; font-size:25px;">${numeroVentanilla}</td><tr>`;
    document.getElementById("bodyTablaTicketsLlamados").innerHTML = html;
}

// llama el numero de ticket y la ventanilla mediante los altavoces
function llamar_ticket(numTicket,sigTicket,numVentanilla){
    $.post(`llamar_numero.php`,
    {
        numeroTicket : numTicket,
        siglasTicket : sigTicket,
        numeroVentanilla : numVentanilla
    },function(data,status){
        
    });
}

function mostrar_ticket(ticketJson){
    document.getElementById("numeroTicket").innerText = ticketJson.siglas_ticket + ('000'+ticketJson.numero).slice(-3);
    document.getElementById("numeroVentanilla").innerText = "Ventanilla " + ticketJson.numero_ventanilla;
    llamar_ticket(ticketJson.numero,ticketJson.siglas_ticket,ticketJson.numero_ventanilla);
    clearInterval(intervalo);
}