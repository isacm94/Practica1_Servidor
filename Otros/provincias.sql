CREATE DATABASE  IF NOT EXISTS `bdpacogarden` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `bdpacogarden`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: bdprovincias
-- ------------------------------------------------------
-- Server version	5.6.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbl_provincias`
--

DROP TABLE IF EXISTS `tbl_provincias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_provincias` (
  `cod` char(2) NOT NULL DEFAULT '00' COMMENT 'Código de la provincia de dos digitos',
  `nombre` varchar(50) NOT NULL DEFAULT '' COMMENT 'Nombre de la provincia',
  `comunidad_id` tinyint(4) NOT NULL COMMENT 'Código de la comunidad a la que pertenece',
  PRIMARY KEY (`cod`),
  KEY `nombre` (`nombre`),
  KEY `FK_ComunidadAutonomaProv` (`comunidad_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Provincias de españa; 99 para seleccionar a Nacional';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_provincias`
--

LOCK TABLES `tbl_provincias` WRITE;
/*!40000 ALTER TABLE `tbl_provincias` DISABLE KEYS */;
INSERT INTO `tbl_provincias` VALUES ('01','Alava',16),('02','Albacete',7),('03','Alicante',10),('04','Almera',1),('05','Avila',8),('06','Badajoz',11),('07','Balears (Illes)',4),('08','Barcelona',9),('09','Burgos',8),('10','Cáceres',11),('11','Cádiz',1),('12','Castellón',10),('13','Ciudad Real',7),('14','Córdoba',1),('15','Coruña (A)',12),('16','Cuenca',7),('17','Girona',9),('18','Granada',1),('19','Guadalajara',7),('20','Guipzcoa',16),('21','Huelva',1),('22','Huesca',2),('23','Jaén',1),('24','León',8),('25','Lleida',9),('26','Rioja (La)',17),('27','Lugo',12),('28','Madrid',13),('29','Málaga',1),('30','Murcia',14),('31','Navarra',15),('32','Ourense',12),('33','Asturias',3),('34','Palencia',8),('35','Palmas (Las)',5),('36','Pontevedra',12),('37','Salamanca',8),('38','Santa Cruz de Tenerife',5),('39','Cantabria',6),('40','Segovia',8),('41','Sevilla',1),('42','Soria',8),('43','Tarragona',9),('44','Teruel',2),('45','Toledo',7),('46','Valencia',10),('47','Valladolid',8),('48','Vizcaya',16),('49','Zamora',8),('50','Zaragoza',2),('51','Ceuta',18),('52','Melilla',19);
/*!40000 ALTER TABLE `tbl_provincias` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-10-23 16:01:39
