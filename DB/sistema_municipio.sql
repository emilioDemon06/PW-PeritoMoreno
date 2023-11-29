-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 17-10-2023 a las 17:48:09
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sistema_municipio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`ID`, `Nombre`) VALUES
(1, 'Salud'),
(2, 'Deporte'),
(3, 'Politica'),
(4, 'Musica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE IF NOT EXISTS `imagen` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(150) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Ruta` varchar(200) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `ID_Noticia` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_Noticia` (`ID_Noticia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia`
--

CREATE TABLE IF NOT EXISTS `noticia` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Contenido` mediumtext COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Fecha` date NOT NULL,
  `ID_Categoria` int(11) NOT NULL,
  `ID_Autor` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_Categoria` (`ID_Categoria`),
  KEY `ID_Autor` (`ID_Autor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagina`
--

CREATE TABLE IF NOT EXISTS `pagina` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Menu` int(11) DEFAULT NULL,
  `Titulo` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Page` varchar(60) COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT '#',
  `Icono` varchar(80) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Submenu_Des` varchar(60) COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT '#',
  `Creado` datetime NOT NULL,
  `Actualizado` datetime NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_Menu` (`ID_Menu`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `pagina`
--

INSERT INTO `pagina` (`ID`, `ID_Menu`, `Titulo`, `Page`, `Icono`, `Submenu_Des`, `Creado`, `Actualizado`) VALUES
(1, NULL, 'Noticia', '#', 'bi bi-newspaper', 'noticia_nav', '2023-08-12 00:00:00', '2023-08-12 00:00:00'),
(2, NULL, 'Gobierno', '#', 'bi bi-diagram-3-fill', 'gobierno_nav', '2023-08-12 00:00:00', '2023-08-12 00:00:00'),
(3, NULL, 'Contacto', 'Contacto', 'bi bi-journals', '#', '2023-08-28 00:00:00', '2023-08-12 00:00:00'),
(4, NULL, 'Usuario', '#', 'bi bi-people-fill', 'usuario_nav', '2023-08-28 00:00:00', '2023-08-28 00:00:00'),
(5, 1, 'Categorias', 'Categoria', 'bi bi-bookmarks', '#', '2023-08-12 00:00:00', '2023-08-12 00:00:00'),
(6, NULL, 'Historia', 'Historia', 'bi bi-book', '#', '2023-08-28 00:00:00', '2023-08-28 00:00:00'),
(7, 4, 'Permiso', 'Permiso', 'bi bi-person-lock', '#', '2023-08-29 00:00:00', '2023-08-29 00:00:00'),
(8, 4, 'Roles', 'Rol', 'bi bi-person-gear', '#', '2023-09-16 00:00:00', '2023-09-16 00:00:00'),
(9, 1, 'Noticias', 'Noticia', 'bi bi-list-ul', '#', '2023-09-16 00:00:00', '2023-09-16 00:00:00'),
(11, 4, 'Usuarios', 'Usuario', 'bi bi-people', '#', '2023-09-19 00:00:00', '2023-09-19 00:00:00'),
(12, 2, 'Ejecutivo Municipal', 'Ejecutivo', 'bi bi-suitcase-lg', '#', '2023-09-19 00:00:00', '2023-09-19 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE IF NOT EXISTS `permiso` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Rol` int(11) NOT NULL,
  `ID_Pagina` int(11) NOT NULL,
  `c` int(11) NOT NULL DEFAULT '0',
  `r` int(1) NOT NULL DEFAULT '0',
  `u` int(11) NOT NULL DEFAULT '0',
  `d` int(11) NOT NULL DEFAULT '0',
  `creado` datetime NOT NULL,
  `actualizado` datetime NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_Pagina` (`ID_Pagina`),
  KEY `ID_Rol` (`ID_Rol`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci AUTO_INCREMENT=31 ;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`ID`, `ID_Rol`, `ID_Pagina`, `c`, `r`, `u`, `d`, `creado`, `actualizado`) VALUES
(15, 1, 1, 1, 0, 1, 1, '2023-09-03 00:00:00', '2023-09-03 00:00:00'),
(16, 1, 2, 1, 0, 1, 1, '2023-09-03 00:00:00', '2023-09-03 00:00:00'),
(17, 1, 3, 1, 0, 1, 1, '2023-09-03 00:00:00', '2023-09-03 00:00:00'),
(18, 1, 4, 1, 1, 1, 1, '2023-09-03 00:00:00', '2023-09-03 00:00:00'),
(19, 1, 5, 1, 0, 1, 1, '2023-09-03 00:00:00', '2023-09-03 00:00:00'),
(20, 1, 6, 1, 0, 1, 1, '2023-09-03 00:00:00', '2023-09-03 00:00:00'),
(21, 1, 7, 1, 1, 1, 1, '2023-09-03 00:00:00', '2023-09-03 00:00:00'),
(23, 2, 1, 1, 1, 1, 1, '2023-09-03 00:00:00', '2023-09-03 00:00:00'),
(24, 2, 2, 1, 1, 1, 1, '2023-09-03 00:00:00', '2023-09-03 00:00:00'),
(25, 2, 3, 1, 1, 1, 1, '2023-09-03 00:00:00', '2023-09-03 00:00:00'),
(26, 2, 4, 1, 0, 1, 1, '2023-09-03 00:00:00', '2023-09-03 00:00:00'),
(27, 2, 5, 1, 1, 1, 1, '2023-09-03 00:00:00', '2023-09-03 00:00:00'),
(28, 2, 6, 1, 1, 1, 1, '2023-09-03 00:00:00', '2023-09-03 00:00:00'),
(29, 2, 7, 1, 0, 1, 1, '2023-09-03 00:00:00', '2023-09-03 00:00:00'),
(30, 1, 8, 1, 1, 1, 1, '2023-09-16 00:00:00', '2023-09-16 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `is_activo` int(11) NOT NULL DEFAULT '1',
  `Creado` datetime NOT NULL,
  `Actualizado` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`ID`, `Nombre`, `is_activo`, `Creado`, `Actualizado`) VALUES
(1, 'Administrador', 0, '2023-09-03 00:00:00', '2023-09-03 00:00:00'),
(2, 'Editor', 1, '2023-09-03 00:00:00', '2023-09-03 00:00:00'),
(3, 'Default', 1, '2023-09-03 03:09:00', '2023-09-03 03:09:00'),
(4, 'creador contenido', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'editor de gobierno', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Rol` int(11) NOT NULL,
  `Nick` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Nombre` varchar(100) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `Apellido` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `FotoPerfil` varchar(255) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `LugarTrabajo` varchar(100) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `DireccionTrabajo` varchar(100) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `Telefono` varchar(100) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `Correo` varchar(150) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `is_activo` int(11) NOT NULL DEFAULT '1',
  `Facebook` varchar(200) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `Instagram` varchar(200) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`),
  KEY `ID_Rol` (`ID_Rol`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID`, `ID_Rol`, `Nick`, `Nombre`, `Apellido`, `FotoPerfil`, `LugarTrabajo`, `DireccionTrabajo`, `Telefono`, `Correo`, `Password`, `is_activo`, `Facebook`, `Instagram`) VALUES
(1, 1, 'Carlos06', 'Carlos', 'Bustamante', NULL, 'Transito', '25 de mayo', NULL, 'carlosembus6@gmail.com', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', 1, 'https://www.facebook.com/carlos.bustamante.Emilio', 'https://instagram.com/carlos.e.bustamante?igshid=MzMyNGUyNmU2YQ=='),
(2, 2, 'Editor', NULL, '', NULL, NULL, '', NULL, 'carloseb_90@hotmail.com', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', 1, NULL, NULL),
(4, 1, 'carlitos90', NULL, '', NULL, NULL, '', NULL, 'carlosem_40@hotmail.com', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', 1, NULL, NULL),
(8, 2, 'carloseb89', NULL, '', NULL, NULL, '', NULL, 'carlosembus89@hotmail.com', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', 1, NULL, NULL),
(11, 2, 'carloseb90', NULL, '', NULL, NULL, '', NULL, 'carloseb_70@hotmail.com', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', 0, NULL, NULL);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD CONSTRAINT `imagen_ibfk_1` FOREIGN KEY (`ID_Noticia`) REFERENCES `noticia` (`ID`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD CONSTRAINT `noticia_ibfk_1` FOREIGN KEY (`ID_Categoria`) REFERENCES `categoria` (`ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `noticia_ibfk_2` FOREIGN KEY (`ID_Autor`) REFERENCES `usuario` (`ID`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `pagina`
--
ALTER TABLE `pagina`
  ADD CONSTRAINT `pagina_ibfk_2` FOREIGN KEY (`ID_Menu`) REFERENCES `pagina` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD CONSTRAINT `permiso_ibfk_1` FOREIGN KEY (`ID_Rol`) REFERENCES `rol` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `permiso_ibfk_3` FOREIGN KEY (`ID_Pagina`) REFERENCES `pagina` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`ID_Rol`) REFERENCES `rol` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
