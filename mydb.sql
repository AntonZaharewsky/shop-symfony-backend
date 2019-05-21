-- MySQL dump 10.13  Distrib 8.0.15, for osx10.14 (x86_64)
--
-- Host: localhost    Database: mydb
-- ------------------------------------------------------
-- Server version	5.7.25

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8mb4 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `adresses`
--

DROP TABLE IF EXISTS `adresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `adresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(45) DEFAULT NULL,
  `street` varchar(45) DEFAULT NULL,
  `home_number` varchar(45) DEFAULT NULL,
  `postcode` varchar(45) DEFAULT NULL,
  `podjezd_number` int(11) DEFAULT NULL,
  `flat_number` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adresses`
--

LOCK TABLES `adresses` WRITE;
/*!40000 ALTER TABLE `adresses` DISABLE KEYS */;
INSERT INTO `adresses` VALUES (1,'Minsk','Pushkinskaya','60','1231',12,NULL),(2,'Minsk','Lunkova','17A','5432',16,NULL),(3,'Grodno','Kolasa','1','12314',2,'1'),(4,'Minsk','Kolasa','16',NULL,15,'60'),(5,'Minsk','Kolasa','16',NULL,16,'60'),(6,'City','new','12',NULL,12,'12'),(7,'Cityy','new','12',NULL,12,'12');
/*!40000 ALTER TABLE `adresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `feedback` varchar(45) DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback`
--

LOCK TABLES `feedback` WRITE;
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (28,'Burgers'),(29,'Sauces'),(30,'Chiken'),(31,'Test');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus_and_places`
--

