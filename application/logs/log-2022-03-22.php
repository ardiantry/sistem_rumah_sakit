<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-03-22 15:43:59 --> Query error: Duplicate entry '000070-23' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('000070', 'RINI BUDI ASTUTI', 'SURAKARTA', '1994-05-07', NULL, 'DUKUHAN NAYU 01/01, SURAKARTA', '08572520346', 'P', NULL, NULL, '', '23')
ERROR - 2022-03-22 17:27:04 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `is_deleted` =0 AND `state_index` >=0' at line 3 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `v_register_pasien`
WHERE `jenis_pemeriksaan` = 'Paket Layanan' AND `state_index` <> 3 AND `id_klinik` = AND `is_deleted` =0 AND `state_index` >=0
ERROR - 2022-03-22 17:27:04 --> Severity: error --> Exception: Call to a member function num_rows() on boolean /home/simraish/public_html/v2/system/database/DB_query_builder.php 1424
ERROR - 2022-03-22 17:27:05 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `is_deleted` =0 AND `state_index` >=0' at line 3 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `v_register_pasien`
WHERE `jenis_pemeriksaan` <> 'Paket Layanan' AND `state_index` <> 3 AND `id_klinik` = AND `is_deleted` =0 AND `state_index` >=0
ERROR - 2022-03-22 17:27:05 --> Severity: error --> Exception: Call to a member function num_rows() on boolean /home/simraish/public_html/v2/system/database/DB_query_builder.php 1424
ERROR - 2022-03-22 17:45:11 --> Query error: Duplicate entry '002636-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('002636', 'NADILA KHOIRUNNISA', 'JAKARTA', '2001-03-11', 'Islam', 'KARANGMALANG B2 CATURTUNGGAL, DEPOK, SLEMAN', '083181793630', 'P', NULL, '64', '', '7')
ERROR - 2022-03-22 17:45:15 --> Query error: Duplicate entry '002636-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('002636', 'NADILA KHOIRUNNISA', 'JAKARTA', '2001-03-11', 'Islam', 'KARANGMALANG B2 CATURTUNGGAL, DEPOK, SLEMAN', '083181793630', 'P', NULL, '64', '', '7')
ERROR - 2022-03-22 21:00:49 --> 404 Page Not Found: Robotstxt/index
