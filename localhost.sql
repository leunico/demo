-- Adminer 4.2.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `albert` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `albert`;

DROP TABLE IF EXISTS `albert_cate`;
CREATE TABLE `albert_cate` (
  `cate_Id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cate_ParentId` int(11) unsigned DEFAULT '0',
  `cate_Name` varchar(100) NOT NULL,
  `cate_Intro` varchar(255) DEFAULT NULL,
  `cate_Model` varchar(64) NOT NULL DEFAULT '',
  `cate_Order` int(11) unsigned DEFAULT '0',
  `cate_Icon` varchar(64) DEFAULT NULL,
  `updata_at` timestamp NULL DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cate_Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `albert_cate` (`cate_Id`, `cate_ParentId`, `cate_Name`, `cate_Intro`, `cate_Model`, `cate_Order`, `cate_Icon`, `updata_at`, `create_at`) VALUES
(13,	10,	'php安全',	'讲述php安全',	'',	0,	'icons/1.gif',	NULL,	NULL),
(12,	10,	'oop',	'oop',	'',	0,	'icons/1.gif',	NULL,	NULL),
(11,	10,	'php基础知识',	'php基础知识',	'',	0,	'icons/1.gif',	NULL,	NULL),
(10,	2,	'php',	'php学习',	'',	0,	'icons/18.gif',	NULL,	NULL),
(9,	2,	'css',	'css学习',	'',	0,	'icons/1.gif',	NULL,	NULL),
(8,	2,	'html',	'html学习',	'',	0,	'icons/1.gif',	NULL,	NULL),
(7,	0,	'假日休闲',	'悠闲、自在',	'',	0,	'fa-paper-plane',	NULL,	NULL),
(6,	0,	'栀子花开',	'青春无限',	'',	0,	'icons/8.gif',	NULL,	NULL),
(3,	0,	'生活点滴',	'记录生活点滴',	'',	0,	'icons/2.gif',	NULL,	NULL),
(2,	0,	'技术学习',	'平时学习的一些笔记，欢迎批评指正。',	'',	0,	'icons/18.gif',	NULL,	NULL),
(5,	0,	'水煮三国',	'品位三国智慧',	'',	0,	'icons/3.gif',	NULL,	NULL),
(4,	0,	'往事如风',	'记录往事',	'',	0,	'icons/6.gif',	NULL,	NULL),
(14,	10,	'seagull framework',	'seagull framework',	'',	0,	'icons/1.gif',	NULL,	NULL),
(15,	2,	'javascript',	'javascript学习',	'',	0,	'icons/1.gif',	NULL,	NULL),
(16,	2,	'设计模式',	NULL,	'',	0,	'icons/1.gif',	NULL,	NULL),
(17,	2,	'软件工程',	'软件工程学习',	'',	0,	'icons/1.gif',	NULL,	NULL),
(18,	3,	'厦门生活',	'厦门生活',	'',	0,	'icons/8.gif',	NULL,	NULL),
(19,	3,	'大学生活',	'大学生活',	'',	0,	'icons/8.gif',	NULL,	NULL),
(20,	3,	'童年生活',	'童年生活',	'',	0,	'icons/15.gif',	NULL,	NULL),
(21,	19,	'学习',	'学习',	'',	0,	'icons/1.gif',	NULL,	NULL),
(22,	19,	'运动',	'运动',	'',	0,	'icons/16.gif',	NULL,	NULL),
(23,	19,	'旅游',	'旅游',	'',	0,	'icons/24.gif',	NULL,	NULL),
(24,	22,	'排球',	'排球',	'',	0,	'icons/9.gif',	NULL,	NULL),
(25,	22,	'篮球',	'篮球',	'',	0,	'icons/9.gif',	NULL,	NULL),
(26,	22,	'羽毛球',	'羽毛球',	'',	0,	'icons/9.gif',	NULL,	NULL),
(27,	22,	'乒乓球',	'乒乓球',	'',	0,	'icons/9.gif',	NULL,	NULL);

-- 2017-11-07 10:51:59
