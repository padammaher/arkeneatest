-- MySQL dump 10.13  Distrib 8.0.12, for Win64 (x86_64)
--
-- Host: 192.168.1.45    Database: framework
-- ------------------------------------------------------
-- Server version	8.0.11

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `asset`
--

DROP TABLE IF EXISTS `asset`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `asset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(45) NOT NULL,
  `customer_locationid` int(11) DEFAULT NULL,
  `asset_catid` int(11) DEFAULT NULL,
  `asset_typeid` int(11) DEFAULT NULL,
  `specification` varchar(100) NOT NULL,
  `serial_no` varchar(45) NOT NULL,
  `make` varchar(45) NOT NULL,
  `model` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL,
  `ismovable` varchar(45) NOT NULL,
  `createdat` date DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `isactive` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asset`
--

LOCK TABLES `asset` WRITE;
/*!40000 ALTER TABLE `asset` DISABLE KEYS */;
INSERT INTO `asset` VALUES (6,'dg 0002',8,9,3,'ddsfd         ','fdfsdf','dfdsf','dfdf','jjjjjjjjjjjj    ','','2018-09-11',1,1),(7,'DG 000400',1,3,1,'bbbbbbbbb','CLR0021212PP','hhhhhhhhhh','CU001L','ttttttttt','10','2018-09-10',1,1),(40,'DG 000400',2,2,3,'ddddddd   ','CLR0021212M','hhhh','CU001M','hhhhh   ','2','2018-09-12',1,1),(48,'DG 000123',2,9,7,'aaaaaaaaaaa ','CLR0021212A','Cummins','CU001M','hhhhhhhhh ','1','2018-09-11',1,1),(49,'DG 000123',6,2,7,'wwwwwwwww ','CLR0021212M','kkkkkkkkk','CU001M','aaaaaaaaa ','1','2018-09-11',1,1),(50,'DG 000123',3,17,7,'ffffffffffffffffffffff','CLR0021212G','mmmmmmmmm','gfgfg','pppppppppp','1','2018-09-11',1,1),(51,'DG 000111',6,3,7,'sssssssssss ','CLR00888888','Cummins','CU001A','aaaaaaaaaaa ','1','2018-09-11',1,1),(52,'DG 000123',4,9,7,'hhhhhhhhhhh','CLR0021212M','Cummins','CU001M','ggggggggggg','2','2018-09-11',1,1),(53,'DG 000122',4,9,7,'pppppppppppppppp   ','CLR0021212M','Cummins','CU001A','iiiiiiiiiiiiiiiii   ','2','2018-09-12',1,1),(54,'DG 000600',2,3,7,'kkkkkkkkkkk','CLR0021212M','Cummins','CU001A','rrrrrrr','1','2018-09-11',1,1),(55,'DG 000601',7,17,7,'kkkkkkkkkkk','CLR0021212A','Cummins','CU001A','ssssssssssss','2','2018-09-11',1,1),(56,'DG 000602',4,9,7,'Fuel','CLR0021212M','Cummins','CU001A','hhhhhhhh','2','2018-09-11',1,1),(57,'DG 000603',4,9,7,'wwwwwwwww','CLR0021212A','Cummins','CU001A','pppppppppppp','2','2018-09-11',1,1),(58,'DG 000604',3,3,7,'gggg ','CLR0021212A','Cummins','CU001A','jjjjjjjjjjj ','1','2018-09-11',1,1),(60,'A001',7,17,7,'asset specification   ','Abc1234008','dsfsdfs','432324234','dsgsgsgsdg   ','2','2018-09-12',1,1),(61,'DG 00060066',5,20,7,'Fuel','CLR111111','Cummins123','CUaaaa','dddddddddd','1','2018-09-12',1,1);
/*!40000 ALTER TABLE `asset` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asset_category`
--

DROP TABLE IF EXISTS `asset_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `asset_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL,
  `createdat` date DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `isactive` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asset_category`
--

LOCK TABLES `asset_category` WRITE;
/*!40000 ALTER TABLE `asset_category` DISABLE KEYS */;
INSERT INTO `asset_category` VALUES (1,'XYZjj','XYZ Description','2018-09-06',1,0),(2,'PQR','PQR Descriptionhhjhjhj','2018-09-06',1,1),(3,'ABC','ABC Description','2018-09-06',1,1),(4,'ASD','asd djfnff','2018-09-07',1,0),(5,'hgfdfsfdsfds','fdhhgkjkj','2018-09-07',1,0),(6,'gjjdsf','fsasa','2018-09-07',1,0),(7,'ddsdsds','gdfggdsgf','2018-09-07',1,0),(8,'dfdsfds','ddgdssd','2018-09-07',1,0),(9,'Assetategory','asset description','2018-09-07',1,1),(10,'fgfgrg','dgfgffh','2018-09-07',1,0),(11,'Asset Category 567','DESC....','2018-09-10',1,0),(12,'12121','123456789789654123654123654789654123654796541','2018-09-10',1,0),(13,'check 123','','2018-09-10',1,0),(14,'56665465454','gfhgfhf','2018-09-10',1,0),(15,'fddfdf','gfhgfhfgh','2018-09-10',1,0),(16,'testing','testing','2018-09-10',1,0),(17,'Asset category','Asset category description','2018-09-10',1,1),(18,'new category','new catjjjjjjjjjjjjjj','2018-09-11',1,0),(19,'fdggdfdf','fdgdfgfd','2018-09-11',1,0),(20,'ASSET CAT','fdkjgfdgfd','2018-09-11',5,1),(21,'Asset Name','Asset123','2018-09-12',1,1);
/*!40000 ALTER TABLE `asset_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asset_location`
--

DROP TABLE IF EXISTS `asset_location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `asset_location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `latitude` varchar(45) NOT NULL,
  `contact_no` varchar(45) NOT NULL,
  `longitude` varchar(45) NOT NULL,
  `contact_person` varchar(45) NOT NULL,
  `contact_email` varchar(45) NOT NULL,
  `createdat` date DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `isactive` tinyint(4) DEFAULT '0',
  `asset_id` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asset_location`
--

LOCK TABLES `asset_location` WRITE;
/*!40000 ALTER TABLE `asset_location` DISABLE KEYS */;
INSERT INTO `asset_location` VALUES (2,'XYZ1','vvv1','aaa1','241','451','rrrr1','hhhh ff','2018-09-10',1,1,''),(3,'ABC','ffff','aaaa','qqq','11','34','gggg','2018-09-07',1,1,''),(4,'LMP','bbb','sss','qqq','23','23','jjjj','2018-09-07',1,1,''),(5,'JKN','www','www','ttt','34','56','nnn','2018-09-07',1,1,''),(6,'RWX','aaa','aaa','vvv','24','24','hhh','2018-09-07',1,1,''),(7,'san','dfdsfsd','-26.22665','28.22222','joy ','27 113265900','dgdg ff','2018-09-08',1,1,'5');
/*!40000 ALTER TABLE `asset_location` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asset_type`
--

DROP TABLE IF EXISTS `asset_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `asset_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL,
  `createdat` date DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `isactive` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asset_type`
--

LOCK TABLES `asset_type` WRITE;
/*!40000 ALTER TABLE `asset_type` DISABLE KEYS */;
INSERT INTO `asset_type` VALUES (1,'ABC','ABC','2018-09-07',1,0),(2,'xyz','XYZ','2018-09-07',1,0),(3,'Pqr','PQR Description','2018-09-07',1,0),(4,'New Asset','','2018-09-07',1,0),(5,'type1','type1','2018-09-10',1,0),(6,'abcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrs','abcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrs','2018-09-10',1,0),(7,'abcd','dfdsgdgdfd','2018-09-10',1,1),(8,'ghfhghg','hgfhgfhgfhf','2018-09-10',1,0),(9,'gg','gg','2018-09-10',1,0),(10,'a','a','2018-09-10',1,0),(11,'aa','aa','2018-09-10',1,0),(12,'aaa','aaa','2018-09-10',1,0),(13,'jkl','jkl','2018-09-10',1,0),(14,'hkjjkjhkhjkhjkhjkjhkjhkj','hkjkjkjhkhkkjhk','2018-09-10',1,0);
/*!40000 ALTER TABLE `asset_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asset_user`
--

DROP TABLE IF EXISTS `asset_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `asset_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `asset_id` int(11) NOT NULL,
  `assetuser_id` varchar(45) NOT NULL,
  `createdate` date DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asset_user`
--

LOCK TABLES `asset_user` WRITE;
/*!40000 ALTER TABLE `asset_user` DISABLE KEYS */;
INSERT INTO `asset_user` VALUES (1,1,'4','2018-09-10',1),(3,1,'11','2018-09-10',1),(5,60,'14','2018-09-12',1);
/*!40000 ALTER TABLE `asset_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `branch_user`
--

DROP TABLE IF EXISTS `branch_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `branch_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `client_name` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `client_location` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `client_username` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `srno` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branch_user`
--

LOCK TABLES `branch_user` WRITE;
/*!40000 ALTER TABLE `branch_user` DISABLE KEYS */;
INSERT INTO `branch_user` VALUES (12,1,'manoj kadam','1','manoj@admin.com','Password@123','1',NULL),(13,1,'vitthal L karad','2','vitthal.karad82@gmail.com','123456789','1',NULL),(14,1,'padam maher',NULL,'padam@admin.com','Ademin@1234','1',NULL);
/*!40000 ALTER TABLE `branch_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ci_sessions`
--

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` VALUES ('7rkkdjr6kuaii2lfv5e52ofsc8ibbkt3','127.0.0.1',1536728037,_binary '__ci_last_regenerate|i:1536727818;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536727529\";last_check|i:1536727818;'),('lf7p0k505jhgnmkso5pbtvlo286bntof','192.168.1.48',1536728365,_binary '__ci_last_regenerate|i:1536728068;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536727175\";last_check|i:1536727529;'),('pu0emhjmr0717gltb6ha2nsoeno8ko4a','192.168.1.149',1536728187,_binary '__ci_last_regenerate|i:1536728132;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536727818\";last_check|i:1536728133;'),('r59ak6f416oq3jcpu9aq5rb0emvmdmr9','::1',1536728425,_binary '__ci_last_regenerate|i:1536728181;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536724952\";last_check|i:1536726543;'),('v4okrp898qud1jpv98e4qnmo69j3sl4b','127.0.0.1',1536728343,_binary '__ci_last_regenerate|i:1536728221;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536727529\";last_check|i:1536727818;'),('nj3th7pqt7lera04ohsh39so85ldtcd0','192.168.1.48',1536728499,_binary '__ci_last_regenerate|i:1536728388;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536727175\";last_check|i:1536727529;'),('7kueq8uno78u1lddrcv779vfiel2chu7','192.168.1.149',1536728798,_binary '__ci_last_regenerate|i:1536728512;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536727818\";last_check|i:1536728133;error_msg|s:33:\"Sensor inventory already existed!\";__ci_vars|a:1:{s:9:\"error_msg\";s:3:\"new\";}'),('81sp0m50oud3hthb6nkrh9nsqe0bpnnl','192.168.1.149',1536729116,_binary '__ci_last_regenerate|i:1536728835;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536727818\";last_check|i:1536728133;'),('5vgr3hjcffn023la3mqmqd6d4uqdfqgl','192.168.1.48',1536729207,_binary '__ci_last_regenerate|i:1536729015;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536727175\";last_check|i:1536727529;'),('aq4eloc75mefg0n5i93f25jopoq54b90','192.168.1.149',1536729340,_binary '__ci_last_regenerate|i:1536729147;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536727818\";last_check|i:1536728133;error_msg|s:33:\"Sensor inventory already existed!\";__ci_vars|a:1:{s:9:\"error_msg\";s:3:\"new\";}'),('cp6gg1mp1ptqgq8pitmpu1rge9hqthco','192.168.1.48',1536729373,_binary '__ci_last_regenerate|i:1536729363;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536727175\";last_check|i:1536727529;'),('hvi6vseq1rbd7p4o19m3dee6ej71l6b2','192.168.1.149',1536729961,_binary '__ci_last_regenerate|i:1536729695;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536728133\";last_check|i:1536729695;error_msg|s:33:\"Sensor inventory already existed!\";__ci_vars|a:1:{s:9:\"error_msg\";s:3:\"new\";}'),('36e90mbc15eoj400r2vbdlo11s7akdmu','192.168.1.149',1536730249,_binary '__ci_last_regenerate|i:1536730005;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536728133\";last_check|i:1536729695;'),('9j0ho745gqrit9gkqa78ja4gmmfcuhq9','192.168.1.149',1536730625,_binary '__ci_last_regenerate|i:1536730432;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536728133\";last_check|i:1536729695;'),('ial0740t1g4sn5jr8ig6d3j0idahv467','192.168.1.48',1536730781,_binary '__ci_last_regenerate|i:1536730633;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536727175\";last_check|i:1536727529;'),('te5jjav5qaer1ob6ts4hbpvps77vd6ph','192.168.1.149',1536730903,_binary '__ci_last_regenerate|i:1536730767;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536728133\";last_check|i:1536729695;'),('7k7chifficjrre7ptch82gljiaobfl60','192.168.1.149',1536731518,_binary '__ci_last_regenerate|i:1536731219;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536728133\";last_check|i:1536729695;'),('us8a9dmb6umf0r9sqdvqkha66ur40uoc','192.168.1.149',1536731867,_binary '__ci_last_regenerate|i:1536731766;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536728133\";last_check|i:1536729695;error_msg|s:33:\"Sensor inventory already existed!\";__ci_vars|a:1:{s:9:\"error_msg\";s:3:\"new\";}'),('8nrtg5sq66kls5r672h377qgg348tr69','::1',1536732186,_binary '__ci_last_regenerate|i:1536731939;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536724952\";last_check|i:1536726543;'),('gcehtmt03s2rrk8j4oaeojq1lrg24tfh','::1',1536732470,_binary '__ci_last_regenerate|i:1536732378;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536729695\";last_check|i:1536732469;message|s:29:\"<p>Logged In Successfully</p>\";__ci_vars|a:3:{s:7:\"message\";s:3:\"old\";s:7:\"csrfkey\";s:3:\"new\";s:9:\"csrfvalue\";s:3:\"new\";}csrfkey|s:8:\"yQ2RagAx\";csrfvalue|s:20:\"Dtx93ACu6NqhUnBJ1KiV\";'),('dqkrjm4am57ivm0ikmpr8iu74vjrecpr','192.168.1.10',1536733314,_binary '__ci_last_regenerate|i:1536733039;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536732469\";last_check|i:1536733042;msg|s:29:\"Asset Code is already existed\";__ci_vars|a:1:{s:3:\"msg\";s:3:\"new\";}'),('tofsjbrlt38b4emnhfe9jnuh471a9dl8','192.168.1.10',1536733471,_binary '__ci_last_regenerate|i:1536733364;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536732469\";last_check|i:1536733042;msg|s:29:\"Asset Code is already existed\";__ci_vars|a:1:{s:3:\"msg\";s:3:\"new\";}'),('ks7vrktp6ljeo9arglok653tkla6ikug','192.168.1.10',1536733927,_binary '__ci_last_regenerate|i:1536733810;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536732469\";last_check|i:1536733042;msg|s:29:\"Asset Code is already existed\";__ci_vars|a:1:{s:3:\"msg\";s:3:\"new\";}'),('8rmfug9ko64bkh0rcieroumjje2gj6qt','::1',1536734134,_binary '__ci_last_regenerate|i:1536734134;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536724952\";last_check|i:1536726543;'),('ms3cmvg0gr3lgu0r9v0v0dopg6ba7g8v','::1',1536734411,_binary '__ci_last_regenerate|i:1536734165;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536729695\";last_check|i:1536732469;'),('f3aaa7a20mau495n76c0o765j4ep2314','192.168.1.10',1536734442,_binary '__ci_last_regenerate|i:1536734233;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536732469\";last_check|i:1536733042;msg|s:29:\"Asset Code is already existed\";__ci_vars|a:1:{s:3:\"msg\";s:3:\"new\";}'),('ov324362tlkdr9dj1nhucr9jef0a6hd0','192.168.1.149',1536734359,_binary '__ci_last_regenerate|i:1536734274;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536728133\";last_check|i:1536729695;'),('8ufto1t4v44d7d66stgi7vg0c850dkbs','::1',1536734773,_binary '__ci_last_regenerate|i:1536734592;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536729695\";last_check|i:1536732469;'),('nclc46npjddbqhmn8k7krgavmj28nubd','192.168.1.10',1536734839,_binary '__ci_last_regenerate|i:1536734607;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536732469\";last_check|i:1536733042;msg|s:29:\"Asset Code is already existed\";__ci_vars|a:1:{s:3:\"msg\";s:3:\"new\";}'),('fhvl65sgrh403huvc2glm4cdpaaiqi1m','::1',1536734890,_binary '__ci_last_regenerate|i:1536734846;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536724952\";last_check|i:1536726543;'),('daiqbc9og683al8cf2nava3b138f3tif','192.168.1.10',1536735229,_binary '__ci_last_regenerate|i:1536734931;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536732469\";last_check|i:1536733042;'),('ju3sitpgsd0s2calhspv4e1bskeqfuot','192.168.1.149',1536735379,_binary '__ci_last_regenerate|i:1536735152;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536728133\";last_check|i:1536729695;error_msg|s:33:\"Sensor inventory already existed!\";__ci_vars|a:1:{s:9:\"error_msg\";s:3:\"old\";}'),('hvqe3s6eesdt37hapvkqkpuhi62m52v2','192.168.1.10',1536735516,_binary '__ci_last_regenerate|i:1536735278;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536732469\";last_check|i:1536733042;msg|s:29:\"Asset Code is already existed\";__ci_vars|a:1:{s:3:\"msg\";s:3:\"new\";}'),('lhbpfgakou1et4ge0vt2aj1969ekodjf','192.168.1.149',1536735852,_binary '__ci_last_regenerate|i:1536735649;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536728133\";last_check|i:1536729695;'),('orni5l5gfr5erd9a7rnnk8ss88vgibr4','192.168.1.10',1536735830,_binary '__ci_last_regenerate|i:1536735621;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536732469\";last_check|i:1536733042;'),('6v6rrlbol3h3jr0m459fka83r6095b82','192.168.1.10',1536735971,_binary '__ci_last_regenerate|i:1536735950;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536732469\";last_check|i:1536733042;'),('uod2qm5g1a4vhuo84qnjnihi281u13s4','192.168.1.149',1536736291,_binary '__ci_last_regenerate|i:1536736026;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536728133\";last_check|i:1536729695;'),('ea18li8lm2jduabnom6ngnlb2r0qrdag','::1',1536736230,_binary '__ci_last_regenerate|i:1536736212;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536724952\";last_check|i:1536726543;'),('cuj2576l9j9g2cibbf9sn1npiid1mjvh','192.168.1.149',1536736391,_binary '__ci_last_regenerate|i:1536736382;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536728133\";last_check|i:1536729695;'),('f7vr2o6qcnktq60hr3ldkh377hc6847q','192.168.1.10',1536736524,_binary '__ci_last_regenerate|i:1536736378;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536732469\";last_check|i:1536733042;'),('eev3louf13bp4co5mdqfelbv223n80t5','192.168.1.10',1536736994,_binary '__ci_last_regenerate|i:1536736834;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536732469\";last_check|i:1536733042;'),('a6s9v7ub8ah58t953rr27oiu0k4r7qql','192.168.1.149',1536736967,_binary '__ci_last_regenerate|i:1536736890;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536728133\";last_check|i:1536729695;'),('tnttp270lqhor4pt7pq69mjchuffd434','192.168.1.149',1536737532,_binary '__ci_last_regenerate|i:1536737303;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536728133\";last_check|i:1536729695;'),('6vh26rbr1cdjl5l72698ao4mt3hcnt83','192.168.1.10',1536737296,_binary '__ci_last_regenerate|i:1536737293;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536732469\";last_check|i:1536733042;'),('e490ltjb5h7p89mrvcigh81csffrjdgc','192.168.1.149',1536737791,_binary '__ci_last_regenerate|i:1536737612;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536728133\";last_check|i:1536729695;'),('0om624j2urha0195516ch6p0tmku81mt','192.168.1.149',1536738206,_binary '__ci_last_regenerate|i:1536738047;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536728133\";last_check|i:1536729695;'),('qbrq56am328mpsi5kvefl4ns9k4bnp9h','::1',1536738470,_binary '__ci_last_regenerate|i:1536738354;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536724952\";last_check|i:1536726543;'),('0lor3v0p4es2nvt6oja5r9vco3fkk9mc','192.168.1.149',1536738543,_binary '__ci_last_regenerate|i:1536738360;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536728133\";last_check|i:1536729695;'),('i7flqe2e7r6485q4iuokbljtvgvdojs6','192.168.1.149',1536738809,_binary '__ci_last_regenerate|i:1536738673;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536728133\";last_check|i:1536729695;'),('ct27fu3ugamc2dejneoj0r1d936a6rkj','::1',1536738770,_binary '__ci_last_regenerate|i:1536738729;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536724952\";last_check|i:1536726543;csrfkey|s:8:\"3T4ZFOer\";__ci_vars|a:2:{s:7:\"csrfkey\";s:3:\"old\";s:9:\"csrfvalue\";s:3:\"old\";}csrfvalue|s:20:\"Yb7ydkxqZAW2ujDhr3Se\";'),('24v1hgvuescflbj1q0n4vujlqvk6tei8','192.168.1.149',1536739033,_binary '__ci_last_regenerate|i:1536739032;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536728133\";last_check|i:1536729695;'),('o3ov7cjbn56ksugt47uv9j2o2ke0n1ul','::1',1536739683,_binary '__ci_last_regenerate|i:1536739506;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536724952\";last_check|i:1536726543;'),('dka5p2tf4sr1j14nv9esha9iicseo78e','::1',1536739845,_binary '__ci_last_regenerate|i:1536739733;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536733042\";last_check|i:1536739735;'),('763bn081s4hvden5m23n2iejl50oi63m','127.0.0.1',1536740074,_binary '__ci_last_regenerate|i:1536740074;');
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `state_id` int(11) NOT NULL,
  `createdat` date DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `isactive` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `city`
--

LOCK TABLES `city` WRITE;
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
INSERT INTO `city` VALUES (1,'pune',1,'2012-03-27',1,1),(2,'Mumbai',1,'2012-03-27',1,1),(3,'Bicholim',2,'2012-03-27',1,1),(4,'Canacona',2,'2012-03-27',1,1),(5,'Ludhiana',3,'2012-03-27',1,1),(6,'Amritsar',3,'2012-03-27',1,1),(7,'Adamsville',4,'2012-03-27',1,1),(8,'Auburn',4,'2012-03-27',1,1),(9,'Ackley',5,'2012-03-27',1,1),(10,'Adair',5,'2012-03-27',1,1),(11,'Carlin',6,'2012-03-27',1,1),(12,'Wells',6,'2012-03-27',1,1),(13,'Haikou',7,'2012-03-27',1,1),(14,'Danzhou',7,'2012-03-27',1,1),(15,'Hexi',8,'2012-03-27',1,1),(16,'Nankai',8,'2012-03-27',1,1),(17,'Kaili City',9,'2012-03-27',1,1),(18,'Guiyang',9,'2012-03-27',1,1);
/*!40000 ALTER TABLE `city` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `createdat` date DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `isactive` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country`
--

LOCK TABLES `country` WRITE;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
INSERT INTO `country` VALUES (1,'India','2012-03-27',1,1),(2,'China','2012-03-27',1,1),(3,'United States','2012-03-27',1,1);
/*!40000 ALTER TABLE `country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_business_location`
--

DROP TABLE IF EXISTS `customer_business_location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `customer_business_location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_person_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pincode` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telephone` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` int(11) DEFAULT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_business_location`
--

LOCK TABLES `customer_business_location` WRITE;
/*!40000 ALTER TABLE `customer_business_location` DISABLE KEYS */;
INSERT INTO `customer_business_location` VALUES (3,'pune','pune','vk','1',NULL,'1','2323','32',34434543,'vlkarad82@gmail.comm'),(4,'Balewadi..','3 Privet Drive, Balewadi Rd, Balewadi, Pune, ','Carl.........','3',NULL,'1','411006','01234567890',2147483647,'aa@gg.cvdff'),(5,'Kothrud','Karve Road,kothrud','Lily Taylor','3',NULL,'1','876567jghjhgjh','87867886878',2147483647,'678768@ddfh.fhgfh'),(7,'baner','fsdf','sdfsdf','15',NULL,'2','2323','32333333333',2147483647,'vlkarad82@gmail..com'),(8,'df','sdf','sdf','4',NULL,'1','2323','32333333333',121,NULL),(13,'wagholi','pune','vk','1',NULL,'1','412206','2222',2147483647,'fsd@gmail.com'),(14,'wagholi','pune','vlk','1',NULL,'1','43434','3434344',43434,'fsd@gmail.com'),(15,'vadgaon','pune','vvvvvvvvvvvvvv','13',NULL,'2','222222222','2222222222',2147483647,'222222@gmail.com'),(16,'vadgaon','pune','vvvvvvvvvvvvvv','13',NULL,'2','222222222','2222222222',2147483647,'222222@gmail.com'),(17,'vadgaon','pune','vvvvvvvvvvvvvv','1','1','1','222222222','2222222222',2147483647,'222222@gmail.com'),(18,'rrrrrr','rrrr','rrrrr','1','1','1','444444','44444444',44444444,'4444@gmal.com'),(19,'rrrrrr','rrrr','rrrrr','1','1','1','444444','44444444',44444444,'4444@gmal.com'),(20,'rrrrrr','rrrr','rrrrr','1','1','1','444444','44444444',44444444,'4444@gmal.com');
/*!40000 ALTER TABLE `customer_business_location` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `device_asset`
--

DROP TABLE IF EXISTS `device_asset`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `device_asset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `device_id` int(11) NOT NULL,
  `asset_id` varchar(45) NOT NULL,
  `createdate` date DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `device_asset`
--

LOCK TABLES `device_asset` WRITE;
/*!40000 ALTER TABLE `device_asset` DISABLE KEYS */;
INSERT INTO `device_asset` VALUES (2,8,'dg0013','2018-09-10',1),(3,6,'7','2018-09-10',1);
/*!40000 ALTER TABLE `device_asset` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `device_inventory`
--

DROP TABLE IF EXISTS `device_inventory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `device_inventory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `number` varchar(45) NOT NULL,
  `serial_no` varchar(45) NOT NULL,
  `make` varchar(45) NOT NULL,
  `model` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL,
  `communication_type` varchar(45) NOT NULL,
  `gsm_number` varchar(45) NOT NULL,
  `communication_status` varchar(45) NOT NULL,
  `communication_history` varchar(45) NOT NULL,
  `communication_protocol` varchar(45) NOT NULL,
  `createdat` date DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `isactive` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `device_inventory`
--

LOCK TABLES `device_inventory` WRITE;
/*!40000 ALTER TABLE `device_inventory` DISABLE KEYS */;
INSERT INTO `device_inventory` VALUES (5,1,'dfg','dfg','dfg','dfg','dfg','dfg','dfg','dfg','dfg','fg','2018-09-07',1,1),(6,1,'dfg','dfg','dfg','dfg','dfg','dfg','dfg','dfg','','fg','2018-09-07',1,1),(7,1,'dfg','dfg','dfg','dfg','dfg','dfg','dfg','dfg','dfg','fg','2018-09-07',1,1),(8,1,'dfg','dfg','dfg','dfg','dfg','dfg','dfg','dfg','dfg','fg','2018-09-07',1,1),(10,1,'22222f','dfdf2','fgh2','hgfh2','fgh22','fghfgh2','fgh2','fghfgh2','','fghfgh2','2018-09-07',1,1);
/*!40000 ALTER TABLE `device_inventory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `device_sensor_mapping`
--

DROP TABLE IF EXISTS `device_sensor_mapping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `device_sensor_mapping` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `device_id` int(11) NOT NULL,
  `sensor_id` varchar(45) NOT NULL,
  `createdat` date DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `isactive` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `device_sensor_mapping`
--

LOCK TABLES `device_sensor_mapping` WRITE;
/*!40000 ALTER TABLE `device_sensor_mapping` DISABLE KEYS */;
INSERT INTO `device_sensor_mapping` VALUES (3,10,'sn0012','2018-09-08',1,0),(4,10,'sn0012','2018-09-08',1,0);
/*!40000 ALTER TABLE `device_sensor_mapping` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'admin','Administrator'),(2,'members','General User');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_attempts`
--

LOCK TABLES `login_attempts` WRITE;
/*!40000 ALTER TABLE `login_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `login_attempts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parameter`
--

DROP TABLE IF EXISTS `parameter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `parameter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `uom_type_id` int(11) NOT NULL,
  `description` varchar(45) NOT NULL,
  `createdat` date DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `isactive` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parameter`
--

LOCK TABLES `parameter` WRITE;
/*!40000 ALTER TABLE `parameter` DISABLE KEYS */;
INSERT INTO `parameter` VALUES (1,'Oil pressure',9,'Engine oil presssure','2018-09-07',1,1),(2,'Oil temperature',9,'Engine oil temperature','2018-09-07',1,1),(3,'hghfhgdg',1,'ytytyttyfdhjyyg','2018-09-07',1,0),(4,'a',4,'aaaaaabbbbdddsfdsfdfsfdsfsdfdsfdsfsdb','2018-09-10',1,0),(5,'dfgfdg',2,'fgdfg','2018-09-10',1,0),(6,'uyiyuiuyiui',3,'uyiuyiuyi','2018-09-10',1,0),(7,'aaavvvccc',1,'hjkjjjjjjjjjjjjjjjjjjjjjjjjjjjjjyiuiiuyiuyiuy','2018-09-10',1,0),(8,'ddffdgfgfvdfgfgfd',7,'','2018-09-10',1,0),(9,'yuuyyu',3,'','2018-09-10',1,0);
/*!40000 ALTER TABLE `parameter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sensor_inventory`
--

DROP TABLE IF EXISTS `sensor_inventory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `sensor_inventory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sensor_no` varchar(45) NOT NULL,
  `device_id` int(11) DEFAULT NULL,
  `sensor_type_id` int(11) DEFAULT NULL,
  `make` varchar(45) NOT NULL,
  `model` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL,
  `parameter_id` int(11) DEFAULT NULL,
  `uom_type_id` int(11) DEFAULT NULL,
  `createdat` date DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `isactive` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sensor_inventory`
--

LOCK TABLES `sensor_inventory` WRITE;
/*!40000 ALTER TABLE `sensor_inventory` DISABLE KEYS */;
INSERT INTO `sensor_inventory` VALUES (1,'sv ww',0,1,'Seimens','T001A','Oil Temperature',1,9,'2018-09-11',1,0),(2,'sv ww',0,1,'seimens','t001a','oil tempreture',1,9,'2018-09-12',1,0);
/*!40000 ALTER TABLE `sensor_inventory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sensor_type`
--

DROP TABLE IF EXISTS `sensor_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `sensor_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL,
  `createdat` date DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `isactive` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sensor_type`
--

LOCK TABLES `sensor_type` WRITE;
/*!40000 ALTER TABLE `sensor_type` DISABLE KEYS */;
INSERT INTO `sensor_type` VALUES (1,'Temperature Sensor','A temperature sensor is often a resistance te','2018-09-07',1,1),(2,'Ultrasonic Sensor','Ultrasonic transducers or ultrasonic sensors ','2018-09-07',1,1),(3,'ABC','ABC','2018-09-07',1,0),(4,'aa','sdsdsadsadsaddddddddsad','2018-09-10',1,0),(5,'sadsd','dfdsffds','2018-09-10',1,1),(6,'abcd','abcd','2018-09-10',1,1),(7,'xyz','xyz','2018-09-10',1,0),(8,'ccv','vcb','2018-09-10',1,1);
/*!40000 ALTER TABLE `sensor_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `state`
--

DROP TABLE IF EXISTS `state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `state` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `country_id` int(11) NOT NULL,
  `createdat` date DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `isactive` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `state`
--

LOCK TABLES `state` WRITE;
/*!40000 ALTER TABLE `state` DISABLE KEYS */;
INSERT INTO `state` VALUES (1,'Maharashtra',1,'2012-03-27',1,1),(2,'Goa',1,'2012-03-27',1,1),(3,'Panjab',1,'2012-03-27',1,1),(4,'Alabama ',3,'2012-03-27',1,1),(5,'Iowa ',3,'2012-03-27',1,1),(6,'Nevada ',3,'2012-03-27',1,1),(7,'Hainan',2,'2012-03-27',1,1),(8,'Tianjin',2,'2012-03-27',1,1),(9,'Guizhou',2,'2012-03-27',1,1);
/*!40000 ALTER TABLE `state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `uom`
--

DROP TABLE IF EXISTS `uom`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `uom` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `createdat` date DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `isactive` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uom`
--

LOCK TABLES `uom` WRITE;
/*!40000 ALTER TABLE `uom` DISABLE KEYS */;
INSERT INTO `uom` VALUES (1,'Cms','2018-09-07',1,1),(2,'Mts','2018-09-07',1,1),(3,'rpm','2018-09-07',1,1),(4,'kv','2018-09-10',1,1),(5,'aaa','2018-09-10',1,1),(6,'abc','2018-09-10',1,1),(7,'1234567890','2018-09-10',1,1),(8,'123456','2018-09-10',1,1);
/*!40000 ALTER TABLE `uom` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `uom_type`
--

DROP TABLE IF EXISTS `uom_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `uom_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `uom_id` int(11) NOT NULL,
  `createdat` date DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `isactive` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uom_type`
--

LOCK TABLES `uom_type` WRITE;
/*!40000 ALTER TABLE `uom_type` DISABLE KEYS */;
INSERT INTO `uom_type` VALUES (1,'Depth',1,'2018-09-07',1,1),(2,'Height',2,'2018-09-07',1,1),(3,'Temperature',3,'2018-09-07',1,1),(4,'Pressure',2,'2018-09-10',1,0),(5,'Pressure',4,'2018-09-10',1,1),(6,'abcdefg',5,'2018-09-10',1,0),(7,'xyz',6,'2018-09-10',1,1),(8,'hgfhfghgf',7,'2018-09-10',1,1),(9,'qqqqq',8,'2018-09-10',1,1);
/*!40000 ALTER TABLE `uom_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_details`
--

DROP TABLE IF EXISTS `user_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `user_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_per_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Country` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `State` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `City` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Pincode` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Telephone` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Mobile` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_details`
--

LOCK TABLES `user_details` WRITE;
/*!40000 ALTER TABLE `user_details` DISABLE KEYS */;
INSERT INTO `user_details` VALUES (6,'Vishval Chavan','Pune ','John Doe','1',NULL,'pune','411004','9876678767','656787656','abc@gg.com','1');
/*!40000 ALTER TABLE `user_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` int(12) DEFAULT NULL,
  `pincode` int(10) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT '1',
  `description` varchar(1000) DEFAULT NULL,
  `contact_person` varchar(100) DEFAULT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `profileimg` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `login_attempt` varchar(45) DEFAULT NULL,
  `company_logo` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `login_flag` tinyint(1) DEFAULT '0',
  `customer_address` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'127.0.0.1','admin@admin.com','$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36','','admin@admin.com',2147483647,411023,1,1,1,'My hobbies include sketching and playing cricket. I played at cluster level at school and university level at college.\r\n\r\nComing to my strengths and weaknesses, my strengths are. I am a good learner, innovative, I have positive attitude and committed to my work. My weakness is procrastination and I am a bit selfish too.','aaaaa','','Vishval','ADMIN','1988-03-09','Chavan','/profile/-profile-IMG_0169.JPG','9860181145','0',NULL,NULL,NULL,'DdFh8A7JZ7ZT.0Td2XLW9O',1268889823,1536739735,1,1,'balewadi,pune'),(2,'127.0.0.1','najat@gmai.com','$2y$08$It3QijYk.O1VE/.4nwStvel.cKb2q95X.EeWBGSI35B.H18qVS6H.',NULL,'najat@gmai.com',NULL,NULL,NULL,NULL,1,'I am Najat came from Chennai. I have done diploma in automobile engineering along with 84% in rvsptc at Dindigul. I am currently working one of the truck manufacturing company past 6 years. I did some kaizens as a production supervisor role. Although I feel I am ready for new challenging assignment for this position. So, I really excite me. Thank you.',NULL,NULL,'Najat','dfsf','2017-07-26','Pareira','/profile/-profile-favicon.png','9856231245',NULL,NULL,NULL,NULL,NULL,1501055406,1501066947,1,0,NULL),(3,'127.0.0.1','mayur@gmail.com','$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36',NULL,'mayur@gmail.com',NULL,NULL,NULL,NULL,1,' I am born and raised in Pune, and currently I am pursuing MBA in computer engineering, from IIT Mumbai, with an aggregate of  70% till the second semester.\r\n\r\n			I have done my Post Grduation from H. V. Desai with 85% marks.',NULL,NULL,'Mayur',NULL,'1988-05-06','Vachechewar','/profile/-profile-photo.jpg','7894561236',NULL,NULL,NULL,NULL,NULL,1501067080,1501154528,1,0,NULL),(4,'127.0.0.1','sachin@gamil.com','$2y$08$aUTnwMHLhbW182mTogk3rOZ4gQC/ZRpvmcQE9vc3.LderEgTPvmEG',NULL,'sachin@gamil.com',NULL,NULL,NULL,NULL,1,'fgfheeeeefdgfrdgffgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfg',NULL,NULL,'Sachin123','MWX','2017-07-26','Shetty','/profile/-profile-Background.jpg','8956231245',NULL,NULL,NULL,NULL,NULL,1501067502,1501072166,1,0,NULL),(5,'127.0.0.1','manali@gmail.com','$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36','','manali@gmail.com',12345678,6,0,0,0,'NULL','','','','','2017-07-26','','','9860181145','0',NULL,NULL,NULL,'DdFh8A7JZ7ZT.0Td2XLW9O',1268889823,1536669972,1,1,'');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_groups`
--

LOCK TABLES `users_groups` WRITE;
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
INSERT INTO `users_groups` VALUES (24,1,1),(25,1,2),(23,2,2),(20,3,2),(26,4,2);
/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-09-12 14:03:15
