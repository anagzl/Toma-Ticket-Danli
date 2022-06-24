// obtener un ticket de la cola
var intervalo;
$(document).ready(function() {
    intervalo = setInterval(obtener_ticket_colageneral,10000);
});

//obtiene el siguiente ticket de la cola general
var ticketCola;
function obtener_ticket_colageneral(){
    $.get(`obtener_ultimo_ticket_cola_general.php`,
    function(data,status){
        ticketCola = JSON.parse(data);
        if(ticketCola != ""){
            clearInterval(intervalo);
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
        }else{
            // clearInterval(intervalo);
            // intervalo = setInterval(obtener_ticket_colageneral,2000);         
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
            // intervaloRevisarDisponibilidad = setInterval(revisar_disponibilidad_ticket,5000,ticketJson.idTicket,direccionId);
        }
    });
}


//revisar en la cola correspondiente si el ticket esta disponible o no
// function revisar_disponibilidad_ticket(ticketId,direccionId){
//     $.get(`obtener_ticket.php?idTicket=${ticketId}&direccion=${direccionId}`,
//     function(data,status){
//         var ticket = JSON.parse(data);
//         if(ticket == ""){
//             alert("ocurrio un error al obtener el ticket disponbile");
//         }else{
//             if(ticket.llamando == 0){
//                 eliminar_colageneral(ticketCola.idColaGeneral);
//                 cargar_ticket_tabla(ticket.siglas_ticket+('000'+ticket.numero).slice(-3),ticket.numero_ventanilla);
//                 clearInterval(intervaloRevisarDisponibilidad);   //detener intervalo que verifica si el ticket esta disponible       
//                 // intervalo = setInterval(obtener_ticket_colageneral,2000);         
//             }
//         }
//     });

// }

// funcion para eliminar la colageneral actual una vez ya no este disponible
async function eliminar_colageneral(colaGeneralId){
    $.post(`eliminar_colageneral.php`,
    {
        idColaGeneral : colaGeneralId
    },
    function(data,status){
        obtener_ticket_colageneral(); //obtener el siguiente ticket en cola luego de eliminar el anterior
    });
}

function cargar_ticket_tabla(numeroTicket,numeroVentanilla){
    var tablaTickets = document.getElementById("tablaTickets");
    var filasCount = tablaTickets.tBodies[0].rows.length;
    // para eliminar la ultima fila y que el maximo de rows en el body sea 4
    if(filasCount == 6){
        tablaTickets.deleteRow(filasCount-1);
    }

    inicial = document.getElementById("bodyTablaTicketsLlamados").innerHTML;
    html = `<tr><td style="color:black; font-size:25px;">${numeroTicket}</td>`;
    html += `<td style="color:black; font-size:25px;">${numeroVentanilla}</td><tr>`;
    html += inicial;
    document.getElementById("bodyTablaTicketsLlamados").innerHTML = html;
}

//mostrar los datos del ticket en pantalla, esperar 10 segundos y buscar el siguiente llamado de ticket
async function mostrar_ticket(ticketJson){
    cargar_ticket_tabla(ticketJson.siglas_ticket+('000'+ticketJson.numero).slice(-3),ticketJson.numero_ventanilla);
    document.getElementById("numeroTicket").innerText = ticketJson.siglas_ticket + ('000'+ticketJson.numero).slice(-3);
    document.getElementById("numeroVentanilla").innerText = "Ventanilla " + ticketJson.numero_ventanilla;
    llamar_ticket(ticketJson.numero,ticketJson.siglas_ticket,ticketJson.numero_ventanilla);
    clearInterval(intervalo);
    cambiarColorFondoTicket();

    // esperar 10 segundos antes de llamar el siguiente ticket en cola
    var promise = new Promise(function (resolve,reject){
        setTimeout(function(){
            eliminar_colageneral(ticketCola.idColaGeneral);
            resolve();
        },10000);
    });
    promise.then(function(data){
        intervalo = setInterval(obtener_ticket_colageneral,2000);
    });

}

// llama el numero de ticket y la ventanilla mediante los altavoces
function llamar_ticket(numTicket,sigTicket,numVentanilla){
    $.post(`llamar_numero.php`,
    {
        numeroTicket : numTicket,
        siglasTicket : sigTicket,
        numeroVentanilla : numVentanilla
    },function(data,status){
        eval(data); //ejecutar script para llamar los numeros
    });
}


function cambiarColorFondoTicket(){

    cambiarColor('#DC483E');
    setTimeout(cambiarColor,1000,'');
    setTimeout(cambiarColor,1500,'#DC483E');
    setTimeout(cambiarColor,2000,'');
    setTimeout(cambiarColor,2500,"#DC483E");
    setTimeout(cambiarColor,3000,'');

    function cambiarColor(color){
        document.getElementById("numeroTicket").style.background = color;
    }

}

