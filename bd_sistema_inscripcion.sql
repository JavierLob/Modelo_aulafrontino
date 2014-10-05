-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 05-10-2014 a las 04:17:57
-- Versión del servidor: 5.6.12-log
-- Versión de PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bd_sistema_inscripcion`
--
CREATE DATABASE IF NOT EXISTS `bd_sistema_inscripcion` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;
USE `bd_sistema_inscripcion`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasignatura`
--

CREATE TABLE IF NOT EXISTS `tasignatura` (
  `idasignatura` int(11) NOT NULL AUTO_INCREMENT,
  `codigoasi` char(10) COLLATE utf8_spanish2_ci NOT NULL,
  `nombreasi` varchar(80) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcionasi` text COLLATE utf8_spanish2_ci NOT NULL,
  `anoasi` char(10) COLLATE utf8_spanish2_ci NOT NULL,
  `unidad_creditoasi` int(11) NOT NULL,
  `observacionasi` text COLLATE utf8_spanish2_ci,
  `horas_duracionasi` int(11) NOT NULL,
  `estatusasi` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idasignatura`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tasignatura`
--

INSERT INTO `tasignatura` (`idasignatura`, `codigoasi`, `nombreasi`, `descripcionasi`, `anoasi`, `unidad_creditoasi`, `observacionasi`, `horas_duracionasi`, `estatusasi`) VALUES
(1, 'Ma01', 'Matematica I', 'EstadÃ­sticas y probabilidades', '3', 3, '', 4, 1),
(2, 'Pr-01', 'ProgramaciÃ³n I', 'Algoritmica y programaciÃ³n bÃ¡sica', '1', 2, '\r\n          ', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbitacora`
--

CREATE TABLE IF NOT EXISTS `tbitacora` (
  `idtbitacora` int(11) NOT NULL AUTO_INCREMENT,
  `direccionbit` varchar(100) NOT NULL,
  `fechabit` datetime NOT NULL,
  `ipbit` char(16) NOT NULL,
  `operacionbit` varchar(45) DEFAULT NULL,
  `valoranteriorbit` varchar(45) DEFAULT NULL,
  `nuevovalorbit` varchar(45) DEFAULT NULL,
  `tusuario_idtusuario` char(45) NOT NULL,
  `accesobit` tinyint(1) NOT NULL,
  PRIMARY KEY (`idtbitacora`),
  KEY `fk_tbitacora_tusuario1_idx` (`tusuario_idtusuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=336 ;

--
-- Volcado de datos para la tabla `tbitacora`
--

INSERT INTO `tbitacora` (`idtbitacora`, `direccionbit`, `fechabit`, `ipbit`, `operacionbit`, `valoranteriorbit`, `nuevovalorbit`, `tusuario_idtusuario`, `accesobit`) VALUES
(2, '/modelo_seguridad_V1.0/vista/intranet.php', '2013-08-23 01:08:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(3, '/modelo_seguridad_V1.0/vista/intranet.php', '2013-08-23 02:08:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(4, '/modelo_seguridad_V1.0/vista/intranet.php?vista=rol/asignacion', '2013-08-23 02:08:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(5, '/modelo_seguridad_V1.0/vista/intranet.php?vista=rol/registrar_rol', '2013-08-23 02:08:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(6, '/modelo_seguridad_V1.0/vista/intranet.php?vista=rol/rol', '2013-08-23 02:08:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(7, '/modelo_seguridad_V1.0/vista/intranet.php?vista=rol/asignacion', '2013-08-23 02:08:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(8, '/modelo_seguridad_V1.0/vista/intranet.php?vista=rol/asignar_modulo', '2013-08-23 02:08:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(9, '/modelo_seguridad_V1.0/vista/intranet.php?vista=rol/asignacion', '2013-08-23 02:08:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(10, '/modelo_seguridad_V1.0/vista/intranet.php?vista=rol/asignar_servicio', '2013-08-23 02:08:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(11, '/modelo_seguridad_V1.0/vista/intranet.php?vista=rol/asignar_servicio&id=1', '2013-08-23 02:08:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(12, '/modelo_seguridad_V1.0/vista/intranet.php?vista=rol/asignar_servicio&id=5', '2013-08-23 02:08:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(13, '/modelo_seguridad_V1.0/vista/intranet.php?vista=rol/asignar_modulo', '2013-08-23 02:08:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(14, '/modelo_seguridad_V1.0/vista/intranet.php?vista=rol/asignacion', '2013-08-23 02:08:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(15, '/modelo_seguridad_V1.0/vista/intranet.php?vista=rol/rol', '2013-08-23 02:08:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(16, '/modelo_seguridad_V1.0/vista/intranet.php?vista=rol/rol', '2013-08-23 02:08:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(17, '/modelo_seguridad_V1.1/vista/intranet.php', '2014-07-19 12:07:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(18, '/modelo_seguridad_V1.1/vista/intranet.php', '2014-07-19 12:07:00', '192.168.0.101', '', '', '', 'Administrador', 1),
(19, '/modelo_seguridad_V1.1/vista/intranet.php', '2014-07-19 12:07:00', '192.168.0.101', '', '', '', 'Administrador', 1),
(20, '/modelo_seguridad_V1.1/vista/intranet.php', '2014-07-23 01:07:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(21, '/modelo_seguridad_V1.1/vista/intranet.php?vista=rol/asignar_servicio', '2014-07-23 01:07:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(22, '/modelo_seguridad_V1.1/vista/intranet.php?vista=modulo/modulo', '2014-07-23 01:07:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(23, '/modelo_seguridad_V1.1/vista/intranet.php', '2014-07-23 01:07:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(24, '/modelo_seguridad_V1.1/vista/intranet.php', '2014-07-23 02:07:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(25, '/modelo_seguridad_V1.1/vista/intranet.php?vista=modulo/modulo', '2014-07-23 02:07:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(26, '/modelo_seguridad_V1.1/vista/intranet.php', '2014-07-23 02:07:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(27, '/modelo_seguridad_V1.1/vista/intranet.php', '2014-07-23 02:07:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(28, '/modelo_seguridad_V1.1/vista/intranet.php?vista=rol/rol', '2014-07-23 02:07:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(29, '/modelo_seguridad_V1.1/vista/intranet.php?vista=rol/rol', '2014-07-23 02:07:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(30, '/modelo_seguridad_V1.1/vista/intranet.php?vista=modulo/modulo', '2014-07-23 02:07:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(31, '/modelo_seguridad_V1.1/vista/intranet.php?vista=servicio/servicio', '2014-07-23 02:07:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(32, '/modelo_seguridad_V1.1/vista/intranet.php?vista=servicio/registrar_servicio', '2014-07-23 02:07:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(33, '/modelo_seguridad_V1.1/vista/intranet.php?vista=rol/asignacion', '2014-07-23 02:07:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(34, '/modelo_seguridad_V1.1/vista/intranet.php?vista=rol/asignar_modulo', '2014-07-23 02:07:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(35, '/modelo_seguridad_V1.1/vista/intranet.php?vista=rol/asignar_modulo&id=1', '2014-07-23 02:07:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(36, '/modelo_seguridad_V1.1/vista/intranet.php?vista=rol/asignar_servicio&id=1', '2014-07-23 02:07:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(37, '/modelo_seguridad_V1.1/vista/intranet.php?vista=rol/asignar_servicio&id=1', '2014-07-23 02:07:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(38, '/modelo_seguridad_V1.1/vista/intranet.php?vista=rol/asignar_servicio&id=1', '2014-07-23 02:07:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(39, '/modelo_seguridad_V1.1/vista/intranet.php?vista=modulo/modulo', '2014-07-23 02:07:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(40, '/modelo_seguridad_V1.1/vista/intranet.php?vista=rol/consultar_rol', '2014-07-23 02:07:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(41, '/modelo_seguridad_V1.1/vista/intranet.php', '2014-10-04 08:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(42, '/modelo_seguridad_V1.1/vista/intranet.php', '2014-10-04 08:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(43, '/modelo_seguridad_V1.1/vista/intranet.php?vista=modulo/modulo', '2014-10-04 08:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(44, '/modelo_seguridad_V1.1/vista/intranet.php?vista=modulo/registrar_modulo', '2014-10-04 09:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(45, '/modelo_seguridad_V1.1/vista/intranet.php?vista=servicio/servicio', '2014-10-04 09:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(46, '/modelo_seguridad_V1.1/vista/intranet.php?vista=rol/asignacion', '2014-10-04 09:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(47, '/modelo_seguridad_V1.1/vista/intranet.php?vista=rol/asignar_modulo', '2014-10-04 09:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(48, '/modelo_seguridad_V1.1/vista/intranet.php?vista=rol/asignar_servicio', '2014-10-04 09:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(49, '/modelo_seguridad_V1.1/vista/intranet.php?vista=rol/asignar_servicio&id=1', '2014-10-04 09:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(50, '/modelo_seguridad_V1.1/vista/intranet.php', '2014-10-04 09:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(51, '/modelo_seguridad_V1.1/vista/intranet.php?vista=modulo/modulo', '2014-10-04 09:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(52, '/modelo_seguridad_V1.1/vista/intranet.php?vista=modulo/registrar_modulo', '2014-10-04 09:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(53, '/modelo_seguridad_V1.1/vista/intranet.php?vista=modulo/modulo', '2014-10-04 09:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(54, '/modelo_aulafrontino/vista/intranet.php?vista=modulo/modulo', '2014-10-04 09:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(55, '/modelo_aulafrontino/vista/intranet.php?vista=modulo/modulo', '2014-10-04 09:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(56, '/modelo_aulafrontino/vista/intranet.php', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(57, '/modelo_aulafrontino/vista/intranet.php', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(58, '/modelo_aulafrontino/vista/intranet.php', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(59, '/modelo_aulafrontino/vista/intranet.php', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(60, '/modelo_aulafrontino/vista/intranet.php', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(61, '/modelo_aulafrontino/vista/intranet.php', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(62, '/modelo_aulafrontino/vista/intranet.php', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(63, '/modelo_aulafrontino/vista/intranet.php', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(64, '/modelo_aulafrontino/vista/intranet.php', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(65, '/modelo_aulafrontino/vista/intranet.php', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(66, '/modelo_aulafrontino/vista/intranet.php', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(67, '/modelo_aulafrontino/vista/intranet.php', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(68, '/modelo_aulafrontino/vista/intranet.php', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(69, '/modelo_aulafrontino/vista/intranet.php?vista=rol/asignar_modulo', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(70, '/modelo_aulafrontino/vista/intranet.php?vista=modulo/modulo', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(71, '/modelo_aulafrontino/vista/intranet.php?vista=modulo/consultar_modulo&id=1', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(72, '/modelo_aulafrontino/vista/intranet.php?vista=modulo/modulo', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(73, '/modelo_aulafrontino/vista/intranet.php?vista=modulo/consultar_modulo&id=3', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(74, '/modelo_aulafrontino/vista/intranet.php?vista=modulo/modulo', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(75, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/servicio', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(76, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/consultar_servicio&id=1', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 0),
(77, '/modelo_aulafrontino/vista/intranet.php', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(78, '/modelo_aulafrontino/vista/intranet.php?vista=rol/asignar_servicio', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(79, '/modelo_aulafrontino/vista/intranet.php?vista=rol/asignar_servicio&id=1', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(80, '/modelo_aulafrontino/vista/intranet.php?vista=rol/asignar_servicio&id=1', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(81, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/servicio', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(82, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/consultar_servicio&id=1', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(83, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/servicio', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(84, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/consultar_servicio&id=2', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(85, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/servicio', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(86, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/consultar_servicio&id=4', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(87, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/servicio', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(88, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/consultar_servicio&id=5', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(89, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/servicio', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(90, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/consultar_servicio&id=13', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(91, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/servicio', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(92, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/consultar_servicio&id=14', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(93, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/servicio', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(94, '/modelo_aulafrontino/vista/intranet.php?vista=rol/asignar_modulo', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(95, '/modelo_aulafrontino/vista/intranet.php?vista=rol/asignar_modulo&id=1', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(96, '/modelo_aulafrontino/vista/intranet.php?vista=rol/asignar_servicio&id=1', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(97, '/modelo_aulafrontino/vista/intranet.php?vista=rol/asignar_servicio&id=1', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(98, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/registrar_servicio', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(99, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/registrar_servicio', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(100, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/registrar_servicio', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(101, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/registrar_servicio', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(102, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/registrar_servicio', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(103, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/registrar_servicio', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(104, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/registrar_servicio', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(105, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/registrar_servicio', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(106, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/registrar_servicio', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(107, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/registrar_servicio', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(108, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/registrar_servicio', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(109, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/servicio', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(110, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/consultar_servicio&id=2', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(111, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/consultar_servicio&id=2', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(112, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/servicio', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(113, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/consultar_servicio&id=1', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(114, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/servicio', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(115, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/consultar_servicio&id=4', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(116, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/servicio', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(117, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/consultar_servicio&id=5', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(118, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/servicio', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(119, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/consultar_servicio&id=7', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(120, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/servicio', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(121, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/consultar_servicio&id=8', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(122, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/servicio', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(123, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/consultar_servicio&id=10', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(124, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/servicio', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(125, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/consultar_servicio&id=11', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(126, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/servicio', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(127, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/consultar_servicio&id=12', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(128, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/servicio', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(129, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/consultar_servicio&id=13', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(130, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/servicio', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(131, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/consultar_servicio&id=14', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(132, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/servicio', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(133, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/consultar_servicio&id=15', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(134, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/servicio', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(135, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/servicio', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(136, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/servicio', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(137, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/servicio', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(138, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/servicio', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(139, '/modelo_aulafrontino/vista/intranet.php?vista=modulo/modulo', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(140, '/modelo_aulafrontino/vista/intranet.php?vista=modulo/modulo', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(141, '/modelo_aulafrontino/vista/intranet.php?vista=modulo/modulo', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(142, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/servicio', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(143, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/servicio', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(144, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/servicio', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(145, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/servicio', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(146, '/modelo_aulafrontino/vista/intranet.php?vista=rol/asignacion', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(147, '/modelo_aulafrontino/vista/intranet.php?vista=rol/asignar_servicio', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(148, '/modelo_aulafrontino/vista/intranet.php?vista=rol/asignar_servicio&id=1', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(149, '/modelo_aulafrontino/vista/intranet.php?vista=rol/asignar_servicio&id=1', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(150, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/servicio', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(151, '/modelo_aulafrontino/vista/intranet.php?vista=rol/asignacion', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(152, '/modelo_aulafrontino/vista/intranet.php?vista=rol/asignar_servicio', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(153, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/servicio', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(154, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/registrar_servicio', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(155, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/registrar_servicio', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(156, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/servicio', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(157, '/modelo_aulafrontino/vista/intranet.php?vista=rol/asignacion', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(158, '/modelo_aulafrontino/vista/intranet.php?vista=rol/asignar_servicio', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(159, '/modelo_aulafrontino/vista/intranet.php?vista=rol/asignar_servicio&id=1', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(160, '/modelo_aulafrontino/vista/intranet.php?vista=rol/asignar_servicio&id=1', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(161, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/servicio', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(162, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/servicio', '2014-10-04 10:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(163, '/modelo_aulafrontino/vista/intranet.php', '2014-10-05 12:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(164, '/modelo_aulafrontino/vista/intranet.php', '2014-10-05 12:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(166, '/modelo_aulafrontino/vista/intranet.php', '2014-10-05 12:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(167, '/modelo_aulafrontino/vista/intranet.php?vista=modulo/modulo', '2014-10-05 12:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(168, '/modelo_aulafrontino/vista/intranet.php?vista=modulo/registrar_modulo', '2014-10-05 12:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(169, '/modelo_aulafrontino/vista/intranet.php?vista=modulo/modulo', '2014-10-05 12:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(170, '/modelo_aulafrontino/vista/intranet.php?vista=modulo/consultar_modulo&id=1', '2014-10-05 12:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(171, '/modelo_aulafrontino/vista/intranet.php?vista=modulo/modulo', '2014-10-05 12:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(172, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/servicio', '2014-10-05 12:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(173, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/registrar_servicio', '2014-10-05 12:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(174, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/servicio', '2014-10-05 12:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(175, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/registrar_servicio', '2014-10-05 12:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(176, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/servicio', '2014-10-05 12:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(177, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/registrar_servicio', '2014-10-05 12:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(178, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/servicio', '2014-10-05 12:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(179, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/registrar_servicio', '2014-10-05 12:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(180, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/servicio', '2014-10-05 12:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(181, '/modelo_aulafrontino/vista/intranet.php?vista=rol/asignacion', '2014-10-05 12:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(182, '/modelo_aulafrontino/vista/intranet.php?vista=rol/asignar_modulo', '2014-10-05 12:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(183, '/modelo_aulafrontino/vista/intranet.php?vista=rol/asignar_modulo&id=1', '2014-10-05 12:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(184, '/modelo_aulafrontino/vista/intranet.php?vista=rol/asignar_servicio&id=1', '2014-10-05 12:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(185, '/modelo_aulafrontino/vista/intranet.php?vista=rol/asignar_servicio&id=1', '2014-10-05 12:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(186, '/modelo_aulafrontino/vista/intranet.php?vista=rol/asignar_servicio&id=1', '2014-10-05 12:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(187, '/modelo_aulafrontino/vista/intranet.php?vista=asignatura/asignatura', '2014-10-05 12:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(188, '/modelo_aulafrontino/vista/intranet.php?vista=asignatura/registrar_asignatura', '2014-10-05 12:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(189, '/modelo_aulafrontino/vista/intranet.php?vista=asignatura/registrar_asignatura', '2014-10-05 12:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(190, '/modelo_aulafrontino/vista/intranet.php?vista=asignatura/registrar_asignatura', '2014-10-05 12:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(191, '/modelo_aulafrontino/vista/intranet.php?vista=asignatura/registrar_asignatura', '2014-10-05 12:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(192, '/modelo_aulafrontino/vista/intranet.php?vista=asignatura/registrar_asignatura', '2014-10-05 12:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(193, '/modelo_aulafrontino/vista/intranet.php?vista=asignatura/registrar_asignatura', '2014-10-05 12:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(194, '/modelo_aulafrontino/vista/intranet.php?vista=asignatura/registrar_asignatura', '2014-10-05 12:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(195, '/modelo_aulafrontino/vista/intranet.php?vista=asignatura/registrar_asignatura', '2014-10-05 12:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(196, '/modelo_aulafrontino/vista/intranet.php?vista=asignatura/registrar_asignatura', '2014-10-05 01:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(197, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/servicio', '2014-10-05 01:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(198, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/consultar_servicio&id=20', '2014-10-05 01:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(199, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/servicio', '2014-10-05 01:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(200, '/modelo_aulafrontino/vista/intranet.php?vista=asignatura/asignatura', '2014-10-05 01:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(201, '/modelo_aulafrontino/vista/intranet.php?vista=asignatura/registrar_asignatura', '2014-10-05 01:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(202, '/modelo_aulafrontino/vista/intranet.php?vista=asignatura/asignatura', '2014-10-05 01:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(203, '/modelo_aulafrontino/vista/intranet.php?vista=asignatura/asignatura', '2014-10-05 01:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(204, '/modelo_aulafrontino/vista/intranet.php?vista=asignatura/asignatura', '2014-10-05 01:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(205, '/modelo_aulafrontino/vista/intranet.php?vista=asignatura/asignatura', '2014-10-05 01:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(206, '/modelo_aulafrontino/vista/intranet.php?vista=asignatura/asignatura', '2014-10-05 01:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(207, '/modelo_aulafrontino/vista/intranet.php?vista=asignatura/asignatura', '2014-10-05 01:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(208, '/modelo_aulafrontino/vista/intranet.php?vista=asignatura/asignatura', '2014-10-05 01:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(209, '/modelo_aulafrontino/vista/intranet.php?vista=asignatura/asignatura', '2014-10-05 01:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(210, '/modelo_aulafrontino/vista/intranet.php?vista=asignatura/asignatura', '2014-10-05 01:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(211, '/modelo_aulafrontino/vista/intranet.php?vista=asignatura/asignatura', '2014-10-05 01:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(212, '/modelo_aulafrontino/vista/intranet.php?vista=asignatura/asignatura', '2014-10-05 01:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(213, '/modelo_aulafrontino/vista/intranet.php?vista=asignatura/asignatura', '2014-10-05 01:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(214, '/modelo_aulafrontino/vista/intranet.php?vista=asignatura/asignatura', '2014-10-05 01:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(215, '/modelo_aulafrontino/vista/intranet.php?vista=asignatura/asignatura', '2014-10-05 01:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(216, '/modelo_aulafrontino/vista/intranet.php?vista=asignatura/asignatura', '2014-10-05 01:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(217, '/modelo_aulafrontino/vista/intranet.php?vista=asignatura/asignatura', '2014-10-05 01:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(218, '/modelo_aulafrontino/vista/intranet.php?vista=asignatura/asignatura', '2014-10-05 01:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(219, '/modelo_aulafrontino/vista/intranet.php?vista=asignatura/consultar_asignatura&id=1', '2014-10-05 01:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(220, '/modelo_aulafrontino/vista/intranet.php?vista=asignatura/asignatura', '2014-10-05 01:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(221, '/modelo_aulafrontino/vista/intranet.php?vista=asignatura/asignatura', '2014-10-05 01:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(222, '/modelo_aulafrontino/vista/intranet.php?vista=asignatura/consultar_asignatura&id=1', '2014-10-05 01:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(223, '/modelo_aulafrontino/vista/intranet.php?vista=asignatura/asignatura', '2014-10-05 01:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(224, '/modelo_aulafrontino/vista/intranet.php?vista=asignatura/consultar_asignatura&id=1', '2014-10-05 01:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(225, '/modelo_aulafrontino/vista/intranet.php?vista=asignatura/asignatura', '2014-10-05 01:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(226, '/modelo_aulafrontino/vista/intranet.php?vista=asignatura/asignatura', '2014-10-05 01:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(227, '/modelo_aulafrontino/vista/intranet.php?vista=asignatura/consultar_asignatura&id=1', '2014-10-05 01:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(228, '/modelo_aulafrontino/vista/intranet.php?vista=asignatura/asignatura', '2014-10-05 01:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(229, '/modelo_aulafrontino/vista/intranet.php?vista=asignatura/consultar_asignatura&id=1', '2014-10-05 01:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(230, '/modelo_aulafrontino/vista/intranet.php?vista=asignatura/consultar_asignatura&id=1', '2014-10-05 01:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(231, '/modelo_aulafrontino/vista/intranet.php?vista=asignatura/asignatura', '2014-10-05 01:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(232, '/modelo_aulafrontino/vista/intranet.php?vista=asignatura/asignatura', '2014-10-05 01:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(233, '/modelo_aulafrontino/vista/intranet.php?vista=asignatura/asignatura', '2014-10-05 01:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(234, '/modelo_aulafrontino/vista/intranet.php?vista=asignatura/asignatura', '2014-10-05 01:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(235, '/modelo_aulafrontino/vista/intranet.php?vista=asignatura/asignatura', '2014-10-05 01:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(236, '/modelo_aulafrontino/vista/intranet.php?vista=asignatura/asignatura', '2014-10-05 01:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(237, '/modelo_aulafrontino/vista/intranet.php?vista=asignatura/consultar_asignatura&id=1', '2014-10-05 01:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(238, '/modelo_aulafrontino/vista/intranet.php?vista=asignatura/asignatura', '2014-10-05 01:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(239, '/modelo_aulafrontino/vista/intranet.php?vista=asignatura/registrar_asignatura', '2014-10-05 01:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(240, '/modelo_aulafrontino/vista/intranet.php?vista=asignatura/registrar_asignatura', '2014-10-05 02:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(241, '/modelo_aulafrontino/vista/intranet.php?vista=asignatura/asignatura', '2014-10-05 02:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(242, '/modelo_aulafrontino/vista/intranet.php?vista=asignatura/asignatura', '2014-10-05 02:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(243, '/modelo_aulafrontino/vista/intranet.php?vista=asignatura/asignatura', '2014-10-05 02:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(244, '/modelo_aulafrontino/vista/intranet.php?vista=asignatura/consultar_asignatura&id=2', '2014-10-05 02:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(245, '/modelo_aulafrontino/vista/intranet.php?vista=asignatura/asignatura', '2014-10-05 02:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(246, '/modelo_aulafrontino/vista/intranet.php?vista=modulo/modulo', '2014-10-05 03:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(247, '/modelo_aulafrontino/vista/intranet.php?vista=modulo/registrar_modulo', '2014-10-05 03:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(248, '/modelo_aulafrontino/vista/intranet.php?vista=modulo/modulo', '2014-10-05 03:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(249, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/servicio', '2014-10-05 03:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(250, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/registrar_servicio', '2014-10-05 03:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(251, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/servicio', '2014-10-05 03:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(252, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/registrar_servicio', '2014-10-05 03:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(253, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/servicio', '2014-10-05 03:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(254, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/registrar_servicio', '2014-10-05 03:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(255, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/servicio', '2014-10-05 03:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(256, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/registrar_servicio', '2014-10-05 03:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(257, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/servicio', '2014-10-05 03:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(258, '/modelo_aulafrontino/vista/intranet.php?vista=rol/asignacion', '2014-10-05 03:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(259, '/modelo_aulafrontino/vista/intranet.php?vista=rol/asignar_modulo', '2014-10-05 03:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(260, '/modelo_aulafrontino/vista/intranet.php?vista=rol/asignar_modulo&id=1', '2014-10-05 03:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(261, '/modelo_aulafrontino/vista/intranet.php?vista=rol/asignar_servicio&id=1', '2014-10-05 03:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(262, '/modelo_aulafrontino/vista/intranet.php?vista=rol/asignar_servicio&id=1', '2014-10-05 03:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(263, '/modelo_aulafrontino/vista/intranet.php?vista=curso/curso', '2014-10-05 03:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(264, '/modelo_aulafrontino/vista/intranet.php?vista=curso/curso', '2014-10-05 03:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(265, '/modelo_aulafrontino/vista/intranet.php?vista=curso/registrar_curso', '2014-10-05 03:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(266, '/modelo_aulafrontino/vista/intranet.php?vista=curso/registrar_curso', '2014-10-05 03:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(267, '/modelo_aulafrontino/vista/intranet.php?vista=curso/registrar_curso', '2014-10-05 03:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(268, '/modelo_aulafrontino/vista/intranet.php?vista=curso/registrar_curso', '2014-10-05 03:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(269, '/modelo_aulafrontino/vista/intranet.php?vista=curso/registrar_curso', '2014-10-05 03:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(270, '/modelo_aulafrontino/vista/intranet.php?vista=curso/registrar_curso', '2014-10-05 03:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(271, '/modelo_aulafrontino/vista/intranet.php?vista=curso/registrar_curso', '2014-10-05 03:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(272, '/modelo_aulafrontino/vista/intranet.php?vista=curso/registrar_curso', '2014-10-05 03:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(273, '/modelo_aulafrontino/vista/intranet.php?vista=curso/registrar_curso', '2014-10-05 03:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(274, '/modelo_aulafrontino/vista/intranet.php?vista=curso/registrar_curso', '2014-10-05 03:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(275, '/modelo_aulafrontino/vista/intranet.php?vista=curso/registrar_curso', '2014-10-05 03:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(276, '/modelo_aulafrontino/vista/intranet.php?vista=curso/registrar_curso', '2014-10-05 03:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(277, '/modelo_aulafrontino/vista/intranet.php?vista=curso/registrar_curso', '2014-10-05 03:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(278, '/modelo_aulafrontino/vista/intranet.php?vista=curso/registrar_curso', '2014-10-05 03:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(279, '/modelo_aulafrontino/vista/intranet.php?vista=curso/registrar_curso', '2014-10-05 03:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(280, '/modelo_aulafrontino/vista/intranet.php?vista=curso/registrar_curso', '2014-10-05 03:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(281, '/modelo_aulafrontino/vista/intranet.php?vista=curso/registrar_curso', '2014-10-05 03:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(282, '/modelo_aulafrontino/vista/intranet.php?vista=curso/registrar_curso', '2014-10-05 03:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(283, '/modelo_aulafrontino/vista/intranet.php?vista=curso/registrar_curso', '2014-10-05 03:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(284, '/modelo_aulafrontino/vista/intranet.php?vista=curso/registrar_curso', '2014-10-05 03:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(285, '/modelo_aulafrontino/vista/intranet.php?vista=curso/registrar_curso', '2014-10-05 03:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(286, '/modelo_aulafrontino/vista/intranet.php?vista=curso/registrar_curso', '2014-10-05 03:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(287, '/modelo_aulafrontino/vista/intranet.php?vista=curso/registrar_curso', '2014-10-05 03:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(288, '/modelo_aulafrontino/vista/intranet.php?vista=curso/registrar_curso', '2014-10-05 03:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(289, '/modelo_aulafrontino/vista/intranet.php?vista=curso/registrar_curso', '2014-10-05 03:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(290, '/modelo_aulafrontino/vista/intranet.php?vista=curso/registrar_curso', '2014-10-05 03:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(291, '/modelo_aulafrontino/vista/intranet.php?vista=curso/registrar_curso', '2014-10-05 03:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(292, '/modelo_aulafrontino/vista/intranet.php?vista=curso/registrar_curso', '2014-10-05 03:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(293, '/modelo_aulafrontino/vista/intranet.php?vista=curso/registrar_curso', '2014-10-05 03:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(294, '/modelo_aulafrontino/vista/intranet.php?vista=curso/curso', '2014-10-05 03:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(295, '/modelo_aulafrontino/vista/intranet.php?vista=curso/curso', '2014-10-05 03:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(296, '/modelo_aulafrontino/vista/intranet.php?vista=curso/curso', '2014-10-05 03:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(297, '/modelo_aulafrontino/vista/intranet.php?vista=curso/registrar_curso', '2014-10-05 03:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(298, '/modelo_aulafrontino/vista/intranet.php?vista=curso/curso', '2014-10-05 03:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(299, '/modelo_aulafrontino/vista/intranet.php?vista=curso/registrar_curso', '2014-10-05 03:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(300, '/modelo_aulafrontino/vista/intranet.php?vista=curso/curso', '2014-10-05 03:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(301, '/modelo_aulafrontino/vista/intranet.php?vista=curso/curso', '2014-10-05 04:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(302, '/modelo_aulafrontino/vista/intranet.php?vista=curso/consultar_curso&id=2', '2014-10-05 04:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(303, '/modelo_aulafrontino/vista/intranet.php?vista=curso/consultar_curso&id=2', '2014-10-05 04:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(304, '/modelo_aulafrontino/vista/intranet.php?vista=curso/consultar_curso&id=2', '2014-10-05 04:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(305, '/modelo_aulafrontino/vista/intranet.php?vista=curso/curso', '2014-10-05 04:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(306, '/modelo_aulafrontino/vista/intranet.php?vista=curso/curso', '2014-10-05 04:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(307, '/modelo_aulafrontino/vista/intranet.php?vista=curso/consultar_curso&id=2', '2014-10-05 04:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(308, '/modelo_aulafrontino/vista/intranet.php?vista=curso/curso', '2014-10-05 04:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(309, '/modelo_aulafrontino/vista/intranet.php?vista=curso/consultar_curso&id=2', '2014-10-05 04:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(310, '/modelo_aulafrontino/vista/intranet.php?vista=curso/curso', '2014-10-05 04:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(311, '/modelo_aulafrontino/vista/intranet.php?vista=curso/curso', '2014-10-05 04:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(312, '/modelo_aulafrontino/vista/intranet.php?vista=curso/curso', '2014-10-05 04:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(313, '/modelo_aulafrontino/vista/intranet.php?vista=curso/curso', '2014-10-05 04:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(314, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/servicio', '2014-10-05 04:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(315, '/modelo_aulafrontino/vista/intranet.php?vista=modulo/modulo', '2014-10-05 04:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(316, '/modelo_aulafrontino/vista/intranet.php?vista=modulo/registrar_modulo', '2014-10-05 04:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(317, '/modelo_aulafrontino/vista/intranet.php?vista=modulo/modulo', '2014-10-05 04:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(318, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/servicio', '2014-10-05 04:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(319, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/registrar_servicio', '2014-10-05 04:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(320, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/servicio', '2014-10-05 04:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(321, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/registrar_servicio', '2014-10-05 04:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(322, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/servicio', '2014-10-05 04:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(323, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/registrar_servicio', '2014-10-05 04:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(324, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/servicio', '2014-10-05 04:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(325, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/registrar_servicio', '2014-10-05 04:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(326, '/modelo_aulafrontino/vista/intranet.php?vista=servicio/servicio', '2014-10-05 04:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(327, '/modelo_aulafrontino/vista/intranet.php?vista=rol/asignacion', '2014-10-05 04:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(328, '/modelo_aulafrontino/vista/intranet.php?vista=rol/asignar_modulo', '2014-10-05 04:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(329, '/modelo_aulafrontino/vista/intranet.php?vista=rol/asignar_modulo&id=1', '2014-10-05 04:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(330, '/modelo_aulafrontino/vista/intranet.php?vista=rol/asignar_servicio&id=1', '2014-10-05 04:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(331, '/modelo_aulafrontino/vista/intranet.php?vista=rol/asignar_servicio&id=1', '2014-10-05 04:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(332, '/modelo_aulafrontino/vista/intranet.php?vista=estudiante/estudiante', '2014-10-05 04:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(333, '/modelo_aulafrontino/vista/intranet.php?vista=estudiante/registrar_estudiante', '2014-10-05 04:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(334, '/modelo_aulafrontino/vista/intranet.php', '2014-10-05 04:10:00', '127.0.0.1', '', '', '', 'Administrador', 1),
(335, '/modelo_aulafrontino/vista/intranet.php?vista=estudiante/estudiante', '2014-10-05 04:10:00', '127.0.0.1', '', '', '', 'Administrador', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcurso`
--

CREATE TABLE IF NOT EXISTS `tcurso` (
  `idcurso` int(11) NOT NULL AUTO_INCREMENT,
  `nombrecur` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `seccioncur` char(15) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_aperturacur` date NOT NULL,
  `fecha_cierrecur` date DEFAULT NULL,
  `cupos_disponiblecur` int(11) NOT NULL,
  `cant_inscritoscur` int(11) NOT NULL,
  `idasignatura` int(11) NOT NULL,
  `idprofesor` int(11) NOT NULL,
  `estatuscur` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idcurso`),
  KEY `fk_tcurso_idprofesor_idx` (`idprofesor`),
  KEY `fk_tcurso_idasignatura_idx` (`idasignatura`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tcurso`
--

INSERT INTO `tcurso` (`idcurso`, `nombrecur`, `seccioncur`, `fecha_aperturacur`, `fecha_cierrecur`, `cupos_disponiblecur`, `cant_inscritoscur`, `idasignatura`, `idprofesor`, `estatuscur`) VALUES
(1, 'ProgramaciÃ³n', '133', '2014-10-04', '2014-12-04', 23, 0, 2, 1, 1),
(2, 'Matematica', '133', '2014-10-05', '2014-12-05', 27, 0, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `testudiante`
--

CREATE TABLE IF NOT EXISTS `testudiante` (
  `idestudiante` int(11) NOT NULL AUTO_INCREMENT,
  `cedulaest` char(9) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre_unoest` varchar(55) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre_dosest` varchar(55) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `apellido_unoest` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido_dosest` varchar(60) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `sexoest` char(1) COLLATE utf8_spanish2_ci NOT NULL,
  `direccionest` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono_movest` char(11) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `telefono_habest` char(11) COLLATE utf8_spanish2_ci NOT NULL,
  `correoest` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `estatusest` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idestudiante`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tinscripcion`
--

CREATE TABLE IF NOT EXISTS `tinscripcion` (
  `idinscripcion` int(11) NOT NULL AUTO_INCREMENT,
  `idestudiante` int(11) NOT NULL,
  `idcurso` int(11) NOT NULL,
  `fecha_inscripcion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estatus` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idinscripcion`),
  KEY `fk_tinscripcion_idestudiante_idx` (`idestudiante`),
  KEY `fk_tinscripcion_idcurso_idx` (`idcurso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmodulo`
--

CREATE TABLE IF NOT EXISTS `tmodulo` (
  `idtmodulo` int(11) NOT NULL AUTO_INCREMENT,
  `nombremod` varchar(45) NOT NULL,
  PRIMARY KEY (`idtmodulo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `tmodulo`
--

INSERT INTO `tmodulo` (`idtmodulo`, `nombremod`) VALUES
(1, 'Asignatura'),
(2, 'Servicio'),
(3, 'Seguridad'),
(4, 'Curso'),
(5, 'Estudiante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tpersona`
--

CREATE TABLE IF NOT EXISTS `tpersona` (
  `idtpersona` char(8) NOT NULL,
  `nombreunoper` varchar(45) NOT NULL,
  `nombredosper` varchar(45) DEFAULT NULL,
  `apellidounoper` varchar(45) NOT NULL,
  `apellidodosper` varchar(45) DEFAULT NULL,
  `fechanacimientoper` date NOT NULL,
  `direccionper` varchar(150) NOT NULL,
  `telefonoper` char(11) NOT NULL,
  `correoper` varchar(45) NOT NULL,
  PRIMARY KEY (`idtpersona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tpersona`
--

INSERT INTO `tpersona` (`idtpersona`, `nombreunoper`, `nombredosper`, `apellidounoper`, `apellidodosper`, `fechanacimientoper`, `direccionper`, `telefonoper`, `correoper`) VALUES
('1241244', 'Juan', NULL, 'Perez', NULL, '1979-02-23', 'Araure', '0255482934', 'juan.perez@gmail.com'),
('19214122', 'Jesus', NULL, 'Torres', NULL, '1990-08-03', 'Acarigua', '02557283342', 'jesus.torres@gmail.com'),
('9185471', 'Miguel', NULL, 'Hernandez', NULL, '1990-08-09', 'Acarigua', '02556723493', 'miguel@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tprofesor`
--

CREATE TABLE IF NOT EXISTS `tprofesor` (
  `idprofesor` int(11) NOT NULL AUTO_INCREMENT,
  `cedulapro` char(9) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre_unopro` varchar(55) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre_dospro` varchar(55) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `apellido_unopro` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido_dospro` varchar(60) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `sexopro` char(1) COLLATE utf8_spanish2_ci NOT NULL,
  `direccionpro` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono_movpro` char(11) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `telefono_habpro` char(11) COLLATE utf8_spanish2_ci NOT NULL,
  `correopro` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `profesionpro` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `estatuspro` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idprofesor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tprofesor`
--

INSERT INTO `tprofesor` (`idprofesor`, `cedulapro`, `nombre_unopro`, `nombre_dospro`, `apellido_unopro`, `apellido_dospro`, `sexopro`, `direccionpro`, `telefono_movpro`, `telefono_habpro`, `correopro`, `profesionpro`, `estatuspro`) VALUES
(1, '19768654', 'Luis', 'Javier', 'Bracho', 'Piña', 'M', 'La tapa', '04262354567', '', 'ljbracho@gmail.com', 'Ingeniero Informático', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trol`
--

CREATE TABLE IF NOT EXISTS `trol` (
  `idtrol` int(11) NOT NULL AUTO_INCREMENT,
  `nombrerol` varchar(45) NOT NULL,
  PRIMARY KEY (`idtrol`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `trol`
--

INSERT INTO `trol` (`idtrol`, `nombrerol`) VALUES
(1, 'Administrador'),
(2, 'Profesor'),
(3, 'Estudiante'),
(4, 'Secretaria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trol_has_tmodulo`
--

CREATE TABLE IF NOT EXISTS `trol_has_tmodulo` (
  `trol_idtrol` int(11) NOT NULL,
  `tmodulo_idtmodulo` int(11) NOT NULL,
  PRIMARY KEY (`trol_idtrol`,`tmodulo_idtmodulo`),
  KEY `fk_trol_has_tmodulo_trol_idx` (`trol_idtrol`),
  KEY `fk_trol_has_tmodulo_tmodulo_idx` (`tmodulo_idtmodulo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `trol_has_tmodulo`
--

INSERT INTO `trol_has_tmodulo` (`trol_idtrol`, `tmodulo_idtmodulo`) VALUES
(1, 1),
(1, 3),
(1, 4),
(1, 5),
(2, 1),
(3, 1),
(3, 3),
(4, 1),
(4, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trol_has_tservicio`
--

CREATE TABLE IF NOT EXISTS `trol_has_tservicio` (
  `trol_idtrol` int(11) NOT NULL,
  `tservicio_idtservicio` int(11) NOT NULL,
  PRIMARY KEY (`trol_idtrol`,`tservicio_idtservicio`),
  KEY `fk_trol_has_tservicio_trol1_idx` (`trol_idtrol`),
  KEY `fk_trol_has_tservicio_tservicio1_idx` (`tservicio_idtservicio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `trol_has_tservicio`
--

INSERT INTO `trol_has_tservicio` (`trol_idtrol`, `tservicio_idtservicio`) VALUES
(1, 1),
(1, 2),
(1, 4),
(1, 5),
(1, 7),
(1, 8),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(2, 1),
(2, 11),
(3, 1),
(3, 7),
(4, 1),
(4, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tservicio`
--

CREATE TABLE IF NOT EXISTS `tservicio` (
  `idtservicio` int(11) NOT NULL AUTO_INCREMENT,
  `nombreser` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `enlaceser` varchar(40) NOT NULL,
  `visibleser` char(1) DEFAULT NULL,
  `tmodulo_idtmodulo` int(11) NOT NULL,
  PRIMARY KEY (`idtservicio`),
  KEY `fk_tservicio_tmodulo1_idx` (`tmodulo_idtmodulo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Volcado de datos para la tabla `tservicio`
--

INSERT INTO `tservicio` (`idtservicio`, `nombreser`, `enlaceser`, `visibleser`, `tmodulo_idtmodulo`) VALUES
(1, 'MÃ³dulos', 'modulo/modulo', '1', 3),
(2, 'Registrar modulo', 'modulo/registrar_modulo', '0', 3),
(4, 'Servicio', 'servicio/servicio', '1', 3),
(5, 'Registrar servicio', 'servicio/registrar_servicio', '0', 3),
(7, 'Rol', 'rol/rol', '1', 3),
(8, 'Registrar rol', 'rol/registrar_rol', '0', 3),
(10, 'Asignacion de modulos/servicios', 'rol/asignacion', '1', 3),
(11, 'Asignar mÃ³dulos', 'rol/asignar_modulo', '0', 3),
(12, 'Asignar servicios', 'rol/asignar_servicio', '0', 3),
(13, 'Consultar mÃ³dulo', 'modulo/consultar_modulo', '0', 3),
(14, 'Consultar servicio', 'servicio/consultar_servicio', '0', 3),
(15, 'Consultar rol', 'rol/consultar_rol', '0', 3),
(16, 'Eliminar servicio', 'servicio/eliminar_servicio', '0', 3),
(17, 'Asignatura', 'asignatura/asignatura', '1', 1),
(18, 'Registrar asignatura', 'asignatura/registrar_asignatura', '0', 1),
(19, 'Consultar asignatura', 'asignatura/consultar_asignatura', '0', 1),
(20, 'Desactivar asignatura', 'asignatura/desactivar_asignatura', '0', 1),
(21, 'Curso', 'curso/curso', '1', 4),
(22, 'Registrar Curso', 'curso/registrar_curso', '0', 4),
(23, 'Consultar curso', 'curso/consultar_curso', '0', 4),
(24, 'Desactivar curso', 'curso/desactivar_curso', '0', 4),
(25, 'Estudiante', 'estudiante/estudiante', '1', 5),
(26, 'Registrar Estudiante', 'estudiante/registrar_estudiante', '0', 5),
(27, 'Consultar estudiante', 'estudiante/consultar_estudiante', '0', 5),
(28, 'Desactivar estudiante', 'estudiante/desactivar_estudiante', '0', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tusuario`
--

CREATE TABLE IF NOT EXISTS `tusuario` (
  `idtusuario` char(45) NOT NULL,
  `claveusu` varchar(45) NOT NULL,
  `trol_idtrol` int(11) NOT NULL,
  `tpersona_idtpersona` char(8) NOT NULL,
  PRIMARY KEY (`idtusuario`),
  KEY `fk_tusuario_trol1_idx` (`trol_idtrol`),
  KEY `fk_tusuario_tpersona1_idx` (`tpersona_idtpersona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tusuario`
--

INSERT INTO `tusuario` (`idtusuario`, `claveusu`, `trol_idtrol`, `tpersona_idtpersona`) VALUES
('Administrador', '2a2e9a58102784ca18e2605a4e727b5f', 1, '19214122'),
('Estudiante', '6c0951b2090d9a4ebae828e8614d3160', 3, '9185471'),
('Profesor', '83c2f0ea111a68a80ec383418750b37b', 2, '1241244');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbitacora`
--
ALTER TABLE `tbitacora`
  ADD CONSTRAINT `fk_tbitacora_tusuario1` FOREIGN KEY (`tusuario_idtusuario`) REFERENCES `tusuario` (`idtusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tcurso`
--
ALTER TABLE `tcurso`
  ADD CONSTRAINT `fk_tcurso_idasignatura` FOREIGN KEY (`idasignatura`) REFERENCES `tasignatura` (`idasignatura`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tcurso_idprofesor` FOREIGN KEY (`idprofesor`) REFERENCES `tprofesor` (`idprofesor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tinscripcion`
--
ALTER TABLE `tinscripcion`
  ADD CONSTRAINT `tinscripcion_ibfk_1` FOREIGN KEY (`idcurso`) REFERENCES `tcurso` (`idcurso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tinscripcion_idestudiante` FOREIGN KEY (`idestudiante`) REFERENCES `testudiante` (`idestudiante`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `trol_has_tmodulo`
--
ALTER TABLE `trol_has_tmodulo`
  ADD CONSTRAINT `trol_has_tmodulo_ibfk_1` FOREIGN KEY (`tmodulo_idtmodulo`) REFERENCES `tmodulo` (`idtmodulo`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `trol_has_tmodulo_ibfk_2` FOREIGN KEY (`trol_idtrol`) REFERENCES `trol` (`idtrol`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `trol_has_tservicio`
--
ALTER TABLE `trol_has_tservicio`
  ADD CONSTRAINT `trol_has_tservicio_ibfk_1` FOREIGN KEY (`tservicio_idtservicio`) REFERENCES `tservicio` (`idtservicio`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `trol_has_tservicio_ibfk_2` FOREIGN KEY (`trol_idtrol`) REFERENCES `trol` (`idtrol`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tservicio`
--
ALTER TABLE `tservicio`
  ADD CONSTRAINT `fk_tservicio_tmodulo1` FOREIGN KEY (`tmodulo_idtmodulo`) REFERENCES `tmodulo` (`idtmodulo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tusuario`
--
ALTER TABLE `tusuario`
  ADD CONSTRAINT `fk_tusuario_tpersona1` FOREIGN KEY (`tpersona_idtpersona`) REFERENCES `tpersona` (`idtpersona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tusuario_trol1` FOREIGN KEY (`trol_idtrol`) REFERENCES `trol` (`idtrol`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
