-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-07-2022 a las 18:02:08
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
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `numeroIdentidad`, `primerNombre`, `segundoNombre`, `primerApellido`, `segundoApellido`, `numeroCelular`, `banderaWhastapp`, `banderaEncuesta`, `correo`, `estado`) VALUES
(1, '0814199300573', 'Ana', 'Gissela', 'Zavala', 'Licona', '31799589', NULL, NULL, 'anag.zavala@ip.gob.hn', 1),
(4, '0307198700049', 'Pamela', '', 'Rivera', '', '', NULL, NULL, 'josselin.rivera@ip.gob.hn', 1),
(5, '0709196800135', 'Ada', 'Antonia', 'Ochoa', NULL, NULL, NULL, NULL, 'ada.ochoa@ip.gob,hn', 1),
(6, '0801196808329', 'José ', 'Eli', 'Rojas', 'Diaz', NULL, NULL, NULL, 'jose.rojas@ip.gob.hn', 1),
(7, '0801197108723', 'Lourdes', NULL, 'Salinas', NULL, NULL, NULL, NULL, 'lourdes.salinas@ip.gob.hn', 1),
(8, '0801197714738', 'Elkin', NULL, 'Palacios', NULL, NULL, NULL, NULL, 'ossana.palacios@ip.gob.hn', 1),
(9, '0801197914746', 'Jaime', 'Arturo', 'Vásquez', 'Duron', NULL, NULL, NULL, 'jaime.vasquez@ip.gob.hn', 1),
(10, '0801198203503', 'Erick', NULL, 'Barahona', NULL, NULL, NULL, NULL, 'erick.barahona@ip.gob.hn', 1),
(11, '0801198211439', 'Kennsy ', 'Jessenia', 'Navas', 'Guevara', NULL, NULL, NULL, 'kenssy.navas@ip.gob.hn', 1),
(12, '0801198302582', 'Leonardo ', NULL, 'Velazquez', NULL, NULL, NULL, NULL, 'leonardo.velasquez', 1),
(13, '0801198519581', 'Josselenth', 'Lonnelly', 'Palma', 'Trejo', NULL, NULL, NULL, 'josselenth.palma@ip.gob.hn', 1),
(14, '0801198709875', 'Patsy', 'Tania', 'Martínez', 'Araica', NULL, NULL, NULL, 'patsy.martinez@ip.gob.hn', 1),
(15, '0801198801115', 'Daysi', NULL, 'Ferrufino', NULL, NULL, NULL, NULL, 'daysi.ferrufino@ip.gob.hn', 1),
(16, '0801198811055', 'Maemi', 'Sarahy', 'Pineda', 'Sierra', NULL, NULL, NULL, 'maemi.pineda@ip.gob.hn', 1),
(17, '0801199300580', 'tecnico', 'tecnico', 'tecnico', 'tecnico', '31458989', NULL, NULL, 'tecnico@ip.gob.hn', 1),
(18, '0801199601821', 'Luis', 'Fernando', 'Estrada', NULL, '95049717', NULL, NULL, 'luis.estrada@ip.gob.hn', 1),
(20, '0801199722306', 'Nanci', NULL, 'Rivera', NULL, NULL, NULL, NULL, 'nanci.rivera@ip.gob.hn', 1),
(21, '0801199811399', 'Allison', NULL, 'Sauceda', NULL, NULL, NULL, NULL, 'allison.sauceda@ip.gob.hn', 1),
(22, '0801200120793', 'Jonathan', 'Joel', 'Laux', 'Brizo', '32041675', NULL, NULL, 'jonathan.laux@hotmail.com', 1),
(23, '0803197400353', 'Juan', 'Ramon', 'Barahona', 'Cuadras', NULL, NULL, NULL, 'juan.barahona@ip.gob.hn', 1),
(24, '0818197800031', 'Dania', 'Esperanza', 'Alvarado', 'Ordoñez', NULL, NULL, NULL, 'dania.alvarado@ip.gob.hn', 1),
(25, '0801197202376', 'Claudia', 'Anabel', 'Valeriano', 'Lopez', '32000000', NULL, NULL, 'claudia.valeriano@ip.gob.hn', 1),
(26, '0801200416296', 'Fabiana', 'Asenet', 'Godoy', 'Canales', '32000000', NULL, NULL, 'fabiana.godoy@ip.gob.hn', 1),
(27, '0801197400922', 'Saul', 'Antonio', 'Zambrano', 'Godoy', '32000000', NULL, NULL, 'saul.zambrano@ip.gob.hn', 1),
(28, '1801198601986', 'Carmen', 'Raquel', 'Velasquez', 'Urbina', '32000000', NULL, NULL, 'carmen.velasquez@ip.gob.hn', 1),
(29, '0801198105681', 'Alma', 'Violeta', 'Herrera', 'Flores', '32000000', NULL, NULL, 'alma.herrera@ip.gob.hn', 1),
(30, '0801197808426', 'Oscar', 'Omar', 'Funez', 'Padilla', '32000000', NULL, NULL, 'oscar.funez@ip.gob.hn', 1),
(31, '0801196707222', 'Minia', 'Adalgisa', 'Villela', 'Estrada', '32000000', NULL, NULL, 'minia.villela@ip.gob.hn', 1),
(32, '0708198500359', 'Dania', 'Rosinda', 'Salgado', 'Sosa', '32000000', NULL, NULL, 'dania.salgado@ip.gob.hn', 1),
(33, '0801197901642', 'Marlon', 'Alberto', 'Cruz', 'Herrera', '32000000', NULL, NULL, 'marlon.cruz@ip.gob.hn', 1),
(34, '0801197100941', 'Ruth', NULL, 'Lopez', NULL, '32000000', NULL, NULL, 'ruth.lopez@ip.gob.hn', 1),
(35, '0801197901699', 'Cesar', 'David', 'Aguilera', 'Flores', '32000000', NULL, NULL, 'cesar.aguilera@ip.gob.hn', 1),
(36, '0304197000172', 'Rita', 'Carolina', 'Chinchilla', NULL, '32000000', NULL, NULL, 'rita.chinchilla@ip.gob.hn', 0),
(37, '0801196101707', 'Luana', 'Carolina', 'Mondragon', NULL, '32000000', NULL, NULL, 'luana.mondragon@ip.gob.hn', 1),
(39, '0801199223300', 'Wendy', NULL, 'Montoya', NULL, '32000000', NULL, NULL, 'wendy.montoya@ip.gob.hn', 1),
(40, '0801199800758', 'Reyna', NULL, 'Izaguirre', NULL, '32000000', NULL, NULL, 'reyna.izaguirre@ip.gob.hn', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
