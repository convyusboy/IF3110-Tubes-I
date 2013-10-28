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
  `default_shipping_address_id` int(10) unsigned DEFAULT NULL,
  `default_billing_address_id` int(10) unsigned DEFAULT NULL,
  `site_id` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ACCOUNT_CUSTOMER_SHIPPING_ADDRESS` (`default_shipping_address_id`),
  KEY `FK_ACCOUNT_CUSTOMER_BILLING_ADDRESS` (`default_billing_address_id`),
  CONSTRAINT `FK_ACCOUNT_CUSTOMER_BILLING_ADDRESS` FOREIGN KEY (`default_billing_address_id`) REFERENCES `account_customer_address` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_ACCOUNT_CUSTOMER_SHIPPING_ADDRESS` FOREIGN KEY (`default_shipping_address_id`) REFERENCES `account_customer_address` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
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
-- Table structure for table `account_customer_address`
--

DROP TABLE IF EXISTS `account_customer_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `account_customer_address` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) unsigned NOT NULL,
  `phone` varchar(64) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `postcode` varchar(20) NOT NULL,
  `city` varchar(64) NOT NULL,
  `provinsi` varchar(64) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `FK_ACCOUNT_CUSTOMER_ADDRESS_CUSTOMER` (`customer_id`),
  CONSTRAINT `FK_ACCOUNT_CUSTOMER_ADDRESS_CUSTOMER` FOREIGN KEY (`customer_id`) REFERENCES `account_customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account_customer_address`
--

LOCK TABLES `account_customer_address` WRITE;
/*!40000 ALTER TABLE `account_customer_address` DISABLE KEYS */;
/*!40000 ALTER TABLE `account_customer_address` ENABLE KEYS */;
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
  PRIMARY KEY (`id`),
  KEY `i_site_id` (`site_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catalog_category`
--

LOCK TABLES `catalog_category` WRITE;
/*!40000 ALTER TABLE `catalog_category` DISABLE KEYS */;
INSERT INTO `catalog_category` VALUES (6,'beras'),(3,'buah'),(2,'daging_segar'),(5,'pakaian'),(4,'sayur');
/*!40000 ALTER TABLE `catalog_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catalog_category_description`
--

DROP TABLE IF EXISTS `catalog_category_description`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catalog_category_description` (
  `category_id` mediumint(8) unsigned NOT NULL,
  `name` varchar(128) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  PRIMARY KEY (`category_id`),
  CONSTRAINT `catalog_category_description_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `catalog_category` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catalog_category_description`
--

LOCK TABLES `catalog_category_description` WRITE;
/*!40000 ALTER TABLE `catalog_category_description` DISABLE KEYS */;
INSERT INTO `catalog_category_description` VALUES (2,'Daging Segar','semua yang berhubungan dengan Daging Segar'),(3,'Buah-Buahan','semua yang berhubungan dengan Buah Segar'),(4,'Sayur-sayuran','semua yang berhubungan dengan Sayur Segar'),(5,'Pakaian','semua yang berhubungan dengan Pakaian untuk semua usia'),(6,'Beras-Berasan','Semua yang berhubungan dengan perberasan.');
/*!40000 ALTER TABLE `catalog_category_description` ENABLE KEYS */;
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
  `image_base` int(10) unsigned DEFAULT NULL,
  `image_listing` int(10) unsigned DEFAULT NULL,
  `image_thumbnail` int(10) unsigned DEFAULT NULL,
  `price` decimal(15,4) unsigned NOT NULL DEFAULT '0.0000',
  `number_sold` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_CATALOG_PRODUCT_IMAGE_BASE_IMAGE` (`image_base`),
  KEY `FK_CATALOG_PRODUCT_IMAGE_LISTING_IMAGE` (`image_listing`),
  KEY `FK_CATALOG_PRODUCT_IMAGE_THUMBNAIL_IMAGE` (`image_thumbnail`),
  CONSTRAINT `FK_CATALOG_PRODUCT_IMAGE_BASE_IMAGE` FOREIGN KEY (`image_base`) REFERENCES `catalog_product_image` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `FK_CATALOG_PRODUCT_IMAGE_LISTING_IMAGE` FOREIGN KEY (`image_listing`) REFERENCES `catalog_product_image` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `FK_CATALOG_PRODUCT_IMAGE_THUMBNAIL_IMAGE` FOREIGN KEY (`image_thumbnail`) REFERENCES `catalog_product_image` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catalog_product`
--

LOCK TABLES `catalog_product` WRITE;
/*!40000 ALTER TABLE `catalog_product` DISABLE KEYS */;
INSERT INTO `catalog_product` VALUES (1,40,1,1,1,9000.0000,0),(2,20,1,1,1,8500.0000,0),(3,40,2,2,2,40000.0000,0),(4,30,2,2,2,3500.0000,0),(5,40,3,3,3,5000.0000,0),(6,70,3,3,3,32000.0000,0),(7,20,4,4,4,6000.0000,0),(8,40,4,4,4,8000.0000,0),(9,40,5,5,5,50000.0000,0),(10,40,5,5,5,200000.0000,0);
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

--
-- Table structure for table `catalog_product_description`
--

DROP TABLE IF EXISTS `catalog_product_description`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catalog_product_description` (
  `product_id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  PRIMARY KEY (`product_id`),
  CONSTRAINT `catalog_product_description_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `catalog_product` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catalog_product_description`
--

LOCK TABLES `catalog_product_description` WRITE;
/*!40000 ALTER TABLE `catalog_product_description` DISABLE KEYS */;
INSERT INTO `catalog_product_description` VALUES (1,'Rojolele','Beras terbaik sepanjang abad.'),(2,'Ramos','Beras terbaik sepanjang dekade.'),(3,'Daging Sapi','Sapi-sapi terbaik bangsa'),(4,'Daging Unta','Unta-unta terbaik bangsa'),(5,'Mangga','bukan cuma punten yang bisa menjawab mangga, Ruserba juga bisa.'),(6,'Anggur','bukan cuma ada Mangga di Ruserba, anggur juga ada'),(7,'Bawang Merah','Ngga sejahat ibu tiri'),(8,'Bawang Bombay','Ngga secupu bawang putih'),(9,'Jaket Gasibu','harga toko, kualitas distro'),(10,'Gaun Balerina','Ragu juga ada yang mau beli ginian');
/*!40000 ALTER TABLE `catalog_product_description` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catalog_product_image`
--

DROP TABLE IF EXISTS `catalog_product_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catalog_product_image` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `path` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catalog_product_image`
--

LOCK TABLES `catalog_product_image` WRITE;
/*!40000 ALTER TABLE `catalog_product_image` DISABLE KEYS */;
INSERT INTO `catalog_product_image` VALUES (1,'/image/beras'),(2,'/image/daging'),(3,'/image/buah'),(4,'/image/sayur'),(5,'/image/pakaian');
/*!40000 ALTER TABLE `catalog_product_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_authorizenetaim_standard_order`
--

DROP TABLE IF EXISTS `payment_authorizenetaim_standard_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment_authorizenetaim_standard_order` (
  `owner_id` int(10) unsigned NOT NULL,
  `cc_number` varchar(19) NOT NULL,
  `cc_expires` varchar(16) NOT NULL,
  PRIMARY KEY (`owner_id`) USING BTREE,
  CONSTRAINT `payment_authorizenetaim_standard_order_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `account_customer` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_authorizenetaim_standard_order`
--

LOCK TABLES `payment_authorizenetaim_standard_order` WRITE;
/*!40000 ALTER TABLE `payment_authorizenetaim_standard_order` DISABLE KEYS */;
/*!40000 ALTER TABLE `payment_authorizenetaim_standard_order` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-10-28 12:48:38
