<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-07-26 08:14:05 --> 404 Page Not Found: Robotstxt/index
ERROR - 2022-07-26 08:14:05 --> 404 Page Not Found: Robotstxt/index
ERROR - 2022-07-26 08:14:07 --> 404 Page Not Found: Robotstxt/index
ERROR - 2022-07-26 08:14:08 --> 404 Page Not Found: Robotstxt/index
ERROR - 2022-07-26 08:15:54 --> 404 Page Not Found: Adstxt/index
ERROR - 2022-07-26 12:24:49 --> Severity: Warning --> mysqli::query(): MySQL server has gone away /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-07-26 12:24:49 --> Severity: Warning --> mysqli::query(): Error reading result set's header /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-07-26 12:24:49 --> Query error: MySQL server has gone away - Invalid query: SELECT 
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
         AND CONCAT(kode_akun, ' - ', nama_akun) IN ('1.1.1 - Kas')        
        ) AS total_debit
        , (
        SELECT SUM(kredit)
        FROM v_jurnal v
        WHERE v.id_jurnal_header = v_jurnal.id_jurnal_header
         AND CONCAT(kode_akun, ' - ', nama_akun) IN ('1.1.1 - Kas')        
        ) AS total_kredit
        FROM v_jurnal
        WHERE 1=1
         AND  `nama` LIKE '%%' ESCAPE '!'
         AND CONCAT(kode_akun, ' - ', nama_akun) IN ('1.1.1 - Kas')
         AND tanggal BETWEEN '2022-07-25' AND '2022-07-26'        
        AND id_klinik = 7 AND is_deleted = 0
        HAVING 1=1        
         
         
        ORDER BY 
        tanggal DESC
        , id_jurnal_header DESC
        , debit DESC
        , kredit DESC;
ERROR - 2022-07-26 12:24:49 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/controllers/Laporan.php 2925
ERROR - 2022-07-26 12:24:49 --> Severity: Warning --> Error while sending QUERY packet. PID=3910397 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-07-26 12:24:49 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '122'
ERROR - 2022-07-26 12:24:49 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
ERROR - 2022-07-26 12:24:49 --> Severity: Warning --> Error while sending QUERY packet. PID=3910398 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-07-26 12:24:49 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '122'
ERROR - 2022-07-26 12:24:49 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
ERROR - 2022-07-26 12:24:49 --> Severity: Warning --> Error while sending QUERY packet. PID=3910462 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-07-26 12:24:49 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '122'
ERROR - 2022-07-26 12:24:49 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
ERROR - 2022-07-26 12:24:49 --> Severity: Warning --> Error while sending QUERY packet. PID=3910464 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-07-26 12:24:49 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '122'
ERROR - 2022-07-26 12:24:49 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
ERROR - 2022-07-26 12:24:49 --> Severity: Warning --> Error while sending QUERY packet. PID=3910463 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-07-26 12:24:49 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '122'
ERROR - 2022-07-26 12:24:49 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
ERROR - 2022-07-26 17:05:32 --> Query error: Duplicate entry '003695-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('003695', 'FATHAN ARYA DENTA ASMARA', 'SLEMAN', '2014-12-10', 'Islam', 'JALAN PALAGAN TENTARA PELAJAR NO.78 SLEMAN, YOGYAKARTA', '08179414000', 'L', 'B', '64', '', '7')
ERROR - 2022-07-26 17:32:31 --> Severity: Warning --> mysqli::query(): MySQL server has gone away /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-07-26 17:32:31 --> Severity: Warning --> mysqli::query(): Error reading result set's header /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-07-26 17:32:31 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `v_register_pasien_layanan`
WHERE `id_register_pasien` = '18680'
ERROR - 2022-07-26 17:32:31 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/RegisterPasienLayanan_model.php 28
ERROR - 2022-07-26 17:32:31 --> Severity: Warning --> Error while sending QUERY packet. PID=219237 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-07-26 17:32:31 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `v_register_pasien_icd10`
WHERE `id_register_pasien` = '18680'
ERROR - 2022-07-26 17:32:31 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/RegisterPasienIcd10_model.php 27
ERROR - 2022-07-26 17:32:31 --> Severity: Warning --> Error while sending QUERY packet. PID=219236 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-07-26 17:32:31 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `v_register_pasien_icd9`
WHERE `id_register_pasien` = '18680'
ERROR - 2022-07-26 17:32:31 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/RegisterPasienIcd9_model.php 28
ERROR - 2022-07-26 17:32:31 --> Severity: Warning --> Error while sending QUERY packet. PID=219238 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-07-26 17:32:31 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `register_pasien_rencana_kontrol`
WHERE `id_register_pasien` = '18680'
ERROR - 2022-07-26 17:32:31 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/RegisterPasienRencanaKontrol_model.php 23
ERROR - 2022-07-26 17:32:31 --> Severity: Warning --> Error while sending QUERY packet. PID=219234 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-07-26 17:32:31 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `v_register_pasien_obat`
WHERE `id_register_pasien` = '18680'
AND `is_paket` =0
ERROR - 2022-07-26 17:32:31 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/RegisterPasienObat_model.php 81
ERROR - 2022-07-26 17:32:31 --> Severity: Warning --> Error while sending QUERY packet. PID=219233 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-07-26 17:32:31 --> Query error: MySQL server has gone away - Invalid query: SELECT `users`.*, `users`.`id` as `id`, `users`.`id` as `user_id`
FROM `users`
WHERE `users`.`id` = '29'
ORDER BY `users`.`id` DESC
 LIMIT 1
