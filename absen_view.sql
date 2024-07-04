# ************************************************************
# Sequel Ace SQL dump
# Version 20064
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: localhost (MySQL 8.3.0)
# Database: sisterm_karyawan
# Generation Time: 2024-06-27 13:52:08 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;






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
