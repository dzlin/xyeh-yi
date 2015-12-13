/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : xyeh

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2015-12-13 20:53:36
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for xyeh_collect
-- ----------------------------
DROP TABLE IF EXISTS `xyeh_collect`;
CREATE TABLE `xyeh_collect` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) unsigned NOT NULL DEFAULT '0',
  `gid` int(11) unsigned NOT NULL DEFAULT '0',
  `time` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for xyeh_comment
-- ----------------------------
DROP TABLE IF EXISTS `xyeh_comment`;
CREATE TABLE `xyeh_comment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) unsigned NOT NULL DEFAULT '0',
  `gid` int(11) unsigned NOT NULL DEFAULT '0',
  `time` int(11) unsigned NOT NULL DEFAULT '0',
  `comment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `pid` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for xyeh_feed
-- ----------------------------
DROP TABLE IF EXISTS `xyeh_feed`;
CREATE TABLE `xyeh_feed` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) unsigned DEFAULT '0',
  `feedback` varchar(2048) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` int(11) unsigned DEFAULT '0',
  `status` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for xyeh_goods
-- ----------------------------
DROP TABLE IF EXISTS `xyeh_goods`;
CREATE TABLE `xyeh_goods` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) unsigned NOT NULL DEFAULT '0',
  `title` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` int(11) unsigned NOT NULL DEFAULT '0',
  `cid` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `price` float(7,2) NOT NULL DEFAULT '0.00',
  `contact` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for xyeh_goodsimage
-- ----------------------------
DROP TABLE IF EXISTS `xyeh_goodsimage`;
CREATE TABLE `xyeh_goodsimage` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `gid` int(11) unsigned NOT NULL DEFAULT '0',
  `time` int(11) unsigned NOT NULL DEFAULT '0',
  `name` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for xyeh_like
-- ----------------------------
DROP TABLE IF EXISTS `xyeh_like`;
CREATE TABLE `xyeh_like` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) unsigned NOT NULL DEFAULT '0',
  `gid` int(11) unsigned NOT NULL DEFAULT '0',
  `time` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for xyeh_look
-- ----------------------------
DROP TABLE IF EXISTS `xyeh_look`;
CREATE TABLE `xyeh_look` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) unsigned NOT NULL DEFAULT '0',
  `gid` int(11) unsigned NOT NULL DEFAULT '0',
  `time` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for xyeh_message
-- ----------------------------
DROP TABLE IF EXISTS `xyeh_message`;
CREATE TABLE `xyeh_message` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `send` int(11) unsigned NOT NULL DEFAULT '0',
  `receive` int(11) unsigned NOT NULL DEFAULT '0',
  `time` int(11) unsigned NOT NULL DEFAULT '0',
  `message` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for xyeh_notice
-- ----------------------------
DROP TABLE IF EXISTS `xyeh_notice`;
CREATE TABLE `xyeh_notice` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) unsigned NOT NULL DEFAULT '0',
  `cnum` int(11) unsigned NOT NULL DEFAULT '0',
  `lnum` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for xyeh_step
-- ----------------------------
DROP TABLE IF EXISTS `xyeh_step`;
CREATE TABLE `xyeh_step` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) unsigned NOT NULL DEFAULT '0',
  `gid` int(11) unsigned NOT NULL DEFAULT '0',
  `time` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for xyeh_user
-- ----------------------------
DROP TABLE IF EXISTS `xyeh_user`;
CREATE TABLE `xyeh_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `email` varchar(255) DEFAULT NULL COMMENT '邮箱',
  `password` varchar(32) DEFAULT NULL COMMENT '密码',
  `register_time` int(10) unsigned DEFAULT '0' COMMENT '注册时间',
  `status` tinyint(1) unsigned DEFAULT '0' COMMENT '用户状态，默认0（不可用），1可用',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`) USING BTREE COMMENT '邮箱唯一索引'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='基本用户信息表';

-- ----------------------------
-- Table structure for xyeh_user_active
-- ----------------------------
DROP TABLE IF EXISTS `xyeh_user_active`;
CREATE TABLE `xyeh_user_active` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
  `code` char(32) DEFAULT NULL COMMENT '注册激活码，32位随机字符串',
  PRIMARY KEY (`id`),
  KEY `code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='用户激活码表';

-- ----------------------------
-- Table structure for xyeh_user_bak
-- ----------------------------
DROP TABLE IF EXISTS `xyeh_user_bak`;
CREATE TABLE `xyeh_user_bak` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `truename` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nikename` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stuid` char(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `schid` tinyint(1) DEFAULT '1',
  `gender` tinyint(1) DEFAULT '0',
  `password` char(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '经过两次md5加密',
  `avatar` varchar(64) COLLATE utf8_unicode_ci DEFAULT 'user.jpg',
  `email` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `register` int(11) unsigned DEFAULT '0',
  `point` int(11) DEFAULT '0',
  `loginnum` int(11) DEFAULT '0',
  `lastlogin` int(11) unsigned DEFAULT '0',
  `active` char(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '注册激活代码',
  `backcode` char(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT '1' COMMENT '0冻结，1正常，2是未激活，3申请重置密码中',
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
