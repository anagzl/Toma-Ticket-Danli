-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-06-2022 a las 16:39:07
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
(10, 2, 'Entrega de Títulos de Propiedad ', ''),
(11, 2, 'Levantamiento de Expedientes por Expropiación ', ''),
(12, 2, 'Solicitudes de Títulos de Propiedad ', ''),
(13, 2, 'Consultas Generales ', ''),
(14, 3, 'Marcas', ''),
(15, 3, 'Búsqueda de Antecedentes Registrales ', ''),
(16, 3, 'Derecho de Autor y Firma Electrónica', ''),
(17, 3, 'Patente', ''),
(18, 3, 'Escritos Legales ', ''),
(19, 3, 'Archivo', ''),
(20, 4, 'Presentación Poderes y Sentencias', 'Poderes y Sentencias'),
(21, 4, 'Presentación Civiles', 'Compraventas,Donaciones,Tradición de Dominios y Documentos Civiles en general'),
(22, 4, 'Retiro', 'Retiro de los documentos y solicitudes'),
(23, 4, 'Solicitudes', 'Integras y Constancias de Libertad de Gravamen.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tramite`
--
ALTER TABLE `tramite`
  ADD PRIMARY KEY (`idTramite`),
  ADD KEY `fk_Tramite_Direccion1_idx` (`Direccion_idDireccion`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tramite`
--
ALTER TABLE `tramite`
  ADD CONSTRAINT `fk_Tramite_Direccion1` FOREIGN KEY (`Direccion_idDireccion`) REFERENCES `direccion` (`idDireccion`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
