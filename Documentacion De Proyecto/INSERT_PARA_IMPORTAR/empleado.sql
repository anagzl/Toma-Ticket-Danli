-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-07-2022 a las 18:00:49
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

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`idEmpleado`, `Rol_idRol`, `Usuario_idUsuario`, `Ventanilla_idVentanilla`, `correoInstitucional`, `login`, `estado`) VALUES
(1, 1, 1, 2, 'anag.zavala@ip.gob.hn', 'anag.zavala', 1),
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
(20, 1, 22, 2, 'jonathan.laux@hotmail.com', 'jonathan.laux', 1),
(21, 1, 18, 4, 'luis.estrada@ip.gob.hn', 'luis.estrada', 1),
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
