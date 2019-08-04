/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : authen

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-02-24 12:58:27
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admins
-- ----------------------------
DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admins
-- ----------------------------
INSERT INTO `admins` VALUES ('1', 'admin 1', 'admin@gmail.com', null, '$2y$10$.NT7yl2YXb26HZOMjXoZ0uZLc6oyV7L0DFRQfcQVPZJFBVIda7oOy', 'hvvGCRA2veHucAfv47yfTO4QLa3DeVVeTkxSECeJ71ryT2OHxsuB84Q471dk', '2018-12-31 09:48:12', '2018-12-31 09:48:12');

-- ----------------------------
-- Table structure for banners
-- ----------------------------
DROP TABLE IF EXISTS `banners`;
CREATE TABLE `banners` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_id` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of banners
-- ----------------------------
INSERT INTO `banners` VALUES ('1', 'Main banner', '1', '/files/1/Banners/banner2.jpg', '<h2>WELCOME TO</h2>\r\n<h3>FASHION CLUB</h3>\r\n<p>Suspendisse sed tellus id libero pretium interdum. Suspendisse potenti. Quisque consectetur elit sit amet vehicula tristique.</p>\r\n<p><a href=\"/lar.tuto/authen/public/admin/banners/1/about.html\">Read More</a></p>', '<h2>WELCOME TO</h2>\r\n<h3>FASHION CLUB</h3>\r\n<p>Suspendisse sed tellus id libero pretium interdum. Suspendisse potenti. Quisque consectetur elit sit amet vehicula tristique.</p>', '2019-02-16 14:44:42', '2019-02-24 03:29:59', 'https://www.google.com');
INSERT INTO `banners` VALUES ('2', 'Sale 1', '2', '/files/1/Banners/bb1.jpg', '<p>11</p>', '<h3>SALE 1</h3>\r\n<h4>upto75%</h4>', '2019-02-16 14:46:29', '2019-02-24 03:35:00', '#');
INSERT INTO `banners` VALUES ('3', 'Sale 2', '3', '/files/1/Banners/bb2.jpg', '<p>111</p>', '<h3>SALE</h3>\r\n<h4>upto55%</h4>', '2019-02-23 14:03:36', '2019-02-24 03:33:08', 'https://news.zing.vn/');
INSERT INTO `banners` VALUES ('4', 'Sale 3', '4', '/files/1/Banners/bb3.jpg', '', '<h3>SALE</h3>\r\n<h4>upto65%</h4>', '2019-02-23 14:04:16', '2019-02-24 03:33:39', 'https://news.zing.vn/');
INSERT INTO `banners` VALUES ('5', 'Sale 4', '5', '/files/1/Banners/bb4.jpg', '', '<h3>SALE</h3>\r\n<h4>upto50%</h4>', '2019-02-23 14:04:56', '2019-02-24 03:34:14', 'https://news.zing.vn/');
INSERT INTO `banners` VALUES ('6', 'Sale 5', '6', '/files/1/Banners/bb5.jpg', '', '<h3>SALE</h3>\r\n<h4>upto60%</h4>', '2019-02-23 14:05:29', '2019-02-24 03:34:32', 'https://news.zing.vn/');

-- ----------------------------
-- Table structure for content_category
-- ----------------------------
DROP TABLE IF EXISTS `content_category`;
CREATE TABLE `content_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of content_category
-- ----------------------------
INSERT INTO `content_category` VALUES ('1', 'Thời trang', 'thoitrang', '/files/1/4.png', '<p>Thời trang</p>', '<p>Thời trang</p>', '2019-01-19 13:47:02', '2019-02-17 05:47:29');
INSERT INTO `content_category` VALUES ('2', 'Điện thoại 123', 'dienthoai', '1.jpg', 'Thời trang', 'Thời trang', '2019-01-19 13:47:24', '2019-01-19 13:51:38');
INSERT INTO `content_category` VALUES ('3', 'Công nghệ số', 'congngheso', '1.jpg', 'Công nghệ số', 'Công nghệ số', '2019-01-19 13:47:38', '2019-01-19 13:47:38');
INSERT INTO `content_category` VALUES ('4', 'Điện tử công nghệ', 'dien-tu-cong-nghe', '1.jpg', '<p>11</p>', '<p>11</p>', '2019-02-11 08:34:13', '2019-02-11 08:34:13');
INSERT INTO `content_category` VALUES ('5', 'Công nghệ số', 'cong-nghe-so', '1.jpg', '<p>sdfsdf</p>', '<p>sdfsdf</p>', '2019-02-11 08:35:34', '2019-02-11 08:35:34');

