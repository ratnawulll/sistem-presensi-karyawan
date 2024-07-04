# ************************************************************
# Sequel Ace SQL dump
# Version 20064
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: localhost (MySQL 8.3.0)
# Database: sisterm_karyawan
# Generation Time: 2024-06-27 15:53:00 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table cuti
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cuti`;

CREATE TABLE `cuti` (
  `id_cuti` int NOT NULL AUTO_INCREMENT,
  `id_Karyawan` int NOT NULL,
  `mulai_cuti` date NOT NULL,
  `selesai_cuti` date NOT NULL,
  `jenis_cuti` varchar(30) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_cuti`),
  KEY `id_Karyawan` (`id_Karyawan`),
  CONSTRAINT `cuti_ibfk_1` FOREIGN KEY (`id_Karyawan`) REFERENCES `karyawan` (`id_Karyawan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table failed_jobs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table karyawan
# ------------------------------------------------------------

DROP TABLE IF EXISTS `karyawan`;

CREATE TABLE `karyawan` (
  `id_Karyawan` int NOT NULL AUTO_INCREMENT,
  `nik` int NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `status` varchar(15) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `user_id` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_Karyawan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `karyawan` WRITE;
/*!40000 ALTER TABLE `karyawan` DISABLE KEYS */;

INSERT INTO `karyawan` (`id_Karyawan`, `nik`, `nama`, `alamat`, `status`, `jenis_kelamin`, `no_telp`, `user_id`, `created_at`, `updated_at`)
VALUES
	(1,123456,'Ratna','Godean, Yogyakarta','Aktif','P','089123456789',11,NULL,NULL),
	(5,213123456,'test123','qweqweq','Aktif','L','082323232',17,'2024-06-27 08:19:15','2024-06-27 08:34:53');

/*!40000 ALTER TABLE `karyawan` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table karyawan_peraturan
# ------------------------------------------------------------

DROP TABLE IF EXISTS `karyawan_peraturan`;

CREATE TABLE `karyawan_peraturan` (
  `karyawan_id_Karyawan` bigint unsigned NOT NULL,
  `peraturan_id_Peraturan` int unsigned NOT NULL,
  PRIMARY KEY (`karyawan_id_Karyawan`,`peraturan_id_Peraturan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `karyawan_peraturan` WRITE;
/*!40000 ALTER TABLE `karyawan_peraturan` DISABLE KEYS */;

INSERT INTO `karyawan_peraturan` (`karyawan_id_Karyawan`, `peraturan_id_Peraturan`)
VALUES
	(5,6);

/*!40000 ALTER TABLE `karyawan_peraturan` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2014_10_12_000000_create_users_table',1),
	(2,'2014_10_12_100000_create_password_resets_table',1),
	(3,'2019_08_19_000000_create_failed_jobs_table',1),
	(4,'2019_12_14_000001_create_personal_access_tokens_table',1),
	(5,'2024_06_27_022832_roles_table',2),
	(6,'2024_06_27_022844_role_user_table',3),
	(7,'2024_06_27_023111_add_user_id_to_karyawan_table',3),
	(8,'2024_06_27_023706_peraturan_table',4),
	(9,'2024_06_27_024237_karyawan_jadwal_table',5),
	(10,'2024_06_27_030613_permissions_table',5),
	(11,'2024_06_27_030658_permission_role_table',6),
	(12,'2024_06_27_081231_add_timestamps_on_karyawan_table',7),
	(13,'2024_06_27_090950_add_timestamps_on_presensi_table',8),
	(14,'2024_06_27_092809_add_timestamps_on_cuti_table',9);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table peraturan
# ------------------------------------------------------------

DROP TABLE IF EXISTS `peraturan`;

CREATE TABLE `peraturan` (
  `id_Peraturan` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_masuk` time NOT NULL,
  `batas_jam_masuk` time NOT NULL,
  `jam_pulang` time NOT NULL,
  `batas_jam_pulang` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_Peraturan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `peraturan` WRITE;
/*!40000 ALTER TABLE `peraturan` DISABLE KEYS */;

INSERT INTO `peraturan` (`id_Peraturan`, `nama`, `description`, `jam_masuk`, `batas_jam_masuk`, `jam_pulang`, `batas_jam_pulang`, `created_at`, `updated_at`)
VALUES
	(3,'malam','','20:00:00','20:00:00','03:00:00','03:05:00','2024-06-27 13:31:10','2024-06-27 13:31:10'),
	(6,'shift 1','pagi','08:00:00','08:05:00','16:00:00','16:00:00','2024-06-27 14:06:01','2024-06-27 14:06:14');

/*!40000 ALTER TABLE `peraturan` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table permission_role
# ------------------------------------------------------------

DROP TABLE IF EXISTS `permission_role`;

CREATE TABLE `permission_role` (
  `permission_id` int unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;

INSERT INTO `permission_role` (`permission_id`, `role_id`)
VALUES
	(7,1),
	(8,1),
	(8,2);

/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table permissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`)
VALUES
	(7,'data-cuti','Akses data cuti','Mengakses data cuti','2024-06-27 04:02:54','2024-06-27 04:02:54'),
	(8,'data-karyawan','Akses data karyawan','Mengakses data karyawan','2024-06-27 04:02:54','2024-06-27 04:02:54');

/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table personal_access_tokens
# ------------------------------------------------------------

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table presensi
# ------------------------------------------------------------

DROP TABLE IF EXISTS `presensi`;

CREATE TABLE `presensi` (
  `id_Presensi` int NOT NULL AUTO_INCREMENT,
  `id_Karyawan` int NOT NULL,
  `tanggal` date NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_Presensi`),
  KEY `id_Karyawan` (`id_Karyawan`),
  CONSTRAINT `presensi_ibfk_1` FOREIGN KEY (`id_Karyawan`) REFERENCES `karyawan` (`id_Karyawan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `presensi` WRITE;
/*!40000 ALTER TABLE `presensi` DISABLE KEYS */;

INSERT INTO `presensi` (`id_Presensi`, `id_Karyawan`, `tanggal`, `jam_masuk`, `jam_keluar`, `created_at`, `updated_at`)
VALUES
	(5,5,'2024-06-27','21:07:00','21:08:00','2024-06-27 14:07:46','2024-06-27 14:08:19');

/*!40000 ALTER TABLE `presensi` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table role_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `role_user`;

CREATE TABLE `role_user` (
  `user_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;

INSERT INTO `role_user` (`user_id`, `role_id`)
VALUES
	(11,2);

/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`)
VALUES
	(1,'admin','2024-06-27 04:02:54','2024-06-27 04:02:54'),
	(2,'hrd','2024-06-27 04:02:54','2024-06-27 04:02:54');

/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `username`, `password`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(11,'hrd','hrd@gmail.com',NULL,'hrd','$2y$10$HHc.4g9e5l/NGGi0Coy4h.TslwdEN2695C1u6hHQ6vQYW.ZJw9b5a',NULL,'2024-06-27 04:02:54','2024-06-27 04:02:54'),
	(17,'test123','test@gmail.com',NULL,'test123','$2y$10$JF.X.iSD0PJNaLaJnnK9ru/Wnltl8tyLBdbFYbFqpvlBr4YalHcrq',NULL,'2024-06-27 08:19:15','2024-06-27 14:06:44'),
	(18,'test13','test13@gmail.com',NULL,'test13','$2y$10$d7EB2FcAfVIR2QAcihN5Nu1J4sfvVKuw5p1LzbTdx976FsiqmeDze',NULL,'2024-06-27 08:45:19','2024-06-27 08:45:19'),
	(19,'Admin User','admin@gmail.com',NULL,'admin','$2y$10$Ql9wCnS/cs7F.LzkcUB4I.x/lHe8bKDnAlj.D4UnS19u8FcMmArq2',NULL,'2024-06-27 14:30:49','2024-06-27 14:30:49');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;






# Dump of view vpresensikaryawan
# ------------------------------------------------------------

DROP TABLE IF EXISTS `vpresensikaryawan`; DROP VIEW IF EXISTS `vpresensikaryawan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `vpresensikaryawan`
AS SELECT
   `karyawan`.`id_Karyawan` AS `id_Karyawan`,
   `karyawan`.`nama` AS `nama`,
   `karyawan`.`jenis_kelamin` AS `jenis_kelamin`,
   `karyawan`.`status` AS `status`,
   `presensi`.`id_Presensi` AS `id_Presensi`,
   `presensi`.`tanggal` AS `tanggal`,
   `presensi`.`jam_masuk` AS `jam_masuk`,
   `presensi`.`jam_keluar` AS `jam_keluar`
FROM (`karyawan` join `presensi` on((`karyawan`.`id_Karyawan` = `presensi`.`id_Karyawan`)));

# Dump of view vcutikaryawan
# ------------------------------------------------------------

DROP TABLE IF EXISTS `vcutikaryawan`; DROP VIEW IF EXISTS `vcutikaryawan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `vcutikaryawan`
AS SELECT
   `karyawan`.`id_Karyawan` AS `id_Karyawan`,
   `karyawan`.`nama` AS `nama`,
   `karyawan`.`jenis_kelamin` AS `jenis_kelamin`,
   `karyawan`.`status` AS `status`,
   `cuti`.`id_cuti` AS `id_cuti`,
   `cuti`.`jenis_cuti` AS `jenis_cuti`,
   `cuti`.`mulai_cuti` AS `mulai_cuti`,
   `cuti`.`selesai_cuti` AS `selesai_cuti`
FROM (`karyawan` join `cuti` on((`karyawan`.`id_Karyawan` = `cuti`.`id_Karyawan`)));


/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
