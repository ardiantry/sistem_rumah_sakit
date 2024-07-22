<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-10-13 16:05:16 --> Query error: Duplicate entry '114326-6' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('114326', 'SUKARNO HARSOSUKAMTO', 'SRAGEN', '1972-09-27', 'Islam', 'SIDOMULYO 3/27 TRIMULYO SLEMAN', '081332491179', 'L', NULL, '23', '', '6')
ERROR - 2022-10-13 16:35:21 --> Query error: Duplicate entry '004430-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('004430', 'UMI FRIATI NINGSIH', 'SEMARANG', '1964-02-15', 'Islam', 'PERUM WIROKRAMAN NO.2 001/012 SIDOKARTO GODEAN', '085228022468', 'P', 'O', '94', '', '7')
ERROR - 2022-10-13 16:46:16 --> Severity: Warning --> mysqli::real_connect(): (HY000/1040): Too many connections /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-10-13 16:46:16 --> Severity: Warning --> mysqli::real_connect(): (HY000/1040): Too many connections /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-10-13 16:46:16 --> Severity: Warning --> mysqli::real_connect(): (HY000/1040): Too many connections /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-10-13 16:46:16 --> Unable to connect to the database
ERROR - 2022-10-13 16:46:16 --> Severity: Warning --> mysqli::real_connect(): (HY000/1040): Too many connections /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-10-13 16:46:16 --> Severity: Warning --> mysqli::real_connect(): (08004/1040): Too many connections /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-10-13 16:46:16 --> Unable to connect to the database
ERROR - 2022-10-13 16:46:16 --> Unable to connect to the database
ERROR - 2022-10-13 16:46:16 --> Unable to connect to the database
ERROR - 2022-10-13 16:46:16 --> Unable to connect to the database
ERROR - 2022-10-13 16:46:16 --> Severity: Warning --> mysqli::real_connect(): (HY000/1040): Too many connections /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-10-13 16:46:16 --> Unable to connect to the database
ERROR - 2022-10-13 16:46:16 --> Severity: error --> Exception: Call to a member function real_escape_string() on boolean /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 391
ERROR - 2022-10-13 16:46:16 --> Severity: error --> Exception: Call to a member function real_escape_string() on boolean /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 391
ERROR - 2022-10-13 16:46:16 --> Severity: error --> Exception: Call to a member function real_escape_string() on boolean /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 391
ERROR - 2022-10-13 16:46:16 --> Severity: error --> Exception: Call to a member function real_escape_string() on boolean /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 391
ERROR - 2022-10-13 16:46:16 --> Severity: error --> Exception: Call to a member function real_escape_string() on boolean /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 391
ERROR - 2022-10-13 16:46:16 --> Severity: error --> Exception: Call to a member function real_escape_string() on boolean /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 391
ERROR - 2022-10-13 16:54:12 --> Severity: Warning --> mysqli::query(): MySQL server has gone away /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-13 16:54:12 --> Severity: Warning --> mysqli::query(): MySQL server has gone away /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-13 16:54:12 --> Severity: Warning --> mysqli::query(): MySQL server has gone away /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-13 16:54:12 --> Severity: Warning --> mysqli::query(): Error reading result set's header /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-13 16:54:12 --> Severity: Warning --> mysqli::query(): Error reading result set's header /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-13 16:54:12 --> Severity: Warning --> mysqli::query(): Error reading result set's header /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-13 16:54:12 --> Severity: Warning --> mysqli::query(): MySQL server has gone away /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-13 16:54:12 --> Query error: MySQL server has gone away - Invalid query: SELECT SUM(total_transaction) total_transaction FROM (
                SELECT COUNT(*) total_transaction FROM register_pasien
                WHERE CAST(tanggal_bayar as DATE) = '2022-10-13' AND id_klinik= 7
                UNION ALL
                SELECT COUNT(*) total_transaction FROM transaksi_obat
                WHERE CAST(tanggal_bayar as DATE) = '2022-10-13' AND id_klinik= 7
            )t
