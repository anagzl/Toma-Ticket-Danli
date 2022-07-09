/**
 * Funcionalidad de llenar la tabla de datos de Direccion Unidad 
 */
 $(document).ready(function(){
    $("#botonCrear").click(function(){
            $("#formularioCreacionEmpleado")[0].reset();
            $(".modal-title").text("Crear empleado");
            $("#action").val("Crear");
            $("#operacion").val("Crear");
    });
    var dataTable = $('#datos_empleado').DataTable({
        "processing":true,
        "serverSide":true,
        "defaultContent":  "<i>Not set</i>",
        "order":[],
        "ajax":{
                url:"obtener_empleados.php",
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
* Funcionalidad de Crear un registro nuevo de Empleado
*/

$(document).on('submit','#formularioCreacionEmpleado',function(event){
    event.preventDefault();
    var idEmpleado = $("#idEmpleado").val();
    var Usuario_idUsuario = $("#Usuario_idUsuario").val();
    var Rol_idRol = $("#Rol_idRol").val();
    var Ventanilla_idVentanilla = $("#Ventanilla_idVentanilla").val();
    var correoInstitucional = $("#correoInstitucional").val();
    var login = $("#login").val();

/* Validar campos que no lo envien vacio */
    if(Usuario_idUsuario != '' && Rol_idRol !='' && Ventanilla_idVentanilla != '' && correoInstitucional != '' && login != ''){
        $.ajax({
            url:"crear_empleado.php",
                method:'POST',
                data:new FormData(this),
                contentType:false,
                processData:false,
                success:function(data){
                alert(data);
                $('#formularioCreacionEmpleado')[0].reset();
                $('#modalEmpleado').modal().hide; 
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
            //Funcionalidad de editar
            $(document).on('click', '.editar', function(){
                var idEmpleado = $(this).attr("id");
                $.ajax({
                    url:"obtener_Empleado.php",
                    method:"POST",
                    data:{idEmpleado:idEmpleado},
                    dataType:"json",
                    success:function(data)
                        {
                            console.log(data);
                            $('#modalEmpleado').modal('show');
                            $('#idEmpleado').val(data.idEmpleado); 
                            $('#Usuario_idUsuario').val(data.Usuario_idUsuario);
                            $('#Rol_idRol').val(data.Rol_idRol);
                            $('#Ventanilla_idVentanilla').val(data.Ventanilla_idVentanilla);
                            $('#correoInstitucional').val(data.correoInstitucional);
                            $('#login').val(data.login);

                            $('#action').val("Editar");
                            $('#operacion').val("Editar");
/* 
                           $('#action').val("Estado");
                            $('#operacion').val("Estado"); */
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                        }
                    })
            });

//Funcionalida de cambiar estado

$(document).on('click', '.borrar', function(){
        var idEmpleado = $(this).attr("id");
        if(confirm("Está seguro de actualizar este registro:" + idEmpleado))
        {
            $.ajax({
                url:"cambiar_estado_empleado.php",
                method:"POST",
                data:{idEmpleado:idEmpleado},
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