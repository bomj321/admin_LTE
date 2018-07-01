-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 02-05-2018 a las 08:42:16
-- Versión del servidor: 5.5.51-38.2
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `logotekc_proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cantones`
--

CREATE TABLE IF NOT EXISTS `cantones` (
  `id_canto` int(11) NOT NULL,
  `nom_canto` varchar(50) NOT NULL,
  `id_provi` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cantones`
--

INSERT INTO `cantones` (`id_canto`, `nom_canto`, `id_provi`) VALUES
(1, 'San José', 1),
(2, 'Escazú', 1),
(3, 'Alajuela', 2),
(4, 'San Ramón', 2),
(5, 'Cartago', 3),
(6, 'Paraíso', 3),
(7, 'Heredia', 4),
(8, 'Barva', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE IF NOT EXISTS `empleados` (
  `Cedula` varchar(50) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Telefono` varchar(30) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Provincia` varchar(10) NOT NULL,
  `Canton` varchar(15) NOT NULL,
  `Tiempo` varchar(11) NOT NULL,
  `Plan` varchar(60) NOT NULL,
  `ClaveATV` varchar(20) NOT NULL,
  `Bloque` varchar(30) NOT NULL,
  `img_emple` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`Cedula`, `Nombre`, `Telefono`, `Email`, `Provincia`, `Canton`, `Tiempo`, `Plan`, `ClaveATV`, `Bloque`, `img_emple`) VALUES
('112610049', 'Ronald Rojas Castro', '87822652', 'ronaldrojascastro@gmail.com', '2', '4', '1', '4', 'Rrojas2018*', '1', '112610049.png'),
('112610050', 'RODOLFO ROJAS CASTRO', '878226522', 'rodolforojas@gmail.com', '2', '4', '2', '4', 'Rroro2016*', '1', '112610050.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p2`
--

CREATE TABLE IF NOT EXISTS `p2` (
  `codigo` varchar(10) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `lugar_nacimiento` varchar(30) NOT NULL,
  `fecha_nacimiento` varchar(30) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `puesto` varchar(15) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `p2`
--

INSERT INTO `p2` (`codigo`, `nombres`, `lugar_nacimiento`, `fecha_nacimiento`, `direccion`, `telefono`, `puesto`, `estado`) VALUES
('1250', 'Juan Campos', 'Santa Ana, El Salvador', '15-06-1991', '', '70252525', 'Gerente', 2),
('12509', 'Andres Perez', 'SM', '06-06-1980', 'SM', '12345789', 'Gerente', 3),
('15200', 'Marcos Amaya', 'Santa Salvador', '06-06-2017', 'San Salvador', '12345678', 'Vendedor', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planes`
--

CREATE TABLE IF NOT EXISTS `planes` (
  `id_plan` int(11) NOT NULL,
  `nom_plan` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `planes`
--

INSERT INTO `planes` (`id_plan`, `nom_plan`) VALUES
(1, 'Profesional'),
(2, 'PYME1'),
(3, 'PYME2'),
(4, 'Empresarial1'),
(5, 'Empresarial2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE IF NOT EXISTS `provincias` (
  `id_provi` int(11) NOT NULL,
  `nom_provi` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`id_provi`, `nom_provi`) VALUES
(1, 'San José'),
(2, 'Alajuela'),
(3, 'Cartago'),
(4, 'Heredia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usu` int(11) NOT NULL,
  `correo_usu` varchar(50) NOT NULL,
  `clave_usu` varchar(100) NOT NULL,
  `nombre_usu` varchar(50) NOT NULL,
  `status_usu` int(11) NOT NULL,
  `privilegios_usu` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usu`, `correo_usu`, `clave_usu`, `nombre_usu`, `status_usu`, `privilegios_usu`) VALUES
(1, 'admin@hot.com', 'e10adc3949ba59abbe56e057f20f883e', 'admin', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cantones`
--
ALTER TABLE `cantones`
  ADD PRIMARY KEY (`id_canto`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`Cedula`);

--
-- Indices de la tabla `p2`
--
ALTER TABLE `p2`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `planes`
--
ALTER TABLE `planes`
  ADD PRIMARY KEY (`id_plan`);

--
-- Indices de la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD PRIMARY KEY (`id_provi`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cantones`
--
ALTER TABLE `cantones`
  MODIFY `id_canto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `planes`
--
ALTER TABLE `planes`
  MODIFY `id_plan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `provincias`
--
ALTER TABLE `provincias`
  MODIFY `id_provi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usu` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