-- ----------------------------
-- Table structure for content_pages
-- ----------------------------
DROP TABLE IF EXISTS `content_pages`;
CREATE TABLE `content_pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of content_pages
-- ----------------------------
INSERT INTO `content_pages` VALUES ('1', 'Giới thiệu shop 1', 'gioi-thieu-shop', '/files/1/2bd1979681cbf963e734bd0957dd6a5c.jpg', '<p>Giới thiệu shop</p>', '<p>Giới thiệu shop</p>\r\n<p><img src=\"/lar.tuto/authen/public/files/1/anh mau.jpg\" alt=\"\" /></p>', '0', '0', '2019-01-20 06:11:28', '2019-02-17 05:36:28');
INSERT INTO `content_pages` VALUES ('2', '111', '111', '1.jpg', '<p>111</p>', '<div class=\"about\">\r\n<div class=\"container\">\r\n<h3>About Us</h3>\r\n<div class=\"about-info\">\r\n<div class=\"col-md-8 about-grids\">\r\n<h4>Our latest collection</h4>\r\n<p>Dignissimos at vero eos et accusamus et iusto odio ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecat officia.</p>\r\n<div class=\"about-w3ls-row\">\r\n<div class=\"nbs-flexisel-container\">\r\n<div class=\"nbs-flexisel-inner\">\r\n<ul id=\"flexiselDemo3\" class=\"nbs-flexisel-ul\" style=\"left: -309px; display: block;\">\r\n<li class=\"nbs-flexisel-item\" style=\"width: 309px;\"><img class=\"img-responsive\" src=\"/lar.tuto/authen/public/admin/content/page/2/images/a4.jpg\" alt=\"\" /></li>\r\n<li class=\"nbs-flexisel-item\" style=\"width: 309px;\"><img class=\"img-responsive\" src=\"/lar.tuto/authen/public/admin/content/page/2/images/a1.jpg\" alt=\"\" /></li>\r\n<li class=\"nbs-flexisel-item\" style=\"width: 309px;\"><img class=\"img-responsive\" src=\"/lar.tuto/authen/public/admin/content/page/2/images/a2.jpg\" alt=\"\" /></li>\r\n<li class=\"nbs-flexisel-item\" style=\"width: 309px;\"><img class=\"img-responsive\" src=\"/lar.tuto/authen/public/admin/content/page/2/images/a3.jpg\" alt=\"\" /></li>\r\n<li class=\"nbs-flexisel-item\" style=\"width: 309px;\"><img class=\"img-responsive\" src=\"/lar.tuto/authen/public/admin/content/page/2/images/a4.jpg\" alt=\"\" /></li>\r\n<li class=\"nbs-flexisel-item\" style=\"width: 309px;\"><img class=\"img-responsive\" src=\"/lar.tuto/authen/public/admin/content/page/2/images/a1.jpg\" alt=\"\" /></li>\r\n<li class=\"nbs-flexisel-item\" style=\"width: 309px;\"><img class=\"img-responsive\" src=\"/lar.tuto/authen/public/admin/content/page/2/images/a2.jpg\" alt=\"\" /></li>\r\n<li class=\"nbs-flexisel-item\" style=\"width: 309px;\"><img class=\"img-responsive\" src=\"/lar.tuto/authen/public/admin/content/page/2/images/a3.jpg\" alt=\"\" /></li>\r\n</ul>\r\n<div class=\"nbs-flexisel-nav-left\" style=\"top: 96px;\">&nbsp;</div>\r\n<div class=\"nbs-flexisel-nav-right\" style=\"top: 96px;\">&nbsp;</div>\r\n</div>\r\n</div>\r\n<div class=\"clearfix\">&nbsp;</div>\r\n</div>\r\n</div>\r\n<div class=\"col-md-4 about-grids\">\r\n<h4>Our Advantages</h4>\r\n<div class=\"pince\">\r\n<div class=\"pince-left\">\r\n<h5>01</h5>\r\n</div>\r\n<div class=\"pince-right\">\r\n<p>Vero vulputate enim non justo posuere phasellus eget mauris.</p>\r\n</div>\r\n<div class=\"clearfix\">&nbsp;</div>\r\n</div>\r\n<div class=\"pince\">\r\n<div class=\"pince-left\">\r\n<h5>02</h5>\r\n</div>\r\n<div class=\"pince-right\">\r\n<p>Vero vulputate enim non justo posuere phasellus eget mauris.</p>\r\n</div>\r\n<div class=\"clearfix\">&nbsp;</div>\r\n</div>\r\n<div class=\"pince\">\r\n<div class=\"pince-left\">\r\n<h5>03</h5>\r\n</div>\r\n<div class=\"pince-right\">\r\n<p>Vero vulputate enim non justo posuere phasellus eget mauris.</p>\r\n</div>\r\n<div class=\"clearfix\">&nbsp;</div>\r\n</div>\r\n<div class=\"pince\">\r\n<div class=\"pince-left\">\r\n<h5>04</h5>\r\n</div>\r\n<div class=\"pince-right\">\r\n<p>Vero vulputate enim non justo posuere phasellus eget mauris.</p>\r\n</div>\r\n<div class=\"clearfix\">&nbsp;</div>\r\n</div>\r\n</div>\r\n<div class=\"clearfix\">&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>', '0', '0', '2019-02-16 11:10:51', '2019-02-16 11:17:54');

-- ----------------------------
-- Table structure for content_posts
-- ----------------------------
DROP TABLE IF EXISTS `content_posts`;
CREATE TABLE `content_posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tag_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of content_posts
-- ----------------------------
INSERT INTO `content_posts` VALUES ('1', 'Thời trang hè 2018', 'thoitrang', '/files/1/2bd1979681cbf963e734bd0957dd6a5c.jpg', '<p>Thời trang h&egrave; 2018</p>', '<p>Thời trang h&egrave; 2018</p>\r\n<p><img src=\"/lar.tuto/authen/public/files/1/a2.jpg\" alt=\"\" /></p>', '0', '0', '1', '2019-01-19 14:57:25', '2019-02-17 05:42:53', '1');
INSERT INTO `content_posts` VALUES ('2', 'Thời trang hè 2019 1', 'thoitrang', '/files/1/2bd1979681cbf963e734bd0957dd6a5c.jpg', '<p>Thời trang h&egrave; 2019</p>', '<p>Thời trang h&egrave; 2019</p>', '0', '0', '1', '2019-01-19 14:57:49', '2019-02-24 04:38:38', '1');

