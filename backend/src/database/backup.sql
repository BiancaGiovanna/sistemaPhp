CREATE DATABASE  IF NOT EXISTS `dbcms2020` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `dbcms2020`;
-- MySQL dump 10.13  Distrib 8.0.16, for Win64 (x86_64)
--
-- Host: localhost    Database: dbcms2020
-- ------------------------------------------------------
-- Server version	8.0.16

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tblcategoria`
--

DROP TABLE IF EXISTS `tblcategoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tblcategoria` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) NOT NULL,
  `statusCategoria` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcategoria`
--

LOCK TABLES `tblcategoria` WRITE;
/*!40000 ALTER TABLE `tblcategoria` DISABLE KEYS */;
INSERT INTO `tblcategoria` VALUES (3,'Teclado',1),(5,'Mouse ',1),(7,'Monitores',1),(8,'WebCams',1);
/*!40000 ALTER TABLE `tblcategoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblfaleconosco`
--

DROP TABLE IF EXISTS `tblfaleconosco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tblfaleconosco` (
  `idfaleconosco` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) NOT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `celular` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `homepage` varchar(250) DEFAULT NULL,
  `tipomensagem` varchar(250) DEFAULT NULL,
  `mensagem` varchar(250) NOT NULL,
  `idgeneros` int(8) NOT NULL,
  `profissao` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idfaleconosco`),
  KEY `Fk_faleconosco_genero` (`idgeneros`),
  CONSTRAINT `Fk_faleconosco_genero` FOREIGN KEY (`idgeneros`) REFERENCES `tblgeneros` (`idgeneros`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblfaleconosco`
--

LOCK TABLES `tblfaleconosco` WRITE;
/*!40000 ALTER TABLE `tblfaleconosco` DISABLE KEYS */;
INSERT INTO `tblfaleconosco` VALUES (6,'bbbb','(11)1111-1111','(11)92222-2222','eita@eu.com','batata','bom backend','aaaaa',1,'Desenvolvedora WEB');
/*!40000 ALTER TABLE `tblfaleconosco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblgeneros`
--

DROP TABLE IF EXISTS `tblgeneros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tblgeneros` (
  `idgeneros` int(11) NOT NULL AUTO_INCREMENT,
  `genero` varchar(20) NOT NULL,
  `sigla` varchar(1) NOT NULL,
  PRIMARY KEY (`idgeneros`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblgeneros`
--

LOCK TABLES `tblgeneros` WRITE;
/*!40000 ALTER TABLE `tblgeneros` DISABLE KEYS */;
INSERT INTO `tblgeneros` VALUES (1,'feminino','F'),(2,'masculino','M'),(3,'outro','O');
/*!40000 ALTER TABLE `tblgeneros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbllojas`
--

DROP TABLE IF EXISTS `tbllojas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbllojas` (
  `idlojas` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `rua` varchar(70) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `statusLoja` tinyint(1) DEFAULT NULL,
  `foto` varchar(40) NOT NULL,
  PRIMARY KEY (`idlojas`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbllojas`
--

LOCK TABLES `tbllojas` WRITE;
/*!40000 ALTER TABLE `tbllojas` DISABLE KEYS */;
INSERT INTO `tbllojas` VALUES (11,'Loja','06663-450','Avenida dos Brasileiros','Parque Suburbano','Itapevi','SP',1,'no-photo.jpg');
/*!40000 ALTER TABLE `tbllojas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblprodutos`
--

DROP TABLE IF EXISTS `tblprodutos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tblprodutos` (
  `idProduto` int(11) NOT NULL AUTO_INCREMENT,
  `foto` varchar(40) NOT NULL,
  `nomeProduto` varchar(80) NOT NULL,
  `descricao` text,
  `preco` int(7) NOT NULL,
  `desconto` int(5) DEFAULT NULL,
  `precoFinal` int(7) DEFAULT NULL,
  `destaque` tinyint(1) DEFAULT NULL,
  `statusProduto` tinyint(1) DEFAULT NULL,
  `idSubcategoria` int(30) NOT NULL,
  PRIMARY KEY (`idProduto`),
  KEY `Fk_subcategoria_produtos` (`idSubcategoria`),
  CONSTRAINT `Fk_subcategoria_produtos` FOREIGN KEY (`idSubcategoria`) REFERENCES `tblsubcategoria` (`idSubcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblprodutos`
--

LOCK TABLES `tblprodutos` WRITE;
/*!40000 ALTER TABLE `tblprodutos` DISABLE KEYS */;
INSERT INTO `tblprodutos` VALUES (1,'81ce055b80d6c1a1059fc23818f2291c.png','Teclado Gamer Redragon Dark Avenger RGB ','Redragon Dark Avenger RGB ABNT2 K568-2',350,0,350,0,1,3),(2,'dbfde038aa97dd9f0e5ebd316deebd99.jpg','Monitor gamer Redragon','Monitor gamer Redragon 25\" Rediamond 144Hz, Full HD, 1ms, Iluminação RGB, Holograma, Freesync, Painel TN',2400,0,2400,1,1,6),(3,'3af7b06ea25c8c823f7d6793d8fb9abb.jpg','Teclado Mecanico Daksa Rainbown','Redragon Daksa K576-R-1 ABNT2 Rainbow',370,10,333,1,1,3),(4,'11c57f1919ce07e779d7600711e4fb18.jpg','Teclado Mecânico Redragon Amsa-Pro','Teclado Mecânico Redragon K592RGB-Pro, Amsa-Pro, Switch Azul ABNT2',530,20,424,0,1,3),(5,'1b484726c1f83ac2b0a30ceae1e8a882.jpg','Webcam Redragon Apex','Webcam Redragon Apex 1080P 30 FPS BK GW900',500,0,500,1,1,7),(6,'7f86ba097b20681d4804a96113815803.jpg','Mouse Redragon Cobra White','Mouse Redragon Cobra White Lunar 10000 DPI M711W',195,20,156,0,1,2);
/*!40000 ALTER TABLE `tblprodutos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblsobre`
--

DROP TABLE IF EXISTS `tblsobre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tblsobre` (
  `idsobre` int(11) NOT NULL AUTO_INCREMENT,
  `sobre` text NOT NULL,
  `statusSobre` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idsobre`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblsobre`
--

LOCK TABLES `tblsobre` WRITE;
/*!40000 ALTER TABLE `tblsobre` DISABLE KEYS */;
INSERT INTO `tblsobre` VALUES (2,'Produtos Inovadores, Designs Criativos, Durabilidade Extrema e Compromisso com Preços Honestos - a Redragon é uma marca Gamer com esses 4 importantes pilares que, em pouco mais de 3 anos em operação no Brasil, já a tornaram a marca Gamer mais amada do País. Não só nos produtos, a Redragon trabalha lado a lado com gamers e especialistas, e se renova todos os dias para criar o produto certo pra você, que também Desafia seus Limites todos os dias.\r\n\r\nApesar da Matriz existir desde 1996, a linha Internacional de Desenvolvimento Gamer REDRAGON foi criada em 2012 especificamente com foco em atender um público verdadeiramente apaixonado: criamos e evoluímos nossos produtos para garantir o máximo em satisfação e qualidade por um preço justo.\r\n\r\nAlta Tecnologia, longa experiência e garantia de qualidade em cada peça fabricada: é com isso que a REDRAGON rapidamente conquistou confiança em diversos países para te deixar cada vez mais #ReadyForBattle.',0);
/*!40000 ALTER TABLE `tblsobre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblsubcategoria`
--

DROP TABLE IF EXISTS `tblsubcategoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tblsubcategoria` (
  `idSubcategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nomesub` varchar(40) NOT NULL,
  `statusSubcategoria` tinyint(1) DEFAULT NULL,
  `idCategoria` int(20) NOT NULL,
  PRIMARY KEY (`idSubcategoria`),
  KEY `Fk_categoira_subcategoria` (`idCategoria`),
  CONSTRAINT `Fk_categoira_subcategoria` FOREIGN KEY (`idCategoria`) REFERENCES `tblcategoria` (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblsubcategoria`
--

LOCK TABLES `tblsubcategoria` WRITE;
/*!40000 ALTER TABLE `tblsubcategoria` DISABLE KEYS */;
INSERT INTO `tblsubcategoria` VALUES (2,'Mouse',1,5),(3,'Teclado Mecânico',1,3),(6,'Monitor Gamer',1,7),(7,'WebCams',1,8);
/*!40000 ALTER TABLE `tblsubcategoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbluser`
--

DROP TABLE IF EXISTS `tbluser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbluser` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(30) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `idgeneros` int(8) NOT NULL,
  `statusContato` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`iduser`),
  KEY `Fk_user_genero` (`idgeneros`),
  CONSTRAINT `Fk_user_genero` FOREIGN KEY (`idgeneros`) REFERENCES `tblgeneros` (`idgeneros`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbluser`
--

LOCK TABLES `tbluser` WRITE;
/*!40000 ALTER TABLE `tbluser` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbluser` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'dbcms2020'
--

--
-- Dumping routines for database 'dbcms2020'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-11-25  9:10:40
