-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-06-2016 a las 00:36:32
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
(23, '2M263SXCVV', '54966', 'Carlos Lizandro Agustin Rosales', '2016-06-26 08:14:01', 'comentarios');

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

--
-- Volcado de datos para la tabla `comentariosgolden`
--

INSERT INTO `comentariosgolden` (`ID`, `NoSerie`, `NoReloj`, `Nombre`, `Hora`, `Comentario`) VALUES
(1, '2M26111111', '55098', 'Omar Alejandro Mora Cruz', '2016-06-14 12:27:37', 'hola');

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

--
-- Volcado de datos para la tabla `comentariosterminados`
--

INSERT INTO `comentariosterminados` (`ID`, `NoSerie`, `NoReloj`, `Nombre`, `Hora`, `Comentario`) VALUES
(16, '2M26232323', '55098', 'Omar Alejandro Mora Cruz', '2016-06-14 01:11:49', 'hola'),
(17, '2M26232323', '54966', 'Carlos Lizandro Agustin Rosales', '2016-06-26 07:37:00', 'hol &#39;&#39;\r\n'),
(18, '2M26232323', '54966', 'Carlos Lizandro Agustin Rosales', '2016-06-26 07:37:16', '&#39;&#34;lskdf&#34;&#39;\r\n'),
(19, '2M26232323', '54966', 'Carlos Lizandro Agustin Rosales', '2016-06-26 07:37:34', 'kalsdhfjlashdlfashdljf\r\naskjdhfasdf');

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

--
-- Volcado de datos para la tabla `golden`
--