ERROR - 2022-07-26 17:32:31 --> Severity: error --> Exception: Call to a member function row() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1316
ERROR - 2022-07-26 18:30:18 --> Query error: Duplicate entry '10535-16' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('10535', 'RAFAYET KHALIFANO SHAKI', 'YOGYAKARTA', '2022-04-05', NULL, 'PUCUNG RT 54 PENDOWOHARJO SEWON BANTUL', '081227077122', 'L', NULL, NULL, '', '16')
ERROR - 2022-07-26 18:35:55 --> Severity: Warning --> mysqli::commit(): MySQL server has gone away /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 354
ERROR - 2022-07-26 18:35:55 --> Severity: Warning --> mysqli::commit(): Error reading result set's header /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 354
ERROR - 2022-07-26 18:35:55 --> Severity: Warning --> mysqli::query(): MySQL server has gone away /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-07-26 18:35:55 --> Severity: Warning --> mysqli::query(): Error reading result set's header /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-07-26 18:35:55 --> Query error: MySQL server has gone away - Invalid query: SELECT SUM(total_transaction) total_transaction FROM (
                SELECT COUNT(*) total_transaction FROM register_pasien
                WHERE CAST(tanggal_bayar as DATE) = '2022-07-26' AND id_klinik= 7
                UNION ALL
                SELECT COUNT(*) total_transaction FROM transaksi_obat
                WHERE CAST(tanggal_bayar as DATE) = '2022-07-26' AND id_klinik= 7
            )t
ERROR - 2022-07-26 18:35:55 --> Severity: error --> Exception: Call to a member function row() on boolean /home/simraish/public_html/v2/application/models/Dashboard_model.php 40
ERROR - 2022-07-26 18:35:55 --> Severity: Warning --> Error while sending QUERY packet. PID=329724 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-07-26 18:35:55 --> Query error: MySQL server has gone away - Invalid query: SELECT `users`.*, `users`.`id` as `id`, `users`.`id` as `user_id`
FROM `users`
WHERE `users`.`id` = '50'
ORDER BY `users`.`id` DESC
 LIMIT 1
ERROR - 2022-07-26 18:35:55 --> Severity: error --> Exception: Call to a member function row() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1316
ERROR - 2022-07-26 18:35:55 --> Severity: Warning --> Error while sending QUERY packet. PID=330507 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-07-26 18:35:55 --> Query error: MySQL server has gone away - Invalid query: SELECT `users`.*, `users`.`id` as `id`, `users`.`id` as `user_id`
FROM `users`
WHERE `users`.`id` = '111'
ORDER BY `users`.`id` DESC
 LIMIT 1
ERROR - 2022-07-26 18:35:55 --> Severity: error --> Exception: Call to a member function row() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1316
ERROR - 2022-07-26 18:35:55 --> Severity: Warning --> Error while sending QUERY packet. PID=328454 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-07-26 18:35:55 --> Query error: MySQL server has gone away - Invalid query: SELECT `users`.*, `users`.`id` as `id`, `users`.`id` as `user_id`
FROM `users`
WHERE `users`.`id` = '111'
ORDER BY `users`.`id` DESC
 LIMIT 1
