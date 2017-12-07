-- MySQL dump 10.13  Distrib 5.6.35, for osx10.9 (x86_64)
--
-- Host: localhost    Database: weasley
-- ------------------------------------------------------
-- Server version	5.6.35

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
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adresse` text,
  `telephone` varchar(20) DEFAULT NULL,
  `ouverture` varchar(250) DEFAULT NULL,
  `commentaire` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` VALUES (1,'11 rue de Poissy, 75005 Paris.','08 36 65 65 65','Du lundi au samedi de 9h à 20h.','Le dimanche nous sommes à l\'entraînement de Quidditch.\r\n\r\n');
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produits`
--

DROP TABLE IF EXISTS `produits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produits` (
  `idProduit` int(11) NOT NULL AUTO_INCREMENT,
  `nomProduit` varchar(100) DEFAULT NULL,
  `descriptionProduit` text,
  `imageUrl` varchar(255) DEFAULT NULL,
  `catProduit` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idProduit`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produits`
--

LOCK TABLES `produits` WRITE;
/*!40000 ALTER TABLE `produits` DISABLE KEYS */;
INSERT INTO `produits` VALUES (1,'Boîte à flemme','La boîte à Flemme est une invention de Fred et George Weasley. Il s\'agit d\'un choix de confiseries qui rendent malade.','boite_flemme.jpg','friandises'),(3,'Nougat','Une des sortes de sucreries que l\'on trouve dans une boîte à Flemme. Chaque bout du bonbon est d\'une couleur différente, l\'un provoque une fort saignement de nez et l\'autre annule ses effets.','nougat.jpg','friandises'),(4,'Pralines','Pralines Longue Langue, inventées par les jumeaux Weasley, elles allongent considérablement la taille de la langue de la victime qui les avalent.','pralines.jpg','friandises'),(5,'Dragées','Une des sortes de sucreries que l\'on trouve dans une boîte à Flemme. Le bonbon comporte 2 parties, l\'une provoque un vomissement et l\'autre annule ses effets. ','dragees.jpg','friandises'),(6,'Ballons','Ballons lumineux increvables: Etranges ballons magiques à gonfler afin de créer une diversion très bruyante lors d\'une situation épineuse. ','boite_flemme.jpg','farces'),(7,'Bomba-bouse','Quand on les jette, elles dégagent une odeur putride. Quand on les tient, elles salissent les mains . ','nougat.jpg','farces'),(8,'Boule Puante','Objet minuscule, très apprécié de Fred et George Weasley, qui crée un nuage de fumée verte nauséabond, pouvant semer le trouble auprès d\'adversaires ou de préfets. ','pralines.jpg','farces'),(9,'Déflagration Deluxe','Sélection de luxe des Feuxfous Buseboum, les feux d\'artifices des jumeaux Weasley.\r\n','dragees.jpg','farces'),(10,'Feux-fous fuse-boum','Feux d\'artifices magiques provoquant différents effets visuels, grâce à des enchantements qui créent des variations si deux fusées se rentrent dedans.','boite_flemme.jpg','farces'),(11,'Flambée de base','Sélection de base des Feuxfous Buseboum, les feux d\'artifices des jumeaux Weasley.\r\n','nougat.jpg','farces'),(12,'Marécage portable','Lorsqu\'il est déployé, il crée un marécage sur la zone ciblée. C\'est une Farce qui résulta de la fameuse retenue ratée d\'Ombrage. \r\n','dragees.jpg','farces'),(13,'Pétards','Pétards moulliés du Dr Flibuste. Ils explosent sans faire de chaleur.','dragees.jpg','farces'),(14,'Chapeau sans tête','Il permet de faire disparaître le chapeau et la tête en même temps, ce qui est vraiment impressionnant d\'après Hermione ! Le ministère en a en effet commandé pour ses missions contre Voldemort.','boite_flemme.jpg','accessoires'),(15,'Crèmes Canaries','La personne sans s\'en rendre en compte se transforme en un grand canari géant pendant quelques secondes. \r\n','nougat.jpg','accessoires'),(16,'Fausse baguette','Se change en quelque chose d\'amusant à l\'utilisation : un perroquet en fer blanc, un haddock en caoutchouc, ou frappera l\'utilisateur imprudent sur la tête.','pralines.jpg','accessoires'),(17,'Oreille extensible','Longue ficelle couleur chair qui permet à celui qui l\'introduit dans son oreille d\'écouter des conversations. ','pralines.jpg','accessoires'),(18,'Disparition','Le pack disparition vous permet de vous éclipser instantanément du moins, aux yeux de tous. Vous pourrez ainsi être témoins de scènes incroyables sans être vu. ','pack_disparition_.jpg','packs'),(19,'Pack explosion','Envie de sensations fortes ? Besoin de pimenter votre quotidien de Moldu ? Le pack explosion est fait pour vous. Que ce soit pour surprendre vos collègues, pour éloigner vos ennemis ou pour boucler en beauté une dispute avec votre moitié, n\'hésitez plus : faites exploser !!! ','pack_explosion.jpg','packs');
/*!40000 ALTER TABLE `produits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin','$2y$10$NiWhilxLWqQlrX0DuBVQiOnateD3LyqLi/Y1VJK5hEzVBTrX.ORn6');
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

-- Dump completed on 2017-12-07 17:00:37
