     
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
                var correo                      = $("#correo").val();
                var numeroCelular               = $("#numeroCelular").val();
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

