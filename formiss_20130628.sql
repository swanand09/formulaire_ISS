/*
SQLyog Enterprise - MySQL GUI v7.02 
MySQL - 5.5.24-log : Database - form_iss
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`form_iss` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `form_iss`;

/*Table structure for table `ci_sessions` */

DROP TABLE IF EXISTS `ci_sessions`;

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ci_sessions` */

insert  into `ci_sessions`(`session_id`,`ip_address`,`user_agent`,`last_activity`,`user_data`) values ('190b7fef4ac3b6fe4c6d871eb90991f7','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:20.0) Gecko/20100101 Firefox/20.0',1366973164,'a:10:{s:9:\"user_data\";s:0:\"\";s:5:\"email\";s:15:\"admin@admin.com\";s:2:\"id\";s:1:\"1\";s:7:\"user_id\";s:1:\"1\";s:8:\"group_id\";s:1:\"1\";s:5:\"group\";s:5:\"admin\";s:10:\"num_ticket\";s:1:\"2\";s:5:\"sujet\";s:13:\"test ticket 2\";s:3:\"tel\";s:7:\"2543758\";s:14:\"nom_technicien\";s:14:\"Admin istrator\";}'),('283bbf9449a2aad60a9e35efc20471c5','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; rv:18.0) Gecko/20100101 Firefox/18.0',1361173397,''),('2dfc7e1d7548f9eedd5095511272380b','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:20.0) Gecko/20100101 Firefox/20.0',1366958521,'a:6:{s:9:\"user_data\";s:0:\"\";s:5:\"email\";s:15:\"admin@admin.com\";s:2:\"id\";s:1:\"1\";s:7:\"user_id\";s:1:\"1\";s:8:\"group_id\";s:1:\"1\";s:5:\"group\";s:5:\"admin\";}'),('394ddd733180aa84a1f9018746b87bff','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; rv:18.0) Gecko/20100101 Firefox/18.0',1361176274,'a:10:{s:9:\"user_data\";s:0:\"\";s:5:\"email\";s:15:\"admin@admin.com\";s:2:\"id\";s:1:\"1\";s:7:\"user_id\";s:1:\"1\";s:8:\"group_id\";s:1:\"1\";s:5:\"group\";s:5:\"admin\";s:10:\"num_ticket\";s:1:\"2\";s:5:\"sujet\";s:13:\"test ticket 2\";s:3:\"tel\";s:7:\"2543758\";s:14:\"nom_technicien\";s:14:\"Admin istrator\";}'),('4709dd22dc6751a0fda1dd00d1addebd','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; rv:18.0) Gecko/20100101 Firefox/18.0',1361173397,'a:6:{s:9:\"user_data\";s:0:\"\";s:5:\"email\";s:15:\"admin@admin.com\";s:2:\"id\";s:1:\"1\";s:7:\"user_id\";s:1:\"1\";s:8:\"group_id\";s:1:\"1\";s:5:\"group\";s:5:\"admin\";}'),('7c1cf7914a16b98c02185106bdaf94a3','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:20.0) Gecko/20100101 Firefox/20.0',1369025580,'a:10:{s:9:\"user_data\";s:0:\"\";s:5:\"email\";s:15:\"admin@admin.com\";s:2:\"id\";s:1:\"1\";s:7:\"user_id\";s:1:\"1\";s:8:\"group_id\";s:1:\"1\";s:5:\"group\";s:5:\"admin\";s:10:\"num_ticket\";s:1:\"2\";s:5:\"sujet\";s:13:\"test ticket 2\";s:3:\"tel\";s:7:\"2543758\";s:14:\"nom_technicien\";s:14:\"Admin istrator\";}'),('dc5afbfffa86ffbf50fbc1a63b484c11','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:20.0) Gecko/20100101 Firefox/20.0',1369740940,'a:10:{s:9:\"user_data\";s:0:\"\";s:5:\"email\";s:15:\"admin@admin.com\";s:2:\"id\";s:1:\"1\";s:7:\"user_id\";s:1:\"1\";s:8:\"group_id\";s:1:\"1\";s:5:\"group\";s:5:\"admin\";s:10:\"num_ticket\";s:1:\"2\";s:5:\"sujet\";s:13:\"test ticket 2\";s:3:\"tel\";s:7:\"2543758\";s:14:\"nom_technicien\";s:14:\"Admin istrator\";}'),('e4644db0377b48f73169aa39beb033a9','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:19.0) Gecko/20100101 Firefox/19.0',1362461296,'a:7:{s:9:\"user_data\";s:0:\"\";s:5:\"email\";s:15:\"admin@admin.com\";s:2:\"id\";s:1:\"1\";s:7:\"user_id\";s:1:\"1\";s:8:\"group_id\";s:1:\"1\";s:5:\"group\";s:5:\"admin\";s:17:\"flash:old:message\";s:42:\"test4 test5 a été supprimé avec succès\";}');

/*Table structure for table `groups` */

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `groups` */

insert  into `groups`(`id`,`name`,`description`) values (1,'admin','Administrator'),(2,'members','General User');

/*Table structure for table `meta` */

DROP TABLE IF EXISTS `meta`;

CREATE TABLE `meta` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

/*Data for the table `meta` */

insert  into `meta`(`id`,`user_id`,`first_name`,`last_name`,`company`,`phone`) values (1,1,'Admin','istrator','ADMIN','0'),(6,6,'Swanand','Reddy',NULL,NULL),(25,25,'test1','test2',NULL,NULL),(26,26,'test2','test3',NULL,NULL),(27,27,'test3','test4',NULL,NULL),(30,30,'test44','test47',NULL,NULL);

/*Table structure for table `ticket` */

DROP TABLE IF EXISTS `ticket`;

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sujet` varchar(255) DEFAULT NULL,
  `ndi` varchar(255) DEFAULT NULL,
  `tel` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `ticket` */

