-- MySQL dump 10.13  Distrib 8.4.10, for Linux (x86_64)
--
-- Host: localhost    Database: jewelry_store
-- ------------------------------------------------------
-- Server version	8.4.10

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
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Watches','Luxury watches from Rolex, Audemars Piguet, Richard Mille and other iconic brands.',1,'2026-09-16 01:06:57','2026-09-16 01:06:57'),(2,'Rings','Rings made of gold, platinum and diamonds.',1,'2026-09-16 01:06:57','2026-09-16 01:06:57'),(3,'Necklaces','Necklaces and pendants made of gold and precious stones.',1,'2026-09-16 01:06:57','2026-09-16 01:06:57'),(4,'Bracelets','Bracelets made of gold, silver and diamonds.',1,'2026-09-16 01:06:57','2026-09-16 01:06:57'),(5,'Earrings','Earrings made of gold, pearls and precious stones.',1,'2026-09-16 01:06:57','2026-09-16 01:06:57');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Rolex Submariner Date','Iconic diving watch with a unidirectional rotatable bezel and a 41 mm case.','Oystersteel and 18k yellow gold',16500,8,155,'https://placehold.co/600x600/0f0f0f/c9a227?text=Rolex+Submariner+Date',1,1,'2026-09-16 01:38:11','2026-09-16 01:38:11'),(2,'Rolex Cosmograph Daytona','Legendary chronograph designed for racing drivers, with a tachymetric bezel.','18k white gold',45000,3,180,'https://placehold.co/600x600/0f0f0f/c9a227?text=Rolex+Cosmograph+Daytona',1,1,'2026-09-16 01:38:11','2026-09-16 02:48:17'),(3,'Audemars Piguet Royal Oak','Luxury sports watch with an octagonal bezel and the famous Grande Tapisserie dial.','Stainless steel',38000,4,140,'https://placehold.co/600x600/0f0f0f/c9a227?text=Audemars+Piguet+Royal+Oak',1,1,'2026-09-16 01:38:11','2026-09-16 01:38:11'),(4,'Richard Mille RM 11-03','Automatic flyback chronograph with a skeletonized movement and a tonneau case.','Titanium',210000,1,70,'https://placehold.co/600x600/0f0f0f/c9a227?text=Richard+Mille+RM+11-03',1,1,'2026-09-16 01:38:11','2026-09-16 01:38:11'),(5,'Patek Philippe Nautilus','Elegant sports watch with a porthole-shaped case and a horizontally embossed dial.','Stainless steel',95000,2,125,'https://placehold.co/600x600/0f0f0f/c9a227?text=Patek+Philippe+Nautilus',1,1,'2026-09-16 01:38:11','2026-09-16 01:38:11'),(6,'Solitaire Diamond Ring','Classic engagement ring with a 1.5 carat round brilliant diamond.','Platinum',12500,6,4.5,'https://placehold.co/600x600/0f0f0f/c9a227?text=Solitaire+Diamond+Ring',1,2,'2026-09-16 01:38:11','2026-09-16 01:38:11'),(7,'Diamond Eternity Band','Band set with a continuous line of brilliant diamonds.','18k white gold',6800,10,3.8,'https://placehold.co/600x600/0f0f0f/c9a227?text=Diamond+Eternity+Band',1,2,'2026-09-16 01:38:11','2026-09-16 01:38:11'),(8,'Emerald Cocktail Ring','Statement ring with an emerald cut emerald surrounded by diamonds.','18k yellow gold',9200,0,6.2,'https://placehold.co/600x600/0f0f0f/c9a227?text=Emerald+Cocktail+Ring',1,2,'2026-09-16 01:38:11','2026-09-16 01:38:11'),(9,'Cuban Link Chain','Heavy Cuban link chain with a secure box clasp.','18k yellow gold',14500,5,95,'https://placehold.co/600x600/0f0f0f/c9a227?text=Cuban+Link+Chain',1,3,'2026-09-16 01:38:11','2026-09-16 01:38:11'),(10,'Diamond Tennis Necklace','Necklace with a single row of perfectly matched diamonds.','18k white gold',28000,2,32,'https://placehold.co/600x600/0f0f0f/c9a227?text=Diamond+Tennis+Necklace',1,3,'2026-09-16 01:38:11','2026-09-16 01:38:11'),(11,'Sapphire Pendant','Oval blue sapphire pendant with a diamond halo.','Platinum',7400,7,8.5,'https://placehold.co/600x600/0f0f0f/c9a227?text=Sapphire+Pendant',1,3,'2026-09-16 01:38:11','2026-09-16 01:38:11'),(12,'Diamond Tennis Bracelet','Flexible bracelet with a line of brilliant cut diamonds.','18k white gold',11000,4,15,'https://placehold.co/600x600/0f0f0f/c9a227?text=Diamond+Tennis+Bracelet',1,4,'2026-09-16 01:38:11','2026-09-16 01:38:11'),(13,'Gold Cuban Bracelet','Solid Cuban link bracelet with a polished finish.','18k yellow gold',8900,9,60,'https://placehold.co/600x600/0f0f0f/c9a227?text=Gold+Cuban+Bracelet',1,4,'2026-09-16 01:38:11','2026-09-16 01:38:11'),(14,'Diamond Stud Earrings','Timeless stud earrings with round brilliant diamonds.','18k white gold',5400,12,2.4,'https://placehold.co/600x600/0f0f0f/c9a227?text=Diamond+Stud+Earrings',1,5,'2026-09-16 01:38:11','2026-09-16 01:38:11'),(15,'Pearl Drop Earrings','Elegant drop earrings with South Sea pearls.','18k yellow gold',2600,15,6,'https://placehold.co/600x600/0f0f0f/c9a227?text=Pearl+Drop+Earrings',1,5,'2026-09-16 01:38:11','2026-09-16 04:02:24'),(16,'Ruby Hoop Earrings','Hoop earrings set with vivid red rubies.','18k rose gold',4300,3,7.5,'https://placehold.co/600x600/0f0f0f/c9a227?text=Ruby+Hoop+Earrings',1,5,'2026-09-16 01:38:11','2026-09-16 01:38:11');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','Jewelry','admin@jewelrymen.com','$2y$12$gSvQDLYwu/fMnsxj/fBtP.LVuHxN8lptRvGZrqggrcT4JSFBtN7ya','3711596353','58505 O\'Keefe Wells','admin','2026-04-17',1,'6KxG5G9fUgvV6gulo26mvky4E95p96ldVDOYUftDYx7QEXOTFKH7tvO32coN','2026-09-16 00:02:46','2026-09-16 00:02:46'),(2,'Client','Jewelry','client@jewelrymen.com','$2y$12$XNx6vFvgvBv9HyZOdrC3CeDS8mdDv5TthE7LPdf9u4ZKWMpycCez2','3616054485','1466 Lehner Road','client','2026-07-25',1,'2NwaxkeMPw','2026-09-16 00:02:46','2026-09-16 00:02:46'),(3,'Ulises','Bosco','adam30@example.net','$2y$12$O1TZ26GR5O55JrNTWsp7EOS8FjAOoGyYMIuNicF3EbrMf2IbChX8O','3998962999','71330 Williamson Court','client','2026-07-12',1,'b6fJiVMxOq','2026-09-16 00:02:46','2026-09-16 00:02:46'),(4,'Osborne','Ankunding','natasha.watsica@example.net','$2y$12$O1TZ26GR5O55JrNTWsp7EOS8FjAOoGyYMIuNicF3EbrMf2IbChX8O','3653736330','3167 Tomas Crossroad','client','2025-02-11',1,'1jXD0crY14','2026-09-16 00:02:46','2026-09-16 00:02:46'),(5,'Carleton','Raynor','tprice@example.com','$2y$12$O1TZ26GR5O55JrNTWsp7EOS8FjAOoGyYMIuNicF3EbrMf2IbChX8O','3067937760','38528 Justus Views','client','2025-08-06',1,'P0VLmdoPok','2026-09-16 00:02:46','2026-09-16 00:02:46'),(6,'Brian','Davis','jarrod.leannon@example.org','$2y$12$O1TZ26GR5O55JrNTWsp7EOS8FjAOoGyYMIuNicF3EbrMf2IbChX8O','3861438238','301 Estella Passage','client','2026-03-31',1,'fOPepvvbm0','2026-09-16 00:02:46','2026-09-16 00:02:46'),(7,'Carolina','Baumbach','briana51@example.com','$2y$12$O1TZ26GR5O55JrNTWsp7EOS8FjAOoGyYMIuNicF3EbrMf2IbChX8O','3825311414','5985 Miller Plains Apt. 163','client','2025-09-05',1,'h2FV01CCnY','2026-09-16 00:02:46','2026-09-16 00:02:46'),(8,'Valentine','Gleason','pdonnelly@example.net','$2y$12$O1TZ26GR5O55JrNTWsp7EOS8FjAOoGyYMIuNicF3EbrMf2IbChX8O','3069010465','483 Ned Brook Suite 774','client','2025-05-27',1,'OBpgHwUQDg','2026-09-16 00:02:46','2026-09-16 00:02:46'),(9,'Barry','Hahn','bradtke.clementina@example.net','$2y$12$O1TZ26GR5O55JrNTWsp7EOS8FjAOoGyYMIuNicF3EbrMf2IbChX8O','3409594165','727 Araceli Wall Apt. 715','client','2025-02-26',1,'yOOF5izKAf','2026-09-16 00:02:46','2026-09-16 00:02:46'),(10,'Coby','Glover','irussel@example.org','$2y$12$O1TZ26GR5O55JrNTWsp7EOS8FjAOoGyYMIuNicF3EbrMf2IbChX8O','3448144345','6758 Marvin Port','client','2025-05-08',1,'bCcIJZVRK8','2026-09-16 00:02:46','2026-09-16 00:02:46');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,'confirmed','1466 Lehner Road',19100,0,19100,2,'2026-09-16 01:58:10','2026-09-16 02:11:53'),(2,'cancelled','1466 Lehner Road',45700,0,45700,2,'2026-09-16 01:58:10','2026-09-16 02:11:53'),(3,'confirmed','71330 Williamson Court',23900,0,23900,3,'2026-09-16 01:58:10','2026-09-16 02:11:53'),(4,'confirmed','71330 Williamson Court',14800,0,14800,3,'2026-09-16 01:58:10','2026-09-16 02:11:53'),(5,'cancelled','3167 Tomas Crossroad',76000,0,76000,4,'2026-09-16 01:58:10','2026-09-16 02:11:53'),(6,'delivered','3167 Tomas Crossroad',14500,0,14500,4,'2026-09-16 01:58:10','2026-09-16 02:11:53'),(7,'delivered','38528 Justus Views',22000,0,22000,5,'2026-09-16 01:58:10','2026-09-16 02:11:53'),(8,'pending','38528 Justus Views',128000,0,128000,5,'2026-09-16 01:58:10','2026-09-16 02:11:53'),(9,'shipped','301 Estella Passage',71000,0,71000,6,'2026-09-16 01:58:10','2026-09-16 02:11:53'),(10,'confirmed','301 Estella Passage',25000,0,25000,6,'2026-09-16 01:58:10','2026-09-16 02:11:53'),(11,'shipped','5985 Miller Plains Apt. 163',35900,0,35900,7,'2026-09-16 01:58:10','2026-09-16 02:11:53'),(12,'confirmed','5985 Miller Plains Apt. 163',90000,0,90000,7,'2026-09-16 01:58:10','2026-09-16 02:11:53'),(13,'cancelled','483 Ned Brook Suite 774',14500,0,14500,8,'2026-09-16 01:58:10','2026-09-16 02:11:53'),(14,'shipped','483 Ned Brook Suite 774',11000,0,11000,8,'2026-09-16 01:58:10','2026-09-16 02:11:53'),(15,'shipped','727 Araceli Wall Apt. 715',105800,0,105800,9,'2026-09-16 01:58:10','2026-09-16 02:11:53'),(16,'pending','727 Araceli Wall Apt. 715',84900,0,84900,9,'2026-09-16 01:58:10','2026-09-16 02:11:53'),(17,'shipped','6758 Marvin Port',57800,0,57800,10,'2026-09-16 01:58:10','2026-09-16 02:11:53'),(18,'cancelled','6758 Marvin Port',8900,0,8900,10,'2026-09-16 01:58:10','2026-09-16 02:11:53');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `order_items`
--

