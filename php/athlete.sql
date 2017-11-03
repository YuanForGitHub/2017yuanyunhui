# Host: localhost  (Version: 5.5.53)
# Date: 2017-10-27 20:21:51
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "athlete"
#

CREATE TABLE `athlete` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `gender` varchar(15) DEFAULT NULL,
  `student_id` varchar(12) DEFAULT NULL,
  `phone_number` varchar(30) DEFAULT NULL,
  `major` varchar(30) DEFAULT NULL,
  `grade` varchar(4) DEFAULT NULL,
  `class` varchar(2) DEFAULT NULL,
  `item` varchar(30) DEFAULT NULL,
  `zubie` int(11) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `ADD_TIME` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `minute` int(11) DEFAULT NULL,
  `second` int(11) DEFAULT NULL,
  `msec` int(11) DEFAULT NULL,
  `run_time` float DEFAULT NULL,
  `distance` float DEFAULT NULL,
  `points` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "athlete"
#

INSERT INTO `athlete` VALUES (1,'李智文','男','201627010409','201627010409','软件工程','2016','4','11',11,11,'2017-10-26 21:23:40',11,11,11,3.1,2,1);
