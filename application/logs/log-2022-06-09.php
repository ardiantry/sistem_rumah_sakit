<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-06-09 10:09:50 --> Query error: Duplicate entry '000140-25' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('000140', 'Kamila', 'Tangerang', '2012-10-05', 'Islam', 'Gardenia', '', 'P', NULL, NULL, '', '25')
ERROR - 2022-06-09 10:09:52 --> Query error: Duplicate entry '000140-25' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('000140', 'Kamila', 'Tangerang', '2012-10-05', 'Islam', 'Gardenia', '', 'P', NULL, NULL, '', '25')
ERROR - 2022-06-09 19:35:50 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `is_deleted` =0 AND `state_index` <> 3 AND `state_index` >= 2 AND `jenis_pem' at line 3 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `v_register_pasien`
WHERE `id_klinik` = AND `is_deleted` =0 AND `state_index` <> 3 AND `state_index` >= 2 AND `jenis_pemeriksaan` = 'Paket Layanan' 
ERROR - 2022-06-09 19:35:50 --> Severity: error --> Exception: Call to a member function num_rows() on boolean /home/simraish/public_html/v2/system/database/DB_query_builder.php 1424
ERROR - 2022-06-09 19:35:50 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `is_deleted` =0 AND `state_index` <> 3 AND `state_index` >= 2 AND `jenis_pem' at line 3 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `v_register_pasien`
WHERE `id_klinik` = AND `is_deleted` =0 AND `state_index` <> 3 AND `state_index` >= 2 AND `jenis_pemeriksaan` <> 'Paket Layanan' 
ERROR - 2022-06-09 19:35:50 --> Severity: error --> Exception: Call to a member function num_rows() on boolean /home/simraish/public_html/v2/system/database/DB_query_builder.php 1424
