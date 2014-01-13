-- MySQL dump 10.13  Distrib 5.5.33, for Linux (x86_64)
--
-- Host: localhost    Database: gwc2014
-- ------------------------------------------------------
-- Server version	5.5.33

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
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role` char(20) DEFAULT NULL COMMENT 'client,third_party,partner',
  `password` varchar(255) DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(10) DEFAULT '0',
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(10) DEFAULT '0',
  `email` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'client','123',NULL,0,NULL,0,''),(2,'Amex','123','2012-12-20 23:07:34',0,'2012-12-20 23:07:34',0,''),(3,'DMC','123','2012-12-20 23:07:34',0,'2012-12-20 23:07:34',0,''),(4,'NTE','123','2012-12-20 23:07:34',0,'2012-12-20 23:07:34',0,''),(6,'Dickie','q1w2e3','0000-00-00 00:00:00',2013,'0000-00-00 00:00:00',2013,''),(7,'Caroline','q1w2e3','0000-00-00 00:00:00',2013,'0000-00-00 00:00:00',2013,''),(10,'BOSE','gwc2013','2013-04-11 08:44:56',0,'2013-04-11 08:44:56',0,''),(11,'Ramona','gwc2013','2013-04-11 08:44:56',0,'2013-04-11 08:44:56',0,''),(12,'Heenal','gwc2013','2013-04-11 08:44:56',0,'2013-04-11 08:44:56',0,''),(13,'Hope','gwc2013','2013-04-11 08:44:56',0,'2013-04-11 08:44:56',0,''),(14,'Craig','gwc2013','2013-04-11 08:44:56',0,'2013-04-11 08:44:56',0,''),(15,'Zoe','gwc2013','2013-04-11 08:44:56',0,'2013-04-11 08:44:56',0,''),(16,'Charlene','gwc2013','2013-04-11 08:44:56',0,'2013-04-11 08:44:56',0,''),(17,'Lauren','gwc2013','2013-04-11 08:44:56',0,'2013-04-11 08:44:56',0,''),(18,'Lynne','gwc2013','2013-04-11 08:44:56',0,'2013-04-11 08:44:56',0,''),(19,'Kerry','gwc2013','2013-04-11 08:44:56',0,'2013-04-11 08:44:56',0,''),(20,'Cindy','gwc2013','2013-04-11 08:44:56',0,'2013-04-11 08:44:56',0,''),(21,'Laura','gwc2013','2013-04-11 08:44:56',0,'2013-04-11 08:44:56',0,''),(22,'Holly','gwc2013','2013-04-11 08:44:56',0,'2013-04-11 08:44:56',0,''),(23,'Jackie','gwc2013','2013-04-11 08:44:56',0,'2013-04-11 08:44:56',0,''),(24,'Nicole','gwc2013','2013-04-11 08:44:56',0,'2013-04-11 08:44:56',0,''),(25,'Melissa','gwc2013','2013-04-11 08:44:56',0,'2013-04-11 08:44:56',0,''),(26,'Sophie','gwc2013','2013-04-11 08:44:56',0,'2013-04-11 08:44:56',0,''),(27,'Tony','123','2013-09-02 07:11:29',7,'2013-09-02 07:11:29',7,'tony.chen@magictony-se.com'),(28,'lihe','123','2013-09-02 23:44:13',7,'2013-09-02 23:44:13',7,'li.he@brightac.com.cn');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dietary` text,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(10) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `room` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gifts`
--

DROP TABLE IF EXISTS `gifts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gifts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` char(20) NOT NULL,
  `brand` char(20) NOT NULL,
  `name` varchar(255) DEFAULT '',
  `image` varchar(255) DEFAULT '',
  `description` text,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(10) DEFAULT '0',
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gifts`
--

