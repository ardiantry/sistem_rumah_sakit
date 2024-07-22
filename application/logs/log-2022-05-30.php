<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-05-30 16:36:44 --> Query error: Duplicate entry '113624-6' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('113624', 'MIMIN  NUR AISYAH', 'BANTUL', '1982-05-14', 'Islam', 'KRETEK, BANTUL', '087739393277', 'P', 'O', '21', '', '6')
ERROR - 2022-05-30 18:00:31 --> 404 Page Not Found: RawatJalan/Pasien
ERROR - 2022-05-30 18:20:20 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `is_deleted` =0 AND `state_index` <> 3 AND `state_index` >=0 AND `jenis_peme' at line 3 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `v_register_pasien`
WHERE `id_klinik` = AND `is_deleted` =0 AND `state_index` <> 3 AND `state_index` >=0 AND `jenis_pemeriksaan` <> 'Paket Layanan' 
ERROR - 2022-05-30 18:20:20 --> Severity: error --> Exception: Call to a member function num_rows() on boolean /home/simraish/public_html/v2/system/database/DB_query_builder.php 1424
ERROR - 2022-05-30 18:20:21 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `is_deleted` =0 AND `state_index` <> 3 AND `state_index` >=0 AND `jenis_peme' at line 3 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `v_register_pasien`
WHERE `id_klinik` = AND `is_deleted` =0 AND `state_index` <> 3 AND `state_index` >=0 AND `jenis_pemeriksaan` = 'Paket Layanan' 
ERROR - 2022-05-30 18:20:21 --> Severity: error --> Exception: Call to a member function num_rows() on boolean /home/simraish/public_html/v2/system/database/DB_query_builder.php 1424
