-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 30-08-2023 a las 01:54:25
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
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE IF NOT EXISTS `modulo` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `creado` datetime NOT NULL,
  `actualizado` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `modulo`
--

INSERT INTO `modulo` (`ID`, `nombre`, `creado`, `actualizado`) VALUES
(1, 'Noticias', '2023-08-12 00:00:00', '2023-08-12 00:00:00'),
(2, 'Gobierno', '2023-08-12 00:00:00', '2023-08-12 00:00:00'),
(3, 'Contactos', '2023-08-28 00:00:00', '2023-08-12 00:00:00'),
(4, 'Usuarios', '2023-08-28 00:00:00', '2023-08-28 00:00:00'),
(5, 'Categorias', '2023-08-12 00:00:00', '2023-08-12 00:00:00'),
(6, 'Historias', '2023-08-28 00:00:00', '2023-08-28 00:00:00'),
(7, 'Permisos', '2023-08-29 00:00:00', '2023-08-29 00:00:00');

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
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE IF NOT EXISTS `permiso` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Usuario` int(11) NOT NULL,
  `ID_Modulo` int(11) NOT NULL,
  `c` int(11) NOT NULL DEFAULT '0',
  `r` int(1) NOT NULL DEFAULT '0',
  `u` int(11) NOT NULL DEFAULT '0',
  `d` int(11) NOT NULL DEFAULT '0',
  `creado` datetime NOT NULL,
  `actualizado` datetime NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_Usuario` (`ID_Usuario`),
  KEY `ID_Modulo` (`ID_Modulo`),
  KEY `ID_Usuario_2` (`ID_Usuario`),
  KEY `ID_Modulo_2` (`ID_Modulo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`ID`, `ID_Usuario`, `ID_Modulo`, `c`, `r`, `u`, `d`, `creado`, `actualizado`) VALUES
(1, 8, 1, 1, 0, 1, 1, '2023-08-12 00:00:00', '2023-08-12 00:00:00'),
(2, 8, 2, 1, 0, 1, 1, '2023-08-12 00:00:00', '2023-08-12 00:00:00'),
(3, 8, 3, 1, 0, 1, 1, '2023-08-28 00:00:00', '2023-08-28 00:00:00'),
(4, 8, 4, 1, 1, 1, 1, '2023-08-28 00:00:00', '2023-08-28 00:00:00'),
(5, 8, 5, 1, 0, 1, 1, '2023-08-28 00:00:00', '2023-08-28 00:00:00'),
(6, 8, 6, 1, 0, 1, 1, '2023-08-28 00:00:00', '2023-08-28 00:00:00'),
(7, 10, 1, 1, 1, 1, 1, '2023-08-29 00:00:00', '2023-08-29 00:00:00'),
(8, 10, 2, 1, 1, 1, 1, '2023-08-29 00:00:00', '2023-08-29 00:00:00'),
(9, 10, 3, 1, 1, 1, 1, '2023-08-29 00:00:00', '2023-08-29 00:00:00'),
(10, 10, 4, 0, 0, 0, 0, '2023-08-29 00:00:00', '2023-08-29 00:00:00'),
(11, 10, 5, 1, 1, 1, 1, '2023-08-29 00:00:00', '2023-08-29 00:00:00'),
(12, 10, 6, 1, 1, 1, 1, '2023-08-29 00:00:00', '2023-08-29 00:00:00'),
(13, 8, 7, 1, 1, 1, 1, '2023-08-29 00:00:00', '2023-08-29 00:00:00'),
(14, 10, 7, 0, 0, 0, 0, '2023-08-29 00:00:00', '2023-08-29 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Correo` varchar(150) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `is_activo` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID`, `Nombre`, `Correo`, `Password`, `is_activo`) VALUES
(8, 'admin', 'carlosembus6@gmail.com', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', 1),
(9, 'usuario', 'carlosembus6@gmail.com', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', 1),
(10, 'usuario', 'carloseb_90@hotmail.com', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', 1);

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
-- Filtros para la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD CONSTRAINT `permiso_ibfk_1` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `permiso_ibfk_2` FOREIGN KEY (`ID_Modulo`) REFERENCES `modulo` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
