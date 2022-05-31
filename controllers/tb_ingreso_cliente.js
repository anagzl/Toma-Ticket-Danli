$(document).ready(function(){
    $("#botonAceptar").click(function(){
            $("#formularioCreacionGeneros")[0].reset();
            $(".modal-title").text("Crear ingreso Clientes");
            $("#action").val("Aceptar");
            $("#operacion").val("Aceptar");
    });
    var dataTable = $('#datos_ingreso_cliente').DataTable({
        "processing":true,
        "serverSide":true,
        "defaultContent":  "<i>Not set</i>",
        "order":[],
        "ajax":{
                url:"obtener_ingreso_.php",
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
/**
* Funcionalidad de Crear un registro nuevo
*/

            $(document).on('submit','#formularioCreacion_ingreso_cliente',function(event){
                event.preventDefault();
                var idUsuario                   = $("#idUsuario").val();
                var num_identidad               = $("#num_identidad").val();
                var primerNombre                = $("#primerNombre").val();
                var segundoNombre               = $("#segundoNombre").val();
                var primerApellido              = $("#primerApellido").val();
                var segundoApellido             = $("#segundoApellido").val();
                var numeroCelular               = $("#correo").val();
                var correo                      = $("#primerApellido").val();
                var Genero_idGenero             = $("#Genero_idGenero").val();
                var TipoUsuario_idTipoUsuario   = $("#TipoUsuario_idTipoUsuario").val();
                var Rol_idRol                   = $("#Rol_idRol").val();


            /* Validar campos que no lo envien vacio */
                if(idUsuario != '' && num_identidad != '' && primerNombre != '' && segundoNombre != ''&& primerApellido != '' && segundoApellido != '' && numeroCelular != ''&& correo != ''&& Genero_idGenero != ''
                && TipoUsuario_idTipoUsuario != '' && Rol_idRol != ''){
                    $.ajax({
                        url:"crear_ingreso_cliente.php",
                            method:'POST',
                            data:new FormData(this),
                            contentType:false,
                            processData:false,
                            success:function(data){
                            alert(data);
                            $('#formularioCreacioningreso_cliente')[0].reset();
                            $('#modal').modal('hide');
                            $('#cerrar').click(); //Esto simula un click sobre el botón close de la modal, por lo que no se debe preocupar por qué clases agregar o qué clases sacar.
                            $('.modal-backdrop').remove();//eliminamos el backdrop del modal
                            dataTable.ajax.reload();
                            location.reload();
                        }
                    });

                }
                else{/* Si los campos estan vacios */
                    alert("Algunos campos son obligatorios.");
                }
            });
        });
