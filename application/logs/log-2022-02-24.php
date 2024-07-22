<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-02-24 05:35:20 --> 404 Page Not Found: Wp-loginphp/index
ERROR - 2022-02-24 11:39:48 --> 404 Page Not Found: Faviconpng/index
ERROR - 2022-02-24 17:22:23 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `is_deleted` =0 AND `state_index` >= 2' at line 3 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `v_register_pasien`
WHERE `jenis_pemeriksaan` <> 'Paket Layanan' AND `state_index` <> 3 AND `id_klinik` = AND `is_deleted` =0 AND `state_index` >= 2
ERROR - 2022-02-24 17:22:23 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `is_deleted` =0 AND `state_index` >= 2' at line 3 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `v_register_pasien`
WHERE `jenis_pemeriksaan` = 'Paket Layanan' AND `state_index` <> 3 AND `id_klinik` = AND `is_deleted` =0 AND `state_index` >= 2
ERROR - 2022-02-24 17:22:23 --> Severity: error --> Exception: Call to a member function num_rows() on boolean /home/simraish/public_html/v2/system/database/DB_query_builder.php 1424
ERROR - 2022-02-24 17:22:23 --> Severity: error --> Exception: Call to a member function num_rows() on boolean /home/simraish/public_html/v2/system/database/DB_query_builder.php 1424
ERROR - 2022-02-24 18:02:12 --> Query error: Duplicate entry '113118-6' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('113118', 'ARI SUKARDI', 'KLATEN', '1987-03-12', 'Islam', 'MOJO DUWUR BETENG JATINOM KLATEN', '08114223764', 'L', NULL, '30', '', '6')
ERROR - 2022-02-24 19:33:29 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `is_deleted` =0 AND `state_index` >= 1' at line 3 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `v_register_pasien`
WHERE `jenis_pemeriksaan` <> 'Paket Layanan' AND `state_index` <> 3 AND `id_klinik` = AND `is_deleted` =0 AND `state_index` >= 1
ERROR - 2022-02-24 19:33:29 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `is_deleted` =0 AND `state_index` >= 1' at line 3 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `v_register_pasien`
WHERE `jenis_pemeriksaan` = 'Paket Layanan' AND `state_index` <> 3 AND `id_klinik` = AND `is_deleted` =0 AND `state_index` >= 1
ERROR - 2022-02-24 19:33:29 --> Severity: error --> Exception: Call to a member function num_rows() on boolean /home/simraish/public_html/v2/system/database/DB_query_builder.php 1424
ERROR - 2022-02-24 19:33:29 --> Severity: error --> Exception: Call to a member function num_rows() on boolean /home/simraish/public_html/v2/system/database/DB_query_builder.php 1424
