CREATE DATABASE  IF NOT EXISTS `contatos` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `contatos`;
-- MySQL dump 10.13  Distrib 8.0.17, for Win64 (x86_64)
--
-- Host: localhost    Database: contatos
-- ------------------------------------------------------
-- Server version	8.0.17

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
-- Table structure for table `header_sobre`
--

DROP TABLE IF EXISTS `header_sobre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `header_sobre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) DEFAULT NULL,
  `subtitulo` varchar(50) DEFAULT NULL,
  `imagem` varchar(100) DEFAULT NULL,
  `cor_titulo` varchar(20) DEFAULT NULL,
  `cor_subtitulo` varchar(20) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `header_sobre`
--

LOCK TABLES `header_sobre` WRITE;
/*!40000 ALTER TABLE `header_sobre` DISABLE KEYS */;
INSERT INTO `header_sobre` VALUES (23,'Bacana esse','Céu rosado','c3e26027d98b6f59499a6228b5df14a1.jpg','#f40000','#bf3f00',0),(24,'Alá o astronautaa','Peixonautaa','e6ab3dd5da7e58101ba5d8cf73aa413b.jpg','#ff8040','#804000',0),(25,'Metafísica','preguiça','f89513cb3d9b9482a69be7e30dd8f2a8.jpg','#ffffff','#000000',1),(26,'Magnifico','subatômica','b729a1b480aad700b29d8482110fcdf4.jpg','#ff8042','#f27900',0),(27,'Finalizado','Sol','5409ce3759e8c8e9dc15fc8f3674ccde.jpg','#00b9b9','#0080c0',0),(29,'Pink','Floyd','8aa33b85e2ece3e59e0e2888612c09f7.jpg','#0080c0','#8080c0',0);
/*!40000 ALTER TABLE `header_sobre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `introducao_curiosidades`
--

DROP TABLE IF EXISTS `introducao_curiosidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `introducao_curiosidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) DEFAULT NULL,
  `texto` varchar(1200) DEFAULT NULL,
  `imagem` varchar(100) DEFAULT NULL,
  `cor_fundo` varchar(50) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `cor_texto` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `introducao_curiosidades`
--

LOCK TABLES `introducao_curiosidades` WRITE;
/*!40000 ALTER TABLE `introducao_curiosidades` DISABLE KEYS */;
INSERT INTO `introducao_curiosidades` VALUES (55,'Curiosidades','Ae                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                ','79f1b41947938f75ba23dba958dd6cbb.png','#ff8000',0,'#000000'),(57,'Testeaaa','aaa               ','bb647e204617f47cff30d791dbf270c0.jpg','#804000',1,'#ffffff'),(58,'Curiosidades','aaaaaaa','da69a658442656cd3c69bec9b9c998c0.jpg','#004040',0,'#000000');
/*!40000 ALTER TABLE `introducao_curiosidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `introducao_lojas`
--

DROP TABLE IF EXISTS `introducao_lojas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `introducao_lojas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) DEFAULT NULL,
  `texto` varchar(1000) DEFAULT NULL,
  `imagem` varchar(100) DEFAULT NULL,
  `cor_fundo` varchar(30) DEFAULT NULL,
  `cor_texto` varchar(30) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `introducao_lojas`
--

LOCK TABLES `introducao_lojas` WRITE;
/*!40000 ALTER TABLE `introducao_lojas` DISABLE KEYS */;
INSERT INTO `introducao_lojas` VALUES (4,'Testaaaa','?Aeeee       aaaa                                                     ','c2d2b5f4222e370e6a1d5f1ca6a22e85.jpg','#408080','',0),(5,'Curiosidades','ae','a793972a7f2d8e3aea4c802afa612b25.png','#000080','#ffffff',0),(6,'Introduction','Nov','0db5af1476545277fab206eb7d10a5a6.png','#000080','#ffffff',1);
/*!40000 ALTER TABLE `introducao_lojas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `section_curiosidades`
--

DROP TABLE IF EXISTS `section_curiosidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `section_curiosidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_um` varchar(50) DEFAULT NULL,
  `titulo_dois` varchar(50) DEFAULT NULL,
  `texto_um` varchar(300) DEFAULT NULL,
  `titulo_tres` varchar(50) DEFAULT NULL,
  `texto_dois` varchar(300) DEFAULT NULL,
  `titulo_quatro` varchar(50) DEFAULT NULL,
  `texto_tres` varchar(300) DEFAULT NULL,
  `imagem` varchar(100) DEFAULT NULL,
  `cor_fundo` varchar(50) DEFAULT NULL,
  `cor_texto` varchar(50) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `section_curiosidades`
--

LOCK TABLES `section_curiosidades` WRITE;
/*!40000 ALTER TABLE `section_curiosidades` DISABLE KEYS */;
INSERT INTO `section_curiosidades` VALUES (17,'eeeeee','a','aaaaaaaa\r\n                                            ','aaa','aa','aa','aaa       aaaaaaaaaaa                                  ','102bccbb247a61a897b544a75d56b005.jpg','#ff8040','#000000',1),(19,'curiosos','de','aaa                                            ','asdasd','             a                               ','asdad','a                                            ','8d26f34a33c71d5fd9c818d6dcf734db.jpg','#004040','#ffffff',0);
/*!40000 ALTER TABLE `section_curiosidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sectiondois_sobre`
--

DROP TABLE IF EXISTS `sectiondois_sobre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sectiondois_sobre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) DEFAULT NULL,
  `texto` varchar(50) DEFAULT NULL,
  `imagem` varchar(100) DEFAULT NULL,
  `cor_texto` varchar(20) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sectiondois_sobre`
--

LOCK TABLES `sectiondois_sobre` WRITE;
/*!40000 ALTER TABLE `sectiondois_sobre` DISABLE KEYS */;
INSERT INTO `sectiondois_sobre` VALUES (6,'Opaaaa','opaaa','9438253a130f0ea2ea3cb7f673add58a.jpg','#000000',0),(8,'Curiosidadessasd','aasdasd','b1f4d2d68eaeda05cbeb417164dbc868.jpg','#000000',1);
/*!40000 ALTER TABLE `sectiondois_sobre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sectionum_sobre`
--

DROP TABLE IF EXISTS `sectionum_sobre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sectionum_sobre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) DEFAULT NULL,
  `texto` varchar(300) DEFAULT NULL,
  `imagem` varchar(100) DEFAULT NULL,
  `cor_font` varchar(50) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sectionum_sobre`
--

LOCK TABLES `sectionum_sobre` WRITE;
/*!40000 ALTER TABLE `sectionum_sobre` DISABLE KEYS */;
INSERT INTO `sectionum_sobre` VALUES (7,'Agora foi?','Funcionou','1575b26801b23c83760da7de8fc5fb41.jpg','#ff8000',0),(12,'ab','aab','6c593313f26b35c38dd31892eeee6def.jpg','#ff8000',1);
/*!40000 ALTER TABLE `sectionum_sobre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblcontatos`
--

DROP TABLE IF EXISTS `tblcontatos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblcontatos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `celular` varchar(20) NOT NULL,
  `email` varchar(45) NOT NULL,
  `home_page` varchar(45) DEFAULT NULL,
  `facebook` varchar(90) DEFAULT NULL,
  `tipo_mensagem` varchar(1) NOT NULL,
  `mensagem` varchar(800) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `profissao` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcontatos`
--

LOCK TABLES `tblcontatos` WRITE;
/*!40000 ALTER TABLE `tblcontatos` DISABLE KEYS */;
INSERT INTO `tblcontatos` VALUES (17,'Lázaro','(111) 1111-1111','(111) 9111-11111','LAzaro@gmail.com','','','s','a','m','a'),(20,'Lázaro','(999) 9999-9999','(011) 99930-8328','lazaro@gmail.com','','','c','mensagem','m','Estagiário da Google');
/*!40000 ALTER TABLE `tblcontatos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbllojas`
--

DROP TABLE IF EXISTS `tbllojas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbllojas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rua` varchar(50) DEFAULT NULL,
  `cidade` varchar(30) DEFAULT NULL,
  `estado` varchar(30) DEFAULT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `imagem` varchar(100) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbllojas`
--

LOCK TABLES `tbllojas` WRITE;
/*!40000 ALTER TABLE `tbllojas` DISABLE KEYS */;
INSERT INTO `tbllojas` VALUES (3,'R. Alagoas','Barueri','São Paulo','1123','3b87c1c600d173e8821e0fba9cd2748c.png',1),(5,'aeaeaeae','aeaeaeae','aeaeaeae','aeaeaeae','2fd6035b239659ede295ab0798643425.jpg',1),(7,'aa','aa','aa','aa','a8f6f9f3367049075fca08a6044ff32a.png',1);
/*!40000 ALTER TABLE `tbllojas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblniveis`
--

DROP TABLE IF EXISTS `tblniveis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblniveis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `adm_faleconosco` tinyint(1) DEFAULT NULL,
  `adm_conteudo` tinyint(1) DEFAULT NULL,
  `adm_usuarios` tinyint(1) DEFAULT NULL,
  `status_nivel` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblniveis`
--

LOCK TABLES `tblniveis` WRITE;
/*!40000 ALTER TABLE `tblniveis` DISABLE KEYS */;
INSERT INTO `tblniveis` VALUES (13,'Administrador Geral',1,1,1,1),(18,'Administrador de Conteúdos',0,1,0,1);
/*!40000 ALTER TABLE `tblniveis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblusuarios`
--

DROP TABLE IF EXISTS `tblusuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblusuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `codnivel` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `codnivel` (`codnivel`),
  CONSTRAINT `tblusuarios_ibfk_1` FOREIGN KEY (`codnivel`) REFERENCES `tblniveis` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblusuarios`
--

LOCK TABLES `tblusuarios` WRITE;
/*!40000 ALTER TABLE `tblusuarios` DISABLE KEYS */;
INSERT INTO `tblusuarios` VALUES (13,'Usuario','Usuarioo','a@gmail.com','202cb962ac59075b964b07152d234b70',13,1),(19,'Testar','Testar','testar@hotmail.com','202cb962ac59075b964b07152d234b70',13,1),(20,'User','User','user@gmail.com','202cb962ac59075b964b07152d234b70',13,1);
/*!40000 ALTER TABLE `tblusuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-21  4:51:50
