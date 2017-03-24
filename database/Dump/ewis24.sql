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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brands`
--

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
INSERT INTO `brands` VALUES (1,'Lexmark','Printers, Multi-function devices, Related Consumables, Accessories, Options, Solutions........','storage/brands/DV4MN8iYtnsfa5knpLnAik4OQRllmUu77puxnuvw.png','1',1,'2017-03-20 08:38:41','2017-03-24 10:16:52'),(2,'Konica Minolta','Copiers, Production Printers, Related Consumables / Supplies, Accessories, Options, Solutions........','storage/brands/X6bERWoX60GLPqzF25eaeS9PPxfshzyatCe3sju4.png','1',1,'2017-03-20 08:40:07','2017-03-24 10:17:46'),(3,'Ricoh','Copiers, Production Printers, Duplicators, Projectors, Related Consumables / Supplies, Accessories, Options, Solutions........','storage/brands/o0Jf0AK6d4vNDzcHccmtUgRjcdTlziv6BwAKyCYd.png','1',1,'2017-03-20 08:41:39','2017-03-24 10:18:14');
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
  `client_id` int(11) NOT NULL,
  `remove` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `c_brands`
--

LOCK TABLES `c_brands` WRITE;
/*!40000 ALTER TABLE `c_brands` DISABLE KEYS */;
INSERT INTO `c_brands` VALUES (1,1,1,1,0,'2017-03-20 10:15:49','2017-03-20 10:15:49'),(2,1,2,2,0,'2017-03-24 11:50:39','2017-03-24 11:50:39'),(3,1,3,2,0,'2017-03-24 11:50:43','2017-03-24 11:50:43');
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
  `client_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `remove` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `c_categories`
--

