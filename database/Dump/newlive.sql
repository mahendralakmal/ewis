-- MySQL dump 10.13  Distrib 5.7.17, for Linux (x86_64)
--
-- Host: localhost    Database: ewis
-- ------------------------------------------------------
-- Server version	5.7.17-0ubuntu0.16.04.1

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
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `brands` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `brands_title_unique` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brands`
--

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
INSERT INTO `brands` VALUES (1,'Lexmark','Printers, Multi-function devices, Related Consumables, Accessories, Options, Solutions........','storage/brands/7s9f5ehAWbBGCst2pISqjQiI1yc7nOSk4cPqopaz.png','1',1,'2017-05-08 04:04:58','2017-05-08 04:04:58'),(2,'Konica Minolta','Copiers, Production Printers, Related Consumables / Supplies, Accessories, Options, Solutions........','storage/brands/wJugdCGlulVALehIjfYA8VFL2WnyVXf736r6J1Zs.png','1',1,'2017-05-08 04:05:34','2017-05-08 04:05:34'),(3,'Ricoh','Copiers, Production Printers, Duplicators, Projectors, Related Consumables / Supplies, Accessories, Options, Solutions........','storage/brands/B5K0LnVNCuGl7aTfjP7Br9sr4tSPOkRpTwozCe7f.png','1',1,'2017-05-08 04:05:52','2017-05-08 04:05:52'),(4,'Catic','Passbook Printers, Related Consumables (i.e. Printer Ribbons)','storage/brands/oJJgOzskGww9BnLiDz4Wciuaqaps4jgjWv5o7ppc.jpeg','1',1,'2017-05-08 04:06:22','2017-05-08 04:06:22');
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `c_brands`
--

DROP TABLE IF EXISTS `c_brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `c_brands` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `clients_branch_id` int(11) NOT NULL,
  `remove` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `c_brands`
--

