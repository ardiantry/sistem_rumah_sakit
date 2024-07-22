<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-05-13 01:00:59 --> 404 Page Not Found: Robotstxt/index
ERROR - 2022-05-13 01:01:00 --> 404 Page Not Found: Robotstxt/index
ERROR - 2022-05-13 01:01:01 --> 404 Page Not Found: Robotstxt/index
ERROR - 2022-05-13 01:01:02 --> 404 Page Not Found: Robotstxt/index
ERROR - 2022-05-13 01:02:22 --> 404 Page Not Found: Adstxt/index
ERROR - 2022-05-13 11:30:42 --> 404 Page Not Found: Robotstxt/index
ERROR - 2022-05-13 18:16:58 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `is_deleted` =0 AND `state_index` <> 3 AND `state_index` >=0 AND `jenis_peme' at line 3 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `v_register_pasien`
WHERE `id_klinik` = AND `is_deleted` =0 AND `state_index` <> 3 AND `state_index` >=0 AND `jenis_pemeriksaan` <> 'Paket Layanan' 
ERROR - 2022-05-13 18:16:59 --> Severity: error --> Exception: Call to a member function num_rows() on boolean /home/simraish/public_html/v2/system/database/DB_query_builder.php 1424
ERROR - 2022-05-13 18:16:59 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `is_deleted` =0 AND `state_index` <> 3 AND `state_index` >=0 AND `jenis_peme' at line 3 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `v_register_pasien`
WHERE `id_klinik` = AND `is_deleted` =0 AND `state_index` <> 3 AND `state_index` >=0 AND `jenis_pemeriksaan` = 'Paket Layanan' 
ERROR - 2022-05-13 18:16:59 --> Severity: error --> Exception: Call to a member function num_rows() on boolean /home/simraish/public_html/v2/system/database/DB_query_builder.php 1424
ERROR - 2022-05-13 18:33:02 --> Query error: Duplicate entry '003061-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('003061', 'M RAFII ALIFYA AKBAR', 'TANGERANG', '2004-04-07', 'Islam', 'GRIYA TELAGA PERMAI, CILANGKAP, DEPOK', '085694579732', 'L', 'B', '64', '', '7')
ERROR - 2022-05-13 18:34:47 --> Query error: Duplicate entry '003062-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('003062', 'SITI QOMARIYAH', 'WONOSOBO', '1999-12-11', 'Islam', 'JALAN ANGGREK, TEGALREJO, KASIHAN, BANTUL', '083849653533', 'P', 'B', '40', '', '7')
ERROR - 2022-05-13 19:00:46 --> Severity: Warning --> A non-numeric value encountered /home/simraish/public_html/v2/application/controllers/Registrasi.php 417