DROP TABLE IF EXISTS `menus_and_places`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `menus_and_places` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menus_id` int(11) NOT NULL,
  `Places_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`menus_id`,`Places_id`),
  KEY `fk_menus_has_Places_menus_idx` (`menus_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus_and_places`
--

LOCK TABLES `menus_and_places` WRITE;
/*!40000 ALTER TABLE `menus_and_places` DISABLE KEYS */;
INSERT INTO `menus_and_places` VALUES (11,28,1),(12,28,2),(15,28,6),(16,28,5),(13,29,1);
/*!40000 ALTER TABLE `menus_and_places` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `body` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_history`
--

DROP TABLE IF EXISTS `order_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `order_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `comment` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_history`
--

LOCK TABLES `order_history` WRITE;
/*!40000 ALTER TABLE `order_history` DISABLE KEYS */;
INSERT INTO `order_history` VALUES (1,10,'Order Placed','2019-05-08 20:36:37'),(2,10,'Order Updated','2019-05-08 20:37:16'),(3,8,'Order Updated','2019-05-08 20:51:42'),(4,11,'Order Placed','2019-05-08 21:01:41'),(5,12,'Order Placed','2019-05-08 21:06:32'),(6,12,'Order Updated','2019-05-08 21:08:32'),(7,13,'Order Placed','2019-05-08 21:09:21'),(8,14,'Order Placed','2019-05-08 21:09:39'),(9,15,'Order Placed','2019-05-08 21:37:47'),(10,16,'Order Placed','2019-05-08 21:42:11'),(11,17,'Order Placed','2019-05-08 21:42:21'),(12,18,'Order Placed','2019-05-08 21:44:00'),(13,19,'Order Placed','2019-05-08 21:44:34'),(14,20,'Order Placed','2019-05-08 21:44:57'),(15,21,'Order Placed','2019-05-08 21:46:00'),(16,22,'Order Placed','2019-05-08 21:51:09'),(17,22,'Order Updated','2019-05-08 21:55:16'),(18,22,'Order Updated','2019-05-08 21:55:32'),(19,23,'Order Placed','2019-05-09 21:45:27'),(20,8,'Order Updated','2019-05-12 12:46:49'),(21,8,'Order Updated','2019-05-12 12:46:54'),(22,8,'Order delivered','2019-05-12 13:09:31'),(23,8,'Order delivery is rolled back','2019-05-12 13:09:47'),(24,8,'Order delivered','2019-05-12 13:22:20'),(25,8,'Order delivery is rolled back','2019-05-12 16:52:21'),(26,8,'Order delivered','2019-05-12 16:52:25'),(27,24,'Order Placed','2019-05-12 21:19:48'),(28,8,'Order delivered','2019-05-12 21:24:46'),(29,9,'Order delivery is rolled back','2019-05-12 21:24:46'),(30,10,'Order delivered','2019-05-12 21:24:46'),(31,11,'Order delivery is rolled back','2019-05-12 21:24:46'),(32,12,'Order delivery is rolled back','2019-05-12 21:24:46'),(33,13,'Order delivery is rolled back','2019-05-12 21:24:46'),(34,14,'Order delivery is rolled back','2019-05-12 21:24:46'),(35,22,'Order delivery is rolled back','2019-05-12 21:24:46'),(36,23,'Order delivery is rolled back','2019-05-12 21:24:46'),(37,8,'Order returned','2019-05-14 22:42:15'),(38,22,'Order delivered','2019-05-14 23:22:34'),(39,22,'Order returned','2019-05-14 23:22:42'),(40,23,'Order delivered','2019-05-14 23:24:08'),(41,23,'Order returned','2019-05-14 23:24:17');
/*!40000 ALTER TABLE `order_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_lines`
--

DROP TABLE IF EXISTS `order_lines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `order_lines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `products_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `quantity` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_lines`
--

LOCK TABLES `order_lines` WRITE;
/*!40000 ALTER TABLE `order_lines` DISABLE KEYS */;
INSERT INTO `order_lines` VALUES (7,34,8,'2'),(8,35,9,'2'),(9,34,10,'1'),(10,34,0,'1'),(11,34,0,'1'),(12,34,0,'1'),(13,34,0,'1'),(14,34,0,'1'),(15,36,0,'2'),(16,34,22,'1'),(17,36,22,'2'),(18,34,23,'1'),(19,35,23,'1'),(20,34,24,'1'),(21,35,24,'1'),(22,38,24,'1');
/*!40000 ALTER TABLE `order_lines` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) NOT NULL,
  `address_id` int(11) DEFAULT NULL,
  `delivered` tinyint(4) DEFAULT NULL,
  `payment_method_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (8,1,3,1,NULL),(9,1,4,0,NULL),(10,1,5,1,2),(11,1,5,NULL,1),(12,1,6,NULL,2),(13,1,6,NULL,2),(14,1,7,NULL,2),(22,1,5,1,2),(23,1,5,1,2),(24,2,5,NULL,1);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `orders_AFTER_INSERT` AFTER INSERT ON `orders` FOR EACH ROW BEGIN
	insert into order_history (order_id, comment, created_at)
    values (NEW.id, 'Order Placed', NOW());
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `orders_BEFORE_UPDATE` BEFORE UPDATE ON `orders` FOR EACH ROW BEGIN
	if NEW.delivered = 1 then
		insert into order_history (order_id, comment, created_at)
		values (NEW.id, 'Order delivered', NOW());
    else
		insert into order_history (order_id, comment, created_at)
		values (NEW.id, 'Order delivery is rolled back', NOW());
	end if;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `orders_AFTER_UPDATE` AFTER UPDATE ON `orders` FOR EACH ROW BEGIN
if NEW.delivered = 1 then
	insert into payment (created_at, orders_id)
	VALUES (NOW() ,NEW.id);
end if;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `orders_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment`
--

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
INSERT INTO `payment` VALUES (6,'2019-05-08 20:16:24',8),(7,'2019-05-08 20:37:16',10),(8,'2019-05-08 21:55:16',22),(9,'2019-05-12 12:46:49',8),(10,'2019-05-12 13:09:31',8),(11,'2019-05-12 13:22:20',8),(12,'2019-05-12 16:52:25',8),(13,'2019-05-12 21:24:46',8),(14,'2019-05-12 21:24:46',10),(15,'2019-05-14 23:22:34',22),(16,'2019-05-14 23:24:08',23);
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_methods`
--

DROP TABLE IF EXISTS `payment_methods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `payment_methods` (
  `id` int(11) NOT NULL,
  `payment_method_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_methods`
--

LOCK TABLES `payment_methods` WRITE;
/*!40000 ALTER TABLE `payment_methods` DISABLE KEYS */;
INSERT INTO `payment_methods` VALUES (1,'Card'),(2,'Cash');
/*!40000 ALTER TABLE `payment_methods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `place_types`
--

DROP TABLE IF EXISTS `place_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `place_types` (
  `id` int(11) NOT NULL,
  `place_type_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `idplace_types_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `place_types`
--

LOCK TABLES `place_types` WRITE;
/*!40000 ALTER TABLE `place_types` DISABLE KEYS */;
INSERT INTO `place_types` VALUES (1,'Restoran'),(2,'Bar');
/*!40000 ALTER TABLE `place_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `places`
--

DROP TABLE IF EXISTS `places`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `places` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `place_name` varchar(45) DEFAULT NULL,
  `small_description` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `place_types_id` int(11) NOT NULL,
  `adresses_id` int(11) NOT NULL,
  `image` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`,`place_types_id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_Places_place_types1_idx` (`place_types_id`),
  KEY `fk_Places_adresses1_idx` (`adresses_id`),
  CONSTRAINT `fk_Places_place_types1` FOREIGN KEY (`place_types_id`) REFERENCES `place_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `places`
--

LOCK TABLES `places` WRITE;
/*!40000 ALTER TABLE `places` DISABLE KEYS */;
INSERT INTO `places` VALUES (1,'Patriot','Small Description','Description',2,1,'patriot.jpeg'),(3,'Mac','Kruto','Description',1,2,NULL),(5,'Kopilka','skidki','big skidki',2,0,NULL),(6,'Cho','fake patrik','sdasd',2,0,'patriot.jpeg');
/*!40000 ALTER TABLE `places` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `image` varchar(45) NOT NULL,
  `cost` decimal(2,0) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`,`image`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (34,'Cheeseburger','Top','burger.jpeg',19,11),(35,'Ketchup','red','ketchup.jpeg',3,13),(36,'Cheese sauce','cheese','cheese.jpg',3,13),(37,'Barbeku','brown','barbeku.jpg',3,13),(38,'Fish Burger','fish','burget.jpg',20,11),(49,'kopilka burger','unique','burger.jpeg',7,16);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `return_reasons`
--

DROP TABLE IF EXISTS `return_reasons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `return_reasons` (
  `idreturn_reasons` int(11) NOT NULL AUTO_INCREMENT,
  `return_reason_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idreturn_reasons`),
  UNIQUE KEY `idreturn_reasons_UNIQUE` (`idreturn_reasons`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `return_reasons`
--

LOCK TABLES `return_reasons` WRITE;
/*!40000 ALTER TABLE `return_reasons` DISABLE KEYS */;
INSERT INTO `return_reasons` VALUES (1,'Bad Quality'),(2,'Too low');
/*!40000 ALTER TABLE `return_reasons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `returns`
--

DROP TABLE IF EXISTS `returns`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `returns` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `returned_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `return_reasons_idreturn_reasons` int(11) NOT NULL,
  `orders_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `returns`
--

LOCK TABLES `returns` WRITE;
/*!40000 ALTER TABLE `returns` DISABLE KEYS */;
INSERT INTO `returns` VALUES (2,'2019-05-14 22:42:15',2,8),(3,'2019-05-14 23:22:42',0,22),(4,'2019-05-14 23:24:17',0,23);
/*!40000 ALTER TABLE `returns` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `mydb`.`returns_AFTER_INSERT` AFTER INSERT ON `returns` FOR EACH ROW
BEGIN
	insert into order_history (order_id, comment, created_at)
	values (NEW.orders_id, 'Order returned', NOW());
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `salt` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `adresses_id` int(11) DEFAULT NULL,
  `role` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `idtable1_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,NULL,NULL,'$2y$13$ga1EC7QQceEK0TpkbKF7cujZO3Ndu0f/6I8HTUovuWuVHdId0y5bS',NULL,'test@test.com',NULL,'ADMIN'),(2,NULL,NULL,'$2y$13$K1j34hfp/u0s7OQLLZEfwOsCfpHsIz28iBDa6fOuGKZgGISNzqP2W',NULL,'testuser@test.com',NULL,'USER');
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

-- Dump completed on 2019-05-20 17:01:24