-- ----------------------------
-- Table structure for content_tags
-- ----------------------------
DROP TABLE IF EXISTS `content_tags`;
CREATE TABLE `content_tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of content_tags
-- ----------------------------
INSERT INTO `content_tags` VALUES ('1', 'xiaomi 1', 'xiaomi', '/files/1/5.png', '<p>xiaomi</p>', '0', '0', '2019-01-20 06:25:42', '2019-02-17 05:48:56');

-- ----------------------------
-- Table structure for global_settings
-- ----------------------------
DROP TABLE IF EXISTS `global_settings`;
CREATE TABLE `global_settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `default` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `global_settings_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of global_settings
-- ----------------------------
INSERT INTO `global_settings` VALUES ('1', 'web_name', 'FASHION<span>CLUB</span>', '', '2019-02-16 12:22:54', '2019-02-17 04:46:17');
INSERT INTO `global_settings` VALUES ('2', 'header_logo', '/files/1/4.png', '', '2019-02-16 12:22:54', '2019-02-17 04:45:41');
INSERT INTO `global_settings` VALUES ('3', 'intro', '<p>dsfsdf</p>', '', '2019-02-16 12:22:54', '2019-02-16 12:23:22');
INSERT INTO `global_settings` VALUES ('4', 'desc', '<p>sdfsdf</p>', '', '2019-02-16 12:22:54', '2019-02-16 12:23:22');
INSERT INTO `global_settings` VALUES ('5', 'footer_logo', '/files/1/46.jpg', '', '2019-02-16 12:29:15', '2019-02-17 04:48:26');

-- ----------------------------
-- Table structure for menus
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of menus
-- ----------------------------
INSERT INTO `menus` VALUES ('1', 'Header menu', 'menu', '<p>Header menu</p>', '1', '2019-01-20 07:36:58', '2019-02-11 12:48:43');
INSERT INTO `menus` VALUES ('2', 'Footer menu 1', '11', '<p>Footer menu</p>', '2', '2019-01-20 07:37:17', '2019-02-11 12:50:09');
INSERT INTO `menus` VALUES ('3', 'Footer menu 2', '11', '<p>11</p>', '3', '2019-02-11 12:50:29', '2019-02-11 12:50:36');
INSERT INTO `menus` VALUES ('4', 'Footer menu 3', '11', '<p>11</p>', '4', '2019-02-11 12:50:55', '2019-02-11 12:50:55');

-- ----------------------------
-- Table structure for menu_items
-- ----------------------------
DROP TABLE IF EXISTS `menu_items`;
CREATE TABLE `menu_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `params` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `menu_id` int(11) NOT NULL DEFAULT '0',
  `sort` int(11) NOT NULL DEFAULT '0',
  `total` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of menu_items
