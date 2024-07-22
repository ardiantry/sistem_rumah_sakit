<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-10-04 16:14:02 --> Query error: Duplicate entry '004340-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('004340', 'PINKY HAMDHAN SARI', 'GUNUNGKIDUL', '2002-07-04', 'Islam', 'CONDONG CATUR, SLEMAN', '088801985925', 'P', NULL, '64', '', '7')
ERROR - 2022-10-04 16:46:39 --> Query error: Duplicate entry '004342-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('004342', 'VINO CHRISTIAN WARSITO', 'YOGYAKARTA', '2007-01-02', 'Kristen ', 'PM4 JAMBLANGAN NO 99 SEYEGAN, SLEMAN', '082242041011', 'L', NULL, '64', '', '7')
ERROR - 2022-10-04 16:48:07 --> Query error: Duplicate entry '114261-6' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('114261', 'MUHAMMAD HAFI SAGARA', 'KEBUMEN', '2022-06-22', 'Islam', 'PERUMAHAN MLATI, BR', '081267625677', 'L', NULL, '17', '', '6')
ERROR - 2022-10-04 16:48:08 --> Query error: Duplicate entry '114261-6' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('114261', 'MUHAMMAD HAFI SAGARA', 'KEBUMEN', '2022-06-22', 'Islam', 'PERUMAHAN MLATI, BR', '081267625677', 'L', NULL, '17', '', '6')
ERROR - 2022-10-04 17:29:27 --> Severity: Warning --> mysqli::query(): MySQL server has gone away /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-04 17:29:27 --> Severity: Warning --> mysqli::query(): Error reading result set's header /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-04 17:29:27 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `v_pasien`
WHERE `id_klinik` = 6 AND `is_deleted` =0
AND   (
`no_rm` LIKE '%LAM PU%' ESCAPE '!'
OR  `nama_pasien` LIKE '%LAM PU%' ESCAPE '!'
 )
ORDER BY `no_rm` ASC
 LIMIT 10
ERROR - 2022-10-04 17:29:27 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/helpers/my_datatable_helper.php 61
ERROR - 2022-10-04 17:29:27 --> Severity: Warning --> Error while sending QUERY packet. PID=1264220 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-04 17:29:27 --> Query error: MySQL server has gone away - Invalid query: SELECT `users`.*, `users`.`id` as `id`, `users`.`id` as `user_id`
FROM `users`
WHERE `users`.`id` = '160'
ORDER BY `users`.`id` DESC
 LIMIT 1
ERROR - 2022-10-04 17:29:27 --> Severity: error --> Exception: Call to a member function row() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1316
ERROR - 2022-10-04 17:29:27 --> Severity: Warning --> Error while sending QUERY packet. PID=1264328 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-04 17:29:27 --> Query error: MySQL server has gone away - Invalid query: SELECT `users`.*, `users`.`id` as `id`, `users`.`id` as `user_id`
FROM `users`
WHERE `users`.`id` = '160'
ORDER BY `users`.`id` DESC
 LIMIT 1
ERROR - 2022-10-04 17:29:27 --> Severity: error --> Exception: Call to a member function row() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1316
ERROR - 2022-10-04 17:29:27 --> Severity: Warning --> Error while sending QUERY packet. PID=1264364 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-04 17:29:27 --> Query error: MySQL server has gone away - Invalid query: SELECT `users`.*, `users`.`id` as `id`, `users`.`id` as `user_id`
FROM `users`
WHERE `users`.`id` = '160'
ORDER BY `users`.`id` DESC
 LIMIT 1
ERROR - 2022-10-04 17:29:27 --> Severity: error --> Exception: Call to a member function row() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1316
ERROR - 2022-10-04 17:29:27 --> Severity: Warning --> Error while sending QUERY packet. PID=1264358 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-04 17:29:27 --> Query error: MySQL server has gone away - Invalid query: SELECT `users`.*, `users`.`id` as `id`, `users`.`id` as `user_id`
FROM `users`
WHERE `users`.`id` = '160'
ORDER BY `users`.`id` DESC
 LIMIT 1
ERROR - 2022-10-04 17:29:27 --> Severity: error --> Exception: Call to a member function row() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1316
ERROR - 2022-10-04 17:29:27 --> Severity: Warning --> Error while sending QUERY packet. PID=1264210 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-04 17:29:27 --> Query error: MySQL server has gone away - Invalid query: SELECT `users`.*, `users`.`id` as `id`, `users`.`id` as `user_id`
FROM `users`
WHERE `users`.`id` = '160'
ORDER BY `users`.`id` DESC
 LIMIT 1
ERROR - 2022-10-04 17:29:27 --> Severity: error --> Exception: Call to a member function row() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1316
ERROR - 2022-10-04 17:29:27 --> Severity: Warning --> Error while sending QUERY packet. PID=1264359 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-04 17:29:27 --> Query error: MySQL server has gone away - Invalid query: SELECT `users`.*, `users`.`id` as `id`, `users`.`id` as `user_id`
FROM `users`
WHERE `users`.`id` = '160'
ORDER BY `users`.`id` DESC
 LIMIT 1
ERROR - 2022-10-04 17:29:27 --> Severity: error --> Exception: Call to a member function row() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1316
ERROR - 2022-10-04 17:29:27 --> Severity: Warning --> Error while sending QUERY packet. PID=1264357 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-04 17:29:27 --> Query error: MySQL server has gone away - Invalid query: SELECT `users`.*, `users`.`id` as `id`, `users`.`id` as `user_id`
FROM `users`
WHERE `users`.`id` = '160'
ORDER BY `users`.`id` DESC
 LIMIT 1
ERROR - 2022-10-04 17:29:27 --> Severity: error --> Exception: Call to a member function row() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1316
ERROR - 2022-10-04 19:08:38 --> Query error: Duplicate entry '114263-6' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('114263', 'ENDANG SULISTYA', 'YOGYAKARTA', '1968-11-02', 'Islam', 'SLEMAN', '089674759700', 'P', 'O', '17', '', '6')
