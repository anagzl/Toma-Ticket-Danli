/**
 * Funcionalidad de llenar la tabla de datos
 */
//  var dataTable = $('#datos_tramites').DataTable({
//     "processing":true,
//     "serverSide":true,
//     "defaultContent":  "<i>Not set</i>",
//     "order":[],
//     "ajax":{
//             url:"obtener_registros_direccion.php",
//             type:"POST"
//             },
//              "columnsDefs":[
//                 {
//                     "targets":[0,3,4],
//                     "orderable":false, 
//                 },
//             ],
//     "language": {
//         "decimal": "",
//         "emptyTable": "<i class='bi bi-emoji-frown'></i>  No hay registros encontrados",
//         "info": "<i class='bi bi-eye-fill'></i> Mostrando _START_ a _END_ de _TOTAL_ Entradas",
//         "infoEmpty": "<i class='bi bi-menu-button-fill'></i>  Mostrando 0 a 0 de 0 Entradas",
//         "infoFiltered": "(<i class='bi bi-funnel-fill'></i> Filtrado de _MAX_ total entradas)",
//         "infoPostFix": "",
//         "thousands": ",",
//         "lengthMenu": "<i class='bi bi-menu-button-fill'></i> Mostrar _MENU_ Entradas",
//         "loadingRecords": "<div class='spinner-border text-info' role='status'><span class='visually-hidden'>Loading...</span> </div> Cargando...",
//         "processing": "<div class='spinner-border text-info' role='status'><span class='visually-hidden'>Loading...</span> </div> Procesando...",
//         "search": "<i class='bi bi-search'></i> Buscar:",
//         "zeroRecords": "<i class='bi bi-emoji-frown'></i> Sin resultados encontrados",
//         "paginate": {
//             "first": "<i class='bi bi-skip-backward-fill'></i> Primero",
//             "last": "<i class='bi bi-skip-forward-fill'></i> Ultimo",
//             "next": "Siguiente <i class='bi bi-caret-right'></i>",
//             "previous": "<i class='bi bi-caret-left'></i> Anterior"
//     }
// } 
// });

// $(document).ready(function(){
   
// })

 //Editar registro
 $(document).on('click',"[name='examinar']", function(){
    var fileName = $(this).attr("id");
    $("#modalMedia").modal('show');
    $("#imgModal").attr('src',`./../../files/carruselMedia/${fileName}`);
});

// $(document).on('click','.borrar',function(){
//     console.log("hola");
// });


