// obtener un ticket de la cola
var intervalo;
$(document).ready(function() {
    intervalo = setInterval(obtener_ticket_colageneral,2000);
    cargar_mensajescarrusel();
});

//obtiene el siguiente ticket de la cola general
var ticketCola;
var direccion;
function obtener_ticket_colageneral(){
    $.get(`obtener_ultimo_ticket_cola_general.php`,
    function(data,status){
        ticketCola = JSON.parse(data);
        if(ticketCola != ""){   //si se encontro un ticket en la cola general
            clearInterval(intervalo);   //detener intervalo de busqueda de tickets
            //carga los datos del tipo dependiendo a la direccion que pertenezca
            if(ticketCola.TicketRegistroInmueble_idTicketRegistroInmueble != null ){
                obtener_ticket(ticketCola.TicketRegistroInmueble_idTicketRegistroInmueble,1); //registro inmueble
            }else{
                if(ticketCola.ticketpropiedadintelectual_idticketpropiedadintelectual != null){
                    obtener_ticket(ticketCola.ticketpropiedadintelectual_idticketpropiedadintelectual,2);   //propiedad intelectual
                }else{
                    if(ticketCola.TicketCatastro_idTicketCatastro != null){
                        obtener_ticket(ticketCola.TicketCatastro_idTicketCatastro,3);   //catastro
                    }else{
                        if(ticketCola.TicketPredial_idTicketPredial != null){
                            obtener_ticket(ticketCola.TicketPredial_idTicketPredial,4); //regularizacion predial
                        }
                    }
                }
            }
        }  
    });
}

// funcion para obtener ticket en la cola dependiendo de la direccion
var ticketJson; //guardar los datos del ticket que se esta mostrando
function obtener_ticket(ticketId,direccionId){
    $.get(`obtener_ticket.php?idTicket=${ticketId}&direccion=${direccionId}`,
    function(data,status){
        ticketJson = JSON.parse(data);
        if(ticketJson == ""){
            alert("ocurrio un error al obtener el ticket")
        }else{
            mostrar_ticket(ticketJson); //mostrar los datos del ticket en la pantalla
        }
    });
}



// funcion para eliminar la colageneral actual una vez ya no se necesite
async function eliminar_colageneral(colaGeneralId){
    $.post(`eliminar_colageneral.php`,
    {
        idColaGeneral : colaGeneralId
    },
    function(data,status){
        obtener_ticket_colageneral(); //obtener el siguiente ticket en cola luego de eliminar el anterior
    });
}

function cargar_ticket_tabla(numeroTicket,numeroVentanilla,siglasTramite){
    var tablaTickets = document.getElementById("tablaTickets");
    var filasCount = tablaTickets.tBodies[0].rows.length;



    for(const tr of tablaTickets.tBodies[0].rows){
        if(numeroTicket == tr.children[0].innerText && numeroVentanilla == tr.children[1].innerText){
            return;
        }
    }

    inicial = document.getElementById("bodyTablaTicketsLlamados").innerHTML;
    html = `<tr><td style="color:black; font-size:200%;"><b>${numeroTicket}</b></td>`;
    html += `<td style="color:black; font-size:200%"><b>${numeroVentanilla}</b></td>`;
   /*html += `<td style="color:black; font-size:200%"><b>${(siglasTramite == null) ? "" : siglasTramite}</b></td></tr>`;  */
    let preferencia = (ticketJson.preferencia == 1) ? `<i class="fas fa-wheelchair"></i>` : ``
    html += `<td style="font-size:200%;"><b>${siglasTramite} ${preferencia}</b></td>`;

    html += inicial;

    document.getElementById("bodyTablaTicketsLlamados").innerHTML = html;

    if(filasCount == 14){
        tablaTickets.deleteRow(filasCount-1);
      
    }
}