INSERT INTO `golden` (`NoSerie`, `WO`, `SKU`, `Locacion`, `Estatus`, `NoReloj`, `HoraEntrada`) VALUES
('2M26111111', '111111111', '123123123', '1_1', 'XTEE-RUNNING', 55098, '0000-00-00 00:00:00');

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
  `XTEE` tinyint(1) NOT NULL DEFAULT '0',
  `XTEENoReloj` varchar(5) DEFAULT NULL,
  `XTEEHoraFinal` datetime DEFAULT NULL,
  `Rackscan` tinyint(1) NOT NULL DEFAULT '0',
  `RackscanNoReloj` varchar(5) DEFAULT NULL,
  `RackscanHoraFinal` datetime DEFAULT NULL,
  `Cluster` tinyint(1) NOT NULL DEFAULT '0',
  `ClusterNoReloj` varchar(5) DEFAULT NULL,
  `ClusterHoraFinal` datetime DEFAULT NULL,
  `Solar` tinyint(1) NOT NULL DEFAULT '0',
  `SolarNoReloj` varchar(5) DEFAULT NULL,
  `SolarHoraFinal` datetime DEFAULT NULL,
  `Solar2` tinyint(1) NOT NULL DEFAULT '0',
  `Solar2NoReloj` varchar(5) DEFAULT NULL,
  `Solar2HoraFinal` datetime DEFAULT NULL,
  `Bootstrap` tinyint(1) NOT NULL DEFAULT '0',
  `BootstrapNoReloj` varchar(5) DEFAULT NULL,
  `BootstrapHoraFinal` datetime DEFAULT NULL,
  `Sharknado` tinyint(1) NOT NULL DEFAULT '0',
  `SharknadoNoReloj` varchar(5) DEFAULT NULL,
  `SharknadoHoraFinal` datetime DEFAULT NULL,
  `Wiring` tinyint(1) NOT NULL DEFAULT '0',
  `WiringNoReloj` varchar(5) DEFAULT NULL,
  `WiringHoraFinal` datetime DEFAULT NULL,
  `DEID` tinyint(1) NOT NULL DEFAULT '0',
  `DEIDNoReloj` varchar(5) DEFAULT NULL,
  `DEIDHoraFinal` datetime DEFAULT NULL,
  `Megamind` tinyint(1) NOT NULL DEFAULT '0',
  `MegamindNoReloj` varchar(5) DEFAULT NULL,
  `MegamindHoraFinal` datetime DEFAULT NULL,
  `EOTA` tinyint(1) NOT NULL DEFAULT '0',
  `EOTANoReloj` varchar(5) DEFAULT NULL,
  `EOTAHoraFinal` datetime DEFAULT NULL,
  `Arista1` tinyint(1) DEFAULT NULL,
  `Arista1Hora` datetime DEFAULT NULL,
  `Arista1NoReloj` varchar(5) DEFAULT NULL,
  `Arista2` tinyint(1) DEFAULT NULL,
  `Arista2Hora` datetime DEFAULT NULL,
  `Arista2NoReloj` varchar(5) DEFAULT NULL,
  `ClusterNic0` tinyint(1) DEFAULT NULL,
  `ClusterNic0Hora` datetime DEFAULT NULL,
  `ClusterNic0NoReloj` varchar(5) DEFAULT NULL,
  `ClusterNic1` tinyint(1) DEFAULT NULL,
  `ClusterNic1Hora` datetime DEFAULT NULL,
  `ClusterNic1NoReloj` varchar(5) DEFAULT NULL,
  `CM` tinyint(1) DEFAULT NULL,
  `CMHora` datetime DEFAULT NULL,
  `CMNoReloj` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pruebas`
--

INSERT INTO `pruebas` (`NoSerie`, `HoraInicio`, `FTO`, `FTONoReloj`, `FTOHoraFinal`, `Cisco`, `CiscoNoReloj`, `CiscoHoraFinal`, `XTEE`, `XTEENoReloj`, `XTEEHoraFinal`, `Rackscan`, `RackscanNoReloj`, `RackscanHoraFinal`, `Cluster`, `ClusterNoReloj`, `ClusterHoraFinal`, `Solar`, `SolarNoReloj`, `SolarHoraFinal`, `Solar2`, `Solar2NoReloj`, `Solar2HoraFinal`, `Bootstrap`, `BootstrapNoReloj`, `BootstrapHoraFinal`, `Sharknado`, `SharknadoNoReloj`, `SharknadoHoraFinal`, `Wiring`, `WiringNoReloj`, `WiringHoraFinal`, `DEID`, `DEIDNoReloj`, `DEIDHoraFinal`, `Megamind`, `MegamindNoReloj`, `MegamindHoraFinal`, `EOTA`, `EOTANoReloj`, `EOTAHoraFinal`, `Arista1`, `Arista1Hora`, `Arista1NoReloj`, `Arista2`, `Arista2Hora`, `Arista2NoReloj`, `ClusterNic0`, `ClusterNic0Hora`, `ClusterNic0NoReloj`, `ClusterNic1`, `ClusterNic1Hora`, `ClusterNic1NoReloj`, `CM`, `CMHora`, `CMNoReloj`) VALUES
('2M23555555', '2016-06-26 11:20:17', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('2M26111111', '2016-06-26 11:12:48', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('2M26333333', '2016-06-26 11:08:51', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Disparadores `pruebas`
--
DELIMITER $$
CREATE TRIGGER `terminar rack pruebas` AFTER DELETE ON `pruebas` FOR EACH ROW INSERT INTO pruebasterminados ( NoSerie  ,   HoraInicio  ,   FTO  ,   FTONoReloj  ,   FTOHoraFinal  ,   Cisco  ,   CiscoNoReloj  ,   CiscoHoraFinal  ,   XTEE  ,   XTEENoReloj  ,   XTEEHoraFinal  ,   Rackscan  ,   RackscanNoReloj  ,   RackscanHoraFinal  ,   Cluster  ,   ClusterNoReloj  ,   ClusterHoraFinal  ,   Solar  ,   SolarNoReloj  ,   SolarHoraFinal  ,   Solar2  , Solar2NoReloj, Solar2HoraFinal,   Bootstrap  ,   BootstrapNoReloj  ,   BootstrapHoraFinal  ,   Sharknado  ,   SharknadoNoReloj  ,   SharknadoHoraFinal  ,   Wiring  ,   WiringNoReloj  ,   WiringHoraFinal  ,   DEID  ,   DEIDNoReloj  ,   DEIDHoraFinal  ,   Megamind  ,   MegamindNoReloj  ,   MegamindHoraFinal  ,   EOTA  ,   EOTANoReloj  ,   EOTAHoraFinal, Arista1, Arista1Hora, Arista1NoReloj, Arista2, Arista2Hora, Arista2NoReloj, ClusterNic0, ClusterNic0Hora, ClusterNic0NoReloj, ClusterNic1, ClusterNic1Hora, ClusterNic1NoReloj, CM, CMHora, CMNoReloj) VALUES (OLD.NoSerie ,  OLD.HoraInicio ,  OLD.FTO ,  OLD.FTONoReloj ,  OLD.FTOHoraFinal ,  OLD.Cisco ,  OLD.CiscoNoReloj ,  OLD.CiscoHoraFinal ,  OLD.XTEE ,  OLD.XTEENoReloj ,  OLD.XTEEHoraFinal ,  OLD.Rackscan ,  OLD.RackscanNoReloj ,  OLD.RackscanHoraFinal ,  OLD.Cluster ,  OLD.ClusterNoReloj ,  OLD.ClusterHoraFinal ,  OLD.Solar ,  OLD.SolarNoReloj ,  OLD.SolarHoraFinal ,  OLD.Solar2  , OLD.Solar2NoReloj, OLD.Solar2HoraFinal,  OLD.Bootstrap ,  OLD.BootstrapNoReloj ,  OLD.BootstrapHoraFinal ,  OLD.Sharknado ,  OLD.SharknadoNoReloj ,  OLD.SharknadoHoraFinal ,  OLD.Wiring ,  OLD.WiringNoReloj ,  OLD.WiringHoraFinal ,  OLD.DEID ,  OLD.DEIDNoReloj ,  OLD.DEIDHoraFinal ,  OLD.Megamind , OLD.MegamindNoReloj , OLD.MegamindHoraFinal ,  OLD.EOTA ,  OLD.EOTANoReloj ,  OLD.EOTAHoraFinal, OLD.Arista1, OLD.Arista1Hora, OLD.Arista1NoReloj, OLD.Arista2, OLD.Arista2Hora, OLD.Arista2NoReloj, OLD.ClusterNic0, OLD.ClusterNic0Hora, OLD.ClusterNic0NoReloj, OLD.ClusterNic1, OLD.ClusterNic0Hora, OLD.ClusterNic0NoReloj, OLD.CM, OLD.CMHora, OLD.CMNoReloj)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pruebasterminados`
--

