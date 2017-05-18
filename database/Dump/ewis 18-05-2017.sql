/*
 Navicat Premium Data Transfer

 Source Server         : Vagrant
 Source Server Type    : MySQL
 Source Server Version : 50717
 Source Host           : 192.168.10.10
 Source Database       : ewis

 Target Server Type    : MySQL
 Target Server Version : 50717
 File Encoding         : utf-8

 Date: 05/18/2017 11:26:10 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `brands`
-- ----------------------------
DROP TABLE IF EXISTS `brands`;
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

-- ----------------------------
--  Records of `brands`
-- ----------------------------
BEGIN;
INSERT INTO `brands` VALUES ('1', 'Lexmark', 'Printers, Multi-function devices, Related Consumables, Accessories, Options, Solutions........', 'storage/brands/wdsQtO39TxfVntg8pC8ugcEbv8NqCj9NLHpsfkns.jpeg', '1', '1', '2017-03-20 03:08:41', '2017-05-04 00:09:16'), ('2', 'Konica Minolta', 'Copiers, Production Printers, Related Consumables / Supplies, Accessories, Options, Solutions........', 'storage/brands/qJWNXpDYBRGXYl7Mm9dvK17F5QqgnKEYEdOBjtXH.png', '1', '1', '2017-03-20 03:10:07', '2017-05-04 00:09:47'), ('3', 'Ricoh', 'Copiers, Production Printers, Duplicators, Projectors, Related Consumables / Supplies, Accessories, Options, Solutions........', 'storage/brands/IrnL9TJayIH3aMDvPGP865qsHSb2wHtn3uaACTXo.png', '1', '1', '2017-03-20 03:11:39', '2017-05-04 00:10:06');
COMMIT;

-- ----------------------------
--  Table structure for `c_brands`
-- ----------------------------
DROP TABLE IF EXISTS `c_brands`;
CREATE TABLE `c_brands` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `clients_branch_id` int(11) NOT NULL,
  `remove` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `c_brands`
-- ----------------------------
BEGIN;
INSERT INTO `c_brands` VALUES ('1', '1', '2', '1', '1', '2017-05-10 07:24:06', '2017-05-10 07:47:31'), ('2', '1', '2', '3', '0', '2017-05-12 06:19:38', '2017-05-12 06:19:38');
COMMIT;

-- ----------------------------
--  Table structure for `c_categories`
-- ----------------------------
DROP TABLE IF EXISTS `c_categories`;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `c_categories`
-- ----------------------------
BEGIN;
INSERT INTO `c_categories` VALUES ('1', '1', '5', '1', '1', '1', '2017-05-10 07:24:19', '2017-05-10 07:47:17'), ('2', '1', '5', '3', '2', '0', '2017-05-12 06:19:52', '2017-05-12 06:19:52'), ('3', '1', '6', '3', '2', '0', '2017-05-12 06:20:01', '2017-05-12 06:20:01');
COMMIT;

-- ----------------------------
--  Table structure for `categories`
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `categories`
-- ----------------------------
BEGIN;
INSERT INTO `categories` VALUES ('1', 'Printers', '1', 'Monochrome / Colour Printers', 'storage/categories/LzcatfjUfPFrxesKE0LhoYh3y7UZ9Orq7dhoinvs.png', '1', '1', 'Printers_1', '2017-03-20 03:14:18', '2017-03-20 03:14:18'), ('2', 'Multi-function Printers', '1', 'Monochrome / Colour multi-function printers', 'storage/categories/d4hiQNrDNxOishRBZc1mMvVFc5RamEMeWjaNrZUo.jpeg', '1', '1', 'Multi-function Printers_1', '2017-03-20 03:15:38', '2017-03-20 03:15:38'), ('3', 'Consumables', '1', 'Toners, Ink-cartridges, Ribbons, Imaging Units......', 'storage/categories/1KQGlDcoho3v2eLyxPTQ1TGRz9SU4RkQUgdhqq19.jpeg', '1', '1', 'Consumables_1', '2017-03-20 03:18:31', '2017-03-20 05:01:43'), ('5', 'Photocopiers', '2', 'Monochrome / Colour copiers', 'storage/categories/MiMtYLuhmr9yFP8Nqmdl1gSmdJseojra2a1iaWxB.jpeg', '1', '1', 'Photocopiers_2', '2017-03-20 03:22:17', '2017-03-24 04:52:06'), ('6', 'Production Printers', '2', 'Monochrome / Colour production printers', 'storage/categories/8ujpZ6NKUoEkIFDV9isBA48z8AFSaVK0AaaCbiMJ.jpeg', '1', '1', 'Production Printers_2', '2017-03-20 03:25:26', '2017-03-20 03:25:26'), ('8', 'Consumables', '2', 'Toners, Developers, Drums', 'storage/categories/QVYpo1TqqewutMA6LUEYJdo5PyEvQ2NqnSBvjtXk.jpeg', '1', '1', 'Consumables_2', '2017-03-20 03:27:16', '2017-03-24 04:52:33'), ('9', 'Photocopiers', '3', 'Monochrome / Colour copiers....', null, '1', '1', 'Photocopiers_3', '2017-03-20 03:30:38', '2017-03-20 03:30:38'), ('13', 'Production Printers', '3', 'Monochrome / Colour production printers', 'storage/categories/mZrewq10h4SgPTWgfAg2GVAq11crS6EGBvJfh6nM.jpeg', '1', '1', 'Production Printers_3', '2017-03-20 03:32:16', '2017-03-20 03:32:16'), ('14', 'Consumables', '3', 'Toners, Developer, Drums, etc', 'storage/categories/HxiGIJ4CoPyWxzwSMS1StPQhPwCCF8jHo5pMksOO.jpeg', '1', '1', 'Consumables_3', '2017-03-20 03:33:12', '2017-03-24 05:02:09'), ('15', 'Consumables', '1', 'Toners, Ink-cartridges, Ribbons, Imaging Units......', 'storage/categories/ePXs1nSqNJNDIKttWeubVTZk8ALmG1EgtCXTcavq.jpeg', '1', '0', 'Consumables_1', '2017-03-20 06:45:40', '2017-03-20 06:45:53'), ('16', 'Options / Accessories', '2', 'Paper handling options (i.e. trays, bins, finishers, duplex units, etc), Connectivity (i.e. network cards, etc) etc', 'storage/categories/lTueOqZj6w8AkoQErAgAnEQdnOcrpifucTczhpdY.jpeg', '1', '1', 'Options / Accessories_2', '2017-03-24 04:55:37', '2017-03-24 04:55:37'), ('17', 'Options / Accessories', '1', 'Paper handling options (i.e. trays, bins, finishers, duplex units, etc), Connectivity (i.e. network cards, etc) etc', 'storage/categories/7fRwwt5twKkLAhtpMCzwiVeSrAESr6DjfUh4QTbo.png', '1', '1', 'Options / Accessories_1', '2017-03-24 04:57:31', '2017-03-24 04:57:31'), ('18', 'Options / Accessories', '3', 'Paper handling options (i.e. trays, bins, finishers, duplex units, etc), Connectivity (i.e. network cards, etc) etc', 'storage/categories/FB7I81k1eC6KX4kWD7NMJ4OT7tsci7d1B4Foanet.jpeg', '1', '1', 'Options / Accessories_3', '2017-03-24 05:05:28', '2017-03-24 05:05:28'), ('19', 'Projectors', '3', 'Entry, Standard, Desk Edge, Short Throw, Ultra Short Throw, High End Projectors', 'storage/categories/yMEjDxeoNnV6inwWZkApfRsqLkRmxnzbw79GFSFG.jpeg', '1', '1', 'Projectors_3', '2017-03-24 05:08:01', '2017-03-24 05:08:01'), ('20', 'Duplicators', '3', 'Digital duplicators', 'storage/categories/IVLmH0SL2xf8j1R5mqc9pJzAwCb21ZCNQWNvTUjq.jpeg', '1', '1', 'Duplicators_3', '2017-03-24 05:10:23', '2017-03-24 05:10:23'), ('21', 'AAA', '2', 'aaa', 'storage/categories/tTldmFTzRguLe8VK7X1g5lNwOc5Nf9HwzQkiy4bU.jpeg', '1', '1', 'AAA_2', '2017-05-12 11:34:25', '2017-05-12 11:34:25'), ('22', 'AAA', '1', 'aaa', 'storage/categories/XZOXXYUS3sNk0HnW8x9eCzw8rt1bFgT2Kyu1DqgO.jpeg', '1', '1', 'AAA_1', '2017-05-12 11:34:45', '2017-05-12 11:34:45'), ('23', 'aaaa', '3', 'asdfghj', 'storage/categories/4rEklCPHCI0WSqirZrLU3O5Qf6pUdcatRovU1mA8.png', '1', '1', 'aaaa_3', '2017-05-15 11:35:29', '2017-05-15 11:35:29');
COMMIT;

-- ----------------------------
--  Table structure for `client__products`
-- ----------------------------
DROP TABLE IF EXISTS `client__products`;
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `client__products`
-- ----------------------------
BEGIN;
INSERT INTO `client__products` VALUES ('1', '1', '1', '1', '1', '10', '15000.00', '1', '2017-05-10 07:39:04', '2017-05-10 07:47:17'), ('2', '1', '2', '2', '3', '10', '15000.00', '1', '2017-05-12 06:20:26', '2017-05-13 15:45:29'), ('3', '1', '2', '3', '3', '13', '150.00', '0', '2017-05-12 06:20:51', '2017-05-12 06:20:51'), ('4', '1', '2', '2', '3', '10', '16000.00', '0', '2017-05-13 15:45:45', '2017-05-13 15:45:45');
COMMIT;

-- ----------------------------
--  Table structure for `clients`
-- ----------------------------
DROP TABLE IF EXISTS `clients`;
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `clients`
-- ----------------------------
BEGIN;
INSERT INTO `clients` VALUES ('1', '1', 'ABC Company', 'Address', '123456789', 'email@mail.com', 'storage/images/WJoDHD3cRcXC6g1FCcUljLkVwQMNNl5vqF1MLP0I.jpeg', '#ffffff', '1', '0', '2017-05-08 07:21:08', '2017-05-12 06:09:22'), ('2', '1', 'BCD Company', 'Address', '123456789', 'info@bcd.com', 'storage/images/DHuQMTGOvWITt0eKvqTqfkgdgEqM5IorsFiTXsMn.jpeg', '#ffffff', '1', '0', '2017-05-08 07:33:34', '2017-05-12 06:09:03'), ('4', '1', 'sddsv', 'sdgsdv', '1234', 'sdvsdv@sdf.ll', 'storage/images/w4ukaQbHl0zTr69l89kf2sOfZmdx5GnnuKwVasj9.ico', '#ffffff', '1', '0', '2017-05-17 15:59:44', '2017-05-17 15:59:46');
COMMIT;

-- ----------------------------
--  Table structure for `clients_branches`
-- ----------------------------
DROP TABLE IF EXISTS `clients_branches`;
CREATE TABLE `clients_branches` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` int(10) unsigned NOT NULL,
  `activation` tinyint(4) NOT NULL DEFAULT '0',
  `agent_id` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `clients_branches_client_id_index` (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `clients_branches`
-- ----------------------------
BEGIN;
INSERT INTO `clients_branches` VALUES ('1', 'Branch1', 'Address', '123456789', 'info@branch1.abc.com', '1', '0', '2', '2017-05-08 09:06:07', '2017-05-08 07:29:40'), ('3', 'Branch1', 'Address', '123456789', 'info@branch1.bcd.com', '2', '0', '3', '2017-05-12 06:26:01', '2017-05-08 07:58:12'), ('4', 'Branch1', 'asd', '12345', 'mail@mail.com', '1', '1', null, '2017-05-12 13:18:29', '2017-05-12 13:11:54'), ('5', 'LLLL', 'sdgsdg', '12345', 'mahendralakmal@gmail.com', '1', '1', null, '2017-05-12 13:19:29', '2017-05-12 13:19:15'), ('6', 'LLLL', 'sdgsdg', '12345', 'mahendralakmal@gmail.com', '1', '1', null, '2017-05-12 13:20:07', '2017-05-12 13:19:15'), ('7', 'Branch2', 'address', '12345678', 'mahendralakmal@gmail.com', '1', '1', null, '2017-05-15 09:39:11', '2017-05-15 09:00:07'), ('8', 'Branch2', 'address', '12345678', 'mahendralakmal@gmail.com', '1', '1', null, '2017-05-15 09:38:56', '2017-05-15 09:00:15'), ('9', 'Branch2', 'address', '123456789', 'mahendralakmal@gmail.com', '1', '1', null, '2017-05-15 09:05:41', '2017-05-15 09:00:42'), ('10', 'Branch2', 'Address', '123456789', 'mahendralakmal@gmail.com', '1', '1', null, '2017-05-17 14:28:10', '2017-05-15 09:39:51'), ('11', 'Branch2', 'qwertyu', '123456789', 'djhfb@mail.com', '1', '0', null, '2017-05-17 14:28:34', '2017-05-17 14:28:34'), ('12', 'Branch3', 'assa', '12345678', 'mahendralakmal@gmail.com', '1', '0', null, '2017-05-17 15:49:51', '2017-05-17 15:49:51'), ('13', 'br1', 'dsf', '12345', 'mahendralakmal@gmail.com', '4', '0', null, '2017-05-17 16:00:01', '2017-05-17 16:00:01'), ('14', 'br1', 'sdvsdv', '12345678', 'mahendralakmal@gmail.com', '4', '0', null, '2017-05-17 16:00:41', '2017-05-17 16:00:41');
COMMIT;

-- ----------------------------
--  Table structure for `clientusers`
-- ----------------------------
DROP TABLE IF EXISTS `clientusers`;
CREATE TABLE `clientusers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `client_id` int(10) DEFAULT NULL,
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
  KEY `clientusers_client_id_index` (`clients_branch_id`),
  KEY `clientusers_created_user_index` (`created_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `clientusers`
-- ----------------------------
BEGIN;
INSERT INTO `clientusers` VALUES ('1', '4', '2', '3', 'Roshan Fernando Perera', 'Client', '+94112303051', 'test@email.com', '1', '2017-05-12 05:31:45', '2017-05-13 19:37:52');
COMMIT;

-- ----------------------------
--  Table structure for `designations`
-- ----------------------------
DROP TABLE IF EXISTS `designations`;
CREATE TABLE `designations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `designations_designation_unique` (`designation`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `designations`
-- ----------------------------
BEGIN;
INSERT INTO `designations` VALUES ('1', 'Super Admin', '0', '1', '2017-05-08 06:54:22', '2017-05-08 06:54:22'), ('2', 'Client', '0', '1', '2017-05-08 06:54:22', '2017-05-08 06:54:22'), ('3', 'Admin', '0', '1', '2017-05-08 06:54:44', '2017-05-08 06:54:44'), ('4', 'ACC', '0', '1', '2017-05-08 06:54:50', '2017-05-08 06:54:50');
COMMIT;

-- ----------------------------
--  Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Table structure for `p__orders`
-- ----------------------------
DROP TABLE IF EXISTS `p__orders`;
CREATE TABLE `p__orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `clients_branch_id` int(11) NOT NULL,
  `bucket` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_cp` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_branch` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_tp` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_notes` text COLLATE utf8mb4_unicode_ci,
  `cp_notes` text COLLATE utf8mb4_unicode_ci,
  `agent_id` int(11) NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `p__orders`
-- ----------------------------
BEGIN;
INSERT INTO `p__orders` VALUES ('1', '2017-05-12 09:14:02', '2017-05-13 05:04:54', '3', 'O:10:\"App\\Bucket\":3:{s:5:\"items\";a:2:{s:5:\"AS123\";a:3:{s:3:\"qty\";s:1:\"1\";s:5:\"price\";d:15000;s:4:\"item\";O:11:\"App\\Product\":24:{s:11:\"\0*\0fillable\";a:10:{i:0;s:7:\"part_no\";i:1;s:4:\"name\";i:2;s:11:\"description\";i:3;s:11:\"category_id\";i:4;s:5:\"image\";i:5;s:13:\"default_price\";i:6;s:7:\"user_id\";i:7;s:6:\"status\";i:8;s:3:\"vat\";i:9;s:9:\"vat_apply\";}s:13:\"\0*\0connection\";N;s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:10;s:7:\"part_no\";s:5:\"AS123\";s:4:\"name\";s:5:\"AS123\";s:11:\"description\";s:11:\"description\";s:11:\"category_id\";i:5;s:5:\"image\";s:62:\"storage/products/R3iJ4Kl8s4N3A0k9cIHEXPrj2gCscOWR5zvlSbWu.jpeg\";s:13:\"default_price\";s:8:\"15000.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:1;s:3:\"vat\";d:15;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-09 06:58:51\";s:10:\"updated_at\";s:19:\"2017-05-09 06:58:51\";}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:10;s:7:\"part_no\";s:5:\"AS123\";s:4:\"name\";s:5:\"AS123\";s:11:\"description\";s:11:\"description\";s:11:\"category_id\";i:5;s:5:\"image\";s:62:\"storage/products/R3iJ4Kl8s4N3A0k9cIHEXPrj2gCscOWR5zvlSbWu.jpeg\";s:13:\"default_price\";s:8:\"15000.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:1;s:3:\"vat\";d:15;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-09 06:58:51\";s:10:\"updated_at\";s:19:\"2017-05-09 06:58:51\";}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:9:\"\0*\0events\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:7:\"ert2345\";a:3:{s:3:\"qty\";s:1:\"1\";s:5:\"price\";d:100;s:4:\"item\";O:11:\"App\\Product\":24:{s:11:\"\0*\0fillable\";a:10:{i:0;s:7:\"part_no\";i:1;s:4:\"name\";i:2;s:11:\"description\";i:3;s:11:\"category_id\";i:4;s:5:\"image\";i:5;s:13:\"default_price\";i:6;s:7:\"user_id\";i:7;s:6:\"status\";i:8;s:3:\"vat\";i:9;s:9:\"vat_apply\";}s:13:\"\0*\0connection\";N;s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:13;s:7:\"part_no\";s:7:\"ert2345\";s:4:\"name\";s:7:\"ert2345\";s:11:\"description\";s:7:\"ert2345\";s:11:\"category_id\";i:6;s:5:\"image\";s:61:\"storage/products/jkt5SC0BFwUlj4w1xyk9FtAZO9ngFqD2r5SpwYvZ.png\";s:13:\"default_price\";s:6:\"100.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:1;s:3:\"vat\";d:15;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-09 11:11:45\";s:10:\"updated_at\";s:19:\"2017-05-09 11:11:45\";}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:13;s:7:\"part_no\";s:7:\"ert2345\";s:4:\"name\";s:7:\"ert2345\";s:11:\"description\";s:7:\"ert2345\";s:11:\"category_id\";i:6;s:5:\"image\";s:61:\"storage/products/jkt5SC0BFwUlj4w1xyk9FtAZO9ngFqD2r5SpwYvZ.png\";s:13:\"default_price\";s:6:\"100.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:1;s:3:\"vat\";d:15;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-09 11:11:45\";s:10:\"updated_at\";s:19:\"2017-05-09 11:11:45\";}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:9:\"\0*\0events\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}}s:8:\"totalQty\";i:2;s:10:\"totalPrice\";d:15100;}', 'Test', 'Branch1', '+94112303051', null, null, '3', 'P'), ('2', '2017-05-12 09:23:12', '2017-05-13 04:50:15', '3', 'O:10:\"App\\Bucket\":3:{s:5:\"items\";a:2:{s:5:\"AS123\";a:3:{s:3:\"qty\";s:1:\"1\";s:5:\"price\";d:15000;s:4:\"item\";O:11:\"App\\Product\":24:{s:11:\"\0*\0fillable\";a:10:{i:0;s:7:\"part_no\";i:1;s:4:\"name\";i:2;s:11:\"description\";i:3;s:11:\"category_id\";i:4;s:5:\"image\";i:5;s:13:\"default_price\";i:6;s:7:\"user_id\";i:7;s:6:\"status\";i:8;s:3:\"vat\";i:9;s:9:\"vat_apply\";}s:13:\"\0*\0connection\";N;s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:10;s:7:\"part_no\";s:5:\"AS123\";s:4:\"name\";s:5:\"AS123\";s:11:\"description\";s:11:\"description\";s:11:\"category_id\";i:5;s:5:\"image\";s:62:\"storage/products/R3iJ4Kl8s4N3A0k9cIHEXPrj2gCscOWR5zvlSbWu.jpeg\";s:13:\"default_price\";s:8:\"15000.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:1;s:3:\"vat\";d:15;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-09 06:58:51\";s:10:\"updated_at\";s:19:\"2017-05-09 06:58:51\";}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:10;s:7:\"part_no\";s:5:\"AS123\";s:4:\"name\";s:5:\"AS123\";s:11:\"description\";s:11:\"description\";s:11:\"category_id\";i:5;s:5:\"image\";s:62:\"storage/products/R3iJ4Kl8s4N3A0k9cIHEXPrj2gCscOWR5zvlSbWu.jpeg\";s:13:\"default_price\";s:8:\"15000.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:1;s:3:\"vat\";d:15;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-09 06:58:51\";s:10:\"updated_at\";s:19:\"2017-05-09 06:58:51\";}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:9:\"\0*\0events\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:7:\"ert2345\";a:3:{s:3:\"qty\";s:1:\"1\";s:5:\"price\";d:100;s:4:\"item\";O:11:\"App\\Product\":24:{s:11:\"\0*\0fillable\";a:10:{i:0;s:7:\"part_no\";i:1;s:4:\"name\";i:2;s:11:\"description\";i:3;s:11:\"category_id\";i:4;s:5:\"image\";i:5;s:13:\"default_price\";i:6;s:7:\"user_id\";i:7;s:6:\"status\";i:8;s:3:\"vat\";i:9;s:9:\"vat_apply\";}s:13:\"\0*\0connection\";N;s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:13;s:7:\"part_no\";s:7:\"ert2345\";s:4:\"name\";s:7:\"ert2345\";s:11:\"description\";s:7:\"ert2345\";s:11:\"category_id\";i:6;s:5:\"image\";s:61:\"storage/products/jkt5SC0BFwUlj4w1xyk9FtAZO9ngFqD2r5SpwYvZ.png\";s:13:\"default_price\";s:6:\"100.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:1;s:3:\"vat\";d:15;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-09 11:11:45\";s:10:\"updated_at\";s:19:\"2017-05-09 11:11:45\";}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:13;s:7:\"part_no\";s:7:\"ert2345\";s:4:\"name\";s:7:\"ert2345\";s:11:\"description\";s:7:\"ert2345\";s:11:\"category_id\";i:6;s:5:\"image\";s:61:\"storage/products/jkt5SC0BFwUlj4w1xyk9FtAZO9ngFqD2r5SpwYvZ.png\";s:13:\"default_price\";s:6:\"100.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:1;s:3:\"vat\";d:15;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-09 11:11:45\";s:10:\"updated_at\";s:19:\"2017-05-09 11:11:45\";}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:9:\"\0*\0events\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}}s:8:\"totalQty\";i:2;s:10:\"totalPrice\";d:15100;}', 'Test', 'Branch1', '+94112303051', null, null, '3', 'C'), ('3', '2017-05-13 05:32:25', '2017-05-13 05:44:17', '3', 'O:10:\"App\\Bucket\":3:{s:5:\"items\";a:1:{s:5:\"AS123\";a:3:{s:3:\"qty\";i:2;s:5:\"price\";d:30000;s:4:\"item\";O:11:\"App\\Product\":24:{s:11:\"\0*\0fillable\";a:10:{i:0;s:7:\"part_no\";i:1;s:4:\"name\";i:2;s:11:\"description\";i:3;s:11:\"category_id\";i:4;s:5:\"image\";i:5;s:13:\"default_price\";i:6;s:7:\"user_id\";i:7;s:6:\"status\";i:8;s:3:\"vat\";i:9;s:9:\"vat_apply\";}s:13:\"\0*\0connection\";N;s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:10;s:7:\"part_no\";s:5:\"AS123\";s:4:\"name\";s:5:\"AS123\";s:11:\"description\";s:11:\"description\";s:11:\"category_id\";i:5;s:5:\"image\";s:62:\"storage/products/R3iJ4Kl8s4N3A0k9cIHEXPrj2gCscOWR5zvlSbWu.jpeg\";s:13:\"default_price\";s:8:\"15000.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:1;s:3:\"vat\";d:15;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-09 06:58:51\";s:10:\"updated_at\";s:19:\"2017-05-09 06:58:51\";}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:10;s:7:\"part_no\";s:5:\"AS123\";s:4:\"name\";s:5:\"AS123\";s:11:\"description\";s:11:\"description\";s:11:\"category_id\";i:5;s:5:\"image\";s:62:\"storage/products/R3iJ4Kl8s4N3A0k9cIHEXPrj2gCscOWR5zvlSbWu.jpeg\";s:13:\"default_price\";s:8:\"15000.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:1;s:3:\"vat\";d:15;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-09 06:58:51\";s:10:\"updated_at\";s:19:\"2017-05-09 06:58:51\";}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:9:\"\0*\0events\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}}s:8:\"totalQty\";i:2;s:10:\"totalPrice\";d:45000;}', 'Test', 'Branch1', '+94112303051', null, null, '3', 'PC'), ('4', '2017-05-13 05:32:37', '2017-05-13 05:32:37', '3', 'O:10:\"App\\Bucket\":3:{s:5:\"items\";a:1:{s:5:\"AS123\";a:3:{s:3:\"qty\";i:2;s:5:\"price\";d:30000;s:4:\"item\";O:11:\"App\\Product\":24:{s:11:\"\0*\0fillable\";a:10:{i:0;s:7:\"part_no\";i:1;s:4:\"name\";i:2;s:11:\"description\";i:3;s:11:\"category_id\";i:4;s:5:\"image\";i:5;s:13:\"default_price\";i:6;s:7:\"user_id\";i:7;s:6:\"status\";i:8;s:3:\"vat\";i:9;s:9:\"vat_apply\";}s:13:\"\0*\0connection\";N;s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:10;s:7:\"part_no\";s:5:\"AS123\";s:4:\"name\";s:5:\"AS123\";s:11:\"description\";s:11:\"description\";s:11:\"category_id\";i:5;s:5:\"image\";s:62:\"storage/products/R3iJ4Kl8s4N3A0k9cIHEXPrj2gCscOWR5zvlSbWu.jpeg\";s:13:\"default_price\";s:8:\"15000.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:1;s:3:\"vat\";d:15;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-09 06:58:51\";s:10:\"updated_at\";s:19:\"2017-05-09 06:58:51\";}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:10;s:7:\"part_no\";s:5:\"AS123\";s:4:\"name\";s:5:\"AS123\";s:11:\"description\";s:11:\"description\";s:11:\"category_id\";i:5;s:5:\"image\";s:62:\"storage/products/R3iJ4Kl8s4N3A0k9cIHEXPrj2gCscOWR5zvlSbWu.jpeg\";s:13:\"default_price\";s:8:\"15000.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:1;s:3:\"vat\";d:15;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-09 06:58:51\";s:10:\"updated_at\";s:19:\"2017-05-09 06:58:51\";}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:9:\"\0*\0events\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}}s:8:\"totalQty\";i:2;s:10:\"totalPrice\";d:45000;}', 'Test', 'Branch1', '+94112303051', null, null, '3', 'P'), ('5', '2017-05-13 05:33:22', '2017-05-13 05:33:22', '3', 'O:10:\"App\\Bucket\":3:{s:5:\"items\";a:1:{s:7:\"ert2345\";a:3:{s:3:\"qty\";i:3;s:5:\"price\";d:300;s:4:\"item\";O:11:\"App\\Product\":24:{s:11:\"\0*\0fillable\";a:10:{i:0;s:7:\"part_no\";i:1;s:4:\"name\";i:2;s:11:\"description\";i:3;s:11:\"category_id\";i:4;s:5:\"image\";i:5;s:13:\"default_price\";i:6;s:7:\"user_id\";i:7;s:6:\"status\";i:8;s:3:\"vat\";i:9;s:9:\"vat_apply\";}s:13:\"\0*\0connection\";N;s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:13;s:7:\"part_no\";s:7:\"ert2345\";s:4:\"name\";s:7:\"ert2345\";s:11:\"description\";s:7:\"ert2345\";s:11:\"category_id\";i:6;s:5:\"image\";s:61:\"storage/products/jkt5SC0BFwUlj4w1xyk9FtAZO9ngFqD2r5SpwYvZ.png\";s:13:\"default_price\";s:6:\"100.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:1;s:3:\"vat\";d:15;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-09 11:11:45\";s:10:\"updated_at\";s:19:\"2017-05-09 11:11:45\";}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:13;s:7:\"part_no\";s:7:\"ert2345\";s:4:\"name\";s:7:\"ert2345\";s:11:\"description\";s:7:\"ert2345\";s:11:\"category_id\";i:6;s:5:\"image\";s:61:\"storage/products/jkt5SC0BFwUlj4w1xyk9FtAZO9ngFqD2r5SpwYvZ.png\";s:13:\"default_price\";s:6:\"100.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:1;s:3:\"vat\";d:15;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-09 11:11:45\";s:10:\"updated_at\";s:19:\"2017-05-09 11:11:45\";}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:9:\"\0*\0events\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}}s:8:\"totalQty\";i:3;s:10:\"totalPrice\";d:600;}', 'Test', 'Branch1', '+94112303051', null, null, '3', 'P'), ('6', '2017-05-13 05:34:26', '2017-05-13 05:34:26', '3', 'O:10:\"App\\Bucket\":3:{s:5:\"items\";a:2:{s:5:\"AS123\";a:3:{s:3:\"qty\";i:3;s:5:\"price\";d:45000;s:4:\"item\";O:11:\"App\\Product\":24:{s:11:\"\0*\0fillable\";a:10:{i:0;s:7:\"part_no\";i:1;s:4:\"name\";i:2;s:11:\"description\";i:3;s:11:\"category_id\";i:4;s:5:\"image\";i:5;s:13:\"default_price\";i:6;s:7:\"user_id\";i:7;s:6:\"status\";i:8;s:3:\"vat\";i:9;s:9:\"vat_apply\";}s:13:\"\0*\0connection\";N;s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:10;s:7:\"part_no\";s:5:\"AS123\";s:4:\"name\";s:5:\"AS123\";s:11:\"description\";s:11:\"description\";s:11:\"category_id\";i:5;s:5:\"image\";s:62:\"storage/products/R3iJ4Kl8s4N3A0k9cIHEXPrj2gCscOWR5zvlSbWu.jpeg\";s:13:\"default_price\";s:8:\"15000.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:1;s:3:\"vat\";d:15;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-09 06:58:51\";s:10:\"updated_at\";s:19:\"2017-05-09 06:58:51\";}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:10;s:7:\"part_no\";s:5:\"AS123\";s:4:\"name\";s:5:\"AS123\";s:11:\"description\";s:11:\"description\";s:11:\"category_id\";i:5;s:5:\"image\";s:62:\"storage/products/R3iJ4Kl8s4N3A0k9cIHEXPrj2gCscOWR5zvlSbWu.jpeg\";s:13:\"default_price\";s:8:\"15000.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:1;s:3:\"vat\";d:15;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-09 06:58:51\";s:10:\"updated_at\";s:19:\"2017-05-09 06:58:51\";}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:9:\"\0*\0events\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:7:\"ert2345\";a:3:{s:3:\"qty\";i:2;s:5:\"price\";d:200;s:4:\"item\";O:11:\"App\\Product\":24:{s:11:\"\0*\0fillable\";a:10:{i:0;s:7:\"part_no\";i:1;s:4:\"name\";i:2;s:11:\"description\";i:3;s:11:\"category_id\";i:4;s:5:\"image\";i:5;s:13:\"default_price\";i:6;s:7:\"user_id\";i:7;s:6:\"status\";i:8;s:3:\"vat\";i:9;s:9:\"vat_apply\";}s:13:\"\0*\0connection\";N;s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:13;s:7:\"part_no\";s:7:\"ert2345\";s:4:\"name\";s:7:\"ert2345\";s:11:\"description\";s:7:\"ert2345\";s:11:\"category_id\";i:6;s:5:\"image\";s:61:\"storage/products/jkt5SC0BFwUlj4w1xyk9FtAZO9ngFqD2r5SpwYvZ.png\";s:13:\"default_price\";s:6:\"100.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:1;s:3:\"vat\";d:15;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-09 11:11:45\";s:10:\"updated_at\";s:19:\"2017-05-09 11:11:45\";}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:13;s:7:\"part_no\";s:7:\"ert2345\";s:4:\"name\";s:7:\"ert2345\";s:11:\"description\";s:7:\"ert2345\";s:11:\"category_id\";i:6;s:5:\"image\";s:61:\"storage/products/jkt5SC0BFwUlj4w1xyk9FtAZO9ngFqD2r5SpwYvZ.png\";s:13:\"default_price\";s:6:\"100.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:1;s:3:\"vat\";d:15;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-09 11:11:45\";s:10:\"updated_at\";s:19:\"2017-05-09 11:11:45\";}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:9:\"\0*\0events\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}}s:8:\"totalQty\";i:5;s:10:\"totalPrice\";d:90300;}', 'Test', 'Branch1', '+94112303051', null, null, '3', 'P'), ('7', '2017-05-13 05:35:24', '2017-05-13 09:44:04', '3', 'O:10:\"App\\Bucket\":3:{s:5:\"items\";a:1:{s:7:\"ert2345\";a:3:{s:3:\"qty\";i:3;s:5:\"price\";d:300;s:4:\"item\";O:11:\"App\\Product\":24:{s:11:\"\0*\0fillable\";a:10:{i:0;s:7:\"part_no\";i:1;s:4:\"name\";i:2;s:11:\"description\";i:3;s:11:\"category_id\";i:4;s:5:\"image\";i:5;s:13:\"default_price\";i:6;s:7:\"user_id\";i:7;s:6:\"status\";i:8;s:3:\"vat\";i:9;s:9:\"vat_apply\";}s:13:\"\0*\0connection\";N;s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:13;s:7:\"part_no\";s:7:\"ert2345\";s:4:\"name\";s:7:\"ert2345\";s:11:\"description\";s:7:\"ert2345\";s:11:\"category_id\";i:6;s:5:\"image\";s:61:\"storage/products/jkt5SC0BFwUlj4w1xyk9FtAZO9ngFqD2r5SpwYvZ.png\";s:13:\"default_price\";s:6:\"100.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:1;s:3:\"vat\";d:15;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-09 11:11:45\";s:10:\"updated_at\";s:19:\"2017-05-09 11:11:45\";}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:13;s:7:\"part_no\";s:7:\"ert2345\";s:4:\"name\";s:7:\"ert2345\";s:11:\"description\";s:7:\"ert2345\";s:11:\"category_id\";i:6;s:5:\"image\";s:61:\"storage/products/jkt5SC0BFwUlj4w1xyk9FtAZO9ngFqD2r5SpwYvZ.png\";s:13:\"default_price\";s:6:\"100.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:1;s:3:\"vat\";d:15;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-09 11:11:45\";s:10:\"updated_at\";s:19:\"2017-05-09 11:11:45\";}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:9:\"\0*\0events\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}}s:8:\"totalQty\";i:3;s:10:\"totalPrice\";d:600;}', 'Test', 'Branch1', '+94112303051', null, null, '3', 'PC'), ('8', '2017-05-13 05:36:24', '2017-05-13 10:40:19', '3', 'O:10:\"App\\Bucket\":3:{s:5:\"items\";a:2:{s:7:\"ert2345\";a:3:{s:3:\"qty\";s:1:\"3\";s:5:\"price\";d:300;s:4:\"item\";O:11:\"App\\Product\":24:{s:11:\"\0*\0fillable\";a:10:{i:0;s:7:\"part_no\";i:1;s:4:\"name\";i:2;s:11:\"description\";i:3;s:11:\"category_id\";i:4;s:5:\"image\";i:5;s:13:\"default_price\";i:6;s:7:\"user_id\";i:7;s:6:\"status\";i:8;s:3:\"vat\";i:9;s:9:\"vat_apply\";}s:13:\"\0*\0connection\";N;s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:13;s:7:\"part_no\";s:7:\"ert2345\";s:4:\"name\";s:7:\"ert2345\";s:11:\"description\";s:7:\"ert2345\";s:11:\"category_id\";i:6;s:5:\"image\";s:61:\"storage/products/jkt5SC0BFwUlj4w1xyk9FtAZO9ngFqD2r5SpwYvZ.png\";s:13:\"default_price\";s:6:\"100.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:1;s:3:\"vat\";d:15;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-09 11:11:45\";s:10:\"updated_at\";s:19:\"2017-05-09 11:11:45\";}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:13;s:7:\"part_no\";s:7:\"ert2345\";s:4:\"name\";s:7:\"ert2345\";s:11:\"description\";s:7:\"ert2345\";s:11:\"category_id\";i:6;s:5:\"image\";s:61:\"storage/products/jkt5SC0BFwUlj4w1xyk9FtAZO9ngFqD2r5SpwYvZ.png\";s:13:\"default_price\";s:6:\"100.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:1;s:3:\"vat\";d:15;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-09 11:11:45\";s:10:\"updated_at\";s:19:\"2017-05-09 11:11:45\";}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:9:\"\0*\0events\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:5:\"AS123\";a:3:{s:3:\"qty\";s:1:\"5\";s:5:\"price\";d:75000;s:4:\"item\";O:11:\"App\\Product\":24:{s:11:\"\0*\0fillable\";a:10:{i:0;s:7:\"part_no\";i:1;s:4:\"name\";i:2;s:11:\"description\";i:3;s:11:\"category_id\";i:4;s:5:\"image\";i:5;s:13:\"default_price\";i:6;s:7:\"user_id\";i:7;s:6:\"status\";i:8;s:3:\"vat\";i:9;s:9:\"vat_apply\";}s:13:\"\0*\0connection\";N;s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:10;s:7:\"part_no\";s:5:\"AS123\";s:4:\"name\";s:5:\"AS123\";s:11:\"description\";s:11:\"description\";s:11:\"category_id\";i:5;s:5:\"image\";s:62:\"storage/products/R3iJ4Kl8s4N3A0k9cIHEXPrj2gCscOWR5zvlSbWu.jpeg\";s:13:\"default_price\";s:8:\"15000.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:1;s:3:\"vat\";d:15;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-09 06:58:51\";s:10:\"updated_at\";s:19:\"2017-05-09 06:58:51\";}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:10;s:7:\"part_no\";s:5:\"AS123\";s:4:\"name\";s:5:\"AS123\";s:11:\"description\";s:11:\"description\";s:11:\"category_id\";i:5;s:5:\"image\";s:62:\"storage/products/R3iJ4Kl8s4N3A0k9cIHEXPrj2gCscOWR5zvlSbWu.jpeg\";s:13:\"default_price\";s:8:\"15000.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:1;s:3:\"vat\";d:15;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-09 06:58:51\";s:10:\"updated_at\";s:19:\"2017-05-09 06:58:51\";}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:9:\"\0*\0events\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}}s:8:\"totalQty\";i:8;s:10:\"totalPrice\";d:75300;}', 'Test', 'Branch1', '+94112303051', null, null, '3', 'C'), ('9', '2017-05-13 05:37:16', '2017-05-13 05:37:16', '3', 'O:10:\"App\\Bucket\":3:{s:5:\"items\";a:1:{s:7:\"ert2345\";a:3:{s:3:\"qty\";s:1:\"6\";s:5:\"price\";d:600;s:4:\"item\";O:11:\"App\\Product\":24:{s:11:\"\0*\0fillable\";a:10:{i:0;s:7:\"part_no\";i:1;s:4:\"name\";i:2;s:11:\"description\";i:3;s:11:\"category_id\";i:4;s:5:\"image\";i:5;s:13:\"default_price\";i:6;s:7:\"user_id\";i:7;s:6:\"status\";i:8;s:3:\"vat\";i:9;s:9:\"vat_apply\";}s:13:\"\0*\0connection\";N;s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:13;s:7:\"part_no\";s:7:\"ert2345\";s:4:\"name\";s:7:\"ert2345\";s:11:\"description\";s:7:\"ert2345\";s:11:\"category_id\";i:6;s:5:\"image\";s:61:\"storage/products/jkt5SC0BFwUlj4w1xyk9FtAZO9ngFqD2r5SpwYvZ.png\";s:13:\"default_price\";s:6:\"100.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:1;s:3:\"vat\";d:15;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-09 11:11:45\";s:10:\"updated_at\";s:19:\"2017-05-09 11:11:45\";}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:13;s:7:\"part_no\";s:7:\"ert2345\";s:4:\"name\";s:7:\"ert2345\";s:11:\"description\";s:7:\"ert2345\";s:11:\"category_id\";i:6;s:5:\"image\";s:61:\"storage/products/jkt5SC0BFwUlj4w1xyk9FtAZO9ngFqD2r5SpwYvZ.png\";s:13:\"default_price\";s:6:\"100.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:1;s:3:\"vat\";d:15;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-09 11:11:45\";s:10:\"updated_at\";s:19:\"2017-05-09 11:11:45\";}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:9:\"\0*\0events\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}}s:8:\"totalQty\";i:6;s:10:\"totalPrice\";d:600;}', 'Test', 'Branch1', '+94112303051', null, null, '3', 'P'), ('10', '2017-05-13 05:38:58', '2017-05-13 05:38:58', '3', 'O:10:\"App\\Bucket\":3:{s:5:\"items\";a:1:{s:5:\"AS123\";a:3:{s:3:\"qty\";s:2:\"19\";s:5:\"price\";d:285000;s:4:\"item\";O:11:\"App\\Product\":24:{s:11:\"\0*\0fillable\";a:10:{i:0;s:7:\"part_no\";i:1;s:4:\"name\";i:2;s:11:\"description\";i:3;s:11:\"category_id\";i:4;s:5:\"image\";i:5;s:13:\"default_price\";i:6;s:7:\"user_id\";i:7;s:6:\"status\";i:8;s:3:\"vat\";i:9;s:9:\"vat_apply\";}s:13:\"\0*\0connection\";N;s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:10;s:7:\"part_no\";s:5:\"AS123\";s:4:\"name\";s:5:\"AS123\";s:11:\"description\";s:11:\"description\";s:11:\"category_id\";i:5;s:5:\"image\";s:62:\"storage/products/R3iJ4Kl8s4N3A0k9cIHEXPrj2gCscOWR5zvlSbWu.jpeg\";s:13:\"default_price\";s:8:\"15000.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:1;s:3:\"vat\";d:15;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-09 06:58:51\";s:10:\"updated_at\";s:19:\"2017-05-09 06:58:51\";}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:10;s:7:\"part_no\";s:5:\"AS123\";s:4:\"name\";s:5:\"AS123\";s:11:\"description\";s:11:\"description\";s:11:\"category_id\";i:5;s:5:\"image\";s:62:\"storage/products/R3iJ4Kl8s4N3A0k9cIHEXPrj2gCscOWR5zvlSbWu.jpeg\";s:13:\"default_price\";s:8:\"15000.00\";s:6:\"status\";i:1;s:9:\"vat_apply\";i:1;s:3:\"vat\";d:15;s:7:\"user_id\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-05-09 06:58:51\";s:10:\"updated_at\";s:19:\"2017-05-09 06:58:51\";}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:9:\"\0*\0events\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}}s:8:\"totalQty\";i:19;s:10:\"totalPrice\";d:285000;}', 'Test', 'Branch1', '+94112303051', null, null, '3', 'P');
COMMIT;

-- ----------------------------
--  Table structure for `password_resets`
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Table structure for `privileges`
-- ----------------------------
DROP TABLE IF EXISTS `privileges`;
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
  `manage_client` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `privileges_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `privileges`
-- ----------------------------
BEGIN;
INSERT INTO `privileges` VALUES ('1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '2017-05-08 06:54:22', '2017-05-08 06:54:22', '1'), ('3', '2', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '2', '2017-05-08 07:01:03', '2017-05-08 07:08:27', '1'), ('4', '3', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '3', '2017-05-10 08:14:57', '2017-05-12 06:29:34', '1'), ('5', '5', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '5', '2017-05-13 17:20:33', '2017-05-13 18:16:05', '1');
COMMIT;

-- ----------------------------
--  Table structure for `products`
-- ----------------------------
DROP TABLE IF EXISTS `products`;
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `products`
-- ----------------------------
BEGIN;
INSERT INTO `products` VALUES ('1', '50F0Z00', '500Z Black Return Program Imaging Unit', 'Up to 60000 pages, based on 3 average letter/A4-size pages per print job and ~ 5% coverage', '3', 'storage/products/9jrwUeAEGlY5eo13CQv5DaqPn7ZlXRzSv4Vnx3sW.jpeg', '18000.00', '1', '0', null, '1', '2017-03-20 03:39:27', '2017-03-20 03:39:27'), ('2', '35S0128', 'Lexmark MS312dn', 'Entry / Mid Range Monochrome Laser Printer - 35 PPM, A4, Duplex, Network - 1 Year Warranty', '1', 'storage/products/cyc6sYXq4VQTg7HfV4gxpmLFGIxRAiHpYfhp8ssB.jpeg', '28500.00', '1', '0', null, '1', '2017-03-24 05:14:54', '2017-03-24 05:15:48'), ('3', '28C0092', 'Lexmark CS310dn', 'Entry Level Colour Laser Printer - 25 PPM, A4, Duplex, Network - 1 Year Warranty', '1', 'storage/products/6gSJJzu0sqYpjLLcKr4FfRqy3Eg03GF27wJCIuWp.jpeg', '55000.00', '0', '0', null, '1', '2017-03-24 05:18:47', '2017-05-09 08:15:01'), ('4', '35S5860', 'Lexmark MX310dn', 'Entry / Mid Range Monochrome  Multi-functional Laser Printer - 35 PPM, A4, Duplex, Network - 1 Year Warranty', '2', 'storage/products/mWGVtoggppWTg4RFqNmnb3CTlZEYRA4sZoJIg0JI.jpeg', '45000.00', '1', '1', '15.00', '1', '2017-03-24 05:24:49', '2017-03-24 05:24:49'), ('5', '417374', 'Ricoh MP 2014D', 'Entry Level', '9', 'storage/products/34AuFynlnBAKSdyF7JrQsCOojO8O2BthTV5OMUYJ.jpeg', '100000.00', '1', '1', '15.00', '1', '2017-03-24 05:38:31', '2017-03-24 05:38:31'), ('6', '842136', 'Toner Cartrdige - MP 2014D / 2014AD', '12,000 pages @ 5% coverage', '14', 'storage/products/Mkozm19lvEhYEVPB4M4zVnV7tas7mZQpzllp7Roj.jpeg', '5200.00', '1', '1', '15.00', '1', '2017-03-24 05:41:50', '2017-03-24 05:41:50'), ('7', '243293', 'Ricoh DD 5450', 'Monochrome Single Drum Digital Duplicator - 1 year Warranty', '20', 'storage/products/fCxt7D4jTXxdggItD6xL39rpRnVMcjakbcDJiueb.png', '565000.00', '1', '1', '15.00', '1', '2017-03-24 05:47:10', '2017-03-24 05:47:10'), ('8', '431173', 'Ricoh PJ-X2240', 'DLP, 3,000 Lumens, XGA - 1 Year for Projector, 1 Year or 1,000 hours for Light Source', '19', 'storage/products/nIxIxoPR9VhtZABRre5uRyTeC0Hz2zV5PwOHUnn3.jpeg', '72000.00', '1', '0', null, '1', '2017-03-24 05:53:02', '2017-03-24 05:53:02'), ('9', '1234', 'AAAAA', 'asdfgh', '18', 'storage/products/mXmA1rMxPAVOUM3pkiAqJytRcPtVSXLahM9R0WoK.jpeg', '25000.00', '1', '1', '15.00', '1', '2017-05-05 06:20:27', '2017-05-05 06:20:27'), ('10', 'AS123', 'AS123', 'description', '5', 'storage/products/R3iJ4Kl8s4N3A0k9cIHEXPrj2gCscOWR5zvlSbWu.jpeg', '15000.00', '1', '1', '15.00', '1', '2017-05-09 06:58:51', '2017-05-09 06:58:51'), ('11', 'qwe1234', 'QWERTY', 'sdv', '16', 'storage/products/Qi9N7s0e0ixfZJyeVZtt8jHfTTZIrC2cI6tUSJBU.jpeg', '500.00', '1', '1', '15.00', '1', '2017-05-09 10:36:44', '2017-05-09 10:36:44'), ('12', 'qwe234', 'qwr', 'asvsdv', '16', 'storage/products/NHUAeJ87zHVRl1oxwYbu3EXKRVyx11rRHVe1mwNy.png', '200.00', '1', '1', '15.00', '1', '2017-05-09 10:38:02', '2017-05-09 10:38:02'), ('13', 'ert2345', 'ert2345', 'ert2345', '6', 'storage/products/jkt5SC0BFwUlj4w1xyk9FtAZO9ngFqD2r5SpwYvZ.png', '100.00', '1', '1', '15.00', '1', '2017-05-09 11:11:45', '2017-05-09 11:11:45');
COMMIT;

-- ----------------------------
--  Table structure for `user_profiles`
-- ----------------------------
DROP TABLE IF EXISTS `user_profiles`;
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

-- ----------------------------
--  Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `users`
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES ('1', 'harsha@ewisl.net', '$2y$10$lV7HaYWIn0I0hOOpSrWkTO.eQhT.rSdW4oagFOmbYAhMgfTQAo/eS', 'Harsha', '123456789123', '1', '1', '0', null, null, '1', '2017-05-08 06:54:22', '2017-05-08 06:54:22'), ('2', 'abc@mail.com', '$2y$10$LLYf.hEB2ggIew.WB/hTWepvheNU.fiGOcQj0MHm3e3veC/ebMZdu', 'ABC Perera', '123456789V', '3', '1', '0', null, '1', '1', '2017-05-08 06:55:39', '2017-05-08 06:55:47'), ('3', 'lakmal@mail.com', '$2y$10$OIKtumC/vH7P.j1o9fuKy.XGGvyeT5TXoIo3jKphafX0PxOH5acR2', 'Lakmal', '123456789V', '4', '1', '0', null, '1', '1', '2017-05-10 08:13:59', '2017-05-12 06:26:21'), ('4', 'test@email.com', '$2y$10$bq7L5DMeMOJmJILWGLN5AuE7A6MKniOvU0z7ZoTyQH4igWUYVqcE.', 'Test', '123456789V', '2', '1', '0', null, null, '1', '2017-05-12 05:31:08', '2017-05-13 19:38:37'), ('5', 'roshan@mail.com', '$2y$10$YkNWd0mvxOoDPs2ABirCW.LGV3ikyh1MshH1esttNdXnhthoJV7eu', 'Roshan', '123456789', '4', '1', '0', null, '1', '1', '2017-05-13 17:19:31', '2017-05-18 05:52:45'), ('6', 'amal@mail.com', '$2y$10$TwiOjy/jkPfntE2LsUSxtuwhn1mBHxMaoY4V91DqMGx4Zc3sUp862', 'Amal Perera', '123456789V', '4', '0', '1', null, '1', '1', '2017-05-17 06:41:51', '2017-05-17 06:50:26');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
