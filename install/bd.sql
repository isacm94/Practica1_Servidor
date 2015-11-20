-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-11-2015 a las 19:17:07
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdpacogarden`
--
CREATE DATABASE IF NOT EXISTS `bdpacogarden` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bdpacogarden`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea`
--

DROP TABLE IF EXISTS `tarea`;
CREATE TABLE IF NOT EXISTS `tarea` (
  `id` int(5) NOT NULL,
  `descripcion` text,
  `persona_contacto` varchar(50) DEFAULT NULL,
  `telefono_contacto` int(9) DEFAULT NULL,
  `correo_contacto` varchar(30) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `poblacion` varchar(100) DEFAULT NULL,
  `cp` int(5) DEFAULT NULL,
  `tbl_provincias_cod` char(2) NOT NULL,
  `estado` varchar(15) DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `operario_encargado` varchar(50) DEFAULT NULL,
  `fecha_realizacion` date DEFAULT NULL,
  `anotaciones_anteriores` text,
  `anotaciones_posteriores` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Disparadores `tarea`
--
DROP TRIGGER IF EXISTS `InsertaFechaCreacionEnBD`;
DELIMITER $$
CREATE TRIGGER `InsertaFechaCreacionEnBD` BEFORE INSERT ON `tarea`
 FOR EACH ROW SET  NEW.fecha_creacion=CURRENT_DATE()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_provincias`
--

DROP TABLE IF EXISTS `tbl_provincias`;
CREATE TABLE IF NOT EXISTS `tbl_provincias` (
  `cod` char(2) NOT NULL DEFAULT '00' COMMENT 'Código de la provincia de dos digitos',
  `nombre` varchar(50) NOT NULL DEFAULT '' COMMENT 'Nombre de la provincia',
  `comunidad_id` tinyint(4) NOT NULL COMMENT 'Código de la comunidad a la que pertenece'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Provincias de españa; 99 para seleccionar a Nacional';

--
-- Volcado de datos para la tabla `tbl_provincias`
--

INSERT INTO `tbl_provincias` (`cod`, `nombre`, `comunidad_id`) VALUES
('01', 'Alava', 16),
('02', 'Albacete', 7),
('03', 'Alicante', 10),
('04', 'Almería', 1),
('05', 'Avila', 8),
('06', 'Badajoz', 11),
('07', 'Balears (Illes)', 4),
('08', 'Barcelona', 9),
('09', 'Burgos', 8),
('10', 'Cáceres', 11),
('11', 'Cádiz', 1),
('12', 'Castellón', 10),
('13', 'Ciudad Real', 7),
('14', 'Córdoba', 1),
('15', 'Coruña (A)', 12),
('16', 'Cuenca', 7),
('17', 'Girona', 9),
('18', 'Granada', 1),
('19', 'Guadalajara', 7),
('20', 'Guipuzcoa', 16),
('21', 'Huelva', 1),
('22', 'Huesca', 2),
('23', 'Jaén', 1),
('24', 'León', 8),
('25', 'Lleida', 9),
('26', 'Rioja (La)', 17),
('27', 'Lugo', 12),
('28', 'Madrid', 13),
('29', 'Málaga', 1),
('30', 'Murcia', 14),
('31', 'Navarra', 15),
('32', 'Ourense', 12),
('33', 'Asturias', 3),
('34', 'Palencia', 8),
('35', 'Palmas (Las)', 5),
('36', 'Pontevedra', 12),
('37', 'Salamanca', 8),
('38', 'Santa Cruz de Tenerife', 5),
('39', 'Cantabria', 6),
('40', 'Segovia', 8),
('41', 'Sevilla', 1),
('42', 'Soria', 8),
('43', 'Tarragona', 9),
('44', 'Teruel', 2),
('45', 'Toledo', 7),
('46', 'Valencia', 10),
('47', 'Valladolid', 8),
('48', 'Vizcaya', 16),
('49', 'Zamora', 8),
('50', 'Zaragoza', 2),
('51', 'Ceuta', 18),
('52', 'Melilla', 19);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tarea`
--
ALTER TABLE `tarea`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tarea_tbl_provincias_idx` (`tbl_provincias_cod`);

--
-- Indices de la tabla `tbl_provincias`
--
ALTER TABLE `tbl_provincias`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `nombre` (`nombre`),
  ADD KEY `FK_ComunidadAutonomaProv` (`comunidad_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tarea`
--
ALTER TABLE `tarea`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tarea`
--
ALTER TABLE `tarea`
  ADD CONSTRAINT `fk_tarea_tbl_provincias` FOREIGN KEY (`tbl_provincias_cod`) REFERENCES `tbl_provincias` (`cod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
