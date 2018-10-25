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
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asset`
--

LOCK TABLES `asset` WRITE;
/*!40000 ALTER TABLE `asset` DISABLE KEYS */;
INSERT INTO `asset` VALUES (6,'dg 0002',8,9,3,'ddsfd         ','fdfsdf','dfdsf','dfdf','jjjjjjjjjjjj    ','','2018-09-11',1,1),(7,'DG 000400',1,3,1,'bbbbbbbbb','CLR0021212PP','hhhhhhhhhh','CU001L','ttttttttt','10','2018-09-10',1,1),(48,'DG 000123',2,9,7,'aaaaaaaaaaa   ','CLR0021212A','Cummins','CU001M','hhhhhhhhh   ','1','2018-09-12',1,1),(51,'DG 000111',6,3,7,'sssssssssss ','CLR00888888','Cummins','CU001A','aaaaaaaaaaa ','1','2018-09-11',1,1),(52,'DG 000123',4,9,7,'hhhhhhhhhhh','CLR0021212M','Cummins','CU001M','ggggggggggg','2','2018-09-11',1,1),(53,'DG 000122',4,9,7,'pppppppppppppppp   ','CLR0021212M','Cummins','CU001A','iiiiiiiiiiiiiiiii   ','2','2018-09-12',1,1),(54,'DG 000600',2,3,7,'kkkkkkkkkkk','CLR0021212M','Cummins','CU001A','rrrrrrr','1','2018-09-11',1,1),(55,'DG 000601',7,17,7,'kkkkkkkkkkk','CLR0021212A','Cummins','CU001A','ssssssssssss','2','2018-09-11',1,1),(57,'DG 000603',4,9,7,'wwwwwwwww','CLR0021212A','Cummins','CU001A','pppppppppppp','2','2018-09-11',1,1),(58,'DG 000604',3,3,7,'gggg ','CLR0021212A','Cummins','CU001A','jjjjjjjjjjj ','1','2018-09-11',1,1),(60,'A001',13,3,7,'asset specification       ','Abc1234008','dsfsdfs','432324234','dsgsgsgsdg       ','2','2018-09-12',1,1),(61,'DG 00060066',5,20,7,'Fuel ','CLR111111','Cummins123','CUaaaa','dddddddddd ','1','2018-09-12',1,1),(62,'A002',11,22,16,'asset specification','Abc145678','fgdfgdf','354435ffdg','dfgdfgdfg','2','2018-09-12',1,1),(63,'A004',11,22,17,'tytryrty ','tyryrty','tryrytr','tyrty','tyrtyrt ','2','2018-09-12',1,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asset_category`
--

LOCK TABLES `asset_category` WRITE;
/*!40000 ALTER TABLE `asset_category` DISABLE KEYS */;
INSERT INTO `asset_category` VALUES (1,'XYZjj','XYZ Description','2018-09-06',1,0),(2,'PQR','PQR Descriptionhhjhjhj','2018-09-06',1,1),(3,'ABC','ABC Description','2018-09-06',1,1),(4,'ASD','asd djfnff','2018-09-07',1,0),(5,'hgfdfsfdsfds','fdhhgkjkj','2018-09-07',1,0),(6,'gjjdsf','fsasa','2018-09-07',1,0),(7,'ddsdsds','gdfggdsgf','2018-09-07',1,0),(8,'dfdsfds','ddgdssd','2018-09-07',1,0),(9,'Assetategory','asset description','2018-09-07',1,1),(10,'fgfgrg','dgfgffh','2018-09-07',1,0),(11,'Asset Category 567','DESC....','2018-09-10',1,0),(12,'12121','123456789789654123654123654789654123654796541','2018-09-10',1,0),(13,'check 123','','2018-09-10',1,0),(14,'56665465454','gfhgfhf','2018-09-10',1,0),(15,'fddfdf','gfhgfhfgh','2018-09-10',1,0),(16,'testing','testing','2018-09-10',1,0),(17,'Asset category','Asset category description','2018-09-10',1,1),(18,'new category','new catjjjjjjjjjjjjjj','2018-09-11',1,0),(19,'fdggdfdf','fdgdfgfd','2018-09-11',1,0),(20,'ASSET CAT','fdkjgfdgfd','2018-09-11',5,1),(21,'Asset Name','Asset123','2018-09-12',1,1),(22,'Asset Testing category','desc','2018-09-12',1,1),(23,'Asset Testingcategory','','2018-09-12',1,0),(24,'klj','','2018-09-12',1,0),(25,'jlhjttytytytry','tyrty','2018-09-12',1,0),(26,'Assetyyy','gfdgdgfg','2018-09-12',1,0);
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
  `asset_id` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asset_location`
--

LOCK TABLES `asset_location` WRITE;
/*!40000 ALTER TABLE `asset_location` DISABLE KEYS */;
INSERT INTO `asset_location` VALUES (2,'XYZ1','vvv1','aaa1','241','451','rrrr1','hhhh ff','2018-09-10',1,1,''),(3,'ABC','ffff','aaaa','qqq','11','34','gggg','2018-09-07',1,1,''),(4,'LMP','bbb','sss','qqq','23','23','jjjj','2018-09-07',1,1,''),(5,'JKN','www','www','ttt','34','56','nnn','2018-09-07',1,1,''),(6,'RWX','aaa','aaa','vvv','24','24','hhh','2018-09-07',1,1,''),(7,'san','dfdsfsd','-26.22665','27 113265900','28.22222','joy ','dgdg ff','2018-09-12',1,1,'6'),(11,'Pune','gggggggg','45','ggggg','4545454','67','abc@gmail.com','2018-09-12',1,1,'7'),(12,'ffffff','iiiiiiiiiiii','343434','676767','5555','ttttt','ggg@gmail.com','2018-09-12',1,1,'54'),(13,'Pune','zczxcxzcxc','xzczxczxc','zczxcz','zxczxczxczc','xzczxczxc','dsfd@ gmail.dtyu','2018-09-12',1,1,'63'),(14,'ddddddddd','qqqqqqqqq','45','hhhhhh','454545','555','hhh@gmail.com','2018-09-12',1,1,'62'),(15,'ddddddddd','sssss','4545.666','aaaaa','45454545','-67.88','abc@gmail.com','2018-09-12',1,1,'58'),(16,'ffffffffffff','hhhhhhhhhhhh','5656','8888','kkkkkk','443434','ggg@gmail.com','2018-09-12',1,1,'48'),(18,'ccccccccccc','bbbbbbbbbb','343434','555','hhhhh','787878788','abc@gmail.com','2018-09-12',1,1,'57'),(19,'ddddddddddddd','nnnnnnnnn','56','89','llllll','45454545','abc@gmail.com','2018-09-12',1,1,'61'),(20,'ddddddddd','jjjjjjjjjjjj','45','78','ttttt','45454545','abc@gmail.com','2018-09-12',1,1,'55'),(21,'ffffffff','qqqqqqqq','555','89','kkkkkkkkkkk','888888','abc@gmail.com','2018-09-12',1,1,'53'),(22,'eeeeeeeee','gggggggg','45','ggggggg','ttttt','4545454','abc@gmail.com','2018-09-12',1,1,'51'),(23,'fghfgh','fghfgh','65665','65656','fghfgh','65656','dgdgf@gmail.com','2018-09-14',1,1,'7'),(24,' vnbvnv','fgh','7656','4t545e','ffhfgh','453454','dgdgf@gmail.com','2018-09-14',1,1,'52');
/*!40000 ALTER TABLE `asset_location` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asset_parameter_rule`
--

DROP TABLE IF EXISTS `asset_parameter_rule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asset_parameter_rule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rule_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rule_des` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parameter` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uom` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `green_value` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `orange_value` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `red_value` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `wef_date` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rule_status` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parameter_range_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asset_parameter_rule`
--

