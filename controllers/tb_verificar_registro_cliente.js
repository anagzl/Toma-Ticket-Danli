var tabla;
var bandera =0;

//funcion que se ejecuta al inicio
function init(){
	$("#formRegistrarCliente").on("submit",function(e){
		/* Validacion del campo que si envia un vacio  */
		if ($('#Usuario_id_numero_identidad').val().length == 0){
			alert("El campo esta vacío. Favor ingrese el número de identidad para poder realizar su visita.");	
		}else{
			console.log("Bandera de sin uso de validacion de accion: " + bandera);

			if (bandera ==0 ){
				verificar_registro_cliente(e);
				bandera =1;
				console.log("Bandera de verificar: " + bandera);
			}else{
				alerta_registrar_visita(e);
				bandera =0;
				console.log("Bandera de registrar : " + bandera);
			}
		}
	})

	    /* Establecer el foco en un campo de entrada en un formulario HTML */
		window.onload = function () {
			document.getElementById("idUsuario").focus();
		}
}

//funcion limpiar
function limpiar(){
	$("#idUsuario").val("");
		setTimeout('document.location.reload()',3000);
		document.getElementById("idUsuario").focus();
}


function registrar_visita(e){
    e.preventDefault();//no se activara la accion predeterminada 
    $("#btnGuardar").prop("disabled",true);
    var formData=new FormData($("#formRegistrarCliente")[0]);

    $.ajax({
    	url: "../../ajax/registrar_cliente.php?op=registrar_cliente",
    	type: "POST",
    	data: formData,
    	contentType: false,
    	processData: false,

    	success: function(datos){
    			$("#movimientos").html(datos);
				bootbox.alert(datos);
				alert(datos);
		}
	});

	/* Limpiar el msj despues de 4 segundos */
	/* 	limpiar();  */
}

function alerta_registrar_visita(e){
    var mensaje;
    var opcion = confirm("¿Desea efectuar su registro de visita ahora?");
    if (opcion == true) {
        /* mensaje = "Has clickado OK";  */
		registrar_cliente(e);
	} else {
		e.preventDefault();//no se activara la accion predeterminada 
	    mensaje = '<div class="alert alert-warning"><i class="icon fa fa-warning"></i> No se ha efectuado registrado de marcaje. Cuando quiera realizarlo intente de nuevo. </div><script> 		Swal.fire(			"Mensaje",		"No se ha efectuado registrado de marcaje. Cuando quiera realizarlo intente de nuevo. ",		"warning"	);	limpiar();</script>';
		$("#movimientos").html(mensaje);
		bootbox.alert(mensaje);
		document.getElementById("movimientos").innerHTML = mensaje;
/* 		alert("No se ha efectuado registrado de marcaje. Cuando quiera realizarlo intente de nuevo. "); */

	}
}

function verificar_cliente(e){
    e.preventDefault();//no se activara la accion predeterminada 
    $("#btnGuardar").prop("disabled",true);
    var formData=new FormData($("#formRegistrarAsistencia")[0]);
    $.ajax({
    	url: "../../ajax/verificacion_cliente.php?op=verificar_cliente",
    	type: "POST",
    	data: formData,
    	contentType: false,
    	processData: false,

    	success: function(datos){
    			$("#movimientos").html(datos);
				/* return true; */
				bootbox.alert(datos); 
		}
	});
}

init();