LOCK TABLES `order_items` WRITE;
/*!40000 ALTER TABLE `order_items` DISABLE KEYS */;
INSERT INTO `order_items` VALUES (1,2,7400,14800,1,11,'2026-09-16 02:11:53','2026-09-16 02:11:53'),(2,1,4300,4300,1,16,'2026-09-16 02:11:53','2026-09-16 02:11:53'),(3,1,16500,16500,2,1,'2026-09-16 02:11:53','2026-09-16 02:11:53'),(4,2,9200,18400,2,8,'2026-09-16 02:11:53','2026-09-16 02:11:53'),(5,2,5400,10800,2,14,'2026-09-16 02:11:53','2026-09-16 02:11:53'),(6,1,16500,16500,3,1,'2026-09-16 02:11:53','2026-09-16 02:11:53'),(7,1,7400,7400,3,11,'2026-09-16 02:11:53','2026-09-16 02:11:53'),(8,2,7400,14800,4,11,'2026-09-16 02:11:53','2026-09-16 02:11:53'),(9,2,38000,76000,5,3,'2026-09-16 02:11:53','2026-09-16 02:11:53'),(10,1,14500,14500,6,9,'2026-09-16 02:11:53','2026-09-16 02:11:53'),(11,2,11000,22000,7,12,'2026-09-16 02:11:53','2026-09-16 02:11:53'),(12,2,45000,90000,8,2,'2026-09-16 02:11:53','2026-09-16 02:11:53'),(13,1,38000,38000,8,3,'2026-09-16 02:11:53','2026-09-16 02:11:53'),(14,2,16500,33000,9,1,'2026-09-16 02:11:53','2026-09-16 02:11:53'),(15,1,38000,38000,9,3,'2026-09-16 02:11:53','2026-09-16 02:11:53'),(16,2,12500,25000,10,6,'2026-09-16 02:11:53','2026-09-16 02:11:53'),(17,2,14500,29000,11,9,'2026-09-16 02:11:53','2026-09-16 02:11:53'),(18,1,2600,2600,11,15,'2026-09-16 02:11:53','2026-09-16 02:11:53'),(19,1,4300,4300,11,16,'2026-09-16 02:11:53','2026-09-16 02:11:53'),(20,2,45000,90000,12,2,'2026-09-16 02:11:53','2026-09-16 02:11:53'),(21,1,14500,14500,13,9,'2026-09-16 02:11:53','2026-09-16 02:11:53'),(22,1,11000,11000,14,12,'2026-09-16 02:11:53','2026-09-16 02:11:53'),(23,1,95000,95000,15,5,'2026-09-16 02:11:53','2026-09-16 02:11:53'),(24,2,5400,10800,15,14,'2026-09-16 02:11:53','2026-09-16 02:11:53'),(25,2,38000,76000,16,3,'2026-09-16 02:11:53','2026-09-16 02:11:53'),(26,1,8900,8900,16,13,'2026-09-16 02:11:53','2026-09-16 02:11:53'),(27,2,14500,29000,17,9,'2026-09-16 02:11:53','2026-09-16 02:11:53'),(28,1,11000,11000,17,12,'2026-09-16 02:11:53','2026-09-16 02:11:53'),(29,2,8900,17800,17,13,'2026-09-16 02:11:53','2026-09-16 02:11:53'),(30,1,8900,8900,18,13,'2026-09-16 02:11:53','2026-09-16 02:11:53');
/*!40000 ALTER TABLE `order_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` VALUES (1,19100,'bank_transfer','2025-12-26','approved','TX-MN039FEE6REU',1,'2026-09-16 03:58:06','2026-09-16 03:58:06'),(2,45700,'bank_transfer','2026-03-04','refunded','TX-QR2GQCE6YPNT',2,'2026-09-16 03:58:06','2026-09-16 03:58:06'),(3,23900,'credit_card','2026-07-25','approved','TX-SRZLNDP3HPVE',3,'2026-09-16 03:58:06','2026-09-16 03:58:06'),(4,14800,'bank_transfer','2026-05-22','approved','TX-RNFMXZD821SJ',4,'2026-09-16 03:58:06','2026-09-16 03:58:06'),(5,76000,'debit_card','2026-06-16','refunded','TX-I64KQA2DM19A',5,'2026-09-16 03:58:06','2026-09-16 03:58:06'),(6,14500,'bank_transfer','2026-06-12','approved','TX-GSC1VU17X1NE',6,'2026-09-16 03:58:06','2026-09-16 03:58:06'),(7,22000,'bank_transfer','2025-12-04','approved','TX-RU5WGUFQZCYY',7,'2026-09-16 03:58:06','2026-09-16 03:58:06'),(8,71000,'bank_transfer','2026-02-28','approved','TX-QRC8Z6KYYDIM',9,'2026-09-16 03:58:06','2026-09-16 03:58:06'),(9,25000,'debit_card','2025-09-24','approved','TX-KNOHE90NIJUQ',10,'2026-09-16 03:58:06','2026-09-16 03:58:06'),(10,35900,'debit_card','2026-09-03','approved','TX-S5CC4FMI5FU5',11,'2026-09-16 03:58:06','2026-09-16 03:58:06'),(11,90000,'debit_card','2025-11-08','approved','TX-W2H8DDLNS356',12,'2026-09-16 03:58:06','2026-09-16 03:58:06'),(12,14500,'bank_transfer','2026-02-04','refunded','TX-X6SMSSB0M74O',13,'2026-09-16 03:58:06','2026-09-16 03:58:06'),(13,11000,'debit_card','2025-10-08','approved','TX-YIXJWV5YPWAH',14,'2026-09-16 03:58:06','2026-09-16 03:58:06'),(14,105800,'credit_card','2026-08-12','approved','TX-G2CCOYDMOXW9',15,'2026-09-16 03:58:06','2026-09-16 03:58:06'),(15,57800,'credit_card','2025-10-07','approved','TX-SIYYN6F2MJRV',17,'2026-09-16 03:58:06','2026-09-16 03:58:06'),(16,8900,'debit_card','2026-03-13','refunded','TX-VTHILNLSMSRC',18,'2026-09-16 03:58:06','2026-09-16 03:58:06');
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-11-09 11:29:02
