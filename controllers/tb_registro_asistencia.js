var tabla;
var bandera =0;

//funcion que se ejecuta al inicio
function init(){
	$("#formRegistrarAsistencia").on("submit",function(e){
		/* Validacion del campo que si envia un vacio  */
		if ($('#Usuario_id_numero_identidad').val().length == 0){
			alert("El campo esta vacío.");	
		}else{
			console.log("Bandera de sin uso de validacion de accion: " + bandera);

			if (bandera ==0 ){
				verificar_asistencia(e);
				bandera =1;
				console.log("Bandera de verificar: " + bandera);
			}else{
				alerta_registrar_asistencia(e);
				bandera =0;
				console.log("Bandera de registrar : " + bandera);
			}
		}
	})

	    /* Establecer el foco en un campo de entrada en un formulario HTML */
		window.onload = function () {
			document.getElementById("num_identidad").focus();
		}
}

//funcion limpiar
function limpiar(){
	$("#num_identidad").val("");
		setTimeout('document.location.reload()',3000);
		document.getElementById("num_identidad").focus();
}


function registrar_asistencia(e){
    e.preventDefault();//no se activara la accion predeterminada 
    $("#btnGuardar").prop("disabled",true);
    var formData=new FormData($("#formRegistrarAsistencia")[0]);

    $.ajax({
    	url: "../../ajax/registrar_asistencia.php?op=registrar_asistencia",
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

function alerta_registrar_asistencia(e){
    var mensaje;
    var opcion = confirm("¿Desea efectuar su registro de asistencia ahora?");
    if (opcion == true) {
        /* mensaje = "Has clickado OK";  */
		registrar_asistencia(e);
	} else {
		e.preventDefault();//no se activara la accion predeterminada 
	    mensaje = '<div class="alert alert-warning"><i class="icon fa fa-warning"></i> No se ha efectuado registrado de marcaje. Cuando quiera realizarlo intente de nuevo. </div><script> 		Swal.fire(			"Mensaje",		"No se ha efectuado registrado de marcaje. Cuando quiera realizarlo intente de nuevo. ",		"warning"	);	limpiar();</script>';
		$("#movimientos").html(mensaje);
		bootbox.alert(mensaje);
		document.getElementById("movimientos").innerHTML = mensaje;
/* 		alert("No se ha efectuado registrado de marcaje. Cuando quiera realizarlo intente de nuevo. "); */

	}
}

function verificar_asistencia(e){
    e.preventDefault();//no se activara la accion predeterminada 
    $("#btnGuardar").prop("disabled",true);
    var formData=new FormData($("#formRegistrarAsistencia")[0]);
    $.ajax({
    	url: "../../ajax/verificacion_asistencia.php?op=verificar_asistencia",
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
