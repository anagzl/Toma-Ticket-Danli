-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-07-2022 a las 18:01:42
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
