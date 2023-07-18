-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-07-2016 a las 14:17:24
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `NoSerie` varchar(10) NOT NULL,
  `NoReloj` varchar(5) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Hora` datetime NOT NULL,
  `Comentario` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`ID`, `NoSerie`, `NoReloj`, `Nombre`, `Hora`, `Comentario`) VALUES
(1, '2M26321321', '55098', 'Omar Alejandro Mora Cruz', '2016-07-23 12:09:39', 'estos comentarios estan chingones'),
(2, '2M26321ADD', '55098', 'Omar Alejandro Mora Cruz', '2016-07-23 12:34:53', 'ggvkjhbjhkkjmbjhb');

--
-- Disparadores `comentarios`
--
DELIMITER $$
CREATE TRIGGER `Terminar rack comentarios` AFTER DELETE ON `comentarios` FOR EACH ROW insert into comentariosterminados (NoSerie, NoReloj, Nombre, Hora, Comentario) values (OLD.NoSerie, OLD.NoReloj, OLD.Nombre, OLD.Hora, OLD.Comentario)
$$
DELIMITER ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id` int(11) NOT NULL,
  `titulo` varchar(250) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `descripcion` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id`, `titulo`, `imagen`, `descripcion`) VALUES
(16, 'Nuevo Procedimiento', 'upload/New_BSL_Upload_Process.png', 'Este es el nuevo procedimiento para subir logs de \r\nbootstrap'),
(17, 'NUEVA VERSION BSL', 'upload/Untitled.png', 'NUEVA VERSION DE BOOTSTRAP');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pruebas`
--

