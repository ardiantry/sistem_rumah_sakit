<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-03-21 15:20:10 --> 404 Page Not Found: Robotstxt/index
ERROR - 2022-03-21 15:53:29 --> Query error: Duplicate entry '113288-6' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('113288', 'RIZKA ARICHMA', 'SLEMAN', '1997-04-04', 'Islam', 'PLOSOKUNING BANGUNKERTO TURI SLEMAN', '082132908882', 'P', 'B', '19', '', '6')
ERROR - 2022-03-21 17:18:36 --> Query error: Cannot add or update a child row: a foreign key constraint fails (`simraish_simraisha_prod`.`penerimaan`, CONSTRAINT `penerimaan_ibfk_1` FOREIGN KEY (`id_po`) REFERENCES `pemesanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE) - Invalid query: INSERT INTO `penerimaan` (`id_po`, `no_faktur`, `tanggal_faktur`, `lokasi`, `keterangan`, `id_supplier`, `id_klinik`, `modified_by`) VALUES ('0', '509823-APL', '2022-03-21', 'Opname', 'Kode User: I189', '9', '6', '170')
ERROR - 2022-03-21 17:18:36 --> Query error: Cannot add or update a child row: a foreign key constraint fails (`simraish_simraisha_prod`.`penerimaan_detail`, CONSTRAINT `penerimaan_detail_ibfk_1` FOREIGN KEY (`id_faktur`) REFERENCES `penerimaan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE) - Invalid query: INSERT INTO `penerimaan_detail` (`expired_date`, `harga_beli`, `id_faktur`, `id_obat`, `jumlah`, `total`) VALUES ('2024-03-01','588060.00',0,'108','27',15877620)
ERROR - 2022-03-21 18:40:02 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `is_deleted` =0 AND `state_index` >=0' at line 3 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `v_register_pasien`
WHERE `jenis_pemeriksaan` <> 'Paket Layanan' AND `state_index` <> 3 AND `id_klinik` = AND `is_deleted` =0 AND `state_index` >=0
ERROR - 2022-03-21 18:40:02 --> Severity: error --> Exception: Call to a member function num_rows() on boolean /home/simraish/public_html/v2/system/database/DB_query_builder.php 1424
ERROR - 2022-03-21 18:40:03 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `is_deleted` =0 AND `state_index` >=0' at line 3 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `v_register_pasien`
WHERE `jenis_pemeriksaan` = 'Paket Layanan' AND `state_index` <> 3 AND `id_klinik` = AND `is_deleted` =0 AND `state_index` >=0
ERROR - 2022-03-21 18:40:03 --> Severity: error --> Exception: Call to a member function num_rows() on boolean /home/simraish/public_html/v2/system/database/DB_query_builder.php 1424
ERROR - 2022-03-21 18:41:19 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `is_deleted` =0 AND `state_index` >=0' at line 3 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `v_register_pasien`
WHERE `jenis_pemeriksaan` <> 'Paket Layanan' AND `state_index` <> 3 AND `id_klinik` = AND `is_deleted` =0 AND `state_index` >=0
ERROR - 2022-03-21 18:41:19 --> Severity: error --> Exception: Call to a member function num_rows() on boolean /home/simraish/public_html/v2/system/database/DB_query_builder.php 1424
ERROR - 2022-03-21 18:41:19 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `is_deleted` =0 AND `state_index` >=0' at line 3 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `v_register_pasien`
WHERE `jenis_pemeriksaan` = 'Paket Layanan' AND `state_index` <> 3 AND `id_klinik` = AND `is_deleted` =0 AND `state_index` >=0
ERROR - 2022-03-21 18:41:19 --> Severity: error --> Exception: Call to a member function num_rows() on boolean /home/simraish/public_html/v2/system/database/DB_query_builder.php 1424
