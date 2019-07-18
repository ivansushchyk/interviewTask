-- MySQL dump 10.13  Distrib 5.7.26, for Linux (x86_64)
--
-- Host: localhost    Database: currency_rates
-- ------------------------------------------------------
-- Server version	5.7.26-0ubuntu0.18.04.1

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
-- Table structure for table `currencies`
--

DROP TABLE IF EXISTS `currencies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `currencies` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `currencies`
--

LOCK TABLES `currencies` WRITE;
/*!40000 ALTER TABLE `currencies` DISABLE KEYS */;
INSERT INTO `currencies` VALUES (1,'USD'),(2,'EUR'),(3,'RUB');
/*!40000 ALTER TABLE `currencies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `currencies_rates`
--

DROP TABLE IF EXISTS `currencies_rates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `currencies_rates` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `sell_rate` decimal(10,2) NOT NULL,
  `buy_rate` decimal(10,2) NOT NULL,
  `datetime` datetime NOT NULL,
  `currency_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_currencies_rates_1_idx` (`currency_id`),
  CONSTRAINT `fk_currency_id` FOREIGN KEY (`currency_id`) REFERENCES `currencies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `currencies_rates`
--

LOCK TABLES `currencies_rates` WRITE;
/*!40000 ALTER TABLE `currencies_rates` DISABLE KEYS */;
INSERT INTO `currencies_rates` VALUES (1,27.40,28.30,'1000-01-01 00:00:00',1),(2,28.20,27.30,'1000-01-01 00:00:00',2),(3,14.20,16.20,'1000-01-01 00:00:00',1),(4,32.00,31.00,'2019-07-17 19:38:00',3),(6,26.15,25.80,'2019-07-17 20:13:31',1),(7,26.15,25.80,'2019-07-17 20:13:55',1),(8,29.40,28.75,'2019-07-17 20:13:55',2),(9,0.42,0.38,'2019-07-17 20:13:55',3),(10,26.15,25.80,'2019-07-17 20:13:58',1),(11,29.40,28.75,'2019-07-17 20:13:58',2),(12,0.42,0.38,'2019-07-17 20:13:58',3),(13,26.15,25.80,'2019-07-17 20:31:00',1),(14,29.40,28.75,'2019-07-17 20:31:00',2),(15,0.42,0.38,'2019-07-17 20:31:00',3),(16,26.15,25.80,'2019-07-17 20:31:30',1),(17,29.40,28.75,'2019-07-17 20:31:30',2),(18,0.42,0.38,'2019-07-17 20:31:30',3),(19,26.15,25.80,'2019-07-17 20:33:34',1),(20,29.40,28.75,'2019-07-17 20:33:34',2),(21,0.42,0.38,'2019-07-17 20:33:34',3),(22,26.15,25.80,'2019-07-17 20:39:38',1),(23,29.40,28.75,'2019-07-17 20:39:38',2),(24,0.42,0.38,'2019-07-17 20:39:38',3),(25,26.15,25.80,'2019-07-17 20:39:57',1),(26,29.40,28.75,'2019-07-17 20:39:57',2),(27,0.42,0.38,'2019-07-17 20:39:57',3),(28,26.15,25.80,'2019-07-17 20:42:00',1),(29,29.40,28.75,'2019-07-17 20:42:00',2),(30,0.42,0.38,'2019-07-17 20:42:00',3),(31,26.15,25.80,'2019-07-17 20:58:28',1),(32,29.40,28.75,'2019-07-17 20:58:28',2),(33,0.42,0.38,'2019-07-17 20:58:28',3),(34,26.15,25.80,'2019-07-17 20:59:03',1),(35,29.40,28.75,'2019-07-17 20:59:03',2),(36,0.42,0.38,'2019-07-17 20:59:03',3),(37,26.15,25.80,'2019-07-17 20:59:05',1),(38,29.40,28.75,'2019-07-17 20:59:05',2),(39,0.42,0.38,'2019-07-17 20:59:05',3),(40,26.15,25.80,'2019-07-17 21:00:13',1),(41,29.40,28.75,'2019-07-17 21:00:13',2),(42,0.42,0.38,'2019-07-17 21:00:13',3);
/*!40000 ALTER TABLE `currencies_rates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'currency_rates'
--

--
-- Dumping routines for database 'currency_rates'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-07-17 21:05:35