LOCK TABLES `asset_parameter_rule` WRITE;
/*!40000 ALTER TABLE `asset_parameter_rule` DISABLE KEYS */;
INSERT INTO `asset_parameter_rule` VALUES (5,'oil presure',' dfsfsf\r\n                ','2','2','12','13','14','09/13/2018','1',2),(6,'rule1','sdfsdf    ','2','2','10','20','21','09/14/2018','1',NULL),(7,'rule name 1','sfsdf',NULL,'2','10','13','14','09/15/2018','1',2);
/*!40000 ALTER TABLE `asset_parameter_rule` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asset_type`
--

LOCK TABLES `asset_type` WRITE;
/*!40000 ALTER TABLE `asset_type` DISABLE KEYS */;
INSERT INTO `asset_type` VALUES (1,'ABC','ABC','2018-09-07',1,0),(2,'xyz','XYZ','2018-09-07',1,0),(3,'Pqr','PQR Description','2018-09-07',1,0),(4,'New Asset','','2018-09-07',1,0),(5,'type1','type1','2018-09-10',1,0),(6,'abcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrs','abcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrs','2018-09-10',1,0),(7,'abcd','dfdsgdgdfd','2018-09-10',1,1),(8,'ghfhghg','hgfhgfhgfhf','2018-09-10',1,0),(9,'gg','gg','2018-09-10',1,0),(10,'a','a','2018-09-10',1,0),(11,'aa','aa','2018-09-10',1,0),(12,'aaa','aaa','2018-09-10',1,0),(13,'jkl','jkl','2018-09-10',1,0),(14,'hkjjkjhkhjkhjkhjkjhkjhkj','hkjkjkjhkhkkjhk','2018-09-10',1,0),(15,'asset type testing test','ghjgjgj','2018-09-12',1,1),(16,'asset a','a','2018-09-12',1,1),(17,'asset b','jljkl','2018-09-12',1,1),(18,'asset c','a','2018-09-12',1,1);
/*!40000 ALTER TABLE `asset_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asset_user`
--

DROP TABLE IF EXISTS `asset_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asset_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `asset_id` int(11) NOT NULL,
  `assetuser_id` varchar(45) NOT NULL,
  `createdate` date DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
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
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branch_user`
--

LOCK TABLES `branch_user` WRITE;
/*!40000 ALTER TABLE `branch_user` DISABLE KEYS */;
INSERT INTO `branch_user` VALUES (12,1,'manoj kadam','1','manoj@admin.com','Password@123','1',NULL),(13,1,'vitthal L karad','2','vitthal.karad82@gmail.com','123456789','1',NULL),(15,1,'sdssss',NULL,'admin@admin.com','password','1',NULL);
/*!40000 ALTER TABLE `branch_user` ENABLE KEYS */;
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
INSERT INTO `ci_sessions` VALUES ('cgmqe3uq6hc5kemfndc8171ru915bcit','192.168.1.149',1536758406,'__ci_last_regenerate|i:1536758135;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536728133\";last_check|i:1536729695;'),('h7lleafba0v7sjksl7ao5tthdenmnjqv','192.168.1.149',1536758647,'__ci_last_regenerate|i:1536758487;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536728133\";last_check|i:1536729695;success_msg|s:37:\"Device inventory successfully updated\";__ci_vars|a:1:{s:11:\"success_msg\";s:3:\"old\";}'),('5ucg5g52rgqrnmussod14olk5edue6nd','::1',1536758795,'__ci_last_regenerate|i:1536758651;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536743267\";last_check|i:1536745426;'),('vsf0sn5f92p8mu1p246sk475trgds6v1','192.168.1.149',1536758969,'__ci_last_regenerate|i:1536758806;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536728133\";last_check|i:1536729695;success_msg|s:37:\"Device inventory successfully updated\";__ci_vars|a:1:{s:11:\"success_msg\";s:3:\"old\";}'),('1d86cq91vtii7g3hdkipkjlq2i4l2tfh','192.168.1.149',1536759431,'__ci_last_regenerate|i:1536759131;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536728133\";last_check|i:1536729695;'),('j8i3397elkoj2adk1lg41jlfn9jm449l','192.168.1.149',1536759534,'__ci_last_regenerate|i:1536759454;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536728133\";last_check|i:1536729695;'),('r12t6sj3rvkujoo2e1ef8na714106jkp','::1',1536759679,'__ci_last_regenerate|i:1536759538;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536743267\";last_check|i:1536745426;'),('9vvovq199pcl3ms3p873deelu59j4pnc','::1',1536759794,'__ci_last_regenerate|i:1536759794;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536733042\";last_check|i:1536739735;'),('ok336cfpqmthhafgh4spnq5n73bbd4vb','::1',1536760097,'__ci_last_regenerate|i:1536759887;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536743267\";last_check|i:1536745426;'),('buensjfbfk18ckt1td01ou0j3nsat6b9','::1',1536760384,'__ci_last_regenerate|i:1536760302;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536743267\";last_check|i:1536745426;'),('asot722jcbt3mqg19na8lnjc0mpc4ud4','192.168.1.149',1536760679,'__ci_last_regenerate|i:1536760388;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536728133\";last_check|i:1536729695;'),('2cfedjr6pu3eung0rhjfm1nhk8qcha4s','::1',1536760520,'__ci_last_regenerate|i:1536760478;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536733042\";last_check|i:1536739735;asset_id|i:63;'),('4c89u356485k845rtl9bg48kj4017aph','192.168.1.149',1536760902,'__ci_last_regenerate|i:1536760689;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536728133\";last_check|i:1536729695;error_msg|s:33:\"Device inventory already existed!\";__ci_vars|a:1:{s:9:\"error_msg\";s:3:\"new\";}'),('q5nnaktbgs34sfo0bptfo9dkd55ouk0h','::1',1536761008,'__ci_last_regenerate|i:1536760752;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536743267\";last_check|i:1536745426;'),('4fkpup7djpp55eh81a3tsklvfp2ij1ud','::1',1536761085,'__ci_last_regenerate|i:1536760827;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536733042\";last_check|i:1536739735;asset_id|i:63;'),('m375bhhq5cibd8ik6vorrs230cd6ievm','192.168.1.149',1536761160,'__ci_last_regenerate|i:1536761062;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536728133\";last_check|i:1536729695;'),('24krf8v9s29tpnia14rp09fnocnccfen','::1',1536761213,'__ci_last_regenerate|i:1536761110;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536743267\";last_check|i:1536745426;'),('lb6obc0rt17kiuejuuh10tepbnlff932','192.168.1.149',1536761578,'__ci_last_regenerate|i:1536761468;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536728133\";last_check|i:1536729695;success_msg|s:37:\"Device inventory successfully updated\";__ci_vars|a:1:{s:11:\"success_msg\";s:3:\"old\";}'),('6rmcksb18vbljmu9id0se87fhciifghf','::1',1536761607,'__ci_last_regenerate|i:1536761536;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536733042\";last_check|i:1536739735;asset_id|i:63;'),('oun141fikcouegi0prg61rbsc1m55tj8','192.168.1.149',1536762082,'__ci_last_regenerate|i:1536761797;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536728133\";last_check|i:1536729695;error_msg|s:33:\"Device inventory already existed!\";__ci_vars|a:1:{s:9:\"error_msg\";s:3:\"new\";}'),('af97vq5gs2af0qt53mo1omgfjp18hfre','::1',1536762305,'__ci_last_regenerate|i:1536762042;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536743267\";last_check|i:1536745426;'),('hj5lgqjgmff1fnfbq4coi79t34shee4h','192.168.1.149',1536762414,'__ci_last_regenerate|i:1536762107;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536728133\";last_check|i:1536729695;'),('9bo40lff04o7135qgab0pbjkhco4ok8h','::1',1536762663,'__ci_last_regenerate|i:1536762387;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536743267\";last_check|i:1536745426;'),('i9lkh39r7q48cgbgc924cujjk4q04gbu','192.168.1.149',1536762960,'__ci_last_regenerate|i:1536762731;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536728133\";last_check|i:1536729695;success_msg|s:37:\"Device inventory successfully deleted\";__ci_vars|a:1:{s:11:\"success_msg\";s:3:\"old\";}'),('hsahc6er2rqre8kq80kv42mv3m1h6vb5','192.168.1.149',1536763254,'__ci_last_regenerate|i:1536763115;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536728133\";last_check|i:1536729695;'),('54tvj8k15r0bm4ej6bjr9mtfqlkeillc','::1',1536763541,'__ci_last_regenerate|i:1536763407;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536733042\";last_check|i:1536739735;asset_id|i:63;'),('llte4b5o3d91htnoig8fcs7457kd0gp2','::1',1536764106,'__ci_last_regenerate|i:1536763860;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536743267\";last_check|i:1536745426;'),('sc03eea0ak47kogamc7383o1idr3arju','::1',1536764081,'__ci_last_regenerate|i:1536764003;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536733042\";last_check|i:1536739735;asset_id|i:63;'),('c1evlre81ihc3diqh41qt5tpehnfjiee','192.168.1.149',1536764344,'__ci_last_regenerate|i:1536764055;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536728133\";last_check|i:1536729695;'),('pg3rrtqd4rbfmpbcjfdon4mr24nh2522','::1',1536764362,'__ci_last_regenerate|i:1536764254;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536743267\";last_check|i:1536745426;'),('tf89fb6qc8u9tmjagmgs6n7l815tn30g','::1',1536764542,'__ci_last_regenerate|i:1536764378;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536733042\";last_check|i:1536739735;asset_id|i:63;'),('e5elttkrl0qfpsopgruja0pbg82cq0bo','192.168.1.149',1536764580,'__ci_last_regenerate|i:1536764379;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536728133\";last_check|i:1536729695;'),('tsduqb6vimnsulq7etvor8676302csop','192.168.1.149',1536764764,'__ci_last_regenerate|i:1536764703;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536728133\";last_check|i:1536729695;error_msg|s:29:\"Device asset already existed!\";__ci_vars|a:1:{s:9:\"error_msg\";s:3:\"new\";}'),('pc2enqg5q37o9njiaaubj2mmemr3bbh4','::1',1536765010,'__ci_last_regenerate|i:1536765003;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536733042\";last_check|i:1536739735;asset_id|i:63;'),('jd06rrhue5jf1036uvtobbq74opsja6d','192.168.1.149',1536765358,'__ci_last_regenerate|i:1536765154;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536728133\";last_check|i:1536729695;'),('se8msuht0ubne7o4f114s5evejgmt15u','::1',1536765678,'__ci_last_regenerate|i:1536765379;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536733042\";last_check|i:1536739735;asset_id|i:63;'),('tjka7n5hh85hfeb9tjngkgdlrob7i05e','192.168.1.149',1536765801,'__ci_last_regenerate|i:1536765505;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536728133\";last_check|i:1536729695;'),('9qlukfvhhup74n84chsbo5kginc2nc9r','::1',1536765880,'__ci_last_regenerate|i:1536765722;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536733042\";last_check|i:1536739735;asset_id|i:63;'),('n9j7kps9fbd57hfu5q9tnalj68oo62i1','192.168.1.149',1536766112,'__ci_last_regenerate|i:1536765814;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536728133\";last_check|i:1536729695;error_msg|s:29:\"Device asset already existed!\";__ci_vars|a:1:{s:9:\"error_msg\";s:3:\"new\";}'),('ipoaf5ht44jdtjp5tm9bl144oq3i1o2l','::1',1536765912,'__ci_last_regenerate|i:1536765912;'),('gjr5p9g7nennjg426k6b6th82oca06nf','::1',1536765937,'__ci_last_regenerate|i:1536765914;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536745426\";last_check|i:1536765928;__ci_vars|a:2:{s:7:\"csrfkey\";s:3:\"old\";s:9:\"csrfvalue\";s:3:\"old\";}csrfkey|s:8:\"7tWReQdL\";csrfvalue|s:20:\"YAOdmzyX6ksHGVU5Nanc\";'),('7t3d6elkfeog3a4ffr22toj64ssm028v','192.168.1.149',1536766384,'__ci_last_regenerate|i:1536766118;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536728133\";last_check|i:1536729695;'),('ef6cvga9ccjfnn8tqipkitekol1i78nc','::1',1536766293,'__ci_last_regenerate|i:1536766288;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536745426\";last_check|i:1536765928;'),('slrm7vc2o6fp0rj4aq8ucoi94j544slb','192.168.1.149',1536766919,'__ci_last_regenerate|i:1536766644;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536728133\";last_check|i:1536729695;'),('j6uan0c1gqctp3fsk9h9jik4l06gmhda','192.168.1.149',1536767264,'__ci_last_regenerate|i:1536766976;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536728133\";last_check|i:1536729695;'),('l1e834312b0g46i34hcfj1rm9puntfvg','192.168.1.149',1536767590,'__ci_last_regenerate|i:1536767344;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536728133\";last_check|i:1536729695;'),('ieefa5i5sa3oln192kddvhhi60jelvma','192.168.1.149',1536767958,'__ci_last_regenerate|i:1536767675;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536728133\";last_check|i:1536729695;'),('l9uvu23r88qn5h65qmiskiji50emre27','192.168.1.149',1536768253,'__ci_last_regenerate|i:1536768036;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536728133\";last_check|i:1536729695;'),('mp2t3fd5j8rriq76rh2ljokt5ajqag5b','192.168.1.149',1536768623,'__ci_last_regenerate|i:1536768365;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536728133\";last_check|i:1536729695;'),('g73gpatg2r9jvqfb0q7orlrgsh9de25g','192.168.1.149',1536769922,'__ci_last_regenerate|i:1536769621;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536728133\";last_check|i:1536729695;msg|s:22:\"Assets failed to Updat\";__ci_vars|a:1:{s:3:\"msg\";s:3:\"old\";}'),('icgjleql4cf8fga31n3cbgnklvdja0k5','192.168.1.149',1536895803,'__ci_last_regenerate|i:1536895799;'),('qr73jf3noet99iq25fk42cmbdsutoud1','192.168.1.149',1536895818,'__ci_last_regenerate|i:1536895802;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536765928\";last_check|i:1536895808;__ci_vars|a:2:{s:7:\"csrfkey\";s:3:\"old\";s:9:\"csrfvalue\";s:3:\"old\";}csrfkey|s:8:\"HYBryWRm\";csrfvalue|s:20:\"1xI6wkv4TR7FbytCguWB\";'),('s5luqbliu0sdfhoo912hgn0rjh5ocjsn','192.168.1.149',1536896306,'__ci_last_regenerate|i:1536896161;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;message|s:29:\"<p>Logged In Successfully</p>\";__ci_vars|a:3:{s:7:\"message\";s:3:\"old\";s:7:\"csrfkey\";s:3:\"new\";s:9:\"csrfvalue\";s:3:\"new\";}csrfkey|s:8:\"sXRWOk6v\";csrfvalue|s:20:\"dOUY0i4EbqjT79Vwy3WG\";'),('k5rtc90k31aheuc0nv6n8j76hevva77s','192.168.1.149',1536897095,'__ci_last_regenerate|i:1536897090;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;'),('p1nff9pmb9t2vu4os7m6rm74h1chn3mr','::1',1536897116,'__ci_last_regenerate|i:1536897112;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536896305\";last_check|i:1536897116;message|s:29:\"<p>Logged In Successfully</p>\";__ci_vars|a:3:{s:7:\"message\";s:3:\"old\";s:7:\"csrfkey\";s:3:\"new\";s:9:\"csrfvalue\";s:3:\"new\";}csrfkey|s:8:\"BQKW0J4R\";csrfvalue|s:20:\"paUwru4D08kbtQJioeNW\";'),('v8qfqo3gqrgcuu0hmp5af5o415s3u5p8','::1',1536897534,'__ci_last_regenerate|i:1536897434;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536896305\";last_check|i:1536897116;asset_id|i:63;'),('qs46s2qtfelnstrk47j46i3pej6v07iu','192.168.1.149',1536897520,'__ci_last_regenerate|i:1536897437;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;'),('00d4br7oglkdfhtjqd95jsm7bcaesump','::1',1536898035,'__ci_last_regenerate|i:1536897747;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536896305\";last_check|i:1536897116;asset_id|i:63;'),('8349a9065s3cgfd6sv7nihp9i318urob','192.168.1.149',1536897827,'__ci_last_regenerate|i:1536897804;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;asset_id|i:63;'),('62kc5n1tr69602od0ka07rh6t97chksv','::1',1536898186,'__ci_last_regenerate|i:1536898089;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536896305\";last_check|i:1536897116;asset_id|i:63;'),('l8o1p1vrqdji6q34nlu71evim2o10rd1','192.168.1.149',1536898416,'__ci_last_regenerate|i:1536898128;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;asset_id|i:63;'),('ovlfn228tt0u2lp2j3pqg3vbs4904rs0','192.168.1.149',1536898666,'__ci_last_regenerate|i:1536898530;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;asset_id|i:63;'),('qso4u6capumsje5msnkgs74jo4djcmm0','192.168.1.149',1536898837,'__ci_last_regenerate|i:1536898834;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;asset_id|i:63;'),('odh80r5n7i1g9i2b8h2ov8q2oec3g3ji','192.168.1.149',1536899259,'__ci_last_regenerate|i:1536899258;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;asset_id|i:63;'),('pdl33qtsre50i351ro5c476fcvt3bpl3','192.168.1.149',1536900211,'__ci_last_regenerate|i:1536900108;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;asset_id|i:63;'),('n00cchoa3q67s3fdokat1ih2e5mpj011','192.168.1.149',1536900730,'__ci_last_regenerate|i:1536900438;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;asset_id|i:63;'),('fncm6ddm07ulth8539tv88orhcdtaqih','192.168.1.149',1536900970,'__ci_last_regenerate|i:1536900749;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;asset_id|i:63;'),('rourkii71jo0bk2v297hceodal7iahrc','192.168.1.149',1536901054,'__ci_last_regenerate|i:1536901054;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;asset_id|i:63;'),('ho37um8kgm3qhafrv1jd98l27mcf86sj','192.168.1.149',1536902078,'__ci_last_regenerate|i:1536902078;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;asset_id|i:63;'),('g6icn7e78lle9nl90mdqt9nkjnk6vgrl','::1',1536902814,'__ci_last_regenerate|i:1536902762;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536897116\";last_check|i:1536902813;message|s:29:\"<p>Logged In Successfully</p>\";__ci_vars|a:3:{s:7:\"message\";s:3:\"old\";s:7:\"csrfkey\";s:3:\"new\";s:9:\"csrfvalue\";s:3:\"new\";}csrfkey|s:8:\"y6Ms2E5B\";csrfvalue|s:20:\"umrVvR8TfesSHpj2FJ16\";'),('bn5de15fchj11g96g61o7k3ddenttu4i','::1',1536903426,'__ci_last_regenerate|i:1536903213;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536897116\";last_check|i:1536902813;'),('ktq5vko9nmfts8m5pmhj7o1h7r9d6lh8','::1',1536903217,'__ci_last_regenerate|i:1536903217;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536896305\";last_check|i:1536897116;asset_id|i:63;'),('809k54ccug72l98dorkeoj7hf7ncp374','192.168.1.149',1536903562,'__ci_last_regenerate|i:1536903523;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;asset_id|i:63;'),('7m7i9ao4lsvhcb6b04dgjdrg7opdg9ij','::1',1536903595,'__ci_last_regenerate|i:1536903563;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536897116\";last_check|i:1536902813;'),('c8dtf81kbjbdv4jptc9pqjpcb3d8l4n7','::1',1536903920,'__ci_last_regenerate|i:1536903920;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536897116\";last_check|i:1536902813;'),('e9bqlmrkf16728b3deu73eu1o0p9524g','::1',1536904642,'__ci_last_regenerate|i:1536904619;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536897116\";last_check|i:1536902813;'),('e11s9fmhuoe6pgqc5f7jra5gf7fgh1d8','::1',1536905314,'__ci_last_regenerate|i:1536905313;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536897116\";last_check|i:1536902813;csrfkey|s:8:\"TnXH7SzQ\";__ci_vars|a:2:{s:7:\"csrfkey\";s:3:\"new\";s:9:\"csrfvalue\";s:3:\"new\";}csrfvalue|s:20:\"yrd7p0hljFZN1AKM8LP5\";'),('hal7jdrn2onarqbku9qnol21o4hh83rv','::1',1536906364,'__ci_last_regenerate|i:1536906154;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536896305\";last_check|i:1536897116;asset_id|i:63;'),('08srai78hlm5d3qnk8ogq5b2f12v0e6j','::1',1536906388,'__ci_last_regenerate|i:1536906336;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536897116\";last_check|i:1536902813;'),('2v96b26ee07jd8pqs12oddr5nle4eb3o','::1',1536906938,'__ci_last_regenerate|i:1536906574;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536896305\";last_check|i:1536897116;asset_id|i:63;'),('s6rakfhhvlj3rh8ci4t39tpbf1ipup88','::1',1536906946,'__ci_last_regenerate|i:1536906945;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536896305\";last_check|i:1536897116;asset_id|i:63;'),('395kendu8usim19g3271q5ccnqhurk89','192.168.1.149',1536907261,'__ci_last_regenerate|i:1536907150;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;asset_id|i:63;'),('c7k9rpp1rj881030ee4hbudrnm0s3lh5','::1',1536907570,'__ci_last_regenerate|i:1536907355;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536897116\";last_check|i:1536902813;'),('hqvn78n1nrc1uhpi2hljtjardm6fujg7','::1',1536907774,'__ci_last_regenerate|i:1536907471;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536896305\";last_check|i:1536897116;asset_id|i:63;'),('6c695vslcbs1flkb2u5u4gc9m8754ff0','192.168.1.149',1536907751,'__ci_last_regenerate|i:1536907650;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;asset_id|i:63;'),('sir7r0jjn109kjbog712rb8ri56s5q20','::1',1536907940,'__ci_last_regenerate|i:1536907737;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536897116\";last_check|i:1536902813;'),('lt4ghv3oab284a7t6hei17hr5heuvitn','::1',1536908065,'__ci_last_regenerate|i:1536907794;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536896305\";last_check|i:1536897116;asset_id|i:63;'),('1smbhqkcm8o57mtfuhfj0kr63en4h8g4','192.168.1.149',1536908193,'__ci_last_regenerate|i:1536908044;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;asset_id|i:63;'),('mh9jfn3m9ou6abpglhreumfd598kbjb7','::1',1536908401,'__ci_last_regenerate|i:1536908111;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536896305\";last_check|i:1536897116;asset_id|i:63;'),('uf4dgsua6p94sdli40jvsvl561vssv08','::1',1536908478,'__ci_last_regenerate|i:1536908478;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536896305\";last_check|i:1536897116;asset_id|i:63;'),('2me14v69jqr2p7ie8ppele76k4atfbm4','::1',1536908674,'__ci_last_regenerate|i:1536908664;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536897116\";last_check|i:1536902813;'),('7plbl5jtjmh5mdm8ic6u7o48n5a95igl','192.168.1.149',1536908937,'__ci_last_regenerate|i:1536908668;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;asset_id|i:63;error_msg|s:28:\"Alarm trigger alredy existed\";__ci_vars|a:1:{s:9:\"error_msg\";s:3:\"new\";}'),('iblocarkd80fk82kr5iumgn8thag4hi6','192.168.1.149',1536909259,'__ci_last_regenerate|i:1536908975;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;asset_id|i:63;error_msg|s:28:\"Alarm trigger alredy existed\";__ci_vars|a:1:{s:9:\"error_msg\";s:3:\"new\";}'),('0m5raoiucbl9qd8ubhr1kvrgtval78kg','192.168.1.149',1536909576,'__ci_last_regenerate|i:1536909319;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;asset_id|i:63;error_msg|s:28:\"Alarm trigger alredy existed\";__ci_vars|a:1:{s:9:\"error_msg\";s:3:\"new\";}'),('d08mahivnpkuke7bp91vgl6dn8boa38e','::1',1536909566,'__ci_last_regenerate|i:1536909328;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536897116\";last_check|i:1536902813;success_msg|s:31:\"Assets rules Added Successfully\";__ci_vars|a:1:{s:11:\"success_msg\";s:3:\"old\";}'),('ljleh50qf6q1r265h0d92keuqur0hsi8','::1',1536910101,'__ci_last_regenerate|i:1536909806;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536897116\";last_check|i:1536902813;success_msg|s:31:\"Assets rules Added Successfully\";__ci_vars|a:1:{s:11:\"success_msg\";s:3:\"new\";}'),('87ud9fig8chcnjbkqcmckbb7fi6n192c','192.168.1.149',1536910456,'__ci_last_regenerate|i:1536910218;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;asset_id|i:63;'),('9m9obgtoe6b845att0rt112380irg4cg','192.168.1.149',1536910698,'__ci_last_regenerate|i:1536910526;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;asset_id|i:63;'),('4l8a34lepuqo2610ous3o1cgfc93p873','192.168.1.149',1536910863,'__ci_last_regenerate|i:1536910862;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;asset_id|i:63;'),('sd7j6ahr24a43tr2mlirjc7bfpa4uf9b','192.168.1.149',1536911150,'__ci_last_regenerate|i:1536910863;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;asset_id|i:63;'),('v3o974d865hah9nc675v5nsof922ah37','192.168.1.149',1536911453,'__ci_last_regenerate|i:1536911261;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;asset_id|i:63;'),('p3c4k82560jio6vqfm7hs8lfi1hs34vn','::1',1536911274,'__ci_last_regenerate|i:1536911272;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536896305\";last_check|i:1536897116;asset_id|i:63;'),('q3rkr6t2h2qpauj8btb0f3cdejcpfjok','::1',1536911860,'__ci_last_regenerate|i:1536911580;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536896305\";last_check|i:1536897116;asset_id|i:63;'),('ncj2liokfisa1oe05fjiv57vscoogm8r','192.168.1.149',1536911722,'__ci_last_regenerate|i:1536911650;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;asset_id|i:63;'),('agakrnb223bdi7hcbqeu3lmtfho5s1g5','::1',1536911901,'__ci_last_regenerate|i:1536911717;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536897116\";last_check|i:1536902813;'),('i8lddhee4e0ngrpl8jpooo090f8fru43','::1',1536912171,'__ci_last_regenerate|i:1536911951;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536896305\";last_check|i:1536897116;asset_id|i:63;'),('tou69hnp8lkhmvth58vh9msbsvacfcoa','192.168.1.149',1536912078,'__ci_last_regenerate|i:1536911959;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;asset_id|i:63;'),('nl8f5afd027fhsv6dn2os0cv61r29feh','::1',1536912275,'__ci_last_regenerate|i:1536912274;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536896305\";last_check|i:1536897116;asset_id|i:63;'),('3avvcca0vsqu1kpguh52latd0ble8ugq','192.168.1.149',1536912707,'__ci_last_regenerate|i:1536912440;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;asset_id|i:63;'),('dhogtdujar1gch65fs5t0p9skjplpimg','192.168.1.149',1536913009,'__ci_last_regenerate|i:1536912814;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;asset_id|i:63;'),('s9u9a9r0jv4b82rv58h2tj9gaor79ddi','192.168.1.149',1536913459,'__ci_last_regenerate|i:1536913196;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;asset_id|i:63;'),('ehcplit2h4s6ahtstm0b7klbid8mmc25','192.168.1.149',1536913770,'__ci_last_regenerate|i:1536913506;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;asset_id|i:63;__ci_vars|a:1:{s:11:\"success_msg\";s:3:\"old\";}success_msg|s:34:\"Alarm trigger successfully updated\";'),('0o35nsis5sk0dag4hpj3fp42p1sgl5bv','192.168.1.149',1536914003,'__ci_last_regenerate|i:1536913842;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;asset_id|i:63;success_msg|s:34:\"Alarm trigger successfully deleted\";__ci_vars|a:1:{s:11:\"success_msg\";s:3:\"old\";}'),('qvpglfhrm8ipaj6bg6kj0kdv52fg991s','192.168.1.149',1536914916,'__ci_last_regenerate|i:1536914636;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;asset_id|i:63;'),('fdtl2lnnp4hgq1trmmpk86atnq5lg9mf','192.168.1.149',1536916339,'__ci_last_regenerate|i:1536916049;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;asset_id|i:63;'),('5f3odlkior02qbt9kgflbrbc11iin0hc','192.168.1.149',1536916650,'__ci_last_regenerate|i:1536916369;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;asset_id|i:63;error_msg|s:28:\"Alarm trigger alredy existed\";__ci_vars|a:1:{s:9:\"error_msg\";s:3:\"new\";}'),('ogoc7js2jf4j23vl9gmve107446bono9','::1',1536916798,'__ci_last_regenerate|i:1536916519;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536897116\";last_check|i:1536902813;'),('tf5k7f63qpts19l613laokfepo37kmv0','192.168.1.149',1536917096,'__ci_last_regenerate|i:1536916796;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;asset_id|i:63;'),('scvk6jg95ms3l6lg96l2al8mp2i32s0l','::1',1536917208,'__ci_last_regenerate|i:1536916915;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536897116\";last_check|i:1536902813;'),('bte3hjpmhr87v5ls3eoaqvh5e2r5aq2m','192.168.1.149',1536917310,'__ci_last_regenerate|i:1536917116;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;asset_id|i:63;'),('683g4atfnbu6vhvmc79af0jqpnf7clpl','::1',1536917567,'__ci_last_regenerate|i:1536917271;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536897116\";last_check|i:1536902813;'),('d4s2jgpu5co6puv7u64nhtj3nna9fs7i','::1',1536917578,'__ci_last_regenerate|i:1536917388;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536896305\";last_check|i:1536897116;asset_id|i:63;paramrange_post|a:7:{s:7:\"edit_id\";s:1:\"1\";s:9:\"parameter\";s:1:\"2\";s:9:\"min_value\";s:1:\"1\";s:9:\"max_value\";s:2:\"15\";s:14:\"scaling_factor\";s:1:\"1\";s:3:\"uom\";s:1:\"8\";s:13:\"bits_per_sign\";s:4:\"16 s\";}error_msg|s:29:\"Parameter range already exist\";__ci_vars|a:1:{s:9:\"error_msg\";s:3:\"old\";}'),('o3hkcd44mq74jg3utfcptf4linpja8v4','192.168.1.149',1536917760,'__ci_last_regenerate|i:1536917474;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;asset_id|i:63;error_msg|s:28:\"Alarm trigger alredy existed\";__ci_vars|a:1:{s:9:\"error_msg\";s:3:\"old\";}'),('7m326gqjk6qqul9aua8b5vo0ot2p3h6v','::1',1536917853,'__ci_last_regenerate|i:1536917671;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536897116\";last_check|i:1536902813;'),('1b84jsctiu2j7bqoid4d28g106fvk0d6','::1',1536918015,'__ci_last_regenerate|i:1536917718;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536896305\";last_check|i:1536897116;asset_id|i:63;'),('i04ckmfp4cqrpmqvfsgbdvs3j4u5c6nr','::1',1536918260,'__ci_last_regenerate|i:1536917974;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536897116\";last_check|i:1536902813;'),('i7kdko7g8tqaedt7bf91m1i18irrima6','::1',1536918245,'__ci_last_regenerate|i:1536918019;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536896305\";last_check|i:1536897116;asset_id|i:63;'),('tdpioa6jqbnbt39galnq9viml89lfv0h','::1',1536918294,'__ci_last_regenerate|i:1536918294;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536897116\";last_check|i:1536902813;'),('fe9coltlaomdebk60j0tgt8ocav0gtbq','::1',1536918717,'__ci_last_regenerate|i:1536918717;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536897116\";last_check|i:1536902813;'),('jmdll075s8itnt1gcj34ed79tpsivjh0','::1',1536919007,'__ci_last_regenerate|i:1536918824;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536896305\";last_check|i:1536897116;asset_id|i:63;'),('ntiuaa3dadchcca41eimgs2jhh625870','::1',1536919355,'__ci_last_regenerate|i:1536919233;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536896305\";last_check|i:1536897116;asset_id|i:63;'),('tdrl7cjqf25qh5suoqekndrom34vbe39','192.168.1.149',1536919518,'__ci_last_regenerate|i:1536919434;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;asset_id|i:63;'),('daechl3i37tp3j335ungrtoq4md1li9o','::1',1536919698,'__ci_last_regenerate|i:1536919537;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536897116\";last_check|i:1536902813;'),('0fm8mke09j9ao2mdkss3r5st1d2nk5mc','::1',1536919744,'__ci_last_regenerate|i:1536919552;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536896305\";last_check|i:1536897116;asset_id|i:63;'),('315veo26p24cdt9ma4j6cg7ro18p99f4','::1',1536920016,'__ci_last_regenerate|i:1536919856;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536896305\";last_check|i:1536897116;asset_id|i:63;'),('cns84570kv4achar2ror584863fqiiua','::1',1536920350,'__ci_last_regenerate|i:1536920090;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536897116\";last_check|i:1536902813;'),('9ki36ot78g63bop2pata07blefrg3sfd','::1',1536920447,'__ci_last_regenerate|i:1536920162;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536896305\";last_check|i:1536897116;asset_id|i:63;'),('3vss5nqbv0th8a7q5rh9reqj3qjuumfb','::1',1536920453,'__ci_last_regenerate|i:1536920453;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536897116\";last_check|i:1536902813;'),('ftrvdrhvd42np6k60t2lv4jd32jmrush','::1',1536920559,'__ci_last_regenerate|i:1536920519;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536896305\";last_check|i:1536897116;asset_id|i:63;'),('pjokvnqsf9sjmrunnl3f1tn63h3ht4ss','::1',1536921025,'__ci_last_regenerate|i:1536920951;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536897116\";last_check|i:1536902813;'),('eug4gr5oejp24hf41b5lcm8rmij81vsb','::1',1536921909,'__ci_last_regenerate|i:1536921900;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536897116\";last_check|i:1536902813;'),('1g8koig04c9pccbb52dgrgc2g9lffevo','::1',1536922009,'__ci_last_regenerate|i:1536922008;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536896305\";last_check|i:1536897116;asset_id|i:63;'),('29ldt6bkh6elvv0ihv324hajkfkrkp9a','::1',1536922578,'__ci_last_regenerate|i:1536922419;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536897116\";last_check|i:1536902813;'),('ouc5vvs7kfsgv0n2v93j30bkfb5knv69','::1',1536922726,'__ci_last_regenerate|i:1536922427;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536896305\";last_check|i:1536897116;asset_id|i:63;'),('bfa27ghkn37bk1jaiaj1op1gsu7a2fss','::1',1536923013,'__ci_last_regenerate|i:1536922759;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536896305\";last_check|i:1536897116;asset_id|i:63;'),('o8pnv0evqqkuqjn5204k73qr1c5qhc67','::1',1536922845,'__ci_last_regenerate|i:1536922795;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536897116\";last_check|i:1536902813;'),('7mq7l8m0ubdk30oijufjbvbqja3rk9rr','::1',1536923966,'__ci_last_regenerate|i:1536923816;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536896305\";last_check|i:1536897116;asset_id|i:63;'),('4s062qpodao70i6uneftkmaaf5hon59u','192.168.1.149',1536924179,'__ci_last_regenerate|i:1536923929;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;asset_id|i:63;success_msg|s:32:\"Alarm trigger successfully added\";__ci_vars|a:1:{s:11:\"success_msg\";s:3:\"old\";}'),('h0gii093vv397ru2fn0bagfqhquhep2q','::1',1536924095,'__ci_last_regenerate|i:1536924020;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536897116\";last_check|i:1536902813;'),('0564ddsvetor500uk47heblhde1kni65','192.168.1.149',1536924262,'__ci_last_regenerate|i:1536924261;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;asset_id|i:63;'),('4dkeao7cou1ll3saag9eimfht87htfiu','::1',1536924474,'__ci_last_regenerate|i:1536924434;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536897116\";last_check|i:1536902813;success_msg|s:31:\"Assets rules Added Successfully\";__ci_vars|a:1:{s:11:\"success_msg\";s:3:\"new\";}'),('9n40cmuea57mjuc2irrq2b0lj1ok27u5','::1',1536924508,'__ci_last_regenerate|i:1536924495;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536896305\";last_check|i:1536897116;asset_id|i:63;'),('00l1u3cr4o6cnl5dl2dbukd0l385f5rm','::1',1536924885,'__ci_last_regenerate|i:1536924802;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536896305\";last_check|i:1536897116;asset_id|i:63;success_msg|s:34:\"Parameter range added successfully\";__ci_vars|a:1:{s:11:\"success_msg\";s:3:\"old\";}'),('rmvnjsdhm0lc1befdtpm6de9a99stfa1','::1',1536925424,'__ci_last_regenerate|i:1536925152;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536897116\";last_check|i:1536902813;'),('uks6dmpte65ih1k9ik902a0tpq7ktjdn','::1',1536926069,'__ci_last_regenerate|i:1536925808;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536897116\";last_check|i:1536902813;'),('r3h32ac27m75a7i216v7jo5aq73c4blo','192.168.1.149',1536926199,'__ci_last_regenerate|i:1536926011;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;asset_id|i:63;'),('diinpctrkvln1lerkbkht7rhb59t67of','::1',1536926428,'__ci_last_regenerate|i:1536926151;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536897116\";last_check|i:1536902813;success_msg|s:39:\"customer information update sucessfully\";__ci_vars|a:1:{s:11:\"success_msg\";s:3:\"new\";}'),('6vol0cq3q4bb3vcp4h91kb1sh2chldrh','::1',1536926519,'__ci_last_regenerate|i:1536926456;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536897116\";last_check|i:1536902813;'),('ja71hp58i6pu2m34msseb8rqr69oqvuv','192.168.1.149',1536926879,'__ci_last_regenerate|i:1536926834;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;asset_id|i:63;'),('1ra99mt070vp7nuhnt532gnqhckf02pb','::1',1536927336,'__ci_last_regenerate|i:1536927054;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536897116\";last_check|i:1536902813;'),('4pfv4srd8qrd3r6p6bmgsva0ts6duaum','::1',1536927076,'__ci_last_regenerate|i:1536927076;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536896305\";last_check|i:1536897116;asset_id|i:63;'),('akg0pnk4f4hmjum86kv752gu8iqv6uv8','192.168.1.149',1536927485,'__ci_last_regenerate|i:1536927261;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;asset_id|i:63;'),('6sa9qj997els4m9d7sd2jv13sq0kv3ph','::1',1536927472,'__ci_last_regenerate|i:1536927472;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536897116\";last_check|i:1536902813;'),('req01c1r292rp8164k0421aj9oc1bu1t','192.168.1.149',1536927856,'__ci_last_regenerate|i:1536927648;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;asset_id|i:63;'),('1t8bam4vsfqgtkil18nndanjovfqv2hb','192.168.1.149',1536928508,'__ci_last_regenerate|i:1536928236;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;asset_id|i:63;'),('ndi3ftq03daslapnce9o8ifc3tor8s0e','192.168.1.149',1536928867,'__ci_last_regenerate|i:1536928602;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;asset_id|i:63;'),('5nudlhc14j1mqjjen6gnjj16c1lbrg8c','::1',1536928805,'__ci_last_regenerate|i:1536928631;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536896305\";last_check|i:1536897116;asset_id|i:63;'),('pvaauth4pivko5vjsn2ukocv82cov73k','192.168.1.149',1536928910,'__ci_last_regenerate|i:1536928906;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;asset_id|i:63;'),('dj3fb5cvdinqi9l1nk0p75hggfju9lls','::1',1536928967,'__ci_last_regenerate|i:1536928966;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536896305\";last_check|i:1536897116;asset_id|i:63;success_msg|s:31:\"Assets rules Added Successfully\";__ci_vars|a:1:{s:11:\"success_msg\";s:3:\"old\";}'),('cicfv8mvju1498frqg0qnmsr8ckahpjo','192.168.1.149',1536929654,'__ci_last_regenerate|i:1536929455;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;asset_id|i:63;'),('qvnm44kf3ogqjs1r4rphcsk102gvfie8','192.168.1.149',1536930043,'__ci_last_regenerate|i:1536929804;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;asset_id|i:63;'),('lobmq5p0t61kr4e6vsvt98qa181vffv8','::1',1536929914,'__ci_last_regenerate|i:1536929914;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536896305\";last_check|i:1536897116;asset_id|i:63;'),('99egrikmc45t83hn0sk9ev7ccilnqbi3','::1',1536929915,'__ci_last_regenerate|i:1536929914;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536896305\";last_check|i:1536897116;asset_id|i:63;'),('9cql5okfq98n6qld296nj24ket04hcnk','192.168.1.149',1536931999,'__ci_last_regenerate|i:1536931780;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;asset_id|i:63;'),('0hbvkr5rcqood6si96jsuitkfuo5uoqc','::1',1536932054,'__ci_last_regenerate|i:1536931979;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536897116\";last_check|i:1536902813;'),('r22ora1okpmifveo4bnb47k740jd59kl','192.168.1.149',1536932505,'__ci_last_regenerate|i:1536932208;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;asset_id|i:63;'),('krc71m7rmbameipq90rri4laj1lpgeqm','192.168.1.149',1536932947,'__ci_last_regenerate|i:1536932663;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;asset_id|i:63;'),('cd5m77q8bohm97s2vv1hd5d2hobb61hc','::1',1536932990,'__ci_last_regenerate|i:1536932711;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536897116\";last_check|i:1536902813;'),('30u6uvn8oq9s71l5j2trme8clrq8mobd','::1',1536933271,'__ci_last_regenerate|i:1536933056;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536897116\";last_check|i:1536902813;'),('f0tuqi64m09h2r3fqbbrhbhsn6okoe08','192.168.1.149',1536933401,'__ci_last_regenerate|i:1536933168;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;asset_id|s:2:\"63\";'),('uv72isr0mo18304p22kfpvufhd2ut65e','::1',1536933761,'__ci_last_regenerate|i:1536933521;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536897116\";last_check|i:1536902813;'),('cn8c7me9a8792o0audsmi1u4odc2gnro','192.168.1.149',1536933847,'__ci_last_regenerate|i:1536933657;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;asset_id|s:2:\"63\";'),('u0c137nlar3jrf9irjter2di3hrlfjf0','::1',1536934188,'__ci_last_regenerate|i:1536933915;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536897116\";last_check|i:1536902813;'),('rtpprotnrjk8r3kj77dnp80i10p73hfr','192.168.1.149',1536934066,'__ci_last_regenerate|i:1536934041;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;asset_id|s:2:\"63\";'),('abil88g3fk25vs65prg83rtoj0ikm7ie','::1',1536934531,'__ci_last_regenerate|i:1536934261;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536897116\";last_check|i:1536902813;'),('50suqocsdejj4ehg5o7m2d0kvrhsj8m2','::1',1536934782,'__ci_last_regenerate|i:1536934564;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536897116\";last_check|i:1536902813;success_msg|s:31:\"Assets rules Added Successfully\";__ci_vars|a:1:{s:11:\"success_msg\";s:3:\"old\";}'),('9enlb65glrn6p815rj9clh3m25imr6m7','::1',1536934907,'__ci_last_regenerate|i:1536934887;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536897116\";last_check|i:1536902813;success_msg|s:31:\"Assets rules Added Successfully\";__ci_vars|a:1:{s:11:\"success_msg\";s:3:\"old\";}'),('56d4q3cbr0s0dfdguav468kmmvv56pin','::1',1536935763,'__ci_last_regenerate|i:1536935504;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536897116\";last_check|i:1536902813;success_msg|s:39:\"customer information update sucessfully\";__ci_vars|a:1:{s:11:\"success_msg\";s:3:\"new\";}'),('25kcr9qonc7dkesle5rlju5fu34ujqib','::1',1536936114,'__ci_last_regenerate|i:1536935885;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536897116\";last_check|i:1536902813;'),('h5rf108fff84vi1av8h725e5came1ifp','::1',1536936333,'__ci_last_regenerate|i:1536936197;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536897116\";last_check|i:1536902813;'),('8s7ur47nui5fas90h1ne3pm07nfinojl','192.168.1.149',1536936880,'__ci_last_regenerate|i:1536936712;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;asset_id|s:2:\"63\";'),('avhou9ldqisp8v6buvrhkh58dmsiamka','192.168.1.149',1536937284,'__ci_last_regenerate|i:1536937215;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;asset_id|s:2:\"63\";'),('7iqjvg37le0734d48j8ct3rpubh1o2e0','192.168.1.149',1536937751,'__ci_last_regenerate|i:1536937524;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;asset_id|s:2:\"63\";success_msg|s:32:\"Alarm trigger successfully added\";__ci_vars|a:1:{s:11:\"success_msg\";s:3:\"old\";}'),('3l4ob2a4nugob9v6tsebobd528r1hbmt','192.168.1.149',1536938180,'__ci_last_regenerate|i:1536937954;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;asset_id|s:2:\"63\";success_msg|s:33:\"Asset location successfully added\";__ci_vars|a:1:{s:11:\"success_msg\";s:3:\"old\";}'),('fm9p5q3tu6socsqovfls1ogmfnm74cn2','192.168.1.149',1536938653,'__ci_last_regenerate|i:1536938367;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;asset_id|s:2:\"63\";'),('9qm4hv8i942u0ojfhvf3cuoblhaacbom','192.168.1.149',1536938850,'__ci_last_regenerate|i:1536938736;identity|s:15:\"admin@admin.com\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1536895808\";last_check|i:1536896305;asset_id|s:2:\"63\";success_msg|s:33:\"Device asset successfully deleted\";__ci_vars|a:1:{s:11:\"success_msg\";s:3:\"old\";}');
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
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `device_asset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `device_id` int(11) NOT NULL,
  `asset_id` varchar(45) NOT NULL,
  `createdate` date DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `device_asset`
--

LOCK TABLES `device_asset` WRITE;
/*!40000 ALTER TABLE `device_asset` DISABLE KEYS */;
INSERT INTO `device_asset` VALUES (2,8,'dg0013','2018-09-10',1),(3,6,'6','2018-09-12',1),(4,5,'6','2018-09-12',1),(5,5,'6','2018-09-12',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `device_inventory`
--

LOCK TABLES `device_inventory` WRITE;
/*!40000 ALTER TABLE `device_inventory` DISABLE KEYS */;
INSERT INTO `device_inventory` VALUES (5,1,'dfg','dfg','dfg','dfg','dfg','dfg','dfg','dfg','dfg','fg','2018-09-07',1,1),(6,1,'dfg','dfg','dfg','dfg','dfg','dfg','dfg','dfg','','fg','2018-09-07',1,1),(7,1,'dfg','dfg','dfg','dfg','dfg','dfg','dfg','dfg','dfg','fg','2018-09-07',1,1),(13,1,'dfg','dfg','dfg','dfg','dfg','dfg','dfg','dfg','dfg','fg','2018-09-12',1,1),(14,1,'dfg','dfg','dfg','dfg','dfg','dfg','dfg','dfg','dfg','fg','2018-09-12',1,0);
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
  `isactive` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `device_sensor_mapping`
--

LOCK TABLES `device_sensor_mapping` WRITE;
/*!40000 ALTER TABLE `device_sensor_mapping` DISABLE KEYS */;
INSERT INTO `device_sensor_mapping` VALUES (3,10,'sn0012','2018-09-08',1,0),(4,10,'sn0012','2018-09-08',1,0),(5,5,'3','2018-09-12',1,0),(6,6,'3','2018-09-12',1,0),(7,10,'4','2018-09-12',1,0),(8,10,'3','2018-09-12',1,1),(9,10,'4','2018-09-12',1,1),(10,5,'4','2018-09-12',1,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parameter`
--

