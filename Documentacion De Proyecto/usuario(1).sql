-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-06-2022 a las 19:49:49
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
('0818197800031', 'Dania', 'Esperanza', 'Alvarado', 'Ordoñez', NULL, NULL, NULL, 'dania.alvarado@ip.gob.hn'),
('1', 'Jonathan', 'Joel', 'Laux', 'Brizo', '33333333', 0, 0, 'jonathan.laux@hotmail.com'),
('10', 'Dania', NULL, 'Salgado', NULL, NULL, NULL, NULL, NULL),
('11', 'Marlo', NULL, 'Cruz', NULL, NULL, NULL, NULL, NULL),
('12', 'Oscar', NULL, 'Funez', NULL, NULL, NULL, NULL, NULL),
('2', 'Wendy', NULL, 'Montoya', NULL, NULL, NULL, NULL, NULL),
('3', 'Saul', NULL, 'Zambrano', NULL, NULL, NULL, NULL, NULL),
('4', 'Carmen', NULL, 'Velasquez', NULL, NULL, NULL, NULL, NULL),
('5', 'Fabiana', NULL, 'Godoy', NULL, NULL, NULL, NULL, NULL),
('6', 'Alma', NULL, 'Herrera', NULL, NULL, NULL, NULL, NULL),
('7', 'Minia', NULL, 'Villela', NULL, NULL, NULL, NULL, 'minia.villela@ip.gob.hn'),
('8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('9', 'Loana', NULL, 'Mondragon', NULL, NULL, NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
