-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-07-2022 a las 22:26:55
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
DROP DATABASE IF EXISTS `bitacora_servicio_cliente_ip`;
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

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`idBitacora`, `Sede_idSede`, `Usuario_idUsuario`, `Tramite_idTramite`, `Direccion_idDireccion`, `fecha`, `horaGeneracionTicket`, `horaEntrada`, `horaSalida`, `Observacion`, `numeroTicket`) VALUES
(15, 1, '0801200120793', 19, 4, '2022-07-05', '20:38:45', '12:43:00', '12:44:00', NULL, NULL),
(16, 1, '0801200120793', 1, 1, '2022-07-05', '12:27:31', NULL, NULL, NULL, 15),
(17, 1, '0814199300578', 1, 1, '2022-07-05', '15:51:00', NULL, NULL, NULL, NULL),
(18, 1, '0814199844783', 1, 1, '2022-07-05', '15:53:00', NULL, NULL, NULL, NULL),
(19, 1, '0114200013256', 1, 1, '2022-07-05', '15:55:00', NULL, NULL, NULL, NULL);

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

--
-- Volcado de datos para la tabla `colageneral`
--

INSERT INTO `colageneral` (`idColaGeneral`, `TicketRegistroInmueble_idTicketRegistroInmueble`, `TicketPropiedadIntelectual_idTicketPropiedadIntelectual`, `TicketCatastro_idTicketCatastro`, `TicketPredial_idTicketPredial`) VALUES
(230, 5, NULL, NULL, NULL);

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
  `siglas` varchar(45) DEFAULT NULL,
  `descripcion` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `direccion`
--

INSERT INTO `direccion` (`idDireccion`, `nombre`, `siglas`, `descripcion`) VALUES
(1, 'Catastro', 'C', 'Catastro es la dirección que administra el catastro nacional.'),
(2, 'Regularización Predial', 'RP', NULL),
(3, 'Propiedad Intelectual', 'PI', NULL),
(4, 'Registro Inmueble', 'RI', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `idEmpleado` int(11) NOT NULL,
  `Usuario_idUsuario` varchar(15) NOT NULL,
  `Rol_idRol` int(11) NOT NULL,
  `Ventanilla_idVentanilla` int(11) NOT NULL,
  `correoInstitucional` varchar(45) DEFAULT NULL,
  `login` varchar(45) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`idEmpleado`, `Usuario_idUsuario`, `Rol_idRol`, `Ventanilla_idVentanilla`, `correoInstitucional`, `login`, `estado`) VALUES
(25, '0801200120793', 2, 18, 'jonathan.laux@hotmail.com', 'jonathan.laux', NULL),
(26, '0814199300573', 2, 0, 'anag.zavala@ip.gob.hn', 'anag.zavala', NULL),
(27, '111', 1, 0, 'tecnico@ip.gob.hn', 'tecnico', NULL);

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
  `Empleado_idEmpleado` int(11) NOT NULL,
  `obs` varchar(1000) DEFAULT NULL,
  `horasFueraVentanilla` int(11) DEFAULT NULL,
  `minutosFueraVentanilla` int(11) DEFAULT NULL,
  `segundosFueraVentanilla` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `horaEntrada` time DEFAULT NULL,
  `horaSalida` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `jornadalaboral`
--

