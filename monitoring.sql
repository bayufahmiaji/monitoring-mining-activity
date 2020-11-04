-- MySQL dump 10.13  Distrib 8.0.17, for Win64 (x86_64)
--
-- Host: localhost    Database: monitoring
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
-- Table structure for table `accidents`
--

DROP TABLE IF EXISTS `accidents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `accidents` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `klasifikasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accidents`
--

LOCK TABLES `accidents` WRITE;
/*!40000 ALTER TABLE `accidents` DISABLE KEYS */;
INSERT INTO `accidents` VALUES (1,'2','PT Freeport Indonesia','5','2020-08-04','Lokasi Tambang 1','Kecelakan terjadi dengan sangat mengenaskan anjim<br>','Sedang(Minor)','2020-08-30 06:01:06','2020-09-11 05:37:23'),(2,'2','PT Freeport Indonesia','4','2020-08-05','Lokasi Tambang 2','Banyak Banget yang kecelakaan','Berat(Serious)','2020-08-30 06:24:21','2020-08-30 06:24:21'),(3,'4','PT Indo Muro Kencana','2','2020-09-09 00:00:00','Lokasi Tambang 1','Terjadi Kecelakan akibat konstruksi alat tambang yang gagal','Fatal/Meninggal','2020-09-13 17:02:50','2020-09-13 17:02:50');
/*!40000 ALTER TABLE `accidents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `companies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pemegangsaham` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jperizinan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tkontrak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `galian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `companies`
--

LOCK TABLES `companies` WRITE;
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
INSERT INTO `companies` VALUES (2,'PT Freeport Indonesia','Freeport McMoran Copper & Gold Corp (81,28%), Pemerintah RI (9.36%), dan PT Indocopper Investama Corp. (9.36%)','freeport@gmail.com','Kontrak Karya','7 April 1967','Plaza 89 lantai 5 & 12, Jl. HR. Rasuna Said Kav. X-7 No. 6,  Jakarta 12940','Tembaga, Emas, dan Perak (Cu, Au, Ag)','freeport.png','2020-07-31 08:59:11','2020-07-31 08:59:11'),(3,'PT Meares Soputan Mining','Archipelago Resources Pty. Ltd (95%) PT Arhci Indonesia (5%)','meares@gmail.com','Kontrak Karya','2 Desember 1986','Menara Rajawali Ly. 10 Jakarta Selatan 12950','Emas','meares.jpg','2020-08-05 00:43:20','2020-08-05 00:43:20'),(4,'PT Indo Muro Kencana','Indo Muro Pty. Ltd.','murokencana@gmail.com','Kontrak Karya','27 Februari 1985','Graha Kirana Building Lt 9 Jakarta','Emas dan Perak','imk.jpg','2020-08-05 00:47:56','2020-08-05 00:47:56');
/*!40000 ALTER TABLE `companies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipments`
--

DROP TABLE IF EXISTS `equipments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `equipments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_company` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipments`
--

LOCK TABLES `equipments` WRITE;
/*!40000 ALTER TABLE `equipments` DISABLE KEYS */;
INSERT INTO `equipments` VALUES (1,'PT Freeport Indonesia','Excavator',2,10,'2020-08-28 20:56:47','2020-08-28 20:56:47','Lokasi Tambang 1'),(2,'PT Freeport Indonesia','Excavator Komatsu PC 1250',2,10,'2020-09-02 01:26:24','2020-09-02 01:26:24','Lokasi Tambang 1'),(4,'PT Meares Soputan Mining','Excavator',3,12,'2020-09-09 20:34:47','2020-09-09 20:34:47','Lokasi Tambang 1'),(5,'PT Meares Soputan Mining','Excavator Komatsu PC 1250',3,7,'2020-09-09 21:11:33','2020-09-09 21:13:21','Lokasi Tambang 2'),(6,'PT Indo Muro Kencana','Excavator',4,12,'2020-09-13 16:55:24','2020-09-13 16:55:24','Lokasi Tambang 1'),(7,'PT Freeport Indonesia','Excavator',2,40,'2020-09-13 23:48:35','2020-09-13 23:48:35','Lokasi Tambang 2');
/*!40000 ALTER TABLE `equipments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exavations`
--

DROP TABLE IF EXISTS `exavations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `exavations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_company` int(11) NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hasil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` double(8,2) NOT NULL,
  `date` date NOT NULL,
  `biaya` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exavations`
