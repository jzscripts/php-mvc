-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-12-2016 a las 01:27:08
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `servi_independencia`
--

CREATE DATABASE IF NOT EXISTS `servi_independencia` DEFAULT CHARACTER SET utf8 ;
USE `servi_independencia` ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(7) NOT NULL,
  `nombre` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `dni` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `domicilio` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `mail` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `borrado` int(1) NOT NULL,
  `audit` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre`, `apellido`, `dni`, `domicilio`, `telefono`, `mail`, `borrado`, `audit`) VALUES
(1, 'esteban', 'zelaya', '34859720', 'b o 2', '4341803', 'est3b4n.1@gmail.com', 0, '*UPDATE*2016-11-28 03:20:37'),
(2, 'pablo', 'zelaya', '36655621', 'b o 2', '4341803', 'p4b10.1@gmail.com', 0, '*UPDATE*2016-11-28 02:18:52'),
(5, 'david', 'zelaya', '34852452', 'oeste 2', '3814123456', 'd4v1d.1@gmail.com', 1, '*DELETE*2016-12-10 23:59:43'),
(6, 'Miguel', 'Perez', '348597212', 'B ningun lugar', '3485', 'prueba@asdas.com', 0, '*UPDATE*2016-12-11 00:00:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id_departamento` int(7) NOT NULL,
  `departamento` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(500) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `borrado` int(1) NOT NULL,
  `audit` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id_departamento`, `departamento`, `descripcion`, `borrado`, `audit`) VALUES
(1, 'mecanica', 'prueba de descrip', 0, '*INSERT*2016-11-27 18:33:48'),
(2, 'pintura', 'ññññ{i{u{u{uúúúúúu+ú´´uu@', 0, '*UPDATE*2016-11-28 05:43:45'),
(3, 'administracion', 'administración de personal', 0, '*INSERT*2016-11-27 23:01:16'),
(4, 'Refrigeración ', 'Sector dedicado a la refrigeracion del vehiculo.', 0, '*UPDATE*2016-11-28 05:48:31'),
(5, 'Prueba', 'Nuevo{oíú', 1, '*INSERT*2016-11-28 05:48:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_empleado` int(7) NOT NULL,
  `nombre` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `dni` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `domicilio` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `id_departamento` int(7) NOT NULL,
  `clave` varchar(64) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `borrado` int(1) NOT NULL,
  `audit` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `nombre`, `apellido`, `dni`, `domicilio`, `telefono`, `id_departamento`, `clave`, `borrado`, `audit`) VALUES
