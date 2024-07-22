<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-10-10 15:46:31 --> Severity: Notice --> Trying to get property 'user_id' of non-object /Applications/XAMPP/xamppfiles/htdocs/simraisha/application/models/Menu_model.php 12
ERROR - 2023-10-10 15:46:31 --> Severity: Notice --> Trying to get property 'first_name' of non-object /Applications/XAMPP/xamppfiles/htdocs/simraisha/application/views/template/sidebar.php 19
ERROR - 2023-10-10 15:46:31 --> Severity: Notice --> Trying to get property 'last_name' of non-object /Applications/XAMPP/xamppfiles/htdocs/simraisha/application/views/template/sidebar.php 19
ERROR - 2023-10-10 15:46:31 --> Severity: Notice --> Trying to get property 'first_name' of non-object /Applications/XAMPP/xamppfiles/htdocs/simraisha/application/views/themes/adminLTE.php 206
ERROR - 2023-10-10 15:46:31 --> Severity: Notice --> Trying to get property 'last_name' of non-object /Applications/XAMPP/xamppfiles/htdocs/simraisha/application/views/themes/adminLTE.php 206
ERROR - 2023-10-10 15:46:32 --> Severity: Notice --> Trying to get property 'user_id' of non-object /Applications/XAMPP/xamppfiles/htdocs/simraisha/application/models/Menu_model.php 12
ERROR - 2023-10-10 15:46:32 --> Severity: Notice --> Trying to get property 'first_name' of non-object /Applications/XAMPP/xamppfiles/htdocs/simraisha/application/views/template/sidebar.php 19
ERROR - 2023-10-10 15:46:32 --> Severity: Notice --> Trying to get property 'last_name' of non-object /Applications/XAMPP/xamppfiles/htdocs/simraisha/application/views/template/sidebar.php 19
ERROR - 2023-10-10 15:46:32 --> Severity: Notice --> Trying to get property 'id_klinik' of non-object /Applications/XAMPP/xamppfiles/htdocs/simraisha/application/controllers/Afiliasi.php 106
ERROR - 2023-10-10 15:46:32 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'ORDER BY tb_afiliasi_pasien.id DESC  LIMIT 10 OFFSET 0' at line 8 - Invalid query: SELECT 
            tb_afiliasi_pasien.*, 
            layanan.nama_layanan ,
            tb_afiliator.first_name as nama_afiliator,
            tb_afiliator.identity as email_afiliator FROM tb_afiliasi_pasien 
            LEFT JOIN layanan ON tb_afiliasi_pasien.id_layanan = layanan.id 
            LEFT JOIN tb_afiliator ON  tb_afiliasi_pasien.id_afiliasi = tb_afiliator.id
            WHERE tb_afiliasi_pasien.id_klinik=   ORDER BY tb_afiliasi_pasien.id DESC  LIMIT 10 OFFSET 0
