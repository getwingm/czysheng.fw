/*
SQLyog Ultimate v11.4 (64 bit)
MySQL - 5.6.15 : Database - czysheng
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`czysheng` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `czysheng`;

/*Table structure for table `czys_taxonomy` */

DROP TABLE IF EXISTS `czys_taxonomy`;

CREATE TABLE `czys_taxonomy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `category_id` varchar(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `url_alias` varchar(64) DEFAULT NULL,
  `redirect_url` varchar(128) DEFAULT NULL,
  `thumb` varchar(128) DEFAULT NULL,
  `description` varchar(256) DEFAULT NULL,
  `page_size` int(11) DEFAULT NULL,
  `list_view` varchar(64) DEFAULT NULL,
  `list_layout` varchar(64) DEFAULT NULL,
  `detail_view` varchar(64) DEFAULT NULL,
  `detail_layout` varchar(64) DEFAULT NULL,
  `seo_title` varchar(256) DEFAULT NULL,
  `seo_keywords` varchar(256) DEFAULT NULL,
  `seo_description` varchar(256) DEFAULT NULL,
  `contents` int(11) NOT NULL DEFAULT '0',
  `sort_num` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `czys_taxonomy` */

insert  into `czys_taxonomy`(`id`,`parent_id`,`category_id`,`name`,`url_alias`,`redirect_url`,`thumb`,`description`,`page_size`,`list_view`,`list_layout`,`detail_view`,`detail_layout`,`seo_title`,`seo_keywords`,`seo_description`,`contents`,`sort_num`) values (1,0,'works-category','传统文化','','','','',NULL,'','','','','','','',0,1469349271),(2,0,'works-category','激励人生','','','','',NULL,'','','','','','','',0,1469349293),(3,0,'works-master','慧律法师','','','','',NULL,'','','','','','','',0,1469349470),(4,0,'works-master','甘国卫居士','','','','',NULL,'','','','','','','',0,1469349503),(5,0,'works-master','净达法师','','','','',NULL,'','','','','','','',0,1469349516),(6,0,'works-master','索达吉堪布','','','','',NULL,'','','','','','','',0,1469349529),(7,0,'works-master','圣严法师','','','','',NULL,'','','','','','','',0,1469349548),(8,0,'works-master','星云大师','','','','',NULL,'','','','','','','',0,1469349563),(9,0,'works-master','未知','','','','',NULL,'','','','','','','',0,1469349576),(10,0,'works-master','王博谦居士','','','','',NULL,'','','','','','','',0,1469349740),(11,0,'works-master','陈柏达居士','','','','',NULL,'','','','','','','',0,1469349755),(12,0,'works-master','贤宗法师','','','','',NULL,'','','','','','','',0,1469349767),(13,0,'works-master','慈诚罗珠堪布','','','','',NULL,'','','','','','','',0,1469349779);

/*Table structure for table `czys_taxonomy_category` */

DROP TABLE IF EXISTS `czys_taxonomy_category`;

CREATE TABLE `czys_taxonomy_category` (
  `id` varchar(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `czys_taxonomy_category` */

insert  into `czys_taxonomy_category`(`id`,`name`,`description`) values ('works-category','作品分类','作品的分类'),('works-master','作品大师','作品的大师');

/*Table structure for table `czys_taxonomy_content` */

DROP TABLE IF EXISTS `czys_taxonomy_content`;

CREATE TABLE `czys_taxonomy_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `taxonomy_id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `czys_taxonomy_content` */

/*Table structure for table `sys_auth_assignment` */

DROP TABLE IF EXISTS `sys_auth_assignment`;

CREATE TABLE `sys_auth_assignment` (
  `user` varchar(64) NOT NULL,
  `role` varchar(64) NOT NULL,
  PRIMARY KEY (`user`,`role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sys_auth_assignment` */

insert  into `sys_auth_assignment`(`user`,`role`) values ('admin111','administrator');

/*Table structure for table `sys_auth_category` */

DROP TABLE IF EXISTS `sys_auth_category`;

CREATE TABLE `sys_auth_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `description` varchar(128) DEFAULT NULL,
  `type` int(11) NOT NULL,
  `sort_num` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `sys_auth_category` */

insert  into `sys_auth_category`(`id`,`name`,`description`,`type`,`sort_num`) values (1,'系统角色',NULL,1,1),(2,'会员角色',NULL,1,1),(5,'基本操作规则',NULL,3,1),(6,'基本权限','',2,1),(7,'系统权限','系统权限',2,100),(8,'管理角色','',1,2),(9,'控制器权限','',2,1436084643);

/*Table structure for table `sys_auth_permission` */