-- ----------------------------
INSERT INTO `menu_items` VALUES ('1', 'Shop category', '1', '{\"params_1\":\"1\",\"params_2\":\"1\",\"params_3\":\"1\",\"params_4\":\"1\",\"params_5\":\"1\",\"params_6\":\"1\",\"params_7\":\"\"}', '/shop/category/1', 'fa', '<p>11</p>', '9', '2019-02-11 06:52:24', '2019-02-16 09:41:42', '1', '1', '0');
INSERT INTO `menu_items` VALUES ('2', 'Shop product', '2', '{\"params_1\":\"2\",\"params_2\":\"1\",\"params_3\":\"1\",\"params_4\":\"1\",\"params_5\":\"1\",\"params_6\":\"1\",\"params_7\":\"\"}', '/shop/product/1', 'fa', '<p>11</p>', '9', '2019-02-11 07:11:06', '2019-02-16 09:41:55', '1', '0', '0');
INSERT INTO `menu_items` VALUES ('3', 'Content category', '3', '{\"params_1\":\"1\",\"params_2\":\"1\",\"params_3\":\"1\",\"params_4\":\"1\",\"params_5\":\"1\",\"params_6\":\"1\",\"params_7\":\"\"}', '/content/category/1', 'fa', '<p>11</p>', '9', '2019-02-11 07:12:05', '2019-02-16 09:42:06', '1', '0', '0');
INSERT INTO `menu_items` VALUES ('4', 'Custom link', '7', '{\"params_1\":\"1\",\"params_2\":\"1\",\"params_3\":\"1\",\"params_4\":\"1\",\"params_5\":\"1\",\"params_6\":\"1\",\"params_7\":\"https:\\/\\/www.google.com\\/\"}', 'https://www.google.com/', 'fa', '<p>11</p>', '9', '2019-02-11 07:12:58', '2019-02-16 09:42:17', '1', '2', '0');
INSERT INTO `menu_items` VALUES ('5', 'Content post', '4', '{\"params_1\":\"3\",\"params_2\":\"1\",\"params_3\":\"1\",\"params_4\":\"1\",\"params_5\":\"1\",\"params_6\":\"1\",\"params_7\":\"\"}', '/content/post/1', 'fa', '<p>11</p>', '9', '2019-02-11 07:13:20', '2019-02-16 09:42:25', '1', '0', '0');
INSERT INTO `menu_items` VALUES ('6', 'Content page', '5', '{\"params_1\":\"1\",\"params_2\":\"1\",\"params_3\":\"1\",\"params_4\":\"1\",\"params_5\":\"1\",\"params_6\":\"1\",\"params_7\":\"\"}', '/page/1', 'fa', '<p>11</p>', '9', '2019-02-11 07:13:46', '2019-02-16 09:42:34', '1', '0', '0');
INSERT INTO `menu_items` VALUES ('7', 'Trang chủ', '7', '{\"params_1\":\"1\",\"params_2\":\"1\",\"params_3\":\"1\",\"params_4\":\"1\",\"params_5\":\"1\",\"params_6\":\"1\",\"params_7\":\"http:\\/\\/localhost\\/lar.tuto\\/authen\\/public\\/\"}', 'http://localhost/lar.tuto/authen/public/', '', '<p>11</p>', '0', '2019-02-11 14:23:17', '2019-02-16 08:48:06', '1', '0', '0');
INSERT INTO `menu_items` VALUES ('8', 'Content tag', '6', '{\"params_1\":\"1\",\"params_2\":\"1\",\"params_3\":\"1\",\"params_4\":\"1\",\"params_5\":\"1\",\"params_6\":\"1\",\"params_7\":\"\"}', '/content/tag/1', '', '<p>11</p>', '9', '2019-02-16 08:54:16', '2019-02-16 09:42:43', '1', '0', '0');
INSERT INTO `menu_items` VALUES ('9', 'Demo', '7', '{\"params_1\":\"1\",\"params_2\":\"1\",\"params_3\":\"1\",\"params_4\":\"1\",\"params_5\":\"1\",\"params_6\":\"1\",\"params_7\":\"#\"}', '#', '', '<p>111</p>', '0', '2019-02-16 09:41:19', '2019-02-16 09:42:43', '1', '2', '7');
INSERT INTO `menu_items` VALUES ('10', 'Shop', '1', '{\"params_1\":\"1\",\"params_2\":\"1\",\"params_3\":\"1\",\"params_4\":\"1\",\"params_5\":\"1\",\"params_6\":\"1\",\"params_7\":\"\"}', '/shop/category/1', '', '<p>111</p>', '0', '2019-02-16 11:28:42', '2019-02-16 11:30:11', '1', '3', '3');
INSERT INTO `menu_items` VALUES ('11', 'Women\'s Clothing', '1', '{\"params_1\":\"1\",\"params_2\":\"1\",\"params_3\":\"1\",\"params_4\":\"1\",\"params_5\":\"1\",\"params_6\":\"1\",\"params_7\":\"\"}', '/shop/category/1', '', '<p>111</p>', '10', '2019-02-16 11:29:22', '2019-02-16 11:29:22', '1', '0', '0');
INSERT INTO `menu_items` VALUES ('12', 'Men clothing', '1', '{\"params_1\":\"2\",\"params_2\":\"1\",\"params_3\":\"1\",\"params_4\":\"1\",\"params_5\":\"1\",\"params_6\":\"1\",\"params_7\":\"\"}', '/shop/category/2', '', '<p>Men clothing</p>', '10', '2019-02-16 11:29:50', '2019-02-16 11:29:50', '1', '0', '0');
INSERT INTO `menu_items` VALUES ('13', 'Kid wear', '1', '{\"params_1\":\"3\",\"params_2\":\"1\",\"params_3\":\"1\",\"params_4\":\"1\",\"params_5\":\"1\",\"params_6\":\"1\",\"params_7\":\"\"}', '/shop/category/3', '', '<p>111</p>', '10', '2019-02-16 11:30:11', '2019-02-16 11:30:11', '1', '3', '0');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('3', '2018_12_31_074305_create_admins', '2');
INSERT INTO `migrations` VALUES ('4', '2018_12_31_150534_create_sellers', '3');
INSERT INTO `migrations` VALUES ('5', '2018_12_31_154535_create_shippers', '4');
INSERT INTO `migrations` VALUES ('6', '2019_01_01_070015_create_shop_category', '5');
INSERT INTO `migrations` VALUES ('7', '2019_01_03_131907_create_shop_products', '6');
INSERT INTO `migrations` VALUES ('8', '2019_01_19_132207_create_content_category', '7');
INSERT INTO `migrations` VALUES ('9', '2019_01_19_132318_create_content_posts', '7');
INSERT INTO `migrations` VALUES ('10', '2019_01_19_132421_create_content_pages', '7');
INSERT INTO `migrations` VALUES ('11', '2019_01_20_061715_create_content_tags', '8');
INSERT INTO `migrations` VALUES ('12', '2019_01_20_063151_create_menus', '9');
INSERT INTO `migrations` VALUES ('13', '2019_01_20_063208_create_menu_items', '9');
INSERT INTO `migrations` VALUES ('14', '2019_01_20_075225_add_memu_id_to_table_menu_items', '10');
INSERT INTO `migrations` VALUES ('15', '2019_01_20_083913_create_global_settings', '11');
INSERT INTO `migrations` VALUES ('16', '2019_01_20_150000_create_shop_brands', '12');
INSERT INTO `migrations` VALUES ('18', '2019_02_16_064828_add_sort_and_total_menu_items', '13');
INSERT INTO `migrations` VALUES ('19', '2019_02_16_141041_create_banners', '14');
INSERT INTO `migrations` VALUES ('20', '2019_02_16_142104_add_link_field_to_banners', '15');
INSERT INTO `migrations` VALUES ('21', '2019_02_16_142418_create_newsletters', '16');
INSERT INTO `migrations` VALUES ('22', '2019_02_17_042143_add_four_fields_to_products', '17');
INSERT INTO `migrations` VALUES ('23', '2019_02_17_132347_create_orders', '18');
INSERT INTO `migrations` VALUES ('24', '2019_02_17_132408_create_orders_detail', '18');
INSERT INTO `migrations` VALUES ('25', '2019_02_24_034619_add_homepage_to_shop_cateogries', '19');
INSERT INTO `migrations` VALUES ('26', '2019_02_24_034702_add_homepage_to_shop_products', '19');
INSERT INTO `migrations` VALUES ('27', '2019_02_24_044939_add_tag_to_content_post', '20');

