-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 192.168.1.45    Database: framework
-- ------------------------------------------------------
-- Server version	8.0.11

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
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
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asset`
--

LOCK TABLES `asset` WRITE;
/*!40000 ALTER TABLE `asset` DISABLE KEYS */;
INSERT INTO `asset` VALUES (1,'DG 000100',NULL,2,3,'eeeeeeeeeeeeee ','CLR00888888','Cummins233','CU001ASSSS','pppppppppppp ','2','2018-09-07',1,1),(3,'DG 000123',NULL,2,3,'kkkkkkkkk','CLR0021212M','hhhhhhh','wwwwwww','gggggg','10','2018-09-07',1,1),(4,'DG 000123',NULL,2,3,'kkkkkkkkk','CLR0021212M','hhhhhhh','wwwwwww','gggggg','10','2018-09-07',1,1),(5,'DG 000123',3,5,1,'sssssssss ','CLR0021212M','wwww','CU001M','iiiiiiiiiiiiiiiiiiiii','2','2018-09-07',1,1),(6,'dg 0002',2,1,3,'ddsfd ','fdfsdf','dfdsf','dfdf','fdf 3','1','2018-09-08',1,1);
/*!40000 ALTER TABLE `asset` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asset_category`
--

DROP TABLE IF EXISTS `asset_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asset_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL,
  `createdat` date DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `isactive` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asset_category`
--

