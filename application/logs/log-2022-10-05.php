<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-10-05 09:12:03 --> Query error: Duplicate entry '10986-16' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('10986', 'DIERRA ZEA AMARTHA', 'YOGYAKARTA', '2022-08-31', NULL, 'GONJEN RT 3 NO 57 TAMANTIRTO KASIHAN BANTUL', '082179961492', 'P', NULL, NULL, '', '16')
ERROR - 2022-10-05 13:29:32 --> Severity: Warning --> mysqli::query(): MySQL server has gone away /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-05 13:29:32 --> Severity: Warning --> mysqli::query(): Error reading result set's header /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-05 13:29:32 --> Query error: MySQL server has gone away - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `v_pasien`
WHERE `id_klinik` = 6 AND `is_deleted` =0
ERROR - 2022-10-05 13:29:32 --> Severity: error --> Exception: Call to a member function num_rows() on boolean /home/simraish/public_html/v2/system/database/DB_query_builder.php 1424
ERROR - 2022-10-05 13:29:32 --> Severity: Warning --> Error while sending QUERY packet. PID=3048814 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-05 13:29:32 --> Query error: MySQL server has gone away - Invalid query: SELECT `users`.*, `users`.`id` as `id`, `users`.`id` as `user_id`
FROM `users`
WHERE `users`.`id` = '25'
ORDER BY `users`.`id` DESC
 LIMIT 1
ERROR - 2022-10-05 13:29:32 --> Severity: error --> Exception: Call to a member function row() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1316
ERROR - 2022-10-05 13:29:32 --> Severity: Warning --> Error while sending QUERY packet. PID=3048837 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-05 13:29:32 --> Query error: MySQL server has gone away - Invalid query: SELECT `users`.*, `users`.`id` as `id`, `users`.`id` as `user_id`
FROM `users`
WHERE `users`.`id` = '25'
ORDER BY `users`.`id` DESC
 LIMIT 1
ERROR - 2022-10-05 13:29:32 --> Severity: error --> Exception: Call to a member function row() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1316
ERROR - 2022-10-05 13:29:32 --> Severity: Warning --> Error while sending QUERY packet. PID=3049337 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-05 13:29:32 --> Query error: MySQL server has gone away - Invalid query: SELECT `users`.*, `users`.`id` as `id`, `users`.`id` as `user_id`
FROM `users`
WHERE `users`.`id` = '25'
ORDER BY `users`.`id` DESC
 LIMIT 1
ERROR - 2022-10-05 13:29:32 --> Severity: error --> Exception: Call to a member function row() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1316
ERROR - 2022-10-05 13:29:32 --> Severity: Warning --> Error while sending QUERY packet. PID=3048850 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-05 13:29:32 --> Query error: MySQL server has gone away - Invalid query: SELECT `users`.*, `users`.`id` as `id`, `users`.`id` as `user_id`
FROM `users`
WHERE `users`.`id` = '25'
ORDER BY `users`.`id` DESC
 LIMIT 1
ERROR - 2022-10-05 13:29:32 --> Severity: error --> Exception: Call to a member function row() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1316
ERROR - 2022-10-05 13:29:32 --> Severity: Warning --> Error while sending QUERY packet. PID=3048842 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-05 13:29:32 --> Query error: MySQL server has gone away - Invalid query: SELECT `users`.*, `users`.`id` as `id`, `users`.`id` as `user_id`
FROM `users`
WHERE `users`.`id` = '25'
ORDER BY `users`.`id` DESC
 LIMIT 1
