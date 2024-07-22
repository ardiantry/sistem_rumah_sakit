<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-10-27 04:57:19 --> 404 Page Not Found: Robotstxt/index
ERROR - 2022-10-27 11:08:02 --> Severity: Warning --> mysqli::real_connect(): (08004/1040): Too many connections /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-10-27 11:08:02 --> Unable to connect to the database
ERROR - 2022-10-27 15:33:50 --> Severity: Warning --> mysqli::real_connect(): (HY000/1040): Too many connections /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-10-27 15:33:50 --> Unable to connect to the database
ERROR - 2022-10-27 15:34:10 --> Severity: Warning --> mysqli::real_connect(): (HY000/1040): Too many connections /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-10-27 15:34:10 --> Unable to connect to the database
ERROR - 2022-10-27 15:34:10 --> Severity: error --> Exception: Call to a member function real_escape_string() on boolean /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 391
ERROR - 2022-10-27 15:35:05 --> Severity: Warning --> mysqli::real_connect(): (08004/1040): Too many connections /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-10-27 15:35:05 --> Unable to connect to the database
ERROR - 2022-10-27 15:35:05 --> Severity: error --> Exception: Call to a member function real_escape_string() on boolean /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 391
ERROR - 2022-10-27 15:35:59 --> Severity: Warning --> mysqli::real_connect(): (HY000/1040): Too many connections /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-10-27 15:35:59 --> Unable to connect to the database
ERROR - 2022-10-27 15:35:59 --> Severity: error --> Exception: Call to a member function real_escape_string() on boolean /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 391
ERROR - 2022-10-27 15:35:59 --> Severity: Warning --> mysqli::real_connect(): (HY000/1040): Too many connections /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-10-27 15:35:59 --> Unable to connect to the database
ERROR - 2022-10-27 15:35:59 --> Severity: error --> Exception: Call to a member function real_escape_string() on boolean /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 391
ERROR - 2022-10-27 15:36:51 --> Severity: Warning --> mysqli::real_connect(): (HY000/1040): Too many connections /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-10-27 15:36:51 --> Unable to connect to the database
ERROR - 2022-10-27 15:36:51 --> Severity: error --> Exception: Call to a member function real_escape_string() on boolean /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 391
ERROR - 2022-10-27 15:38:30 --> Query error: Duplicate entry '114403-6' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('114403', 'NATALIA SHARA DEWANTI', 'MAGELANG', '1992-01-17', 'Katholik', 'SAWANGAN MAGELANG', '085740188852', 'P', 'AB', '23', '', '6')
ERROR - 2022-10-27 15:38:30 --> Query error: Duplicate entry '114403-6' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('114403', 'NATALIA SHARA DEWANTI', 'MAGELANG', '1992-01-17', 'Katholik', 'SAWANGAN MAGELANG', '085740188852', 'P', 'AB', '23', '', '6')
ERROR - 2022-10-27 15:55:37 --> Severity: Warning --> mysqli::query(): MySQL server has gone away /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-27 15:55:37 --> Severity: Warning --> mysqli::query(): Error reading result set's header /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-27 15:55:37 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `v_register_privilege`
WHERE `id_user` = '181'
ERROR - 2022-10-27 15:55:37 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Menu_model.php 13
ERROR - 2022-10-27 15:55:37 --> Severity: Warning --> Error while sending QUERY packet. PID=503038 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-27 15:55:37 --> Query error: MySQL server has gone away - Invalid query: SELECT `users`.*, `users`.`id` as `id`, `users`.`id` as `user_id`
FROM `users`
WHERE `users`.`id` = '181'
ORDER BY `users`.`id` DESC
 LIMIT 1
ERROR - 2022-10-27 15:55:37 --> Severity: error --> Exception: Call to a member function row() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1316
ERROR - 2022-10-27 15:55:40 --> Severity: Warning --> mysqli::query(): MySQL server has gone away /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-27 15:55:40 --> Severity: Warning --> mysqli::query(): Error reading result set's header /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-27 15:55:40 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `v_register_pasien_icd10`
WHERE `id_register_pasien` = '21799'
ERROR - 2022-10-27 15:55:40 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/RegisterPasienIcd10_model.php 27
ERROR - 2022-10-27 15:55:40 --> Severity: Warning --> Error while sending QUERY packet. PID=502727 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-27 15:55:40 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `register_pasien_rencana_kontrol`
WHERE `id_register_pasien` = '21799'
ERROR - 2022-10-27 15:55:40 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/RegisterPasienRencanaKontrol_model.php 23
ERROR - 2022-10-27 15:55:40 --> Severity: Warning --> Error while sending QUERY packet. PID=502726 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-27 15:55:40 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `v_register_pasien_icd9`
WHERE `id_register_pasien` = '21799'
ERROR - 2022-10-27 15:55:40 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/RegisterPasienIcd9_model.php 28
ERROR - 2022-10-27 15:55:40 --> Severity: Warning --> Error while sending QUERY packet. PID=502777 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-27 15:55:40 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `v_register_pasien_obat`
WHERE `id_register_pasien` = '21799'
AND `is_paket` =0
ERROR - 2022-10-27 15:55:40 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/RegisterPasienObat_model.php 81
ERROR - 2022-10-27 15:55:40 --> Severity: Warning --> Error while sending QUERY packet. PID=502730 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-27 15:55:40 --> Query error: MySQL server has gone away - Invalid query: SELECT `users`.*, `users`.`id` as `id`, `users`.`id` as `user_id`
FROM `users`
WHERE `users`.`id` = '31'
ORDER BY `users`.`id` DESC
 LIMIT 1