INSERT INTO `jornadalaboral` (`idJornadaLaboral`, `Ventanilla_idVentanilla`, `Empleado_idEmpleado`, `obs`, `horasFueraVentanilla`, `minutosFueraVentanilla`, `segundosFueraVentanilla`, `fecha`, `horaEntrada`, `horaSalida`) VALUES
(1, 18, 25, NULL, NULL, 0, 23, '2022-07-04', NULL, NULL),
(2, 20, 26, NULL, NULL, NULL, NULL, '2022-07-04', NULL, NULL),
(3, 18, 25, NULL, 0, 0, 0, '2022-07-18', '10:42:26', NULL);

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
(78, ' San Juan de Opoa', 5),
(145, 'Aguanqueterique', 11),
(119, 'Ahuas', 8),
(279, 'Ajuterique', 18),
(99, 'Alauca', 7),
(270, 'Alianza', 17),
(25, 'Alubarén', 1),
(271, 'Amapala', 17),
(48, 'Apacilagua', 4),
(238, 'Arada', 15),
(272, 'Aramecina', 17),
(259, 'Arenal', 16),
(28, 'Arizona', 2),
(242, 'Atima', 15),
(248, 'Azacualpa', 15),
(38, 'Balfate', 3),
(164, 'Belén', 12),
(192, 'Belén Gualcho', 13),
(45, 'Bonito Oriental', 3),
(118, 'Brus Laguna', 8),
(63, 'Cabañas', 5),
(146, 'Cabanas', 11),
(124, 'Camasca', 9),
(208, 'Campamento', 14),
(165, 'Candelaria', 12),
(147, 'Cane', 11),
(273, 'Caridad', 17),
(209, 'Catacamas', 14),
(6, 'Cedros', 1),
(234, 'Ceguaca', 15),
(148, 'Chinaca', 11),
(231, 'Chinda', 15),
(87, 'Choloma', 6),
(47, 'Choluteca', 4),
(66, 'Cocuyugua', 5),
(166, 'Cololaca', 12),
(125, 'Colomoncagua', 9),
(278, 'Comayagua', 18),
(85, 'Concepción', 5),
(126, 'Concepción', 9),
(193, 'Concepción', 13),
(49, 'Concepción de María', 4),
(245, 'Concepción del Norte', 15),
(236, 'Concepción del Sur', 15),
(210, 'Concordia', 14),
(64, 'Copán Ruinas', 5),
(65, 'Corquín', 5),
(20, 'Curaren', 1),
(100, 'Danli', 7),
(1, 'Distrito Central', 1),
(67, 'Dolores', 5),
(127, 'Dolores', 9),
(194, 'Dolores Merendón', 13),
(68, 'Dulce Nombre ', 5),
(211, 'Dulce nombre de culmi', 14),
(50, 'Duyure', 4),
(51, 'El Corpus', 4),
(260, 'El Negrito', 16),
(240, 'El Níspero', 15),
(69, 'El Paraíso ', 5),
(101, 'El Paraíso', 7),
(3, 'El Porvenir', 1),
(29, 'El Porvenir', 2),
(261, 'El Progreso', 16),
(212, 'El Rosario', 14),
(280, 'El Rosario', 18),
(52, 'El Triunfo', 4),
(167, 'Erandique', 12),
(30, 'Esparta', 2),
(281, 'Esquias', 18),
(213, 'Esquipulas del norte', 14),
(70, 'Florida', 5),
(195, 'Fraternidad', 13),
(229, 'Froylan Turcios ', 14),
(274, 'Goascoran', 17),
(163, 'Gracias', 12),
(7, 'Guaimaca', 1),
(149, 'Guajiquiro', 11),
(214, 'Gualaco', 14),
(233, 'Gualala', 15),
(168, 'Gualcinse', 12),
(141, 'Guanaja', 10),
(169, 'Guarita', 12),
(215, 'Guarizama', 14),
(216, 'Guata', 14),
(217, 'Guayape', 14),
(102, 'Güinope', 7),
(282, 'Humuya', 18),
(232, 'Ilama', 15),
(128, 'Intibucá', 9),
(103, 'Jacalepa', 7),
(218, 'Jano', 14),
(129, 'Jesus de Otoro', 9),
(262, 'Jocón', 16),
(142, 'José Santos Guardiola', 10),
(31, 'Jutiapa', 2),
(207, 'Juticalpa', 14),
(170, 'La campa', 12),
(32, 'La Ceiba', 2),
(196, 'La Encarnación', 13),
(123, 'La Esperanza', 9),
(121, 'La Esperanza o El Cacao', 8),
(171, 'La iguala', 12),
(71, 'La Jigua', 5),
(197, 'La Labor', 13),
(27, 'La Libertad', 1),
(283, 'La Libertad', 18),
(97, 'La Lima', 6),
(144, 'La Paz', 11),
(285, 'La Trinidad', 18),
(173, 'La Unión', 12),
(219, 'La Unión', 14),
(24, 'La Venta', 1),
(174, 'La Virtud', 12),
(284, 'Lamani', 18),
(275, 'Langue', 17),
(175, 'Lapaera', 12),
(172, 'Las flores', 12),
(35, 'Las Lagunas', 2),
(296, 'Las Lajas', 18),
(255, 'Las Vegas', 15),
(150, 'Lauterique', 11),
(286, 'Lejamani', 18),
(15, 'Lepaterique', 1),
(40, 'Limón', 3),
(104, 'Liure', 7),
(198, 'Lucema', 13),
(254, 'Macuelizo', 15),
(130, 'Magdalena', 9),
(220, 'Mangulile', 14),
(221, 'Manto', 14),
(176, 'Mapulaca', 12),
(19, 'Maraita', 1),
(2, 'Marale', 1),
(151, 'Marcala', 11),
(53, 'Marcovia', 4),
(131, 'Masaguara', 9),
(33, 'Masica', 2),
(287, 'Meambar', 18),
(199, 'Mercedes', 13),
(152, 'Mercedes de Oriente', 11),
(288, 'Minas de Oro', 18),
(263, 'Morazán', 16),
(105, 'Morocelí', 7),
(54, 'Morolica', 4),
(269, 'Nacaome', 17),
(55, 'Namasigüe', 4),
(252, 'Naranjito', 15),
(73, 'Nueva Arcadia', 5),
(23, 'Nueva Armenia', 1),
(256, 'Nueva Frontera', 15),
(246, 'Nuevo Celilac', 15),
(191, 'Ocotepeque', 13),
(16, 'Ojojona', 1),
(289, 'Ojos de Agua', 18),
(264, 'Olanchito', 16),
(88, 'Omoa', 6),
(153, 'Opatoro', 11),
(4, 'Orica', 1),
(39, 'Oriona', 3),
(56, 'Orocuina', 4),
(106, 'Oropopí', 7),
(57, 'Pespire', 4),
(247, 'Petoa', 15),
(89, 'Pimienta', 6),
(177, 'Piraera', 12),
(90, 'Potrerillos', 6),
(107, 'Potrerillos', 7),
(253, 'Protección', 15),
(91, 'Puerto Cortes', 6),
(117, 'Puerto Lempira', 8),
(251, 'Quimistán', 15),
(21, 'Reitoca', 1),
(140, 'Roatán', 10),
(41, 'Sabá', 3),
(22, 'Sabanagrande', 1),
(222, 'Salamá', 14),
(74, 'San Agustín', 5),
(178, 'San Andrés', 12),
(75, 'San Antonio', 5),
(132, 'San Antonio', 9),
(92, 'San Antonio de Cortés', 6),
(58, 'San Antonio de Flores', 4),
(108, 'San Antonio de Flores', 7),
(13, 'San Antonio de Oriente', 1),
(154, 'San Antonio del Norte', 11),
(18, 'San Buenaventura', 1),
(223, 'San Esteban', 14),
(200, 'San Fernando', 13),
(34, 'San Francisco', 2),
(179, 'San Francisco', 12),
(224, 'San francisco de becerra', 14),
(276, 'San Francisco de Coray', 17),
(225, 'San francisco de la paz', 14),
(235, 'San Francisco de Ojuera', 15),
(93, 'San Francisco de Yojoa', 6),
(201, 'San Francisco del Valle', 13),
(139, 'San Francisco Opalaca', 9),
(9, 'San Ignacio', 1),
(59, 'San Isidro', 4),
(133, 'San Isidro', 9),
(76, 'San Jerónimo', 5),
(290, 'San Jerónimo', 18),
(202, 'San Jorge', 13),
(60, 'San José', 4),
(77, 'San José ', 5),
(155, 'San José', 11),
(291, 'San José Comayagua', 18),
(257, 'San José de Colinas', 15),
(292, 'San José del Potrero', 18),
(156, 'San Juan', 11),
(134, 'San Juan de Flores', 1),
(180, 'San Juan Guarita', 12),
(277, 'San Lorenzo', 17),
(109, 'San Lucas', 7),
(249, 'San Luis', 15),
(293, 'San Luis', 18),
(94, 'San Manuel', 6),
(181, 'San Manuel Colohete', 12),
(203, 'San Marcos', 13),
(250, 'San Marcos', 15),
(190, 'San Marcos de Caiquín', 12),
(61, 'San Marcos de Colón', 4),
(135, 'San Marcos de la Sierra', 9),
(110, 'San Matías', 7),
(136, 'San Miguel Guancapla', 9),
(26, 'San Miguelito', 1),
(79, 'San Nicolás', 5),
(241, 'San Nicolás', 15),
(80, 'San Pedro', 5),
(157, 'San Pedro de Tutule', 11),
(237, 'San Pedro de Zacapa', 15),
(86, 'San Pedro Sula', 6),
(182, 'San Rafel', 12),
(183, 'San Sebastian', 12),
(298, 'San Sebastián', 18),
(243, 'San Vicente Centenario', 15),
(17, 'Santa Ana', 1),
(158, 'Santa Ana', 11),
(62, 'Santa Ana de Yusguare', 4),
(230, 'Santa Barbara', 15),
(184, 'Santa Cruz', 12),
(95, 'Santa Cruz de Yojoa', 6),
(159, 'Santa Elena', 11),
(46, 'Santa fe', 3),
(204, 'Santa Fe', 13),
(10, 'Santa Lucía', 1),
(137, 'Santa Lucía', 9),
(160, 'Santa María', 11),
(226, 'Santa María del real', 14),
(81, 'Santa Rita ', 5),
(239, 'Santa Rita', 15),
(265, 'Santa Rita', 16),
(42, 'Santa Rosa de Aguán', 3),
(84, 'Santa rosa de Copán', 5),
(161, 'Santiago Puringla', 11),
(205, 'Sensenti', 13),
(294, 'Siguatepeque', 18),
(227, 'Silca', 14),
(206, 'Sinuapa', 13),
(111, 'Soledad', 7),
(43, 'Sonaguera', 3),
(266, 'Sulaco', 16),
(8, 'Talanga', 1),
(185, 'Talgua', 12),
(186, 'Tambla', 12),
(14, 'Tatumbla', 1),
(297, 'Taulabe', 18),
(36, 'Tela', 2),
(112, 'Teupasenti', 7),
(113, 'Texiguat', 7),
(44, 'Tocoa', 3),
(187, 'Tomala', 12),
(82, 'Trinidad', 5),
(244, 'Trinidad', 15),
(114, 'Trojes', 7),
(37, 'Trujillo', 3),
(72, 'Unión', 5),
(143, 'Utila', 10),
(115, 'Vado Ancho', 7),
(188, 'Valladolid', 12),
(11, 'Valle de Angeles', 1),
(5, 'Vallecillo', 1),
(83, 'Veracruz ', 5),
(267, 'Victoria', 16),
(295, 'Villa de San Antonio', 18),
(12, 'Villa de San Francisco', 1),
(96, 'Villanueva', 6),
(120, 'Villeda Morales', 8),
(189, 'Virginia', 12),
(122, 'Wampusirpe', 8),
(138, 'Yamaranguila', 9),
(162, 'Yarula', 11),
(116, 'Yauyupe', 7),
(228, 'Yocón ', 14),
(268, 'Yorito', 16),
(258, 'Yoro', 16),
(98, 'Yuscarán', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` int(11) NOT NULL,
  `nombreRol` varchar(45) DEFAULT NULL,
  `descripcionRol` varchar(150) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `nombreRol`, `descripcionRol`, `estado`) VALUES
(1, 'Administrador', 'El administrador tiene acceso a todas las funciones del sistema, puede crear turnos, crear y deshabilitar usuarios, crear y deshabilitar ventanillas.', NULL),
(2, 'Ventanilla', 'El usuario de ventanilla unicamente podra llamar y atender tickets.', NULL);

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

--
-- Volcado de datos para la tabla `ticketcatastro`
--

INSERT INTO `ticketcatastro` (`idTicketCatastro`, `Bitacora_idBitacora`, `Bitacora_Sede_idSede`, `Empleado_idEmpleado`, `disponibilidad`, `preferencia`, `vecesLlamado`, `marcarRellamado`, `sigla`, `numero`, `llamando`) VALUES
(5, 16, 1, NULL, 1, 0, 0, 0, 'RI', 6, 0),
(6, 17, 1, NULL, 1, 0, 0, 0, 'C', NULL, 0),
(7, 18, 1, NULL, 1, 0, 0, 0, 'C', NULL, 0),
(8, 19, 1, NULL, 1, 0, 0, 0, 'C', NULL, 0);

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

--
-- Volcado de datos para la tabla `ticketregistroinmueble`
--

INSERT INTO `ticketregistroinmueble` (`idTicketRegistroInmueble`, `Bitacora_idBitacora`, `Bitacora_Sede_idSede`, `Empleado_idEmpleado`, `disponibilidad`, `preferencia`, `vecesLlamado`, `marcarRellamado`, `sigla`, `numero`, `llamando`) VALUES
(5, 15, 1, 25, 0, 1, 0, 0, 'RI', 6, 0);

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
  `descripcionTramite` varchar(1000) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tramite`
--

INSERT INTO `tramite` (`idTramite`, `Direccion_idDireccion`, `nombreTramite`, `descripcionTramite`, `estado`) VALUES
(1, 1, 'Apertura de Solicitud', '', NULL),
(2, 1, 'Retiro de Constancia', '', NULL),
(3, 1, 'Seguimiento de Expedientes ', '', NULL),
(4, 1, 'Entrega de Expedientes ', '', NULL),
(5, 2, 'Entrega de Títulos de Propiedad', '', NULL),
(6, 2, 'Levantamiento de Expedientes por Expropiacion', '', NULL),
(7, 2, 'Solicitud de Constancia', '', NULL),
(8, 2, 'Presentar Escrito', '', NULL),
(9, 2, 'Préstamo de Expedientes ', '', NULL),
(10, 2, 'Solicitudes de Titulos de Propiedad ', '', NULL),
(11, 2, 'Consultas Generales ', '', NULL),
(12, 3, 'Marcas', '', NULL),
(13, 3, 'Busqueda de Antecedentes Registrales ', '', NULL),
(14, 3, 'Derecho de Autor y Firma Electronica', '', NULL),
(15, 3, 'Patente', '', NULL),
(16, 3, 'Escritos Legales ', '', NULL),
(17, 3, 'Archivo', '', NULL),
(18, 4, 'Presentacion Poderes y Sentencias', 'Poderes y Sentencias', NULL),
(19, 4, 'Presentacion Civiles', 'Compraventas,Donaciones,Tradición de Dominios y Documentos Civiles en general', NULL),
(20, 4, 'Retiro', 'Retiro de los documentos y solicitudes', NULL),
(21, 4, 'Solicitudes', 'Integras y Constancias de Libertad de Gravamen.', NULL);

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
  `correo` varchar(45) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `primerNombre`, `segundoNombre`, `primerApellido`, `segundoApellido`, `numeroCelular`, `banderaWhastapp`, `banderaEncuesta`, `correo`, `estado`) VALUES