ERROR - 2022-07-26 18:35:55 --> Severity: error --> Exception: Call to a member function row() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1316
ERROR - 2022-07-26 18:35:56 --> Severity: Warning --> mysqli::query(): MySQL server has gone away /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-07-26 18:35:56 --> Severity: Warning --> mysqli::query(): Error reading result set's header /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-07-26 18:35:56 --> Query error: MySQL server has gone away - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `v_register_pasien`
WHERE `id_klinik` = 7 AND `is_deleted` =0 AND `state_index` <> 3 AND `state_index` >=0 AND `jenis_pemeriksaan` <> 'Paket Layanan' 
ERROR - 2022-07-26 18:35:56 --> Severity: error --> Exception: Call to a member function num_rows() on boolean /home/simraish/public_html/v2/system/database/DB_query_builder.php 1424
ERROR - 2022-07-26 18:35:56 --> Severity: Warning --> Error while sending QUERY packet. PID=330493 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-07-26 18:35:56 --> Query error: MySQL server has gone away - Invalid query: SELECT `users`.*, `users`.`id` as `id`, `users`.`id` as `user_id`
FROM `users`
WHERE `users`.`id` = '177'
ORDER BY `users`.`id` DESC
 LIMIT 1
ERROR - 2022-07-26 18:35:56 --> Severity: error --> Exception: Call to a member function row() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1316
ERROR - 2022-07-26 18:53:42 --> Severity: Warning --> mysqli::query(): MySQL server has gone away /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-07-26 18:53:42 --> Severity: Warning --> mysqli::query(): Error reading result set's header /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-07-26 18:53:42 --> Query error: MySQL server has gone away - Invalid query: SELECT 
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
                 
        ) AS total_debit
        , (
        SELECT SUM(kredit)
        FROM v_jurnal v
        WHERE v.id_jurnal_header = v_jurnal.id_jurnal_header
                 
        ) AS total_kredit
        FROM v_jurnal
        WHERE 1=1
         AND  `nama` LIKE '%%' ESCAPE '!'
         
         AND tanggal BETWEEN '2022-07-26' AND '2022-07-26'        
        AND id_klinik = 6 AND is_deleted = 0
        HAVING 1=1        
         
         
        ORDER BY 
        tanggal DESC
        , id_jurnal_header DESC
        , debit DESC
        , kredit DESC;
ERROR - 2022-07-26 18:53:42 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/controllers/Laporan.php 2665
ERROR - 2022-07-26 18:53:42 --> Severity: Warning --> Error while sending QUERY packet. PID=363513 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-07-26 18:53:42 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '175'
ERROR - 2022-07-26 18:53:42 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
ERROR - 2022-07-26 18:53:42 --> Severity: Warning --> Error while sending QUERY packet. PID=363593 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-07-26 18:53:42 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '175'
ERROR - 2022-07-26 18:53:42 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
ERROR - 2022-07-26 18:53:42 --> Severity: Warning --> Error while sending QUERY packet. PID=363591 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-07-26 18:53:42 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '175'
ERROR - 2022-07-26 18:53:42 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
ERROR - 2022-07-26 18:53:42 --> Severity: Warning --> Error while sending QUERY packet. PID=363592 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-07-26 18:53:42 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '175'
ERROR - 2022-07-26 18:53:42 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
ERROR - 2022-07-26 18:53:42 --> Severity: Warning --> Error while sending QUERY packet. PID=363512 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-07-26 18:53:42 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '175'
ERROR - 2022-07-26 18:53:42 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
ERROR - 2022-07-26 18:53:43 --> Severity: Warning --> Error while sending QUERY packet. PID=363631 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-07-26 18:53:43 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '175'
ERROR - 2022-07-26 18:53:43 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
ERROR - 2022-07-26 18:53:43 --> Severity: Warning --> Error while sending QUERY packet. PID=363511 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-07-26 18:53:43 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '175'
ERROR - 2022-07-26 18:53:43 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
ERROR - 2022-07-26 18:53:43 --> Severity: Warning --> Error while sending QUERY packet. PID=363594 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-07-26 18:53:43 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '175'
ERROR - 2022-07-26 18:53:43 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
ERROR - 2022-07-26 18:53:43 --> Severity: Warning --> Error while sending QUERY packet. PID=363630 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-07-26 18:53:43 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '175'
ERROR - 2022-07-26 18:53:43 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
ERROR - 2022-07-26 18:56:10 --> Query error: Duplicate entry '003698-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('003698', 'ANDRE BIMA FALAH RABBANI', 'KEBUMEN', '1998-04-24', 'Islam', 'GEJAYAN, SLEMAN', '0895358929424', 'P', 'O', '63', '', '7')
ERROR - 2022-07-26 18:56:11 --> Query error: Duplicate entry '003698-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('003698', 'ANDRE BIMA FALAH RABBANI', 'KEBUMEN', '1998-04-24', 'Islam', 'GEJAYAN, SLEMAN', '0895358929424', 'P', 'O', '63', '', '7')
ERROR - 2022-07-26 19:48:11 --> Severity: Warning --> mysqli::query(): MySQL server has gone away /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-07-26 19:48:11 --> Severity: Warning --> mysqli::query(): Error reading result set's header /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-07-26 19:48:11 --> Query error: MySQL server has gone away - Invalid query: SELECT 
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
         AND CONCAT(kode_akun, ' - ', nama_akun) IN ('1.1.1 - Kas')        
        ) AS total_debit
        , (
        SELECT SUM(kredit)
        FROM v_jurnal v
        WHERE v.id_jurnal_header = v_jurnal.id_jurnal_header
         AND CONCAT(kode_akun, ' - ', nama_akun) IN ('1.1.1 - Kas')        
        ) AS total_kredit
        FROM v_jurnal
        WHERE 1=1
         AND  `nama` LIKE '%%' ESCAPE '!'
         AND CONCAT(kode_akun, ' - ', nama_akun) IN ('1.1.1 - Kas')
         AND tanggal BETWEEN '2022-07-26' AND '2022-07-26'        
        AND id_klinik = 7 AND is_deleted = 0
        HAVING 1=1        
         
         
        ORDER BY 
        tanggal DESC
        , id_jurnal_header DESC
        , debit DESC
        , kredit DESC;
