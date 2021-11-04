-- MariaDB dump 10.19  Distrib 10.4.21-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: boneorga_boneorgdb21
-- ------------------------------------------------------
-- Server version	10.4.21-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbl_about`
--

DROP TABLE IF EXISTS `tbl_about`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_about` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `dsc` text DEFAULT NULL,
  `img_cover` varchar(25) DEFAULT NULL,
  `is_active` enum('1','0') NOT NULL DEFAULT '1',
  `is_recommend` enum('1','0') DEFAULT '0',
  `create_date` datetime NOT NULL,
  `update_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_about`
--

LOCK TABLES `tbl_about` WRITE;
/*!40000 ALTER TABLE `tbl_about` DISABLE KEYS */;
INSERT INTO `tbl_about` VALUES (1,'เกี่ยวกับเรา','																																																																																																				<p>บริการจดทะเบียน บริการวางระบบบัญชี วิเคราะห์งบการเงิน<br>พร้อมทีมตรวจสอบบัญชีบริการด้านบัญชีภาษีอากร</p><p>บริษัท บี วัน ออร์แกไนเซอร์ จำกัด จัดตั้งธุรกิจเพื่อรองรับความต้องการของผู้ประกอบการทุกด้าน เพียงท่านแจ้งข้อมูลที่ต้องการให้เราช่วยปรับปรุง หรือธุรกิจที่เริ่มต้นใหม่ไม่รู้ว่าจะเริ่มต้นอย่างไร ทางเรามีความยินดีที่ให้คำแนะนำทุกด้านอย่างใกล้ชิด ทางเรามีทีมงานหลายด้าน อาทิเช่น ผู้ทำบํญชี ผู้สอบบัญชี ทีมออกแบบโลโก้ ทีมออกแบบเว็ฐไซต์ เป็นต้น<br></p>																																																																																										','about.png','1','1','2021-10-07 17:04:02','2021-10-25 10:48:09');
/*!40000 ALTER TABLE `tbl_about` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `ip` varchar(2) NOT NULL,
  `create_date` date NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_admin`
--

LOCK TABLES `tbl_admin` WRITE;
/*!40000 ALTER TABLE `tbl_admin` DISABLE KEYS */;
INSERT INTO `tbl_admin` VALUES (1,'Administrator','admin','$2y$10$ll2JTgsPrIKA3XMt5p691e6hWlET8djHJzdMNKI2FaVXt2rxloFb2','1','2020-08-03');
/*!40000 ALTER TABLE `tbl_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_bannerservice`
--

DROP TABLE IF EXISTS `tbl_bannerservice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_bannerservice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `img_cover` varchar(255) DEFAULT NULL,
  `create_date` date NOT NULL,
  `update_date` date DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_bannerservice`
--

LOCK TABLES `tbl_bannerservice` WRITE;
/*!40000 ALTER TABLE `tbl_bannerservice` DISABLE KEYS */;
INSERT INTO `tbl_bannerservice` VALUES (1,'Banner-1','bannerservice.png','2021-10-08','2021-10-08',1);
/*!40000 ALTER TABLE `tbl_bannerservice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_contact`
--

DROP TABLE IF EXISTS `tbl_contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_contact` (
  `id` int(100) NOT NULL,
  `c_add` longtext DEFAULT NULL,
  `c_tel` varchar(255) DEFAULT NULL,
  `c_line_id` varchar(255) DEFAULT NULL,
  `c_fb` varchar(255) DEFAULT NULL,
  `c_mail` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_contact`
--

LOCK TABLES `tbl_contact` WRITE;
/*!40000 ALTER TABLE `tbl_contact` DISABLE KEYS */;
INSERT INTO `tbl_contact` VALUES (1,'199/142 ถนนพุทธมณฑลสาย 3 แขวงหนองค้างพลู เขตหนองแขม กรุงเทพมหานคร 10160','0659199047, 0826619766','boneacc','@BONEAAccountantPlanningLimitedPartnerhip','organizer.corp@gmail.com');
/*!40000 ALTER TABLE `tbl_contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_homebanner`
--

DROP TABLE IF EXISTS `tbl_homebanner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_homebanner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `img_cover` varchar(255) DEFAULT NULL,
  `create_date` date NOT NULL,
  `update_date` date DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_homebanner`
--

LOCK TABLES `tbl_homebanner` WRITE;
/*!40000 ALTER TABLE `tbl_homebanner` DISABLE KEYS */;
INSERT INTO `tbl_homebanner` VALUES (1,'Banner-1','banner1920x890.png','2021-10-07','2021-10-08',1);
/*!40000 ALTER TABLE `tbl_homebanner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_product_image`
--

DROP TABLE IF EXISTS `tbl_product_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_product_image` (
  `pimg_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `img_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  PRIMARY KEY (`pimg_id`,`product_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_product_image`
--

LOCK TABLES `tbl_product_image` WRITE;
/*!40000 ALTER TABLE `tbl_product_image` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_product_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_service`
--

DROP TABLE IF EXISTS `tbl_service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `caption` varchar(255) CHARACTER SET utf8 COLLATE utf8_estonian_ci DEFAULT NULL,
  `type_id` int(11) NOT NULL COMMENT 'FK',
  `name` varchar(255) DEFAULT NULL,
  `dsc` text DEFAULT NULL,
  `img_cover` text NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime DEFAULT NULL,
  `is_active` enum('1','0') NOT NULL DEFAULT '1',
  `is_recommend` enum('1','0') DEFAULT '0',
  PRIMARY KEY (`id`,`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_service`
--

LOCK TABLES `tbl_service` WRITE;
/*!40000 ALTER TABLE `tbl_service` DISABLE KEYS */;
INSERT INTO `tbl_service` VALUES (1,'บัญชีครบวงจร',1,'บริการงานบัญชีครบวงจร','										<h5>- จองชื่อนิติบุคล บริการจดทะเบียนจัดตั้งบริษัท, ห้างหุ้นส่วนจำกัด, ร้านค้า(ในนามบุคคลธรรมดา), บุคคลธรรมดา,<br>- บริการจดทะเบียนการค้า อิเล็กโทรนิกส์ (DBD registered)<br>- บริการแจ้งจดทะเบียน แก้ไข เปลี่ยนแปลง อาทิเช่น เพิ่ม-ลดทุน แก้ไขเปลี่ยนแปลงชื่อบริษัท เพิ่มเติมวัตถุประสงค์ ย้ายสถานประกอบการ กรรมการเข้าใหม่-ลาออก อำนาจกรรมการ เพิ่มสาขา, ลดสาขา ตราประทับใหม่ เปลี่ยนชื่อนิติบุคคลใหม่ ฯลฯ<br>- บริการจดทะเบียนเลิกบริษัท / ห้างหุ้นส่วนและชำระบัญชี<br>- บริการจดทะเบียนผู้ประกอบการในระบบภาษีมูลค่าเพิ่ม<br>- บริการแจ้งการเปลี่ยนแปลงภาษีต่างๆ ต่อกรมสรรพกร<br>- บริการขอหนังสือรับรอง รวมทั้งคัดลอกเอกสารต่าง ๆ<br>- บริการขึ้นทะเบียนประกันสังคมของนายจ้าง, ลูกจ้าง, และแจ้งการเปลี่ยนแปลงต่าง ๆ</h5>																																																																																														','group-people-working-out-business-plan-office.jpg','2021-10-07 13:22:40','2021-10-26 00:00:00','1','1'),(2,'ภ.ง.ด.1 ภ.ง.ด.3 ภ.ง.ด.53',1,'จัดทำและยื่นภาษีเงินได้หัก ณ ที่จ่าย ภ.ง.ด.1 ภ.ง.ด.3 ภ.ง.ด.53','																																						','account2.png','2021-10-07 13:25:35','2021-10-26 00:00:00','1','1'),(4,'ภาษีมูลค่าเพิ่ม',1,'จัดทำและยื่นภาษีมูลค่าเพิ่ม ภ.พ.30','																			','account3.png','2021-10-24 01:24:28','2021-10-26 00:00:00','1','1'),(5,'ภาษีซื้อ-ขายประจำเดือน',1,'จัดทำรายงานภาษีขายและรายงานภาษีซื้อประจำเดือน ','																			','account4.png','2021-10-24 01:25:31','2021-10-26 00:00:00','1','1'),(6,'เงินสมทบประกันสังคม',1,'จัดทำและนำส่งเงินสมทบประกันสังคมประจำเดือน ','																																						','account5.png','2021-10-24 01:26:43','2021-10-26 00:00:00','1','1'),(7,'ภ.ง.ด.1ก',1,'จัดทำและนำส่งสิ้นปี ภ.ง.ด.1ก','																			','account6.png','2021-10-24 01:27:25','2021-10-26 00:00:00','1','1'),(8,'ภาษีเงินได้นิติบุคคล กลางปี ภ.ง.ด.51',1,'จัดทำและยื่นภาษีเงินได้นิติบุคคล กลางปี ภ.ง.ด.51','																			','account7.png','2021-10-24 01:27:54','2021-10-26 00:00:00','1','1'),(9,'ภาษีเงินได้นิติบุคคลสิ้นปี ภ.ง.ด.50',1,'จัดทำภาษีเงินได้นิติบุคคลสิ้นปี ภ.ง.ด.50','																			','account8.png','2021-10-24 01:28:28','2021-10-26 00:00:00','1','1'),(10,'นำส่งงบการเงิน สบช.3',1,'จัดทำและยื่นแบบนำส่งงบการเงิน สบช.3','																			','account9.png','2021-10-24 01:29:00','2021-10-26 00:00:00','1','1'),(11,'ระบบเงินเดือนพนักงาน',1,'จัดทำระบบเงินเดือนพนักงาน','																			','account10.png','2021-10-24 01:29:30','2021-10-26 00:00:00','1','1'),(12,'จดทะเบียน (หจก.)',2,'จดทะเบียนห้างหุ้นส่วนจำกัด (หจก.) ','										<div style=\"text-align: center;\"><div style=\"text-align: left; \">- จองชื่อนิติบุคล บริการจดทะเบียนจัดตั้งบริษัท, ห้างหุ้นส่วนจำกัด, ร้านค้า(ในนามบุคคลธรรมดา), บุคคลธรรมดา,</div><div style=\"text-align: left;\">- บริการจดทะเบียนการค้า อิเล็กโทรนิกส์ (DBD registered)</div><div style=\"text-align: left;\">- บริการแจ้งจดทะเบียน แก้ไข เปลี่ยนแปลง อาทิเช่น เพิ่ม-ลดทุน แก้ไขเปลี่ยนแปลงชื่อบริษัท เพิ่มเติมวัตถุประสงค์ ย้ายสถานประกอบการ กรรมการเข้าใหม่-ลาออก อำนาจกรรมการ เพิ่มสาขา, ลดสาขา&nbsp; ตราประทับใหม่ เปลี่ยนชื่อนิติบุคคลใหม่ ฯลฯ</div><div style=\"text-align: left;\">- บริการจดทะเบียนเลิกบริษัท / ห้างหุ้นส่วนและชำระบัญชี</div><div style=\"text-align: left;\">- บริการจดทะเบียนผู้ประกอบการในระบบภาษีมูลค่าเพิ่ม</div><div style=\"text-align: left;\">- บริการแจ้งการเปลี่ยนแปลงภาษีต่างๆ ต่อกรมสรรพกร</div><div style=\"text-align: left;\">- บริการขอหนังสือรับรอง รวมทั้งคัดลอกเอกสารต่าง ๆ</div><div style=\"text-align: left; \">- บริการขึ้นทะเบียนประกันสังคมของนายจ้าง, ลูกจ้าง, และแจ้งการเปลี่ยนแปลงต่าง ๆ</div></div>																																																																		','group-people-working-out-business-plan-office.jpg','2021-10-24 01:30:58','2021-10-27 00:00:00','1','1'),(13,'จดทะเบียน (บจก.)',2,'จดทะเบียนบริษัทจำกัด (บจก.) ','																			','registered2.png','2021-10-24 01:32:14','2021-10-26 00:00:00','1','1'),(14,'จดทะเบียนภาษีมูลค่าเพิ่ม',2,'จดทะเบียนภาษีมูลค่าเพิ่ม แจ้งย้ายสถานประกอบการ, เพิ่ม-ลดสาขา','																			','registered3.png','2021-10-24 01:32:59','2021-10-26 00:00:00','1','1'),(15,'ขึ้นทะเบียนประกันสังคม',2,'จัดขึ้นทะเบียนนายจ้างประกันสังคม ','																			','registered4.png','2021-10-24 01:33:32','2021-10-26 00:00:00','1','1'),(16,'จดทะเบียน เปลี่ยนแปลงข้อมูล',2,'จดทะเบียน เปลี่ยนแปลงข้อมูลเพิ่มหรือลดทุนจดเปลี่ยนแปลงกรรมการเข้าและออก','																			','registered5.png','2021-10-24 01:34:03','2021-10-26 00:00:00','1','1'),(17,'จดปิดกิจการ',2,'จดปิดกิจการ บริษัท ห้างหุ้นส่วนจำกัด ','																			','registered8.png','2021-10-24 01:35:19','2021-10-26 00:00:00','1','1'),(18,'ยื่นภาษีเงินได้บุคคลธรรมดา',2,'รับยื่นภาษีเงินได้บุคคลธรรมดาประจำปี ','																			','registered6.png','2021-10-24 01:36:25','2021-10-26 00:00:00','1','1'),(19,'ให้คำปรึกษาด้านบัญชี ภาษี',2,'ให้คำปรึกษาด้านบัญชี ภาษี','																			','registered7.png','2021-10-24 01:37:04','2021-10-26 00:00:00','1','1'),(20,'บริการประสานงาน',2,'ให้บริการประสานงานเคลียร์ปัญหาต่างๆ กับสรรพากร','																			','registered9.png','2021-10-24 01:37:47','2021-10-26 00:00:00','1','1'),(21,'ให้บริการประสานงานยื่น Paperless',2,'ให้บริการประสานงานยื่น Paperless','																			','registered10.png','2021-10-24 01:38:16','2021-10-26 00:00:00','1','1'),(22,'จดลิขสิทธิ์ สิทธิบัตร',2,'จดลิขสิทธิ์ สิทธิบัตร เครื่องหมายการค้า ขอใบอนุญาตจัดตั้งโรงงานฯ และต่อใบอนุญาต','																			','registered11.png','2021-10-24 01:38:50','2021-10-26 00:00:00','1','1');
/*!40000 ALTER TABLE `tbl_service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_service_img`
--

DROP TABLE IF EXISTS `tbl_service_img`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_service_img` (
  `simg_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) NOT NULL,
  `img_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `is_active` enum('1','0') DEFAULT '1',
  `create_date` datetime DEFAULT NULL,
  PRIMARY KEY (`simg_id`,`service_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_service_img`
--

LOCK TABLES `tbl_service_img` WRITE;
/*!40000 ALTER TABLE `tbl_service_img` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_service_img` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_type`
--

DROP TABLE IF EXISTS `tbl_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_type` (
  `id` int(100) NOT NULL COMMENT 'PK',
  `name` varchar(255) DEFAULT NULL,
  `is_active` enum('1','0') DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_type`
--

LOCK TABLES `tbl_type` WRITE;
/*!40000 ALTER TABLE `tbl_type` DISABLE KEYS */;
INSERT INTO `tbl_type` VALUES (1,'บริการงานบัญชีครบวงจร','1'),(2,'บริการจดทะเบียน','1');
/*!40000 ALTER TABLE `tbl_type` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-10-29 16:51:07
