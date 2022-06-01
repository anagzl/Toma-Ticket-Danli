-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-06-2022 a las 04:51:19
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bitacora_servicio_cliente_ip para importar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `idBitacora` int(11) NOT NULL,
  `Sede_idSede` int(11) NOT NULL,
  `Usuario_idUsuario` varchar(15) NOT NULL,
  `Instituciones_idInstituciones` int(11) NOT NULL,
  `Tramite_idTramite` int(11) NOT NULL,
  `Direccion_idDireccion` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `horaGeneracionTicket` time DEFAULT NULL,
  `horaEntrada` time DEFAULT NULL,
  `horaSalida` time DEFAULT NULL,
  `Observacion` varchar(1000) DEFAULT NULL,
  `numeroTicket` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`idBitacora`, `Sede_idSede`, `Usuario_idUsuario`, `Instituciones_idInstituciones`, `Tramite_idTramite`, `Direccion_idDireccion`, `fecha`, `horaGeneracionTicket`, `horaEntrada`, `horaSalida`, `Observacion`, `numeroTicket`) VALUES
(1, 1, '1', 1, 1, 1, '2022-05-25', '13:40:41', '13:28:00', NULL, NULL, 1),
(2, 1, '1', 1, 2, 1, '0000-00-00', NULL, '12:59:00', NULL, NULL, 2);

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
(1, 'Francisco Morazan'),
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
(1, 'Catastro', 'C');

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
  `Usuario_idUsuario` varchar(15) NOT NULL,
  `Ventanilla_idVentanilla` int(11) NOT NULL,
  `TipoJornadaLaboral_idTipoJornadaLaboral` int(11) NOT NULL,
  `obs` varchar(1000) DEFAULT NULL,
  `tiempoFueraVentanilla` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 'Distrito Central', 1),
(2, 'Marale', 1),
(3, 'El Porvenir', 1),
(4, 'Orica', 1),
(5, 'Vallecillo', 1),
(7, 'Cedros', 1),
(8, 'Guaimaca', 1),
(9, 'Talanga', 1),
(10, 'Cantarranas', 1),
(11, 'Santa Lucía', 1),
(12, 'Valle de Angeles', 1),
(13, 'Villa de San Francisco', 1),
(14, 'San Antonio de Oriente', 1),
(15, 'Tatumbla', 1),
(16, 'Lepaterique', 1),
(17, 'Ojojona', 1),
(18, 'Santa Ana', 1),
(19, 'San Buenaventura', 1),
(20, 'Maraita', 1),
(21, 'Curaren', 1),
(22, 'Reitoca', 1),
(23, 'Sabanagrande', 1),
(24, 'Nueva Armenia', 1),
(25, 'La Venta', 1),
(26, 'Alubarén', 1),
(27, 'San Miguelito', 1),
(28, 'La Libertad', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` int(11) NOT NULL,
  `nombreRol` varchar(45) DEFAULT NULL,
  `descripcionRol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `nombreRol`, `descripcionRol`) VALUES
