/**
 * Funcionalidad de llenar la tabla de datos
 */
 let fecha = new Date();
 var dataTable = $('#datos_tramites').DataTable({
    dom: 'Bfrtip',
    lengthMenu: [
        [ 10, 25, 50, -1 ],
        [ '10 Filas', '25 Filas', '50 Filas', 'Mostrar Todo' ]
    ] ,
    buttons: [
        'pageLength',
        {
            extend: 'pdfHtml5',
            orientation: 'landscape',
            messageTop: `Fecha de Impresión: ${fecha.toLocaleDateString("en-US")}`,
            title: "Registro de Direcciones"
        },
        'excel'
    ] ,
    "processing":true,
    "serverSide":true,
    "defaultContent":  "<i>Not set</i>",
    "order":[],
    "ajax":{
            url:"obtener_registros_direccion.php",
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

//Editar registro
$(document).on('click', '.editar', async function(){
    var idDireccion = $(this).attr("id");
    $.ajax({
        url:`obtener_direccion.php?direccion=${idDireccion}`,
        method:"GET",
        success:function(data)
        {
            var direccionJson = JSON.parse(data);
            if(direccionJson != ""){
                $("#action").val("Editar");
                $("#modalDireccion").modal('show');
                $("#idDireccion").val(direccionJson.idDireccion);
                $("#nombreDireccion").val(direccionJson.nombre);
                $("#descripcionDireccion").val(direccionJson.descripcion);
                $("#siglasDireccion").val(direccionJson.siglas);
            }else{
                alert("Ocurrio un errror");
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
});

 // funcionalidad de editar o crear
 $(document).ready(function() {
    $('#formularioDireccion').on('submit', function(e){
            e.preventDefault();
            var idDireccion = $("#idDireccion").val();
            var nombreDireccion = $("#nombreDireccion").val();
            var descripcionDireccion = $("#descripcionDireccion").val();
            var siglas = $("#siglasDireccion").val();
            var operacion = $("#action").val();
        
            if(nombreDireccion != "" && idDireccion != 0 && descripcionDireccion != "" && siglas != ""){
                $.ajax({
                    url:"crear_direccion.php",
                        method:'POST',
                        data:{
                            operacion : operacion,
                            idDireccion : idDireccion,
                            nombre : nombreDireccion,
                            siglas : siglas,
                            descripcion : descripcionDireccion
                            },
                        success:function(data){
                            alert(data);
                            $('#formularioDireccion')[0].reset();
                            $('#modalDireccion').modal('hide');
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