ERROR - 2022-10-05 13:29:32 --> Severity: error --> Exception: Call to a member function row() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1316
ERROR - 2022-10-05 14:29:32 --> Severity: Warning --> mysqli::query(): MySQL server has gone away /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-05 14:29:32 --> Severity: Warning --> mysqli::query(): Error reading result set's header /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-05 14:29:32 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '161'
ERROR - 2022-10-05 14:29:32 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
ERROR - 2022-10-05 14:29:32 --> Severity: Warning --> Error while sending QUERY packet. PID=3138519 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-05 14:29:32 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `v_register_pasien_icd10`
WHERE `id_register_pasien` = '20927'
ERROR - 2022-10-05 14:29:32 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/RegisterPasienIcd10_model.php 27
ERROR - 2022-10-05 14:29:32 --> Severity: Warning --> Error while sending QUERY packet. PID=3138522 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-05 14:29:32 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `register_pasien_rencana_kontrol`
WHERE `id_register_pasien` = '20927'
ERROR - 2022-10-05 14:29:32 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/RegisterPasienRencanaKontrol_model.php 23
ERROR - 2022-10-05 14:29:32 --> Severity: Warning --> Error while sending QUERY packet. PID=3138517 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-05 14:29:32 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `v_register_pasien_icd9`
WHERE `id_register_pasien` = '20927'
ERROR - 2022-10-05 14:29:32 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/RegisterPasienIcd9_model.php 28
ERROR - 2022-10-05 14:29:32 --> Severity: Warning --> Error while sending QUERY packet. PID=3138454 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-05 14:29:32 --> Query error: MySQL server has gone away - Invalid query: SELECT `users`.*, `users`.`id` as `id`, `users`.`id` as `user_id`
FROM `users`
WHERE `users`.`id` = '161'
ORDER BY `users`.`id` DESC
 LIMIT 1
ERROR - 2022-10-05 14:29:32 --> Severity: error --> Exception: Call to a member function row() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1316
ERROR - 2022-10-05 14:29:32 --> Severity: Warning --> Error while sending QUERY packet. PID=3138521 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-05 14:29:32 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `v_register_pasien_layanan`
WHERE `id_register_pasien` = '20927'
ERROR - 2022-10-05 14:29:32 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/RegisterPasienLayanan_model.php 28
ERROR - 2022-10-05 14:29:32 --> Severity: Warning --> Error while sending QUERY packet. PID=3138520 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-05 14:29:32 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `v_register_pasien_obat`
WHERE `id_register_pasien` = '20927'
AND `is_paket` =0
ERROR - 2022-10-05 14:29:32 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/RegisterPasienObat_model.php 81
ERROR - 2022-10-05 14:29:32 --> Severity: Warning --> Error while sending QUERY packet. PID=3138518 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-05 14:29:32 --> Query error: MySQL server has gone away - Invalid query: SELECT `users`.*, `users`.`id` as `id`, `users`.`id` as `user_id`
FROM `users`
WHERE `users`.`id` = '161'
ORDER BY `users`.`id` DESC
 LIMIT 1
ERROR - 2022-10-05 14:29:32 --> Severity: error --> Exception: Call to a member function row() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1316
ERROR - 2022-10-05 14:54:03 --> Query error: Duplicate entry '114271-6' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('114271', 'SULISTO', 'GUNUNGKIDUL', '1972-10-30', 'Islam', 'TAMBAKBOYO DERO RT 20/RW 61 CONDONGCATUR DEPOK SLEMAN', '0895376711213', 'L', NULL, '21', 'MASAL BANK SLEMAN', '6')
ERROR - 2022-10-05 14:54:03 --> Query error: Duplicate entry '114271-6' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('114271', 'SULISTO', 'GUNUNGKIDUL', '1972-10-30', 'Islam', 'TAMBAKBOYO DERO RT 20/RW 61 CONDONGCATUR DEPOK SLEMAN', '0895376711213', 'L', NULL, '21', 'MASAL BANK SLEMAN', '6')
ERROR - 2022-10-05 16:32:13 --> Query error: Duplicate entry '004349-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('004349', 'MUHAMMAD EL AZZAM DEGA PRADANA', 'SLEMAN', '2014-02-14', 'Islam', 'PONOWAREN, GAMPING, SLEMAN', '081270279009', 'L', NULL, '64', '', '7')
ERROR - 2022-10-05 16:33:37 --> Query error: Deadlock found when trying to get lock; try restarting transaction - Invalid query: UPDATE obat_stok
        INNER JOIN log_stok
        ON obat_stok.id = log_stok.id_stok
        SET obat_stok.stok_opname = obat_stok.stok_opname - log_stok.jumlah
        WHERE log_stok.id_reference = 20985 AND tipe_transaksi = 'Rawat Jalan'
