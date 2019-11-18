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
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `introducao_curiosidades`
--

LOCK TABLES `introducao_curiosidades` WRITE;
/*!40000 ALTER TABLE `introducao_curiosidades` DISABLE KEYS */;
INSERT INTO `introducao_curiosidades` VALUES (50,'Novo conteúdo','Eu realmente espero que funcione :(                                        ','ed4d05a3877707a58d942460db3e73c8.png','#6a85c4',1,'#000000');
/*!40000 ALTER TABLE `introducao_curiosidades` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `section_curiosidades`
--

LOCK TABLES `section_curiosidades` WRITE;
/*!40000 ALTER TABLE `section_curiosidades` DISABLE KEYS */;
INSERT INTO `section_curiosidades` VALUES (1,'adasdasd','asdasdasd','            asdasd                                ','asdasd','           sdasdasda  asdasd                               ','dasdasda','           sdasdasdasdasd                                 ','','#82eecd','#ffffff',1),(2,'asdasdasd','asdasdasd','                             asdasdas               ','dasdasd','           asdas                                 ','dasdasda','          asdasdasdasd                                  ','','#6da09a','#000000',1),(3,'asdasdasdasda','asdasdasd','                                   asdasdasdad         ','asdasdads','                                     adasdasd       ','asdasd','                         asdasdasd                   ','94c0b779f8677a68faafe0ff28305c88.png','#f8d389','#000000',1);
/*!40000 ALTER TABLE `section_curiosidades` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcontatos`
--

LOCK TABLES `tblcontatos` WRITE;
/*!40000 ALTER TABLE `tblcontatos` DISABLE KEYS */;
INSERT INTO `tblcontatos` VALUES (16,'Lázaro','(111) 1111-1111','(111) 9111-11111','LAzaro@gmail.com','','','c','Eita','m','lalalalalala'),(17,'Lázaro','(111) 1111-1111','(111) 9111-11111','LAzaro@gmail.com','','','s','a','m','a'),(18,'Sabrina','(111) 1111-1111','(111) 9111-11111','LAzaro@gmail.com','','','c','asd','m','a'),(19,'a','(111) 1111-1111','(111) 9111-11111','LAzaro@gmail.com','','','s','a','m','lalalalalala');
/*!40000 ALTER TABLE `tblcontatos` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblniveis`
--

LOCK TABLES `tblniveis` WRITE;
/*!40000 ALTER TABLE `tblniveis` DISABLE KEYS */;
INSERT INTO `tblniveis` VALUES (12,'Administrador de Conteúdos',0,1,0,1),(13,'Administrador Geral',1,1,1,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblusuarios`
--

LOCK TABLES `tblusuarios` WRITE;
/*!40000 ALTER TABLE `tblusuarios` DISABLE KEYS */;
INSERT INTO `tblusuarios` VALUES (13,'Usuario','Usuario','a@gmail.com','202cb962ac59075b964b07152d234b70',13,1),(14,'Lazaro','Lazaro','lazaro@gmail.com','202cb962ac59075b964b07152d234b70',12,1);
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

-- Dump completed on 2019-11-17 22:10:33
