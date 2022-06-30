<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistema de Personal</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="../../img/logoInstitucion/logo_sin_letras.png">

    <!-- Custom fonts for this template-->
<!--     <link href="../../css/all.min.css" rel="stylesheet" type="text/css"> -->
    <link href="../../assets/fontawesome-free-6.0.0-web/css/all.css" rel="stylesheet" type="text/css"> 


    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../assets/css/sb-admin-2.css" rel="stylesheet">

    <!-- Importacion de boostraps-->
    <link href="../../assets/bootstrap-5.1.3-dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Data tables  -->
    <link  rel="stylesheet" href="../../assets/datatables/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

    <!-- Icons bootstrap -->
    <link rel="stylesheet" href="../../assets/bootstrap-icons-1.8.1/bootstrap-icons.css"> 

    <style type="text/css">
            #cuadro{
            width: 150%;
            height: 600px;
            }
    </style>

</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="tablero.php">
                <div class="sidebar-brand-icon ">
                    <img alt="Logo IP" width="40" height="35" src="../../img/desing/asistencia1.png">
                </div>
                <div class="sidebar-brand-text mx-3">Control de Personal</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="tablero.php">
                    <i class="bi bi-speedometer2"></i>
                    <span><strong>Tablero</strong></span></a>
            </li>
                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Rol administrador 
                </div>

<!-- Nav Item - Configuracion Collapse Menu Configuracion -->
                <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities2"
                    aria-expanded="true" aria-controls="collapseUtilities2">
                    <i class="bi bi-award-fill"></i>
                    <span> <strong> Nivel de admin</strong> </span>
                </a>
                <div id="collapseUtilities2" class="collapse" aria-labelledby="headingUtilities2"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Configuraciones Globales </h6>
                        <a class="collapse-item" href="ver_asistencia.php"><i class="bi bi-hourglass-split"></i> Asistencia</a>
                        <a class="collapse-item" href="ver_usuarios.php"><i class="bi bi-person-square"></i> Usuario</a>
                        <a class="collapse-item" href="ver_direccion_unidad.php"><i class="bi bi-hospital-fill"></i> Direccion / Unidad</a> 
                        <a class="collapse-item" href="ver_estado.php"><i class="bi bi-flag-fill"></i> Estado</a>
                        <a class="collapse-item" href="ver_permisodeaccesoalsistema.php"><i class="bi bi-plus-slash-minus"></i> Permiso de acceso </a>
                        <a class="collapse-item" href="ver_roles.php"><i class="bi bi-sunglasses"></i> Roles</a>
                        <a class="collapse-item" href="ver_tipodeasistencia.php"><i class="bi bi-file-earmark-person-fill"></i> Tipo de asistencia</a>
                        <a class="collapse-item" href="ver_tipopermiso.php"><i class="bi bi-shield-shaded"></i> Tipo Permisos</a>
                        <a class="collapse-item" href="ver_tipo_usuarios.php"><i class="bi bi-people-fill"></i> Tipo Usuario</a>
                        
                        <a class="collapse-item" href="ver_permisos.php"><i class="bi bi-file-earmark-post"></i> Permisos / Solicitudes </a>
                        
                        <a class="collapse-item" href="ver_centro_ubicacion.php"><i class="bi bi-pin-map-fill"></i>Centro De Ubicacion </a>
                        <a class="collapse-item" href="ver_genero.php"><i class="bi bi-gender-ambiguous"></i> Genero </a>
                        <a class="collapse-item" href="ver_enfermedades_cronicas.php"><i class="bi bi-question-square"></i> Enfermedades Cronicas</a>
                        <a class="collapse-item" href="ver_enlacerrhh.php"><i class="bi bi-person-badge"></i> Enlace RRHH </a>
                        <a class="collapse-item" href="ver_gruposanguineo.php"><i class="bi bi-droplet-half"></i> Grupo Sanguineo</a>
                        <a class="collapse-item" href="ver_tipo_empleado_control_hora.php"><i class="bi bi-watch"></i> Tipo Empleado Control <br/> Horas </a>
                        <a class="collapse-item" href="ver_tipopermisoespecial.php"><i class="bi bi-journal"></i> Tipo Permiso Especial  </a>
                        <a class="collapse-item" href="ver_tablatemporalhorasdelmes.php"><i class="bi bi-stopwatch-fill"></i> Tabla Bitácora minutos <br/> Del Mes </a>
                        <a class="collapse-item" href="ver_voucher.php"><i class="bi bi-credit-card-2-back-fill"></i> Voucher   </a>
                        <a class="collapse-item" href="ver_bitacora_contacto.php"><i class="bi bi-person-lines-fill"></i> Bitacora Contactos</a>
