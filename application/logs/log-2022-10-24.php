<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-10-24 14:40:13 --> Severity: Warning --> mysqli::query(): MySQL server has gone away /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-24 14:40:13 --> Severity: Warning --> mysqli::query(): Error reading result set's header /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-24 14:40:13 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `v_pasien`
WHERE `id_klinik` = 7 AND `is_deleted` =0
AND   (
`no_rm` LIKE '%JASS%' ESCAPE '!'
OR  `nama_pasien` LIKE '%JASS%' ESCAPE '!'
 )
ORDER BY `no_rm` ASC
 LIMIT 10
ERROR - 2022-10-24 14:40:13 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/helpers/my_datatable_helper.php 61
ERROR - 2022-10-24 14:40:13 --> Severity: Warning --> Error while sending QUERY packet. PID=1587939 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-24 14:40:13 --> Query error: MySQL server has gone away - Invalid query: SELECT `users`.*, `users`.`id` as `id`, `users`.`id` as `user_id`
FROM `users`
WHERE `users`.`id` = '122'
ORDER BY `users`.`id` DESC
 LIMIT 1
ERROR - 2022-10-24 14:40:13 --> Severity: error --> Exception: Call to a member function row() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1316
ERROR - 2022-10-24 14:40:13 --> Severity: Warning --> Error while sending QUERY packet. PID=1587878 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-24 14:40:13 --> Query error: MySQL server has gone away - Invalid query: SELECT `users`.*, `users`.`id` as `id`, `users`.`id` as `user_id`
FROM `users`
WHERE `users`.`id` = '122'
ORDER BY `users`.`id` DESC
 LIMIT 1
ERROR - 2022-10-24 14:40:13 --> Severity: error --> Exception: Call to a member function row() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1316
ERROR - 2022-10-24 14:40:13 --> Severity: Warning --> Error while sending QUERY packet. PID=1587134 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-24 14:40:13 --> Query error: MySQL server has gone away - Invalid query: SELECT `users`.*, `users`.`id` as `id`, `users`.`id` as `user_id`
FROM `users`
WHERE `users`.`id` = '122'
ORDER BY `users`.`id` DESC
 LIMIT 1
ERROR - 2022-10-24 14:40:13 --> Severity: error --> Exception: Call to a member function row() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1316
ERROR - 2022-10-24 14:40:13 --> Severity: Warning --> Error while sending QUERY packet. PID=1587886 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-24 14:40:13 --> Query error: MySQL server has gone away - Invalid query: SELECT `users`.*, `users`.`id` as `id`, `users`.`id` as `user_id`
FROM `users`
WHERE `users`.`id` = '122'
ORDER BY `users`.`id` DESC
 LIMIT 1
ERROR - 2022-10-24 14:40:13 --> Severity: error --> Exception: Call to a member function row() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1316
ERROR - 2022-10-24 14:40:13 --> Severity: Warning --> Error while sending QUERY packet. PID=1587795 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-24 14:40:13 --> Query error: MySQL server has gone away - Invalid query: SELECT `users`.*, `users`.`id` as `id`, `users`.`id` as `user_id`
FROM `users`
WHERE `users`.`id` = '122'
ORDER BY `users`.`id` DESC
 LIMIT 1
ERROR - 2022-10-24 14:40:13 --> Severity: error --> Exception: Call to a member function row() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1316
ERROR - 2022-10-24 15:40:13 --> Query error: Duplicate entry '114376-6' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('114376', 'NOVIA PAULINA PRATIWI PUTRI', 'GUNUNGKIDUL', '1994-11-02', 'Islam', 'GADUNGSARI 8/12 WONOSARI GK', '085743722556', 'P', 'AB', '23', '', '6')
ERROR - 2022-10-24 15:57:58 --> Query error: Duplicate entry '004527-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('004527', 'A. FARADILLA DIATRI FEBRIANI', 'SEMARANG', '1997-02-13', 'Islam', 'JL. MLANDANGAN, LODAN, MINOMARTANI ', '089518170201', 'P', 'B', '40', '', '7')
ERROR - 2022-10-24 16:37:39 --> Query error: Duplicate entry '114378-6' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('114378', 'EKO SUSANTO', 'MAGELANG', '1985-11-14', 'Islam', 'JAMBON, MAGELANG', '088239244700', 'L', NULL, '30', '', '6')
ERROR - 2022-10-24 17:34:33 --> Query error: Duplicate entry '004536-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('004536', 'ADHIKA NANDIWARDHANA', 'PURWOREJO', '1992-06-01', 'Islam', 'SENDARI, MLATI, YOGYAKARTA', '085729888666', 'L', NULL, '63', '', '7')
ERROR - 2022-10-24 19:05:48 --> Query error: Duplicate entry '004543-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('004543', 'IRFAN ABDUR ROZAQ', 'PUIRWOREJO', '2004-08-25', 'Islam', 'SANGKALAN, BAPANGSARI, BANGELEN, PURWOREJO', '087737625235', 'L', 'A', '64', '', '7')
