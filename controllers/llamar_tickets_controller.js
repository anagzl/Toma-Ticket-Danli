 var minutosPerdidos = 0;
 var segundosPerdidos = 0;
 var horasPerdidas = 0;
 var atendiendoFlag = false;

 //objetos json
 var ticketJson = "";   //ticket actual
 var bitacoraJson = ""; //la bitacora del ticket actual
 var sesionJson = "";   //valores de la sesion actua
 var empleadoJson = ""; //datos del empleado que inicio sesion
 var jornadaJson = "";  //datos de la jornada para el empleado que inicio sesion

 var modalReasignar = document.getElementById("modalReasignacion");
 var btnPausar = document.getElementById("btnPausa");
 var btnReasignar = document.getElementById("btnReasignar");
 var modalRellamado = document.getElementById("modalRellamado");
 var modalOtroTramite = document.getElementById("modalTramites");
 var btnRellamar = document.getElementById("btnRellamado");
 var btnLlamarSiguiente = document.getElementById("btnSiguiente");
 var spanCloseModalReasignar = document.getElementsByClassName("close")[0];
 var spanCloseModalRellamado = document.getElementsByClassName("close")[1];
 var spanCloseModalOtroTramite = document.getElementsByClassName("close")[2];
 var estadoTicket = document.getElementById("estadoTicket");
 var numeroLlamados = document.getElementById("llamadosRestantes");
 var tiempoRestanteTxt = document.getElementById("tiempoRestante");
 var btnAceptarReasignado = document.getElementById("btnAceptarReasignado");
 var btnEscaneoManual = document.getElementById("btnAtenderSinEscaner");
 var btnOtroTramite = document.getElementById("btnLlamarTramite");
 
 btnReasignar.disabled = true;  //desactivado hasta que se empiece a atender un ticket
 btnEscaneoManual.disabled = true;  //desactivado hasta que se empiece a llamar un ticket
 btnOtroTramite.disabled = true;    //desactivado hasta que no existan tickets en cola para la ventanilla

 //consultar el count de tickets cada 3 segundos
 var intervaloLlamadoAutomatico;
 $(document).ready(function() {
     //obtener datos de la jornada del empleado en cuanto cargue la pagina
    obtener_datos_sesion();


    // establecer tiemout para llamar un ticket automaticamente en caso que existan personas en cola
    // intervaloLlamadoAutomatico = setTimeout(function(){
    //     if(!atendiendoFlag){
    //         if(btnPausar.value != "Reanudar"){
    //             llamar_ticket_automaticamente();
    //         }
    //     }
    // },5000);
});

// funcion para verificar si el empleado estuvo llamando un ticket y llamar ese ticket
function verificar_llamado_ticket(idEmpleado,idDireccion){
    $.get(`obtener_ticket_llamando.php?direccion=${idDireccion}&idEmpleado=${idEmpleado}`,function(data,status){
        let ticketLlamandoJson = JSON.parse(data);
        if(ticketLlamandoJson != ""){
            if(confirm("¿Deseas llamar al ticket que estabas llamando anteriormente? Si no lo llamas ese ticket se desactivará.")){
                cargar_ticket(ticketLlamandoJson.idTicket)
                clearTimeout(intervaloLlamadoAutomatico)
            }else{
                deshabilitar_ticket(ticketLlamandoJson.idTicket); 
            }
        }
    });
}

function llamar_ticket_automaticamente(){
    //mostrar mensaje
    Swal.fire({
        icon: 'warning',
        title: 'Alerta de inactividad.',
        html : 'Un ticket sera llamado en 5 segundos.<button id="detenerTimerSwal" type="button" class="btn btn-outline-info btn-lg login100-form-btn" style="width: 50%; height:50%; background-color:#88cfe1; font-size:180%; height:100px;"><i class="bi bi-pause-btn-fill" style="padding-right:8px;"></i>Pausar</button>',
        showConfirmButton: false,
        timer: 5000,
        allowOutsideClick: false,
        timerProgressBar : true,
        didOpen: () => {
            Swal.getHtmlContainer().querySelector('#detenerTimerSwal').addEventListener('click', e => {
                e.preventDefault()
                Swal.stopTimer()
                Swal.close();
                $('#btnPausa').click();
              })
        }
      }).then((result) => {
        if(result.dismiss == "timer"){
            $("#btnSiguiente").click();
        }
      });
}

