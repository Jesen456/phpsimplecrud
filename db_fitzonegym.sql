/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 8.0.30 : Database - db_fitzonegym
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_fitzonegym` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `db_fitzonegym`;

/*Table structure for table `tb_kota` */

DROP TABLE IF EXISTS `tb_kota`;

CREATE TABLE `tb_kota` (
  `id_kota` int NOT NULL AUTO_INCREMENT,
  `nama_kota` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_kota`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_kota` */

insert  into `tb_kota`(`id_kota`,`nama_kota`) values 
(1,'Denpasar'),
(2,'Singaraja'),
(3,'Negara'),
(4,'Tabanan'),
(5,'Waingapu'),
(13,'Mataram');

/*Table structure for table `tb_member` */

DROP TABLE IF EXISTS `tb_member`;

CREATE TABLE `tb_member` (
  `id_member` int NOT NULL AUTO_INCREMENT,
  `kode_member` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_member` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `membership` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` int NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_daftar` date NOT NULL,
  `status_member` enum('Aktif','Nonaktif') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Aktif',
  PRIMARY KEY (`id_member`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_member` */

insert  into `tb_member`(`id_member`,`kode_member`,`nama_member`,`membership`,`alamat`,`kota`,`email`,`telp`,`tgl_daftar`,`status_member`) values 
(2,'B120','sura alor bot','THN','jalan sidakarya',3,'suralor@gmail.com','0812223334444555','2025-11-01','Nonaktif'),
(4,'b11','kols','THN','lsls',4,'nsnsnsns@gmail.com','0812223334444521','2025-11-11','Nonaktif'),
(9,'A123','naufal papua','THN','jalan tukad batanghari',9,'naufallongor123@gmail.com','0912228181818','2025-11-05','Aktif'),
(11,'B120','sura alor babi longor','THN','sidakarya',5,'loakakak@gmail.com','0812223334444555','2025-09-11','Nonaktif');

/*Table structure for table `tb_membership` */

DROP TABLE IF EXISTS `tb_membership`;

CREATE TABLE `tb_membership` (
  `kode_membership` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_membership` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `durasi_hari` int NOT NULL,
  PRIMARY KEY (`kode_membership`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_membership` */

insert  into `tb_membership`(`kode_membership`,`nama_membership`,`harga`,`durasi_hari`) values 
('BLN','Bulanan',5000000.00,30),
('DAY','Harian',35000.00,1),
('THN','Tahunan',2500000.00,365),
('TRI','TRIWULAN',15000000.00,90);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
