-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-07-2022 a las 18:01:53
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
