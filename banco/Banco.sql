-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: dbsenai
-- ------------------------------------------------------
-- Server version	5.6.10-log

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
-- Table structure for table `noticias`
--

DROP TABLE IF EXISTS `noticias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `noticias` (
  `idNoticia` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `dtInicio` date DEFAULT NULL,
  `dtFim` date DEFAULT NULL,
  `imagen` varchar(3000) DEFAULT NULL,
  PRIMARY KEY (`idNoticia`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `noticias`
--

LOCK TABLES `noticias` WRITE;
/*!40000 ALTER TABLE `noticias` DISABLE KEYS */;
INSERT INTO `noticias` VALUES (1,'Hackathon Senai 2018','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ','2018-05-17','2018-05-19','imagenNoticia/45c48cce2e2d7fbdea1afc51c7c6ad26.jpg'),(2,'FIT SENAI 2018','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ','2018-05-02','2018-11-03','imagenNoticia/1679091c5a880faf6fb5e6087eb1b2dc.jpg'),(3,'Abrem o periodo de inscrições','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ','2018-05-15','2018-12-31','imagenNoticia/eccbc87e4b5ce2fe28308fd9f2a7baf3.jpg');
/*!40000 ALTER TABLE `noticias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_beneficios`
--

DROP TABLE IF EXISTS `tbl_beneficios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_beneficios` (
  `idBeneficio` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `idVaga` int(11) DEFAULT NULL,
  PRIMARY KEY (`idBeneficio`),
  KEY `fk_beneficio_vaga_idx` (`idVaga`),
  CONSTRAINT `fk_beneficio_vaga` FOREIGN KEY (`idVaga`) REFERENCES `tbl_vagas` (`idVaga`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_beneficios`
--

