<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-06-06 15:32:03 --> Query error: Duplicate entry '113659-6' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('113659', 'FATIMAH SARA', 'SURAKARTA', '1997-06-25', 'Islam', 'JL. KALISAMADANG PASAR KLIWIN SURAKARTA', '081227605013', 'P', 'B', '23', '', '6')
ERROR - 2022-06-06 16:43:32 --> 404 Page Not Found: Apple-touch-icon-precomposedpng/index
ERROR - 2022-06-06 16:43:32 --> 404 Page Not Found: Apple-touch-iconpng/index
ERROR - 2022-06-06 19:23:24 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `is_deleted` =0 AND `state_index` <> 3 AND `state_index` >=0 AND `jenis_peme' at line 3 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `v_register_pasien`
WHERE `id_klinik` = AND `is_deleted` =0 AND `state_index` <> 3 AND `state_index` >=0 AND `jenis_pemeriksaan` = 'Paket Layanan' 
ERROR - 2022-06-06 19:23:24 --> Severity: error --> Exception: Call to a member function num_rows() on boolean /home/simraish/public_html/v2/system/database/DB_query_builder.php 1424
ERROR - 2022-06-06 19:23:24 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `is_deleted` =0 AND `state_index` <> 3 AND `state_index` >=0 AND `jenis_peme' at line 3 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `v_register_pasien`
WHERE `id_klinik` = AND `is_deleted` =0 AND `state_index` <> 3 AND `state_index` >=0 AND `jenis_pemeriksaan` <> 'Paket Layanan' 
ERROR - 2022-06-06 19:23:24 --> Severity: error --> Exception: Call to a member function num_rows() on boolean /home/simraish/public_html/v2/system/database/DB_query_builder.php 1424
ERROR - 2022-06-06 22:11:10 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `is_deleted` =0 AND `state_index` <> 3 AND `state_index` >= AND `jenis_pemer' at line 3 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `v_register_pasien`
WHERE `id_klinik` = AND `is_deleted` =0 AND `state_index` <> 3 AND `state_index` >= AND `jenis_pemeriksaan` = 'Paket Layanan' 
ERROR - 2022-06-06 22:11:10 --> Severity: error --> Exception: Call to a member function num_rows() on boolean /home/simraish/public_html/v2/system/database/DB_query_builder.php 1424
ERROR - 2022-06-06 22:15:17 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `is_deleted` =0 AND `state_index` <> 3 AND `state_index` >= AND `jenis_pemer' at line 3 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `v_register_pasien`
WHERE `id_klinik` = AND `is_deleted` =0 AND `state_index` <> 3 AND `state_index` >= AND `jenis_pemeriksaan` <> 'Paket Layanan' 
ERROR - 2022-06-06 22:15:17 --> Severity: error --> Exception: Call to a member function num_rows() on boolean /home/simraish/public_html/v2/system/database/DB_query_builder.php 1424
