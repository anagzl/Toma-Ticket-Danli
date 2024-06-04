-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-07-2022 a las 18:02:24
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