LOCK TABLES `c_categories` WRITE;
/*!40000 ALTER TABLE `c_categories` DISABLE KEYS */;
INSERT INTO `c_categories` VALUES (1,1,1,1,1,0,'2017-03-20 10:18:54','2017-03-20 10:18:54'),(2,1,2,1,1,0,'2017-03-20 10:19:09','2017-03-20 10:19:09'),(3,1,3,1,1,0,'2017-03-20 10:19:14','2017-03-20 10:19:14'),(4,1,5,2,2,0,'2017-03-24 11:51:00','2017-03-24 11:51:00'),(5,1,6,2,2,0,'2017-03-24 11:51:10','2017-03-24 11:51:10'),(6,1,8,2,2,0,'2017-03-24 11:51:17','2017-03-24 11:51:17'),(7,1,16,2,2,0,'2017-03-24 11:51:24','2017-03-24 11:51:24'),(8,1,9,2,3,0,'2017-03-24 11:51:30','2017-03-24 11:51:30'),(9,1,13,2,3,0,'2017-03-24 11:51:37','2017-03-24 11:51:37'),(10,1,14,2,3,0,'2017-03-24 11:51:43','2017-03-24 11:51:43'),(11,1,18,2,3,0,'2017-03-24 11:51:49','2017-03-24 11:51:49'),(12,1,19,2,3,0,'2017-03-24 11:52:00','2017-03-24 11:52:00'),(13,1,20,2,3,0,'2017-03-24 11:52:05','2017-03-24 11:52:05');
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
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `category_key` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categories_brand_id_index` (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Printers',1,'Monochrome / Colour Printers','storage/categories/LzcatfjUfPFrxesKE0LhoYh3y7UZ9Orq7dhoinvs.png','1',1,'Printers_1','2017-03-20 08:44:18','2017-03-20 08:44:18'),(2,'Multi-function Printers',1,'Monochrome / Colour multi-function printers','storage/categories/d4hiQNrDNxOishRBZc1mMvVFc5RamEMeWjaNrZUo.jpeg','1',1,'Multi-function Printers_1','2017-03-20 08:45:38','2017-03-20 08:45:38'),(3,'Consumables',1,'Toners, Ink-cartridges, Ribbons, Imaging Units......','storage/categories/1KQGlDcoho3v2eLyxPTQ1TGRz9SU4RkQUgdhqq19.jpeg','1',1,'Consumables_1','2017-03-20 08:48:31','2017-03-20 10:31:43'),(5,'Photocopiers',2,'Monochrome / Colour copiers','storage/categories/MiMtYLuhmr9yFP8Nqmdl1gSmdJseojra2a1iaWxB.jpeg','1',1,'Photocopiers_2','2017-03-20 08:52:17','2017-03-24 10:22:06'),(6,'Production Printers',2,'Monochrome / Colour production printers','storage/categories/8ujpZ6NKUoEkIFDV9isBA48z8AFSaVK0AaaCbiMJ.jpeg','1',1,'Production Printers_2','2017-03-20 08:55:26','2017-03-20 08:55:26'),(8,'Consumables',2,'Toners, Developers, Drums','storage/categories/QVYpo1TqqewutMA6LUEYJdo5PyEvQ2NqnSBvjtXk.jpeg','1',1,'Consumables_2','2017-03-20 08:57:16','2017-03-24 10:22:33'),(9,'Photocopiers',3,'Monochrome / Colour copiers....',NULL,'1',1,'Photocopiers_3','2017-03-20 09:00:38','2017-03-20 09:00:38'),(13,'Production Printers',3,'Monochrome / Colour production printers','storage/categories/mZrewq10h4SgPTWgfAg2GVAq11crS6EGBvJfh6nM.jpeg','1',1,'Production Printers_3','2017-03-20 09:02:16','2017-03-20 09:02:16'),(14,'Consumables',3,'Toners, Developer, Drums, etc','storage/categories/HxiGIJ4CoPyWxzwSMS1StPQhPwCCF8jHo5pMksOO.jpeg','1',1,'Consumables_3','2017-03-20 09:03:12','2017-03-24 10:32:09'),(15,'Consumables',1,'Toners, Ink-cartridges, Ribbons, Imaging Units......','storage/categories/ePXs1nSqNJNDIKttWeubVTZk8ALmG1EgtCXTcavq.jpeg','1',0,'Consumables_1','2017-03-20 12:15:40','2017-03-20 12:15:53'),(16,'Options / Accessories',2,'Paper handling options (i.e. trays, bins, finishers, duplex units, etc), Connectivity (i.e. network cards, etc) etc','storage/categories/lTueOqZj6w8AkoQErAgAnEQdnOcrpifucTczhpdY.jpeg','1',1,'Options / Accessories_2','2017-03-24 10:25:37','2017-03-24 10:25:37'),(17,'Options / Accessories',1,'Paper handling options (i.e. trays, bins, finishers, duplex units, etc), Connectivity (i.e. network cards, etc) etc','storage/categories/7fRwwt5twKkLAhtpMCzwiVeSrAESr6DjfUh4QTbo.png','1',1,'Options / Accessories_1','2017-03-24 10:27:31','2017-03-24 10:27:31'),(18,'Options / Accessories',3,'Paper handling options (i.e. trays, bins, finishers, duplex units, etc), Connectivity (i.e. network cards, etc) etc','storage/categories/FB7I81k1eC6KX4kWD7NMJ4OT7tsci7d1B4Foanet.jpeg','1',1,'Options / Accessories_3','2017-03-24 10:35:28','2017-03-24 10:35:28'),(19,'Projectors',3,'Entry, Standard, Desk Edge, Short Throw, Ultra Short Throw, High End Projectors','storage/categories/yMEjDxeoNnV6inwWZkApfRsqLkRmxnzbw79GFSFG.jpeg','1',1,'Projectors_3','2017-03-24 10:38:01','2017-03-24 10:38:01'),(20,'Duplicators',3,'Digital duplicators','storage/categories/IVLmH0SL2xf8j1R5mqc9pJzAwCb21ZCNQWNvTUjq.jpeg','1',1,'Duplicators_3','2017-03-24 10:40:23','2017-03-24 10:40:23');
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
  `category_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `special_price` decimal(11,2) NOT NULL,
  `remove` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client__products`
--

LOCK TABLES `client__products` WRITE;
/*!40000 ALTER TABLE `client__products` DISABLE KEYS */;
INSERT INTO `client__products` VALUES (1,1,1,3,1,1,15500.00,0,'2017-03-20 10:26:46','2017-03-20 10:26:46'),(2,1,3,9,2,5,90000.00,0,'2017-03-24 11:52:49','2017-03-24 11:52:49'),(3,1,3,9,2,5,90000.00,0,'2017-03-24 11:53:17','2017-03-24 11:53:17'),(4,1,3,9,2,5,90000.00,0,'2017-03-24 11:55:10','2017-03-24 11:55:10');
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
  `agent_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `clients_user_id_index` (`user_id`),
  KEY `clients_agent_id_index` (`agent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,1,'Sampath Bank PLC','No 110, \r\nSir James Peiris Mawatha,\r\nColombo 02,\r\nSri Lanka.','+94 11 2 30 30 50','info@sampath.lk','storage/images/5iDPA1BkAkPAZeqUsfWK5Ts23fya46Kno7VfQ541.jpeg','#ff9e3e',1,0,5,'2017-03-20 09:49:11','2017-03-20 09:58:41'),(2,1,'Nations Trust Bank','242, Union Place,\r\nColombo 2, Colombo 00200, Sri Lanka.','+94 11 4 313131','info@nationstrust.com','storage/images/POwtPxADyhvwOFfxzbNc9otz9DlzOny7hRRJgpio.png','#7ed0ef',1,0,NULL,'2017-03-24 11:34:22','2017-03-24 11:40:46');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
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
  `cp_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp_designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp_branch` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp_telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_user` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `clientusers_user_id_index` (`user_id`),
  KEY `clientusers_client_id_index` (`client_id`),
  KEY `clientusers_created_user_index` (`created_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientusers`
--

LOCK TABLES `clientusers` WRITE;
/*!40000 ALTER TABLE `clientusers` DISABLE KEYS */;
INSERT INTO `clientusers` VALUES (1,11,1,'Shihara Fernando','Purchasing Officer','Colombo','+94 11 2 30 30 50','shiharaf@ewisl.net',1,'2017-03-20 09:56:49','2017-03-20 09:56:49'),(2,12,1,'Sonali Perera','Purchasing Officer','Galle','343546565','sonalip@ewisl.net',1,'2017-03-20 10:02:27','2017-03-20 10:02:27'),(3,13,2,'Dharshan Fernando','Purchasing Officer','Head Office','+94 773 404274','dharshanf@ewisl.net',1,'2017-03-24 11:50:22','2017-03-24 11:50:22');
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `designations`
--

LOCK TABLES `designations` WRITE;
/*!40000 ALTER TABLE `designations` DISABLE KEYS */;
INSERT INTO `designations` VALUES (1,'Super Admin',0,'1','2017-03-20 08:35:59','2017-03-20 08:35:59'),(2,'Client',0,'1','2017-03-20 08:35:59','2017-03-20 08:35:59'),(3,'Sector Head - Banking & Finance',0,'1','2017-03-20 09:11:28','2017-03-20 09:21:10'),(4,'Sales Executive',0,'1','2017-03-20 09:12:08','2017-03-20 09:12:08'),(5,'Procurement / Logistics Executive',0,'1','2017-03-20 09:12:13','2017-03-20 09:12:13'),(6,'DGM - Sales & Marketing',0,'1','2017-03-20 09:16:38','2017-03-20 09:16:38'),(7,'AGM - Procurement & Logistics',0,'1','2017-03-20 09:17:09','2017-03-20 09:17:09'),(8,'Sector Head - Corporate',0,'1','2017-03-20 09:21:19','2017-03-20 09:21:19'),(9,'Sector Head - Government',0,'1','2017-03-20 09:21:33','2017-03-20 09:21:33');
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
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (99,'2014_10_12_000000_create_users_table',1),(100,'2014_10_12_100000_create_password_resets_table',1),(101,'2017_01_24_173536_create_category_table',1),(102,'2017_01_24_173716_create_brands_table',1),(103,'2017_01_24_173753_create_products_table',1),(104,'2017_02_03_054157_create_user_profile_table',1),(105,'2017_02_10_191524_create_designations_table',1),(106,'2017_02_12_093519_create_client_profile_table',1),(107,'2017_02_22_053255_create_p__orders_table',1),(108,'2017_02_22_075343_create_client_users_table',1),(109,'2017_03_01_072933_create_clients_product_table',1),(110,'2017_03_02_115830_create_privileges_table',1),(111,'2017_03_03_061544_create_client_assign_brands_table',1),(112,'2017_03_03_073840_create_client_assign_categories_table',1);
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
  `client_id` int(11) NOT NULL,
  `bucket` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_cp` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_branch` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_tp` int(11) NOT NULL,
  `del_notes` text COLLATE utf8mb4_unicode_ci,
  `cp_notes` text COLLATE utf8mb4_unicode_ci,
  `agent_id` int(11) NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `p__orders`
--

LOCK TABLES `p__orders` WRITE;
/*!40000 ALTER TABLE `p__orders` DISABLE KEYS */;
INSERT INTO `p__orders` VALUES (1,'2017-03-20 10:39:23','2017-03-20 10:39:23',1,'O:10:\"App\\Bucket\":3:{s:5:\"items\";a:1:{s:7:\"50F0Z00\";a:3:{s:3:\"qty\";s:1:\"1\";s:5:\"price\";d:18000;s:4:\"item\";O:11:\"App\\Product\":24:{s:11:\"\0*\0fillable\";a:10:{i:0;s:7:\"part_no\";i:1;s:4:\"name\";i:2;s:11:\"description\";i:3;s:11:\"category_id\";i:4;s:5:\"image\";i:5;s:13:\"default_price\";i:6;s:7:\"user_id\";i:7;s:6:\"status\";i:8;s:3:\"vat\";i:9;s:9:\"vat_apply\";}s:13:\"\0*\0connection\";N;s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:1;s:7:\"part_no\";s:7:\"50F0Z00\";s:4:\"name\";s:38:\"500Z Black Return Program Imaging Unit\";s:11:\"description\";s:90:\"Up to 60000 pages, based on 3 average letter/A4-size pages per print job and ~ 5% coverage\";s:11:\"category_id\";i:3;s:5:\"image\";s:62:\"storage/products/9jrwUeAEGlY5eo13CQv5DaqPn7ZlXRzSv4Vnx3sW.jpeg\";s:13:\"default_price\";s:8:\"18000.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:0;s:3:\"vat\";N;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-03-20 09:09:27\";s:10:\"updated_at\";s:19:\"2017-03-20 09:09:27\";}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:1;s:7:\"part_no\";s:7:\"50F0Z00\";s:4:\"name\";s:38:\"500Z Black Return Program Imaging Unit\";s:11:\"description\";s:90:\"Up to 60000 pages, based on 3 average letter/A4-size pages per print job and ~ 5% coverage\";s:11:\"category_id\";i:3;s:5:\"image\";s:62:\"storage/products/9jrwUeAEGlY5eo13CQv5DaqPn7ZlXRzSv4Vnx3sW.jpeg\";s:13:\"default_price\";s:8:\"18000.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:0;s:3:\"vat\";N;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-03-20 09:09:27\";s:10:\"updated_at\";s:19:\"2017-03-20 09:09:27\";}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:9:\"\0*\0events\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}}s:8:\"totalQty\";i:1;s:10:\"totalPrice\";d:18000;}','Shihara Fernando','Colombo',112303050,NULL,NULL,5,'P');
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
  `created_user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `privileges_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `privileges`
--

LOCK TABLES `privileges` WRITE;
/*!40000 ALTER TABLE `privileges` DISABLE KEYS */;
INSERT INTO `privileges` VALUES (1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,'2017-03-20 08:35:59','2017-03-20 08:35:59'),(2,2,0,0,0,0,0,0,1,1,1,0,0,0,0,0,0,0,2,'2017-03-20 09:38:37','2017-03-20 09:38:37'),(3,4,0,0,1,0,0,0,0,1,1,0,0,0,0,0,0,1,4,'2017-03-20 09:39:57','2017-03-20 09:43:31'),(4,3,0,0,0,0,0,0,0,0,1,1,0,0,0,0,0,0,3,'2017-03-20 09:40:33','2017-03-20 09:41:12'),(5,5,0,0,1,0,0,0,0,0,1,0,0,0,0,0,0,1,5,'2017-03-20 09:41:59','2017-03-20 09:42:09'),(6,6,0,0,1,0,0,0,0,1,1,0,0,0,0,0,0,0,6,'2017-03-20 09:43:21','2017-03-20 09:43:21'),(7,7,0,0,0,0,0,0,0,0,1,0,0,0,0,0,0,0,7,'2017-03-20 09:43:43','2017-03-20 09:43:43'),(8,8,0,0,0,0,0,0,0,0,1,0,0,0,0,0,0,0,8,'2017-03-20 09:43:55','2017-03-20 09:43:55'),(9,9,0,0,0,0,0,0,0,0,1,1,0,0,0,0,0,0,9,'2017-03-20 09:44:04','2017-03-20 09:44:09'),(10,10,0,0,0,0,0,0,0,0,1,1,0,0,0,0,0,0,10,'2017-03-20 09:44:19','2017-03-20 09:44:19');
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'50F0Z00','500Z Black Return Program Imaging Unit','Up to 60000 pages, based on 3 average letter/A4-size pages per print job and ~ 5% coverage',3,'storage/products/9jrwUeAEGlY5eo13CQv5DaqPn7ZlXRzSv4Vnx3sW.jpeg',18000.00,1,0,NULL,'1','2017-03-20 09:09:27','2017-03-20 09:09:27'),(2,'35S0128','Lexmark MS312dn','Entry / Mid Range Monochrome Laser Printer - 35 PPM, A4, Duplex, Network - 1 Year Warranty',1,'storage/products/cyc6sYXq4VQTg7HfV4gxpmLFGIxRAiHpYfhp8ssB.jpeg',28500.00,1,0,NULL,'1','2017-03-24 10:44:54','2017-03-24 10:45:48'),(3,'28C0092','Lexmark CS310dn','Entry Level Colour Laser Printer - 25 PPM, A4, Duplex, Network - 1 Year Warranty',1,'storage/products/6gSJJzu0sqYpjLLcKr4FfRqy3Eg03GF27wJCIuWp.jpeg',55000.00,1,0,NULL,'1','2017-03-24 10:48:47','2017-03-24 10:48:47'),(4,'35S5860','Lexmark MX310dn','Entry / Mid Range Monochrome  Multi-functional Laser Printer - 35 PPM, A4, Duplex, Network - 1 Year Warranty',2,'storage/products/mWGVtoggppWTg4RFqNmnb3CTlZEYRA4sZoJIg0JI.jpeg',45000.00,1,1,15.00,'1','2017-03-24 10:54:49','2017-03-24 10:54:49'),(5,'417374','Ricoh MP 2014D','Entry Level',9,'storage/products/34AuFynlnBAKSdyF7JrQsCOojO8O2BthTV5OMUYJ.jpeg',100000.00,1,1,15.00,'1','2017-03-24 11:08:31','2017-03-24 11:08:31'),(6,'842136','Toner Cartrdige - MP 2014D / 2014AD','12,000 pages @ 5% coverage',14,'storage/products/Mkozm19lvEhYEVPB4M4zVnV7tas7mZQpzllp7Roj.jpeg',5200.00,1,1,15.00,'1','2017-03-24 11:11:50','2017-03-24 11:11:50'),(7,'243293','Ricoh DD 5450','Monochrome Single Drum Digital Duplicator - 1 year Warranty',20,'storage/products/fCxt7D4jTXxdggItD6xL39rpRnVMcjakbcDJiueb.png',565000.00,1,1,15.00,'1','2017-03-24 11:17:10','2017-03-24 11:17:10'),(8,'431173','Ricoh PJ-X2240','DLP, 3,000 Lumens, XGA - 1 Year for Projector, 1 Year or 1,000 hours for Light Source',19,'storage/products/nIxIxoPR9VhtZABRre5uRyTeC0Hz2zV5PwOHUnn3.jpeg',72000.00,1,0,NULL,'1','2017-03-24 11:23:02','2017-03-24 11:23:02');
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'harsha@ewisl.net','$2y$10$3Qr78xKWGRccyuwcfxc2Bu66HynLt3s1BO3vQBpW76JtFLHtg/4Li','Harsha Samarajiwa','781552534V',1,1,0,NULL,NULL,'1','2017-03-20 08:35:59','2017-03-20 08:35:59'),(2,'chanakah@ewisl.net','$2y$10$RrcFeDFutvWRpz0EHKjsEu5b3uuRb4BwauYKVTxaSK9BR.FlL6Wwm','Chanaka Happuarachchi','123456789V',6,1,0,NULL,1,'1','2017-03-20 09:18:01','2017-03-20 09:38:53'),(3,'bimalka@ewisl.net','$2y$10$paOV.nDPhukm6zpLJC0Ts.aJdyRNLXcmgifphxC93LmV1GZtfXEQi','Bimalka Perera','123456789V',7,1,0,NULL,1,'1','2017-03-20 09:18:43','2017-03-20 09:40:00'),(4,'asangap@ewisl.net','$2y$10$SSp1e9COdaoPvOTXo3NpuunXYPDrc1VivQ//b9EZdRc/KnuRWvvgG','Asanga Perera','123456789V',3,1,0,NULL,2,'1','2017-03-20 09:23:55','2017-03-20 09:41:28'),(5,'chandimaj@ewisl.net','$2y$10$7jnqd9WZG9/8ZA4/d2svk.y7HresN6mw.M6OHBbqPLlukJ5he0T6S','Chandima Jayasundara','123456789V',4,1,0,NULL,4,'1','2017-03-20 09:24:40','2017-03-20 09:42:03'),(6,'dineshw@ewisl.net','$2y$10$gkPGsEmWnJBQ/XFFG0lBNuxFasDs56CYI5v6qdy4teD1K6tvkQ4qO','Dinesh Wickramasinghe','123456789V',9,1,0,NULL,2,'1','2017-03-20 09:26:40','2017-03-20 09:43:23'),(7,'manjulah@ewisl.net','$2y$10$bxJt2YkQ1LkcRiJYuDwD8uG4yMr84wmGxSVXm0iwL1Na3IQVFiZY2','Manjula Hennadige','123456789V',4,1,0,NULL,6,'1','2017-03-20 09:27:43','2017-03-20 09:43:47'),(8,'amilaa@ewisl.net','$2y$10$U8jYhn3InNKbikEmAHG61OK73mQ98c5t7wpYvu0/2sLpcf.mWk.RO','Amila Atapattu/','123456789V',4,1,0,NULL,6,'1','2017-03-20 09:28:36','2017-03-20 09:43:57'),(9,'damayanthik@ewisl.net','$2y$10$QKDwyKgyRIZ2LvNV71AEqu2pnrSBSlWeGWbjGivjgzH1ZyZA34jK.','Damayanthi Kariyawasam','123456789V',5,1,0,NULL,3,'1','2017-03-20 09:30:03','2017-03-20 09:44:12'),(10,'hashanp@ewisl.net','$2y$10$tzlHM6xfnAALXeSgZAUUw.Vq80KADtX7Z3bwvV.K6bos0Dd4lQbsy','Hashan Peiris','123456789V',5,1,0,NULL,3,'1','2017-03-20 09:30:47','2017-03-20 09:44:21'),(11,'shiharaf@ewisl.net','$2y$10$pHVQ5jJNktmWrvdEkf0UPOcxAiubs5rUtJGcqLPK.2b3rRevFuNbK','Shihara Fernando','123456789V',2,1,0,NULL,NULL,'1','2017-03-20 09:46:01','2017-03-20 10:15:07'),(12,'sonalip@ewisl.net','$2y$10$ESuPyGv6ME0/UA9Q30upXuMexijp6QDy5g.T3qAHMFAXpnWWuJBQm','Sonali Perera','123456789V',2,1,0,NULL,NULL,'1','2017-03-20 10:01:58','2017-03-20 10:15:09'),(13,'dharshanf@ewisl.net','$2y$10$bMGBPe0i0EPMAq6TjCoNmuV4Yg/LLMEHszOJZxi6/epj2TGtgGKKy','Dharshan Fernando','123456789V',2,1,0,NULL,NULL,'1','2017-03-24 11:49:49','2017-03-24 11:50:31');
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

-- Dump completed on 2017-03-24 12:05:39