ERROR - 2022-10-05 16:41:02 --> Severity: Warning --> mysqli::real_connect(): (HY000/1040): Too many connections /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-10-05 16:41:02 --> Unable to connect to the database
ERROR - 2022-10-05 16:41:03 --> Severity: Warning --> mysqli::real_connect(): (HY000/1040): Too many connections /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-10-05 16:41:03 --> Unable to connect to the database
ERROR - 2022-10-05 16:44:33 --> Severity: Warning --> mysqli::query(): MySQL server has gone away /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-05 16:44:33 --> Severity: Warning --> mysqli::query(): Error reading result set's header /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-05 16:44:33 --> Query error: MySQL server has gone away - Invalid query: SELECT t.*, CONCAT('Rp ', format(t.total_tagihan, 0, 'de_DE'), ',-') total_tagihan_display FROM (SELECT tanggal_bayar timestamp_bayar, DATE(tanggal_bayar) AS tanggal_bayar
            , TIME(tanggal_bayar) AS jam_bayar
            , no_rm
            , nama_pasien
            , IF(DATE(pasien.created_at) = DATE(register_pasien.created_at), 'Baru', 'Lama') jenis_pasien
            , no_registrasi
            , 'Klinik' jenis
            , total_tagihan
            FROM register_pasien
            INNER JOIN pasien
            ON register_pasien.id_pasien = pasien.id
            WHERE CAST(tanggal_bayar as DATE) = '2022-10-05' AND register_pasien.id_klinik= 6
            UNION ALL
            SELECT tanggal_bayar timestamp_bayar, DATE(tanggal_bayar) AS tanggal_bayar
            , TIME(tanggal_bayar) AS jam_bayar
            , RIGHT(CONCAT('000000', CAST(pelanggan.id AS CHAR)), 6) no_rl
            , nama_pelanggan
            , IF(DATE(pelanggan.created_at) = DATE(transaksi_obat.created_at), 'Baru', 'Lama') jenis_pasien
            , no_transaksi
            , 'Apotek' jenis
            , total_tagihan FROM transaksi_obat
            LEFT JOIN pelanggan
            ON transaksi_obat.id_pelanggan = pelanggan.id
            WHERE CAST(tanggal_bayar as DATE) = '2022-10-05' AND transaksi_obat.id_klinik=6)t ORDER BY timestamp_bayar DESC
ERROR - 2022-10-05 16:44:33 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Dashboard_model.php 169
ERROR - 2022-10-05 16:44:33 --> Severity: Warning --> mysqli::query(): MySQL server has gone away /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-05 16:44:33 --> Severity: Warning --> mysqli::query(): Error reading result set's header /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-05 16:44:33 --> Query error: MySQL server has gone away - Invalid query: UPDATE obat_stok
        INNER JOIN log_stok
        ON obat_stok.id = log_stok.id_stok
        SET obat_stok.stok_opname = obat_stok.stok_opname - log_stok.jumlah
        WHERE log_stok.id_reference = 20938 AND tipe_transaksi = 'Rawat Jalan'
