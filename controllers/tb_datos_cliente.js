
/**
 * Funcionalidad de llenar la tabla de datos de Direccion Unidad 
 */
 $(document).ready(function(){
    $("#botonAceptar").click(function(){
            $("#formularioCreacion_datos_cliente")[0].reset();
            $(".modal-title").text("Crear datos_cliente");
            $("#action").val("Crear");
            $("#operacion").val("Crear");
    });
    var dataTable = $('#datos_datos_cliente').DataTable({
        "processing":true,
        "serverSide":true,
        "defaultContent":  "<i>Not set</i>",
        "order":[],
        "ajax":{
                url:"obtener_datos_cliente.php",
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

$(document).on('submit','#formularioCreacion_datos_cliente',function(event){
    event.preventDefault();
    var num_identidad           = $("#num_identidad").val();
    var primerNombre            = $("#primerNombre").val();
    var segundoNombre           = $("#segundNombre").val();
    var primerApellido          = $("#primerApellido").val();
    var segundoApellido         = $("#segundoApellido").val();
    var numeroCelular           = $("#numeroCelular").val();
    var correo                  = $("#correo").val();
    var Genero_idGenero         = $("#Genero_idGenero").val();
    var idTipoUsuario           = $("#idTipoUsuario").val();

/* Validar campos que no lo envien vacio */
    if(num_identidad != '' &&primerNombre != '' && segundoNombre != ''  && primerApellido != ''  && segundoApellido != ''  && numeroCelular != ''  && correo != '' && Genero_idGenero != ''&& idTipoUsuario != '' ){
        $.ajax({
            url:"crear_datos_cliente.php",
                method:'POST',
                data:new FormData(this),
                contentType:false,
                processData:false,
                success:function(data){
                alert(data);
                $('#formularioCreacion_datos_cliente')[0].reset();
                $('#modal').modal().hide; 
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

/* Funcionadalidada de edicion */
            //Funcionalida de editar
            $(document).on('click', '.editar', function(){
                var idEstado = $(this).attr("id");
                $.ajax({
                    url:"obtener_Estado.php",
                    method:"POST",
                    data:{idEstado:idEstado},
                    dataType:"json",
                    success:function(data)
                        {
                            console.log(data);
                            $('#modalEstado').modal('show');
                            $('#idEstado').val(data.idEstado);
                            $('#nombre').val(data.nombre);
                            $('#action').val("Editar");
                            $('#operacion').val("Editar");
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                        }
                    })
            });

//Funcionalida de borrar

$(document).on('click', '.borrar', function(){
        var idcontacto = $(this).attr("id");
        if(confirm("Esta seguro de borrar este registro:" + idcontacto))
        {
            $.ajax({
                url:"borrar.php",
                method:"POST",
                data:{idcontacto:idcontacto},
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


});/* fin de $(document).ready(function() */