// obtener el nombre de usuario logueado
function obtener_datos_sesion(){
    $.get(`obtener_valores_sesion.php`,function(data,status){
        sesionJson = JSON.parse(data);
        // verificar si el usuario inicio sesion
        if(typeof sesionJson.login === 'undefined'){
            alert("Debes iniciar sesión");
            window.location.replace('login.php');
        }else{
            obtener_empleado(sesionJson.login,obtener_datos_empleado);
        }
    });
}

// obtener empleado logueado para poder cargar los datos de la jornada correspondientes a ese empleado
function obtener_empleado(usrLogin,_callback){
    $.get(`obtener_empleado.php?nombreUsuario=${usrLogin}`,function(data,status){
        empleadoJson = JSON.parse(data);
        _callback();
    });
}


// obtener datos de jornada 
function obtener_datos_empleado(){
    var currentTime = new Date();
    var datestring = currentTime.getFullYear() + "-" + ("0" + (currentTime.getMonth() + 1)).slice(-2) + "-" + currentTime.getDate();
    $.get(`obtener_jornada_laboral.php?idEmpleado=${empleadoJson.idEmpleado}&fecha=${datestring}`,function(data,status){
        jornadaJson = JSON.parse(data);
        if(jornadaJson == ""){
            alert("Ocurrio un error con los datos_empleado")
        }else{
            verificar_llamado_ticket(empleadoJson.idEmpleado,jornadaJson.Direccion_idDireccion);
            setInterval(obtener_personas_espera, 3000,jornadaJson.Direccion_idDireccion,jornadaJson.tramites_habilitados);  //luego de obtener los datos de la sesion empezar a contar el numero de personas en cola
            document.getElementById("numeroVentanilla").innerHTML = `<b>Ventanilla ${jornadaJson.numero} / ${jornadaJson.primerNombre} ${jornadaJson.primerApellido}</b>`;
            document.getElementById("areaTramite").innerText = `${jornadaJson.nombre_direccion} / ${jornadaJson.tramites_habilitados}`;
            minutosPerdidos = jornadaJson.minutosFueraVentanilla;
            segundosPerdidos = jornadaJson.segundosFueraVentanilla;
            horasPerdidas = jornadaJson.horasFueraVentanilla;
        }
    });
}

//funcion para obtener el numero de  
// para la cola de la direccion expecificada con la jornada
function obtener_personas_espera(idDireccion,tramites){ 
    $.get(`count_cola.php?direccion=${idDireccion}&tramites=${tramites}`, function(data,status){
        var countJSON = JSON.parse(data);
        document.getElementById('personasEspera').innerHTML = `Personas en espera: ${countJSON}`;
        if(countJSON == 0){
            if(!atendiendoFlag){
                clearTimeout(intervaloLlamadoAutomatico);
                if(btnPausar.textContent === "Pausar"){
                    btnOtroTramite.disabled = false;    // activar boton cuando no existan personas en espera y cuando no este en pausa
                }
            }
        }else{
            btnOtroTramite.disabled = true;     //desactivar boton una vez existan personas en espera para la ventanilla actual
        }
    });
}


//reloj
function currentTime() {
    let date = new Date();  
    let hh = date.getHours();
    let mm = date.getMinutes();
    let ss = date.getSeconds();
    let session = "AM";
  
    if(hh === 0){
        hh = 12;
    }
    if(hh > 12){
        hh = hh - 12;
        session = "PM";
     }
  
     hh = (hh < 10) ? "0" + hh : hh;
     mm = (mm < 10) ? "0" + mm : mm;
     ss = (ss < 10) ? "0" + ss : ss;
      
     let time = hh + ":" + mm + ":" + ss + " " + session;
  
    document.getElementById("clock").innerText = time; 
    let t = setTimeout(function(){ currentTime() }, 1000);
  }
  
