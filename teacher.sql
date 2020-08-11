/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100138
 Source Host           : localhost:3306
 Source Schema         : teacher

 Target Server Type    : MySQL
 Target Server Version : 100138
 File Encoding         : 65001

 Date: 10/08/2020 17:01:07
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_croatian_ci NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_croatian_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `type` tinyint(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_croatian_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES (1, 'morning meeting', '/uploads/category/1596791034morning.png', NULL, NULL, 1);
INSERT INTO `category` VALUES (2, 'Science', '/uploads/category/1596791288science.jpg', NULL, NULL, 1);
INSERT INTO `category` VALUES (3, 'Religion', '/uploads/category/1596791316religion.jpg', NULL, NULL, 2);
INSERT INTO `category` VALUES (4, 'ELA ', '/uploads/category/1596791328ela.jpg', NULL, NULL, 2);
INSERT INTO `category` VALUES (5, 'Math', '/uploads/category/1596791338math.jpg', NULL, NULL, 3);

-- ----------------------------
-- Table structure for contact
-- ----------------------------
DROP TABLE IF EXISTS `contact`;
CREATE TABLE `contact`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_croatian_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_croatian_ci NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_croatian_ci NULL DEFAULT NULL,
  `content` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_croatian_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_croatian_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of contact
-- ----------------------------
INSERT INTO `contact` VALUES (1, 'asdfadsf', 'ideveloper2020@hotmail.com', '234234', 'asdfadfdaf', '2020-08-08 00:00:00', NULL);
INSERT INTO `contact` VALUES (2, 'asdf', 'ideveloper2020@hotmail.com', '234234', 'asdffd', '2020-08-08 00:00:00', NULL);
INSERT INTO `contact` VALUES (3, 'testname', 'test@mail.com', NULL, 'this is test', '2020-08-09 06:55:18', NULL);
INSERT INTO `contact` VALUES (4, 'asdfadsf', 'ideveloper2020@hotmail.com', '234234', 'asdfadfdaf', '2020-08-08 00:00:00', NULL);
INSERT INTO `contact` VALUES (5, 'asdf', 'ideveloper2020@hotmail.com', '234234', 'asdffd', '2020-08-08 00:00:00', NULL);
INSERT INTO `contact` VALUES (6, 'testname', 'test@mail.com', NULL, 'this is test', '2020-08-09 06:55:18', NULL);
INSERT INTO `contact` VALUES (7, 'asdfadsf', 'ideveloper2020@hotmail.com', '234234', 'asdfadfdaf', '2020-08-08 00:00:00', NULL);
INSERT INTO `contact` VALUES (9, 'testname', 'test@mail.com', NULL, 'this is test', '2020-08-09 06:55:18', NULL);
INSERT INTO `contact` VALUES (10, 'asdfadsf', 'ideveloper2020@hotmail.com', '234234', 'asdfadfdaf', '2020-08-08 00:00:00', NULL);
INSERT INTO `contact` VALUES (11, 'asdf', 'ideveloper2020@hotmail.com', '234234', 'asdffd', '2020-08-08 00:00:00', NULL);
INSERT INTO `contact` VALUES (12, 'testname', 'test@mail.com', NULL, 'this is test', '2020-08-09 06:55:18', NULL);

-- ----------------------------
-- Table structure for files
-- ----------------------------
DROP TABLE IF EXISTS `files`;
CREATE TABLE `files`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_croatian_ci NULL DEFAULT NULL,
  `file_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_croatian_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `main_cate` enum('video','audio','books') CHARACTER SET utf8mb4 COLLATE utf8mb4_croatian_ci NULL DEFAULT NULL,
  `file_type` enum('mp4','mp3') CHARACTER SET utf8mb4 COLLATE utf8mb4_croatian_ci NULL DEFAULT NULL,
  `link_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_croatian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 27 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_croatian_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of files
-- ----------------------------
INSERT INTO `files` VALUES (4, 1, 'video1', '/uploads/media/1596807815mov_bbb.mp4', NULL, NULL, 'video', 'mp4', 'http://www.cindydelrio.me/tk/The Seasons 1.mp4');
INSERT INTO `files` VALUES (7, 2, 'video2', '/uploads/media/1596807810mov_bbb.mp4', NULL, NULL, 'video', 'mp4', '');
INSERT INTO `files` VALUES (8, 2, 'video2', '/uploads/media/1596807804mov_bbb.mp4', NULL, NULL, 'video', 'mp4', '');
INSERT INTO `files` VALUES (9, 2, 'video4', '/uploads/media/1596807797mov_bbb.mp4', NULL, NULL, 'video', 'mp4', '');
INSERT INTO `files` VALUES (10, 1, 'video5', '/uploads/media/1596807020mov_bbb.mp4', NULL, NULL, 'video', 'mp4', '');
INSERT INTO `files` VALUES (12, 3, 'audio2', '/uploads/media/1596809190file_example_MP3_700KB.mp3', NULL, NULL, 'audio', 'mp3', '');
INSERT INTO `files` VALUES (13, 3, 'audio3', '/uploads/media/1596809194file_example_MP3_700KB.mp3', NULL, NULL, 'audio', 'mp3', '');
INSERT INTO `files` VALUES (14, 4, 'audio4', '/uploads/media/1596809342file_example_MP3_700KB.mp3', NULL, NULL, 'audio', 'mp3', '');
INSERT INTO `files` VALUES (15, 4, 'audio5', '/uploads/media/1596809356file_example_MP3_700KB.mp3', NULL, NULL, 'audio', 'mp3', '');
INSERT INTO `files` VALUES (20, 5, 'bookshelfs1 video', '/uploads/media/1596837543mov_bbb.mp4', NULL, NULL, 'books', 'mp4', '');
INSERT INTO `files` VALUES (21, 5, 'bookshelfs2 video', '/uploads/media/1596837567mov_bbb.mp4', NULL, NULL, 'books', 'mp4', '');
INSERT INTO `files` VALUES (22, 5, 'bookshelfs3 video', '/uploads/media/1596837585mov_bbb.mp4', NULL, NULL, 'books', 'mp4', '');
INSERT INTO `files` VALUES (23, 5, 'bookshelfs1 audio', '/uploads/media/1596837607file_example_MP3_700KB.mp3', NULL, NULL, 'books', 'mp3', '');
INSERT INTO `files` VALUES (24, 5, 'bookshelfs2 audio', '/uploads/media/1596837621file_example_MP3_700KB.mp3', NULL, NULL, 'books', 'mp3', '');
INSERT INTO `files` VALUES (25, 5, 'bookshelfs3 audio', '/uploads/media/1596837640file_example_MP3_700KB.mp3', NULL, NULL, 'books', 'mp3', '');
INSERT INTO `files` VALUES (26, 3, 'asdf', NULL, NULL, NULL, 'audio', NULL, 'https://vimeo.com/347119375');

-- ----------------------------
-- Table structure for settings
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings`  (
  `teacher_avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_croatian_ci NULL DEFAULT NULL,
  `about_content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_croatian_ci NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_croatian_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `ipad_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_croatian_ci NULL DEFAULT NULL,
  `calendar_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_croatian_ci NULL DEFAULT NULL,
  `desktop_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_croatian_ci NULL DEFAULT NULL,
  `popup_message` tinyint(4) NULL DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_croatian_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_croatian_ci NULL DEFAULT NULL,
  `whiteboard_text` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_croatian_ci NULL,
  `whiteboard_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_croatian_ci NULL DEFAULT NULL,
  `whiteboard_type` enum('text','image') CHARACTER SET utf8mb4 COLLATE utf8mb4_croatian_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_croatian_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of settings
-- ----------------------------
INSERT INTO `settings` VALUES ('/uploads/avatar/15967540761596722227avataaars.png', '<p style=\"text-align: center; \">My name is Cindy Del Rio-Galarza.This is my 6th year teaching at St. Vincent School as a Transitional Kindergarten Teacher. </p><p style=\"text-align: center;\">I come from a wonderful catholic family with strong beliefs, morals, and catholic values. </p><p style=\"text-align: left;\">I received my Bachelor’s Degree in Child Development from CSUN and my Masters of Science in Education from Mount St. Mary’s University. I got married in August 2018 to a wonderful man that God set before me and had my first child, my little princess, in May 2019. My teaching consists of reaching each child by meeting the different learning styles each student may have; visual, kinesthetic, auditory, etc.., through resources such as videos, songs, movement, technology and the good old fashion and effective paper and pencil. I strive to ensure that your children become successful students who enjoy learning as much as I enjoy teaching.</p>', '<p>welcome to </p><p>mrs.del rio-galarza\'s </p><p>tk virtual classroom</p>', NULL, NULL, 'http://google.com', 'http://google.com', 'http://google.com', NULL, 1, 'admin', '12345', '<div style=\"text-align: center;\"><font style=\"background-color: rgb(255, 255, 255);\" color=\"#ff0000\"><span style=\"font-size: 12pt; font-family: Impact;\" arial=\"\" black\";\"=\"\" segoe=\"\" ui=\"\" emoji\";\"=\"\" comic=\"\" sans=\"\" ms\";\"=\"\">WELCOME TO MRS. DEL RI</span><span style=\"font-family: Impact;\" arial=\"\" black\";\"=\"\" segoe=\"\" ui=\"\" emoji\";\"=\"\">﻿</span><span style=\"font-size: 12pt; font-family: Impact;\" arial=\"\" black\";\"=\"\" segoe=\"\" ui=\"\" emoji\";\"=\"\" comic=\"\" sans=\"\" ms\";\"=\"\">O</span></font></div><p style=\"text-align: center; \"></p>', '', 'image');

-- ----------------------------
-- Table structure for shortcuts
-- ----------------------------
DROP TABLE IF EXISTS `shortcuts`;
CREATE TABLE `shortcuts`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_croatian_ci NULL DEFAULT NULL,
  `picture` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_croatian_ci NULL DEFAULT NULL,
  `link_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_croatian_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_croatian_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `popup` tinyint(1) NULL DEFAULT NULL COMMENT '1:yes,2:no',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_croatian_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of shortcuts
-- ----------------------------
INSERT INTO `shortcuts` VALUES (5, 'TASTY CAKE', '/uploads/shortcut/1596778895cake.png', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.', NULL, NULL, 1);
INSERT INTO `shortcuts` VALUES (6, 'LOG CABIN', '/uploads/shortcut/1596779563cabin.png', 'https://google.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.', NULL, NULL, 1);
INSERT INTO `shortcuts` VALUES (7, 'CIRCUS TENT', '/uploads/shortcut/1596787591circus.png', 'http://google.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.', NULL, NULL, 1);
INSERT INTO `shortcuts` VALUES (8, 'CONTROLLER', '/uploads/shortcut/1596787658game.png', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.', NULL, NULL, 1);
INSERT INTO `shortcuts` VALUES (9, 'LOCKED SAFE', '/uploads/shortcut/1596787687safe.png', 'http://google.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.', NULL, NULL, 0);
INSERT INTO `shortcuts` VALUES (10, 'submarine', '/uploads/shortcut/1596787720submarine.png', 'https://google.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.', NULL, NULL, 1);
INSERT INTO `shortcuts` VALUES (11, '', '/uploads/shortcut/15969487031596778229cabin.png', '', '', NULL, NULL, 1);

SET FOREIGN_KEY_CHECKS = 1;
