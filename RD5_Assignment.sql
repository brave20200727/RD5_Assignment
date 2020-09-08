-- MySQL dump 10.13  Distrib 5.7.26, for osx10.10 (x86_64)
--
-- Host: localhost    Database: RD5_Assignment
-- ------------------------------------------------------
-- Server version	5.7.26

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
-- Current Database: `RD5_Assignment`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `RD5_Assignment` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `RD5_Assignment`;

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transactions` (
  `transactionId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) DEFAULT NULL,
  `transactionTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deposit` int(11) DEFAULT NULL,
  `withdrawal` int(11) DEFAULT NULL,
  `totalMoney` int(11) DEFAULT NULL,
  PRIMARY KEY (`transactionId`),
  KEY `userId` (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` VALUES (1,1,'2020-09-01 01:38:06',0,0,0),(2,2,'2020-09-01 01:38:24',0,0,0),(6,3,'2020-09-01 02:06:33',0,0,0),(7,4,'2020-09-01 02:07:16',0,0,0),(8,1,'2020-09-01 02:35:21',10000,0,10000),(9,1,'2020-09-01 02:35:25',10000,0,20000),(10,1,'2020-09-01 02:35:27',10000,0,30000),(11,1,'2020-09-01 02:35:30',10000,0,40000),(12,1,'2020-09-01 02:35:31',10000,0,50000),(13,1,'2020-09-01 02:35:34',10000,0,60000),(14,1,'2020-09-01 02:39:17',10000,0,70000),(15,1,'2020-09-01 02:39:20',10000,0,80000),(16,1,'2020-09-01 02:39:22',10000,0,90000),(17,1,'2020-09-01 02:39:23',10000,0,100000);
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(20) DEFAULT NULL,
  `userPassword` varchar(64) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `city` varchar(10) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'brave20200727','0ffe1abd1a08215353c233d6e009613e95eec4253832a761af28ff37ac5a150c','陳柏程','0926005788','台南市','安平','1997-07-30'),(2,'owen5566','03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4','黃煒翔','0923617373','台中市','東海炒飯街','1997-03-03'),(3,'brave5566','0ffe1abd1a08215353c233d6e009613e95eec4253832a761af28ff37ac5a150c','陳柏程2','0926005788','台南市','安平','1997-07-30'),(4,'owen20200901','03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4','黃煒翔2','0923617373','台中市','東海炒飯街','1997-03-03');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-09-08 17:00:08
