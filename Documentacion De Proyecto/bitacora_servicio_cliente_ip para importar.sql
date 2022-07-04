-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-07-2022 a las 20:44:30
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bitacora_servicio_cliente_ip`
--
CREATE DATABASE IF NOT EXISTS `bitacora_servicio_cliente_ip` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bitacora_servicio_cliente_ip`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `idBitacora` int(11) NOT NULL,
  `Sede_idSede` int(11) NOT NULL,
  `Usuario_idUsuario` varchar(15) NOT NULL,
  `Tramite_idTramite` int(11) NOT NULL,
  `Direccion_idDireccion` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `horaGeneracionTicket` time DEFAULT NULL,
  `horaEntrada` time DEFAULT NULL,
  `horaSalida` time DEFAULT NULL,
  `Observacion` varchar(1000) DEFAULT NULL,
  `numeroTicket` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colageneral`
--

CREATE TABLE `colageneral` (
  `idColaGeneral` int(11) NOT NULL,
  `TicketRegistroInmueble_idTicketRegistroInmueble` int(11) DEFAULT NULL,
  `TicketPropiedadIntelectual_idTicketPropiedadIntelectual` int(11) DEFAULT NULL,
  `TicketCatastro_idTicketCatastro` int(11) DEFAULT NULL,
  `TicketPredial_idTicketPredial` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `idDepartamento` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`idDepartamento`, `nombre`) VALUES
(1, 'Francisco Morazán'),
(2, 'Atlántida'),
(3, 'Colón'),
(4, 'Choluteca'),
(5, 'Copán'),
(6, 'Cortes'),
(7, 'El Paraiso'),
(8, 'Gracias a Dios'),
(9, 'Intibuca'),
(10, 'Islas de la Bahía'),
(11, 'La Paz'),
(12, 'Lempira'),
(13, 'Ocotepeque'),
(14, 'Olancho'),
(15, ' Santa Barbara'),
(16, 'Yoro'),
(17, 'Valle'),
(18, 'Comayagua');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diaslaborales`
--

