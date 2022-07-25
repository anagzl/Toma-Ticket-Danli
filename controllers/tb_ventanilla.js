/**
 * Funcionalidad de llenar la tabla de datos
 */
 var dataTable = $('#datos_ventanilla').DataTable({
    dom: 'Bfrtip',
    lengthMenu: [
        [ 10, 25, 50, -1 ],
        [ '10 Filas', '25 Filas', '50 Filas', 'Mostrar Todo' ]
    ] ,
    buttons: [
        'pageLength',
        'pdf',
        'excel'
    ] ,
    "processing":true,
    "serverSide":true,
    "defaultContent":  "<i>Not set</i>",
    "order":[],
    "ajax":{
            url:"obtener_registros_ventanilla.php",
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
    $("#modalVentanilla").modal('show');
    $("#action").val("Crear");
    $('#formularioVentanilla')[0].reset();
});



//Editar registro
$(document).on('click', '.editar', async function(){
    var idVentanilla = $(this).attr("id");
    $.ajax({
        url:`obtener_ventanilla.php?idVentanilla=${idVentanilla}`,
        method:"GET",
        success:function(data)
        {
            var ventanillaJson = JSON.parse(data);
            console.log(data);
            if(ventanillaJson != ""){
                $("#action").val("Editar");
                $("#modalVentanilla").modal('show');
                $("#idVentanilla").val(ventanillaJson.idVentanilla);
                $("#numVentanilla").val(ventanillaJson.numero);
                $("#direccion").val(ventanillaJson.Direccion_idDireccion);
                obtener_usuario_encargado_ventanilla(ventanillaJson.idVentanilla);
                // $("#empleado").val(ventanillaJson.Usuario_idUsuario);
                // despues de cargar los tramites seleccionarlos o deseleccionarlos
                cargar_tramites(ventanillaJson.Direccion_idDireccion)
                .then(response => {
                    if(response != ""){
                        const arregloTramites = ventanillaJson.tramites_habilitados.split(",");
                        arregloTramites.forEach(element => {
                            $(`#${element.replace(/ /g,'')}`).prop('checked', true);
                        });
                    }
                });
            }else{
                alert("Ocurrio un error");
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
});



 //Funcionalidad de borrar
 $(document).on('click', '.borrar', function(){
    var idVentanilla = $(this).attr("id");
    if(confirm("Esta seguro de querer cambiar el estado de esta ventanilla: " + idVentanilla))
    {
        $.ajax({
            url:"cambiar_estado_ventanilla.php",
            method:"POST",
            data:{idVentanilla:idVentanilla},
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

//cargar tramites para direccion en modal de edicion o creacion
$('#direccion').change(function() {
    var seleccionado = $(this).val();
    cargar_tramites(seleccionado);
});

// funcionalidad de editar o crear
$(document).ready(function() {
    $('#formularioVentanilla').on('submit', function(e){
            e.preventDefault();
            var idVentanilla = $("#idVentanilla").val();
            var numVentanilla = $("#numVentanilla").val();
            var direccion = $("#direccion").val();
            var operacion = $("#action").val();
            var idEmpleado = $("#empleado").val();
            var tramites = tramitesToString();
        
            if(numVentanilla != "" && direccion != 0 && tramites != ""){
                $.ajax({
                    url:"crear_ventanilla.php",
                        method:'POST',
                        data:{
                            operacion : operacion,
                            idVentanilla : idVentanilla,
                            numero : numVentanilla,
                            Direccion_idDireccion : direccion,
                            tramites : tramites,
                            idEmpleado : idEmpleado
                        },
                        success:function(data){
                            alert(data);
                            $('#formularioVentanilla')[0].reset();
                            $('#modalVentanilla').modal('hide');
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

//cargar los tramites en el div scrolleable
function cargar_tramites(idDireccion){
    return $.ajax({
        url:`obtener_tramites.php?direccion=${idDireccion}`,
        method:"GET",
        success:function(data)
        {
            var tramitesJson = JSON.parse(data);
            document.getElementById("tramitesDireccion").innerHTML = "";
            html = "";
            tramitesJson.forEach(element => {
                if(element.estado == 1){
                    html += `<div class="form-check">`;
                    html += `<input class="form-check-input" type="checkbox" id="${element.nombreTramite.replace(/ /g,'')}" name="${element.nombreTramite}" value="habilitado">`;
                    html += `<label class="form-check-label" for="${element.nombreTramite}">${element.nombreTramite}</label>`
                    html += `</div>`
                }
            });
            document.getElementById("tramitesDireccion").innerHTML = html;
        },
        async:false
    });
}

function tramitesToString(){
    var tramitesString = "";
    $('input.form-check-input').each(function(id,element){
        if(element.checked){
            tramitesString += `${element.name},`;
        }
    });
    tramitesString = tramitesString.substring(",", tramitesString.length - 1);
    return tramitesString;
}

//cargar los tramites en el div scrolleable
function obtener_usuario_encargado_ventanilla(idVentanilla){
    return $.ajax({
        url:`obtener_empleados.php?idVentanilla=${idVentanilla}`,
        method:"GET",
        success:function(data)
        {
            var datosJson = JSON.parse(data);
            if(datosJson != ""){
                $("#empleado").val(datosJson[0].idEmpleado);
            }else{
                $("#empleado").val(0);
            }
        },
        async:false
    });
}