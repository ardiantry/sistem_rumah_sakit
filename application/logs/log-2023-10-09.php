<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-10-09 12:45:23 --> Query error: Table 'db_simraisha.v_register_pasien' doesn't exist - Invalid query: SELECT *
FROM `v_register_pasien`
WHERE `id` = '10840'
ERROR - 2023-10-09 12:52:11 --> Severity: Notice --> Trying to get property 'privilege_status' of non-object /Applications/XAMPP/xamppfiles/htdocs/simraisha/application/controllers/RawatJalan.php 106
ERROR - 2023-10-09 12:52:11 --> Severity: Notice --> Trying to get property 'privilege_status' of non-object /Applications/XAMPP/xamppfiles/htdocs/simraisha/application/controllers/RawatJalan.php 107
ERROR - 2023-10-09 12:52:11 --> Severity: Notice --> Trying to get property 'privilege_status' of non-object /Applications/XAMPP/xamppfiles/htdocs/simraisha/application/controllers/RawatJalan.php 108
ERROR - 2023-10-09 12:52:11 --> Severity: Notice --> Trying to get property 'privilege_status' of non-object /Applications/XAMPP/xamppfiles/htdocs/simraisha/application/controllers/RawatJalan.php 109
ERROR - 2023-10-09 14:04:00 --> Severity: error --> Exception: syntax error, unexpected 'totalRecord' (T_STRING), expecting ')' /Applications/XAMPP/xamppfiles/htdocs/simraisha/application/models/Afiliasi_model.php 67
ERROR - 2023-10-09 14:04:13 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'ORDER BY tb_afoloasi_pasien.id DESC' at line 8 - Invalid query: SELECT 
            tb_afiliasi_pasien.*, 
            layanan.nama_layanan ,
            tb_afiliator.first_name as nama_afiliator,
            tb_afiliator.identity as email_afiliator FROM tb_afiliasi_pasien 
            LEFT JOIN layanan ON tb_afiliasi_pasien.id_layanan = layanan.id 
            LEFT JOIN tb_afiliator ON  tb_afiliasi_pasien.id_afiliasi = tb_afiliator.id
            WHERE tb_afiliasi_pasien.id_klinik=1   LIMIT 10 OFFSET 0 ORDER BY tb_afoloasi_pasien.id DESC
ERROR - 2023-10-09 14:04:21 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'ORDER BY tb_afoloasi_pasien.id DESC' at line 8 - Invalid query: SELECT 
            tb_afiliasi_pasien.*, 
            layanan.nama_layanan ,
            tb_afiliator.first_name as nama_afiliator,
            tb_afiliator.identity as email_afiliator FROM tb_afiliasi_pasien 
            LEFT JOIN layanan ON tb_afiliasi_pasien.id_layanan = layanan.id 
            LEFT JOIN tb_afiliator ON  tb_afiliasi_pasien.id_afiliasi = tb_afiliator.id
            WHERE tb_afiliasi_pasien.id_klinik=1   LIMIT 10 OFFSET 0 ORDER BY tb_afoloasi_pasien.id DESC
ERROR - 2023-10-09 14:04:47 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'ORDER BY tb_afiliasi_pasien.id DESC' at line 8 - Invalid query: SELECT 
            tb_afiliasi_pasien.*, 
            layanan.nama_layanan ,
            tb_afiliator.first_name as nama_afiliator,
            tb_afiliator.identity as email_afiliator FROM tb_afiliasi_pasien 
            LEFT JOIN layanan ON tb_afiliasi_pasien.id_layanan = layanan.id 
            LEFT JOIN tb_afiliator ON  tb_afiliasi_pasien.id_afiliasi = tb_afiliator.id
            WHERE tb_afiliasi_pasien.id_klinik=1   LIMIT 10 OFFSET 0 ORDER BY tb_afiliasi_pasien.id DESC