('0114200013256', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('0307198700049', 'Pamela', NULL, 'Rivera', NULL, NULL, NULL, NULL, 'josselin.rivera@ip.gob.hn', NULL),
('0801196808329', 'José ', 'Eli', 'Rojas', 'Diaz', NULL, NULL, NULL, 'jose.rojas@ip.gob.hn', NULL),
('0801197202376', 'Claudia', 'Anabel', 'Valeriano', 'Lopez', NULL, NULL, NULL, 'claudia.valeriano@ip.gob.hn', NULL),
('0801198211439', 'Kennsy ', 'Jessenia', 'Navas', 'Guevara', NULL, NULL, NULL, 'kenssy.navas@ip.gob.hn', NULL),
('0801198413760', 'borrar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('0801198519581', 'Josselenth', 'Lonnelly', 'Palma', 'Trejo', NULL, NULL, NULL, 'josselenth.palma@ip.gob.hn', NULL),
('0801198709875', 'Patsy', 'Tania', 'Martínez', 'Araica', NULL, NULL, NULL, 'patsy.martinez@ip.gob.hn', NULL),
('0801198811055', 'Maemi', 'Sarahy', 'Pineda', 'Sierra', NULL, NULL, NULL, 'maemi.pineda@ip.gob.hn', NULL),
('0801200120789', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('0801200120793', 'Jim', 'Joel', 'Lopez', 'Brizo', '32041675', NULL, NULL, 'jonathan.laux@hotmail.com', NULL),
('0814199300573', 'Tecnico', 'Tecnico', 'Tecnico', 'Tecnico', '99999999', NULL, NULL, 'anag.zavala@ip.gob.hn', NULL),
('0814199300578', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('0814199844783', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('0818197800031', 'Dania', 'Esperanza', 'Alvarado', 'Ordoñez', NULL, NULL, NULL, 'dania.alvarado@ip.gob.hn', NULL),
('1', 'Jonathan', 'Joel', 'Laux', 'Brizo', '33333333', 0, 0, 'jonathan.laux@hotmail.com', NULL),
('10', 'Dania', NULL, 'Salgado', NULL, NULL, NULL, NULL, NULL, NULL),
('11', 'Marlo', NULL, 'Cruz', NULL, NULL, NULL, NULL, NULL, NULL),
('111', 'tecnico', 'tecnico', 'tecnico', 'tecnico', NULL, NULL, NULL, 'tecnico', NULL),
('12', 'Oscar', NULL, 'Funez', NULL, NULL, NULL, NULL, NULL, NULL),
('2', 'Wendy', NULL, 'Montoya', NULL, NULL, NULL, NULL, NULL, NULL),
('3', 'Saul', NULL, 'Zambrano', NULL, NULL, NULL, NULL, NULL, NULL),
('4', 'Carmen', NULL, 'Velasquez', NULL, NULL, NULL, NULL, NULL, NULL),
('5', 'Fabiana', NULL, 'Godoy', NULL, NULL, NULL, NULL, NULL, NULL),
('6', 'Alma', NULL, 'Herrera', NULL, NULL, NULL, NULL, NULL, NULL),
('7', 'Minia', NULL, 'Villela', NULL, NULL, NULL, NULL, 'minia.villela@ip.gob.hn', NULL),
('8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('9', 'Loana', NULL, 'Mondragon', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventanilla`
--

CREATE TABLE `ventanilla` (
  `idVentanilla` int(11) NOT NULL,
  `Direccion_idDireccion` int(11) NOT NULL,
  `numero` varchar(45) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ventanilla`
--

INSERT INTO `ventanilla` (`idVentanilla`, `Direccion_idDireccion`, `numero`, `estado`) VALUES
(1, 1, '11', 1),
(2, 1, '12', 1),
(3, 1, '13', 1),
(4, 2, '14', 1),
(5, 2, '15', 1),
(6, 2, '16', 1),
(7, 2, '17', 1),
(8, 2, '18', NULL),
(9, 2, '19', NULL),
(10, 3, '17', 1),
(11, 3, '18', NULL),
(12, 3, '19', NULL),
(13, 3, '20', NULL),
(14, 3, '21', NULL),
(15, 3, '22', NULL),
(16, 3, '23', NULL),
(17, 3, '24', NULL),
(18, 4, '1', 1),
(19, 4, '2', NULL),
(20, 4, '3', NULL),
(21, 4, '4', NULL),
(22, 4, '5', NULL),
(23, 4, '6', NULL),
(24, 4, '7', NULL),
(25, 4, '8', NULL),
(26, 4, '9', NULL),
(27, 4, '10', 1);

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
  ADD KEY `fk_Empleado_Rol1_idx` (`Rol_idRol`),
  ADD KEY `fk_Empleado_Ventanilla1_idx` (`Ventanilla_idVentanilla`);

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
  ADD KEY `fk_JornadaLaboral_Empleado1_idx` (`Empleado_idEmpleado`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`idMunicipio`),
  ADD UNIQUE KEY `UX_nombre_idDepartamento` (`nombre`,`Departamento_idDepartamento`),
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
  MODIFY `idBitacora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `colageneral`
--
ALTER TABLE `colageneral`
  MODIFY `idColaGeneral` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `idEmpleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `jornadalaboral`
--
ALTER TABLE `jornadalaboral`
  MODIFY `idJornadaLaboral` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `municipio`
--
ALTER TABLE `municipio`
  MODIFY `idMunicipio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=299;

--
-- AUTO_INCREMENT de la tabla `sede`
--
ALTER TABLE `sede`
  MODIFY `idSede` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ticketcatastro`
--
ALTER TABLE `ticketcatastro`
  MODIFY `idTicketCatastro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `idTicketRegistroInmueble` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipojornadalaboral`
--
ALTER TABLE `tipojornadalaboral`
  MODIFY `idTipoJornadaLaboral` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tramite`
--
ALTER TABLE `tramite`
  MODIFY `idTramite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `tramiteshabilitadoventanilla`
--
ALTER TABLE `tramiteshabilitadoventanilla`
  MODIFY `idTramitesHabilitadoVentanilla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ventanilla`
--
ALTER TABLE `ventanilla`
  MODIFY `idVentanilla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
  ADD CONSTRAINT `fk_Empleado_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Empleado_Ventanilla1` FOREIGN KEY (`Ventanilla_idVentanilla`) REFERENCES `ventanilla` (`idVentanilla`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
