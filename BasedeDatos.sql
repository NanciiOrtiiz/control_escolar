/*
SQLyog Ultimate v8.61 
MySQL - 5.6.16 : Database - practica1
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`practica1` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `practica1`;

/*Table structure for table `alumno_grupo` */

DROP TABLE IF EXISTS `alumno_grupo`;

CREATE TABLE `alumno_grupo` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_grupo` int(10) DEFAULT NULL,
  `id_alumno` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

/*Data for the table `alumno_grupo` */

insert  into `alumno_grupo`(`id`,`id_grupo`,`id_alumno`) values (1,1,1);

/*Table structure for table `grupo` */

DROP TABLE IF EXISTS `grupo`;

CREATE TABLE `grupo` (
  `id_grupo` int(10) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) DEFAULT NULL,
  `Avatar` varchar(50) DEFAULT NULL,
  `Orden` varchar(50) DEFAULT NULL,
  `Estatus` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_grupo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `grupo` */

insert  into `grupo`(`id_grupo`,`Nombre`,`Avatar`,`Orden`,`Estatus`) values (1,'TIC-71',NULL,NULL,'1'),(2,'TIC-72',NULL,NULL,'1'),(3,'TIC-73',NULL,NULL,'1'),(4,'TIC-101',NULL,NULL,'1'),(5,'TIC-102',NULL,NULL,'1'),(6,'TIC-103',NULL,NULL,'1');

/*Table structure for table `maestro_materia` */

DROP TABLE IF EXISTS `maestro_materia`;

CREATE TABLE `maestro_materia` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_maestro` varchar(50) DEFAULT NULL,
  `id_materia` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `maestro_materia` */

insert  into `maestro_materia`(`id`,`id_maestro`,`id_materia`) values (4,'21','3'),(5,'18','3'),(7,'21','2'),(10,'23','6'),(11,'22','2'),(12,'23','1');

/*Table structure for table `materia` */

DROP TABLE IF EXISTS `materia`;

CREATE TABLE `materia` (
  `id_materia` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `Estatus` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_materia`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `materia` */

insert  into `materia`(`id_materia`,`nombre`,`Estatus`) values (1,'Matematicas para TI','1'),(2,'Optativa','1'),(3,'Programacion de Aplicaciones','1'),(4,'Administracion del Tiempo','1'),(5,'Ingenieria Economica','1'),(6,'Ingles','1');

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) NOT NULL,
  `ApellidoPaterno` varchar(100) NOT NULL,
  `ApellidoMaterno` varchar(100) NOT NULL,
  `Telefono` varchar(100) NOT NULL,
  `Calle` varchar(100) NOT NULL,
  `NumeroExterior` varchar(100) NOT NULL,
  `NumeroInterior` varchar(100) NOT NULL,
  `Colonia` varchar(100) NOT NULL,
  `Municipio` varchar(100) NOT NULL,
  `Estado` varchar(100) NOT NULL,
  `CP` varchar(100) NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `Nivel` varchar(100) NOT NULL,
  `Estatus` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

/*Data for the table `usuario` */

insert  into `usuario`(`id`,`Nombre`,`ApellidoPaterno`,`ApellidoMaterno`,`Telefono`,`Calle`,`NumeroExterior`,`NumeroInterior`,`Colonia`,`Municipio`,`Estado`,`CP`,`Correo`,`username`,`password`,`Nivel`,`Estatus`) values (19,'Nancy','Ortiz','Salcedo','','','','','','','','','','nancy','WTBkR2VtTXpaSFpqYlZFOQ== ','1',1),(21,'Dulce','Ortiz','Salcedo','','','','','','','','','','dulce','WTBkR2VtTXpaSFpqYlZFOQ== ','2',2),(22,'Marcos','Perez','Torres','','','','','','','','','','marcos','WTBkR2VtTXpaSFpqYlZFOQ== ','2',2),(23,'Daniel','Ortiz','Salcedo','','','','','','','','','','daniel','WTBkR2VtTXpaSFpqYlZFOQ== ','2',2),(24,'Juan Carlos','Ortiz','Salcedo','','','','','','','','','','carlos','WTBkR2VtTXpaSFpqYlZFOQ== ','1',1),(25,'Antonio','Ortiz','Salcedo','','','','','','','','','','','','3',1),(26,'Jair','Troche','Villavicencio','','','','','','','','','','','','2',1),(28,'Carlos M','Martinez','Garcia','','','','','','','','','','','','3',1),(29,'Jose','Ramirez','Escobedo','','','','','','','','','','','','3',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
