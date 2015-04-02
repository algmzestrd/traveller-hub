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
  `Activity_ID` varchar(45) NOT NULL,
  `Title` varchar(45) DEFAULT NULL,
  `Content` varchar(300) DEFAULT NULL,
  `User_ID` varchar(45) DEFAULT NULL,
  `Post_Time` varchar(45) DEFAULT NULL,
  `Participants` varchar(45) DEFAULT NULL,
  `Post_Date` varchar(45) DEFAULT NULL,
  `Location` varchar(45) DEFAULT NULL,
  `Participant_Limit` varchar(45) DEFAULT NULL,
  `Seconds` varchar(450) DEFAULT NULL,
  PRIMARY KEY (`Activity_ID`),
  KEY `User_ID_idx` (`User_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Activity`
--

LOCK TABLES `Activity` WRITE;
/*!40000 ALTER TABLE `Activity` DISABLE KEYS */;
INSERT INTO `Activity` VALUES ('1227','New Post','New Post by Shang','lshawn@gmail.com','9:43AM','1','03-31-2015','Ames','6','1427813002915'),('181','Testing Divs','Seeing how divs work','algomez@iastate.edu','4:54PM','2','03-30-2015','My place','1','1427752460144');
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
INSERT INTO `Participate` VALUES ('181','algomez@iastate.edu','4:54PM','03-30-2015'),('1227','lshawn@gmail.com','9:43AM','03-31-2015'),('181','lshawn@gmail.com','9:43AM','03-31-2015');
/*!40000 ALTER TABLE `Participate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Post`
--

DROP TABLE IF EXISTS `Post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Post` (
  `Post_ID` varchar(45) NOT NULL,
  `Post_Time` varchar(45) NOT NULL,
  `Title` varchar(45) DEFAULT NULL,
  `Content` varchar(45) DEFAULT NULL,
  `User_ID` varchar(45) DEFAULT NULL,
  `Post_Date` varchar(45) DEFAULT NULL,
  `Post_Type` varchar(45) DEFAULT NULL,
  `Seconds` varchar(450) DEFAULT NULL,
  PRIMARY KEY (`Post_ID`),
  KEY `User_ID_idx` (`User_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
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
  `User_ID` varchar(45) DEFAULT NULL,
  `location` varchar(45) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  KEY `User_Id_idx` (`User_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Profile`
--

LOCK TABLES `Profile` WRITE;
/*!40000 ALTER TABLE `Profile` DISABLE KEYS */;
/*!40000 ALTER TABLE `Profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Reply`
--

DROP TABLE IF EXISTS `Reply`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Reply` (
  `Uer_ID` varchar(45) NOT NULL,
  `Post_time` datetime NOT NULL,
  `Question_ID` varchar(45) NOT NULL,
  `Answer_ID` varchar(45) NOT NULL,
  `Content` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`Answer_ID`),
  KEY `User_Id_idx` (`Uer_ID`),
  KEY `Question_ID_idx` (`Question_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Reply`
--

LOCK TABLES `Reply` WRITE;
/*!40000 ALTER TABLE `Reply` DISABLE KEYS */;
/*!40000 ALTER TABLE `Reply` ENABLE KEYS */;
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
  `role` varchar(45) NOT NULL,
  `Ban_Status` int(11) DEFAULT '0',
  PRIMARY KEY (`User_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User`
--

LOCK TABLES `User` WRITE;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;
/*!40000 ALTER TABLE `User` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-04-02 12:15:27