currentTime();


  
// Alternar entre pausar y reanudar
 btnPausar.onclick = function(){
    if(btnPausar.textContent === "Pausar"){
        btnPausar.innerHTML = '<i class="bi bi-play-btn-fill" style="padding-right:10px;"></i>Reanudar' //estilo del boton
        btnPausar.style.background = 'red';
        estadoTicket.textContent = "EN PAUSA";
        btnLlamarSiguiente.disabled = true; //botones de siguiente, reasignar y rellamado desactivados mientras se esta en pausa.
        btnRellamar.disabled = true;
        btnOtroTramite.disabled = true;
        tiempoRestanteTxt.style.display = 'block';
        clearTimeout(intervaloLlamadoAutomatico);
        temporizador(); //iniciar temporizador de pausa
    }else
    if(btnPausar.textContent === "Reanudar"){
        btnPausar.innerHTML = '<i class="bi bi-pause-btn-fill" style="padding-right:10px;"></i>Pausar';
        btnPausar.style.background = '#88cfe1';
        tiempoRestanteTxt.style.display = 'none';
        estadoTicket.textContent = "...";
        btnLlamarSiguiente.disabled = false;
        btnRellamar.disabled = false;
        intervaloLlamadoAutomatico = setTimeout(function(){
            if(!atendiendoFlag){
                llamar_ticket_automaticamente();
            }
        },5000);
        clearInterval(intervalo);       //detener temporizador
        guardar_tiempo_perdido();
    }
 }

 // temporizador que cuenta los minutos perdidos en ventanilla
var intervalo;  //declarado fuera para poder detenerlo en cualquier momento
function temporizador(){
    segundosPerdidos++;
    if(segundosPerdidos >= 60){
        minutosPerdidos++;
        guardar_tiempo_perdido();   //guardar el tiempo en pausa en la base de datos
        segundosPerdidos = 0;       //reiniciar los segundos una vez que lleguen a 60
    }
    tiempoRestanteTxt.innerHTML = "Tiempo en pausa hoy:\t" + ('00'+minutosPerdidos).slice(-2) + ":" + ('00'+segundosPerdidos).slice(-2);
    intervalo = setTimeout(temporizador,1000);
}

//guarda el minuto perdido en la jornada
function guardar_tiempo_perdido(){
    $.post(`editar_tiempo_perdido.php`,
    {
        idJornadaLaboral : jornadaJson.idJornadaLaboral,
        minutosFueraVentanilla : minutosPerdidos,
        segundosFueraVentanilla : segundosPerdidos
    },
    function(data,status){
        if(data==""){
            alert("Ocurrio un error actualizando el tiempo perdido.");
        }
    })
}