ERROR - 2022-10-05 16:44:33 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `register_pasien_pembayaran` (`id_cara_bayar`, `id_register_pasien`, `jumlah`) VALUES ('18','20938','170000')
ERROR - 2022-10-05 16:44:33 --> Query error: MySQL server has gone away - Invalid query: UPDATE `register_pasien` SET `id` = '20938', `tanggal_bayar` = '2022-10-05 16:44:28', `subtotal` = 250000, `diskon` = 80000, `total_diskon` = 80000, `pajak` = 0, `total_pajak` = 0, `total_tagihan` = 170000, `total_bayar` = 170000, `kembalian` = 0, `state_index` = 3, `modified_by` = '27', `keterangan4` = 'KET: MASSAL BANK SLEMAN'
WHERE `id` = '20938'
ERROR - 2022-10-05 16:44:33 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `jurnal_header` (`tanggal`, `nama`, `id_reference`, `tipe_transaksi`, `id_klinik`, `modified_by`) VALUES ('2022-10-05 16:44:28', 'Pembayaran Rawat Jalan R20221005141540', '20938', 'Rawat Jalan', '6', '27')
ERROR - 2022-10-05 16:44:33 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO jurnal_detail(id_jurnal_header, id_akun, arus, nilai)
        SELECT 41646 id_jurnal, id_akun, arus, jumlah FROM (
            SELECT  id_akun, 'Debit' arus, jumlah
            FROM register_pasien_pembayaran f
            INNER JOIN cara_bayar c
            ON f.id_cara_bayar = c.id
            WHERE id_register_pasien = 20938
            UNION ALL
            SELECT  id id_akun, 'Debit' arus, 0 jumlah FROM master_akun WHERE id = '211'            
            UNION ALL
            SELECT  id id_akun, 'Debit' arus, 80000 jumlah FROM master_akun WHERE id = '514'
            UNION ALL
            SELECT  id id_akun, 'Kredit' arus, 0 jumlah FROM master_akun WHERE id = '411'
            UNION ALL
            SELECT  id id_akun, 'Kredit' arus, 250000 jumlah FROM master_akun WHERE id = '412'
            UNION ALL
            SELECT  id id_akun, 'Kredit' arus, 0 jumlah FROM master_akun WHERE id = '427'
            UNION ALL
            SELECT  id id_akun, 'Kredit' arus, 0 jumlah FROM master_akun WHERE id = '427'
            UNION ALL
            SELECT id id_akun, 'Debit' arus, (SELECT SUM(jumlah * harga_beli)
            FROM log_stok 
            WHERE id_reference = 20938 
            AND tipe_transaksi = 'Rawat Jalan'
            ) jumlah FROM master_akun WHERE id = '519'
            UNION ALL
            SELECT id id_akun, 'Kredit' arus, (SELECT SUM(jumlah * harga_beli)
            FROM log_stok 
            WHERE id_reference = 20938 
            AND tipe_transaksi = 'Rawat Jalan'
            ) jumlah FROM master_akun WHERE id = '116'
        )t WHERE jumlah > 0
ERROR - 2022-10-05 16:44:33 --> Severity: Warning --> Error while sending QUERY packet. PID=3344054 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-05 16:44:33 --> Query error: MySQL server has gone away - Invalid query: SELECT `users`.*, `users`.`id` as `id`, `users`.`id` as `user_id`
FROM `users`
WHERE `users`.`id` = '34'
ORDER BY `users`.`id` DESC
 LIMIT 1
ERROR - 2022-10-05 16:44:33 --> Severity: error --> Exception: Call to a member function row() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1316
ERROR - 2022-10-05 16:44:33 --> Severity: Warning --> Error while sending QUERY packet. PID=3344056 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-05 16:44:33 --> Query error: MySQL server has gone away - Invalid query: SELECT `users`.*, `users`.`id` as `id`, `users`.`id` as `user_id`
FROM `users`
WHERE `users`.`id` = '34'
ORDER BY `users`.`id` DESC
 LIMIT 1
ERROR - 2022-10-05 16:44:33 --> Severity: error --> Exception: Call to a member function row() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1316
ERROR - 2022-10-05 16:44:33 --> Severity: Warning --> Error while sending QUERY packet. PID=3344055 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-05 16:44:33 --> Query error: MySQL server has gone away - Invalid query: SELECT `users`.*, `users`.`id` as `id`, `users`.`id` as `user_id`
FROM `users`
WHERE `users`.`id` = '34'
ORDER BY `users`.`id` DESC
 LIMIT 1
ERROR - 2022-10-05 16:44:33 --> Severity: error --> Exception: Call to a member function row() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1316
ERROR - 2022-10-05 16:44:33 --> Severity: Warning --> Error while sending QUERY packet. PID=3343878 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-05 16:44:33 --> Query error: MySQL server has gone away - Invalid query: SELECT `users`.*, `users`.`id` as `id`, `users`.`id` as `user_id`
FROM `users`
WHERE `users`.`id` = '34'
ORDER BY `users`.`id` DESC
 LIMIT 1
