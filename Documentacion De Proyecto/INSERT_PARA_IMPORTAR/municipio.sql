-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-07-2022 a las 18:01:20
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
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`idMunicipio`, `nombre`, `Departamento_idDepartamento`) VALUES
(78, ' San Juan de Opoa', 5),
(145, 'Aguanqueterique', 11),
(119, 'Ahuas', 8),
(279, 'Ajuterique', 18),
(99, 'Alauca', 7),
(270, 'Alianza', 17),
(25, 'Alubarén', 1),
(271, 'Amapala', 17),
(48, 'Apacilagua', 4),
(238, 'Arada', 15),
(272, 'Aramecina', 17),
(259, 'Arenal', 16),
(28, 'Arizona', 2),
(242, 'Atima', 15),
(248, 'Azacualpa', 15),
(38, 'Balfate', 3),
(164, 'Belén', 12),
(192, 'Belén Gualcho', 13),
(45, 'Bonito Oriental', 3),
(118, 'Brus Laguna', 8),
(63, 'Cabañas', 5),
(146, 'Cabanas', 11),
(124, 'Camasca', 9),
(208, 'Campamento', 14),
(165, 'Candelaria', 12),
(147, 'Cane', 11),
(273, 'Caridad', 17),
(209, 'Catacamas', 14),
(6, 'Cedros', 1),
(234, 'Ceguaca', 15),
(148, 'Chinaca', 11),
(231, 'Chinda', 15),
(87, 'Choloma', 6),
(47, 'Choluteca', 4),
(66, 'Cocuyugua', 5),
(166, 'Cololaca', 12),
(125, 'Colomoncagua', 9),
(278, 'Comayagua', 18),
(85, 'Concepción', 5),
(126, 'Concepción', 9),
(193, 'Concepción', 13),
(49, 'Concepción de María', 4),
(245, 'Concepción del Norte', 15),
(236, 'Concepción del Sur', 15),
(210, 'Concordia', 14),
(64, 'Copán Ruinas', 5),
(65, 'Corquín', 5),
(20, 'Curaren', 1),
(100, 'Danli', 7),
(1, 'Distrito Central', 1),
(67, 'Dolores', 5),
(127, 'Dolores', 9),
(194, 'Dolores Merendón', 13),
(68, 'Dulce Nombre ', 5),
(211, 'Dulce nombre de culmi', 14),
(50, 'Duyure', 4),
(51, 'El Corpus', 4),
(260, 'El Negrito', 16),
(240, 'El Níspero', 15),
(69, 'El Paraíso ', 5),
(101, 'El Paraíso', 7),
(3, 'El Porvenir', 1),
(29, 'El Porvenir', 2),
(261, 'El Progreso', 16),
(212, 'El Rosario', 14),
(280, 'El Rosario', 18),
(52, 'El Triunfo', 4),
(167, 'Erandique', 12),
(30, 'Esparta', 2),
(281, 'Esquias', 18),
(213, 'Esquipulas del norte', 14),
(70, 'Florida', 5),
(195, 'Fraternidad', 13),
(229, 'Froylan Turcios ', 14),
(274, 'Goascoran', 17),
(163, 'Gracias', 12),
(7, 'Guaimaca', 1),
(149, 'Guajiquiro', 11),
(214, 'Gualaco', 14),
(233, 'Gualala', 15),
(168, 'Gualcinse', 12),
(141, 'Guanaja', 10),
(169, 'Guarita', 12),
(215, 'Guarizama', 14),
(216, 'Guata', 14),
(217, 'Guayape', 14),
(102, 'Güinope', 7),
(282, 'Humuya', 18),
(232, 'Ilama', 15),
(128, 'Intibucá', 9),
(103, 'Jacalepa', 7),
(218, 'Jano', 14),
(129, 'Jesus de Otoro', 9),
(262, 'Jocón', 16),
(142, 'José Santos Guardiola', 10),
(31, 'Jutiapa', 2),
(207, 'Juticalpa', 14),
(170, 'La campa', 12),
(32, 'La Ceiba', 2),
(196, 'La Encarnación', 13),
(123, 'La Esperanza', 9),
(121, 'La Esperanza o El Cacao', 8),
(171, 'La iguala', 12),
(71, 'La Jigua', 5),
(197, 'La Labor', 13),
(27, 'La Libertad', 1),
(283, 'La Libertad', 18),
(97, 'La Lima', 6),
(144, 'La Paz', 11),
(285, 'La Trinidad', 18),
(173, 'La Unión', 12),
(219, 'La Unión', 14),
(24, 'La Venta', 1),
(174, 'La Virtud', 12),
(284, 'Lamani', 18),
(275, 'Langue', 17),
(175, 'Lapaera', 12),
(172, 'Las flores', 12),
(35, 'Las Lagunas', 2),
(296, 'Las Lajas', 18),
(255, 'Las Vegas', 15),
(150, 'Lauterique', 11),
(286, 'Lejamani', 18),
(15, 'Lepaterique', 1),
(40, 'Limón', 3),
(104, 'Liure', 7),
(198, 'Lucema', 13),
(254, 'Macuelizo', 15),
(130, 'Magdalena', 9),
(220, 'Mangulile', 14),
(221, 'Manto', 14),
(176, 'Mapulaca', 12),
(19, 'Maraita', 1),
(2, 'Marale', 1),
(151, 'Marcala', 11),
(53, 'Marcovia', 4),
(131, 'Masaguara', 9),
(33, 'Masica', 2),
(287, 'Meambar', 18),
(199, 'Mercedes', 13),
(152, 'Mercedes de Oriente', 11),
(288, 'Minas de Oro', 18),
(263, 'Morazán', 16),
(105, 'Morocelí', 7),
(54, 'Morolica', 4),
(269, 'Nacaome', 17),
(55, 'Namasigüe', 4),
(252, 'Naranjito', 15),
(73, 'Nueva Arcadia', 5),
(23, 'Nueva Armenia', 1),
(256, 'Nueva Frontera', 15),
(246, 'Nuevo Celilac', 15),
(191, 'Ocotepeque', 13),
(16, 'Ojojona', 1),
(289, 'Ojos de Agua', 18),
(264, 'Olanchito', 16),
(88, 'Omoa', 6),
(153, 'Opatoro', 11),
(4, 'Orica', 1),
(39, 'Oriona', 3),
(56, 'Orocuina', 4),
(106, 'Oropopí', 7),
(57, 'Pespire', 4),
(247, 'Petoa', 15),
(89, 'Pimienta', 6),
(177, 'Piraera', 12),
(90, 'Potrerillos', 6),
(107, 'Potrerillos', 7),
(253, 'Protección', 15),
(91, 'Puerto Cortes', 6),
(117, 'Puerto Lempira', 8),
(251, 'Quimistán', 15),
(21, 'Reitoca', 1),
(140, 'Roatán', 10),
(41, 'Sabá', 3),
(22, 'Sabanagrande', 1),
(222, 'Salamá', 14),
(74, 'San Agustín', 5),
(178, 'San Andrés', 12),
(75, 'San Antonio', 5),
(132, 'San Antonio', 9),
(92, 'San Antonio de Cortés', 6),
(58, 'San Antonio de Flores', 4),
(108, 'San Antonio de Flores', 7),
(13, 'San Antonio de Oriente', 1),
(154, 'San Antonio del Norte', 11),
(18, 'San Buenaventura', 1),
(223, 'San Esteban', 14),
(200, 'San Fernando', 13),
(34, 'San Francisco', 2),
(179, 'San Francisco', 12),
(224, 'San francisco de becerra', 14),
(276, 'San Francisco de Coray', 17),
(225, 'San francisco de la paz', 14),
(235, 'San Francisco de Ojuera', 15),
(93, 'San Francisco de Yojoa', 6),
(201, 'San Francisco del Valle', 13),
(139, 'San Francisco Opalaca', 9),
(9, 'San Ignacio', 1),
(59, 'San Isidro', 4),
(133, 'San Isidro', 9),
(76, 'San Jerónimo', 5),
(290, 'San Jerónimo', 18),
(202, 'San Jorge', 13),
(60, 'San José', 4),
(77, 'San José ', 5),
(155, 'San José', 11),
(291, 'San José Comayagua', 18),
(257, 'San José de Colinas', 15),
(292, 'San José del Potrero', 18),
(156, 'San Juan', 11),
(134, 'San Juan de Flores', 1),
(180, 'San Juan Guarita', 12),
(277, 'San Lorenzo', 17),
(109, 'San Lucas', 7),
(249, 'San Luis', 15),
(293, 'San Luis', 18),
(94, 'San Manuel', 6),
(181, 'San Manuel Colohete', 12),
(203, 'San Marcos', 13),
(250, 'San Marcos', 15),
(190, 'San Marcos de Caiquín', 12),
(61, 'San Marcos de Colón', 4),
(135, 'San Marcos de la Sierra', 9),
(110, 'San Matías', 7),
(136, 'San Miguel Guancapla', 9),
(26, 'San Miguelito', 1),
(79, 'San Nicolás', 5),
(241, 'San Nicolás', 15),
(80, 'San Pedro', 5),
(157, 'San Pedro de Tutule', 11),
(237, 'San Pedro de Zacapa', 15),
(86, 'San Pedro Sula', 6),
(182, 'San Rafel', 12),
(183, 'San Sebastian', 12),
(298, 'San Sebastián', 18),
(243, 'San Vicente Centenario', 15),
(17, 'Santa Ana', 1),
(158, 'Santa Ana', 11),
(62, 'Santa Ana de Yusguare', 4),
(230, 'Santa Barbara', 15),
(184, 'Santa Cruz', 12),
(95, 'Santa Cruz de Yojoa', 6),
(159, 'Santa Elena', 11),
(46, 'Santa fe', 3),
(204, 'Santa Fe', 13),
(10, 'Santa Lucía', 1),
(137, 'Santa Lucía', 9),
(160, 'Santa María', 11),
(226, 'Santa María del real', 14),
(81, 'Santa Rita ', 5),
(239, 'Santa Rita', 15),
(265, 'Santa Rita', 16),
(42, 'Santa Rosa de Aguán', 3),
(84, 'Santa rosa de Copán', 5),
(161, 'Santiago Puringla', 11),
(205, 'Sensenti', 13),
(294, 'Siguatepeque', 18),
(227, 'Silca', 14),
(206, 'Sinuapa', 13),
(111, 'Soledad', 7),
(43, 'Sonaguera', 3),
(266, 'Sulaco', 16),
(8, 'Talanga', 1),
(185, 'Talgua', 12),
(186, 'Tambla', 12),
(14, 'Tatumbla', 1),
(297, 'Taulabe', 18),
(36, 'Tela', 2),
(112, 'Teupasenti', 7),
(113, 'Texiguat', 7),
(44, 'Tocoa', 3),
(187, 'Tomala', 12),
(82, 'Trinidad', 5),
(244, 'Trinidad', 15),
(114, 'Trojes', 7),
(37, 'Trujillo', 3),
(72, 'Unión', 5),
(143, 'Utila', 10),
(115, 'Vado Ancho', 7),
(188, 'Valladolid', 12),
(11, 'Valle de Angeles', 1),
(5, 'Vallecillo', 1),
(83, 'Veracruz ', 5),
(267, 'Victoria', 16),
(295, 'Villa de San Antonio', 18),
(12, 'Villa de San Francisco', 1),
(96, 'Villanueva', 6),
(120, 'Villeda Morales', 8),
(189, 'Virginia', 12),
(122, 'Wampusirpe', 8),
(138, 'Yamaranguila', 9),
(162, 'Yarula', 11),
(116, 'Yauyupe', 7),
(228, 'Yocón ', 14),
(268, 'Yorito', 16),
(258, 'Yoro', 16),
(98, 'Yuscarán', 7);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
