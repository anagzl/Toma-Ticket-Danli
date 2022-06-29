-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-06-2022 a las 19:00:45
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
-- Estructura de tabla para la tabla `bitacora`
--

CREATE DATABASE `bitacora_servicio_cliente_ip`;

CREATE TABLE `bitacora` (
  `idBitacora` int(11) NOT NULL,
  `Sede_idSede` int(11) NOT NULL,
  `Usuario_idUsuario` varchar(15) NOT NULL,
  `Tramite_idTramite` int(11) NOT NULL,
  `Direccion_idDireccion` int(11) NOT NULL,
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

CREATE TABLE `departamento` (
  `idDepartamento` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`idDepartamento`, `nombre`) VALUES
(1, 'Francisco Morazán');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diaslaborales`
--

CREATE TABLE `diaslaborales` (
  `idDiasLaborales` int(11) NOT NULL,
  `descripcionDias` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

CREATE TABLE `direccion` (
  `idDireccion` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `siglas` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `direccion`
--

INSERT INTO `direccion` (`idDireccion`, `nombre`, `siglas`) VALUES
(1, 'Catastro', 'C'),
(2, 'Regularización Predial', 'RP'),
(3, 'Propiedad Intelectual', 'PI'),
(4, 'Registro Inmueble', 'RI');

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
(1, '2', 1, 2, 'marion.gomez@ip.gob.hn', 'jonathan.laux'),
(3, '3', 2, 2, 'anag.zavala@ip.gob.hn', 'anag.zavala'),
(4, '0801', 3, 2, 'tecnico@ip.gob.hn', 'tecnico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

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

CREATE TABLE `jornadalaboral` (
  `idJornadaLaboral` int(11) NOT NULL,
  `Ventanilla_idVentanilla` int(11) NOT NULL,
  `TipoJornadaLaboral_idTipoJornadaLaboral` int(11) NOT NULL,
  `obs` varchar(1000) DEFAULT NULL,
  `horasFueraVentanilla` int(11) DEFAULT NULL,
  `minutosFueraVentanilla` int(11) DEFAULT NULL,
  `segundosFueraVentanilla` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `Empleado_idEmpleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `jornadalaboral`
--

INSERT INTO `jornadalaboral` (`idJornadaLaboral`, `Ventanilla_idVentanilla`, `TipoJornadaLaboral_idTipoJornadaLaboral`, `obs`, `horasFueraVentanilla`, `minutosFueraVentanilla`, `segundosFueraVentanilla`, `fecha`, `Empleado_idEmpleado`) VALUES
(1, 1, 1, NULL, NULL, 2, 7, NULL, 1),
(2, 2, 1, NULL, NULL, 0, 0, '2022-06-07', 3),
(3, 3, 1, NULL, NULL, NULL, NULL, '2022-06-27', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE `municipio` (
  `idMunicipio` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `Departamento_idDepartamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`idMunicipio`, `nombre`, `Departamento_idDepartamento`) VALUES
(1, 'Distrito Central', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` int(11) NOT NULL,
  `nombreRol` varchar(45) DEFAULT NULL,
  `descripcionRol` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `nombreRol`, `descripcionRol`) VALUES
(1, 'Administrador', 'El administrador tiene acceso a todas las funciones del sistema, puede crear turnos, crear y deshabilitar usuarios, crear y deshabilitar ventanillas.'),
(2, 'Ventanilla', 'El usuario de ventanilla unicamente podra llamar y atender tickets.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede`
--

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
(10, 2, 'Solicitudes de Títulos de Propiedad ', ''),
(11, 2, 'Consultas Generales ', ''),
(12, 3, 'Marcas', ''),
(13, 3, 'Búsqueda de Antecedentes Registrales ', ''),
(14, 3, 'Derecho de Autor y Firma Electrónica', ''),
(15, 3, 'Patente', ''),
(16, 3, 'Escritos Legales ', ''),
(17, 3, 'Archivo', ''),
(18, 4, 'Presentación Poderes y Sentencias', 'Poderes y Sentencias'),
(19, 4, 'Presentación Civiles', 'Compraventas,Donaciones,Tradición de Dominios y Documentos Civiles en general'),
(20, 4, 'Retiro', 'Retiro de los documentos y solicitudes'),
(21, 4, 'Solicitudes', 'Integras y Constancias de Libertad de Gravamen.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tramiteshabilitadoventanilla`
--

CREATE TABLE `tramiteshabilitadoventanilla` (
  `idTramitesHabilitadoVentanilla` int(11) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `Ventanilla_idVentanilla` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tramiteshabilitadoventanilla`
--

INSERT INTO `tramiteshabilitadoventanilla` (`idTramitesHabilitadoVentanilla`, `descripcion`, `Ventanilla_idVentanilla`) VALUES
(1, 'Presentar,Poderes y Sentencias,Solicitudes', 1),
(2, 'Presentar,Poderes y Sentencias,Solicitudes', 2),
(3, 'Presentar,Poderes y Sentencias,Retirar,Solicitudes', 3);

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
('0801', 'tecnico', 'tecnico', 'tecnico', 'tecnico', NULL, NULL, NULL, NULL),
('0801200120792', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1', 'Marvin', 'Elmer', 'Oseguera', 'Wrynn', '33945421', NULL, NULL, 'marvin@gmail.com'),
('2', 'Jonathan', 'Joel', 'Laux', 'Brizo', '33652145', NULL, NULL, 'jonathan@gmail.com'),
('3', 'Ana', 'Banana', 'Gonzales', 'Zavala', '33333333', 0, 0, 'anag@gmail.com'),
('4', 'Johana', 'Andrea', 'Herrera', 'Sanchez', '22222222', 0, 0, 'correo@gmail.com'),
('5', 'Reynaldo', 'Vladimir', 'Perez', 'Pereira', '12345678', 1, 1, 'correo1@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventanilla`
--

CREATE TABLE `ventanilla` (
  `idVentanilla` int(11) NOT NULL,
  `Direccion_idDireccion` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `numero` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ventanilla`
--

INSERT INTO `ventanilla` (`idVentanilla`, `Direccion_idDireccion`, `nombre`, `numero`) VALUES
(1, 1, 'Ventanilla 1', '1'),
(2, 4, 'Ventanilla 2', '2'),
(3, 3, 'Ventanilla 3', '3');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`idBitacora`,`Sede_idSede`),
  ADD KEY `fk_Bitacora_Usuario_idx` (`Usuario_idUsuario`),
  ADD KEY `fk_Bitacora_Tramite1_idx` (`Tramite_idTramite`),
  ADD KEY `fk_Bitacora_Sede1_idx` (`Sede_idSede`),
  ADD KEY `fk_Bitacora_Direccion1_idx` (`Direccion_idDireccion`);

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
  ADD KEY `fk_Empleado_Usuario1_idx` (`Usuario_idUsuario`),
  ADD KEY `fk_Empleado_Ventanilla1_idx` (`Ventanilla_idVentanilla`),
  ADD KEY `fk_Empleado_Rol1_idx` (`Rol_idRol`);

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
  ADD KEY `fk_JornadaLaboral_TipoJornadaLaboral1_idx` (`TipoJornadaLaboral_idTipoJornadaLaboral`),
  ADD KEY `fk_JornadaLaboral_Empleado1_idx` (`Empleado_idEmpleado`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`idMunicipio`),
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
  ADD KEY `fk_TramitesHabilitadoVentanilla_Ventanilla1_idx` (`Ventanilla_idVentanilla`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

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
  MODIFY `idColaGeneral` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

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
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD CONSTRAINT `fk_Bitacora_Direccion1` FOREIGN KEY (`Direccion_idDireccion`) REFERENCES `direccion` (`idDireccion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Bitacora_Sede1` FOREIGN KEY (`Sede_idSede`) REFERENCES `sede` (`idSede`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Bitacora_Tramite1` FOREIGN KEY (`Tramite_idTramite`) REFERENCES `tramite` (`idTramite`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Bitacora_Usuario` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `fk_JornadaLaboral_TipoJornadaLaboral1` FOREIGN KEY (`TipoJornadaLaboral_idTipoJornadaLaboral`) REFERENCES `tipojornadalaboral` (`idTipoJornadaLaboral`) ON DELETE NO ACTION ON UPDATE NO ACTION,
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