ERROR - 2023-10-09 14:07:07 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'ORDER BY tb_afiliasi_pasien.id DESC' at line 8 - Invalid query: SELECT 
            tb_afiliasi_pasien.*, 
            layanan.nama_layanan ,
            tb_afiliator.first_name as nama_afiliator,
            tb_afiliator.identity as email_afiliator FROM tb_afiliasi_pasien 
            LEFT JOIN layanan ON tb_afiliasi_pasien.id_layanan = layanan.id 
            LEFT JOIN tb_afiliator ON  tb_afiliasi_pasien.id_afiliasi = tb_afiliator.id
            WHERE tb_afiliasi_pasien.id_klinik=1   LIMIT 10 OFFSET 0 ORDER BY tb_afiliasi_pasien.id DESC
ERROR - 2023-10-09 14:07:59 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'ORDER BY tb_afiliasi_pasien.id DESC' at line 8 - Invalid query: SELECT 
            tb_afiliasi_pasien.*, 
            layanan.nama_layanan ,
            tb_afiliator.first_name as nama_afiliator,
            tb_afiliator.identity as email_afiliator FROM tb_afiliasi_pasien 
            LEFT JOIN layanan ON tb_afiliasi_pasien.id_layanan = layanan.id 
            LEFT JOIN tb_afiliator ON  tb_afiliasi_pasien.id_afiliasi = tb_afiliator.id
            WHERE tb_afiliasi_pasien.id_klinik=1   LIMIT 10 OFFSET 0 ORDER BY tb_afiliasi_pasien.id DESC
