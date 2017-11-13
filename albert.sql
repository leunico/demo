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
  `cate_Status` tinyint(1) unsigned DEFAULT '0',
  `update_time` timestamp NULL DEFAULT NULL,
  `create_time` timestamp NULL DEFAULT NULL,
  `delete_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cate_Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `albert_cate` (`cate_Id`, `cate_ParentId`, `cate_Name`, `cate_Intro`, `cate_Model`, `cate_Order`, `cate_Icon`, `cate_Status`, `update_time`, `create_time`, `delete_time`) VALUES
(13,	10,	'php安全',	'讲述php安全',	'',	0,	'icons/1.gif',	0,	'2017-11-11 05:18:12',	NULL,	'2017-11-11 05:18:12'),
(12,	10,	'oop',	'oop',	'',	0,	'icons/1.gif',	0,	'2017-11-11 05:18:12',	NULL,	'2017-11-11 05:18:12'),
(11,	10,	'php基础知识',	'php基础知识',	'',	0,	'icons/1.gif',	0,	'2017-11-11 05:18:12',	NULL,	'2017-11-11 05:18:12'),
(10,	2,	'php',	'php学习',	'',	0,	'icons/18.gif',	0,	'2017-11-11 05:18:12',	NULL,	'2017-11-11 05:18:12'),
(9,	2,	'css',	'css学习',	'',	0,	'icons/1.gif',	0,	'2017-11-11 05:18:12',	NULL,	'2017-11-11 05:18:12'),
(8,	2,	'html',	'html学习',	'',	0,	'icons/1.gif',	0,	'2017-11-11 05:18:12',	NULL,	'2017-11-11 05:18:12'),
(7,	0,	'假日休闲',	'悠闲、自在',	'/admin/api/index',	1,	'bath',	0,	'2017-11-13 06:57:50',	NULL,	'2017-11-13 06:57:50'),
(6,	0,	'栀子花开',	'青春无限',	'/admin/api/index',	2,	'bank',	0,	'2017-11-13 06:57:53',	NULL,	'2017-11-13 06:57:53'),
(3,	0,	'生活点滴',	'记录生活点滴',	'',	0,	'icons/2.gif',	0,	'2017-11-11 05:18:18',	NULL,	'2017-11-11 05:18:18'),
(2,	0,	'技术学习',	'平时学习的一些笔记，欢迎批评指正。',	'',	0,	'icons/18.gif',	0,	'2017-11-11 05:18:12',	NULL,	'2017-11-11 05:18:12'),
(5,	0,	'水煮三国',	'品位三国智慧',	'/admin/api/index',	0,	'assistive-listening-systems',	0,	'2017-11-13 06:57:47',	NULL,	'2017-11-13 06:57:47'),
(4,	0,	'接口管理',	'存放你的接口文档和项目例如： www.eolinker.com',	'/admin/project/index',	0,	'plug',	2,	'2017-11-13 11:25:31',	NULL,	NULL),
(14,	10,	'seagull framework',	'seagull framework',	'',	0,	'icons/1.gif',	0,	'2017-11-11 05:18:12',	NULL,	'2017-11-11 05:18:12'),
(15,	2,	'javascript',	'javascript学习',	'',	0,	'icons/1.gif',	0,	'2017-11-11 05:18:12',	NULL,	'2017-11-11 05:18:12'),
(16,	2,	'设计模式',	NULL,	'',	0,	'icons/1.gif',	0,	'2017-11-11 05:18:12',	NULL,	'2017-11-11 05:18:12'),
(17,	2,	'软件工程',	'软件工程学习',	'',	0,	'icons/1.gif',	0,	'2017-11-11 05:18:12',	NULL,	'2017-11-11 05:18:12'),
(18,	3,	'厦门生活',	'厦门生活',	'',	0,	'icons/8.gif',	0,	'2017-11-11 05:18:18',	NULL,	'2017-11-11 05:18:18'),
(19,	3,	'大学生活',	'大学生活',	'',	0,	'icons/8.gif',	0,	'2017-11-11 05:18:18',	NULL,	'2017-11-11 05:18:18'),
(20,	3,	'童年生活',	'童年生活',	'',	0,	'icons/15.gif',	0,	'2017-11-11 05:18:18',	NULL,	'2017-11-11 05:18:18'),
(21,	19,	'学习',	'学习',	'',	0,	'icons/1.gif',	0,	'2017-11-11 05:18:18',	NULL,	'2017-11-11 05:18:18'),
(22,	19,	'运动',	'运动',	'',	0,	'icons/16.gif',	0,	'2017-11-11 05:18:18',	NULL,	'2017-11-11 05:18:18'),
(23,	19,	'旅游',	'旅游',	'',	0,	'icons/24.gif',	0,	'2017-11-11 05:18:18',	NULL,	'2017-11-11 05:18:18'),
(24,	22,	'排球',	'排球',	'',	0,	'icons/9.gif',	0,	'2017-11-11 05:18:18',	NULL,	'2017-11-11 05:18:18'),
(25,	22,	'篮球',	'篮球',	'',	0,	'icons/9.gif',	0,	'2017-11-11 05:18:18',	NULL,	'2017-11-11 05:18:18'),
(26,	22,	'羽毛球',	'羽毛球',	'',	0,	'icons/9.gif',	0,	'2017-11-11 05:18:18',	NULL,	'2017-11-11 05:18:18'),
(27,	22,	'乒乓球',	'乒乓球',	'',	0,	'icons/9.gif',	0,	'2017-11-11 05:18:18',	NULL,	'2017-11-11 05:18:18'),
(28,	0,	'cscs',	'cscsc',	'ssss',	0,	'address-card',	0,	'2017-11-11 05:18:52',	'2017-11-09 10:47:25',	'2017-11-11 05:18:52'),
(29,	0,	'哈哈哈',	'2333',	'pppp',	0,	'area-chart',	0,	'2017-11-11 05:18:50',	'2017-11-09 10:50:30',	'2017-11-11 05:18:50'),
(30,	0,	'dsds',	'dsdsd',	'sdsdsd',	0,	'at',	0,	'2017-11-11 05:18:49',	'2017-11-09 11:01:45',	'2017-11-11 05:18:49'),
(31,	0,	'dsd',	'sdsd',	'sdsdsdsd',	0,	'anchor',	0,	'2017-11-11 05:18:47',	'2017-11-09 11:02:40',	'2017-11-11 05:18:47'),
(32,	0,	'qqqq',	'qqqqq',	'qqqqqq',	0,	'address-book',	0,	'2017-11-11 05:18:45',	'2017-11-09 11:02:54',	'2017-11-11 05:18:45'),
(33,	0,	'wewe',	'wewe',	'wewe',	0,	'adjust',	0,	'2017-11-11 05:18:43',	'2017-11-09 11:03:11',	'2017-11-11 05:18:43'),
(34,	0,	'sddddaa',	'aaaaa',	'wwwwwwwwww',	0,	'address-card-o',	0,	'2017-11-11 05:18:42',	'2017-11-09 11:04:36',	'2017-11-11 05:18:42'),
(35,	4,	'项目列表',	'打开所有的接口列表例如：http://api.crap.cn',	'/admin/index/index',	0,	'reorder',	2,	'2017-11-13 11:40:51',	'2017-11-11 05:33:15',	NULL);

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='系统配置';

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
(17,	'font_wesome',	'Font Awesome',	'basic',	'请选择图标',	'string',	'{\"new\":[\"address-book\",\"address-book-o\",\"address-card\",\"address-card-o\",\"bandcamp\",\"bath\",\"bathtub\",\"drivers-license\",\"drivers-license-o\",\"eercast\",\"envelope-open\",\"envelope-open-o\",\"etsy\",\"free-code-camp\",\"grav\",\"handshake-o\",\"id-badge\",\"id-card\",\"id-card-o\",\"imdb\",\"linode\",\"meetup\",\"microchip\",\"podcast\",\"quora\",\"ravelry\",\"s15\",\"shower\",\"snowflake-o\",\"superpowers\",\"telegram\",\"thermometer\",\"thermometer-0\",\"thermometer-1\",\"thermometer-2\",\"thermometer-3\",\"thermometer-4\",\"thermometer-empty\",\"thermometer-full\",\"thermometer-half\",\"thermometer-quarter\",\"thermometer-three-quarters\",\"times-rectangle\",\"times-rectangle-o\",\"user-circle\",\"user-circle-o\",\"user-o\",\"vcard\",\"vcard-o\",\"window-close\",\"window-close-o\",\"window-maximize\",\"window-minimize\",\"window-restore\",\"wpexplorer\"],\"webApplication\":[\"address-book\",\"address-book-o\",\"address-card\",\"address-card-o\",\"adjust\",\"american-sign-language-interpreting\",\"anchor\",\"archive\",\"area-chart\",\"arrows\",\"arrows-h\",\"arrows-v\",\"asl-interpreting\",\"assistive-listening-systems\",\"asterisk\",\"at\",\"audio-description\",\"automobile\",\"balance-scale\",\"ban\",\"bank\",\"bar-chart\",\"bar-chart-o\",\"barcode\",\"bars\",\"bath\",\"bathtub\",\"battery\",\"battery-0\",\"battery-1\",\"battery-2\",\"battery-3\",\"battery-4\",\"battery-empty\",\"battery-full\",\"battery-half\",\"battery-quarter\",\"battery-three-quarters\",\"bed\",\"beer\",\"bell\",\"bell-o\",\"bell-slash\",\"bell-slash-o\",\"bicycle\",\"binoculars\",\"birthday-cake\",\"blind\",\"bluetooth\",\"bluetooth-b\",\"bolt\",\"bomb\",\"book\",\"bookmark\",\"bookmark-o\",\"braille\",\"briefcase\",\"bug\",\"building\",\"building-o\",\"bullhorn\",\"bullseye\",\"bus\",\"cab\",\"calculator\",\"calendar\",\"calendar-check-o\",\"calendar-minus-o\",\"calendar-o\",\"calendar-plus-o\",\"calendar-times-o\",\"camera\",\"camera-retro\",\"car\",\"caret-square-o-down\",\"caret-square-o-left\",\"caret-square-o-right\",\"caret-square-o-up\",\"cart-arrow-down\",\"cart-plus\",\"cc\",\"certificate\",\"check\",\"check-circle\",\"check-circle-o\",\"check-square\",\"check-square-o\",\"child\",\"circle\",\"circle-o\",\"circle-o-notch\",\"circle-thin\",\"clock-o\",\"clone\",\"close\",\"cloud\",\"cloud-download\",\"cloud-upload\",\"code\",\"code-fork\",\"coffee\",\"cog\",\"cogs\",\"comment\",\"comment-o\",\"commenting\",\"commenting-o\",\"comments\",\"comments-o\",\"compass\",\"copyright\",\"creative-commons\",\"credit-card\",\"credit-card-alt\",\"crop\",\"crosshairs\",\"cube\",\"cubes\",\"cutlery\",\"dashboard\",\"database\",\"deaf\",\"deafness\",\"desktop\",\"diamond\",\"dot-circle-o\",\"download\",\"drivers-license\",\"drivers-license-o\",\"edit\",\"ellipsis-h\",\"ellipsis-v\",\"envelope\",\"envelope-o\",\"envelope-open\",\"envelope-open-o\",\"envelope-square\",\"eraser\",\"exchange\",\"exclamation\",\"exclamation-circle\",\"exclamation-triangle\",\"external-link\",\"external-link-square\",\"eye\",\"eye-slash\",\"eyedropper\",\"fax\",\"feed\",\"female\",\"fighter-jet\",\"file-archive-o\",\"file-audio-o\",\"file-code-o\",\"file-excel-o\",\"file-image-o\",\"file-movie-o\",\"file-pdf-o\",\"file-photo-o\",\"file-picture-o\",\"file-powerpoint-o\",\"file-sound-o\",\"file-video-o\",\"file-word-o\",\"file-zip-o\",\"film\",\"filter\",\"fire\",\"fire-extinguisher\",\"flag\",\"flag-checkered\",\"flag-o\",\"flash\",\"flask\",\"folder\",\"folder-o\",\"folder-open\",\"folder-open-o\",\"frown-o\",\"futbol-o\",\"gamepad\",\"gavel\",\"gear\",\"gears\",\"gift\",\"glass\",\"globe\",\"graduation-cap\",\"group\",\"hand-grab-o\",\"hand-lizard-o\",\"hand-paper-o\",\"hand-peace-o\",\"hand-pointer-o\",\"hand-rock-o\",\"hand-scissors-o\",\"hand-spock-o\",\"hand-stop-o\",\"handshake-o\",\"hard-of-hearing\",\"hashtag\",\"hdd-o\",\"headphones\",\"heart\",\"heart-o\",\"heartbeat\",\"history\",\"home\",\"hotel\",\"hourglass\",\"hourglass-1\",\"hourglass-2\",\"hourglass-3\",\"hourglass-end\",\"hourglass-half\",\"hourglass-o\",\"hourglass-start\",\"i-cursor\",\"id-badge\",\"id-card\",\"id-card-o\",\"image\",\"inbox\",\"industry\",\"info\",\"info-circle\",\"institution\",\"key\",\"keyboard-o\",\"language\",\"laptop\",\"leaf\",\"legal\",\"lemon-o\",\"level-down\",\"level-up\",\"life-bouy\",\"life-buoy\",\"life-ring\",\"life-saver\",\"lightbulb-o\",\"line-chart\",\"location-arrow\",\"lock\",\"low-vision\",\"magic\",\"magnet\",\"mail-forward\",\"mail-reply\",\"mail-reply-all\",\"male\",\"map\",\"map-marker\",\"map-o\",\"map-pin\",\"map-signs\",\"meh-o\",\"microchip\",\"microphone\",\"microphone-slash\",\"minus\",\"minus-circle\",\"minus-square\",\"minus-square-o\",\"mobile\",\"mobile-phone\",\"money\",\"moon-o\",\"mortar-board\",\"motorcycle\",\"mouse-pointer\",\"music\",\"navicon\",\"newspaper-o\",\"object-group\",\"object-ungroup\",\"paint-brush\",\"paper-plane\",\"paper-plane-o\",\"paw\",\"pencil\",\"pencil-square\",\"pencil-square-o\",\"percent\",\"phone\",\"phone-square\",\"photo\",\"picture-o\",\"pie-chart\",\"plane\",\"plug\",\"plus\",\"plus-circle\",\"plus-square\",\"plus-square-o\",\"podcast\",\"power-off\",\"print\",\"puzzle-piece\",\"qrcode\",\"question\",\"question-circle\",\"question-circle-o\",\"quote-left\",\"quote-right\",\"random\",\"recycle\",\"refresh\",\"registered\",\"remove\",\"reorder\",\"reply\",\"reply-all\",\"retweet\",\"road\",\"rocket\",\"rss\",\"rss-square\",\"s15\",\"search\",\"search-minus\",\"search-plus\",\"send\",\"send-o\",\"server\",\"share\",\"share-alt\",\"share-alt-square\",\"share-square\",\"share-square-o\",\"shield\",\"ship\",\"shopping-bag\",\"shopping-basket\",\"shopping-cart\",\"shower\",\"sign-in\",\"sign-language\",\"sign-out\",\"signal\",\"signing\",\"sitemap\",\"sliders\",\"smile-o\",\"snowflake-o\",\"soccer-ball-o\",\"sort\",\"sort-alpha-asc\",\"sort-alpha-desc\",\"sort-amount-asc\",\"sort-amount-desc\",\"sort-asc\",\"sort-desc\",\"sort-down\",\"sort-numeric-asc\",\"sort-numeric-desc\",\"sort-up\",\"space-shuttle\",\"spinner\",\"spoon\",\"square\",\"square-o\",\"star\",\"star-half\",\"star-half-empty\",\"star-half-full\",\"star-half-o\",\"star-o\",\"sticky-note\",\"sticky-note-o\",\"street-view\",\"suitcase\",\"sun-o\",\"support\",\"tablet\",\"tachometer\",\"tag\",\"tags\",\"tasks\",\"taxi\",\"television\",\"terminal\",\"thermometer\",\"thermometer-0\",\"thermometer-1\",\"thermometer-2\",\"thermometer-3\",\"thermometer-4\",\"thermometer-empty\",\"thermometer-full\",\"thermometer-half\",\"thermometer-quarter\",\"thermometer-three-quarters\",\"thumb-tack\",\"thumbs-down\",\"thumbs-o-down\",\"thumbs-o-up\",\"thumbs-up\",\"ticket\",\"times\",\"times-circle\",\"times-circle-o\",\"times-rectangle\",\"times-rectangle-o\",\"tint\",\"toggle-down\",\"toggle-left\",\"toggle-off\",\"toggle-on\",\"toggle-right\",\"toggle-up\",\"trademark\",\"trash\",\"trash-o\",\"tree\",\"trophy\",\"truck\",\"tty\",\"tv\",\"umbrella\",\"universal-access\",\"university\",\"unlock\",\"unlock-alt\",\"unsorted\",\"upload\",\"user\",\"user-circle\",\"user-circle-o\",\"user-o\",\"user-plus\",\"user-secret\",\"user-times\",\"users\",\"vcard\",\"vcard-o\",\"video-camera\",\"volume-control-phone\",\"volume-down\",\"volume-off\",\"volume-up\",\"warning\",\"wheelchair\",\"wheelchair-alt\",\"wifi\",\"window-close\",\"window-close-o\",\"window-maximize\",\"window-minimize\",\"window-restore\",\"wrench\"],\"accessibility\":[\"american-sign-language-interpreting\",\"asl-interpreting\",\"assistive-listening-systems\",\"audio-description\",\"blind\",\"braille\",\"cc\",\"deaf\",\"deafness\",\"hard-of-hearing\",\"low-vision\",\"question-circle-o\",\"sign-language\",\"signing\",\"tty\",\"universal-access\",\"volume-control-phone\",\"wheelchair\",\"wheelchair-alt\"],\"hand\":[\"hand-grab-o\",\"hand-lizard-o\",\"hand-o-down\",\"hand-o-left\",\"hand-o-right\",\"hand-o-up\",\"hand-paper-o\",\"hand-peace-o\",\"hand-pointer-o\",\"hand-rock-o\",\"hand-scissors-o\",\"hand-spock-o\",\"hand-stop-o\",\"thumbs-down\",\"thumbs-o-down\",\"thumbs-o-up\",\"thumbs-up\"],\"transportation\":[\"ambulance\",\"automobile\",\"bicycle\",\"bus\",\"cab\",\"car\",\"fighter-jet\",\"motorcycle\",\"plane\",\"rocket\",\"ship\",\"space-shuttle\",\"subway\",\"taxi\",\"train\",\"truck\",\"wheelchair\",\"wheelchair-alt\"],\"gender\":[\"genderless\",\"intersex\",\"mars\",\"mars-double\",\"mars-stroke\",\"mars-stroke-h\",\"mars-stroke-v\",\"mercury\",\"neuter\",\"transgender\",\"transgender-alt\",\"venus\",\"venus-double\",\"venus-mars\"],\"fileType\":[\"file\",\"file-archive-o\",\"file-audio-o\",\"file-code-o\",\"file-excel-o\",\"file-image-o\",\"file-movie-o\",\"file-o\",\"file-pdf-o\",\"file-photo-o\",\"file-picture-o\",\"file-powerpoint-o\",\"file-sound-o\",\"file-text\",\"file-text-o\",\"file-video-o\",\"file-word-o\",\"file-zip-o\"],\"spinner\":[\"circle-o-notch\",\"cog\",\"gear\",\"refresh\",\"spinner\"],\"formControl\":[\"check-square\",\"check-square-o\",\"circle\",\"circle-o\",\"dot-circle-o\",\"minus-square\",\"minus-square-o\",\"plus-square\",\"plus-square-o\",\"square\",\"square-o\"],\"payment\":[\"cc-amex\",\"cc-diners-club\",\"cc-discover\",\"cc-jcb\",\"cc-mastercard\",\"cc-paypal\",\"cc-stripe\",\"cc-visa\",\"credit-card\",\"credit-card-alt\",\"google-wallet\",\"paypal\"],\"chart\":[\"area-chart\",\"bar-chart\",\"bar-chart-o\",\"line-chart\",\"pie-chart\"],\"currency\":[\"bitcoin\",\"btc\",\"cny\",\"dollar\",\"eur\",\"euro\",\"gbp\",\"gg\",\"gg-circle\",\"ils\",\"inr\",\"jpy\",\"krw\",\"money\",\"rmb\",\"rouble\",\"rub\",\"ruble\",\"rupee\",\"shekel\",\"sheqel\",\"try\",\"turkish-lira\",\"usd\",\"won\",\"yen\"],\"textEditor\":[\"align-center\",\"align-justify\",\"align-left\",\"align-right\",\"bold\",\"chain\",\"chain-broken\",\"clipboard\",\"columns\",\"copy\",\"cut\",\"dedent\",\"eraser\",\"file\",\"file-o\",\"file-text\",\"file-text-o\",\"files-o\",\"floppy-o\",\"font\",\"header\",\"indent\",\"italic\",\"link\",\"list\",\"list-alt\",\"list-ol\",\"list-ul\",\"outdent\",\"paperclip\",\"paragraph\",\"paste\",\"repeat\",\"rotate-left\",\"rotate-right\",\"save\",\"scissors\",\"strikethrough\",\"subscript\",\"superscript\",\"table\",\"text-height\",\"text-width\",\"th\",\"th-large\",\"th-list\",\"underline\",\"undo\",\"unlink\"],\"directional\":[\"angle-double-down\",\"angle-double-left\",\"angle-double-right\",\"angle-double-up\",\"angle-down\",\"angle-left\",\"angle-right\",\"angle-up\",\"arrow-circle-down\",\"arrow-circle-left\",\"arrow-circle-o-down\",\"arrow-circle-o-left\",\"arrow-circle-o-right\",\"arrow-circle-o-up\",\"arrow-circle-right\",\"arrow-circle-up\",\"arrow-down\",\"arrow-left\",\"arrow-right\",\"arrow-up\",\"arrows\",\"arrows-alt\",\"arrows-h\",\"arrows-v\",\"caret-down\",\"caret-left\",\"caret-right\",\"caret-square-o-down\",\"caret-square-o-left\",\"caret-square-o-right\",\"caret-square-o-up\",\"caret-up\",\"chevron-circle-down\",\"chevron-circle-left\",\"chevron-circle-right\",\"chevron-circle-up\",\"chevron-down\",\"chevron-left\",\"chevron-right\",\"chevron-up\",\"exchange\",\"hand-o-down\",\"hand-o-left\",\"hand-o-right\",\"hand-o-up\",\"long-arrow-down\",\"long-arrow-left\",\"long-arrow-right\",\"long-arrow-up\",\"toggle-down\",\"toggle-left\",\"toggle-right\",\"toggle-up\"],\"videoPlayer\":[\"arrows-alt\",\"backward\",\"compress\",\"eject\",\"expand\",\"fast-backward\",\"fast-forward\",\"forward\",\"pause\",\"pause-circle\",\"pause-circle-o\",\"play\",\"play-circle\",\"play-circle-o\",\"random\",\"step-backward\",\"step-forward\",\"stop\",\"stop-circle\",\"stop-circle-o\",\"youtube-play\"],\"brand\":[\"500px\",\"adn\",\"amazon\",\"android\",\"angellist\",\"apple\",\"bandcamp\",\"behance\",\"behance-square\",\"bitbucket\",\"bitbucket-square\",\"bitcoin\",\"black-tie\",\"bluetooth\",\"bluetooth-b\",\"btc\",\"buysellads\",\"cc-amex\",\"cc-diners-club\",\"cc-discover\",\"cc-jcb\",\"cc-mastercard\",\"cc-paypal\",\"cc-stripe\",\"cc-visa\",\"chrome\",\"codepen\",\"codiepie\",\"connectdevelop\",\"contao\",\"css3\",\"dashcube\",\"delicious\",\"deviantart\",\"digg\",\"dribbble\",\"dropbox\",\"drupal\",\"edge\",\"eercast\",\"empire\",\"envira\",\"etsy\",\"expeditedssl\",\"fa\",\"facebook\",\"facebook-f\",\"facebook-official\",\"facebook-square\",\"firefox\",\"first-order\",\"flickr\",\"font-awesome\",\"fonticons\",\"fort-awesome\",\"forumbee\",\"foursquare\",\"free-code-camp\",\"ge\",\"get-pocket\",\"gg\",\"gg-circle\",\"git\",\"git-square\",\"github\",\"github-alt\",\"github-square\",\"gitlab\",\"gittip\",\"glide\",\"glide-g\",\"google\",\"google-plus\",\"google-plus-circle\",\"google-plus-official\",\"google-plus-square\",\"google-wallet\",\"gratipay\",\"grav\",\"hacker-news\",\"houzz\",\"html5\",\"imdb\",\"instagram\",\"internet-explorer\",\"ioxhost\",\"joomla\",\"jsfiddle\",\"lastfm\",\"lastfm-square\",\"leanpub\",\"linkedin\",\"linkedin-square\",\"linode\",\"linux\",\"maxcdn\",\"meanpath\",\"medium\",\"meetup\",\"mixcloud\",\"modx\",\"odnoklassniki\",\"odnoklassniki-square\",\"opencart\",\"openid\",\"opera\",\"optin-monster\",\"pagelines\",\"paypal\",\"pied-piper\",\"pied-piper-alt\",\"pied-piper-pp\",\"pinterest\",\"pinterest-p\",\"pinterest-square\",\"product-hunt\",\"qq\",\"quora\",\"ra\",\"ravelry\",\"rebel\",\"reddit\",\"reddit-alien\",\"reddit-square\",\"renren\",\"resistance\",\"safari\",\"scribd\",\"sellsy\",\"share-alt\",\"share-alt-square\",\"shirtsinbulk\",\"simplybuilt\",\"skyatlas\",\"skype\",\"slack\",\"slideshare\",\"snapchat\",\"snapchat-ghost\",\"snapchat-square\",\"soundcloud\",\"spotify\",\"stack-exchange\",\"stack-overflow\",\"steam\",\"steam-square\",\"stumbleupon\",\"stumbleupon-circle\",\"superpowers\",\"telegram\",\"tencent-weibo\",\"themeisle\",\"trello\",\"tripadvisor\",\"tumblr\",\"tumblr-square\",\"twitch\",\"twitter\",\"twitter-square\",\"usb\",\"viacoin\",\"viadeo\",\"viadeo-square\",\"vimeo\",\"vimeo-square\",\"vine\",\"vk\",\"wechat\",\"weibo\",\"weixin\",\"whatsapp\",\"wikipedia-w\",\"windows\",\"wordpress\",\"wpbeginner\",\"wpexplorer\",\"wpforms\",\"xing\",\"xing-square\",\"y-combinator\",\"y-combinator-square\",\"yahoo\",\"yc\",\"yc-square\",\"yelp\",\"yoast\",\"youtube\",\"youtube-play\",\"youtube-square\"],\"medical\":[\"ambulance\",\"h-square\",\"heart\",\"heart-o\",\"heartbeat\",\"hospital-o\",\"medkit\",\"plus-square\",\"stethoscope\",\"user-md\",\"wheelchair\",\"wheelchair-alt\"]}',	'',	'',	'',	NULL,	NULL);

DROP TABLE IF EXISTS `albert_project`;
CREATE TABLE `albert_project` (
  `project_Id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `project_Name` varchar(128) NOT NULL,
  `project_Remark` varchar(256) NOT NULL DEFAULT '',
  `project_UserId` int(11) unsigned NOT NULL,
  `project_Type` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `project_Cover` varchar(128) NOT NULL DEFAULT '',
  `project_Order` int(11) unsigned NOT NULL DEFAULT '0',
  `project_Status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `project_Version` int(11) DEFAULT NULL,
  `update_time` timestamp NULL DEFAULT NULL,
  `create_time` timestamp NULL DEFAULT NULL,
  `delete_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`project_Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- 2017-11-13 11:40:58
