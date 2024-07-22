<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-08-13 09:48:44 --> 404 Page Not Found: Robotstxt/index
ERROR - 2022-08-13 09:48:45 --> 404 Page Not Found: Robotstxt/index
ERROR - 2022-08-13 09:48:46 --> 404 Page Not Found: Robotstxt/index
ERROR - 2022-08-13 09:48:47 --> 404 Page Not Found: Robotstxt/index
ERROR - 2022-08-13 09:50:27 --> 404 Page Not Found: Adstxt/index
ERROR - 2022-08-13 17:42:41 --> Severity: Warning --> mysqli::query(): MySQL server has gone away /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-08-13 17:42:41 --> Severity: Warning --> mysqli::query(): Error reading result set's header /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-08-13 17:42:41 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `register_pasien_rencana_kontrol`
WHERE `id_register_pasien` = '19250'
ERROR - 2022-08-13 17:42:41 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/RegisterPasienRencanaKontrol_model.php 23
ERROR - 2022-08-13 17:42:41 --> Severity: Warning --> Error while sending QUERY packet. PID=1994640 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-08-13 17:42:41 --> Query error: MySQL server has gone away - Invalid query: SELECT `users`.*, `users`.`id` as `id`, `users`.`id` as `user_id`
FROM `users`
WHERE `users`.`id` = '109'
ORDER BY `users`.`id` DESC
 LIMIT 1
ERROR - 2022-08-13 17:42:41 --> Severity: error --> Exception: Call to a member function row() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1316
ERROR - 2022-08-13 17:42:41 --> Severity: Warning --> Error while sending QUERY packet. PID=1994641 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-08-13 17:42:41 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `v_register_pasien_icd9`
WHERE `id_register_pasien` = '19250'
ERROR - 2022-08-13 17:42:41 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/RegisterPasienIcd9_model.php 28
ERROR - 2022-08-13 17:42:41 --> Severity: Warning --> Error while sending QUERY packet. PID=1994638 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-08-13 17:42:41 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `v_register_pasien_layanan`
WHERE `id_register_pasien` = '19250'
ERROR - 2022-08-13 17:42:41 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/RegisterPasienLayanan_model.php 28
ERROR - 2022-08-13 17:42:41 --> Severity: Warning --> Error while sending QUERY packet. PID=1994642 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-08-13 17:42:41 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `v_register_pasien_icd10`
WHERE `id_register_pasien` = '19250'
ERROR - 2022-08-13 17:42:41 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/RegisterPasienIcd10_model.php 27
ERROR - 2022-08-13 17:42:41 --> Severity: Warning --> Error while sending QUERY packet. PID=1994637 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-08-13 17:42:41 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `v_register_pasien_obat`
WHERE `id_register_pasien` = '19250'
AND `is_paket` =0
ERROR - 2022-08-13 17:42:41 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/RegisterPasienObat_model.php 81
ERROR - 2022-08-13 19:49:24 --> Query error: Cannot add or update a child row: a foreign key constraint fails (`simraish_simraisha_prod`.`transaksi_lain_detail`, CONSTRAINT `transaksi_lain_detail_ibfk_2` FOREIGN KEY (`id_akun`) REFERENCES `master_akun` (`id`) ON DELETE CASCADE ON UPDATE CASCADE) - Invalid query: INSERT INTO `transaksi_lain_detail` (`arus`, `id_akun`, `id_transaksi_header`, `nilai`) VALUES ('<font xss=removed><font xss=removed>Debet</font></font>','<font xss=removed><font xss=removed>527</font></font>',5810,'<font xss=removed><font xss=removed>35.00</font></font>'), ('<font xss=removed><font xss=removed>Kredit</font></font>','<font xss=removed><font xss=removed>111</font></font>',5810,'<font xss=removed><font xss=removed>35.00</font></font>')
ERROR - 2022-08-13 20:04:39 --> Query error: Duplicate entry '113951-6' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('113951', 'KARENDIYA FATIMA', 'SLEMAN', '2020-08-01', 'Islam', 'SUCEN NO 2 , TRIHARJO, SLEMAN', '08113239856', 'P', NULL, NULL, '', '6')
ERROR - 2022-08-13 20:04:39 --> Query error: Duplicate entry '113951-6' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('113951', 'KARENDIYA FATIMA', 'SLEMAN', '2020-08-01', 'Islam', 'SUCEN NO 2 , TRIHARJO, SLEMAN', '08113239856', 'P', NULL, NULL, '', '6')
