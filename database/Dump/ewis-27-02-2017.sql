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

 Date: 02/27/2017 14:11:01 PM
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
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `brands_title_unique` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `brands`
-- ----------------------------
BEGIN;
INSERT INTO `brands` VALUES ('1', 'Toyota', 'toyota', 'storage/brands/eQQU9nC5cF0rUYZvldEnGWVrerDy6TSiLHbxj3HK.jpeg', '1', '1', '2017-02-27 04:52:42', '2017-02-27 04:52:42');
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categories_brand_id_index` (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `categories`
-- ----------------------------
BEGIN;
INSERT INTO `categories` VALUES ('1', 'AAAA', '1', 'aaaa', 'storage/categories/KFwbNXaMNF9g6fGDfZuQFvayZYx4r4hcwam9Y4w7.jpeg', '1', '1', '2017-02-27 04:53:11', '2017-02-27 04:53:11');
COMMIT;

-- ----------------------------
--  Table structure for `client_assign_products`
-- ----------------------------
DROP TABLE IF EXISTS `client_assign_products`;
CREATE TABLE `client_assign_products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `special_price` decimal(11,2) NOT NULL,
  `agent_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `client_assign_products_client_id_index` (`client_id`),
  KEY `client_assign_products_product_id_index` (`product_id`),
  KEY `client_assign_products_agent_id_index` (`agent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `agent_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `clients_user_id_index` (`user_id`),
  KEY `clients_agent_id_index` (`agent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `clients`
-- ----------------------------
BEGIN;
INSERT INTO `clients` VALUES ('1', '3', 'Seylan Bank PLC', 'No 110, Sir James Peiris Mawatha,\r\nColombo 02,\r\nSri Lanka', '+94 11 2 30 30 50', 'info@sampath.lk', 'storage/images/zNeRxMAatYFiKXBH6KsHhX6bWVR6uGSV1xtwZYkO.jpeg', '#f06901', '1', '0', '1', '2017-02-24 04:58:34', '2017-02-24 11:30:54'), ('2', '3', 'Commercial Bank of Ceylon PLC | Sri Lanka', 'Address', '123456789', 'info@combank.com', 'storage/images/KIWFS3SecTXngPvyeSo3ps0cVyvotfQQuktZRcdK.png', '#2b7eff', '1', '0', null, '2017-02-24 05:16:58', '2017-02-24 05:17:08');
COMMIT;

-- ----------------------------
--  Table structure for `clientusers`
-- ----------------------------
DROP TABLE IF EXISTS `clientusers`;
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

-- ----------------------------
--  Records of `clientusers`
-- ----------------------------
BEGIN;
INSERT INTO `clientusers` VALUES ('1', '2', '1', 'Lakmal', 'Admin', 'Head Office', '123456789', 'lakmal@sampath.com', '1', '2017-02-24 04:42:01', '2017-02-24 04:42:01'), ('2', '3', '1', 'Mahendra', 'Admin 2', 'Maradana', '123456789', 'mahendra@sampath.com', '1', '2017-02-24 04:43:19', '2017-02-24 04:43:19'), ('3', '4', '2', 'Tharindu Dinoosh Nikapitiya', 'Admin', 'Head Office', '23456789', 'dinoosh@combank.com', '3', '2017-02-24 05:18:43', '2017-02-24 07:26:04');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `designations`
-- ----------------------------
BEGIN;
INSERT INTO `designations` VALUES ('1', 'Super User', '0', '1', null, null), ('2', 'Client', '0', '1', '2017-02-22 12:18:04', '2017-02-22 12:18:04');
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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `migrations`
-- ----------------------------
BEGIN;
INSERT INTO `migrations` VALUES ('12', '2014_10_12_000000_create_users_table', '1'), ('13', '2014_10_12_100000_create_password_resets_table', '1'), ('14', '2017_01_24_173536_create_category_table', '1'), ('15', '2017_01_24_173716_create_brands_table', '1'), ('16', '2017_01_24_173753_create_products_table', '1'), ('17', '2017_02_03_054157_create_user_profile_table', '1'), ('18', '2017_02_10_191524_create_designations_table', '1'), ('19', '2017_02_12_093519_create_client_profile_table', '1'), ('20', '2017_02_17_055414_create_assign_products_to_client_table', '1'), ('21', '2017_02_22_053255_create_p__orders_table', '1'), ('22', '2017_02_22_075343_create_client_users_table', '1');
COMMIT;

-- ----------------------------
--  Table structure for `p__orders`
-- ----------------------------
DROP TABLE IF EXISTS `p__orders`;
CREATE TABLE `p__orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `bucket` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_cp` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_branch` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_tp` int(11) NOT NULL,
  `del_notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp_notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `default_price` decimal(11,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_part_no_unique` (`part_no`),
  KEY `products_category_id_index` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `products`
-- ----------------------------
BEGIN;
INSERT INTO `products` VALUES ('1', 'qwer1234', 'QWERTYU', '1', 'storage/products/GhlMPHV3WRv4sbSMA8xF8lv2Raz8ELUXkFR96dsR.jpeg', '15000.00', '1', '1', 'QWERTY', '2017-02-27 06:21:09', '2017-02-27 06:21:09');
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
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `users`
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES ('1', 'mahendralakmal@gmail.com', '$2y$10$h3/SX/SNtX5CZENruxTcE.g62UJaBhxloq8nAzrcc5xWvL/G7yInS', 'Lakmal', 'N123456', '1', '1', '0', null, '1', '2017-02-22 08:22:50', '2017-02-22 08:22:50'), ('2', 'lakmal@mail.com', '$2y$10$bOJqsJEklYO8H1t2KCfX9.ZS5AK/yinak6FxFA2Z39zjCemW7JY96', 'Lakmal', '123456N', '2', '1', '0', null, '1', '2017-02-24 04:40:38', '2017-02-24 04:43:36'), ('3', 'mahendra@sampath.com', '$2y$10$kxmHRiJyybU3REdkqe8ONuG0tvD5ZDmXlJMoAeFEhZv84ET/lLQw6', 'Mahendra', '123456789', '2', '1', '0', null, '1', '2017-02-24 04:42:49', '2017-02-24 04:43:41'), ('4', 'dinoosh@combank.com', '$2y$10$k5AIYIJrbo3gH0Mj3jzrU.B5.erPtAvwoV5y0y0oDsFjWeTy0re.u', 'Dinoosh', '123456789', '2', '1', '0', null, '3', '2017-02-24 05:17:50', '2017-02-24 07:25:59');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
