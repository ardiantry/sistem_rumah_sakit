<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-05-18 18:45:12 --> Query error: Deadlock found when trying to get lock; try restarting transaction - Invalid query: UPDATE obat_stok
        INNER JOIN log_stok
        ON obat_stok.id = log_stok.id_stok
        SET obat_stok.stok_opname = obat_stok.stok_opname - log_stok.jumlah
        WHERE log_stok.id_reference = 16348 AND tipe_transaksi = 'Rawat Jalan'
ERROR - 2022-05-18 19:16:54 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `is_deleted` =0 AND `state_index` <> 3 AND `state_index` >= AND `jenis_pemer' at line 3 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `v_register_pasien`
WHERE `id_klinik` = AND `is_deleted` =0 AND `state_index` <> 3 AND `state_index` >= AND `jenis_pemeriksaan` = 'Paket Layanan' 
ERROR - 2022-05-18 19:16:54 --> Severity: error --> Exception: Call to a member function num_rows() on boolean /home/simraish/public_html/v2/system/database/DB_query_builder.php 1424
ERROR - 2022-05-18 19:20:55 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `is_deleted` =0 AND `state_index` <> 3 AND `state_index` >= AND `jenis_pemer' at line 3 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `v_register_pasien`
WHERE `id_klinik` = AND `is_deleted` =0 AND `state_index` <> 3 AND `state_index` >= AND `jenis_pemeriksaan` <> 'Paket Layanan' 
ERROR - 2022-05-18 19:20:55 --> Severity: error --> Exception: Call to a member function num_rows() on boolean /home/simraish/public_html/v2/system/database/DB_query_builder.php 1424
ERROR - 2022-05-18 21:41:09 --> Query error: Access denied for user 'simraish_prod'@'localhost' (using password: YES) - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `v_jurnal_concat`
WHERE `id_klinik` = 7 AND `is_deleted` =0
ERROR - 2022-05-18 21:41:09 --> Severity: error --> Exception: Call to a member function num_rows() on boolean /home/simraish/public_html/v2/system/database/DB_query_builder.php 1424
ERROR - 2022-05-18 23:23:02 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `is_deleted` =0 AND `state_index` <> 3 AND `state_index` >= AND `jenis_pemer' at line 3 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `v_register_pasien`
WHERE `id_klinik` = AND `is_deleted` =0 AND `state_index` <> 3 AND `state_index` >= AND `jenis_pemeriksaan` <> 'Paket Layanan' 
ERROR - 2022-05-18 23:23:02 --> Severity: error --> Exception: Call to a member function num_rows() on boolean /home/simraish/public_html/v2/system/database/DB_query_builder.php 1424
