<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-02-19 12:07:54 --> Query error: Duplicate entry '000106-25' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('000106', 'Ny. Rini', 'Tangerang', '1972-05-21', 'Islam', 'Gardenia XG 16 No.27', '', 'P', NULL, NULL, '', '25')
ERROR - 2022-02-19 15:31:36 --> Severity: Warning --> filesize(): stat failed for /var/cpanel/php/sessions/ea-php71/ci_session07c256ff204456e9d3402f934d25fba7758239d2 /home/simraish/public_html/v2/system/libraries/Session/drivers/Session_files_driver.php 208
ERROR - 2022-02-19 15:31:36 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `is_deleted` =0 AND `state_index` >=0' at line 3 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `v_register_pasien`
WHERE `jenis_pemeriksaan` <> 'Paket Layanan' AND `state_index` <> 3 AND `id_klinik` = AND `is_deleted` =0 AND `state_index` >=0
ERROR - 2022-02-19 15:31:36 --> Severity: error --> Exception: Call to a member function num_rows() on boolean /home/simraish/public_html/v2/system/database/DB_query_builder.php 1424
ERROR - 2022-02-19 16:55:44 --> Query error: Duplicate entry '002316-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('002316', 'M. OCTAVIANO', 'YOGYAKARTA', '1994-10-22', 'Islam', 'JALAN WATES KM 11', '081215527902', 'L', NULL, '40', '', '7')