-- ----------------------------
-- Table structure for newsletters
-- ----------------------------
DROP TABLE IF EXISTS `newsletters`;
CREATE TABLE `newsletters` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of newsletters
-- ----------------------------
INSERT INTO `newsletters` VALUES ('1', 'admin@gmail.com', '2019-02-16 15:03:32', '2019-02-16 15:03:32');
INSERT INTO `newsletters` VALUES ('2', 'user@gmail.com', '2019-02-16 15:03:38', '2019-02-16 15:03:38');
INSERT INTO `newsletters` VALUES ('3', 'abc12345@gmail.com', '2019-02-24 05:54:51', '2019-02-24 05:54:51');

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES ('1', 'John', '987732734', 'admin@gmail.com', '<p>giao hang nhanh</p>', 'long bien - ha noi', 'ha noi', 'Vietnam', '104000000', '1', '2019-02-17 13:50:57', '2019-02-18 15:07:49');
INSERT INTO `orders` VALUES ('2', 'John', '987732734', 'admin@gmail.com', 'giao hang nhanh', 'long bien - ha noi', 'ha noi', 'Vietnam', '104000000', '0', '2019-02-17 13:51:33', '2019-02-17 13:51:33');
INSERT INTO `orders` VALUES ('3', 'John', '987732734', 'admin@gmail.com', '111', 'long bien - ha noi', 'ha noi', 'Vietnam', '104000000', '0', '2019-02-17 13:52:40', '2019-02-17 13:52:40');

-- ----------------------------
-- Table structure for orders_detail
-- ----------------------------
DROP TABLE IF EXISTS `orders_detail`;
CREATE TABLE `orders_detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of orders_detail
-- ----------------------------
INSERT INTO `orders_detail` VALUES ('1', '1', '1', '6', '8000000', '48000000', '0', '2019-02-17 13:50:57', '2019-02-17 13:50:57');
INSERT INTO `orders_detail` VALUES ('2', '1', '8', '7', '8000000', '56000000', '0', '2019-02-17 13:50:57', '2019-02-17 13:50:57');
INSERT INTO `orders_detail` VALUES ('3', '2', '1', '6', '8000000', '48000000', '0', '2019-02-17 13:51:33', '2019-02-17 13:51:33');
INSERT INTO `orders_detail` VALUES ('4', '2', '8', '7', '8000000', '56000000', '0', '2019-02-17 13:51:33', '2019-02-17 13:51:33');
INSERT INTO `orders_detail` VALUES ('5', '3', '1', '6', '8000000', '48000000', '0', '2019-02-17 13:52:40', '2019-02-17 13:52:40');
INSERT INTO `orders_detail` VALUES ('6', '3', '8', '7', '8000000', '56000000', '0', '2019-02-17 13:52:40', '2019-02-17 13:52:40');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) DEFAULT NULL,
  `role_desc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'Administrator', null);
INSERT INTO `roles` VALUES ('2', 'Super Admin', null);
INSERT INTO `roles` VALUES ('3', 'Author', null);

