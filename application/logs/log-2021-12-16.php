<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-12-16 05:03:50 --> Severity: Warning --> filesize(): stat failed for /var/cpanel/php/sessions/ea-php71/ci_session49b626d374ddcbb4bb5ccd15066ccc99d666ae75 /home/simraish/public_html/v2/system/libraries/Session/drivers/Session_files_driver.php 208
ERROR - 2021-12-16 05:03:50 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `is_deleted` =0 AND `state_index` >= -2' at line 3 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `v_register_pasien`
WHERE `jenis_pemeriksaan` = 'Paket Layanan' AND `state_index` <> 3 AND `id_klinik` = AND `is_deleted` =0 AND `state_index` >= -2
ERROR - 2021-12-16 05:03:50 --> Severity: error --> Exception: Call to a member function num_rows() on boolean /home/simraish/public_html/v2/system/database/DB_query_builder.php 1424
ERROR - 2021-12-16 05:04:46 --> Severity: Warning --> mysqli::real_connect(): (08004/1040): Too many connections /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2021-12-16 05:04:46 --> Unable to connect to the database
ERROR - 2021-12-16 05:05:26 --> Severity: error --> Exception: Call to a member function real_escape_string() on boolean /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 391
ERROR - 2021-12-16 05:11:45 --> Query error: Duplicate entry '25' for key 'pasien.no_rm' - Invalid query: UPDATE `pasien` SET `no_rm` = NULL, `is_deleted` = 1, `modified_by` = '155'
WHERE `id` = '17245'
ERROR - 2021-12-16 05:46:30 --> 404 Page Not Found: Assets/img
ERROR - 2021-12-16 05:47:00 --> 404 Page Not Found: Assets/img
ERROR - 2021-12-16 08:04:49 --> Severity: Warning --> mysqli::real_connect(): (HY000/1040): Too many connections /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2021-12-16 08:04:49 --> Unable to connect to the database
ERROR - 2021-12-16 08:04:54 --> Severity: Warning --> mysqli::real_connect(): (08004/1040): Too many connections /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2021-12-16 08:04:54 --> Unable to connect to the database
ERROR - 2021-12-16 08:04:55 --> Severity: Warning --> mysqli::real_connect(): (HY000/1040): Too many connections /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2021-12-16 08:04:55 --> Unable to connect to the database
ERROR - 2021-12-16 08:04:58 --> Severity: error --> Exception: Call to a member function real_escape_string() on boolean /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 391
ERROR - 2021-12-16 08:05:39 --> Severity: error --> Exception: Call to a member function real_escape_string() on boolean /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 391
ERROR - 2021-12-16 08:05:39 --> Severity: error --> Exception: Call to a member function real_escape_string() on boolean /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 391
ERROR - 2021-12-16 08:05:50 --> Severity: Warning --> mysqli::real_connect(): (HY000/1040): Too many connections /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2021-12-16 08:05:50 --> Unable to connect to the database
ERROR - 2021-12-16 08:05:50 --> Severity: Warning --> mysqli::real_connect(): (HY000/1040): Too many connections /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2021-12-16 08:05:51 --> Unable to connect to the database
ERROR - 2021-12-16 08:05:51 --> Severity: Warning --> mysqli::real_connect(): (HY000/1040): Too many connections /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2021-12-16 08:05:51 --> Unable to connect to the database
ERROR - 2021-12-16 08:05:51 --> Severity: Warning --> mysqli::real_connect(): (HY000/1040): Too many connections /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2021-12-16 08:05:51 --> Unable to connect to the database
ERROR - 2021-12-16 08:05:51 --> Severity: Warning --> mysqli::real_connect(): (HY000/1040): Too many connections /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2021-12-16 08:05:51 --> Unable to connect to the database
ERROR - 2021-12-16 08:06:16 --> Severity: Warning --> mysqli::real_connect(): (HY000/1040): Too many connections /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2021-12-16 08:06:16 --> Unable to connect to the database
ERROR - 2021-12-16 08:06:16 --> Severity: error --> Exception: Call to a member function real_escape_string() on boolean /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 391
ERROR - 2021-12-16 08:10:12 --> Severity: Warning --> mysqli::real_connect(): (HY000/1040): Too many connections /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2021-12-16 08:10:12 --> Unable to connect to the database
ERROR - 2021-12-16 08:10:25 --> Severity: error --> Exception: Call to a member function real_escape_string() on boolean /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 391
ERROR - 2021-12-16 09:32:00 --> Query error: Duplicate entry '001642-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('001642', 'TITIE RACHMIATI POETRI', 'MEDAN', '1993-07-08', 'Islam', 'JALAN KEMIRI III NO.29 MEDAN', '081327005613', 'P', 'AB', '40', '', '7')
ERROR - 2021-12-16 10:01:08 --> Query error: Duplicate entry '001643-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('001643', 'MAYANG VIORITA OKTAVIANI', 'MAGETAN', '1991-10-07', 'Islam', 'BANGUNTAPAN, BANTUL', '082132555625', 'P', 'B', '37', '', '7')
ERROR - 2021-12-16 10:09:19 --> 404 Page Not Found: Assets/img
ERROR - 2021-12-16 10:19:07 --> Query error: Duplicate entry '001645-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('001645', 'SINGGIH NUR ADIANTORO', 'SLEMAN', '2000-05-05', 'Islam', 'SOMOKATON, MARGOKATON, SEYEGAN, SLEMAN, YOGYAKARTA', '085742622381', 'L', 'O', '37', '', '7')
ERROR - 2021-12-16 10:45:10 --> 404 Page Not Found: Assets/img
ERROR - 2021-12-16 10:56:22 --> 404 Page Not Found: Assets/img
ERROR - 2021-12-16 11:07:53 --> 404 Page Not Found: Assets/img
ERROR - 2021-12-16 11:24:29 --> Query error: Duplicate entry '001648-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('001648', 'NAZLA EKA AMELYA', 'JAKARTA', '2001-05-08', 'Islam', 'KOS PATRAN, KUTU PATRAN', '089638786341', 'P', 'B', '64', '', '7')
ERROR - 2021-12-16 11:27:45 --> 404 Page Not Found: Assets/img
ERROR - 2021-12-16 11:40:29 --> Query error: Duplicate entry '001649-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('001649', 'SVASTIKA DEVI AMELINDA', 'TEMANGGUNG', '1997-01-29', 'Budha', 'JALAN RUSUNAWA MRANGGEN, MLATI, SLEMAN', '085601408741', 'P', 'B', '64', '', '7')
ERROR - 2021-12-16 11:52:41 --> 404 Page Not Found: Assets/img
ERROR - 2021-12-16 11:58:02 --> 404 Page Not Found: Assets/img
ERROR - 2021-12-16 12:13:31 --> 404 Page Not Found: Assets/img
ERROR - 2021-12-16 12:18:34 --> 404 Page Not Found: Assets/img
ERROR - 2021-12-16 12:35:14 --> 404 Page Not Found: Assets/img
ERROR - 2021-12-16 12:38:34 --> 404 Page Not Found: Assets/img
ERROR - 2021-12-16 12:43:39 --> 404 Page Not Found: Assets/img
ERROR - 2021-12-16 12:56:38 --> 404 Page Not Found: Assets/img
