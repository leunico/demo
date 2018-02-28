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
  `cate_Status` tinyint(1) unsigned DEFAULT '1',
  `cate_Type` tinyint(1) unsigned DEFAULT '1',
  `update_time` timestamp NULL DEFAULT NULL,
  `create_time` timestamp NULL DEFAULT NULL,
  `delete_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cate_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `albert_cate` (`cate_Id`, `cate_ParentId`, `cate_Name`, `cate_Intro`, `cate_Model`, `cate_Order`, `cate_Icon`, `cate_Status`, `cate_Type`, `update_time`, `create_time`, `delete_time`) VALUES
(4,	0,	'项目管理',	'存放你的接口文档和项目',	'admin/index/index',	0,	'plug',	1,	3,	'2017-11-30 01:57:48',	NULL,	NULL),
(35,	4,	'项目列表',	'打开所有的接口列表例如：http://api.crap.cn',	'/admin/index/index',	2,	'reorder',	1,	3,	'2017-11-17 05:47:31',	'2017-11-11 05:33:15',	'2017-11-17 05:47:31'),
(36,	0,	'数据库管理',	'管理接口数据库',	'admin/database/index',	1,	'cubes',	1,	3,	'2017-11-17 08:10:45',	'2017-11-17 05:49:36',	NULL),
(37,	0,	'API接口',	'存放接口信息',	'project/index/api',	1,	'random',	1,	2,	'2017-12-21 01:12:09',	'2017-11-24 01:32:30',	NULL),
(38,	0,	'项目概况',	'记录项目的基本信息',	'project/index/index',	0,	'line-chart',	1,	2,	'2017-12-07 11:08:14',	'2017-11-24 01:45:06',	NULL),
(39,	37,	'测试',	'呃呃呃',	'22222',	0,	'address-book',	1,	2,	'2017-11-24 01:45:42',	'2017-11-24 01:45:35',	'2017-11-24 01:45:42'),
(40,	4,	'测试',	'测试',	'/admin/index/index',	0,	'address-card-o',	1,	3,	'2017-11-24 10:08:55',	'2017-11-24 10:05:55',	'2017-11-24 10:08:55'),
(41,	4,	'测试233',	'测试',	'admin/index/index2',	0,	'address-card',	1,	3,	'2018-01-02 07:05:54',	'2017-12-04 01:29:24',	'2018-01-02 07:05:54'),
(42,	4,	'测试测试',	'测试测试',	'admin/index/index',	0,	'address-card-o',	1,	3,	'2018-01-02 07:05:51',	'2017-12-04 05:40:37',	'2018-01-02 07:05:51'),
(43,	38,	'测试',	'2333',	'project/api/index2',	0,	'area-chart',	1,	2,	'2017-12-05 09:35:37',	'2017-12-04 11:17:45',	'2017-12-05 09:35:37'),
(44,	0,	'状态码',	'接口状态码',	'project/index/code',	2,	'tags',	1,	2,	'2017-12-21 01:12:07',	'2017-12-21 01:11:56',	NULL),
(45,	0,	'项目文档',	'项目文档',	'project/index/doc',	3,	'pencil-square',	1,	2,	'2017-12-21 01:15:58',	'2017-12-21 01:15:50',	NULL),
(46,	0,	'协作管理',	'协作管理',	'project/index/team',	4,	'users',	1,	2,	'2017-12-21 01:17:15',	'2017-12-21 01:17:09',	NULL),
(47,	0,	'项目动态',	'项目动态',	'project/index/log',	5,	'calendar-check-o',	1,	2,	'2017-12-21 01:19:11',	'2017-12-21 01:18:55',	NULL);

DROP TABLE IF EXISTS `albert_code`;
CREATE TABLE `albert_code` (
  `code_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` int(11) unsigned NOT NULL,
  `group_id` int(11) unsigned NOT NULL,
  `code_name` varchar(64) NOT NULL,
  `code_remark` varchar(255) NOT NULL,
  `code_order` int(11) unsigned NOT NULL DEFAULT '0',
  `update_time` timestamp NULL DEFAULT NULL,
  `create_time` timestamp NULL DEFAULT NULL,
  `delete_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`code_id`),
  KEY `project_id` (`project_id`),
  KEY `group_id` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `albert_code` (`code_id`, `project_id`, `group_id`, `code_name`, `code_remark`, `code_order`, `update_time`, `create_time`, `delete_time`) VALUES
(2,	8,	0,	'2333',	'成都成都',	2,	'2017-12-22 07:42:22',	'2017-12-22 06:14:19',	NULL),
(3,	8,	27,	'23229',	'搽了很多次',	2,	'2018-02-05 06:48:51',	'2017-12-22 07:50:58',	NULL),
(4,	8,	22,	'2323',	'哈哈啊是多少',	1,	'2018-02-28 05:47:17',	'2017-12-22 08:00:16',	NULL),
(5,	8,	21,	'23123',	'地方大师傅',	0,	'2017-12-22 08:00:59',	'2017-12-22 08:00:40',	'2017-12-22 08:00:59'),
(6,	8,	0,	'34555',	'士大夫十分',	0,	'2017-12-22 08:00:47',	'2017-12-22 08:00:47',	NULL),
(7,	8,	22,	'1234141',	'大大苏打',	2,	'2018-02-07 05:48:12',	'2017-12-26 10:51:49',	'2018-02-07 05:48:12'),
(8,	8,	26,	'12312',	'无人区233',	2,	'2018-02-05 07:17:39',	'2017-12-26 10:52:01',	NULL),
(9,	8,	22,	'787838',	'冯绍峰',	0,	'2018-02-07 06:12:46',	'2017-12-26 10:52:08',	'2018-02-07 06:12:46'),
(10,	8,	26,	'978748',	'法随风倒十分',	2,	'2018-02-05 07:23:55',	'2017-12-26 10:52:17',	NULL),
(11,	8,	22,	'5456465',	'dads的',	1,	'2018-02-05 07:28:30',	'2017-12-26 10:52:28',	'2018-02-05 07:28:30'),
(12,	8,	22,	'2312321',	'啊实打实',	3,	'2018-02-28 08:11:49',	'2017-12-26 10:52:39',	'2018-02-28 08:11:49'),
(13,	8,	22,	'23123',	'啊实打实的',	2,	'2018-02-05 07:19:18',	'2017-12-26 10:52:48',	NULL),
(14,	8,	22,	'32444',	'vs的方式',	1,	'2018-02-05 07:26:04',	'2017-12-26 10:52:55',	'2018-02-05 07:26:04'),
(15,	8,	22,	'45546',	'方法士大夫',	1,	'2018-02-05 07:27:06',	'2017-12-26 10:53:05',	'2018-02-05 07:27:06'),
(16,	8,	22,	'565656',	'哈哈哈哈哈',	2,	'2018-02-05 07:28:44',	'2018-01-15 03:49:28',	NULL),
(17,	8,	22,	'232323',	'客家话2',	0,	'2018-02-01 07:24:52',	'2018-02-01 07:21:25',	'2018-02-01 07:24:52'),
(18,	8,	22,	'565665',	'ppopopp',	0,	'2018-02-05 01:13:39',	'2018-02-01 08:19:12',	'2018-02-05 01:13:39'),
(19,	8,	22,	'323232',	'啊啊啊啊',	2,	'2018-02-05 07:18:56',	'2018-02-01 08:25:13',	NULL),
(20,	8,	22,	'233123',	'悲悲悲33',	0,	'2018-02-05 06:39:34',	'2018-02-05 02:43:33',	'2018-02-05 06:39:34'),
(21,	8,	22,	'258789',	'哈哈哈',	0,	'2018-02-05 06:46:21',	'2018-02-05 02:44:25',	'2018-02-05 06:46:21'),
(22,	8,	22,	'987654',	'是撒啊',	0,	'2018-02-05 06:45:56',	'2018-02-05 02:46:24',	'2018-02-05 06:45:56'),
(23,	8,	22,	'5654',	'客户刚刚',	0,	'2018-02-05 06:43:05',	'2018-02-05 03:18:15',	'2018-02-05 06:43:05'),
(24,	8,	22,	'8888',	'了啪啪啪',	0,	'2018-02-05 06:42:29',	'2018-02-05 03:19:07',	'2018-02-05 06:42:29'),
(25,	8,	22,	'963258',	'湖广会馆',	0,	'2018-02-05 06:41:16',	'2018-02-05 03:30:08',	'2018-02-05 06:41:16'),
(26,	8,	22,	'55566',	'村上春树',	0,	'2018-02-05 06:40:15',	'2018-02-05 06:16:12',	'2018-02-05 06:40:15'),
(27,	8,	22,	'9883',	'哈hass',	2,	'2018-02-28 02:43:06',	'2018-02-05 07:29:00',	NULL),
(28,	8,	22,	'899996',	'哈哈哈哈',	0,	'2018-02-07 06:10:37',	'2018-02-07 05:48:27',	'2018-02-07 06:10:37');