CREATE TABLE `pruebasterminados` (
  `NoSerie` varchar(10) NOT NULL,
  `HoraInicio` datetime DEFAULT NULL,
  `FTO` tinyint(1) NOT NULL DEFAULT '0',
  `FTONoReloj` varchar(5) DEFAULT NULL,
  `FTOHoraFinal` datetime DEFAULT NULL,
  `Cisco` tinyint(1) NOT NULL DEFAULT '0',
  `CiscoNoReloj` varchar(5) DEFAULT NULL,
  `CiscoHoraFinal` datetime DEFAULT NULL,
  `XTEE` tinyint(1) NOT NULL DEFAULT '0',
  `XTEENoReloj` varchar(5) DEFAULT NULL,
  `XTEEHoraFinal` datetime DEFAULT NULL,
  `Rackscan` tinyint(1) NOT NULL DEFAULT '0',
  `RackscanNoReloj` varchar(5) DEFAULT NULL,
  `RackscanHoraFinal` datetime DEFAULT NULL,
  `Cluster` tinyint(1) NOT NULL DEFAULT '0',
  `ClusterNoReloj` varchar(5) DEFAULT NULL,
  `ClusterHoraFinal` datetime DEFAULT NULL,
  `Solar` tinyint(1) NOT NULL DEFAULT '0',
  `SolarNoReloj` varchar(5) DEFAULT NULL,
  `SolarHoraFinal` datetime DEFAULT NULL,
  `Solar2` tinyint(1) NOT NULL DEFAULT '0',
  `Solar2NoReloj` varchar(5) DEFAULT NULL,
  `Solar2HoraFinal` datetime DEFAULT NULL,
  `Bootstrap` tinyint(1) NOT NULL DEFAULT '0',
  `BootstrapNoReloj` varchar(5) DEFAULT NULL,
  `BootstrapHoraFinal` datetime DEFAULT NULL,
  `Sharknado` tinyint(1) NOT NULL DEFAULT '0',
  `SharknadoNoReloj` varchar(5) DEFAULT NULL,
  `SharknadoHoraFinal` datetime DEFAULT NULL,
  `Wiring` tinyint(1) NOT NULL DEFAULT '0',
  `WiringNoReloj` varchar(5) DEFAULT NULL,
  `WiringHoraFinal` datetime DEFAULT NULL,
  `DEID` tinyint(1) NOT NULL DEFAULT '0',
  `DEIDNoReloj` varchar(5) DEFAULT NULL,
  `DEIDHoraFinal` datetime DEFAULT NULL,
  `Megamind` tinyint(1) NOT NULL DEFAULT '0',
  `MegamindNoReloj` varchar(5) DEFAULT NULL,
  `MegamindHoraFinal` datetime DEFAULT NULL,
  `EOTA` tinyint(1) NOT NULL DEFAULT '0',
  `EOTANoReloj` varchar(5) DEFAULT NULL,
  `EOTAHoraFinal` datetime DEFAULT NULL,
  `Arista1` tinyint(1) DEFAULT NULL,
  `Arista1Hora` datetime DEFAULT NULL,
  `Arista1NoReloj` varchar(5) DEFAULT NULL,
  `Arista2` tinyint(1) DEFAULT NULL,
  `Arista2Hora` datetime DEFAULT NULL,
  `Arista2NoReloj` varchar(5) DEFAULT NULL,
  `ClusterNic0` tinyint(1) DEFAULT NULL,
  `ClusterNic0Hora` datetime DEFAULT NULL,
  `ClusterNic0NoReloj` varchar(5) DEFAULT NULL,
  `ClusterNic1` tinyint(1) DEFAULT NULL,
  `ClusterNic1Hora` datetime DEFAULT NULL,
  `ClusterNic1NoReloj` varchar(5) DEFAULT NULL,
  `CM` tinyint(1) DEFAULT NULL,
  `CMHora` datetime DEFAULT NULL,
  `CMNoReloj` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pruebasterminados`
--

INSERT INTO `pruebasterminados` (`NoSerie`, `HoraInicio`, `FTO`, `FTONoReloj`, `FTOHoraFinal`, `Cisco`, `CiscoNoReloj`, `CiscoHoraFinal`, `XTEE`, `XTEENoReloj`, `XTEEHoraFinal`, `Rackscan`, `RackscanNoReloj`, `RackscanHoraFinal`, `Cluster`, `ClusterNoReloj`, `ClusterHoraFinal`, `Solar`, `SolarNoReloj`, `SolarHoraFinal`, `Solar2`, `Solar2NoReloj`, `Solar2HoraFinal`, `Bootstrap`, `BootstrapNoReloj`, `BootstrapHoraFinal`, `Sharknado`, `SharknadoNoReloj`, `SharknadoHoraFinal`, `Wiring`, `WiringNoReloj`, `WiringHoraFinal`, `DEID`, `DEIDNoReloj`, `DEIDHoraFinal`, `Megamind`, `MegamindNoReloj`, `MegamindHoraFinal`, `EOTA`, `EOTANoReloj`, `EOTAHoraFinal`, `Arista1`, `Arista1Hora`, `Arista1NoReloj`, `Arista2`, `Arista2Hora`, `Arista2NoReloj`, `ClusterNic0`, `ClusterNic0Hora`, `ClusterNic0NoReloj`, `ClusterNic1`, `ClusterNic1Hora`, `ClusterNic1NoReloj`, `CM`, `CMHora`, `CMNoReloj`) VALUES
('2M26123123', '2016-06-26 11:07:19', 1, '54966', '2016-06-26 11:07:48', 0, NULL, NULL, 0, NULL, NULL, 1, '54966', '2016-06-26 11:08:14', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 1, '54966', '2016-06-26 11:08:10', 0, NULL, NULL, 0, NULL, NULL, 1, '54966', '2016-06-26 11:08:18', 0, NULL, NULL, 1, '54966', '2016-06-26 11:08:24', 1, '2016-06-26 11:07:52', '54966', 1, '2016-06-26 11:07:56', '54966', 1, '2016-06-26 11:07:59', '54966', 1, '2016-06-26 11:07:59', '54966', 1, '2016-06-26 11:08:06', '54966'),
('2M26666666', '2016-06-26 11:00:36', 1, '54966', '2016-06-26 11:00:45', 0, NULL, NULL, 0, NULL, NULL, 1, '54966', '2016-06-26 11:01:45', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 1, '54966', '2016-06-26 11:01:41', 0, NULL, NULL, 0, NULL, NULL, 1, '54966', '2016-06-26 11:01:50', 0, NULL, NULL, 1, '54966', '2016-06-26 11:01:53', 1, '2016-06-26 11:01:22', '54966', 1, '2016-06-26 11:01:26', '54966', 1, '2016-06-26 11:01:29', '54966', 1, '2016-06-26 11:01:29', '54966', 1, '2016-06-26 11:01:37', '54966'),
('2M26AAAAAA', '2016-06-26 11:17:21', 1, '54966', '2016-06-26 11:17:25', 1, '54966', '2016-06-26 11:17:28', 1, '54966', '2016-06-26 11:17:36', 1, '54966', '2016-06-26 11:17:31', 1, '54966', '2016-06-26 11:17:40', 1, '54966', '2016-06-26 11:17:45', 0, NULL, NULL, 1, '54966', '2016-06-26 11:17:56', 1, '54966', '2016-06-26 11:17:59', 1, '54966', '2016-06-26 11:17:50', 1, '54966', '2016-06-26 11:18:04', 1, '54966', '2016-06-26 11:18:11', 1, '54966', '2016-06-26 11:18:16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('2M26SDF212', '2016-06-26 11:00:24', 1, '54966', '2016-06-26 11:00:42', 0, NULL, NULL, 0, NULL, NULL, 1, '54966', '2016-06-26 11:01:09', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 1, '54966', '2016-06-26 11:01:06', 0, NULL, NULL, 0, NULL, NULL, 1, '54966', '2016-06-26 11:01:13', 0, NULL, NULL, 1, '54966', '2016-06-26 11:01:18', 1, '2016-06-26 11:00:49', '54966', 1, '2016-06-26 11:00:53', '54966', 1, '2016-06-26 11:00:56', '54966', 1, '2016-06-26 11:00:56', '54966', 1, '2016-06-26 11:01:03', '54966');

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
('2M23555555', '112222222', '1111111111', 1, 'TR01-02', 'Azure 4.1', 1, 54966),
('2M26333333', '112222222', '1111111111', 1, 'TR01-01', 'Azure 4.1', 1, 54966);

--
-- Disparadores `racks`
--
DELIMITER $$
CREATE TRIGGER `terminar rack` AFTER DELETE ON `racks` FOR EACH ROW insert into racksterminados(NoSerie, WO, SKU, Bahia, Locacion, Modelo, Corriendo, NoReloj) VALUES (OLD.NoSerie, OLD.WO, OLD.SKU, OLD.Bahia, OLD.Locacion, OLD.Modelo, OLD.Corriendo, OLD.NoReloj)
$$
DELIMITER ;

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
  `NoReloj` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `racksjv`
--

INSERT INTO `racksjv` (`NoSerie`, `WO`, `SKU`, `Bahia`, `Locacion`, `Modelo`, `Corriendo`, `NoReloj`) VALUES
('2M26111111', '111111111', '2222233333', 1, 'TR01-02', 'Microsoft', 1, 54966),
('2M26333333', '222222222', '3333333333', 1, 'TR01-01', 'Microsoft', 1, 54966);

--
-- Disparadores `racksjv`
--
DELIMITER $$
CREATE TRIGGER `terminar rack jv` AFTER DELETE ON `racksjv` FOR EACH ROW insert into racksjvterminados(NoSerie, WO, SKU, Bahia, Locacion, Modelo, Corriendo, NoReloj) VALUES (OLD.NoSerie, OLD.WO, OLD.SKU, OLD.Bahia, OLD.Locacion, OLD.Modelo, OLD.Corriendo, OLD.NoReloj)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `racksjvterminados`
--

CREATE TABLE `racksjvterminados` (
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
-- Volcado de datos para la tabla `racksjvterminados`
--

INSERT INTO `racksjvterminados` (`NoSerie`, `WO`, `SKU`, `Bahia`, `Locacion`, `Modelo`, `Corriendo`, `NoReloj`) VALUES
('2M26123123', '111111111', '2222222222', 1, 'TR01-01', 'Microsoft', 1, 54966),
('2M26666666', '111111111', '1111111111', 1, 'TR01-02', 'Microsoft', 1, 54966),
('2M26SDF212', '111111111', '1111111111', 1, 'TR01-01', 'Microsoft', 1, 54966);

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
(41, '2M26252525', '156456456', '4613654653', 2, 'TR02-17', 'Dropbox', 1, 55098),
(42, '2M263SXCVV', '111111111', '321212121A', 3, 'TR03-33', 'Dropbox', 1, 54966),
(43, '2M26564687', '546546546', '4564564564', 2, 'TR02-18', 'Azure 4.1', 1, 55098),
(44, '2M26AAAAAA', '112222222', '2222222222', 1, 'TR01-01', 'Azure 4.1', 0, 54966);

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
-- Indices de la tabla `pruebas`
--
ALTER TABLE `pruebas`
  ADD PRIMARY KEY (`NoSerie`);

--
-- Indices de la tabla `pruebasterminados`
--
ALTER TABLE `pruebasterminados`
  ADD PRIMARY KEY (`NoSerie`);

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
-- Indices de la tabla `racksjvterminados`
--
ALTER TABLE `racksjvterminados`
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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de la tabla `comentariosgolden`
--
ALTER TABLE `comentariosgolden`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `comentariosterminados`
--
ALTER TABLE `comentariosterminados`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `racksterminados`
--
ALTER TABLE `racksterminados`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
