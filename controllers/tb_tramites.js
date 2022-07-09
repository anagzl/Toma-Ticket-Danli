/**
 * Funcionalidad de llenar la tabla de datos
 */
 var dataTable = $('#datos_tramites').DataTable({
    "processing":true,
    "serverSide":true,
    "defaultContent":  "<i>Not set</i>",
    "order":[],
    "ajax":{
            url:"obtener_registros_tramites.php",
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
        $("#modalTramite").modal('show');
        $("#action").val("Crear");
        $('#formularioTramite')[0].reset();
    });

    //Editar registro
    $(document).on('click', '.editar', async function(){
        var idTramite = $(this).attr("id");
        $.ajax({
            url:`obtener_tramite.php?idTramite=${idTramite}`,
            method:"GET",
            success:function(data)
            {
                var tramiteJson = JSON.parse(data);
                console.log(tramiteJson);
                if(tramiteJson != ""){
                    $("#action").val("Editar");
                    $("#modalTramite").modal('show');
                    $("#idTramite").val(tramiteJson.idTramite);
                    $("#nombreTramite").val(tramiteJson.nombreTramite);
                    $("#descripcionTramite").val(tramiteJson.descripcionTramite);
                    $("#direccion").val(tramiteJson.Direccion_idDireccion);
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
     $(document).on('click', '.borrar', function(){
        var idTramite = $(this).attr("id");
        if(confirm("¿Esta seguro de querer cambiar el estado de este estado: " + idTramite + "?"))
        {
            $.ajax({
                url:"cambiar_estado_tramite.php",
                method:"POST",
                data:{idTramite:idTramite},
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

     // funcionalidad de editar o crear
     $(document).ready(function() {
        $('#formularioTramite').on('submit', function(e){
                e.preventDefault();
                var idTramite = $("#idTramite").val();
                var nombreTramite = $("#nombreTramite").val();
                var descripcionTramite = $("#descripcionTramite").val();
                var direccion = $("#direccion").val();
                var operacion = $("#action").val();
            
                if(nombreTramite != "" && direccion != 0 && descripcionTramite != ""){
                    $.ajax({
                        url:"crear_tramite.php",
                            method:'POST',
                            data:{
                                operacion : operacion,
                                idTramite : idTramite,
                                nombreTramite : nombreTramite,
                                Direccion_idDireccion : direccion,
                                descripcionTramite : descripcionTramite
                                },
                            success:function(data){
                                alert(data);
                                $('#formularioTramite')[0].reset();
                                $('#modalTramite').modal('hide');
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