DROP TABLE IF EXISTS `albert_config`;
CREATE TABLE `albert_config` (
  `config_Id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `config_Name` varchar(30) NOT NULL DEFAULT '' COMMENT '变量名',
  `config_Title` varchar(100) NOT NULL DEFAULT '' COMMENT '变量标题',
  `config_Group` varchar(30) NOT NULL DEFAULT '' COMMENT '分组',
  `config_Tip` varchar(100) NOT NULL DEFAULT '' COMMENT '变量描述',
  `config_Type` varchar(30) NOT NULL DEFAULT '' COMMENT '类型:string,text,int,bool,array,datetime,date,file',
  `config_Value` text NOT NULL COMMENT '变量值',
  `config_Content` text NOT NULL COMMENT '变量字典数据',
  `config_Rule` varchar(100) NOT NULL DEFAULT '' COMMENT '验证规则',
  `config_Extend` varchar(255) NOT NULL DEFAULT '' COMMENT '扩展属性',
  `update_time` timestamp NULL DEFAULT NULL,
  `create_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`config_Id`),
  UNIQUE KEY `name` (`config_Name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='系统配置';

INSERT INTO `albert_config` (`config_Id`, `config_Name`, `config_Title`, `config_Group`, `config_Tip`, `config_Type`, `config_Value`, `config_Content`, `config_Rule`, `config_Extend`, `update_time`, `create_time`) VALUES
(1,	'name',	'Site name',	'',	'请填写站点名称',	'string',	'FastAdmin',	'',	'required',	'',	NULL,	NULL),
(2,	'beian',	'Beian',	'',	'粤ICP备15054802号-4',	'string',	'',	'',	'',	'',	NULL,	NULL),
(3,	'cdnurl',	'Cdn url',	'',	'如果使用CDN云储存请配置该值',	'string',	'',	'',	'',	'',	NULL,	NULL),
(4,	'version',	'Version',	'',	'如果静态资源有变动请重新配置该值',	'string',	'1.0.1',	'',	'required',	'',	NULL,	NULL),
(5,	'timezone',	'Timezone',	'',	'',	'string',	'Asia/Shanghai',	'',	'required',	'',	NULL,	NULL),
(6,	'forbiddenip',	'Forbidden ip',	'',	'一行一条记录',	'text',	'',	'',	'',	'',	NULL,	NULL),
(7,	'languages',	'Languages',	'',	'',	'array',	'{\"backend\":\"zh-cn\",\"frontend\":\"zh-cn\"}',	'',	'required',	'',	NULL,	NULL),
(8,	'fixedpage',	'Fixed page',	'',	'请尽量输入左侧菜单栏存在的链接',	'string',	'dashboard',	'',	'required',	'',	NULL,	NULL),
(9,	'categorytype',	'Cateogry type',	'',	'',	'array',	'{\"default\":\"Default\",\"page\":\"Page\",\"article\":\"Article\",\"test\":\"Test\"}',	'',	'',	'',	NULL,	NULL),
(10,	'configgroup',	'Config group',	'',	'',	'array',	'{\"basic\":\"Basic\",\"email\":\"Email\",\"dictionary\":\"Dictionary\",\"user\":\"User\",\"example\":\"Example\"}',	'',	'',	'',	NULL,	NULL),
(11,	'mail_type',	'Mail type',	'',	'选择邮件发送方式',	'select',	'1',	'[\"Please select\",\"SMTP\",\"Mail\"]',	'',	'',	NULL,	NULL),
(12,	'mail_smtp_host',	'Mail smtp host',	'',	'错误的配置发送邮件会导致服务器超时',	'string',	'smtp.qq.com',	'',	'',	'',	NULL,	NULL),
(13,	'mail_smtp_port',	'Mail smtp port',	'',	'(不加密默认25,SSL默认465,TLS默认587)',	'string',	'465',	'',	'',	'',	NULL,	NULL),
(14,	'mail_smtp_user',	'Mail smtp user',	'',	'（填写完整用户名）',	'string',	'10000',	'',	'',	'',	NULL,	NULL),
(15,	'mail_smtp_pass',	'Mail smtp password',	'',	'（填写您的密码）',	'string',	'password',	'',	'',	'',	NULL,	NULL),
(16,	'mail_verify_type',	'Mail vertify type',	'',	'（SMTP验证方式[推荐SSL]）',	'select',	'2',	'[\"None\",\"TLS\",\"SSL\"]',	'',	'',	NULL,	NULL),
(17,	'font_wesome',	'Font Awesome',	'basic',	'请选择图标',	'string',	'{\"new\":[\"address-book\",\"address-book-o\",\"address-card\",\"address-card-o\",\"bandcamp\",\"bath\",\"bathtub\",\"drivers-license\",\"drivers-license-o\",\"eercast\",\"envelope-open\",\"envelope-open-o\",\"etsy\",\"free-code-camp\",\"grav\",\"handshake-o\",\"id-badge\",\"id-card\",\"id-card-o\",\"imdb\",\"linode\",\"meetup\",\"microchip\",\"podcast\",\"quora\",\"ravelry\",\"s15\",\"shower\",\"snowflake-o\",\"superpowers\",\"telegram\",\"thermometer\",\"thermometer-0\",\"thermometer-1\",\"thermometer-2\",\"thermometer-3\",\"thermometer-4\",\"thermometer-empty\",\"thermometer-full\",\"thermometer-half\",\"thermometer-quarter\",\"thermometer-three-quarters\",\"times-rectangle\",\"times-rectangle-o\",\"user-circle\",\"user-circle-o\",\"user-o\",\"vcard\",\"vcard-o\",\"window-close\",\"window-close-o\",\"window-maximize\",\"window-minimize\",\"window-restore\",\"wpexplorer\"],\"webApplication\":[\"address-book\",\"address-book-o\",\"address-card\",\"address-card-o\",\"adjust\",\"american-sign-language-interpreting\",\"anchor\",\"archive\",\"area-chart\",\"arrows\",\"arrows-h\",\"arrows-v\",\"asl-interpreting\",\"assistive-listening-systems\",\"asterisk\",\"at\",\"audio-description\",\"automobile\",\"balance-scale\",\"ban\",\"bank\",\"bar-chart\",\"bar-chart-o\",\"barcode\",\"bars\",\"bath\",\"bathtub\",\"battery\",\"battery-0\",\"battery-1\",\"battery-2\",\"battery-3\",\"battery-4\",\"battery-empty\",\"battery-full\",\"battery-half\",\"battery-quarter\",\"battery-three-quarters\",\"bed\",\"beer\",\"bell\",\"bell-o\",\"bell-slash\",\"bell-slash-o\",\"bicycle\",\"binoculars\",\"birthday-cake\",\"blind\",\"bluetooth\",\"bluetooth-b\",\"bolt\",\"bomb\",\"book\",\"bookmark\",\"bookmark-o\",\"braille\",\"briefcase\",\"bug\",\"building\",\"building-o\",\"bullhorn\",\"bullseye\",\"bus\",\"cab\",\"calculator\",\"calendar\",\"calendar-check-o\",\"calendar-minus-o\",\"calendar-o\",\"calendar-plus-o\",\"calendar-times-o\",\"camera\",\"camera-retro\",\"car\",\"caret-square-o-down\",\"caret-square-o-left\",\"caret-square-o-right\",\"caret-square-o-up\",\"cart-arrow-down\",\"cart-plus\",\"cc\",\"certificate\",\"check\",\"check-circle\",\"check-circle-o\",\"check-square\",\"check-square-o\",\"child\",\"circle\",\"circle-o\",\"circle-o-notch\",\"circle-thin\",\"clock-o\",\"clone\",\"close\",\"cloud\",\"cloud-download\",\"cloud-upload\",\"code\",\"code-fork\",\"coffee\",\"cog\",\"cogs\",\"comment\",\"comment-o\",\"commenting\",\"commenting-o\",\"comments\",\"comments-o\",\"compass\",\"copyright\",\"creative-commons\",\"credit-card\",\"credit-card-alt\",\"crop\",\"crosshairs\",\"cube\",\"cubes\",\"cutlery\",\"dashboard\",\"database\",\"deaf\",\"deafness\",\"desktop\",\"diamond\",\"dot-circle-o\",\"download\",\"drivers-license\",\"drivers-license-o\",\"edit\",\"ellipsis-h\",\"ellipsis-v\",\"envelope\",\"envelope-o\",\"envelope-open\",\"envelope-open-o\",\"envelope-square\",\"eraser\",\"exchange\",\"exclamation\",\"exclamation-circle\",\"exclamation-triangle\",\"external-link\",\"external-link-square\",\"eye\",\"eye-slash\",\"eyedropper\",\"fax\",\"feed\",\"female\",\"fighter-jet\",\"file-archive-o\",\"file-audio-o\",\"file-code-o\",\"file-excel-o\",\"file-image-o\",\"file-movie-o\",\"file-pdf-o\",\"file-photo-o\",\"file-picture-o\",\"file-powerpoint-o\",\"file-sound-o\",\"file-video-o\",\"file-word-o\",\"file-zip-o\",\"film\",\"filter\",\"fire\",\"fire-extinguisher\",\"flag\",\"flag-checkered\",\"flag-o\",\"flash\",\"flask\",\"folder\",\"folder-o\",\"folder-open\",\"folder-open-o\",\"frown-o\",\"futbol-o\",\"gamepad\",\"gavel\",\"gear\",\"gears\",\"gift\",\"glass\",\"globe\",\"graduation-cap\",\"group\",\"hand-grab-o\",\"hand-lizard-o\",\"hand-paper-o\",\"hand-peace-o\",\"hand-pointer-o\",\"hand-rock-o\",\"hand-scissors-o\",\"hand-spock-o\",\"hand-stop-o\",\"handshake-o\",\"hard-of-hearing\",\"hashtag\",\"hdd-o\",\"headphones\",\"heart\",\"heart-o\",\"heartbeat\",\"history\",\"home\",\"hotel\",\"hourglass\",\"hourglass-1\",\"hourglass-2\",\"hourglass-3\",\"hourglass-end\",\"hourglass-half\",\"hourglass-o\",\"hourglass-start\",\"i-cursor\",\"id-badge\",\"id-card\",\"id-card-o\",\"image\",\"inbox\",\"industry\",\"info\",\"info-circle\",\"institution\",\"key\",\"keyboard-o\",\"language\",\"laptop\",\"leaf\",\"legal\",\"lemon-o\",\"level-down\",\"level-up\",\"life-bouy\",\"life-buoy\",\"life-ring\",\"life-saver\",\"lightbulb-o\",\"line-chart\",\"location-arrow\",\"lock\",\"low-vision\",\"magic\",\"magnet\",\"mail-forward\",\"mail-reply\",\"mail-reply-all\",\"male\",\"map\",\"map-marker\",\"map-o\",\"map-pin\",\"map-signs\",\"meh-o\",\"microchip\",\"microphone\",\"microphone-slash\",\"minus\",\"minus-circle\",\"minus-square\",\"minus-square-o\",\"mobile\",\"mobile-phone\",\"money\",\"moon-o\",\"mortar-board\",\"motorcycle\",\"mouse-pointer\",\"music\",\"navicon\",\"newspaper-o\",\"object-group\",\"object-ungroup\",\"paint-brush\",\"paper-plane\",\"paper-plane-o\",\"paw\",\"pencil\",\"pencil-square\",\"pencil-square-o\",\"percent\",\"phone\",\"phone-square\",\"photo\",\"picture-o\",\"pie-chart\",\"plane\",\"plug\",\"plus\",\"plus-circle\",\"plus-square\",\"plus-square-o\",\"podcast\",\"power-off\",\"print\",\"puzzle-piece\",\"qrcode\",\"question\",\"question-circle\",\"question-circle-o\",\"quote-left\",\"quote-right\",\"random\",\"recycle\",\"refresh\",\"registered\",\"remove\",\"reorder\",\"reply\",\"reply-all\",\"retweet\",\"road\",\"rocket\",\"rss\",\"rss-square\",\"s15\",\"search\",\"search-minus\",\"search-plus\",\"send\",\"send-o\",\"server\",\"share\",\"share-alt\",\"share-alt-square\",\"share-square\",\"share-square-o\",\"shield\",\"ship\",\"shopping-bag\",\"shopping-basket\",\"shopping-cart\",\"shower\",\"sign-in\",\"sign-language\",\"sign-out\",\"signal\",\"signing\",\"sitemap\",\"sliders\",\"smile-o\",\"snowflake-o\",\"soccer-ball-o\",\"sort\",\"sort-alpha-asc\",\"sort-alpha-desc\",\"sort-amount-asc\",\"sort-amount-desc\",\"sort-asc\",\"sort-desc\",\"sort-down\",\"sort-numeric-asc\",\"sort-numeric-desc\",\"sort-up\",\"space-shuttle\",\"spinner\",\"spoon\",\"square\",\"square-o\",\"star\",\"star-half\",\"star-half-empty\",\"star-half-full\",\"star-half-o\",\"star-o\",\"sticky-note\",\"sticky-note-o\",\"street-view\",\"suitcase\",\"sun-o\",\"support\",\"tablet\",\"tachometer\",\"tag\",\"tags\",\"tasks\",\"taxi\",\"television\",\"terminal\",\"thermometer\",\"thermometer-0\",\"thermometer-1\",\"thermometer-2\",\"thermometer-3\",\"thermometer-4\",\"thermometer-empty\",\"thermometer-full\",\"thermometer-half\",\"thermometer-quarter\",\"thermometer-three-quarters\",\"thumb-tack\",\"thumbs-down\",\"thumbs-o-down\",\"thumbs-o-up\",\"thumbs-up\",\"ticket\",\"times\",\"times-circle\",\"times-circle-o\",\"times-rectangle\",\"times-rectangle-o\",\"tint\",\"toggle-down\",\"toggle-left\",\"toggle-off\",\"toggle-on\",\"toggle-right\",\"toggle-up\",\"trademark\",\"trash\",\"trash-o\",\"tree\",\"trophy\",\"truck\",\"tty\",\"tv\",\"umbrella\",\"universal-access\",\"university\",\"unlock\",\"unlock-alt\",\"unsorted\",\"upload\",\"user\",\"user-circle\",\"user-circle-o\",\"user-o\",\"user-plus\",\"user-secret\",\"user-times\",\"users\",\"vcard\",\"vcard-o\",\"video-camera\",\"volume-control-phone\",\"volume-down\",\"volume-off\",\"volume-up\",\"warning\",\"wheelchair\",\"wheelchair-alt\",\"wifi\",\"window-close\",\"window-close-o\",\"window-maximize\",\"window-minimize\",\"window-restore\",\"wrench\"],\"accessibility\":[\"american-sign-language-interpreting\",\"asl-interpreting\",\"assistive-listening-systems\",\"audio-description\",\"blind\",\"braille\",\"cc\",\"deaf\",\"deafness\",\"hard-of-hearing\",\"low-vision\",\"question-circle-o\",\"sign-language\",\"signing\",\"tty\",\"universal-access\",\"volume-control-phone\",\"wheelchair\",\"wheelchair-alt\"],\"hand\":[\"hand-grab-o\",\"hand-lizard-o\",\"hand-o-down\",\"hand-o-left\",\"hand-o-right\",\"hand-o-up\",\"hand-paper-o\",\"hand-peace-o\",\"hand-pointer-o\",\"hand-rock-o\",\"hand-scissors-o\",\"hand-spock-o\",\"hand-stop-o\",\"thumbs-down\",\"thumbs-o-down\",\"thumbs-o-up\",\"thumbs-up\"],\"transportation\":[\"ambulance\",\"automobile\",\"bicycle\",\"bus\",\"cab\",\"car\",\"fighter-jet\",\"motorcycle\",\"plane\",\"rocket\",\"ship\",\"space-shuttle\",\"subway\",\"taxi\",\"train\",\"truck\",\"wheelchair\",\"wheelchair-alt\"],\"gender\":[\"genderless\",\"intersex\",\"mars\",\"mars-double\",\"mars-stroke\",\"mars-stroke-h\",\"mars-stroke-v\",\"mercury\",\"neuter\",\"transgender\",\"transgender-alt\",\"venus\",\"venus-double\",\"venus-mars\"],\"fileType\":[\"file\",\"file-archive-o\",\"file-audio-o\",\"file-code-o\",\"file-excel-o\",\"file-image-o\",\"file-movie-o\",\"file-o\",\"file-pdf-o\",\"file-photo-o\",\"file-picture-o\",\"file-powerpoint-o\",\"file-sound-o\",\"file-text\",\"file-text-o\",\"file-video-o\",\"file-word-o\",\"file-zip-o\"],\"spinner\":[\"circle-o-notch\",\"cog\",\"gear\",\"refresh\",\"spinner\"],\"formControl\":[\"check-square\",\"check-square-o\",\"circle\",\"circle-o\",\"dot-circle-o\",\"minus-square\",\"minus-square-o\",\"plus-square\",\"plus-square-o\",\"square\",\"square-o\"],\"payment\":[\"cc-amex\",\"cc-diners-club\",\"cc-discover\",\"cc-jcb\",\"cc-mastercard\",\"cc-paypal\",\"cc-stripe\",\"cc-visa\",\"credit-card\",\"credit-card-alt\",\"google-wallet\",\"paypal\"],\"chart\":[\"area-chart\",\"bar-chart\",\"bar-chart-o\",\"line-chart\",\"pie-chart\"],\"currency\":[\"bitcoin\",\"btc\",\"cny\",\"dollar\",\"eur\",\"euro\",\"gbp\",\"gg\",\"gg-circle\",\"ils\",\"inr\",\"jpy\",\"krw\",\"money\",\"rmb\",\"rouble\",\"rub\",\"ruble\",\"rupee\",\"shekel\",\"sheqel\",\"try\",\"turkish-lira\",\"usd\",\"won\",\"yen\"],\"textEditor\":[\"align-center\",\"align-justify\",\"align-left\",\"align-right\",\"bold\",\"chain\",\"chain-broken\",\"clipboard\",\"columns\",\"copy\",\"cut\",\"dedent\",\"eraser\",\"file\",\"file-o\",\"file-text\",\"file-text-o\",\"files-o\",\"floppy-o\",\"font\",\"header\",\"indent\",\"italic\",\"link\",\"list\",\"list-alt\",\"list-ol\",\"list-ul\",\"outdent\",\"paperclip\",\"paragraph\",\"paste\",\"repeat\",\"rotate-left\",\"rotate-right\",\"save\",\"scissors\",\"strikethrough\",\"subscript\",\"superscript\",\"table\",\"text-height\",\"text-width\",\"th\",\"th-large\",\"th-list\",\"underline\",\"undo\",\"unlink\"],\"directional\":[\"angle-double-down\",\"angle-double-left\",\"angle-double-right\",\"angle-double-up\",\"angle-down\",\"angle-left\",\"angle-right\",\"angle-up\",\"arrow-circle-down\",\"arrow-circle-left\",\"arrow-circle-o-down\",\"arrow-circle-o-left\",\"arrow-circle-o-right\",\"arrow-circle-o-up\",\"arrow-circle-right\",\"arrow-circle-up\",\"arrow-down\",\"arrow-left\",\"arrow-right\",\"arrow-up\",\"arrows\",\"arrows-alt\",\"arrows-h\",\"arrows-v\",\"caret-down\",\"caret-left\",\"caret-right\",\"caret-square-o-down\",\"caret-square-o-left\",\"caret-square-o-right\",\"caret-square-o-up\",\"caret-up\",\"chevron-circle-down\",\"chevron-circle-left\",\"chevron-circle-right\",\"chevron-circle-up\",\"chevron-down\",\"chevron-left\",\"chevron-right\",\"chevron-up\",\"exchange\",\"hand-o-down\",\"hand-o-left\",\"hand-o-right\",\"hand-o-up\",\"long-arrow-down\",\"long-arrow-left\",\"long-arrow-right\",\"long-arrow-up\",\"toggle-down\",\"toggle-left\",\"toggle-right\",\"toggle-up\"],\"videoPlayer\":[\"arrows-alt\",\"backward\",\"compress\",\"eject\",\"expand\",\"fast-backward\",\"fast-forward\",\"forward\",\"pause\",\"pause-circle\",\"pause-circle-o\",\"play\",\"play-circle\",\"play-circle-o\",\"random\",\"step-backward\",\"step-forward\",\"stop\",\"stop-circle\",\"stop-circle-o\",\"youtube-play\"],\"brand\":[\"500px\",\"adn\",\"amazon\",\"android\",\"angellist\",\"apple\",\"bandcamp\",\"behance\",\"behance-square\",\"bitbucket\",\"bitbucket-square\",\"bitcoin\",\"black-tie\",\"bluetooth\",\"bluetooth-b\",\"btc\",\"buysellads\",\"cc-amex\",\"cc-diners-club\",\"cc-discover\",\"cc-jcb\",\"cc-mastercard\",\"cc-paypal\",\"cc-stripe\",\"cc-visa\",\"chrome\",\"codepen\",\"codiepie\",\"connectdevelop\",\"contao\",\"css3\",\"dashcube\",\"delicious\",\"deviantart\",\"digg\",\"dribbble\",\"dropbox\",\"drupal\",\"edge\",\"eercast\",\"empire\",\"envira\",\"etsy\",\"expeditedssl\",\"fa\",\"facebook\",\"facebook-f\",\"facebook-official\",\"facebook-square\",\"firefox\",\"first-order\",\"flickr\",\"font-awesome\",\"fonticons\",\"fort-awesome\",\"forumbee\",\"foursquare\",\"free-code-camp\",\"ge\",\"get-pocket\",\"gg\",\"gg-circle\",\"git\",\"git-square\",\"github\",\"github-alt\",\"github-square\",\"gitlab\",\"gittip\",\"glide\",\"glide-g\",\"google\",\"google-plus\",\"google-plus-circle\",\"google-plus-official\",\"google-plus-square\",\"google-wallet\",\"gratipay\",\"grav\",\"hacker-news\",\"houzz\",\"html5\",\"imdb\",\"instagram\",\"internet-explorer\",\"ioxhost\",\"joomla\",\"jsfiddle\",\"lastfm\",\"lastfm-square\",\"leanpub\",\"linkedin\",\"linkedin-square\",\"linode\",\"linux\",\"maxcdn\",\"meanpath\",\"medium\",\"meetup\",\"mixcloud\",\"modx\",\"odnoklassniki\",\"odnoklassniki-square\",\"opencart\",\"openid\",\"opera\",\"optin-monster\",\"pagelines\",\"paypal\",\"pied-piper\",\"pied-piper-alt\",\"pied-piper-pp\",\"pinterest\",\"pinterest-p\",\"pinterest-square\",\"product-hunt\",\"qq\",\"quora\",\"ra\",\"ravelry\",\"rebel\",\"reddit\",\"reddit-alien\",\"reddit-square\",\"renren\",\"resistance\",\"safari\",\"scribd\",\"sellsy\",\"share-alt\",\"share-alt-square\",\"shirtsinbulk\",\"simplybuilt\",\"skyatlas\",\"skype\",\"slack\",\"slideshare\",\"snapchat\",\"snapchat-ghost\",\"snapchat-square\",\"soundcloud\",\"spotify\",\"stack-exchange\",\"stack-overflow\",\"steam\",\"steam-square\",\"stumbleupon\",\"stumbleupon-circle\",\"superpowers\",\"telegram\",\"tencent-weibo\",\"themeisle\",\"trello\",\"tripadvisor\",\"tumblr\",\"tumblr-square\",\"twitch\",\"twitter\",\"twitter-square\",\"usb\",\"viacoin\",\"viadeo\",\"viadeo-square\",\"vimeo\",\"vimeo-square\",\"vine\",\"vk\",\"wechat\",\"weibo\",\"weixin\",\"whatsapp\",\"wikipedia-w\",\"windows\",\"wordpress\",\"wpbeginner\",\"wpexplorer\",\"wpforms\",\"xing\",\"xing-square\",\"y-combinator\",\"y-combinator-square\",\"yahoo\",\"yc\",\"yc-square\",\"yelp\",\"yoast\",\"youtube\",\"youtube-play\",\"youtube-square\"],\"medical\":[\"ambulance\",\"h-square\",\"heart\",\"heart-o\",\"heartbeat\",\"hospital-o\",\"medkit\",\"plus-square\",\"stethoscope\",\"user-md\",\"wheelchair\",\"wheelchair-alt\"]}',	'',	'',	'',	NULL,	NULL),
(18,	'interface_method',	'提交的方式',	'basic',	'选择请求类型',	'string',	'{\"post\":\"POST\",\"get\":\"GET\",\"put\":\"PUT\",\"delete\":\"DELETE\",\"head\":\"HEAD\"}',	'',	'',	'',	NULL,	NULL),
(19,	'field_type',	'参数的类型',	'basic',	'选择类型',	'string',	'{\"string\":\"String\",\"file\":\"File\",\"json\":\"Json\",\"int\":\"Int\",\"float\":\"Float\",\"double\":\"Double\",\"date\":\"DateTime\",\"boolean\":\"Boolean\",\"long\":\"Long\",\"byte\":\"Byte\"}',	'',	'',	'',	NULL,	NULL),
(20,	'header_type',	'请求头部的类型',	'basic',	'选择头部类型',	'string',	'{\"User-Agent\":\"User-Agent\",\"Proxy-Authorization\":\"Proxy-Authorization\",\"Accept\":\"Accept\",\"Accept-Charset\":\"Accept-Charset\",\"Accept-Encoding\":\"Accept-Encoding\",\"Accept-Language\":\"Accept-Language\",\"Accept-Ranges\":\"Accept-Ranges\",\"Authorization\":\"Authorization\",\"Content-Length\":\"Content-Length\",\"Content-Type\":\"Content-Type\"}',	'',	'',	'',	NULL,	NULL);

DROP TABLE IF EXISTS `albert_doc`;
CREATE TABLE `albert_doc` (
  `doc_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` int(11) unsigned NOT NULL,
  `group_id` int(11) unsigned NOT NULL,
  `doc_name` varchar(64) NOT NULL,
  `doc_type` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '内容类型1-富文本，2-Markdown',
  `doc_order` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `doc_content` text NOT NULL,
  `update_time` timestamp NULL DEFAULT NULL,
  `create_time` timestamp NULL DEFAULT NULL,
  `delete_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`doc_id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `albert_doc` (`doc_id`, `project_id`, `group_id`, `doc_name`, `doc_type`, `doc_order`, `doc_content`, `update_time`, `create_time`, `delete_time`) VALUES
(1,	8,	34,	'设置内容',	2,	2,	'[TOC]\n\n#### Disabled options\n\n- TeX (Based on KaTeX);\n- Emoji;\n- Task lists;\n- HTML tags decode;\n- Flowchart and Sequence Diagram;\n\n#### Editor.md directory\n\n    editor.md/\n            lib/\n            css/\n            scss/\n            tests/\n            fonts/\n            images/\n            plugins/\n            examples/\n            languages/     \n            editormd.js\n            ...\n\n```html\n<!-- English -->\n<script src=\"../dist/js/languages/en.js\"></script>\n\n<!-- 繁體中文 -->\n<script src=\"../dist/js/languages/zh-tw.js\"></script>\n```\n',	'2018-02-28 02:46:14',	'2017-12-26 10:06:32',	NULL),
(2,	8,	36,	'完整示例',	1,	3,	'<h1 data-line=\"0\">设置内容2</h1><p>以下方式中，如果条件允许，尽量使用第一种方式，效率最高。</p><h2 data-line=\"4\"><a id=\"html__4\"></a>html 初始化内容</h2><p>直接将内容写到要创建编辑器的<code>&lt;div&gt;</code>标签中</p><pre><code>&lt;div id=\"div1\"&gt;\n    &lt;p&gt;初始化的内容&lt;/p&gt;\n    &lt;p&gt;初始化的内容&lt;/p&gt;\n&lt;/div&gt;\n\n&lt;script type=\"text/javascript\" src=\"/wangEditor.min.js\"&gt;&lt;/script&gt;\n&lt;script type=\"text/javascript\"&gt;\n    var E = window.wangEditor\n    var editor = new E(\'#div1\')\n    editor.create()\n&lt;/script&gt;</code></pre><p><br></p>',	'2018-02-28 07:52:28',	'2017-12-26 10:07:24',	NULL),
(3,	8,	36,	'大大大大大2',	1,	1,	'<p>哈啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊2333</p><blockquote>水水水水水</blockquote><p><br></p>',	'2018-02-28 08:59:22',	'2018-02-07 06:13:14',	NULL);

DROP TABLE IF EXISTS `albert_interface`;
CREATE TABLE `albert_interface` (
  `interface_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` int(11) unsigned NOT NULL,
  `project_id` int(11) unsigned NOT NULL,
  `interface_url` varchar(160) NOT NULL,
  `interface_method` varchar(50) NOT NULL,
  `interface_name` varchar(192) NOT NULL,
  `interface_header` text,
  `interface_body` text,
  `interface_response` text,
  `interface_sucess_consult` text,
  `interface_error_consult` text,
  `interface_body_model` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `interface_status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `interface_remark` text,
  `interface_order` int(11) unsigned NOT NULL DEFAULT '0',
  `update_time` timestamp NULL DEFAULT NULL,
  `create_time` timestamp NULL DEFAULT NULL,
  `delete_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`interface_id`),
  KEY `group_Id` (`group_id`),
  KEY `project_Id` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `albert_interface` (`interface_id`, `group_id`, `project_id`, `interface_url`, `interface_method`, `interface_name`, `interface_header`, `interface_body`, `interface_response`, `interface_sucess_consult`, `interface_error_consult`, `interface_body_model`, `interface_status`, `interface_remark`, `interface_order`, `update_time`, `create_time`, `delete_time`) VALUES
(1,	0,	8,	'http://dongguan.huifang.cn/api/Dealer_userFenrunList',	'POST',	'我的-收入记录',	'[]',	'\" \\\"page\\\": 1, \\\"login_status\\\": 1, \\\"count\\\": 0, \\\"page_count\\\": 1\"',	'[{\"response_name\":\"status\",\"response_check\":\"on\",\"response_remark\":\"\",\"response_value\":\"1\",\"response_type\":\"string\"},{\"response_name\":\"data>uft_id\",\"response_check\":\"on\",\"response_remark\":\"\",\"response_value\":\"13\",\"response_type\":\"string\"},{\"response_name\":\"data>uft_key\",\"response_check\":\"on\",\"response_remark\":\"\",\"response_value\":\"13!!y4efsiYEJD\",\"response_type\":\"string\"},{\"response_name\":\"data>user_id\",\"response_check\":\"on\",\"response_remark\":\"\",\"response_value\":\"0\",\"response_type\":\"string\"},{\"response_name\":\"data>company_id_zj\",\"response_check\":\"on\",\"response_remark\":\"\",\"response_value\":\"10013\",\"response_type\":\"string\"},{\"response_name\":\"data>company_id\",\"response_check\":\"on\",\"response_remark\":\"\",\"response_value\":\"0\",\"response_type\":\"string\"},{\"response_name\":\"data>finance_type\",\"response_check\":\"on\",\"response_remark\":\"\",\"response_value\":\"130\",\"response_type\":\"string\"},{\"response_name\":\"data>uft_data\",\"response_check\":\"on\",\"response_remark\":\"\",\"response_value\":\"M\",\"response_type\":\"string\"},{\"response_name\":\"data>uft_type\",\"response_check\":\"on\",\"response_remark\":\"\",\"response_value\":\"1\",\"response_type\":\"string\"},{\"response_name\":\"data>uft_label\",\"response_check\":\"on\",\"response_remark\":\"\",\"response_value\":\"80\",\"response_type\":\"string\"},{\"response_name\":\"data>cdr_id\",\"response_check\":\"on\",\"response_remark\":\"\",\"response_value\":\"300\",\"response_type\":\"string\"},{\"response_name\":\"data>uft_number\",\"response_check\":\"on\",\"response_remark\":\"\",\"response_value\":\"201712121726350203191426\",\"response_type\":\"string\"},{\"response_name\":\"data>uft_balance\",\"response_check\":\"on\",\"response_remark\":\"\",\"response_value\":\"750.00\",\"response_type\":\"string\"},{\"response_name\":\"data>uft_time\",\"response_check\":\"on\",\"response_remark\":\"\",\"response_value\":\"1512046000\",\"response_type\":\"string\"},{\"response_name\":\"data>uft_status\",\"response_check\":\"on\",\"response_remark\":\"\",\"response_value\":\"2\",\"response_type\":\"string\"},{\"response_name\":\"data>fenrun_status\",\"response_check\":\"on\",\"response_remark\":\"\",\"response_value\":\"已结算\",\"response_type\":\"string\"},{\"response_name\":\"data>fenrun_success_time\",\"response_check\":\"on\",\"response_remark\":\"\",\"response_value\":\"2017-12-12 20:04:22\",\"response_type\":\"string\"},{\"response_name\":\"data>fenrun_money_time\",\"response_check\":\"on\",\"response_remark\":\"\",\"response_value\":\"2017-12-12 14:19:23\",\"response_type\":\"string\"},{\"response_name\":\"data>fenrun_type\",\"response_check\":\"on\",\"response_remark\":\"\",\"response_value\":\"中介分润\",\"response_type\":\"string\"},{\"response_name\":\"data>fenrun_name\",\"response_check\":\"on\",\"response_remark\":\"\",\"response_value\":\"乐居地产\",\"response_type\":\"string\"},{\"response_name\":\"data>fenrun_fang_type\",\"response_check\":\"on\",\"response_remark\":\"\",\"response_value\":\"商铺\",\"response_type\":\"string\"},{\"response_name\":\"data>fenrun_total\",\"response_check\":\"on\",\"response_remark\":\"\",\"response_value\":\"1500000\",\"response_type\":\"string\"},{\"response_name\":\"data>fenrun_distribute\",\"response_check\":\"on\",\"response_remark\":\"\",\"response_value\":\"0.05%\",\"response_type\":\"string\"},{\"response_name\":\"data>fenrun_title\",\"response_check\":\"on\",\"response_remark\":\"\",\"response_value\":\"中介分润--乐居地产\",\"response_type\":\"string\"},{\"response_name\":\"msg\",\"response_check\":\"on\",\"response_remark\":\"\",\"response_value\":\"请求成功！\",\"response_type\":\"string\"},{\"response_name\":\"page\",\"response_check\":\"on\",\"response_remark\":\"\",\"response_value\":\"1\",\"response_type\":\"string\"},{\"response_name\":\"login_status\",\"response_check\":\"on\",\"response_remark\":\"\",\"response_value\":\"1\",\"response_type\":\"string\"},{\"response_name\":\"count\",\"response_check\":\"on\",\"response_remark\":\"\",\"response_value\":\"0\",\"response_type\":\"string\"},{\"response_name\":\"page_count\",\"response_check\":\"on\",\"response_remark\":\"\",\"response_value\":\"1\",\"response_type\":\"string\"}]',	'{\r\n    \"status\": 1,\r\n    \"data\": {\r\n        \"uft_id\": \"13\",\r\n        \"uft_key\": \"13!!y4efsiYEJD\",\r\n        \"user_id\": \"0\",\r\n        \"company_id_zj\": \"10013\",\r\n        \"company_id\": \"0\",\r\n        \"finance_type\": \"130\",\r\n        \"uft_data\": \"M\",\r\n        \"uft_type\": \"1\",\r\n        \"uft_label\": \"80\",\r\n        \"cdr_id\": \"300\",\r\n        \"uft_number\": \"201712121726350203191426\",\r\n        \"uft_balance\": \"750.00\",\r\n        \"uft_time\": \"1512046000\",\r\n        \"uft_status\": \"2\",\r\n        \"fenrun_status\": \"已结算\",\r\n        \"fenrun_success_time\": \"2017-12-12 20:04:22\",\r\n        \"fenrun_money_time\": \"2017-12-12 14:19:23\",\r\n        \"fenrun_type\": \"中介分润\",\r\n        \"fenrun_name\": \"乐居地产\",\r\n        \"fenrun_fang_type\": \"商铺\",\r\n        \"fenrun_total\": \"1500000\",\r\n        \"fenrun_distribute\": \"0.05%\",\r\n        \"fenrun_title\": \"中介分润--乐居地产\"\r\n    },\r\n    \"msg\": \"请求成功！\",\r\n    \"page\": 1,\r\n    \"login_status\": 1,\r\n    \"count\": 0,\r\n    \"page_count\": 1\r\n}',	'{\r\n    \"status\": 1,\r\n    \"data\": {\r\n        \"uft_id\": \"13\",\r\n        \"uft_key\": \"13!!y4efsiYEJD\",\r\n        \"user_id\": \"0\",\r\n        \"company_id_zj\": \"10013\",\r\n        \"company_id\": \"0\",\r\n        \"finance_type\": \"130\",\r\n        \"uft_data\": \"M\",\r\n        \"uft_type\": \"1\",\r\n        \"uft_label\": \"80\",\r\n        \"cdr_id\": \"300\",\r\n        \"uft_number\": \"201712121726350203191426\",\r\n        \"uft_balance\": \"750.00\",\r\n        \"uft_time\": \"1512046000\",\r\n        \"uft_status\": \"2\",\r\n        \"fenrun_status\": \"已结算\",\r\n        \"fenrun_success_time\": \"2017-12-12 20:04:22\",\r\n        \"fenrun_money_time\": \"2017-12-12 14:19:23\",\r\n        \"fenrun_type\": \"中介分润\",\r\n        \"fenrun_name\": \"乐居地产\",\r\n        \"fenrun_fang_type\": \"商铺\",\r\n        \"fenrun_total\": \"1500000\",\r\n        \"fenrun_distribute\": \"0.05%\",\r\n        \"fenrun_title\": \"中介分润--乐居地产\"\r\n    },\r\n    \"msg\": \"请求成功！\",\r\n    \"page\": 1,\r\n    \"login_status\": 1,\r\n    \"count\": 0,\r\n    \"page_count\": 1\r\n}',	3,	0,	NULL,	2,	'2017-12-20 03:35:28',	'2017-12-15 08:56:43',	'2017-12-20 03:35:28'),
(2,	16,	8,	'http://demo.huifang.cn/api/Dealer_userFenrunDetail',	'POST',	'我的-收入详情2',	'[{\"header_value\":\"我去饿\",\"header_key\":\"Accept-Ranges\",\"header_remark\":\"啊大神\"},{\"header_value\":\"ssddd\",\"header_key\":\"User-Agent\",\"header_remark\":\"啊大苏打\"},{\"header_value\":\"2333\",\"header_key\":\"Accept-Encoding\",\"header_remark\":\"妈的233\"}]',	'[{\"body_name\":\"company_type\",\"body_check\":\"on\",\"body_remark\":\"1\",\"body_type\":\"string\",\"body_value\":\"23333\"},{\"body_name\":\"status\",\"body_check\":\"on\",\"body_remark\":\"1\",\"body_type\":\"string\",\"body_value\":\"2222\"},{\"body_name\":\"page\",\"body_check\":\"on\",\"body_remark\":\"1\",\"body_type\":\"string\",\"body_value\":\"去恶趣味\"}]',	'[{\"response_name\":\"status\",\"response_check\":\"on\",\"response_remark\":\"\",\"response_value\":\"1\",\"response_type\":\"string\"},{\"response_name\":\"data>>count\",\"response_check\":\"on\",\"response_remark\":\"\",\"response_value\":\"6392.81\",\"response_type\":\"string\"},{\"response_name\":\"data>>mtime\",\"response_check\":\"on\",\"response_remark\":\"\",\"response_value\":\"2017年12月\",\"response_type\":\"string\"},{\"response_name\":\"data>>list>>fenrun_id\",\"response_check\":\"on\",\"response_remark\":\"\",\"response_value\":\"84\",\"response_type\":\"string\"},{\"response_name\":\"data>>list>>fenrun_key\",\"response_check\":\"on\",\"response_remark\":\"\",\"response_value\":\"84!!4vgT3OKvUr\",\"response_type\":\"string\"},{\"response_name\":\"data>>list>>fenrun_title\",\"response_check\":\"on\",\"response_remark\":\"\",\"response_value\":\"中介--乐居地产\",\"response_type\":\"string\"},{\"response_name\":\"data>>list>>fenrun_time\",\"response_check\":\"on\",\"response_remark\":\"\",\"response_value\":\"2017-12-14 16:22\",\"response_type\":\"string\"},{\"response_name\":\"data>>list>>fenrun_money\",\"response_check\":\"on\",\"response_remark\":\"\",\"response_value\":\"2138.40\",\"response_type\":\"string\"},{\"response_name\":\"data>>list>>fenrun_status\",\"response_check\":\"on\",\"response_remark\":\"\",\"response_value\":\"待结算\",\"response_type\":\"string\"},{\"response_name\":\"data>>list>>mtime\",\"response_check\":\"on\",\"response_remark\":\"\",\"response_value\":\"2017-12\",\"response_type\":\"string\"},{\"response_name\":\"data>>list>>count\",\"response_check\":\"on\",\"response_remark\":\"\",\"response_value\":\"6392.81\",\"response_type\":\"string\"},{\"response_name\":\"msg\",\"response_check\":\"on\",\"response_remark\":\"\",\"response_value\":\"请求成功\",\"response_type\":\"string\"},{\"response_name\":\"page\",\"response_check\":\"on\",\"response_remark\":\"\",\"response_value\":\"1\",\"response_type\":\"string\"},{\"response_name\":\"login_status\",\"response_check\":\"on\",\"response_remark\":\"\",\"response_value\":\"1\",\"response_type\":\"string\"},{\"response_name\":\"count\",\"response_check\":\"on\",\"response_remark\":\"\",\"response_value\":\"15\",\"response_type\":\"string\"}]',	'{\n    \"status\": 1,\n    \"data\": [\n        {\n            \"count\": \"750.00\",\n            \"mtime\": \"2017年11月\",\n            \"list\": [\n                {\n                    \"fenrun_id\": \"13\",\n                    \"fenrun_key\": \"13!!y4efsiYEJD\",\n                    \"fenrun_title\": \"中介--乐居地产\",\n                    \"fenrun_time\": \"2017-11-30 20:46\",\n                    \"fenrun_money\": \"750.00\",\n                    \"fenrun_status\": \"已结算\",\n                    \"mtime\": \"2017-11\",\n                    \"count\": \"750.00\"\n                }\n            ]\n        },\n        {\n            \"count\": \"6392.81\",\n            \"mtime\": \"2017年12月\",\n            \"list\": [\n                {\n                    \"fenrun_id\": \"11\",\n                    \"fenrun_key\": \"11!!p7r021uuD7\",\n                    \"fenrun_title\": \"中介--乐居地产\",\n                    \"fenrun_time\": \"2017-12-12 19:25\",\n                    \"fenrun_money\": \"3000.00\",\n                    \"fenrun_status\": \"已结算\",\n                    \"mtime\": \"2017-12\",\n                    \"count\": \"6392.81\"\n                },\n                {\n                    \"fenrun_id\": \"12\",\n                    \"fenrun_key\": \"12!!fIzbbY27ag\",\n                    \"fenrun_title\": \"中介--乐居地产\",\n                    \"fenrun_time\": \"2017-12-12 19:25\",\n                    \"fenrun_money\": \"-3000.00\",\n                    \"fenrun_status\": \"已结算\",\n                    \"mtime\": \"2017-12\",\n                    \"count\": \"6392.81\"\n                },\n                {\n                    \"fenrun_id\": \"43\",\n                    \"fenrun_key\": \"43!!kvAQ9oafsG\",\n                    \"fenrun_title\": \"中介--乐居地产\",\n                    \"fenrun_time\": \"2017-12-14 11:47\",\n                    \"fenrun_money\": \"749.99\",\n                    \"fenrun_status\": \"待结算\",\n                    \"mtime\": \"2017-12\",\n                    \"count\": \"6392.81\"\n                },\n                {\n                    \"fenrun_id\": \"65\",\n                    \"fenrun_key\": \"65!!c84e0x0mjI\",\n                    \"fenrun_title\": \"中介--乐居地产\",\n                    \"fenrun_time\": \"2017-12-14 15:09\",\n                    \"fenrun_money\": \"186.30\",\n                    \"fenrun_status\": \"待结算\",\n                    \"mtime\": \"2017-12\",\n                    \"count\": \"6392.81\"\n                },\n                {\n                    \"fenrun_id\": \"66\",\n                    \"fenrun_key\": \"66!!wSurN1Dy0D\",\n                    \"fenrun_title\": \"中介--乐居地产\",\n                    \"fenrun_time\": \"2017-12-14 15:09\",\n                    \"fenrun_money\": \"745.20\",\n                    \"fenrun_status\": \"待结算\",\n                    \"mtime\": \"2017-12\",\n                    \"count\": \"6392.81\"\n                },\n                {\n                    \"fenrun_id\": \"67\",\n                    \"fenrun_key\": \"67!!vVYqsJwzRu\",\n                    \"fenrun_title\": \"中介--乐居地产\",\n                    \"fenrun_time\": \"2017-12-14 15:09\",\n                    \"fenrun_money\": \"372.60\",\n                    \"fenrun_status\": \"待结算\",\n                    \"mtime\": \"2017-12\",\n                    \"count\": \"6392.81\"\n                },\n                {\n                    \"fenrun_id\": \"68\",\n                    \"fenrun_key\": \"68!!suuTDrb9eF\",\n                    \"fenrun_title\": \"中介--乐居地产\",\n                    \"fenrun_time\": \"2017-12-14 15:09\",\n                    \"fenrun_money\": \"558.90\",\n                    \"fenrun_status\": \"待结算\",\n                    \"mtime\": \"2017-12\",\n                    \"count\": \"6392.81\"\n                },\n                {\n                    \"fenrun_id\": \"69\",\n                    \"fenrun_key\": \"69!!oDKCoUsxZk\",\n                    \"fenrun_title\": \"中介--乐居地产\",\n                    \"fenrun_time\": \"2017-12-14 15:09\",\n                    \"fenrun_money\": \"-2070.00\",\n                    \"fenrun_status\": \"待结算\",\n                    \"mtime\": \"2017-12\",\n                    \"count\": \"6392.81\"\n                },\n                {\n                    \"fenrun_id\": \"84\",\n                    \"fenrun_key\": \"84!!4vgT3OKvUr\",\n                    \"fenrun_title\": \"中介--乐居地产\",\n                    \"fenrun_time\": \"2017-12-14 16:22\",\n                    \"fenrun_money\": \"2138.40\",\n                    \"fenrun_status\": \"待结算\",\n                    \"mtime\": \"2017-12\",\n                    \"count\": \"6392.81\"\n                }\n            ]\n        }\n    ],\n    \"msg\": \"请求成功\",\n    \"page\": 1,\n    \"login_status\": 1,\n    \"count\": \"15\",\n    \"page_count\": 2\n}',	'{\n    \"status\": 1,\n    \"data\": {\n        \"uft_id\": \"13\",\n        \"uft_key\": \"13!!y4efsiYEJD\",\n        \"user_id\": \"0\",\n        \"company_id_zj\": \"10013\",\n        \"company_id\": \"0\",\n        \"finance_type\": \"130\",\n        \"uft_data\": \"M\",\n        \"uft_type\": \"1\",\n        \"uft_label\": \"80\",\n        \"cdr_id\": \"300\",\n        \"uft_number\": \"201712121726350203191426\",\n        \"uft_balance\": \"750.00\",\n        \"uft_time\": \"1512046000\",\n        \"uft_status\": \"2\",\n        \"fenrun_status\": \"已结算222222222222\",\n        \"fenrun_success_time\": \"2017-12-12 20:04:22\",\n        \"fenrun_money_time\": \"2017-12-12 14:19:23\",\n        \"fenrun_type\": \"中介分润\",\n        \"fenrun_name\": \"乐居地产\",\n        \"fenrun_fang_type\": \"商铺\",\n        \"fenrun_total\": \"1500000\",\n        \"fenrun_distribute\": \"0.05%\",\n        \"fenrun_title\": \"中介分润--乐居地产\"\n    },\n    \"msg\": \"请求成功！\",\n    \"page\": 1,\n    \"login_status\": 1,\n    \"count\": 0,\n    \"page_count\": 1\n}',	1,	1,	NULL,	2,	'2018-02-28 09:06:30',	'2017-12-15 08:57:04',	NULL);

DROP TABLE IF EXISTS `albert_project`;
CREATE TABLE `albert_project` (
  `project_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `project_name` varchar(128) NOT NULL,
  `project_remark` varchar(255) NOT NULL DEFAULT '',
  `project_type` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `project_cover` varchar(128) NOT NULL DEFAULT '',
  `project_status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `project_version` varchar(64) NOT NULL DEFAULT '1.0',
  `project_progress` tinyint(3) unsigned NOT NULL DEFAULT '10',
  `update_time` timestamp NULL DEFAULT NULL,
  `create_time` timestamp NULL DEFAULT NULL,
  `delete_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `albert_project` (`project_id`, `project_name`, `project_remark`, `project_type`, `project_cover`, `project_status`, `project_version`, `project_progress`, `update_time`, `create_time`, `delete_time`) VALUES
(1,	'测试村上春树',	'23333',	1,	'/uploads/project/20171117\\f39e3b44a6bb1baf5437dcbeecfdcdec.jpg',	2,	'1.0',	80,	'2017-11-17 03:10:58',	'2017-11-15 09:00:56',	NULL),
(2,	'哈哈哈哈哈',	'哈哈哈哈哈哈哈',	0,	'/uploads/project/20171117\\da94106bee0007de234625135c9536ec.jpg',	1,	'2.0',	10,	'2017-12-05 10:53:14',	'2017-11-17 02:48:50',	'2017-12-05 10:53:14'),
(3,	'测试测试测试233',	'哈哈哈哈哈哈哈233',	1,	'/uploads/project/20171117\\b778292376b242389f165a1db02d5b0b.jpg',	0,	'1.8',	10,	'2017-12-05 10:54:58',	'2017-11-17 02:51:18',	NULL),
(4,	'sdfs',	'sfsdfs',	0,	'/uploads/project/20171117\\1d8adbecb6760f52e933f2550d7674c0.jpg',	1,	'1.33',	10,	'2017-11-17 03:34:21',	'2017-11-17 03:33:50',	'2017-11-17 03:34:21'),
(5,	'西出阳关无故人',	'西出阳关无故人',	1,	'/uploads/project/20171205\\6eca3271c6bfc9402533e6a6df931c02.jpg',	1,	'1.0',	10,	'2017-12-22 06:10:55',	'2017-12-05 10:53:50',	'2017-12-22 06:10:55'),
(6,	'我去妈的这种',	'我去妈的这种',	1,	'/uploads/project/20171205\\663d2d5803e972ad0c765604c60a719f.jpg',	1,	'1.0',	10,	'2017-12-05 10:55:31',	'2017-12-05 10:55:31',	NULL),
(7,	'测试测试测试',	'超市菜市场',	1,	'/uploads/project/20171205\\a9171cb2b80c672512a494e9aade8a50.jpg',	1,	'2.0',	10,	'2017-12-05 11:06:41',	'2017-12-05 11:05:53',	'2017-12-05 11:06:41'),
(8,	'解忧杂货店',	'惟沉默是最高的轻蔑。',	1,	'/uploads/project/20171205\\714cc668a16d05ddabb9e777ab898b04.jpg',	1,	'1.0',	10,	'2018-01-12 01:01:27',	'2017-12-05 11:07:17',	NULL),
(9,	'测试',	'测试',	1,	'/uploads/project/20171206\\3a5f4aa435e71b4001b423c3b39c52e3.jpg',	1,	'2.0',	10,	'2017-12-06 05:51:04',	'2017-12-06 01:17:58',	'2017-12-06 05:51:04'),
(10,	'代理商项目',	'代理商项目',	1,	'/uploads/project/20171222\\6d29518de025ac7f496d8ba070ac70bf.jpg',	1,	'1.0',	10,	'2017-12-22 06:12:06',	'2017-12-22 06:11:16',	'2017-12-22 06:12:06'),
(11,	'代理商项目',	'代理商项目',	1,	'/uploads/project/20171222\\6477d25df6a9c9ea977c09daaac87eb8.jpg',	1,	'1.0',	10,	'2017-12-22 06:12:21',	'2017-12-22 06:12:21',	NULL),
(25,	'哈哈哈233',	'额嗡嗡嗡',	1,	'/uploads/project/20180104\\25330bca23b26d1b9e4ef342b3c2cec6.PNG',	1,	'1.0',	10,	'2018-01-04 09:34:50',	'2018-01-04 08:56:44',	NULL),
(26,	'哈哈啊哈哈哈',	'微软微软',	1,	'/uploads/project/20180104\\6172e114b199ec722ddbfbdb8beb2955.PNG',	1,	'1.0',	10,	'2018-01-04 09:24:12',	'2018-01-04 09:16:13',	NULL),
(27,	'认为人为233',	'哇哇哇哇哇',	1,	'/uploads/project/20180104\\9647162de1806a550d92d084b9db0b42.PNG',	1,	'2.0',	10,	'2018-01-04 09:34:43',	'2018-01-04 09:17:23',	NULL);

DROP TABLE IF EXISTS `albert_project_group`;
CREATE TABLE `albert_project_group` (
  `group_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` int(11) unsigned NOT NULL DEFAULT '0',
  `group_parent_id` int(11) unsigned NOT NULL DEFAULT '0',
  `group_name` varchar(100) NOT NULL,
  `group_order` int(11) unsigned NOT NULL DEFAULT '0',
  `group_type` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '分组类型：1-接口，2-状态码，3-文档',
  `update_time` timestamp NULL DEFAULT NULL,
  `create_time` timestamp NULL DEFAULT NULL,
  `delete_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`group_id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `albert_project_group` (`group_id`, `project_id`, `group_parent_id`, `group_name`, `group_order`, `group_type`, `update_time`, `create_time`, `delete_time`) VALUES
(1,	8,	0,	'默认分组',	0,	1,	'2017-12-20 09:32:23',	'2017-12-05 11:07:17',	'2017-12-20 09:32:23'),
(2,	9,	0,	'默认分组',	0,	1,	'2017-12-06 01:17:58',	'2017-12-06 01:17:58',	NULL),
(3,	9,	2,	'师士传说',	0,	1,	'2017-12-06 09:06:58',	'2017-12-06 09:06:58',	NULL),
(4,	9,	0,	'测试',	0,	1,	'2017-12-06 09:07:36',	'2017-12-06 09:07:36',	NULL),
(5,	9,	0,	'哈哈哈哈',	0,	1,	'2017-12-06 09:11:20',	'2017-12-06 09:11:20',	NULL),
(6,	9,	0,	'测试下拉',	0,	1,	'2017-12-06 09:14:55',	'2017-12-06 09:14:55',	NULL),
(7,	8,	0,	'师士传说',	0,	1,	'2017-12-20 03:44:42',	'2017-12-06 09:47:04',	'2017-12-20 03:44:42'),
(8,	8,	7,	'之分组',	0,	1,	'2017-12-20 03:44:42',	'2017-12-06 09:47:18',	'2017-12-20 03:44:42'),
(9,	8,	0,	'哈哈哈233',	0,	1,	'2017-12-06 11:07:04',	'2017-12-06 09:47:27',	'2017-12-06 11:07:04'),
(10,	8,	7,	'秘密杀手',	0,	1,	'2017-12-20 03:44:42',	'2017-12-06 09:52:25',	'2017-12-20 03:44:42'),
(11,	8,	9,	'迪士尼',	0,	1,	'2017-12-06 11:07:04',	'2017-12-06 10:29:48',	'2017-12-06 11:07:04'),
(12,	8,	0,	'很郁闷',	0,	1,	'2017-12-06 11:06:31',	'2017-12-06 11:02:50',	'2017-12-06 11:06:31'),
(13,	8,	0,	'测试分组',	0,	1,	'2017-12-20 09:32:29',	'2017-12-08 11:24:05',	'2017-12-20 09:32:29'),
(14,	8,	13,	'测试子分组',	0,	1,	'2017-12-20 09:32:29',	'2017-12-08 11:24:19',	'2017-12-20 09:32:29'),
(15,	8,	0,	'默认的',	0,	1,	'2017-12-20 09:59:31',	'2017-12-20 09:59:31',	NULL),
(16,	8,	0,	'超级菜市场',	0,	1,	'2018-02-07 05:54:21',	'2017-12-21 01:29:29',	NULL),
(17,	8,	0,	'村上春树',	0,	1,	'2017-12-21 01:29:36',	'2017-12-21 01:29:36',	NULL),
(18,	8,	0,	'哈哈哈哈',	0,	1,	'2017-12-21 11:21:42',	'2017-12-21 01:29:50',	'2017-12-21 11:21:42'),
(19,	8,	17,	'之分在',	0,	1,	'2017-12-21 11:10:38',	'2017-12-21 05:44:43',	NULL),
(20,	8,	0,	'测试的',	0,	2,	'2017-12-22 08:01:26',	'2017-12-22 01:21:38',	'2017-12-22 08:01:26'),
(21,	8,	20,	'哈哈哈哈',	0,	2,	'2017-12-22 08:01:26',	'2017-12-22 01:23:53',	'2017-12-22 08:01:26'),
(22,	8,	0,	'渔歌',	0,	2,	'2017-12-22 02:01:02',	'2017-12-22 02:01:02',	NULL),
(23,	11,	0,	'默认分组',	0,	1,	'2017-12-22 06:12:21',	'2017-12-22 06:12:21',	NULL),
(24,	11,	0,	'默认分组',	0,	2,	'2017-12-22 06:12:21',	'2017-12-22 06:12:21',	NULL),
(25,	11,	0,	'默认分组',	0,	3,	'2017-12-22 06:12:21',	'2017-12-22 06:12:21',	NULL),
(26,	8,	0,	'妈的早早',	0,	2,	'2017-12-22 08:03:03',	'2017-12-22 08:03:03',	NULL),
(27,	8,	26,	'测试啊',	0,	2,	'2017-12-22 08:03:10',	'2017-12-22 08:03:10',	NULL),
(28,	8,	26,	'纳尼',	0,	2,	'2017-12-22 08:03:52',	'2017-12-22 08:03:52',	NULL),
(29,	6,	0,	'测试测试',	0,	1,	'2017-12-22 14:17:09',	'2017-12-22 14:17:09',	NULL),
(30,	6,	0,	'哈哈哈哈',	0,	2,	'2017-12-22 14:17:21',	'2017-12-22 14:17:21',	NULL),
(31,	8,	26,	'哈哈对的',	0,	2,	'2017-12-24 03:03:51',	'2017-12-24 03:03:51',	NULL),
(32,	8,	26,	'威威qq',	0,	2,	'2017-12-24 03:19:48',	'2017-12-24 03:04:33',	'2017-12-24 03:19:48'),
(33,	8,	0,	'默认分组',	0,	2,	'2017-12-24 04:33:50',	'2017-12-24 04:33:45',	'2017-12-24 04:33:50'),
(34,	8,	0,	'默认分组',	0,	3,	'2017-12-24 04:34:20',	'2017-12-24 04:34:20',	NULL),
(35,	8,	0,	'菜市场',	0,	3,	'2017-12-25 03:35:29',	'2017-12-25 03:35:29',	NULL),
(36,	8,	35,	'发发发发',	0,	3,	'2017-12-25 03:35:35',	'2017-12-25 03:35:35',	NULL),
(37,	25,	0,	'默认分组',	0,	1,	'2018-01-04 08:56:44',	'2018-01-04 08:56:44',	NULL),
(38,	25,	0,	'默认分组',	0,	2,	'2018-01-04 08:56:44',	'2018-01-04 08:56:44',	NULL),
(39,	25,	0,	'默认分组',	0,	3,	'2018-01-04 08:56:44',	'2018-01-04 08:56:44',	NULL),
(40,	26,	0,	'默认分组',	0,	1,	'2018-01-04 09:16:13',	'2018-01-04 09:16:13',	NULL),
(41,	26,	0,	'默认分组',	0,	2,	'2018-01-04 09:16:13',	'2018-01-04 09:16:13',	NULL),
(42,	26,	0,	'默认分组',	0,	3,	'2018-01-04 09:16:13',	'2018-01-04 09:16:13',	NULL),
(43,	27,	0,	'默认分组',	0,	1,	'2018-01-04 09:17:23',	'2018-01-04 09:17:23',	NULL),
(44,	27,	0,	'默认分组',	0,	2,	'2018-01-04 09:17:23',	'2018-01-04 09:17:23',	NULL),
(45,	27,	0,	'默认分组',	0,	3,	'2018-01-04 09:17:23',	'2018-01-04 09:17:23',	NULL);

DROP TABLE IF EXISTS `albert_project_log`;
CREATE TABLE `albert_project_log` (
  `log_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL DEFAULT '0',
  `project_id` int(11) unsigned NOT NULL DEFAULT '0',
  `log_type` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `log_name` varchar(32) NOT NULL DEFAULT '',
  `log_model` varchar(32) NOT NULL DEFAULT '',
  `log_title` varchar(128) NOT NULL DEFAULT '',
  `log_content` text NOT NULL,
  `update_time` timestamp NULL DEFAULT NULL,
  `create_time` timestamp NULL DEFAULT NULL,
  `delete_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`log_id`),
  KEY `user_id` (`user_id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `albert_project_log` (`log_id`, `user_id`, `project_id`, `log_type`, `log_name`, `log_model`, `log_title`, `log_content`, `update_time`, `create_time`, `delete_time`) VALUES
(1,	10,	8,	4,	'Leunico',	'状态码',	'大大苏打',	'',	'2018-02-07 05:48:13',	'2018-02-07 05:48:13',	NULL),
(2,	10,	8,	3,	'Leunico',	'状态码',	'冯绍峰',	'',	'2018-02-07 05:48:20',	'2018-02-07 05:48:20',	NULL),
(3,	10,	8,	2,	'Leunico',	'状态码',	'哈哈哈哈',	'',	'2018-02-07 05:48:28',	'2018-02-07 05:48:28',	NULL),
(4,	10,	8,	3,	'Leunico',	'接口',	'我的-收入详情2',	'',	'2018-02-07 05:54:01',	'2018-02-07 05:54:01',	NULL),
(5,	10,	8,	3,	'Leunico',	'分组',	'超级菜市场',	'',	'2018-02-07 05:54:21',	'2018-02-07 05:54:21',	NULL),
(6,	10,	8,	3,	'Leunico',	'文档',	'完整示例',	'',	'2018-02-07 05:54:32',	'2018-02-07 05:54:32',	NULL),
(7,	10,	8,	3,	'Leunico',	'文档',	'设置内容',	'',	'2018-02-07 05:54:38',	'2018-02-07 05:54:38',	NULL),
(8,	10,	8,	4,	'Leunico',	'状态码',	'哈哈哈哈',	'',	'2018-02-07 06:10:37',	'2018-02-07 06:10:37',	NULL),
(9,	10,	8,	6,	'Leunico',	'状态码',	'冯绍峰',	'',	'2018-02-07 06:10:39',	'2018-02-07 06:10:39',	NULL),
(10,	10,	8,	4,	'Leunico',	'状态码',	'冯绍峰',	'',	'2018-02-07 06:12:46',	'2018-02-07 06:12:46',	NULL),
(11,	10,	8,	2,	'Leunico',	'文档',	'大大大大大',	'',	'2018-02-07 06:13:14',	'2018-02-07 06:13:14',	NULL),
(12,	10,	8,	6,	'Leunico',	'状态码',	'啊实打实',	'',	'2018-02-07 06:34:29',	'2018-02-07 06:34:29',	NULL),
(13,	10,	8,	6,	'Leunico',	'状态码',	'哈哈啊是多少',	'',	'2018-02-28 05:47:06',	'2018-02-28 05:47:06',	NULL),
(14,	10,	8,	3,	'Leunico',	'状态码',	'哈哈啊是多少',	'',	'2018-02-28 05:47:17',	'2018-02-28 05:47:17',	NULL),
(15,	10,	8,	3,	'Leunico',	'协作成员',	'北境之地2',	'',	'2018-02-28 05:47:33',	'2018-02-28 05:47:33',	NULL),
(16,	10,	8,	3,	'Leunico',	'协作成员',	'北境之地',	'修改成员备注名称',	'2018-02-28 06:37:55',	'2018-02-28 06:37:55',	NULL),
(17,	10,	8,	3,	'Leunico',	'协作成员',	'北境之地2',	'修改成员备注名称',	'2018-02-28 06:38:40',	'2018-02-28 06:38:40',	NULL),
(18,	10,	8,	6,	'Leunico',	'协作成员',	'苹果程序员2',	'修改成员权限：苹果程序员2为只读成员',	'2018-02-28 06:46:01',	'2018-02-28 06:46:01',	NULL),
(19,	10,	8,	3,	'Leunico',	'协作成员',	'小可爱2',	'修改成员备注名称',	'2018-02-28 06:46:10',	'2018-02-28 06:46:10',	NULL),
(20,	10,	8,	6,	'Leunico',	'协作成员',	'苹果程序员2',	'修改成员权限：苹果程序员2为读写成员',	'2018-02-28 07:33:44',	'2018-02-28 07:33:44',	NULL),
(21,	10,	8,	6,	'Leunico',	'文档',	'完整示例',	'',	'2018-02-28 07:52:30',	'2018-02-28 07:52:30',	NULL),
(22,	10,	8,	3,	'Leunico',	'协作成员',	'小可爱',	'修改成员备注名称',	'2018-02-28 07:53:02',	'2018-02-28 07:53:02',	NULL),
(23,	10,	8,	7,	'Leunico',	'协作成员',	'苹果程序员2',	'修改成员权限：苹果程序员2为只读成员',	'2018-02-28 07:53:45',	'2018-02-28 07:53:45',	NULL),
(24,	10,	8,	7,	'Leunico',	'协作成员',	'苹果程序员2',	'修改苹果程序员2权限为管理成员',	'2018-02-28 07:55:52',	'2018-02-28 07:55:52',	NULL),
(25,	10,	8,	7,	'Leunico',	'协作成员',	'苹果程序员2',	'修改[苹果程序员2]权限为只读成员',	'2018-02-28 08:00:21',	'2018-02-28 08:00:21',	NULL),
(26,	10,	8,	6,	'Leunico',	'状态码',	'啊实打实',	'',	'2018-02-28 08:00:33',	'2018-02-28 08:00:33',	NULL),
(27,	10,	8,	2,	'Leunico',	'协作成员',	'yukibaba',	'',	'2018-02-28 08:14:35',	'2018-02-28 08:14:35',	NULL),
(28,	10,	8,	7,	'Leunico',	'协作成员',	'yukibaba',	'修改[yukibaba]权限为管理成员',	'2018-02-28 08:14:43',	'2018-02-28 08:14:43',	NULL),
(29,	10,	8,	3,	'Leunico',	'文档',	'大大大大大',	'33333333',	'2018-02-28 08:57:47',	'2018-02-28 08:57:47',	NULL),
(30,	10,	8,	3,	'Leunico',	'文档',	'大大大大大',	'我要修改',	'2018-02-28 08:58:58',	'2018-02-28 08:58:58',	NULL),
(31,	10,	8,	3,	'Leunico',	'文档',	'大大大大大2',	'',	'2018-02-28 08:59:22',	'2018-02-28 08:59:22',	NULL),
(32,	10,	8,	3,	'Leunico',	'接口',	'我的-收入详情2',	'',	'2018-02-28 09:02:51',	'2018-02-28 09:02:51',	NULL),
(33,	10,	8,	3,	'Leunico',	'接口',	'我的-收入详情2',	'',	'2018-02-28 09:04:03',	'2018-02-28 09:04:03',	NULL),
(34,	10,	8,	3,	'Leunico',	'接口',	'我的-收入详情2',	'我是大哥吗',	'2018-02-28 09:06:30',	'2018-02-28 09:06:30',	NULL);

DROP TABLE IF EXISTS `albert_project_user`;
CREATE TABLE `albert_project_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `project_id` int(11) unsigned NOT NULL,
  `rule_type` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `remark_name` varchar(64) NOT NULL DEFAULT '',
  `create_time` timestamp NULL DEFAULT NULL,
  `update_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `albert_project_user` (`id`, `user_id`, `project_id`, `rule_type`, `remark_name`, `create_time`, `update_time`) VALUES
(5,	10,	8,	99,	'北境之地',	'2017-12-05 11:07:17',	'2018-02-28 06:39:06'),
(6,	10,	25,	99,	'',	'2018-01-04 08:56:44',	'2018-01-04 08:56:44'),
(7,	10,	26,	99,	'',	'2018-01-04 09:16:13',	'2018-01-04 09:16:13'),
(8,	10,	27,	99,	'',	'2018-01-04 09:17:23',	'2018-01-04 09:17:23'),
(11,	14,	8,	3,	'苹果程序员2',	'2018-01-13 07:34:57',	'2018-02-28 08:00:21'),
(15,	13,	8,	3,	'安卓程序员',	'2018-02-28 08:13:28',	'2018-02-28 08:13:28'),
(16,	12,	8,	1,	'yukibaba',	'2018-02-28 08:14:35',	'2018-02-28 08:14:43');

DROP TABLE IF EXISTS `albert_user`;
CREATE TABLE `albert_user` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(64) NOT NULL,
  `user_email` varchar(64) NOT NULL,
  `user_password` varchar(64) NOT NULL,
  `password_salt` varchar(32) NOT NULL DEFAULT '',
  `user_head` varchar(96) NOT NULL DEFAULT '',
  `user_status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `user_type` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `user_token` varchar(64) NOT NULL DEFAULT '',
  `login_time` timestamp NULL DEFAULT NULL,
  `update_time` timestamp NULL DEFAULT NULL,
  `create_time` timestamp NULL DEFAULT NULL,
  `delete_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `albert_user` (`user_id`, `user_name`, `user_email`, `user_password`, `password_salt`, `user_head`, `user_status`, `user_type`, `user_token`, `login_time`, `update_time`, `create_time`, `delete_time`) VALUES
(9,	'php程序员',	'99999999@qq.com',	'9cb0cc3d6f8d3809806185b7ab057ce1',	'Qm8C1ZSw',	'',	1,	1,	'd63ce9a7-0973-48cc-9cea-e5afd0ae502b',	NULL,	'2018-01-04 03:52:50',	'2018-01-04 03:52:50',	NULL),
(10,	'Leunico',	'867426952@qq.com',	'0e4d6423e5a875e6cd9e496280ebd415',	'SKPI7B0w',	'',	1,	1,	'4df44feb-340f-47f7-a209-7ca58bc9ab76',	'0000-00-00 00:00:00',	'2018-02-28 02:04:54',	'2018-01-04 03:58:38',	NULL),
(11,	'albert',	'2235004643@qq.com',	'c6da74b4690a7b635dce2080c4bef07a',	'OqV9a1Ev',	'',	1,	1,	'73b85ae0-0875-479f-8acf-6ac3969932a6',	NULL,	'2018-01-04 03:59:50',	'2018-01-04 03:59:50',	NULL),
(12,	'yukibaba',	'88888888@qq.com',	'0252df8f76c64f8242dd150c104329c6',	'yvcIzkNs',	'',	1,	1,	'3a4e7c52-d869-40ad-8e27-336e80657d49',	NULL,	'2018-01-04 04:00:17',	'2018-01-04 04:00:17',	NULL),
(13,	'安卓程序员',	'123456789@163.com',	'27616215e6c1cb69b57af397716827e9',	'ln5B7fR4',	'',	1,	1,	'e01e75f5-5c9c-478b-8edc-10db639281e4',	NULL,	'2018-01-04 04:01:01',	'2018-01-04 04:01:01',	NULL),
(14,	'苹果程序员',	'987654321@123.com',	'5e46037a78f9a5a79508ba2b6d972480',	'G0KMR7xg',	'',	1,	1,	'915eed24-38af-4f3d-8445-1a175a731f50',	NULL,	'2018-01-04 04:01:24',	'2018-01-04 04:01:24',	NULL);

-- 2018-02-28 09:19:10