ERROR - 2022-10-27 15:55:40 --> Severity: error --> Exception: Call to a member function row() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1316
ERROR - 2022-10-27 15:55:40 --> Severity: Warning --> Error while sending QUERY packet. PID=502571 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-27 15:55:40 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `v_register_pasien_layanan`
WHERE `id_register_pasien` = '21799'
ERROR - 2022-10-27 15:55:40 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/RegisterPasienLayanan_model.php 28
ERROR - 2022-10-27 16:00:39 --> Query error: Duplicate entry '004567-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('004567', 'WAHYU BROTO AJI', 'SUKOHARJO', '1997-04-11', 'Islam', 'DK KINTELAN 001/004 LOROG, TAWANGSARI, SUKOHARJO', '085246555748', 'L', 'B', '40', '', '7')
ERROR - 2022-10-27 16:01:23 --> Query error: Duplicate entry '004567-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('004567', 'WAHYU BROTO AJI', 'SUKOHARJO', '1997-04-11', 'Islam', 'DK KINTELAN 001/004 LOROG, TAWANGSARI, SUKOHARJO', '085246555748', 'L', 'B', '40', '', '7')
ERROR - 2022-10-27 16:32:53 --> Severity: Warning --> mysqli::real_connect(): (08004/1040): Too many connections /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-10-27 16:32:53 --> Severity: Warning --> mysqli::real_connect(): (08004/1040): Too many connections /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-10-27 16:32:53 --> Severity: Warning --> mysqli::real_connect(): (HY000/1040): Too many connections /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-10-27 16:32:53 --> Unable to connect to the database
ERROR - 2022-10-27 16:32:53 --> Severity: Warning --> mysqli::real_connect(): (08004/1040): Too many connections /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-10-27 16:32:53 --> Severity: Warning --> mysqli::real_connect(): (HY000/1040): Too many connections /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-10-27 16:32:53 --> Unable to connect to the database
ERROR - 2022-10-27 16:32:53 --> Severity: Warning --> mysqli::real_connect(): (HY000/1040): Too many connections /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-10-27 16:32:53 --> Unable to connect to the database
ERROR - 2022-10-27 16:32:53 --> Unable to connect to the database
ERROR - 2022-10-27 16:32:53 --> Unable to connect to the database
ERROR - 2022-10-27 16:32:53 --> Unable to connect to the database
ERROR - 2022-10-27 16:32:53 --> Severity: error --> Exception: Call to a member function real_escape_string() on boolean /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 391
ERROR - 2022-10-27 16:32:53 --> Severity: error --> Exception: Call to a member function real_escape_string() on boolean /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 391
ERROR - 2022-10-27 16:32:53 --> Severity: error --> Exception: Call to a member function real_escape_string() on boolean /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 391
ERROR - 2022-10-27 16:32:53 --> Severity: error --> Exception: Call to a member function real_escape_string() on boolean /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 391
ERROR - 2022-10-27 16:32:53 --> Severity: error --> Exception: Call to a member function real_escape_string() on boolean /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 391
ERROR - 2022-10-27 16:32:53 --> Severity: error --> Exception: Call to a member function real_escape_string() on boolean /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 391
ERROR - 2022-10-27 16:33:09 --> Severity: Warning --> mysqli::real_connect(): (08004/1040): Too many connections /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-10-27 16:33:09 --> Unable to connect to the database
ERROR - 2022-10-27 16:33:09 --> Severity: Warning --> mysqli::real_connect(): (HY000/1040): Too many connections /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-10-27 16:33:09 --> Unable to connect to the database
ERROR - 2022-10-27 16:33:09 --> Severity: error --> Exception: Call to a member function real_escape_string() on boolean /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 391
ERROR - 2022-10-27 16:33:09 --> Severity: error --> Exception: Call to a member function real_escape_string() on boolean /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 391
ERROR - 2022-10-27 18:06:28 --> 404 Page Not Found: RawatJalan/Pasien
ERROR - 2022-10-27 18:22:33 --> Query error: Duplicate entry '004582-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('004582', 'KAIANNA ASYAZANI JIHAN FARIZI', 'YOGYAKARTA', '2021-03-09', 'Islam', 'PERUM NANDAN GRIYA MANDIRI NO 2E', '081228748743', 'P', NULL, '37', '', '7')
ERROR - 2022-10-27 21:54:09 --> 404 Page Not Found: Robotstxt/index