LOCK TABLES `gifts` WRITE;
/*!40000 ALTER TABLE `gifts` DISABLE KEYS */;
/*!40000 ALTER TABLE `gifts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `guests`
--

DROP TABLE IF EXISTS `guests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `guests` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `first_name` varchar(255) DEFAULT '',
  `last_name` varchar(255) DEFAULT '',
  `relationship` varchar(255) DEFAULT '',
  `telephone_number` varchar(255) DEFAULT '',
  `email` varchar(255) DEFAULT '',
  `date_of_birth` varchar(255) DEFAULT '',
  `dietary_requirements` varchar(255) DEFAULT '',
  `passport` varchar(255) DEFAULT '',
  `special_requests` varchar(255) DEFAULT '',
  `nationality` varchar(255) DEFAULT '',
  `departure_date` char(20) DEFAULT NULL,
  `return_date` char(20) DEFAULT NULL,
  `airport_name` varchar(255) DEFAULT '',
  `airport_code` varchar(255) DEFAULT '',
  `hotel_arrival_date` char(20) DEFAULT NULL,
  `hotel_departure_date` char(20) DEFAULT NULL,
  `room_type` tinyint(4) DEFAULT NULL COMMENT '0:twin room;1:double rooom',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(10) DEFAULT '0',
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(10) DEFAULT '0',
  `ga_passport` varchar(255) DEFAULT NULL,
  `ga_dateofbirth` varchar(255) DEFAULT NULL,
  `ga_firstname` varchar(255) DEFAULT NULL,
  `ga_lastname` varchar(255) DEFAULT NULL,
  `ga_gender` varchar(255) DEFAULT NULL,
  `ga_card_number` varchar(255) DEFAULT NULL,
  `ga_card_country` varchar(255) DEFAULT NULL,
  `ga_card_expiration_date` varchar(255) DEFAULT NULL,
  `ga_card_issue_date` varchar(255) DEFAULT NULL,
  `ga_redress_number` varchar(255) DEFAULT NULL,
  `destination_city` varchar(255) DEFAULT NULL,
  `preferred_seat_request` varchar(255) DEFAULT NULL,
  `preferred_airline_frequent_flyer_number` varchar(255) DEFAULT NULL,
  `other` varchar(255) DEFAULT NULL,
  `need_visa` varchar(255) DEFAULT NULL,
  `visa_letter` varchar(255) DEFAULT NULL,
  `checked` varchar(255) DEFAULT NULL,
  `hotel_venue` varchar(255) DEFAULT NULL,
  `team_dinner` varchar(255) DEFAULT NULL,
  `team_dinner_menu` varchar(255) DEFAULT NULL,
  `team_dinner_dietary` varchar(255) DEFAULT NULL,
  `gala_dinner` varchar(255) DEFAULT NULL,
  `gala_dinner_menu` varchar(255) DEFAULT NULL,
  `gala_dinner_dietary` varchar(255) DEFAULT NULL,
  `dietary_comment` varchar(255) DEFAULT '',
  `frequent_flyer_number` varchar(255) DEFAULT '',
  `preferred_airline` varchar(255) DEFAULT '',
  `fi_status` text NOT NULL,
  `fi_adate` text NOT NULL,
  `fi_adate1` text NOT NULL,
  `fi_aflight1` text NOT NULL,
  `fi_afrom1` text NOT NULL,
  `fi_ato1` text NOT NULL,
  `fi_adep1` text NOT NULL,
  `fi_aarr1` text NOT NULL,
  `fi_adate2` text NOT NULL,
  `fi_aflight2` text NOT NULL,
  `fi_afrom2` text NOT NULL,
  `fi_ato2` text NOT NULL,
  `fi_adep2` text NOT NULL,
  `fi_aarr2` text NOT NULL,
  `fi_adate3` text NOT NULL,
  `fi_aflight3` text NOT NULL,
  `fi_afrom3` text NOT NULL,
  `fi_ato3` text NOT NULL,
  `fi_adep3` text NOT NULL,
  `fi_aarr3` text NOT NULL,
  `fi_ddate` text NOT NULL,
  `fi_ddate1` text NOT NULL,
  `fi_dflight1` text NOT NULL,
  `fi_dfrom1` text NOT NULL,
  `fi_dto1` text NOT NULL,
  `fi_ddep1` text NOT NULL,
  `fi_darr1` text NOT NULL,
  `fi_ddate2` text NOT NULL,
  `fi_dflight2` text NOT NULL,
  `fi_dfrom2` text NOT NULL,
  `fi_dto2` text NOT NULL,
  `fi_ddep2` text NOT NULL,
  `fi_darr2` text NOT NULL,
  `fi_ddate3` text NOT NULL,
  `fi_dflight3` text NOT NULL,
  `fi_dfrom3` text NOT NULL,
  `fi_dto3` text NOT NULL,
  `fi_ddep3` text NOT NULL,
  `fi_darr3` text NOT NULL,
  `has_checkin` tinyint(4) NOT NULL DEFAULT '0',
  `headset` varchar(255) DEFAULT '',
  `has_gift` tinyint(4) NOT NULL DEFAULT '0',
  `checkin_at` datetime DEFAULT NULL,
  `gift_at` datetime DEFAULT NULL,
  `no_gala_dinner` char(1) NOT NULL DEFAULT '0',
  `driving` char(4) NOT NULL DEFAULT '',
  `preferred_name` varchar(255) NOT NULL DEFAULT '',
  `visa_status` text,
  `permanent_home_address` text,
  `place_of_birth` text,
  `tour` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=808 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guests`
--

LOCK TABLES `guests` WRITE;
/*!40000 ALTER TABLE `guests` DISABLE KEYS */;
INSERT INTO `guests` VALUES (768,0,'','','','','','','','','','','Apr/17/2013','Apr/21/2013','','','Apr/17/2013','Apr/21/2013',NULL,'2013-07-31 07:36:31',6,'2013-07-31 07:36:31',6,'','','','','','','','','','','','',NULL,'',NULL,'','',NULL,NULL,'','None',NULL,'',NULL,'','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',0,'',0,NULL,NULL,'0','','',NULL,NULL,NULL,0),(769,10761,'test','test','','','','','','','','',NULL,NULL,'','',NULL,NULL,NULL,'2013-07-31 09:23:39',10761,'2013-08-05 08:56:48',10761,NULL,'Apr/08/1992',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Meat','None',NULL,'Cod',NULL,'','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',0,'',0,NULL,NULL,'0','','test',NULL,NULL,NULL,0),(770,0,'','','','','','','','','','','Apr/10/2014','Apr/14/2014','','','Apr/10/2014','Apr/14/2014',NULL,'2013-08-27 07:05:00',7,'2013-08-27 07:05:00',7,'','','','','','','','','','','','',NULL,'',NULL,'','',NULL,NULL,'','None',NULL,'',NULL,'','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',0,'',0,NULL,NULL,'','','',NULL,NULL,NULL,0),(771,10764,'Guest','Test','','','','','','','','','Apr/10/2014','Apr/14/2014','erwer','',NULL,NULL,NULL,'2013-08-27 09:09:30',10764,'2013-09-04 02:29:50',10764,'ff','Apr/07/1993','sfwe','wef','Male','32432423','fwefewf','Sep/24/2013','Sep/03/2013','','Sydney','',NULL,'',NULL,'Yes','Yes',NULL,NULL,'Vegetarian','None',NULL,'Cod',NULL,'','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',0,'',0,NULL,NULL,'','0','GT1','Applying','wefwef','ewer',0),(772,0,'','','','','','','','','','','Apr/10/2014','Apr/14/2014','','','Apr/10/2014','Apr/14/2014',NULL,'2013-08-27 13:20:45',7,'2013-08-27 13:20:45',7,'','','','','','','','','','','','',NULL,'',NULL,'','',NULL,NULL,'','None',NULL,'',NULL,'','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',0,'',0,NULL,NULL,'','','',NULL,NULL,NULL,0),(773,0,'','','','','','','','','','','Apr/10/2014','Apr/14/2014','','','Apr/10/2014','Apr/14/2014',NULL,'2013-08-27 13:21:06',7,'2013-08-27 13:21:06',7,'','','','','','','','','','','','',NULL,'',NULL,'','',NULL,NULL,'','None',NULL,'',NULL,'','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',0,'',0,NULL,NULL,'','','',NULL,NULL,NULL,0),(774,10766,'Robbie','Williams','','','','','','','','','Apr/10/2014','Apr/14/2014','Heathrow','',NULL,NULL,NULL,'2013-08-27 14:22:32',10766,'2013-10-14 12:09:00',7,'Hungarian','Apr/19/1979','Test','Guest McHugh','Male','655432','123456','Aug/28/2013','Aug/04/2013','','Sydney','',NULL,'',NULL,'Yes','Yes',NULL,NULL,'Meat','Other',NULL,'Cod',NULL,'Dietary comments test','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',0,'',0,NULL,NULL,'','','Rob','Applying','Windsor','Iran',0),(775,0,'','','','','','','','','','','Apr/10/2014','Apr/14/2014','','','Apr/10/2014','Apr/14/2014',NULL,'2013-09-02 08:35:07',7,'2013-09-02 08:35:07',7,'','','','','','','','','','','','',NULL,'',NULL,'','',NULL,NULL,'','None',NULL,'',NULL,'','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',0,'',0,NULL,NULL,'','','','',NULL,NULL,0),(776,0,'','','','','','','','','','','Apr/10/2014','Apr/14/2014','','','Apr/10/2014','Apr/14/2014',NULL,'2013-09-04 18:25:27',7,'2013-09-04 18:25:27',7,'',NULL,'','','','','','','','','','',NULL,'',NULL,'','',NULL,NULL,'','None',NULL,'',NULL,'','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',0,'',0,NULL,NULL,'','','','','','',0),(777,10768,'test','test','','','','','','','','','Apr/10/2014','Apr/14/2014','wefwf','',NULL,NULL,NULL,'2013-09-04 18:26:30',10768,'2013-10-15 07:05:45',10768,'wefwf','Apr/07/1993','wwf','wefwef','Female','234234','wfwef','Sep/24/2013','Sep/13/2013','','Sydney','',NULL,'',NULL,'No','Yes',NULL,NULL,'Fish','Halal',NULL,'Cod',NULL,'','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',0,'',0,NULL,NULL,'','','test','','','',2),(778,10765,'Test','Tester','','','','','','','','','Apr/10/2014','Apr/14/2014','','',NULL,NULL,NULL,'2013-09-19 11:57:42',10765,'2013-10-15 11:14:34',7,'','Jul/23/1965','','','','','','','','','Sydney','',NULL,'',NULL,'','',NULL,NULL,'Vegetarian','None',NULL,'Ravioli',NULL,'','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',0,'',0,NULL,NULL,'','','Testy','','','',1),(779,0,'','','','','','','','','','','Apr/10/2014','Apr/14/2014','','','Apr/10/2014','Apr/14/2014',NULL,'2013-10-15 07:06:22',7,'2013-10-15 07:06:22',7,'',NULL,'','','','','','','','','','',NULL,'',NULL,'','',NULL,NULL,'','None',NULL,'',NULL,'','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',0,'',0,NULL,NULL,'','','','','','',0),(780,10769,'test','test','','','','','','','','','Apr/10/2014','Apr/14/2014','stockholm','',NULL,NULL,NULL,'2013-10-15 07:13:07',10769,'2013-10-15 18:51:34',10769,'test','Apr/06/1993','test','test','Female','324234234','test','Oct/23/2013','Oct/02/2013','','Sydney','',NULL,'',NULL,'Yes','Yes',NULL,NULL,'Vegetarian','None',NULL,'Cottage Pie',NULL,'','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',0,'',0,NULL,NULL,'','','test','Applying','test','tes',0),(781,0,'','','','','','','','','','','Apr/10/2014','Apr/14/2014','','','Apr/10/2014','Apr/14/2014',NULL,'2013-10-15 11:25:30',6,'2013-10-15 11:25:30',6,'',NULL,'','','','','','','','','','',NULL,'',NULL,'','',NULL,NULL,'','None',NULL,'',NULL,'','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',0,'',0,NULL,NULL,'','','','','','',0),(782,0,'','','','','','','','','','','Apr/10/2014','Apr/14/2014','','','Apr/10/2014','Apr/14/2014',NULL,'2013-10-15 11:28:59',6,'2013-10-15 11:28:59',6,'',NULL,'','','','','','','','','','',NULL,'',NULL,'','',NULL,NULL,'','None',NULL,'',NULL,'','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',0,'',0,NULL,NULL,'','','','','','',0),(783,10770,'Robbie','Williams','','','','','','','','','Apr/10/2014','Apr/14/2014','London','',NULL,NULL,NULL,'2013-10-15 11:33:00',10770,'2013-10-22 12:41:29',7,'Brit','Oct/16/1975','Robbie','Williams','Male','12345','UK','Oct/01/2013','Oct/14/2009','','Sydney','',NULL,'',NULL,'No','Yes',NULL,NULL,'Meat','No Dairy',NULL,'Cottage Pie',NULL,'','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',0,'',0,NULL,NULL,'','Arra','Rob','','','',1),(784,0,'','','','','','','','','','','Apr/10/2014','Apr/14/2014','','','Apr/10/2014','Apr/14/2014',NULL,'2013-10-15 12:00:10',6,'2013-10-15 12:00:10',6,'',NULL,'','','','','','','','','','',NULL,'',NULL,'','',NULL,NULL,'','None',NULL,'',NULL,'','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',0,'',0,NULL,NULL,'','','','','','',0),(785,0,'','','','','','','','','','','Apr/10/2014','Apr/14/2014','','','Apr/10/2014','Apr/14/2014',NULL,'2013-10-16 11:35:39',6,'2013-10-16 11:35:39',6,'',NULL,'','','','','','','','','','',NULL,'',NULL,'','',NULL,NULL,'','None',NULL,'',NULL,'','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',0,'',0,NULL,NULL,'','','','','','',0),(786,10773,'Test','Guest','','','','','','','','','Apr/10/2014','Apr/14/2014','','',NULL,NULL,NULL,'2013-10-16 12:22:07',10773,'2013-10-28 09:05:33',10773,'','Apr/01/1993','','','','','','','','','Sydney','',NULL,'',NULL,'','',NULL,NULL,'Vegetarian','None',NULL,'Cottage Pie',NULL,'','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',0,'',0,NULL,NULL,'','','Testy','','','',1),(787,0,'','','','','','','','','','','Apr/10/2014','Apr/14/2014','','','Apr/10/2014','Apr/14/2014',NULL,'2013-10-16 18:31:40',7,'2013-10-16 18:31:40',7,'',NULL,'','','','','','','','','','',NULL,'',NULL,'','',NULL,NULL,'','None',NULL,'',NULL,'','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',0,'',0,NULL,NULL,'','','','','','',0),(788,0,'','','','','','','','','','','Apr/10/2014','Apr/14/2014','','','Apr/10/2014','Apr/14/2014',NULL,'2013-10-16 18:51:42',7,'2013-10-16 18:51:42',7,'',NULL,'','','','','','','','','','',NULL,'',NULL,'','',NULL,NULL,'','None',NULL,'',NULL,'','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',0,'',0,NULL,NULL,'','','','','','',0),(789,0,'','','','','','','','','','','Apr/10/2014','Apr/14/2014','','','Apr/10/2014','Apr/14/2014',NULL,'2013-10-16 19:00:56',7,'2013-10-16 19:00:56',7,'',NULL,'','','','','','','','','','',NULL,'',NULL,'','',NULL,NULL,'','None',NULL,'',NULL,'','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',0,'',0,NULL,NULL,'','','','','','',0),(790,0,'','','','','','','','','','','Apr/09/2014','Apr/14/2014','','','Apr/09/2014','Apr/14/2014',NULL,'2013-10-16 19:07:46',7,'2013-10-16 19:07:46',7,'',NULL,'','','','','','','','','','',NULL,'',NULL,'','',NULL,NULL,'','None',NULL,'',NULL,'','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',0,'',0,NULL,NULL,'','','','','','',0),(791,0,'','','','','','','','','','',NULL,NULL,'','',NULL,NULL,NULL,'2013-10-17 02:55:27',10777,'2013-10-17 02:55:27',10777,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',0,'',0,NULL,NULL,'0','','',NULL,NULL,NULL,0),(792,0,'','','','','','','','','','',NULL,NULL,'','',NULL,NULL,NULL,'2013-10-17 03:03:49',10777,'2013-10-17 03:03:49',10777,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',0,'',0,NULL,NULL,'0','','',NULL,NULL,NULL,0),(793,0,'','','','','','','','','','',NULL,NULL,'','',NULL,NULL,NULL,'2013-10-17 03:13:22',10777,'2013-10-17 03:13:22',10777,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',0,'',0,NULL,NULL,'0','','',NULL,NULL,NULL,0),(794,0,'','','','','','','','','','',NULL,NULL,'','',NULL,NULL,NULL,'2013-10-17 03:15:49',10777,'2013-10-17 03:15:49',10777,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',0,'',0,NULL,NULL,'0','','',NULL,NULL,NULL,0),(795,0,'','','','','','','','','','',NULL,NULL,'','',NULL,NULL,NULL,'2013-10-17 03:38:10',10777,'2013-10-17 03:38:10',10777,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',0,'',0,NULL,NULL,'0','','',NULL,NULL,NULL,0),(796,0,'','','','','','','','','','',NULL,NULL,'','',NULL,NULL,NULL,'2013-10-17 06:26:41',10777,'2013-10-17 06:26:41',10777,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',0,'',0,NULL,NULL,'0','','',NULL,NULL,NULL,0),(798,0,'','','','','','','','','','',NULL,NULL,'','',NULL,NULL,NULL,'2013-10-22 06:27:48',10777,'2013-10-22 06:27:48',10777,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',0,'',0,NULL,NULL,'0','','',NULL,NULL,NULL,0),(797,10777,'test','Testtes','','','','','','','','','Apr/10/2014','Apr/14/2014','','',NULL,NULL,NULL,'2013-10-17 11:42:28',10777,'2013-10-23 18:44:47',10777,'','Apr/07/1993','','','','','','','','','Sydney','',NULL,'',NULL,'','',NULL,NULL,'Fish','None',NULL,'Cottage Pie',NULL,'','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',0,'',0,NULL,NULL,'','','test','','','',2),(799,0,'','','','','','','','','','',NULL,NULL,'','',NULL,NULL,NULL,'2013-10-22 08:20:13',10777,'2013-10-22 08:20:13',10777,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',0,'',0,NULL,NULL,'0','','',NULL,NULL,NULL,0),(800,0,'','','','','','','','','','',NULL,NULL,'','',NULL,NULL,NULL,'2013-10-22 09:06:29',10777,'2013-10-22 09:06:29',10777,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',0,'',0,NULL,NULL,'0','','',NULL,NULL,NULL,0),(801,0,'','','','','','','','','','',NULL,NULL,'','',NULL,NULL,NULL,'2013-10-22 19:39:48',10777,'2013-10-22 19:39:48',10777,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',0,'',0,NULL,NULL,'0','','',NULL,NULL,NULL,0),(802,0,'','','','','','','','','','','Apr/10/2014','Apr/14/2014','','','Apr/10/2014','Apr/14/2014',NULL,'2013-10-23 18:45:47',7,'2013-10-23 18:45:47',7,'',NULL,'','','','','','','','','','',NULL,'',NULL,'','',NULL,NULL,'','None',NULL,'',NULL,'','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',0,'',0,NULL,NULL,'','','','','','',0),(803,0,'','','','','','','','','','','Apr/10/2014','Apr/14/2014','','','Apr/10/2014','Apr/14/2014',NULL,'2013-10-23 18:48:28',7,'2013-10-23 18:48:28',7,'',NULL,'','','','','','','','','','',NULL,'',NULL,'','',NULL,NULL,'','None',NULL,'',NULL,'','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',0,'',0,NULL,NULL,'','','','','','',0),(804,10779,'test','Test','','','','','','','','','Apr/10/2014','Apr/14/2014','','',NULL,NULL,NULL,'2013-10-23 18:49:12',10779,'2013-10-24 18:24:27',10779,'','Apr/01/1993','','','','','','','','','Sydney','',NULL,'',NULL,'','',NULL,NULL,'Fish','Halal',NULL,'Cottage Pie',NULL,'','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',0,'',0,NULL,NULL,'','1','test','','','',0),(805,0,'','','','','','','','','','','Apr/10/2014','Apr/14/2014','','','Apr/10/2014','Apr/14/2014',NULL,'2013-10-25 07:46:41',7,'2013-10-25 07:46:41',7,'',NULL,'','','','','','','','','','',NULL,'',NULL,'','',NULL,NULL,'','None',NULL,'',NULL,'','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',0,'',0,NULL,NULL,'','','','','','',0),(806,10780,'tes','Testtes','','','','','','','','','Apr/10/2014','Apr/14/2014','','',NULL,NULL,NULL,'2013-10-25 07:57:34',10780,'2013-10-25 08:16:21',10780,'','Apr/14/1993','','','','','','','','','Sydney','',NULL,'',NULL,'','',NULL,NULL,'Meat','None',NULL,'Cod',NULL,'','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',0,'',0,NULL,NULL,'0','1','test','','','',2),(807,0,'','','','','','','','','','','Apr/10/2014','Apr/14/2014','','','Apr/10/2014','Apr/14/2014',NULL,'2013-10-27 19:44:28',7,'2013-10-27 19:44:28',7,'',NULL,'','','','','','','','','','',NULL,'',NULL,'','',NULL,NULL,'','None',NULL,'',NULL,'','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',0,'',0,NULL,NULL,'','','','','','',0);
/*!40000 ALTER TABLE `guests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hotels`
--

DROP TABLE IF EXISTS `hotels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hotels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  `is_master` tinyint(1) NOT NULL DEFAULT '0',
  `room_rate` decimal(10,2) NOT NULL DEFAULT '0.00',
  `attriton_rate` decimal(10,2) NOT NULL DEFAULT '0.00',
  `sell_rate` decimal(10,2) NOT NULL DEFAULT '0.00',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(10) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `hotel_name` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hotels`
--

LOCK TABLES `hotels` WRITE;
/*!40000 ALTER TABLE `hotels` DISABLE KEYS */;
INSERT INTO `hotels` VALUES (2,'Crew','Deluxe Darling Harbour',0,320.00,320.00,346.00,'2013-09-02 07:41:11',7,'2013-09-02 07:41:11',7,'Shangri-La'),(3,'Crew','Deluxe Opera House',0,320.00,320.00,346.00,'2013-09-02 07:41:47',7,'2013-09-02 07:41:47',7,'Shangri-La'),(4,'Eagles / TA','Ambassador Suite',0,808.00,808.00,848.00,'2013-09-02 07:42:27',7,'2013-09-02 07:42:27',7,'Shangri-La'),(5,'Eagles / TA','Premier Suite',0,808.00,808.00,848.00,'2013-09-02 07:42:56',7,'2013-09-02 07:42:56',7,'Shangri-La'),(6,'Eagles / TA','Executive Tower Suite',0,653.00,653.00,693.00,'2013-09-02 07:43:28',7,'2013-09-02 07:43:28',7,'Shangri-La'),(7,'Eagles / TA','Executive Corner Suite',0,632.00,632.00,672.00,'2013-09-02 07:43:55',7,'2013-09-02 07:43:55',7,'Shangri-La'),(8,'Eagles / TA','Premium Grand Harbour',0,495.00,495.00,535.00,'2013-09-02 07:44:22',7,'2013-09-02 07:44:22',7,'Shangri-La'),(9,'OC','Presidential Suite',0,4500.00,4500.00,4500.00,'2013-09-02 07:44:52',7,'2013-09-02 07:44:52',7,'Shangri-La'),(10,'OC','Royal Suite',0,5500.00,5500.00,5500.00,'2013-09-02 07:45:10',7,'2013-09-02 07:45:10',7,'Shangri-La'),(11,'Winners','Deluxe Grand Harbour',0,401.00,401.00,441.00,'2013-09-02 07:45:35',7,'2013-09-02 07:45:35',7,'Shangri-La'),(12,'Winners','Deluxe Opera House',0,401.00,401.00,441.00,'2013-09-02 07:45:58',7,'2013-09-02 07:45:58',7,'Shangri-La'),(13,'Winners','Executive Grand Harbour',0,401.00,401.00,441.00,'2013-09-02 07:46:20',7,'2013-09-02 07:46:20',7,'Shangri-La'),(14,'Winners','Executive Opera  House',0,401.00,401.00,441.00,'2013-09-02 07:46:39',7,'2013-09-02 07:46:39',7,'Shangri-La'),(15,'Crew','Guest Room',0,265.00,265.00,295.00,'2013-09-02 08:03:53',7,'2013-09-02 08:03:53',7,'Hilton'),(16,'Eagles/TA','Relaxation Room',0,499.00,499.00,529.00,'2013-09-02 08:04:15',7,'2013-09-02 08:04:15',7,'Hilton'),(17,'Eagles/TA','Relaxation Suite',0,575.00,575.00,605.00,'2013-09-02 08:04:39',7,'2013-09-02 08:04:39',7,'Hilton'),(18,'Eagles/TA','King Suite',0,785.00,785.00,815.00,'2013-09-02 08:05:02',7,'2013-09-02 08:05:02',7,'Hilton'),(19,'Winners','Deluxe Room',0,389.00,389.00,419.00,'2013-09-02 08:05:25',7,'2013-09-02 08:05:25',7,'Hilton'),(20,'Crew','Cityside',0,245.00,245.00,260.00,'2013-09-02 08:10:38',7,'2013-09-02 08:10:38',7,'Sheraton'),(21,'Eagles','Executive City Side',0,335.00,335.00,385.00,'2013-09-02 08:11:01',7,'2013-09-02 08:11:01',7,'Sheraton'),(22,'Eagles','Executive Hyde Park',0,365.00,365.00,415.00,'2013-09-02 08:11:24',7,'2013-09-02 08:11:24',7,'Sheraton'),(23,'OC','Terrace Suite',0,600.00,600.00,600.00,'2013-09-02 08:11:50',7,'2013-09-02 08:11:50',7,'Sheraton'),(24,'OC','Deluxe Terrace Suite',0,1000.00,1000.00,1000.00,'2013-09-02 08:12:15',7,'2013-09-02 08:12:15',7,'Sheraton'),(25,'OC','Hyde Park Suite',0,1700.00,1700.00,1700.00,'2013-09-02 08:12:35',7,'2013-09-02 08:12:35',7,'Sheraton'),(26,'OC','Ambassador Suite',0,2700.00,2700.00,2700.00,'2013-09-02 08:12:53',7,'2013-09-02 08:12:53',7,'Sheraton'),(27,'OC','Royal Suite',0,3700.00,3700.00,3700.00,'2013-09-02 08:13:14',7,'2013-09-02 08:13:14',7,'Sheraton'),(28,'TA','Executive Suite',0,400.00,400.00,450.00,'2013-09-02 08:13:35',7,'2013-09-02 08:13:35',7,'Sheraton'),(29,'Winners','Cityside',0,275.00,275.00,290.00,'2013-09-02 08:13:56',7,'2013-09-02 08:13:56',7,'Sheraton'),(30,'Winners','Hyde Park',0,305.00,305.00,320.00,'2013-09-02 08:14:16',7,'2013-09-02 08:14:16',7,'Sheraton');
/*!40000 ALTER TABLE `hotels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `querys`
--

DROP TABLE IF EXISTS `querys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `querys` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `staff_name` varchar(255) DEFAULT '',
  `full_name` varchar(255) DEFAULT '',
  `contact_telephone` varchar(255) DEFAULT '',
  `contact_email` varchar(255) DEFAULT '',
  `hotel` varchar(255) DEFAULT '',
  `nature` varchar(255) DEFAULT '',
  `details` varchar(255) DEFAULT '',
  `outcome` varchar(255) DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(10) DEFAULT '0',
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10791 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `querys`
--

LOCK TABLES `querys` WRITE;
/*!40000 ALTER TABLE `querys` DISABLE KEYS */;
/*!40000 ALTER TABLE `querys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rooms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `is_master` tinyint(1) NOT NULL DEFAULT '0',
  `hotel_id` varchar(255) NOT NULL DEFAULT '',
  `date` varchar(255) NOT NULL DEFAULT '',
  `number` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(10) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `room_rate` decimal(10,2) NOT NULL DEFAULT '0.00',
  `attriton_rate` decimal(10,2) NOT NULL DEFAULT '0.00',
  `sell_rate` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `hotel_date` (`hotel_id`,`date`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=184 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rooms`
--

LOCK TABLES `rooms` WRITE;
/*!40000 ALTER TABLE `rooms` DISABLE KEYS */;
INSERT INTO `rooms` VALUES (1,1,'2','Apr/05/2014',1,'2013-09-02 07:49:28',7,'2013-09-02 07:49:28',7,0.00,0.00,0.00),(2,1,'2','Apr/06/2014',1,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(3,1,'2','Apr/07/2014',1,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(4,1,'2','Apr/08/2014',1,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(5,1,'2','Apr/09/2014',1,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(6,1,'2','Apr/10/2014',1,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(7,1,'2','Apr/11/2014',1,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(8,1,'2','Apr/12/2014',1,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(9,1,'2','Apr/13/2014',1,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(10,1,'2','Apr/14/2014',1,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(11,1,'3','Apr/05/2014',19,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(12,1,'3','Apr/06/2014',19,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(13,1,'3','Apr/07/2014',19,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(14,1,'3','Apr/08/2014',19,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(15,1,'3','Apr/09/2014',19,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(16,1,'3','Apr/10/2014',19,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(17,1,'3','Apr/11/2014',19,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(18,1,'3','Apr/12/2014',19,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(19,1,'3','Apr/13/2014',19,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(20,1,'3','Apr/14/2014',19,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(21,1,'4','Apr/08/2014',1,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(22,1,'4','Apr/09/2014',1,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(23,1,'4','Apr/10/2014',1,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(24,1,'4','Apr/11/2014',1,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(25,1,'4','Apr/12/2014',1,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(26,1,'4','Apr/13/2014',1,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(27,1,'5','Apr/08/2014',1,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(28,1,'5','Apr/09/2014',1,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(29,1,'5','Apr/10/2014',1,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(30,1,'5','Apr/11/2014',1,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(31,1,'5','Apr/12/2014',1,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(32,1,'5','Apr/13/2014',1,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(33,1,'6','Apr/08/2014',1,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(34,1,'6','Apr/09/2014',1,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(35,1,'6','Apr/10/2014',1,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(36,1,'6','Apr/11/2014',1,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(37,1,'6','Apr/12/2014',1,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(38,1,'6','Apr/13/2014',1,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(39,1,'7','Apr/08/2014',8,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(40,1,'7','Apr/09/2014',8,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(41,1,'7','Apr/10/2014',8,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(42,1,'7','Apr/11/2014',8,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(43,1,'7','Apr/12/2014',8,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(44,1,'7','Apr/13/2014',8,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(45,1,'8','Apr/08/2014',15,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(46,1,'8','Apr/09/2014',15,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(47,1,'8','Apr/10/2014',15,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(48,1,'8','Apr/11/2014',15,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(49,1,'8','Apr/12/2014',15,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(50,1,'8','Apr/13/2014',15,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(51,1,'9','Apr/08/2014',1,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(52,1,'9','Apr/09/2014',1,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(53,1,'9','Apr/10/2014',1,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(54,1,'9','Apr/11/2014',1,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(55,1,'9','Apr/12/2014',1,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(56,1,'9','Apr/13/2014',1,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(57,1,'10','Apr/08/2014',1,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(58,1,'10','Apr/09/2014',1,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(59,1,'10','Apr/10/2014',1,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(60,1,'10','Apr/11/2014',1,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(61,1,'10','Apr/12/2014',1,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(62,1,'10','Apr/13/2014',1,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(63,1,'11','Apr/09/2014',74,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(64,1,'11','Apr/10/2014',74,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(65,1,'11','Apr/11/2014',74,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(66,1,'11','Apr/12/2014',74,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(67,1,'11','Apr/13/2014',94,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(68,1,'12','Apr/09/2014',94,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(69,1,'12','Apr/10/2014',94,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(70,1,'12','Apr/11/2014',94,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(71,1,'12','Apr/12/2014',94,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(72,1,'12','Apr/13/2014',94,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(73,1,'13','Apr/09/2014',49,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(74,1,'13','Apr/10/2014',49,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(75,1,'13','Apr/11/2014',49,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(76,1,'13','Apr/12/2014',49,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(77,1,'13','Apr/13/2014',49,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(78,1,'14','Apr/09/2014',60,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(79,1,'14','Apr/10/2014',60,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(80,1,'14','Apr/11/2014',60,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(81,1,'14','Apr/12/2014',60,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(82,1,'14','Apr/13/2014',60,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(83,1,'15','Apr/05/2014',20,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(84,1,'15','Apr/06/2014',20,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(85,1,'15','Apr/07/2014',20,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(86,1,'15','Apr/08/2014',20,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(87,1,'15','Apr/09/2014',20,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(88,1,'15','Apr/10/2014',20,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(89,1,'15','Apr/11/2014',20,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(90,1,'15','Apr/12/2014',20,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(91,1,'15','Apr/13/2014',20,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(92,1,'15','Apr/14/2014',20,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(93,1,'16','Apr/08/2014',15,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(94,1,'16','Apr/09/2014',15,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(95,1,'16','Apr/10/2014',15,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(96,1,'16','Apr/11/2014',15,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(97,1,'16','Apr/12/2014',15,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(98,1,'16','Apr/13/2014',15,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(99,1,'17','Apr/08/2014',8,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(100,1,'17','Apr/09/2014',8,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(101,1,'17','Apr/10/2014',8,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(102,1,'17','Apr/11/2014',8,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(103,1,'17','Apr/12/2014',8,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(104,1,'17','Apr/13/2014',8,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(105,1,'18','Apr/08/2014',5,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(106,1,'18','Apr/09/2014',5,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(107,1,'18','Apr/10/2014',5,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(108,1,'18','Apr/11/2014',5,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(109,1,'18','Apr/12/2014',5,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(110,1,'18','Apr/13/2014',5,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(111,1,'19','Apr/09/2014',127,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(112,1,'19','Apr/10/2014',127,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(113,1,'19','Apr/11/2014',127,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(114,1,'19','Apr/12/2014',127,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(115,1,'19','Apr/13/2014',127,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(116,1,'20','Apr/05/2014',20,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(117,1,'20','Apr/06/2014',20,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(118,1,'20','Apr/07/2014',20,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(119,1,'20','Apr/08/2014',20,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(120,1,'20','Apr/09/2014',20,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(121,1,'20','Apr/10/2014',20,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(122,1,'20','Apr/11/2014',20,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(123,1,'20','Apr/12/2014',20,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(124,1,'20','Apr/13/2014',20,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(125,1,'20','Apr/14/2014',20,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(126,1,'21','Apr/08/2014',10,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(127,1,'21','Apr/09/2014',10,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(128,1,'21','Apr/10/2014',10,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(129,1,'21','Apr/11/2014',10,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(130,1,'21','Apr/12/2014',10,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(131,1,'21','Apr/13/2014',10,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(132,1,'22','Apr/08/2014',10,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(133,1,'22','Apr/09/2014',10,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(134,1,'22','Apr/10/2014',10,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(135,1,'22','Apr/11/2014',10,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(136,1,'22','Apr/12/2014',10,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(137,1,'22','Apr/13/2014',10,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(138,1,'23','Apr/08/2014',3,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(139,1,'23','Apr/09/2014',3,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(140,1,'23','Apr/10/2014',3,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(141,1,'23','Apr/11/2014',3,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(142,1,'23','Apr/12/2014',3,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(143,1,'23','Apr/13/2014',3,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(144,1,'24','Apr/08/2014',3,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(145,1,'24','Apr/09/2014',3,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(146,1,'24','Apr/10/2014',3,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(147,1,'24','Apr/11/2014',3,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(148,1,'24','Apr/12/2014',3,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(149,1,'24','Apr/13/2014',3,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(150,1,'25','Apr/08/2014',2,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(151,1,'25','Apr/09/2014',2,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(152,1,'25','Apr/10/2014',2,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(153,1,'25','Apr/11/2014',2,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(154,1,'25','Apr/12/2014',2,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(155,1,'25','Apr/13/2014',2,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(156,1,'26','Apr/08/2014',1,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(157,1,'26','Apr/09/2014',1,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(158,1,'26','Apr/10/2014',1,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(159,1,'26','Apr/11/2014',1,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(160,1,'26','Apr/12/2014',1,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(161,1,'26','Apr/13/2014',1,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(162,1,'27','Apr/08/2014',1,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(163,1,'27','Apr/09/2014',1,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(164,1,'27','Apr/10/2014',1,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(165,1,'27','Apr/11/2014',1,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(166,1,'27','Apr/12/2014',1,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(167,1,'27','Apr/13/2014',1,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(168,1,'28','Apr/08/2014',9,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(169,1,'28','Apr/09/2014',9,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(170,1,'28','Apr/10/2014',9,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(171,1,'28','Apr/11/2014',9,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(172,1,'28','Apr/12/2014',9,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(173,1,'28','Apr/13/2014',9,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(174,1,'29','Apr/09/2014',100,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(175,1,'29','Apr/10/2014',100,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(176,1,'29','Apr/11/2014',100,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(177,1,'29','Apr/12/2014',100,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(178,1,'29','Apr/13/2014',100,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(179,1,'30','Apr/09/2014',127,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(180,1,'30','Apr/10/2014',127,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(181,1,'30','Apr/11/2014',127,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(182,1,'30','Apr/12/2014',127,NULL,NULL,NULL,NULL,0.00,0.00,0.00),(183,1,'30','Apr/13/2014',127,NULL,NULL,NULL,NULL,0.00,0.00,0.00);
/*!40000 ALTER TABLE `rooms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tour_guests`
--

DROP TABLE IF EXISTS `tour_guests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tour_guests` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tour_id` int(10) unsigned NOT NULL,
  `seat_id` int(10) unsigned NOT NULL,
  `guest_id` int(10) unsigned NOT NULL,
  `order_date` char(11) NOT NULL DEFAULT '',
  `ampm` varchar(15) NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(10) DEFAULT '0',
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tour_guests`
--

LOCK TABLES `tour_guests` WRITE;
/*!40000 ALTER TABLE `tour_guests` DISABLE KEYS */;
INSERT INTO `tour_guests` VALUES (6,47,532,777,'2014-04-12','',NULL,0,NULL,0),(5,44,522,777,'2014-04-11','',NULL,0,NULL,0),(7,50,544,778,'2014-04-10','',NULL,0,NULL,0),(8,46,530,783,'2014-04-12','',NULL,0,NULL,0),(9,64,624,786,'2014-04-11','',NULL,0,NULL,0);
/*!40000 ALTER TABLE `tour_guests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tour_seats`
--

DROP TABLE IF EXISTS `tour_seats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tour_seats` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tour_id` int(10) unsigned NOT NULL,
  `order_date` char(11) NOT NULL DEFAULT '',
  `ampm` varchar(15) NOT NULL DEFAULT '',
  `total_seats` tinyint(4) NOT NULL DEFAULT '0',
  `optional_seats` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(10) DEFAULT '0',
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(10) DEFAULT '0',
  `begin_time` char(8) NOT NULL DEFAULT '0:00',
  `end_time` char(8) NOT NULL DEFAULT '0:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=643 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tour_seats`
--

LOCK TABLES `tour_seats` WRITE;
/*!40000 ALTER TABLE `tour_seats` DISABLE KEYS */;
INSERT INTO `tour_seats` VALUES (509,40,'2014-04-12','Day',120,119,NULL,0,'2013-10-17 03:22:52',10777,'07:15','17:15'),(510,41,'2014-04-11','Day',20,20,NULL,0,NULL,0,'11:00','16:45'),(511,41,'2014-04-12','Day',20,20,NULL,0,NULL,0,'11:00','16:45'),(512,41,'2014-04-13','Day',20,20,NULL,0,NULL,0,'11:00','16:45'),(513,42,'2014-04-12','Day',120,120,NULL,0,NULL,0,'07:30','17:15'),(514,42,'2014-04-13','Day',120,120,NULL,0,'2013-09-12 18:01:23',10768,'07:30','17:15'),(515,43,'2014-04-10','pm',30,30,NULL,0,'2013-10-17 03:24:54',10777,'13:30','15:00'),(516,43,'2014-04-11','am',30,30,NULL,0,NULL,0,'11:30','13:00'),(517,43,'2014-04-11','pm',30,29,NULL,0,'2013-10-25 08:02:23',10780,'13:30','15:00'),(518,43,'2014-04-12','am',30,30,NULL,0,NULL,0,'09:30','11:00'),(519,43,'2014-04-12','am',30,29,NULL,0,'2013-09-12 20:27:13',10768,'11:30','13:00'),(520,43,'2014-04-13','am',30,30,NULL,0,NULL,0,'11:30','13:00'),(521,43,'2014-04-13','pm',30,30,NULL,0,NULL,0,'13:30','15:00'),(522,44,'2014-04-11','pm',15,14,NULL,0,'2013-09-12 20:29:35',10768,'13:30','17:15'),(523,44,'2014-04-12','pm',15,15,NULL,0,NULL,0,'13:30','17:15'),(524,44,'2014-04-13','pm',15,14,NULL,0,'2013-10-25 08:02:41',10780,'13:30','17:15'),(525,45,'2014-04-11','pm',12,12,NULL,0,NULL,0,'12:45','15:45'),(526,45,'2014-04-12','am',12,11,NULL,0,'2013-10-25 08:02:56',10780,'08:45','11:45'),(527,45,'2014-04-13','pm',12,12,NULL,0,'2013-09-12 19:38:41',10768,'12:45','15:45'),(528,46,'2014-04-10','pm',30,30,NULL,0,NULL,0,'13:00','14:35'),(529,46,'2014-04-11','pm',30,30,NULL,0,'2013-09-12 07:05:22',10768,'13:00','14:35'),(530,46,'2014-04-12','am',30,28,NULL,0,'2013-10-25 08:03:02',10780,'09:00','11:20'),(531,47,'2014-04-11','pm',40,39,NULL,0,'2013-10-25 08:03:16',10780,'11:30','15:00'),(532,47,'2014-04-12','pm',40,39,NULL,0,'2013-09-12 20:33:59',10768,'11:30','15:00'),(533,47,'2014-04-13','pm',40,39,NULL,0,'2013-10-25 08:03:09',10780,'11:30','15:00'),(534,48,'2014-04-10','pm',56,55,NULL,0,'2013-09-12 20:24:26',10768,'12:30','16:30'),(535,48,'2014-04-11','pm',56,56,NULL,0,NULL,0,'12:30','16:30'),(536,48,'2014-04-12','am',112,112,NULL,0,NULL,0,'09:00','13:00'),(537,48,'2014-04-12','pm',112,112,NULL,0,NULL,0,'12:30','16:30'),(538,48,'2014-04-13','am',56,56,NULL,0,NULL,0,'09:00','13:00'),(539,48,'2014-04-13','pm',56,56,NULL,0,NULL,0,'12:30','16:30'),(540,49,'2014-04-10','pm',60,60,NULL,0,NULL,0,'13:45','15:30'),(541,49,'2014-04-11','pm',40,40,NULL,0,NULL,0,'13:45','15:30'),(542,49,'2014-04-12','pm',40,40,NULL,0,NULL,0,'13:45','15:30'),(543,49,'2014-04-13','pm',40,40,NULL,0,NULL,0,'13:45','15:30'),(544,50,'2014-04-10','pm',24,22,NULL,0,'2013-10-15 10:59:03',10765,'13:00','15:30'),(545,50,'2014-04-10','pm',24,24,NULL,0,NULL,0,'14:30','17:00'),(546,50,'2014-04-11','pm',12,12,NULL,0,NULL,0,'12:00','14:00'),(547,50,'2014-04-11','pm',24,24,NULL,0,NULL,0,'13:00','15:30'),(548,50,'2014-04-11','pm',24,24,NULL,0,NULL,0,'14:30','17:00'),(549,50,'2014-04-12','am',12,12,NULL,0,NULL,0,'10:30','12:30'),(550,50,'2014-04-12','am',12,12,NULL,0,NULL,0,'11:00','13:00'),(551,50,'2014-04-12','pm',24,24,NULL,0,NULL,0,'13:00','15:30'),(552,50,'2014-04-12','pm',24,24,NULL,0,'2013-09-12 07:05:20',10768,'14:30','17:00'),(553,50,'2014-04-13','pm',24,24,NULL,0,NULL,0,'13:00','15:30'),(554,50,'2014-04-13','pm',24,24,NULL,0,NULL,0,'14:30','17:00'),(555,51,'2014-04-11','pm',100,100,NULL,0,NULL,0,'13:00','17:15'),(556,51,'2014-04-12','pm',100,100,NULL,0,NULL,0,'13:00','17:15'),(557,51,'2014-04-13','pm',100,100,NULL,0,NULL,0,'13:00','17:15'),(558,52,'2014-04-10','pm',20,20,NULL,0,NULL,0,'14:40','14:55'),(559,52,'2014-04-10','pm',20,20,NULL,0,NULL,0,'15:10','15:25'),(560,52,'2014-04-10','pm',20,20,NULL,0,NULL,0,'16:30','16:45'),(561,52,'2014-04-10','pm',20,20,NULL,0,NULL,0,'17:00','17:15'),(562,52,'2014-04-11','pm',20,20,NULL,0,NULL,0,'13:00','13:15'),(563,52,'2014-04-11','pm',20,20,NULL,0,NULL,0,'13:25','13:40'),(564,52,'2014-04-11','pm',20,20,NULL,0,NULL,0,'13:50','14:05'),(565,52,'2014-04-11','pm',20,20,NULL,0,NULL,0,'14:15','14:30'),(566,52,'2014-04-11','pm',20,20,NULL,0,NULL,0,'14:40','14:55'),(567,52,'2014-04-12','am',20,20,NULL,0,NULL,0,'10:15','11:30'),(568,52,'2014-04-12','am',20,20,NULL,0,NULL,0,'11:40','11:55'),(569,52,'2014-04-12','pm',20,20,NULL,0,NULL,0,'13:00','13:15'),(570,52,'2014-04-12','pm',20,20,NULL,0,NULL,0,'13:25','13:40'),(571,52,'2014-04-13','pm',20,20,NULL,0,NULL,0,'13:00','13:15'),(572,52,'2014-04-13','pm',20,20,NULL,0,NULL,0,'13:25','13:40'),(573,52,'2014-04-13','pm',20,20,NULL,0,NULL,0,'13:50','14:05'),(574,52,'2014-04-13','pm',20,20,NULL,0,NULL,0,'14:15','14:30'),(575,53,'2014-04-11','pm',20,20,NULL,0,NULL,0,'12:15','16:15'),(576,53,'2014-04-12','am',20,20,NULL,0,NULL,0,'09:45','13:45'),(577,54,'2014-04-11','am',42,42,NULL,0,NULL,0,'10:30','14:30'),(578,54,'2014-04-12','am',42,42,NULL,0,NULL,0,'09:15','13:15'),(579,54,'2014-04-12','am',42,42,NULL,0,NULL,0,'10:30','14:30'),(580,55,'2014-04-11','pm',20,20,NULL,0,NULL,0,'13:45','15:15'),(581,55,'2014-04-12','am',20,20,NULL,0,NULL,0,'09:45','11:45'),(582,55,'2014-04-12','pm',20,20,NULL,0,NULL,0,'13:45','15:15'),(583,55,'2014-04-13','am',20,20,NULL,0,NULL,0,'09:45','11:45'),(584,55,'2014-04-13','pm',20,19,NULL,0,'2013-10-15 12:34:07',10770,'13:45','15:15'),(585,56,'2014-04-10','pm',20,20,NULL,0,NULL,0,'13:15','16:30'),(586,56,'2014-04-11','pm',20,20,NULL,0,NULL,0,'13:15','16:30'),(587,56,'2014-04-12','am',20,20,NULL,0,NULL,0,'08:00','23:00'),(588,56,'2014-04-13','am',20,20,NULL,0,NULL,0,'08:00','23:00'),(589,57,'2014-04-11','pm',20,20,NULL,0,NULL,0,'13:30','17:15'),(590,57,'2014-04-12','pm',20,20,NULL,0,NULL,0,'13:30','17:15'),(591,57,'2014-04-13','pm',20,20,NULL,0,NULL,0,'13:30','17:15'),(592,58,'2014-04-11','pm',20,20,NULL,0,NULL,0,'13:15','16:15'),(593,58,'2014-04-12','am',20,20,NULL,0,NULL,0,'08:00','22:45'),(594,58,'2014-04-13','pm',20,19,NULL,0,'2013-10-10 07:54:11',7,'13:15','16:15'),(595,59,'2014-04-11','pm',30,30,NULL,0,NULL,0,'12:30','15:00'),(596,59,'2014-04-11','pm',30,30,NULL,0,NULL,0,'13:45','16:15'),(597,59,'2014-04-12','am',30,30,NULL,0,NULL,0,'09:30','12:00'),(598,59,'2014-04-12','am',30,30,NULL,0,NULL,0,'10:45','13:15'),(599,59,'2014-04-13','am',30,30,NULL,0,NULL,0,'10:45','13:15'),(600,60,'2014-04-10','pm',21,21,NULL,0,NULL,0,'14:15','15:30'),(601,60,'2014-04-11','pm',21,21,NULL,0,NULL,0,'13:00','14:15'),(602,60,'2014-04-11','pm',21,21,NULL,0,NULL,0,'13:45','15:00'),(603,60,'2014-04-12','am',21,21,NULL,0,NULL,0,'10:15','11:30'),(604,60,'2014-04-12','am',21,21,NULL,0,NULL,0,'10:45','12:00'),(605,60,'2014-04-12','pm',21,21,NULL,0,NULL,0,'13:00','14:15'),(606,60,'2014-04-13','pm',21,21,NULL,0,NULL,0,'13:00','14:15'),(607,60,'2014-04-13','pm',21,21,NULL,0,NULL,0,'13:45','15:00'),(608,60,'2014-04-13','pm',21,21,NULL,0,NULL,0,'14:15','15:30'),(609,61,'2014-04-10','pm',20,20,NULL,0,NULL,0,'14:30','16:30'),(610,61,'2014-04-11','pm',20,20,NULL,0,NULL,0,'14:30','16:30'),(611,61,'2014-04-12','am',20,20,NULL,0,NULL,0,'09:30','12:00'),(612,61,'2014-04-13','am',20,20,NULL,0,NULL,0,'09:30','12:00'),(613,62,'2014-04-11','pm',100,100,NULL,0,NULL,0,'12:00','16:00'),(614,62,'2014-04-13','pm',100,100,NULL,0,NULL,0,'12:00','16:00'),(615,63,'2014-04-10','am',12,12,NULL,0,NULL,0,'08:00','12:45'),(616,63,'2014-04-10','pm',12,12,NULL,0,NULL,0,'12:45','17:45'),(617,63,'2014-04-11','pm',12,11,NULL,0,'2013-10-16 12:28:58',10773,'12:45','17:45'),(618,63,'2014-04-12','am',12,12,NULL,0,NULL,0,'08:00','12:45'),(619,63,'2014-04-12','pm',12,12,NULL,0,NULL,0,'12:45','17:45'),(620,63,'2014-04-13','am',12,12,NULL,0,NULL,0,'08:00','12:45'),(621,63,'2014-04-13','pm',12,12,NULL,0,NULL,0,'12:45','17:45'),(622,64,'2014-04-10','am',6,6,NULL,0,NULL,0,'08:00','12:45'),(623,64,'2014-04-10','pm',6,6,NULL,0,NULL,0,'13:15','17:45'),(624,64,'2014-04-11','pm',6,5,NULL,0,'2013-10-16 12:35:56',10773,'13:15','17:45'),(625,64,'2014-04-12','am',6,6,NULL,0,NULL,0,'08:00','12:45'),(626,64,'2014-04-12','pm',6,6,NULL,0,NULL,0,'13:15','17:45'),(627,64,'2014-04-13','am',6,6,NULL,0,NULL,0,'08:00','12:45'),(628,64,'2014-04-13','pm',6,6,NULL,0,NULL,0,'13:15','17:45'),(629,65,'2014-04-10','am',12,12,NULL,0,NULL,0,'08:00','12:45'),(630,65,'2014-04-10','pm',12,12,NULL,0,NULL,0,'13:15','17:45'),(631,65,'2014-04-11','pm',16,16,NULL,0,NULL,0,'14:15','18:45'),(632,65,'2014-04-12','am',12,12,NULL,0,NULL,0,'08:00','12:45'),(633,65,'2014-04-12','pm',12,12,NULL,0,NULL,0,'13:15','17:45'),(634,65,'2014-04-13','am',12,12,NULL,0,NULL,0,'08:00','12:45'),(635,65,'2014-04-13','pm',12,12,NULL,0,NULL,0,'13:15','17:45'),(636,66,'2014-04-10','am',24,24,NULL,0,NULL,0,'08:00','12:45'),(637,66,'2014-04-10','pm',24,24,NULL,0,NULL,0,'12:45','17:45'),(638,66,'2014-04-11','pm',24,24,NULL,0,NULL,0,'12:45','17:45'),(639,66,'2014-04-12','am',18,18,NULL,0,NULL,0,'08:00','12:45'),(640,66,'2014-04-12','pm',18,18,NULL,0,NULL,0,'12:45','17:45'),(641,66,'2014-04-13','am',18,18,NULL,0,NULL,0,'08:00','12:45'),(642,66,'2014-04-13','pm',18,18,NULL,0,NULL,0,'12:45','17:45');
/*!40000 ALTER TABLE `tour_seats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tour_users`
--

DROP TABLE IF EXISTS `tour_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tour_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tour_id` int(10) unsigned NOT NULL,
  `seat_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `order_date` char(11) NOT NULL DEFAULT '',
  `ampm` varchar(15) NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(10) DEFAULT '0',
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tour_users`
--

LOCK TABLES `tour_users` WRITE;
/*!40000 ALTER TABLE `tour_users` DISABLE KEYS */;
INSERT INTO `tour_users` VALUES (49,43,519,10768,'2014-04-12','','2013-09-12 20:27:13',10768,'2013-09-12 20:27:13',10768),(48,48,534,10768,'2014-04-10','','2013-09-12 20:24:26',10768,'2013-09-12 20:24:26',10768),(50,58,594,10766,'','','2013-10-10 07:54:11',7,'2013-10-10 07:54:11',7),(51,50,544,10765,'2014-04-10','','2013-10-15 10:58:29',10765,'2013-10-15 10:58:29',10765),(52,55,584,10770,'2014-04-13','','2013-10-15 12:34:07',10770,'2013-10-15 12:34:07',10770),(53,63,617,10773,'2014-04-11','','2013-10-16 12:28:58',10773,'2013-10-16 12:28:58',10773),(54,40,509,10777,'2014-04-12','','2013-10-17 03:22:52',10777,'2013-10-17 03:22:52',10777);
/*!40000 ALTER TABLE `tour_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tours`
--

DROP TABLE IF EXISTS `tours`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tours` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `image` varchar(255) NOT NULL DEFAULT '',
  `description` text,
  `price` text,
  `duration` varchar(255) NOT NULL DEFAULT '',
  `minimum` varchar(255) NOT NULL DEFAULT '',
  `maximum` varchar(255) NOT NULL DEFAULT '',
  `begin_date` char(11) NOT NULL DEFAULT '',
  `end_date` char(11) NOT NULL DEFAULT '',
  `ampm` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:am;1:pm,2:both',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(10) DEFAULT '0',
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(10) DEFAULT '0',
  `type` char(10) NOT NULL DEFAULT 'T1',
  `category` varchar(32) NOT NULL DEFAULT '',
  `short_description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tours`
--

LOCK TABLES `tours` WRITE;
/*!40000 ALTER TABLE `tours` DISABLE KEYS */;
INSERT INTO `tours` VALUES (40,'Hunter Valley WineTour','/uploads/image.png','Taste the Australian bush and some of the country’s finest food and wines on this adventure to the Hunter Valley.',NULL,'','','','','',0,NULL,0,NULL,0,'Wallabies','Food & Drink','Taste the Australian bush and some of the country’s finest food and wines on this adventure to the Hunter Valley.   \r\nStop off at The Australian Reptile Park for Morning Tea, surrounded by kangaroos and wallabies.  Departing the park we head further north via the freeway to the Hunter Valley.  \r\nThe Hunter Valley has over 150 top class wineries and is highly regarded on a global basis. In the morning we will visit two well-known and unique wineries (groups split).  \r\nGuests will enjoy lunch at The Hunter, where food and wine is matched.  Your tasting plate will “marry” with the wines specifically selected.  \r\nMid afternoon we depart from the Hunter Valley back to Sydney on the freeway where you will arrive at your hotel in the late afternoon. '),(41,'Golf','/uploads/Golf2.jpg','A spectacular group one links shaped by nature, lies along the massive cliff tops of the Pacific Coast adjacent to Botany Bay with breathtaking views. ',NULL,'','','','','',0,NULL,0,NULL,0,'Wallabies','Golf','A spectacular group one links shaped by nature, lies along the massive cliff tops of the Pacific Coast adjacent to Botany Bay with breathtaking views. '),(42,'Blue Mountains','/uploads/Blue_mountains2.jpg','Discover the World Heritage-listed Blue Mountains on a small group tour.',NULL,'','','','','',0,NULL,0,NULL,0,'Wallabies','Iconic Tours','Discover the World Heritage-listed Blue Mountains on a small group tour. This adventure brings with the opportunity to meet unique native animals at Featherdale Wildlife Park. Guests will continue and journey deep within the Blue Mountains, breathe in the essence of the Australian Eucalyptus while your friendly guide explains the unique qualities of our Aussie bush.  \r\nMorning Tea this morning will be at Bilpin, which is a well-known fruit orchard area. Afterwards, take in the scenic Bell Line of Road with views over the Grose canyon, with its towering sandstone walls descending into the canyon.  Your Lunch stop will be at the Katoomba Golf Club – buffet style including beverages (1hrs stop).  \r\nVisit Scenic World where you will glide to the valley floor aboard the steepest aerial cable car you can imagine.   Enjoy a short walk through the natural wonders of a cool temperate rain forest.   \r\nVisit the Waradah Aboriginal Centre and learn about Australian Aboriginal Culture.  Travel back down the mountain to HomeBush Terminal and you will board a Rivercat Ferry to Circular Quay.  On arrival at Circular Quay you will make your way to your hotel. '),(43,'Sydney by Harley Bikes','/uploads/Sydney_by_Harley2.jpg','A Harley Tour is a fun way to see and experience daily life in Sydney and the surrounding suburbs.   \r\nYou and your Harley will cruise through the city and up through the tree lined streets of trendy Potts Point and Paddington as you make your way to Bondi Beach before heading back into the city.  \r\nThis will be the ride of your life! ',NULL,'','','','','',0,NULL,0,NULL,0,'Kangaroos','Bike Activities','A Harley Tour is a fun way to see and experience daily life in Sydney and the surrounding suburbs. '),(44,'Manly Bike & Beer Tour','/uploads/Manly_Bike_Tours2.jpg','Cruise along world famous Manly Beach on a Schwinn \'beach cruiser\' bike. Follow the dedicated bike path along the ocean promenade and past the Mediterranean style villas along Cabbage Tree Bay to picturesque Shelly Beach.',NULL,'','','','','',0,NULL,0,NULL,0,'Kangaroos','Bike Activities','Cruise along world famous Manly Beach on a Schwinn \'beach cruiser\' bike. '),(45,'Sydney Biking Tour','/uploads/sydney_bike2.jpg','Cruise along world famous Manly Beach on a Schwinn \'beach cruiser\' bike. Follow the dedicated bike path along the ocean promenade and past the Mediterranean style villas along Cabbage Tree Bay to picturesque Shelly Beach.   \r\nTake a leisurely ride back down the main beach past the Manly Corso, named by the locals as the “Hole in the Wall” and Manly Lagoon.  Here you will enjoy lunch and a drink at one of Australia\'s foremost micro-breweries - 4 Pines at Manly.   Following lunch, grab a ferry direct from the beach to Circular Quay',NULL,'','','','','',0,NULL,0,NULL,0,'Kangaroos','Bike Activities','Cruise along world famous Manly Beach on a Schwinn \'beach cruiser\' bike. '),(46,'Botanical Gardens Tour','/uploads/Botanical_Garden2.jpg','The Royal Botanic Gardens, which are just a short walk around the water\'s edge from the Sydney Opera House, is one of the most breathtakingly beautiful settings you will see anywhere, with the gardens filling an area of land between the harbour and the eastern part of the central business district. The gardens sit on the side of an undulating piece of land and the harbour views from up on the hill are superb. There are large trees with a wonderful shade canvas and this makes the best spot imaginable to stop and have lunch - sitting on the grass and taking in the harbour views.   \r\nSydney’s Royal Botanical Gardens are a delight to experience, especially in the morning as the early light showcases the trees, shrubs and flowers.  A naturalist guide will take guests through the heart of the gardens, explaining the layout and providing the history of the park and the origin of many of the best specimens. ',NULL,'','','','','',0,NULL,0,NULL,0,'Kangaroos','Iconic Tours','The Royal Botanic Gardens, which are just a short walk around the water\'s edge from the Sydney Opera House, is one of the most breathtakingly beautiful settings you will see anywhere.'),(47,'Cooking Classes','/uploads/Cooking_Lesson2.jpg','Whip up tasty seafood BBQ using the freshest of Australian seafood. By the end of this lunch class you’ll be able to BBQ fish, shellfish and squid to perfection.  Of course you get to enjoy the food that has been prepared. ',NULL,'','','','','',0,NULL,0,NULL,0,'Kangaroos','Food & Drink','Whip up tasty seafood BBQ using the freshest of Australian seafood. '),(48,'Sydney Bridgeclimb','/uploads/Sydney_Bridge_Climb2.jpg','If guests are seeking excitement, the best view in town and a special feeling of achievement, then they should sign up for an exhilarating climb of one of Sydney’s most famous landmarks! During this adventure guests will ascend to the top of the Bridge and stand over 130 metres above sea level.  \r\nNot only is the view breathtaking, but guests will also have a close encounter with one of Sydney’s historical gems and an engineering wonder of the world. Guests will be provided with a specially designed bridge suit, safety grip shoes and a harness.   \r\nThe harness is linked to a static line that keeps guests within safe areas of the Bridge at all times. There are also handrails for support on most parts of the climb. A specially trained guide will explain safety procedures before and during the climb. ',NULL,'','','','','',0,NULL,0,NULL,0,'Wallabies','Iconic Tours','Seeking excitement and a special feeling of achievement? Then sign up for an exhilarating climb of one of Sydney’s most famous landmarks!'),(49,'Sydney Opera House Tour','/uploads/Sydney_Opera_House2.jpg','This is a once in a lifetime opportunity to venture inside one of the great architectural masterpieces of the 20th Century! The Sydney Opera House sits on Bennelong Point surrounded by the beautiful Sydney Harbour. You will learn the story of the Danish Architect Joern Utzon who originally designed this magnificent building. Since opening in 1973 the Sydney Opera House has been host to some of the most memorable artistic performances of our time.  \r\nThis is a 60 minute tour offering guests the opportunity to explore the Sydney Opera House in its daily operation. Learn about the fascinating history of the House and be introduced to the Australian performing arts scene. ',NULL,'','','','','',0,NULL,0,NULL,0,'Kangaroos','Iconic Tours','This is a once in a lifetime opportunity to venture inside one of the great architectural masterpieces of the 20th Century!'),(50,'Sydney by Helicopter ','/uploads/Sydney_by_Helicopter2.jpg','Your helicopter flight experience begins with a warm greeting and check-in by our friendly operations staff. This is followed by a comprehensive safety briefing in our spacious and comfortable lounge area at Sydney airport prior to boarding your flight. \r\nUpon takeoff enjoy full panoramic views of the Sydney skyline, Pacific Ocean and the historic Port of Botany Bay. Within minutes your experienced and skilled pilot will have you above the glistening waters our beaches and harbour, tracking north over the water at 500 feet.  \r\nYou will contour fly the picturesque coastline of the Eastern Suburbs beaches including Coogee and Clovelly, and also the world famous Bondi Beach. Admire the spectacular houses of Dover Heights perched on the sandstone cliffs as you continue towards Sydney Heads, the gateway to Sydney Harbour. \r\nYour pilot will guide your aircraft above the magnificent Sydney Harbour giving you an amazing view of our unique icons and points of interest such as the Sydney Harbour Bridge, Sydney Opera House. ',NULL,'','','','','',0,NULL,0,NULL,0,'Wallabies','Tours by Air','Upon takeoff enjoy full panoramic views of the Sydney skyline, Pacific Ocean and the historic Port of Botany Bay.'),(51,'Sailing Regatta','/uploads/Sailing_Regatta2.jpg','A Sailing Regatta offers a unique and thrilling way to experience Sydney Harbour. Participants sail aboard performance Beneteau and Sydney yachts. Each team is led by a highly qualified and experienced skipper who will guide and encourage everyone to take an active part in the steering and sailing of the yacht.   \r\nThe regatta experience begins with a welcome race briefing for all guests on the marina. The crews are introduced to their skippers who then give an orientation aboard the yachts. Crews comprise 8-12 people on each yacht.  All crew are encouraged to participate in the sailing of the yacht, no experience is necessary.  \r\nCrews rehearse sailing manoeuvres as they make their way to the start area near the Opera House. Ten minutes from the start, yachts will begin to jockey for the best position on the start line and then the race begins. The course is strategically planned for the prevailing winds and to take the yachts to many of Sydney Harbour’s best attractions. ',NULL,'','','','','',0,NULL,0,NULL,0,'Wallabies','Water Activities','A Sailing Regatta offers a unique and thrilling way to experience Sydney Harbour.'),(52,'Sydney by Seaplane','/uploads/Sydney_by_Seaplanes2.jpg','“Sydney from above” is one of the most spectacular life experiences you could ever have.  Fly from the harbourside suburb of Rose Bay you will fly over the stunning city of Sydney as you head towards Bondi Beach.  You feel as though you can literally touch the surfers below.  From Bondi Beach we track back over the harbour and head for the opera House and Sydney Harbour Bridge.  As you descend back into Rose Bay you will get a glimpse of the beautiful mansions that line the foreshore. ',NULL,'','','','','',0,NULL,0,NULL,0,'Wallabies','Tours by Air','“Sydney from above” is one of the most spectacular life experiences you could ever have.'),(53,'Sydney Fashion Secrets','/uploads/Fashion_Sydney2.jpg','This tour focuses on the upmarket enclaves in Paddington, Sydney’s renowned fashion destination.  Packed with interesting treasures on every corner, we will take you to Australian designer flagship stores, intimate boutiques and independent retailers.',NULL,'','','','','',0,NULL,0,NULL,0,'Wallabies','Spa & Fashion','This tour focuses on the upmarket enclaves in Paddington, Sydney’s renowned fashion destination.'),(54,'Sydney City Tour','/uploads/image.png','Test Long',NULL,'','','','','',0,NULL,0,NULL,0,'Kangaroos','Iconic Tours','Test short'),(55,'Rocks Walking Tour ','/uploads/rocks-sydney2.jpg','The Rocks is the oldest and most historic part of Sydney. It is a picturesque and fascinating are, well worth exploring. The Rocks history began with the landing of the first fleet in Sydney Cove in 1788, founding the colony of New South Wales. Working parties from among the 757 convicts transported from England cleared the shores of the Cove and commenced the settlement of Sydney.   \r\nIn the old days, it was an area of bawdy taverns and brothels, where thugs lurked in the dark and narrow alleys. Today it is an attractive village-like area, which houses many craft and specialty shops and restaurants. ',NULL,'','','','','',0,NULL,0,NULL,0,'Kangaroos','Iconic Tours','The Rocks is the oldest and most historic part of Sydney. It is a picturesque and fascinating are, well worth exploring.'),(56,'Sydney Harbour Kayak','/uploads/sydney_harbour_Kayaking2.jpg','Taking a Kayaking Tour with gives you the chance to you see sights only visible from the water.  Journey across the harbour waters and protected coves while your guide shares stories about the area\'s natural features and intriguing history.   Hear some tales from Middle Harbour\'s past – shipwrecks, interesting architecture, colourful rock formations, remnants of the area\'s military history.   \r\n  Paddling in safe and stable double sea- kayaks you can explore the sheltered harbour waterways.   Here you will coast past beaches, cliffs, stunning houses built on impressive inclines, then, not too far along you can continue beside relatively untouched bushland.     \r\nThe qualified and charismatic guides will lead you on this amazing experience. You will be able to take a well-earned break on one of Middle Harbour’s pristine beaches where your guide will brew fresh coffee.  \r\nTaking a Kayaking Tour with gives you the chance to you see sights only visible from the water.  Journey across the harbour waters and protected coves while your guide shares stories about the area\'s natural features and intriguing history.   Hear some tales from Middle Harbour\'s past – shipwrecks, interesting architecture, colourful rock formations, remnants of the area\'s military history.   \r\n  Paddling in safe and stable double sea- kayaks you can explore the sheltered harbour waterways.   Here you will coast past beaches, cliffs, stunning houses built on impressive inclines, then, not too far along you can continue beside relatively untouched bushland.     \r\nThe qualified and charismatic guides will lead you on this amazing experience. You will be able to take a well-earned break on one of Middle Harbour’s pristine beaches where your guide will brew fresh coffee.  \r\nTaking a Kayaking Tour with gives you the chance to you see sights only visible from the water.  Journey across the harbour waters and protected coves while your guide shares stories about the area\'s natural features and intriguing history.   Hear some tales from Middle Harbour\'s past – shipwrecks, interesting architecture, colourful rock formations, remnants of the area\'s military history.   \r\n  Paddling in safe and stable double sea- kayaks you can explore the sheltered harbour waterways.   Here you will coast past beaches, cliffs, stunning houses built on impressive inclines, then, not too far along you can continue beside relatively untouched bushland.     \r\nThe qualified and charismatic guides will lead you on this amazing experience. You will be able to take a well-earned break on one of Middle Harbour’s pristine beaches where your guide will brew fresh coffee.  \r\n',NULL,'','','','','',0,NULL,0,NULL,0,'Kangaroos','Water Activities','Taking a Kayaking Tour with gives you the chance to you see sights only visible from the water.'),(57,'Manly Seaside Snorkel','/uploads/Manly_seaside_snorkel2.jpg','The best way to see Manly!  \r\nMeet your local snorkel guide at the world famous Shelly Beach only minutes from one of Sydney’s most famous beaches – Manly.  This area of Sydney is such a seaside paradise.  \r\nYour guide will give you a great idea of what native marine life to keep your eye out for as well as talk to you about native wildlife, Australian environment, heritage and culture of Sydney. Then cool off by snorkelling in the calm, clear waters.   \r\nSee Australia’s diverse marine wildlife in their natural environment in the sea grass meadows and rocky reefs of protected Cabbage Tree Bay Aquatic Reserve.  ',NULL,'','','','','',0,NULL,0,NULL,0,'Kangaroos','Water Activities','This area of Sydney is such a seaside paradise.  The best way to see Manly!'),(58,'Stand Up Paddle Boarding','/uploads/stand_up_paddle_boarding2.jpg','Stand-Up Paddle boarding (also know as SUP or Supping) was born on Waikiki beach, Hawaii in the early 1950\'s. Surf instructors, or \'Beach Boys\', began standing up on their boards and using a paddle to get out to the break. This preferred method of board riding allowed them a better vantage point from which to spot the next big sets, take photos of thrill seeking surfers, and most importantly, to keep a sharp eye on their students.  \r\nSupping is now the fastest growing board sport in the world.   \r\nSUP surfing adds a whole new dimension to riding waves, or just exploring Sydney’s great coastline.  \r\nBalmoral Beach is one of Sydney’s most divine beaches. ',NULL,'','','','','',0,NULL,0,NULL,0,'Kangaroos','Water Activities','SUP surfing adds a whole new dimension to riding waves, or just exploring Sydney’s great coastline. '),(59,'Surfing Lessons','/uploads/surfing_lesson2.jpg','Experience the thrill of surfing with Australia’s greatest surf school on Australia’s greatest beach! Enjoy a low participant to instructor ration of 6:1, which ensures each participant receives plenty of attention and hands on assistance, making for a fantastic experience while developing some serious surfing skills at the same time!  \r\nThis popular beginners session teaches you how to safely get out and up onto your first wave. It’s a great way to build your surf knowledge, confidence and cultivate your surfing technique. ',NULL,'','','','','',0,NULL,0,NULL,0,'Kangaroos','Water Activities','Experience the thrill of surfing with Australia’s greatest surf school on Australia’s greatest beach!'),(60,'Harbour Jet Boating','/uploads/Sydney_Jet_Boat2.jpg','This awesome adventure begins in Circular Quay and is a magnificent combination of sightseeing and traditional jet boating with spins, slides, power- break stops and fish tails.  ',NULL,'','','','','',0,NULL,0,NULL,0,'Kangaroos','Water Activities','This awesome adventure begins in Circular Quay and is a magnificent combination of sightseeing and traditional jet boating.'),(61,'Aquarium & Wildlife World','/uploads/Tarronga_Zoo_Sydney-Wildlife2.jpg','Sydney Aquarium is located in Darling Harbour, overlooking the spectacular waters of Sydney Harbour.   \r\nHere is an amazing collection of Australian aquatic life with over 12,000 animals including huge sharks and rays, platypus, seals, fairy penguins, crocodiles and much more.  \r\n Take a journey through one of the most spectacular aquariums in the world and explore Australia\'s rich and diverse waterways, marine ecosystems and unique aquatic environments.  \r\nSydney Wildlife World showcases Australia’s unique and bizarre flora and fauna, within a short stroll from the Sydney CBD! Take a walk on the wild side and jump into Wallaby cliffs with the Yellow-footed rock wallabies, or meet one of Australia’s national icons, the koala.  Marvel at Australia’s bizarre creepy crawlies or see the scales and tails of our unique reptiles. Allow yourself to be completely immersed within this wonderful exhibit, where animals are living within their natural habitats and ecosystems. ',NULL,'','','','','',0,NULL,0,NULL,0,'Kangaroos','Wildlife Tours','Take a journey through one of the most spectacular aquariums in the world and explore Australia\'s rich and diverse waterways, marine ecosystems and unique aquatic environments. '),(62,'Taronga Zoo','/uploads/tarronga_zoo2.jpg','Guests will take a leisurely walk to Circular Quay and take a short water transfer across the Harbour to the Taronga Zoo Wharf.   \r\nTaronga Zoo opened in 1916 and covers an area of approximately 30 hectares (75 acres) with a collection of over 2000 animals from 400 species. The Zoo is in a primate location at Mosman overlooking the harbour and city skyline. Take in these sweeping views during your Sky Safari ride \r\n',NULL,'','','','','',0,NULL,0,NULL,0,'Kangaroos','Wildlife Tours','The Zoo is in a primate location at Mosman overlooking the harbour and city skyline. Take in these sweeping views during your Sky Safari ride. \r\n'),(63,'Spa - Sheraton','/uploads/image.png','Need Sheraton Long',NULL,'','','','','',0,NULL,0,NULL,0,'Wallabies','Spa & Fashion','Need Sheraton short'),(64,'Spa - Hilton Alysium','/uploads/image.png','Need Hilton Long',NULL,'','','','','',0,NULL,0,NULL,0,'Wallabies','Spa & Fashion','Need Hilton Short'),(65,'Spa - Shangri-La Chi','/uploads/Spa-Shangri2.jpg','Need Shangri-La Long',NULL,'','','','','',0,NULL,0,NULL,0,'Wallabies','Spa & Fashion','Need Shangri-La Short'),(66,'Spa - The Darling','/uploads/image.png','Need Sydney Long',NULL,'','','','','',0,NULL,0,NULL,0,'Wallabies','Spa & Fashion','Need Sydney Short');
/*!40000 ALTER TABLE `tours` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` tinyint(4) DEFAULT '0' COMMENT '0:no feedback;1:accepted;2:declined',
  `declien_reason` text,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `office_location` varchar(255) DEFAULT '',
  `department` varchar(100) DEFAULT NULL,
  `telephone_number_desk` varchar(255) DEFAULT '',
  `telephone_number_cell` varchar(255) DEFAULT '',
  `email` varchar(255) DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT 'c26621017ec80c73b445bebbd183913b',
  `date_of_birth` varchar(255) DEFAULT '',
  `dietary_requirements` varchar(255) DEFAULT '',
  `passport` varchar(255) DEFAULT '',
  `special_requests` varchar(255) DEFAULT '',
  `nationality` varchar(255) DEFAULT '',
  `has_guest` tinyint(4) DEFAULT '0' COMMENT '0:no;1:yes;2:undecided',
  `departure_date` char(20) NOT NULL DEFAULT '',
  `return_date` char(20) NOT NULL DEFAULT '',
  `airport_name` varchar(255) DEFAULT '',
  `airport_code` varchar(255) DEFAULT '',
  `travel_policy` varchar(255) DEFAULT '',
  `visa_policy` varchar(255) DEFAULT '',
  `hotel_arrival_date` char(20) DEFAULT NULL,
  `hotel_departure_date` char(20) DEFAULT NULL,
  `hotel_venue` varchar(255) DEFAULT '',
  `gala_dinner` varchar(255) DEFAULT NULL,
  `other_activity` tinyint(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(10) DEFAULT '0',
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(10) DEFAULT '0',
  `daytime_phone` varchar(255) DEFAULT NULL,
  `evening_phone` varchar(255) DEFAULT NULL,
  `work_address1` varchar(255) DEFAULT NULL,
  `work_address2` varchar(255) DEFAULT NULL,
  `work_city` varchar(255) DEFAULT NULL,
  `work_state` varchar(255) DEFAULT NULL,
  `work_zip_code` varchar(255) DEFAULT NULL,
  `work_country` varchar(255) DEFAULT NULL,
  `managers_name` varchar(255) DEFAULT NULL,
  `emergency_contact_name` varchar(255) DEFAULT NULL,
  `emergency_contact_tel_number` varchar(255) DEFAULT NULL,
  `relationship_with_the_emergency_contact` varchar(255) DEFAULT NULL,
  `ga_passport` varchar(255) DEFAULT NULL,
  `ga_dateofbirth` varchar(255) DEFAULT NULL,
  `ga_firstname` varchar(255) DEFAULT NULL,
  `ga_lastname` varchar(255) DEFAULT NULL,
  `ga_gender` varchar(255) DEFAULT NULL,
  `ga_card_number` varchar(255) DEFAULT NULL,
  `ga_card_country` varchar(255) DEFAULT NULL,
  `ga_card_expiration_date` varchar(255) DEFAULT NULL,
  `ga_card_issue_date` varchar(255) DEFAULT NULL,
  `ga_redress_number` varchar(255) DEFAULT NULL,
  `previous_winners` varchar(255) DEFAULT NULL,
  `times` varchar(255) DEFAULT NULL,
  `years` varchar(255) DEFAULT NULL,
  `destination_city` varchar(255) DEFAULT NULL,
  `preferred_seat_request` varchar(255) DEFAULT NULL,
  `preferred_airline_frequent_flyer_number` varchar(255) DEFAULT NULL,
  `other` longtext,
  `need_visa` varchar(255) DEFAULT NULL,
  `visa_letter` varchar(255) DEFAULT NULL,
  `checked` varchar(255) DEFAULT NULL,
  `room_type` varchar(255) DEFAULT NULL,
  `room_requirements` varchar(255) DEFAULT NULL,
  `credit_card_number` varchar(255) DEFAULT NULL,
  `credit_card_expiration_date` varchar(255) DEFAULT NULL,
  `cardholders_name` varchar(255) DEFAULT NULL,
  `credit_card_type` varchar(255) DEFAULT NULL,
  `team_dinner` varchar(255) DEFAULT NULL,
  `team_dinner_menu` varchar(255) DEFAULT NULL,
  `team_dinner_dietary` varchar(255) DEFAULT NULL,
  `gala_dinner_menu` varchar(255) DEFAULT NULL,
  `gala_dinner_dietary` varchar(255) DEFAULT NULL,
  `type` char(32) DEFAULT NULL,
  `gender` char(6) DEFAULT 'male',
  `country` char(64) DEFAULT '',
  `preferred_name` varchar(32) DEFAULT '',
  `requirements` text,
  `cardholders_address` varchar(255) DEFAULT NULL,
  `csv_number` varchar(255) DEFAULT NULL,
  `crew_diet_requirements` varchar(255) DEFAULT NULL,
  `crew_other_info` varchar(255) DEFAULT NULL,
  `crew_menu_choice` varchar(255) DEFAULT NULL,
  `crew_unifrom_size` varchar(255) DEFAULT NULL,
  `comment` text,
  `gala_dinner_vip` char(20) DEFAULT '',
  `dietary_comment` varchar(255) DEFAULT '',
  `frequent_flyer_number` varchar(255) DEFAULT '',
  `preferred_airline` varchar(255) DEFAULT '',
  `hotel` varchar(255) DEFAULT '',
  `flight_price` varchar(100) DEFAULT NULL,
  `employeeid` varchar(100) DEFAULT NULL,
  `payrollnumber` varchar(100) DEFAULT NULL,
  `driving` tinyint(1) NOT NULL DEFAULT '0',
  `fi_status` text NOT NULL,
  `fi_adate` text NOT NULL,
  `fi_adate1` text NOT NULL,
  `fi_aflight1` text NOT NULL,
  `fi_afrom1` text NOT NULL,
  `fi_ato1` text NOT NULL,
  `fi_adep1` text NOT NULL,
  `fi_aarr1` text NOT NULL,
  `fi_adate2` text NOT NULL,
  `fi_aflight2` text NOT NULL,
  `fi_afrom2` text NOT NULL,
  `fi_ato2` text NOT NULL,
  `fi_adep2` text NOT NULL,
  `fi_aarr2` text NOT NULL,
  `fi_adate3` text NOT NULL,
  `fi_aflight3` text NOT NULL,
  `fi_afrom3` text NOT NULL,
  `fi_ato3` text NOT NULL,
  `fi_adep3` text NOT NULL,
  `fi_aarr3` text NOT NULL,
  `fi_ddate` text NOT NULL,
  `fi_ddate1` text NOT NULL,
  `fi_dflight1` text NOT NULL,
  `fi_dfrom1` text NOT NULL,
  `fi_dto1` text NOT NULL,
  `fi_ddep1` text NOT NULL,
  `fi_darr1` text NOT NULL,
  `fi_ddate2` text NOT NULL,
  `fi_dflight2` text NOT NULL,
  `fi_dfrom2` text NOT NULL,
  `fi_dto2` text NOT NULL,
  `fi_ddep2` text NOT NULL,
  `fi_darr2` text NOT NULL,
  `fi_ddate3` text NOT NULL,
  `fi_dflight3` text NOT NULL,
  `fi_dfrom3` text NOT NULL,
  `fi_dto3` text NOT NULL,
  `fi_ddep3` text NOT NULL,
  `fi_darr3` text NOT NULL,
  `table_no` int(10) NOT NULL,
  `room_bigtype` text,
  `hotel_type` char(50) NOT NULL DEFAULT '',
  `hotel_confirmation_number` char(50) DEFAULT NULL,
  `has_checkin` tinyint(4) NOT NULL DEFAULT '0',
  `headset` varchar(255) DEFAULT '',
  `has_gift` tinyint(4) NOT NULL DEFAULT '0',
  `has_ipad` tinyint(4) NOT NULL DEFAULT '0',
  `amount` varchar(255) DEFAULT '',
  `checkin_at` datetime DEFAULT NULL,
  `gift_at` datetime DEFAULT NULL,
  `ipad_at` datetime DEFAULT NULL,
  `middel_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `cost_centre_number` varchar(255) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `region_comment` varchar(255) DEFAULT NULL,
  `ga_middlename` varchar(255) DEFAULT NULL,
  `departure_city` varchar(255) DEFAULT NULL,
  `travel_region` varchar(255) DEFAULT NULL,
  `travel_ticket` tinyint(1) NOT NULL DEFAULT '0',
  `coupon` tinyint(1) NOT NULL DEFAULT '0',
  `title` varchar(255) DEFAULT '',
  `title_comment` varchar(64) DEFAULT '',
  `guest_travel_ticket` tinyint(1) NOT NULL DEFAULT '0',
  `guest_coupon` tinyint(1) NOT NULL DEFAULT '0',
  `ipadupdated_at` datetime DEFAULT NULL,
  `ipad_by` text,
  `ipadupdated_by` text,
  `no_gala_dinner` char(1) NOT NULL DEFAULT '0',
  `qualified` char(10) NOT NULL DEFAULT 'Qualified',
  `travel_comment` text,
  `travel_comment_status` text,
  `dietary_commnet` text,
  `billing_instruction` text,
  `visa_status` text,
  `permanent_home_address` text,
  `place_of_birth` text,
  `tour` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10782 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (10762,0,'','','','','','','','','c26621017ec80c73b445bebbd183913b','','','','','',0,'Apr/10/2014','Apr/14/2014','','','','','Apr/10/2014','Apr/14/2014','',NULL,NULL,'2013-08-27 06:31:58',7,'2013-08-27 06:31:58',7,'','','','','','','','','','','','','','','','','','','','','','','','','0','','',NULL,'',NULL,'','','',NULL,'NDM5MjkzNzkyNzQ5MjM=','','','','','','None','',NULL,'Winners','','','','','','',NULL,NULL,NULL,NULL,'','Not Gala Dinner VIP','','','','',NULL,NULL,NULL,0,'','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',0,NULL,'','',0,'',0,0,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'','',0,0,NULL,NULL,NULL,'','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(10773,1,'','Dickie','Freeman','','','','234234','dickie@redman-solutions.com','c26621017ec80c73b445bebbd183913b','','','','','',1,'Apr/10/2014','Apr/14/2014','','','','','Apr/10/2014','Apr/14/2014','',NULL,NULL,'2013-10-21 15:19:57',6,'2013-10-28 09:05:33',10773,'989','898','Test','Test','wefewf','','TT1','UNITED KINGDOM','','Batman','999','Friend','','Nov/20/1966','','','','','','','','','','1','1','Sydney','',NULL,'',NULL,'','','King (1 bed)',NULL,'MTExMTExMTExMTExMTExMQ==','Oct/17/2013','Spender','Visa','Event Sales','Meat','None','Cod',NULL,'Winners','','','Dickie','','TT1','MTIz',NULL,NULL,NULL,'','','Not Gala Dinner VIP','','','','',NULL,NULL,NULL,1,'','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',0,NULL,'','',0,'',0,0,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'','',0,0,NULL,NULL,NULL,'','Qualified','','','','For core dates (10th - 13th April Inclusive) Room ,tax, hotel fee to Master acct.  Guest to pay for own incidentals. Extended dates either side at guests own expense.','','','',1),(10770,0,'','Caroline','McHugh','','','','+441234567890','caroline@redman-solutions.com','c26621017ec80c73b445bebbd183913b','','','','','',1,'Apr/10/2014','Apr/14/2014','Datchet','','','','Apr/10/2014','Apr/14/2014','',NULL,NULL,'2013-10-15 12:29:35',6,'2013-10-22 12:41:29',7,'+1234556','1234567','My Work Address','','Datchet','','SL3 9DJ','UNITED KINGDOM','Gary Barlow','Mark Owen','+12345678890','Friend','British','Apr/03/1993','Caroline','McHugh','Female','1234567','UK','Apr/10/2014','Jan/06/2005','','','1','3','Sydney','Aisle',NULL,'First Class',NULL,'No','Yes','King (1 bed)',NULL,'MTIzNDU2NzgxMjM0NDU1Njc=','Oct/08/2013','McHugh','Visa','Emerging Markets – India & CEEMEA','Meat','Fish Allergy','Cottage Pie',NULL,'Winners','','','Caz','','Long Address','MTIz',NULL,NULL,NULL,'','','Not Gala Dinner VIP','','123456','BA','',NULL,NULL,NULL,1,'','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',0,NULL,'','',0,'',0,0,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'','',0,0,NULL,NULL,NULL,'','Qualified','','','','For core dates (9th - 12th April Inclusive) Room ,tax, hotel fee to Master acct.  Guest to pay for own incidentals. Extended dates either side at guests own expense.','','','',1),(10767,0,'','test','','','','','','test@test.com','c26621017ec80c73b445bebbd183913b','','','','','',0,'Apr/10/2014','Apr/14/2014','','','','','Apr/10/2014','Apr/14/2014','',NULL,NULL,'2013-09-02 08:35:07',7,'2013-09-02 08:35:40',7,'','','','','','','','','','','','','','','','','','','','','','','','','0','','',NULL,'',NULL,'','','',NULL,'','','','','','','None','',NULL,'Operating Committee','','','','','','',NULL,NULL,NULL,NULL,'','Not Gala Dinner VIP','','','','',NULL,NULL,NULL,0,'','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',0,NULL,'','',0,'',0,0,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'','',0,0,NULL,NULL,NULL,'','Qualified','','','','','',NULL,NULL,0),(10781,0,'','Tony','Chen','',NULL,'','','tony.chen@magictony-se.com','c26621017ec80c73b445bebbd183913b','','','','','',0,'Apr/10/2014','Apr/14/2014','','','','','Apr/10/2014','Apr/14/2014','',NULL,NULL,'2013-10-27 19:44:28',7,'2013-10-27 19:44:28',7,'','','','','','','','','','','','','',NULL,'','','','','','','','','','','0','','',NULL,'',NULL,'','','',NULL,'','','','','','','None','',NULL,'Winners','','','','','','',NULL,NULL,NULL,NULL,'','Not Gala Dinner VIP','','','','',NULL,NULL,NULL,0,'','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',0,NULL,'','',0,'',0,0,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'','',0,0,NULL,NULL,NULL,'','Qualified','','','','','','','',0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wishlists`
--

DROP TABLE IF EXISTS `wishlists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wishlists` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tour_id` int(10) unsigned NOT NULL,
  `seat_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `order_date` char(11) NOT NULL DEFAULT '',
  `ampm` varchar(15) NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(10) DEFAULT '0',
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wishlists`
--

LOCK TABLES `wishlists` WRITE;
/*!40000 ALTER TABLE `wishlists` DISABLE KEYS */;
INSERT INTO `wishlists` VALUES (45,47,532,10773,'2014-04-12','','2013-10-16 12:40:22',10773,'2013-10-16 12:40:22',10773),(46,42,514,10777,'2014-04-13','','2013-10-22 08:27:05',10777,'2013-10-22 08:27:05',10777);
/*!40000 ALTER TABLE `wishlists` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wishlists_guests`
--

DROP TABLE IF EXISTS `wishlists_guests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wishlists_guests` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tour_id` int(10) unsigned NOT NULL,
  `seat_id` int(10) unsigned NOT NULL,
  `guest_id` int(10) unsigned NOT NULL,
  `order_date` char(11) NOT NULL DEFAULT '',
  `ampm` varchar(15) NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(10) DEFAULT '0',
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wishlists_guests`
--

LOCK TABLES `wishlists_guests` WRITE;
/*!40000 ALTER TABLE `wishlists_guests` DISABLE KEYS */;
INSERT INTO `wishlists_guests` VALUES (37,45,527,777,'2014-04-13','',NULL,0,NULL,0),(38,43,519,783,'2014-04-12','',NULL,0,NULL,0),(39,47,532,786,'2014-04-12','',NULL,0,NULL,0);
/*!40000 ALTER TABLE `wishlists_guests` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-10-29  3:20:43