LOCK TABLES `c_brands` WRITE;
/*!40000 ALTER TABLE `c_brands` DISABLE KEYS */;
INSERT INTO `c_brands` VALUES (1,1,1,1,1,'2017-05-09 11:23:05','2017-05-09 11:23:43'),(2,1,1,1,1,'2017-05-09 11:23:59','2017-05-09 11:25:23'),(3,1,1,1,1,'2017-05-09 11:25:41','2017-05-09 11:27:26'),(4,1,1,1,0,'2017-05-09 11:27:50','2017-05-09 11:27:50'),(5,1,1,2,0,'2017-05-09 11:41:33','2017-05-09 11:41:33'),(6,1,1,3,0,'2017-05-09 11:48:23','2017-05-09 11:48:23'),(7,1,1,4,0,'2017-05-09 11:55:26','2017-05-09 11:55:26'),(8,1,4,4,0,'2017-05-09 11:55:48','2017-05-09 11:55:48'),(9,1,1,5,0,'2017-05-09 12:05:53','2017-05-09 12:05:53'),(10,1,1,6,0,'2017-05-09 12:28:10','2017-05-09 12:28:10'),(11,1,1,7,0,'2017-05-09 12:37:18','2017-05-09 12:37:18'),(12,1,3,7,0,'2017-05-09 12:37:20','2017-05-09 12:37:20'),(13,1,1,8,0,'2017-05-09 12:50:15','2017-05-09 12:50:15'),(14,1,2,8,0,'2017-05-09 12:50:18','2017-05-09 12:50:18'),(15,1,3,10,0,'2017-05-12 07:22:10','2017-05-12 07:22:10'),(16,1,4,10,0,'2017-05-12 07:22:13','2017-05-12 07:22:13'),(17,1,2,10,0,'2017-05-12 07:22:16','2017-05-12 07:22:16'),(18,1,1,10,0,'2017-05-12 07:22:20','2017-05-12 07:22:20');
/*!40000 ALTER TABLE `c_brands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `c_categories`
--

DROP TABLE IF EXISTS `c_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `c_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `clients_branch_id` int(11) NOT NULL,
  `c_brand_id` int(11) NOT NULL,
  `remove` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `c_categories`
--

LOCK TABLES `c_categories` WRITE;
/*!40000 ALTER TABLE `c_categories` DISABLE KEYS */;
INSERT INTO `c_categories` VALUES (1,1,8,1,1,1,'2017-05-09 11:23:20','2017-05-09 11:23:43'),(2,1,8,1,2,1,'2017-05-09 11:24:10','2017-05-09 11:25:23'),(3,1,8,1,3,1,'2017-05-09 11:25:53','2017-05-09 11:27:26'),(4,1,8,1,4,0,'2017-05-09 11:28:03','2017-05-09 11:28:03'),(5,1,8,2,5,0,'2017-05-09 11:41:50','2017-05-09 11:41:50'),(6,1,8,3,6,0,'2017-05-09 11:48:34','2017-05-09 11:48:34'),(7,1,8,4,7,0,'2017-05-09 11:56:01','2017-05-09 11:56:01'),(8,1,1,4,8,0,'2017-05-09 11:56:06','2017-05-09 11:56:06'),(9,1,8,5,9,1,'2017-05-09 12:06:11','2017-05-12 06:20:58'),(10,1,8,6,10,0,'2017-05-09 12:28:23','2017-05-09 12:28:23'),(11,1,8,7,11,0,'2017-05-09 12:37:35','2017-05-09 12:37:35'),(12,1,12,7,12,0,'2017-05-09 12:37:40','2017-05-09 12:37:40'),(13,1,8,8,13,0,'2017-05-09 12:50:31','2017-05-09 12:50:31'),(14,1,4,8,14,0,'2017-05-09 12:50:35','2017-05-09 12:50:35'),(15,1,10,10,15,0,'2017-05-12 07:22:42','2017-05-12 07:22:42'),(16,1,8,10,18,0,'2017-05-12 07:22:57','2017-05-12 07:22:57'),(17,1,1,10,16,0,'2017-05-12 07:23:01','2017-05-12 07:23:01'),(18,1,4,10,17,0,'2017-05-12 07:23:18','2017-05-12 07:23:18');
/*!40000 ALTER TABLE `c_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_id` int(10) unsigned NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `category_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_category_key_unique` (`category_key`),
  KEY `categories_brand_id_index` (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Consumables',4,'Impact Printer Ribbon Cartridges','storage/categories/WlGxBlfDMnnWj3kcHgLRZa41xsYaTCbdejplSGJn.jpeg','1',1,'Consumables_4','2017-05-08 04:11:38','2017-05-08 04:11:38'),(2,'Photocopiers',2,'Monochrome / Colour Copiers','storage/categories/re0UkEIiEiQ4jMNah3Vk3qIs0PShS57MMmZ5FUf5.jpeg','1',1,'Photocopiers_2','2017-05-08 04:13:20','2017-05-08 04:13:20'),(3,'Production Printers',2,'Monochrome / Colour Production Printers','storage/categories/eYHgExqqBJUX163mSCJomEAzAvEhCeGWzLBw9qqB.jpeg','1',1,'Production Printers_2','2017-05-08 04:13:48','2017-05-08 04:13:48'),(4,'Consumables',2,'Toners, Developers, Drums','storage/categories/CvjmzIxIKOGCWFy7VX5a4Ae3KV5mHW9OfoQg3WhD.jpeg','1',1,'Consumables_2','2017-05-08 04:14:56','2017-05-08 04:14:56'),(5,'Options / Accessories',2,'Paper handling options (i.e. trays, bins, finishers, duplex units, etc), Connectivity (i.e. network cards, etc) etc','storage/categories/bMEx3aGOyTVW8gsLGbJ92ZClhztXfKy5vyB5VtK4.jpeg','1',1,'Options / Accessories_2','2017-05-08 04:15:28','2017-05-08 04:15:28'),(6,'Printers',1,'Monochrome / Colour Printers','storage/categories/L1PNykg3UQflj6vad2913oX8MvIC7nVoBmfVDyAz.png','1',1,'Printers_1','2017-05-08 04:15:55','2017-05-08 04:15:55'),(7,'Multi-function Printers',1,'Monochrome / Colour Multi-function Printers','storage/categories/o6YbRArc224bVo8LlcbMg8sFHtFDzOiQEh7AyLK2.jpeg','1',1,'Multi-function Printers_1','2017-05-08 04:16:27','2017-05-08 04:16:27'),(8,'Consumables',1,'Toners, Ink-cartridges, Ribbons, Imaging Units......','storage/categories/3a3fHECQjjBSkndQU5gdgXOojMgWiF7qfVuoAFJV.jpeg','1',1,'Consumables_1','2017-05-08 04:16:55','2017-05-08 04:16:55'),(9,'Options / Accessories',1,'Paper handling options (i.e. trays, bins, finishers, duplex units, etc), Connectivity (i.e. network cards, etc) etc','storage/categories/o0syjiJA10R8RRg9yO4o4dYuaAzt2Pf6eb73N2nF.png','1',1,'Options / Accessories_1','2017-05-08 04:17:41','2017-05-08 04:17:41'),(10,'Photocopiers',3,'Monochrome / Colour Copiers....','storage/categories/8eqCFNgjXV3jMglXdLtL833sMO34y4cBCZt8s7hl.jpeg','1',1,'Photocopiers_3','2017-05-08 04:19:43','2017-05-08 04:19:43'),(11,'Production Printers',3,'Monochrome / Colour ProductionPprinters','storage/categories/8raya3MeIXeWfcHLbEGh8xoN71r77HptF0wue2nE.jpeg','1',1,'Production Printers_3','2017-05-08 04:20:06','2017-05-08 04:20:06'),(12,'Consumables',3,'Toners, Developer, Drums, etc','storage/categories/twPwBcReceQ4O6QnTGrpwiiWQ8rYf7mJw1swMCS2.jpeg','1',1,'Consumables_3','2017-05-08 04:20:32','2017-05-08 04:20:32'),(13,'Options / Accessories',3,'Paper handling options (i.e. trays, bins, finishers, duplex units, etc), Connectivity (i.e. network cards, etc) etc','storage/categories/tD1QJYicV3peFjRTs0aGk5MQZSJnZ0dlEhuXjPaj.jpeg','1',1,'Options / Accessories_3','2017-05-08 04:20:58','2017-05-08 04:20:58'),(14,'Projectors',3,'Entry, Standard, Desk Edge, Short Throw, Ultra Short Throw, High End Projectors','storage/categories/B3ay6hffO84lOgT6ssKwHnig1tmJ0TBp2An1U5ci.jpeg','1',1,'Projectors_3','2017-05-08 04:21:21','2017-05-08 04:21:21'),(15,'Duplicators',3,'Digital Duplicators','storage/categories/1f4XrSf8ye5qcuIC6Vc3n6iNPJqt3ENMwSCvV5Jw.jpeg','1',1,'Duplicators_3','2017-05-08 04:22:25','2017-05-08 04:22:25');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client__products`
--

DROP TABLE IF EXISTS `client__products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client__products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `c_category_id` int(11) NOT NULL,
  `clients_branch_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `special_price` decimal(11,2) NOT NULL,
  `remove` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client__products`
--

LOCK TABLES `client__products` WRITE;
/*!40000 ALTER TABLE `client__products` DISABLE KEYS */;
INSERT INTO `client__products` VALUES (1,1,2,2,1,1,8200.00,1,'2017-05-09 11:24:37','2017-05-09 11:25:23'),(2,1,2,2,1,5,27500.00,1,'2017-05-09 11:24:51','2017-05-09 11:25:23'),(3,1,2,2,1,7,6000.00,1,'2017-05-09 11:25:11','2017-05-09 11:25:23'),(4,1,3,3,1,1,8250.00,1,'2017-05-09 11:26:10','2017-05-09 11:27:26'),(5,1,4,4,1,10,65000.00,0,'2017-05-09 11:29:15','2017-05-09 11:29:15'),(6,1,4,4,1,11,8000.00,0,'2017-05-09 11:33:04','2017-05-09 11:33:04'),(7,1,4,4,1,12,26000.00,0,'2017-05-09 11:33:28','2017-05-09 11:33:28'),(8,1,4,4,1,1,6000.00,0,'2017-05-09 11:33:54','2017-05-09 11:33:54'),(9,1,5,5,2,6,9850.00,0,'2017-05-09 11:42:54','2017-05-09 11:42:54'),(10,1,5,5,2,7,4500.00,0,'2017-05-09 11:43:31','2017-05-09 11:43:31'),(11,1,5,5,2,1,6200.00,0,'2017-05-09 11:43:57','2017-05-09 11:43:57'),(12,1,5,5,2,5,15500.00,0,'2017-05-09 11:44:27','2017-05-09 11:44:27'),(13,1,6,6,3,6,10120.00,0,'2017-05-09 11:49:09','2017-05-09 11:49:09'),(14,1,6,6,3,7,3800.00,0,'2017-05-09 11:49:35','2017-05-09 11:49:35'),(15,1,6,6,3,5,15000.00,0,'2017-05-09 11:50:09','2017-05-09 11:50:09'),(16,1,6,6,3,8,1950.00,0,'2017-05-09 11:50:30','2017-05-09 11:50:30'),(17,1,6,6,3,1,6200.00,0,'2017-05-09 11:50:50','2017-05-09 11:50:50'),(18,1,7,7,4,8,1800.00,0,'2017-05-09 11:56:31','2017-05-09 11:56:31'),(19,1,7,7,4,5,16500.00,0,'2017-05-09 11:56:50','2017-05-09 11:56:50'),(20,1,7,7,4,1,7000.00,0,'2017-05-09 11:57:10','2017-05-09 11:57:10'),(21,1,8,8,4,13,1950.00,0,'2017-05-09 11:57:23','2017-05-09 11:57:23'),(22,1,9,9,5,5,13750.00,1,'2017-05-09 12:06:41','2017-05-12 06:20:58'),(23,1,9,9,5,1,6200.00,1,'2017-05-09 12:06:59','2017-05-12 06:20:58'),(24,1,9,9,5,7,4500.00,1,'2017-05-09 12:07:25','2017-05-12 06:20:58'),(25,1,9,9,5,6,10450.00,1,'2017-05-09 12:22:41','2017-05-12 06:20:58'),(26,1,10,10,6,8,1850.00,0,'2017-05-09 12:28:52','2017-05-09 12:28:52'),(27,1,10,10,6,9,5500.00,0,'2017-05-09 12:29:09','2017-05-09 12:29:09'),(28,1,11,11,7,5,17000.00,0,'2017-05-09 12:38:07','2017-05-09 12:38:07'),(29,1,13,13,8,5,16500.00,0,'2017-05-09 12:50:57','2017-05-09 12:50:57'),(30,1,13,13,8,6,13500.00,0,'2017-05-09 12:51:15','2017-05-09 12:51:15'),(31,1,14,14,8,18,13500.00,0,'2017-05-09 12:51:44','2017-05-09 12:51:44'),(32,1,14,14,8,19,13500.00,0,'2017-05-09 12:52:03','2017-05-09 12:52:03'),(33,1,14,14,8,21,27000.00,0,'2017-05-09 12:52:37','2017-05-09 12:52:37'),(34,1,14,14,8,22,27000.00,0,'2017-05-09 12:52:55','2017-05-09 12:52:55'),(35,1,14,14,8,23,27000.00,0,'2017-05-09 12:53:08','2017-05-09 12:53:08'),(36,1,14,14,8,20,24000.00,0,'2017-05-10 11:03:35','2017-05-10 11:03:35'),(37,1,12,12,7,25,19000.00,0,'2017-05-12 03:28:21','2017-05-12 03:28:21'),(38,1,15,15,10,14,90000.00,0,'2017-05-12 07:23:56','2017-05-12 07:23:56'),(39,1,16,17,10,13,3000.00,0,'2017-05-12 07:24:13','2017-05-12 07:24:13'),(40,1,17,18,10,19,10000.00,0,'2017-05-12 07:24:31','2017-05-12 07:24:31'),(41,1,18,16,10,9,7000.00,0,'2017-05-12 07:24:49','2017-05-12 07:24:49'),(42,1,18,16,10,6,15000.00,0,'2017-05-12 07:25:07','2017-05-12 07:25:07'),(43,1,18,16,10,12,50000.00,0,'2017-05-12 07:25:25','2017-05-12 07:25:25');
/*!40000 ALTER TABLE `client__products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approval` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `clients_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,1,'The National School of Business Management (NSBM)','NSBM Green University Town\r\nMahenwaththa, Pitipana,\r\nHomagama,\r\nSri Lanka.','+94 115 445 000','inquiries@nsbm.lk','storage/images/c6d975GkWsDMFgDiJGyLEpFhqmFuTgIsxgYg4YH5.png','#d1d1d1',1,0,'2017-05-08 05:37:06','2017-05-09 12:45:36'),(2,1,'Allianz Insurance Lanka Ltd.','No. 46/10, Nawam Mawatha, Colombo 02.','+94 112 300 400','info@allianz.lk','storage/images/He4fV1PKS2dF6NOxfm3E5X6oK8asqPJVlHTPvnhx.jpeg','#0909ff',1,0,'2017-05-08 05:45:31','2017-05-09 03:30:27'),(3,1,'Commercial Bank of Ceylon','Commercial House, No 21, Sir Razik Fareed Mawatha, P.O. Box 856, Colombo 1, Sri Lanka.','+94 11 2486000 / +94 11 4486000 / +94 11 7486000','info@combank.net','storage/images/iw7ZynoYrkrrgaUcKoNULyzeeRicDP0TxmAwbXT4.png','#7979ff',1,0,'2017-05-08 05:47:56','2017-05-09 11:34:29'),(4,1,'Continental Insurance Lanka Limited.','No.79, \r\nDr. C. W. W. Kannangara Mawatha,\r\nColombo 07, \r\nSri Lanka.','+94 11 5 200300 (General) / +94 11 5 200200 (Hotline)','info@cilanka.com','storage/images/SFhWdkct2GvA3yeqg8LokwFgPWpRl182Jz3bMLob.png','#ea133e',1,0,'2017-05-08 05:49:35','2017-05-09 11:44:49'),(5,1,'DFCC Bank PLC.','73/5, Galle Road, Colombo 3.\r\nSri Lanka.','+94 011 244 2442','info@dfccbank.com','storage/images/cbzP4bW1yRsdTI0kMCLakUoDi4teqJiug9gzGgMH.png','#f30c3a',1,0,'2017-05-08 05:50:24','2017-05-09 11:51:21'),(6,1,'Laugfs Eco Sri (Pvt) Ltd.','No: 101, 5th floor,\r\nMaya Avenue,\r\nColombo 06,\r\nSri Lanka.','+94 11 7 770 770','info@ecosri.lk','storage/images/6ISSLRiGhEnuRMEtoEeuUfTKFh6JB6oeHhDkf9Xa.png','#adadad',1,0,'2017-05-08 05:51:53','2017-05-09 12:05:10'),(7,1,'Cargills Foods Company (Pvt) Ltd.','No. 111, Sri Wickrama Mawatha, Colombo 15,\r\nSri Lanka.','+94 011 2 546 667-8','info@cargillsceylon.com','storage/images/enuEXLSwS2rjO0YNl92yBvQIGLf8olqooTYoQJ2R.png','#ffffff',1,0,'2017-05-08 05:52:39','2017-05-09 12:23:11'),(8,1,'Royal Institute of Colombo','No 189, \r\nHavelock Road,\r\nColombo 05, \r\nSri Lanka.','+94 (11) 255 6329 / +94 (77) 235 5000','info@ric.lk','storage/images/bnPiv0t2kLp7LYqql8v1W9NrnZUG1r2CoqaGmjAv.png','#7582f7',1,0,'2017-05-08 05:57:22','2017-05-09 12:29:58'),(10,1,'E-W Information Systems Limited','441/7, \r\n2nd Lane, \r\nCotta Road, \r\nRajagiriya,\r\nSri Lanka','+94 117 520520','info@ewisl.net','storage/images/MvT7HRVjlyHuwoD8OUaPbDb4qfs4xUUpxGrsd8Py.png','#b1b1b1',1,0,'2017-05-12 07:20:14','2017-05-17 06:59:58'),(11,1,'South Asia Gateway Terminals (Pvt.) Ltd.','P.O Box 141, \r\nColombo, \r\nSri Lanka.','+94 11 2457500','info@sagt.com.lk','storage/images/fjfvBpBBzigHRF3nHryBL99Jwdw5TqBM1rUfo7aw.jpeg','#ffffff',0,0,'2017-05-17 06:44:48','2017-05-17 06:46:02');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients_branches`
--

DROP TABLE IF EXISTS `clients_branches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients_branches` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `activation` tinyint(1) NOT NULL DEFAULT '0',
  `client_id` int(10) unsigned NOT NULL,
  `agent_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `clients_branches_client_id_index` (`client_id`),
  KEY `clients_branches_agent_id_index` (`agent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients_branches`
--

LOCK TABLES `clients_branches` WRITE;
/*!40000 ALTER TABLE `clients_branches` DISABLE KEYS */;
INSERT INTO `clients_branches` VALUES (1,'Head Office','No. 46/10, Nawam Mawatha, Colombo 02,\r\nSri Lanka.','+94 112 300 400','info@allianz.lk',0,2,5,'2017-05-09 03:32:52','2017-05-09 03:39:04'),(2,'Head Office','Commercial House, \r\nNo 21, Sir Razik Fareed Mawatha, \r\nP.O. Box 856, Colombo 1, \r\nSri Lanka.','+94 11 2486000 / +94 11 4486000 / +94 11 7486000 / +94 11 5486000','info@combank.net',0,3,5,'2017-05-09 11:37:33','2017-05-09 11:41:08'),(3,'Head Office','No.79, \r\nDr. C. W. W. Kannangara Mawatha,\r\nColombo 07, \r\nSri Lanka.','+94 11 5 200300 (General) / +94 11 5 200200 (Hotline)','info@cilanka.com',0,4,4,'2017-05-09 11:46:12','2017-05-09 11:48:05'),(4,'Head Office','73/5, \r\nGalle Road, \r\nColombo 3.\r\nSri Lanka.','+94 112 442442','info@dfccbank.com',0,5,4,'2017-05-09 11:53:31','2017-05-09 11:55:06'),(5,'Head Office','No: 101,\r\nMaya Avenue,\r\nColombo 06,\r\nSri Lanka.','+94 115 566222','info@laugfs.lk',0,6,12,'2017-05-09 11:59:34','2017-05-09 12:05:38'),(6,'Millers Limited','No. 121,\r\nBiyagama Road,\r\nKelaniya,\r\nSri Lanka.','+94 112 904400','millers@millerslimited.com',0,7,12,'2017-05-09 12:26:12','2017-05-09 12:27:56'),(7,'Head Office','No 189, \r\nHavelock Road,\r\nColombo 05, \r\nSri Lanka.','+94 112 556 329 / +94 772 355 000','info@ric.lk',0,8,21,'2017-05-09 12:31:57','2017-05-09 12:37:06'),(8,'Head Office','Mahenwaththa, Pitipana,\r\nHomagama,\r\nSri Lanka.','+94 115 445100','inquiries@nsbm.lk',0,1,8,'2017-05-09 12:47:12','2017-05-09 12:50:03'),(9,'Head Office','fgsdgfsd','dssdff','sjdhsd@sdssd.lk',1,1,NULL,'2017-05-12 06:18:58','2017-05-15 08:36:49'),(10,'Head Office','441/7, \r\n2nd Lane, \r\nCotta Road, \r\nRajagiriya,\r\nSri Lanka.','+94 117 520520','info@ewisl.net',0,10,4,'2017-05-12 07:21:26','2017-05-18 13:17:19'),(11,'Head Office','TEST','+94 112 300 400','info@allianz.lk',1,1,NULL,'2017-05-17 06:56:47','2017-05-17 07:03:07'),(12,'Head Office','ws','sd','info@allianz.lk',1,1,NULL,'2017-05-17 07:14:35','2017-05-17 07:15:01');
/*!40000 ALTER TABLE `clients_branches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientusers`
--

DROP TABLE IF EXISTS `clientusers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientusers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `client_id` int(10) unsigned NOT NULL,
  `clients_branch_id` int(10) unsigned NOT NULL,
  `cp_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp_designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp_telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_user` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `clientusers_user_id_index` (`user_id`),
  KEY `clientusers_client_id_index` (`client_id`),
  KEY `clientusers_clients_branch_id_index` (`clients_branch_id`),
  KEY `clientusers_created_user_index` (`created_user`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientusers`
--

LOCK TABLES `clientusers` WRITE;
/*!40000 ALTER TABLE `clientusers` DISABLE KEYS */;
INSERT INTO `clientusers` VALUES (1,16,2,1,'Mr. Suchintha Perera','Manager - IT','+94 773 630985','SuchinthaP@allianz.lk',1,'2017-05-09 03:38:29','2017-05-09 03:38:29'),(2,17,3,2,'Mr. Bhathika Ranaweera','Procurement Executive','+94 112 486286','bhathika_ranaweera@combank.net',1,'2017-05-09 11:40:44','2017-05-09 11:40:44'),(3,18,4,3,'Mr. Pasin Jeyakrishna','Procurement Executive','+94 777 560735','pasinj@cilanka.com',1,'2017-05-09 11:47:48','2017-05-09 11:47:48'),(4,19,5,4,'Mr. Delan Mendis','Procurement Executive','+94 712 798853','delan.mendis@dfccbank.com',1,'2017-05-09 11:54:53','2017-05-09 11:54:53'),(5,14,6,5,'Mr. Nalinda Damian','Manager - Logistics','+94 773 139285','nalinda.damion@laugfs.lk',1,'2017-05-09 12:01:10','2017-05-09 12:01:10'),(6,15,7,6,'Ms. Dineshka Keragala','Category Manager - Retail Procurement','+94 774 461394','dineshka.k@cargillsceylon.com',1,'2017-05-09 12:27:43','2017-05-09 12:27:43'),(7,20,8,7,'Jerome Dias','Manager - IT','+94 716 280357','jerome@ric.lk',1,'2017-05-09 12:33:42','2017-05-09 12:33:42'),(8,22,1,8,'Rangika Lakmini Balasuriya','Trainee Management Assistant','111111111','rangika.l@nsbm.lk',1,'2017-05-09 12:49:02','2017-05-09 12:49:02'),(9,13,1,8,'Mr. Gayan Patirana','Accountant','222222222','gayan@nsbm.lk',1,'2017-05-09 12:49:46','2017-05-09 12:49:46'),(10,24,10,10,'Harsha Samarajiwa','Chief Operating Officer','+94117496000','harsha.samarajiwa@gmail.com',1,'2017-05-12 07:27:17','2017-05-17 08:09:15');
/*!40000 ALTER TABLE `clientusers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `designations`
--

DROP TABLE IF EXISTS `designations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `designations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `designations_designation_unique` (`designation`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `designations`
--

LOCK TABLES `designations` WRITE;
/*!40000 ALTER TABLE `designations` DISABLE KEYS */;
INSERT INTO `designations` VALUES (1,'Super Admin',0,'1','2017-05-08 04:03:01','2017-05-08 04:03:01'),(2,'Client',0,'1','2017-05-08 04:03:01','2017-05-08 04:03:01'),(3,'Sector Head - Banking & Finance',0,'1','2017-05-08 05:11:10','2017-05-08 05:11:10'),(4,'Customer Account Manager',0,'1','2017-05-08 05:11:19','2017-05-08 05:11:19'),(5,'Procurement / Logistics Executive',0,'1','2017-05-08 05:11:28','2017-05-08 05:11:28'),(6,'DGM - Sales & Marketing',0,'1','2017-05-08 05:11:32','2017-05-08 05:11:32'),(7,'AGM - Procurement & Logistics',0,'1','2017-05-08 05:11:44','2017-05-08 05:11:44'),(8,'Sector Head - Corporate',0,'1','2017-05-08 05:11:48','2017-05-08 05:11:48'),(9,'Sector Head - Government',0,'1','2017-05-08 05:11:55','2017-05-08 05:11:55'),(10,'Sales Executive',0,'1','2017-05-08 05:12:10','2017-05-08 05:12:10'),(11,'Customer Support Executive',0,'1','2017-05-08 05:12:22','2017-05-08 05:12:22'),(12,'Chief Operating Officer',0,'1','2017-05-08 05:13:32','2017-05-08 05:13:32');
/*!40000 ALTER TABLE `designations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=143 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (128,'2014_10_12_000000_create_users_table',1),(129,'2014_10_12_100000_create_password_resets_table',1),(130,'2017_01_24_173536_create_category_table',1),(131,'2017_01_24_173716_create_brands_table',1),(132,'2017_01_24_173753_create_products_table',1),(133,'2017_02_03_054157_create_user_profile_table',1),(134,'2017_02_10_191524_create_designations_table',1),(135,'2017_02_12_093519_create_client_profile_table',1),(136,'2017_02_22_053255_create_p__orders_table',1),(137,'2017_02_22_075343_create_client_users_table',1),(138,'2017_03_01_072933_create_clients_product_table',1),(139,'2017_03_02_115830_create_privileges_table',1),(140,'2017_03_03_061544_create_client_assign_brands_table',1),(141,'2017_03_03_073840_create_client_assign_categories_table',1),(142,'2017_04_25_162932_create_clients_branches_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `p__orders`
--

DROP TABLE IF EXISTS `p__orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `p__orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `clients_branch_id` int(11) NOT NULL,
  `bucket` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_cp` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` text CHARACTER SET utf8mb4,
  `del_branch` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_tp` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_notes` text COLLATE utf8mb4_unicode_ci,
  `cp_notes` text COLLATE utf8mb4_unicode_ci,
  `agent_id` int(11) NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `p__orders`
--

LOCK TABLES `p__orders` WRITE;
/*!40000 ALTER TABLE `p__orders` DISABLE KEYS */;
INSERT INTO `p__orders` VALUES (1,'2017-05-12 07:14:16','2017-05-12 07:52:14',3,'O:10:\"App\\Bucket\":3:{s:5:\"items\";a:3:{s:8:\"E260A11P\";a:3:{s:3:\"qty\";s:1:\"1\";s:5:\"price\";d:21500;s:4:\"item\";O:11:\"App\\Product\":24:{s:11:\"\0*\0fillable\";a:10:{i:0;s:7:\"part_no\";i:1;s:4:\"name\";i:2;s:11:\"description\";i:3;s:11:\"category_id\";i:4;s:5:\"image\";i:5;s:13:\"default_price\";i:6;s:7:\"user_id\";i:7;s:6:\"status\";i:8;s:3:\"vat\";i:9;s:9:\"vat_apply\";}s:13:\"\0*\0connection\";N;s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:6;s:7:\"part_no\";s:8:\"E260A11P\";s:4:\"name\";s:47:\"E260, E360, E460 Return Program Toner Cartridge\";s:11:\"description\";s:75:\"3,500 standard pages Declared yield value in accordance with ISO/IEC 19752.\";s:11:\"category_id\";i:8;s:5:\"image\";s:62:\"storage/products/FcQ64rOviVsHAjQuhj1QNAB15Xna7rK8S5C79Hzu.jpeg\";s:13:\"default_price\";s:8:\"21500.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:0;s:3:\"vat\";N;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-08 04:41:01\";s:10:\"updated_at\";s:19:\"2017-05-08 04:41:01\";}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:6;s:7:\"part_no\";s:8:\"E260A11P\";s:4:\"name\";s:47:\"E260, E360, E460 Return Program Toner Cartridge\";s:11:\"description\";s:75:\"3,500 standard pages Declared yield value in accordance with ISO/IEC 19752.\";s:11:\"category_id\";i:8;s:5:\"image\";s:62:\"storage/products/FcQ64rOviVsHAjQuhj1QNAB15Xna7rK8S5C79Hzu.jpeg\";s:13:\"default_price\";s:8:\"21500.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:0;s:3:\"vat\";N;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-08 04:41:01\";s:10:\"updated_at\";s:19:\"2017-05-08 04:41:01\";}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:9:\"\0*\0events\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}i:3070166;a:3:{s:3:\"qty\";s:1:\"1\";s:5:\"price\";d:2400;s:4:\"item\";O:11:\"App\\Product\":24:{s:11:\"\0*\0fillable\";a:10:{i:0;s:7:\"part_no\";i:1;s:4:\"name\";i:2;s:11:\"description\";i:3;s:11:\"category_id\";i:4;s:5:\"image\";i:5;s:13:\"default_price\";i:6;s:7:\"user_id\";i:7;s:6:\"status\";i:8;s:3:\"vat\";i:9;s:9:\"vat_apply\";}s:13:\"\0*\0connection\";N;s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:8;s:7:\"part_no\";s:7:\"3070166\";s:4:\"name\";s:37:\"Standard Yield Black Re-inking Ribbon\";s:11:\"description\";s:142:\"Dot-matrix Printer Ribbon. 4 million characters @ draft 10 pitch. Compatible with Forms Printer 23xx series, 24xx series, 25xx / 25xx+ series.\";s:11:\"category_id\";i:8;s:5:\"image\";s:62:\"storage/products/x02so39MGET1DebwCNEA4gBjv3Qjujw8tAWWjbRG.jpeg\";s:13:\"default_price\";s:7:\"2400.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:1;s:3:\"vat\";d:15;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-08 04:42:47\";s:10:\"updated_at\";s:19:\"2017-05-08 04:42:47\";}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:8;s:7:\"part_no\";s:7:\"3070166\";s:4:\"name\";s:37:\"Standard Yield Black Re-inking Ribbon\";s:11:\"description\";s:142:\"Dot-matrix Printer Ribbon. 4 million characters @ draft 10 pitch. Compatible with Forms Printer 23xx series, 24xx series, 25xx / 25xx+ series.\";s:11:\"category_id\";i:8;s:5:\"image\";s:62:\"storage/products/x02so39MGET1DebwCNEA4gBjv3Qjujw8tAWWjbRG.jpeg\";s:13:\"default_price\";s:7:\"2400.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:1;s:3:\"vat\";d:15;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-08 04:42:47\";s:10:\"updated_at\";s:19:\"2017-05-08 04:42:47\";}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:9:\"\0*\0events\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:8:\"E260X22G\";a:3:{s:3:\"qty\";s:1:\"2\";s:5:\"price\";d:11000;s:4:\"item\";O:11:\"App\\Product\":24:{s:11:\"\0*\0fillable\";a:10:{i:0;s:7:\"part_no\";i:1;s:4:\"name\";i:2;s:11:\"description\";i:3;s:11:\"category_id\";i:4;s:5:\"image\";i:5;s:13:\"default_price\";i:6;s:7:\"user_id\";i:7;s:6:\"status\";i:8;s:3:\"vat\";i:9;s:9:\"vat_apply\";}s:13:\"\0*\0connection\";N;s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:7;s:7:\"part_no\";s:8:\"E260X22G\";s:4:\"name\";s:53:\"E260, E360, E46x, X264, X36x, X46x Photoconductor Kit\";s:11:\"description\";s:30:\"30,000 page Photoconductor Kit\";s:11:\"category_id\";i:8;s:5:\"image\";s:62:\"storage/products/jgIahVBWxzsHKC6pQY2vLMbBYMuxtFXneuYn1hBL.jpeg\";s:13:\"default_price\";s:7:\"5500.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:0;s:3:\"vat\";N;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-08 04:41:52\";s:10:\"updated_at\";s:19:\"2017-05-08 04:41:52\";}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:7;s:7:\"part_no\";s:8:\"E260X22G\";s:4:\"name\";s:53:\"E260, E360, E46x, X264, X36x, X46x Photoconductor Kit\";s:11:\"description\";s:30:\"30,000 page Photoconductor Kit\";s:11:\"category_id\";i:8;s:5:\"image\";s:62:\"storage/products/jgIahVBWxzsHKC6pQY2vLMbBYMuxtFXneuYn1hBL.jpeg\";s:13:\"default_price\";s:7:\"5500.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:0;s:3:\"vat\";N;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-08 04:41:52\";s:10:\"updated_at\";s:19:\"2017-05-08 04:41:52\";}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:9:\"\0*\0events\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}}s:8:\"totalQty\";i:4;s:10:\"totalPrice\";d:34900;}','Mr. Pasin Jeyakrishna',NULL,'Head Office','+94 777 560735',NULL,NULL,4,'P'),(2,'2017-05-12 07:28:47','2017-05-12 07:52:18',10,'O:10:\"App\\Bucket\":3:{s:5:\"items\";a:1:{i:417374;a:3:{s:3:\"qty\";s:1:\"1\";s:5:\"price\";d:100000;s:4:\"item\";O:11:\"App\\Product\":24:{s:11:\"\0*\0fillable\";a:10:{i:0;s:7:\"part_no\";i:1;s:4:\"name\";i:2;s:11:\"description\";i:3;s:11:\"category_id\";i:4;s:5:\"image\";i:5;s:13:\"default_price\";i:6;s:7:\"user_id\";i:7;s:6:\"status\";i:8;s:3:\"vat\";i:9;s:9:\"vat_apply\";}s:13:\"\0*\0connection\";N;s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:14;s:7:\"part_no\";s:6:\"417374\";s:4:\"name\";s:8:\"MP 2014D\";s:11:\"description\";s:23:\"Entry Level Photocopier\";s:11:\"category_id\";i:10;s:5:\"image\";s:62:\"storage/products/is2Q7GjgOiItpEQvdE3KuyS06T3RF8qBYhbUMX72.jpeg\";s:13:\"default_price\";s:9:\"100000.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:1;s:3:\"vat\";d:15;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-08 04:50:38\";s:10:\"updated_at\";s:19:\"2017-05-08 04:50:38\";}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:14;s:7:\"part_no\";s:6:\"417374\";s:4:\"name\";s:8:\"MP 2014D\";s:11:\"description\";s:23:\"Entry Level Photocopier\";s:11:\"category_id\";i:10;s:5:\"image\";s:62:\"storage/products/is2Q7GjgOiItpEQvdE3KuyS06T3RF8qBYhbUMX72.jpeg\";s:13:\"default_price\";s:9:\"100000.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:1;s:3:\"vat\";d:15;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-08 04:50:38\";s:10:\"updated_at\";s:19:\"2017-05-08 04:50:38\";}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:9:\"\0*\0events\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}}s:8:\"totalQty\";i:1;s:10:\"totalPrice\";d:100000;}','Harsha Samarajiwa',NULL,'Head Office','+94 773 951130',NULL,NULL,1,'OP'),(3,'2017-05-12 07:29:11','2017-05-12 08:05:46',10,'O:10:\"App\\Bucket\":3:{s:5:\"items\";a:1:{i:417374;a:3:{s:3:\"qty\";s:1:\"1\";s:5:\"price\";d:100000;s:4:\"item\";O:11:\"App\\Product\":24:{s:11:\"\0*\0fillable\";a:10:{i:0;s:7:\"part_no\";i:1;s:4:\"name\";i:2;s:11:\"description\";i:3;s:11:\"category_id\";i:4;s:5:\"image\";i:5;s:13:\"default_price\";i:6;s:7:\"user_id\";i:7;s:6:\"status\";i:8;s:3:\"vat\";i:9;s:9:\"vat_apply\";}s:13:\"\0*\0connection\";N;s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:14;s:7:\"part_no\";s:6:\"417374\";s:4:\"name\";s:8:\"MP 2014D\";s:11:\"description\";s:23:\"Entry Level Photocopier\";s:11:\"category_id\";i:10;s:5:\"image\";s:62:\"storage/products/is2Q7GjgOiItpEQvdE3KuyS06T3RF8qBYhbUMX72.jpeg\";s:13:\"default_price\";s:9:\"100000.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:1;s:3:\"vat\";d:15;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-08 04:50:38\";s:10:\"updated_at\";s:19:\"2017-05-08 04:50:38\";}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:14;s:7:\"part_no\";s:6:\"417374\";s:4:\"name\";s:8:\"MP 2014D\";s:11:\"description\";s:23:\"Entry Level Photocopier\";s:11:\"category_id\";i:10;s:5:\"image\";s:62:\"storage/products/is2Q7GjgOiItpEQvdE3KuyS06T3RF8qBYhbUMX72.jpeg\";s:13:\"default_price\";s:9:\"100000.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:1;s:3:\"vat\";d:15;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-08 04:50:38\";s:10:\"updated_at\";s:19:\"2017-05-08 04:50:38\";}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:9:\"\0*\0events\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}}s:8:\"totalQty\";i:1;s:10:\"totalPrice\";d:100000;}','Harsha Samarajiwa',NULL,'Head Office','+94773951130',NULL,NULL,1,'C'),(4,'2017-05-12 10:14:52','2017-05-12 11:36:32',10,'O:10:\"App\\Bucket\":3:{s:5:\"items\";a:2:{s:6:\"60201A\";a:3:{s:3:\"qty\";s:1:\"2\";s:5:\"price\";d:5000;s:4:\"item\";O:11:\"App\\Product\":24:{s:11:\"\0*\0fillable\";a:10:{i:0;s:7:\"part_no\";i:1;s:4:\"name\";i:2;s:11:\"description\";i:3;s:11:\"category_id\";i:4;s:5:\"image\";i:5;s:13:\"default_price\";i:6;s:7:\"user_id\";i:7;s:6:\"status\";i:8;s:3:\"vat\";i:9;s:9:\"vat_apply\";}s:13:\"\0*\0connection\";N;s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:13;s:7:\"part_no\";s:6:\"60201A\";s:4:\"name\";s:20:\"PB2 Ribbon Cartridge\";s:11:\"description\";s:31:\"Impact Printer Ribbon Cartridge\";s:11:\"category_id\";i:1;s:5:\"image\";s:62:\"storage/products/hqwahLomSOzR493tw6yuR3LeAQMAaELE1RuT4wa2.jpeg\";s:13:\"default_price\";s:7:\"2500.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:1;s:3:\"vat\";d:15;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-08 04:49:00\";s:10:\"updated_at\";s:19:\"2017-05-08 04:49:00\";}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:13;s:7:\"part_no\";s:6:\"60201A\";s:4:\"name\";s:20:\"PB2 Ribbon Cartridge\";s:11:\"description\";s:31:\"Impact Printer Ribbon Cartridge\";s:11:\"category_id\";i:1;s:5:\"image\";s:62:\"storage/products/hqwahLomSOzR493tw6yuR3LeAQMAaELE1RuT4wa2.jpeg\";s:13:\"default_price\";s:7:\"2500.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:1;s:3:\"vat\";d:15;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-08 04:49:00\";s:10:\"updated_at\";s:19:\"2017-05-08 04:49:00\";}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:9:\"\0*\0events\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:8:\"E260A11P\";a:3:{s:3:\"qty\";s:1:\"2\";s:5:\"price\";d:43000;s:4:\"item\";O:11:\"App\\Product\":24:{s:11:\"\0*\0fillable\";a:10:{i:0;s:7:\"part_no\";i:1;s:4:\"name\";i:2;s:11:\"description\";i:3;s:11:\"category_id\";i:4;s:5:\"image\";i:5;s:13:\"default_price\";i:6;s:7:\"user_id\";i:7;s:6:\"status\";i:8;s:3:\"vat\";i:9;s:9:\"vat_apply\";}s:13:\"\0*\0connection\";N;s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:6;s:7:\"part_no\";s:8:\"E260A11P\";s:4:\"name\";s:47:\"E260, E360, E460 Return Program Toner Cartridge\";s:11:\"description\";s:75:\"3,500 standard pages Declared yield value in accordance with ISO/IEC 19752.\";s:11:\"category_id\";i:8;s:5:\"image\";s:62:\"storage/products/FcQ64rOviVsHAjQuhj1QNAB15Xna7rK8S5C79Hzu.jpeg\";s:13:\"default_price\";s:8:\"21500.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:0;s:3:\"vat\";N;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-08 04:41:01\";s:10:\"updated_at\";s:19:\"2017-05-08 04:41:01\";}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:6;s:7:\"part_no\";s:8:\"E260A11P\";s:4:\"name\";s:47:\"E260, E360, E460 Return Program Toner Cartridge\";s:11:\"description\";s:75:\"3,500 standard pages Declared yield value in accordance with ISO/IEC 19752.\";s:11:\"category_id\";i:8;s:5:\"image\";s:62:\"storage/products/FcQ64rOviVsHAjQuhj1QNAB15Xna7rK8S5C79Hzu.jpeg\";s:13:\"default_price\";s:8:\"21500.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:0;s:3:\"vat\";N;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-08 04:41:01\";s:10:\"updated_at\";s:19:\"2017-05-08 04:41:01\";}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:9:\"\0*\0events\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}}s:8:\"totalQty\";i:4;s:10:\"totalPrice\";d:48000;}','Harsha Samarajiwa',NULL,'Head Office','+94 773 951130',NULL,NULL,1,'PC'),(5,'2017-05-17 08:15:20','2017-05-17 08:15:20',10,'O:10:\"App\\Bucket\":3:{s:5:\"items\";a:2:{s:7:\"13L0034\";a:3:{s:3:\"qty\";s:1:\"1\";s:5:\"price\";d:8050;s:4:\"item\";O:11:\"App\\Product\":24:{s:11:\"\0*\0fillable\";a:10:{i:0;s:7:\"part_no\";i:1;s:4:\"name\";i:2;s:11:\"description\";i:3;s:11:\"category_id\";i:4;s:5:\"image\";i:5;s:13:\"default_price\";i:6;s:7:\"user_id\";i:7;s:6:\"status\";i:8;s:3:\"vat\";i:9;s:9:\"vat_apply\";}s:13:\"\0*\0connection\";N;s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:9;s:7:\"part_no\";s:7:\"13L0034\";s:4:\"name\";s:18:\"4227, 4227+ Ribbon\";s:11:\"description\";s:106:\"Dot-matrix Printer Ribbon. 15 million characters in Draft mode. Compatible with Forms Printer 4227, 4227+.\";s:11:\"category_id\";i:8;s:5:\"image\";s:62:\"storage/products/Rr9j7sl4PWXVKXY7M0sq7tXsRTbTaxGAjxcIPTzU.jpeg\";s:13:\"default_price\";s:7:\"7950.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:1;s:3:\"vat\";d:15;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-08 04:43:24\";s:10:\"updated_at\";s:19:\"2017-05-08 04:43:24\";}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:9;s:7:\"part_no\";s:7:\"13L0034\";s:4:\"name\";s:18:\"4227, 4227+ Ribbon\";s:11:\"description\";s:106:\"Dot-matrix Printer Ribbon. 15 million characters in Draft mode. Compatible with Forms Printer 4227, 4227+.\";s:11:\"category_id\";i:8;s:5:\"image\";s:62:\"storage/products/Rr9j7sl4PWXVKXY7M0sq7tXsRTbTaxGAjxcIPTzU.jpeg\";s:13:\"default_price\";s:7:\"7950.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:1;s:3:\"vat\";d:15;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-08 04:43:24\";s:10:\"updated_at\";s:19:\"2017-05-08 04:43:24\";}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:9:\"\0*\0events\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:8:\"E260A11P\";a:3:{s:3:\"qty\";s:1:\"1\";s:5:\"price\";d:15000;s:4:\"item\";O:11:\"App\\Product\":24:{s:11:\"\0*\0fillable\";a:10:{i:0;s:7:\"part_no\";i:1;s:4:\"name\";i:2;s:11:\"description\";i:3;s:11:\"category_id\";i:4;s:5:\"image\";i:5;s:13:\"default_price\";i:6;s:7:\"user_id\";i:7;s:6:\"status\";i:8;s:3:\"vat\";i:9;s:9:\"vat_apply\";}s:13:\"\0*\0connection\";N;s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:6;s:7:\"part_no\";s:8:\"E260A11P\";s:4:\"name\";s:47:\"E260, E360, E460 Return Program Toner Cartridge\";s:11:\"description\";s:75:\"3,500 standard pages Declared yield value in accordance with ISO/IEC 19752.\";s:11:\"category_id\";i:8;s:5:\"image\";s:62:\"storage/products/FcQ64rOviVsHAjQuhj1QNAB15Xna7rK8S5C79Hzu.jpeg\";s:13:\"default_price\";s:8:\"21500.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:0;s:3:\"vat\";N;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-08 04:41:01\";s:10:\"updated_at\";s:19:\"2017-05-08 04:41:01\";}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:6;s:7:\"part_no\";s:8:\"E260A11P\";s:4:\"name\";s:47:\"E260, E360, E460 Return Program Toner Cartridge\";s:11:\"description\";s:75:\"3,500 standard pages Declared yield value in accordance with ISO/IEC 19752.\";s:11:\"category_id\";i:8;s:5:\"image\";s:62:\"storage/products/FcQ64rOviVsHAjQuhj1QNAB15Xna7rK8S5C79Hzu.jpeg\";s:13:\"default_price\";s:8:\"21500.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:0;s:3:\"vat\";N;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-08 04:41:01\";s:10:\"updated_at\";s:19:\"2017-05-08 04:41:01\";}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:9:\"\0*\0events\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}}s:8:\"totalQty\";i:2;s:10:\"totalPrice\";d:23050;}','Harsha Samarajiwa',NULL,'Head Office','+94117496000',NULL,NULL,4,'P'),(6,'2017-05-17 08:25:16','2017-05-17 08:25:16',10,'O:10:\"App\\Bucket\":3:{s:5:\"items\";a:1:{s:7:\"13L0034\";a:3:{s:3:\"qty\";s:1:\"1\";s:5:\"price\";d:8050;s:4:\"item\";O:11:\"App\\Product\":24:{s:11:\"\0*\0fillable\";a:10:{i:0;s:7:\"part_no\";i:1;s:4:\"name\";i:2;s:11:\"description\";i:3;s:11:\"category_id\";i:4;s:5:\"image\";i:5;s:13:\"default_price\";i:6;s:7:\"user_id\";i:7;s:6:\"status\";i:8;s:3:\"vat\";i:9;s:9:\"vat_apply\";}s:13:\"\0*\0connection\";N;s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:9;s:7:\"part_no\";s:7:\"13L0034\";s:4:\"name\";s:18:\"4227, 4227+ Ribbon\";s:11:\"description\";s:106:\"Dot-matrix Printer Ribbon. 15 million characters in Draft mode. Compatible with Forms Printer 4227, 4227+.\";s:11:\"category_id\";i:8;s:5:\"image\";s:62:\"storage/products/Rr9j7sl4PWXVKXY7M0sq7tXsRTbTaxGAjxcIPTzU.jpeg\";s:13:\"default_price\";s:7:\"7950.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:1;s:3:\"vat\";d:15;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-08 04:43:24\";s:10:\"updated_at\";s:19:\"2017-05-08 04:43:24\";}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:9;s:7:\"part_no\";s:7:\"13L0034\";s:4:\"name\";s:18:\"4227, 4227+ Ribbon\";s:11:\"description\";s:106:\"Dot-matrix Printer Ribbon. 15 million characters in Draft mode. Compatible with Forms Printer 4227, 4227+.\";s:11:\"category_id\";i:8;s:5:\"image\";s:62:\"storage/products/Rr9j7sl4PWXVKXY7M0sq7tXsRTbTaxGAjxcIPTzU.jpeg\";s:13:\"default_price\";s:7:\"7950.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:1;s:3:\"vat\";d:15;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-08 04:43:24\";s:10:\"updated_at\";s:19:\"2017-05-08 04:43:24\";}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:9:\"\0*\0events\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}}s:8:\"totalQty\";i:1;s:10:\"totalPrice\";d:8050;}','Harsha Samarajiwa','storage/checkout/UCuubx0ZwD6rjXrdbgwlq3BxtTbFmMY6EAPXblkJ.jpeg','Head Office','+94117496000',NULL,NULL,4,'P'),(7,'2017-05-17 08:26:58','2017-05-17 08:26:58',10,'O:10:\"App\\Bucket\":3:{s:5:\"items\";a:1:{s:6:\"60201A\";a:3:{s:3:\"qty\";s:1:\"1\";s:5:\"price\";d:3450;s:4:\"item\";O:11:\"App\\Product\":24:{s:11:\"\0*\0fillable\";a:10:{i:0;s:7:\"part_no\";i:1;s:4:\"name\";i:2;s:11:\"description\";i:3;s:11:\"category_id\";i:4;s:5:\"image\";i:5;s:13:\"default_price\";i:6;s:7:\"user_id\";i:7;s:6:\"status\";i:8;s:3:\"vat\";i:9;s:9:\"vat_apply\";}s:13:\"\0*\0connection\";N;s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:13;s:7:\"part_no\";s:6:\"60201A\";s:4:\"name\";s:20:\"PB2 Ribbon Cartridge\";s:11:\"description\";s:31:\"Impact Printer Ribbon Cartridge\";s:11:\"category_id\";i:1;s:5:\"image\";s:62:\"storage/products/hqwahLomSOzR493tw6yuR3LeAQMAaELE1RuT4wa2.jpeg\";s:13:\"default_price\";s:7:\"2500.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:1;s:3:\"vat\";d:15;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-08 04:49:00\";s:10:\"updated_at\";s:19:\"2017-05-08 04:49:00\";}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:13;s:7:\"part_no\";s:6:\"60201A\";s:4:\"name\";s:20:\"PB2 Ribbon Cartridge\";s:11:\"description\";s:31:\"Impact Printer Ribbon Cartridge\";s:11:\"category_id\";i:1;s:5:\"image\";s:62:\"storage/products/hqwahLomSOzR493tw6yuR3LeAQMAaELE1RuT4wa2.jpeg\";s:13:\"default_price\";s:7:\"2500.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:1;s:3:\"vat\";d:15;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-08 04:49:00\";s:10:\"updated_at\";s:19:\"2017-05-08 04:49:00\";}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:9:\"\0*\0events\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}}s:8:\"totalQty\";i:1;s:10:\"totalPrice\";d:3450;}','Harsha Samarajiwa','storage/checkout/un4EDqasjtICHBDTyPXZzvXnhDdtRbO5tKnKbQcU.png','Head Office','+94117496000',NULL,NULL,4,'P'),(8,'2017-05-18 05:00:10','2017-05-18 05:00:10',10,'O:10:\"App\\Bucket\":3:{s:5:\"items\";a:2:{s:7:\"13L0034\";a:3:{s:3:\"qty\";s:1:\"1\";s:5:\"price\";d:8050;s:4:\"item\";O:11:\"App\\Product\":24:{s:11:\"\0*\0fillable\";a:10:{i:0;s:7:\"part_no\";i:1;s:4:\"name\";i:2;s:11:\"description\";i:3;s:11:\"category_id\";i:4;s:5:\"image\";i:5;s:13:\"default_price\";i:6;s:7:\"user_id\";i:7;s:6:\"status\";i:8;s:3:\"vat\";i:9;s:9:\"vat_apply\";}s:13:\"\0*\0connection\";N;s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:9;s:7:\"part_no\";s:7:\"13L0034\";s:4:\"name\";s:18:\"4227, 4227+ Ribbon\";s:11:\"description\";s:106:\"Dot-matrix Printer Ribbon. 15 million characters in Draft mode. Compatible with Forms Printer 4227, 4227+.\";s:11:\"category_id\";i:8;s:5:\"image\";s:62:\"storage/products/Rr9j7sl4PWXVKXY7M0sq7tXsRTbTaxGAjxcIPTzU.jpeg\";s:13:\"default_price\";s:7:\"7950.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:1;s:3:\"vat\";d:15;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-08 04:43:24\";s:10:\"updated_at\";s:19:\"2017-05-08 04:43:24\";}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:9;s:7:\"part_no\";s:7:\"13L0034\";s:4:\"name\";s:18:\"4227, 4227+ Ribbon\";s:11:\"description\";s:106:\"Dot-matrix Printer Ribbon. 15 million characters in Draft mode. Compatible with Forms Printer 4227, 4227+.\";s:11:\"category_id\";i:8;s:5:\"image\";s:62:\"storage/products/Rr9j7sl4PWXVKXY7M0sq7tXsRTbTaxGAjxcIPTzU.jpeg\";s:13:\"default_price\";s:7:\"7950.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:1;s:3:\"vat\";d:15;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-08 04:43:24\";s:10:\"updated_at\";s:19:\"2017-05-08 04:43:24\";}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:9:\"\0*\0events\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:8:\"E260A11P\";a:3:{s:3:\"qty\";s:1:\"2\";s:5:\"price\";d:30000;s:4:\"item\";O:11:\"App\\Product\":24:{s:11:\"\0*\0fillable\";a:10:{i:0;s:7:\"part_no\";i:1;s:4:\"name\";i:2;s:11:\"description\";i:3;s:11:\"category_id\";i:4;s:5:\"image\";i:5;s:13:\"default_price\";i:6;s:7:\"user_id\";i:7;s:6:\"status\";i:8;s:3:\"vat\";i:9;s:9:\"vat_apply\";}s:13:\"\0*\0connection\";N;s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:6;s:7:\"part_no\";s:8:\"E260A11P\";s:4:\"name\";s:47:\"E260, E360, E460 Return Program Toner Cartridge\";s:11:\"description\";s:75:\"3,500 standard pages Declared yield value in accordance with ISO/IEC 19752.\";s:11:\"category_id\";i:8;s:5:\"image\";s:62:\"storage/products/FcQ64rOviVsHAjQuhj1QNAB15Xna7rK8S5C79Hzu.jpeg\";s:13:\"default_price\";s:8:\"21500.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:0;s:3:\"vat\";N;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-08 04:41:01\";s:10:\"updated_at\";s:19:\"2017-05-08 04:41:01\";}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:6;s:7:\"part_no\";s:8:\"E260A11P\";s:4:\"name\";s:47:\"E260, E360, E460 Return Program Toner Cartridge\";s:11:\"description\";s:75:\"3,500 standard pages Declared yield value in accordance with ISO/IEC 19752.\";s:11:\"category_id\";i:8;s:5:\"image\";s:62:\"storage/products/FcQ64rOviVsHAjQuhj1QNAB15Xna7rK8S5C79Hzu.jpeg\";s:13:\"default_price\";s:8:\"21500.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:0;s:3:\"vat\";N;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-08 04:41:01\";s:10:\"updated_at\";s:19:\"2017-05-08 04:41:01\";}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:9:\"\0*\0events\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}}s:8:\"totalQty\";i:3;s:10:\"totalPrice\";d:38050;}','Harsha Samarajiwa',NULL,'Head Office','+94117496000',NULL,NULL,4,'P'),(9,'2017-05-18 05:00:22','2017-05-18 05:00:22',10,'O:10:\"App\\Bucket\":3:{s:5:\"items\";a:2:{s:7:\"13L0034\";a:3:{s:3:\"qty\";s:1:\"1\";s:5:\"price\";d:8050;s:4:\"item\";O:11:\"App\\Product\":24:{s:11:\"\0*\0fillable\";a:10:{i:0;s:7:\"part_no\";i:1;s:4:\"name\";i:2;s:11:\"description\";i:3;s:11:\"category_id\";i:4;s:5:\"image\";i:5;s:13:\"default_price\";i:6;s:7:\"user_id\";i:7;s:6:\"status\";i:8;s:3:\"vat\";i:9;s:9:\"vat_apply\";}s:13:\"\0*\0connection\";N;s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:9;s:7:\"part_no\";s:7:\"13L0034\";s:4:\"name\";s:18:\"4227, 4227+ Ribbon\";s:11:\"description\";s:106:\"Dot-matrix Printer Ribbon. 15 million characters in Draft mode. Compatible with Forms Printer 4227, 4227+.\";s:11:\"category_id\";i:8;s:5:\"image\";s:62:\"storage/products/Rr9j7sl4PWXVKXY7M0sq7tXsRTbTaxGAjxcIPTzU.jpeg\";s:13:\"default_price\";s:7:\"7950.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:1;s:3:\"vat\";d:15;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-08 04:43:24\";s:10:\"updated_at\";s:19:\"2017-05-08 04:43:24\";}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:9;s:7:\"part_no\";s:7:\"13L0034\";s:4:\"name\";s:18:\"4227, 4227+ Ribbon\";s:11:\"description\";s:106:\"Dot-matrix Printer Ribbon. 15 million characters in Draft mode. Compatible with Forms Printer 4227, 4227+.\";s:11:\"category_id\";i:8;s:5:\"image\";s:62:\"storage/products/Rr9j7sl4PWXVKXY7M0sq7tXsRTbTaxGAjxcIPTzU.jpeg\";s:13:\"default_price\";s:7:\"7950.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:1;s:3:\"vat\";d:15;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-08 04:43:24\";s:10:\"updated_at\";s:19:\"2017-05-08 04:43:24\";}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:9:\"\0*\0events\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:8:\"E260A11P\";a:3:{s:3:\"qty\";s:1:\"2\";s:5:\"price\";d:30000;s:4:\"item\";O:11:\"App\\Product\":24:{s:11:\"\0*\0fillable\";a:10:{i:0;s:7:\"part_no\";i:1;s:4:\"name\";i:2;s:11:\"description\";i:3;s:11:\"category_id\";i:4;s:5:\"image\";i:5;s:13:\"default_price\";i:6;s:7:\"user_id\";i:7;s:6:\"status\";i:8;s:3:\"vat\";i:9;s:9:\"vat_apply\";}s:13:\"\0*\0connection\";N;s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:6;s:7:\"part_no\";s:8:\"E260A11P\";s:4:\"name\";s:47:\"E260, E360, E460 Return Program Toner Cartridge\";s:11:\"description\";s:75:\"3,500 standard pages Declared yield value in accordance with ISO/IEC 19752.\";s:11:\"category_id\";i:8;s:5:\"image\";s:62:\"storage/products/FcQ64rOviVsHAjQuhj1QNAB15Xna7rK8S5C79Hzu.jpeg\";s:13:\"default_price\";s:8:\"21500.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:0;s:3:\"vat\";N;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-08 04:41:01\";s:10:\"updated_at\";s:19:\"2017-05-08 04:41:01\";}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:6;s:7:\"part_no\";s:8:\"E260A11P\";s:4:\"name\";s:47:\"E260, E360, E460 Return Program Toner Cartridge\";s:11:\"description\";s:75:\"3,500 standard pages Declared yield value in accordance with ISO/IEC 19752.\";s:11:\"category_id\";i:8;s:5:\"image\";s:62:\"storage/products/FcQ64rOviVsHAjQuhj1QNAB15Xna7rK8S5C79Hzu.jpeg\";s:13:\"default_price\";s:8:\"21500.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:0;s:3:\"vat\";N;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-08 04:41:01\";s:10:\"updated_at\";s:19:\"2017-05-08 04:41:01\";}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:9:\"\0*\0events\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}}s:8:\"totalQty\";i:3;s:10:\"totalPrice\";d:38050;}','Harsha Samarajiwa',NULL,'Head Office','+94117496000',NULL,NULL,4,'P'),(10,'2017-05-18 06:12:09','2017-05-18 06:12:09',8,'O:10:\"App\\Bucket\":3:{s:5:\"items\";a:1:{s:7:\"A87M090\";a:3:{s:3:\"qty\";s:1:\"1\";s:5:\"price\";d:15525;s:4:\"item\";O:11:\"App\\Product\":24:{s:11:\"\0*\0fillable\";a:10:{i:0;s:7:\"part_no\";i:1;s:4:\"name\";i:2;s:11:\"description\";i:3;s:11:\"category_id\";i:4;s:5:\"image\";i:5;s:13:\"default_price\";i:6;s:7:\"user_id\";i:7;s:6:\"status\";i:8;s:3:\"vat\";i:9;s:9:\"vat_apply\";}s:13:\"\0*\0connection\";N;s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:18;s:7:\"part_no\";s:7:\"A87M090\";s:4:\"name\";s:6:\"TN 323\";s:11:\"description\";s:68:\"TN 323- 23,ooo page toner cartrdige. Compatible with BH 367 & BH 287\";s:11:\"category_id\";i:4;s:5:\"image\";s:62:\"storage/products/mW1oviPVRiJb3fbRqabxFj6uJCK5OGDx7X0MWk1g.jpeg\";s:13:\"default_price\";s:8:\"14000.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:1;s:3:\"vat\";d:15;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-08 05:01:29\";s:10:\"updated_at\";s:19:\"2017-05-08 05:01:29\";}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:18;s:7:\"part_no\";s:7:\"A87M090\";s:4:\"name\";s:6:\"TN 323\";s:11:\"description\";s:68:\"TN 323- 23,ooo page toner cartrdige. Compatible with BH 367 & BH 287\";s:11:\"category_id\";i:4;s:5:\"image\";s:62:\"storage/products/mW1oviPVRiJb3fbRqabxFj6uJCK5OGDx7X0MWk1g.jpeg\";s:13:\"default_price\";s:8:\"14000.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:1;s:3:\"vat\";d:15;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-08 05:01:29\";s:10:\"updated_at\";s:19:\"2017-05-08 05:01:29\";}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:9:\"\0*\0events\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}}s:8:\"totalQty\";i:1;s:10:\"totalPrice\";d:15525;}','Rangika Lakmini Balasuriya',NULL,'Head Office','111111111',NULL,NULL,8,'P'),(11,'2017-05-18 11:00:05','2017-05-18 11:00:05',10,'O:10:\"App\\Bucket\":3:{s:5:\"items\";a:1:{i:417374;a:3:{s:3:\"qty\";s:1:\"1\";s:5:\"price\";d:103500;s:4:\"item\";O:11:\"App\\Product\":24:{s:11:\"\0*\0fillable\";a:10:{i:0;s:7:\"part_no\";i:1;s:4:\"name\";i:2;s:11:\"description\";i:3;s:11:\"category_id\";i:4;s:5:\"image\";i:5;s:13:\"default_price\";i:6;s:7:\"user_id\";i:7;s:6:\"status\";i:8;s:3:\"vat\";i:9;s:9:\"vat_apply\";}s:13:\"\0*\0connection\";N;s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:14;s:7:\"part_no\";s:6:\"417374\";s:4:\"name\";s:8:\"MP 2014D\";s:11:\"description\";s:23:\"Entry Level Photocopier\";s:11:\"category_id\";i:10;s:5:\"image\";s:62:\"storage/products/is2Q7GjgOiItpEQvdE3KuyS06T3RF8qBYhbUMX72.jpeg\";s:13:\"default_price\";s:9:\"100000.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:1;s:3:\"vat\";d:15;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-08 04:50:38\";s:10:\"updated_at\";s:19:\"2017-05-08 04:50:38\";}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:14;s:7:\"part_no\";s:6:\"417374\";s:4:\"name\";s:8:\"MP 2014D\";s:11:\"description\";s:23:\"Entry Level Photocopier\";s:11:\"category_id\";i:10;s:5:\"image\";s:62:\"storage/products/is2Q7GjgOiItpEQvdE3KuyS06T3RF8qBYhbUMX72.jpeg\";s:13:\"default_price\";s:9:\"100000.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:1;s:3:\"vat\";d:15;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-08 04:50:38\";s:10:\"updated_at\";s:19:\"2017-05-08 04:50:38\";}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:9:\"\0*\0events\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}}s:8:\"totalQty\";i:1;s:10:\"totalPrice\";d:103500;}','Harsha Samarajiwa',NULL,'Head Office','+94117496000',NULL,NULL,4,'P');
/*!40000 ALTER TABLE `p__orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `privileges`
--

DROP TABLE IF EXISTS `privileges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `privileges` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `brand` tinyint(1) NOT NULL DEFAULT '0',
  `category` tinyint(1) NOT NULL DEFAULT '0',
  `product` tinyint(1) NOT NULL DEFAULT '0',
  `add_user` tinyint(1) NOT NULL DEFAULT '0',
  `user_approve` tinyint(1) NOT NULL DEFAULT '0',
  `designation` tinyint(1) NOT NULL DEFAULT '0',
  `client_prof` tinyint(1) NOT NULL DEFAULT '0',
  `client_users` tinyint(1) NOT NULL DEFAULT '0',
  `view_po` tinyint(1) NOT NULL DEFAULT '0',
  `change_po_status` tinyint(1) NOT NULL DEFAULT '0',
  `privilege` tinyint(1) NOT NULL DEFAULT '0',
  `assign_agent` tinyint(1) NOT NULL DEFAULT '0',
  `asign_brand` tinyint(1) NOT NULL DEFAULT '0',
  `asign_category` tinyint(1) NOT NULL DEFAULT '0',
  `asign_product` tinyint(1) NOT NULL DEFAULT '0',
  `product_cost` tinyint(1) NOT NULL DEFAULT '0',
  `view_reports` tinyint(1) NOT NULL DEFAULT '0',
  `client_branch` tinyint(1) NOT NULL DEFAULT '0',
  `created_user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `manage_client` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `privileges_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `privileges`
--

LOCK TABLES `privileges` WRITE;
/*!40000 ALTER TABLE `privileges` DISABLE KEYS */;
INSERT INTO `privileges` VALUES (1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,'2017-05-08 04:03:01','2017-05-08 04:03:01',1),(2,2,0,0,0,0,0,0,1,1,1,0,0,1,1,1,1,0,1,1,2,'2017-05-08 06:12:49','2017-05-12 12:05:31',0),(3,3,0,0,0,0,0,0,0,0,1,1,0,0,0,0,0,0,1,0,3,'2017-05-08 06:13:03','2017-05-09 03:39:30',0),(4,4,0,0,0,0,0,0,1,1,0,0,0,1,1,1,1,0,0,1,4,'2017-05-08 06:25:05','2017-05-18 05:09:53',1),(5,5,0,0,0,0,0,0,0,0,0,0,0,0,1,1,1,0,0,0,5,'2017-05-08 06:25:45','2017-05-09 03:40:26',0),(6,6,0,0,0,0,0,0,1,1,0,0,0,1,1,1,1,0,0,1,6,'2017-05-08 06:26:21','2017-05-09 03:40:37',0),(7,7,0,0,0,0,0,0,0,0,0,0,0,0,1,1,1,0,0,0,7,'2017-05-08 06:27:22','2017-05-09 03:41:03',0),(8,8,0,0,0,0,0,0,0,0,0,0,0,0,1,1,1,0,0,0,8,'2017-05-08 06:27:43','2017-05-09 03:41:23',0),(9,9,0,0,0,0,0,0,0,0,1,1,0,0,0,0,0,0,0,0,9,'2017-05-08 06:27:57','2017-05-08 06:28:30',0),(10,10,0,0,0,0,0,0,0,0,1,1,0,0,0,0,0,0,0,0,10,'2017-05-08 06:28:13','2017-05-08 06:28:40',0),(11,11,0,0,0,0,0,0,1,1,0,0,0,1,1,1,1,0,0,1,11,'2017-05-08 06:29:03','2017-05-09 03:41:52',0),(12,12,0,0,0,0,0,0,0,0,0,0,0,0,1,1,1,0,0,0,12,'2017-05-08 06:29:17','2017-05-18 05:28:24',1),(13,21,0,0,0,0,0,0,0,0,0,0,0,0,1,1,1,0,0,0,21,'2017-05-09 12:36:51','2017-05-09 12:36:51',0),(14,23,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,23,'2017-05-10 08:28:54','2017-05-10 08:33:48',0);
/*!40000 ALTER TABLE `privileges` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `part_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `default_price` decimal(11,2) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `vat_apply` tinyint(1) NOT NULL DEFAULT '0',
  `vat` double(8,2) DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_part_no_unique` (`part_no`),
  KEY `products_category_id_index` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'50F0Z00','500Z Black Return Program Imaging Unit','Up to 60,000 pages, based on 3 average letter/A4-size pages per print job and ~ 5% coverage',8,'storage/products/0mqI28UwtZ5YhFpz2fyFLOBSnLYqTPrIxvfy01rj.jpeg',8200.00,1,0,NULL,'1','2017-05-08 04:26:54','2017-05-08 04:26:54'),(2,'35S0125','MS312dn','Entry / Mid Range Monochrome Laser Printer - 35 PPM, A4, Duplex, Network - 1 Year Warranty',6,'storage/products/75Emf0NNqJLOKPBc9Sch2MetiVmoCh8G72h1jvbb.jpeg',28500.00,1,0,NULL,'1','2017-05-08 04:28:20','2017-05-08 04:28:20'),(3,'28C0092','CS310dn','Entry Level Colour Laser Printer - 25 PPM, A4, Duplex, Network - 1 Year Warranty',6,'storage/products/QJKt1zPW81A4IYUNhsLsxM7ixeG0w6mu7SFMOpmW.jpeg',55000.00,1,0,NULL,'1','2017-05-08 04:29:45','2017-05-08 04:29:45'),(4,'35S5860','MX310dn','Entry / Mid Range Monochrome  Multi-functional Laser Printer - 35 PPM, A4, Duplex, Network - 1 Year Warranty',7,'storage/products/nONCsyCy6ofd5ZXylDoADamQmCrE0V3ADRc03oUr.jpeg',45000.00,1,1,15.00,'1','2017-05-08 04:35:36','2017-05-08 04:35:36'),(5,'50F3H0E','503H High Yield Return Program Toner Cartridge','5,000 standard pages Declared yield value in accordance with ISO/IEC 19752.',8,'storage/products/jOMEeBMsJfoEsocYCgZY3YD596F1pKByJsLjNrp9.jpeg',27500.00,1,0,NULL,'1','2017-05-08 04:38:11','2017-05-08 04:38:11'),(6,'E260A11P','E260, E360, E460 Return Program Toner Cartridge','3,500 standard pages Declared yield value in accordance with ISO/IEC 19752.',8,'storage/products/FcQ64rOviVsHAjQuhj1QNAB15Xna7rK8S5C79Hzu.jpeg',21500.00,1,0,NULL,'1','2017-05-08 04:41:01','2017-05-08 04:41:01'),(7,'E260X22G','E260, E360, E46x, X264, X36x, X46x Photoconductor Kit','30,000 page Photoconductor Kit',8,'storage/products/jgIahVBWxzsHKC6pQY2vLMbBYMuxtFXneuYn1hBL.jpeg',5500.00,1,0,NULL,'1','2017-05-08 04:41:52','2017-05-08 04:41:52'),(8,'3070166','Standard Yield Black Re-inking Ribbon','Dot-matrix Printer Ribbon. 4 million characters @ draft 10 pitch. Compatible with Forms Printer 23xx series, 24xx series, 25xx / 25xx+ series.',8,'storage/products/x02so39MGET1DebwCNEA4gBjv3Qjujw8tAWWjbRG.jpeg',2400.00,1,1,15.00,'1','2017-05-08 04:42:47','2017-05-08 04:42:47'),(9,'13L0034','4227, 4227+ Ribbon','Dot-matrix Printer Ribbon. 15 million characters in Draft mode. Compatible with Forms Printer 4227, 4227+.',8,'storage/products/Rr9j7sl4PWXVKXY7M0sq7tXsRTbTaxGAjxcIPTzU.jpeg',7950.00,1,1,15.00,'1','2017-05-08 04:43:24','2017-05-08 04:43:24'),(10,'52D3X0E','523XE Black Extra High yield Corporate Toner Cartridge','523XE Black Extra High yield Corporate Toner Cartridge, 45,000 standard pages Declared yield value in accordance with ISO/IEC 19752. Compatble with MS811/812.',8,'storage/products/Wkz1o25V2EMjQmwZGwOUgD4akWA0NTvyFcn3CtuL.jpeg',95600.00,1,0,NULL,'1','2017-05-08 04:44:24','2017-05-08 04:44:24'),(11,'52D0Z00','520Z Black Return Program Imaging Unit','Up to 100,000 pages, based on 3 average letter/A4-size pages per print job and ~ 5% coverage. Compatible with MS71x series, MS81x series, MX71x series, MX81x series.',8,'storage/products/wH87Jk16iiLU4ynb8bJ39mTtqURP55pPCB1AJ6st.jpeg',8750.00,1,0,NULL,'1','2017-05-08 04:45:13','2017-05-08 04:45:13'),(12,'60F3H0E','603HE Black High Yield Corporate Toner Cartridge','10,000 standard pages Declared yield value in accordance with ISO/IEC 19752. Compatible with MX310dn, MX410de, MX51x series, MX61x series.',8,'storage/products/AgBub1LahJbDkFibtcsthhqT6cCx4Eu7Ifq5YxBo.jpeg',41500.00,1,1,15.00,'1','2017-05-08 04:46:30','2017-05-08 04:46:30'),(13,'60201A','PB2 Ribbon Cartridge','Impact Printer Ribbon Cartridge',1,'storage/products/hqwahLomSOzR493tw6yuR3LeAQMAaELE1RuT4wa2.jpeg',2500.00,1,1,15.00,'1','2017-05-08 04:49:00','2017-05-08 04:49:00'),(14,'417374','MP 2014D','Entry Level Photocopier',10,'storage/products/is2Q7GjgOiItpEQvdE3KuyS06T3RF8qBYhbUMX72.jpeg',100000.00,1,1,15.00,'1','2017-05-08 04:50:38','2017-05-08 04:50:38'),(15,'842136','Toner Cartrdige - MP 2014D / 2014AD','12,000 pages @ 5% coverage',12,'storage/products/vFuflNEF9AYuhh9vfglYOMlmdcRqSf76Le2Gs8uI.jpeg',5600.00,1,1,15.00,'1','2017-05-08 04:54:33','2017-05-08 04:54:33'),(16,'243293','Ricoh DD 5450','Monochrome Single Drum Digital Duplicator - 1 year Warranty',15,'storage/products/qHBtE59QEN1xgoVC00snShm0ZXZtkwcoyrg9PNG8.jpeg',565000.00,1,1,15.00,'1','2017-05-08 04:56:34','2017-05-08 04:56:34'),(17,'431173','Ricoh PJ-X2240','DLP, 3,000 Lumens, XGA - 1 Year for Projector, 1 Year or 1,000 hours for Light Source',14,'storage/products/7znPYq3jCwT2UJiM9eB0rMiQrje3v0H1VQ9a1uBl.jpeg',72000.00,1,0,NULL,'1','2017-05-08 04:59:21','2017-05-08 04:59:21'),(18,'A87M090','TN 323','TN 323- 23,ooo page toner cartrdige. Compatible with BH 367 & BH 287',4,'storage/products/mW1oviPVRiJb3fbRqabxFj6uJCK5OGDx7X0MWk1g.jpeg',14000.00,1,1,15.00,'1','2017-05-08 05:01:29','2017-05-08 05:01:29'),(19,'A33K091','TN 513','TN 513- 22,900 page Toner Cartridge. Compatible with BH 454e & BH 554e.',4,'storage/products/VOjyXPNHia5p4jsjocjSonFST4DO4N7PdneKFOEp.jpeg',14000.00,1,1,15.00,'1','2017-05-08 05:03:00','2017-05-08 05:03:00'),(20,'A33K192','TN 512-K','TN 512-K 27,500 page Black Toner Cartridge. Compatible with BH C554e & BH C454e.',4,'storage/products/IHoxmb20ExVtzpXU6MFGZEZezavxVucpbFVSIjPP.jpeg',24000.00,1,1,15.00,'1','2017-05-08 05:04:35','2017-05-10 11:01:23'),(21,'A33K492','TN 512-C','TN 512-C  26,000 page Cyan Toner Cartridge. Compatible with BH C554e  & BH C454e.',4,'storage/products/hCzcepUmtGakk1w7u5591KZUbZtpM4RoOJLxVFbE.jpeg',27000.00,1,1,15.00,'1','2017-05-08 05:05:25','2017-05-08 05:05:25'),(22,'A33K292','TN 512-Y','TN 512-Y  26,000 page Yellow Toner Cartridge. Compatible with  BH C554e & BH C454e.',4,'storage/products/ShxNpiWW6gUKPKlPFHSiVlkbzH5KQ7HL3AESJz2n.jpeg',27000.00,1,1,15.00,'1','2017-05-08 05:06:12','2017-05-08 05:06:12'),(23,'A33K392','TN 512-M','TN 512-M  26,ooo page Magenta Toner Cartridge. Compatible with  BH C554e & BH C454e.',4,'storage/products/uMDzJOUIgjQHLDyQtdwLMNG2UmUpUIVPhCxUVyJv.jpeg',27000.00,1,1,15.00,'1','2017-05-08 05:06:53','2017-05-08 05:06:53'),(25,'885274','6210d Toner Cartridge','Yield - 43,000 pages. Compatible with Aficio MP 7502',12,'storage/products/3JAc0U59zbtVYML9KUNBz0qcSIUJlsjAqa6EUD3Z.jpeg',22000.00,1,1,15.00,'1','2017-05-12 03:27:51','2017-05-12 03:27:51');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_profiles`
--

DROP TABLE IF EXISTS `user_profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_profiles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `full_name` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `mobile` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_profiles_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_profiles`
--

LOCK TABLES `user_profiles` WRITE;
/*!40000 ALTER TABLE `user_profiles` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nic_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation_id` int(11) NOT NULL,
  `approval` tinyint(1) NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section_head_id` int(11) DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'harsha@ewisl.net','$2y$10$AdYPp.8yKT07xbfU4SLUZ.zCxomDXBh40/b9A1I512uL6LCOORUYa','Harsha Samarajiwa','781552534V',12,1,0,NULL,NULL,'1','2017-05-08 04:03:01','2017-05-08 05:13:59'),(2,'chanakah@ewisl.net','$2y$10$Fen6zcJxV.gYq60Cea4MreBa6xUnb/duPmTMP7GaK7rgtsZ9fXrde','Chanaka Happuarachchi','123456789V',6,1,0,NULL,1,'1','2017-05-08 05:17:19','2017-05-12 12:06:46'),(3,'bimalka@ewisl.net','$2y$10$Mao7m0IhRVkG76aRYtoEheFSz707zBZtvSVOscqwCum24NtxUaMze','Bimalka Perera','123456789V',7,1,0,NULL,1,'1','2017-05-08 05:18:25','2017-05-08 06:13:05'),(4,'asangap@ewisl.net','$2y$10$4DRcwQBIy.jIBRBhJmJlfOBPsbjUa1IOFIr/qbs68lP67aCzLuPU6','Asanga Perera','123456789V',3,1,0,NULL,2,'1','2017-05-08 05:19:14','2017-05-08 06:25:07'),(5,'chandimaj@ewisl.net','$2y$10$SonSVLbbGxJCJowXSj8j9.G7G9eoRlZoKxYRIYAnypDyl4ULdsBFW','Chandima Jayasundara','123456789V',4,1,0,NULL,4,'1','2017-05-08 05:19:44','2017-05-08 06:25:51'),(6,'dineshw@ewisl.net','$2y$10$.lDOJLD4dhI0uGpZbMVGp..6z9ZZnVc99xgzqyoflRPCGS5OFEcdm','Dinesh Wickramasinghe','123456789V',9,1,0,NULL,2,'1','2017-05-08 05:20:14','2017-05-08 06:27:02'),(7,'manjulah@ewisl.net','$2y$10$lgcK9FNgNpV3Qr6tedTho.tnp.0Dv61L2C/91HPm3RdFzeepJUBGW','Manjula Hennadige','123456789V',4,1,0,NULL,6,'1','2017-05-08 05:20:38','2017-05-08 06:27:31'),(8,'amilaa@ewisl.net','$2y$10$a1l83aqeDmHjz1fufKV1v.ReIWN1seT9y3mSbhyez1PVoCpDtLmgy','Amila Atapattu','123456789V',4,1,0,NULL,6,'1','2017-05-08 05:21:01','2017-05-08 06:27:45'),(9,'damayanthik@ewisl.net','$2y$10$puQQJTZ8SOYm2J4MwWu2Z.s23M6YaEBTWCb1AFOucYPpbavAWpxWW','Damayanthi Kariyawasam','123456789V',5,1,0,NULL,3,'1','2017-05-08 05:21:37','2017-05-08 06:27:59'),(10,'hashanp@ewisl.net','$2y$10$ZJStD9OR0UVMfncRqKspe.6u9pGYxI84YXVBPMg7s1ZtIcZyQ1Cs2','Hashan Peiris','123456789V',5,1,0,NULL,3,'1','2017-05-08 05:22:04','2017-05-08 06:28:15'),(11,'nirmanaj@ewisl.net','$2y$10$FNTN22gFqLLH58JSfDk18OfOZsbOyO3ySUmklCQifwOg204sMdle6','Nirmana Jayatunge','123456789V',8,1,0,NULL,2,'1','2017-05-08 05:24:22','2017-05-08 06:29:05'),(12,'sankhad@ewisl.net','$2y$10$qmVL34xoVNOFYNT4mOVJkevju.ek1K8BxSIaFtnUWC2uUqqwZ1rLC','Sankha De Silva','123456789V',4,1,0,NULL,11,'1','2017-05-08 05:25:08','2017-05-08 06:29:20'),(13,'gayan@nsbm.lk','$2y$10$uNU0r2aDOfhXa/ZZEH8sre.RcHBWbGbFI1yNyZCCSO7KZWxNXbWIm','Mr. Gayan Patirana','833063243V',2,1,0,NULL,NULL,'1','2017-05-08 05:35:29','2017-05-17 09:43:21'),(14,'nalinda.damion@laugfs.lk','$2y$10$qSD34E9MkG4aHVDoDdgrA.ZEB535sKZH5xRmzdpJrx6wfJ0qKToS.','Mr. Nalinda Damian','123456789V',2,1,0,NULL,NULL,'1','2017-05-08 06:05:12','2017-05-12 06:25:15'),(15,'dineshka.k@cargillsceylon.com','$2y$10$s16qt1mWSslaTgnnzGMx1.pL2bJ3A9HBSU4XEXhpDLlimeaFcQnYa','Ms. Dineshka Keragala','123456789V',2,1,0,NULL,NULL,'1','2017-05-08 06:06:05','2017-05-12 06:25:18'),(16,'SuchinthaP@allianz.lk','$2y$10$OYEwoOC9GflhJ.mAHkg5n.FY7pvFrhllBinw3f5sDxJWLAqUHtbki','Mr. Suchintha Perera','123456789V',2,1,0,NULL,NULL,'1','2017-05-08 06:08:34','2017-05-12 06:18:29'),(17,'bhathika_ranaweera@combank.net','$2y$10$I6anT261vV69SxhrwBCRser6LpzeiItQLSzfFVcZMPfPfWeBOzZIy','Mr. Bhathika Ranaweera','123456789V',2,1,0,NULL,NULL,'1','2017-05-08 06:09:10','2017-05-12 06:25:22'),(18,'pasinj@cilanka.com','$2y$10$bRMU3OMXWXKw70F50Kbm4OZLoqPByxBy/T4LQi95dmGSL.IomGxJK','Mr. Pasin Jeyakrishna','123456789V',2,1,0,NULL,NULL,'1','2017-05-08 06:09:41','2017-05-12 06:25:25'),(19,'delan.mendis@dfccbank.com','$2y$10$/NWSnNwAh64g.ZxEU4MG5O2LK0l3nFUF4On3wdvnJOtqwuzU/4jcu','Mr. Delan Mendis','123456789V',2,1,0,NULL,NULL,'1','2017-05-08 06:10:07','2017-05-12 06:25:28'),(20,'jerome@ric.lk','$2y$10$YibyVFG62wjs/v.zRNTmCe81bFfZqZZrcdPjcgRdcx48udbPHzIZG','Jerome Dias','123456789V',2,1,0,NULL,NULL,'1','2017-05-09 12:32:56','2017-05-12 06:34:54'),(21,'dulajp@ewisl.net','$2y$10$c2EObekYu92IfCn872RaquT74mrjCtsI/zHxUVa0sEAZfans.1jh2','Dulaj Perera','123456789V',4,1,0,NULL,6,'1','2017-05-09 12:36:33','2017-05-12 06:12:25'),(22,'rangika.l@nsbm.lk','$2y$10$l3OlNvND8gXvuoTsuvOpbeGGaIxZOMZG3R7ve52mg2Qk/2BPpa9rO','Rangika Lakmini Balasuriya','898534014V',2,1,0,NULL,NULL,'1','2017-05-09 12:48:20','2017-05-18 06:06:23'),(23,'mahendralakmal@gmail.com','$2y$10$50dSuFzZpfFXA536zTQy1ubV20aqzJYovzrGanBPJnG9imisyXZpC','M L Karanduwawala','123456789',12,1,0,NULL,1,'1','2017-05-10 08:28:17','2017-05-10 08:34:05'),(24,'harsha.samarajiwa@gmail.com','$2y$10$LR7RQWPB/a/2jdTdFbvVC.ruxu7asQZdOggym6MMD94RZwIXfnq2y','Harsha Samarajiwa','781552534V',2,1,0,NULL,NULL,'1','2017-05-12 07:26:46','2017-05-18 06:17:48');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-19  5:09:51