ERROR - 2022-10-13 16:54:12 --> Query error: MySQL server has gone away - Invalid query: UPDATE obat_stok
        INNER JOIN log_stok
        ON obat_stok.id = log_stok.id_stok
        SET obat_stok.stok_opname = obat_stok.stok_opname - log_stok.jumlah
        WHERE log_stok.id_reference = 21339 AND tipe_transaksi = 'Rawat Jalan'
ERROR - 2022-10-13 16:54:12 --> Query error: MySQL server has gone away - Invalid query: SELECT id, dates, COALESCE(total_tagihan_klinik, 0) total_tagihan_klinik, COALESCE(total_tagihan_obat, 0) total_tagihan_obat FROM (
                SELECT id, DATE_ADD('2022-10-13', INTERVAL - DAY('2022-10-13')+ id DAY) AS dates 
                FROM helper_date
                WHERE DATE_ADD('2022-10-13', INTERVAL - DAY('2022-10-13')+ id DAY) <= LAST_DAY('2022-10-13')
            )t
            LEFT JOIN 
            (
                SELECT CAST(tanggal_bayar as DATE) tanggal_bayar, SUM(total_tagihan) total_tagihan_klinik FROM register_pasien
                WHERE id_klinik= 6
                GROUP BY CAST(tanggal_bayar as DATE)
            )p ON p.tanggal_bayar = t.dates
            LEFT JOIN 
            (
                SELECT CAST(tanggal_bayar as DATE) tanggal_bayar, SUM(total_tagihan) total_tagihan_obat FROM transaksi_obat
                WHERE id_klinik= 6
                GROUP BY CAST(tanggal_bayar as DATE)
            )a ON a.tanggal_bayar = t.dates
ERROR - 2022-10-13 16:54:12 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `register_pasien_pembayaran` (`id_cara_bayar`, `id_register_pasien`, `jumlah`) VALUES ('90','21339','615000')
ERROR - 2022-10-13 16:54:12 --> Severity: error --> Exception: Call to a member function row() on boolean /home/simraish/public_html/v2/application/models/Dashboard_model.php 40
ERROR - 2022-10-13 16:54:12 --> Severity: Warning --> mysqli::query(): Error reading result set's header /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-13 16:54:12 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Dashboard_model.php 238
ERROR - 2022-10-13 16:54:12 --> Query error: MySQL server has gone away - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `v_register_pasien`
WHERE `id_klinik` = 6 AND `is_deleted` =0 AND `state_index` <> 3 AND `state_index` >=0 AND `jenis_pemeriksaan` = 'Paket Layanan' 
ERROR - 2022-10-13 16:54:12 --> Query error: MySQL server has gone away - Invalid query: UPDATE `register_pasien` SET `id` = '21339', `tanggal_bayar` = '2022-10-13 16:54:03', `subtotal` = 615000, `diskon` = 0, `total_diskon` = 0, `pajak` = 0, `total_pajak` = 0, `total_tagihan` = 615000, `total_bayar` = 615000, `kembalian` = 0, `state_index` = 3, `modified_by` = '114', `keterangan4` = ''
WHERE `id` = '21339'
ERROR - 2022-10-13 16:54:12 --> Severity: error --> Exception: Call to a member function num_rows() on boolean /home/simraish/public_html/v2/system/database/DB_query_builder.php 1424
ERROR - 2022-10-13 16:54:12 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `jurnal_header` (`tanggal`, `nama`, `id_reference`, `tipe_transaksi`, `id_klinik`, `modified_by`) VALUES ('2022-10-13 16:54:03', 'Pembayaran Rawat Jalan R20221013163555', '21339', 'Rawat Jalan', '7', '114')
ERROR - 2022-10-13 16:54:12 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO jurnal_detail(id_jurnal_header, id_akun, arus, nilai)
        SELECT 42333 id_jurnal, id_akun, arus, jumlah FROM (
            SELECT  id_akun, 'Debit' arus, jumlah
            FROM register_pasien_pembayaran f
            INNER JOIN cara_bayar c
            ON f.id_cara_bayar = c.id
            WHERE id_register_pasien = 21339
            UNION ALL
            SELECT  id id_akun, 'Debit' arus, 0 jumlah FROM master_akun WHERE id = '211'            
            UNION ALL
            SELECT  id id_akun, 'Debit' arus, 0 jumlah FROM master_akun WHERE id = '514'
            UNION ALL
            SELECT  id id_akun, 'Kredit' arus, 150000 jumlah FROM master_akun WHERE id = '411'
            UNION ALL
            SELECT  id id_akun, 'Kredit' arus, 465000 jumlah FROM master_akun WHERE id = '412'
            UNION ALL
            SELECT  id id_akun, 'Kredit' arus, 0 jumlah FROM master_akun WHERE id = '427'
            UNION ALL
            SELECT  id id_akun, 'Kredit' arus, 0 jumlah FROM master_akun WHERE id = '427'
            UNION ALL
            SELECT id id_akun, 'Debit' arus, (SELECT SUM(jumlah * harga_beli)
            FROM log_stok 
            WHERE id_reference = 21339 
            AND tipe_transaksi = 'Rawat Jalan'
            ) jumlah FROM master_akun WHERE id = '519'
            UNION ALL
            SELECT id id_akun, 'Kredit' arus, (SELECT SUM(jumlah * harga_beli)
            FROM log_stok 
            WHERE id_reference = 21339 
            AND tipe_transaksi = 'Rawat Jalan'
            ) jumlah FROM master_akun WHERE id = '116'
        )t WHERE jumlah > 0
