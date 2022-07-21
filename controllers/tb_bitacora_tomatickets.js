/**
 * Funcionalidad de llenar la tabla de datos
 */
 $(document).ready(function(){
    //fecha inicial y final como actual
    const date = new Date().toJSON().slice(0,10);  //fecha actual  
    $("#fechaFinal").val(date);
    $("#fechaInicio").val(date);
    cargarDatatable($("#fechaInicio").val(),$("#fechaFinal").val())
 });

 var dataTable;
 function cargarDatatable(fechaInicio,fechaFin){
    dataTable = $('#datos_bitacora_tomatickets').DataTable({
        "processing":true,
        "serverSide":true,
        "defaultContent":  "<i>Not set</i>",
        "order":[],
        "ajax":{
                url:"obtener_registros_bitacora_tomatickets.php",
                type:"POST",
                data: {
                    fechaInicial : fechaInicio,
                    fechaFinal : fechaFin
                }
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
  

 $('#buscarFecha').on('click',function(){
    let fechaInicial = $("#fechaInicio").val();
    let fechaFinal = $("#fechaFinal").val();
    if(fechaInicial == ""){
        alert("Especifica una fecha inicial");
        return;
    }
    if(fechaFinal == ""){
        alert("Especifica una fecha final");
        return;
    }
    if(fechaFinal < fechaInicial){
        alert("La fecha final no puede ser menor a la inicial");
        return;
    }
    dataTable.destroy();
    cargarDatatable(fechaInicial,fechaFinal);
})
