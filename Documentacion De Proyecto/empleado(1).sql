-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-06-2022 a las 19:48:38
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
(0, '1', 5, 2, 'reyna.izaguirre@ip.gob.hn', 'reyna.izaguirre'),
(1, '0801198811055', 11, 2, 'maemi.pineda@ip.gob.hn', 'maemi.pineda'),
(2, '0801198709875', 12, 2, 'patsy.martinez@ip.gob.hn', 'patsy.martinez 	'),
(3, '0801198519581', 13, 2, 'josselenth.palma@ip.gob.hn', 'josselenth.palma'),
(4, '0801198413760', 3, 2, 'claudia.valeriano@ip.gob.hn', 'claudia.valeriano'),
(5, '0818197800031', 4, 2, 'dania.Alvarado@ip.gob.hn', 'Dania.Alvarado'),
(6, '0801196808329', 5, 2, 'jose.rojas@ip.gob.hn', 'jose.rojas'),
(7, '0801198211439', 6, 2, 'kennsy.navas@ip.gob.hn', 'kennsy.navas'),
(8, '0307198700049', 7, 2, 'josselin.rivera@ip.gob.hn', 'josselin.rivera'),
(9, '1', 1, 2, 'wendy.montoya@ip.gob.hn', 'wendy.montoya'),
(10, '1', 2, 2, 'allison.sauceda@ip.gob.hn', 'allison.sauceda'),
(11, '2', 3, 2, 'jaime.vasquez@ip.gob.hn', 'jaime.vasquez'),
(12, '1', 4, 2, 'nanci.rivera@ip.gob.hn', 'nanci.rivera'),
(13, '1', 5, 2, 'reyna.izaguirre@ip.gob.hn', 'reyna.izaguirre'),
(14, '1', 6, 2, 'daysi.ferrufino@ip.gob.hn', 'daysi.ferrufino@ip.gob.hn'),
(15, '1', 7, 2, 'ruth.lopez@ip.gob.hn', 'ruth.lopez'),
(16, '2', 8, 2, 'ossana.palacios@ip.gob.hn', 'ossana.palacios'),
(17, '1', 9, 2, 'ada.ochoa@ip.gob.hn', 'ada.ochoa'),
(18, '1', 10, 2, 'lourdes.salinas@ip.gob.hn', 'lourdes.salinas'),
(19, '2', 11, 2, 'erick.barahona@ip.gob.hn', 'erick.barahona'),
(20, '1', 14, 2, NULL, NULL),
(21, '2', 15, 2, NULL, NULL),
(22, '2', 16, 2, NULL, NULL),
(23, '1', 17, 2, NULL, NULL),
(24, '3', 18, 2, NULL, NULL),
(25, '0801200120793', 24, 1, NULL, NULL);

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
