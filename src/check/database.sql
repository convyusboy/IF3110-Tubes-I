-- MySQL dump 10.13  Distrib 5.5.16, for Win32 (x86)
--
-- Host: localhost    Database: ogitu
-- ------------------------------------------------------
-- Server version	5.5.16

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
-- Table structure for table `account_customer`
--

DROP TABLE IF EXISTS `account_customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `account_customer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` char(32) NOT NULL,
  `nama_lengkap` varchar(64) NOT NULL,
  `username` varchar(64) NOT NULL,
  `site_id` smallint(5) unsigned NOT NULL,
  `phone` varchar(20) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `provinsi` varchar(64) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `city` varchar(64) NOT NULL,
  `cc_number` varchar(19) NOT NULL,
  `cc_expires` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account_customer`
--

LOCK TABLES `account_customer` WRITE;
/*!40000 ALTER TABLE `account_customer` DISABLE KEYS */;
/*!40000 ALTER TABLE `account_customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catalog_category`
--

DROP TABLE IF EXISTS `catalog_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catalog_category` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `site_id` varchar(255) NOT NULL,
  `name` varchar(128) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `i_site_id` (`site_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catalog_category`
--

LOCK TABLES `catalog_category` WRITE;
/*!40000 ALTER TABLE `catalog_category` DISABLE KEYS */;
INSERT INTO `catalog_category` VALUES (2,'daging_segar','Daging Segar','semua yang berhubungan dengan Daging Segar'),(3,'buah','Buah-Buahan','semua yang berhubungan dengan Buah Segar'),(4,'sayur','Sayur-sayuran','semua yang berhubungan dengan Sayur Segar'),(5,'pakaian','Pakaian','semua yang berhubungan dengan Pakaian untuk semua usia'),(6,'beras','Beras-Berasan','Semua yang berhubungan dengan perberasan.');
/*!40000 ALTER TABLE `catalog_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catalog_product`
--

DROP TABLE IF EXISTS `catalog_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catalog_product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `quantity` int(10) unsigned NOT NULL DEFAULT '0',
  `price` decimal(15,4) unsigned NOT NULL DEFAULT '0.0000',
  `number_sold` int(10) NOT NULL DEFAULT '0',
  `name` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catalog_product`
--

LOCK TABLES `catalog_product` WRITE;
/*!40000 ALTER TABLE `catalog_product` DISABLE KEYS */;
INSERT INTO `catalog_product` VALUES (1,40,9000.0000,0,'Rojolele','Beras terbaik sepanjang abad.','/image/beras.jpg'),(2,20,8500.0000,0,'Ramos','Beras terbaik sepanjang dekade.','/image/beras.jpg'),(3,40,40000.0000,0,'Daging Sapi','Sapi-sapi terbaik bangsa','/image/daging.jpg'),(4,30,3500.0000,0,'Daging Unta','Unta-unta terbaik bangsa','/image/daging.jpg'),(5,40,5000.0000,0,'Mangga','bukan cuma punten yang bisa menjawab mangga, Ruserba juga bisa.','/image/buah.jpg'),(6,70,32000.0000,0,'Anggur','bukan cuma ada Mangga di Ruserba, anggur juga ada','/image/buah.jpg'),(7,20,6000.0000,0,'Bawang Merah','Ngga sejahat ibu tiri','/image/sayur.jpg'),(8,40,8000.0000,0,'Bawang Bombay','Ngga secupu bawang putih','/image/sayur.jpg'),(9,40,50000.0000,0,'Jaket Gasibu','harga toko, kualitas distro','/image/pakaian.jpg'),(10,40,200000.0000,0,'Gaun Balerina','Ragu juga ada yang mau beli ginian','/image/pakaian.jpg');
/*!40000 ALTER TABLE `catalog_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catalog_product_category`
--

DROP TABLE IF EXISTS `catalog_product_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catalog_product_category` (
  `category_id` mediumint(8) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`category_id`,`product_id`),
  KEY `FK_PRODUCT_ID` (`product_id`),
  CONSTRAINT `FK_PRODUCT_CATEGORY_ID` FOREIGN KEY (`category_id`) REFERENCES `catalog_category` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_PRODUCT_ID` FOREIGN KEY (`product_id`) REFERENCES `catalog_product` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catalog_product_category`
--

LOCK TABLES `catalog_product_category` WRITE;
/*!40000 ALTER TABLE `catalog_product_category` DISABLE KEYS */;
INSERT INTO `catalog_product_category` VALUES (6,1),(6,2),(2,3),(2,4),(3,5),(3,6),(4,7),(4,8),(5,9),(5,10);
/*!40000 ALTER TABLE `catalog_product_category` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-10-28 16:16:08
