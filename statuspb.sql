-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 16, 2016 at 05:12 AM
-- Server version: 5.5.49-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `statuspb`
--

-- --------------------------------------------------------

--
-- Table structure for table `comentarios`
--

CREATE TABLE IF NOT EXISTS `comentarios` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NoSerie` varchar(10) NOT NULL,
  `NoReloj` varchar(5) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Hora` datetime NOT NULL,
  `Comentario` text NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `NoSerie` (`NoSerie`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `comentarios`
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
(13, '2M26464898', '345', 'Jafet Martinez ', '2016-10-26 05:07:40', 'Se encontro un switch defectuoso');

--
-- Triggers `comentarios`
--
DROP TRIGGER IF EXISTS `Terminar rack comentarios`;
DELIMITER //
CREATE TRIGGER `Terminar rack comentarios` AFTER DELETE ON `comentarios`
 FOR EACH ROW insert into comentariosterminados (NoSerie, NoReloj, Nombre, Hora, Comentario) values (OLD.NoSerie, OLD.NoReloj, OLD.Nombre, OLD.Hora, OLD.Comentario)
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `comentariosgolden`
--

CREATE TABLE IF NOT EXISTS `comentariosgolden` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NoSerie` varchar(10) NOT NULL,
  `NoReloj` varchar(5) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Hora` datetime NOT NULL,
  `Comentario` text NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `NoSerie` (`NoSerie`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `comentariosgolden`
--

INSERT INTO `comentariosgolden` (`ID`, `NoSerie`, `NoReloj`, `Nombre`, `Hora`, `Comentario`) VALUES
(2, '2M26111111', '54966', 'Carlos Lizandro Agustin Rosales', '2016-11-15 03:30:29', 'hola');

-- --------------------------------------------------------

--
-- Table structure for table `comentariostatus`
--

CREATE TABLE IF NOT EXISTS `comentariostatus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Comentario` text,
  `Bahia` int(1) DEFAULT NULL,
  `No_Reloj` int(5) DEFAULT NULL,
  `turnoA` int(1) DEFAULT NULL,
  `No_Reloj2` int(5) DEFAULT NULL,
  `turnoB` int(1) DEFAULT NULL,
  `horacomentario` datetime DEFAULT NULL,
  `descripcion` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `comentariostatus`
--

INSERT INTO `comentariostatus` (`id`, `Comentario`, `Bahia`, `No_Reloj`, `turnoA`, `No_Reloj2`, `turnoB`, `horacomentario`, `descripcion`) VALUES
(49, 'Estatus liberado por 54123 el dia Wednesday a las 03:55:44', 1, 54123, 3, NULL, NULL, '2016-11-09 03:55:44', '2016-11-09 03-55-44'),
(50, 'Estatus liberado por 54123 el dia Wednesday a las 03:58:01', 1, 54123, 3, NULL, NULL, '2016-11-09 03:58:01', '2016-11-09 03-58-01'),
(51, 'Nuevo paso de estatus', 1, 54966, 3, 54123, 3, '2016-11-09 06:21:51', '2016-11-09 06-21-51'),
(52, 'Estatus liberado por 54966 el dia Miercoles a las 06:22:32', 1, 54966, 3, NULL, NULL, '2016-11-09 06:22:32', '2016-11-09 06-22-32'),
(53, 'nuevo paso de estatus gb', 1, 54966, 3, 54123, 3, '2016-11-09 06:26:33', '2016-11-09 06-26-33');

-- --------------------------------------------------------

--
-- Table structure for table `comentariosterminados`
--

CREATE TABLE IF NOT EXISTS `comentariosterminados` (
  `ID` int(11) NOT NULL,
  `NoSerie` varchar(10) NOT NULL,
  `NoReloj` varchar(5) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Hora` datetime NOT NULL,
  `Comentario` text NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `NoSerie` (`NoSerie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gibics`
--

CREATE TABLE IF NOT EXISTS `gibics` (
  `CtGibic` varchar(10) NOT NULL,
  `Marca` varchar(15) DEFAULT NULL,
  `Bahiag` int(1) NOT NULL,
  `NoSerie` varchar(10) NOT NULL,
  `Disponible` tinyint(1) NOT NULL DEFAULT '0',
  `falla` tinyint(1) NOT NULL DEFAULT '0',
  `fecharegistro` datetime DEFAULT NULL,
  `fechafalla` datetime DEFAULT NULL,
  `No_Reloj` int(5) DEFAULT NULL,
  PRIMARY KEY (`CtGibic`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gibics`
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
-- Table structure for table `golden`
--

CREATE TABLE IF NOT EXISTS `golden` (
  `NoSerie` varchar(10) NOT NULL,
  `WO` varchar(9) NOT NULL,
  `SKU` varchar(10) NOT NULL,
  `Locacion` varchar(8) NOT NULL,
  `Estatus` varchar(30) NOT NULL,
  `NoReloj` int(5) NOT NULL,
  `HoraEntrada` datetime NOT NULL,
  PRIMARY KEY (`NoSerie`),
  KEY `NoReloj` (`NoReloj`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `golden`
--

INSERT INTO `golden` (`NoSerie`, `WO`, `SKU`, `Locacion`, `Estatus`, `NoReloj`, `HoraEntrada`) VALUES
('2M26111111', '111111111', '1111111111', '1_1', 'XTEE-RUNNING', 55098, '2016-11-08 03:48:31');

-- --------------------------------------------------------

--
-- Table structure for table `imagenes`
--

CREATE TABLE IF NOT EXISTS `imagenes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(80) NOT NULL,
  `titulo` varchar(250) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Area` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=90 ;

--
-- Dumping data for table `imagenes`
--

INSERT INTO `imagenes` (`id`, `user`, `titulo`, `imagen`, `descripcion`, `fecha`, `Area`) VALUES
(87, 'Ruben Trejo', 'CAMBIO DE HORARIO', '../upload/image001.png@01D230F2.7F6CC7A0.jpg', 'IMPORTANTE!!!!', '2016-10-29 11:16:48', 'LVO'),
(88, 'Ruben Trejo', 'DIA DE MUERTOS', '../upload/image002.png@01D23118.1B402350.jpg', 'Celebracion!!!', '2016-10-29 11:18:20', 'LVO'),
(89, 'Ruben Trejo', 'SEGURIDAD', '../upload/image001.png@01D22EDC.3B3DBBB0.jpg', 'Momentos de comunicacion.', '2016-10-29 11:19:39', 'LVO');

-- --------------------------------------------------------

--
-- Table structure for table `noticomentarios`
--

CREATE TABLE IF NOT EXISTS `noticomentarios` (
  `ID` int(11) NOT NULL,
  `Comentario` varchar(150) NOT NULL,
  `NombreU` varchar(50) NOT NULL,
  `Fecha` datetime NOT NULL,
  KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `noticomentarios`
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
-- Table structure for table `pruebas`
--

CREATE TABLE IF NOT EXISTS `pruebas` (
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
  `EOTAHoraFinal` datetime DEFAULT NULL,
  PRIMARY KEY (`NoSerie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pruebas`
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

--
-- Triggers `pruebas`
--
DROP TRIGGER IF EXISTS `terminar rack pruebas`;
DELIMITER //
CREATE TRIGGER `terminar rack pruebas` AFTER DELETE ON `pruebas`
 FOR EACH ROW INSERT INTO pruebasterminados ( NoSerie  ,   HoraInicio  ,   FTO  ,   FTONoReloj  ,   FTOHoraFinal  ,   Cisco  ,   CiscoNoReloj  ,   CiscoHoraFinal  ,   XTEE  ,   XTEENoReloj  ,   XTEEHoraFinal  ,   Rackscan  ,   RackscanNoReloj  ,   RackscanHoraFinal  ,   Cluster  ,   ClusterNoReloj  ,   ClusterHoraFinal  ,   Solar  ,   SolarNoReloj  ,   SolarHoraFinal  ,   Solar2  , Solar2NoReloj, Solar2HoraFinal,   Bootstrap  ,   BootstrapNoReloj  ,   BootstrapHoraFinal  ,   Sharknado  ,   SharknadoNoReloj  ,   SharknadoHoraFinal  ,   Wiring  ,   WiringNoReloj  ,   WiringHoraFinal  ,   DEID  ,   DEIDNoReloj  ,   DEIDHoraFinal  ,   Megamind  ,   MegamindNoReloj  ,   MegamindHoraFinal  ,   EOTA  ,   EOTANoReloj  ,   EOTAHoraFinal ) VALUES (OLD.NoSerie ,  OLD.HoraInicio ,  OLD.FTO ,  OLD.FTONoReloj ,  OLD.FTOHoraFinal ,  OLD.Cisco ,  OLD.CiscoNoReloj ,  OLD.CiscoHoraFinal ,  OLD.XTEE ,  OLD.XTEENoReloj ,  OLD.XTEEHoraFinal ,  OLD.Rackscan ,  OLD.RackscanNoReloj ,  OLD.RackscanHoraFinal ,  OLD.Cluster ,  OLD.ClusterNoReloj ,  OLD.ClusterHoraFinal ,  OLD.Solar ,  OLD.SolarNoReloj ,  OLD.SolarHoraFinal ,  OLD.Solar2  , OLD.Solar2NoReloj, OLD.Solar2HoraFinal,  OLD.Bootstrap ,  OLD.BootstrapNoReloj ,  OLD.BootstrapHoraFinal ,  OLD.Sharknado ,  OLD.SharknadoNoReloj ,  OLD.SharknadoHoraFinal ,  OLD.Wiring ,  OLD.WiringNoReloj ,  OLD.WiringHoraFinal ,  OLD.DEID ,  OLD.DEIDNoReloj ,  OLD.DEIDHoraFinal ,  OLD.Megamind , OLD.MegamindNoReloj , OLD.MegamindHoraFinal ,  OLD.EOTA ,  OLD.EOTANoReloj ,  OLD.EOTAHoraFinal)
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pruebasjv`
--

CREATE TABLE IF NOT EXISTS `pruebasjv` (
  `NoSerie` varchar(10) NOT NULL,
  `HoraInicio` datetime DEFAULT NULL,
  `FTO` tinyint(1) NOT NULL DEFAULT '0',
  `FTONoReloj` varchar(5) DEFAULT NULL,
  `FTOHoraFinal` datetime DEFAULT NULL,
  `Arista0` tinyint(1) NOT NULL DEFAULT '0',
  `Arista0NoReloj` varchar(5) DEFAULT NULL,
  `Arista0HoraFinal` datetime DEFAULT NULL,
  `Arista1` tinyint(1) NOT NULL DEFAULT '0',
  `Arista1NoReloj` varchar(5) DEFAULT NULL,
  `Arista1HoraFinal` datetime DEFAULT NULL,
  `CM` tinyint(1) NOT NULL DEFAULT '0',
  `CMNoReloj` varchar(5) DEFAULT NULL,
  `CMHoraFinal` datetime DEFAULT NULL,
  `Cluster0` tinyint(1) NOT NULL DEFAULT '0',
  `Cluster0NoReloj` varchar(5) DEFAULT NULL,
  `Cluster0HoraFinal` datetime DEFAULT NULL,
  `Cluster1` tinyint(1) NOT NULL DEFAULT '0',
  `Cluster1NoReloj` varchar(5) DEFAULT NULL,
  `Cluster1HoraFinal` datetime DEFAULT NULL,
  `Bootstrap` tinyint(1) NOT NULL DEFAULT '0',
  `BootstrapNoReloj` varchar(5) DEFAULT NULL,
  `BootstrapHoraFinal` datetime DEFAULT NULL,
  `Rackscan` tinyint(1) NOT NULL DEFAULT '0',
  `RackscanNoReloj` varchar(5) DEFAULT NULL,
  `RackscanHoraFinal` datetime DEFAULT NULL,
  `DEID` tinyint(1) NOT NULL DEFAULT '0',
  `DEIDNoReloj` varchar(5) DEFAULT NULL,
  `DEIDHoraFinal` datetime DEFAULT NULL,
  `EOTA` tinyint(1) NOT NULL DEFAULT '0',
  `EOTANoReloj` varchar(5) DEFAULT NULL,
  `EOTAHoraFinal` datetime DEFAULT NULL,
  PRIMARY KEY (`NoSerie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pruebasjv`
--

INSERT INTO `pruebasjv` (`NoSerie`, `HoraInicio`, `FTO`, `FTONoReloj`, `FTOHoraFinal`, `Arista0`, `Arista0NoReloj`, `Arista0HoraFinal`, `Arista1`, `Arista1NoReloj`, `Arista1HoraFinal`, `CM`, `CMNoReloj`, `CMHoraFinal`, `Cluster0`, `Cluster0NoReloj`, `Cluster0HoraFinal`, `Cluster1`, `Cluster1NoReloj`, `Cluster1HoraFinal`, `Bootstrap`, `BootstrapNoReloj`, `BootstrapHoraFinal`, `Rackscan`, `RackscanNoReloj`, `RackscanHoraFinal`, `DEID`, `DEIDNoReloj`, `DEIDHoraFinal`, `EOTA`, `EOTANoReloj`, `EOTAHoraFinal`) VALUES
('2M26S3C3D3', '2016-10-14 06:34:09', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL);

--
-- Triggers `pruebasjv`
--
DROP TRIGGER IF EXISTS `Terminar Pruebas JV`;
DELIMITER //
CREATE TRIGGER `Terminar Pruebas JV` AFTER DELETE ON `pruebasjv`
 FOR EACH ROW INSERT INTO pruebasterminadasjv (NoSerie ,  HoraInicio ,  FTO ,  FTONoReloj ,  FTOHoraFinal , Arista0 ,  Arista0NoReloj , Arista0HoraFinal ,  Arista1 ,  Arista1NoReloj ,  Arista1HoraFinal ,  CM ,  CMNoReloj ,  CMHoraFinal ,  Cluster0 ,  Cluster0NoReloj ,  Cluster0HoraFinal ,  Cluster1 ,  Cluster1NoReloj ,  Cluster1HoraFinal , Bootstrap ,  BootstrapNoReloj ,  BootstrapHoraFinal , Rackscan ,  RackscanNoReloj ,  RackscanHoraFinal ,  DEID ,  DEIDNoReloj ,  DEIDHoraFinal , EOTA ,  EOTANoReloj ,  EOTAHoraFinal) VALUES (OLD.NoSerie ,  OLD.HoraInicio ,  OLD.FTO ,  OLD.FTONoReloj ,  OLD.FTOHoraFinal ,  OLD.Arista0 ,  OLD.Arista0NoReloj ,  OLD.Arista0HoraFinal ,  OLD.Arista1 ,  OLD.Arista1NoReloj ,  OLD.Arista1HoraFinal ,  OLD.CM ,  OLD.CMNoReloj ,  OLD.CMHoraFinal ,  OLD.Cluster0 ,  OLD.Cluster0NoReloj ,  OLD.Cluster0HoraFinal ,  OLD.Cluster1 ,  OLD.Cluster1NoReloj ,  OLD.Cluster1HoraFinal , OLD.Bootstrap ,  OLD.BootstrapNoReloj ,  OLD.BootstrapHoraFinal , OLD.Rackscan ,  OLD.RackscanNoReloj ,  OLD.RackscanHoraFinal ,  OLD.DEID ,  OLD.DEIDNoReloj ,  OLD.DEIDHoraFinal , OLD.EOTA ,  OLD.EOTANoReloj ,  OLD.EOTAHoraFinal)
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pruebasterminadasjv`
--

CREATE TABLE IF NOT EXISTS `pruebasterminadasjv` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NoSerie` varchar(10) NOT NULL,
  `HoraInicio` datetime DEFAULT NULL,
  `FTO` tinyint(1) NOT NULL DEFAULT '0',
  `FTONoReloj` varchar(5) DEFAULT NULL,
  `FTOHoraFinal` datetime DEFAULT NULL,
  `Arista0` tinyint(1) NOT NULL DEFAULT '0',
  `Arista0NoReloj` varchar(5) DEFAULT NULL,
  `Arista0HoraFinal` datetime DEFAULT NULL,
  `Arista1` tinyint(1) NOT NULL DEFAULT '0',
  `Arista1NoReloj` varchar(5) DEFAULT NULL,
  `Arista1HoraFinal` datetime DEFAULT NULL,
  `CM` tinyint(1) NOT NULL DEFAULT '0',
  `CMNoReloj` varchar(5) DEFAULT NULL,
  `CMHoraFinal` datetime DEFAULT NULL,
  `Cluster0` tinyint(1) NOT NULL DEFAULT '0',
  `Cluster0NoReloj` varchar(5) DEFAULT NULL,
  `Cluster0HoraFinal` datetime DEFAULT NULL,
  `Cluster1` tinyint(1) NOT NULL DEFAULT '0',
  `Cluster1NoReloj` varchar(5) DEFAULT NULL,
  `Cluster1HoraFinal` datetime DEFAULT NULL,
  `Bootstrap` tinyint(1) NOT NULL DEFAULT '0',
  `BootstrapNoReloj` varchar(5) DEFAULT NULL,
  `BootstrapHoraFinal` datetime DEFAULT NULL,
  `Rackscan` tinyint(1) NOT NULL DEFAULT '0',
  `RackscanNoReloj` varchar(5) DEFAULT NULL,
  `RackscanHoraFinal` datetime DEFAULT NULL,
  `DEID` tinyint(1) NOT NULL DEFAULT '0',
  `DEIDNoReloj` varchar(5) DEFAULT NULL,
  `DEIDHoraFinal` datetime DEFAULT NULL,
  `EOTA` tinyint(1) NOT NULL DEFAULT '0',
  `EOTANoReloj` varchar(5) DEFAULT NULL,
  `EOTAHoraFinal` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=141 ;

--
-- Dumping data for table `pruebasterminadasjv`
--

INSERT INTO `pruebasterminadasjv` (`ID`, `NoSerie`, `HoraInicio`, `FTO`, `FTONoReloj`, `FTOHoraFinal`, `Arista0`, `Arista0NoReloj`, `Arista0HoraFinal`, `Arista1`, `Arista1NoReloj`, `Arista1HoraFinal`, `CM`, `CMNoReloj`, `CMHoraFinal`, `Cluster0`, `Cluster0NoReloj`, `Cluster0HoraFinal`, `Cluster1`, `Cluster1NoReloj`, `Cluster1HoraFinal`, `Bootstrap`, `BootstrapNoReloj`, `BootstrapHoraFinal`, `Rackscan`, `RackscanNoReloj`, `RackscanHoraFinal`, `DEID`, `DEIDNoReloj`, `DEIDHoraFinal`, `EOTA`, `EOTANoReloj`, `EOTAHoraFinal`) VALUES
(132, '2M26S3D3F5', '2016-10-14 06:33:45', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL),
(133, '', '0000-00-00 00:00:00', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pruebasterminados`
--

CREATE TABLE IF NOT EXISTS `pruebasterminados` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
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
  `EOTAHoraFinal` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=198 ;

-- --------------------------------------------------------

--
-- Table structure for table `racks`
--

CREATE TABLE IF NOT EXISTS `racks` (
  `NoSerie` varchar(10) NOT NULL,
  `WO` varchar(9) NOT NULL,
  `SKU` varchar(10) NOT NULL,
  `Bahia` int(1) NOT NULL,
  `Locacion` varchar(8) NOT NULL,
  `Modelo` varchar(30) NOT NULL,
  `Corriendo` tinyint(1) NOT NULL,
  `NoReloj` int(5) NOT NULL,
  PRIMARY KEY (`NoSerie`),
  KEY `NoReloj` (`NoReloj`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `racks`
--

INSERT INTO `racks` (`NoSerie`, `WO`, `SKU`, `Bahia`, `Locacion`, `Modelo`, `Corriendo`, `NoReloj`) VALUES
('2M26121212', '111111111', '1111111111', 1, 'TR01-01', 'Azure 4.1', 1, 54966),
('2M2633DF00', '121212121', '121212121', 2, 'TR02-17', 'Azure 4.1', 1, 54966),
('2M26390445', '140209974', 'ZU715AFG1', 6, 'TR06-87', 'Azure 4.1', 1, 55098),
('2M2639044Y', '140209974', 'ZU715AFG1', 6, 'TR06-86', 'Azure 4.1', 1, 55098),
('2M2639044Z', '140209974', 'ZU715AFG1', 6, 'TR06-84', 'Azure 4.1', 1, 55098),
('2M26390450', '140209974', 'ZU715AFG1', 6, 'TR06-83', 'Azure 4.1', 1, 55098),
('2M26390451', '140209974', 'ZU715AFG1', 6, 'TR06-88', 'Azure 4.1', 1, 55098),
('2M26390457', '140209974', 'ZU715AFG1', 6, 'TR06-85', 'Azure 4.1', 1, 55098),
('2M26390458', '140209974', '1111111111', 7, 'TR07-97', 'Azure 4.1', 1, 54966),
('2M263AS3D2', '111111111', '1111111111', 1, 'TR01-02', 'Azure 4.1', 1, 54966),
('2M26464898', '121212121', '1111111111', 6, 'TR06-82', 'Azure 4.1', 1, 55098);

--
-- Triggers `racks`
--
DROP TRIGGER IF EXISTS `terminar rack`;
DELIMITER //
CREATE TRIGGER `terminar rack` AFTER DELETE ON `racks`
 FOR EACH ROW insert into racksterminados(NoSerie, WO, SKU, Bahia, Locacion, Modelo, Corriendo, NoReloj) VALUES (OLD.NoSerie, OLD.WO, OLD.SKU, OLD.Bahia, OLD.Locacion, OLD.Modelo, OLD.Corriendo, OLD.NoReloj)
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `racksjv`
--

CREATE TABLE IF NOT EXISTS `racksjv` (
  `NoSerie` varchar(10) NOT NULL,
  `WO` varchar(9) NOT NULL,
  `SKU` varchar(10) NOT NULL,
  `Bahia` int(1) NOT NULL,
  `Locacion` varchar(8) NOT NULL,
  `Modelo` varchar(30) NOT NULL,
  `Corriendo` tinyint(1) NOT NULL,
  `NoReloj` int(5) NOT NULL,
  `area` varchar(20) NOT NULL,
  PRIMARY KEY (`NoSerie`),
  KEY `NoReloj` (`NoReloj`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `racksjv`
--

INSERT INTO `racksjv` (`NoSerie`, `WO`, `SKU`, `Bahia`, `Locacion`, `Modelo`, `Corriendo`, `NoReloj`, `area`) VALUES
('2M26S3C3D3', '333333333', '1111111111', 1, 'TR01-02', 'Microsoft', 1, 54966, 'JV');

--
-- Triggers `racksjv`
--
DROP TRIGGER IF EXISTS `Terminar JV`;
DELIMITER //
CREATE TRIGGER `Terminar JV` AFTER DELETE ON `racksjv`
 FOR EACH ROW insert into racksterminadosjv (NoSerie, WO, SKU, Bahia, Locacion, Modelo, Corriendo, NoReloj) VALUES (OLD.NoSerie, OLD.WO, OLD.SKU, OLD.Bahia, OLD.Locacion, OLD.Modelo, OLD.Corriendo, OLD.NoReloj)
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `racksterminados`
--

CREATE TABLE IF NOT EXISTS `racksterminados` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NoSerie` varchar(10) NOT NULL,
  `WO` varchar(9) NOT NULL,
  `SKU` varchar(10) NOT NULL,
  `Bahia` int(1) NOT NULL,
  `Locacion` varchar(8) NOT NULL,
  `Modelo` varchar(30) NOT NULL,
  `Corriendo` tinyint(1) NOT NULL,
  `NoReloj` int(5) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `NoReloj` (`NoReloj`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=200 ;

-- --------------------------------------------------------

--
-- Table structure for table `racksterminadosjv`
--

CREATE TABLE IF NOT EXISTS `racksterminadosjv` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NoSerie` varchar(10) NOT NULL,
  `WO` varchar(9) NOT NULL,
  `SKU` varchar(10) NOT NULL,
  `Bahia` int(1) NOT NULL,
  `Locacion` varchar(8) NOT NULL,
  `Modelo` varchar(30) NOT NULL,
  `Corriendo` tinyint(1) NOT NULL,
  `NoReloj` int(5) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `NoReloj` (`NoReloj`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=209 ;

--
-- Dumping data for table `racksterminadosjv`
--

INSERT INTO `racksterminadosjv` (`ID`, `NoSerie`, `WO`, `SKU`, `Bahia`, `Locacion`, `Modelo`, `Corriendo`, `NoReloj`) VALUES
(201, '2M2632ASDF', '212121211', '2121212121', 1, 'TR01-01', 'Microsoft', 1, 54966);

-- --------------------------------------------------------

--
-- Table structure for table `stats`
--

CREATE TABLE IF NOT EXISTS `stats` (
  `NoReloj` varchar(5) NOT NULL,
  `Imagen` varchar(50) NOT NULL DEFAULT 'img/default.png',
  `header` varchar(100) NOT NULL DEFAULT 'themes/try6.jpg',
  `headerdos` varchar(100) NOT NULL DEFAULT 'themes/try6.jpg',
  `body` varchar(100) NOT NULL DEFAULT 'themes/red.jpg',
  `Nombre` varchar(50) NOT NULL DEFAULT 'Novato',
  `Descripcion` varchar(200) NOT NULL DEFAULT 'Te han registrado en el sistema, tampoco es que haya sido muy dificil',
  `Nivel` int(11) NOT NULL DEFAULT '0',
  `Puntos` int(11) NOT NULL DEFAULT '0',
  `FTO` int(11) NOT NULL DEFAULT '0',
  `Cisco` int(11) NOT NULL DEFAULT '0',
  `Rackscan` int(11) NOT NULL DEFAULT '0',
  `Xtee` int(11) NOT NULL DEFAULT '0',
  `Cluster` int(11) NOT NULL DEFAULT '0',
  `Solar` int(11) NOT NULL DEFAULT '0',
  `Wiring` int(11) NOT NULL DEFAULT '0',
  `Bootstrap` int(11) NOT NULL DEFAULT '0',
  `Sharknado` int(11) NOT NULL DEFAULT '0',
  `Deid` int(11) NOT NULL DEFAULT '0',
  `Megamind` int(11) NOT NULL DEFAULT '0',
  `Eota` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`NoReloj`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stats`
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
-- Table structure for table `sugerencia`
--

CREATE TABLE IF NOT EXISTS `sugerencia` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Sugerencia` tinytext NOT NULL,
  `NoReloj` int(5) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `Fecha` datetime NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sugerencia`
--

INSERT INTO `sugerencia` (`Id`, `Sugerencia`, `NoReloj`, `status`, `Fecha`) VALUES
(1, 'en mi sabia opinion yo opino que este sistema esta bien fregon y se mira bonito ', 54966, 1, '2016-10-28 06:38:10'),
(2, 'en mi sabia opinion yo opino que este sistema esta bien fregon y se mira bonito ', 54966, 1, '2016-10-28 07:14:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `No_Reloj` int(5) NOT NULL,
  `Pass` varchar(50) NOT NULL,
  `Nombre` varchar(70) NOT NULL,
  `Turno` int(1) NOT NULL,
  `Nivel` int(1) NOT NULL,
  `Bahia` int(11) NOT NULL,
  `Comentario` text,
  `Comentario2` text,
  `Comentario3` text,
  PRIMARY KEY (`No_Reloj`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`No_Reloj`, `Pass`, `Nombre`, `Turno`, `Nivel`, `Bahia`, `Comentario`, `Comentario2`, `Comentario3`) VALUES
(149, '5c6d9edc3a951cda763f650235cfc41a3fc23fe8', 'Victor Tronco', 1, 1, 0, NULL, NULL, NULL),
(303, '18c28604dd31094a8d69dae60f1bcd347f1afc5a', 'Adrian Garcia', 2, 1, 0, NULL, NULL, NULL),
(345, '6117e45ab57f8660d866a21ca5e9d2c31dbc1945', 'Jafet Martinez ', 3, 1, 0, NULL, NULL, NULL),
(54121, 'c54804980cfa669a805555b645b14ba137b6ee79', 'Ana Mora', 2, 2, 5, NULL, NULL, NULL),
(54122, 'c96f36c50461c0654e7219e8bc68df6e4c4e62d9', 'Daniel Moraa', 3, 2, 5, NULL, NULL, NULL),
(54123, '8cb2237d0679ca88db6464eac60da96345513964', 'Victor Mora', 3, 1, 5, '<p>lkjhlsakdhflkajshd flkjahsdf lkjahs dkjfasd</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>asdf</p>\r\n', '<p>nota 2</p>\r\n', '<p>nota 3</p>\r\n'),
(54124, '348162101fc6f7e624681b7400b085eeac6df7bd', 'Emanuel Mora', 3, 1, 5, NULL, NULL, NULL),
(54656, 'b652dd2868a87c9a42e3f681b217aef26f82d747', 'Ruben Trejo', 3, 1, 7, NULL, NULL, NULL),
(54692, '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Fernando Martinez', 3, 1, 7, '<h1><span class="marker">prueba de cambios</span></h1>\r\n', '<p>prueba de cambios</p>\r\n', '<p>prueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambiosprueba de cambios</p>\r\n'),
(54966, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Carlos Lizandro Agustin Rosales', 3, 1, 7, '<h1><em><strong>HOLA MUNDO</strong></em></h1>\r\n', '<p>sadfsdfsadSDF</p>\r\n', ''),
(55098, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Omar Alejandro Mora Cruz', 3, 1, 6, '', '', '<ul>\r\n	<li>Config t</li>\r\n	<li>int eth1/64</li>\r\n	<li>swichport</li>\r\n	<li>speed 40000</li>\r\n	<li>exit</li>\r\n	<li>int eth1/33-36</li>\r\n	<li>swichport</li>\r\n	<li>speed 1000</li>\r\n	<li>exit</li>\r\n	<li>copy run start</li>\r\n</ul>\r\n'),
(55101, '8940d66466e6f8a6e6a5e68e216c1975e25a62c9', 'Ezio Auditore Da Firenze', 1, 2, 1, NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
