CREATE DATABASE  IF NOT EXISTS `popcorndb` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `popcorndb`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: 10.14.202.66    Database: popcorndb
-- ------------------------------------------------------
-- Server version	5.6.20

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
-- Table structure for table `actors`
--

DROP TABLE IF EXISTS `actors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `actors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actors`
--

LOCK TABLES `actors` WRITE;
/*!40000 ALTER TABLE `actors` DISABLE KEYS */;
INSERT INTO `actors` VALUES (1,'Eddie','Redmayne'),(2,'Katherine','Waterson'),(3,'Dan','Fogler');
/*!40000 ALTER TABLE `actors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cinemas`
--

DROP TABLE IF EXISTS `cinemas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cinemas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `longitude` double NOT NULL,
  `latitude` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cinemas`
--

LOCK TABLES `cinemas` WRITE;
/*!40000 ALTER TABLE `cinemas` DISABLE KEYS */;
INSERT INTO `cinemas` VALUES (1,'CinemaxX',9.990500099999963,53.5595468),(2,'Passage Kino',53.550563,9.998244),(3,'Savoy',53.554187,10.014166),(4,'UCI KINOWELT Wandsbek',53.588431,10.096612);
/*!40000 ALTER TABLE `cinemas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genres`
--

DROP TABLE IF EXISTS `genres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `genres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genres`
--