CREATE TABLE `diaslaborales` (
  `idDiasLaborales` int(11) NOT NULL,
  `descripcionDias` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

CREATE TABLE `direccion` (
  `idDireccion` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `siglas` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `direccion`
--

INSERT INTO `direccion` (`idDireccion`, `nombre`, `siglas`) VALUES
(1, 'Catastro', 'C'),
(2, 'Regularización Predial', 'RP'),
(3, 'Propiedad Intelectual', 'PI'),
(4, 'Registro Inmueble', 'RI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `idEmpleado` int(11) NOT NULL,
  `Usuario_idUsuario` varchar(15) NOT NULL,
  `Rol_idRol` int(11) NOT NULL,
  `correoInstitucional` varchar(45) DEFAULT NULL,
  `login` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`idEmpleado`, `Usuario_idUsuario`, `Rol_idRol`, `correoInstitucional`, `login`) VALUES
(0, '1', 2, 'reyna.izaguirre@ip.gob.hn', 'reyna.izaguirre'),
(1, '0801198811055', 2, 'maemi.pineda@ip.gob.hn', 'maemi.pineda'),
(2, '0801198709875', 2, 'patsy.martinez@ip.gob.hn', 'patsy.martinez 	'),
(3, '0801198519581', 2, 'josselenth.palma@ip.gob.hn', 'josselenth.palma'),
(4, '0801198413760', 2, 'claudia.valeriano@ip.gob.hn', 'claudia.valeriano'),
(5, '0818197800031', 2, 'dania.Alvarado@ip.gob.hn', 'Dania.Alvarado'),
(6, '0801196808329', 2, 'jose.rojas@ip.gob.hn', 'jose.rojas'),
(7, '0801198211439', 2, 'kennsy.navas@ip.gob.hn', 'kennsy.navas'),
(8, '0307198700049', 2, 'josselin.rivera@ip.gob.hn', 'josselin.rivera'),
(9, '1', 2, 'wendy.montoya@ip.gob.hn', 'wendy.montoya'),
(10, '1', 2, 'allison.sauceda@ip.gob.hn', 'allison.sauceda'),
(11, '2', 2, 'jaime.vasquez@ip.gob.hn', 'jaime.vasquez'),
(12, '1', 2, 'nanci.rivera@ip.gob.hn', 'nanci.rivera'),
(13, '1', 2, 'reyna.izaguirre@ip.gob.hn', 'reyna.izaguirre'),
(14, '1', 2, 'daysi.ferrufino@ip.gob.hn', 'daysi.ferrufino@ip.gob.hn'),
(15, '1', 2, 'ruth.lopez@ip.gob.hn', 'ruth.lopez'),
(16, '2', 2, 'ossana.palacios@ip.gob.hn', 'ossana.palacios'),
(17, '1', 2, 'ada.ochoa@ip.gob.hn', 'ada.ochoa'),
(18, '1', 2, 'lourdes.salinas@ip.gob.hn', 'lourdes.salinas'),
(19, '2', 2, 'erick.barahona@ip.gob.hn', 'erick.barahona'),
(20, '1', 2, NULL, NULL),
(21, '2', 2, NULL, NULL),
(22, '2', 2, NULL, NULL),
(23, '1', 2, NULL, NULL),
(24, '3', 2, NULL, NULL),
(25, '0801200120793', 2, 'jonathan.laux@hotmail.com', 'jonathan.laux'),
(26, '0814199300573', 2, 'anag.zavala@ip.gob.hn', 'anag.zavala'),
(27, '111', 1, 'tecnico@ip.gob.hn', 'tecnico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `idGenero` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `siglas` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`idGenero`, `nombre`, `siglas`) VALUES
(1, 'Femenino', 'F'),
(2, 'Masculino', 'M');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `institucion`
--

CREATE TABLE `institucion` (
  `idInstituciones` int(11) NOT NULL,
  `nombreInstitucion` varchar(45) DEFAULT NULL,
  `siglas` varchar(45) DEFAULT NULL,
  `TipoInstitucion_idTipoInstitucion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `institucion`
--

INSERT INTO `institucion` (`idInstituciones`, `nombreInstitucion`, `siglas`, `TipoInstitucion_idTipoInstitucion`) VALUES
(1, 'Instituto de la propiedad', 'IP', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jornadalaboral`
--

CREATE TABLE `jornadalaboral` (
  `idJornadaLaboral` int(11) NOT NULL,
  `Ventanilla_idVentanilla` int(11) NOT NULL,
  `TipoJornadaLaboral_idTipoJornadaLaboral` int(11) NOT NULL,
  `obs` varchar(1000) DEFAULT NULL,
  `horasFueraVentanilla` int(11) DEFAULT NULL,
  `minutosFueraVentanilla` int(11) DEFAULT NULL,
  `segundosFueraVentanilla` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `Empleado_idEmpleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `jornadalaboral`
--

INSERT INTO `jornadalaboral` (`idJornadaLaboral`, `Ventanilla_idVentanilla`, `TipoJornadaLaboral_idTipoJornadaLaboral`, `obs`, `horasFueraVentanilla`, `minutosFueraVentanilla`, `segundosFueraVentanilla`, `fecha`, `Empleado_idEmpleado`) VALUES
(1, 18, 1, NULL, NULL, NULL, NULL, '2022-07-04', 25),
(2, 20, 1, NULL, NULL, NULL, NULL, '2022-07-04', 26);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE `municipio` (
  `idMunicipio` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `Departamento_idDepartamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`idMunicipio`, `nombre`, `Departamento_idDepartamento`) VALUES
(1, 'Distrito Central', 1),
(2, 'Marale', 1),
(3, 'El Porvenir', 1),
(4, 'Orica', 1),
(5, 'Vallecillo', 1),
(6, 'Cedros', 1),
(7, 'Guaimaca', 1),
(8, 'Talanga', 1),
(9, 'San Ignacio', 1),
(10, 'Santa Lucía', 1),
(11, 'Valle de Angeles', 1),
(12, 'Villa de San Francisco', 1),
(13, 'San Antonio de Oriente', 1),
(14, 'Tatumbla', 1),
(15, 'Lepaterique', 1),
(16, 'Ojojona', 1),
(17, 'Santa Ana', 1),
(18, 'San Buenaventura', 1),
(19, 'Maraita', 1),
(20, 'Curaren', 1),
(21, 'Reitoca', 1),
(22, 'Sabanagrande', 1),
(23, 'Nueva Armenia', 1),
(24, 'La Venta', 1),
(25, 'Alubarén', 1),
(26, 'San Miguelito', 1),
(27, 'La Libertad', 1),
(28, 'Arizona', 2),
(29, 'El Porvenir', 2),
(30, 'Esparta', 2),
(31, 'Jutiapa', 2),
(32, 'La Ceiba', 2),
(33, 'Masica', 2),
(34, 'San Francisco', 2),
(35, 'Las Lagunas', 2),
(36, 'Tela', 2),
(37, 'Trujillo', 3),
(38, 'Balfate', 3),
(39, 'Oriona', 3),
(40, 'Limón', 3),
(41, 'Sabá', 3),
(42, 'Santa Rosa de Aguán', 3),
(43, 'Sonaguera', 3),
(44, 'Tocoa', 3),
(45, 'Bonito Oriental', 3),
(46, 'Santa fe', 3),
(47, 'Choluteca', 4),
(48, 'Apacilagua', 4),
(49, 'Concepción de María', 4),
(50, 'Duyure', 4),
(51, 'El Corpus', 4),
(52, 'El Triunfo', 4),
(53, 'Marcovia', 4),
(54, 'Morolica', 4),
(55, 'Namasigüe', 4),
(56, 'Orocuina', 4),
(57, 'Pespire', 4),
(58, 'San Antonio de Flores', 4),
(59, 'San Isidro', 4),
(60, 'San José', 4),
(61, 'San Marcos de Colón', 4),
(62, 'Santa Ana de Yusguare', 4),
(63, 'Cabañas', 5),
(64, 'Copán Ruinas', 5),
(65, 'Corquín', 5),
(66, 'Cocuyugua', 5),
(67, 'Dolores', 5),
(68, 'Dulce Nombre ', 5),
(69, 'El Paraíso ', 5),
(70, 'Florida', 5),
(71, 'La Jigua', 5),
(72, 'Unión', 5),
(73, 'Nueva Arcadia', 5),
(74, 'San Agustín', 5),
(75, 'San Antonio', 5),
(76, 'San Jerónimo', 5),
(77, 'San José ', 5),
(78, ' San Juan de Opoa', 5),
(79, 'San Nicolás', 5),
(80, 'San Pedro', 5),
(81, 'Santa Rita ', 5),
(82, 'Trinidad', 5),
(83, 'Veracruz ', 5),
(84, 'Santa rosa de Copán', 5),
(85, 'Concepción', 5),
(86, 'San Pedro Sula', 6),
(87, 'Choloma', 6),
(88, 'Omoa', 6),
(89, 'Pimienta', 6),
(90, 'Potrerillos', 6),
(91, 'Puerto Cortes', 6),
(92, 'San Antonio de Cortés', 6),
(93, 'San Francisco de Yojoa', 6),
(94, 'San Manuel', 6),
(95, 'Santa Cruz de Yojoa', 6),
(96, 'Villanueva', 6),
(97, 'La Lima', 6),
(98, 'Yuscarán', 7),
(99, 'Alauca', 7),
(100, 'Danli', 7),
(101, 'El Paraíso', 7),
(102, 'Güinope', 7),
(103, 'Jacalepa', 7),
(104, 'Liure', 7),
(105, 'Morocelí', 7),
(106, 'Oropopí', 7),
(107, 'Potrerillos', 7),
(108, 'San Antonio de Flores', 7),
(109, 'San Lucas', 7),
(110, 'San Matías', 7),
(111, 'Soledad', 7),
(112, 'Teupasenti', 7),
(113, 'Texiguat', 7),
(114, 'Trojes', 7),
(115, 'Vado Ancho', 7),
(116, 'Yauyupe', 7),
(117, 'Puerto Lempira', 8),
(118, 'Brus Laguna', 8),
(119, 'Ahuas', 8),
(120, 'Villeda Morales', 8),
(121, 'La Esperanza o El Cacao', 8),
(122, 'Wampusirpe', 8),
(123, 'La Esperanza', 9),
(124, 'Camasca', 9),
(125, 'Colomoncagua', 9),
(126, 'Concepción', 9),
(127, 'Dolores', 9),
(128, 'Intibucá', 9),
(129, 'Jesus de Otoro', 9),
(130, 'Magdalena', 9),
(131, 'Masaguara', 9),
(132, 'San Antonio', 9),
(133, 'San Isidro', 9),
(134, 'San Juan de Flores', 1),
(135, 'San Marcos de la Sierra', 9),
(136, 'San Miguel Guancapla', 9),
(137, 'Santa Lucía', 9),
(138, 'Yamaranguila', 9),
(139, 'San Francisco Opalaca', 9),
(140, 'Roatán', 10),
(141, 'Guanaja', 10),
(142, 'José Santos Guardiola', 10),
(143, 'Utila', 10),
(144, 'La Paz', 11),
(145, 'Aguanqueterique', 11),
(146, 'Cabanas', 11),
(147, 'Cane', 11),
(148, 'Chinaca', 11),
(149, 'Guajiquiro', 11),
(150, 'Lauterique', 11),
(151, 'Marcala', 11),
(152, 'Mercedes de Oriente', 11),
(153, 'Opatoro', 11),
(154, 'San Antonio del Norte', 11),
(155, 'San José', 11),
(156, 'San Juan', 11),
(157, 'San Pedro de Tutule', 11),
(158, 'Santa Ana', 11),
(159, 'Santa Elena', 11),
(160, 'Santa María', 11),
(161, 'Santiago Puringla', 11),
(162, 'Yarula', 11),
(163, 'Gracias', 12),
(164, 'Belén', 12),
(165, 'Candelaria', 12),
(166, 'Cololaca', 12),
(167, 'Erandique', 12),
(168, 'Gualcinse', 12),
(169, 'Guarita', 12),
(170, 'La campa', 12),
(171, 'La iguala', 12),
(172, 'Las flores', 12),
(173, 'La Unión', 12),
(174, 'La Virtud', 12),
(175, 'Lapaera', 12),
(176, 'Mapulaca', 12),
(177, 'Piraera', 12),
(178, 'San Andrés', 12),
(179, 'San Francisco', 12),
(180, 'San Juan Guarita', 12),
(181, 'San Manuel Colohete', 12),
(182, 'San Rafel', 12),
(183, 'San Sebastian', 12),
(184, 'Santa Cruz', 12),
(185, 'Talgua', 12),
(186, 'Tambla', 12),
(187, 'Tomala', 12),
(188, 'Valladolid', 12),
(189, 'Virginia', 12),
(190, 'San Marcos de Caiquín', 12),
(191, 'Ocotepeque', 13),
(192, 'Belén Gualcho', 13),
(193, 'Concepción', 13),
(194, 'Dolores Merendón', 13),
(195, 'Fraternidad', 13),
(196, 'La Encarnación', 13),
(197, 'La Labor', 13),
(198, 'Lucema', 13),
(199, 'Mercedes', 13),
(200, 'San Fernando', 13),
(201, 'San Francisco del Valle', 13),
(202, 'San Jorge', 13),
(203, 'San Marcos', 13),
(204, 'Santa Fe', 13),
(205, 'Sensenti', 13),
(206, 'Sinuapa', 13),
(207, 'Juticalpa', 14),
(208, 'Campamento', 14),
(209, 'Catacamas', 14),
(210, 'Concordia', 14),
(211, 'Dulce nombre de culmi', 14),
(212, 'El Rosario', 14),
(213, 'Esquipulas del norte', 14),
(214, 'Gualaco', 14),
(215, 'Guarizama', 14),
(216, 'Guata', 14),
(217, 'Guayape', 14),
(218, 'Jano', 14),
(219, 'La Unión', 14),
(220, 'Mangulile', 14),
(221, 'Manto', 14),
(222, 'Salamá', 14),
(223, 'San Esteban', 14),
(224, 'San francisco de becerra', 14),
(225, 'San francisco de la paz', 14),
(226, 'Santa María del real', 14),
(227, 'Silca', 14),
(228, 'Yocón ', 14),
(229, 'Froylan Turcios ', 14),
(230, 'Santa Barbara', 15),
(231, 'Chinda', 15),
(232, 'Ilama', 15),
(233, 'Gualala', 15),
(234, 'Ceguaca', 15),
(235, 'San Francisco de Ojuera', 15),
(236, 'Concepción del Sur', 15),
(237, 'San Pedro de Zacapa', 15),
(238, 'Arada', 15),
(239, 'Santa Rita', 15),
(240, 'El Níspero', 15),
(241, 'San Nicolás', 15),
(242, 'Atima', 15),
(243, 'San Vicente Centenario', 15),
(244, 'Trinidad', 15),
(245, 'Concepción del Norte', 15),
(246, 'Nuevo Celilac', 15),
(247, 'Petoa', 15),
(248, 'Azacualpa', 15),
(249, 'San Luis', 15),
(250, 'San Marcos', 15),
(251, 'Quimistán', 15),
(252, 'Naranjito', 15),
(253, 'Protección', 15),
(254, 'Macuelizo', 15),
(255, 'Las Vegas', 15),
(256, 'Nueva Frontera', 15),
(257, 'San José de Colinas', 15),
(258, 'Yoro', 16),
(259, 'Arenal', 16),
(260, 'El Negrito', 16),
(261, 'El Progreso', 16),
(262, 'Jocón', 16),
(263, 'Morazán', 16),
(264, 'Olanchito', 16),
(265, 'Santa Rita', 16),
(266, 'Sulaco', 16),
(267, 'Victoria', 16),
(268, 'Yorito', 16),
(269, 'Nacaome', 17),
(270, 'Alianza', 17),
(271, 'Amapala', 17),
(272, 'Aramecina', 17),
(273, 'Caridad', 17),
(274, 'Goascoran', 17),
(275, 'Langue', 17),
(276, 'San Francisco de Coray', 17),
(277, 'San Lorenzo', 17),
(278, 'Comayagua', 18),
(279, 'Ajuterique', 18),
(280, 'El Rosario', 18),
(281, 'Esquias', 18),
(282, 'Humuya', 18),
(283, 'La Libertad', 18),
(284, 'Lamani', 18),
(285, 'La Trinidad', 18),
(286, 'Lejamani', 18),
(287, 'Meambar', 18),
(288, 'Minas de Oro', 18),
(289, 'Ojos de Agua', 18),
(290, 'San Jerónimo', 18),
(291, 'San José Comayagua', 18),
(292, 'San José del Potrero', 18),
(293, 'San Luis', 18),
(294, 'Siguatepeque', 18),
(295, 'Villa de San Antonio', 18),
(296, 'Las Lajas', 18),
(297, 'Taulabe', 18),
(298, 'San Sebastián', 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` int(11) NOT NULL,
  `nombreRol` varchar(45) DEFAULT NULL,
  `descripcionRol` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `nombreRol`, `descripcionRol`) VALUES
(1, 'Administrador', 'El administrador tiene acceso a todas las funciones del sistema, puede crear turnos, crear y deshabilitar usuarios, crear y deshabilitar ventanillas.'),
(2, 'Ventanilla', 'El usuario de ventanilla unicamente podra llamar y atender tickets.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede`
--

CREATE TABLE `sede` (
  `idSede` int(11) NOT NULL,
  `nombreLocalidad` varchar(45) DEFAULT NULL,
  `siglas` varchar(45) DEFAULT NULL,
  `Municipio_idMunicipio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sede`
--

INSERT INTO `sede` (`idSede`, `nombreLocalidad`, `siglas`, `Municipio_idMunicipio`) VALUES
(1, 'Centro Civico Gubernamental', 'CCG', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticketcatastro`
--

CREATE TABLE `ticketcatastro` (
  `idTicketCatastro` int(11) NOT NULL,
  `Bitacora_idBitacora` int(11) NOT NULL,
  `Bitacora_Sede_idSede` int(11) NOT NULL,
  `Empleado_idEmpleado` int(11) DEFAULT NULL,
  `disponibilidad` tinyint(1) DEFAULT NULL,
  `preferencia` tinyint(1) DEFAULT NULL,
  `vecesLlamado` int(11) DEFAULT 0,
  `marcarRellamado` tinyint(1) DEFAULT NULL,
  `sigla` varchar(5) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `llamando` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticketpredial`
--

CREATE TABLE `ticketpredial` (
  `idTicketPredial` int(11) NOT NULL,
  `Bitacora_idBitacora` int(11) NOT NULL,
  `Bitacora_Sede_idSede` int(11) NOT NULL,
  `Empleado_idEmpleado` int(11) DEFAULT NULL,
  `disponibilidad` tinyint(1) DEFAULT NULL,
  `preferencia` tinyint(1) DEFAULT NULL,
  `vecesLlamado` int(11) DEFAULT NULL,
  `marcarRellamado` tinyint(1) DEFAULT NULL,
  `sigla` varchar(5) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `llamando` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticketpropiedadintelectual`
--

CREATE TABLE `ticketpropiedadintelectual` (
  `idTicketPropiedadIntelectual` int(11) NOT NULL,
  `Bitacora_idBitacora` int(11) NOT NULL,
  `Bitacora_Sede_idSede` int(11) NOT NULL,
  `Empleado_idEmpleado` int(11) DEFAULT NULL,
  `disponibilidad` tinyint(1) DEFAULT NULL,
  `preferencia` tinyint(1) DEFAULT NULL,
  `vecesLlamado` int(11) DEFAULT NULL,
  `marcarRellamado` tinyint(1) DEFAULT NULL,
  `sigla` varchar(5) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `llamando` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticketregistroinmueble`
--

CREATE TABLE `ticketregistroinmueble` (
  `idTicketRegistroInmueble` int(11) NOT NULL,
  `Bitacora_idBitacora` int(11) NOT NULL,
  `Bitacora_Sede_idSede` int(11) NOT NULL,
  `Empleado_idEmpleado` int(11) DEFAULT NULL,
  `disponibilidad` tinyint(1) DEFAULT NULL,
  `preferencia` tinyint(1) DEFAULT NULL,
  `vecesLlamado` int(11) DEFAULT NULL,
  `marcarRellamado` tinyint(1) DEFAULT NULL,
  `sigla` varchar(5) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `llamando` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoinstitucion`
--

CREATE TABLE `tipoinstitucion` (
  `idTipoInstitucion` int(11) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipoinstitucion`
--

INSERT INTO `tipoinstitucion` (`idTipoInstitucion`, `nombre`) VALUES
(1, 'Privada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipojornadalaboral`
--

CREATE TABLE `tipojornadalaboral` (
  `idTipoJornadaLaboral` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `horaInicio` time DEFAULT NULL,
  `horaSalida` time DEFAULT NULL,
  `DiasLaborales_idDiasLaborales` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipojornadalaboral`
--

INSERT INTO `tipojornadalaboral` (`idTipoJornadaLaboral`, `descripcion`, `horaInicio`, `horaSalida`, `DiasLaborales_idDiasLaborales`) VALUES
(1, 'Jornada vespertina', '07:30:00', '16:00:00', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE `tipousuario` (
  `idTipoUsuario` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`idTipoUsuario`, `nombre`) VALUES
(1, 'Persona Natural'),
(2, 'Persona Jurídica'),
(3, 'Abogado Independiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tramite`
--

CREATE TABLE `tramite` (
  `idTramite` int(11) NOT NULL,
  `Direccion_idDireccion` int(11) NOT NULL,
  `nombreTramite` varchar(100) DEFAULT NULL,
  `descripcionTramite` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tramite`
--

INSERT INTO `tramite` (`idTramite`, `Direccion_idDireccion`, `nombreTramite`, `descripcionTramite`) VALUES
(1, 1, 'Apertura de Solicitud', ''),
(2, 1, 'Retiro de Constancia', ''),
(3, 1, 'Seguimiento de Expedientes ', ''),
(4, 1, 'Entrega de Expedientes ', ''),
(5, 2, 'Entrega de Títulos de Propiedad', ''),
(6, 2, 'Levantamiento de Expedientes por Expropiacion', ''),
(7, 2, 'Solicitud de Constancia', ''),
(8, 2, 'Presentar Escrito', ''),
(9, 2, 'Préstamo de Expedientes ', ''),
(10, 2, 'Solicitudes de Titulos de Propiedad ', ''),
(11, 2, 'Consultas Generales ', ''),
(12, 3, 'Marcas', ''),
(13, 3, 'Busqueda de Antecedentes Registrales ', ''),
(14, 3, 'Derecho de Autor y Firma Electronica', ''),
(15, 3, 'Patente', ''),
(16, 3, 'Escritos Legales ', ''),
(17, 3, 'Archivo', ''),
(18, 4, 'Presentacion Poderes y Sentencias', 'Poderes y Sentencias'),
(19, 4, 'Presentacion Civiles', 'Compraventas,Donaciones,Tradición de Dominios y Documentos Civiles en general'),
(20, 4, 'Retiro', 'Retiro de los documentos y solicitudes'),
(21, 4, 'Solicitudes', 'Integras y Constancias de Libertad de Gravamen.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tramiteshabilitadoventanilla`
--

CREATE TABLE `tramiteshabilitadoventanilla` (
  `idTramitesHabilitadoVentanilla` int(11) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `Ventanilla_idVentanilla` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tramiteshabilitadoventanilla`
--

INSERT INTO `tramiteshabilitadoventanilla` (`idTramitesHabilitadoVentanilla`, `descripcion`, `Ventanilla_idVentanilla`) VALUES
(1, 'Presentacion Poderes y Sentencias', 18),
(2, 'Presentacion Civiles', 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` varchar(15) NOT NULL,
  `primerNombre` varchar(45) DEFAULT NULL,
  `segundoNombre` varchar(45) DEFAULT NULL,
  `primerApellido` varchar(45) DEFAULT NULL,
  `segundoApellido` varchar(45) DEFAULT NULL,
  `numeroCelular` varchar(45) DEFAULT NULL,
  `banderaWhastapp` tinyint(4) DEFAULT NULL,
  `banderaEncuesta` tinyint(4) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `primerNombre`, `segundoNombre`, `primerApellido`, `segundoApellido`, `numeroCelular`, `banderaWhastapp`, `banderaEncuesta`, `correo`) VALUES
('0307198700049', 'Pamela', NULL, 'Rivera', NULL, NULL, NULL, NULL, 'josselin.rivera@ip.gob.hn'),
('0801196808329', 'José ', 'Eli', 'Rojas', 'Diaz', NULL, NULL, NULL, 'jose.rojas@ip.gob.hn'),
('0801197202376', 'Claudia', 'Anabel', 'Valeriano', 'Lopez', NULL, NULL, NULL, 'claudia.valeriano@ip.gob.hn'),
('0801198211439', 'Kennsy ', 'Jessenia', 'Navas', 'Guevara', NULL, NULL, NULL, 'kenssy.navas@ip.gob.hn'),
('0801198413760', 'borrar', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('0801198519581', 'Josselenth', 'Lonnelly', 'Palma', 'Trejo', NULL, NULL, NULL, 'josselenth.palma@ip.gob.hn'),
('0801198709875', 'Patsy', 'Tania', 'Martínez', 'Araica', NULL, NULL, NULL, 'patsy.martinez@ip.gob.hn'),
('0801198811055', 'Maemi', 'Sarahy', 'Pineda', 'Sierra', NULL, NULL, NULL, 'maemi.pineda@ip.gob.hn'),
('0801200120793', 'Jonathan', 'Joel', 'Laux', 'Brizo', '32041675', NULL, NULL, 'jonathan.laux@hotmail.com'),
('0814199300573', 'Ana', 'Gissela', 'Zavala', 'Licona', '99999999', NULL, NULL, 'anag.zavala@ip.gob.hn'),
('0818197800031', 'Dania', 'Esperanza', 'Alvarado', 'Ordoñez', NULL, NULL, NULL, 'dania.alvarado@ip.gob.hn'),
('1', 'Jonathan', 'Joel', 'Laux', 'Brizo', '33333333', 0, 0, 'jonathan.laux@hotmail.com'),
('10', 'Dania', NULL, 'Salgado', NULL, NULL, NULL, NULL, NULL),
('11', 'Marlo', NULL, 'Cruz', NULL, NULL, NULL, NULL, NULL),
('111', 'tecnico', 'tecnico', 'tecnico', 'tecnico', NULL, NULL, NULL, 'tecnico'),
('12', 'Oscar', NULL, 'Funez', NULL, NULL, NULL, NULL, NULL),
('2', 'Wendy', NULL, 'Montoya', NULL, NULL, NULL, NULL, NULL),
('3', 'Saul', NULL, 'Zambrano', NULL, NULL, NULL, NULL, NULL),
('4', 'Carmen', NULL, 'Velasquez', NULL, NULL, NULL, NULL, NULL),
('5', 'Fabiana', NULL, 'Godoy', NULL, NULL, NULL, NULL, NULL),
('6', 'Alma', NULL, 'Herrera', NULL, NULL, NULL, NULL, NULL),
('7', 'Minia', NULL, 'Villela', NULL, NULL, NULL, NULL, 'minia.villela@ip.gob.hn'),
('8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('9', 'Loana', NULL, 'Mondragon', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventanilla`
--

CREATE TABLE `ventanilla` (
  `idVentanilla` int(11) NOT NULL,
  `Direccion_idDireccion` int(11) NOT NULL,
  `numero` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ventanilla`
--

INSERT INTO `ventanilla` (`idVentanilla`, `Direccion_idDireccion`, `numero`) VALUES
(1, 1, '11'),
(2, 1, '12'),
(3, 1, '13'),
(4, 2, '14'),
(5, 2, '15'),
(6, 2, '16'),
(7, 2, '17'),
(8, 2, '18'),
(9, 2, '19'),
(10, 3, '17'),
(11, 3, '18'),
(12, 3, '19'),
(13, 3, '20'),
(14, 3, '21'),
(15, 3, '22'),
(16, 3, '23'),
(17, 3, '24'),
(18, 4, '1'),
(19, 4, '2'),
(20, 4, '3'),
(21, 4, '4'),
(22, 4, '5'),
(23, 4, '6'),
(24, 4, '7'),
(25, 4, '8'),
(26, 4, '9'),
(27, 4, '10');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`idBitacora`,`Sede_idSede`),
  ADD KEY `fk_Bitacora_Usuario_idx` (`Usuario_idUsuario`),
  ADD KEY `fk_Bitacora_Tramite1_idx` (`Tramite_idTramite`),
  ADD KEY `fk_Bitacora_Sede1_idx` (`Sede_idSede`),
  ADD KEY `fk_Bitacora_Direccion1_idx` (`Direccion_idDireccion`);

--
-- Indices de la tabla `colageneral`
--
ALTER TABLE `colageneral`
  ADD PRIMARY KEY (`idColaGeneral`),
  ADD UNIQUE KEY `TicketRegistroInmueble_idTicketRegistroInmueble_UNIQUE` (`TicketRegistroInmueble_idTicketRegistroInmueble`),
  ADD UNIQUE KEY `TicketPropiedadIntelectual_idTicketPropiedadIntelectual_UNIQUE` (`TicketPropiedadIntelectual_idTicketPropiedadIntelectual`),
  ADD UNIQUE KEY `TicketCatastro_idTicketCatastro_UNIQUE` (`TicketCatastro_idTicketCatastro`),
  ADD UNIQUE KEY `TicketPredial_idTicketPredial_UNIQUE` (`TicketPredial_idTicketPredial`),
  ADD KEY `fk_ColaGeneral_TicketRegistroInmueble1_idx` (`TicketRegistroInmueble_idTicketRegistroInmueble`),
  ADD KEY `fk_ColaGeneral_TicketPropiedadIntelectual1_idx` (`TicketPropiedadIntelectual_idTicketPropiedadIntelectual`),
  ADD KEY `fk_ColaGeneral_TicketCatastro1_idx` (`TicketCatastro_idTicketCatastro`),
  ADD KEY `fk_ColaGeneral_TicketPredial1_idx` (`TicketPredial_idTicketPredial`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`idDepartamento`);

--
-- Indices de la tabla `diaslaborales`
--
ALTER TABLE `diaslaborales`
  ADD PRIMARY KEY (`idDiasLaborales`);

--
-- Indices de la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD PRIMARY KEY (`idDireccion`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`idEmpleado`),
  ADD KEY `fk_Empleado_Usuario1_idx` (`Usuario_idUsuario`),
  ADD KEY `fk_Empleado_Rol1_idx` (`Rol_idRol`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`idGenero`);

--
-- Indices de la tabla `institucion`
--
ALTER TABLE `institucion`
  ADD PRIMARY KEY (`idInstituciones`),
  ADD KEY `fk_Instituciones_TipoInstitucion1_idx` (`TipoInstitucion_idTipoInstitucion`);

--
-- Indices de la tabla `jornadalaboral`
--
ALTER TABLE `jornadalaboral`
  ADD PRIMARY KEY (`idJornadaLaboral`),
  ADD KEY `fk_JornadaLaboral_Ventanilla1_idx` (`Ventanilla_idVentanilla`),
  ADD KEY `fk_JornadaLaboral_TipoJornadaLaboral1_idx` (`TipoJornadaLaboral_idTipoJornadaLaboral`),
  ADD KEY `fk_JornadaLaboral_Empleado1_idx` (`Empleado_idEmpleado`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`idMunicipio`),
  ADD KEY `fk_Municipio_Departamento1_idx` (`Departamento_idDepartamento`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `sede`
--
ALTER TABLE `sede`
  ADD PRIMARY KEY (`idSede`),
  ADD KEY `fk_Sede_Municipio1_idx` (`Municipio_idMunicipio`);

--
-- Indices de la tabla `ticketcatastro`
--
ALTER TABLE `ticketcatastro`
  ADD PRIMARY KEY (`idTicketCatastro`),
  ADD UNIQUE KEY `Bitacora_idBitacora_UNIQUE` (`Bitacora_idBitacora`),
  ADD KEY `fk_TicketCatastro_Bitacora1_idx` (`Bitacora_idBitacora`,`Bitacora_Sede_idSede`),
  ADD KEY `fk_TicketCatastro_Empleado1_idx` (`Empleado_idEmpleado`);

--
-- Indices de la tabla `ticketpredial`
--
ALTER TABLE `ticketpredial`
  ADD PRIMARY KEY (`idTicketPredial`),
  ADD KEY `fk_TicketPredial_Bitacora1_idx` (`Bitacora_idBitacora`,`Bitacora_Sede_idSede`),
  ADD KEY `fk_TicketPredial_Empleado1_idx` (`Empleado_idEmpleado`);

--
-- Indices de la tabla `ticketpropiedadintelectual`
--
ALTER TABLE `ticketpropiedadintelectual`
  ADD PRIMARY KEY (`idTicketPropiedadIntelectual`),
  ADD KEY `fk_TicketPropiedadIntelectual_Bitacora1_idx` (`Bitacora_idBitacora`,`Bitacora_Sede_idSede`),
  ADD KEY `fk_TicketPropiedadIntelectual_Empleado1_idx` (`Empleado_idEmpleado`);

--
-- Indices de la tabla `ticketregistroinmueble`
--
ALTER TABLE `ticketregistroinmueble`
  ADD PRIMARY KEY (`idTicketRegistroInmueble`),
  ADD KEY `fk_TicketRegistroInmueble_Bitacora1_idx` (`Bitacora_idBitacora`,`Bitacora_Sede_idSede`),
  ADD KEY `fk_TicketRegistroInmueble_Empleado1_idx` (`Empleado_idEmpleado`);

--
-- Indices de la tabla `tipojornadalaboral`
--
ALTER TABLE `tipojornadalaboral`
  ADD PRIMARY KEY (`idTipoJornadaLaboral`),
  ADD KEY `fk_TipoJornadaLaboral_DiasLaborales1_idx` (`DiasLaborales_idDiasLaborales`);

--
-- Indices de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`idTipoUsuario`);

--
-- Indices de la tabla `tramite`
--
ALTER TABLE `tramite`
  ADD PRIMARY KEY (`idTramite`),
  ADD KEY `fk_Tramite_Direccion1_idx` (`Direccion_idDireccion`);

--
-- Indices de la tabla `tramiteshabilitadoventanilla`
--
ALTER TABLE `tramiteshabilitadoventanilla`
  ADD PRIMARY KEY (`idTramitesHabilitadoVentanilla`),
  ADD KEY `fk_TramitesHabilitadoVentanilla_Ventanilla1_idx` (`Ventanilla_idVentanilla`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Indices de la tabla `ventanilla`
--
ALTER TABLE `ventanilla`
  ADD PRIMARY KEY (`idVentanilla`),
  ADD KEY `fk_Ventanilla_Direccion1_idx` (`Direccion_idDireccion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `idBitacora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `colageneral`
--
ALTER TABLE `colageneral`
  MODIFY `idColaGeneral` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;

--
-- AUTO_INCREMENT de la tabla `ticketcatastro`
--
ALTER TABLE `ticketcatastro`
  MODIFY `idTicketCatastro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ticketpredial`
--
ALTER TABLE `ticketpredial`
  MODIFY `idTicketPredial` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ticketpropiedadintelectual`
--
ALTER TABLE `ticketpropiedadintelectual`
  MODIFY `idTicketPropiedadIntelectual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ticketregistroinmueble`
--
ALTER TABLE `ticketregistroinmueble`
  MODIFY `idTicketRegistroInmueble` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD CONSTRAINT `fk_Bitacora_Direccion1` FOREIGN KEY (`Direccion_idDireccion`) REFERENCES `direccion` (`idDireccion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Bitacora_Sede1` FOREIGN KEY (`Sede_idSede`) REFERENCES `sede` (`idSede`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Bitacora_Tramite1` FOREIGN KEY (`Tramite_idTramite`) REFERENCES `tramite` (`idTramite`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Bitacora_Usuario` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `colageneral`
--
ALTER TABLE `colageneral`
  ADD CONSTRAINT `fk_ColaGeneral_TicketCatastro1` FOREIGN KEY (`TicketCatastro_idTicketCatastro`) REFERENCES `ticketcatastro` (`idTicketCatastro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ColaGeneral_TicketPredial1` FOREIGN KEY (`TicketPredial_idTicketPredial`) REFERENCES `ticketpredial` (`idTicketPredial`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ColaGeneral_TicketPropiedadIntelectual1` FOREIGN KEY (`TicketPropiedadIntelectual_idTicketPropiedadIntelectual`) REFERENCES `ticketpropiedadintelectual` (`idTicketPropiedadIntelectual`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ColaGeneral_TicketRegistroInmueble1` FOREIGN KEY (`TicketRegistroInmueble_idTicketRegistroInmueble`) REFERENCES `ticketregistroinmueble` (`idTicketRegistroInmueble`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `fk_Empleado_Rol1` FOREIGN KEY (`Rol_idRol`) REFERENCES `rol` (`idRol`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Empleado_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `institucion`
--
ALTER TABLE `institucion`
  ADD CONSTRAINT `fk_Instituciones_TipoInstitucion1` FOREIGN KEY (`TipoInstitucion_idTipoInstitucion`) REFERENCES `tipoinstitucion` (`idTipoInstitucion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `jornadalaboral`
--
ALTER TABLE `jornadalaboral`
  ADD CONSTRAINT `fk_JornadaLaboral_Empleado1` FOREIGN KEY (`Empleado_idEmpleado`) REFERENCES `empleado` (`idEmpleado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_JornadaLaboral_TipoJornadaLaboral1` FOREIGN KEY (`TipoJornadaLaboral_idTipoJornadaLaboral`) REFERENCES `tipojornadalaboral` (`idTipoJornadaLaboral`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_JornadaLaboral_Ventanilla1` FOREIGN KEY (`Ventanilla_idVentanilla`) REFERENCES `ventanilla` (`idVentanilla`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD CONSTRAINT `fk_Municipio_Departamento1` FOREIGN KEY (`Departamento_idDepartamento`) REFERENCES `departamento` (`idDepartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sede`
--
ALTER TABLE `sede`
  ADD CONSTRAINT `fk_Sede_Municipio1` FOREIGN KEY (`Municipio_idMunicipio`) REFERENCES `municipio` (`idMunicipio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ticketcatastro`
--
ALTER TABLE `ticketcatastro`
  ADD CONSTRAINT `fk_TicketCatastro_Bitacora1` FOREIGN KEY (`Bitacora_idBitacora`,`Bitacora_Sede_idSede`) REFERENCES `bitacora` (`idBitacora`, `Sede_idSede`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TicketCatastro_Empleado1` FOREIGN KEY (`Empleado_idEmpleado`) REFERENCES `empleado` (`idEmpleado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ticketpredial`
--
ALTER TABLE `ticketpredial`
  ADD CONSTRAINT `fk_TicketPredial_Bitacora1` FOREIGN KEY (`Bitacora_idBitacora`,`Bitacora_Sede_idSede`) REFERENCES `bitacora` (`idBitacora`, `Sede_idSede`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TicketPredial_Empleado1` FOREIGN KEY (`Empleado_idEmpleado`) REFERENCES `empleado` (`idEmpleado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ticketpropiedadintelectual`
--
ALTER TABLE `ticketpropiedadintelectual`
  ADD CONSTRAINT `fk_TicketPropiedadIntelectual_Bitacora1` FOREIGN KEY (`Bitacora_idBitacora`,`Bitacora_Sede_idSede`) REFERENCES `bitacora` (`idBitacora`, `Sede_idSede`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TicketPropiedadIntelectual_Empleado1` FOREIGN KEY (`Empleado_idEmpleado`) REFERENCES `empleado` (`idEmpleado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ticketregistroinmueble`
--
ALTER TABLE `ticketregistroinmueble`
  ADD CONSTRAINT `fk_TicketRegistroInmueble_Bitacora1` FOREIGN KEY (`Bitacora_idBitacora`,`Bitacora_Sede_idSede`) REFERENCES `bitacora` (`idBitacora`, `Sede_idSede`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TicketRegistroInmueble_Empleado1` FOREIGN KEY (`Empleado_idEmpleado`) REFERENCES `empleado` (`idEmpleado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tipojornadalaboral`
--
ALTER TABLE `tipojornadalaboral`
  ADD CONSTRAINT `fk_TipoJornadaLaboral_DiasLaborales1` FOREIGN KEY (`DiasLaborales_idDiasLaborales`) REFERENCES `diaslaborales` (`idDiasLaborales`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tramite`
--
ALTER TABLE `tramite`
  ADD CONSTRAINT `fk_Tramite_Direccion1` FOREIGN KEY (`Direccion_idDireccion`) REFERENCES `direccion` (`idDireccion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tramiteshabilitadoventanilla`
--
ALTER TABLE `tramiteshabilitadoventanilla`
  ADD CONSTRAINT `fk_TramitesHabilitadoVentanilla_Ventanilla1` FOREIGN KEY (`Ventanilla_idVentanilla`) REFERENCES `ventanilla` (`idVentanilla`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ventanilla`
--
ALTER TABLE `ventanilla`
  ADD CONSTRAINT `fk_Ventanilla_Direccion1` FOREIGN KEY (`Direccion_idDireccion`) REFERENCES `direccion` (`idDireccion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`root`@`localhost` EVENT `ticket_reset` ON SCHEDULE EVERY 1 DAY STARTS '2022-06-09 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
DELETE FROM ticketcatastro;

ALTER TABLE ticketcatastro AUTO_INCREMENT = 1;

DELETE FROM ticketpropiedadintelectual;

ALTER TABLE ticketpropiedadintelectual AUTO_INCREMENT = 1;

DELETE FROM ticketregistroinmueble;

ALTER TABLE ticketregistroinmueble AUTO_INCREMENT = 1;

DELETE FROM ticketpredial;

ALTER TABLE ticketpredial AUTO_INCREMENT = 1;

END$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
