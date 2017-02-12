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

 Date: 02/11/2017 13:07:04 PM
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `brands_title_unique` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `brands`
-- ----------------------------
BEGIN;
INSERT INTO `brands` VALUES ('1', 'Lexmark', 'Lexmark', 'Lexmark157.png', '2017-01-24 18:26:35', '2017-01-24 18:26:39'), ('2', 'Casio', 'Casio', 'Casio157.png', '2017-01-24 18:27:39', '2017-01-24 18:27:42'), ('3', 'Ricoh', 'Ricoh', 'Rich157.png', '2017-01-24 18:28:05', '2017-01-24 18:28:10'), ('4', 'Konica Minolta', 'Konica Minolta', 'Konica157.png', '2017-01-24 18:26:35', '2017-01-24 18:26:39'), ('5', 'Fujifilm', 'Fujifilm', 'Fuji157.png', '2017-01-24 18:27:39', '2017-01-24 18:27:42'), ('6', 'Riello UPS', 'Riello UPS', 'Riello157.png', '2017-01-24 18:28:05', '2017-01-24 18:28:10'), ('7', 'The Turbon Group', 'The Turbon Group', 'turbon157.png', '2017-01-24 18:26:35', '2017-01-24 18:26:39'), ('8', 'Ewis Solar', 'Ewis Solar', 'E_wis157.png', '2017-01-24 18:27:39', '2017-01-24 18:27:42');
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
  PRIMARY KEY (`id`),
  KEY `categories_brand_id_index` (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `categories`
-- ----------------------------
BEGIN;
INSERT INTO `categories` VALUES ('1', 'Printers', '1', 'Printers', 'printers.jpg', '2017-01-24 18:29:05', '2017-01-24 18:29:10'), ('2', 'Toners', '1', 'Printing toners', 'toners.jpeg', '2017-01-24 18:29:47', '2017-01-24 18:29:49'), ('3', 'Copiers', '1', 'Copiers', 'copiers.png', '2017-01-24 18:29:05', '2017-01-24 18:29:10');
COMMIT;

-- ----------------------------
--  Table structure for `designations`
-- ----------------------------
DROP TABLE IF EXISTS `designations`;
CREATE TABLE `designations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `designations_designation_unique` (`designation`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `designations`
-- ----------------------------
BEGIN;
INSERT INTO `designations` VALUES ('1', 'Admin', '2017-02-10 20:11:27', '2017-02-10 20:11:27'), ('2', 'Accounts Admin', '2017-02-10 20:11:36', '2017-02-10 20:11:36'), ('3', 'Marketting Executive', '2017-02-10 20:11:51', '2017-02-10 20:11:51'), ('4', 'Client', '2017-02-10 20:12:50', '2017-02-10 20:12:50');
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `migrations`
-- ----------------------------
BEGIN;
INSERT INTO `migrations` VALUES ('1', '2014_10_12_100000_create_password_resets_table', '1'), ('2', '2017_01_24_173536_create_category_table', '1'), ('3', '2017_01_24_173716_create_brands_table', '1'), ('4', '2017_01_24_173753_create_products_table', '1'), ('5', '2017_02_03_054157_create_user_profile_table', '2'), ('9', '2014_10_12_000000_create_users_table', '3'), ('10', '2017_02_10_191524_create_designations_table', '3');
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_part_no_unique` (`part_no`),
  KEY `products_category_id_index` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `products`
-- ----------------------------
BEGIN;
INSERT INTO `products` VALUES ('1', 'sx001', 'bla bla', '1', 'sx001.jpg', '20000', '2017-01-25 04:47:49', '2017-01-25 04:47:53'), ('2', 'sx002', 'bla bla 01', '1', 'sx002.gif', '1500', '2017-01-25 04:48:26', '2017-01-25 04:48:28');
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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `users`
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES ('1', 'mahendralakmal@gmail.com', '$2y$10$s78v8IDp9QNJePh8YwLz0.T7YQezYJFZZ8s0sW/1gjtm4rpZ0ZQay', 'M L Karanduwawala', '123456789123', '1', null, '2017-02-10 19:34:47', '2017-02-10 19:34:47'), ('2', 'dinoosh@mail.com', '$2y$10$dTj.ojlYMJoyMleBrFElsunugKQFuok4oJo6P1q3NIg/fe6cCfbBm', 'Dinoosh Nikapitiya Arachchi', '885425234V', '3', null, '2017-02-10 19:38:38', '2017-02-11 07:33:30'), ('3', 'anu@mail.com', '$2y$10$4PEiY.D6cU4Uv.zY3ow.wegsVBiS2zXHJG1AEKtqogde/v8XCkVda', 'Anu Pama', 'N123450', '3', null, '2017-02-11 07:18:33', '2017-02-11 07:32:50');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
