-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: localhost    Database: spp_online
-- ------------------------------------------------------
-- Server version	8.0.22

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `bill_details`
--

DROP TABLE IF EXISTS `bill_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bill_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_classroom_bills_id` int NOT NULL,
  `bill_detail` varchar(255) NOT NULL,
  `status` varchar(45) NOT NULL,
  `amount` double unsigned NOT NULL,
  `paid_at` timestamp(6) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_bill_details_student_classroom_bills1` (`student_classroom_bills_id`),
  CONSTRAINT `fk_bill_details_student_classroom_bills1` FOREIGN KEY (`student_classroom_bills_id`) REFERENCES `student_classroom_bills` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=253 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bill_details`
--

LOCK TABLES `bill_details` WRITE;
/*!40000 ALTER TABLE `bill_details` DISABLE KEYS */;
INSERT INTO `bill_details` VALUES (1,1,'January 2020','UNPAID',250000,NULL),(2,1,'February 2020','UNPAID',250000,NULL),(3,1,'March 2020','UNPAID',250000,NULL),(4,1,'April 2020','UNPAID',250000,NULL),(5,1,'May 2020','UNPAID',250000,NULL),(6,1,'June 2020','UNPAID',250000,NULL),(7,1,'July 2020','UNPAID',250000,NULL),(8,1,'August 2020','UNPAID',250000,NULL),(9,1,'September 2020','UNPAID',250000,NULL),(10,1,'October 2020','UNPAID',250000,NULL),(11,1,'November 2020','UNPAID',250000,NULL),(12,1,'December 2020','UNPAID',250000,NULL),(13,2,'January 2020','UNPAID',250000,NULL),(14,2,'February 2020','UNPAID',250000,NULL),(15,2,'March 2020','UNPAID',250000,NULL),(16,2,'April 2020','UNPAID',250000,NULL),(17,2,'May 2020','UNPAID',250000,NULL),(18,2,'June 2020','UNPAID',250000,NULL),(19,2,'July 2020','UNPAID',250000,NULL),(20,2,'August 2020','UNPAID',250000,NULL),(21,2,'September 2020','UNPAID',250000,NULL),(22,2,'October 2020','UNPAID',250000,NULL),(23,2,'November 2020','UNPAID',250000,NULL),(24,2,'December 2020','UNPAID',250000,NULL),(25,3,'January 2020','UNPAID',250000,NULL),(26,3,'February 2020','UNPAID',250000,NULL),(27,3,'March 2020','UNPAID',250000,NULL),(28,3,'April 2020','UNPAID',250000,NULL),(29,3,'May 2020','UNPAID',250000,NULL),(30,3,'June 2020','UNPAID',250000,NULL),(31,3,'July 2020','UNPAID',250000,NULL),(32,3,'August 2020','UNPAID',250000,NULL),(33,3,'September 2020','UNPAID',250000,NULL),(34,3,'October 2020','UNPAID',250000,NULL),(35,3,'November 2020','UNPAID',250000,NULL),(36,3,'December 2020','UNPAID',250000,NULL),(37,4,'January 2020','UNPAID',250000,NULL),(38,4,'February 2020','UNPAID',250000,NULL),(39,4,'March 2020','UNPAID',250000,NULL),(40,4,'April 2020','UNPAID',250000,NULL),(41,4,'May 2020','UNPAID',250000,NULL),(42,4,'June 2020','UNPAID',250000,NULL),(43,4,'July 2020','UNPAID',250000,NULL),(44,4,'August 2020','UNPAID',250000,NULL),(45,4,'September 2020','UNPAID',250000,NULL),(46,4,'October 2020','UNPAID',250000,NULL),(47,4,'November 2020','UNPAID',250000,NULL),(48,4,'December 2020','UNPAID',250000,NULL),(49,5,'January 2020','UNPAID',250000,NULL),(50,5,'February 2020','UNPAID',250000,NULL),(51,5,'March 2020','UNPAID',250000,NULL),(52,5,'April 2020','UNPAID',250000,NULL),(53,5,'May 2020','UNPAID',250000,NULL),(54,5,'June 2020','UNPAID',250000,NULL),(55,5,'July 2020','UNPAID',250000,NULL),(56,5,'August 2020','UNPAID',250000,NULL),(57,5,'September 2020','UNPAID',250000,NULL),(58,5,'October 2020','UNPAID',250000,NULL),(59,5,'November 2020','UNPAID',250000,NULL),(60,5,'December 2020','UNPAID',250000,NULL),(61,6,'January 2021','UNPAID',300000,NULL),(62,6,'February 2021','UNPAID',300000,NULL),(63,6,'March 2021','UNPAID',300000,NULL),(64,6,'April 2021','UNPAID',300000,NULL),(65,6,'May 2021','UNPAID',300000,NULL),(66,6,'June 2021','UNPAID',300000,NULL),(67,6,'July 2021','UNPAID',300000,NULL),(68,6,'August 2021','UNPAID',300000,NULL),(69,6,'September 2021','UNPAID',300000,NULL),(70,6,'October 2021','UNPAID',300000,NULL),(71,6,'November 2021','UNPAID',300000,NULL),(72,6,'December 2021','UNPAID',300000,NULL),(73,7,'January 2021','UNPAID',300000,NULL),(74,7,'February 2021','UNPAID',300000,NULL),(75,7,'March 2021','UNPAID',300000,NULL),(76,7,'April 2021','UNPAID',300000,NULL),(77,7,'May 2021','UNPAID',300000,NULL),(78,7,'June 2021','UNPAID',300000,NULL),(79,7,'July 2021','UNPAID',300000,NULL),(80,7,'August 2021','UNPAID',300000,NULL),(81,7,'September 2021','UNPAID',300000,NULL),(82,7,'October 2021','UNPAID',300000,NULL),(83,7,'November 2021','UNPAID',300000,NULL),(84,7,'December 2021','UNPAID',300000,NULL),(85,8,'January 2021','UNPAID',300000,NULL),(86,8,'February 2021','UNPAID',300000,NULL),(87,8,'March 2021','UNPAID',300000,NULL),(88,8,'April 2021','UNPAID',300000,NULL),(89,8,'May 2021','UNPAID',300000,NULL),(90,8,'June 2021','UNPAID',300000,NULL),(91,8,'July 2021','UNPAID',300000,NULL),(92,8,'August 2021','UNPAID',300000,NULL),(93,8,'September 2021','UNPAID',300000,NULL),(94,8,'October 2021','UNPAID',300000,NULL),(95,8,'November 2021','UNPAID',300000,NULL),(96,8,'December 2021','UNPAID',300000,NULL),(97,9,'January 2021','UNPAID',300000,NULL),(98,9,'February 2021','UNPAID',300000,NULL),(99,9,'March 2021','UNPAID',300000,NULL),(100,9,'April 2021','UNPAID',300000,NULL),(101,9,'May 2021','UNPAID',300000,NULL),(102,9,'June 2021','UNPAID',300000,NULL),(103,9,'July 2021','UNPAID',300000,NULL),(104,9,'August 2021','UNPAID',300000,NULL),(105,9,'September 2021','UNPAID',300000,NULL),(106,9,'October 2021','UNPAID',300000,NULL),(107,9,'November 2021','UNPAID',300000,NULL),(108,9,'December 2021','UNPAID',300000,NULL),(109,10,'January 2021','UNPAID',300000,NULL),(110,10,'February 2021','UNPAID',300000,NULL),(111,10,'March 2021','UNPAID',300000,NULL),(112,10,'April 2021','UNPAID',300000,NULL),(113,10,'May 2021','UNPAID',300000,NULL),(114,10,'June 2021','UNPAID',300000,NULL),(115,10,'July 2021','UNPAID',300000,NULL),(116,10,'August 2021','UNPAID',300000,NULL),(117,10,'September 2021','UNPAID',300000,NULL),(118,10,'October 2021','UNPAID',300000,NULL),(119,10,'November 2021','UNPAID',300000,NULL),(120,10,'December 2021','UNPAID',300000,NULL),(121,11,'January 2022','UNPAID',350000,NULL),(122,11,'February 2022','UNPAID',350000,NULL),(123,11,'March 2022','UNPAID',350000,NULL),(124,11,'April 2022','UNPAID',350000,NULL),(125,11,'May 2022','UNPAID',350000,NULL),(126,11,'June 2022','UNPAID',350000,NULL),(127,11,'July 2022','UNPAID',350000,NULL),(128,11,'August 2022','UNPAID',350000,NULL),(129,11,'September 2022','UNPAID',350000,NULL),(130,11,'October 2022','UNPAID',350000,NULL),(131,11,'November 2022','UNPAID',350000,NULL),(132,11,'December 2022','UNPAID',350000,NULL),(133,12,'January 2022','UNPAID',350000,NULL),(134,12,'February 2022','UNPAID',350000,NULL),(135,12,'March 2022','UNPAID',350000,NULL),(136,12,'April 2022','UNPAID',350000,NULL),(137,12,'May 2022','UNPAID',350000,NULL),(138,12,'June 2022','UNPAID',350000,NULL),(139,12,'July 2022','UNPAID',350000,NULL),(140,12,'August 2022','UNPAID',350000,NULL),(141,12,'September 2022','UNPAID',350000,NULL),(142,12,'October 2022','UNPAID',350000,NULL),(143,12,'November 2022','UNPAID',350000,NULL),(144,12,'December 2022','UNPAID',350000,NULL),(145,13,'January 2022','UNPAID',350000,NULL),(146,13,'February 2022','UNPAID',350000,NULL),(147,13,'March 2022','UNPAID',350000,NULL),(148,13,'April 2022','UNPAID',350000,NULL),(149,13,'May 2022','UNPAID',350000,NULL),(150,13,'June 2022','UNPAID',350000,NULL),(151,13,'July 2022','UNPAID',350000,NULL),(152,13,'August 2022','UNPAID',350000,NULL),(153,13,'September 2022','UNPAID',350000,NULL),(154,13,'October 2022','UNPAID',350000,NULL),(155,13,'November 2022','UNPAID',350000,NULL),(156,13,'December 2022','UNPAID',350000,NULL),(157,14,'January 2022','UNPAID',350000,NULL),(158,14,'February 2022','UNPAID',350000,NULL),(159,14,'March 2022','UNPAID',350000,NULL),(160,14,'April 2022','UNPAID',350000,NULL),(161,14,'May 2022','UNPAID',350000,NULL),(162,14,'June 2022','UNPAID',350000,NULL),(163,14,'July 2022','UNPAID',350000,NULL),(164,14,'August 2022','UNPAID',350000,NULL),(165,14,'September 2022','UNPAID',350000,NULL),(166,14,'October 2022','UNPAID',350000,NULL),(167,14,'November 2022','UNPAID',350000,NULL),(168,14,'December 2022','UNPAID',350000,NULL),(169,15,'January 2022','UNPAID',350000,NULL),(170,15,'February 2022','UNPAID',350000,NULL),(171,15,'March 2022','UNPAID',350000,NULL),(172,15,'April 2022','UNPAID',350000,NULL),(173,15,'May 2022','UNPAID',350000,NULL),(174,15,'June 2022','UNPAID',350000,NULL),(175,15,'July 2022','UNPAID',350000,NULL),(176,15,'August 2022','UNPAID',350000,NULL),(177,15,'September 2022','UNPAID',350000,NULL),(178,15,'October 2022','UNPAID',350000,NULL),(179,15,'November 2022','UNPAID',350000,NULL),(180,15,'December 2022','UNPAID',350000,NULL),(181,16,'January 2022','UNPAID',350000,NULL),(182,16,'February 2022','UNPAID',350000,NULL),(183,16,'March 2022','UNPAID',350000,NULL),(184,16,'April 2022','UNPAID',350000,NULL),(185,16,'May 2022','UNPAID',350000,NULL),(186,16,'June 2022','UNPAID',350000,NULL),(187,16,'July 2022','UNPAID',350000,NULL),(188,16,'August 2022','UNPAID',350000,NULL),(189,16,'September 2022','UNPAID',350000,NULL),(190,16,'October 2022','UNPAID',350000,NULL),(191,16,'November 2022','UNPAID',350000,NULL),(192,16,'December 2022','UNPAID',350000,NULL),(193,17,'January 2022','UNPAID',350000,NULL),(194,17,'February 2022','UNPAID',350000,NULL),(195,17,'March 2022','UNPAID',350000,NULL),(196,17,'April 2022','UNPAID',350000,NULL),(197,17,'May 2022','UNPAID',350000,NULL),(198,17,'June 2022','UNPAID',350000,NULL),(199,17,'July 2022','UNPAID',350000,NULL),(200,17,'August 2022','UNPAID',350000,NULL),(201,17,'September 2022','UNPAID',350000,NULL),(202,17,'October 2022','UNPAID',350000,NULL),(203,17,'November 2022','UNPAID',350000,NULL),(204,17,'December 2022','UNPAID',350000,NULL),(205,18,'January 2022','UNPAID',350000,NULL),(206,18,'February 2022','UNPAID',350000,NULL),(207,18,'March 2022','UNPAID',350000,NULL),(208,18,'April 2022','UNPAID',350000,NULL),(209,18,'May 2022','UNPAID',350000,NULL),(210,18,'June 2022','UNPAID',350000,NULL),(211,18,'July 2022','UNPAID',350000,NULL),(212,18,'August 2022','UNPAID',350000,NULL),(213,18,'September 2022','UNPAID',350000,NULL),(214,18,'October 2022','UNPAID',350000,NULL),(215,18,'November 2022','UNPAID',350000,NULL),(216,18,'December 2022','UNPAID',350000,NULL),(217,19,'January 2022','UNPAID',350000,NULL),(218,19,'February 2022','UNPAID',350000,NULL),(219,19,'March 2022','UNPAID',350000,NULL),(220,19,'April 2022','UNPAID',350000,NULL),(221,19,'May 2022','UNPAID',350000,NULL),(222,19,'June 2022','UNPAID',350000,NULL),(223,19,'July 2022','UNPAID',350000,NULL),(224,19,'August 2022','UNPAID',350000,NULL),(225,19,'September 2022','UNPAID',350000,NULL),(226,19,'October 2022','UNPAID',350000,NULL),(227,19,'November 2022','UNPAID',350000,NULL),(228,19,'December 2022','UNPAID',350000,NULL),(229,20,'January 2022','UNPAID',350000,NULL),(230,20,'February 2022','UNPAID',350000,NULL),(231,20,'March 2022','UNPAID',350000,NULL),(232,20,'April 2022','UNPAID',350000,NULL),(233,20,'May 2022','UNPAID',350000,NULL),(234,20,'June 2022','UNPAID',350000,NULL),(235,20,'July 2022','UNPAID',350000,NULL),(236,20,'August 2022','UNPAID',350000,NULL),(237,20,'September 2022','UNPAID',350000,NULL),(238,20,'October 2022','UNPAID',350000,NULL),(239,20,'November 2022','UNPAID',350000,NULL),(240,20,'December 2022','UNPAID',350000,NULL),(241,21,'January 2022','UNPAID',350000,NULL),(242,21,'February 2022','UNPAID',350000,NULL),(243,21,'March 2022','UNPAID',350000,NULL),(244,21,'April 2022','UNPAID',350000,NULL),(245,21,'May 2022','UNPAID',350000,NULL),(246,21,'June 2022','UNPAID',350000,NULL),(247,21,'July 2022','UNPAID',350000,NULL),(248,21,'August 2022','UNPAID',350000,NULL),(249,21,'September 2022','UNPAID',350000,NULL),(250,21,'October 2022','UNPAID',350000,NULL),(251,21,'November 2022','UNPAID',350000,NULL),(252,21,'December 2022','UNPAID',350000,NULL);
/*!40000 ALTER TABLE `bill_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bills`
--

DROP TABLE IF EXISTS `bills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bills` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `year` int NOT NULL,
  `amount` double unsigned NOT NULL,
  `status` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bills`
--

LOCK TABLES `bills` WRITE;
/*!40000 ALTER TABLE `bills` DISABLE KEYS */;
INSERT INTO `bills` VALUES (1,'SPP - 2020',2020,250000,'ACTIVE'),(2,'SPP - 2021',2021,300000,'ACTIVE'),(3,'SPP - 2022',2022,350000,'ACTIVE');
/*!40000 ALTER TABLE `bills` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `classrooms`
--

DROP TABLE IF EXISTS `classrooms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `classrooms` (
  `id` int NOT NULL AUTO_INCREMENT,
  `classroom` int NOT NULL,
  `classroom_name` varchar(255) NOT NULL,
  `status` varchar(45) NOT NULL,
  `tahun_ajaran` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classrooms`
--

LOCK TABLES `classrooms` WRITE;
/*!40000 ALTER TABLE `classrooms` DISABLE KEYS */;
INSERT INTO `classrooms` VALUES (1,10,'10 A','ACTIVE',2020),(2,10,'10 B','ACTIVE',2020),(3,10,'10 C','ACTIVE',2020),(4,11,'11 A','ACTIVE',2021),(5,11,'11 B','ACTIVE',2021),(6,11,'11 C','ACTIVE',2021),(7,10,'10 A','ACTIVE',2022),(8,10,'10 B','ACTIVE',2022),(9,10,'10 C','ACTIVE',2022),(10,11,'11 A','ACTIVE',2022),(11,11,'11 B','ACTIVE',2022),(12,11,'11 C','ACTIVE',2022),(13,12,'12 A','ACTIVE',2022),(14,12,'12 B','ACTIVE',2022),(17,12,'12 C','ACTIVE',2022);
/*!40000 ALTER TABLE `classrooms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_classroom_bills`
--

DROP TABLE IF EXISTS `student_classroom_bills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `student_classroom_bills` (
  `id` int NOT NULL AUTO_INCREMENT,
  `bills_id` int NOT NULL,
  `classrooms_id` int NOT NULL,
  `students_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_student_classroom_bills_bills1_idx` (`bills_id`),
  KEY `fk_student_classroom_bills_classrooms1_idx` (`classrooms_id`),
  KEY `fk_student_classroom_bills_students1_idx` (`students_id`),
  CONSTRAINT `fk_student_classroom_bills_bills1` FOREIGN KEY (`bills_id`) REFERENCES `bills` (`id`),
  CONSTRAINT `fk_student_classroom_bills_classrooms1` FOREIGN KEY (`classrooms_id`) REFERENCES `classrooms` (`id`),
  CONSTRAINT `fk_student_classroom_bills_students1` FOREIGN KEY (`students_id`) REFERENCES `students` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_classroom_bills`
--

LOCK TABLES `student_classroom_bills` WRITE;
/*!40000 ALTER TABLE `student_classroom_bills` DISABLE KEYS */;
INSERT INTO `student_classroom_bills` VALUES (1,1,1,1),(2,1,1,2),(3,1,1,3),(4,1,1,4),(5,1,1,5),(6,2,5,1),(7,2,5,2),(8,2,5,3),(9,2,5,4),(10,2,5,5),(11,3,9,6),(12,3,9,7),(13,3,10,8),(14,3,10,9),(15,3,13,1),(16,3,13,2),(17,3,13,3),(18,3,13,4),(19,3,13,5),(20,3,13,10),(21,3,13,11);
/*!40000 ALTER TABLE `student_classroom_bills` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `students` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) NOT NULL,
  `nis` varchar(25) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `religion` varchar(45) NOT NULL,
  `birthplace` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `status` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nis_UNIQUE` (`nis`),
  UNIQUE KEY `phone_number_UNIQUE` (`phone_number`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (1,'Rafi Putra Ramadhan','8774476138','Laki-Laki','Islam','Jakarta','2000-12-11','Vila Inti Persada','+62 821-1366-4563','ACTIVE'),(2,'Student 1','6856054648','Perempuan','Islam','Jakarta','2022-05-12','Jl. Jalan No.1','+62 821-2525-2634','ACTIVE'),(3,'Student 2','7862920198','Laki-Laki','Islam','Jakarta','2022-05-11','Jl. Jalan No.2','+62 821-2525-6265','ACTIVE'),(4,'Student 3','9086560178','Laki-Laki','Islam','Tangerang','2022-05-10','Jl. Jalan No.3','+62 821-1236-2526','ACTIVE'),(5,'Student 4','6199118496','Perempuan','Kristen','Banten','2022-05-09','Jl. Jalan No.4','+62 821-6199-1184','ACTIVE'),(6,'Student 5','5984268785','Laki-Laki','Hindu','Bali','2022-05-08','Jl. Jalan No.5','+62 821-5984-4268','ACTIVE'),(7,'Student 6','2583774789','Perempuan','Islam','Semarang','2022-05-07','Jl. Jalan No.6','+62 821-2583-7747','ACTIVE'),(8,'Student 7','7937385769','Laki-Laki','Islam','Medan','2022-05-06','Jl. Jalan No.7','+62 821-7937-3857','ACTIVE'),(9,'Student 8','7069527646','Laki-Laki','Buddha','Malang','2022-05-05','Jl. Jalan No.8','+62 821-7069-5922','ACTIVE'),(10,'Student 9','2715922544','Perempuan','Kristen','Tangerang','2022-05-03','Jl. Jalan No.9','+62 821-2715-9225','ACTIVE'),(11,'Student 10','9276023292','Perempuan','Islam','Jakarta','2022-05-02','Jl. Jalan No.10','+62 821-9276-3292','ACTIVE');
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students_classroom`
--

DROP TABLE IF EXISTS `students_classroom`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `students_classroom` (
  `id` int NOT NULL AUTO_INCREMENT,
  `classroom_id` int NOT NULL,
  `students_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_kelas_has_students_students1_idx` (`students_id`),
  KEY `fk_kelas_has_students_kelas1_idx` (`classroom_id`),
  CONSTRAINT `fk_kelas_has_students_kelas1` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`id`),
  CONSTRAINT `fk_kelas_has_students_students1` FOREIGN KEY (`students_id`) REFERENCES `students` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students_classroom`
--

LOCK TABLES `students_classroom` WRITE;
/*!40000 ALTER TABLE `students_classroom` DISABLE KEYS */;
INSERT INTO `students_classroom` VALUES (1,1,1),(2,1,2),(3,1,3),(4,1,4),(5,1,5),(6,5,1),(7,5,2),(8,5,3),(9,5,4),(10,5,5),(11,9,6),(12,9,7),(13,10,8),(14,10,9),(15,13,1),(16,13,2),(17,13,3),(18,13,4),(19,13,5),(20,13,10),(21,13,11);
/*!40000 ALTER TABLE `students_classroom` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL,
  `students_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `fk_users_students_idx` (`students_id`),
  CONSTRAINT `fk_users_students` FOREIGN KEY (`students_id`) REFERENCES `students` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','admin','admin@raprmdn.com','$2y$10$8J2xO4wcal2oX8KhwkWP6.W8z7AgzbRbTCMBanTGzJQPnk4vhScF.','admin','ACTIVE',NULL),(2,'Rafi Putra Ramadhan','raprmdn','raprmdn@gmail.com','$2y$10$vND3baIIczZUzZR7O9Vc3eq3N1XKjFIDJANWsdIJ3lOVeF07cfL/q','admin','ACTIVE',1),(3,'Student 1','student1','student1@email.com','$2y$10$8J2xO4wcal2oX8KhwkWP6.W8z7AgzbRbTCMBanTGzJQPnk4vhScF.','student','ACTIVE',2),(4,'Student 2','student2','student2@email.com','$2y$10$8J2xO4wcal2oX8KhwkWP6.W8z7AgzbRbTCMBanTGzJQPnk4vhScF.','student','ACTIVE',3),(5,'Student 3','student3','student3@email.com','$2y$10$AEvqLLcCBi4t8lvyMQJgUuKEVCPZVdEtM6i0xzcKGceScxwEUKcUO','student','ACTIVE',4),(6,'Student 4','student4','student4@email.com','$2y$10$dqmBT70i9i/bZb9q5mRbl.lkkKw.13DaSqjsBPYpnbEuRLKlKBevm','student','ACTIVE',5),(7,'Student 5','student5','student5@email.com','$2y$10$dqmBT70i9i/bZb9q5mRbl.lkkKw.13DaSqjsBPYpnbEuRLKlKBevm','student','ACTIVE',6),(8,'Student 6','student6','student6@email.com','$2y$10$dqmBT70i9i/bZb9q5mRbl.lkkKw.13DaSqjsBPYpnbEuRLKlKBevm','student','ACTIVE',7),(9,'Student 7','student7','student7@email.com','$2y$10$dqmBT70i9i/bZb9q5mRbl.lkkKw.13DaSqjsBPYpnbEuRLKlKBevm','student','ACTIVE',8),(10,'Student 8','student8','student8@email.com','$2y$10$dqmBT70i9i/bZb9q5mRbl.lkkKw.13DaSqjsBPYpnbEuRLKlKBevm','student','ACTIVE',9),(11,'Student 9','student9','student9@email.com','$2y$10$dqmBT70i9i/bZb9q5mRbl.lkkKw.13DaSqjsBPYpnbEuRLKlKBevm','student','ACTIVE',10),(12,'Student 10','student10','student10@email.com','$2y$10$dqmBT70i9i/bZb9q5mRbl.lkkKw.13DaSqjsBPYpnbEuRLKlKBevm','student','ACTIVE',11);
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

-- Dump completed on 2022-05-25 17:16:28
