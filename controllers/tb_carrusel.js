/**
 * Funcionalidad de llenar la tabla de datos
 * fecha_modificación 11/11/2022
 * Ana Zavala
 */
 var dataTable = $('#datos_media').DataTable({
    "processing":true,
    "serverSide":true,
    "defaultContent":  "<i>Not set</i>",
    "order":[],
    "ajax":{
            url:"obtener_registros_mediacarrusel.php",
            type:"POST"
            },
             "columnsDefs":[
                {
                    "targets":[0,3,4],
                    "orderable":false, 
                },
            ],
    "language": {
        "decimal": "",
        "emptyTable": "<i class='bi bi-emoji-frown'></i>  No hay registros encontrados",
        "info": "<i class='bi bi-eye-fill'></i> Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "<i class='bi bi-menu-button-fill'></i>  Mostrando 0 a 0 de 0 Entradas",
        "infoFiltered": "(<i class='bi bi-funnel-fill'></i> Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "<i class='bi bi-menu-button-fill'></i> Mostrar _MENU_ Entradas",
        "loadingRecords": "<div class='spinner-border text-info' role='status'><span class='visually-hidden'>Loading...</span> </div> Cargando...",
        "processing": "<div class='spinner-border text-info' role='status'><span class='visually-hidden'>Loading...</span> </div> Procesando...",
        "search": "<i class='bi bi-search'></i> Buscar:",
        "zeroRecords": "<i class='bi bi-emoji-frown'></i> Sin resultados encontrados",
        "paginate": {
            "first": "<i class='bi bi-skip-backward-fill'></i> Primero",
            "last": "<i class='bi bi-skip-forward-fill'></i> Ultimo",
            "next": "Siguiente <i class='bi bi-caret-right'></i>",
            "previous": "<i class='bi bi-caret-left'></i> Anterior"
    }
} 
});

var dataTableMensajes = $('#datos_mensajes').DataTable({
    "processing":true,
    "serverSide":true,
    "defaultContent":  "<i>Not set</i>",
    "order":[],
    "ajax":{
            url:"obtener_registros_mensajescarrusel.php",
            type:"POST"
            },
             "columnsDefs":[
                {
                    "targets":[0,3,4],
                    "orderable":false, 
                },
            ],
    "language": {
        "decimal": "",
        "emptyTable": "<i class='bi bi-emoji-frown'></i>  No hay registros encontrados",
        "info": "<i class='bi bi-eye-fill'></i> Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "<i class='bi bi-menu-button-fill'></i>  Mostrando 0 a 0 de 0 Entradas",
        "infoFiltered": "(<i class='bi bi-funnel-fill'></i> Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "<i class='bi bi-menu-button-fill'></i> Mostrar _MENU_ Entradas",
        "loadingRecords": "<div class='spinner-border text-info' role='status'><span class='visually-hidden'>Loading...</span> </div> Cargando...",
        "processing": "<div class='spinner-border text-info' role='status'><span class='visually-hidden'>Loading...</span> </div> Procesando...",
        "search": "<i class='bi bi-search'></i> Buscar:",
        "zeroRecords": "<i class='bi bi-emoji-frown'></i> Sin resultados encontrados",
        "paginate": {
            "first": "<i class='bi bi-skip-backward-fill'></i> Primero",
            "last": "<i class='bi bi-skip-forward-fill'></i> Ultimo",
            "next": "Siguiente <i class='bi bi-caret-right'></i>",
            "previous": "<i class='bi bi-caret-left'></i> Anterior"
    }
} 
});


/* Visualizacion de link de videos  */

var dataTableweb = $('#datos_video_web').DataTable({
    "processing":true,
    "serverSide":true,
    "defaultContent":  "<i>Not set</i>",
    "order":[],
    "ajax":{
            url:"obtener_registros_video_web.php",
            type:"POST"
            },
             "columnsDefs":[
                {
                    "targets":[0,3,4],
                    "orderable":false, 
                },
            ],
    "language": {
        "decimal": "",
        "emptyTable": "<i class='bi bi-emoji-frown'></i>  No hay registros encontrados",
        "info": "<i class='bi bi-eye-fill'></i> Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "<i class='bi bi-menu-button-fill'></i>  Mostrando 0 a 0 de 0 Entradas",
        "infoFiltered": "(<i class='bi bi-funnel-fill'></i> Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "<i class='bi bi-menu-button-fill'></i> Mostrar _MENU_ Entradas",
        "loadingRecords": "<div class='spinner-border text-info' role='status'><span class='visually-hidden'>Loading...</span> </div> Cargando...",
        "processing": "<div class='spinner-border text-info' role='status'><span class='visually-hidden'>Loading...</span> </div> Procesando...",
        "search": "<i class='bi bi-search'></i> Buscar:",
        "zeroRecords": "<i class='bi bi-emoji-frown'></i> Sin resultados encontrados",
        "paginate": {
            "first": "<i class='bi bi-skip-backward-fill'></i> Primero",
            "last": "<i class='bi bi-skip-forward-fill'></i> Ultimo",
            "next": "Siguiente <i class='bi bi-caret-right'></i>",
            "previous": "<i class='bi bi-caret-left'></i> Anterior"
    }
} 
});