insert  into `ticket`(`id`,`sujet`,`ndi`,`tel`) values (1,'test ticket1','',6317585),(2,'test ticket 2',NULL,2543758),(3,'test ticket 3',NULL,7896544),(4,'test ticket 4',NULL,7854153),(5,'test ticket 5',NULL,5214757);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` mediumint(8) unsigned NOT NULL,
  `ip_address` char(16) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(40) NOT NULL,
  `salt` varchar(40) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`group_id`,`ip_address`,`username`,`password`,`salt`,`email`,`activation_code`,`forgotten_password_code`,`remember_code`,`created_on`,`last_login`,`active`) values (1,1,'127.0.0.1','administrator','59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4','9462e8eee0','admin@admin.com','',NULL,'9d029802e28cd9c768e8e62277c0df49ec65c48c',1268889823,1369740947,1),(6,1,'127.0.0.1','swanand reddy','a9dd646cc0f954e0f2d51c9853e3bd779d204d36',NULL,'s.luthmoodoo@mediacall.mu','',NULL,NULL,1360139183,1360139183,1),(25,1,'127.0.0.1','test1 test2','0b2bcb1671fa73cb022543aa018cc1f55e26de1d',NULL,'test@gmail.com',NULL,NULL,NULL,1360918810,1360918810,1),(26,2,'127.0.0.1','test2 test3','dc817179ea73449a8bf5bc4f229c4e59035abd2b',NULL,'test2@gmail.com',NULL,NULL,NULL,1360918829,1360918829,1),(27,1,'127.0.0.1','test3 test4','dd7cbf87f947a7520c7887cbf3f4a8269ccb50eb',NULL,'test3@gmail.com',NULL,NULL,NULL,1360918937,1360918937,1),(30,2,'127.0.0.1','test44 test47','af016c2b6ef767c3b22ee2cada94cfd22b5eef9e',NULL,'test5@gmail.com',NULL,NULL,NULL,1361176302,1361176302,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
