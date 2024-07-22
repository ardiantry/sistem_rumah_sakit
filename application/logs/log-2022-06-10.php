<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-06-10 02:32:45 --> Severity: Warning --> mysqli::real_connect(): (HY000/1040): Too many connections /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-06-10 02:32:45 --> Unable to connect to the database
ERROR - 2022-06-10 15:43:09 --> Query error: Duplicate entry '003314-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('003314', 'MUHAMMAD ALARIC SYABANNA', 'YOGYAKARTA', '2018-04-21', 'Islam', 'POGUNG LOR RT 13 RW 48 SINDUADI, MLATI, SLEMAN', '087738024401', 'L', NULL, '37', '', '7')
ERROR - 2022-06-10 15:57:28 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `is_deleted` =0 AND `state_index` <> 3 AND `state_index` >=0 AND `jenis_peme' at line 3 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `v_register_pasien`
WHERE `id_klinik` = AND `is_deleted` =0 AND `state_index` <> 3 AND `state_index` >=0 AND `jenis_pemeriksaan` <> 'Paket Layanan' 
ERROR - 2022-06-10 15:57:28 --> Severity: error --> Exception: Call to a member function num_rows() on boolean /home/simraish/public_html/v2/system/database/DB_query_builder.php 1424
ERROR - 2022-06-10 15:57:29 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `is_deleted` =0 AND `state_index` <> 3 AND `state_index` >=0 AND `jenis_peme' at line 3 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `v_register_pasien`
WHERE `id_klinik` = AND `is_deleted` =0 AND `state_index` <> 3 AND `state_index` >=0 AND `jenis_pemeriksaan` = 'Paket Layanan' 
ERROR - 2022-06-10 15:57:29 --> Severity: error --> Exception: Call to a member function num_rows() on boolean /home/simraish/public_html/v2/system/database/DB_query_builder.php 1424
ERROR - 2022-06-10 17:03:16 --> Query error: Duplicate entry '003318-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('003318', 'TRIYONO', 'SLEMAN', '1995-05-25', 'Islam', 'SENDEN SENDANGSARI MINGGIR SLEMAN', '082225090509', 'L', NULL, '40', '', '7')
ERROR - 2022-06-10 18:40:31 --> Query error: Duplicate entry '113701-6' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('113701', 'ALMEIRA ADZKIA QURROTA AYUN', 'SLEMAN', '2016-04-14', 'Islam', 'TLOGOADI MLATI SLEMAN', '087839991495', 'P', 'O', '17', '', '6')
