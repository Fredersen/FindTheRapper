-- MySQL dump 10.13  Distrib 8.0.27, for Linux (x86_64)
--
-- Host: localhost    Database: findtherapper
-- ------------------------------------------------------
-- Server version	8.0.27-0ubuntu0.21.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migration_versions`
--

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20220202144534','2022-02-03 18:27:13',77),('DoctrineMigrations\\Version20220202150747','2022-02-03 18:27:13',37),('DoctrineMigrations\\Version20220202153840','2022-02-03 18:27:13',0),('DoctrineMigrations\\Version20220202212336','2022-02-03 18:27:13',19),('DoctrineMigrations\\Version20220202220844','2022-02-03 18:27:13',26),('DoctrineMigrations\\Version20220203113528','2022-02-03 18:27:13',0),('DoctrineMigrations\\Version20220203113739','2022-02-03 18:27:13',56),('DoctrineMigrations\\Version20220203113811','2022-02-03 18:27:13',38);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `game`
--

DROP TABLE IF EXISTS `game`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `game` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_rapper` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `search_sound` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `victory_sound` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position_x` int NOT NULL,
  `position_y` int NOT NULL,
  `time` int NOT NULL,
  `level` int NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `game`
--

LOCK TABLES `game` WRITE;
/*!40000 ALTER TABLE `game` DISABLE KEYS */;
INSERT INTO `game` VALUES (1,'SCH','img-0324-61fc114f444fa671626883.png','jul-mther-fk-ft-sch-clip-officiel-2020-61fc114f44740375042545.ogg','sch-champs-elysees-61fcfade42407147376336.mp3',6,11,30,1,'2022-02-04 11:07:26'),(2,'Damso','img-0321-61fc272d4a897243435206.png','damso-61fc272d4aa8a979137352.mp3','s-morose-61fcfaff9d4c7654114912.mp3',3,15,30,2,'2022-02-04 11:07:59'),(4,'La fouine','lafouine-61fc4d546852a452904820.png','fouiny-61fc4d64c9283536496885.mp3','fouine-61fc4d64c960f571799805.mp3',10,2,25,4,'2022-02-03 22:47:16'),(5,'Seyfu','sefyu-61fc4f19c9e00552552530.jpg','se-61fc521cd0173410169485.mp3','sefyu-61fcfb1313196497584629.mp3',15,13,20,3,'2022-02-04 11:08:19'),(6,'Alkpote','alkpote-620123252b9cb444321175.png','alk-salope-620123252c43e595866256.mp3','alkmix-620123252de6f311219311.mp3',12,17,20,5,'2022-02-07 14:48:21');
/*!40000 ALTER TABLE `game` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `game_id` int DEFAULT NULL,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`),
  KEY `IDX_8D93D649E48FD905` (`game_id`),
  CONSTRAINT `FK_8D93D649E48FD905` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,1,'admin','$2y$13$4IYANYACGu.BeHfUudFmMuYUKoFk0mVbuhYcs.6R47aCE5hYSAsya','[\"ROLE_ADMIN\"]'),(2,1,'naim','$2y$13$S7zGfavOohVUFv1bPgVAn.9Td3oS50I4hKwxfqbAUX.UHZoIsV0Dm','[]'),(3,1,'eldiablo','$2y$13$5WOcua.JwOW3QPJgipKS9eNogvN1J33prN32PAnr2FUAWFlknb912','[]');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-02-11 16:30:15
