
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

function guardarTramite(idTramite){
        sessionStorage.setItem('tramite',idTramite);
}