// funcion para marcar un ticket para ser llamado
// posteriormente
function marcar_ticket_rellamado(){
    $.post(`marcar_rellamado_ticket.php`,
    {
        direccion : jornadaJson.Direccion_idDireccion,
        idTicket : ticketJson.idTicket,
        marcarRellamado : 1,
        idEmpleado : jornadaJson.Empleado_idEmpleado
    }, function(data,status){
        if(data == ""){

        }else{
            Swal.fire(
                'Hecho!',
                'Has marcado este ticket para rellamado.',
                'success'
              );
            btnRellamado.disabled = true;
        }
    });
}


 //leer input de escaner (solo numerico)
 let codigoEscaneado = "";
 let reading = false;

 document.addEventListener('keypress', e => {
    if (e.keyCode === 13) {    //enter
        if(codigoEscaneado.length > 0) {
            //  terminar de leer codigo
            if(codigoEscaneado == idBitacoraTicketLlamado || codigoEscaneado == idBitacoraRellamado){    //validar si el ticket llamado es el mismo que se escanea
                clearTimeout(timeOut);  //detener el timeout de 15 segundos de llamado de ticket
                obtenerBitacora(codigoEscaneado);   //obtener los datos de bitacora correspondiente al ticket escaneado
                deshabilitar_ticket(ticketJson.idTicket);   //deshabilitar ticket una vez escaneado para que ningun otro usuario lo pueda llamar
                btnLlamarSiguiente.disabled = false;
                btnReasignar.disabled = false;
                // codigo listo               
                codigoEscaneado = "";
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Ticket Incorrecto.',
                    text: 'El ticket escaneado no coincide con el ticket llamado o no has llamado un ticket.'
                });
            }     
        }
    } else {
        codigoEscaneado += e.key;        
    }
    //timeout de 500 ms
    if(!reading) {
        reading = true;
        setTimeout(() => {
            codigoEscaneado = "";
            reading = false;
        }, 500);  //ajustar timeout (tiempo que se tarda el escaner en leer el qr)
    }
 });


 //obtener bitacora
 function obtenerBitacora(bitacoraId){
    $.get(`obtener_bitacora.php?idBitacora=${bitacoraId}`, function(data,status){
        bitacoraJson = JSON.parse(data);
        if(bitacoraJson == ""){
            alert("No se encontro esa bitacora.")
        }else{
            numeroLlamados.style.display = 'none';
            estadoTicket.textContent = "ATENDIENDO";
            editarHoraEntrada(bitacoraJson.idBitacora);
            atendiendoFlag = true;
            btnEscaneoManual.disabled = true;
            btnLlamarSiguiente.innerHTML = '<i class="bi bi-stop-fill" style="padding-right:10px;"></i>Terminar' //estilo del boton
            btnPausar.disabled = true;
            btnLlamarSiguiente.style.background = 'red';
            btnRellamado.disabled = false;
            btnRellamado.style.fontSize = "22px";
            btnRellamado.innerHTML = '<i class="bi bi-check-circle" style="padding-right:10px;"></i>Marcar Rellamado' //estilo del boton para marcar rellamado
        }   
    });
 }

 //editar hora de entrada a la ventanilla y el id de empleado que atendera el ticket
 function editarHoraEntrada(bitacoraID){
     var currentTime = new Date();
     var datestring = ("0" + currentTime.getHours()).slice(-2) + ":" + ("0" + currentTime.getMinutes()).slice(-2) + ":" + ("0" + currentTime.getSeconds()).slice(-2);   //hora actual
     $.post("editar_bitacora_hora_entrada.php",
   {
     idBitacora: bitacoraID,
     horaEntrada: datestring,
     Empleado_idEmpleado : jornadaJson.Empleado_idEmpleado
   }, function(data,status){
       if(data === ""){
            alert("Ocurrio un error editando hora de entrada de ticket")
       }
   });
 }

 //editar hora de salida de la ventanilla 
 function editarHoraSalida(bitacoraID){
    var currentTime = new Date();
    var datestring = ("0" + currentTime.getHours()).slice(-2) + ":" + ("0" + currentTime.getMinutes()).slice(-2) + ":" + ("0" + currentTime.getSeconds()).slice(-2);   //hora actual
    $.post("editar_bitacora_hora_salida.php",
  {
    idBitacora: bitacoraID,
    horaSalida: datestring
  }, function(data,status){
      if(data === ""){
           alert("Ocurrio un error editando la hora de salida de ticket");
      }
  });
}


 //obtener ultimo ticket de la cola
 // enviar tramite para filtrar la cola y 
 // solo recibir los tramites que atiende
 // la ventanilla
