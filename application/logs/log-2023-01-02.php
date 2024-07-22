<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-01-02 21:33:52 --> Query error: Unknown column 'debit' in 'field list' - Invalid query: SELECT UNIX_TIMESTAMP(id) * 1000 id, COALESCE(total, 0) total
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
            WHERE a.id BETWEEN '2022-09-01' AND '2022-09-30'
        )h
        LEFT JOIN ( 
            SELECT tanggal, COUNT(DISTINCT id_jurnal_header) AS total, SUM(debit) total_debit, SUM(kredit) total_kredit FROM (
                SELECT `v_jurnal_concat`.`id_jurnal_header`, DATE(tanggal) tanggal, `nama`, GROUP_CONCAT(DISTINCT kode_akun SEPARATOR '<br />') kode_akun, GROUP_CONCAT(DISTINCT nama_akun SEPARATOR '<br />') nama_akun, SUM(debit) debit, SUM(kredit) kredit
FROM `v_jurnal_concat`
WHERE   (
`v_jurnal_concat`.`id_klinik` = '6'
AND `v_jurnal_concat`.`is_deleted` =0
AND  `nama` LIKE '%%' ESCAPE '!'
 )
GROUP BY `v_jurnal_concat`.`id_jurnal_header`
            )t 
            GROUP BY tanggal 
        )t ON t.tanggal = h.id ORDER BY h.id ASC;
ERROR - 2023-01-02 21:34:08 --> Query error: Unknown column 'debit' in 'field list' - Invalid query: SELECT UNIX_TIMESTAMP(id) * 1000 id, COALESCE(total, 0) total
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
            WHERE a.id BETWEEN '2022-09-01' AND '2022-09-30'
        )h
        LEFT JOIN ( 
            SELECT tanggal, COUNT(DISTINCT id_jurnal_header) AS total, SUM(debit) total_debit, SUM(kredit) total_kredit FROM (
                SELECT `v_jurnal_concat`.`id_jurnal_header`, DATE(tanggal) tanggal, `nama`, GROUP_CONCAT(DISTINCT kode_akun SEPARATOR '<br />') kode_akun, GROUP_CONCAT(DISTINCT nama_akun SEPARATOR '<br />') nama_akun, SUM(debit) debit, SUM(kredit) kredit
FROM `v_jurnal_concat`
WHERE   (
`v_jurnal_concat`.`id_klinik` = '6'
AND `v_jurnal_concat`.`is_deleted` =0
AND  `nama` LIKE '%%' ESCAPE '!'
 )
GROUP BY `v_jurnal_concat`.`id_jurnal_header`
            )t 
            GROUP BY tanggal 
        )t ON t.tanggal = h.id ORDER BY h.id ASC;
ERROR - 2023-01-02 22:16:06 --> 404 Page Not Found: RawatInap/admisi
