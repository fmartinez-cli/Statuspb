-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-03-2026 a las 15:00:23
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `statuspb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `ID` int(11) NOT NULL,
  `NoSerie` varchar(16) NOT NULL,
  `NoReloj` varchar(5) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Hora` datetime NOT NULL,
  `Comentario` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`ID`, `NoSerie`, `NoReloj`, `Nombre`, `Hora`, `Comentario`) VALUES
(5, '2M26390451', '55098', 'Omar Alejandro Mora Cruz', '2016-10-06 02:33:00', 'Corriendo Xtee en cslot 1, 2 y 3 fcont 231'),
(6, '2M26390445', '55098', 'Omar Alejandro Mora Cruz', '2016-10-06 02:33:21', 'corriendo Xtee en cslot 5, 6 y 7 fcont 231'),
(7, '2M2639044Y', '55098', 'Omar Alejandro Mora Cruz', '2016-10-06 02:33:41', 'Corriendo Xtee en  cslot 9, 10, 11 fcont 231'),
(8, '2M26390457', '55098', 'Omar Alejandro Mora Cruz', '2016-10-06 02:33:59', 'Corriendo Xtee en cslot 13, 14 y 15 fcont 231 '),
(9, '2M2639044Z', '55098', 'Omar Alejandro Mora Cruz', '2016-10-06 02:34:16', 'Corriendo Xtee en cslot  1, 2 y 3 fcont 230'),
(10, '2M26390450', '55098', 'Omar Alejandro Mora Cruz', '2016-10-06 02:34:36', 'Corriendo Xtee en cslot  5, 6 y 7 fcont 230'),
(11, '2M26390451', '55098', 'Omar Alejandro Mora Cruz', '2016-10-18 05:34:11', 'fallando  36 nodos'),
(12, '2M26390450', '54123', 'Victor Mora', '2016-10-20 06:05:57', 'fallo el nodo 3_16 de pxe '),
(13, '2M26464898', '345', 'Jafet Martinez ', '2016-10-26 05:07:40', 'Se encontro un switch defectuoso'),
(15, 'R123456798', '99999', 'ADMIN GENERAL', '2026-02-28 07:02:33', 'Todo normal dejo el Gbic en la mesa de repa'),
(16, 'R123456798', '99999', 'ADMIN GENERAL', '2026-02-28 09:52:07', 'aun no veo los comentarios'),
(17, 'R12345679874564F', '99999', 'ADMIN GENERAL', '2026-02-28 10:03:14', 'Espero ver mas comentarios aqui'),
(18, 'R12345679874564F', '99999', 'ADMIN GENERAL', '2026-02-28 10:10:30', 'Otro comentario mas\r\n'),
(19, 'R12345679874564F', '99999', 'ADMIN GENERAL', '2026-03-04 12:13:25', 'Este es un nuevo comentario como prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentariosgolden`
--

CREATE TABLE `comentariosgolden` (
  `ID` int(11) NOT NULL,
  `NoSerie` varchar(10) NOT NULL,
  `NoReloj` varchar(5) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Hora` datetime NOT NULL,
  `Comentario` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `comentariosgolden`
--

INSERT INTO `comentariosgolden` (`ID`, `NoSerie`, `NoReloj`, `Nombre`, `Hora`, `Comentario`) VALUES
(2, '2M26111111', '54966', 'Carlos Lizandro Agustin Rosales', '2016-11-15 03:30:29', 'hola');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentariostatus`
--

CREATE TABLE `comentariostatus` (
  `id` int(11) NOT NULL,
  `Comentario` text DEFAULT NULL,
  `Bahia` int(1) DEFAULT NULL,
  `No_Reloj` int(5) DEFAULT NULL,
  `turnoA` int(1) DEFAULT NULL,
  `No_Reloj2` int(5) DEFAULT NULL,
  `turnoB` int(1) DEFAULT NULL,
  `horacomentario` datetime DEFAULT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `comentariostatus`
--

INSERT INTO `comentariostatus` (`id`, `Comentario`, `Bahia`, `No_Reloj`, `turnoA`, `No_Reloj2`, `turnoB`, `horacomentario`, `descripcion`) VALUES
(49, 'Estatus liberado por 54123 el dia Wednesday a las 03:55:44', 1, 54123, 3, NULL, NULL, '2016-11-09 03:55:44', '2016-11-09 03-55-44'),
(50, 'Estatus liberado por 54123 el dia Wednesday a las 03:58:01', 1, 54123, 3, NULL, NULL, '2016-11-09 03:58:01', '2016-11-09 03-58-01'),
(51, 'Nuevo paso de estatus', 1, 54966, 3, 54123, 3, '2016-11-09 06:21:51', '2016-11-09 06-21-51'),
(52, 'Estatus liberado por 54966 el dia Miercoles a las 06:22:32', 1, 54966, 3, NULL, NULL, '2016-11-09 06:22:32', '2016-11-09 06-22-32'),
(53, 'nuevo paso de estatus gb', 1, 54966, 3, 54123, 3, '2016-11-09 06:26:33', '2016-11-09 06-26-33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentariosterminados`
--

CREATE TABLE `comentariosterminados` (
  `ID` int(11) NOT NULL,
  `NoSerie` varchar(10) NOT NULL,
  `NoReloj` varchar(5) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Hora` datetime NOT NULL,
  `Comentario` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `comentariosterminados`
--

INSERT INTO `comentariosterminados` (`ID`, `NoSerie`, `NoReloj`, `Nombre`, `Hora`, `Comentario`) VALUES
(0, 'R123456798', '99999', 'ADMIN GENERAL', '2026-02-28 07:00:46', 'Todo correctamente,se deja el gbic en la mesa de reparacion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gibics`
--

CREATE TABLE `gibics` (
  `CtGibic` varchar(10) NOT NULL,
  `Marca` varchar(15) DEFAULT NULL,
  `Bahiag` int(1) NOT NULL,
  `NoSerie` varchar(10) NOT NULL,
  `Disponible` tinyint(1) NOT NULL DEFAULT 0,
  `falla` tinyint(1) NOT NULL DEFAULT 0,
  `fecharegistro` datetime DEFAULT NULL,
  `fechafalla` datetime DEFAULT NULL,
  `No_Reloj` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `gibics`
--

INSERT INTO `gibics` (`CtGibic`, `Marca`, `Bahiag`, `NoSerie`, `Disponible`, `falla`, `fecharegistro`, `fechafalla`, `No_Reloj`) VALUES
('1GBIC11111', NULL, 2, '2M2633DF00', 0, 0, '2016-10-04 11:56:06', NULL, 54122),
('1GIBIC1111', NULL, 1, '', 1, 1, '2016-10-04 08:11:50', '2016-10-13 04:30:53', 54123),
('2GBIC22222', NULL, 2, '', 1, 0, '2016-10-04 11:56:15', NULL, 54122),
('2GIBIC2222', NULL, 1, '2M2645445P', 0, 0, '2016-10-04 08:12:49', NULL, 54123),
('6GB1111111', NULL, 6, '2M26390451', 0, 0, '2016-10-06 02:21:31', NULL, NULL),
('6GB2222222', NULL, 6, '2M26390445', 0, 0, '2016-10-06 02:21:41', NULL, NULL),
('6GB3333333', NULL, 6, '2M26390457', 0, 0, '2016-10-06 02:21:37', NULL, NULL),
('6GB4444444', NULL, 6, '2M2639044Y', 0, 0, '2016-10-06 02:21:45', NULL, NULL),
('6GB5555555', NULL, 6, '2M2639044Z', 0, 0, '2016-10-06 02:21:49', NULL, NULL),
('6GB6666666', NULL, 6, '2M26390450', 0, 0, '2016-10-06 02:21:53', NULL, NULL),
('9GBIC9999', 'enet', 1, '', 1, 0, '2016-11-04 02:43:22', NULL, 54123);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `golden`
--

CREATE TABLE `golden` (
  `NoSerie` varchar(10) NOT NULL,
  `WO` varchar(9) NOT NULL,
  `SKU` varchar(10) NOT NULL,
  `Locacion` varchar(8) NOT NULL,
  `Estatus` varchar(30) NOT NULL,
  `NoReloj` int(5) NOT NULL,
  `HoraEntrada` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `golden`
--

INSERT INTO `golden` (`NoSerie`, `WO`, `SKU`, `Locacion`, `Estatus`, `NoReloj`, `HoraEntrada`) VALUES
('2M26111111', '111111111', '1111111111', '1_1', 'XTEE-RUNNING', 55098, '2016-11-08 03:48:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id` int(11) NOT NULL,
  `user` varchar(80) NOT NULL,
  `titulo` varchar(250) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Area` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id`, `user`, `titulo`, `imagen`, `descripcion`, `fecha`, `Area`) VALUES
(87, 'Ruben Trejo', 'CAMBIO DE HORARIO', '../upload/image001.png@01D230F2.7F6CC7A0.jpg', 'IMPORTANTE!!!!', '2016-10-29 11:16:48', 'LVO'),
(88, 'Ruben Trejo', 'DIA DE MUERTOS', '../upload/image002.png@01D23118.1B402350.jpg', 'Celebracion!!!', '2016-10-29 11:18:20', 'LVO'),
(89, 'Ruben Trejo', 'SEGURIDAD', '../upload/image001.png@01D22EDC.3B3DBBB0.jpg', 'Momentos de comunicacion.', '2016-10-29 11:19:39', 'LVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticomentarios`
--

CREATE TABLE `noticomentarios` (
  `ID` int(11) NOT NULL,
  `Comentario` varchar(150) NOT NULL,
  `NombreU` varchar(50) NOT NULL,
  `Fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `noticomentarios`
--

INSERT INTO `noticomentarios` (`ID`, `Comentario`, `NombreU`, `Fecha`) VALUES
(52, 'comentario', 'Carlos Lizandro Agustin Rosales', '2016-10-08 06:03:03'),
(52, 'asdf', 'Carlos Lizandro Agustin Rosales', '2016-10-12 05:51:52'),
(55, 'sss', 'Carlos Lizandro Agustin Rosales', '2016-10-12 05:52:30'),
(55, 'sss', 'Carlos Lizandro Agustin Rosales', '2016-10-12 05:52:31'),
(55, 'sss', 'Carlos Lizandro Agustin Rosales', '2016-10-12 05:52:33'),
(55, 'asfd', 'Carlos Lizandro Agustin Rosales', '2016-10-12 05:52:54'),
(43, '123', 'Carlos Lizandro Agustin Rosales', '2016-10-12 05:56:13'),
(38, 'que onda con esa foto', 'Fernando Martinez', '2016-10-12 06:39:20'),
(38, 'esta toda borrosa', 'Fernando Martinez', '2016-10-12 06:39:34'),
(38, 'ha,no,,,,son mis lagañas!!!!\r\n', 'Fernando Martinez', '2016-10-12 06:39:53'),
(52, 'ya implementelo!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!\r\n', 'Fernando Martinez', '2016-10-12 06:41:57'),
(52, 'se tardan un ch................................................', 'Fernando Martinez', '2016-10-12 06:42:13'),
(52, 'cuando lo implenten ya no va existir el area de pruebas......................................................ni los servidores!!!!\r\n', 'Fernando Martinez', '2016-10-12 06:42:49'),
(52, 'ya nomas en la nube', 'Carlos Lizandro Agustin Rosales', '2016-10-12 07:03:25'),
(58, 'asdfasdfasdfasd', 'Carlos Lizandro Agustin Rosales', '2016-10-15 02:59:37'),
(43, 'hola, soy un comentario', 'Omar Alejandro Mora Cruz', '2016-10-16 02:15:26'),
(80, 'que es esto???', 'Victor Mora', '2016-10-20 06:01:14'),
(80, 'comenta\r\n', 'Carlos Lizandro Agustin Rosales', '2016-10-20 07:44:55'),
(80, 'comenta\r\n', 'Carlos Lizandro Agustin Rosales', '2016-10-20 07:45:29'),
(82, 'Comenta', 'Carlos Lizandro Agustin Rosales', '2016-10-21 03:17:45'),
(82, 'hello', 'Omar Alejandro Mora Cruz', '2016-10-24 02:17:33'),
(83, 'estoy comentando', 'Jafet Martinez ', '2016-10-26 05:06:23'),
(85, 'Comenta compalle', 'Carlos Lizandro Agustin Rosales', '2016-10-27 05:53:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pruebas`
--

CREATE TABLE `pruebas` (
  `NoSerie` varchar(10) NOT NULL,
  `HoraInicio` datetime DEFAULT NULL,
  `FTO` tinyint(1) NOT NULL DEFAULT 0,
  `FTONoReloj` varchar(5) DEFAULT NULL,
  `FTOHoraFinal` datetime DEFAULT NULL,
  `Cisco` tinyint(1) NOT NULL DEFAULT 0,
  `CiscoNoReloj` varchar(5) DEFAULT NULL,
  `CiscoHoraFinal` datetime DEFAULT NULL,
  `Rackscan` tinyint(1) NOT NULL DEFAULT 0,
  `RackscanNoReloj` varchar(5) DEFAULT NULL,
  `RackscanHoraFinal` datetime DEFAULT NULL,
  `XTEE` tinyint(1) NOT NULL DEFAULT 0,
  `XTEENoReloj` varchar(5) DEFAULT NULL,
  `XTEEHoraFinal` datetime DEFAULT NULL,
  `Cluster` tinyint(1) NOT NULL DEFAULT 0,
  `ClusterNoReloj` varchar(5) DEFAULT NULL,
  `ClusterHoraFinal` datetime DEFAULT NULL,
  `Solar` tinyint(1) NOT NULL DEFAULT 0,
  `SolarNoReloj` varchar(5) DEFAULT NULL,
  `SolarHoraFinal` datetime DEFAULT NULL,
  `Solar2` tinyint(1) NOT NULL DEFAULT 0,
  `Solar2NoReloj` varchar(5) DEFAULT NULL,
  `Solar2HoraFinal` datetime DEFAULT NULL,
  `Wiring` tinyint(1) NOT NULL DEFAULT 0,
  `WiringNoReloj` varchar(5) DEFAULT NULL,
  `WiringHoraFinal` datetime DEFAULT NULL,
  `Bootstrap` tinyint(1) NOT NULL DEFAULT 0,
  `BootstrapNoReloj` varchar(5) DEFAULT NULL,
  `BootstrapHoraFinal` datetime DEFAULT NULL,
  `Sharknado` tinyint(1) NOT NULL DEFAULT 0,
  `SharknadoNoReloj` varchar(5) DEFAULT NULL,
  `SharknadoHoraFinal` datetime DEFAULT NULL,
  `DEID` tinyint(1) NOT NULL DEFAULT 0,
  `DEIDNoReloj` varchar(5) DEFAULT NULL,
  `DEIDHoraFinal` datetime DEFAULT NULL,
  `Megamind` tinyint(1) NOT NULL DEFAULT 0,
  `MegamindNoReloj` varchar(5) DEFAULT NULL,
  `MegamindHoraFinal` datetime DEFAULT NULL,
  `EOTA` tinyint(1) NOT NULL DEFAULT 0,
  `EOTANoReloj` varchar(5) DEFAULT NULL,
  `EOTAHoraFinal` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `pruebas`
--

INSERT INTO `pruebas` (`NoSerie`, `HoraInicio`, `FTO`, `FTONoReloj`, `FTOHoraFinal`, `Cisco`, `CiscoNoReloj`, `CiscoHoraFinal`, `Rackscan`, `RackscanNoReloj`, `RackscanHoraFinal`, `XTEE`, `XTEENoReloj`, `XTEEHoraFinal`, `Cluster`, `ClusterNoReloj`, `ClusterHoraFinal`, `Solar`, `SolarNoReloj`, `SolarHoraFinal`, `Solar2`, `Solar2NoReloj`, `Solar2HoraFinal`, `Wiring`, `WiringNoReloj`, `WiringHoraFinal`, `Bootstrap`, `BootstrapNoReloj`, `BootstrapHoraFinal`, `Sharknado`, `SharknadoNoReloj`, `SharknadoHoraFinal`, `DEID`, `DEIDNoReloj`, `DEIDHoraFinal`, `Megamind`, `MegamindNoReloj`, `MegamindHoraFinal`, `EOTA`, `EOTANoReloj`, `EOTAHoraFinal`) VALUES
('    2M2639', '2016-10-13 06:43:46', 1, '54966', '2016-10-14 03:48:56', 1, '54966', '2016-10-14 03:49:03', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL),
('2M26121212', '2016-10-27 07:11:37', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL),
('2M26123SD0', '2016-10-14 07:08:09', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL),
('2M2633DF00', '2016-10-14 07:22:11', 1, '55098', '2016-10-18 05:29:20', 1, '55098', '2016-10-18 05:29:25', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL),
('2M26390445', '2016-10-06 02:16:22', 1, '55098', '2016-10-06 02:19:02', 1, '55098', '2016-10-06 02:19:48', 1, '55098', '2016-10-06 02:25:07', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL),
('2M2639044Y', '2016-10-06 02:16:53', 1, '55098', '2016-10-06 02:19:08', 1, '55098', '2016-10-06 02:19:54', 1, '55098', '2016-10-06 02:25:13', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL),
('2M2639044Z', '2016-10-06 02:17:38', 1, '55098', '2016-10-06 02:19:20', 1, '55098', '2016-10-06 02:20:07', 1, '55098', '2016-10-06 02:25:27', 1, '54656', '2016-10-28 08:03:46', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL),
('2M26390450', '2016-10-06 02:18:07', 1, '55098', '2016-10-06 02:19:27', 1, '55098', '2016-10-06 02:20:14', 1, '55098', '2016-10-06 02:25:33', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL),
('2M26390451', '2016-10-06 02:15:41', 1, '55098', '2016-10-06 02:18:56', 1, '55098', '2016-10-06 02:19:39', 1, '55098', '2016-10-06 02:25:02', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL),
('2M26390457', '2016-10-06 02:17:14', 1, '55098', '2016-10-06 02:19:15', 1, '55098', '2016-10-06 02:20:01', 1, '55098', '2016-10-06 02:25:21', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL),
('2M26390458', '2016-10-10 08:31:46', 1, '54966', '2016-10-07 02:31:51', 1, '54966', '2016-10-07 02:31:59', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL),
('2M263AS3D2', '2016-10-28 05:41:36', 1, '54966', '2016-10-28 05:42:30', 1, '55098', '2016-11-08 03:22:12', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL),
('2M26464898', '2016-10-20 04:23:58', 1, '345', '2016-10-26 05:07:50', 1, '54656', '2016-10-28 08:04:01', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pruebasjv`
--

CREATE TABLE `pruebasjv` (
  `NoSerie` varchar(10) NOT NULL,
  `HoraInicio` datetime DEFAULT NULL,
  `FTO` tinyint(1) NOT NULL DEFAULT 0,
  `FTONoReloj` varchar(5) DEFAULT NULL,
  `FTOHoraFinal` datetime DEFAULT NULL,
  `Arista0` tinyint(1) NOT NULL DEFAULT 0,
  `Arista0NoReloj` varchar(5) DEFAULT NULL,
  `Arista0HoraFinal` datetime DEFAULT NULL,
  `Arista1` tinyint(1) NOT NULL DEFAULT 0,
  `Arista1NoReloj` varchar(5) DEFAULT NULL,
  `Arista1HoraFinal` datetime DEFAULT NULL,
  `CM` tinyint(1) NOT NULL DEFAULT 0,
  `CMNoReloj` varchar(5) DEFAULT NULL,
  `CMHoraFinal` datetime DEFAULT NULL,
  `Cluster0` tinyint(1) NOT NULL DEFAULT 0,
  `Cluster0NoReloj` varchar(5) DEFAULT NULL,
  `Cluster0HoraFinal` datetime DEFAULT NULL,
  `Cluster1` tinyint(1) NOT NULL DEFAULT 0,
  `Cluster1NoReloj` varchar(5) DEFAULT NULL,
  `Cluster1HoraFinal` datetime DEFAULT NULL,
  `Bootstrap` tinyint(1) NOT NULL DEFAULT 0,
  `BootstrapNoReloj` varchar(5) DEFAULT NULL,
  `BootstrapHoraFinal` datetime DEFAULT NULL,
  `Rackscan` tinyint(1) NOT NULL DEFAULT 0,
  `RackscanNoReloj` varchar(5) DEFAULT NULL,
  `RackscanHoraFinal` datetime DEFAULT NULL,
  `DEID` tinyint(1) NOT NULL DEFAULT 0,
  `DEIDNoReloj` varchar(5) DEFAULT NULL,
  `DEIDHoraFinal` datetime DEFAULT NULL,
  `EOTA` tinyint(1) NOT NULL DEFAULT 0,
  `EOTANoReloj` varchar(5) DEFAULT NULL,
  `EOTAHoraFinal` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `pruebasjv`
--

INSERT INTO `pruebasjv` (`NoSerie`, `HoraInicio`, `FTO`, `FTONoReloj`, `FTOHoraFinal`, `Arista0`, `Arista0NoReloj`, `Arista0HoraFinal`, `Arista1`, `Arista1NoReloj`, `Arista1HoraFinal`, `CM`, `CMNoReloj`, `CMHoraFinal`, `Cluster0`, `Cluster0NoReloj`, `Cluster0HoraFinal`, `Cluster1`, `Cluster1NoReloj`, `Cluster1HoraFinal`, `Bootstrap`, `BootstrapNoReloj`, `BootstrapHoraFinal`, `Rackscan`, `RackscanNoReloj`, `RackscanHoraFinal`, `DEID`, `DEIDNoReloj`, `DEIDHoraFinal`, `EOTA`, `EOTANoReloj`, `EOTAHoraFinal`) VALUES
('2M26S3C3D3', '2016-10-14 06:34:09', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pruebasmicro`
--

CREATE TABLE `pruebasmicro` (
  `id` int(11) NOT NULL,
  `NoSerie` varchar(50) NOT NULL,
  `HoraInicio` datetime DEFAULT NULL,
  `HoraFinal` datetime DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL,
  `FTO` int(11) DEFAULT 0,
  `FTOStatus2` varchar(20) DEFAULT NULL,
  `FTONoReloj` varchar(20) DEFAULT NULL,
  `FTOHoraInicial` datetime DEFAULT NULL,
  `FTOHoraStatus` datetime DEFAULT NULL,
  `FTOHoraFinal` datetime DEFAULT NULL,
  `QuickTest` int(11) DEFAULT 0,
  `QuickTestStatus2` varchar(20) DEFAULT NULL,
  `QuickTestNoReloj` varchar(20) DEFAULT NULL,
  `QuickTestHoraInicial` datetime DEFAULT NULL,
  `QuickTestHoraStatus` datetime DEFAULT NULL,
  `QuickTestHoraFinal` datetime DEFAULT NULL,
  `Stress` int(11) DEFAULT 0,
  `StressStatus2` varchar(20) DEFAULT NULL,
  `StressNoReloj` varchar(20) DEFAULT NULL,
  `StressHoraInicial` datetime DEFAULT NULL,
  `StressHoraStatus` datetime DEFAULT NULL,
  `StressHoraFinal` datetime DEFAULT NULL,
  `MDaaS` int(11) DEFAULT 0,
  `MDaaSStatus2` varchar(20) DEFAULT NULL,
  `MDaaSNoReloj` varchar(20) DEFAULT NULL,
  `MDaaSHoraInicial` datetime DEFAULT NULL,
  `MDaaSHoraStatus` datetime DEFAULT NULL,
  `MDaaSHoraFinal` datetime DEFAULT NULL,
  `RackTest` int(11) DEFAULT 0,
  `RackTestStatus2` varchar(20) DEFAULT NULL,
  `RackTestNoReloj` varchar(20) DEFAULT NULL,
  `RackTestHoraInicial` datetime DEFAULT NULL,
  `RackTestHoraStatus` datetime DEFAULT NULL,
  `RackTestHoraFinal` datetime DEFAULT NULL,
  `FTI` int(11) DEFAULT 0,
  `FTIStatus2` varchar(20) DEFAULT NULL,
  `FTINoReloj` varchar(20) DEFAULT NULL,
  `FTIHoraInicial` datetime DEFAULT NULL,
  `FTIHoraStatus` datetime DEFAULT NULL,
  `FTIHoraFinal` datetime DEFAULT NULL,
  `BSL` int(11) DEFAULT 0,
  `BSLStatus2` varchar(20) DEFAULT NULL,
  `BSLNoReloj` varchar(20) DEFAULT NULL,
  `BSLHoraInicial` datetime DEFAULT NULL,
  `BSLHoraStatus` datetime DEFAULT NULL,
  `BSLHoraFinal` datetime DEFAULT NULL,
  `CTS` int(11) DEFAULT 0,
  `CTSStatus2` varchar(20) DEFAULT NULL,
  `CTSNoReloj` varchar(20) DEFAULT NULL,
  `CTSHoraInicial` datetime DEFAULT NULL,
  `CTSHoraStatus` datetime DEFAULT NULL,
  `CTSHoraFinal` datetime DEFAULT NULL,
  `Packing` int(11) DEFAULT 0,
  `PackingStatus2` varchar(20) DEFAULT NULL,
  `PackingNoReloj` varchar(20) DEFAULT NULL,
  `PackingHoraInicial` datetime DEFAULT NULL,
  `PackingHoraStatus` datetime DEFAULT NULL,
  `PackingHoraFinal` datetime DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_actualizacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pruebasmicro`
--

INSERT INTO `pruebasmicro` (`id`, `NoSerie`, `HoraInicio`, `HoraFinal`, `Status`, `FTO`, `FTOStatus2`, `FTONoReloj`, `FTOHoraInicial`, `FTOHoraStatus`, `FTOHoraFinal`, `QuickTest`, `QuickTestStatus2`, `QuickTestNoReloj`, `QuickTestHoraInicial`, `QuickTestHoraStatus`, `QuickTestHoraFinal`, `Stress`, `StressStatus2`, `StressNoReloj`, `StressHoraInicial`, `StressHoraStatus`, `StressHoraFinal`, `MDaaS`, `MDaaSStatus2`, `MDaaSNoReloj`, `MDaaSHoraInicial`, `MDaaSHoraStatus`, `MDaaSHoraFinal`, `RackTest`, `RackTestStatus2`, `RackTestNoReloj`, `RackTestHoraInicial`, `RackTestHoraStatus`, `RackTestHoraFinal`, `FTI`, `FTIStatus2`, `FTINoReloj`, `FTIHoraInicial`, `FTIHoraStatus`, `FTIHoraFinal`, `BSL`, `BSLStatus2`, `BSLNoReloj`, `BSLHoraInicial`, `BSLHoraStatus`, `BSLHoraFinal`, `CTS`, `CTSStatus2`, `CTSNoReloj`, `CTSHoraInicial`, `CTSHoraStatus`, `CTSHoraFinal`, `Packing`, `PackingStatus2`, `PackingNoReloj`, `PackingHoraInicial`, `PackingHoraStatus`, `PackingHoraFinal`, `fecha_creacion`, `fecha_actualizacion`) VALUES
(17, 'R12345679877899F', '2026-03-01 02:52:50', NULL, NULL, 1, 'Pass', '99999', '2026-03-01 02:55:47', '2026-03-01 02:55:51', '2026-03-01 04:39:50', 1, 'Pass', '99999', '2026-03-01 04:39:58', '2026-03-01 04:40:02', '2026-03-04 11:52:17', 1, 'Pass', '99999', '2026-03-04 11:53:22', '2026-03-04 11:53:25', '2026-03-04 20:23:24', 1, 'Pass', '99999', '2026-03-04 20:24:01', '2026-03-04 20:24:05', '2026-03-04 22:54:10', 0, 'Running', '99999', '2026-03-04 22:54:12', '2026-03-04 22:54:15', NULL, 0, 'Vacio', NULL, NULL, NULL, NULL, 0, 'Vacio', NULL, NULL, NULL, NULL, 0, 'Vacio', NULL, NULL, NULL, NULL, 0, 'Vacio', NULL, NULL, NULL, NULL, '2026-03-01 01:52:50', '2026-03-04 21:54:15'),
(18, 'R12345679872222F', '2026-03-01 02:53:11', NULL, NULL, 1, 'Pass', '99999', NULL, NULL, '2026-03-01 02:55:55', 1, 'Pass', '99999', '2026-03-01 02:56:50', '2026-03-01 02:56:53', '2026-03-01 04:38:55', 1, 'Pass', '99999', '2026-03-01 04:39:39', '2026-03-01 04:39:43', '2026-03-04 20:23:27', 0, 'Running', '99999', '2026-03-04 20:24:06', '2026-03-04 20:24:09', NULL, 0, 'Vacio', NULL, NULL, NULL, NULL, 0, 'Vacio', NULL, NULL, NULL, NULL, 0, 'Vacio', NULL, NULL, NULL, NULL, 0, 'Vacio', NULL, NULL, NULL, NULL, 0, 'Vacio', NULL, NULL, NULL, NULL, '2026-03-01 01:53:11', '2026-03-04 19:24:09'),
(19, 'R12345679873333F', '2026-03-01 02:53:24', NULL, NULL, 1, 'Pass', '99999', NULL, NULL, '2026-03-01 02:55:59', 1, 'Pass', '99999', '2026-03-01 02:56:54', '2026-03-01 02:56:57', '2026-03-04 20:23:31', 0, 'Running', '99999', '2026-03-04 20:24:09', '2026-03-04 20:24:12', NULL, 0, 'Vacio', NULL, NULL, NULL, NULL, 0, 'Vacio', NULL, NULL, NULL, NULL, 0, 'Vacio', NULL, NULL, NULL, NULL, 0, 'Vacio', NULL, NULL, NULL, NULL, 0, 'Vacio', NULL, NULL, NULL, NULL, 0, 'Vacio', NULL, NULL, NULL, NULL, '2026-03-01 01:53:24', '2026-03-04 19:24:12'),
(20, 'R12345679874444F', '2026-03-01 02:53:41', NULL, NULL, 1, 'Pass', '99999', NULL, NULL, '2026-03-01 02:56:04', 1, 'Pass', '99999', '2026-03-01 02:56:58', '2026-03-01 02:57:01', '2026-03-01 04:39:05', 1, 'Pass', '99999', '2026-03-01 04:39:31', '2026-03-01 04:39:34', '2026-03-04 20:23:34', 0, 'Running', '99999', '2026-03-04 20:24:13', '2026-03-04 20:24:15', NULL, 0, 'Vacio', NULL, NULL, NULL, NULL, 0, 'Vacio', NULL, NULL, NULL, NULL, 0, 'Vacio', NULL, NULL, NULL, NULL, 0, 'Vacio', NULL, NULL, NULL, NULL, 0, 'Vacio', NULL, NULL, NULL, NULL, '2026-03-01 01:53:41', '2026-03-04 19:24:15'),
(21, 'R12345679875555F', '2026-03-01 02:53:59', NULL, NULL, 1, 'Pass', '99999', '2026-03-01 02:56:07', '2026-03-01 02:56:11', '2026-03-01 04:39:56', 1, 'Pass', '99999', '2026-03-01 04:40:03', '2026-03-01 04:40:07', '2026-03-04 11:52:21', 1, 'Pass', '99999', '2026-03-04 11:53:26', '2026-03-04 11:53:29', '2026-03-04 20:23:38', 1, 'Pass', '99999', '2026-03-04 20:24:17', '2026-03-04 20:24:19', '2026-03-05 08:51:06', 0, 'Running', '99999', '2026-03-05 08:51:08', '2026-03-05 08:51:12', NULL, 0, 'Vacio', NULL, NULL, NULL, NULL, 0, 'Vacio', NULL, NULL, NULL, NULL, 0, 'Vacio', NULL, NULL, NULL, NULL, 0, 'Vacio', NULL, NULL, NULL, NULL, '2026-03-01 01:53:59', '2026-03-05 07:51:12'),
(22, 'R12345679876666F', '2026-03-01 02:54:13', NULL, NULL, 1, 'Pass', '99999', '2026-03-01 02:56:12', '2026-03-01 02:56:15', '2026-03-01 04:38:32', 1, 'Pass', '99999', '2026-03-01 04:39:22', '2026-03-01 04:39:25', '2026-03-04 11:52:25', 1, 'Pass', '99999', '2026-03-04 11:53:30', '2026-03-04 11:53:33', '2026-03-04 20:23:41', 0, 'Running', '99999', '2026-03-04 20:24:20', '2026-03-04 20:24:22', NULL, 0, 'Vacio', NULL, NULL, NULL, NULL, 0, 'Vacio', NULL, NULL, NULL, NULL, 0, 'Vacio', NULL, NULL, NULL, NULL, 0, 'Vacio', NULL, NULL, NULL, NULL, 0, 'Vacio', NULL, NULL, NULL, NULL, '2026-03-01 01:54:13', '2026-03-04 19:24:22'),
(23, 'R12345679877777F', '2026-03-01 02:54:28', NULL, NULL, 1, 'Pass', '99999', NULL, NULL, '2026-03-01 02:56:20', 1, 'Pass', '99999', '2026-03-01 02:57:02', '2026-03-01 02:57:05', '2026-03-04 11:52:30', 1, 'Pass', '99999', '2026-03-04 11:53:34', '2026-03-04 11:53:37', '2026-03-04 20:23:44', 0, 'Running', '99999', '2026-03-04 20:24:23', '2026-03-04 20:24:25', NULL, 0, 'Vacio', NULL, NULL, NULL, NULL, 0, 'Vacio', NULL, NULL, NULL, NULL, 0, 'Vacio', NULL, NULL, NULL, NULL, 0, 'Vacio', NULL, NULL, NULL, NULL, 0, 'Vacio', NULL, NULL, NULL, NULL, '2026-03-01 01:54:28', '2026-03-04 19:24:25'),
(24, 'R12345679878888F', '2026-03-01 02:54:42', NULL, NULL, 1, 'Pass', '99999', NULL, NULL, '2026-03-01 02:56:29', 1, 'Pass', '99999', '2026-03-01 02:57:07', '2026-03-01 02:57:10', '2026-03-04 11:52:33', 1, 'Pass', '99999', '2026-03-04 11:53:38', '2026-03-04 11:53:42', '2026-03-04 20:23:48', 0, 'Running', '99999', '2026-03-04 20:24:26', '2026-03-04 20:24:28', NULL, 0, 'Vacio', NULL, NULL, NULL, NULL, 0, 'Vacio', NULL, NULL, NULL, NULL, 0, 'Vacio', NULL, NULL, NULL, NULL, 0, 'Vacio', NULL, NULL, NULL, NULL, 0, 'Vacio', NULL, NULL, NULL, NULL, '2026-03-01 01:54:42', '2026-03-04 19:24:28'),
(25, 'R12345679878989F', '2026-03-01 02:54:58', NULL, NULL, 1, 'Pass', '99999', '2026-03-01 02:56:33', '2026-03-01 02:56:41', '2026-03-01 04:38:40', 1, 'Pass', '99999', '2026-03-01 04:39:26', '2026-03-01 04:39:30', '2026-03-04 11:12:41', 1, 'Pass', '99999', '2026-03-04 11:12:52', '2026-03-04 11:13:03', '2026-03-04 11:53:06', 1, 'Pass', '99999', '2026-03-04 11:53:43', '2026-03-04 11:53:47', '2026-03-04 20:23:51', 0, 'Running', '99999', '2026-03-04 20:24:29', '2026-03-04 20:24:31', NULL, 0, 'Vacio', NULL, NULL, NULL, NULL, 0, 'Vacio', NULL, NULL, NULL, NULL, 0, 'Vacio', NULL, NULL, NULL, NULL, 0, 'Vacio', NULL, NULL, NULL, NULL, '2026-03-01 01:54:58', '2026-03-04 19:24:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pruebasterminadasjv`
--

CREATE TABLE `pruebasterminadasjv` (
  `ID` int(11) NOT NULL,
  `NoSerie` varchar(10) NOT NULL,
  `HoraInicio` datetime DEFAULT NULL,
  `FTO` tinyint(1) NOT NULL DEFAULT 0,
  `FTONoReloj` varchar(5) DEFAULT NULL,
  `FTOHoraFinal` datetime DEFAULT NULL,
  `Arista0` tinyint(1) NOT NULL DEFAULT 0,
  `Arista0NoReloj` varchar(5) DEFAULT NULL,
  `Arista0HoraFinal` datetime DEFAULT NULL,
  `Arista1` tinyint(1) NOT NULL DEFAULT 0,
  `Arista1NoReloj` varchar(5) DEFAULT NULL,
  `Arista1HoraFinal` datetime DEFAULT NULL,
  `CM` tinyint(1) NOT NULL DEFAULT 0,
  `CMNoReloj` varchar(5) DEFAULT NULL,
  `CMHoraFinal` datetime DEFAULT NULL,
  `Cluster0` tinyint(1) NOT NULL DEFAULT 0,
  `Cluster0NoReloj` varchar(5) DEFAULT NULL,
  `Cluster0HoraFinal` datetime DEFAULT NULL,
  `Cluster1` tinyint(1) NOT NULL DEFAULT 0,
  `Cluster1NoReloj` varchar(5) DEFAULT NULL,
  `Cluster1HoraFinal` datetime DEFAULT NULL,
  `Bootstrap` tinyint(1) NOT NULL DEFAULT 0,
  `BootstrapNoReloj` varchar(5) DEFAULT NULL,
  `BootstrapHoraFinal` datetime DEFAULT NULL,
  `Rackscan` tinyint(1) NOT NULL DEFAULT 0,
  `RackscanNoReloj` varchar(5) DEFAULT NULL,
  `RackscanHoraFinal` datetime DEFAULT NULL,
  `DEID` tinyint(1) NOT NULL DEFAULT 0,
  `DEIDNoReloj` varchar(5) DEFAULT NULL,
  `DEIDHoraFinal` datetime DEFAULT NULL,
  `EOTA` tinyint(1) NOT NULL DEFAULT 0,
  `EOTANoReloj` varchar(5) DEFAULT NULL,
  `EOTAHoraFinal` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `pruebasterminadasjv`
--

INSERT INTO `pruebasterminadasjv` (`ID`, `NoSerie`, `HoraInicio`, `FTO`, `FTONoReloj`, `FTOHoraFinal`, `Arista0`, `Arista0NoReloj`, `Arista0HoraFinal`, `Arista1`, `Arista1NoReloj`, `Arista1HoraFinal`, `CM`, `CMNoReloj`, `CMHoraFinal`, `Cluster0`, `Cluster0NoReloj`, `Cluster0HoraFinal`, `Cluster1`, `Cluster1NoReloj`, `Cluster1HoraFinal`, `Bootstrap`, `BootstrapNoReloj`, `BootstrapHoraFinal`, `Rackscan`, `RackscanNoReloj`, `RackscanHoraFinal`, `DEID`, `DEIDNoReloj`, `DEIDHoraFinal`, `EOTA`, `EOTANoReloj`, `EOTAHoraFinal`) VALUES
(132, '2M26S3D3F5', '2016-10-14 06:33:45', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL),
(133, '', '0000-00-00 00:00:00', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pruebasterminados`
--

CREATE TABLE `pruebasterminados` (
  `ID` int(11) NOT NULL,
  `NoSerie` varchar(10) NOT NULL,
  `HoraInicio` datetime DEFAULT NULL,
  `FTO` tinyint(1) NOT NULL DEFAULT 0,
  `FTONoReloj` varchar(5) DEFAULT NULL,
  `FTOHoraFinal` datetime DEFAULT NULL,
  `Cisco` tinyint(1) NOT NULL DEFAULT 0,
  `CiscoNoReloj` varchar(5) DEFAULT NULL,
  `CiscoHoraFinal` datetime DEFAULT NULL,
  `Rackscan` tinyint(1) NOT NULL DEFAULT 0,
  `RackscanNoReloj` varchar(5) DEFAULT NULL,
  `RackscanHoraFinal` datetime DEFAULT NULL,
  `XTEE` tinyint(1) NOT NULL DEFAULT 0,
  `XTEENoReloj` varchar(5) DEFAULT NULL,
  `XTEEHoraFinal` datetime DEFAULT NULL,
  `Cluster` tinyint(1) NOT NULL DEFAULT 0,
  `ClusterNoReloj` varchar(5) DEFAULT NULL,
  `ClusterHoraFinal` datetime DEFAULT NULL,
  `Solar` tinyint(1) NOT NULL DEFAULT 0,
  `SolarNoReloj` varchar(5) DEFAULT NULL,
  `SolarHoraFinal` datetime DEFAULT NULL,
  `Solar2` tinyint(1) NOT NULL DEFAULT 0,
  `Solar2NoReloj` varchar(5) DEFAULT NULL,
  `Solar2HoraFinal` datetime DEFAULT NULL,
  `Wiring` tinyint(1) NOT NULL DEFAULT 0,
  `WiringNoReloj` varchar(5) DEFAULT NULL,
  `WiringHoraFinal` datetime DEFAULT NULL,
  `Bootstrap` tinyint(1) NOT NULL DEFAULT 0,
  `BootstrapNoReloj` varchar(5) DEFAULT NULL,
  `BootstrapHoraFinal` datetime DEFAULT NULL,
  `Sharknado` tinyint(1) NOT NULL DEFAULT 0,
  `SharknadoNoReloj` varchar(5) DEFAULT NULL,
  `SharknadoHoraFinal` datetime DEFAULT NULL,
  `DEID` tinyint(1) NOT NULL DEFAULT 0,
  `DEIDNoReloj` varchar(5) DEFAULT NULL,
  `DEIDHoraFinal` datetime DEFAULT NULL,
  `Megamind` tinyint(1) NOT NULL DEFAULT 0,
  `MegamindNoReloj` varchar(5) DEFAULT NULL,
  `MegamindHoraFinal` datetime DEFAULT NULL,
  `EOTA` tinyint(1) NOT NULL DEFAULT 0,
  `EOTANoReloj` varchar(5) DEFAULT NULL,
  `EOTAHoraFinal` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `racks`
--

CREATE TABLE `racks` (
  `NoSerie` varchar(10) NOT NULL,
  `WO` varchar(9) NOT NULL,
  `SKU` varchar(10) NOT NULL,
  `Bahia` int(1) NOT NULL,
  `Locacion` varchar(8) NOT NULL,
  `Modelo` varchar(30) NOT NULL,
  `Corriendo` tinyint(1) NOT NULL,
  `NoReloj` int(5) NOT NULL,
  `comentarios_JRS` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `racks`
--

INSERT INTO `racks` (`NoSerie`, `WO`, `SKU`, `Bahia`, `Locacion`, `Modelo`, `Corriendo`, `NoReloj`, `comentarios_JRS`) VALUES
('2M26121212', '111111111', '1111111111', 1, 'TR01-01', 'Azure 4.1', 1, 54966, NULL),
('2M2633DF00', '121212121', '121212121', 2, 'TR02-17', 'Azure 4.1', 1, 54966, NULL),
('2M26390445', '140209974', 'ZU715AFG1', 6, 'TR06-87', 'Azure 4.1', 1, 55098, NULL),
('2M2639044Y', '140209974', 'ZU715AFG1', 6, 'TR06-86', 'Azure 4.1', 1, 55098, NULL),
('2M2639044Z', '140209974', 'ZU715AFG1', 6, 'TR06-84', 'Azure 4.1', 1, 55098, NULL),
('2M26390450', '140209974', 'ZU715AFG1', 6, 'TR06-83', 'Azure 4.1', 1, 55098, NULL),
('2M26390451', '140209974', 'ZU715AFG1', 6, 'TR06-88', 'Azure 4.1', 1, 55098, NULL),
('2M26390457', '140209974', 'ZU715AFG1', 6, 'TR06-85', 'Azure 4.1', 1, 55098, NULL),
('2M26390458', '140209974', '1111111111', 7, 'TR07-97', 'Azure 4.1', 1, 54966, NULL),
('2M263AS3D2', '111111111', '1111111111', 1, 'TR01-02', 'Azure 4.1', 1, 54966, NULL),
('2M26464898', '121212121', '1111111111', 6, 'TR06-82', 'Azure 4.1', 1, 55098, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `racksjv`
--

CREATE TABLE `racksjv` (
  `NoSerie` varchar(10) NOT NULL,
  `WO` varchar(9) NOT NULL,
  `SKU` varchar(10) NOT NULL,
  `Bahia` int(1) NOT NULL,
  `Locacion` varchar(8) NOT NULL,
  `Modelo` varchar(30) NOT NULL,
  `Corriendo` tinyint(1) NOT NULL,
  `NoReloj` int(5) NOT NULL,
  `area` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `racksjv`
--

INSERT INTO `racksjv` (`NoSerie`, `WO`, `SKU`, `Bahia`, `Locacion`, `Modelo`, `Corriendo`, `NoReloj`, `area`) VALUES
('2M26S3C3D3', '333333333', '1111111111', 1, 'TR01-02', 'Microsoft', 1, 54966, 'JV');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `racksmicro`
--

CREATE TABLE `racksmicro` (
  `NoSerie` varchar(16) NOT NULL,
  `WO` varchar(9) NOT NULL,
  `SKU` varchar(10) NOT NULL,
  `Bahia` int(1) NOT NULL,
  `Locacion` varchar(8) NOT NULL,
  `Modelo` varchar(30) NOT NULL,
  `Corriendo` tinyint(1) NOT NULL,
  `NoReloj` int(5) NOT NULL,
  `comentarios_JRS` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `racksmicro`
--

INSERT INTO `racksmicro` (`NoSerie`, `WO`, `SKU`, `Bahia`, `Locacion`, `Modelo`, `Corriendo`, `NoReloj`, `comentarios_JRS`) VALUES
('R12345679872222F', '111111111', '1111111111', 1, 'TR01-03', 'Microsoft 8.3', 0, 99999, NULL),
('R12345679873333F', '111111111', '1111111111', 1, 'TR01-04', 'Microsoft 8.3', 0, 99999, NULL),
('R12345679874444F', '111111111', '1111111111', 1, 'TR01-05', 'Microsoft 8.2', 0, 99999, NULL),
('R12345679875555F', '111111111', '1111111111', 1, 'TR01-06', 'Microsoft 8.2', 0, 99999, NULL),
('R12345679876666F', '111111111', '1111111111', 1, 'TR01-07', 'Microsoft 8.3', 0, 99999, NULL),
('R12345679877777F', '111111111', '1111111111', 1, 'TR01-08', 'Microsoft 8.2', 0, 99999, NULL),
('R12345679877899F', '111111111', '1111111111', 1, 'TR01-02', 'Microsoft 8.2', 0, 99999, 'Corriendo normal'),
('R12345679878888F', '111111111', '1111111111', 1, 'TR01-09', 'NPI', 0, 99999, NULL),
('R12345679878989F', '111111111', '1111111111', 1, 'TR01-10', 'Microsoft 8.2', 0, 99999, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `racksterminados`
--

CREATE TABLE `racksterminados` (
  `ID` int(11) NOT NULL,
  `NoSerie` varchar(10) NOT NULL,
  `WO` varchar(9) NOT NULL,
  `SKU` varchar(10) NOT NULL,
  `Bahia` int(1) NOT NULL,
  `Locacion` varchar(8) NOT NULL,
  `Modelo` varchar(30) NOT NULL,
  `Corriendo` tinyint(1) NOT NULL,
  `NoReloj` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `racksterminadosjv`
--

CREATE TABLE `racksterminadosjv` (
  `ID` int(11) NOT NULL,
  `NoSerie` varchar(10) NOT NULL,
  `WO` varchar(9) NOT NULL,
  `SKU` varchar(10) NOT NULL,
  `Bahia` int(1) NOT NULL,
  `Locacion` varchar(8) NOT NULL,
  `Modelo` varchar(30) NOT NULL,
  `Corriendo` tinyint(1) NOT NULL,
  `NoReloj` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `racksterminadosjv`
--

INSERT INTO `racksterminadosjv` (`ID`, `NoSerie`, `WO`, `SKU`, `Bahia`, `Locacion`, `Modelo`, `Corriendo`, `NoReloj`) VALUES
(201, '2M2632ASDF', '212121211', '2121212121', 1, 'TR01-01', 'Microsoft', 1, 54966);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stats`
--

CREATE TABLE `stats` (
  `NoReloj` varchar(5) NOT NULL,
  `Imagen` varchar(50) NOT NULL DEFAULT 'img/default.png',
  `header` varchar(100) NOT NULL DEFAULT 'themes/try6.jpg',
  `headerdos` varchar(100) NOT NULL DEFAULT 'themes/try6.jpg',
  `body` varchar(100) NOT NULL DEFAULT 'themes/red.jpg',
  `Nombre` varchar(50) NOT NULL DEFAULT 'Novato',
  `Descripcion` varchar(200) NOT NULL DEFAULT 'Te han registrado en el sistema, tampoco es que haya sido muy dificil',
  `Nivel` int(11) NOT NULL DEFAULT 0,
  `Puntos` int(11) NOT NULL DEFAULT 0,
  `FTO` int(11) NOT NULL DEFAULT 0,
  `Cisco` int(11) NOT NULL DEFAULT 0,
  `Rackscan` int(11) NOT NULL DEFAULT 0,
  `Xtee` int(11) NOT NULL DEFAULT 0,
  `Cluster` int(11) NOT NULL DEFAULT 0,
  `Solar` int(11) NOT NULL DEFAULT 0,
  `Wiring` int(11) NOT NULL DEFAULT 0,
  `Bootstrap` int(11) NOT NULL DEFAULT 0,
  `Sharknado` int(11) NOT NULL DEFAULT 0,
  `Deid` int(11) NOT NULL DEFAULT 0,
  `Megamind` int(11) NOT NULL DEFAULT 0,
  `Eota` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `stats`
--

INSERT INTO `stats` (`NoReloj`, `Imagen`, `header`, `headerdos`, `body`, `Nombre`, `Descripcion`, `Nivel`, `Puntos`, `FTO`, `Cisco`, `Rackscan`, `Xtee`, `Cluster`, `Solar`, `Wiring`, `Bootstrap`, `Sharknado`, `Deid`, `Megamind`, `Eota`) VALUES
('149', 'img/default.png', 'themes/try6.jpg', 'themes/try6.jpg', 'themes/red.jpg', 'Novato', 'Te han registrado en el sistema, tampoco es que haya sido muy dificil', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('303', 'img/default.png', 'themes/try6.jpg', 'themes/try6.jpg', 'themes/red.jpg', 'Novato', 'Te han registrado en el sistema, tampoco es que haya sido muy dificil', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('54123', 'img/default.png', 'themes/try6.jpg', 'themes/try6.jpg', 'themes/red.jpg', 'Novato', 'Te han registrado en el sistema - Tampoco es que haya sido muy dificil', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('54656', 'img/default.png', 'themes/try6.jpg', 'themes/try6.jpg', 'themes/red.jpg', 'Novato', 'Te han registrado en el sistema, tampoco es que haya sido muy dificil', 0, 300, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
('54966', 'img/default.png', 'themes/try6.jpg', 'themes/try6.jpg', 'themes/red.jpg', 'Novato', 'Te han registrado en el sistema - Tampoco es que haya sido muy dificil', 1, 1250, 4, 5, 1, 0, 2, 0, 0, 1, 0, 2, 0, 2),
('55098', 'img/nivel5.png', 'themes/try6.jpg', 'themes/try6.jpg', 'themes/red.jpg', 'Conocedor', 'Has alcanzado el nivel 5 - Quiza debas descansar', 7, 7250, 24, 15, 8, 0, 5, 0, 0, 2, 0, 2, 0, 2),
('55101', 'img/default.png', 'themes/try6.jpg', 'themes/try6.jpg', 'themes/red.jpg', 'Novato', 'Te han registrado en el sistema, tampoco es que haya sido muy dificil', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sugerencia`
--

CREATE TABLE `sugerencia` (
  `Id` int(11) NOT NULL,
  `Sugerencia` tinytext NOT NULL,
  `NoReloj` int(5) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `Fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `sugerencia`
--

INSERT INTO `sugerencia` (`Id`, `Sugerencia`, `NoReloj`, `status`, `Fecha`) VALUES
(1, 'en mi sabia opinion yo opino que este sistema esta bien fregon y se mira bonito ', 54966, 1, '2016-10-28 06:38:10'),
(2, 'en mi sabia opinion yo opino que este sistema esta bien fregon y se mira bonito ', 54966, 1, '2016-10-28 07:14:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `No_Reloj` int(5) NOT NULL,
  `Pass` varchar(50) NOT NULL,
  `Nombre` varchar(70) NOT NULL,
  `Turno` int(1) NOT NULL,
  `Nivel` int(1) NOT NULL,
  `Bahia` int(11) NOT NULL,
  `Comentario` text DEFAULT NULL,
  `Comentario2` text DEFAULT NULL,
  `Comentario3` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`No_Reloj`, `Pass`, `Nombre`, `Turno`, `Nivel`, `Bahia`, `Comentario`, `Comentario2`, `Comentario3`) VALUES
(149, '5c6d9edc3a951cda763f650235cfc41a3fc23fe8', 'Victor Tronco', 1, 1, 0, NULL, NULL, NULL),
(303, '18c28604dd31094a8d69dae60f1bcd347f1afc5a', 'Adrian Garcia', 2, 1, 0, NULL, NULL, NULL),
(345, '6117e45ab57f8660d866a21ca5e9d2c31dbc1945', 'Jafet Martinez ', 3, 1, 0, NULL, NULL, NULL),
(1111, '011c945f30ce2cbafc452f39840f025693339c42', 'tecnico', 1, 1, 1, NULL, NULL, NULL),
(54121, 'c54804980cfa669a805555b645b14ba137b6ee79', 'Ana Mora', 2, 2, 5, NULL, NULL, NULL),
(54122, 'c96f36c50461c0654e7219e8bc68df6e4c4e62d9', 'Daniel Moraa', 3, 2, 5, NULL, NULL, NULL),
(54123, '8cb2237d0679ca88db6464eac60da96345513964', 'Victor Mora', 3, 1, 5, '<p>lkjhlsakdhflkajshd flkjahsdf lkjahs dkjfasd</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>asdf</p>\r\n', '<p>nota 2</p>\r\n', '<p>nota 3</p>\r\n'),
(54124, '348162101fc6f7e624681b7400b085eeac6df7bd', 'Emanuel Mora', 3, 1, 5, NULL, NULL, NULL),
(54656, 'b652dd2868a87c9a42e3f681b217aef26f82d747', 'Ruben Trejo', 3, 1, 7, NULL, NULL, NULL),
(54692, '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Fernando Martinez', 3, 1, 7, '<h1><span class=\"marker\">prueba de cambios</span></h1>\r\n', '<p>prueba de cambios</p>\r\n', '<p>prueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambios</p>\r\n'),
(54693, '7c4a8d09ca3762af61e59520943dc26494f8941b', 'soy un jr', 2, 2, 1, NULL, NULL, NULL),
(54966, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Carlos Lizandro Agustin Rosales', 3, 1, 7, '<h1><em><strong>HOLA MUNDO</strong></em></h1>\r\n', '<p>sadfsdfsadSDF</p>\r\n', ''),
(55098, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Omar Alejandro Mora Cruz', 3, 1, 6, '', '', '<ul>\r\n	<li>Config t</li>\r\n	<li>int eth1/64</li>\r\n	<li>swichport</li>\r\n	<li>speed 40000</li>\r\n	<li>exit</li>\r\n	<li>int eth1/33-36</li>\r\n	<li>swichport</li>\r\n	<li>speed 1000</li>\r\n	<li>exit</li>\r\n	<li>copy run start</li>\r\n</ul>\r\n'),
(55101, '8940d66466e6f8a6e6a5e68e216c1975e25a62c9', 'Ezio Auditore Da Firenze', 1, 2, 1, NULL, NULL, NULL),
(99999, 'f865b53623b121fd34ee5426c792e5c33af8c227', 'ADMIN GENERAL', 1, 99, 0, NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `NoSerie` (`NoSerie`);

--
-- Indices de la tabla `comentariosgolden`
--
ALTER TABLE `comentariosgolden`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `NoSerie` (`NoSerie`);

--
-- Indices de la tabla `comentariostatus`
--
ALTER TABLE `comentariostatus`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comentariosterminados`
--
ALTER TABLE `comentariosterminados`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `NoSerie` (`NoSerie`);

--
-- Indices de la tabla `gibics`
--
ALTER TABLE `gibics`
  ADD PRIMARY KEY (`CtGibic`);

--
-- Indices de la tabla `golden`
--
ALTER TABLE `golden`
  ADD PRIMARY KEY (`NoSerie`),
  ADD KEY `NoReloj` (`NoReloj`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `noticomentarios`
--
ALTER TABLE `noticomentarios`
  ADD KEY `ID` (`ID`);

--
-- Indices de la tabla `pruebas`
--
ALTER TABLE `pruebas`
  ADD PRIMARY KEY (`NoSerie`);

--
-- Indices de la tabla `pruebasjv`
--
ALTER TABLE `pruebasjv`
  ADD PRIMARY KEY (`NoSerie`);

--
-- Indices de la tabla `pruebasmicro`
--
ALTER TABLE `pruebasmicro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_noserie` (`NoSerie`);

--
-- Indices de la tabla `pruebasterminadasjv`
--
ALTER TABLE `pruebasterminadasjv`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `pruebasterminados`
--
ALTER TABLE `pruebasterminados`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `racks`
--
ALTER TABLE `racks`
  ADD PRIMARY KEY (`NoSerie`),
  ADD KEY `NoReloj` (`NoReloj`);

--
-- Indices de la tabla `racksjv`
--
ALTER TABLE `racksjv`
  ADD PRIMARY KEY (`NoSerie`),
  ADD KEY `NoReloj` (`NoReloj`);

--
-- Indices de la tabla `racksmicro`
--
ALTER TABLE `racksmicro`
  ADD PRIMARY KEY (`NoSerie`),
  ADD KEY `NoReloj` (`NoReloj`);

--
-- Indices de la tabla `racksterminados`
--
ALTER TABLE `racksterminados`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `NoReloj` (`NoReloj`);

--
-- Indices de la tabla `racksterminadosjv`
--
ALTER TABLE `racksterminadosjv`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `NoReloj` (`NoReloj`);

--
-- Indices de la tabla `stats`
--
ALTER TABLE `stats`
  ADD PRIMARY KEY (`NoReloj`);

--
-- Indices de la tabla `sugerencia`
--
ALTER TABLE `sugerencia`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`No_Reloj`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `comentariosgolden`
--
ALTER TABLE `comentariosgolden`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `comentariostatus`
--
ALTER TABLE `comentariostatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT de la tabla `pruebasmicro`
--
ALTER TABLE `pruebasmicro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `pruebasterminadasjv`
--
ALTER TABLE `pruebasterminadasjv`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT de la tabla `pruebasterminados`
--
ALTER TABLE `pruebasterminados`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT de la tabla `racksterminados`
--
ALTER TABLE `racksterminados`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT de la tabla `racksterminadosjv`
--
ALTER TABLE `racksterminadosjv`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT de la tabla `sugerencia`
--
ALTER TABLE `sugerencia`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