--

LOCK TABLES `exavations` WRITE;
/*!40000 ALTER TABLE `exavations` DISABLE KEYS */;
INSERT INTO `exavations` VALUES (3,3,'PT Meares Soputan Mining','Penggalian','Batubara','Lokasi Tambang 1',80.00,'2020-09-08',136.00,'2020-09-08 02:31:38','2020-09-08 02:31:38'),(4,3,'PT Meares Soputan Mining','Penggalian','Batubara','Lokasi Tambang 1',3000.00,'2020-09-30',5100.00,'2020-09-08 02:51:08','2020-09-08 02:51:08'),(5,2,'PT Freeport Indonesia','Penggalian','Batubara','Lokasi Tambang 1',124.00,'2020-09-30',210.80,'2020-09-11 05:02:39','2020-09-11 05:07:43'),(6,2,'PT Freeport Indonesia','Penggalian','Batubara','Lokasi Tambang 2',3123.00,'2020-09-30',5309.10,'2020-09-11 05:05:40','2020-09-11 05:05:40'),(8,4,'PT Indo Muro Kencana','Penggalian','Batubara','Lokasi Tambang 1',431.00,'2020-09-30',732.70,'2020-09-13 16:59:45','2020-09-13 16:59:45');
/*!40000 ALTER TABLE `exavations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `locations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_company` int(11) NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locations`
--

LOCK TABLES `locations` WRITE;
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;
INSERT INTO `locations` VALUES (1,'Lokasi Tambang 1',2,'Mimika Baru, Papua, 99962','136.88884894068366','-4.7391188056990625','2020-07-31 16:09:08','2020-09-01 08:46:56','PT Freeport Indonesia'),(2,'Lokasi Tambang 2',2,'Kabupaten Puncak Jaya','137.73860871087547','-3.461353698259847','2020-07-31 17:35:27','2020-07-31 17:35:27','PT Freeport Indonesia'),(3,'Lokasi Tambang 3',2,'Kabupaten Jaya Wijaya','138.74400359082856','-4.319139970670166','2020-07-31 18:00:39','2020-07-31 18:00:39','PT Freeport Indonesia'),(4,'Lokasi Tambang 1',3,'Kota Bitung, Sulawesi Utara, 95524','125.19497723986385','1.443661862989148','2020-08-05 01:34:33','2020-08-05 01:34:33','PT Meares Soputan Mining'),(5,'Lokasi Tambang 1',4,'Kabupaten Murung Raya Kalimantan Tengah','114.56601625570443','-0.643416341659809','2020-08-05 01:53:51','2020-08-05 01:53:51','PT Indo Muro Kencana'),(6,'Lokasi Tambang 4',2,'92984','121.57891634296966','-2.493113121463365','2020-09-02 01:28:50','2020-09-02 01:28:50','PT Freeport Indonesia'),(7,'Lokasi Tambang 2',3,'Jakarta','107.40453037351946','-7.266562752132837','2020-09-08 02:49:17','2020-09-08 02:49:17','PT Meares Soputan Mining'),(9,'Lokasi Tambang 2',4,'0','137.76855468750003','-4.947234260071948','2020-09-13 23:03:20','2020-09-13 23:03:20','PT Indo Muro Kencana'),(10,'Lokoasi Tambang 5',2,'73554','114.56542968750001','-2.2253286268182086','2020-09-13 23:47:50','2020-09-13 23:47:50','PT Freeport Indonesia'),(11,'Lokasi Tambang 3',3,'77263','116.80664062500001','3.0127222620368963','2020-09-23 00:13:24','2020-09-23 00:13:24','PT Meares Soputan Mining');
/*!40000 ALTER TABLE `locations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mails`
--

DROP TABLE IF EXISTS `mails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mails` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_sender` int(11) NOT NULL,
  `sender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mails`
--

LOCK TABLES `mails` WRITE;
/*!40000 ALTER TABLE `mails` DISABLE KEYS */;
INSERT INTO `mails` VALUES (1,7,'Puslitbang TekMIRA','','Keterlambatan','<div>Segera mengisi data pengupasan untk bulan agustus</div><br>','not_read','2020-09-01 03:33:18','2020-09-11 06:03:44'),(2,7,'tekmira@gmail.com','freeport@gmail.com','Keterlambatan','test','not_read','2020-09-01 04:33:35','2020-09-01 04:33:35'),(3,7,'tekmira@gmail.com','v','x','<p>oi</p>','not_read','2020-09-02 01:05:06','2020-09-02 01:05:06'),(4,4,'freeport@gmail.com','freeport@gmail.com','Telah Menginput Keterlambatan','Keterlambatan telah diinput<br>','not_read','2020-09-02 01:35:50','2020-09-02 01:35:50'),(5,7,'tekmira@gmail.com','freeport@gmail.com','Keterlambatan Pengupasan','Segera input data pengupasan<br>','not_read','2020-09-07 21:04:11','2020-09-07 21:04:11'),(6,4,'freeport@gmail.com','tekmira@gmail.com','Telah menginput keterlambatan','Telah Diinput pak','Read','2020-09-07 21:12:34','2020-09-07 21:26:15'),(7,7,'tekmira@gmail.com','murokencana@gmail.com','Keterlambatan','Segara input data pengupasan<br>','Read','2020-09-07 21:22:40','2020-09-07 21:32:36'),(8,7,'tekmira@gmail.com','meares@gmail.com','Pemberitahuan','Segera input data untuk pengangkutan dibulan 10 2020<br>','not_read','2020-09-07 21:29:01','2020-09-07 21:29:01'),(9,7,'tekmira@gmail.com','freeport@gmail.com','Pemberitahuan','<br>Segara input data penggalian untuk bulan 10 tahun 2020<br>','not_read','2020-09-07 21:31:23','2020-09-07 21:31:23'),(10,7,'tekmira@gmail.com','freeport@gmail.com','Keterlambatan','<div>Silahkan input data pengupasan bulan 10 2020</div><div><br></div>','not_read','2020-09-08 02:55:01','2020-09-08 02:55:01'),(11,7,'tekmira@gmail.com','freeport@gmail.com','Keterlambatan','Segera input data pengupasan','not_read','2020-09-13 06:25:58','2020-09-13 06:25:58'),(12,7,'tekmira@gmail.com','freeport@gmail.com','asu','ahsiap','not_read','2020-09-13 06:32:18','2020-09-13 06:32:18'),(13,7,'tekmira@gmail.com','freeport@gmail.com','asu','keterlambatan','not_read','2020-09-13 06:33:09','2020-09-13 06:33:09'),(14,7,'tekmira@gmail.com','murokencana@gmail.com','Segara input produksi tambang','Kepada pt muro kencana\r\nsegara input produksi tambang untuk bulan oktober 2020','not_read','2020-09-13 17:11:24','2020-09-13 17:11:24'),(15,7,'tekmira@gmail.com','freeport@gmail.com','Kterlambatan','Segara iinput produksi untuk bulan agustus 2020','Read','2020-09-13 23:46:15','2020-09-13 23:53:43'),(16,7,'tekmira@gmail.com','meares@gmail.com','Keterlambatan','Segara input produksi tambang bulan agustus 2020','not_read','2020-09-23 00:32:59','2020-09-23 00:32:59');
/*!40000 ALTER TABLE `mails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (4,'2014_10_12_000000_create_users_table',1),(5,'2014_10_12_100000_create_password_resets_table',1),(6,'2020_06_27_090352_create_company_table',1),(13,'2020_07_13_141902_create_companies_table',2),(14,'2020_07_14_104431_create_news_table',2),(15,'2020_07_31_164518_create_loactions_migrations',3),(16,'2020_08_01_005352_add_company_to_locations',4),(18,'2020_08_01_014250_create_results_table',5),(28,'2020_08_01_034052_create_workers_table',6),(29,'2020_08_17_180500_create_price_table',6),(46,'2020_08_18_062459_create_overburdens_table',7),(47,'2020_08_18_063941_create_transpotrs_table',7),(48,'2020_08_18_064150_create_exavations_table',7),(49,'2020_08_29_032301_create_equipments_table',7),(51,'2020_08_30_122228_create_accidents_table',8),(53,'2020_09_01_080524_create_mails_table',9),(54,'2020_09_10_031842_add_lokasi_to_equipments_table',10);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'BLU tekMIRA Laksanakan Kerja Bakti Dalam Rangka Meningkatkan Kebersihan dan Kerapihan','a29c71755eec1d6404f1b051645885c7--undangan-crowns.jpg','Puslitbang TekMIRA','<div>\r\n         <p>BLU tekMIRA melaksanakan kerja bakti kembali dalam rangka \r\nmeningkatkan kebersihan dan kerapihan area/lingkungan BLU tekMIRA. Acara\r\n ini dihadiri oleh Kepala Badan Litbang ESDM, Bapak Dadan Kusdiana, dan \r\nPimpinan BLU tekMIRA, Bapak Hermansyah, serta para pejabat struktural di\r\n lingkungan Badan Litbang ESDM dan tekMIRA. Bapak Kepala Badan Litbang \r\nikut terjun langsung membersihkan area perkantoran tekMIRA dan \r\nlaboratorium, salah satunya yaitu Laboratorium Metalurgi. Beliau \r\nmembantu membersihkan bahan-bahan kimia, sampel, dan bahan lainnya yang \r\ntertimbun di belakang laboratorium Metalurgi.</p>\r\n \r\n<p>Kegiatan kerja bakti hari ini bertujuan tidak hanya membuat \r\narea/lingkungan kantor BLU tekMIRA lebih rapi, indah dan asri, tetapi \r\njuga sebagai sarana sosialisasi/pendekatan antar sesama karyawan dan \r\nkaryawati tekMIRA dengan top manajemen.</p>\r\n<p>Selain itu, hal ini juga bertujuan untuk memenuhi \r\npermintaan/keinginan/perintah Pak Menteri ESDM yang berkunjung ke \r\ntekMIRA beberapa waktu lalu dan mendapati lingkungan yang kotor di \r\nsekitar laboratorium. Maka dari itu, Pak Hermansyah selaku Pimpinan BLU \r\ntekMIRA merasa sangat perlu dilaksanakan kerja bakti ole seluruh \r\nkaryawan tekMIRA agar lahir sense of belonging mereka terhadap tekMIRA.</p>\r\n<p>Acara ini dimulai pada pukul 07.00 - 09.00 WIB.</p>      </div><br>','2020-08-05 04:39:48','2020-08-05 04:39:48');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `overburdens`
--

DROP TABLE IF EXISTS `overburdens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `overburdens` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_company` int(11) NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bcm` double(8,2) NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `biaya` double(8,2) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `overburdens`
--

LOCK TABLES `overburdens` WRITE;
/*!40000 ALTER TABLE `overburdens` DISABLE KEYS */;
INSERT INTO `overburdens` VALUES (1,2,'PT Freeport Indonesia','Pengupasan',2000.00,'Lokasi Tambang 1',4820.00,'2020-08-05','2020-08-28 22:36:27','2020-08-28 22:36:27'),(3,3,'PT Meares Soputan Mining','Pengupasan',5000.00,'Lokasi Tambang 1',12050.00,'2020-09-30','2020-09-08 02:50:15','2020-09-08 02:50:15'),(5,3,'PT Meares Soputan Mining','Pengupasan',8789.00,'Lokasi Tambang 2',21181.49,'2020-09-30','2020-09-09 22:37:30','2020-09-09 22:37:30'),(9,3,'PT Meares Soputan Mining','Pengupasan',34.00,'Lokasi Tambang 2',81.94,'2020-10-31','2020-09-10 00:26:46','2020-09-10 00:26:46'),(10,3,'PT Meares Soputan Mining','Pengupasan',421.00,'Lokasi Tambang 1',1014.61,'2020-10-31','2020-09-10 00:41:24','2020-09-10 00:41:24'),(11,2,'PT Freeport Indonesia','Pengupasan',265.00,'Lokasi Tambang 1',638.65,'2020-09-30','2020-09-11 02:25:44','2020-09-11 04:33:02'),(13,4,'PT Indo Muro Kencana','Pengupasan',2300.00,'Lokasi Tambang 1',5543.00,'2020-09-30','2020-09-13 16:58:02','2020-09-13 16:58:02'),(14,2,'PT Freeport Indonesia','Pengupasan',12.00,'Lokasi Tambang 1',28.92,'2020-10-31','2020-11-03 21:24:10','2020-11-03 21:24:10');
/*!40000 ALTER TABLE `overburdens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `price`
--

DROP TABLE IF EXISTS `price`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `price` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `price`
--

LOCK TABLES `price` WRITE;
/*!40000 ALTER TABLE `price` DISABLE KEYS */;
INSERT INTO `price` VALUES (1,'Pengangkutan','USD/ton/km',0.28,'2020-08-17 22:32:32','2020-08-17 22:32:32'),(2,'Pengupasan','USD/bcm',2.41,'2020-08-17 22:34:38','2020-08-17 22:34:38'),(7,'Penggalian','USD/ton',1.70,'2020-09-13 17:07:35','2020-09-13 17:07:35');
/*!40000 ALTER TABLE `price` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `results`
--

DROP TABLE IF EXISTS `results`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `results` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_company` int(11) NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hasil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` int(11) NOT NULL,
  `bulan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `results`
--

LOCK TABLES `results` WRITE;
/*!40000 ALTER TABLE `results` DISABLE KEYS */;
INSERT INTO `results` VALUES (1,2,'PT Freeport Indonesia','Emas','Lokasi Tambang 1',2,1,'January',2020,'2020-07-31 19:57:43','2020-07-31 19:57:43'),(2,2,'PT Freeport Indonesia','Tembaga','Lokasi Tambang 2',4,1,'January',2020,'2020-07-31 20:34:03','2020-07-31 20:34:03');
/*!40000 ALTER TABLE `results` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transpotrs`
--

DROP TABLE IF EXISTS `transpotrs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transpotrs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_company` int(11) NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` double(8,2) NOT NULL,
  `jarak` double(8,2) NOT NULL,
  `date` date NOT NULL,
  `biaya` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transpotrs`
--

LOCK TABLES `transpotrs` WRITE;
/*!40000 ALTER TABLE `transpotrs` DISABLE KEYS */;
INSERT INTO `transpotrs` VALUES (4,3,'PT Meares Soputan Mining','Pengangkutan','Lokasi Tambang 1',24.00,21.00,'2020-09-02',856.80,'2020-09-06 01:00:49','2020-09-06 01:00:49'),(6,3,'PT Meares Soputan Mining','Pengangkutan','Lokasi Tambang 2',4500.00,45.00,'2020-10-01',344250.00,'2020-09-08 02:52:02','2020-09-08 02:52:02'),(7,2,'PT Freeport Indonesia','Pengangkutan','Lokasi Tambang 1',50.00,42.00,'2020-09-30',3570.00,'2020-09-11 05:19:24','2020-09-11 05:21:27'),(8,2,'PT Freeport Indonesia','Pengangkutan','Lokasi Tambang 2',32.00,60.00,'2020-09-30',3264.00,'2020-09-11 05:20:58','2020-09-11 05:20:58'),(9,4,'PT Indo Muro Kencana','Pengangkutan','Lokasi Tambang 1',123.00,50.00,'2020-09-30',10455.00,'2020-09-13 17:01:02','2020-09-13 17:01:02');
/*!40000 ALTER TABLE `transpotrs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Bayu Fahmiaji Fadillah','bayufahmiaji1@gmail.com',NULL,NULL,'','$2y$10$P7SKeK0TVjPFhws1em3XB.1ym97Rj47Stsdl.4zbY1hcCh6Ark.1m','qT4tMeKHdRR492LgybFLdCDYm395ew3NMCUHvzhBr6rkFYDLcikxoTwhxa27','2020-07-12 21:46:18','2020-07-12 21:46:18','admin',''),(4,'PT Freeport Indonesia','freeport@gmail.com',NULL,NULL,'freeport.jpg','$2y$10$5iEpgUFpH5V9VXf0W7q11.twxunTat2YE3NaKEBkQJS67SI9lcSTK','9ltM0xCPVli7lccexg0VHWNdv0hNL1dIHyO0sr3Wlss97uy8hH88whYDSetf','2020-07-31 08:59:11','2020-07-31 08:59:11','user','2'),(5,'PT Meares Soputan Mining','meares@gmail.com',NULL,NULL,'meares.jpg','$2y$10$ZRjDxOBNj2f8v8DzbJzINeQsEig/cFrptmbml1juSE5c.C/BxqEdm','xkSO9Npb8KIhfhisezBlyKC3OKO1JVJD4bggTPAHuV54CkGQQoAmspmsiKXy','2020-08-05 00:43:21','2020-08-05 00:43:21','user','3'),(6,'PT Indo Muro Kencana','murokencana@gmail.com',NULL,NULL,'imk.jpg','$2y$10$PLGxWZ2XgADFzybodMjrv.yMxG.Kh0PT2ptYBkdVQD.X6.h9JBq5u','SveS8ODBKAQub4DbUNdF4Qj5o4haN4vM989eIwF9ZxqsGO4JJhiWqdhgvzzU','2020-08-05 00:47:58','2020-08-05 00:47:58','user','4'),(7,'Puslitbang TekMIRA','tekmira@gmail.com',NULL,NULL,NULL,'$2y$10$xmpa3wb9cmNSfrExnrCDfOY79VYrSsUU0SV/02nmxCCIJWUG5E1Qm','x2ZiVuaH4jxW0G2dcIjuN8c712BirBhh05sQTuETtMWIgUqFEMzVUHwKlCcn','2020-08-05 00:59:10','2020-08-05 00:59:10','admin','0');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `workers`
--

DROP TABLE IF EXISTS `workers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `workers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kewarganegaraan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `workers`
--

LOCK TABLES `workers` WRITE;
/*!40000 ALTER TABLE `workers` DISABLE KEYS */;
INSERT INTO `workers` VALUES (1,'2','PT Freeport Indonesia','Asep Saepullah','Bandung','konstruktor','Lokasi Tambang 1','Indonesia','Aktif','2020-08-25 21:31:09','2020-08-25 21:31:09'),(2,'2','PT Freeport Indonesia','Koasasih','Bandung','konstruktor','Lokasi Tambang 2','Indonesia','Aktif','2020-08-26 00:08:07','2020-08-26 00:08:07'),(3,'2','PT Freeport Indonesia','Bayu Fahmiaji','Bandung','konstruktor','Lokasi Tambang 1','Indonesia','Aktif','2020-08-26 00:13:50','2020-08-26 00:13:50'),(4,'2','PT Freeport Indonesia','ujang','Bandung','konstruktor','Lokasi Tambang 2','Indonesia','Aktif','2020-09-01 08:52:25','2020-09-01 08:52:25'),(5,'2','PT Freeport Indonesia','adang','Bandung','konstruktor','Lokasi Tambang 1','i','Putus Kontrak','2020-09-01 09:01:10','2020-09-13 23:49:23'),(6,'3','PT Meares Soputan Mining','Kosasih','Bandung','konstruktor','Lokasi Tambang 2','Indonesia','Putus Kontrak','2020-09-08 02:47:30','2020-09-09 21:53:46'),(7,'3','PT Meares Soputan Mining','Bayu Fahmiaji','Bandung','Manager Konstruuktor','Lokasi Tambang 1','Indonesia','Aktif','2020-09-09 21:52:44','2020-09-09 21:52:44'),(8,'4','PT Indo Muro Kencana','Acenx','Bandung','konstruktor','Lokasi Tambang 1','Indonesia','Putus Kontrak','2020-09-13 16:56:15','2020-09-13 16:56:33');
/*!40000 ALTER TABLE `workers` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-11-04 11:49:28