ERROR - 2022-10-05 16:44:33 --> Severity: error --> Exception: Call to a member function row() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1316
ERROR - 2022-10-05 16:44:33 --> Severity: Warning --> Error while sending QUERY packet. PID=3342283 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-05 16:44:33 --> Query error: MySQL server has gone away - Invalid query: SELECT `users`.*, `users`.`id` as `id`, `users`.`id` as `user_id`
FROM `users`
WHERE `users`.`id` = '34'
ORDER BY `users`.`id` DESC
 LIMIT 1
ERROR - 2022-10-05 16:44:33 --> Severity: error --> Exception: Call to a member function row() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1316
ERROR - 2022-10-05 17:07:16 --> Query error: Deadlock found when trying to get lock; try restarting transaction - Invalid query: UPDATE obat_stok
        INNER JOIN log_stok
        ON obat_stok.id = log_stok.id_stok
        SET obat_stok.stok_opname = obat_stok.stok_opname - log_stok.jumlah
        WHERE log_stok.id_reference = 20988 AND tipe_transaksi = 'Rawat Jalan'
ERROR - 2022-10-05 17:14:03 --> Query error: Duplicate entry '004350-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('004350', 'MUHAMMAD SUBHAN SYAWALANI', 'BENGKULU', '2002-12-18', 'Islam', 'JL. RAYA PADANG KEMILING NO. 80, SELEBAR', '0895605227987', 'L', NULL, '37', '', '7')
ERROR - 2022-10-05 17:14:05 --> Query error: Duplicate entry '004350-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('004350', 'MUHAMMAD SUBHAN SYAWALANI', 'BENGKULU', '2002-12-18', 'Islam', 'JL. RAYA PADANG KEMILING NO. 80, SELEBAR', '0895605227987', 'L', NULL, '37', '', '7')
ERROR - 2022-10-05 17:14:08 --> Query error: Duplicate entry '004350-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('004350', 'MUHAMMAD SUBHAN SYAWALANI', 'BENGKULU', '2002-12-18', 'Islam', 'JL. RAYA PADANG KEMILING NO. 80, SELEBAR', '0895605227987', 'L', NULL, '37', '', '7')
ERROR - 2022-10-05 17:14:33 --> Severity: Warning --> mysqli::query(): MySQL server has gone away /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-05 17:14:33 --> Severity: Warning --> mysqli::query(): Error reading result set's header /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-05 17:14:33 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `v_register_pasien`
WHERE `id` = '20953'
ERROR - 2022-10-05 17:14:33 --> Severity: error --> Exception: Call to a member function row() on boolean /home/simraish/public_html/v2/application/models/RegisterPasien_model.php 19
ERROR - 2022-10-05 17:14:33 --> Severity: Warning --> mysqli::query(): MySQL server has gone away /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-05 17:14:33 --> Severity: Warning --> mysqli::query(): Error reading result set's header /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-05 17:14:33 --> Query error: MySQL server has gone away - Invalid query: 
			SELECT COUNT(*) totalRecord FROM (
				SELECT 1
				FROM `jurnal_header` `h`
				WHERE `h`.is_deleted = 0 AND `h`.id_klinik = 6			
				UNION ALL				
				SELECT 1
				FROM `transaksi_lain_header` `h`
				WHERE `h`.is_deleted = 0 AND `h`.id_klinik = 6
			)t
		
ERROR - 2022-10-05 17:14:33 --> Severity: error --> Exception: Call to a member function row() on boolean /home/simraish/public_html/v2/application/controllers/Pembukuan.php 202
ERROR - 2022-10-05 17:14:33 --> Severity: Warning --> Error while sending QUERY packet. PID=3396112 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-05 17:14:33 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '181'
ERROR - 2022-10-05 17:14:33 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
ERROR - 2022-10-05 17:14:33 --> Severity: Warning --> Error while sending QUERY packet. PID=3396102 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-05 17:14:33 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '181'
ERROR - 2022-10-05 17:14:33 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
ERROR - 2022-10-05 17:14:33 --> Severity: Warning --> Error while sending QUERY packet. PID=3396250 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-05 17:14:33 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '181'
ERROR - 2022-10-05 17:14:33 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
ERROR - 2022-10-05 17:14:33 --> Severity: Warning --> Error while sending QUERY packet. PID=3396303 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-05 17:14:33 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '181'
ERROR - 2022-10-05 17:14:33 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
ERROR - 2022-10-05 19:44:34 --> Severity: Warning --> mysqli::query(): MySQL server has gone away /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-05 19:44:34 --> Severity: Warning --> mysqli::query(): Error reading result set's header /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-05 19:44:34 --> Query error: MySQL server has gone away - Invalid query: SELECT 
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
         
         AND tanggal BETWEEN '2022-10-05' AND '2022-10-05'        
        AND id_klinik = 7 AND is_deleted = 0
        HAVING 1=1        
         
         
        ORDER BY 
        tanggal DESC
        , id_jurnal_header DESC
        , debit DESC
        , kredit DESC;
