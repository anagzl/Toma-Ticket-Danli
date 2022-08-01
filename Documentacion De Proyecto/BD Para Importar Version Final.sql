-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-08-2022 a las 00:07:56
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
CREATE TABLE `bitacora` (
  `idBitacora` int(11) NOT NULL,
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
  `numeroTicket` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colageneral`
--

DROP TABLE IF EXISTS `colageneral`;
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

DROP TABLE IF EXISTS `departamento`;
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

DROP TABLE IF EXISTS `diaslaborales`;
CREATE TABLE `diaslaborales` (
  `idDiasLaborales` int(11) NOT NULL,
  `descripcionDias` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

DROP TABLE IF EXISTS `direccion`;
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
(2, 'Regularización Predial', 'RP', 'Se relaciona con invenciones, obras literarias, artísticas, símbolos y nombres utilizados en el comercio.'),
(3, 'Propiedad Intelectual', 'PI', 'Se relaciona con invenciones, obras literarias, artísticas, símbolos y nombres utilizados en el comercio.'),
(4, 'Registro Inmueble', 'RI', 'Registro de bienes en el territorio de Honduras.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

DROP TABLE IF EXISTS `empleado`;
CREATE TABLE `empleado` (
  `idEmpleado` int(11) NOT NULL,
  `Rol_idRol` int(11) NOT NULL,
  `Usuario_idUsuario` int(11) NOT NULL,
  `Ventanilla_idVentanilla` int(11) DEFAULT NULL,
  `correoInstitucional` varchar(45) DEFAULT NULL,
  `login` varchar(45) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`idEmpleado`, `Rol_idRol`, `Usuario_idUsuario`, `Ventanilla_idVentanilla`, `correoInstitucional`, `login`, `estado`) VALUES
(1, 2, 1, 19, 'anag.zavala@ip.gob.hn', 'anag.zavala', 1),
(2, 2, 24, 14, 'dania.alvarado@ip.gob.hn', 'dania.alvarado', 1),
(3, 2, 21, 20, 'allison.sauceda@ip.gob.hn', 'allison.sauceda', 1),
(4, 2, 9, 21, 'jaime.vasquez@ip.gob.hn', 'jaime.vasquez', 1),
(5, 2, 20, 22, 'nanci.rivera@ip.gob.hn', 'nanci.rivera', 1),
(6, 2, 15, 23, 'daysi.ferrufino@ip.gob.hn', 'daysi.ferrufino', 1),
(7, 2, 8, 25, 'ossana.palacios@ip.gob.hn', 'ossana.palacios', 1),
(8, 2, 5, 26, 'ada.ochoa@ip.gob.hn', 'ada.ochoa', 1),
(9, 2, 7, 27, 'lourdes.salinas@ip.gob.hn', 'lourdes.salinas', 1),
(10, 1, 10, NULL, 'erick.barahona@ip.gob.hn', 'erick.barahona', 1),
(11, 2, 6, 13, 'jose.rojas@ip.gob.hn', 'jose.rojas', 1),
(12, 2, 11, 16, 'kennsy.navas@ip.gob.hn', 'kennsy.navas', 1),
(13, 2, 4, 15, 'josselin.rivera@ip.gob.hn', 'josselin.rivera', 1),
(14, 2, 16, 2, 'maemi.pineda@ip.gob.hn', 'maemi.pineda', 1),
(15, 2, 14, 3, 'patsy.martinez@ip.gob.hn', 'patsy.martinez', 1),
(16, 2, 13, 4, 'josselenth.palma@ip.gob.hn', 'josselenth.palma', 1),
(17, 1, 17, 18, 'tecnico@ip.gob.hn', 'tecnico', 1),
(18, 2, 23, 17, 'juan.barahona@ip.gob.hn', 'juan.barahona', 1),
(19, 2, 12, 28, 'leonardo.velazquez@ip.gob.hn', 'leonardo.velazquez', 1),
(20, 2, 22, 2, 'jonathan.laux@hotmail.com', 'jonathan.laux', 1),
(21, 2, 18, 4, 'luis.estrada@ip.gob.hn', 'luis.estrada', 1),
(22, 2, 25, 6, 'claudia.valeriano@ip.gob.hn', 'claudia.valeriano', 1),
(23, 2, 26, 7, 'fabiana.godoy@ip.gob.hn', 'fabiana.godoy', 1),
(24, 2, 27, 5, 'saul.zambrano@ip.gob.hn', 'saul.zambrano', 1),
(25, 2, 28, 10, 'carmen.velasquez@ip.gob.hn', 'carmen.velasquez', 1),
(26, 2, 29, 8, 'alma.herrera@ip.gob.hn', 'alma.herrera', 1),
(27, 2, 30, 18, 'oscar.funez@ip.gob.hn', 'oscar.funez', 1),
(28, 2, 31, 12, 'minia.villela@ip.gob.hn', 'minia.villela', 1),
(29, 2, 32, 18, 'dania.salgado@ip.gob.hn', 'dania.salgado', 1),
(30, 2, 33, 18, 'marlon.cruz@ip.gob.hn', 'marlon.cruz', 1),
(31, 2, 34, 24, 'ruth.lopez@ip.gob.hn', 'ruth.lopez', 1),
(32, 2, 35, 11, 'cesar.aguilera@ip.gob.hn', 'cesar.aguilera', 1),
(33, 2, 36, NULL, 'rita.chinchilla@ip.gob.hn', 'rita.chinchilla', 0),
(34, 2, 37, 9, 'luana.mondragon@ip.gob.hn', 'luana.mondragon', 1),
(35, 2, 39, 19, 'wendy.montoya@ip.gob.hn', 'wendy.montoya', 1),
(36, 2, 40, 1, 'reyna.izaguirre@ip.gob.hn', 'reyna.izaguirre', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

DROP TABLE IF EXISTS `genero`;
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

DROP TABLE IF EXISTS `institucion`;
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

DROP TABLE IF EXISTS `jornadalaboral`;
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
(1, 2, 20, NULL, 0, 0, 10, '2022-07-29', '02:02:14', NULL),
(2, 2, 20, NULL, 0, 40, 2, '2022-08-01', '08:41:44', NULL),
(3, 2, 1, NULL, 0, 0, 0, '2022-08-01', '01:49:31', NULL),
(4, 19, 1, NULL, 0, 1, 10, '2022-08-01', '01:50:20', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mediacarrusel`
--

DROP TABLE IF EXISTS `mediacarrusel`;
CREATE TABLE `mediacarrusel` (
  `idMedia` int(11) NOT NULL,
  `ruta` varchar(45) NOT NULL,
  `activo` tinyint(1) DEFAULT 1,
  `imagen` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mediacarrusel`
--

INSERT INTO `mediacarrusel` (`idMedia`, `ruta`, `activo`, `imagen`) VALUES
(1, 'ejemplo_img.jpg', 1, 1),
(2, 'terreno.png', 1, 1),
(3, 'videotomaticket.mp4', 1, 0),
(5, '21.png', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajescarrusel`
--

DROP TABLE IF EXISTS `mensajescarrusel`;
CREATE TABLE `mensajescarrusel` (
  `idMensajesCarrusel` int(11) NOT NULL,
  `mensaje` varchar(300) NOT NULL,
  `activo` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mensajescarrusel`
--

INSERT INTO `mensajescarrusel` (`idMensajesCarrusel`, `mensaje`, `activo`) VALUES
(1, 'Hola', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

DROP TABLE IF EXISTS `municipio`;
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

DROP TABLE IF EXISTS `rol`;
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

DROP TABLE IF EXISTS `sede`;
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

DROP TABLE IF EXISTS `ticketcatastro`;
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

DROP TABLE IF EXISTS `ticketpredial`;
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

DROP TABLE IF EXISTS `ticketpropiedadintelectual`;
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

DROP TABLE IF EXISTS `ticketregistroinmueble`;
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

DROP TABLE IF EXISTS `tipoinstitucion`;
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

DROP TABLE IF EXISTS `tipojornadalaboral`;
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

DROP TABLE IF EXISTS `tipousuario`;
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

DROP TABLE IF EXISTS `tramite`;
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
(14, 3, 'Derecho de Autor', '', 1),
(15, 3, 'Patente', '', 1),
(16, 3, 'Escritos Legales ', '', 1),
(17, 3, 'Archivo', '', 1),
(18, 4, 'Presentacion Poderes y Sentencias', 'Poderes y Sentencias', 1),
(19, 4, 'Presentacion Civiles', 'Compraventas,Donaciones,Tradición de Dominios y Documentos Civiles en general', 1),
(20, 4, 'Retiro', 'Retiro de los documentos y solicitudes', 1),
(21, 4, 'Solicitudes', 'Integras y Constancias de Libertad de Gravamen.', 1),
(22, 3, 'Recibos de pago', 'comprobante', 1),
(23, 3, 'Firma Electrónica', NULL, 1),
(24, 1, 'Escaneo de Expedientes', 'escanear un expediente', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tramiteshabilitadoventanilla`
--

DROP TABLE IF EXISTS `tramiteshabilitadoventanilla`;
CREATE TABLE `tramiteshabilitadoventanilla` (
  `idTramitesHabilitadoVentanilla` int(11) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `Ventanilla_idVentanilla` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tramiteshabilitadoventanilla`
--

INSERT INTO `tramiteshabilitadoventanilla` (`idTramitesHabilitadoVentanilla`, `descripcion`, `Ventanilla_idVentanilla`) VALUES
(1, 'Presentacion Poderes y Sentencias', 19),
(2, 'Presentacion Poderes y Sentencias,Solicitudes', 20),
(3, 'Presentacion Civiles', 21),
(4, 'Presentacion Civiles', 22),
(5, 'Presentacion Civiles', 23),
(6, 'Presentacion Civiles', 24),
(7, 'Retiro', 25),
(8, 'Retiro', 26),
(9, 'Retiro', 27),
(10, 'Solicitudes', 1),
(11, 'Apertura de Solicitud,Retiro de Constancia,Seguimiento de Expedientes ', 2),
(12, 'Apertura de Solicitud,Retiro de Constancia,Seguimiento de Expedientes ', 3),
(13, 'Entrega de Expedientes ,Escaneo de Expedientes', 4),
(14, 'Marcas', 5),
(15, 'Busqueda de Antecedentes Registrales ', 6),
(16, 'Recibos de pago', 10),
(17, 'Derecho de Autor', 7),
(18, 'Firma Electrónica', 8),
(19, 'Patente', 12),
(20, 'Escritos Legales ', 9),
(21, 'Archivo', 18),
(22, 'Solicitud de Constancia,Presentar Escrito,Préstamo de Expedientes ', 14),
(23, 'Solicitud de Constancia,Presentar Escrito', 13),
(24, 'Solicitud de Constancia,Presentar Escrito,Préstamo de Expedientes ', 16),
(25, 'Solicitud de Constancia,Presentar Escrito,Préstamo de Expedientes ', 15),
(26, 'Entrega de Títulos de Propiedad,Levantamiento de Expedientes por Expropiacion,Solicitudes de Titulos de Propiedad ,Consultas Generales ', 17),
(27, 'Entrega de Títulos de Propiedad,Levantamiento de Expedientes por Expropiacion,Solicitudes de Titulos de Propiedad ,Consultas Generales ', 11),
(28, 'Solicitud de Constancia,Presentar Escrito,Solicitudes de Titulos de Propiedad ,Consultas Generales ', 28);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `numeroIdentidad` varchar(15) NOT NULL,
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

INSERT INTO `usuario` (`idUsuario`, `numeroIdentidad`, `primerNombre`, `segundoNombre`, `primerApellido`, `segundoApellido`, `numeroCelular`, `banderaWhastapp`, `banderaEncuesta`, `correo`, `estado`) VALUES
(1, '0814199300573', 'Ana', 'Gissela', 'Zavala', 'Licona', '31799589', NULL, NULL, 'anag.zavala@ip.gob.hn', 1),
(4, '0307198700049', 'Pamela', '', 'Rivera', '', '', NULL, NULL, 'josselin.rivera@ip.gob.hn', 1),
(5, '0709196800135', 'Ada', 'Antonia', 'Ochoa', NULL, NULL, NULL, NULL, 'ada.ochoa@ip.gob,hn', 1),
(6, '0801196808329', 'José ', 'Eli', 'Rojas', 'Diaz', NULL, NULL, NULL, 'jose.rojas@ip.gob.hn', 1),
(7, '0801197108723', 'Lourdes', NULL, 'Salinas', NULL, NULL, NULL, NULL, 'lourdes.salinas@ip.gob.hn', 1),
(8, '0801197714738', 'Elkin', NULL, 'Palacios', NULL, NULL, NULL, NULL, 'ossana.palacios@ip.gob.hn', 1),
(9, '0801197914746', 'Jaime', 'Arturo', 'Vásquez', 'Duron', NULL, NULL, NULL, 'jaime.vasquez@ip.gob.hn', 1),
(10, '0801198203503', 'Erick', NULL, 'Barahona', NULL, NULL, NULL, NULL, 'erick.barahona@ip.gob.hn', 1),
(11, '0801198211439', 'Kennsy ', 'Jessenia', 'Navas', 'Guevara', NULL, NULL, NULL, 'kenssy.navas@ip.gob.hn', 1),
(12, '0801198302582', 'Leonardo ', NULL, 'Velazquez', NULL, NULL, NULL, NULL, 'leonardo.velasquez', 1),
(13, '0801198519581', 'Josselenth', 'Lonnelly', 'Palma', 'Trejo', NULL, NULL, NULL, 'josselenth.palma@ip.gob.hn', 1),
(14, '0801198709875', 'Patsy', 'Tania', 'Martínez', 'Araica', NULL, NULL, NULL, 'patsy.martinez@ip.gob.hn', 1),
(15, '0801198801115', 'Daysi', NULL, 'Ferrufino', NULL, NULL, NULL, NULL, 'daysi.ferrufino@ip.gob.hn', 1),
(16, '0801198811055', 'Maemi', 'Sarahy', 'Pineda', 'Sierra', NULL, NULL, NULL, 'maemi.pineda@ip.gob.hn', 1),
(17, '0801199300580', 'tecnico', 'tecnico', 'tecnico', 'tecnico', '31458989', NULL, NULL, 'tecnico@ip.gob.hn', 1),
(18, '0801199601821', 'Luis', 'Fernando', 'Estrada', NULL, '95049717', NULL, NULL, 'luis.estrada@ip.gob.hn', 1),
(20, '0801199722306', 'Nanci', NULL, 'Rivera', NULL, NULL, NULL, NULL, 'nanci.rivera@ip.gob.hn', 1),
(21, '0801199811399', 'Allison', NULL, 'Sauceda', NULL, NULL, NULL, NULL, 'allison.sauceda@ip.gob.hn', 1),
(22, '0801200120793', 'Jonathan', 'Joel', 'Laux', 'Brizo', '32041675', NULL, NULL, 'jonathan.laux@hotmail.com', 1),
(23, '0803197400353', 'Juan', 'Ramon', 'Barahona', 'Cuadras', NULL, NULL, NULL, 'juan.barahona@ip.gob.hn', 1),
(24, '0818197800031', 'Dania', 'Esperanza', 'Alvarado', 'Ordoñez', NULL, NULL, NULL, 'dania.alvarado@ip.gob.hn', 1),
(25, '0801197202376', 'Claudia', 'Anabel', 'Valeriano', 'Lopez', '32000000', NULL, NULL, 'claudia.valeriano@ip.gob.hn', 1),
(26, '0801200416296', 'Fabiana', 'Asenet', 'Godoy', 'Canales', '32000000', NULL, NULL, 'fabiana.godoy@ip.gob.hn', 1),
(27, '0801197400922', 'Saul', 'Antonio', 'Zambrano', 'Godoy', '32000000', NULL, NULL, 'saul.zambrano@ip.gob.hn', 1),
(28, '1801198601986', 'Carmen', 'Raquel', 'Velasquez', 'Urbina', '32000000', NULL, NULL, 'carmen.velasquez@ip.gob.hn', 1),
(29, '0801198105681', 'Alma', 'Violeta', 'Herrera', 'Flores', '32000000', NULL, NULL, 'alma.herrera@ip.gob.hn', 1),
(30, '0801197808426', 'Oscar', 'Omar', 'Funez', 'Padilla', '32000000', NULL, NULL, 'oscar.funez@ip.gob.hn', 1),
(31, '0801196707222', 'Minia', 'Adalgisa', 'Villela', 'Estrada', '32000000', NULL, NULL, 'minia.villela@ip.gob.hn', 1),
(32, '0708198500359', 'Dania', 'Rosinda', 'Salgado', 'Sosa', '32000000', NULL, NULL, 'dania.salgado@ip.gob.hn', 1),
(33, '0801197901642', 'Marlon', 'Alberto', 'Cruz', 'Herrera', '32000000', NULL, NULL, 'marlon.cruz@ip.gob.hn', 1),
(34, '0801197100941', 'Ruth', NULL, 'Lopez', NULL, '32000000', NULL, NULL, 'ruth.lopez@ip.gob.hn', 1),
(35, '0801197901699', 'Cesar', 'David', 'Aguilera', 'Flores', '32000000', NULL, NULL, 'cesar.aguilera@ip.gob.hn', 1),
(36, '0304197000172', 'Rita', 'Carolina', 'Chinchilla', NULL, '32000000', NULL, NULL, 'rita.chinchilla@ip.gob.hn', 0),
(37, '0801196101707', 'Luana', 'Carolina', 'Mondragon', NULL, '32000000', NULL, NULL, 'luana.mondragon@ip.gob.hn', 1),
(39, '0801199223300', 'Wendy', NULL, 'Montoya', NULL, '32000000', NULL, NULL, 'wendy.montoya@ip.gob.hn', 1),
(40, '0801199800758', 'Reyna', NULL, 'Izaguirre', NULL, '32000000', NULL, NULL, 'reyna.izaguirre@ip.gob.hn', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventanilla`
--

DROP TABLE IF EXISTS `ventanilla`;
CREATE TABLE `ventanilla` (
  `idVentanilla` int(11) NOT NULL,
  `Direccion_idDireccion` int(11) NOT NULL,
  `numero` int(11) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ventanilla`
--

INSERT INTO `ventanilla` (`idVentanilla`, `Direccion_idDireccion`, `numero`, `estado`) VALUES
(1, 4, 10, 1),
(2, 1, 11, 1),
(3, 1, 12, 1),
(4, 1, 13, 1),
(5, 3, 14, 1),
(6, 3, 15, 1),
(7, 3, 17, 1),
(8, 3, 18, 1),
(9, 3, 20, 1),
(10, 3, 16, 1),
(11, 2, 27, 1),
(12, 3, 19, 1),
(13, 2, 23, 1),
(14, 2, 22, 1),
(15, 2, 25, 1),
(16, 2, 24, 1),
(17, 2, 26, 1),
(18, 3, 21, 1),
(19, 4, 1, 1),
(20, 4, 2, 1),
(21, 4, 3, 1),
(22, 4, 4, 1),
(23, 4, 5, 1),
(24, 4, 6, 1),
(25, 4, 7, 1),
(26, 4, 8, 1),
(27, 4, 9, 1),
(28, 2, 28, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`idBitacora`,`Sede_idSede`),
  ADD KEY `fk_Bitacora_Tramite1_idx` (`Tramite_idTramite`),
  ADD KEY `fk_Bitacora_Sede1_idx` (`Sede_idSede`),
  ADD KEY `fk_Bitacora_Direccion1_idx` (`Direccion_idDireccion`),
  ADD KEY `fk_Bitacora_Empleado1_idx` (`Empleado_idEmpleado`),
  ADD KEY `fk_Bitacora_Usuario1_idx` (`Usuario_idUsuario`);

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
  ADD KEY `fk_Empleado_Rol1_idx` (`Rol_idRol`),
  ADD KEY `fk_Empleado_Ventanilla1_idx` (`Ventanilla_idVentanilla`),
  ADD KEY `fk_Empleado_Usuario1_idx` (`Usuario_idUsuario`);

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
-- Indices de la tabla `mediacarrusel`
--
ALTER TABLE `mediacarrusel`
  ADD PRIMARY KEY (`idMedia`);

--
-- Indices de la tabla `mensajescarrusel`
--
ALTER TABLE `mensajescarrusel`
  ADD PRIMARY KEY (`idMensajesCarrusel`);

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
  ADD UNIQUE KEY `Ventanilla_idVentanilla_UNIQUE` (`Ventanilla_idVentanilla`),
  ADD KEY `fk_TramitesHabilitadoVentanilla_Ventanilla1_idx` (`Ventanilla_idVentanilla`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `numeroIdentidad_UNIQUE` (`numeroIdentidad`);

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
  MODIFY `idBitacora` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `colageneral`
--
ALTER TABLE `colageneral`
  MODIFY `idColaGeneral` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=347;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `idEmpleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `jornadalaboral`
--
ALTER TABLE `jornadalaboral`
  MODIFY `idJornadaLaboral` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `mediacarrusel`
--
ALTER TABLE `mediacarrusel`
  MODIFY `idMedia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `mensajescarrusel`
--
ALTER TABLE `mensajescarrusel`
  MODIFY `idMensajesCarrusel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `idTicketCatastro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ticketpredial`
--
ALTER TABLE `ticketpredial`
  MODIFY `idTicketPredial` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ticketpropiedadintelectual`
--
ALTER TABLE `ticketpropiedadintelectual`
  MODIFY `idTicketPropiedadIntelectual` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ticketregistroinmueble`
--
ALTER TABLE `ticketregistroinmueble`
  MODIFY `idTicketRegistroInmueble` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipojornadalaboral`
--
ALTER TABLE `tipojornadalaboral`
  MODIFY `idTipoJornadaLaboral` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tramite`
--
ALTER TABLE `tramite`
  MODIFY `idTramite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `tramiteshabilitadoventanilla`
--
ALTER TABLE `tramiteshabilitadoventanilla`
  MODIFY `idTramitesHabilitadoVentanilla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `ventanilla`
--
ALTER TABLE `ventanilla`
  MODIFY `idVentanilla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
CALL reiniciar_tickets;
END$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
