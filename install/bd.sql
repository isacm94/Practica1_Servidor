
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;


INSERT INTO `tarea` (`id`, `descripcion`, `persona_contacto`, `telefono_contacto`, `correo_contacto`, `direccion`, `poblacion`, `cp`, `tbl_provincias_cod`, `estado`, `fecha_creacion`, `operario_encargado`, `fecha_realizacion`, `anotaciones_anteriores`, `anotaciones_posteriores`) VALUES
(1, 'Plantar flores', 'Javier García', 933452145, 'javier@garcia.com', 'Calle Plus Ultra, 36', 'Huelva Capital', 21448, '35', 'Realizada', '2015-11-07', 'Antonio', '2017-02-07', 'Plantar las flores rápido', ''),
(2, 'Regar las flores', 'Carlos Pérez', 933452145, 'carlos@perez.com', 'Calle Almonte, 36', 'Almonte', 51248, '30', 'Pendiente', '2015-11-07', '', '2017-08-07', 'Regar las flores rápido', 'Regar otra vez'),
(3, 'Cortar las flores', 'Antonio Calvo', 933777145, 'antonio@calvo.com', 'Calle Placido Bañuelos, 17', 'Rociana del Condado', 21720, '21', 'Realizada', '2015-11-07', 'Ángel', '2017-08-01', 'Cortar las flores rápido', 'Cortar otra vez'),
(4, 'Regar césped', 'Luca Betanzos Calvo', 945777123, 'luca@btzs.com', 'Calle Nueva, 19', 'Bollullos', 51744, '01', 'Realizada', '2015-11-07', 'Adán', '2017-08-01', 'Regar césped rápido', 'Regar césped otra vez'),
(5, 'Regar las flores', 'Carlos Mateos', 933452145, 'carlos@perez.com', 'Calle La Fuente, 36', 'Villarrasa', 45248, '30', 'Realizada', '2015-11-07', 'Manuel', '2017-08-07', 'Regar las flores rápido', 'gpgppgpgpg'),
(6, 'Cortar las flores', 'Antonio Banderas', 933777145, 'antonio@banderas.com', 'Calle Larga, 1', 'Marbella', 51778, '23', 'Pendiente', '2015-11-07', '', '2017-08-01', 'Cortar las flores rápido', 'Cortar otra vez'),
(7, 'Regar césped', 'Nora Betanzos Calvo', 941777123, 'nora@btzs.com', 'Calle Nueva, 19', 'Bonares', 51744, '01', 'Realizada', '2015-11-07', 'Rufino', '2017-08-01', 'Regar césped rápido', 'Regar césped otra vez'),
(8, 'Regar las flores', 'José Mateos', 959452145, 'jose@mateos.com', 'Calle La Fuente, 36', 'Almonte', 45248, '30', 'Pendiente', '2015-11-10', '', '2016-06-07', 'Regar las flores rápido', 'Regar otra vez'),
(9, 'Cortar las flores', 'Adán Candeas', 933777145, 'adan@candeas.com', 'Calle Larga, 1', 'Aroche', 51778, '23', 'Pendiente', '2015-11-10', '', '2016-05-01', 'Cortar las flores rápido', 'Cortar otra vez'),
(10, 'Regar césped', 'Laura Carrasco Sánchez', 941777123, 'laura@carrasco.com', 'Calle Nueva, 23', 'Rociana del Condado', 21720, '21', 'Pendiente', '2015-11-10', '', '2017-10-04', 'Regar césped rápido', 'Regar césped otra vez'),
(11, 'Regar césped', 'Susana Carrasco Sánchez', 941777123, 'susana@carrasco.com', 'Calle Nueva, 23', 'Rociana del Condado', 21720, '21', 'Pendiente', '2015-11-10', '', '2017-08-17', 'Regar césped rápido', 'Regar césped otra vez'),
(12, 'Podar arbustos', 'Fernando Calvo', 600152478, 'fernandocalvo@gmail.com', 'Calle Cabreros, 36', 'Rociana del Condado', 21720, '21', 'Cancelada', '2015-11-28', '', '2017-12-23', 'Regar ', 'Rápido');

DROP TABLE IF EXISTS `tbl_provincias`;
CREATE TABLE IF NOT EXISTS `tbl_provincias` (
  `cod` char(2) NOT NULL DEFAULT '00' COMMENT 'Código de la provincia de dos digitos',
  `nombre` varchar(50) NOT NULL DEFAULT '' COMMENT 'Nombre de la provincia',
  `comunidad_id` tinyint(4) NOT NULL COMMENT 'Código de la comunidad a la que pertenece'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Provincias de españa; 99 para seleccionar a Nacional';


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

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL,
  `tipo` char(1) DEFAULT NULL,
  `usuario` varchar(25) DEFAULT NULL,
  `clave` varchar(60) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `usuarios` (`id`, `tipo`, `usuario`, `clave`) VALUES
(1, 'A', 'admin', 'admin'),
(2, 'O', 'ope', 'ope');

ALTER TABLE `tarea`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tarea_tbl_provincias_idx` (`tbl_provincias_cod`);


ALTER TABLE `tbl_provincias`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `nombre` (`nombre`),
  ADD KEY `FK_ComunidadAutonomaProv` (`comunidad_id`);

ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tarea`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;

ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;

ALTER TABLE `tarea`
  ADD CONSTRAINT `fk_tarea_tbl_provincias` FOREIGN KEY (`tbl_provincias_cod`) REFERENCES `tbl_provincias` (`cod`) ON DELETE NO ACTION ON UPDATE NO ACTION;



DROP TRIGGER IF EXISTS `InsertaFechaCreacionEnBD`;
DELIMITER $$
CREATE TRIGGER `InsertaFechaCreacionEnBD` BEFORE INSERT ON `tarea`
 FOR EACH ROW SET  NEW.fecha_creacion=CURRENT_DATE()
$$
DELIMITER ;

