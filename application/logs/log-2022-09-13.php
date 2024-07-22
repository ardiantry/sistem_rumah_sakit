<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-09-13 14:28:42 --> Severity: Warning --> mysqli::query(): MySQL server has gone away /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-09-13 14:28:42 --> Severity: Warning --> mysqli::query(): Error reading result set's header /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-09-13 14:28:42 --> Query error: MySQL server has gone away - Invalid query: SELECT 
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
         
         AND tanggal BETWEEN '2021-01-05' AND '2021-01-31'        
        AND id_klinik = 6 AND is_deleted = 0
        HAVING 1=1        
         
         
        ORDER BY 
        tanggal DESC
        , id_jurnal_header DESC
        , debit DESC
        , kredit DESC;
ERROR - 2022-09-13 14:28:42 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/controllers/Laporan.php 2925
ERROR - 2022-09-13 14:28:42 --> Severity: Warning --> Error while sending QUERY packet. PID=3123087 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-09-13 14:28:42 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '24'
ERROR - 2022-09-13 14:28:42 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
ERROR - 2022-09-13 14:28:42 --> Severity: Warning --> Error while sending QUERY packet. PID=3123382 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-09-13 14:28:42 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '24'
ERROR - 2022-09-13 14:28:42 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
ERROR - 2022-09-13 14:28:42 --> Severity: Warning --> Error while sending QUERY packet. PID=3123132 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-09-13 14:28:42 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '24'
ERROR - 2022-09-13 14:28:42 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
ERROR - 2022-09-13 14:28:43 --> Severity: Warning --> Error while sending QUERY packet. PID=3123131 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-09-13 14:28:43 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '24'
ERROR - 2022-09-13 14:28:43 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
ERROR - 2022-09-13 14:28:43 --> Severity: Warning --> Error while sending QUERY packet. PID=3123089 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-09-13 14:28:43 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '24'
ERROR - 2022-09-13 14:28:43 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
ERROR - 2022-09-13 14:28:43 --> Severity: Warning --> Error while sending QUERY packet. PID=3123130 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-09-13 14:28:43 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '24'
ERROR - 2022-09-13 14:28:43 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
ERROR - 2022-09-13 16:05:27 --> Query error: Duplicate entry '004122-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('004122', 'MUH. FAJRUL IKHSAN', 'MAKASAR', '2001-06-23', 'Islam', 'MRISEN GENENG RT 7 GENENG, PANGGUNGHARJO, SEWON, BANTUL', '085156325576', 'L', 'B', '64', '', '7')
ERROR - 2022-09-13 16:13:43 --> Severity: Warning --> mysqli::query(): MySQL server has gone away /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-09-13 16:13:43 --> Severity: Warning --> mysqli::query(): MySQL server has gone away /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-09-13 16:13:43 --> Severity: Warning --> mysqli::query(): Error reading result set's header /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-09-13 16:13:43 --> Severity: Warning --> mysqli::query(): Error reading result set's header /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-09-13 16:13:43 --> Query error: MySQL server has gone away - Invalid query: UPDATE `users` SET `remember_selector` = NULL, `remember_code` = NULL
WHERE `email` = 'kintan@docomedika.com'
ERROR - 2022-09-13 16:13:43 --> Query error: MySQL server has gone away - Invalid query: SELECT UNIX_TIMESTAMP(id) * 1000 id, COALESCE(total, 0) total
        , COALESCE(total_debit, 0) total_debit 
        , COALESCE(total_kredit, 0) total_kredit         
        FROM (
            SELECT a.id
            FROM (
                SELECT CURDATE() - INTERVAL (a.a + (10 * b.a) + (100 * c.a) + (1000 * d.a) ) DAY AS id
                FROM (SELECT 0 as a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) as a
                CROSS JOIN (SELECT 0 as a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) as b
                CROSS JOIN (SELECT 0 as a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) as c
                CROSS JOIN (SELECT 0 as a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) as d
            ) a
            WHERE a.id BETWEEN '2022-01-01' AND '2022-01-15'
        )h
        LEFT JOIN ( 
            SELECT tanggal, COUNT(DISTINCT id_jurnal_header) AS total, SUM(debit) total_debit, SUM(kredit) total_kredit FROM (
                SELECT `v_jurnal`.`id_jurnal_header`, DATE(tanggal) tanggal, `nama`, GROUP_CONCAT(DISTINCT kode_akun SEPARATOR '<br />') kode_akun, GROUP_CONCAT(DISTINCT nama_akun SEPARATOR '<br />') nama_akun, SUM(debit) debit, SUM(kredit) kredit
FROM `v_jurnal`
WHERE   (
`v_jurnal`.`id_klinik` = '6'
AND `v_jurnal`.`is_deleted` =0
AND  `nama` LIKE '%%' ESCAPE '!'
 )
GROUP BY `v_jurnal`.`id_jurnal_header`
            )t 
            GROUP BY tanggal 
        )t ON t.tanggal = h.id ORDER BY h.id ASC;
ERROR - 2022-09-13 16:13:43 --> Query error: MySQL server has gone away - Invalid query: SELECT `id`
FROM `users`
WHERE `email` = 'kintan@docomedika.com'
 LIMIT 1