ERROR - 2022-10-13 16:54:12 --> Severity: Warning --> Error while sending QUERY packet. PID=149993 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-13 16:54:12 --> Query error: MySQL server has gone away - Invalid query: SELECT `users`.*, `users`.`id` as `id`, `users`.`id` as `user_id`
FROM `users`
WHERE `users`.`id` = '31'
ORDER BY `users`.`id` DESC
 LIMIT 1
ERROR - 2022-10-13 16:54:12 --> Severity: error --> Exception: Call to a member function row() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1316
ERROR - 2022-10-13 16:54:12 --> Severity: Warning --> Error while sending QUERY packet. PID=150722 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-13 16:54:12 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `v_register_pasien_icd9`
WHERE `id_register_pasien` = '21340'
ERROR - 2022-10-13 16:54:12 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/RegisterPasienIcd9_model.php 28
ERROR - 2022-10-13 16:54:12 --> Severity: Warning --> Error while sending QUERY packet. PID=150739 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-13 16:54:12 --> Query error: MySQL server has gone away - Invalid query: SELECT `users`.*, `users`.`id` as `id`, `users`.`id` as `user_id`
FROM `users`
WHERE `users`.`id` = '114'
ORDER BY `users`.`id` DESC
 LIMIT 1
ERROR - 2022-10-13 16:54:12 --> Severity: error --> Exception: Call to a member function row() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1316
ERROR - 2022-10-13 16:54:12 --> Severity: Warning --> Error while sending QUERY packet. PID=150724 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-13 16:54:12 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `register_pasien_rencana_kontrol`
WHERE `id_register_pasien` = '21340'
ERROR - 2022-10-13 16:54:12 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/RegisterPasienRencanaKontrol_model.php 23
ERROR - 2022-10-13 16:54:12 --> Severity: Warning --> Error while sending QUERY packet. PID=150721 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-13 16:54:12 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `v_register_pasien_obat`
WHERE `id_register_pasien` = '21340'
AND `is_paket` =0
ERROR - 2022-10-13 16:54:12 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/RegisterPasienObat_model.php 81
ERROR - 2022-10-13 16:54:12 --> Severity: Warning --> Error while sending QUERY packet. PID=150723 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-13 16:54:12 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `v_register_pasien_icd10`
WHERE `id_register_pasien` = '21340'
ERROR - 2022-10-13 16:54:12 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/RegisterPasienIcd10_model.php 27
ERROR - 2022-10-13 16:54:12 --> Severity: Warning --> Error while sending QUERY packet. PID=150719 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-13 16:54:12 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `v_register_pasien_layanan`
WHERE `id_register_pasien` = '21340'
ERROR - 2022-10-13 16:54:12 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/RegisterPasienLayanan_model.php 28
ERROR - 2022-10-13 16:54:12 --> Severity: Warning --> Error while sending QUERY packet. PID=150720 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-13 16:54:12 --> Query error: MySQL server has gone away - Invalid query: SELECT `users`.*, `users`.`id` as `id`, `users`.`id` as `user_id`
FROM `users`
WHERE `users`.`id` = '35'
ORDER BY `users`.`id` DESC
 LIMIT 1
