 var modalReasignar = document.getElementById("modalReasignacion");
var btnPausar = document.getElementById("btnPausa");
 var btnReasignar = document.getElementById("btnReasignar");
 var modalRellamado = document.getElementById("modalRellamado");
 var btnRellamar = document.getElementById("btnRellamado");
 var btnLlamarSiguiente = document.getElementById("btnSiguiente")
 var spanCloseModalReasignar = document.getElementsByClassName("close")[0];
 var spanCloseModalRellamado = document.getElementsByClassName("close")[1];


document.getElementById("clock").onload = function(){
    currentTime()
}


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
  

 btnPausar.onclick = function(){
    if(btnPausar.textContent === "Pausar"){
        btnPausar.innerHTML = '<i class="bi bi-play-btn-fill" style="padding-right:10px;"></i>Reanudar'
        btnPausar.style.background = 'red';
    }else
    if(btnPausar.textContent === "Reanudar"){
        btnPausar.innerHTML = '<i class="bi bi-pause-btn-fill" style="padding-right:10px;"></i>Pausar';
        btnPausar.style.background = '#88cfe1';
    }
 }


 //leer input de escaner (solo numerico)
 let codigoEscaneado = "";
 let reading = false;

 document.addEventListener('keypress', e => {
 if (e.keyCode === 13) {
       if(codigoEscaneado.length > 0) {
         //terminar de leer codigo
         obtenerBitacora(codigoEscaneado)
         // codigo listo               
         codigoEscaneado = "";
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
     }, 500);  //ajustar timeout
 }
 });

 //obtener bitacora
 function obtenerBitacora(bitacoraId){
    $.get(`obtener_bitacora.php?idBitacora=${bitacoraId}`, function(data,status){
        var bitacoraJSON = JSON.parse(data);
        //numero de ticket con zero fill
        document.getElementById("numeroTicket").textContent = bitacoraJSON.siglas + ('000'+bitacoraJSON.numeroTicket).slice(-3);
        editarHoraEntrada(bitacoraJSON.idBitacora)
    });
 }

 //editar hora de entrada a la ventanilla 
 function editarHoraEntrada(bitacoraID){
     var currentTime = new Date();
     var datestring = ("0" + currentTime.getHours()).slice(-2) + ":" + ("0" + currentTime.getMinutes()).slice(-2);
   $.post("editar_bitacora.php",
   {
     idBitacora: bitacoraID,
     horaEntrada: `${datestring}`
   }, function(data,status){
       if(data === ""){
            alert("Ocurrio un error")
       }
   })
 }

 function obtenerTicketCola(){
    $.get(`obtener_ultimo_elemento_cola_catastro.php`, function(data,status){
        console.log(data)
    })
 }


 btnLlamarSiguiente.onclick = function(){
     obtenerTicketCola();
 }

 btnReasignar.onclick = function(){
     modalReasignar.style.display = "block";
 }

 btnRellamado.onclick = function(){
     modalRellamado.style.display = "block";
 }

 //cerrar modal al presionar fuera del mismo
 window.onclick = function(){
     if(event.target == modalReasignar){
         modalReasignar.style.display = "none";
     }
     if(event.target == modalRellamado){
         modalRellamado.style.display = "none";
     }
 }

 //cerrar modal con boton de X
 spanCloseModalReasignar.onclick = function() {
     modalReasignar.style.display = "none";
 }

 spanCloseModalRellamado.onclick = function(){
     modalRellamado.style.display = "none";
 }