(5, 'Miguel', 'Jerez', '34859720', 'B Umbral 220', '4348596', 1, '123', 0, '*UPDATE*2016-12-10 15:37:50'),
(6, 'Martin', 'Sanchéz', '31123456', 'B° Gráfico 10', '4568596', 2, '', 0, '*UPDATE*2016-11-28 06:21:53'),
(7, 'Jaime', 'Rudolf2', '31852654', 'B Salvacion', '4370859', 3, '', 0, '*UPDATE*2016-12-11 00:05:44'),
(8, 'Manuel', 'Belgrano', '12123456', 'B Casa federal 125', '348595213', 3, '', 0, '*UPDATE*2016-12-11 00:05:27'),
(10, 'Esteban', 'Miguel', '123456789', 'Ba pasdpio', '3645321', 2, '123456', 0, '*INSERT*2016-12-11 00:07:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajos`
--

CREATE TABLE `trabajos` (
  `id_trabajo` int(7) NOT NULL,
  `id_vehiculo` int(7) NOT NULL,
  `id_empleado` int(7) NOT NULL,
  `detalle` varchar(1500) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ingreso` varchar(19) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `egreso` varchar(19) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(3) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `borrado` int(1) NOT NULL,
  `audit` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `trabajos`
--

INSERT INTO `trabajos` (`id_trabajo`, `id_vehiculo`, `id_empleado`, `detalle`, `ingreso`, `egreso`, `estado`, `borrado`, `audit`) VALUES
(1, 5, 8, 'Dasasdasdasdasdasd asdas das dasd', '2016-12-12', '2022-07-06', 'ini', 0, '*UPDATE*2016-11-29 23:35:00'),
(2, 2, 6, 'Camionetadasdasdasd', '2016-11-28', '2016-11-30', 'fin', 0, '*UPDATE*2016-12-11 00:10:16'),
(4, 6, 8, 'Auto nuevo, listo para la refrigeracion', '2016-11-28', '2016-11-30', 'ini', 1, '*DELETE*2016-11-29 23:24:38'),
(5, 2, 6, 'Pintura auto xxx', '2016-11-28', '2016-11-30', 'ini', 1, '*DELETE*2016-11-29 23:24:36'),
(14, 1, 8, 'www directo a refrigeracion', '2016-11-28', '2016-11-30', 'ini', 1, '*DELETE*2016-11-29 23:24:35'),
(15, 7, 7, 'admin', '2016-11-29', '2016-12-01', 'ini', 1, '*DELETE*2016-11-29 23:24:31'),
(16, 3, 7, 'otro admin', '2016-11-29', '2016-12-03', 'ini', 1, '*DELETE*2016-11-29 20:58:51'),
(17, 3, 7, 'otro admin', '2016-11-29', '2016-12-03', 'ini', 1, '*DELETE*2016-11-29 23:24:33'),
(18, 2, 7, '3 admin', '2016-11-29', '2016-12-02', 'ini', 1, '*DELETE*2016-11-29 23:24:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos`
--

CREATE TABLE `turnos` (
  `id` int(11) NOT NULL,
  `id_vehiculo` int(7) NOT NULL,
  `allDay` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `start` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `end` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(3) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `borrado` int(1) NOT NULL,
  `audit` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `turnos`
--

INSERT INTO `turnos` (`id`, `id_vehiculo`, `allDay`, `title`, `descripcion`, `start`, `end`, `url`, `estado`, `borrado`, `audit`) VALUES
(95, 4, '', 'ESTEBAN ZELAYA', 'nueva alta', '2016-12-08 00:00:00', '2016-12-09 00:00:00', '', '0', 1, '*DELETE*2016-12-10 15:49:27'),
(97, 7, '', 'DAVID ZELAYA', 'asd asd asdas dasd sdsd213', '2016-12-06 00:00:00', '2016-12-07 00:00:00', '', '0', 1, '*DELETE*2016-12-10 15:51:46'),
(100, 2, '', 'ESTEBAN ZELAYA', 'asdasd\r\nds\r\nds\r\nfd\r\nsd\r\nsd\r\nfsdf', '2016-12-06 00:03', '2016-12-09 00:00:00', '', '0', 0, '*UPDATE*2016-12-10 23:58:44'),
(101, 5, '', 'PABLO ZELAYA', 'zxxczxdc ', '2016-12-07 00:00:00', '2016-12-08 00:00:00', '', '0', 0, '*INSERT*2016-12-10 15:51:59'),
(102, 3, '', 'DAVID ZELAYA', 'prueba edicion', '2016-12-09 00:00:00', '2016-12-15 09:00', '', '0', 1, '*DELETE*2016-12-10 23:29:32'),
(103, 3, '', 'DAVID ZELAYA', 'prueba', '2016-11-30 00:00:00', '2016-12-01 00:00:00', '', '0', 1, '*DELETE*2016-12-10 23:58:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id_vehiculo` int(7) NOT NULL,
  `patente` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `modelo` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `detalle` varchar(250) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `id_cliente` int(7) NOT NULL,
  `borrado` int(1) NOT NULL,
  `audit` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id_vehiculo`, `patente`, `modelo`, `detalle`, `id_cliente`, `borrado`, `audit`) VALUES
(1, 'WWW-231', 'Ecospar', 'Camioneta', 1, 1, '*DELETE*2016-12-11 00:04:12'),
(2, 'XXX-123', 'Ecosport', 'Camioneta', 1, 0, '*DELETE*2016-11-28 16:08:29'),
(3, 'gmk-056', 'Fiat UNO', 'Nuevo UNO', 5, 0, '*INSERT*2016-11-28 11:35:52'),
(4, 'QPO-182', 'Nissan', 'Alta gama', 1, 0, '*INSERT*2016-11-28 16:07:14'),
(5, 'QPO-123', 'asd', 'das', 2, 0, '*DELETE*2016-11-28 16:08:37'),
(6, 'NVO-123', 'Mercedes', 'Auto de gran gama, @prueba de ó', 2, 0, '*INSERT*2016-11-28 16:09:31'),
(7, 'mmd-000', 'Motocicleta', 'Moto restaurada', 5, 0, '*INSERT*2016-11-28 22:46:25'),
(8, 'XXX-XXX', 'Ninguno', 'Prueba camioneta para Esteban', 1, 0, '*INSERT*2016-12-11 00:04:59');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `dni` (`dni`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id_departamento`),
  ADD UNIQUE KEY `departamento` (`departamento`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_empleado`),
  ADD UNIQUE KEY `dni` (`dni`),
  ADD KEY `id_tipo` (`id_departamento`);

--
-- Indices de la tabla `trabajos`
--
ALTER TABLE `trabajos`
  ADD PRIMARY KEY (`id_trabajo`),
  ADD KEY `id_vehiculo` (`id_vehiculo`),
  ADD KEY `id_empleado` (`id_empleado`);

--
-- Indices de la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fecha` (`start`),
  ADD KEY `id_vehiculo` (`id_vehiculo`),
  ADD KEY `fecha_2` (`start`),
  ADD KEY `fecha_3` (`start`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id_vehiculo`),
  ADD UNIQUE KEY `patente` (`patente`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id_departamento` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleado` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `trabajos`
--
ALTER TABLE `trabajos`
  MODIFY `id_trabajo` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `turnos`
--
ALTER TABLE `turnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id_vehiculo` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`id_departamento`) REFERENCES `departamentos` (`id_departamento`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `trabajos`
--
ALTER TABLE `trabajos`
  ADD CONSTRAINT `trabajos_ibfk_1` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculos` (`id_vehiculo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `trabajos_ibfk_2` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id_empleado`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD CONSTRAINT `turnos_ibfk_1` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculos` (`id_vehiculo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD CONSTRAINT `vehiculos_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
