<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-10-10 10:09:32 --> Query error: Duplicate entry '004388-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('004388', 'GIYONO SISWOPRANOTO', 'SLEMAN', '1939-03-27', 'Islam', 'NGAWEN RT 002 RW 011 TRIHANGGI, GAMPING, SLEMAN', '085878804269', 'L', NULL, '94', '', '7')
ERROR - 2022-10-10 15:50:18 --> Query error: Duplicate entry '004390-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('004390', 'ELFIRA ANZELYNA', 'YOGYAKARTA', '2001-12-13', 'Islam', 'PENUMPING JT 3/114 YOGYAKARTA', '088233917542', 'P', 'O', '64', '', '7')
ERROR - 2022-10-10 17:45:15 --> Query error: Duplicate entry '004394-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('004394', 'DYAN', 'MEGANG SAKTI', '2000-05-20', 'Kristen ', 'KRODAN', '081271434253', 'L', NULL, '37', '', '7')
ERROR - 2022-10-10 19:44:46 --> Severity: Warning --> mysqli::query(): MySQL server has gone away /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-10 19:44:46 --> Severity: Warning --> mysqli::query(): MySQL server has gone away /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-10 19:44:46 --> Severity: Warning --> mysqli::query(): MySQL server has gone away /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-10 19:44:46 --> Severity: Warning --> mysqli::query(): Error reading result set's header /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-10 19:44:46 --> Severity: Warning --> mysqli::query(): Error reading result set's header /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-10 19:44:46 --> Severity: Warning --> mysqli::query(): Error reading result set's header /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-10 19:44:46 --> Query error: MySQL server has gone away - Invalid query: SELECT `users`.*, `users`.`id` as `id`, `users`.`id` as `user_id`
FROM `users`
WHERE `users`.`id` = '115'
ORDER BY `users`.`id` DESC
 LIMIT 1
ERROR - 2022-10-10 19:44:46 --> Query error: MySQL server has gone away - Invalid query: SELECT COUNT(*) new_pasien FROM pasien
            WHERE CAST(created_at as DATE) = '2022-10-10' AND id_klinik=6
ERROR - 2022-10-10 19:44:46 --> Severity: error --> Exception: Call to a member function row() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1316
ERROR - 2022-10-10 19:44:46 --> Severity: error --> Exception: Call to a member function row() on boolean /home/simraish/public_html/v2/application/models/Dashboard_model.php 187
ERROR - 2022-10-10 19:44:46 --> Query error: MySQL server has gone away - Invalid query: SELECT 
        id_jurnal_header
        , tanggal
        , nama
        , kode_akun
        , nama_akun
        , debit
        , kredit
        , debit_display
        , kredit_display
        , (
        SELECT SUM(debit)
        FROM v_jurnal v
        WHERE v.id_jurnal_header = v_jurnal.id_jurnal_header
         AND CONCAT(kode_akun, ' - ', nama_akun) IN ('1.1.2 - Kas Bank')        
        ) AS total_debit
        , (
        SELECT SUM(kredit)
        FROM v_jurnal v
        WHERE v.id_jurnal_header = v_jurnal.id_jurnal_header
         AND CONCAT(kode_akun, ' - ', nama_akun) IN ('1.1.2 - Kas Bank')        
        ) AS total_kredit
        FROM v_jurnal
        WHERE 1=1
         AND  `nama` LIKE '%%' ESCAPE '!'
         AND CONCAT(kode_akun, ' - ', nama_akun) IN ('1.1.2 - Kas Bank')
         AND tanggal BETWEEN '2022-10-10' AND '2022-10-10'        
        AND id_klinik = 7 AND is_deleted = 0
        HAVING 1=1        
         
         
        ORDER BY 
        tanggal DESC
        , id_jurnal_header DESC
        , debit DESC
        , kredit DESC;
ERROR - 2022-10-10 19:44:46 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/controllers/Laporan.php 2925
ERROR - 2022-10-10 19:44:46 --> Severity: Warning --> Error while sending QUERY packet. PID=2012730 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-10 19:44:46 --> Query error: MySQL server has gone away - Invalid query: SELECT `users`.*, `users`.`id` as `id`, `users`.`id` as `user_id`
FROM `users`
WHERE `users`.`id` = '160'
ORDER BY `users`.`id` DESC
 LIMIT 1
ERROR - 2022-10-10 19:44:46 --> Severity: error --> Exception: Call to a member function row() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1316
ERROR - 2022-10-10 19:44:46 --> Severity: Warning --> Error while sending QUERY packet. PID=2012264 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-10 19:44:46 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '122'
ERROR - 2022-10-10 19:44:46 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
ERROR - 2022-10-10 19:44:46 --> Severity: Warning --> Error while sending QUERY packet. PID=2011672 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-10 19:44:46 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '122'
ERROR - 2022-10-10 19:44:46 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
ERROR - 2022-10-10 19:44:46 --> Severity: Warning --> Error while sending QUERY packet. PID=2012262 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-10 19:44:46 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '122'
ERROR - 2022-10-10 19:44:46 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
ERROR - 2022-10-10 19:44:46 --> Severity: Warning --> Error while sending QUERY packet. PID=2012778 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-10 19:44:46 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '122'
ERROR - 2022-10-10 19:44:46 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
ERROR - 2022-10-10 19:44:46 --> Severity: Warning --> Error while sending QUERY packet. PID=2012263 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-10 19:44:46 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '122'
ERROR - 2022-10-10 19:44:46 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