LOCK TABLES `parameter` WRITE;
/*!40000 ALTER TABLE `parameter` DISABLE KEYS */;
INSERT INTO `parameter` VALUES (1,'Oil pressure',9,'Engine oil presssure','2018-09-07',1,1),(2,'Oil temperature',9,'Engine oil temperature','2018-09-07',1,1),(3,'hghfhgdg',1,'ytytyttyfdhjyyg','2018-09-07',1,0),(4,'a',4,'aaaaaabbbbdddsfdsfdfsfdsfsdfdsfdsfsdb','2018-09-10',1,0),(5,'dfgfdg',2,'fgdfg','2018-09-10',1,0),(6,'uyiyuiuyiui',3,'uyiuyiuyi','2018-09-10',1,0),(7,'aaavvvccc',1,'hjkjjjjjjjjjjjjjjjjjjjjjjjjjjjjjyiuiiuyiuyiuy','2018-09-10',1,0),(8,'ddffdgfgfvdfgfgfd',7,'','2018-09-10',1,0),(9,'yuuyyu',3,'','2018-09-10',1,0),(10,'hgjghjghjhjjhgjh',10,'hgjhgjhg','2018-09-12',1,0),(11,'aaaaaaaaaaaaaabbbbbbbbbbbbccccccccccccccccddd',12,'aaaaaaaaaaaabbbbbbbbbbbbbbbbccccccccccccccccc','2018-09-12',1,0);
/*!40000 ALTER TABLE `parameter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parameter_range`
--

DROP TABLE IF EXISTS `parameter_range`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parameter_range` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parameter_id` int(11) NOT NULL,
  `min_value` int(11) NOT NULL,
  `max_value` int(11) NOT NULL,
  `scaling_factor` int(11) NOT NULL,
  `uom_id` int(11) NOT NULL,
  `bits_per_sign` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `createddt` date DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `asset_id` int(11) NOT NULL,
  `isactive` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parameter_range`
--

LOCK TABLES `parameter_range` WRITE;
/*!40000 ALTER TABLE `parameter_range` DISABLE KEYS */;
INSERT INTO `parameter_range` VALUES (1,2,1,15,1,8,'15 s','2018-09-14',1,63,1),(2,1,2,15,2,8,'16 s','2018-09-14',1,63,1),(3,1,2,15,2,8,'16 s','2018-09-14',1,63,0),(4,1,2,15,2,8,'16 s','2018-09-14',1,63,1);
/*!40000 ALTER TABLE `parameter_range` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sensor_inventory`
--

LOCK TABLES `sensor_inventory` WRITE;
/*!40000 ALTER TABLE `sensor_inventory` DISABLE KEYS */;
INSERT INTO `sensor_inventory` VALUES (4,'sv ww',NULL,1,'seimens','t001a','oil tempreture',1,9,'2018-09-12',1,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sensor_type`
--

LOCK TABLES `sensor_type` WRITE;
/*!40000 ALTER TABLE `sensor_type` DISABLE KEYS */;
INSERT INTO `sensor_type` VALUES (1,'Temperature Sensor','A temperature sensor is often a resistance te','2018-09-07',1,1),(2,'Ultrasonic Sensor','Ultrasonic transducers or ultrasonic sensors ','2018-09-07',1,1),(3,'ABC','ABC','2018-09-07',1,0),(4,'aa','sdsdsadsadsaddddddddsad','2018-09-10',1,0),(5,'sadsd','dfdsffds','2018-09-10',1,1),(6,'abcd','abcd','2018-09-10',1,1),(7,'xyz','xyz','2018-09-10',1,0),(8,'ccv','vcb','2018-09-10',1,1),(9,'sensor a','','2018-09-12',1,0),(10,'aas','saas','2018-09-12',1,1),(11,'hgjjghjhjtyuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu','hgjjghjhjtyuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu','2018-09-12',1,1);
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
-- Table structure for table `trigger`
--

DROP TABLE IF EXISTS `trigger`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trigger` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rule_id` int(11) NOT NULL,
  `asset_id` int(11) NOT NULL,
  `trigger_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `trigger_threshold_id` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sms_contact_no` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `createdate` date DEFAULT NULL,
  `createby` int(11) DEFAULT NULL,
  `isactive` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trigger`
--

LOCK TABLES `trigger` WRITE;
/*!40000 ALTER TABLE `trigger` DISABLE KEYS */;
INSERT INTO `trigger` VALUES (1,3,63,'extreame','Green','abc@gmail.com','99660033011','2018-09-14',1,1),(2,3,63,'extreame','Orange','abc@gmail.com','99660033012','2018-09-14',1,1),(3,3,63,'extreame','Red','abc@gmail.com','99660033011','2018-09-14',1,1);
/*!40000 ALTER TABLE `trigger` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uom`
--

LOCK TABLES `uom` WRITE;
/*!40000 ALTER TABLE `uom` DISABLE KEYS */;
INSERT INTO `uom` VALUES (1,'Cms','2018-09-07',1,1),(2,'Mts','2018-09-07',1,1),(3,'rpm','2018-09-07',1,1),(4,'kv','2018-09-10',1,1),(5,'aaa','2018-09-10',1,1),(6,'abc','2018-09-10',1,1),(7,'1234567890','2018-09-10',1,1),(8,'dhdd','2018-09-10',1,1),(9,'tttt','2018-09-12',1,1),(10,'tttyyyy','2018-09-12',1,1),(11,'ghjgh','2018-09-12',1,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uom_type`
--

LOCK TABLES `uom_type` WRITE;
/*!40000 ALTER TABLE `uom_type` DISABLE KEYS */;
INSERT INTO `uom_type` VALUES (1,'Depth',1,'2018-09-07',1,1),(2,'Height',2,'2018-09-07',1,1),(3,'Temperature',3,'2018-09-07',1,1),(4,'Pressure',2,'2018-09-10',1,0),(5,'Pressure',4,'2018-09-10',1,1),(6,'abcdefg',5,'2018-09-10',1,0),(7,'xyz',6,'2018-09-10',1,1),(8,'hgfhfghgf',7,'2018-09-10',1,1),(9,'qqqqq',8,'2018-09-10',1,1),(10,'ttt',9,'2018-09-12',1,0),(11,'tttyyy',10,'2018-09-12',1,0),(12,'tttyyy',11,'2018-09-12',1,1);
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
INSERT INTO `users` VALUES (1,'127.0.0.1','admin@admin.com','$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36','','admin@admin.com',2147483647,411023,1,1,1,'My hobbies include sketching and playing cricket. I played at cluster level at school and university level at college.\r\n\r\nComing to my strengths and weaknesses, my strengths are. I am a good learner, innovative, I have positive attitude and committed to my work. My weakness is procrastination and I am a bit selfish too.','aaaaa','','Vishval','ADMIN','1988-03-09','Chavan','/profile/-profile-IMG_0169.JPG','9860181145','0',NULL,NULL,NULL,'DdFh8A7JZ7ZT.0Td2XLW9O',1268889823,1536902813,1,1,'balewadi,pune'),(2,'127.0.0.1','najat@gmai.com','$2y$08$It3QijYk.O1VE/.4nwStvel.cKb2q95X.EeWBGSI35B.H18qVS6H.',NULL,'najat@gmai.com',NULL,NULL,NULL,NULL,1,'I am Najat came from Chennai. I have done diploma in automobile engineering along with 84% in rvsptc at Dindigul. I am currently working one of the truck manufacturing company past 6 years. I did some kaizens as a production supervisor role. Although I feel I am ready for new challenging assignment for this position. So, I really excite me. Thank you.',NULL,NULL,'Najat','dfsf','2017-07-26','Pareira','/profile/-profile-favicon.png','9856231245',NULL,NULL,NULL,NULL,NULL,1501055406,1501066947,1,0,NULL),(3,'127.0.0.1','mayur@gmail.com','$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36',NULL,'mayur@gmail.com',NULL,NULL,NULL,NULL,1,' I am born and raised in Pune, and currently I am pursuing MBA in computer engineering, from IIT Mumbai, with an aggregate of  70% till the second semester.\r\n\r\n			I have done my Post Grduation from H. V. Desai with 85% marks.',NULL,NULL,'Mayur',NULL,'1988-05-06','Vachechewar','/profile/-profile-photo.jpg','7894561236',NULL,NULL,NULL,NULL,NULL,1501067080,1501154528,1,0,NULL),(4,'127.0.0.1','sachin@gamil.com','$2y$08$aUTnwMHLhbW182mTogk3rOZ4gQC/ZRpvmcQE9vc3.LderEgTPvmEG',NULL,'sachin@gamil.com',NULL,NULL,NULL,NULL,1,'fgfheeeeefdgfrdgffgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfg',NULL,NULL,'Sachin123','MWX','2017-07-26','Shetty','/profile/-profile-Background.jpg','8956231245',NULL,NULL,NULL,NULL,NULL,1501067502,1501072166,1,0,NULL),(5,'127.0.0.1','manali@gmail.com','$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36','','manali@gmail.com',12345678,6,0,0,0,'NULL','','','','','2017-07-26','','','9860181145','0',NULL,NULL,NULL,'DdFh8A7JZ7ZT.0Td2XLW9O',1268889823,1536669972,1,1,''),(6,'127.0.0.1','manalipatil@gmail.com','$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36','','manalipatil@gmail.com',12345678,6,0,0,0,'NULL','','','','','2017-07-26','','','9860181145','0',NULL,NULL,NULL,'DdFh8A7JZ7ZT.0Td2XLW9O',1268889823,1536669972,1,1,'');
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

-- Dump completed on 2018-09-14 20:58:10