ERROR - 2022-10-13 16:54:12 --> Severity: error --> Exception: Call to a member function row() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1316
ERROR - 2022-10-13 16:57:16 --> Query error: Lock wait timeout exceeded; try restarting transaction - Invalid query: INSERT INTO `register_pasien_layanan` (`harga`, `id_layanan`, `id_register_pasien`, `jumlah`) VALUES ('0.00','20','21340','1')
ERROR - 2022-10-13 20:09:13 --> Severity: Warning --> mysqli::query(): MySQL server has gone away /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-13 20:09:13 --> Severity: Warning --> mysqli::query(): Error reading result set's header /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-13 20:09:13 --> Query error: MySQL server has gone away - Invalid query: SELECT `users`.*, `users`.`id` as `id`, `users`.`id` as `user_id`
FROM `users`
WHERE `users`.`id` = '109'
ORDER BY `users`.`id` DESC
 LIMIT 1
ERROR - 2022-10-13 20:09:13 --> Severity: error --> Exception: Call to a member function row() on boolean /home/simraish/public_html/v2/application/models/Ion_auth_model.php 1316
ERROR - 2022-10-13 20:09:13 --> Severity: Warning --> Error while sending QUERY packet. PID=479835 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-13 20:09:13 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `register_pasien_rencana_kontrol`
WHERE `id_register_pasien` = '21355'
ERROR - 2022-10-13 20:09:13 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/RegisterPasienRencanaKontrol_model.php 23
ERROR - 2022-10-13 20:09:13 --> Severity: Warning --> Error while sending QUERY packet. PID=479834 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-13 20:09:13 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `v_register_pasien_icd10`
WHERE `id_register_pasien` = '21355'
ERROR - 2022-10-13 20:09:13 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/RegisterPasienIcd10_model.php 27
ERROR - 2022-10-13 20:09:13 --> Severity: Warning --> Error while sending QUERY packet. PID=479832 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-13 20:09:13 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `v_register_pasien_obat`
WHERE `id_register_pasien` = '21355'
AND `is_paket` =0
ERROR - 2022-10-13 20:09:13 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/RegisterPasienObat_model.php 81
ERROR - 2022-10-13 20:09:13 --> Severity: Warning --> Error while sending QUERY packet. PID=479837 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-13 20:09:13 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `v_register_pasien_icd9`
WHERE `id_register_pasien` = '21355'
ERROR - 2022-10-13 20:09:13 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/RegisterPasienIcd9_model.php 28
ERROR - 2022-10-13 20:09:13 --> Severity: Warning --> Error while sending QUERY packet. PID=479836 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-13 20:09:13 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `v_register_pasien_layanan`
WHERE `id_register_pasien` = '21355'
ERROR - 2022-10-13 20:09:13 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/RegisterPasienLayanan_model.php 28