ERROR - 2022-07-26 19:48:11 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/controllers/Laporan.php 2665
ERROR - 2022-07-26 19:48:11 --> Severity: Warning --> Error while sending QUERY packet. PID=475213 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-07-26 19:48:11 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '122'
ERROR - 2022-07-26 19:48:11 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
ERROR - 2022-07-26 19:48:11 --> Severity: Warning --> Error while sending QUERY packet. PID=475679 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-07-26 19:48:11 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '122'
ERROR - 2022-07-26 19:48:11 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
ERROR - 2022-07-26 19:48:11 --> Severity: Warning --> Error while sending QUERY packet. PID=475678 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-07-26 19:48:11 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '122'
ERROR - 2022-07-26 19:48:11 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
ERROR - 2022-07-26 19:48:11 --> Severity: Warning --> Error while sending QUERY packet. PID=475680 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-07-26 19:48:11 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '122'
ERROR - 2022-07-26 19:48:11 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
ERROR - 2022-07-26 19:48:11 --> Severity: Warning --> Error while sending QUERY packet. PID=475207 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-07-26 19:48:11 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '122'
ERROR - 2022-07-26 19:48:11 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
ERROR - 2022-07-26 19:50:18 --> Severity: Warning --> mysqli::query(): MySQL server has gone away /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-07-26 19:50:18 --> Severity: Warning --> mysqli::query(): Error reading result set's header /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-07-26 19:50:18 --> Query error: MySQL server has gone away - Invalid query: SELECT 
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
         AND CONCAT(kode_akun, ' - ', nama_akun) IN ('1.1.1 - Kas')        
        ) AS total_debit
        , (
        SELECT SUM(kredit)
        FROM v_jurnal v
        WHERE v.id_jurnal_header = v_jurnal.id_jurnal_header
         AND CONCAT(kode_akun, ' - ', nama_akun) IN ('1.1.1 - Kas')        
        ) AS total_kredit
        FROM v_jurnal
        WHERE 1=1
         AND  `nama` LIKE '%%' ESCAPE '!'
         AND CONCAT(kode_akun, ' - ', nama_akun) IN ('1.1.1 - Kas')
         AND tanggal BETWEEN '2022-07-26' AND '2022-07-26'        
        AND id_klinik = 7 AND is_deleted = 0
        HAVING 1=1        
         
         
        ORDER BY 
        tanggal DESC
        , id_jurnal_header DESC
        , debit DESC
        , kredit DESC;
ERROR - 2022-07-26 19:50:18 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/controllers/Laporan.php 2795
ERROR - 2022-07-26 19:50:18 --> Severity: Warning --> Error while sending QUERY packet. PID=479070 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-07-26 19:50:18 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '122'
ERROR - 2022-07-26 19:50:18 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
ERROR - 2022-07-26 19:50:18 --> Severity: Warning --> Error while sending QUERY packet. PID=479113 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-07-26 19:50:18 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '122'
ERROR - 2022-07-26 19:50:18 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
ERROR - 2022-07-26 19:50:18 --> Severity: Warning --> Error while sending QUERY packet. PID=479808 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-07-26 19:50:18 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '122'
ERROR - 2022-07-26 19:50:18 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
ERROR - 2022-07-26 19:50:18 --> Severity: Warning --> Error while sending QUERY packet. PID=479110 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-07-26 19:50:18 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '122'
ERROR - 2022-07-26 19:50:18 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
ERROR - 2022-07-26 19:50:18 --> Severity: Warning --> Error while sending QUERY packet. PID=479112 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-07-26 19:50:18 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '122'
ERROR - 2022-07-26 19:50:18 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
