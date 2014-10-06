-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 06-10-2014 a las 00:35:22
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
(1, 'Ma01', 'Matematica I', 'EstadÃ­sticas y probabilidades', '4', 3, '\r\n         ', 4, 1),
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=880 ;

--
-- Volcado de datos para la tabla `tbitacora`
--
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tcurso`
--

INSERT INTO `tcurso` (`idcurso`, `nombrecur`, `seccioncur`, `fecha_aperturacur`, `fecha_cierrecur`, `cupos_disponiblecur`, `cant_inscritoscur`, `idasignatura`, `idprofesor`, `estatuscur`) VALUES
(1, 'ProgramaciÃ³n', '133', '2014-10-04', '2014-12-04', 24, 1, 2, 1, 1),
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `testudiante`
--

INSERT INTO `testudiante` (`idestudiante`, `cedulaest`, `nombre_unoest`, `nombre_dosest`, `apellido_unoest`, `apellido_dosest`, `sexoest`, `direccionest`, `telefono_movest`, `telefono_habest`, `correoest`, `estatusest`) VALUES
(1, '21561768', 'JAVIER', 'ANTONIO', 'MARTÃ­N', 'LOBO', 'M', 'VILLA ARAURE 1, #6244', '04129428301', '02556216731', 'recupera.javier@gmail.com', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tinscripcion`
--

INSERT INTO `tinscripcion` (`idinscripcion`, `idestudiante`, `idcurso`, `fecha_inscripcion`, `estatus`) VALUES
(1, 1, 1, '2014-10-05 23:44:58', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmodulo`
--

CREATE TABLE IF NOT EXISTS `tmodulo` (
  `idtmodulo` int(11) NOT NULL AUTO_INCREMENT,
  `nombremod` varchar(45) NOT NULL,
  PRIMARY KEY (`idtmodulo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `tmodulo`
--

INSERT INTO `tmodulo` (`idtmodulo`, `nombremod`) VALUES
(1, 'Asignatura'),
(3, 'Seguridad'),
(4, 'Curso'),
(5, 'Estudiante'),
(6, 'InscripciÃ³n');

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
(1, 6),
(2, 1),
(3, 1),
(3, 3),
(4, 1);

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
(1, 29),
(1, 30),
(1, 31),
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Volcado de datos para la tabla `tservicio`
--

INSERT INTO `tservicio` (`idtservicio`, `nombreser`, `enlaceser`, `visibleser`, `tmodulo_idtmodulo`) VALUES
(1, 'MÃ³dulos', 'seguridad/modulo', '1', 3),
(2, 'Registrar modulo', 'seguridad/registrar_modulo', '0', 3),
(4, 'Servicio', 'seguridad/servicio', '1', 3),
(5, 'Registrar servicio', 'seguridad/registrar_servicio', '0', 3),
(7, 'Rol', 'seguridad/rol', '1', 3),
(8, 'Registrar rol', 'seguridad/registrar_rol', '0', 3),
(10, 'Asignacion de modulos/servicios', 'seguridad/asignacion', '1', 3),
(11, 'Asignar mÃ³dulos', 'seguridad/asignar_modulo', '0', 3),
(12, 'Asignar servicios', 'seguridad/asignar_servicio', '0', 3),
(13, 'Consultar mÃ³dulo', 'seguridad/consultar_modulo', '0', 3),
(14, 'Consultar servicio', 'seguridad/consultar_servicio', '0', 3),
(15, 'Consultar rol', 'seguridad/consultar_rol', '0', 3),
(16, 'Eliminar servicio', 'seguridad/eliminar_servicio', '0', 3),
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
(28, 'Desactivar estudiante', 'estudiante/desactivar_estudiante', '0', 5),
(29, 'Eliminar mÃ³dulo', 'modulo/eliminar_modulo', '0', 3),
(30, 'InscripciÃ³n', 'inscripcion/curso', '1', 6),
(31, 'Registrar InscripciÃ³n', 'inscripcion/registrar_inscripcion', '0', 6);

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
  ADD CONSTRAINT `fk_tinscripcion_idestudiante` FOREIGN KEY (`idestudiante`) REFERENCES `testudiante` (`idestudiante`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tinscripcion_ibfk_1` FOREIGN KEY (`idcurso`) REFERENCES `tcurso` (`idcurso`) ON DELETE CASCADE ON UPDATE CASCADE;

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
