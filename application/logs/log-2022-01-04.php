<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-01-04 14:25:08 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): No such file or directory /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-01-04 14:25:08 --> Unable to connect to the database
ERROR - 2022-01-04 14:25:08 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): No such file or directory /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-01-04 14:25:08 --> Unable to connect to the database
ERROR - 2022-01-04 14:25:33 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): No such file or directory /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-01-04 14:25:33 --> Unable to connect to the database
ERROR - 2022-01-04 14:25:33 --> Severity: error --> Exception: Call to a member function real_escape_string() on boolean /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 391
ERROR - 2022-01-04 14:25:41 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): No such file or directory /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-01-04 14:25:41 --> Unable to connect to the database
ERROR - 2022-01-04 14:25:41 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): No such file or directory /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-01-04 14:25:41 --> Unable to connect to the database
ERROR - 2022-01-04 14:25:59 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): No such file or directory /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-01-04 14:25:59 --> Unable to connect to the database
ERROR - 2022-01-04 14:25:59 --> Severity: error --> Exception: Call to a member function real_escape_string() on boolean /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 391
ERROR - 2022-01-04 14:26:09 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): No such file or directory /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-01-04 14:26:09 --> Unable to connect to the database
ERROR - 2022-01-04 14:26:09 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): No such file or directory /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-01-04 14:26:09 --> Unable to connect to the database
ERROR - 2022-01-04 16:50:02 --> Query error: Duplicate entry '001778-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('001778', 'NIDA TOBING', 'JAKARTA', '1993-07-10', 'Islam', 'REJODANI', '082160210144', 'P', 'O', '40', '', '7')
ERROR - 2022-01-04 16:50:03 --> Query error: Duplicate entry '001778-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('001778', 'NIDA TOBING', 'JAKARTA', '1993-07-10', 'Islam', 'REJODANI', '082160210144', 'P', 'O', '40', '', '7')
ERROR - 2022-01-04 16:58:28 --> Query error: Duplicate entry '001779-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('001779', 'PRASETYA HANIF AUGUSTINA', 'BOJONEGORO', '2001-08-11', 'Islam', 'ASRAMA TARUNA BUMI STPN YOGYAKARTA', '085158031181', 'P', 'AB', '64', '', '7')
ERROR - 2022-01-04 17:10:16 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `is_deleted` =0 AND `state_index` >=0' at line 3 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `v_register_pasien`
WHERE `jenis_pemeriksaan` = 'Paket Layanan' AND `state_index` <> 3 AND `id_klinik` = AND `is_deleted` =0 AND `state_index` >=0
ERROR - 2022-01-04 17:10:16 --> Severity: error --> Exception: Call to a member function num_rows() on boolean /home/simraish/public_html/v2/system/database/DB_query_builder.php 1424
ERROR - 2022-01-04 17:10:16 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `is_deleted` =0 AND `state_index` >=0' at line 3 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `v_register_pasien`
WHERE `jenis_pemeriksaan` <> 'Paket Layanan' AND `state_index` <> 3 AND `id_klinik` = AND `is_deleted` =0 AND `state_index` >=0
ERROR - 2022-01-04 17:10:16 --> Severity: error --> Exception: Call to a member function num_rows() on boolean /home/simraish/public_html/v2/system/database/DB_query_builder.php 1424
ERROR - 2022-01-04 17:11:10 --> 404 Page Not Found: Assets/img
ERROR - 2022-01-04 17:15:05 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `is_deleted` =0 AND `state_index` >=0' at line 3 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `v_register_pasien`
WHERE `jenis_pemeriksaan` = 'Paket Layanan' AND `state_index` <> 3 AND `id_klinik` = AND `is_deleted` =0 AND `state_index` >=0
ERROR - 2022-01-04 17:15:05 --> Severity: error --> Exception: Call to a member function num_rows() on boolean /home/simraish/public_html/v2/system/database/DB_query_builder.php 1424
ERROR - 2022-01-04 17:15:05 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `is_deleted` =0 AND `state_index` >=0' at line 3 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `v_register_pasien`
WHERE `jenis_pemeriksaan` <> 'Paket Layanan' AND `state_index` <> 3 AND `id_klinik` = AND `is_deleted` =0 AND `state_index` >=0
ERROR - 2022-01-04 17:15:05 --> Severity: error --> Exception: Call to a member function num_rows() on boolean /home/simraish/public_html/v2/system/database/DB_query_builder.php 1424
ERROR - 2022-01-04 17:15:20 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `is_deleted` =0 AND `state_index` >=0' at line 3 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `v_register_pasien`
WHERE `jenis_pemeriksaan` <> 'Paket Layanan' AND `state_index` <> 3 AND `id_klinik` = AND `is_deleted` =0 AND `state_index` >=0
ERROR - 2022-01-04 17:15:20 --> Severity: error --> Exception: Call to a member function num_rows() on boolean /home/simraish/public_html/v2/system/database/DB_query_builder.php 1424
ERROR - 2022-01-04 17:15:20 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `is_deleted` =0 AND `state_index` >=0' at line 3 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `v_register_pasien`
WHERE `jenis_pemeriksaan` = 'Paket Layanan' AND `state_index` <> 3 AND `id_klinik` = AND `is_deleted` =0 AND `state_index` >=0
ERROR - 2022-01-04 17:15:20 --> Severity: error --> Exception: Call to a member function num_rows() on boolean /home/simraish/public_html/v2/system/database/DB_query_builder.php 1424
ERROR - 2022-01-04 17:16:31 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `is_deleted` =0 AND `state_index` >=0' at line 3 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `v_register_pasien`
WHERE `jenis_pemeriksaan` <> 'Paket Layanan' AND `state_index` <> 3 AND `id_klinik` = AND `is_deleted` =0 AND `state_index` >=0
ERROR - 2022-01-04 17:16:31 --> Severity: error --> Exception: Call to a member function num_rows() on boolean /home/simraish/public_html/v2/system/database/DB_query_builder.php 1424
ERROR - 2022-01-04 17:16:31 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `is_deleted` =0 AND `state_index` >=0' at line 3 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `v_register_pasien`
WHERE `jenis_pemeriksaan` = 'Paket Layanan' AND `state_index` <> 3 AND `id_klinik` = AND `is_deleted` =0 AND `state_index` >=0
ERROR - 2022-01-04 17:16:31 --> Severity: error --> Exception: Call to a member function num_rows() on boolean /home/simraish/public_html/v2/system/database/DB_query_builder.php 1424
ERROR - 2022-01-04 17:17:23 --> 404 Page Not Found: Assets/img
ERROR - 2022-01-04 17:20:58 --> 404 Page Not Found: Assets/img
ERROR - 2022-01-04 17:24:14 --> Query error: Duplicate entry '001781-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('001781', 'ZEFAKA UWAYS KENZAABIT', 'YOGYAKARTA', '2021-09-20', 'Islam', 'JALAN JANTI BUANA ASRI 4 NO.A7 BANGUNTAPAN, BANTUL', '081226605126', 'L', 'O', '37', '', '7')
ERROR - 2022-01-04 17:26:38 --> 404 Page Not Found: Assets/img
ERROR - 2022-01-04 17:31:54 --> Query error: Duplicate entry '001782-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('001782', 'BADRA ZULFIKAR DANIARIGA', 'YOGYAKARTA', '2018-05-15', 'Islam', 'JALAN SURIREJO 002/021 SUKOHARJO, NGAGLIK, SLEMAN', '082132648825', 'L', 'B', '37', '', '7')
ERROR - 2022-01-04 17:38:51 --> Query error: Duplicate entry '001783-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('001783', 'DAVYAN AURELLIO PUTRA D.S', 'YOGYAKARTA', '2018-09-12', 'Kristen ', 'SAMBILEGI LOR, SAMBILEGI BARU NO.105', '081277540012', 'L', 'O', '37', '', '7')
ERROR - 2022-01-04 17:41:51 --> Query error: Duplicate entry '001784-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('001784', 'DINAR QUEENENZA AURORA', 'SLEMAN', '2018-12-28', 'Islam', 'SALAM, MAGELANG', '085865970673', 'P', 'B', '37', '', '7')
ERROR - 2022-01-04 17:43:39 --> Query error: Duplicate entry '001785-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('001785', 'YOGIE ADAM I.P', 'NGANJUK', '1996-12-16', 'Islam', 'BANGUNTAPAN, BANTUL', '081226605126', 'L', 'O', '40', '', '7')
ERROR - 2022-01-04 17:45:04 --> Query error: Duplicate entry '001786-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('001786', 'ALGAIL GRAZELDA G', 'NGANJUK', '1997-01-12', 'Islam', 'BANGUNTAPAN, BANTUL', '081554226686', 'P', 'B', '37', '', '7')
ERROR - 2022-01-04 17:47:11 --> 404 Page Not Found: Assets/img
ERROR - 2022-01-04 17:50:32 --> 404 Page Not Found: Assets/img
ERROR - 2022-01-04 17:50:56 --> 404 Page Not Found: Assets/img
ERROR - 2022-01-04 17:51:15 --> 404 Page Not Found: Assets/img
ERROR - 2022-01-04 18:02:28 --> Query error: Duplicate entry '001788-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('001788', 'ADY PUTRA KURNIAWAN', 'SLEMAN', '1989-07-16', 'Islam', 'TIRTOMARTANI, KALASAN, SLEMAN', '087738995805', 'L', 'B', '40', '', '7')
ERROR - 2022-01-04 18:02:28 --> Query error: Duplicate entry '001788-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('001788', 'ADY PUTRA KURNIAWAN', 'SLEMAN', '1989-07-16', 'Islam', 'TIRTOMARTANI, KALASAN, SLEMAN', '087738995805', 'L', 'B', '40', '', '7')
ERROR - 2022-01-04 18:03:55 --> 404 Page Not Found: Assets/img
ERROR - 2022-01-04 18:09:48 --> 404 Page Not Found: Assets/img
ERROR - 2022-01-04 18:11:28 --> 404 Page Not Found: Assets/img
ERROR - 2022-01-04 18:24:46 --> 404 Page Not Found: Assets/img
ERROR - 2022-01-04 18:25:04 --> 404 Page Not Found: Assets/img
ERROR - 2022-01-04 19:00:39 --> Severity: Warning --> Invalid argument supplied for foreach() /home/simraish/public_html/v2/application/controllers/TransaksiLain.php 101
ERROR - 2022-01-04 19:06:21 --> Query error: Duplicate entry '001790-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('001790', 'LILIK MONAWATI', 'MAGELANG', '1964-09-04', 'Islam', 'JOMBORAN, SIDOARUM, SLEMAN', '081227666093', 'P', 'O', '38', '', '7')
ERROR - 2022-01-04 19:22:26 --> 404 Page Not Found: Assets/img
ERROR - 2022-01-04 19:25:08 --> Query error: Duplicate entry '001791-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('001791', 'ROBITH MUSOFFA FIKRI', 'SLEMAN', '2018-01-11', 'Islam', 'SAWAHAN 007/030 NOGOTIRTO, GAMPING, SLEMAN', '081225713160', 'L', 'B', '37', '', '7')
ERROR - 2022-01-04 19:27:00 --> 404 Page Not Found: Assets/img
ERROR - 2022-01-04 19:33:07 --> 404 Page Not Found: Assets/img
ERROR - 2022-01-04 19:45:32 --> 404 Page Not Found: Assets/img
ERROR - 2022-01-04 19:49:44 --> Query error: Duplicate entry '001793-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('001793', 'BRYAN PUTRA DWI RAMADHAN', 'SLEMAN', '2021-04-13', 'Islam', 'BLUMBANG, MERDIKOREJO, TEMPEL, SLEMAN', '089637093517', 'L', 'B', '37', '', '7')
ERROR - 2022-01-04 19:51:26 --> Query error: Duplicate entry '001794-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('001794', 'AHMAD SYAHPUTRA', 'PALANGKA RAYA', '2001-08-09', 'Islam', 'JALAN PILAU NO. 45', '082256334043', 'L', NULL, '64', '', '7')
ERROR - 2022-01-04 19:55:12 --> 404 Page Not Found: Assets/img
ERROR - 2022-01-04 19:58:27 --> 404 Page Not Found: Assets/img
ERROR - 2022-01-04 20:06:40 --> Query error: Duplicate entry '001795-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('001795', 'SUSIYANTO', 'SLEMAN', '1989-01-24', 'Islam', 'BLUMBANG 002/001 MERDIKOREJO', '089637092517', 'L', 'A', '41', '', '7')
ERROR - 2022-01-04 20:08:38 --> 404 Page Not Found: Assets/img
ERROR - 2022-01-04 20:11:31 --> 404 Page Not Found: Assets/img
ERROR - 2022-01-04 20:11:49 --> 404 Page Not Found: Assets/img
