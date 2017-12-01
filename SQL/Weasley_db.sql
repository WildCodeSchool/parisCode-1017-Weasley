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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produits`
--

LOCK TABLES `produits` WRITE;
/*!40000 ALTER TABLE `produits` DISABLE KEYS */;
INSERT INTO `produits` VALUES (1,'Boîte à flemme','Les boîtes à Flemme sont une invention de Fred et George Weasley. Il s\'agit d\'un choix de confiseries qui rendent malade.','assets/pictures/produits/boite_flemme.jpg','friandises'),(3,'Nougat','Une des sortes de sucreries que l\'on trouve dans une boîte à Flemme. Chaque bout du bonbon est d\'une couleur différente, l\'un provoque une fort saignement de nez et l\'autre annule ses effets.','assets/pictures/produits/nougat.jpg','friandises'),(4,'Pralines','Pralines Longue Langue: inventées par les jumeaux Weasley, ces pralines allongent considérablement la taille de la langue de la victime qui les avalent.','assets/pictures/produits/pralines.jpg','friandises'),(5,'Dragées','Une des sortes de sucreries que l\'on trouve dans une boîte à Flemme. Chaque bout du bonbon est d\'une couleur différente, l\'un provoque un vomissement et l\'autre annule ses effets. Fred et George ont eu des problèmes avec le prototype jusqu\'à ce qu\'ils réussissent équilibrer les effets pour que le vomissement soit important mais pas trop afin de pouvoir tout de même avaler le remède.','assets/pictures/produits/dragees.jpg','friandises'),(6,'Ballons','Ballons lumineux increvables: Etranges ballons magiques à gonfler afin de créer une diversion très bruyante lors d\'une situation épineuse. Prix : 1 gallion l\'unité et 5 gallions la boite de 10 ballons . Encore en stock .','assets/pictures/produits/boite_flemme.jpg','farces'),(7,'Bomba-bouse','Bombabouse: Quand on les jette, elles dégagent une odeur putride. Quand on les tient, elles salissent les mains . Prix : 1 gallion l\'unité et 5 gallions la boite de 10 bombabouse . Encore en stock .','assets/pictures/produits/nougat.jpg','farces'),(8,'Boule Puante','Boules puantes: Objets minuscules, très appréciés de Fred et George Weasley, qui créent un nuage de fumée verte nauséabond qui peut semer le trouble auprès d\'adversaires ou de préfets. Prix : 1 gallion l\'unité et 5 gallions la boite de 10 boules puantes . Encore en stock .','assets/pictures/produits/pralines.jpg','farces'),(9,'Déflagration Deluxe','Déflagration Deluxe : Sélection de luxe des Feuxfous Buseboum, les feux d\'artifices des jumeaux. Prix : 20 gallions l\'unité . Ne se vend pas en lot . Encore en Stock .\r\n','assets/pictures/produits/dragees.jpg','farces'),(10,'Feux-fous fuse-boum','Feuxfous Fuseboum :Feux d\'artifices magiques provoquant différents effets visuels, grâce à des enchantements qui créent des variations si deux fusées se rentrent dedans ou si certains sortilèges sont utilisés pour tenter de s\'en débarrasser. Essayer de les pétrifier résulte en une explosion, par exemple, tandis qu\'un sortilège de Disparition multiplie par 10 l\'effet du feu d\'artifice visé. Prix : 2 gallions l\'unité et 20 gallions la boite de 10 feuxfous fuseboum . Encore en stock .\r\n','assets/pictures/produits/boite_flemme.jpg','farces'),(11,'Flambée de base','Flambée de Base : Sélection de base des Feuxfous Buseboum, les feux d\'artifices des jumeaux. Prix : 5 gallions l\'unité . Ne se vends pas en lot . Encore en stock .\r\n','assets/pictures/produits/nougat.jpg','farces'),(12,'Marécage portable','Marécage Portable : Lorsqu\'il est déployé, il crée un marécage sur la zone ciblée. C\'est une Farce qui résulta de la fameuse retenue ratée d\'Ombrage. Prix : 5 gallions l\'unité . Ne se vends pas en lot . Encore en stock .\r\n','assets/pictures/produits/dragees.jpg','farces'),(13,'Pétards','Pétards moulliés du Dr Flibuste: Pétards qui explosent sans faire de chaleur . Prix : 10 mornilles l\'unité et 1 gallion la boite de 10 ballons . Encore en stock .\r\n','assets/pictures/produits/dragees.jpg','farces'),(14,'Chapeau sans tête','Chapeau sans tête: il permet de faire disparaître le chapeau et la tête en même temps, ce qui est vraiment impressionnant d\'après Hermione! Le ministère en a en effet commandé pour ses missions contre Voldemort, car ce chapeau peut être d\'une grande aide ! Prix : 6 gallions l\'unité et 45 gallions la boite de 10 chapeaux sans têtes . Encore en stock .','assets/pictures/produits/boite_flemme.jpg','accessoires'),(15,'Crèmes Canaries','Crèmes canaries: la personne sans s\'en rendre en compte se transforme en un grand canari géant pendant quelques secondes. Prix :10 mornilles l\'unité et 1 gallion la boite de 10 crèmes canaries . Encore en stock .\r\n','assets/pictures/produits/nougat.jpg','accessoires'),(16,'Fausses baguettes','Fausses baguettes : Ces objets ressemblent à des baguettes normales mais quand on essaie de les utiliser, ils se changent en quelque chose d\'amusant comme un perroquet en fer blanc ou un haddock en caoutchouc (pour la version la moins chère), ou frappera l\'utilisateur imprudent sur la tête (la version la plus chère). Prix : 5 gallions l\'unité . Ne se vends pas en lot . Encore en stock .','assets/pictures/produits/pralines.jpg','accessoires'),(17,'Oreille extensible','Oreilles à rallonges: Longue ficelle couleur chair qui permet à celui qui l\'introduit dans son oreille d\'ecouter des conversations. Inventé par les jumeaux Weasley, vous pourrez en trouver dans leur boutique farces pour sorciers facetieux. Prix : 3 gallions l\'unité et 10 gallions la boite de 10 oreilles à rallonges . Encore en stock . AFFAIRE DE LA BOUTIQUE : 10 GALLIONS LA BOITE AU LIEU DE 30 GALLIONS !!','assets/pictures/produits/dragees.jpg','accessoires'),(18,'Disparition','Le pack disparition vous permet de vous éclipser instantanément du moins, aux yeux de tous. Vous pourrez ainsi être témoins de scènes incroyables sans être vu. ','assets/pictures/produits/pack_disparition_.jpg','packs'),(19,'Pack explosion','Les packs explosions: envie de sensations fortes? Besoin de pimenter votre quotidien de Moldu? Le pack explosion est fait pour vous. Que ce soit pour surprendre vos collègues, pour éloigner vos ennemis ou pour boucler en beauté une dispute avec votre moitié, n\'hésitez plus: faites exploser !!! ','assets/pictures/produits/pack_explosion.jpg','packs');
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
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

-- Dump completed on 2017-11-30 16:52:44
