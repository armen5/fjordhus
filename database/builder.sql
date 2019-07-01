/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : builder

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-07-01 19:09:35
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for answers
-- ----------------------------
DROP TABLE IF EXISTS `answers`;
CREATE TABLE `answers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question_id` int(10) unsigned NOT NULL,
  `answers` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `answers_question_id_foreign` (`question_id`) USING BTREE,
  CONSTRAINT `answers_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of answers
-- ----------------------------

-- ----------------------------
-- Table structure for coefficients
-- ----------------------------
DROP TABLE IF EXISTS `coefficients`;
CREATE TABLE `coefficients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coefficient` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of coefficients
-- ----------------------------
INSERT INTO `coefficients` VALUES ('1', 'Lime ', 'lime', '4', '2019-06-28 09:38:15', '2019-06-28 09:38:29');
INSERT INTO `coefficients` VALUES ('2', 'Butterfly Wall Ties', 'butterfly_wall_ties', '4', '2019-06-28 09:38:19', '2019-06-28 09:38:32');
INSERT INTO `coefficients` VALUES ('3', 'Lintels Over Opening', 'lintels_over_opening', '6', '2019-06-28 09:38:21', '2019-06-28 09:38:36');
INSERT INTO `coefficients` VALUES ('4', 'Ducts ', 'ducts ', '6', '2019-06-28 09:38:24', '2019-06-28 09:38:38');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('12', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('13', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('14', '2019_06_27_044932_create_questions_sections_table', '1');
INSERT INTO `migrations` VALUES ('15', '2019_06_27_053028_create_questions_table', '1');
INSERT INTO `migrations` VALUES ('16', '2019_06_27_053103_create_answers_table', '1');
INSERT INTO `migrations` VALUES ('17', '2019_06_27_053333_create_question_details_table', '1');
INSERT INTO `migrations` VALUES ('18', '2019_06_28_052230_create_coefficients_table', '2');
INSERT INTO `migrations` VALUES ('19', '2019_06_28_053904_create_sections_table', '3');
INSERT INTO `migrations` VALUES ('20', '2019_06_28_072331_create_quizzes_table', '4');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for questions
-- ----------------------------
DROP TABLE IF EXISTS `questions`;
CREATE TABLE `questions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('common','individual') COLLATE utf8mb4_unicode_ci NOT NULL,
  `require` enum('','yes','no') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of questions
-- ----------------------------
INSERT INTO `questions` VALUES ('1', 'Are Fjordhus doing the foundations?', 'common', 'yes', '2019-06-27 13:10:05', '2019-06-27 13:10:05');
INSERT INTO `questions` VALUES ('2', 'What type of foundations?', 'common', 'yes', '2019-06-27 13:12:54', '2019-06-27 13:12:54');
INSERT INTO `questions` VALUES ('3', 'What is the length of the external wall ?', 'common', 'yes', '2019-06-27 13:19:01', '2019-06-27 13:19:01');
INSERT INTO `questions` VALUES ('4', 'what is the length of the internal load bearing wall ?', 'common', 'yes', '2019-06-27 13:19:23', '2019-06-27 13:19:23');
INSERT INTO `questions` VALUES ('5', 'what is the thickness of the timber frame ?', 'common', 'yes', '2019-06-27 13:20:03', '2019-06-27 13:20:03');
INSERT INTO `questions` VALUES ('6', 'what is the depth of underbuild?', 'common', 'yes', '2019-06-27 13:20:20', '2019-06-27 13:20:20');
INSERT INTO `questions` VALUES ('7', 'what is the area of the groud floor?', 'common', 'yes', '2019-06-27 13:20:37', '2019-06-27 13:20:37');
INSERT INTO `questions` VALUES ('8', 'are we working in winter ?', 'common', 'yes', '2019-06-27 13:21:07', '2019-06-27 13:21:07');
INSERT INTO `questions` VALUES ('9', 'what type of concrete?', 'individual', 'yes', '2019-06-27 13:23:00', '2019-06-27 13:23:00');
INSERT INTO `questions` VALUES ('10', 'is mesh required', 'individual', 'yes', '2019-06-27 13:23:33', '2019-06-27 13:23:33');
INSERT INTO `questions` VALUES ('11', 'what type of Mesh?', 'individual', 'no', '2019-06-27 13:25:43', '2019-06-27 13:25:43');

-- ----------------------------
-- Table structure for questions_sections
-- ----------------------------
DROP TABLE IF EXISTS `questions_sections`;
CREATE TABLE `questions_sections` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of questions_sections
-- ----------------------------
INSERT INTO `questions_sections` VALUES ('1', 'section', '2019-06-27 15:42:22', '2019-06-27 15:42:25');