<!--                         <a class="collapse-item" href="#"><i class="bi bi-file-earmark-pdf-fill"></i>  Voucher</a> -->
                    </div>
                </div>
            </li>


            
            <!-- Divider -->
            <hr class="sidebar-divider">
            
            <!-- Heading -->
            <div class="sidebar-heading">
                Gestiones
            </div>
            
            <!-- Nav Item - Configuracion Collapse Menu Configuracion -->
            <li class="nav-item">
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities3"
                                aria-expanded="true" aria-controls="collapseUtilities3">
                                <i class="bi bi-person-circle"></i>
                                <span><strong> Nivel de RRHH </strong></span>
                            </a>
                            <div id="collapseUtilities3" class="collapse" aria-labelledby="headingUtilities3"
                                data-parent="#accordionSidebar">
                                <div class="bg-white py-2 collapse-inner rounded">
                                    <h6 class="collapse-header">Herramienta de monitoreo</h6>
<!--                                     <a class="collapse-item" href="ver_gestion_horas.php"><i class="bi bi-hourglass-split"></i> Control de horas </a>
                                    <a class="collapse-item" href="ver_gestion_permisos.php"><i class="bi bi-file-earmark-post"></i> Gestión de permisos</a>
                                    <a class="collapse-item" href="ver_gestion_reportes.php"><i class="bi bi-graph-down"></i> Gestión de reportes </a> -->
                                    <!-- <a class="collapse-item" href="#"><i class="bi bi-file-earmark-pdf-fill"></i> Gestión  de voucher</a> -->
                                    <a class="collapse-item" href="ver_gestion_usuarios.php"><i class="bi bi-person-square"></i> Gestión De Usuario</a>
                                    <a class="collapse-item" href="ver_asistencia.php"><i class="bi bi-hourglass-split"></i>  Bitácora De Asistencia</a>
                                    <a class="collapse-item" href="ver_jornada_laboral.php"><i class="bi bi-calendar-week-fill"></i>  Bitácora Hora Laboral </a>
<!--                                     <a class="collapse-item" href="#"> Control Vacaciones </a> -->
                                    <a class="collapse-item" href="ver_permisos.php"><i class="bi bi-file-earmark-post"></i>  Bitácora De Permiso </a>
                                    <a class="collapse-item" href="ver_minutos_de_gracia.php"><i class="bi bi-clock-history"></i>  Bitácora Minutos De <br/> Gracia </a>

                                </div>
                            </div>
                        </li>
            <!-- Nav Item - FAQs -->
            <li class="nav-item">
                <a class="nav-link" href="ver_faqs.php">
                    <i class="fas fa-fw fa-info-circle"></i>
                    <span><strong> FAQs </strong></span></a>
            </li>

            <!-- Nav Item - Contacto -->
            <li class="nav-item">
                <a class="nav-link" href="ver_contacto.php">
                    <i class="fas fa-fw fa-headset"></i>
                    <span><strong> Contacto </strong></span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

<!--            Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div> 

            <!-- Sidebar Message - Cuadrado de tono mas oscuro con el logo IP + nombre del sistema -->
                <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="../../img/logoInstitucion/logo_sin_letras.png" width="40" height="20"  alt="...">
                <p class="text-center mb-2"><strong>Control de Personal</strong></p>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
<!--                     <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."*/
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form> -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

<?php

include("../../config/conexion_db.php");

                    $query = "SELECT
                    e.idEmpleado,
                    e.Usuario_idUsuario,
                    e.Ventanilla_idVentanilla,
                    e.Rol_idRol,
                    e.correoInstitucional,
                    e.login,
                    u.primerNombre,
                    u.segundoNombre,
                    u.primerApellido,
                    u.segundoApellido
                FROM
                    empleado AS e
                INNER JOIN Usuario AS u
                ON u.idUsuario = e.idEmpleado
                WHERE e.login ='". $_SESSION["userlogin"] ."';";

                                if ($result = $conexionMysqli->query($query)) {
                                    /* fetch associative array */
                                    while ($row = $result->fetch_assoc()) {
                                        $id_numero_identidad = $row["idEmpleado"];
                                        $nombres = $row["primerNombre"] ;
                                        $apellidos = $row["primerApellido"];
                                        $loginUsuario = $row["login"];
                                        $imagen = "../../img/profile_user/user.png";
                                        /* $imagen = $row["imagen"];
                                         */
                                    }

                                    /* free result set */
                                    $result->free();
                                }

                                echo '                        <!-- Nav Item - User Information -->
                                <li class="nav-item dropdown no-arrow">
                                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img class="img-profile rounded-circle" src="../../files/profile_user/'.$imagen.'">
                                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"> &nbsp;
                                        '.$nombres.' '.$apellidos.'
                                    </span>
                                    </a>

                                        ';
                                ?>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
<!--                                 <a class="dropdown-item" href="#">
                                <i class="bi bi-person-circle"></i>
                                    Perfil
                                </a>
                                <a class="dropdown-item" href="../user/registrar_asistencia.php">
                                <i class="bi bi-stopwatch-fill"></i>
                                    Realizar su marcado de asitencia
                                </a> -->
<!--                                 <a class="dropdown-item" href="#">
                                    <i class="bi bi-key-fill"></i>
                                    Cambiar contraseña 
                                </a> -->
                                <!-- <div class="dropdown-divider"></div> -->
                                <a class="dropdown-item" href="../../config/salir.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="bi bi-box-arrow-left"></i>
                                    Cerrar Sesión
                                </a>
                            </div>
                        </li>

                    </ul>
                </nav>
                <!-- End of Topbar -->