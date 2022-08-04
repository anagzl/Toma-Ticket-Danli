<!DOCTYPE html>
<html lang="es" style="scrollbar-width : none; overflow:hidden;">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="">


    <title>Visualización de Tickets</title>
		<!-- Favicon   -->
        
		<link rel="icon" type="image/png" sizes="32x32" href="../../img/logoInstitucion/logo_sin_letras.png">
		<!-- Responsible  -->
        <link href="../../assets/bootstrap-5.1.3-dist/css/bootstrap.min.css" rel="stylesheet" id="bootstrap5-css">
        <script src="../../assets/desingLogin2/jquery-1.11.1.min.js"></script>
	    <script src="../../assets/bootstrap-5.1.3-dist/js/bootstrap.min.js"></script> 
        <script src="../../assets/sweetalert2/dist/sweetalert2.all.min.js"></script>
		<!-- Login  -->
		<!-- <link href="../../assets/desingLogin2/login.css" rel="stylesheet" id="bootstrap-css"> -->
		<!-- <script src="../../assets/desingLogin2/login.js"></script> -->
		<!-- <link href="../../assets/desingLogin2/reloj.css" rel="stylesheet"> -->
		<!-- <script src="../../assets/desingLogin2/reloj.js"></script> -->
		<!-- Icons bootstrap -->
		<link rel="stylesheet" href="../../assets/bootstrap-icons-1.8.1/bootstrap-icons.css"> 
        <!-- Valores globales scss -->
        <link rel="stylesheet" href="../../assets/global.scss"> 

</head>

<body>
    <div class="container-fluid"> <!-- Container start -->
        <div class="row align-middle">
            <div class="col text-center" style="background:#88CFE0;">
                <img class="img-fluid mb-2 mt-1 w-25"  src="../../img/logoInstitucion/LOGO IP 3-03.png" alt="...">
            </div>
        </div>
        <div class="row panel-body">
            <div class="col-md-4">
                <div class="row text-center">
                    <div class="col-md-12">
                        <p></p>
                        <!-- <p style="color:black; font-size:350%; margin:0"><strong>Historial de Tickets</strong> </p> -->
                        <div class="table-responsive">
                            <table id="tablaTickets" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="color:white; background:#88CFE1; text-align:center; font-size:125%;"><i class="bi bi-ticket-perforated"></i> TICKET</th>
                                        <th style="color:white; background:#88CFE1; text-align:center; font-size:125%;"><i class="bi bi-shop-window"></i> VENTANILLA</th>
                                    </tr>
                                </thead>
                                <tbody id="bodyTablaTicketsLlamados">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div  id="carruselDiv" class="col-md-8">
                <div id="mediaCarousel" class="carousel slide" data-ride="carousel" data-bs-interval="false">
                    <div class="carousel-inner">
                    <?php
                        include("../../config/conexion.php");
                        $query = $conexion->prepare("SELECT
                                                        idMedia,
                                                        ruta,
                                                        activo,
                                                        imagen
                                                    FROM
                                                        mediacarrusel");
                        $query->execute();
                        $data = $query->fetchAll();
                        $i = 0;
                        foreach ($data as $valores):
                            if($valores["activo"] == 1):
                                if($valores["imagen"] == 0):
                                    ?>
                                        <div class="carousel-item <?php echo $i == 0 ? 'active' :  "" ?>">
                                            <video class="d-block img-fluid w-100" style="height:720px;" src="../../files/carruselMedia/<?=$valores["ruta"];?>"  muted autoplay id="video">               
                                        </div>
                                    <?php else: ?>
                                        <div class="carousel-item <?php echo $i == 0 ? 'active' :  ""?>">
                                            <img class="d-block img-fluid w-100" style="height:720px;" src="../../files/carruselMedia/<?=$valores["ruta"];?>">
                                        </div>
                                    <?php endif;
                            endif;
                            $i++;
                        endforeach;
                    ?>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer" style="position: fixed;
                                            left: 0;
                                            bottom: 0;
                                            width: 100%;
                                            background-color: #88CFE1;
                                            text-align: center;">
            <div class="row text-center">
                <div class="col-sm-1 col-lg-1 align-items-center d-flex">
                    <img class="img-fluid mt-1" src="../../img/logoInstitucion/logo_sin_letras.png" width="50%;" height="85%;">  
                </div>
                <div class="col-sm-11 col-lg-11">
                    <div id="carouselTexto">
                        <!-- <div class="carousel-inner"> -->
                            <div class="wrapper">
                                <div class="marquee align-items-center d-flex">
                                    <p style="color:white; font-size:30px;">
                                    <?php
                                    include("../../config/conexion.php");
                                    $query = $conexion->prepare("SELECT
                                                                    idMensajesCarrusel,
                                                                    mensaje,
                                                                    activo
                                                                FROM
                                                                    mensajescarrusel;");
                                    $query->execute();
                                    $data = $query->fetchAll();
                                    $texto = "";
                                    foreach ($data as $valores):
                                        if($valores["activo"] == 1):
                                            echo $valores["mensaje"] . str_repeat('&nbsp;', 80); ;
                                            $texto .= $valores["mensaje"] . str_repeat('&nbsp;', 80); ;
                                        endif;
                                    endforeach;
                                    ?>
                                    </p>
                                    <p style="color:white; font-size:30px;">
                                        <?php echo $texto;?>
                                    </p>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </footer>
    </div><!-- Container end -->        	
<!-- </div> -->


</body>
</html>
<script type="text/javascript" src="../../controllers/visualizar_tickets_controller.js"></script>
<script>
    // controles para el carrusel de imagenes y video
var carrusel = document.getElementById('mediaCarousel');

verificar_tipo_media();

//verificar el tipo de media, si es imagen se mostrara por 10 segundos
// si es video se mostrara por hasta que termine el video
function verificar_tipo_media(){
    var elementoActivo = document.querySelector("div.carousel-item.active");    //elemento que se muestra en el carrusel actualmente
    if(elementoActivo.children[0].id == "video"){   // id de video para los elementos que sean videos
        elementoActivo.children[0].play();
    }else{
        // cambiar imagen luego de 10 segundos
        setTimeout(function(){
            $("#mediaCarousel").carousel('next');
        },10000);
    }
}

//evento de cambio de slide
carrusel.addEventListener('slid.bs.carousel',function(e){
    verificar_tipo_media();
});

//todos los videos en media
var videos = document.querySelectorAll("video.d-block");

// evento que indica cuando termina el video para poder pasar a la siguiente diapositiva
videos.forEach(function(e) {
    e.addEventListener('ended', myHandler, false);
}); 

function myHandler(e) {
    $("#mediaCarousel").carousel('next');
}
</script>