//  var idTicket = 0;  //para guardar el id de ticket obtenido
 var idBitacoraTicketLlamado = 0;   //para comparar si el idBitacora es el mismo en el ticket seleccionado y el escaneado
 var idBitacoraRellamado = 0;   //almacenar id de bitacora para atender un ticket con el mismo id
 var llamados = 3;  //numero de llamados para un ticket
 function obtener_ticket_cola(tramites){
    return $.get(`obtener_ultimo_elemento_cola.php?tramites=${tramites}&direccion=${jornadaJson.Direccion_idDireccion}`, function(data,status){
        ticketJson = JSON.parse(data);
        // obtener_llamado_ticket(ticketJson.idTicket,ticketJson.Direccion_idDireccion);
        if(ticketJson == ""){
            Swal.fire({
                icon: 'error',
                title: 'No se encontraron tickets en cola.',
                text: 'No se encontraron tickets en cola para el trámite y área seleccionada.'
            })
        }else{
            marcar_ticket_llamando(ticketJson.idTicket,ticketJson.Direccion_idDireccion,jornadaJson.Empleado_idEmpleado).then(function(){
                cargar_ticket(ticketJson.idTicket)
            })
        }
    })
 }

 // funcion encargada de mostrar los atributos correspondientes del ticket en pantalla
function mostrar_ticket_pantalla(ticketJson){
    document.getElementById("numeroTicket").textContent = (ticketJson.numero == null) ? ticketJson.sigla_ticket + ('000'+ticketJson.idTicket).slice(-3) : ticketJson.sigla_ticket + ('000'+ticketJson.numero).slice(-3);
    document.getElementById("tramiteTicket").textContent = ticketJson.nombreTramite
    numeroLlamados.style.display = 'block';
    estadoTicket.textContent = `Llamando ${(ticketJson.primerNombre == null) ? "" : ticketJson.primerNombre + " " + ticketJson.primerApellido}`
    btnPausar.disabled = true;
    btnRellamar.disabled = true;
    btnEscaneoManual.disabled = false;
    llamados = 3 - ticketJson.vecesLlamado;
    numeroLlamados.textContent = "Llamados restantes: " + llamados;
    modalRellamado.style.display = "none";
}

 // marca el ticket como llamando, lo que significa que que este ticket
 // esta siendo llamado por un usuario, ningun otro usuario lo puede llamar
 function marcar_ticket_llamando(ticketId,idDireccion,empleadoId){
    return $.post(`editar_ticket_llamando.php`,
    {
        idTicket : ticketId,
        direccion : idDireccion,
        llamando : 1,   //marcar ticket como llamando true
        idEmpleado : empleadoId
    },function(data,status){
        console.log(data)
    });
 }

 //deshabilitar ticket para que no sea llamado
 function deshabilitar_ticket(idTicket){
    $.post("habilitar_deshabilitar_ticket.php",
    {
        disponibilidad : 0,
        marcarRellamado : 0,
        llamando : 0,
        idTicket : idTicket,
        direccion : jornadaJson.Direccion_idDireccion
    }, function(data,status){
        if(data === ""){
             alert("Ocurrio un error deshabilitando el ticket")
        }
    });
 }


// llenar la tabla en el modal con los tickets que el usuario
// ha marcado para rellamar
function obtener_tickets_rellamado(){
    $.get(`obtener_tickets_rellamar.php?idEmpleado=${jornadaJson.Empleado_idEmpleado}&idDireccion=${jornadaJson.Direccion_idDireccion}`, function(data,status){
        var ticketJson = JSON.parse(data);
        html = ""
        for (var ticket of ticketJson){
            html += `<tr><td style="color:black;">${(ticket.numero == null) ? ticket.siglas+('000'+ticket.idTicket).slice(-3) : ticket.siglas+('000'+ticket.numero).slice(-3)}</td>`
            html += `<td style="color:black;">${ticket.nombreTramite}`
            html += `<td class="text-center"><a onclick="cargar_ticket(${ticket.idTicket});" class="btn btn-primary"><i class="bi bi-telephone-inbound"></i>\t\tLlamar</a></td></tr>`
        }
        document.getElementById('lista_tickets_rellamar').innerHTML = html;
    });
}


