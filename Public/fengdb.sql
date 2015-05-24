/*
SQLyog 企业版 - MySQL GUI v8.14 
MySQL - 5.5.40 : Database - freddy
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `freddy_collect` */

CREATE TABLE `freddy_collect` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(42) NOT NULL COMMENT '框架名称',
  `t_id` smallint(6) NOT NULL COMMENT '类型Id',
  `keywords` varchar(120) NOT NULL COMMENT '关键词/简介',
  `url` varchar(200) NOT NULL COMMENT '链接地址',
  `note` varchar(60) NOT NULL COMMENT '备注',
  `date` varchar(30) NOT NULL COMMENT '引入日期',
  PRIMARY KEY (`id`),
  KEY `tid` (`t_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `freddy_collect` */

insert  into `freddy_collect`(`id`,`name`,`t_id`,`keywords`,`url`,`note`,`date`) values (2,'sasdadsasd',1,'dsasdadsa','sdadssd','sdsdasd','1432475131');
insert  into `freddy_collect`(`id`,`name`,`t_id`,`keywords`,`url`,`note`,`date`) values (3,'dsasd',2,'dsadsasd','dssadsd','sdadsasda','1432475748');
insert  into `freddy_collect`(`id`,`name`,`t_id`,`keywords`,`url`,`note`,`date`) values (4,'sadsad',2,'sadasddsa','asdsadad','sadsdsdasad','1432475762');
insert  into `freddy_collect`(`id`,`name`,`t_id`,`keywords`,`url`,`note`,`date`) values (5,'sd',1,'sad','asdds','sadsdads','1432476004');
insert  into `freddy_collect`(`id`,`name`,`t_id`,`keywords`,`url`,`note`,`date`) values (6,'sasa',1,'sdadsasa','dsadsa','dsadsads','1432476038');
insert  into `freddy_collect`(`id`,`name`,`t_id`,`keywords`,`url`,`note`,`date`) values (7,'asdsa',1,'sadsdadas','asdadss','asddsaads','1432478099');
insert  into `freddy_collect`(`id`,`name`,`t_id`,`keywords`,`url`,`note`,`date`) values (8,'asdsa',1,'sadsdadas','asdadss','asddsaads','1432478134');
insert  into `freddy_collect`(`id`,`name`,`t_id`,`keywords`,`url`,`note`,`date`) values (9,'dsasda',1,'adssda','asddsa','dsadsa','1432478143');
insert  into `freddy_collect`(`id`,`name`,`t_id`,`keywords`,`url`,`note`,`date`) values (10,'sadsda',1,'asdsdad','saddsa','sdasdasad','1432478175');
insert  into `freddy_collect`(`id`,`name`,`t_id`,`keywords`,`url`,`note`,`date`) values (11,'sdasdaa',1,'sdasdaasd','dsasda','sadsdads','1432478198');
insert  into `freddy_collect`(`id`,`name`,`t_id`,`keywords`,`url`,`note`,`date`) values (12,'adsdsa',1,'sdadsadsa','sdsdasd','asdddsasd','1432478350');
insert  into `freddy_collect`(`id`,`name`,`t_id`,`keywords`,`url`,`note`,`date`) values (13,'sdadsa',1,'sadsdas','saddsasda','sadasddsa','1432478414');
insert  into `freddy_collect`(`id`,`name`,`t_id`,`keywords`,`url`,`note`,`date`) values (14,'dsasadsda',1,'sdsadsad','sdsda','sdsdasda','1432478489');
insert  into `freddy_collect`(`id`,`name`,`t_id`,`keywords`,`url`,`note`,`date`) values (15,'dsasds',1,'sdasadsda','sdasda','sdssadsad','1432478511');
insert  into `freddy_collect`(`id`,`name`,`t_id`,`keywords`,`url`,`note`,`date`) values (16,'sadsda',4,'sdasda','sdadsa','sddsa','1432478545');
insert  into `freddy_collect`(`id`,`name`,`t_id`,`keywords`,`url`,`note`,`date`) values (17,'dasdsa',1,'sdasda','sdsad','sadsad','1432478580');
insert  into `freddy_collect`(`id`,`name`,`t_id`,`keywords`,`url`,`note`,`date`) values (18,'sadsda',1,'asdsda','sasaads','sdasdadsa','1432478598');
insert  into `freddy_collect`(`id`,`name`,`t_id`,`keywords`,`url`,`note`,`date`) values (19,'sadsda',1,'asdsda','sasaads','sdasdadsa','1432478618');
insert  into `freddy_collect`(`id`,`name`,`t_id`,`keywords`,`url`,`note`,`date`) values (20,'adsdsa',1,'asdsdasda','sdasad','sdsadsd','1432478641');
insert  into `freddy_collect`(`id`,`name`,`t_id`,`keywords`,`url`,`note`,`date`) values (21,'dsaasd',1,'sadsda','sdasdads','sdasdasda','1432478656');
insert  into `freddy_collect`(`id`,`name`,`t_id`,`keywords`,`url`,`note`,`date`) values (22,'sadsda',1,'dsaddsa','saddsa','dsasdad','1432479451');
insert  into `freddy_collect`(`id`,`name`,`t_id`,`keywords`,`url`,`note`,`date`) values (23,'asdsdasd',1,'sdadsa','asdsd','sadsd','1432479582');
insert  into `freddy_collect`(`id`,`name`,`t_id`,`keywords`,`url`,`note`,`date`) values (24,'sdasd',1,'dasdsaas','dsasda','sdaasddas','1432479637');
insert  into `freddy_collect`(`id`,`name`,`t_id`,`keywords`,`url`,`note`,`date`) values (25,'sdaasd',1,'dsdsasda','sdasdadsa','sddsasda','1432479839');
insert  into `freddy_collect`(`id`,`name`,`t_id`,`keywords`,`url`,`note`,`date`) values (26,'sdasd',1,'sdasda','dasdsadsa','ddsads','1432480785');
insert  into `freddy_collect`(`id`,`name`,`t_id`,`keywords`,`url`,`note`,`date`) values (27,'sda',1,'dsdsa','sdadsa','sdadsadsd','1432480811');

/*Table structure for table `freddy_collect_type` */

CREATE TABLE `freddy_collect_type` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `typename` varchar(42) NOT NULL COMMENT '类型名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `freddy_collect_type` */

insert  into `freddy_collect_type`(`id`,`typename`) values (1,'jquery');
insert  into `freddy_collect_type`(`id`,`typename`) values (2,'javascript');
insert  into `freddy_collect_type`(`id`,`typename`) values (3,'php');
insert  into `freddy_collect_type`(`id`,`typename`) values (4,'angularjs');
insert  into `freddy_collect_type`(`id`,`typename`) values (5,'mysql');

/*Table structure for table `freddy_user` */

CREATE TABLE `freddy_user` (
  `id` smallint(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `passwords` varchar(32) NOT NULL,
  `active` enum('1','2','3') NOT NULL DEFAULT '1' COMMENT '1默认，2激活，3失效',
  `email` varchar(42) NOT NULL COMMENT '邮箱必须',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `freddy_user` */

insert  into `freddy_user`(`id`,`username`,`passwords`,`active`,`email`) values (1,'admin','21232f297a57a5a743894a0e4a801fc3','2','ifengdb@163.com');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