CREATE TABLE `pruebas` (
  `NoSerie` varchar(10) NOT NULL,
  `HoraInicio` datetime DEFAULT NULL,
  `FTO` tinyint(1) NOT NULL DEFAULT '0',
  `FTONoReloj` varchar(5) DEFAULT NULL,
  `FTOHoraFinal` datetime DEFAULT NULL,
  `Cisco` tinyint(1) NOT NULL DEFAULT '0',
  `CiscoNoReloj` varchar(5) DEFAULT NULL,
  `CiscoHoraFinal` datetime DEFAULT NULL,
  `Rackscan` tinyint(1) NOT NULL DEFAULT '0',
  `RackscanNoReloj` varchar(5) DEFAULT NULL,
  `RackscanHoraFinal` datetime DEFAULT NULL,
  `XTEE` tinyint(1) NOT NULL DEFAULT '0',
  `XTEENoReloj` varchar(5) DEFAULT NULL,
  `XTEEHoraFinal` datetime DEFAULT NULL,
  `Cluster` tinyint(1) NOT NULL DEFAULT '0',
  `ClusterNoReloj` varchar(5) DEFAULT NULL,
  `ClusterHoraFinal` datetime DEFAULT NULL,
  `Solar` tinyint(1) NOT NULL DEFAULT '0',
  `SolarNoReloj` varchar(5) DEFAULT NULL,
  `SolarHoraFinal` datetime DEFAULT NULL,
  `Solar2` tinyint(1) NOT NULL DEFAULT '0',
  `Solar2NoReloj` varchar(5) DEFAULT NULL,
  `Solar2HoraFinal` datetime DEFAULT NULL,
  `Wiring` tinyint(1) NOT NULL DEFAULT '0',
  `WiringNoReloj` varchar(5) DEFAULT NULL,
  `WiringHoraFinal` datetime DEFAULT NULL,
  `Bootstrap` tinyint(1) NOT NULL DEFAULT '0',
  `BootstrapNoReloj` varchar(5) DEFAULT NULL,
  `BootstrapHoraFinal` datetime DEFAULT NULL,
  `Sharknado` tinyint(1) NOT NULL DEFAULT '0',
  `SharknadoNoReloj` varchar(5) DEFAULT NULL,
  `SharknadoHoraFinal` datetime DEFAULT NULL,
  `DEID` tinyint(1) NOT NULL DEFAULT '0',
  `DEIDNoReloj` varchar(5) DEFAULT NULL,
  `DEIDHoraFinal` datetime DEFAULT NULL,
  `Megamind` tinyint(1) NOT NULL DEFAULT '0',
  `MegamindNoReloj` varchar(5) DEFAULT NULL,
  `MegamindHoraFinal` datetime DEFAULT NULL,
  `EOTA` tinyint(1) NOT NULL DEFAULT '0',
  `EOTANoReloj` varchar(5) DEFAULT NULL,
  `EOTAHoraFinal` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pruebas`
--

INSERT INTO `pruebas` (`NoSerie`, `HoraInicio`, `FTO`, `FTONoReloj`, `FTOHoraFinal`, `Cisco`, `CiscoNoReloj`, `CiscoHoraFinal`, `Rackscan`, `RackscanNoReloj`, `RackscanHoraFinal`, `XTEE`, `XTEENoReloj`, `XTEEHoraFinal`, `Cluster`, `ClusterNoReloj`, `ClusterHoraFinal`, `Solar`, `SolarNoReloj`, `SolarHoraFinal`, `Solar2`, `Solar2NoReloj`, `Solar2HoraFinal`, `Wiring`, `WiringNoReloj`, `WiringHoraFinal`, `Bootstrap`, `BootstrapNoReloj`, `BootstrapHoraFinal`, `Sharknado`, `SharknadoNoReloj`, `SharknadoHoraFinal`, `DEID`, `DEIDNoReloj`, `DEIDHoraFinal`, `Megamind`, `MegamindNoReloj`, `MegamindHoraFinal`, `EOTA`, `EOTANoReloj`, `EOTAHoraFinal`) VALUES
('2M22SDFG35', '2016-07-16 11:36:55', 1, '54966', '2016-07-16 11:37:55', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL),
('2M26123155', '2016-07-02 08:26:55', 1, '54966', '2016-07-02 08:42:16', 1, '54966', '2016-07-16 09:04:39', 1, '54966', '2016-07-16 11:35:18', 1, '54966', '2016-07-16 11:36:22', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL),
('2M26321321', '2016-07-16 09:02:26', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL),
('2M26321ADD', '2016-07-16 09:38:04', 1, '54966', '2016-07-16 09:38:11', 1, '54966', '2016-07-16 11:32:44', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL),
('2M26ASDFSD', '2016-07-16 11:35:41', 1, '54966', '2016-07-16 11:36:00', 1, '54966', '2016-07-16 11:36:14', 1, '54966', '2016-07-16 11:38:10', 1, '54966', '2016-07-16 11:38:14', 1, '54966', '2016-07-16 11:38:17', 1, '54966', '2016-07-16 11:38:21', 0, NULL, NULL, 1, '54966', '2016-07-16 11:38:25', 1, '54966', '2016-07-16 11:38:29', 1, '54966', '2016-07-16 11:38:33', 1, '54966', '2016-07-16 11:38:37', 1, '54966', '2016-07-16 11:38:41', 1, '54966', '2016-07-16 11:38:46'),
('2M26SDF3G2', '2016-07-16 11:32:34', 1, '54966', '2016-07-16 11:32:40', 1, '54966', '2016-07-16 11:46:41', 1, '54966', '2016-07-16 11:46:54', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL),
('2M26SDFGS3', '2016-07-16 11:47:18', 1, '54966', '2016-07-16 11:47:24', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL),
('2M26SFDG32', '2016-07-16 11:47:39', 1, '54966', '2016-07-16 11:47:44', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL),
('2M26SFG35C', '2016-07-16 11:35:56', 1, '54966', '2016-07-16 11:36:04', 1, '54966', '2016-07-16 11:36:26', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL);

--
-- Disparadores `pruebas`
--
DELIMITER $$
CREATE TRIGGER `terminar rack pruebas` AFTER DELETE ON `pruebas` FOR EACH ROW INSERT INTO pruebasterminados ( NoSerie  ,   HoraInicio  ,   FTO  ,   FTONoReloj  ,   FTOHoraFinal  ,   Cisco  ,   CiscoNoReloj  ,   CiscoHoraFinal  ,   XTEE  ,   XTEENoReloj  ,   XTEEHoraFinal  ,   Rackscan  ,   RackscanNoReloj  ,   RackscanHoraFinal  ,   Cluster  ,   ClusterNoReloj  ,   ClusterHoraFinal  ,   Solar  ,   SolarNoReloj  ,   SolarHoraFinal  ,   Solar2  , Solar2NoReloj, Solar2HoraFinal,   Bootstrap  ,   BootstrapNoReloj  ,   BootstrapHoraFinal  ,   Sharknado  ,   SharknadoNoReloj  ,   SharknadoHoraFinal  ,   Wiring  ,   WiringNoReloj  ,   WiringHoraFinal  ,   DEID  ,   DEIDNoReloj  ,   DEIDHoraFinal  ,   Megamind  ,   MegamindNoReloj  ,   MegamindHoraFinal  ,   EOTA  ,   EOTANoReloj  ,   EOTAHoraFinal ) VALUES (OLD.NoSerie ,  OLD.HoraInicio ,  OLD.FTO ,  OLD.FTONoReloj ,  OLD.FTOHoraFinal ,  OLD.Cisco ,  OLD.CiscoNoReloj ,  OLD.CiscoHoraFinal ,  OLD.XTEE ,  OLD.XTEENoReloj ,  OLD.XTEEHoraFinal ,  OLD.Rackscan ,  OLD.RackscanNoReloj ,  OLD.RackscanHoraFinal ,  OLD.Cluster ,  OLD.ClusterNoReloj ,  OLD.ClusterHoraFinal ,  OLD.Solar ,  OLD.SolarNoReloj ,  OLD.SolarHoraFinal ,  OLD.Solar2  , OLD.Solar2NoReloj, OLD.Solar2HoraFinal,  OLD.Bootstrap ,  OLD.BootstrapNoReloj ,  OLD.BootstrapHoraFinal ,  OLD.Sharknado ,  OLD.SharknadoNoReloj ,  OLD.SharknadoHoraFinal ,  OLD.Wiring ,  OLD.WiringNoReloj ,  OLD.WiringHoraFinal ,  OLD.DEID ,  OLD.DEIDNoReloj ,  OLD.DEIDHoraFinal ,  OLD.Megamind , OLD.MegamindNoReloj , OLD.MegamindHoraFinal ,  OLD.EOTA ,  OLD.EOTANoReloj ,  OLD.EOTAHoraFinal)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pruebasterminados`
--

CREATE TABLE `pruebasterminados` (
  `ID` int(11) NOT NULL,
  `NoSerie` varchar(10) NOT NULL,
  `HoraInicio` datetime DEFAULT NULL,
  `FTO` tinyint(1) NOT NULL DEFAULT '0',
  `FTONoReloj` varchar(5) DEFAULT NULL,
  `FTOHoraFinal` datetime DEFAULT NULL,
  `Cisco` tinyint(1) NOT NULL DEFAULT '0',
  `CiscoNoReloj` varchar(5) DEFAULT NULL,
  `CiscoHoraFinal` datetime DEFAULT NULL,
  `Rackscan` tinyint(1) NOT NULL DEFAULT '0',
  `RackscanNoReloj` varchar(5) DEFAULT NULL,
  `RackscanHoraFinal` datetime DEFAULT NULL,
  `XTEE` tinyint(1) NOT NULL DEFAULT '0',
  `XTEENoReloj` varchar(5) DEFAULT NULL,
  `XTEEHoraFinal` datetime DEFAULT NULL,
  `Cluster` tinyint(1) NOT NULL DEFAULT '0',
  `ClusterNoReloj` varchar(5) DEFAULT NULL,
  `ClusterHoraFinal` datetime DEFAULT NULL,
  `Solar` tinyint(1) NOT NULL DEFAULT '0',
  `SolarNoReloj` varchar(5) DEFAULT NULL,
  `SolarHoraFinal` datetime DEFAULT NULL,
  `Solar2` tinyint(1) NOT NULL DEFAULT '0',
  `Solar2NoReloj` varchar(5) DEFAULT NULL,
  `Solar2HoraFinal` datetime DEFAULT NULL,
  `Wiring` tinyint(1) NOT NULL DEFAULT '0',
  `WiringNoReloj` varchar(5) DEFAULT NULL,
  `WiringHoraFinal` datetime DEFAULT NULL,
  `Bootstrap` tinyint(1) NOT NULL DEFAULT '0',
  `BootstrapNoReloj` varchar(5) DEFAULT NULL,
  `BootstrapHoraFinal` datetime DEFAULT NULL,
  `Sharknado` tinyint(1) NOT NULL DEFAULT '0',
  `SharknadoNoReloj` varchar(5) DEFAULT NULL,
  `SharknadoHoraFinal` datetime DEFAULT NULL,
  `DEID` tinyint(1) NOT NULL DEFAULT '0',
  `DEIDNoReloj` varchar(5) DEFAULT NULL,
  `DEIDHoraFinal` datetime DEFAULT NULL,
  `Megamind` tinyint(1) NOT NULL DEFAULT '0',
  `MegamindNoReloj` varchar(5) DEFAULT NULL,
  `MegamindHoraFinal` datetime DEFAULT NULL,
  `EOTA` tinyint(1) NOT NULL DEFAULT '0',
  `EOTANoReloj` varchar(5) DEFAULT NULL,
  `EOTAHoraFinal` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pruebasterminados`
--

INSERT INTO `pruebasterminados` (`ID`, `NoSerie`, `HoraInicio`, `FTO`, `FTONoReloj`, `FTOHoraFinal`, `Cisco`, `CiscoNoReloj`, `CiscoHoraFinal`, `Rackscan`, `RackscanNoReloj`, `RackscanHoraFinal`, `XTEE`, `XTEENoReloj`, `XTEEHoraFinal`, `Cluster`, `ClusterNoReloj`, `ClusterHoraFinal`, `Solar`, `SolarNoReloj`, `SolarHoraFinal`, `Solar2`, `Solar2NoReloj`, `Solar2HoraFinal`, `Wiring`, `WiringNoReloj`, `WiringHoraFinal`, `Bootstrap`, `BootstrapNoReloj`, `BootstrapHoraFinal`, `Sharknado`, `SharknadoNoReloj`, `SharknadoHoraFinal`, `DEID`, `DEIDNoReloj`, `DEIDHoraFinal`, `Megamind`, `MegamindNoReloj`, `MegamindHoraFinal`, `EOTA`, `EOTANoReloj`, `EOTAHoraFinal`) VALUES
(49, '2M26111111', '2016-06-21 03:43:03', 1, '55098', '2016-06-21 04:43:36', 1, '55098', '2016-06-21 06:43:43', 1, '55098', '2016-06-21 10:43:48', 1, '55098', '2016-06-21 16:43:56', 1, '55098', '2016-06-21 16:44:02', 1, '55098', '2016-06-21 17:44:07', 0, NULL, NULL, 1, '55098', '2016-06-21 18:44:12', 1, '55098', '2016-06-21 21:44:16', 1, '55098', '2016-06-21 23:44:21', 1, '55098', '2016-06-21 23:59:26', 1, '55098', '2016-06-21 23:44:34', 1, '55098', '2016-06-22 02:44:38'),
(54, '2M26333333', '2016-06-21 04:56:47', 1, '55098', '2016-06-21 04:58:01', 1, '55098', '2016-06-22 01:14:35', 1, '55098', '2016-06-22 01:14:39', 0, NULL, NULL, 1, '55098', '2016-06-22 01:14:46', 1, '55098', '2016-06-22 01:14:42', 1, '55098', '2016-06-22 01:14:50', 1, '55098', '2016-06-22 01:14:57', 0, NULL, NULL, 1, '55098', '2016-06-22 01:14:53', 1, '55098', '2016-06-22 01:15:01', 1, '55098', '2016-06-22 01:15:04', 1, '55098', '2016-06-22 01:15:07'),
(55, '2M26111122', '2016-06-21 03:43:03', 1, '55098', '2016-06-21 04:43:36', 1, '55098', '2016-06-21 06:43:43', 1, '55098', '2016-06-21 10:43:48', 1, '55098', '2016-06-21 16:43:56', 1, '55098', '2016-06-21 16:44:02', 1, '55098', '2016-06-21 17:44:07', 0, NULL, NULL, 1, '55098', '2016-06-21 18:44:12', 1, '55098', '2016-06-21 21:44:16', 1, '55098', '2016-06-21 23:44:21', 1, '55098', '2016-06-21 23:59:26', 1, '55098', '2016-06-21 23:44:34', 1, '55098', '2016-06-22 02:44:38'),
(56, '2M26111133', '2016-06-21 03:43:03', 1, '55098', '2016-06-21 04:43:36', 1, '55098', '2016-06-21 06:43:43', 1, '55098', '2016-06-21 10:43:48', 1, '55098', '2016-06-21 19:43:56', 1, '55098', '2016-06-21 16:44:02', 1, '55098', '2016-06-21 17:44:07', 0, NULL, NULL, 1, '55098', '2016-06-21 18:44:12', 1, '55098', '2016-06-21 21:44:16', 1, '55098', '2016-06-21 23:44:21', 1, '55098', '2016-06-21 23:59:26', 1, '55098', '2016-06-21 23:44:34', 1, '55098', '2016-06-22 02:44:38'),
(57, '2M26111144', '2016-06-21 03:43:03', 1, '55098', '2016-06-21 04:43:36', 1, '55098', '2016-06-21 06:43:43', 1, '55098', '2016-06-21 10:43:48', 1, '55098', '2016-06-21 16:43:56', 1, '55098', '2016-06-21 16:44:02', 1, '55098', '2016-06-21 17:44:07', 0, NULL, NULL, 1, '55098', '2016-06-21 18:44:12', 1, '55098', '2016-06-21 21:44:16', 1, '55098', '2016-06-21 23:44:21', 1, '55098', '2016-06-21 23:59:26', 1, '55098', '2016-06-21 23:44:34', 1, '55098', '2016-06-22 02:44:38'),
(58, '2M26111155', '2016-06-21 03:43:03', 1, '55098', '2016-06-21 04:43:36', 1, '55098', '2016-06-21 06:43:43', 1, '55098', '2016-06-21 10:43:48', 1, '55098', '2016-06-21 17:43:56', 1, '55098', '2016-06-21 16:44:02', 1, '55098', '2016-06-21 17:44:07', 0, NULL, NULL, 1, '55098', '2016-06-21 18:44:12', 1, '55098', '2016-06-21 21:44:16', 1, '55098', '2016-06-21 23:44:21', 1, '55098', '2016-06-21 23:59:26', 1, '55098', '2016-06-21 23:44:34', 1, '55098', '2016-06-22 02:44:38'),
(59, '2M26111166', '2016-06-21 03:43:03', 1, '55098', '2016-06-21 04:43:36', 1, '55098', '2016-06-21 06:43:43', 1, '55098', '2016-06-21 10:43:48', 1, '55098', '2016-06-21 16:43:56', 1, '55098', '2016-06-21 16:44:02', 1, '55098', '2016-06-21 17:44:07', 0, NULL, NULL, 1, '55098', '2016-06-21 18:44:12', 1, '55098', '2016-06-21 21:44:16', 1, '55098', '2016-06-21 23:44:21', 1, '55098', '2016-06-21 23:59:26', 1, '55098', '2016-06-21 23:44:34', 1, '55098', '2016-06-22 02:44:38'),
(60, '2M26111177', '2016-06-21 03:43:03', 1, '55098', '2016-06-21 04:43:36', 1, '55098', '2016-06-21 06:43:43', 1, '55098', '2016-06-21 10:43:48', 1, '55098', '2016-06-21 20:43:56', 1, '55098', '2016-06-21 16:44:02', 1, '55098', '2016-06-21 17:44:07', 0, NULL, NULL, 1, '55098', '2016-06-21 18:44:12', 1, '55098', '2016-06-21 21:44:16', 1, '55098', '2016-06-21 23:44:21', 1, '55098', '2016-06-21 23:59:26', 1, '55098', '2016-06-21 23:44:34', 1, '55098', '2016-06-22 02:44:38'),
(61, '2M26111188', '2016-06-21 03:43:03', 1, '55098', '2016-06-21 04:43:36', 1, '55098', '2016-06-21 06:43:43', 1, '55098', '2016-06-21 10:43:48', 1, '55098', '2016-06-21 16:43:56', 1, '55098', '2016-06-21 16:44:02', 1, '55098', '2016-06-21 17:44:07', 0, NULL, NULL, 1, '55098', '2016-06-21 18:44:12', 1, '55098', '2016-06-21 21:44:16', 1, '55098', '2016-06-21 23:44:21', 1, '55098', '2016-06-21 23:59:26', 1, '55098', '2016-06-21 23:44:34', 1, '55098', '2016-06-22 02:44:38'),
(62, '2M26111199', '2016-06-21 03:43:03', 1, '55098', '2016-06-21 04:43:36', 1, '55098', '2016-06-21 06:43:43', 1, '55098', '2016-06-21 10:43:48', 1, '55098', '2016-06-21 16:43:56', 1, '55098', '2016-06-21 16:44:02', 1, '55098', '2016-06-21 17:44:07', 0, NULL, NULL, 1, '55098', '2016-06-21 18:44:12', 1, '55098', '2016-06-21 21:44:16', 1, '55098', '2016-06-21 23:44:21', 1, '55098', '2016-06-21 23:59:26', 1, '55098', '2016-06-21 23:44:34', 1, '55098', '2016-06-22 02:44:38'),
(63, '2M26111222', '2016-06-21 03:43:03', 1, '55098', '2016-06-21 04:43:36', 1, '55098', '2016-06-21 06:43:43', 1, '55098', '2016-06-21 10:43:48', 1, '55098', '2016-06-21 16:43:56', 1, '55098', '2016-06-21 16:44:02', 1, '55098', '2016-06-21 17:44:07', 0, NULL, NULL, 1, '55098', '2016-06-21 18:44:12', 1, '55098', '2016-06-21 21:44:16', 1, '55098', '2016-06-21 23:44:21', 1, '55098', '2016-06-21 23:59:26', 1, '55098', '2016-06-21 23:44:34', 1, '55098', '2016-06-22 02:44:38'),
(64, '2M26111333', '2016-06-21 03:43:03', 1, '55098', '2016-06-21 04:43:36', 1, '55098', '2016-06-21 06:43:43', 1, '55098', '2016-06-21 10:43:48', 1, '55098', '2016-06-21 16:43:56', 1, '55098', '2016-06-21 16:44:02', 1, '55098', '2016-06-21 17:44:07', 0, NULL, NULL, 1, '55098', '2016-06-21 18:44:12', 1, '55098', '2016-06-21 21:44:16', 1, '55098', '2016-06-21 23:44:21', 1, '55098', '2016-06-21 23:59:26', 1, '55098', '2016-06-21 23:44:34', 1, '55098', '2016-06-22 02:44:38'),
(65, '2M26111444', '2016-06-21 03:43:03', 1, '55098', '2016-06-21 04:43:36', 1, '55098', '2016-06-21 06:43:43', 1, '55098', '2016-06-21 10:43:48', 1, '55098', '2016-06-21 18:57:56', 1, '55098', '2016-06-21 16:44:02', 1, '55098', '2016-06-21 17:44:07', 0, NULL, NULL, 1, '55098', '2016-06-21 18:44:12', 1, '55098', '2016-06-21 21:44:16', 1, '55098', '2016-06-21 23:44:21', 1, '55098', '2016-06-21 23:59:26', 1, '55098', '2016-06-21 23:44:34', 1, '55098', '2016-06-22 02:44:38'),
(66, '2M26111555', '2016-06-21 03:43:03', 1, '55098', '2016-06-21 04:43:36', 1, '55098', '2016-06-21 06:43:43', 1, '55098', '2016-06-21 10:43:48', 1, '55098', '2016-06-21 16:43:56', 1, '55098', '2016-06-21 16:44:02', 1, '55098', '2016-06-21 17:44:07', 0, NULL, NULL, 1, '55098', '2016-06-21 18:44:12', 1, '55098', '2016-06-21 21:44:16', 1, '55098', '2016-06-21 23:44:21', 1, '55098', '2016-06-21 23:59:26', 1, '55098', '2016-06-21 23:44:34', 1, '55098', '2016-06-22 02:44:38'),
(67, '2M26111666', '2016-06-21 03:43:03', 1, '55098', '2016-06-21 04:43:36', 1, '55098', '2016-06-21 06:43:43', 1, '55098', '2016-06-21 10:43:48', 1, '55098', '2016-06-21 16:43:56', 1, '55098', '2016-06-21 16:44:02', 1, '55098', '2016-06-21 17:44:07', 0, NULL, NULL, 1, '55098', '2016-06-21 18:44:12', 1, '55098', '2016-06-21 21:44:16', 1, '55098', '2016-06-21 23:44:21', 1, '55098', '2016-06-21 23:59:26', 1, '55098', '2016-06-21 23:44:34', 1, '55098', '2016-06-22 02:44:38'),
(68, '2M26111777', '2016-06-21 03:43:03', 1, '55098', '2016-06-21 04:43:36', 1, '55098', '2016-06-21 06:43:43', 1, '55098', '2016-06-21 10:43:48', 1, '55098', '2016-06-21 11:43:56', 1, '55098', '2016-06-21 16:44:02', 1, '55098', '2016-06-21 17:44:07', 0, NULL, NULL, 1, '55098', '2016-06-21 18:44:12', 1, '55098', '2016-06-21 21:44:16', 1, '55098', '2016-06-21 23:44:21', 1, '55098', '2016-06-21 23:59:26', 1, '55098', '2016-06-21 23:44:34', 1, '55098', '2016-06-22 02:44:38'),
(69, '2M26111888', '2016-06-21 03:43:03', 1, '55098', '2016-06-21 04:43:36', 1, '55098', '2016-06-21 06:43:43', 1, '55098', '2016-06-21 10:43:48', 1, '55098', '2016-06-21 14:43:56', 1, '55098', '2016-06-21 16:44:02', 1, '55098', '2016-06-21 17:44:07', 0, NULL, NULL, 1, '55098', '2016-06-21 18:44:12', 1, '55098', '2016-06-21 21:44:16', 1, '55098', '2016-06-21 23:44:21', 1, '55098', '2016-06-21 23:59:26', 1, '55098', '2016-06-21 23:44:34', 1, '55098', '2016-06-22 02:44:38'),
(70, '2M26111999', '2016-06-21 03:43:03', 1, '55098', '2016-06-21 04:43:36', 1, '55098', '2016-06-21 06:43:43', 1, '55098', '2016-06-21 10:43:48', 1, '55098', '2016-06-21 13:43:56', 1, '55098', '2016-06-21 16:44:02', 1, '55098', '2016-06-21 17:44:07', 0, NULL, NULL, 1, '55098', '2016-06-21 18:44:12', 1, '55098', '2016-06-21 21:44:16', 1, '55098', '2016-06-21 23:44:21', 1, '55098', '2016-06-21 23:59:26', 1, '55098', '2016-06-21 23:44:34', 1, '55098', '2016-06-22 02:44:38'),
(71, '2M26112222', '2016-06-21 03:43:03', 1, '55098', '2016-06-21 04:43:36', 1, '55098', '2016-06-21 06:43:43', 1, '55098', '2016-06-21 10:43:48', 1, '55098', '2016-06-21 13:43:56', 1, '55098', '2016-06-21 16:44:02', 1, '55098', '2016-06-21 17:44:07', 0, NULL, NULL, 1, '55098', '2016-06-21 18:44:12', 1, '55098', '2016-06-21 21:44:16', 1, '55098', '2016-06-21 23:44:21', 1, '55098', '2016-06-21 23:59:26', 1, '55098', '2016-06-21 23:44:34', 1, '55098', '2016-06-22 02:44:38'),
(72, '2M26113333', '2016-06-21 03:43:03', 1, '55098', '2016-06-21 04:43:36', 1, '55098', '2016-06-21 06:43:43', 1, '55098', '2016-06-21 10:43:48', 1, '55098', '2016-06-21 16:43:56', 1, '55098', '2016-06-21 16:44:02', 1, '55098', '2016-06-21 17:44:07', 0, NULL, NULL, 1, '55098', '2016-06-21 18:44:12', 1, '55098', '2016-06-21 21:44:16', 1, '55098', '2016-06-21 23:44:21', 1, '55098', '2016-06-21 23:59:26', 1, '55098', '2016-06-21 23:44:34', 1, '55098', '2016-06-22 02:44:38'),
(73, '2M26114444', '2016-06-21 03:43:03', 1, '55098', '2016-06-21 04:43:36', 1, '55098', '2016-06-21 06:43:43', 1, '55098', '2016-06-21 10:43:48', 1, '55098', '2016-06-21 12:43:56', 1, '55098', '2016-06-21 16:44:02', 1, '55098', '2016-06-21 17:44:07', 0, NULL, NULL, 1, '55098', '2016-06-21 18:44:12', 1, '55098', '2016-06-21 21:44:16', 1, '55098', '2016-06-21 23:44:21', 1, '55098', '2016-06-21 23:59:26', 1, '55098', '2016-06-21 23:44:34', 1, '55098', '2016-06-22 02:44:38'),
(74, '2M26454512', '2016-06-23 12:25:21', 1, '55098', '2016-06-23 12:28:17', 1, '55098', '2016-06-23 12:28:20', 1, '55098', '2016-06-23 12:28:24', 1, '55098', '2016-06-23 12:28:27', 1, '55098', '2016-06-23 12:28:31', 1, '55098', '2016-06-23 12:28:35', 0, NULL, NULL, 1, '55098', '2016-06-23 12:28:39', 1, '55098', '2016-06-23 12:28:43', 1, '55098', '2016-06-23 12:28:49', 1, '55098', '2016-06-23 12:28:52', 1, '55098', '2016-06-23 12:28:55', 1, '55098', '2016-06-23 12:28:59'),
(76, '2M26888888', '2016-06-23 12:53:37', 1, '55098', '2016-06-23 12:53:44', 1, '55098', '2016-06-23 12:53:48', 1, '55098', '2016-06-23 12:54:24', 1, '55098', '2016-06-23 12:54:28', 1, '55098', '2016-06-23 12:54:32', 1, '55098', '2016-06-23 12:54:35', 0, NULL, NULL, 1, '55098', '2016-06-23 12:54:39', 1, '55098', '2016-06-23 12:54:42', 1, '55098', '2016-06-23 12:54:46', 1, '55098', '2016-06-23 12:54:50', 1, '55098', '2016-06-23 12:54:54', 1, '55098', '2016-06-23 12:54:58');

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
  `NoReloj` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `racks`
--

INSERT INTO `racks` (`NoSerie`, `WO`, `SKU`, `Bahia`, `Locacion`, `Modelo`, `Corriendo`, `NoReloj`) VALUES
('2M22SDFG35', '262626262', '3213A2FDS3', 1, 'TR01-05', 'Azure 4.1', 1, 54966),
('2M26123155', '262626262', '3212121212', 1, 'TR01-01', 'Azure 4.1', 1, 54966),
('2M26321321', '262626262', '1111332133', 1, 'TR01-02', 'Azure 4.1', 1, 54966),
('2M26321ADD', '323255643', '3213213213', 2, 'TR02-17', 'Dropbox', 1, 54966),
('2M26ASDFSD', '262626262', '654654AS6D', 1, 'TR01-03', 'Azure 4.1', 1, 54966),
('2M26SDF3G2', '323255643', '321A32DS1F', 2, 'TR02-18', 'Dropbox', 1, 54966),
('2M26SDFGS3', '323255643', '32132132S1', 2, 'TR02-19', 'Dropbox', 1, 54966),
('2M26SFDG32', '323255643', '321SDFG321', 2, 'TR02-20', 'Dropbox', 1, 54966),
('2M26SFG35C', '262626262', '32ADF351AS', 1, 'TR01-04', 'Azure 4.1', 1, 54966);

--
-- Disparadores `racks`
--
DELIMITER $$
CREATE TRIGGER `terminar rack` AFTER DELETE ON `racks` FOR EACH ROW insert into racksterminados(NoSerie, WO, SKU, Bahia, Locacion, Modelo, Corriendo, NoReloj) VALUES (OLD.NoSerie, OLD.WO, OLD.SKU, OLD.Bahia, OLD.Locacion, OLD.Modelo, OLD.Corriendo, OLD.NoReloj)
$$
DELIMITER ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `racksterminados`
--

INSERT INTO `racksterminados` (`ID`, `NoSerie`, `WO`, `SKU`, `Bahia`, `Locacion`, `Modelo`, `Corriendo`, `NoReloj`) VALUES
(49, '2M26111111', '111111112', '1111111111', 1, 'TR01-01', 'Azure 4.1', 0, 55098),
(54, '2M26333333', '222222222', '1111111111', 2, 'TR02-17', 'Dropbox', 0, 55098),
(55, '2M26111122', '111111113', '1111111111', 1, 'TR01-01', 'Azure 4.1', 0, 55098),
(56, '2M26111133', '111111114', '1111111111', 1, 'TR01-01', 'Azure 4.1', 0, 55098),
(57, '2M26111144', '111111115', '1111111111', 1, 'TR01-01', 'Azure 4.1', 0, 55098),
(58, '2M26111155', '111111116', '1111111111', 1, 'TR01-01', 'Azure 4.1', 0, 55098),
(59, '2M26111166', '111111117', '1111111111', 1, 'TR01-01', 'Azure 4.1', 0, 55098),
(60, '2M26111177', '111111111', '1111111111', 1, 'TR01-01', 'Azure 4.1', 0, 55098),
(61, '2M26111188', '111111111', '1111111111', 1, 'TR01-01', 'Azure 4.1', 0, 55098),
(62, '2M26111199', '111111111', '1111111111', 1, 'TR01-01', 'Azure 4.1', 0, 55098),
(63, '2M26111222', '111111111', '1111111111', 1, 'TR01-01', 'Azure 4.1', 0, 55098),
(64, '2M26111333', '111111111', '1111111111', 1, 'TR01-01', 'Azure 4.1', 0, 55098),
(65, '2M26111444', '111111111', '1111111111', 1, 'TR01-01', 'Azure 4.1', 0, 55098),
(66, '2M26111555', '111111111', '1111111111', 1, 'TR01-01', 'Azure 4.1', 0, 55098),
(67, '2M26111666', '111111111', '1111111111', 1, 'TR01-01', 'Azure 4.1', 0, 55098),
(68, '2M26111777', '111111111', '1111111111', 1, 'TR01-01', 'Azure 4.1', 0, 55098),
(69, '2M26111888', '111111111', '1111111111', 1, 'TR01-01', 'Azure 4.1', 0, 55098),
(70, '2M26111999', '111111111', '1111111111', 1, 'TR01-01', 'Azure 4.1', 0, 55098),
(71, '2M26112222', '111111111', '1111111111', 1, 'TR01-01', 'Azure 4.1', 0, 55098),
(72, '2M26113333', '111111111', '1111111111', 1, 'TR01-01', 'Azure 4.1', 0, 55098),
(73, '2M26114444', '111111111', '1111111111', 1, 'TR01-01', 'Azure 4.1', 0, 55098),
(74, '2M26454512', '777777777', '2333333333', 3, 'TR03-34', 'Azure 4.1', 0, 55098),
(76, '2M26888888', '484848484', '8888888888', 4, 'TR04-51', 'Azure 4.1', 0, 55098);

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
  `Bahia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`No_Reloj`, `Pass`, `Nombre`, `Turno`, `Nivel`, `Bahia`) VALUES
(54966, '123', 'Carlos Lizandro Agustin Rosales', 3, 1, 7),
(55097, '&#39;&#39;&#39;&#39;', 'Omar Alex Mora', 3, 2, 6),
(55098, '123', 'Omar Alejandro Mora Cruz', 3, 1, 6),
(55099, '123', 'Victor PiÃ±a', 3, 2, 6),
(55100, '123', 'Elisa Gabriela Salazar Padilla', 3, 2, 6),
(55101, '123', 'Emmanuel Escobedo', 3, 2, 6);

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
-- Indices de la tabla `comentariosterminados`
--
ALTER TABLE `comentariosterminados`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `NoSerie` (`NoSerie`);

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
-- Indices de la tabla `pruebas`
--
ALTER TABLE `pruebas`
  ADD PRIMARY KEY (`NoSerie`);

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
-- Indices de la tabla `racksterminados`
--
ALTER TABLE `racksterminados`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `NoReloj` (`NoReloj`);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `comentariosgolden`
--
ALTER TABLE `comentariosgolden`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `comentariosterminados`
--
ALTER TABLE `comentariosterminados`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `pruebasterminados`
--
ALTER TABLE `pruebasterminados`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT de la tabla `racksterminados`
--
ALTER TABLE `racksterminados`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
