
/**
 * Funcion Global para guardar datos de session
 * 
 * @Autor:Ana Zavala
 * @Fecha Creacion: 15/06/2022
 
*/

//estos datos se eliminaran una vez que se cierra el navegador
function guardarDatos(nombre)
        {
        let AtencionPreferencial =["True"];
        sessionStorage.setItem(nombre,"True")
        }