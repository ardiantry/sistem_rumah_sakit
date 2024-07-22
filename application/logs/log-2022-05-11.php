<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-05-11 12:06:23 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `is_deleted` =0 AND `state_index` <> 3 AND `state_index` >=0 AND `jenis_peme' at line 3 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `v_register_pasien`
WHERE `id_klinik` = AND `is_deleted` =0 AND `state_index` <> 3 AND `state_index` >=0 AND `jenis_pemeriksaan` <> 'Paket Layanan' 
ERROR - 2022-05-11 12:06:23 --> Severity: error --> Exception: Call to a member function num_rows() on boolean /home/simraish/public_html/v2/system/database/DB_query_builder.php 1424
ERROR - 2022-05-11 12:06:23 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `is_deleted` =0 AND `state_index` <> 3 AND `state_index` >=0 AND `jenis_peme' at line 3 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `v_register_pasien`
WHERE `id_klinik` = AND `is_deleted` =0 AND `state_index` <> 3 AND `state_index` >=0 AND `jenis_pemeriksaan` = 'Paket Layanan' 
ERROR - 2022-05-11 12:06:23 --> Severity: error --> Exception: Call to a member function num_rows() on boolean /home/simraish/public_html/v2/system/database/DB_query_builder.php 1424
ERROR - 2022-05-11 15:11:59 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `is_deleted` =0 AND `state_index` <> 3 AND `state_index` >=0 AND `jenis_peme' at line 3 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `v_register_pasien`
WHERE `id_klinik` = AND `is_deleted` =0 AND `state_index` <> 3 AND `state_index` >=0 AND `jenis_pemeriksaan` <> 'Paket Layanan' 
ERROR - 2022-05-11 15:11:59 --> Severity: error --> Exception: Call to a member function num_rows() on boolean /home/simraish/public_html/v2/system/database/DB_query_builder.php 1424
ERROR - 2022-05-11 15:11:59 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `is_deleted` =0 AND `state_index` <> 3 AND `state_index` >=0 AND `jenis_peme' at line 3 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `v_register_pasien`
WHERE `id_klinik` = AND `is_deleted` =0 AND `state_index` <> 3 AND `state_index` >=0 AND `jenis_pemeriksaan` = 'Paket Layanan' 
ERROR - 2022-05-11 15:11:59 --> Severity: error --> Exception: Call to a member function num_rows() on boolean /home/simraish/public_html/v2/system/database/DB_query_builder.php 1424
ERROR - 2022-05-11 15:23:19 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `is_deleted` =0 AND `state_index` <> 3 AND `state_index` >=0 AND `jenis_peme' at line 3 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `v_register_pasien`
WHERE `id_klinik` = AND `is_deleted` =0 AND `state_index` <> 3 AND `state_index` >=0 AND `jenis_pemeriksaan` <> 'Paket Layanan' 
ERROR - 2022-05-11 15:23:19 --> Severity: error --> Exception: Call to a member function num_rows() on boolean /home/simraish/public_html/v2/system/database/DB_query_builder.php 1424
ERROR - 2022-05-11 15:23:19 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `is_deleted` =0 AND `state_index` <> 3 AND `state_index` >=0 AND `jenis_peme' at line 3 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `v_register_pasien`
WHERE `id_klinik` = AND `is_deleted` =0 AND `state_index` <> 3 AND `state_index` >=0 AND `jenis_pemeriksaan` = 'Paket Layanan' 
ERROR - 2022-05-11 15:23:19 --> Severity: error --> Exception: Call to a member function num_rows() on boolean /home/simraish/public_html/v2/system/database/DB_query_builder.php 1424
ERROR - 2022-05-11 17:37:40 --> Query error: Deadlock found when trying to get lock; try restarting transaction - Invalid query: UPDATE obat_stok
        INNER JOIN log_stok
        ON obat_stok.id = log_stok.id_stok
        SET obat_stok.stok_opname = obat_stok.stok_opname - log_stok.jumlah
        WHERE log_stok.id_reference = 16045 AND tipe_transaksi = 'Rawat Jalan'
ERROR - 2022-05-11 18:32:37 --> Query error: Duplicate entry '113530-6' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('113530', 'ALSAKI FEBRIAN BAGASKARA ARRASYID', 'SLEMAN', '2022-02-10', 'Islam', 'SLEMAN', '087843272797', 'L', NULL, NULL, '', '6')
ERROR - 2022-05-11 18:58:11 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `is_deleted` =0 AND `state_index` <> 3 AND `state_index` >=0 AND `jenis_peme' at line 3 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `v_register_pasien`
WHERE `id_klinik` = AND `is_deleted` =0 AND `state_index` <> 3 AND `state_index` >=0 AND `jenis_pemeriksaan` = 'Paket Layanan' 
ERROR - 2022-05-11 18:58:11 --> Severity: error --> Exception: Call to a member function num_rows() on boolean /home/simraish/public_html/v2/system/database/DB_query_builder.php 1424
ERROR - 2022-05-11 18:58:11 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `is_deleted` =0 AND `state_index` <> 3 AND `state_index` >=0 AND `jenis_peme' at line 3 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `v_register_pasien`
WHERE `id_klinik` = AND `is_deleted` =0 AND `state_index` <> 3 AND `state_index` >=0 AND `jenis_pemeriksaan` <> 'Paket Layanan' 
ERROR - 2022-05-11 18:58:11 --> Severity: error --> Exception: Call to a member function num_rows() on boolean /home/simraish/public_html/v2/system/database/DB_query_builder.php 1424
