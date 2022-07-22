/**
 * Funcionalidad de llenar la tabla de datos de Direccion Unidad 
 */
 $(document).ready(function(){
    $("#botonCrear").click(function(){
            $("#formularioCreacionUsuario")[0].reset();
            $(".modal-title").text("Crear usuario");
            $("#action").val("Crear");
            $("#operacion").val("Crear");
    });
    var dataTable = $('#datos_usuario').DataTable({
        "processing":true,
        "serverSide":true,
        "defaultContent":  "<i>Not set</i>",
        "order":[],
        "ajax":{
                url:"obtener_usuarios.php",
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
* Funcionalidad de Crear un registro nuevo de Usuario
*/

$(document).on('submit','#formularioCreacionUsuario',function(event){
    event.preventDefault();
    // var idUsuario = $("#idUsuario").val();
    var numeroIdentidad = $("#numeroIdentidad").val();
    var primerNombre = $("#primerNombre").val();
    var segundoNombre = $("#segundoNombre").val();
    var primerApellido = $("#primerApellido").val();
    var segundoApellido = $("#segundoApellido").val();
    var numeroCelular = $("#numeroCelular").val();
    var correo = $("#correo").val();


/* Validar campos que no lo envien vacio */
    if(numeroIdentidad != '' && primerNombre !='' /* && segundoNombre != '' */ && primerApellido != '' /* && segundoApellido != '' */ && numeroCelular != '' 
    && correo != ''){
        $.ajax({
            url:"crear_usuario.php",
                method:'POST',
                data:new FormData(this),
                contentType:false,
                processData:false,
                success:function(data){
                    if(data == "Ya existe un usuario con esa identidad"){
                        //evitar que se recargue la pagina si la identidad esta repetida para que el usuario pueda modificar los campos.
                        alert(data);
                        $("#idUsuario").focus();
                    }else{
                        alert(data);
                        $('#formularioCreacionUsuario')[0].reset();
                        $('#modalUsuario').modal().hide; 
                        $('#cerrar').click(); //Esto simula un click sobre el botón close de la modal, por lo que no se debe preocupar por qué clases agregar o qué clases sacar.
                        $('.modal-backdrop').remove();//eliminamos el backdrop del modal
                        dataTable.ajax.reload();
                        location.reload();
                    }
            }
        });

    }
    else{/* Si los campos estan vacios */
        alert("Algunos campos son obligatorios.");
    }
});

/* Funcionadalidada de edicion */
            //Funcionalidad de editar
            $(document).on('click', '.editar', function(){
                var idUsuario = $(this).attr("id");
                $.ajax({
                    url:"obtener_usuario.php",
                    method:"POST",
                    data:{idUsuario:idUsuario},
                    dataType:"json",
                    success:function(data)
                        {
                            console.log(data);
                            $('#modalUsuario').modal('show');
                            $('#idUsuario').val(data.idUsuario); 
                            $('#numeroIdentidad').val(data.numeroIdentidad);
                            $('#primerNombre').val(data.primerNombre);
                            $('#segundoNombre').val(data.segundoNombre);
                            $('#primerApellido').val(data.primerApellido); 
                            $('#segundoApellido').val(data.segundoApellido);
                            $('#numeroCelular').val(data.numeroCelular);
                            $('#correo').val(data.correo);


                            $('#action').val("Actualizar");
                            $('#operacion').val("Actualizar");
                       /*      $('#action').val("Estado");
                            $('#operacion').val("Estado"); */


                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                        }
                    })
            });

//Funcionalida de cambiar estado

$(document).on('click', '.borrar', function(){
        var idUsuario = $(this).attr("id");
        if(confirm("Está seguro de actualizar este registro:" + idUsuario))
        {
            $.ajax({
                url:"cambiar_estado_usuario.php",
                method:"POST",
                data:{idUsuario:idUsuario},
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