ERROR - 2022-10-05 19:44:34 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/controllers/Laporan.php 2795
ERROR - 2022-10-05 19:44:34 --> Severity: Warning --> Error while sending QUERY packet. PID=3619580 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-05 19:44:34 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '122'
ERROR - 2022-10-05 19:44:34 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
ERROR - 2022-10-05 19:44:34 --> Severity: Warning --> Error while sending QUERY packet. PID=3619994 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-05 19:44:34 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '122'
ERROR - 2022-10-05 19:44:34 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
ERROR - 2022-10-05 19:44:34 --> Severity: Warning --> Error while sending QUERY packet. PID=3619582 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-05 19:44:34 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '122'
ERROR - 2022-10-05 19:44:34 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
ERROR - 2022-10-05 19:44:34 --> Severity: Warning --> Error while sending QUERY packet. PID=3619995 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-05 19:44:34 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '122'
ERROR - 2022-10-05 19:44:34 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
ERROR - 2022-10-05 19:44:34 --> Severity: Warning --> Error while sending QUERY packet. PID=3619993 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-05 19:44:34 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '122'
ERROR - 2022-10-05 19:44:34 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
ERROR - 2022-10-05 19:44:37 --> Severity: Warning --> mysqli_stmt::execute(): MySQL server has gone away /home/simraish/public_html/v2/application/controllers/LaporanNew.php 1033
ERROR - 2022-10-05 19:44:37 --> Severity: Warning --> mysqli_stmt::execute(): Error reading result set's header /home/simraish/public_html/v2/application/controllers/LaporanNew.php 1033
ERROR - 2022-10-05 19:59:34 --> Severity: Warning --> mysqli::query(): MySQL server has gone away /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-05 19:59:34 --> Severity: Warning --> mysqli::query(): Error reading result set's header /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-05 19:59:34 --> Query error: MySQL server has gone away - Invalid query: SELECT 
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
         AND tanggal BETWEEN '2022-10-05' AND '2022-10-05'        
        AND id_klinik = 7 AND is_deleted = 0
        HAVING 1=1        
         
         
        ORDER BY 
        tanggal DESC
        , id_jurnal_header DESC
        , debit DESC
        , kredit DESC;
ERROR - 2022-10-05 19:59:34 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/controllers/Laporan.php 2925
ERROR - 2022-10-05 19:59:34 --> Severity: Warning --> Error while sending QUERY packet. PID=3642739 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-05 19:59:34 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '122'
ERROR - 2022-10-05 19:59:34 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
ERROR - 2022-10-05 19:59:34 --> Severity: Warning --> Error while sending QUERY packet. PID=3642738 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-05 19:59:34 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '122'
ERROR - 2022-10-05 19:59:34 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
ERROR - 2022-10-05 19:59:34 --> Severity: Warning --> Error while sending QUERY packet. PID=3641597 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-05 19:59:34 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '122'
ERROR - 2022-10-05 19:59:34 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
ERROR - 2022-10-05 19:59:34 --> Severity: Warning --> Error while sending QUERY packet. PID=3641964 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-05 19:59:34 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '122'
ERROR - 2022-10-05 19:59:34 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
ERROR - 2022-10-05 19:59:34 --> Severity: Warning --> Error while sending QUERY packet. PID=3642740 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-05 19:59:34 --> Query error: MySQL server has gone away - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` = '122'
ERROR - 2022-10-05 19:59:34 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1562
