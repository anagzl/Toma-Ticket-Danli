<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buen Día</title>
</head>
<body id="body">
</body>
</html>
<script>
window.blur();
let idTicket = sessionStorage.getItem('idTicket');
let idDireccion = sessionStorage.getItem('direccion');
document.getElementById("body").innerHTML = `<iframe src="ticket_para_prueba.php?idTicket=${idTicket}&direccion=${idDireccion}" height="200" width="300"></iframe>`;

setTimeout(function(){
    window.close();
},4500);
</script>