DROP TABLE IF EXISTS `sys_auth_permission`;

CREATE TABLE `sys_auth_permission` (
  `id` varchar(64) NOT NULL,
  `category` varchar(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` varchar(128) DEFAULT NULL,
  `form` int(11) NOT NULL,
  `options` text,
  `default_value` mediumtext,
  `rule` varchar(64) DEFAULT NULL,
  `sort_num` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sys_auth_permission` */

insert  into `sys_auth_permission`(`id`,`category`,`name`,`description`,`form`,`options`,`default_value`,`rule`,`sort_num`) values ('about/default','controller','关于','',5,NULL,'index|首页','ControllerRule',1449225042),('allow_access','system','允许访问','',3,NULL,'*','BooleanRule',10),('deny_access','system','禁止访问','',3,NULL,'',NULL,1000),('manager_admin','system','管理后台','',1,NULL,'','BooleanRule',0),('menu/menu','controller','菜单子项','',5,NULL,'index|首页\r\ncreate|录入\r\nupdate:get|编辑(GET)\r\nupdate:post|编辑(POST)\r\ndelete|删除','ControllerRule',15),('menu/menu-category','controller','菜单管理','',5,NULL,'index|首页\r\ncreate|录入\r\nupdate:get|编辑(GET)\r\nupdate:post|编辑(POST)\r\ndelete|删除','ControllerRule',10),('modularity/default','controller','模块管理','',5,NULL,'index|首页\r\ninstall|安装\r\nactive|开启\r\ndeactive|关闭\r\nuninstall|卸载','ControllerRule',5),('rbac/permission','controller','权限管理','',5,NULL,'index|首页\r\ncreate|录入\r\nupdate:get|编辑(GET)\r\nupdate:post|编辑(POST)\r\ndelete|删除','ControllerRule',1437841705),('rbac/role','controller','角色管理','',5,NULL,'index|首页\r\ncreate|录入\r\nrelation:get|设置权限(GET)\r\nrelation:post|设置权限(POST)\r\nupdate:get|编辑(GET)\r\nupdate:post|编辑(POST)\r\ndelete|删除','ControllerRule',1437841695),('site','controller','site','',5,NULL,'test|test','ControllerRule',1440027272),('system/setting','controller','系统设置','',5,NULL,'basic:get|站点信息(GET)\r\nbasic:post|站点信息(POST)\r\naccess:get|注册与访问控制(GET)\r\naccess:post|注册与访问控制(POST)\r\nseo:get|SEO设置(GET)\r\nseo:post|SEO设置(POST)\r\ndatetime:get|时间设置(GET)\r\ndatetime:post|时间设置(POST)\r\nemail:get|邮件设置(GET)\r\nemail:post|邮件设置(POST)','ControllerRule',0),('taxonomy/taxonomy','controller','分类子项','',5,NULL,'index|首页\r\ncreate|录入\r\nupdate:get|编辑(GET)\r\nupdate:post|编辑(POST)\r\ndelete|删除','ControllerRule',25),('taxonomy/taxonomy-category','controller','分类管理','',5,NULL,'index|首页\r\ncreate|录入\r\nupdate:get|编辑(GET)\r\nupdate:post|编辑(POST)\r\ndelete|删除','ControllerRule',20),('theme/setting','controller','主题设置','',5,NULL,'index:get|编辑(GET)\r\nindex:post|编辑(POST)','ControllerRule',1437918729),('tools/cache','controller','缓存管理','',5,NULL,'index:get|编辑(GET)\r\nindex:post|编辑(POST)','ControllerRule',1438264497),('tools/db','controller','数据库管理','',5,NULL,'index:get|编辑(GET)\r\nindex:post|编辑(POST)','ControllerRule',1438264591),('user/user','controller','用户管理','',5,NULL,'index|首页\r\ncreate|录入\r\nupdate:get|编辑(GET)\r\nupdate:post|编辑(POST)\r\ndelete|删除','ControllerRule',1437841685),('works/default','system','作品列表','',1,NULL,'*','BooleanRule',1469335530),('works/setting','system','作品设置','',1,NULL,'*','BooleanRule',1469347100);

/*Table structure for table `sys_auth_relation` */

DROP TABLE IF EXISTS `sys_auth_relation`;

CREATE TABLE `sys_auth_relation` (
  `role` varchar(64) NOT NULL,
  `permission` varchar(64) NOT NULL,
  `value` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`role`,`permission`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sys_auth_relation` */

insert  into `sys_auth_relation`(`role`,`permission`,`value`) values ('administrator','about/default','index'),('administrator','allow_access','*'),('administrator','deny_access',''),('administrator','manager_admin','1'),('administrator','menu/menu','index,create,update:get,update:post,delete'),('administrator','menu/menu-category','index,create,update:get,update:post,delete'),('administrator','modularity/default','index,install,active,deactive,uninstall'),('administrator','rbac/permission','index,create,update:get,update:post,delete'),('administrator','rbac/role','index,create,relation:get,relation:post,update:get,update:post,delete'),('administrator','site','test'),('administrator','system/setting','basic:get,basic:post,access:get,access:post,seo:get,seo:post,datetime:get,datetime:post,email:get,email:post'),('administrator','taxonomy/taxonomy','index,create,update:get,update:post,delete'),('administrator','taxonomy/taxonomy-category','index,create,update:get,update:post,delete'),('administrator','theme/setting','index:get,index:post'),('administrator','tools/cache','index:get,index:post'),('administrator','tools/db','index:get,index:post'),('administrator','user/user','index,create,update:get,update:post,delete'),('administrator','works/default','1'),('administrator','works/setting','1'),('demo','allow_access','*'),('demo','deny_access',''),('demo','manager_admin','1'),('demo','menu/menu','index,update:get'),('demo','menu/menu-category','index,update:get'),('demo','modularity/default','index'),('demo','rbac/permission','index'),('demo','rbac/role','index,relation:get,update:get'),('demo','system/setting','basic:get,access:get,seo:get,datetime:get,email:get'),('demo','taxonomy/taxonomy','index,update:get'),('demo','taxonomy/taxonomy-category','index,update:get'),('demo','user/user','index,update:get'),('deny_access','allow_access',''),('deny_access','create','1'),('deny_access','delete','0'),('deny_access','deny_access','*'),('deny_access','index','0'),('deny_access','list','0'),('deny_access','manager_admin','0'),('deny_access','update','0'),('editor','allow_access','*'),('editor','deny_access',''),('editor','jjj','0'),('editor','manager_admin','1'),('editor','system/setting','basic:get'),('member_1','create','1'),('member_1','createnews','0'),('member_1','createpost',''),('member_1','delete','1'),('member_1','index','0'),('member_1','list',''),('member_1','update',''),('member_1','updatenews',''),('member_2','create','1'),('member_2','createnews','1'),('member_2','createpost',''),('member_2','delete','文本'),('member_2','index','2'),('member_2','list','3'),('member_2','update','');

/*Table structure for table `sys_auth_role` */

DROP TABLE IF EXISTS `sys_auth_role`;

CREATE TABLE `sys_auth_role` (
  `id` varchar(64) NOT NULL,
  `category` varchar(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` varchar(128) DEFAULT NULL,
  `is_system` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sys_auth_role` */

insert  into `sys_auth_role`(`id`,`category`,`name`,`description`,`is_system`) values ('administrator','admin','管理员','',1),('demo','admin','测试角色','',0),('deny_access','system','禁止访问','',1),('deny_speak','system','禁止发言','',1),('editor','admin','编辑','',0),('guest','system','游客','',1),('member_1','member','初级会员','',0),('member_2','member','中级会员','',0);

/*Table structure for table `sys_config` */

DROP TABLE IF EXISTS `sys_config`;

CREATE TABLE `sys_config` (
  `id` varchar(64) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sys_config` */

insert  into `sys_config`(`id`,`value`) values ('sys_allow_register','0'),('sys_datetime_date_format','Y-m-d'),('sys_datetime_pretty_format','1'),('sys_datetime_timezone','Etc/GMT-8'),('sys_datetime_time_format','24'),('sys_date_format',''),('sys_date_format_custom',''),('sys_default_role','member_1'),('sys_icp','aa'),('sys_lang','zh-CN'),('sys_seo_description','只想简简单单的生活。'),('sys_seo_keywords','心灵鸡汤 传统文化 佛教文化 高品质讲座 有声书 佛教音频 佛教有声书 '),('sys_seo_title','纯真有声'),('sys_site_about','为上班族提供高品质佛学音频。'),('sys_site_description','心灵加油站'),('sys_site_email','442559691@qq.com'),('sys_site_name','纯真有声'),('sys_site_theme','blank'),('sys_site_url',''),('sys_stat','bb'),('sys_status','1'),('sys_theme_admin','dandelion'),('sys_theme_home','dandelion'),('sys_timezone',''),('sys_time_format',''),('sys_time_format_custom',''),('sys_utc',''),('test1',''),('test2',''),('test_data_theme','tttccc'),('works_taxonomy','');

/*Table structure for table `sys_menu` */

DROP TABLE IF EXISTS `sys_menu`;

CREATE TABLE `sys_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `category_id` varchar(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `url` varchar(512) NOT NULL,
  `target` varchar(64) DEFAULT NULL,
  `description` varchar(512) DEFAULT NULL,
  `thumb` varchar(512) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `sort_num` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8;

/*Data for the table `sys_menu` */

insert  into `sys_menu`(`id`,`parent_id`,`category_id`,`name`,`url`,`target`,`description`,`thumb`,`status`,`sort_num`) values (29,0,'admin','设置','#','_self','','cog_4.png',1,20),(30,29,'admin','站点信息','/system/setting/basic','_self','','',1,1),(31,0,'admin','基础功能','#','_self','','file_cabinet.png',1,40),(32,31,'admin','菜单管理','/menu','_self','','',1,1),(33,29,'admin','注册与访问控制','/system/setting/access','_self','','',1,5),(34,29,'admin','SEO设置','/system/setting/seo','_self','','',1,10),(35,29,'admin','时间设置','/system/setting/datetime','_self','','',1,15),(36,29,'admin','邮件设置','/system/setting/email','_self','','',1,20),(37,29,'admin','模块设置','/modularity','_self','','',1,25),(38,31,'admin','分类管理','/taxonomy','_self','','',1,5),(40,0,'admin','用户','#','_self','','users.png',1,80),(41,40,'admin','用户列表','/user/user','_self','','',1,1),(42,40,'admin','角色管理','/rbac/role','_self','','',1,5),(43,40,'admin','权限管理','/rbac/permission','_self','','',1,10),(47,0,'admin','主题','#','_self','','images_2.png',1,100),(48,0,'admin','工具','#','_self','','tools.png',1,120),(49,0,'admin','首页','/site/welcome','_self','','home.png',1,0),(52,0,'footer','关于本站','#','_self','','',1,1437310069),(53,0,'footer','投放广告','#','_self','','',1,1437310153),(54,0,'footer','赞助本站','#','_self','','',1,1437310172),(60,47,'admin','主题设置','/theme/setting','_self','','',1,1437875675),(61,48,'admin','缓存管理','/tools/cache','_self','','',1,1438095271),(62,48,'admin','数据库管理','/tools/db','_self','','',1,1438095412),(63,48,'admin','s','d','_self','','',1,1438095910),(64,0,'afxmain','首页','index.php','_self','','',0,0),(70,0,'afxmain','关于','/index.php?r=about','_self','','',1,1445175034),(82,0,'admin','作品管理','#','_self','','users.png',1,50),(83,82,'admin','作品列表','/works','_self','','',1,1469333882);

/*Table structure for table `sys_menu_category` */

DROP TABLE IF EXISTS `sys_menu_category`;

CREATE TABLE `sys_menu_category` (
  `id` varchar(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sys_menu_category` */

insert  into `sys_menu_category`(`id`,`name`,`description`) values ('admin','后台菜单',''),('afxmain','佛学主导航',''),('footer','底部菜单','');

/*Table structure for table `sys_modularity` */

DROP TABLE IF EXISTS `sys_modularity`;

CREATE TABLE `sys_modularity` (
  `id` varchar(64) NOT NULL,
  `is_system` tinyint(1) NOT NULL DEFAULT '0',
  `is_content` tinyint(1) NOT NULL DEFAULT '0',
  `enable_admin` tinyint(1) NOT NULL DEFAULT '0',
  `enable_home` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sys_modularity` */

insert  into `sys_modularity`(`id`,`is_system`,`is_content`,`enable_admin`,`enable_home`) values ('about',0,0,1,1),('menu',0,0,1,1),('modularity',0,0,1,1),('rbac',0,0,1,1),('system',0,0,1,1),('taxonomy',0,0,1,1),('theme',0,0,1,0),('tools',0,0,1,1),('user',0,0,1,1),('works',0,0,1,1);

/*Table structure for table `sys_user` */

DROP TABLE IF EXISTS `sys_user`;

CREATE TABLE `sys_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `role` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `sys_user` */

insert  into `sys_user`(`id`,`username`,`auth_key`,`password_hash`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`,`role`) values (1,'admin111','4PBB6MTWO0ZNhgM8da2jONmIIhapjSlu','$2y$13$pe4/YXj8WeXS6t/pMv53dOqv4ATyU.3nQTjnJ5n46qPn.b2JDMpv2',NULL,'admin111@admin.com',0,1422277168,1454124265,'administrator'),(5,'xinlu','4PBB6MTWO0ZNhgM8da2jONmIIhapjSlu','$2y$13$Xalhds14ySj112xUNCFle.9RZ6Ya14lMoxvyt2K/GSA9u./5Yemyi',NULL,'xinlu@admin.com',1,1454123936,1454124149,'administrator');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