ERROR - 2022-09-13 16:13:43 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/controllers/Laporan.php 2664
ERROR - 2022-09-13 16:13:43 --> Severity: error --> Exception: Call to a member function num_rows() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 711
ERROR - 2022-09-13 16:13:43 --> Severity: Warning --> Error while sending QUERY packet. PID=3268669 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-09-13 16:13:43 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '27'
ERROR - 2022-09-13 16:13:43 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
ERROR - 2022-09-13 16:13:43 --> Severity: Warning --> Error while sending QUERY packet. PID=3267736 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-09-13 16:13:43 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '27'
ERROR - 2022-09-13 16:13:43 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
ERROR - 2022-09-13 17:40:59 --> Severity: Warning --> filesize(): stat failed for /var/cpanel/php/sessions/ea-php71/ci_session46c6ebf590029f8803e9748026e522f0ffc980f0 /home/simraish/public_html/v2/system/libraries/Session/drivers/Session_files_driver.php 208
ERROR - 2022-09-13 19:13:43 --> Severity: Warning --> mysqli_stmt::next_result(): MySQL server has gone away /home/simraish/public_html/v2/application/controllers/LaporanNew.php 1038
ERROR - 2022-09-13 19:13:43 --> Severity: Warning --> mysqli::query(): MySQL server has gone away /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-09-13 19:13:43 --> Severity: Warning --> mysqli_stmt::next_result(): Error reading result set's header /home/simraish/public_html/v2/application/controllers/LaporanNew.php 1038
ERROR - 2022-09-13 19:13:43 --> Severity: Warning --> mysqli::query(): Error reading result set's header /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-09-13 19:13:43 --> Query error: MySQL server has gone away - Invalid query: SELECT   id, COALESCE(total, 0) total
        , COALESCE(total_debit, 0) total_debit 
        , COALESCE(total_kredit, 0) total_kredit         
        FROM (
            SELECT a.id
            FROM (SELECT  CONCAT(DATE_FORMAT( min(CURDATE() - INTERVAL (a.a + (10 * b.a) + (100 * c.a) + (1000 * d.a) ) DAY), '%Y-'), '01-02')   AS id
                    FROM (SELECT 0 as a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) as a
                    CROSS JOIN (SELECT 0 as a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) as b
                    CROSS JOIN (SELECT 0 as a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) as c
                    CROSS JOIN (SELECT 0 as a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) as d 
                    group by DATE_FORMAT( CURDATE() - INTERVAL (a.a + (10 * b.a) + (100 * c.a) + (1000 * d.a) ) DAY, '%Y') 
                     ) a 
            WHERE year(a.id) BETWEEN year('2022-03-01') AND year('2022-03-31')

        )h
        LEFT JOIN ( 
            SELECT CONCAT(DATE_FORMAT( min(tanggal), '%Y-'), '01-02') tanggal, COUNT(DISTINCT id_jurnal_header) AS total, SUM(debit) total_debit, SUM(kredit) total_kredit FROM (
                SELECT `v_jurnal`.`id_jurnal_header`, DATE(tanggal) tanggal, `nama`, GROUP_CONCAT(DISTINCT kode_akun SEPARATOR '<br />') kode_akun, GROUP_CONCAT(DISTINCT nama_akun SEPARATOR '<br />') nama_akun, SUM(debit) debit, SUM(kredit) kredit
FROM `v_jurnal`
WHERE   (
`v_jurnal`.`id_klinik` = '6'
AND `v_jurnal`.`is_deleted` =0
AND  `nama` LIKE '%%' ESCAPE '!'
 )
GROUP BY `v_jurnal`.`id_jurnal_header`
            )t   WHERE tanggal BETWEEN '2022-03-01' AND '2022-03-31'
            GROUP BY DATE_FORMAT(tanggal , '%Y')  
        )t ON t.tanggal = h.id ORDER BY h.id ASC;
ERROR - 2022-09-13 19:13:43 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/controllers/Laporan.php 2924
ERROR - 2022-09-13 19:13:43 --> Severity: Warning --> Error while sending QUERY packet. PID=3521738 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-09-13 19:13:43 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '27'
ERROR - 2022-09-13 19:13:43 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
ERROR - 2022-09-13 19:13:43 --> Severity: Warning --> Error while sending QUERY packet. PID=3521735 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-09-13 19:13:43 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '27'
ERROR - 2022-09-13 19:13:43 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
ERROR - 2022-09-13 19:14:27 --> Severity: Warning --> Error while sending QUERY packet. PID=3521395 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-09-13 19:14:27 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '160'
ERROR - 2022-09-13 19:14:27 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
ERROR - 2022-09-13 22:02:28 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `is_deleted` =0' at line 3 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `v_pelanggan`
WHERE `id_klinik` = AND `is_deleted` =0
ERROR - 2022-09-13 22:02:28 --> Severity: error --> Exception: Call to a member function num_rows() on boolean /home/simraish/public_html/v2/system/database/DB_query_builder.php 1424
ERROR - 2022-09-13 22:10:06 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `is_deleted` =0' at line 3 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `v_transaksi_obat`
WHERE `state_index` = 1 AND `id_pelanggan` IS NOT NULL AND `id_klinik` = AND `is_deleted` =0
ERROR - 2022-09-13 22:10:06 --> Severity: error --> Exception: Call to a member function num_rows() on boolean /home/simraish/public_html/v2/system/database/DB_query_builder.php 1424
