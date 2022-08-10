/**
 * Funcionalidad de llenar la tabla de datos
 */
$(document).ready(function(){
    var direccion = $("#direccion").val();
    cargar_datatable_direccion(direccion);
});

var dataTable;

$("#direccion").change(function(){
    var direccionSeleccionada = $("#direccion").val();
    dataTable.destroy();
    cargar_datatable_direccion(direccionSeleccionada);
});

function cargar_datatable_direccion(direccion){
    let fecha = new Date();
    dataTable = $('#datos_tickets').DataTable({
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
                title: "Registro de Tickets"
            },
            'excel'
        ] ,
        "paging":false,
        "searching":false,
        "processing":true,
        "serverSide":true,
        "defaultContent":  "<i>Not set</i>",
        "order":[],
        "ajax":{
                url:"obtener_registros_tickets.php",
                type:"POST",
                data: {direccion : direccion}
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
}

 //Funcionalidad para deshabilitar o borrar ticket
 $(document).on('click', '.borrar', function(){
    var idTicket = $(this).attr("id");
    var direccion = $('#direccion').val();
    if(confirm("¿Seguro que quiere habilitar/deshabilitar este ticket?: " + idTicket))
    {
        $.ajax({
            url:"cambiar_estado_ticket.php",
            method:"POST",
            data:{idTicket:idTicket,
                  direccion:direccion},
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

//editar ticekt
$('#formularioTicket').on('submit', function(e){
    e.preventDefault();
    var idTicket = $("#idTicket").val()
    var idEmpleado = $("#idEmpleado").val()
    var direccionId = $("#direccion").val()
    var marcarRellamar = ($("#marcarRellamado").prop('checked')) ? 1 : 0
    var llamando = ($("#llamando").prop('checked')) ? 1 : 0
    $.ajax({
        url:"editar_ticket.php",
            method:'POST',
            data:{
                direccion : direccionId,
                idTicket : idTicket,
                idEmpleado : idEmpleado,
                marcarRellamado : marcarRellamar,
                llamando : llamando
                },
            success:function(data){
                alert(data);
                $('#formularioTicket')[0].reset();
                $('#modalTicket').modal('hide');
                $('#cerrar').click(); //Esto simula un click sobre el botón close de la modal, por lo que no se debe preocupar por qué clases agregar o qué clases sacar.
                $('.modal-backdrop').remove();//eliminamos el backdrop del modal
                dataTable.ajax.reload();
                location.reload();
        }
    });
});


$(document).on('click', '.editar', function(){
    var idTicket = $(this).attr("id");
    var direccion = $('#direccion').val();
    $.get(`obtener_ticket.php?idTicket=${idTicket}&direccion=${direccion}`,function(data,status){
        var ticketJson = JSON.parse(data)
        console.log(ticketJson)
        $("#modalTicket").modal('show');
        $("#idTicket").val(ticketJson.idTicket);
        $("#idBitacora").val((ticketJson.numeroTicket == null) ? ticketJson.Bitacora_idBitacora : ticketJson.numeroTicket);
        $("#idEmpleado").val(ticketJson.Empleado_idEmpleado)
        $("#llamando").prop('checked',(ticketJson.llamando == 0) ? false : true)
        $("#marcarRellamado").prop('checked',(ticketJson.marcarRellamado == 0) ? false : true) 
    })
})



  