<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-09-15 17:58:51 --> Severity: Warning --> mysqli::query(): MySQL server has gone away /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-09-15 17:58:51 --> Severity: Warning --> mysqli::query(): Error reading result set's header /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-09-15 17:58:51 --> Query error: MySQL server has gone away - Invalid query: SELECT UNIX_TIMESTAMP(id) * 1000 id, COALESCE(total, 0) total
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
            WHERE a.id BETWEEN '2022-04-26' AND '2022-04-26'
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
ERROR - 2022-09-15 17:58:51 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/controllers/Laporan.php 2664
ERROR - 2022-09-15 17:58:51 --> Severity: Warning --> Error while sending QUERY packet. PID=3448700 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-09-15 17:58:51 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '175'
ERROR - 2022-09-15 17:58:51 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
ERROR - 2022-09-15 17:58:51 --> Severity: Warning --> Error while sending QUERY packet. PID=3448702 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-09-15 17:58:51 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '175'
ERROR - 2022-09-15 17:58:51 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
ERROR - 2022-09-15 17:58:51 --> Severity: Warning --> Error while sending QUERY packet. PID=3448701 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-09-15 17:58:51 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '175'
ERROR - 2022-09-15 17:58:51 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
ERROR - 2022-09-15 18:13:51 --> Severity: Warning --> mysqli::query(): MySQL server has gone away /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-09-15 18:13:51 --> Severity: Warning --> mysqli::query(): Error reading result set's header /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-09-15 18:13:51 --> Query error: MySQL server has gone away - Invalid query: SELECT 
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
         
         AND tanggal BETWEEN '2022-09-01' AND '2022-09-14'        
        AND id_klinik = 6 AND is_deleted = 0
        HAVING 1=1        
         
         
        ORDER BY 
        tanggal DESC
        , id_jurnal_header DESC
        , debit DESC
        , kredit DESC;
ERROR - 2022-09-15 18:13:51 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/controllers/Laporan.php 2665
ERROR - 2022-09-15 18:13:51 --> Severity: Warning --> Error while sending QUERY packet. PID=3470196 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-09-15 18:13:51 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '27'
ERROR - 2022-09-15 18:13:51 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
ERROR - 2022-09-15 18:13:51 --> Severity: Warning --> Error while sending QUERY packet. PID=3469026 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-09-15 18:13:51 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '27'
ERROR - 2022-09-15 18:13:51 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
ERROR - 2022-09-15 18:13:51 --> Severity: Warning --> Error while sending QUERY packet. PID=3469025 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-09-15 18:13:51 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '27'
ERROR - 2022-09-15 18:13:51 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
ERROR - 2022-09-15 18:13:51 --> Severity: Warning --> Error while sending QUERY packet. PID=3470198 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-09-15 18:13:51 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '27'
ERROR - 2022-09-15 18:13:51 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
ERROR - 2022-09-15 18:13:51 --> Severity: Warning --> Error while sending QUERY packet. PID=3470197 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-09-15 18:13:51 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '27'
ERROR - 2022-09-15 18:13:51 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
ERROR - 2022-09-15 22:01:28 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `id_klinik` = AND `is_deleted` =0' at line 3 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `v_register_pasien`
WHERE `id_pasien` =  AND `id_klinik` = AND `is_deleted` =0
ERROR - 2022-09-15 22:01:28 --> Severity: error --> Exception: Call to a member function num_rows() on boolean /home/simraish/public_html/v2/system/database/DB_query_builder.php 1424
