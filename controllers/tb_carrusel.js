/**
 * Funcionalidad de llenar la tabla de datos
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

//Crear registro
$(document).on('click', '#crear', function(){
    // para reiniciar formulario cuando abra y cambiar accion
    $("#modalSubirMedia").modal('show');
    $("#action").val("Crear");
    $('#formularioMediaCarrusel')[0].reset();
});

$(document).on('click',"#cerrarModalImg",function(){
    document.getElementById("modalMedia").style.display = "none";
    $("#video").get(0).pause();
})

 //Editar registro
 $(document).on('click',"[name='examinar']", function(){
    var idMedia = $(this).attr("id");
    // Get the modal
    var modal = document.getElementById("modalMedia");
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

$(document).on('submit','#formularioMediaCarrusel',function(event){
    event.preventDefault();
    var ruta = $('#media').val();
    var operacion = $('#action').val();
    var extensionArchivo = $('#media').val().split('.').pop().toLowerCase();
    if(extensionArchivo != ''){
        console.log(extensionArchivo);
        if(jQuery.inArray(extensionArchivo, ['mp4','png','jpg']) == -1){
            alert("Fomato de archivo inválido. Formatos aceptados: mp4, png, jpg.");
            return;
        }
    }

    $.ajax({
        url:"crear_mediacarrusel.php",
        method:"POST",
        data:{ruta: ruta,
              operacion: operacion},
        success:function(data)
        {
            alert(data);
            dataTable.ajax.reload();
        }
    });
});