-- ----------------------------
-- Table structure for sellers
-- ----------------------------
DROP TABLE IF EXISTS `sellers`;
CREATE TABLE `sellers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sellers_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of sellers
-- ----------------------------
INSERT INTO `sellers` VALUES ('1', 'seller 1', 'seller@gmail.com', null, '$2y$10$1T2NuRfR4tr7Q8ov1VcH2eM9UYNb3wByTnhZYj5ZLMevz6Nuj895e', 'D3bwR0TZV1oJCBpKzkDrSTbvH7OMG44B7Bhoi81X8K35ZlPS5sxhTEphtOvi', '2018-12-31 15:35:05', '2018-12-31 15:35:05');

-- ----------------------------
-- Table structure for shippers
-- ----------------------------
DROP TABLE IF EXISTS `shippers`;
CREATE TABLE `shippers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `shippers_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of shippers
-- ----------------------------
INSERT INTO `shippers` VALUES ('1', 'shipper 1', 'shipper@gmail.com', null, '$2y$10$o8wjwud3tLKAmtpmOWMNCu6ppEAQC3Ayt8MjPNUwZaeocpwysgd/G', 'dObcT3U0jm5gFZJsZW7c3UdgSAIcDYnUKBtJcBy88XuitAenHfXH45G1HuNE', '2018-12-31 16:08:19', '2018-12-31 16:08:19');

-- ----------------------------
-- Table structure for shop_brands
-- ----------------------------
DROP TABLE IF EXISTS `shop_brands`;
CREATE TABLE `shop_brands` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of shop_brands
-- ----------------------------
INSERT INTO `shop_brands` VALUES ('1', 'Brand 1', '/files/1/Brands/4.png', '#', '', '', '2019-02-16 15:16:37', '2019-02-23 14:08:39');
INSERT INTO `shop_brands` VALUES ('2', 'Brand 2', '/files/1/Brands/46.jpg', '#', '', '', '2019-02-16 15:20:26', '2019-02-23 14:09:12');
INSERT INTO `shop_brands` VALUES ('3', 'Brand 3', '/files/1/Brands/5.png', '#', '', '', '2019-02-16 15:21:21', '2019-02-23 14:09:29');
INSERT INTO `shop_brands` VALUES ('4', 'Brand 4', '/files/1/Brands/6.png', '#', '', '', '2019-02-16 15:21:53', '2019-02-23 14:09:48');
INSERT INTO `shop_brands` VALUES ('5', 'Brand 5', '/files/1/Brands/7.png', '#', '', '', '2019-02-23 14:10:10', '2019-02-23 14:10:10');

-- ----------------------------
-- Table structure for shop_category
-- ----------------------------
DROP TABLE IF EXISTS `shop_category`;
CREATE TABLE `shop_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `homepage` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of shop_category
-- ----------------------------
INSERT INTO `shop_category` VALUES ('1', 'Women Clothing', 'womens-clothing', '/files/1/clothsbanner.jpg', '<p>Điện tử c&ocirc;ng nghệ</p>', '<p>Điện tử c&ocirc;ng nghệ</p>', '2019-01-01 07:42:26', '2019-02-24 03:53:29', '1');
INSERT INTO `shop_category` VALUES ('2', 'Men Clothing', 'mens-clothing', '/files/1/clothsbanner.jpg', '<p>Mẹ v&agrave; b&eacute;</p>', '<p>Mẹ v&agrave; b&eacute;</p>', '2019-01-01 07:43:00', '2019-02-16 11:45:07', '1');
INSERT INTO `shop_category` VALUES ('3', 'Kid Wear', 'kids-wear', '/files/1/clothsbanner.jpg', '<p>Điện tử điện lạnh</p>', '<p>Điện tử điện lạnh</p>', '2019-01-01 07:43:27', '2019-02-16 11:45:16', '1');
INSERT INTO `shop_category` VALUES ('4', 'Party Wear', 'dientucongnghe', '/files/1/clothsbanner.jpg', '<p>Điện tử c&ocirc;ng nghệ</p>', '<p>Điện tử c&ocirc;ng nghệ</p>', '2019-01-01 07:47:37', '2019-02-16 11:24:50', '1');
INSERT INTO `shop_category` VALUES ('5', 'Casuals', 'dientucongnghe', '/files/1/clothsbanner.jpg', '<p>Điện tử c&ocirc;ng nghệ</p>', '<p>Điện tử c&ocirc;ng nghệ</p>', '2019-01-01 07:47:48', '2019-02-16 11:25:18', '0');
INSERT INTO `shop_category` VALUES ('6', 'Night Wear', 'dientucongnghe', '/files/1/clothsbanner.jpg', '<p>Điện tử c&ocirc;ng nghệ</p>', '<p>Điện tử c&ocirc;ng nghệ</p>', '2019-01-01 07:48:00', '2019-02-16 11:25:36', '0');
INSERT INTO `shop_category` VALUES ('7', 'Formals', 'dientucongnghe', '/files/1/clothsbanner.jpg', '<p>Điện tử c&ocirc;ng nghệ</p>', '<p>Điện tử c&ocirc;ng nghệ</p>', '2019-01-01 07:48:11', '2019-02-16 11:25:55', '0');
INSERT INTO `shop_category` VALUES ('8', 'Inner Wear', 'dientucongnghe', '/files/1/clothsbanner.jpg', '<p>Điện tử c&ocirc;ng nghệ</p>', '<p>Điện tử c&ocirc;ng nghệ</p>', '2019-01-01 07:48:23', '2019-02-16 11:26:14', '0');
INSERT INTO `shop_category` VALUES ('9', 'Jewellery', 'dientucongnghe', '/files/1/clothsbanner.jpg', '<p>Điện tử c&ocirc;ng nghệ</p>', '<p>Điện tử c&ocirc;ng nghệ</p>', '2019-01-01 07:48:33', '2019-02-16 11:26:45', '0');
INSERT INTO `shop_category` VALUES ('10', 'Watches', 'dientucongnghe', '/files/1/clothsbanner.jpg', 'Điện tử công nghệ', 'Điện tử công nghệ', '2019-01-01 07:48:43', '2019-01-01 07:48:43', '0');
INSERT INTO `shop_category` VALUES ('11', 'Cosmetics', 'dientucongnghe', '/files/1/clothsbanner.jpg', 'Điện tử công nghệ', 'Điện tử công nghệ', '2019-01-01 07:48:58', '2019-01-01 07:48:58', '0');
INSERT INTO `shop_category` VALUES ('12', 'Deo & Perfumes', 'dientucongnghe', '/files/1/clothsbanner.jpg', 'Điện tử công nghệ', 'Điện tử công nghệ', '2019-01-01 07:49:13', '2019-01-01 07:49:13', '0');
INSERT INTO `shop_category` VALUES ('15', 'Hair Care ', 'dientucongnghe', '/files/1/clothsbanner.jpg', 'Điện tử công nghệ', 'Điện tử công nghệ', '2019-01-01 07:50:01', '2019-01-01 07:50:01', '0');