(1, 'Cliente', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede`
--

CREATE TABLE `sede` (
  `idSede` int(11) NOT NULL,
  `Ubicacion_idUbicacion` int(11) NOT NULL,
  `nombreLocalidad` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sede`
--

INSERT INTO `sede` (`idSede`, `Ubicacion_idUbicacion`, `nombreLocalidad`) VALUES
(1, 1, 'Sede');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticketcatastro`
--

CREATE TABLE `ticketcatastro` (
  `idTicketCatastro` int(11) NOT NULL,
  `Bitacora_idBitacora` int(11) NOT NULL,
  `Bitacora_Sede_idSede` int(11) NOT NULL,
  `disponibilidad` tinyint(1) DEFAULT NULL,
  `preferencia` tinyint(1) DEFAULT NULL,
  `vecesLlamado` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ticketcatastro`
--

INSERT INTO `ticketcatastro` (`idTicketCatastro`, `Bitacora_idBitacora`, `Bitacora_Sede_idSede`, `disponibilidad`, `preferencia`, `vecesLlamado`) VALUES
(1, 1, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticketpredial`
--

CREATE TABLE `ticketpredial` (
  `idTicketPredial` int(11) NOT NULL,
  `Bitacora_idBitacora` int(11) NOT NULL,
  `Bitacora_Sede_idSede` int(11) NOT NULL,
  `disponibilidad` tinyint(1) DEFAULT NULL,
  `preferencia` tinyint(1) DEFAULT NULL,
  `vecesLlamado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticketpropiedadintelectual`
--

CREATE TABLE `ticketpropiedadintelectual` (
  `idTicketPropiedadIntelectual` int(11) NOT NULL,
  `Bitacora_idBitacora` int(11) NOT NULL,
  `Bitacora_Sede_idSede` int(11) NOT NULL,
  `disponibilidad` tinyint(1) DEFAULT NULL,
  `preferencia` tinyint(1) DEFAULT NULL,
  `vecesLlamado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticketregistroinmueble`
--

CREATE TABLE `ticketregistroinmueble` (
  `idTicketRegistroInmueble` int(11) NOT NULL,
  `Bitacora_idBitacora` int(11) NOT NULL,
  `Bitacora_Sede_idSede` int(11) NOT NULL,
  `disponibilidad` tinyint(1) DEFAULT NULL,
  `preferencia` tinyint(1) DEFAULT NULL,
  `vecesLlamado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoinstitucion`
--

CREATE TABLE `tipoinstitucion` (
  `idTipoInstitucion` int(11) NOT NULL,
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
  `horaSalida` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 'Tipo de usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tramite`
--

CREATE TABLE `tramite` (
  `idTramite` int(11) NOT NULL,
  `nombreTramite` varchar(45) DEFAULT NULL,
  `descripcionTramite` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tramite`
--

INSERT INTO `tramite` (`idTramite`, `nombreTramite`, `descripcionTramite`) VALUES
(1, 'Presentar', 'El cliente presenta a documentacion necesaria '),
(2, 'Poderes y Sentencias', 'Este es el tramite de poderes y sentencias no se que mas poner');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tramiteshabilitadoventanilla`
--

CREATE TABLE `tramiteshabilitadoventanilla` (
  `idTramitesHabilitadoVentanilla` int(11) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `Ventanilla_idVentanilla` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion`
--

CREATE TABLE `ubicacion` (
  `idUbicacion` int(11) NOT NULL,
  `Municipio_idMunicipio` int(11) NOT NULL,
  `nombreUbicacion` varchar(45) DEFAULT NULL,
  `siglas` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ubicacion`
--

INSERT INTO `ubicacion` (`idUbicacion`, `Municipio_idMunicipio`, `nombreUbicacion`, `siglas`) VALUES
(1, 1, 'Centro Civico Gubernamental', 'CCG');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` varchar(15) NOT NULL,
  `Genero_idGenero` int(11) NOT NULL,
  `TipoUsuario_idTipoUsuario` int(11) NOT NULL,
  `Rol_idRol` int(11) NOT NULL,
  `primerNombre` varchar(45) DEFAULT NULL,
  `segundoNombre` varchar(45) DEFAULT NULL,
  `primerApellido` varchar(45) DEFAULT NULL,
  `segundoApellido` varchar(45) DEFAULT NULL,
  `numeroCelular` varchar(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `Genero_idGenero`, `TipoUsuario_idTipoUsuario`, `Rol_idRol`, `primerNombre`, `segundoNombre`, `primerApellido`, `segundoApellido`, `numeroCelular`, `correo`) VALUES
('1', 2, 1, 1, 'Marvin', 'Elmer', 'Oseguera', 'Wrynn', '33945421', 'marvin@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventanilla`
--

CREATE TABLE `ventanilla` (
  `idVentanilla` int(11) NOT NULL,
  `Direccion_idDireccion` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  ADD KEY `fk_Bitacora_Instituciones1_idx` (`Instituciones_idInstituciones`),
  ADD KEY `fk_Bitacora_Sede1_idx` (`Sede_idSede`),
  ADD KEY `fk_Bitacora_Direccion1_idx` (`Direccion_idDireccion`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`idDepartamento`);

--
-- Indices de la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD PRIMARY KEY (`idDireccion`);

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
  ADD KEY `fk_JornadaLaboral_Usuario1_idx` (`Usuario_idUsuario`),
  ADD KEY `fk_JornadaLaboral_Ventanilla1_idx` (`Ventanilla_idVentanilla`),
  ADD KEY `fk_JornadaLaboral_TipoJornadaLaboral1_idx` (`TipoJornadaLaboral_idTipoJornadaLaboral`);

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
  ADD KEY `fk_Sede_Ubicacion1_idx` (`Ubicacion_idUbicacion`);

--
-- Indices de la tabla `ticketcatastro`
--
ALTER TABLE `ticketcatastro`
  ADD PRIMARY KEY (`idTicketCatastro`),
  ADD UNIQUE KEY `Bitacora_idBitacora_UNIQUE` (`Bitacora_idBitacora`),
  ADD KEY `fk_TicketCatastro_Bitacora1_idx` (`Bitacora_idBitacora`,`Bitacora_Sede_idSede`);

--
-- Indices de la tabla `ticketpredial`
--
ALTER TABLE `ticketpredial`
  ADD PRIMARY KEY (`idTicketPredial`),
  ADD KEY `fk_TicketPredial_Bitacora1_idx` (`Bitacora_idBitacora`,`Bitacora_Sede_idSede`);

--
-- Indices de la tabla `ticketpropiedadintelectual`
--
ALTER TABLE `ticketpropiedadintelectual`
  ADD PRIMARY KEY (`idTicketPropiedadIntelectual`),
  ADD KEY `fk_TicketPropiedadIntelectual_Bitacora1_idx` (`Bitacora_idBitacora`,`Bitacora_Sede_idSede`);

--
-- Indices de la tabla `ticketregistroinmueble`
--
ALTER TABLE `ticketregistroinmueble`
  ADD PRIMARY KEY (`idTicketRegistroInmueble`),
  ADD KEY `fk_TicketRegistroInmueble_Bitacora1_idx` (`Bitacora_idBitacora`,`Bitacora_Sede_idSede`);

--
-- Indices de la tabla `tipoinstitucion`
--
ALTER TABLE `tipoinstitucion`
  ADD PRIMARY KEY (`idTipoInstitucion`);

--
-- Indices de la tabla `tipojornadalaboral`
--
ALTER TABLE `tipojornadalaboral`
  ADD PRIMARY KEY (`idTipoJornadaLaboral`);

--
-- Indices de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`idTipoUsuario`);

--
-- Indices de la tabla `tramite`
--
ALTER TABLE `tramite`
  ADD PRIMARY KEY (`idTramite`);

--
-- Indices de la tabla `tramiteshabilitadoventanilla`
--
ALTER TABLE `tramiteshabilitadoventanilla`
  ADD PRIMARY KEY (`idTramitesHabilitadoVentanilla`),
  ADD KEY `fk_TramitesHabilitadoVentanilla_Ventanilla1_idx` (`Ventanilla_idVentanilla`);

--
-- Indices de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  ADD PRIMARY KEY (`idUbicacion`),
  ADD KEY `fk_Ubicacion_Municipio1_idx` (`Municipio_idMunicipio`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `fk_Usuario_Genero1_idx` (`Genero_idGenero`),
  ADD KEY `fk_Usuario_TipoUsuario1_idx` (`TipoUsuario_idTipoUsuario`),
  ADD KEY `fk_Usuario_Rol1_idx` (`Rol_idRol`);

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
  ADD CONSTRAINT `fk_Bitacora_Instituciones1` FOREIGN KEY (`Instituciones_idInstituciones`) REFERENCES `institucion` (`idInstituciones`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Bitacora_Sede1` FOREIGN KEY (`Sede_idSede`) REFERENCES `sede` (`idSede`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Bitacora_Tramite1` FOREIGN KEY (`Tramite_idTramite`) REFERENCES `tramite` (`idTramite`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Bitacora_Usuario` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `institucion`
--
ALTER TABLE `institucion`
  ADD CONSTRAINT `fk_Instituciones_TipoInstitucion1` FOREIGN KEY (`TipoInstitucion_idTipoInstitucion`) REFERENCES `tipoinstitucion` (`idTipoInstitucion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `jornadalaboral`
--
ALTER TABLE `jornadalaboral`
  ADD CONSTRAINT `fk_JornadaLaboral_TipoJornadaLaboral1` FOREIGN KEY (`TipoJornadaLaboral_idTipoJornadaLaboral`) REFERENCES `tipojornadalaboral` (`idTipoJornadaLaboral`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_JornadaLaboral_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
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
  ADD CONSTRAINT `fk_Sede_Ubicacion1` FOREIGN KEY (`Ubicacion_idUbicacion`) REFERENCES `ubicacion` (`idUbicacion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ticketcatastro`
--
ALTER TABLE `ticketcatastro`
  ADD CONSTRAINT `fk_TicketCatastro_Bitacora1` FOREIGN KEY (`Bitacora_idBitacora`,`Bitacora_Sede_idSede`) REFERENCES `bitacora` (`idBitacora`, `Sede_idSede`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ticketpredial`
--
ALTER TABLE `ticketpredial`
  ADD CONSTRAINT `fk_TicketPredial_Bitacora1` FOREIGN KEY (`Bitacora_idBitacora`,`Bitacora_Sede_idSede`) REFERENCES `bitacora` (`idBitacora`, `Sede_idSede`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ticketpropiedadintelectual`
--
ALTER TABLE `ticketpropiedadintelectual`
  ADD CONSTRAINT `fk_TicketPropiedadIntelectual_Bitacora1` FOREIGN KEY (`Bitacora_idBitacora`,`Bitacora_Sede_idSede`) REFERENCES `bitacora` (`idBitacora`, `Sede_idSede`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ticketregistroinmueble`
--
ALTER TABLE `ticketregistroinmueble`
  ADD CONSTRAINT `fk_TicketRegistroInmueble_Bitacora1` FOREIGN KEY (`Bitacora_idBitacora`,`Bitacora_Sede_idSede`) REFERENCES `bitacora` (`idBitacora`, `Sede_idSede`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tramiteshabilitadoventanilla`
--
ALTER TABLE `tramiteshabilitadoventanilla`
  ADD CONSTRAINT `fk_TramitesHabilitadoVentanilla_Ventanilla1` FOREIGN KEY (`Ventanilla_idVentanilla`) REFERENCES `ventanilla` (`idVentanilla`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  ADD CONSTRAINT `fk_Ubicacion_Municipio1` FOREIGN KEY (`Municipio_idMunicipio`) REFERENCES `municipio` (`idMunicipio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_Usuario_Genero1` FOREIGN KEY (`Genero_idGenero`) REFERENCES `genero` (`idGenero`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Usuario_Rol1` FOREIGN KEY (`Rol_idRol`) REFERENCES `rol` (`idRol`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Usuario_TipoUsuario1` FOREIGN KEY (`TipoUsuario_idTipoUsuario`) REFERENCES `tipousuario` (`idTipoUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ventanilla`
--
ALTER TABLE `ventanilla`
  ADD CONSTRAINT `fk_Ventanilla_Direccion1` FOREIGN KEY (`Direccion_idDireccion`) REFERENCES `direccion` (`idDireccion`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