LOCK TABLES `asset_category` WRITE;
/*!40000 ALTER TABLE `asset_category` DISABLE KEYS */;
INSERT INTO `asset_category` VALUES (1,'XYZ','XYZ Description','2018-09-06',1,1),(2,'PQR','PQR Description','2018-09-06',1,1),(3,'ABC','ABC Description','2018-09-06',1,1),(4,'ASD','asd djfnff','2018-09-07',1,0),(5,'hgfdfsfdsfds','lkhkhgfdkjgfd','2018-09-07',1,1),(6,'gjjdsf','fsasa','2018-09-07',1,0),(7,'ddsdsds','gdfggdsgf','2018-09-07',1,0),(8,'dfdsfds','ddgdssd','2018-09-07',1,0),(9,'Asset category','asset description','2018-09-07',1,1),(10,'fgfgrg','dgfgffh','2018-09-07',1,1);
/*!40000 ALTER TABLE `asset_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asset_location`
--

DROP TABLE IF EXISTS `asset_location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asset_location`
--

LOCK TABLES `asset_location` WRITE;
/*!40000 ALTER TABLE `asset_location` DISABLE KEYS */;
INSERT INTO `asset_location` VALUES (1,'Sandton','aaaaa','sdsd','44444','12','34','sssss','2018-09-07',1,1),(2,'XYZ','vvv','aaa','rrrr','24','45','hhhh','2018-09-07',1,1),(3,'ABC','ffff','aaaa','qqq','11','34','gggg','2018-09-07',1,1),(4,'LMP','bbb','sss','qqq','23','23','jjjj','2018-09-07',1,1),(5,'JKN','www','www','ttt','34','56','nnn','2018-09-07',1,1),(6,'RWX','aaa','aaa','vvv','24','24','hhh','2018-09-07',1,1),(7,'san','dfdsfsd','-26.22665','28.22222','joy ','27 113265900','dgdg ff','2018-09-08',1,1);
/*!40000 ALTER TABLE `asset_location` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asset_type`
--

DROP TABLE IF EXISTS `asset_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asset_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL,
  `createdat` date DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `isactive` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asset_type`
--

LOCK TABLES `asset_type` WRITE;
/*!40000 ALTER TABLE `asset_type` DISABLE KEYS */;
INSERT INTO `asset_type` VALUES (1,'ABC','ABC','2018-09-07',1,1),(2,'xyz','XYZ','2018-09-07',1,0),(3,'Pqr','PQR Description','2018-09-07',1,1),(4,'New Asset','','2018-09-07',1,0);
/*!40000 ALTER TABLE `asset_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
INSERT INTO `ci_sessions` VALUES ('5legitptus7ce9ivcg1t6pt66ajpnm29','192.168.1.10',1536316005,'__ci_last_regenerate|i:1536315721;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536291600\";last_check|i:1533098107;'),('jao1pbicr8bokk66nhqjl2k7aea5ubo0','::1',1536316048,'__ci_last_regenerate|i:1536315928;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536297482\";last_check|i:1536299967;'),('rfk7srirvapfiug49j37thamda53l9np','192.168.1.10',1536316304,'__ci_last_regenerate|i:1536316033;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536291600\";last_check|i:1533098107;'),('cfmjub9uprg4nfmb0g2d7h89u0itp5te','192.168.1.149',1536316488,'__ci_last_regenerate|i:1536316358;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1533098107\";last_check|i:1536296105;'),('dpeua32ofvg3f7jj25fioroknut2ll9a','::1',1536316688,'__ci_last_regenerate|i:1536316394;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536240653\";last_check|i:1536291600;error_msg|s:31:\"Failed to update asset category\";__ci_vars|a:1:{s:9:\"error_msg\";s:3:\"old\";}'),('ufa37tklt2v4saat3fr38d33vjtb7giu','::1',1536316608,'__ci_last_regenerate|i:1536316393;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536297482\";last_check|i:1536299967;'),('mokbt1ibq30gvqpak2eicjj3rcv9gf9t','192.168.1.10',1536316630,'__ci_last_regenerate|i:1536316367;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536291600\";last_check|i:1533098107;'),('thi4vosl7t8tdert4auaurndl2bpldu4','192.168.1.149',1536316952,'__ci_last_regenerate|i:1536316752;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1533098107\";last_check|i:1536296105;'),('2tsmffvktrga2lr41idq6pkuvdlmu3g7','192.168.1.10',1536317011,'__ci_last_regenerate|i:1536316724;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536291600\";last_check|i:1533098107;'),('mdes4713vetas3nc6hlu5lk6tk2f2j76','::1',1536317063,'__ci_last_regenerate|i:1536316763;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536297482\";last_check|i:1536299967;'),('domjr8kvm2oisvea2foncb9ii6fpbpuo','::1',1536317013,'__ci_last_regenerate|i:1536316912;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536240653\";last_check|i:1536291600;'),('4c3e65e7hde36c3iradtcl5eobmpndmj','192.168.1.10',1536317213,'__ci_last_regenerate|i:1536317037;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536291600\";last_check|i:1533098107;'),('vqsidn17cotsvufhql4nipvsu0igpqm5','::1',1536317356,'__ci_last_regenerate|i:1536317065;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536297482\";last_check|i:1536299967;'),('schfnsovl003cvk6d9qu0t0av65dbhuq','::1',1536317233,'__ci_last_regenerate|i:1536317232;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536240653\";last_check|i:1536291600;'),('47444abimktl11fhp7vtnq00u9eod36p','192.168.1.149',1536317597,'__ci_last_regenerate|i:1536317356;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1533098107\";last_check|i:1536296105;'),('g7q24u98smcq1ap15h1sqkq1f4t3b632','::1',1536317587,'__ci_last_regenerate|i:1536317379;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536297482\";last_check|i:1536299967;'),('0p5iuqrm2pt5dq7p1smls3vp1v1ajinu','192.168.1.10',1536317883,'__ci_last_regenerate|i:1536317620;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536291600\";last_check|i:1533098107;'),('6uk5tlnu1vi3id9is9cui41v4jipkke2','192.168.1.149',1536317781,'__ci_last_regenerate|i:1536317706;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1533098107\";last_check|i:1536296105;'),('0fpvi3atnl3or6bpr9vi2str302ap8t0','::1',1536317933,'__ci_last_regenerate|i:1536317911;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536297482\";last_check|i:1536299967;'),('6memb4ghp6ggm3987ustv2p35b2b3omf','192.168.1.10',1536318184,'__ci_last_regenerate|i:1536317935;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536291600\";last_check|i:1533098107;'),('7a56hhni9v0b65n5qli51t8hifj579q2','192.168.1.149',1536318475,'__ci_last_regenerate|i:1536318342;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1533098107\";last_check|i:1536296105;'),('vk43iaieekjv7hus119mkdp56pk4a9ls','192.168.1.10',1536318620,'__ci_last_regenerate|i:1536318341;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536291600\";last_check|i:1533098107;'),('mr7692l57tnfp4l907gon8vtusbp5djp','192.168.1.149',1536318830,'__ci_last_regenerate|i:1536318676;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1533098107\";last_check|i:1536296105;'),('e09smt1be8r5fgd2jdlr28s46ka5e25e','192.168.1.10',1536318881,'__ci_last_regenerate|i:1536318675;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536291600\";last_check|i:1533098107;'),('ng9luhofm6hdbgja77m70usdm3ksi4h1','::1',1536319017,'__ci_last_regenerate|i:1536318722;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536240653\";last_check|i:1536291600;'),('mromopmo1dfv11ki32tqbchben3r1e3a','192.168.1.149',1536319050,'__ci_last_regenerate|i:1536319018;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1533098107\";last_check|i:1536296105;'),('gbd2briosh3a4s7d4vjsicvnmq6tk28t','192.168.1.10',1536319314,'__ci_last_regenerate|i:1536319037;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536291600\";last_check|i:1533098107;'),('ik4ckbuh7u5jl1j4e4ac8a02u4lhgn33','::1',1536319420,'__ci_last_regenerate|i:1536319327;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536240653\";last_check|i:1536291600;'),('ckffnkan295fab5va4ng689f6luc1g7f','192.168.1.10',1536319602,'__ci_last_regenerate|i:1536319349;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536291600\";last_check|i:1533098107;'),('blllbh8dtlmnh9c9a4sa0qlmpdfdnq9s','::1',1536319663,'__ci_last_regenerate|i:1536319637;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536297482\";last_check|i:1536299967;'),('ifngh4ugav48hif0r5g54nfu78bs9tjj','192.168.1.10',1536319946,'__ci_last_regenerate|i:1536319665;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536291600\";last_check|i:1533098107;'),('583qthaiqk3q0o1rdla8c31p36cqh8ui','192.168.1.10',1536320223,'__ci_last_regenerate|i:1536320012;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536291600\";last_check|i:1533098107;'),('dt71rioqkocp3aun1llapcgmfrtod0o4','::1',1536320173,'__ci_last_regenerate|i:1536320173;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536240653\";last_check|i:1536291600;'),('dg1g5our57kodtdb6so5rdd1dh27be3k','::1',1536320469,'__ci_last_regenerate|i:1536320220;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536297482\";last_check|i:1536299967;'),('aha1v7cmsrcbqcn8llk5ckn3g2cfsu3r','192.168.1.10',1536320605,'__ci_last_regenerate|i:1536320393;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536291600\";last_check|i:1533098107;'),('0asbh3elj8papipqkoipiot2m0kjrl6j','::1',1536321112,'__ci_last_regenerate|i:1536320823;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536297482\";last_check|i:1536299967;'),('0vhgpha1p6p2l2gplnfh8tk328v75dgp','192.168.1.10',1536321117,'__ci_last_regenerate|i:1536320832;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536291600\";last_check|i:1533098107;'),('kn71i3vv6v5m7ff9i4brlfc543to32e0','192.168.1.149',1536321209,'__ci_last_regenerate|i:1536320919;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1533098107\";last_check|i:1536296105;'),('bc9kj9j5unf4mdsf5re2m19shi74p8n3','::1',1536321354,'__ci_last_regenerate|i:1536321148;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536240653\";last_check|i:1536291600;'),('vjbt22pnierme3tgsjbf1k0lu2lnsnsc','192.168.1.10',1536321435,'__ci_last_regenerate|i:1536321167;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536291600\";last_check|i:1533098107;'),('df4115pod1dtgq830duo0l0l14dfdoff','192.168.1.149',1536321265,'__ci_last_regenerate|i:1536321229;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1533098107\";last_check|i:1536296105;'),('92ivd1nspv7m97v9gs9igsqmsdtnc32a','::1',1536321563,'__ci_last_regenerate|i:1536321308;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536297482\";last_check|i:1536299967;'),('9jqrd7n830oskqesbf03og1c4jltconn','192.168.1.10',1536321767,'__ci_last_regenerate|i:1536321516;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536291600\";last_check|i:1533098107;'),('ltpsntth97p0i8vf0tdbkt41o9m630o1','::1',1536321634,'__ci_last_regenerate|i:1536321633;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536240653\";last_check|i:1536291600;'),('o2f11ab930f15d0rh1l1j0ppks6scjv4','192.168.1.149',1536321780,'__ci_last_regenerate|i:1536321655;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1533098107\";last_check|i:1536296105;'),('qppuidoi7dkcu0kubnbgn2avin4ub5vl','192.168.1.10',1536321988,'__ci_last_regenerate|i:1536321842;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536291600\";last_check|i:1533098107;'),('t2b4o46kidvasg6plaeeprr3apco16jj','192.168.1.149',1536322087,'__ci_last_regenerate|i:1536321989;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1533098107\";last_check|i:1536296105;'),('tqkdngpea9tae8sldgoihn7fcmfr2bhb','::1',1536322288,'__ci_last_regenerate|i:1536321994;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536297482\";last_check|i:1536299967;'),('d412bubv1dcdbipk87fsbbv8i53jd19g','::1',1536322081,'__ci_last_regenerate|i:1536322021;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536240653\";last_check|i:1536291600;'),('vv9a9isalt79bio4mrbsmqsldk1ntaal','::1',1536322596,'__ci_last_regenerate|i:1536322307;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536297482\";last_check|i:1536299967;'),('6dsjd450a0th1jjamhm3hkb8udre9f35','192.168.1.149',1536322404,'__ci_last_regenerate|i:1536322374;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1533098107\";last_check|i:1536296105;'),('72k2b0t6iojjdfjk7obfmdboeg0vho18','192.168.1.10',1536322620,'__ci_last_regenerate|i:1536322393;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536291600\";last_check|i:1533098107;'),('oaut920nsvmk7opmq8egv5hno40jef7h','::1',1536323067,'__ci_last_regenerate|i:1536322624;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536297482\";last_check|i:1536299967;'),('ubrh6bc8v65huaogi0vffn92istdhu2r','192.168.1.10',1536322817,'__ci_last_regenerate|i:1536322767;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536291600\";last_check|i:1533098107;'),('pt8f0lamkdkbgjumpga022c3mc30750b','192.168.1.149',1536323078,'__ci_last_regenerate|i:1536322842;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1533098107\";last_check|i:1536296105;'),('1p1r4n21hm2a3v2dlqttns26v5o49umn','::1',1536323160,'__ci_last_regenerate|i:1536323093;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536297482\";last_check|i:1536299967;'),('t1jqog925kg92g1l3pndacaib333n6gu','192.168.1.10',1536323313,'__ci_last_regenerate|i:1536323077;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536291600\";last_check|i:1533098107;'),('a3q5ncsq99d4kvrh15ec7nkpkeinsqj3','::1',1536323732,'__ci_last_regenerate|i:1536323486;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536297482\";last_check|i:1536299967;'),('solbvttbvcqs5alb3tprbj2t0vgp269j','192.168.1.149',1536323630,'__ci_last_regenerate|i:1536323520;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1533098107\";last_check|i:1536296105;'),('4vbask06gu85cr7os203rdoaaaedip2c','::1',1536323872,'__ci_last_regenerate|i:1536323623;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536240653\";last_check|i:1536291600;'),('02s4jbhbkoufkbp1b3kdrenagblu9jkj','192.168.1.10',1536324012,'__ci_last_regenerate|i:1536323733;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536291600\";last_check|i:1533098107;'),('db2ps4pjbhopclk2tgbs1ma5ddrcp4v4','192.168.1.149',1536323891,'__ci_last_regenerate|i:1536323822;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1533098107\";last_check|i:1536296105;'),('bknh1befom1p1nplaqg9vqe7cn8kbgvs','192.168.1.10',1536324304,'__ci_last_regenerate|i:1536324050;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536291600\";last_check|i:1533098107;'),('k8gs2js3biu2u76sc3j6i2ck8bvqi82s','::1',1536324475,'__ci_last_regenerate|i:1536324163;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536297482\";last_check|i:1536299967;'),('8lmqfibgs0kkklsugmtcdc3m21cj829e','192.168.1.10',1536324822,'__ci_last_regenerate|i:1536324545;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536291600\";last_check|i:1533098107;'),('dv36jvhg001sa7h28ovje67vj7vki2cg','192.168.1.10',1536325160,'__ci_last_regenerate|i:1536324862;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536291600\";last_check|i:1533098107;'),('iiahjlv8fi3eccjqrc10d75bnmik0cg2','::1',1536325175,'__ci_last_regenerate|i:1536324920;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536297482\";last_check|i:1536299967;'),('g450vnt0hvcdjtugl79qdrdbbej53962','192.168.1.10',1536325579,'__ci_last_regenerate|i:1536325286;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536291600\";last_check|i:1533098107;'),('qngb65e34sjh284as45s2b3lr5e34osf','::1',1536325351,'__ci_last_regenerate|i:1536325351;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536297482\";last_check|i:1536299967;'),('kecl78djves2ojnri61nr0vv8g43la2e','::1',1536325757,'__ci_last_regenerate|i:1536325652;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536297482\";last_check|i:1536299967;'),('i55akigrr4i12usarms0n3g2vhr0m1i2','192.168.1.10',1536325685,'__ci_last_regenerate|i:1536325684;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536291600\";last_check|i:1533098107;'),('k24cqitoif8pjv49hv8llb9cs9l4vk3k','::1',1536326015,'__ci_last_regenerate|i:1536326015;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536240653\";last_check|i:1536291600;'),('9asen77v0e169srdulmng6992u3s3aqq','192.168.1.149',1536326286,'__ci_last_regenerate|i:1536326046;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1533098107\";last_check|i:1536296105;'),('f5kor317m0968ggqte3v1i6k0hsl1vf8','192.168.1.10',1536326457,'__ci_last_regenerate|i:1536326203;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536291600\";last_check|i:1533098107;msg|s:25:\"Assets Added Successfully\";__ci_vars|a:1:{s:3:\"msg\";s:3:\"new\";}'),('piot2942n1u1t0e8himvm5aeuqm7gmqe','::1',1536326556,'__ci_last_regenerate|i:1536326336;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536240653\";last_check|i:1536291600;'),('hqc7ol1lshljop08bcihb8b8op83aqj5','192.168.1.10',1536326639,'__ci_last_regenerate|i:1536326549;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536291600\";last_check|i:1533098107;'),('27dljdnk7vpm3frua1p4v0e4bkrhasas','::1',1536327633,'__ci_last_regenerate|i:1536327513;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536240653\";last_check|i:1536291600;'),('6ffns4uf3p6p4akoa80su5qark5528a7','192.168.1.149',1536327679,'__ci_last_regenerate|i:1536327678;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1533098107\";last_check|i:1536296105;'),('e5t74c5acphl9osu71pklqcngd9p8a51','192.168.1.149',1536328448,'__ci_last_regenerate|i:1536328161;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1533098107\";last_check|i:1536296105;'),('l19f0d0kedd3psj5n3pccocmfi4st1gd','::1',1536328399,'__ci_last_regenerate|i:1536328399;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536240653\";last_check|i:1536291600;'),('3su3he3055n77mtsqcprral0dh4h0iv5','192.168.1.149',1536328570,'__ci_last_regenerate|i:1536328511;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1533098107\";last_check|i:1536296105;'),('rlgdd2a8n9onvpa1nqc5runig5j3kt9j','::1',1536328824,'__ci_last_regenerate|i:1536328589;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536297482\";last_check|i:1536299967;'),('ppqc7l20l4f76gki3diduelna2m6rrgs','::1',1536329144,'__ci_last_regenerate|i:1536328875;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536240653\";last_check|i:1536291600;'),('0p4n59modtclilgdfbaapfsfqped1jch','::1',1536329065,'__ci_last_regenerate|i:1536328929;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536297482\";last_check|i:1536299967;'),('2ghtc5v3as5sfmd5un6r6j9jl0qo6nv5','::1',1536329301,'__ci_last_regenerate|i:1536329181;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536240653\";last_check|i:1536291600;'),('2d10c9f0461lbln4cq4rcvebpqed34h7','::1',1536329575,'__ci_last_regenerate|i:1536329496;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536297482\";last_check|i:1536299967;'),('mbuefleljkgnussdvoc076pcv9koe8ni','192.168.1.149',1536329829,'__ci_last_regenerate|i:1536329740;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1533098107\";last_check|i:1536296105;'),('1knged1pvm4jtk18comkoqv3j3mib3h4','::1',1536329974,'__ci_last_regenerate|i:1536329973;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536240653\";last_check|i:1536291600;'),('lso2qddklo4vfrj077k26i1ujb7tqvnt','::1',1536330355,'__ci_last_regenerate|i:1536330133;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536297482\";last_check|i:1536299967;'),('rh08up7a58m43tg8it2bkrqiqfj35t73','::1',1536330911,'__ci_last_regenerate|i:1536330910;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536240653\";last_check|i:1536291600;'),('vgpn2bo7hi6kdgnfg4effce6m1gbqn4q','::1',1536331486,'__ci_last_regenerate|i:1536331485;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536240653\";last_check|i:1536291600;'),('mfndb13543ddvdacv5rq5b1vpgvav6mt','192.168.1.149',1536332239,'__ci_last_regenerate|i:1536332007;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1533098107\";last_check|i:1536296105;'),('dkasphun62tfr2ijlavmb1u57td5275t','192.168.1.149',1536332343,'__ci_last_regenerate|i:1536332321;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1533098107\";last_check|i:1536296105;'),('o16lphupkt111rr8n12rcs70pfd68b69','192.168.1.149',1536395397,'__ci_last_regenerate|i:1536395097;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536299967\";last_check|i:1536395114;'),('dpefmj8153ealbfq70btus0pl48drccd','192.168.1.149',1536395681,'__ci_last_regenerate|i:1536395400;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536299967\";last_check|i:1536395114;'),('hbj378gksgupur5dequepkjhevfd5tqf','192.168.1.149',1536396003,'__ci_last_regenerate|i:1536395711;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536299967\";last_check|i:1536395114;'),('9va8vu56euspbci5su6q4uge4r93e6k5','192.168.1.149',1536396328,'__ci_last_regenerate|i:1536396030;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536299967\";last_check|i:1536395114;'),('eauqpmecn3iq01eojrqndn63lg56ccso','192.168.1.149',1536396637,'__ci_last_regenerate|i:1536396342;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536299967\";last_check|i:1536395114;'),('au2pcmccqnp754uvp7r696ta1896id0v','192.168.1.149',1536396979,'__ci_last_regenerate|i:1536396859;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536299967\";last_check|i:1536395114;'),('dto2e3dhueiam51p6bohlrnujdtspgg1','192.168.1.149',1536397628,'__ci_last_regenerate|i:1536397336;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536299967\";last_check|i:1536395114;'),('1ip2apmupsj122uabvabmcs43v306t7b','192.168.1.149',1536397932,'__ci_last_regenerate|i:1536397659;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536299967\";last_check|i:1536395114;'),('m6sl93lg0pi9uhgoqvm6oi1faggkgk01','192.168.1.149',1536398309,'__ci_last_regenerate|i:1536398049;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536299967\";last_check|i:1536395114;'),('brhcegv500r02qjc77mitepfm57qf2kj','192.168.1.149',1536398624,'__ci_last_regenerate|i:1536398449;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536299967\";last_check|i:1536395114;'),('ck8roq25a3pa18s5hikllsk2l0nr9ua3','192.168.1.149',1536398786,'__ci_last_regenerate|i:1536398779;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536299967\";last_check|i:1536395114;'),('47j356pr3r966gnli0hr49h9dluippk5','192.168.1.149',1536399998,'__ci_last_regenerate|i:1536399712;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536299967\";last_check|i:1536395114;'),('o5025b14fjh6qu49nl06n2f57gffjsov','192.168.1.149',1536400059,'__ci_last_regenerate|i:1536400015;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536299967\";last_check|i:1536395114;'),('5c1ju8kiv3ofsaeoktj09amsnena6nsk','192.168.1.149',1536400669,'__ci_last_regenerate|i:1536400450;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536299967\";last_check|i:1536395114;'),('daank7vg9skeejfi4innlupr54epnfbm','192.168.1.149',1536401435,'__ci_last_regenerate|i:1536401144;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536395114\";last_check|i:1536401377;'),('fjo09tvlcrpfulh7ig0ch2htp0maauva','192.168.1.149',1536401793,'__ci_last_regenerate|i:1536401494;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536395114\";last_check|i:1536401377;'),('ee3gmkm8dojodff48dfds3rn4l9jcld1','192.168.1.149',1536402108,'__ci_last_regenerate|i:1536401807;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536395114\";last_check|i:1536401377;'),('559e9dfh3hm5lid3eocik3f1qah0uchj','192.168.1.149',1536402424,'__ci_last_regenerate|i:1536402129;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536395114\";last_check|i:1536401377;'),('cmv52j30eo6v0cbq2s3d88hb5s2n3e6i','192.168.1.149',1536402939,'__ci_last_regenerate|i:1536402739;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536395114\";last_check|i:1536401377;'),('7qv47lcu75ekrun2v5int9t7qg8lq0kg','192.168.1.149',1536403062,'__ci_last_regenerate|i:1536403062;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536395114\";last_check|i:1536401377;'),('sv39o1kaok27cvtc2hpq5jgadp1av30n','192.168.1.149',1536403782,'__ci_last_regenerate|i:1536403533;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536395114\";last_check|i:1536401377;'),('gbdkdml2u7iepq0tuse2tr24makvgqqa','192.168.1.149',1536404170,'__ci_last_regenerate|i:1536404082;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536395114\";last_check|i:1536401377;'),('t67rohsetgimg3vclakfth05s70f329s','192.168.1.149',1536404734,'__ci_last_regenerate|i:1536404473;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536395114\";last_check|i:1536401377;'),('6uj9j0f36rsluperca18btvfln5lsngq','192.168.1.149',1536404920,'__ci_last_regenerate|i:1536404853;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536395114\";last_check|i:1536401377;success_msg|s:33:\"Device asset successfully updated\";__ci_vars|a:1:{s:11:\"success_msg\";s:3:\"old\";}'),('hprrm9pjusm04mnamtpl5cchev8u5qkl','192.168.1.149',1536405545,'__ci_last_regenerate|i:1536405354;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536395114\";last_check|i:1536401377;'),('05adolhpgetdevb38567ir7v63gtm1n6','192.168.1.149',1536405942,'__ci_last_regenerate|i:1536405730;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536395114\";last_check|i:1536401377;'),('k1d0j6d0shkv0if5duli34fi344b30s2','192.168.1.149',1536406383,'__ci_last_regenerate|i:1536406248;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536395114\";last_check|i:1536401377;'),('scc87bkhn5btm6p94rbf1vjeohdsn9nr','192.168.1.149',1536406794,'__ci_last_regenerate|i:1536406575;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536395114\";last_check|i:1536401377;'),('6fapana25n2hftok7djjnohe9mi1dr2f','192.168.1.149',1536407563,'__ci_last_regenerate|i:1536407295;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536395114\";last_check|i:1536401377;'),('3j2andvnftcer038k73jta7ihmtiqmne','192.168.1.149',1536407913,'__ci_last_regenerate|i:1536407656;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536395114\";last_check|i:1536401377;'),('u35258kmg8itlvvtcsvn22bi18lh3g4q','192.168.1.149',1536409817,'__ci_last_regenerate|i:1536409816;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536395114\";last_check|i:1536401377;'),('7o3kntagnmrv20u02ile772khr0ckn74','192.168.1.149',1536410338,'__ci_last_regenerate|i:1536410175;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536395114\";last_check|i:1536401377;'),('mvj72j0vq5ustf20nc4cb0c0cpv5auge','192.168.1.149',1536412140,'__ci_last_regenerate|i:1536412068;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536401377\";last_check|i:1536412074;'),('831hga0u52l28tj9al971facsfl9sdfr','192.168.1.149',1536412583,'__ci_last_regenerate|i:1536412522;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536401377\";last_check|i:1536412074;'),('433von3bu1of0s4jagc9h6c09j5vv26v','192.168.1.149',1536412974,'__ci_last_regenerate|i:1536412973;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536401377\";last_check|i:1536412074;'),('qu2vc9hesmu9chipeetq188mrv7r8s98','192.168.1.149',1536413397,'__ci_last_regenerate|i:1536413349;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536401377\";last_check|i:1536412074;success_msg|s:33:\"Asset location successfully added\";__ci_vars|a:1:{s:11:\"success_msg\";s:3:\"old\";}'),('gq0900bdug1e2b6muivi3fb6mp5v60gs','192.168.1.149',1536413805,'__ci_last_regenerate|i:1536413778;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536401377\";last_check|i:1536412074;'),('s1hg1fqu7ki2na1b1oipep1rda19cgop','192.168.1.149',1536414457,'__ci_last_regenerate|i:1536414399;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536401377\";last_check|i:1536412074;'),('prpjor1a729kol2r4ogmuab98dj5hmnh','192.168.1.149',1536415009,'__ci_last_regenerate|i:1536414727;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536401377\";last_check|i:1536412074;'),('mchnbvpqsv8cmf9g8b9i4pl8u7p3mgmf','192.168.1.149',1536415606,'__ci_last_regenerate|i:1536415341;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536401377\";last_check|i:1536412074;');
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
-- Table structure for table `client_user`
--

DROP TABLE IF EXISTS `client_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_name` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `client_location` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `client_username` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `srno` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client_user`
--

LOCK TABLES `client_user` WRITE;
/*!40000 ALTER TABLE `client_user` DISABLE KEYS */;
INSERT INTO `client_user` VALUES (4,'vitthal','Manson','admin@admin.com11','Password@123','1','1');
/*!40000 ALTER TABLE `client_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_business_location`
--

LOCK TABLES `customer_business_location` WRITE;
/*!40000 ALTER TABLE `customer_business_location` DISABLE KEYS */;
INSERT INTO `customer_business_location` VALUES (2,'pune','pune','vk',NULL,NULL,'10','2323','32',34434543,'vlkarad82@gmail.comm'),(3,'pune','pune','vk',NULL,NULL,'10','2323','32',34434543,'vlkarad82@gmail.comm');
/*!40000 ALTER TABLE `customer_business_location` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `device_asset`
--

DROP TABLE IF EXISTS `device_asset`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `device_asset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `device_id` int(11) NOT NULL,
  `asset_id` varchar(45) NOT NULL,
  `createdate` date DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `device_asset`
--

LOCK TABLES `device_asset` WRITE;
/*!40000 ALTER TABLE `device_asset` DISABLE KEYS */;
/*!40000 ALTER TABLE `device_asset` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `device_inventory`
--

DROP TABLE IF EXISTS `device_inventory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `device_sensor_mapping` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `device_id` int(11) NOT NULL,
  `sensor_id` varchar(45) NOT NULL,
  `createdat` date DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `device_sensor_mapping`
--

LOCK TABLES `device_sensor_mapping` WRITE;
/*!40000 ALTER TABLE `device_sensor_mapping` DISABLE KEYS */;
INSERT INTO `device_sensor_mapping` VALUES (3,10,'sn0012','2018-09-08',1),(4,10,'sn0012','2018-09-08',1);
/*!40000 ALTER TABLE `device_sensor_mapping` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parameter`
--

LOCK TABLES `parameter` WRITE;
/*!40000 ALTER TABLE `parameter` DISABLE KEYS */;
INSERT INTO `parameter` VALUES (1,'Oil pressure',2,'Engine oil presssure','2018-09-07',1,1),(2,'Oil temperature',3,'Engine oil temperature','2018-09-07',1,1),(3,'hghfhgdg',1,'ytytyttyfdhjyyg','2018-09-07',1,0);
/*!40000 ALTER TABLE `parameter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sensor_inventory`
--

DROP TABLE IF EXISTS `sensor_inventory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sensor_inventory`
--

LOCK TABLES `sensor_inventory` WRITE;
/*!40000 ALTER TABLE `sensor_inventory` DISABLE KEYS */;
/*!40000 ALTER TABLE `sensor_inventory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sensor_type`
--

DROP TABLE IF EXISTS `sensor_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sensor_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL,
  `createdat` date DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `isactive` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sensor_type`
--

LOCK TABLES `sensor_type` WRITE;
/*!40000 ALTER TABLE `sensor_type` DISABLE KEYS */;
INSERT INTO `sensor_type` VALUES (1,'Temperature Sensor','A temperature sensor is often a resistance te','2018-09-07',1,1),(2,'Ultrasonic Sensor','Ultrasonic transducers or ultrasonic sensors ','2018-09-07',1,1),(3,'ABC','ABC','2018-09-07',1,0);
/*!40000 ALTER TABLE `sensor_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `state`
--

DROP TABLE IF EXISTS `state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `uom` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `createdat` date DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `isactive` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uom`
--

LOCK TABLES `uom` WRITE;
/*!40000 ALTER TABLE `uom` DISABLE KEYS */;
INSERT INTO `uom` VALUES (1,'Cms','2018-09-07',1,1),(2,'Mts','2018-09-07',1,1),(3,'rpm','2018-09-07',1,1);
/*!40000 ALTER TABLE `uom` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `uom_type`
--

DROP TABLE IF EXISTS `uom_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `uom_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `uom_id` int(11) NOT NULL,
  `createdat` date DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `isactive` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uom_type`
--

LOCK TABLES `uom_type` WRITE;
/*!40000 ALTER TABLE `uom_type` DISABLE KEYS */;
INSERT INTO `uom_type` VALUES (1,'Depth',1,'2018-09-07',1,1),(2,'Height',2,'2018-09-07',1,1),(3,'Temperature',3,'2018-09-07',1,1);
/*!40000 ALTER TABLE `uom_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_details`
--

DROP TABLE IF EXISTS `user_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_details`
--

LOCK TABLES `user_details` WRITE;
/*!40000 ALTER TABLE `user_details` DISABLE KEYS */;
INSERT INTO `user_details` VALUES (1,'vitthal karad','wagholi pune 1212',' padam maher','India','Maharashtra','pune','2323','4563217893','789654789','vlkarad82@gmail.com','1'),(2,NULL,'pune','v','India','Maharashtra','pune','2323','3232','234234','ffasdfds2332@gmail.com','');
/*!40000 ALTER TABLE `user_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  `country_id` int(11) NOT NULL DEFAULT '1',
  `description` varchar(1000) NOT NULL,
  `contact_person` varchar(100) DEFAULT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `birth_date` date NOT NULL,
  `profileimg` varchar(50) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `login_attempt` varchar(45) DEFAULT NULL,
  `company_logo` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'127.0.0.1','admin@admin.com','$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36','','admin@admin.com',NULL,NULL,NULL,NULL,1,'My hobbies include sketching and playing cricket. I played at cluster level at school and university level at college.\r\n\r\nComing to my strengths and weaknesses, my strengths are. I am a good learner, innovative, I have positive attitude and committed to my work. My weakness is procrastination and I am a bit selfish too.',NULL,'','Vishval','Chavan','ADMIN','1988-03-09','/profile/-profile-IMG_0169.JPG','9860181163','2',NULL,NULL,NULL,'Nhh1BRjZ7xSDXT.BttpJje',1268889823,1536412074,1),(2,'127.0.0.1','najat@gmai.com','$2y$08$It3QijYk.O1VE/.4nwStvel.cKb2q95X.EeWBGSI35B.H18qVS6H.',NULL,'najat@gmai.com',NULL,NULL,NULL,NULL,1,'I am Najat came from Chennai. I have done diploma in automobile engineering along with 84% in rvsptc at Dindigul. I am currently working one of the truck manufacturing company past 6 years. I did some kaizens as a production supervisor role. Although I feel I am ready for new challenging assignment for this position. So, I really excite me. Thank you.',NULL,NULL,'Najat','Pareira','dfsf','2017-07-26','/profile/-profile-favicon.png','9856231245',NULL,NULL,NULL,NULL,NULL,1501055406,1501066947,1),(3,'127.0.0.1','mayur@gmail.com','$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36',NULL,'mayur@gmail.com',NULL,NULL,NULL,NULL,1,' I am born and raised in Pune, and currently I am pursuing MBA in computer engineering, from IIT Mumbai, with an aggregate of  70% till the second semester.\r\n\r\n			I have done my Post Grduation from H. V. Desai with 85% marks.',NULL,NULL,'Mayur','Vachechewar',NULL,'1988-05-06','/profile/-profile-photo.jpg','7894561236',NULL,NULL,NULL,NULL,NULL,1501067080,1501154528,1),(4,'127.0.0.1','sachin@gamil.com','$2y$08$aUTnwMHLhbW182mTogk3rOZ4gQC/ZRpvmcQE9vc3.LderEgTPvmEG',NULL,'sachin@gamil.com',NULL,NULL,NULL,NULL,1,'fgfheeeeefdgfrdgffgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfg',NULL,NULL,'Sachin123','Shetty','MWX','2017-07-26','/profile/-profile-Background.jpg','8956231245',NULL,NULL,NULL,NULL,NULL,1501067502,1501072166,1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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

--
-- Dumping events for database 'framework'
--

--
-- Dumping routines for database 'framework'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-09-08 19:39:00
