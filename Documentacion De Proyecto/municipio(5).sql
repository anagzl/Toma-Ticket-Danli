-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-06-2022 a las 19:49:11
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
(6, 'Cedros', 1),
(7, 'Guaimaca', 1),
(8, 'Talanga', 1),
(9, 'San Ignacio', 1),
(10, 'Santa Lucía', 1),
(11, 'Valle de Angeles', 1),
(12, 'Villa de San Francisco', 1),
(13, 'San Antonio de Oriente', 1),
(14, 'Tatumbla', 1),
(15, 'Lepaterique', 1),
(16, 'Ojojona', 1),
(17, 'Santa Ana', 1),
(18, 'San Buenaventura', 1),
(19, 'Maraita', 1),
(20, 'Curaren', 1),
(21, 'Reitoca', 1),
(22, 'Sabanagrande', 1),
(23, 'Nueva Armenia', 1),
(24, 'La Venta', 1),
(25, 'Alubarén', 1),
(26, 'San Miguelito', 1),
(27, 'La Libertad', 1),
(28, 'Arizona', 2),
(29, 'El Porvenir', 2),
(30, 'Esparta', 2),
(31, 'Jutiapa', 2),
(32, 'La Ceiba', 2),
(33, 'Masica', 2),
(34, 'San Francisco', 2),
(35, 'Las Lagunas', 2),
(36, 'Tela', 2),
(37, 'Trujillo', 3),
(38, 'Balfate', 3),
(39, 'Oriona', 3),
(40, 'Limón', 3),
(41, 'Sabá', 3),
(42, 'Santa Rosa de Aguán', 3),
(43, 'Sonaguera', 3),
(44, 'Tocoa', 3),
(45, 'Bonito Oriental', 3),
(46, 'Santa fe', 3),
(47, 'Choluteca', 4),
(48, 'Apacilagua', 4),
(49, 'Concepción de María', 4),
(50, 'Duyure', 4),
(51, 'El Corpus', 4),
(52, 'El Triunfo', 4),
(53, 'Marcovia', 4),
(54, 'Morolica', 4),
(55, 'Namasigüe', 4),
(56, 'Orocuina', 4),
(57, 'Pespire', 4),
(58, 'San Antonio de Flores', 4),
(59, 'San Isidro', 4),
(60, 'San José', 4),
(61, 'San Marcos de Colón', 4),
(62, 'Santa Ana de Yusguare', 4),
(63, 'Cabañas', 5),
(64, 'Copán Ruinas', 5),
(65, 'Corquín', 5),
(66, 'Cocuyugua', 5),
(67, 'Dolores', 5),
(68, 'Dulce Nombre ', 5),
(69, 'El Paraíso ', 5),
(70, 'Florida', 5),
(71, 'La Jigua', 5),
(72, 'Unión', 5),
(73, 'Nueva Arcadia', 5),
(74, 'San Agustín', 5),
(75, 'San Antonio', 5),
(76, 'San Jerónimo', 5),
(77, 'San José ', 5),
(78, ' San Juan de Opoa', 5),
(79, 'San Nicolás', 5),
(80, 'San Pedro', 5),
(81, 'Santa Rita ', 5),
(82, 'Trinidad', 5),
(83, 'Veracruz ', 5),
(84, 'Santa rosa de Copán', 5),
(85, 'Concepción', 5),
(86, 'San Pedro Sula', 6),
(87, 'Choloma', 6),
(88, 'Omoa', 6),
(89, 'Pimienta', 6),
(90, 'Potrerillos', 6),
(91, 'Puerto Cortes', 6),
(92, 'San Antonio de Cortés', 6),
(93, 'San Francisco de Yojoa', 6),
(94, 'San Manuel', 6),
(95, 'Santa Cruz de Yojoa', 6),
(96, 'Villanueva', 6),
(97, 'La Lima', 6),
(98, 'Yuscarán', 7),
(99, 'Alauca', 7),
(100, 'Danli', 7),
(101, 'El Paraíso', 7),
(102, 'Güinope', 7),
(103, 'Jacalepa', 7),
(104, 'Liure', 7),
(105, 'Morocelí', 7),
(106, 'Oropopí', 7),
(107, 'Potrerillos', 7),
(108, 'San Antonio de Flores', 7),
(109, 'San Lucas', 7),
(110, 'San Matías', 7),
(111, 'Soledad', 7),
(112, 'Teupasenti', 7),
(113, 'Texiguat', 7),
(114, 'Trojes', 7),
(115, 'Vado Ancho', 7),
(116, 'Yauyupe', 7),
(117, 'Puerto Lempira', 8),
(118, 'Brus Laguna', 8),
(119, 'Ahuas', 8),
(120, 'Villeda Morales', 8),
(121, 'La Esperanza o El Cacao', 8),
(122, 'Wampusirpe', 8),
(123, 'La Esperanza', 9),
(124, 'Camasca', 9),
(125, 'Colomoncagua', 9),
(126, 'Concepción', 9),
(127, 'Dolores', 9),
(128, 'Intibucá', 9),
(129, 'Jesus de Otoro', 9),
(130, 'Magdalena', 9),
(131, 'Masaguara', 9),
(132, 'San Antonio', 9),
(133, 'San Isidro', 9),
(134, 'San Juan de Flores', 1),
(135, 'San Marcos de la Sierra', 9),
(136, 'San Miguel Guancapla', 9),
(137, 'Santa Lucía', 9),
(138, 'Yamaranguila', 9),
(139, 'San Francisco Opalaca', 9),
(140, 'Roatán', 10),
(141, 'Guanaja', 10),
(142, 'José Santos Guardiola', 10),
(143, 'Utila', 10),
(144, 'La Paz', 11),
(145, 'Aguanqueterique', 11),
(146, 'Cabanas', 11),
(147, 'Cane', 11),
(148, 'Chinaca', 11),
(149, 'Guajiquiro', 11),
(150, 'Lauterique', 11),
(151, 'Marcala', 11),
(152, 'Mercedes de Oriente', 11),
(153, 'Opatoro', 11),
(154, 'San Antonio del Norte', 11),
(155, 'San José', 11),
(156, 'San Juan', 11),
(157, 'San Pedro de Tutule', 11),
(158, 'Santa Ana', 11),
(159, 'Santa Elena', 11),
(160, 'Santa María', 11),
(161, 'Santiago Puringla', 11),
(162, 'Yarula', 11),
(163, 'Gracias', 12),
(164, 'Belén', 12),
(165, 'Candelaria', 12),
(166, 'Cololaca', 12),
(167, 'Erandique', 12),
(168, 'Gualcinse', 12),
(169, 'Guarita', 12),
(170, 'La campa', 12),
(171, 'La iguala', 12),
(172, 'Las flores', 12),
(173, 'La Unión', 12),
(174, 'La Virtud', 12),
(175, 'Lapaera', 12),
(176, 'Mapulaca', 12),
(177, 'Piraera', 12),
(178, 'San Andrés', 12),
(179, 'San Francisco', 12),
(180, 'San Juan Guarita', 12),
(181, 'San Manuel Colohete', 12),
(182, 'San Rafel', 12),
(183, 'San Sebastian', 12),
(184, 'Santa Cruz', 12),
(185, 'Talgua', 12),
(186, 'Tambla', 12),
(187, 'Tomala', 12),
(188, 'Valladolid', 12),
(189, 'Virginia', 12),
(190, 'San Marcos de Caiquín', 12),
(191, 'Ocotepeque', 13),
(192, 'Belén Gualcho', 13),
(193, 'Concepción', 13),
(194, 'Dolores Merendón', 13),
(195, 'Fraternidad', 13),
(196, 'La Encarnación', 13),
(197, 'La Labor', 13),
(198, 'Lucema', 13),
(199, 'Mercedes', 13),
(200, 'San Fernando', 13),
(201, 'San Francisco del Valle', 13),
(202, 'San Jorge', 13),
(203, 'San Marcos', 13),
(204, 'Santa Fe', 13),
(205, 'Sensenti', 13),
(206, 'Sinuapa', 13),
(207, 'Juticalpa', 14),
(208, 'Campamento', 14),
(209, 'Catacamas', 14),
(210, 'Concordia', 14),
(211, 'Dulce nombre de culmi', 14),
(212, 'El Rosario', 14),
(213, 'Esquipulas del norte', 14),
(214, 'Gualaco', 14),
(215, 'Guarizama', 14),
(216, 'Guata', 14),
(217, 'Guayape', 14),
(218, 'Jano', 14),
(219, 'La Unión', 14),
(220, 'Mangulile', 14),
(221, 'Manto', 14),
(222, 'Salamá', 14),
(223, 'San Esteban', 14),
(224, 'San francisco de becerra', 14),
(225, 'San francisco de la paz', 14),
(226, 'Santa María del real', 14),
(227, 'Silca', 14),
(228, 'Yocón ', 14),
(229, 'Froylan Turcios ', 14),
(230, 'Santa Barbara', 15),
(231, 'Chinda', 15),
(232, 'Ilama', 15),
(233, 'Gualala', 15),
(234, 'Ceguaca', 15),
(235, 'San Francisco de Ojuera', 15),
(236, 'Concepción del Sur', 15),
(237, 'San Pedro de Zacapa', 15),
(238, 'Arada', 15),
(239, 'Santa Rita', 15),
(240, 'El Níspero', 15),
(241, 'San Nicolás', 15),
(242, 'Atima', 15),
(243, 'San Vicente Centenario', 15),
(244, 'Trinidad', 15),
(245, 'Concepción del Norte', 15),
(246, 'Nuevo Celilac', 15),
(247, 'Petoa', 15),
(248, 'Azacualpa', 15),
(249, 'San Luis', 15),
(250, 'San Marcos', 15),
(251, 'Quimistán', 15),
(252, 'Naranjito', 15),
(253, 'Protección', 15),
(254, 'Macuelizo', 15),
(255, 'Las Vegas', 15),
(256, 'Nueva Frontera', 15),
(257, 'San José de Colinas', 15),
(258, 'Yoro', 16),
(259, 'Arenal', 16),
(260, 'El Negrito', 16),
(261, 'El Progreso', 16),
(262, 'Jocón', 16),
(263, 'Morazán', 16),
(264, 'Olanchito', 16),
(265, 'Santa Rita', 16),
(266, 'Sulaco', 16),
(267, 'Victoria', 16),
(268, 'Yorito', 16),
(269, 'Nacaome', 17),
(270, 'Alianza', 17),
(271, 'Amapala', 17),
(272, 'Aramecina', 17),
(273, 'Caridad', 17),
(274, 'Goascoran', 17),
(275, 'Langue', 17),
(276, 'San Francisco de Coray', 17),
(277, 'San Lorenzo', 17),
(278, 'Comayagua', 18),
(279, 'Ajuterique', 18),
(280, 'El Rosario', 18),
(281, 'Esquias', 18),
(282, 'Humuya', 18),
(283, 'La Libertad', 18),
(284, 'Lamani', 18),
(285, 'La Trinidad', 18),
(286, 'Lejamani', 18),
(287, 'Meambar', 18),
(288, 'Minas de Oro', 18),
(289, 'Ojos de Agua', 18),
(290, 'San Jerónimo', 18),
(291, 'San José Comayagua', 18),
(292, 'San José del Potrero', 18),
(293, 'San Luis', 18),
(294, 'Siguatepeque', 18),
(295, 'Villa de San Antonio', 18),
(296, 'Las Lajas', 18),
(297, 'Taulabe', 18),
(298, 'San Sebastián', 18);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`idMunicipio`),
  ADD KEY `fk_Municipio_Departamento1_idx` (`Departamento_idDepartamento`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD CONSTRAINT `fk_Municipio_Departamento1` FOREIGN KEY (`Departamento_idDepartamento`) REFERENCES `departamento` (`idDepartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