//crar un ticket de cualquier area enviandole el id de la direccion correspondiente
// para reasignado
function crear_ticket(direccionId, bitacoraId){
    $.post(`crear_ticket.php`,
    {
        idDireccion : direccionId,
        Bitacora_idBitacora : bitacoraId,
        Empleado_idEmpleado : null,
        Bitacora_Sede_idSede : bitacoraJson.Sede_idSede,
        disponibilidad : 1,
        preferencia : 0,
        vecesLlamado : 0,
        marcarRellamado : 0,
        sigla : ticketJson.sigla_ticket,
        numero : (ticketJson.numero == null) ? ticketJson.idTicket : ticketJson.numero,
        reasignado : 1
    },function(data,status){
        if(data == ''){
            alert('Ocurrio un erorr al reasignar el ticket: ' + data);
        }else{
            Swal.fire({
                icon: 'success',
                title: 'Ticket reasignado.',
                text: 'El ticket ha sido reasignado con éxito.'
            }).then(function(){
                btnLlamarSiguiente.click();
            });
        }
    }
    );
}

// funcion para cargar un ticket solo con el id del ticket
// asi se podar carga los tickets que han sido marcados para rellamado
// y cuya disponibilidad es falsa
function cargar_ticket(ticketId){
    $.get(`obtener_ticket.php?idTicket=${ticketId}&direccion=${jornadaJson.Direccion_idDireccion}`,function(data,status){
        ticketJson = JSON.parse(data);
        idBitacoraTicketLlamado = ticketJson.Bitacora_idBitacora
        idBitacoraRellamado = ticketJson.numeroTicket
        marcar_ticket_llamando(ticketJson.idTicket,jornadaJson.Direccion_idDireccion,jornadaJson.Empleado_idEmpleado).then(function(){
            timeout_llamado(ticketJson)
        });       //marcar ticket como llamando
        // timeout_llamado(ticketJson);
        // mostrar_ticket_pantalla(ticketJson)
        // crear_ticket_cola_general(ticketJson.idTicket,ticketJson.Direccion_idDireccion);    //enviar ticket a cola general
        
    });
}


// Funcion para crear un ticket y ponerlo en la cola general
function crear_ticket_cola_general(ticketId,direccionId){
    $.post(`crear_colageneral.php`,
    {
        idTicket : ticketId,
        idDireccion : direccionId
    },
    function(data,status){
        //alert(data);
    });
}

 btnLlamarSiguiente.onclick = function(){
    // para terminar de atender un ticket se reutiliza el boton de llamar siguiente
     if(btnLlamarSiguiente.textContent == "Terminar"){
        // obtener confirmacion antes de desactivar el ticket
        Swal.fire({
            title: '¿Estás seguro que quieres terminar de atender a este ticket?',
            showDenyButton: true,
            confirmButtonText: 'Si',
            denyButtonText: 'Cancelar',
          }).then((result) => {
            if (result.isConfirmed) {
                editarHoraSalida(idBitacoraTicketLlamado); 
                location.reload();
            } else if (result.isDenied) {
                return;
            }
          });
     }else{
        //si el ticketJson no esta asignado significa que no se atiende
        //ningun ticket entonces se obtiene uno
        if(ticketJson == ""){
            obtener_ticket_cola(jornadaJson.tramites_habilitados)
        }else{
            // si el ticketJson no esta vacio significa que se atiende un ticket
            //se fija el ticket llamado y en caso de dar siguiente se crea un registro de este ticket en la cola 
            //general para ser llamado
            timeout_llamado(ticketJson);
        }
        btnLlamarSiguiente.blur();    //quitar focus del boton para escanear el ticket sin que el usuario tenga que hacer click afuera
     }   
    }

    var timeOut;    // declarada afuera para poder detener el timeout en cualquier momento
    // Esta funcion aumenta el llamado de un ticket, deshabilita el boton de siguiente por 15 segundos
    // despues de cada llamado, y desactiva el ticket una vez ha sido llamado 3 veces y el cliente no se ha presentado
