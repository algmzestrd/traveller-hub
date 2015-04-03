-- MySQL dump 10.13  Distrib 5.6.19, for osx10.7 (i386)
--
-- Host: mysql.cs.iastate.edu    Database: db30914
-- ------------------------------------------------------
-- Server version	5.1.73

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
-- Table structure for table `Activity`
--

DROP TABLE IF EXISTS `Activity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Activity` (
  `Activity_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(45) DEFAULT NULL,
  `Content` varchar(300) DEFAULT NULL,
  `User_ID` varchar(45) DEFAULT NULL,
  `Post_Time` varchar(45) DEFAULT NULL,
  `Participants` varchar(45) DEFAULT '1',
  `Post_Date` varchar(45) DEFAULT NULL,
  `Location` varchar(45) DEFAULT NULL,
  `Participant_Limit` varchar(45) DEFAULT NULL,
  `Seconds` varchar(450) DEFAULT NULL,
  PRIMARY KEY (`Activity_ID`),
  KEY `User_ID_idx` (`User_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=7491 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Activity`
--

LOCK TABLES `Activity` WRITE;
/*!40000 ALTER TABLE `Activity` DISABLE KEYS */;
/*!40000 ALTER TABLE `Activity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Participate`
--

DROP TABLE IF EXISTS `Participate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Participate` (
  `Activity_ID` varchar(45) NOT NULL,
  `User_ID` varchar(45) NOT NULL,
  `Join_Time` varchar(45) NOT NULL,
  `Join_Date` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Activity_ID`,`User_ID`),
  KEY `User_ID_idx` (`User_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Participate`
--

LOCK TABLES `Participate` WRITE;
/*!40000 ALTER TABLE `Participate` DISABLE KEYS */;
/*!40000 ALTER TABLE `Participate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Post`
--

DROP TABLE IF EXISTS `Post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Post` (
  `Post_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Post_Time` varchar(45) NOT NULL,
  `Title` varchar(45) DEFAULT NULL,
  `Content` varchar(45) DEFAULT NULL,
  `User_ID` varchar(45) DEFAULT NULL,
  `Post_Date` varchar(45) DEFAULT NULL,
  `Post_Type` varchar(45) DEFAULT NULL,
  `Seconds` varchar(450) DEFAULT NULL,
  PRIMARY KEY (`Post_ID`),
  KEY `User_ID_idx` (`User_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Post`
--

LOCK TABLES `Post` WRITE;
/*!40000 ALTER TABLE `Post` DISABLE KEYS */;
/*!40000 ALTER TABLE `Post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Profile`
--

DROP TABLE IF EXISTS `Profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Profile` (
  `User_ID` varchar(45) NOT NULL DEFAULT '',
  `First_Name` varchar(45) DEFAULT NULL,
  `Last_Name` varchar(45) DEFAULT NULL,
  `Age` varchar(45) DEFAULT NULL,
  `Gender` varchar(45) DEFAULT NULL,
  `Location` varchar(45) DEFAULT NULL,
  `Hotel` varchar(45) DEFAULT NULL,
  `Description` varchar(45) DEFAULT NULL,
  `Interests` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`User_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Profile`
--

LOCK TABLES `Profile` WRITE;
/*!40000 ALTER TABLE `Profile` DISABLE KEYS */;
INSERT INTO `Profile` VALUES ('algomez@iastate.edu',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('shang@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('guo@iastate.edu',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `Profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `User`
--

DROP TABLE IF EXISTS `User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `User` (
  `User_ID` varchar(45) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `register_date` varchar(45) NOT NULL,
  `role` varchar(45) NOT NULL DEFAULT 'User',
  `Ban_Status` int(11) DEFAULT '0',
  PRIMARY KEY (`User_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User`
--

LOCK TABLES `User` WRITE;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;
INSERT INTO `User` VALUES ('algomez@iastate.edu','$2y$10$jl3kd8SVW6wgC9QBPuC77eLoOhcFq1dUBjTTUOz/Hqvf2Rw.1l6me','04-03-2015','User',0),('shang@gmail.com','$2y$10$KlXzxU3EdCvT4OCAXdEyWeYFrE/29v1vVlCtdnWp4yS3EySu94o7.','04-03-2015','User',0),('guo@iastate.edu','$2y$10$ht5ulvXSWgDAwEQzkbXcIekUojymwqdIcML5WbXYCbmO4HhFQlGxa','04-03-2015','User',0);
/*!40000 ALTER TABLE `User` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Webchat_Lines`
--

DROP TABLE IF EXISTS `Webchat_Lines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Webchat_Lines` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Author` varchar(16) NOT NULL,
  `Gravatar` varchar(32) NOT NULL,
  `Text` varchar(255) NOT NULL,
  `TimeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  KEY `TimeStamp` (`TimeStamp`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Webchat_Lines`
--

LOCK TABLES `Webchat_Lines` WRITE;
/*!40000 ALTER TABLE `Webchat_Lines` DISABLE KEYS */;
/*!40000 ALTER TABLE `Webchat_Lines` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Webchat_Users`
--

DROP TABLE IF EXISTS `Webchat_Users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Webchat_Users` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `User_ID` varchar(16) NOT NULL,
  `gravatar` varchar(32) NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `User_ID` (`User_ID`),
  KEY `last_activity` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Webchat_Users`
--

LOCK TABLES `Webchat_Users` WRITE;
/*!40000 ALTER TABLE `Webchat_Users` DISABLE KEYS */;
/*!40000 ALTER TABLE `Webchat_Users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-04-02 20:09:35