ERROR - 2023-10-09 14:23:28 --> Severity: Notice --> Trying to get property 'privilege_status' of non-object /Applications/XAMPP/xamppfiles/htdocs/simraisha/application/controllers/RawatJalan.php 106
ERROR - 2023-10-09 14:23:28 --> Severity: Notice --> Trying to get property 'privilege_status' of non-object /Applications/XAMPP/xamppfiles/htdocs/simraisha/application/controllers/RawatJalan.php 107
ERROR - 2023-10-09 14:23:28 --> Severity: Notice --> Trying to get property 'privilege_status' of non-object /Applications/XAMPP/xamppfiles/htdocs/simraisha/application/controllers/RawatJalan.php 108
ERROR - 2023-10-09 14:23:28 --> Severity: Notice --> Trying to get property 'privilege_status' of non-object /Applications/XAMPP/xamppfiles/htdocs/simraisha/application/controllers/RawatJalan.php 109
ERROR - 2023-10-09 14:35:33 --> Severity: Notice --> Trying to get property 'user_id' of non-object /Applications/XAMPP/xamppfiles/htdocs/simraisha/application/models/Menu_model.php 12
ERROR - 2023-10-09 14:35:33 --> Severity: Notice --> Trying to get property 'first_name' of non-object /Applications/XAMPP/xamppfiles/htdocs/simraisha/application/views/template/sidebar.php 19
ERROR - 2023-10-09 14:35:33 --> Severity: Notice --> Trying to get property 'last_name' of non-object /Applications/XAMPP/xamppfiles/htdocs/simraisha/application/views/template/sidebar.php 19
ERROR - 2023-10-09 14:35:33 --> Severity: Notice --> Trying to get property 'first_name' of non-object /Applications/XAMPP/xamppfiles/htdocs/simraisha/application/views/themes/adminLTE.php 206
ERROR - 2023-10-09 14:35:33 --> Severity: Notice --> Trying to get property 'last_name' of non-object /Applications/XAMPP/xamppfiles/htdocs/simraisha/application/views/themes/adminLTE.php 206
ERROR - 2023-10-09 15:02:23 --> Severity: Notice --> Trying to get property 'user_id' of non-object /Applications/XAMPP/xamppfiles/htdocs/simraisha/application/models/Menu_model.php 12
ERROR - 2023-10-09 15:02:23 --> Severity: Notice --> Trying to get property 'first_name' of non-object /Applications/XAMPP/xamppfiles/htdocs/simraisha/application/views/template/sidebar.php 19
ERROR - 2023-10-09 15:02:23 --> Severity: Notice --> Trying to get property 'last_name' of non-object /Applications/XAMPP/xamppfiles/htdocs/simraisha/application/views/template/sidebar.php 19
ERROR - 2023-10-09 15:02:23 --> Severity: Notice --> Trying to get property 'first_name' of non-object /Applications/XAMPP/xamppfiles/htdocs/simraisha/application/views/themes/adminLTE.php 206
ERROR - 2023-10-09 15:02:23 --> Severity: Notice --> Trying to get property 'last_name' of non-object /Applications/XAMPP/xamppfiles/htdocs/simraisha/application/views/themes/adminLTE.php 206
ERROR - 2023-10-09 16:47:21 --> Severity: Notice --> Undefined variable: getKomisi /Applications/XAMPP/xamppfiles/htdocs/simraisha/application/controllers/Afiliasi.php 164
ERROR - 2023-10-09 16:47:21 --> Severity: Notice --> Undefined variable: getKomisi /Applications/XAMPP/xamppfiles/htdocs/simraisha/application/controllers/Afiliasi.php 165
ERROR - 2023-10-09 16:47:21 --> Severity: Notice --> Undefined variable: getKomisi /Applications/XAMPP/xamppfiles/htdocs/simraisha/application/controllers/Afiliasi.php 166
ERROR - 2023-10-09 16:47:36 --> Severity: Notice --> Undefined variable: getKomisi /Applications/XAMPP/xamppfiles/htdocs/simraisha/application/controllers/Afiliasi.php 164
ERROR - 2023-10-09 16:47:36 --> Severity: Notice --> Undefined variable: getKomisi /Applications/XAMPP/xamppfiles/htdocs/simraisha/application/controllers/Afiliasi.php 165
ERROR - 2023-10-09 16:47:36 --> Severity: Notice --> Undefined variable: getKomisi /Applications/XAMPP/xamppfiles/htdocs/simraisha/application/controllers/Afiliasi.php 166
ERROR - 2023-10-09 16:48:39 --> Severity: Notice --> Undefined variable: getKomisi /Applications/XAMPP/xamppfiles/htdocs/simraisha/application/controllers/Afiliasi.php 164
ERROR - 2023-10-09 16:48:39 --> Severity: Notice --> Undefined variable: getKomisi /Applications/XAMPP/xamppfiles/htdocs/simraisha/application/controllers/Afiliasi.php 165
ERROR - 2023-10-09 16:48:39 --> Severity: Notice --> Undefined variable: getKomisi /Applications/XAMPP/xamppfiles/htdocs/simraisha/application/controllers/Afiliasi.php 166
ERROR - 2023-10-09 16:59:54 --> Query error: Incorrect DATE value: '10/10/2023' - Invalid query: SELECT 
            tb_afiliasi_pasien.*, 
            layanan.nama_layanan ,
            tb_afiliator.first_name as nama_afiliator,
            tb_afiliator.identity as email_afiliator FROM tb_afiliasi_pasien 
            LEFT JOIN layanan ON tb_afiliasi_pasien.id_layanan = layanan.id 
            LEFT JOIN tb_afiliator ON  tb_afiliasi_pasien.id_afiliasi = tb_afiliator.id
            WHERE tb_afiliasi_pasien.id_klinik=1  AND tanggal BETWEEN '10/10/2023' AND '10/10/2023'  ORDER BY tb_afiliasi_pasien.id DESC  LIMIT 10 OFFSET 0
ERROR - 2023-10-09 17:06:52 --> Severity: Warning --> date_format() expects parameter 1 to be DateTimeInterface, bool given /Applications/XAMPP/xamppfiles/htdocs/simraisha/application/controllers/Afiliasi.php 115