//mostrar los datos del ticket en un modal, esperar 10 segundos y buscar el siguiente llamado de ticket
async function mostrar_ticket(ticketJson){
    llamar_ticket((ticketJson.numero == null) ? ticketJson.idTicket : ticketJson.numero,ticketJson.sigla_ticket,ticketJson.numero_ventanilla);
    cargar_ticket_tabla(`${ticketJson.sigla_ticket}${(ticketJson.numero == null) ? ('000'+ticketJson.idTicket).slice(-3) :('000'+ticketJson.numero).slice(-3)}`,ticketJson.numero_ventanilla,ticketJson.siglasTramite);
    //si el ticket es de preferencia agregar icono de preferencia, de lo contrario no
    let preferencia = (ticketJson.preferencia == 1) ? `<i class="fas fa-wheelchair"></i>` : ``
    $('#video').prop("volume", 0.05);
    // $("#video").prop('muted', true);
    Swal.fire({
        title: '¡Alerta de Ticket!',
        html: `<p style="font-size:200%;">${ticketJson.nombreTramite}</p>
            <p style="font-size:500%;"><b>${ticketJson.sigla_ticket}${(ticketJson.numero == null) ? ('000'+ticketJson.idTicket).slice(-3) : ('000'+ticketJson.numero).slice(-3)}</b>   ${preferencia}</p>
            <p>Favor pasar a:</p>
            <p style="font-size:500%"><b>Ventanilla ${ticketJson.numero_ventanilla}</b></p>`,
        width: `75%`,
        timer: 14000,
        showConfirmButton: false,
        timerProgressBar: false
    })
    // esperar 10 segundos antes de llamar el siguiente ticket en cola
    var promise = new Promise(function (resolve,reject){
        setTimeout(function(){
            eliminar_colageneral(ticketCola.idColaGeneral);
            aumentar_llamado_ticket(ticketJson.idTicket,ticketJson.Direccion_idDireccion);
            resolve();
        },15000);
    });
    promise.then(function(){
        // si el item que se muestra actualmente en el carrusel es un video se reproduce luego del llamado
        $('#video').prop("volume", 0.6);
        // if(typeof $('div.carousel-item.active > video:first-child').get(0) != "undefined"){
            // $("#video").prop('muted', false);
        // } 
        intervalo = setInterval(obtener_ticket_colageneral,2000);   //iniciar el intervalo de busqueda una vez que se elimino el ticket
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

//aumentar en 1 el llamado del ticket cada vez que se llama
function aumentar_llamado_ticket(ticketId,idDireccion){
    $.post("aumentar_cuenta_ticket.php",
    {
        idTicket : ticketId,
        direccion : idDireccion
    }, function(data,status){
        if(data === ""){
            alert("Ocurrio un error hola" + data);
        }
    });
}

//funcion para cargar los mensajes en un texto que se mueva infinitamente hacia la izquierda
function cargar_mensajescarrusel(){
    $.get(`obtener_mensajescarrusel.php`,function(data,status){
        jsonMensajes = JSON.parse(data);
        //almacenar todos los mensajes en una misma variable
        textoMensajes = ""
        jsonMensajes.forEach(element => {
            if(element.activo == 1){
                textoMensajes += element.mensaje;
                textoMensajes += "&nbsp".repeat(10);
            }
        });
        html = `<div class="marquee">`
        html += `<p style="color:white; font-size:30px;">${textoMensajes}</p>`
        html += `<p style="color:white; font-size:30px;">${textoMensajes}</p> `

        // se crea la animacion antes de append para que la rapidez en la que pasan los mensajes este de acuerdo al numero de caracteres
        $("head").append('<style type="text/css"></style>');
        var newStyleElement = $("head").children(':last');
        newStyleElement.html(`.marquee{white-space: nowrap; overflow: hidden; display: inline-block; animation: marquee ${textoMensajes.length / 10}s linear infinite;}`);
        //insertar los mensajes luego de crear la animacion
        $('#wrapperTextoAnimacion').html(html)
    })
}

