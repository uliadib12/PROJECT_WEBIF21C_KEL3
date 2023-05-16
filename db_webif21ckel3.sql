/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.4.27-MariaDB : Database - db_webif21ckel3
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_webif21ckel3` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `db_webif21ckel3`;

/*Table structure for table `tb_login` */

DROP TABLE IF EXISTS `tb_login`;

CREATE TABLE `tb_login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tb_login` */

insert  into `tb_login`(`id`,`username`,`password`) values 
(1,'tri07','ferli07');

/*Table structure for table `tb_penjadwalan` */

DROP TABLE IF EXISTS `tb_penjadwalan`;

CREATE TABLE `tb_penjadwalan` (
  `No` int(11) NOT NULL AUTO_INCREMENT,
  `gambar` blob DEFAULT NULL,
  `Nama_Event` varchar(50) DEFAULT NULL,
  `Tanggal` date DEFAULT NULL,
  `Jam` varchar(10) DEFAULT NULL,
  `Tempat` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`No`),
  KEY `No` (`No`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tb_penjadwalan` */

insert  into `tb_penjadwalan`(`No`,`gambar`,`Nama_Event`,`Tanggal`,`Jam`,`Tempat`) values 
(1,'1684179357_567fb1926956bf7a36b8.png','Event Gebyar','2023-05-17','03:35','Gedung GSG'),
(2,'1684179556_e76e16ec5fc6d5be5dbb.jpg','Event Gebyar','2023-05-19','04:40','Lab A'),
(3,'1684233589_5b6f06c51d611dc01d91.jpg','UKMI','2023-05-25','20:39','Gedung GSG');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