function timeout_llamado(ticketJson){
        crear_ticket_cola_general(ticketJson.idTicket,ticketJson.Direccion_idDireccion)
        mostrar_ticket_pantalla(ticketJson)
        // atendiendoFlag = false;
        btnLlamarSiguiente.disabled = true;
        btnOtroTramite.disabled = true;
        verificar_llamados();
    }

    // funcion recursiva para evitar el uso de intervalo
    // encargada de verificar los llamados hechos al ticket en la base de datos
function verificar_llamados(){
    let llamadosActuales = ticketJson.vecesLlamado
    $.get(`obtener_llamados_ticket.php?direccion=${ticketJson.Direccion_idDireccion}&idTicket=${ticketJson.idTicket}`,function(data,status){
        if(llamadosActuales != data){
            if(data == 3)
            {
                if(atendiendoFlag) return;
                timeOut = setTimeout(function(){
                    Swal.fire({
                        icon: 'error',
                        title: 'Ticket deshabilitado.',
                        text: 'El cliente no se presento a ventanilla.'
                    }).then(function(){
                        location.reload();
                    });
                    deshabilitar_ticket(ticketJson.idTicket);
                    ticketJson = "";
                    llamados = 3;
                },15000);
            }else{
                numeroLlamados.textContent = "Llamados restantes: " + (3 - data)
                ticketJson.vecesLlamado = data
                timeOut = setTimeout(function(){
                    if(!atendiendoFlag){
                        btnLlamarSiguiente.disabled = false;
                        btnLlamarSiguiente.click();
                        return
                    }
                }, 5000); 
            }
        }else{
            setTimeout(verificar_llamados,2000)
            // verificar_llamados();
        }
    })
}

// Funciones de reasignado

// funcion para crear una bitacora para guardar un registro nuevo en caso de que se reasigne
// un ticket
function crear_bitacora(idTramite,idDireccion){
    var currentTime = new Date();
    var dateString = ("0" + currentTime.getHours()).slice(-2) + ":" + ("0" + currentTime.getMinutes()).slice(-2) + ":" + ("0" + currentTime.getSeconds()).slice(-2);    //hora actual formato sql
    $.post(`crear_bitacora_cliente.php`,
    {
        Sede_idSede : bitacoraJson.Sede_idSede,
        Usuario_idUsuario : bitacoraJson.Usuario_idUsuario,
        Tramite_idTramite : idTramite,
        Direccion_idDireccion : idDireccion,
        fecha : bitacoraJson.fecha,
        horaGeneracionTicket : dateString,
        horaEntrada : null,
        horaSalida : null,
        Observacion : null,
        numeroTicket : (idBitacoraRellamado == null ) ? idBitacoraTicketLlamado : idBitacoraRellamado  //importante para atender el mismo ticket escaneandolo
    },function(data,status){
        if(data == ""){
            alert("Ocurrio un problema al reasignar el ticket con la bitacora: " +data)
        }else{
            crear_ticket(idDireccion,data);
        }
    });
}

// funcion para llenar tabla de tramites por direccion
function llenar_tabla_tramites(idDireccion){
    // obtener los tramites para la direccion de ventanilla actual
    $.get(`obtener_tramites.php?direccion=${idDireccion}`,
    function(data,status){
        var tramitesJson = JSON.parse(data);
        html = "";
        // para cada tramite encontrado en esta direccion
        tramitesJson.forEach(function(listItem, index){
            $.get(`count_cola.php?direccion=${idDireccion}&tramites=${listItem.nombreTramite}`,
            function(data,status){
                html += `<tr><td style="color:black;">${listItem.nombreTramite}</td>`
                html += `<td style="color:black;">${data} en cola`
                html += `<td class="text-center"><a onclick="obtener_ticket_cola('${listItem.nombreTramite}'); modalOtroTramite.style.display= 'none';" class="btn btn-primary"><i class="bi bi-telephone-inbound"></i>\t\tLlamar</a></td></tr>`
                document.getElementById('lista_tramites').innerHTML = html;
            }); 
        });
    });
}