-- ----------------------------
-- Table structure for question_details
-- ----------------------------
DROP TABLE IF EXISTS `question_details`;
CREATE TABLE `question_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `question_id` int(11) unsigned NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `question_id_for` (`question_id`) USING BTREE,
  CONSTRAINT `question_id_for` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of question_details
-- ----------------------------
INSERT INTO `question_details` VALUES ('1', '2019-06-27 13:10:05', '2019-06-27 13:10:05', '1', 'html_format', 'radio');
INSERT INTO `question_details` VALUES ('2', '2019-06-27 13:10:05', '2019-06-27 13:10:05', '1', 'answers', '[\"No\",\"Yes\"]');
INSERT INTO `question_details` VALUES ('3', '2019-06-27 13:12:54', '2019-06-27 13:12:54', '2', 'html_format', 'radio');
INSERT INTO `question_details` VALUES ('4', '2019-06-27 13:12:54', '2019-06-27 13:12:54', '2', 'answers', '[\"Beam & Block\",\"Concrete Slab\"]');
INSERT INTO `question_details` VALUES ('5', '2019-06-27 13:19:01', '2019-06-27 13:19:01', '3', 'html_format', 'input');
INSERT INTO `question_details` VALUES ('6', '2019-06-27 13:19:01', '2019-06-27 13:19:01', '3', 'input_format', 'number');
INSERT INTO `question_details` VALUES ('7', '2019-06-27 13:19:23', '2019-06-27 13:19:23', '4', 'html_format', 'input');
INSERT INTO `question_details` VALUES ('8', '2019-06-27 13:19:23', '2019-06-27 13:19:23', '4', 'input_format', 'number');
INSERT INTO `question_details` VALUES ('9', '2019-06-27 13:20:03', '2019-06-27 13:20:03', '5', 'html_format', 'radio');
INSERT INTO `question_details` VALUES ('10', '2019-06-27 13:20:03', '2019-06-27 13:20:03', '5', 'answers', '[\"195mm\",\"145mm\"]');
INSERT INTO `question_details` VALUES ('11', '2019-06-27 13:20:20', '2019-06-27 13:20:20', '6', 'html_format', 'input');
INSERT INTO `question_details` VALUES ('12', '2019-06-27 13:20:20', '2019-06-27 13:20:20', '6', 'input_format', 'number');
INSERT INTO `question_details` VALUES ('13', '2019-06-27 13:20:37', '2019-06-27 13:20:37', '7', 'html_format', 'input');
INSERT INTO `question_details` VALUES ('14', '2019-06-27 13:20:38', '2019-06-27 13:20:38', '7', 'input_format', 'number');
INSERT INTO `question_details` VALUES ('15', '2019-06-27 13:21:07', '2019-06-27 13:21:07', '8', 'html_format', 'radio');
INSERT INTO `question_details` VALUES ('16', '2019-06-27 13:21:07', '2019-06-27 13:21:07', '8', 'answers', '[\"Yes\",\"No\"]');
INSERT INTO `question_details` VALUES ('17', '2019-06-27 13:23:00', '2019-06-27 13:23:00', '9', 'html_format', 'radio');
INSERT INTO `question_details` VALUES ('18', '2019-06-27 13:23:00', '2019-06-27 13:23:00', '9', 'answers', '[\"Gen 3\",\"RC35\"]');
INSERT INTO `question_details` VALUES ('19', '2019-06-27 13:23:33', '2019-06-27 13:23:33', '10', 'html_format', 'radio');
INSERT INTO `question_details` VALUES ('20', '2019-06-27 13:23:33', '2019-06-27 13:23:33', '10', 'answers', '[\"Yes\",\"No\"]');
INSERT INTO `question_details` VALUES ('21', '2019-06-27 13:25:43', '2019-06-27 13:25:43', '11', 'html_format', 'radio');
INSERT INTO `question_details` VALUES ('22', '2019-06-27 13:25:43', '2019-06-27 13:25:43', '11', 'answers', '[\"A142\",\"A193\",\"A252\",\"A393\"]');

-- ----------------------------
-- Table structure for quizzes
-- ----------------------------
DROP TABLE IF EXISTS `quizzes`;
CREATE TABLE `quizzes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `type` enum('pending','completed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `answers` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `quizzes_user_id_foreign` (`user_id`) USING BTREE,
  CONSTRAINT `quizzes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of quizzes
-- ----------------------------

-- ----------------------------
-- Table structure for sections
-- ----------------------------
DROP TABLE IF EXISTS `sections`;
CREATE TABLE `sections` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of sections
-- ----------------------------
INSERT INTO `sections` VALUES ('1', 'Excavate & Lay Foundations', 'excavate_lay_foundations', '2019-06-28 06:46:38', '2019-06-28 06:46:38');
INSERT INTO `sections` VALUES ('2', 'Build Underbuilding', 'build_underbuilding', '2019-06-28 06:50:04', '2019-06-28 06:50:04');
INSERT INTO `sections` VALUES ('3', 'Upfill', 'upfill', '2019-06-28 06:50:21', '2019-06-28 06:50:21');
INSERT INTO `sections` VALUES ('4', 'Concrete Slabs', 'concrete_slabs', '2019-06-28 06:50:37', '2019-06-28 06:50:37');

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
  `type` enum('user','admin') COLLATE utf8mb4_unicode_ci DEFAULT 'user',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `users_email_unique` (`email`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Admin', 'fjordhus@mail.ru', null, '$2y$10$XkbsZ/YIv7DebT7KJRdgQ.8eLq2.jx0.yg0KbfxRl3RHIwY19/GD.', 'ENfhlWcJjadoSeE9yn4pHZfFXGexPOQw88cnpwhqIQWVJzwWZprO00KgqqGD', '2019-06-27 07:04:56', '2019-06-27 07:04:56', 'admin');
INSERT INTO `users` VALUES ('2', 'User', 'user@mail.ru', null, '$2y$10$SUZQ.rRzuegjfrW15eI0fO7TWtUlLAR6Kiasz4DEg4HYoHgXGXMqK', 'ST2TAmvQgstaZ7bQAySM5nl1pfyTggrLe1m8riecrWZDPwKRYswT7eBK3E1u', '2019-06-28 07:15:29', '2019-06-28 07:15:29', 'user');
