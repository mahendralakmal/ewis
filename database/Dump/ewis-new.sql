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

 Date: 02/16/2017 14:17:35 PM
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
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `brands_title_unique` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `brands`
-- ----------------------------
BEGIN;
INSERT INTO `brands` VALUES ('1', 'Lexmark', 'Lexmark', 'Lexmark157.png', '2017-01-24 18:26:35', '2017-01-24 18:26:39', '1', '0'), ('2', 'Casio', 'Casio', 'Casio157.png', '2017-01-24 18:27:39', '2017-01-24 18:27:42', '1', '0'), ('3', 'Ricoh', 'Ricoh', 'Rich157.png', '2017-01-24 18:28:05', '2017-01-24 18:28:10', '1', '0'), ('4', 'Konica Minolta', 'Konica Minolta', 'Konica157.png', '2017-01-24 18:26:35', '2017-01-24 18:26:39', '1', '0'), ('5', 'Fujifilm', 'Fujifilm', 'Fuji157.png', '2017-01-24 18:27:39', '2017-01-24 18:27:42', '1', '0'), ('6', 'Riello UPS', 'Riello UPS', 'Riello157.png', '2017-01-24 18:28:05', '2017-01-24 18:28:10', '1', '0'), ('7', 'The Turbon Group', 'The Turbon Group', 'turbon157.png', '2017-01-24 18:26:35', '2017-01-24 18:26:39', '1', '0'), ('8', 'Ewis Solar', 'Ewis Solar', 'E_wis157.png', '2017-01-24 18:27:39', '2017-02-15 19:29:11', '1', '0'), ('15', 'AAAA aa', 'aaaa  aaa', 'storage/brands/p0R3zgafTTAxECaCaY8vPOvidixgNt21PMcqVJs7.jpeg', '2017-02-15 18:11:40', '2017-02-15 19:27:04', '0', '0'), ('16', 'Toyota', 'Toyota  AAA bbb', 'storage/brands/dRB3A8dvgbWw4Q7OSBpqMLiAH9dMmTruvfJ6yZHB.jpeg', '2017-02-15 18:54:40', '2017-02-15 19:27:31', '0', '0');
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `categories_brand_id_index` (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `categories`
-- ----------------------------
BEGIN;
INSERT INTO `categories` VALUES ('1', 'Printers', '1', 'Printers', 'printers.jpg', '2017-01-24 18:29:05', '2017-01-24 18:29:10', '0', '1'), ('2', 'Toners sss vv', '1', 'Printing toners  sss  vvvv', 'storage/categories/Wsr2n36z81pwFUEHcMn1kUYd67sS0QCGaRaS31fD.jpeg', '2017-01-24 18:29:47', '2017-02-15 20:23:25', '1', '1'), ('3', 'Copiers', '1', 'Copiers', 'copiers.png', '2017-01-24 18:29:05', '2017-01-24 18:29:10', '0', '1'), ('4', 'AAAAAA', '15', 'AAAAAAAA', null, '2017-02-15 20:04:25', '2017-02-15 20:24:44', '0', '0'), ('5', 'BBBB', '15', 'bbbbb', 'storage/categories/RzEvSfZIC1j7USrWvL2q5iB4pgBTU8DwrtPdvZwM.jpeg', '2017-02-15 20:06:18', '2017-02-15 20:24:41', '0', '0');
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
  `cp_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp_designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp_branch` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp_telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `agent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `clients_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `clients`
-- ----------------------------
BEGIN;
INSERT INTO `clients` VALUES ('1', '14', 'Sampath Bank Plc', 'Address', '0112636765', 'sampath@mail.com', 'storage/images/xlTVQVrAx68MsLvjSOoBmQS9krbX4xkembhMqOGc.jpeg', '#fb9a00', 'Lakmal', 'Admin', 'Head Office', '0112636765', 'lakmal@sampath.com', '2017-02-12 11:05:16', '2017-02-15 12:20:31', null), ('2', '12', 'Commercial Bank of Ceylon PLC | Sri Lanka', 'Address', '123456789', 'info@commercialbank.com', 'storage/images/8BJtE7OwqRJBUL1kbuWM2Yvh3q4m09YO8ee4NULZ.png', '#355cff', 'Ajent 001', 'Admin', 'Head Office', '123456789', 'ajent001@commercialbank.com', '2017-02-14 05:56:00', '2017-02-15 12:52:35', '3'), ('3', '11', 'Seylan Bank PLC', 'Seylan Towers,\r\nNo 90, Gall Road,\r\nColombo', '123456789', 'info@seylan.lk', 'storage/images/XPyDJBgqLyjtAUhYpkHfAjI27FNf2kU7WioA8Ref.png', '#cd0012', 'Sahan Deshpriya', 'Accounts Admin', 'Head Office', '12389234567', 'ajent002@seylan.lk', '2017-02-14 06:20:18', '2017-02-16 07:57:06', '3'), ('4', '9', 'The State Mortgage & Investment Bank', 'No.269, Galle Road, Colombo 03.', '011-7722722-3', 'mktmgr@smib.lk', 'storage/images/MFcAW4FM078wEvVTQ0VZLdo1G4IpscrNN6kE3xn0.jpeg', '#fffc56', 'Laksini Kariyawasam', 'Credit Officer', 'Head Office', '011-7722722-5', 'samudrika@smib.lk', '2017-02-15 14:49:43', '2017-02-16 07:45:52', '3');
COMMIT;

-- ----------------------------
--  Table structure for `designations`
-- ----------------------------
DROP TABLE IF EXISTS `designations`;
CREATE TABLE `designations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `designations_designation_unique` (`designation`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `designations`
-- ----------------------------
BEGIN;
INSERT INTO `designations` VALUES ('1', 'Super Admin', '0', '2017-02-11 11:35:43', '2017-02-11 11:58:40'), ('2', 'Accounts Admin', '0', '2017-02-11 11:35:50', '2017-02-11 11:35:50'), ('3', 'Marketting Executive', '0', '2017-02-11 11:35:58', '2017-02-11 11:35:58'), ('4', 'Client', '0', '2017-02-11 11:36:04', '2017-02-12 09:18:24');
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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `migrations`
-- ----------------------------
BEGIN;
INSERT INTO `migrations` VALUES ('1', '2014_10_12_100000_create_password_resets_table', '1'), ('2', '2017_01_24_173536_create_category_table', '1'), ('3', '2017_01_24_173716_create_brands_table', '1'), ('4', '2017_01_24_173753_create_products_table', '1'), ('5', '2017_02_03_054157_create_user_profile_table', '2'), ('14', '2014_10_12_000000_create_users_table', '4'), ('15', '2017_02_10_191524_create_designations_table', '5'), ('17', '2017_02_12_093519_create_client_profile_table', '6'), ('19', '2017_02_14_114609_add_fields_to_clients_table', '7');
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
--  Table structure for `products`
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `part_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `default_price` decimal(11,0) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_part_no_unique` (`part_no`),
  KEY `products_category_id_index` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `products`
-- ----------------------------
BEGIN;
INSERT INTO `products` VALUES ('1', 'sx001', 'value=\"bla bla\"', '1', 'storage/products/lTXQ7cOyIcZCyqhDnzjtDXCVZwrp28o8PZI5xR5D.jpeg', '20000', '2017-01-25 04:47:49', '2017-02-16 06:10:07', '0', '0'), ('2', 'sx002', 'bla bla bla bla PPPP 01', '1', 'storage/products/IWUNjZXtPLd68p9tWnFlQNIPsTKoCYBnHvwywVQa.jpeg', '150000', '2017-01-25 04:48:26', '2017-02-16 05:55:31', '0', '1'), ('3', 'sx003', 'QWERT WERTYU TYUI', '1', 'storage/products/4QJnn8Ge5gObZVndyS0K26cXtgnY2C4pqY29ajNn.jpeg', '200000', '2017-02-16 06:08:14', '2017-02-16 06:08:14', '1', '1');
COMMIT;

-- ----------------------------
--  Table structure for `user_profiles`
-- ----------------------------
DROP TABLE IF EXISTS `user_profiles`;
CREATE TABLE `user_profiles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `full_name` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `mobile` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `user_profiles`
-- ----------------------------
BEGIN;
INSERT INTO `user_profiles` VALUES ('1', '5', 'Saman Perera', 'Sampath Bank', 'No.123, Blah Street, Blah blah, Colombo45, Sri Lanka', '112303050', '0778822882', null, null);
COMMIT;

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `users`
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES ('1', 'mahendralakmal@gmail.com', '$2y$10$fsernRdYJ2i.eK818LcHKugX5hK.OlFm0/8.naeJcotDjB9BmTcka', 'M L Karanduwawala', '1234567876', '1', '1', '0', null, '2017-02-11 10:09:05', '2017-02-15 15:24:59'), ('2', 'senehas@mail.com', '$2y$10$ZXnz0J3icryYO/klaj5ME.sxu4tZFtUpfPFaOGDDXIN.ngbZNesIO', 'Senehas', '123456765432', '2', '0', '1', null, '2017-02-11 10:09:54', '2017-02-11 10:35:07'), ('3', 'sandaru@mail.com', '$2y$10$DcGTqKzjDNfyX3fMtUCTy.zzpl7XajfYTONS/dyzf8UZdE0ztFjAS', 'Sandaru Weerasinghe', 'N3456789', '3', '1', '0', null, '2017-02-12 08:49:55', '2017-02-15 15:43:41'), ('8', 'asd@mail.com', '$2y$10$Vi0hRD2ZldcA80Xkf9NgXuGfuHMbgp4IM4ciYFoK6TvoOrCenOI2m', 'Sampath Bank PLC', 'N34565422', '4', '0', '0', null, '2017-02-12 09:06:56', '2017-02-15 08:03:43'), ('9', 'acd@mail.com', '$2y$10$yZ.Lk7APuutE030l1j37yeIfYGuv1GTOGKZMR77ubBjJqLst3bM36', 'SMIB', 'N2345666', '4', '1', '0', null, '2017-02-12 10:09:36', '2017-02-15 14:45:52'), ('11', 'abd@mail.com', '$2y$10$D6uFV66zBrc15BFhb847se18mj7yJrLtfgUQUD6RVPESXCtaAuBxK', 'Commercial Bank of Ceylon PLC | Sri Lanka', 'N2345664', '4', '1', '0', null, '2017-02-12 10:12:00', '2017-02-15 08:03:33'), ('12', 'pema@mail.com', '$2y$10$h6wrFZTd4YPR/xa3BUW53./PiiWUc6GoeCXs6Dhglk3q7cHWzV4Zu', 'pema pema', '1234567896V', '4', '1', '0', null, '2017-02-12 10:21:20', '2017-02-14 06:07:13'), ('14', 'pemaa@mail.com', '$2y$10$OcqVb6b11tuIlVvxtLHXkeCu8m/54fLserOkkZnjNmMC/DBVLf/xK', 'Sampath Bank Plc', '1234567806V', '4', '1', '0', null, '2017-02-12 10:22:29', '2017-02-14 05:47:31');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
