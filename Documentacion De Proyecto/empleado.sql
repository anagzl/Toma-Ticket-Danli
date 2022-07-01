-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-07-2022 a las 23:53:29
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `idEmpleado` int(11) NOT NULL,
  `Usuario_idUsuario` varchar(15) NOT NULL,
  `Ventanilla_idVentanilla` int(11) NOT NULL,
  `Rol_idRol` int(11) NOT NULL,
  `correoInstitucional` varchar(45) DEFAULT NULL,
  `login` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`idEmpleado`, `Usuario_idUsuario`, `Ventanilla_idVentanilla`, `Rol_idRol`, `correoInstitucional`, `login`) VALUES
(1, '0801199223300', 1, 2, 'wendy.montoya@ip.gob.hn', 'wendy.montoya'),
(2, '0801199811399', 2, 2, 'allison.sauceda@ip.gob.hn', 'allison.sauceda'),
(3, '0801197914746', 3, 2, 'jaime.vasquez@ip.gob.hn', 'jaime.vasquez'),
(4, '0801199722306', 4, 2, 'nanci.rivera@ip.gob.hn', 'nanci.rivera'),
(5, '0801198801115', 5, 2, 'daysi.ferrufino@ip.gob.hn', 'daysi.ferrufino'),
(6, '0801197714738', 6, 2, 'ruth.lopez@ip.gob.hn', 'ruth.lopez'),
(7, '08011997100941', 7, 2, 'ossana.palacios@ip.gob.hn', 'ossana.palacios'),
(8, '0709196800135', 8, 2, 'ada.ochoa@ip.gob.hn', 'ada.ochoa'),
(9, '0801197108723', 9, 2, 'lourdes.salinas@ip.gob.hn', 'lourdes.salinas'),
(10, '0801198203503', 10, 2, 'erick.barahona@ip.gob.hn', 'erick.barahona'),
(12, '0818197800031', 20, 2, 'dania.alvarado@ip.gob.hn', 'dania.alvarado'),
(13, '0801196808329', 21, 2, 'jose.rojas@ip.gob.hn', 'jose.rojas'),
(14, '0801198211439', 22, 2, 'kennsy.navas@ip.gob.hn', 'kennsy.navas'),
(15, '0307198700049', 23, 2, 'josselin.rivera@ip.gob.hn', NULL),
(17, '0801198811055', 12, 2, 'maemi.pineda@ip.gob.hn', 'maemi.pineda'),
(18, '0801198709875', 13, 2, 'patsy.martinez@ip.gob.hn', 'patsy.martinez'),
(19, '0801198519581', 14, 2, 'josselenth.palma@ip.gob.hn', 'josselenth.palma'),
(20, '1993', 19, 1, 'tecnico@ip.gob.hn', 'tecnico');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`idEmpleado`),
  ADD KEY `fk_Empleado_Usuario1_idx` (`Usuario_idUsuario`),
  ADD KEY `fk_Empleado_Ventanilla1_idx` (`Ventanilla_idVentanilla`),
  ADD KEY `fk_Empleado_Rol1_idx` (`Rol_idRol`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `fk_Empleado_Rol1` FOREIGN KEY (`Rol_idRol`) REFERENCES `rol` (`idRol`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Empleado_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Empleado_Ventanilla1` FOREIGN KEY (`Ventanilla_idVentanilla`) REFERENCES `ventanilla` (`idVentanilla`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
