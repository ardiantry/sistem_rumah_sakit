<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-04-14 16:24:16 --> 404 Page Not Found: Apple-touch-icon-precomposedpng/index
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-04-14 16:24:16 --> 404 Page Not Found: Apple-touch-iconpng/index
ERROR - 2022-04-14 20:22:50 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `is_deleted` =0 AND `state_index` >=0' at line 3 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `v_register_pasien`
WHERE `jenis_pemeriksaan` <> 'Paket Layanan' AND `state_index` <> 3 AND `id_klinik` = AND `is_deleted` =0 AND `state_index` >=0
ERROR - 2022-04-14 20:22:50 --> Severity: error --> Exception: Call to a member function num_rows() on boolean /home/simraish/public_html/v2/system/database/DB_query_builder.php 1424
ERROR - 2022-04-14 20:22:50 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `is_deleted` =0 AND `state_index` >=0' at line 3 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `v_register_pasien`
WHERE `jenis_pemeriksaan` = 'Paket Layanan' AND `state_index` <> 3 AND `id_klinik` = AND `is_deleted` =0 AND `state_index` >=0
ERROR - 2022-04-14 20:22:50 --> Severity: error --> Exception: Call to a member function num_rows() on boolean /home/simraish/public_html/v2/system/database/DB_query_builder.php 1424