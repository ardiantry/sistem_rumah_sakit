<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-02-18 02:43:17 --> 404 Page Not Found: Robotstxt/index
ERROR - 2022-02-18 10:57:15 --> 404 Page Not Found: Assets/img
ERROR - 2022-02-18 11:08:51 --> 404 Page Not Found: Assets/img
ERROR - 2022-02-18 13:58:42 --> 404 Page Not Found: Assets/img
ERROR - 2022-02-18 14:39:23 --> 404 Page Not Found: Assets/img
ERROR - 2022-02-18 14:43:38 --> 404 Page Not Found: Assets/img
ERROR - 2022-02-18 14:57:10 --> 404 Page Not Found: Assets/img
ERROR - 2022-02-18 15:02:13 --> 404 Page Not Found: Assets/img
ERROR - 2022-02-18 16:07:28 --> 404 Page Not Found: Assets/img
ERROR - 2022-02-18 16:16:04 --> 404 Page Not Found: Assets/img
ERROR - 2022-02-18 16:40:50 --> 404 Page Not Found: Assets/img
ERROR - 2022-02-18 16:55:53 --> 404 Page Not Found: Assets/img
ERROR - 2022-02-18 16:58:54 --> 404 Page Not Found: Assets/img
ERROR - 2022-02-18 17:17:38 --> 404 Page Not Found: Assets/img
ERROR - 2022-02-18 19:02:45 --> Severity: Warning --> A non-numeric value encountered /home/simraish/public_html/v2/application/controllers/Registrasi.php 395
ERROR - 2022-02-18 23:23:52 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `is_deleted` =0 AND `state_index` > `IS` `NULL`' at line 3 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `v_register_pasien`
WHERE `jenis_pemeriksaan` <> 'Paket Layanan' AND `state_index` <> 3 AND `id_klinik` = AND `is_deleted` =0 AND `state_index` > `IS` `NULL`
ERROR - 2022-02-18 23:23:52 --> Severity: error --> Exception: Call to a member function num_rows() on boolean /home/simraish/public_html/v2/system/database/DB_query_builder.php 1424
ERROR - 2022-02-18 23:27:18 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `is_deleted` =0 AND `state_index` > `IS` `NULL`' at line 3 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `v_register_pasien`
WHERE `jenis_pemeriksaan` = 'Paket Layanan' AND `state_index` <> 3 AND `id_klinik` = AND `is_deleted` =0 AND `state_index` > `IS` `NULL`
ERROR - 2022-02-18 23:27:18 --> Severity: error --> Exception: Call to a member function num_rows() on boolean /home/simraish/public_html/v2/system/database/DB_query_builder.php 1424