// evento para el boton de aceptar en el modal de reasignado
btnAceptarReasignado.onclick = function(){
    var idDireccion = document.getElementById("area").value;
    var idTramite = document.getElementById("tramite").value;
    crear_bitacora(idTramite,idDireccion);  
}
    
// abrir el modal de reasignar
 btnReasignar.onclick = function(){
     modalReasignar.style.display = "block";
 }

 //abrir el modal de escaneo manual
 btnEscaneoManual.onclick = function(){
    // modalEscaneoManual.style.display = "block";
    Swal.fire({
        title: 'Introduzca el Id de ticket que se encuentra arriba del QR:',
        input: 'number',
        showCancelButton: true,
        confirmButtonText: 'Aceptar',
        showLoaderOnConfirm: true,
        backdrop: true,
        preConfirm: (codigo) => {
            return codigo;
        },
        allowOutsideClick: () => !Swal.isLoading()
      }).then((result) => {
        if (result.isConfirmed) {
            if(result.value == idBitacoraTicketLlamado || result.value == idBitacoraRellamado){    //validar si el ticket llamado es el mismo que se escanea
                atendiendoFlag = true;
                clearTimeout(timeOut);  //detener el timeout de 15 segundos de llamado de ticket
                obtenerBitacora(idBitacoraTicketLlamado);   //obtener los datos de bitacora correspondiente al ticket escaneado
                deshabilitar_ticket(ticketJson.idTicket);   //deshabilitar ticket una vez escaneado para que ningun otro usuario lo pueda llamar
                btnLlamarSiguiente.disabled = false;
                btnReasignar.disabled = false;
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Ticket Incorrecto.',
                    text: 'El ticket escaneado no coincide con el ticket llamado o no has llamado un ticket.'
                });
            }
        }
      })
 }

 // marcar u obtener tickets para rellamado
 btnRellamado.onclick = function(){
     if(btnRellamado.innerText == "Marcar Rellamado"){
         marcar_ticket_rellamado();
     }else{
        obtener_tickets_rellamado();
        modalRellamado.style.display = "block";
        clearTimeout(intervaloLlamadoAutomatico)
     }
 }

 
 btnOtroTramite.onclick = function(){
    modalOtroTramite.style.display = "block";
    llenar_tabla_tramites(jornadaJson.Direccion_idDireccion);
 }

 //cerrar modal al presionar fuera del mismo
 window.onclick = function(){
     if(event.target == modalReasignar){
         modalReasignar.style.display = "none";
     }
     if(event.target == modalRellamado){
         modalRellamado.style.display = "none";
     }
     if(event.target == modalOtroTramite){
        modalOtroTramite.style.display = "none";
    }
 }

 // para cerrar el modal de rellamado con la 'X'
 spanCloseModalRellamado.onclick = function(){
     modalRellamado.style.display = "none";
 }

 //para cerrar el modal de reasignado con la 'X'
 spanCloseModalReasignar.onclick = function(){
    modalReasignar.style.display = "none";
 }

 // para cerrarel modal de otro tramite con la 'X'
 spanCloseModalOtroTramite.onclick = function(){
    modalOtroTramite.style.display = "none";
 }

 //cargar tramites para direccion en modal de edicion o creacion
$('#area').change(function() {
    var direccionSeleccionada = $(this).val();
    $.get(`obtener_tramites.php?direccion=${direccionSeleccionada}`,function(data,status){
        var tramitesJson = JSON.parse(data);
        document.getElementById("tramite").innerHTML = "";
        html = "";
        tramitesJson.forEach(element => {
            html += `<option value="${element.idTramite}">${element.nombreTramite}</option>`;
        });
        document.getElementById("tramite").innerHTML = html;
    })
});