LOCK TABLES `genres` WRITE;
/*!40000 ALTER TABLE `genres` DISABLE KEYS */;
INSERT INTO `genres` VALUES (1,'Fantasy'),(2,'Abenteuer'),(3,'Komödie'),(4,'Action'),(5,'Thriller'),(6,'Drama'),(7,'Animationsfilm'),(8,'Science-Fiction');
/*!40000 ALTER TABLE `genres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movie_actors`
--

DROP TABLE IF EXISTS `movie_actors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movie_actors` (
  `movie_id` int(11) NOT NULL,
  `actor_id` int(11) NOT NULL,
  PRIMARY KEY (`movie_id`,`actor_id`),
  KEY `actor_id` (`actor_id`),
  CONSTRAINT `movie_actors_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `movie_actors_ibfk_2` FOREIGN KEY (`actor_id`) REFERENCES `actors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movie_actors`
--

LOCK TABLES `movie_actors` WRITE;
/*!40000 ALTER TABLE `movie_actors` DISABLE KEYS */;
INSERT INTO `movie_actors` VALUES (1,1),(1,2),(1,3);
/*!40000 ALTER TABLE `movie_actors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movie_cinemas`
--

DROP TABLE IF EXISTS `movie_cinemas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movie_cinemas` (
  `movie_id` int(11) NOT NULL,
  `cinema_id` int(11) NOT NULL,
  PRIMARY KEY (`movie_id`,`cinema_id`),
  KEY `cinema_id` (`cinema_id`),
  CONSTRAINT `movie_cinemas_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`),
  CONSTRAINT `movie_cinemas_ibfk_2` FOREIGN KEY (`cinema_id`) REFERENCES `cinemas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movie_cinemas`
--

LOCK TABLES `movie_cinemas` WRITE;
/*!40000 ALTER TABLE `movie_cinemas` DISABLE KEYS */;
INSERT INTO `movie_cinemas` VALUES (1,1);
/*!40000 ALTER TABLE `movie_cinemas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movie_genres`
--

DROP TABLE IF EXISTS `movie_genres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movie_genres` (
  `movie_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  PRIMARY KEY (`movie_id`,`genre_id`),
  KEY `genre_id` (`genre_id`),
  CONSTRAINT `movie_genres_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `movie_genres_ibfk_2` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movie_genres`
--

LOCK TABLES `movie_genres` WRITE;
/*!40000 ALTER TABLE `movie_genres` DISABLE KEYS */;
INSERT INTO `movie_genres` VALUES (1,1),(4,1),(18,1),(1,2),(3,3),(11,3),(14,3),(16,4),(18,4),(5,5),(16,5),(10,6),(12,6),(13,6),(15,6),(6,7),(2,8);
/*!40000 ALTER TABLE `movie_genres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movie_screening`
--

DROP TABLE IF EXISTS `movie_screening`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movie_screening` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `movie_id` int(11) NOT NULL,
  `cinema_id` int(11) NOT NULL,
  `start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_ov` tinyint(1) NOT NULL,
  `is_3d` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `movie_id` (`movie_id`),
  KEY `cinema_id` (`cinema_id`),
  CONSTRAINT `movie_screening_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`),
  CONSTRAINT `movie_screening_ibfk_2` FOREIGN KEY (`cinema_id`) REFERENCES `cinemas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movie_screening`
--

LOCK TABLES `movie_screening` WRITE;
/*!40000 ALTER TABLE `movie_screening` DISABLE KEYS */;
INSERT INTO `movie_screening` VALUES (1,2,1,'2016-12-02 16:15:00','2016-12-02 16:15:00',0,0),(2,2,1,'2016-12-02 19:15:00','2016-12-02 19:15:00',0,0),(3,2,1,'2016-11-29 08:29:38','2016-12-02 22:15:00',0,0),(4,14,1,'2016-12-02 17:00:00','2016-12-02 17:00:00',0,0),(5,15,1,'2016-12-02 19:15:00','2016-12-02 19:15:00',0,0),(6,15,1,'2016-12-02 22:10:00','2016-12-02 22:10:00',0,0),(7,18,1,'2016-11-29 08:34:33','2016-12-02 16:30:00',0,1),(8,18,1,'2016-11-29 08:34:33','2016-12-02 18:40:00',0,1),(9,18,1,'2016-11-29 08:34:33','2016-12-02 21:50:00',0,1),(10,6,1,'2016-12-02 13:45:00','2016-12-02 13:45:00',0,0),(11,5,1,'2016-12-02 19:30:00','2016-12-02 19:30:00',0,0),(12,16,1,'2016-12-02 20:00:00','2016-12-02 20:00:00',0,0),(13,16,1,'2016-12-02 22:30:00','2016-12-02 22:30:00',0,0),(14,1,1,'2016-11-29 08:34:33','2016-12-02 12:00:00',0,1),(15,1,1,'2016-11-29 08:34:33','2016-12-02 14:15:00',0,1),(16,1,1,'2016-11-29 08:34:33','2016-12-02 16:00:00',0,1),(17,1,1,'2016-11-29 08:34:33','2016-12-02 19:30:00',0,1),(18,1,1,'2016-11-29 08:34:33','2016-12-02 21:20:00',0,1),(19,1,1,'2016-12-02 13:00:00','2016-12-02 13:00:00',0,0),(20,1,1,'2016-12-02 15:15:00','2016-12-02 15:15:00',0,0),(21,1,1,'2016-12-02 18:00:00','2016-12-02 18:00:00',0,0),(22,10,2,'2016-12-02 19:30:00','2016-12-02 19:30:00',0,0),(23,11,2,'2016-12-02 17:00:00','2016-12-02 17:00:00',0,0),(24,12,2,'2016-12-02 14:30:00','2016-12-02 14:30:00',0,0),(25,5,2,'2016-12-02 14:30:00','2016-12-02 14:30:00',0,0),(26,13,2,'2016-12-02 17:00:00','2016-12-02 17:00:00',0,0),(27,2,3,'2016-11-29 08:29:38','2016-12-02 19:45:00',1,0),(28,18,3,'2016-11-29 08:29:38','2016-12-02 13:30:00',1,0),(29,1,3,'2016-11-29 08:29:38','2016-12-02 16:30:00',1,0),(30,2,4,'2016-12-02 13:15:00','2016-12-02 13:15:00',0,0),(31,2,4,'2016-12-02 16:15:00','2016-12-02 16:15:00',0,0),(32,2,4,'2016-12-02 19:15:00','2016-12-02 19:15:00',0,0),(33,2,4,'2016-12-02 22:15:00','2016-12-02 22:15:00',0,0),(34,3,4,'2016-12-02 18:45:00','2016-12-02 18:45:00',0,0),(35,14,4,'2016-12-02 15:45:00','2016-12-02 15:45:00',0,0),(36,15,4,'2016-12-02 18:45:00','2016-12-02 18:45:00',0,0),(37,15,4,'2016-12-02 21:45:00','2016-12-02 21:45:00',0,0),(38,18,4,'2016-12-02 16:00:00','2016-12-02 16:00:00',0,0),(39,18,4,'2016-11-29 08:29:38','2016-12-02 19:00:00',0,1),(40,6,4,'2016-12-02 13:30:00','2016-12-02 13:30:00',0,0),(41,6,4,'2016-12-02 16:15:00','2016-12-02 16:15:00',0,0),(42,5,4,'2016-12-02 22:00:00','2016-12-02 22:00:00',0,0),(43,16,4,'2016-12-02 16:00:00','2016-12-02 16:00:00',0,0),(44,16,4,'2016-12-02 19:00:00','2016-12-02 19:00:00',0,0),(45,16,4,'2016-12-02 22:15:00','2016-12-02 22:15:00',0,0),(46,1,4,'2016-12-02 13:45:00','2016-12-02 13:45:00',0,1),(47,1,4,'2016-12-02 16:15:00','2016-12-02 16:15:00',0,1),(48,1,4,'2016-12-02 19:30:00','2016-12-02 19:30:00',0,1),(49,1,4,'2016-12-02 22:00:00','2016-12-02 22:00:00',0,1),(50,1,4,'2016-12-02 13:00:00','2016-12-02 13:00:00',0,0),(51,1,4,'2016-12-02 15:30:00','2016-12-02 15:30:00',0,0),(52,1,4,'2016-12-02 18:45:00','2016-12-02 18:45:00',0,0);
/*!40000 ALTER TABLE `movie_screening` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movies`
--

DROP TABLE IF EXISTS `movies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `image_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movies`
--

LOCK TABLES `movies` WRITE;
/*!40000 ALTER TABLE `movies` DISABLE KEYS */;
INSERT INTO `movies` VALUES (1,'Phantastische Tierwesen und wo sie zu finden sind','Phantastische Tierwesen und wo sie zu finden sind: Spinoff von \"Harry Potter\", mit dem die Autorin der Buchvorlagen ihr Debüt als Drehbuchautorin gibt.','phantastische-tierwesen.jpg'),(2,'Arrival','Arrival: Science-Fiction-Film über die Begegnung zwischen Menschen und Aliens.','arrival.jpg'),(3,'Bad Santa 2','Bad Santa 2: Fortsetzung der schwarzen Komödie mit Billy Bob Thornton.','bad-santa-2.jpg'),(4,'Doctor Strange','Doctor Strange: Marvel-Leinwand-Abenteuer um einen ehemaligen Chirurgen mit magischen Fähigkeiten.','doctor-strange.jpg'),(5,'Girl on the Train','Girl on the Train: Thriller nach dem gleichnamigen US-Bestseller um eine Frau, die in einen Mord verwickelt wird.','girl-on-the-train.jpg'),(6,'Findet Dorie','Findet Dorie: Sequel zum Pixar-Blockbuster \"Findet Nemo\", in dem Dorie gesucht wird.','findet-dorie.jpg'),(10,'Amerikanisches Idyll','Amerikanisches Idyll: Ewan McGregors Regiedebüt nach dem gleichnamigen Roman von Philip Roth.','amerikanisches-idyll.jpg'),(11,'Café Society','Café Society: Bittersüße Liebes- und Aufsteigergeschichte im Hollywood der 1930er Jahre.','cafe-society.jpg'),(12,'Eine Geschichte von Liebe und Finsternis','Eine Geschichte von Liebe und Finsternis: Natalie Portmans Regiedebüt, über die Kindheit des israelischen Schriftstellers Amos Oz.','geschichte-von-liebe.jpg'),(13,'Jeder stirbt für sich allein - Alone in Berlin','Jeder stirbt für sich allein: Neuverfilmung des Romans von Hans Fallada um ein Arbeiterehepaar, das Widerstand gegen die Nazis leistet.','jeder-stirbt.jpg'),(14,'Bridget Jones\' Baby','Bridget Jones\' Baby: Weiterer Teil der erfolgreichen \"Bridget Jones\"-Reihe mit Renée Zellweger, die dieses Mal ein Kind erwartet.','bridget-jones.jpg'),(15,'Deepwater Horizon','Deepwater Horizon: Katastrophenthriller, der sich der Ereignisse aus dem Jahr 2010 auf der gleichnamigen Bohrinsel annimmt.','deepwater.jpg'),(16,'Jack Reacher: Kein Weg zurück','Jack Reacher: Kein Weg zurück: Die Fortsetzung des Actionthrillers mit Tom Cruise als Lee Childs Kultermittler Jack Reacher.','jack-reacher.jpg'),(18,'Doctor Strange','Doctor Strange: Marvel-Leinwand-Abenteuer um einen ehemaligen Chirurgen mit magischen Fähigkeiten.','doctor-strange.jpg');
/*!40000 ALTER TABLE `movies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ratings`
--

DROP TABLE IF EXISTS `ratings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ratings` (
  `movie_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `text` text,
  PRIMARY KEY (`movie_id`,`user_id`),
  KEY `movie_id_idx` (`movie_id`),
  KEY `user_id_idx` (`user_id`),
  CONSTRAINT `fk_movie_id` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ratings`
--

LOCK TABLES `ratings` WRITE;
/*!40000 ALTER TABLE `ratings` DISABLE KEYS */;
INSERT INTO `ratings` VALUES (1,1,8,'Der Film ist bestimmt gut hab ihn aber noch nicht gesehen'),(1,2,4,'Weil die Fabelwesen yo, mir Angst eingejagt haben yo, gebe ich nun eine 4, wie deine Mo, yo'),(1,3,2,'Der Film ist scheisse'),(1,4,6,'This film is a great story of somebody doing something in a world I don\'t know.'),(1,5,1,'Wann ist das auf kinox.to verfügbar?'),(2,1,5,'f'),(2,2,4,'Test'),(2,3,4,'Test');
/*!40000 ALTER TABLE `ratings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Felix1337'),(2,'Konny007'),(3,'Tom04'),(4,'OliverG'),(5,'T0b1n4t0r');
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

-- Dump completed on 2016-11-29 10:13:18