LOCK TABLES `tbl_beneficios` WRITE;
/*!40000 ALTER TABLE `tbl_beneficios` DISABLE KEYS */;
INSERT INTO `tbl_beneficios` VALUES (1,'Vale Academia',1),(2,'Cursos',1),(6,'nada',2),(7,'ddd',3),(9,'Vale Gordura',19);
/*!40000 ALTER TABLE `tbl_beneficios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_curso_cai`
--

DROP TABLE IF EXISTS `tbl_curso_cai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_curso_cai` (
  `idCursoCai` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `descricao` text,
  `area` varchar(45) DEFAULT NULL,
  `duracao` varchar(45) DEFAULT NULL,
  `preRequisitos` text,
  `link` varchar(255) DEFAULT NULL,
  `processoSeletivo` tinyint(1) DEFAULT NULL,
  `dtInicio` date DEFAULT NULL,
  `dtFim` date DEFAULT NULL,
  `horaInicio` varchar(3) DEFAULT NULL,
  `horaFim` varchar(3) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idCursoCai`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_curso_cai`
--

LOCK TABLES `tbl_curso_cai` WRITE;
/*!40000 ALTER TABLE `tbl_curso_cai` DISABLE KEYS */;
INSERT INTO `tbl_curso_cai` VALUES (2,'Eletricista de Manutenção','O curso de Aprendizagem Industrial Eletricista de Manutenção Eletroeletrônica tem por objetivo proporcionar qualificação profissional na instalação e manutenção de sistemas eletroeletrônicos em baixa tensão, de acordo com normas técnicas, de qualidade, de saúde e segurança no trabalho e de meio ambiente.','Elétrica','2 anos','O aluno deverá, no início do curso, ter no mínimo 16 anos e no máximo idade que lhe permita concluir o curso antes de completar 24 anos.','https://jandira.sp.senai.br/curso/77448/127/eletricista-de-manutencao-eletroeletronica',0,'2016-12-03','2016-10-04','12','20','imagemCai/eletricista.jpg'),(3,'Mecanico de Usinagem','O Curso de Aprendizagem Industrial - Mecânico de Usinagem tem por objetivo proporcionar aos aprendizes qualificação profissional em processos de usinagem com máquinas convencionais e a comando numérico computadorizado (CNC).','Mêcanica 2','2 anos','O aluno deverá, no início do curso, ter no mínimo 14 anos e no máximo idade que lhe permita concluir o curso antes de completar 24 anos.','https://jandira.sp.senai.br/curso/655/127/mecanico-de-usinagem',0,'2018-01-01','2018-01-01','aaa','21','imagemCai/59b514174bffe4ae402b3d63aad79fe0.jpg');
/*!40000 ALTER TABLE `tbl_curso_cai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_curso_fic`
--

DROP TABLE IF EXISTS `tbl_curso_fic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_curso_fic` (
  `idCursoFic` int(11) NOT NULL AUTO_INCREMENT,
  `area` varchar(45) DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `duracao` varchar(45) DEFAULT NULL,
  `periodo` varchar(45) DEFAULT NULL,
  `valor` decimal(5,0) DEFAULT NULL,
  `dtInicio` date DEFAULT NULL,
  `dtFim` date DEFAULT NULL,
  `parcelas` varchar(45) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idCursoFic`)
) ENGINE=InnoDB AUTO_INCREMENT=409 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_curso_fic`
--

LOCK TABLES `tbl_curso_fic` WRITE;
/*!40000 ALTER TABLE `tbl_curso_fic` DISABLE KEYS */;
INSERT INTO `tbl_curso_fic` VALUES (266,'Eletrônica embarcada9','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','129 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(267,'Eletrônica embarcada10','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','130 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(268,'Eletrônica embarcada11','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','131 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(269,'Eletrônica embarcada12','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','132 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(270,'Eletrônica embarcada13','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','133 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(271,'Eletrônica embarcada14','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','134 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(272,'Eletrônica embarcada','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','120 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(273,'Eletrônica embarcada1','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','121 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(274,'Eletrônica embarcada2','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','122 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(275,'Eletrônica embarcada3','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','123 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(276,'Eletrônica embarcada4','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','124 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(277,'Eletrônica embarcada5','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','125 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(278,'Eletrônica embarcada6','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','126 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(279,'Eletrônica embarcada7','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','127 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(280,'Eletrônica embarcada8','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','128 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(281,'Eletrônica embarcada9','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','129 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(282,'Eletrônica embarcada10','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','130 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(283,'Eletrônica embarcada11','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','131 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(284,'Eletrônica embarcada12','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','132 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(285,'Eletrônica embarcada13','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','133 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(286,'Eletrônica embarcada14','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','134 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(287,'Eletrônica embarcada','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','120 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(288,'Eletrônica embarcada1','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','121 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(289,'Eletrônica embarcada2','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','122 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(290,'Eletrônica embarcada3','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','123 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(291,'Eletrônica embarcada4','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','124 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(292,'Eletrônica embarcada5','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','125 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(293,'Eletrônica embarcada6','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','126 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(294,'Eletrônica embarcada7','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','127 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(295,'Eletrônica embarcada8','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','128 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(296,'Eletrônica embarcada9','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','129 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(297,'Eletrônica embarcada10','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','130 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(298,'Eletrônica embarcada11','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','131 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(299,'Eletrônica embarcada12','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','132 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(300,'Eletrônica embarcada13','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','133 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(301,'Eletrônica embarcada14','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','134 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(303,'Eletrônica embarcada1','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','121 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(304,'Eletrônica embarcada2','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','122 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(306,'Eletrônica embarcada4','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','124 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(307,'Eletrônica embarcada5','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','125 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(308,'Eletrônica embarcada6','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','126 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(309,'Eletrônica embarcada7','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','127 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(310,'Eletrônica embarcada8','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','128 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(311,'Eletrônica embarcada9','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','129 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(312,'Eletrônica embarcada10','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','130 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(313,'Eletrônica embarcada11','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','131 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(314,'Eletrônica embarcada12','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','132 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(315,'Eletrônica embarcada13','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','133 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(316,'Eletrônica embarcada14','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','134 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(317,'Eletrônica embarcada','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','120 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(318,'Eletrônica embarcada1','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','121 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(319,'Eletrônica embarcada2','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','122 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(320,'Eletrônica embarcada3','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','123 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(321,'Eletrônica embarcada4','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','124 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(322,'Eletrônica embarcada5','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','125 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(323,'Eletrônica embarcada6','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','126 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(324,'Eletrônica embarcada7','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','127 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(325,'Eletrônica embarcada8','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','128 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(326,'Eletrônica embarcada9','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','129 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(327,'Eletrônica embarcada10','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','130 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(328,'Eletrônica embarcada11','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','131 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(329,'Eletrônica embarcada12','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','132 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(330,'Eletrônica embarcada13','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','133 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(331,'Eletrônica embarcada14','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','134 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(347,'Eletrônica embarcada','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','120 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(348,'Eletrônica embarcada1','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','121 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(349,'Eletrônica embarcada2','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','122 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(350,'Eletrônica embarcada3','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','123 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(351,'Eletrônica embarcada4','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','124 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(352,'Eletrônica embarcada5','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','125 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(353,'Eletrônica embarcada6','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','126 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(354,'Eletrônica embarcada7','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','127 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(355,'Eletrônica embarcada8','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','128 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(356,'Eletrônica embarcada9','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','129 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(357,'Eletrônica embarcada10','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','130 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(358,'Eletrônica embarcada11','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','131 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(359,'Eletrônica embarcada12','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','132 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(360,'Eletrônica embarcada13','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','133 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(361,'Eletrônica embarcada14','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','134 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(362,'Eletrônica embarcada','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','120 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(363,'Eletrônica embarcada1','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','121 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(364,'Eletrônica embarcada2','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','122 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(365,'Eletrônica embarcada3','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','123 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(366,'Eletrônica embarcada4','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','124 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(367,'Eletrônica embarcada5','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','125 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(368,'Eletrônica embarcada6','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','126 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(369,'Eletrônica embarcada7','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','127 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(370,'Eletrônica embarcada8','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','128 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(371,'Eletrônica embarcada9','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','129 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(372,'Eletrônica embarcada10','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','130 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(373,'Eletrônica embarcada11','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','131 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(374,'Eletrônica embarcada12','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','132 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(375,'Eletrônica embarcada13','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','133 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(376,'Eletrônica embarcada14','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','134 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(377,'Eletrônica embarcada','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','120 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(378,'Eletrônica embarcada1','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','121 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(379,'Eletrônica embarcada2','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','122 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(380,'Eletrônica embarcada3','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','123 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(381,'Eletrônica embarcada4','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','124 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(382,'Eletrônica embarcada5','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','125 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(383,'Eletrônica embarcada6','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','126 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(384,'Eletrônica embarcada7','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','127 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(385,'Eletrônica embarcada8','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','128 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(386,'Eletrônica embarcada9','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','129 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(387,'Eletrônica embarcada10','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','130 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(388,'Eletrônica embarcada11','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','131 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(389,'Eletrônica embarcada12','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','132 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(390,'Eletrônica embarcada13','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','133 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(391,'Eletrônica embarcada14','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','134 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(392,'Eletrônica embarcada','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','120 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(393,'Eletrônica embarcada','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','120 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',0),(394,'Eletrônica embarcada','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','120 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',1),(395,'Eletrônica embarcada1','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','121 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',1),(396,'Eletrônica embarcada2','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','122 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',1),(397,'Eletrônica embarcada3','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','123 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',1),(398,'Eletrônica embarcada4','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','124 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',1),(399,'Eletrônica embarcada5','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','125 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',1),(400,'Eletrônica embarcada6','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','126 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',1),(401,'Eletrônica embarcada7','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','127 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',1),(402,'Eletrônica embarcada8','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','128 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',1),(403,'Eletrônica embarcada9','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','129 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',1),(404,'Eletrônica embarcada10','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','130 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',1),(405,'Eletrônica embarcada11','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','131 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',1),(406,'Eletrônica embarcada12','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','132 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',1),(407,'Eletrônica embarcada13','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','133 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',1),(408,'Eletrônica embarcada14','Eletrônica embarcada','https://jandira.sp.senai.br/curso/64859/127/eletronica-embarcada','134 horas','aos Sábados',1600,'2018-07-07','2018-10-20','4',1);
/*!40000 ALTER TABLE `tbl_curso_fic` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_curso_tecnico`
--

DROP TABLE IF EXISTS `tbl_curso_tecnico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_curso_tecnico` (
  `idCursoTecnico` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `descricao` text,
  `area` varchar(45) DEFAULT NULL,
  `duracao` varchar(45) DEFAULT NULL,
  `preRequisitos` text,
  `link` varchar(255) DEFAULT NULL,
  `processoSeletivo` tinyint(1) DEFAULT NULL,
  `dtInicio` date DEFAULT NULL,
  `dtFim` date DEFAULT NULL,
  `horaInicio` varchar(3) DEFAULT NULL,
  `horaFim` varchar(3) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idCursoTecnico`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_curso_tecnico`
--

LOCK TABLES `tbl_curso_tecnico` WRITE;
/*!40000 ALTER TABLE `tbl_curso_tecnico` DISABLE KEYS */;
INSERT INTO `tbl_curso_tecnico` VALUES (1,'Técnico de Informática','O Curso Técnico de Informática tem por objetivo habilitar profissionais para desenvolver programas de computador, lendo e interpretando as especificações técnicas, regras do negócio e paradigmas da lógica e das linguagens de programação, aplicando metodologias e processos e utilizando sistemas operacionais, banco de dados e ambientes integrados de desenvolvimento de sistemas.','Informática','1500h','Favor consultar o edital de processo seletivo na página: http://www.sp.senai.br/institucional/176/0/tecnicos','https://jandira.sp.senai.br/curso/68515/127/tecnico-de-informatica',1,'2018-05-19','2018-06-02','aa','10','imagemTecnico/ti.png'),(3,'Técnico de Eletroeletrônica','O Curso Técnico de Eletroeletrônica tem por objetivo habilitar profissionais para desenvolver, instalar e manter sistemas eletroeletrônicos de acordo com procedimentos e normas técnicas, ambientais, de qualidade, de saúde e segurança no trabalho.','Eletricidade','1500h','Favor consultar o edital de processo seletivo na página: http://www.sp.senai.br/institucional/176/0/tecnicos','https://jandira.sp.senai.br/curso/76652/127/tecnico-de-eletroeletronica',1,'2018-05-05','2018-06-02','10','21','imagemTecnico/eletroeletronica.png'),(5,'Técnico de Redes de Computadores','O Curso Técnico de Redes de Computadores tem por objetivo habilitar profissionais em administração e implantação de redes de computadores, dispositivos de comunicação e serviços, de acordo com a necessidade do cliente, seguindo normas técnicas, recomendações do fabricante, boas práticas de mercado e procedimentos das empresas.','Informática','1500h','Favor consultar o edital de processo seletivo na página: http://www.sp.senai.br/institucional/176/0/tecnicos','https://jandira.sp.senai.br/curso/80399/127/tecnico-de-redes-de-computadores',1,'2018-05-03','2018-06-10','12','14','imagemTecnico/redes.jpg'),(9,'teste','rrrrrrrrrrrr','rrrrrrr','rrrrrr','rrrrrrrrrrr','http://exemplo.com',0,'2018-05-17','2018-05-21','rrr','14','imagemTecnico/b511a0a737687f3d57f54e6cb9c44b58.png'),(10,'teste2','rrrrrrrrrrrr','rrrrrrr','rrrrrr','rrrrrrrrrrr','http://exemplo.com',0,'2018-05-23','2018-05-21','rrr','rrr','imagemTecnico/b511a0a737687f3d57f54e6cb9c44b58.png'),(11,'ccccc','cccc','ccccc','cccccc','ccccccc','http://exemplo.com',0,'2018-05-09','2018-05-08','cc','ccc','imagemTecnico/9189d8835f382a0c514d359d05360ef4.png');
/*!40000 ALTER TABLE `tbl_curso_tecnico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_funcionario`
--

DROP TABLE IF EXISTS `tbl_funcionario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_funcionario` (
  `idFuncionario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `idNivel` int(11) NOT NULL,
  `cpf` varchar(45) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `imagem` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`idFuncionario`),
  KEY `fk_funcionario_nivel_idx` (`idNivel`),
  CONSTRAINT `fk_funcionario_nivel` FOREIGN KEY (`idNivel`) REFERENCES `tbl_nivel` (`idNivel`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_funcionario`
--

LOCK TABLES `tbl_funcionario` WRITE;
/*!40000 ALTER TABLE `tbl_funcionario` DISABLE KEYS */;
INSERT INTO `tbl_funcionario` VALUES (5,'Teste da Sistma',1,'111.111.111-11','123','imagemUsuario/47a27a9241a1beff92e64b3f5b77068b.jpg'),(6,'Dino',2,'111.111.111-12','123','imagemUsuario/5f27dde10bfa8adadfd122521b0a01ef.jpg');
/*!40000 ALTER TABLE `tbl_funcionario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_imagem_cai`
--

DROP TABLE IF EXISTS `tbl_imagem_cai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_imagem_cai` (
  `idImagem` int(11) NOT NULL AUTO_INCREMENT,
  `imagem` varchar(255) DEFAULT NULL,
  `idCursoCai` int(11) NOT NULL,
  PRIMARY KEY (`idImagem`),
  KEY `fk_imagem_cursoCai_idx` (`idCursoCai`),
  CONSTRAINT `fk_imagem_cursoCai` FOREIGN KEY (`idCursoCai`) REFERENCES `tbl_curso_cai` (`idCursoCai`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_imagem_cai`
--

LOCK TABLES `tbl_imagem_cai` WRITE;
/*!40000 ALTER TABLE `tbl_imagem_cai` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_imagem_cai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_imagem_tecnico`
--

DROP TABLE IF EXISTS `tbl_imagem_tecnico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_imagem_tecnico` (
  `idImagem` int(11) NOT NULL AUTO_INCREMENT,
  `imagem` varchar(255) DEFAULT NULL,
  `idCursoTecnico` int(11) NOT NULL,
  PRIMARY KEY (`idImagem`),
  KEY `fk_imagem_cursoTecnico_idx` (`idCursoTecnico`),
  CONSTRAINT `fk_imagem_cursoTecnico` FOREIGN KEY (`idCursoTecnico`) REFERENCES `tbl_curso_tecnico` (`idCursoTecnico`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_imagem_tecnico`
--

LOCK TABLES `tbl_imagem_tecnico` WRITE;
/*!40000 ALTER TABLE `tbl_imagem_tecnico` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_imagem_tecnico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_imagen_noticia`
--

DROP TABLE IF EXISTS `tbl_imagen_noticia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_imagen_noticia` (
  `idImagenNoticia` int(11) NOT NULL AUTO_INCREMENT,
  `imagen` varchar(45) DEFAULT NULL,
  `idNoticia` int(11) NOT NULL,
  PRIMARY KEY (`idImagenNoticia`),
  KEY `fk_imagen_noticia_idx` (`idNoticia`),
  CONSTRAINT `fk_imagen_noticia` FOREIGN KEY (`idNoticia`) REFERENCES `noticias` (`idNoticia`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_imagen_noticia`
--

LOCK TABLES `tbl_imagen_noticia` WRITE;
/*!40000 ALTER TABLE `tbl_imagen_noticia` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_imagen_noticia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_nivel`
--

DROP TABLE IF EXISTS `tbl_nivel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_nivel` (
  `idNivel` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idNivel`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_nivel`
--

LOCK TABLES `tbl_nivel` WRITE;
/*!40000 ALTER TABLE `tbl_nivel` DISABLE KEYS */;
INSERT INTO `tbl_nivel` VALUES (1,'Administrador'),(2,'Cataloguista');
/*!40000 ALTER TABLE `tbl_nivel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_permissao`
--

DROP TABLE IF EXISTS `tbl_permissao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_permissao` (
  `idPermissao` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(45) DEFAULT NULL,
  `idNivel` int(11) NOT NULL,
  PRIMARY KEY (`idPermissao`),
  KEY `fk_permissao_nivel_idx` (`idNivel`),
  CONSTRAINT `fk_permissao_para_nivel` FOREIGN KEY (`idNivel`) REFERENCES `tbl_nivel` (`idNivel`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_permissao`
--

LOCK TABLES `tbl_permissao` WRITE;
/*!40000 ALTER TABLE `tbl_permissao` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_permissao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_vagas`
--

DROP TABLE IF EXISTS `tbl_vagas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_vagas` (
  `idVaga` int(11) NOT NULL AUTO_INCREMENT,
  `empresa` varchar(45) DEFAULT NULL,
  `cargo` varchar(45) DEFAULT NULL,
  `LocalTrabalho` varchar(45) DEFAULT NULL,
  `horario` varchar(45) DEFAULT NULL,
  `salario` varchar(45) DEFAULT NULL,
  `preRequisitos` text,
  `perfilCargo` text,
  `valeTransporte` tinyint(1) DEFAULT NULL,
  `valeAlimentacao` tinyint(1) DEFAULT NULL,
  `cestaBasica` tinyint(1) DEFAULT NULL,
  `seguroVida` tinyint(1) DEFAULT NULL,
  `assistenciaMedica` tinyint(1) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `obs` text,
  `endereco` text,
  `dataCadastro` date DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idVaga`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_vagas`
--

LOCK TABLES `tbl_vagas` WRITE;
/*!40000 ALTER TABLE `tbl_vagas` DISABLE KEYS */;
INSERT INTO `tbl_vagas` VALUES (1,'SENAI Jandira','Assistente Administrativo','Jandira - SP','Segunda a Sexta 08:00 as 17:00','A combinar','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ',1,1,1,1,1,'(11) 1111-1111','teste@hotmail.com','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ','Serra do Loló','2018-05-17',1),(2,'MDF Tecnologia','Desenvolvedor Jr.','Barueri - SP','Segunada a Sexta 08:00 as 17:00','R$8.000,00','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ',1,1,0,0,0,'(11) 2222-2222','mdf@hotmail.com','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ','Rua da Ladeira','2018-05-17',1),(3,'uuuuu','uuuuu','uuuuu','uuu','uuuuuuu','uuuuuuuuu','uuuuuuuuuuuuu',1,1,0,0,0,'uuuuuuuuuu','uuuuuu','uuuuuuuuuuuu','uuuuuuuuuuuu','2018-05-18',0),(4,'uuuuu','uuuuu','uuuuu','uuu','uuuuuuus','ddddd ddddddd dddddddd dd','ddddddd ddddddd dd',1,0,1,0,0,'dddddd','dddddddd','dddddddddd','ddddddd','2018-05-18',0),(19,'TUC','Operador de Tuc-Tuc','Próximo ao metrô Tucuruvi','Seg a Sex 08:00 as 18:00','A combinar','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',1,0,0,0,0,'(11) 1111-1111','tuc@hotmail.com','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat','Rua Tucunaré','2018-05-18',1);
/*!40000 ALTER TABLE `tbl_vagas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `view_beneficio`
--

DROP TABLE IF EXISTS `view_beneficio`;
/*!50001 DROP VIEW IF EXISTS `view_beneficio`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `view_beneficio` AS SELECT 
 1 AS `idVaga`,
 1 AS `empresa`,
 1 AS `cargo`,
 1 AS `LocalTrabalho`,
 1 AS `horario`,
 1 AS `salario`,
 1 AS `preRequisitos`,
 1 AS `perfilCargo`,
 1 AS `valeTransporte`,
 1 AS `valeAlimentacao`,
 1 AS `cestaBasica`,
 1 AS `seguroVida`,
 1 AS `assistenciaMedica`,
 1 AS `telefone`,
 1 AS `email`,
 1 AS `obs`,
 1 AS `endereco`,
 1 AS `dataCadastro`,
 1 AS `ativo`,
 1 AS `idBeneficio`,
 1 AS `nome`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `view_beneficio`
--

/*!50001 DROP VIEW IF EXISTS `view_beneficio`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_beneficio` AS select `v`.`idVaga` AS `idVaga`,`v`.`empresa` AS `empresa`,`v`.`cargo` AS `cargo`,`v`.`LocalTrabalho` AS `LocalTrabalho`,`v`.`horario` AS `horario`,`v`.`salario` AS `salario`,`v`.`preRequisitos` AS `preRequisitos`,`v`.`perfilCargo` AS `perfilCargo`,`v`.`valeTransporte` AS `valeTransporte`,`v`.`valeAlimentacao` AS `valeAlimentacao`,`v`.`cestaBasica` AS `cestaBasica`,`v`.`seguroVida` AS `seguroVida`,`v`.`assistenciaMedica` AS `assistenciaMedica`,`v`.`telefone` AS `telefone`,`v`.`email` AS `email`,`v`.`obs` AS `obs`,`v`.`endereco` AS `endereco`,`v`.`dataCadastro` AS `dataCadastro`,`v`.`ativo` AS `ativo`,`b`.`idBeneficio` AS `idBeneficio`,`b`.`nome` AS `nome` from (`tbl_vagas` `v` join `tbl_beneficios` `b` on((`v`.`idVaga` = `b`.`idVaga`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-18  8:45:26
