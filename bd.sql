-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 19-05-2023 a las 18:58:06
-- Versión del servidor: 5.1.41
-- Versión de PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros_sesion`
--

CREATE TABLE IF NOT EXISTS `registros_sesion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `ip_sesion` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `registros_sesion`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla2`
--

CREATE TABLE IF NOT EXISTS `tabla2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  `apellido` text CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `tabla2`
--

INSERT INTO `tabla2` (`id`, `nombre`, `apellido`) VALUES
(1, 'Angel ', 'Osorio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_productos`
--

CREATE TABLE IF NOT EXISTS `tbl_productos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FECHADELREPORTE` date DEFAULT NULL,
  `APELLIDOPATERNO` varchar(50) DEFAULT NULL,
  `APELLIDOMATERNO` varchar(50) DEFAULT NULL,
  `APELLIDOADICIONAL` varchar(50) DEFAULT NULL,
  `PRIMERNOMBRE` varchar(50) DEFAULT NULL,
  `SEGUNDONOMBRE` varchar(50) DEFAULT NULL,
  `FECHANACIMIENTO` date DEFAULT NULL,
  `RFC` varchar(13) DEFAULT NULL,
  `SEXO` varchar(1) DEFAULT NULL,
  `DIRECCIONCALLENUMERO` varchar(100) DEFAULT NULL,
  `DIRECCIONCOMPLETA` varchar(200) DEFAULT NULL,
  `COLONIAOPOBLACION` varchar(100) DEFAULT NULL,
  `DELEGACIONOMUNICIPIO` varchar(100) DEFAULT NULL,
  `CIUDAD` varchar(100) DEFAULT NULL,
  `ESTADO` varchar(100) DEFAULT NULL,
  `CP` varchar(10) DEFAULT NULL,
  `TELEFONO` varchar(20) DEFAULT NULL,
  `NUMEROCUENTA` text,
  `fecha_registro` date DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31032024 ;

--
-- Volcar la base de datos para la tabla `tbl_productos`
--

INSERT INTO `tbl_productos` (`ID`, `FECHADELREPORTE`, `APELLIDOPATERNO`, `APELLIDOMATERNO`, `APELLIDOADICIONAL`, `PRIMERNOMBRE`, `SEGUNDONOMBRE`, `FECHANACIMIENTO`, `RFC`, `SEXO`, `DIRECCIONCALLENUMERO`, `DIRECCIONCOMPLETA`, `COLONIAOPOBLACION`, `DELEGACIONOMUNICIPIO`, `CIUDAD`, `ESTADO`, `CP`, `TELEFONO`, `NUMEROCUENTA`, `fecha_registro`) VALUES
(0, '2023-03-31', 'ARGUELLO', 'COYOTLA', '', 'CRISTINA', 'FRANCISCA', '1979-12-22', 'AUCC791222', 'F', 'VIA EL MODELO SUR 1', '', 'EJIDAL JOSE CARDEL', 'LA ANTIGUA', 'LA ANTIGUA', 'VER', '91680', '2961134879', '64#333\r\n', '2023-05-19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(50) NOT NULL,
  `usuario` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tipo` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `tipo`) VALUES
(1, 'adm', 'adm123', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
