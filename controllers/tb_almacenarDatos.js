
/**
 * Funcion Global para guardar datos de session
 * 
 * @Autor:Ana Zavala
 * @Fecha Creacion: 15/06/2022
 
*/

//estos datos se eliminaran una vez que se cierra el navegador
// verdadero si el cliente necesita atencion preferencial
function guardarPreferencia(preferencia){
        sessionStorage.setItem('preferencial',preferencia)
}

//Guarda el id de la direccion seleccionada
function guardarDireccion(idDireccion){
        sessionStorage.setItem('direccion',idDireccion);
}

//guarda el id del tramite seleccionado
function guardarTramite(idTramite){
        sessionStorage.setItem('tramite',idTramite);
}

function mostrarDescripcionDireccion(idDireccion){
        $.get(`obtener_direccion.php?direccion=${idDireccion}`,function(data,status){
                var dataJson = JSON.parse(data);
                if(dataJson != ""){
                        Swal.fire({
                                title : `${dataJson.nombre}`,
                                text : `${dataJson.descripcion}`,
                                icon : `info`
                        });
                }else{
                        alert("No se encontro informacion sobre esta direccion.")
                }
        })

}

function mostrarDescripcionTramite(idTramite){
        $.get(`obtener_tramite.php?idTramite=${idTramite}`,function(data,status){
                var dataJson = JSON.parse(data);
                if(dataJson != ""){
                        Swal.fire({
                                title : `${dataJson.nombreTramite}`,
                                text : `${dataJson.descripcionTramite}`,
                                icon : `info`
                        });
                }else{
                        alert("No se encontro informacion sobre este tramite.")
                }
        })

}