-- ----------------------------
-- Table structure for shop_products
-- ----------------------------
DROP TABLE IF EXISTS `shop_products`;
CREATE TABLE `shop_products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priceCore` int(11) NOT NULL,
  `priceSale` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ship_info` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `additional_information` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `help` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `homepage` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of shop_products
-- ----------------------------
INSERT INTO `shop_products` VALUES ('1', 'Laptop dell c5', 'laptop-dell-c5', '[\"\\/files\\/1\\/2bd1979681cbf963e734bd0957dd6a5c.jpg\",\"\\/files\\/1\\/anh mau.jpg\",\"\\/files\\/1\\/9f878125624978da2440b5b326bd24cd.jpg\"]', '<p>Laptop dell l&agrave; laptop xịn m&ocirc; tả ngắn</p>', '<p>Laptop dell l&agrave; laptop xịn m&ocirc; tả d&agrave;i</p>', '10000000', '8000000', '500', '1', '2019-01-03 13:55:39', '2019-02-24 03:53:55', 'Sẽ được vận chuyển đến nơi trong vòng 2-3 ngày', '<p>th&ocirc;ng tin bổ sung</p>', '<p>h&agrave;ng tốt</p>', '<p>th&ocirc;ng tin trợ gi&uacute;p</p>', '1');
INSERT INTO `shop_products` VALUES ('2', 'Điện thoại iphone', 'iphone', '[\"\\/files\\/1\\/2bd1979681cbf963e734bd0957dd6a5c.jpg\",\"\\/files\\/1\\/anh mau.jpg\",\"\\/files\\/1\\/9f878125624978da2440b5b326bd24cd.jpg\"]', 'Điện thoại iphone', 'Điện thoại iphone', '23000000', '18000000', '100', '1', '2019-01-03 13:56:26', '2019-01-03 13:56:26', '', '', '', '', '1');
INSERT INTO `shop_products` VALUES ('3', 'Tã cho em bé 1', 'ta', '[\"\\/files\\/1\\/2bd1979681cbf963e734bd0957dd6a5c.jpg\",\"\\/files\\/1\\/anh mau.jpg\",\"\\/files\\/1\\/9f878125624978da2440b5b326bd24cd.jpg\"]', 'Tã cho em bé', 'Tã cho em bé', '100000', '80000', '200', '2', '2019-01-03 13:56:58', '2019-01-03 14:12:03', '', '', '', '', '1');
INSERT INTO `shop_products` VALUES ('4', 'Điều hòa LG 1', 'lg', '[\"\\/files\\/1\\/2bd1979681cbf963e734bd0957dd6a5c.jpg\",\"\\/files\\/1\\/anh mau.jpg\",\"\\/files\\/1\\/9f878125624978da2440b5b326bd24cd.jpg\"]', 'Điều hòa LG', 'Điều hòa LG', '10000000', '8000000', '100', '2', '2019-01-03 13:57:28', '2019-01-03 14:12:10', '', '', '', '', '1');
INSERT INTO `shop_products` VALUES ('5', 'PC chơi game cấu hình mạnh', 'pcchoigame', '[\"\\/files\\/1\\/2bd1979681cbf963e734bd0957dd6a5c.jpg\",\"\\/files\\/1\\/anh mau.jpg\",\"\\/files\\/1\\/9f878125624978da2440b5b326bd24cd.jpg\"]', 'PC chơi game cấu hình mạnh', 'PC chơi game cấu hình mạnh', '46000000', '32000000', '12', '1', '2019-01-03 13:58:49', '2019-01-03 13:58:49', '', '', '', '', '1');
INSERT INTO `shop_products` VALUES ('6', 'SP 123', 'khongcodanhmuc', '[\"\\/files\\/1\\/2bd1979681cbf963e734bd0957dd6a5c.jpg\",\"\\/files\\/1\\/anh mau.jpg\",\"\\/files\\/1\\/9f878125624978da2440b5b326bd24cd.jpg\"]', 'Không có danh mục', 'Không có danh mục', '10000000', '8000000', '100', '1', '2019-01-03 13:59:16', '2019-01-03 13:59:16', '', '', '', '', '1');
INSERT INTO `shop_products` VALUES ('7', 'Laptop dell c5 1', 'dientucongnghe', '[\"\\/files\\/1\\/2bd1979681cbf963e734bd0957dd6a5c.jpg\",\"\\/files\\/1\\/anh mau.jpg\",\"\\/files\\/1\\/9f878125624978da2440b5b326bd24cd.jpg\"]', 'Laptop dell c5 1', 'Laptop dell c5 1', '10000000', '8000000', '100', '1', '2019-01-03 13:59:42', '2019-01-03 13:59:42', '', '', '', '', '1');
INSERT INTO `shop_products` VALUES ('8', 'Điện tử công nghệ', 'dientucongnghe', '[\"\\/files\\/1\\/2bd1979681cbf963e734bd0957dd6a5c.jpg\",\"\\/files\\/1\\/anh mau.jpg\",\"\\/files\\/1\\/9f878125624978da2440b5b326bd24cd.jpg\"]', 'Laptop dell c5 1', 'Laptop dell c5 1', '10000000', '8000000', '100', '1', '2019-01-03 14:00:05', '2019-01-03 14:00:05', '', '', '', '', '1');
INSERT INTO `shop_products` VALUES ('9', 'Laptop dell c5 2', 'dientucongnghe', '[\"\\/files\\/1\\/2bd1979681cbf963e734bd0957dd6a5c.jpg\",\"\\/files\\/1\\/anh mau.jpg\",\"\\/files\\/1\\/9f878125624978da2440b5b326bd24cd.jpg\"]', 'Laptop dell c5 2', 'Laptop dell c5 2', '23000000', '8000000', '100', '3', '2019-01-03 14:00:26', '2019-01-03 14:00:26', '', '', '', '', '1');
INSERT INTO `shop_products` VALUES ('10', 'Laptop dell c5 3', 'dientucongnghe', '[\"\\/files\\/1\\/2bd1979681cbf963e734bd0957dd6a5c.jpg\",\"\\/files\\/1\\/anh mau.jpg\",\"\\/files\\/1\\/9f878125624978da2440b5b326bd24cd.jpg\"]', 'Laptop dell c5 3', 'Laptop dell c5 3', '10000000', '8000000', '100', '1', '2019-01-03 14:00:50', '2019-01-03 14:00:50', '', '', '', '', '1');
INSERT INTO `shop_products` VALUES ('11', 'Laptop dell c5 4', 'dientucongnghe', '[\"\\/files\\/1\\/2bd1979681cbf963e734bd0957dd6a5c.jpg\",\"\\/files\\/1\\/anh mau.jpg\",\"\\/files\\/1\\/9f878125624978da2440b5b326bd24cd.jpg\"]', 'Laptop dell c5 4', 'Laptop dell c5 4', '10000000', '8000000', '100', '1', '2019-01-03 14:01:12', '2019-01-03 14:01:12', '', '', '', '', '1');
INSERT INTO `shop_products` VALUES ('12', 'Pencil dress', 'pencil-dress', '[\"\\/files\\/1\\/ip2.jpg\"]', '', '', '10000000', '8000000', '100', '1', '2019-02-17 06:17:35', '2019-02-17 06:17:35', '', '', '', '', '1');
INSERT INTO `shop_products` VALUES ('13', 'Casual dress', 'casual-dress', '[\"\\/files\\/1\\/hp2.jpg\"]', '', '', '10000000', '8000000', '100', '1', '2019-02-17 06:18:31', '2019-02-17 06:18:55', '', '', '', '', '1');
INSERT INTO `shop_products` VALUES ('14', 'Casual dress', 'casual-dress', '[\"\\/files\\/1\\/cp1.jpg\"]', '', '', '10000000', '8000000', '100', '4', '2019-02-17 06:19:31', '2019-02-17 06:19:31', '', '', '', '', '1');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users 11
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'user 1', 'user@gmail.com', null, '$2y$10$LuvJUEo6fw1W2SMm0/csDO.gAV02LdJiOARsxLch.UmQ3nAOPNWGK', 'LxbD1isklrTolCIzRm8Tr9eZPnQvn9uP5dOP0kp7sBJMvaUxSmWvrVxG17dM', '2018-12-31 06:42:02', '2018-12-31 06:42:02');

-- ----------------------------
-- Table structure for users_roles_href
-- ----------------------------
DROP TABLE IF EXISTS `users_roles_href`;
CREATE TABLE `users_roles_href` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users_roles_href
-- ----------------------------
INSERT INTO `users_roles_href` VALUES ('1', '1', '1');
INSERT INTO `users_roles_href` VALUES ('2', '1', '2');
INSERT INTO `users_roles_href` VALUES ('3', '1', '3');