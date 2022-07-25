-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-07-2022 a las 19:46:15
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

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `reiniciar_tickets`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `reiniciar_tickets` ()  BEGIN
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

DROP TABLE IF EXISTS `bitacora`;
CREATE TABLE IF NOT EXISTS `bitacora` (
  `idBitacora` int(11) NOT NULL AUTO_INCREMENT,
  `Sede_idSede` int(11) NOT NULL,
  `Tramite_idTramite` int(11) NOT NULL,
  `Direccion_idDireccion` int(11) NOT NULL,
  `Usuario_idUsuario` int(11) DEFAULT NULL,
  `Empleado_idEmpleado` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `horaGeneracionTicket` time DEFAULT NULL,
  `horaEntrada` time DEFAULT NULL,
  `horaSalida` time DEFAULT NULL,
  `Observacion` varchar(1000) DEFAULT NULL,
  `numeroTicket` int(11) DEFAULT NULL,
  PRIMARY KEY (`idBitacora`,`Sede_idSede`),
  KEY `fk_Bitacora_Tramite1_idx` (`Tramite_idTramite`),
  KEY `fk_Bitacora_Sede1_idx` (`Sede_idSede`),
  KEY `fk_Bitacora_Direccion1_idx` (`Direccion_idDireccion`),
  KEY `fk_Bitacora_Empleado1_idx` (`Empleado_idEmpleado`),
  KEY `fk_Bitacora_Usuario1_idx` (`Usuario_idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`idBitacora`, `Sede_idSede`, `Tramite_idTramite`, `Direccion_idDireccion`, `Usuario_idUsuario`, `Empleado_idEmpleado`, `fecha`, `horaGeneracionTicket`, `horaEntrada`, `horaSalida`, `Observacion`, `numeroTicket`) VALUES
(70, 1, 13, 3, 12, NULL, '2022-07-21', '10:10:00', NULL, NULL, NULL, NULL),
(71, 1, 12, 3, 12, NULL, '2022-07-21', '10:10:00', NULL, NULL, NULL, NULL),
(72, 1, 12, 3, 12, NULL, '2022-07-21', '10:14:00', NULL, NULL, NULL, NULL),
(73, 1, 12, 3, 12, NULL, '2022-07-21', '10:21:00', NULL, NULL, NULL, NULL),
(74, 1, 13, 3, 12, NULL, '2022-07-21', '10:21:00', NULL, NULL, NULL, NULL),
(75, 1, 13, 3, 12, NULL, '2022-07-21', '10:22:00', NULL, NULL, NULL, NULL),
(76, 1, 13, 3, 12, NULL, '2022-07-21', '10:24:00', NULL, NULL, NULL, NULL),
(77, 1, 7, 2, 12, NULL, '2022-07-21', '10:27:00', NULL, NULL, NULL, NULL),
(78, 1, 13, 3, 12, NULL, '2022-07-21', '10:28:00', NULL, NULL, NULL, NULL),
(79, 1, 7, 2, 12, NULL, '2022-07-21', '10:29:00', NULL, NULL, NULL, NULL),
(80, 1, 1, 1, 13, 30, '2022-07-21', '10:31:00', '12:43:12', '12:43:22', NULL, NULL),
(81, 1, 2, 1, 12, NULL, '2022-07-21', '10:36:00', NULL, NULL, NULL, NULL),
(82, 1, 2, 1, 13, NULL, '2022-07-21', '10:39:00', NULL, NULL, NULL, NULL),
(83, 1, 15, 3, 13, NULL, '2022-07-21', '10:40:00', NULL, NULL, NULL, NULL),
(86, 1, 13, 3, 1, NULL, '2022-07-21', '11:02:00', NULL, NULL, NULL, NULL),
(87, 1, 13, 3, 1, NULL, '2022-07-21', '11:03:00', NULL, NULL, NULL, NULL),
(88, 1, 13, 3, 1, NULL, '2022-07-21', '11:04:00', NULL, NULL, NULL, NULL),
(89, 1, 3, 1, 12, NULL, '2022-07-21', '11:05:00', NULL, NULL, NULL, NULL),
(90, 1, 15, 3, 14, NULL, '2022-07-21', '11:05:00', NULL, NULL, NULL, NULL),
(91, 1, 6, 2, 15, NULL, '2022-07-21', '11:06:51', NULL, NULL, NULL, NULL),
(92, 1, 13, 3, 13, NULL, '2022-07-21', '11:49:59', NULL, NULL, NULL, NULL),
(93, 1, 1, 1, 13, 30, '2022-07-22', '10:13:22', '10:18:57', '10:19:10', NULL, NULL),
(94, 1, 12, 3, 13, NULL, '2022-07-22', '10:19:05', NULL, NULL, NULL, 93),
(95, 1, 13, 3, 13, NULL, '2022-07-25', '08:55:50', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colageneral`
--

DROP TABLE IF EXISTS `colageneral`;
CREATE TABLE IF NOT EXISTS `colageneral` (
  `idColaGeneral` int(11) NOT NULL AUTO_INCREMENT,
  `TicketRegistroInmueble_idTicketRegistroInmueble` int(11) DEFAULT NULL,
  `TicketPropiedadIntelectual_idTicketPropiedadIntelectual` int(11) DEFAULT NULL,
  `TicketCatastro_idTicketCatastro` int(11) DEFAULT NULL,
  `TicketPredial_idTicketPredial` int(11) DEFAULT NULL,
  PRIMARY KEY (`idColaGeneral`),
  UNIQUE KEY `TicketRegistroInmueble_idTicketRegistroInmueble_UNIQUE` (`TicketRegistroInmueble_idTicketRegistroInmueble`),
  UNIQUE KEY `TicketPropiedadIntelectual_idTicketPropiedadIntelectual_UNIQUE` (`TicketPropiedadIntelectual_idTicketPropiedadIntelectual`),
  UNIQUE KEY `TicketCatastro_idTicketCatastro_UNIQUE` (`TicketCatastro_idTicketCatastro`),
  UNIQUE KEY `TicketPredial_idTicketPredial_UNIQUE` (`TicketPredial_idTicketPredial`),
  KEY `fk_ColaGeneral_TicketRegistroInmueble1_idx` (`TicketRegistroInmueble_idTicketRegistroInmueble`),
  KEY `fk_ColaGeneral_TicketPropiedadIntelectual1_idx` (`TicketPropiedadIntelectual_idTicketPropiedadIntelectual`),
  KEY `fk_ColaGeneral_TicketCatastro1_idx` (`TicketCatastro_idTicketCatastro`),
  KEY `fk_ColaGeneral_TicketPredial1_idx` (`TicketPredial_idTicketPredial`)
) ENGINE=InnoDB AUTO_INCREMENT=256 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `colageneral`
--

INSERT INTO `colageneral` (`idColaGeneral`, `TicketRegistroInmueble_idTicketRegistroInmueble`, `TicketPropiedadIntelectual_idTicketPropiedadIntelectual`, `TicketCatastro_idTicketCatastro`, `TicketPredial_idTicketPredial`) VALUES
(241, NULL, NULL, 1, NULL),
(253, NULL, NULL, 5, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

DROP TABLE IF EXISTS `departamento`;
CREATE TABLE IF NOT EXISTS `departamento` (
  `idDepartamento` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idDepartamento`)
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

DROP TABLE IF EXISTS `diaslaborales`;
CREATE TABLE IF NOT EXISTS `diaslaborales` (
  `idDiasLaborales` int(11) NOT NULL,
  `descripcionDias` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idDiasLaborales`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

DROP TABLE IF EXISTS `direccion`;
CREATE TABLE IF NOT EXISTS `direccion` (
  `idDireccion` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `siglas` varchar(45) DEFAULT NULL,
  `descripcion` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idDireccion`)
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

DROP TABLE IF EXISTS `empleado`;
CREATE TABLE IF NOT EXISTS `empleado` (
  `idEmpleado` int(11) NOT NULL AUTO_INCREMENT,
  `Rol_idRol` int(11) NOT NULL,
  `Usuario_idUsuario` int(11) NOT NULL,
  `Ventanilla_idVentanilla` int(11) DEFAULT NULL,
  `correoInstitucional` varchar(45) DEFAULT NULL,
  `login` varchar(45) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idEmpleado`),
  KEY `fk_Empleado_Rol1_idx` (`Rol_idRol`),
  KEY `fk_Empleado_Ventanilla1_idx` (`Ventanilla_idVentanilla`),
  KEY `fk_Empleado_Usuario1_idx` (`Usuario_idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`idEmpleado`, `Rol_idRol`, `Usuario_idUsuario`, `Ventanilla_idVentanilla`, `correoInstitucional`, `login`, `estado`) VALUES
(29, 1, 1, NULL, 'tenico.tecnico@ip.gob.hn', 'tecnico', 0),
(30, 2, 13, 1, 'jonathan.laux@hotmail.com', 'jonathan.laux', 1),
(31, 2, 18, NULL, 'luis.correo@gmail.com', 'nombre.bueno', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

DROP TABLE IF EXISTS `genero`;
CREATE TABLE IF NOT EXISTS `genero` (
  `idGenero` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `siglas` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idGenero`)
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

DROP TABLE IF EXISTS `institucion`;
CREATE TABLE IF NOT EXISTS `institucion` (
  `idInstituciones` int(11) NOT NULL,
  `nombreInstitucion` varchar(45) DEFAULT NULL,
  `siglas` varchar(45) DEFAULT NULL,
  `TipoInstitucion_idTipoInstitucion` int(11) NOT NULL,
  PRIMARY KEY (`idInstituciones`),
  KEY `fk_Instituciones_TipoInstitucion1_idx` (`TipoInstitucion_idTipoInstitucion`)
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

DROP TABLE IF EXISTS `jornadalaboral`;
CREATE TABLE IF NOT EXISTS `jornadalaboral` (
  `idJornadaLaboral` int(11) NOT NULL AUTO_INCREMENT,
  `Ventanilla_idVentanilla` int(11) NOT NULL,
  `Empleado_idEmpleado` int(11) NOT NULL,
  `obs` varchar(1000) DEFAULT NULL,
  `horasFueraVentanilla` int(11) DEFAULT NULL,
  `minutosFueraVentanilla` int(11) DEFAULT NULL,
  `segundosFueraVentanilla` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `horaEntrada` time DEFAULT NULL,
  `horaSalida` time DEFAULT NULL,
  PRIMARY KEY (`idJornadaLaboral`),
  KEY `fk_JornadaLaboral_Ventanilla1_idx` (`Ventanilla_idVentanilla`),
  KEY `fk_JornadaLaboral_Empleado1_idx` (`Empleado_idEmpleado`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `jornadalaboral`
--

INSERT INTO `jornadalaboral` (`idJornadaLaboral`, `Ventanilla_idVentanilla`, `Empleado_idEmpleado`, `obs`, `horasFueraVentanilla`, `minutosFueraVentanilla`, `segundosFueraVentanilla`, `fecha`, `horaEntrada`, `horaSalida`) VALUES
(5, 1, 30, NULL, 0, 0, 8, '2022-07-21', '02:51:29', NULL),
(6, 1, 30, NULL, 0, 49, 13, '2022-07-22', '10:12:02', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mediacarrusel`
--

DROP TABLE IF EXISTS `mediacarrusel`;
CREATE TABLE IF NOT EXISTS `mediacarrusel` (
  `idMedia` int(11) NOT NULL AUTO_INCREMENT,
  `ruta` varchar(45) NOT NULL,
  `activo` tinyint(1) DEFAULT 1,
  `imagen` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idMedia`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mediacarrusel`
--

INSERT INTO `mediacarrusel` (`idMedia`, `ruta`, `activo`, `imagen`) VALUES
(1, 'ejemplo_img.jpg', 1, 1),
(2, 'terreno.png', 1, 1),
(3, 'videotomaticket.mp4', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajescarrusel`
--

DROP TABLE IF EXISTS `mensajescarrusel`;
CREATE TABLE IF NOT EXISTS `mensajescarrusel` (
  `idMensajesCarrusel` int(11) NOT NULL AUTO_INCREMENT,
  `mensaje` varchar(300) NOT NULL,
  `activo` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`idMensajesCarrusel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

DROP TABLE IF EXISTS `municipio`;
CREATE TABLE IF NOT EXISTS `municipio` (
  `idMunicipio` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `Departamento_idDepartamento` int(11) NOT NULL,
  PRIMARY KEY (`idMunicipio`),
  UNIQUE KEY `UX_nombre_idDepartamento` (`nombre`,`Departamento_idDepartamento`),
  KEY `fk_Municipio_Departamento1_idx` (`Departamento_idDepartamento`)
) ENGINE=InnoDB AUTO_INCREMENT=299 DEFAULT CHARSET=utf8;

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

DROP TABLE IF EXISTS `rol`;
CREATE TABLE IF NOT EXISTS `rol` (
  `idRol` int(11) NOT NULL,
  `nombreRol` varchar(45) DEFAULT NULL,
  `descripcionRol` varchar(150) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idRol`)
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

DROP TABLE IF EXISTS `sede`;
CREATE TABLE IF NOT EXISTS `sede` (
  `idSede` int(11) NOT NULL AUTO_INCREMENT,
  `nombreLocalidad` varchar(45) DEFAULT NULL,
  `siglas` varchar(45) DEFAULT NULL,
  `Municipio_idMunicipio` int(11) NOT NULL,
  PRIMARY KEY (`idSede`),
  KEY `fk_Sede_Municipio1_idx` (`Municipio_idMunicipio`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sede`
--

INSERT INTO `sede` (`idSede`, `nombreLocalidad`, `siglas`, `Municipio_idMunicipio`) VALUES
(1, 'Centro Civico Gubernamental', 'CCG', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticketcatastro`
--

DROP TABLE IF EXISTS `ticketcatastro`;
CREATE TABLE IF NOT EXISTS `ticketcatastro` (
  `idTicketCatastro` int(11) NOT NULL AUTO_INCREMENT,
  `Bitacora_idBitacora` int(11) NOT NULL,
  `Bitacora_Sede_idSede` int(11) NOT NULL,
  `Empleado_idEmpleado` int(11) DEFAULT NULL,
  `disponibilidad` tinyint(1) DEFAULT NULL,
  `preferencia` tinyint(1) DEFAULT NULL,
  `vecesLlamado` int(11) DEFAULT 0,
  `marcarRellamado` tinyint(1) DEFAULT NULL,
  `sigla` varchar(5) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `llamando` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`idTicketCatastro`),
  UNIQUE KEY `Bitacora_idBitacora_UNIQUE` (`Bitacora_idBitacora`),
  KEY `fk_TicketCatastro_Bitacora1_idx` (`Bitacora_idBitacora`,`Bitacora_Sede_idSede`),
  KEY `fk_TicketCatastro_Empleado1_idx` (`Empleado_idEmpleado`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ticketcatastro`
--

INSERT INTO `ticketcatastro` (`idTicketCatastro`, `Bitacora_idBitacora`, `Bitacora_Sede_idSede`, `Empleado_idEmpleado`, `disponibilidad`, `preferencia`, `vecesLlamado`, `marcarRellamado`, `sigla`, `numero`, `llamando`) VALUES
(1, 80, 1, 30, 1, 1, 0, 0, 'C', NULL, 0),
(2, 81, 1, NULL, 1, 1, 0, 0, 'C', NULL, 0),
(3, 82, 1, NULL, 1, 1, 0, 0, 'C', NULL, 0),
(4, 89, 1, NULL, 1, 1, 0, 0, 'C', NULL, 0),
(5, 93, 1, 30, 0, 1, 0, 0, 'C', NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticketpredial`
--

DROP TABLE IF EXISTS `ticketpredial`;
CREATE TABLE IF NOT EXISTS `ticketpredial` (
  `idTicketPredial` int(11) NOT NULL AUTO_INCREMENT,
  `Bitacora_idBitacora` int(11) NOT NULL,
  `Bitacora_Sede_idSede` int(11) NOT NULL,
  `Empleado_idEmpleado` int(11) DEFAULT NULL,
  `disponibilidad` tinyint(1) DEFAULT NULL,
  `preferencia` tinyint(1) DEFAULT NULL,
  `vecesLlamado` int(11) DEFAULT NULL,
  `marcarRellamado` tinyint(1) DEFAULT NULL,
  `sigla` varchar(5) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `llamando` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`idTicketPredial`),
  KEY `fk_TicketPredial_Bitacora1_idx` (`Bitacora_idBitacora`,`Bitacora_Sede_idSede`),
  KEY `fk_TicketPredial_Empleado1_idx` (`Empleado_idEmpleado`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ticketpredial`
--

INSERT INTO `ticketpredial` (`idTicketPredial`, `Bitacora_idBitacora`, `Bitacora_Sede_idSede`, `Empleado_idEmpleado`, `disponibilidad`, `preferencia`, `vecesLlamado`, `marcarRellamado`, `sigla`, `numero`, `llamando`) VALUES
(1, 77, 1, NULL, 1, 1, 0, 0, 'RP', NULL, 0),
(2, 79, 1, NULL, 1, 1, 0, 0, 'RP', NULL, 0),
(3, 91, 1, NULL, 1, 0, 0, 0, 'RP', NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticketpropiedadintelectual`
--

DROP TABLE IF EXISTS `ticketpropiedadintelectual`;
CREATE TABLE IF NOT EXISTS `ticketpropiedadintelectual` (
  `idTicketPropiedadIntelectual` int(11) NOT NULL AUTO_INCREMENT,
  `Bitacora_idBitacora` int(11) NOT NULL,
  `Bitacora_Sede_idSede` int(11) NOT NULL,
  `Empleado_idEmpleado` int(11) DEFAULT NULL,
  `disponibilidad` tinyint(1) DEFAULT NULL,
  `preferencia` tinyint(1) DEFAULT NULL,
  `vecesLlamado` int(11) DEFAULT NULL,
  `marcarRellamado` tinyint(1) DEFAULT NULL,
  `sigla` varchar(5) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `llamando` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`idTicketPropiedadIntelectual`),
  KEY `fk_TicketPropiedadIntelectual_Bitacora1_idx` (`Bitacora_idBitacora`,`Bitacora_Sede_idSede`),
  KEY `fk_TicketPropiedadIntelectual_Empleado1_idx` (`Empleado_idEmpleado`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ticketpropiedadintelectual`
--

INSERT INTO `ticketpropiedadintelectual` (`idTicketPropiedadIntelectual`, `Bitacora_idBitacora`, `Bitacora_Sede_idSede`, `Empleado_idEmpleado`, `disponibilidad`, `preferencia`, `vecesLlamado`, `marcarRellamado`, `sigla`, `numero`, `llamando`) VALUES
(1, 70, 1, NULL, 1, 1, 0, 0, 'PI', NULL, 0),
(2, 71, 1, NULL, 1, 1, 0, 0, 'PI', NULL, 0),
(3, 72, 1, NULL, 1, 1, 0, 0, 'PI', NULL, 0),
(4, 73, 1, NULL, 1, 1, 0, 0, 'PI', NULL, 0),
(5, 74, 1, NULL, 1, 1, 0, 0, 'PI', NULL, 0),
(6, 75, 1, NULL, 1, 1, 0, 0, 'PI', NULL, 0),
(7, 76, 1, NULL, 1, 0, 0, 0, 'PI', NULL, 0),
(8, 78, 1, NULL, 1, 1, 0, 0, 'PI', NULL, 0),
(9, 83, 1, NULL, 1, 1, 0, 0, 'PI', NULL, 0),
(10, 86, 1, NULL, 1, 1, 0, 0, 'PI', NULL, 0),
(11, 87, 1, NULL, 1, 1, 0, 0, 'PI', NULL, 0),
(12, 88, 1, NULL, 1, 1, 0, 0, 'PI', NULL, 0),
(13, 90, 1, NULL, 1, 0, 0, 0, 'PI', NULL, 0),
(14, 92, 1, NULL, 1, 1, 0, 0, 'PI', NULL, 0),
(15, 94, 1, NULL, 1, 0, 0, 0, 'C', 5, 0),
(16, 95, 1, NULL, 1, 1, 0, 0, 'PI', NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticketregistroinmueble`
--

DROP TABLE IF EXISTS `ticketregistroinmueble`;
CREATE TABLE IF NOT EXISTS `ticketregistroinmueble` (
  `idTicketRegistroInmueble` int(11) NOT NULL AUTO_INCREMENT,
  `Bitacora_idBitacora` int(11) NOT NULL,
  `Bitacora_Sede_idSede` int(11) NOT NULL,
  `Empleado_idEmpleado` int(11) DEFAULT NULL,
  `disponibilidad` tinyint(1) DEFAULT NULL,
  `preferencia` tinyint(1) DEFAULT NULL,
  `vecesLlamado` int(11) DEFAULT NULL,
  `marcarRellamado` tinyint(1) DEFAULT NULL,
  `sigla` varchar(5) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `llamando` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`idTicketRegistroInmueble`),
  KEY `fk_TicketRegistroInmueble_Bitacora1_idx` (`Bitacora_idBitacora`,`Bitacora_Sede_idSede`),
  KEY `fk_TicketRegistroInmueble_Empleado1_idx` (`Empleado_idEmpleado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoinstitucion`
--

DROP TABLE IF EXISTS `tipoinstitucion`;
CREATE TABLE IF NOT EXISTS `tipoinstitucion` (
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

DROP TABLE IF EXISTS `tipojornadalaboral`;
CREATE TABLE IF NOT EXISTS `tipojornadalaboral` (
  `idTipoJornadaLaboral` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) DEFAULT NULL,
  `horaInicio` time DEFAULT NULL,
  `horaSalida` time DEFAULT NULL,
  `DiasLaborales_idDiasLaborales` int(11) NOT NULL,
  PRIMARY KEY (`idTipoJornadaLaboral`),
  KEY `fk_TipoJornadaLaboral_DiasLaborales1_idx` (`DiasLaborales_idDiasLaborales`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipojornadalaboral`
--

INSERT INTO `tipojornadalaboral` (`idTipoJornadaLaboral`, `descripcion`, `horaInicio`, `horaSalida`, `DiasLaborales_idDiasLaborales`) VALUES
(1, 'Jornada vespertina', '07:30:00', '16:00:00', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

DROP TABLE IF EXISTS `tipousuario`;
CREATE TABLE IF NOT EXISTS `tipousuario` (
  `idTipoUsuario` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idTipoUsuario`)
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

DROP TABLE IF EXISTS `tramite`;
CREATE TABLE IF NOT EXISTS `tramite` (
  `idTramite` int(11) NOT NULL AUTO_INCREMENT,
  `Direccion_idDireccion` int(11) NOT NULL,
  `nombreTramite` varchar(100) DEFAULT NULL,
  `descripcionTramite` varchar(1000) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idTramite`),
  KEY `fk_Tramite_Direccion1_idx` (`Direccion_idDireccion`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tramite`
--

INSERT INTO `tramite` (`idTramite`, `Direccion_idDireccion`, `nombreTramite`, `descripcionTramite`, `estado`) VALUES
(1, 1, 'Apertura de Solicitud', '', 1),
(2, 1, 'Retiro de Constancia', '', 1),
(3, 1, 'Seguimiento de Expedientes ', '', 1),
(4, 1, 'Entrega de Expedientes ', '', 1),
(5, 2, 'Entrega de Títulos de Propiedad', '', 1),
(6, 2, 'Levantamiento de Expedientes por Expropiacion', '', 1),
(7, 2, 'Solicitud de Constancia', '', 1),
(8, 2, 'Presentar Escrito', '', 1),
(9, 2, 'Préstamo de Expedientes ', '', 1),
(10, 2, 'Solicitudes de Titulos de Propiedad ', '', 1),
(11, 2, 'Consultas Generales ', '', 1),
(12, 3, 'Marcas', '', 1),
(13, 3, 'Busqueda de Antecedentes Registrales ', '', 1),
(14, 3, 'Derecho de Autor y Firma Electronica', '', 1),
(15, 3, 'Patente', '', 1),
(16, 3, 'Escritos Legales ', '', 1),
(17, 3, 'Archivo', '', 1),
(18, 4, 'Presentacion Poderes y Sentencias', 'Poderes y Sentencias', 1),
(19, 4, 'Presentacion Civiles', 'Compraventas,Donaciones,Tradición de Dominios y Documentos Civiles en general', 1),
(20, 4, 'Retiro', 'Retiro de los documentos y solicitudes', 1),
(21, 4, 'Solicitudes', 'Integras y Constancias de Libertad de Gravamen.', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tramiteshabilitadoventanilla`
--

DROP TABLE IF EXISTS `tramiteshabilitadoventanilla`;
CREATE TABLE IF NOT EXISTS `tramiteshabilitadoventanilla` (
  `idTramitesHabilitadoVentanilla` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) DEFAULT NULL,
  `Ventanilla_idVentanilla` int(11) NOT NULL,
  PRIMARY KEY (`idTramitesHabilitadoVentanilla`),
  KEY `fk_TramitesHabilitadoVentanilla_Ventanilla1_idx` (`Ventanilla_idVentanilla`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tramiteshabilitadoventanilla`
--

INSERT INTO `tramiteshabilitadoventanilla` (`idTramitesHabilitadoVentanilla`, `descripcion`, `Ventanilla_idVentanilla`) VALUES
(1, 'Apertura de Solicitud,Retiro de Constancia', 1),
(2, 'Presentacion Civiles', 20),
(3, 'Presentacion Poderes y Sentencias', 18),
(4, 'Levantamiento de Expedientes por Expropiacion,Solicitud de Constancia', 27);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `numeroIdentidad` varchar(15) NOT NULL,
  `primerNombre` varchar(45) DEFAULT NULL,
  `segundoNombre` varchar(45) DEFAULT NULL,
  `primerApellido` varchar(45) DEFAULT NULL,
  `segundoApellido` varchar(45) DEFAULT NULL,
  `numeroCelular` varchar(45) DEFAULT NULL,
  `banderaWhastapp` tinyint(4) DEFAULT NULL,
  `banderaEncuesta` tinyint(4) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`),
  UNIQUE KEY `numeroIdentidad_UNIQUE` (`numeroIdentidad`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `numeroIdentidad`, `primerNombre`, `segundoNombre`, `primerApellido`, `segundoApellido`, `numeroCelular`, `banderaWhastapp`, `banderaEncuesta`, `correo`, `estado`) VALUES
(1, '0801200120145', 'tecnico', 'tecnico', 'tecnico', 'tecnico', NULL, NULL, NULL, 'tecnico@ip.gob.hn', 1),
(12, '0814199300573', 'Ana', '', 'Zavala', '', '32154875', NULL, NULL, 'luis.correo@gmail.com', 1),
(13, '0801200120793', 'Jonathan', 'Joel', 'Laux', 'Brizo', '32041678', NULL, NULL, 'jonathan.laux@hotmail.com', 1),
(14, '0813200120793', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(15, '0802200023564', 'Ryan', NULL, 'Martinez', NULL, '32048754', NULL, NULL, 'correo', 1),
(17, '0807200012344', 'Nombre', 'hola', 'Empleado', '', '32041242', NULL, NULL, 'luis.correo@gmail.com', 1),
(18, '0806200012345', 'Nombre', 'Segundo', 'Bueno', NULL, '32045487', NULL, NULL, 'luis.correo@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventanilla`
--

DROP TABLE IF EXISTS `ventanilla`;
CREATE TABLE IF NOT EXISTS `ventanilla` (
  `idVentanilla` int(11) NOT NULL AUTO_INCREMENT,
  `Direccion_idDireccion` int(11) NOT NULL,
  `numero` int(11) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idVentanilla`),
  KEY `fk_Ventanilla_Direccion1_idx` (`Direccion_idDireccion`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ventanilla`
--

INSERT INTO `ventanilla` (`idVentanilla`, `Direccion_idDireccion`, `numero`, `estado`) VALUES
(1, 1, 11, 1),
(2, 1, 12, 1),
(3, 1, 13, 1),
(4, 2, 14, 1),
(5, 2, 15, 1),
(6, 2, 16, 1),
(7, 2, 17, 1),
(8, 2, 18, NULL),
(9, 2, 19, NULL),
(10, 3, 17, 1),
(11, 3, 18, NULL),
(12, 3, 19, NULL),
(13, 3, 20, NULL),
(14, 3, 21, NULL),
(15, 3, 22, NULL),
(16, 3, 23, NULL),
(17, 3, 24, NULL),
(18, 4, 1, 1),
(19, 4, 2, NULL),
(20, 4, 3, NULL),
(21, 4, 4, NULL),
(22, 4, 5, NULL),
(23, 4, 6, NULL),
(24, 4, 7, NULL),
(25, 4, 8, NULL),
(26, 4, 9, NULL),
(27, 2, 10, 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD CONSTRAINT `fk_Bitacora_Direccion1` FOREIGN KEY (`Direccion_idDireccion`) REFERENCES `direccion` (`idDireccion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Bitacora_Empleado1` FOREIGN KEY (`Empleado_idEmpleado`) REFERENCES `empleado` (`idEmpleado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Bitacora_Sede1` FOREIGN KEY (`Sede_idSede`) REFERENCES `sede` (`idSede`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Bitacora_Tramite1` FOREIGN KEY (`Tramite_idTramite`) REFERENCES `tramite` (`idTramite`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Bitacora_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
DROP EVENT IF EXISTS `ticket_reset`$$
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