//Crear media
$(document).on('click', '#crear', function(){
    // para reiniciar formulario cuando abra y cambiar accion
    $("#modalSubirMedia").modal('show');
    $("#action").val("Crear");
    $('#formularioMediaCarrusel')[0].reset();
});

//cerrar modal para examinar media
$(document).on('click',"#cerrarModalImg",function(){
    document.getElementById("modalMedia").style.display = "none";
    $("#video").get(0).pause();
})

 //Para examinar las imagenes o videos subidos al servidor
 $(document).on('click',"[name='examinar']", function(){
    var idMedia = $(this).attr("id");
    var modalImg = document.getElementById("contenido");
    $.ajax({
        url:`obtener_mediacarrusel.php?idMedia=${idMedia}`,
        method:"GET",
        success:function(data)
        {
            var mediaJson = JSON.parse(data);
            if(mediaJson != ""){
                var modal = document.getElementById("modalMedia");
                modal.style.display = "block";
                if(mediaJson.imagen == 1){
                    modalImg.innerHTML = "";
                    modalImg.innerHTML=`<img class="modal-content-image" id="contentFrame" src="./../../files/carruselMedia/${mediaJson.ruta}">`;
                }else{
                    modalImg.innerHTML = "";
                    modalImg.innerHTML=`<video class="modal-content-image" id="video" src="./../../files/carruselMedia/${mediaJson.ruta}" controls></video>`;
                }
            }else{
                alert("Ocurrio un errror");
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });    
});

//Funcionalidad de desactivar/activar
 $(document).on('click', "[name='borrarweb']", function(){ 
 

    var idMediaVideoWeb = $(this).attr("id");
    if(confirm("¿Esta seguro de querer cambiar el estado de esta media: " + idMediaVideoWeb + "?"))
    {
        $.ajax({
            url:"cambiar_estado_web.php",
            method:"POST",
            data:{idMediaVideoWeb:idMediaVideoWeb},
            success:function(data)
            {
                alert(data);
                dataTableweb.ajax.reload();             
                location.reload();
            }
        });
    }
    else
    {
        return false;
    }
});



//Para editar los mensajes de carrusle
$(document).on('click',"[name='borrarMensaje']", function(){
    var idMensaje = $(this).attr("id");
    if(confirm("¿Esta seguro de querer cambiar el estado de este mensaje: " + idMensaje + "?"))
    {
        $.ajax({
            url:"cambiar_estado_mensajescarrusel.php",
            method:"POST",
            data:{idMensajesCarrusel:idMensaje},
            success:function(data)
            {
                alert(data);
                dataTableMensajes.ajax.reload();
                location.reload();
            }
        });
    }
    else
    {
        return false;
    }
});

$(document).on('submit','#formularioMediaCarrusel',function(event){
    event.preventDefault();
    var extensionArchivo = $('#ruta').val().split('.').pop().toLowerCase();
    if(extensionArchivo == ""){
        alert("Porfavor sube un archivo.");
        return;
    }
    if(extensionArchivo != ''){
        if(jQuery.inArray(extensionArchivo, ['mp4','png','jpg']) == -1){
            alert("Fomato de archivo inválido. Formatos aceptados: mp4, png, jpg.");
            return;
        }
    }
    $.ajax({
        url:"crear_mediacarrusel.php",
        method:"POST",
        data:new FormData(this),
        contentType:false,
        processData:false,
        success:function(data)
        {
            alert(data);
            dataTable.ajax.reload();
            $("#modalSubirMedia").modal('hide');
        }
    });
});


//Funcionalidad de desactivar/activar
$(document).on('click', '.borrar', function(){
    var idMedia = $(this).attr("id");
    if(confirm("¿Esta seguro de querer cambiar el estado de esta media: " + idMedia + "?"))
    {
        $.ajax({
            url:"cambiar_estado_mediacarrusel.php",
            method:"POST",
            data:{idMedia:idMedia},
            success:function(data)
            {
                alert(data);
                dataTable.ajax.reload();
            }
        });
    }
    else
    {
        return false;
    }
});


//Crear mensaje
$(document).on('click', '#crearMensaje', function(){
    // para reiniciar formulario cuando abra y cambiar accion
    $("#modalMensajes").modal('show');
    $("#action").val("Crear");
    $('#formularioMensajes')[0].reset();
});

//Editar mensaje
$(document).on('click', '.editar', async function(){
    var idMensaje = $(this).attr("id");
    $.ajax({
        url:`obtener_mensajescarrusel.php?idMensajesCarrusel=${idMensaje}`,
        method:"GET",
        success:function(data)
        {
            var mensajeJson = JSON.parse(data);
            if(mensajeJson != ""){
                $("#action").val("Editar");
                $("#modalMensajes").modal('show');
                $("#mensaje").val(mensajeJson.mensaje);
                $("#idMensajeCarrusel").val(mensajeJson.idMensajesCarrusel)
            }else{
                alert("Ocurrio un errror");
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
});

 // funcionalidad de editar o crear mensaje
 $(document).ready(function() {
    $('#formularioMensajes').on('submit', function(e){
            e.preventDefault();
            var idMensajeCarrusel = $("#idMensajeCarrusel").val();
            var mensaje = $("#mensaje").val();
            var operacion = $("#action").val();
        
            if(mensaje != ""){
                $.ajax({
                    url:"crear_mensajescarrusel.php",
                        method:'POST',
                        data:{
                            operacion : operacion,
                            idMensajesCarrusel : idMensajeCarrusel,
                            mensaje : mensaje
                            },
                        success:function(data){
                            alert(data);
                            $('#formularioMensajes')[0].reset();
                         
                            $('#modalMensajes').modal('hide');
                            $('#cerrar').click(); //Esto simula un click sobre el botón close de la modal, por lo que no se debe preocupar por qué clases agregar o qué clases sacar.
                            $('.modal-backdrop').remove();//eliminamos el backdrop del modal
                            dataTableMensajes .ajax.reload();
                            location.reload();
                    }
                });
            }else{
                alert("Porfavor llena todos los campos.")
            }
    });
  });

//Limitar el numero de caracteres y mostrar al usuario
$('#mensaje').keyup(function() {
    
    var characterCount = $(this).val().length,
        current = $('#current'),
        maximum = $('#maximum'),
        theCount = $('#the-count');
      
    current.text(characterCount);
   
    /*This isn't entirely necessary, just playin around*/
    if (characterCount < 70) {
      current.css('color', '#666');
    }
    if (characterCount > 70 && characterCount < 90) {
      current.css('color', '#6d5555');
    }
    if (characterCount > 90 && characterCount < 100) {
      current.css('color', '#793535');
    }
    if (characterCount > 100 && characterCount < 120) {
      current.css('color', '#841c1c');
    }
    if (characterCount > 120 && characterCount < 139) {
      current.css('color', '#8f0001');
    }
    
    if (characterCount >= 140) {
      maximum.css('color', '#8f0001');
      current.css('color', '#8f0001');
      theCount.css('font-weight','bold');
    } else {
      maximum.css('color','#666');
      theCount.css('font-weight','normal');
    }
       
  });



/* Funcionalidad de modificacion de videos web  */

//Crear mensaje
$(document).on('click', '#crearLinkVideoWeb', function(){
    // para reiniciar formulario cuando abra y cambiar accion
    $("#modalVideoWeb").modal('show');
    $("#action").val("Crear");
    $('#formularioVideoWeb')[0].reset();
});

//Editar mensaje
$(document).on('click', '.editar', async function(){
    var idMensaje = $(this).attr("id");
    $.ajax({
        url:`obtener_mensajescarrusel.php?idMensajesCarrusel=${idMensaje}`,
        method:"GET",
        success:function(data)
        {
            var mensajeJson = JSON.parse(data);
            if(mensajeJson != ""){
                $("#action").val("Editar");
                $("#modalMensajes").modal('show');
                $("#mensaje").val(mensajeJson.mensaje);
                $("#idMensajeCarrusel").val(mensajeJson.idMensajesCarrusel)
            }else{
                alert("Ocurrio un errror");
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
});

 // funcionalidad de crear un video desde la web(YOUTUBE)
 $(document).ready(function() {
    $('#formularioVideoWeb').on('submit', function(e){
            e.preventDefault();
            var idMediaVideoWeb = $("#idMediaVideoWeb ").val();
            var direccionURL = $("#direccionURL").val();
            var descripcionVideoWeb = $("#descripcionVideoWeb").val();
            var operacion = $("#action").val();
        
            if(direccionURL != ""){
                $.ajax({
                    url:"crear_link_video_web.php",
                        method:'POST',
                        data:{
                            operacion : operacion,
                            idMediaVideoWeb  : idMediaVideoWeb ,
                            direccionURL : direccionURL,
                            descripcionVideoWeb : descripcionVideoWeb
                            },
                        success:function(data){
                            alert(data);
                            $('#formularioVideoWeb')[0].reset();
                            $('#modalVideoWeb').modal('hide');
                            $('#cerrar').click(); //Esto simula un click sobre el botón close de la modal, por lo que no se debe preocupar por qué clases agregar o qué clases sacar.
                            $('.modal-backdrop').remove();//eliminamos el backdrop del modal
                            dataTable.ajax.reload();
                            
                            location.reload();
                            
                    }
                });
            }else{
                alert("Porfavor llena todos los campos.")
            }
    });
  });

//Examinar link de video de Youtube
$(document).on('click', '.editar', async function(){
    var idMediaVideoWeb = $(this).attr("id");
    $.ajax({
        url:`obtener_registros_video_web.php?idMediaVideoWeb=${idMediaVideoWeb}`,
        method:"GET",
        success:function(data)
        {
            var webJson = JSON.parse(data);
            if(webJson != ""){
                $("#action").val("Editar");
                $("#modalVideoWeb").modal('show');
                $("#direccionURL").val(webJson.direccionURL);
                $("#idMediaVideoWeb").val(webJson.idMediaVideoWeb)
            }else{
                alert("Ocurrio un errror");
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
});




//Limitar el numero de caracteres y mostrar al usuario
$('#mensaje').keyup(function() {
    
    var characterCount = $(this).val().length,
        current = $('#current'),
        maximum = $('#maximum'),
        theCount = $('#the-count');
      
    current.text(characterCount);
   
    /*This isn't entirely necessary, just playin around*/
    if (characterCount < 70) {
      current.css('color', '#666');
    }
    if (characterCount > 70 && characterCount < 90) {
      current.css('color', '#6d5555');
    }
    if (characterCount > 90 && characterCount < 100) {
      current.css('color', '#793535');
    }
    if (characterCount > 100 && characterCount < 120) {
      current.css('color', '#841c1c');
    }
    if (characterCount > 120 && characterCount < 139) {
      current.css('color', '#8f0001');
    }
    
    if (characterCount >= 140) {
      maximum.css('color', '#8f0001');
      current.css('color', '#8f0001');
      theCount.css('font-weight','bold');
    } else {
      maximum.css('color','#666');
      theCount.css('font-weight','normal');
    }
       
  });

 

//Para examinar las imagenes o videos subidos al servidor web
$(document).on('click',"[name='examinar']", function(){
    var idMediaVideoWeb = $(this).attr("id");
    var modalImg = document.getElementById("contenido");
    $.ajax({
        url:`obtener_registros_video_web.php?idMediaVideoWeb=${idMediaVideoWeb}`,
        method:"GET",
        success:function(data)
        {
            var webJson = JSON.parse(data);
            if(webJson != ""){
                var modal = document.getElementById("modalVideoWeb");
                modal.style.display = "block";
                if(webJson.imagen == 1){
                    modalImg.innerHTML = "";
                   
                    modalImg.innerHTML=`<img class="modal-content-image" id="contentFrame" src="./../../files/carruselMedia/${webJson.direccionURL}">`;
                    /* modalImg.innerHTML=`<img class="modal-content-image" id="contentFrame" src="youtu.be/MLeIBFYY6UY"/${webJson.direccionURL}">`; */
                }else{
                    modalImg.innerHTML = "";
                    modalImg.innerHTML=`<video class="modal-content-image" id="video" src="./../../files/carruselMedia/${webJson.direccionURL}" controls></video>`;
                   /*  modalImg.innerHTML=`<video class="modal-content-image" id="video" src="https://youtu.be/2bT_1USpR0Q" controls></video>` */;
                }
            }else{
                alert("Ocurrio un errror");
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });    
});


//Para borrar el archivo de media web  seleccionado
$(document).on('click',"[name='borrarWeb']", function(){
    var idMediaVideoWeb = $(this).attr("id");
    if(confirm("¿Esta seguro que desea borrar este archivo?"))
    {
        $.ajax({
            url:"eliminar_web.php",
            method:"POST",
            data:{idMediaVideoWeb:idMediaVideoWeb},
            success:function(data)
            {
                alert(data);
                dataTable.ajax.reload();
                location.reload();
            }
        });
    }
    else
    {
        return false;
    }
});



$(document).on('submit','#formularioVideoWeb',function(event){
    event.preventDefault();
    var extensionArchivo = $('#direccionURL').val().split('.').pop().toLowerCase();
    if(extensionArchivo == ""){
        alert("Porfavor sube un archivo.");
        return;
    }
   
});
