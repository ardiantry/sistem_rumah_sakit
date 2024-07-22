<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-05-10 10:48:48 --> 404 Page Not Found: Robotstxt/index
ERROR - 2022-05-10 13:47:23 --> Query error: Duplicate entry '003025-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('003025', 'BLASIUS CHELVYN KERA KLEDEN', 'MAGEPANDA ', '2001-10-01', 'Katholik', 'SIKKA, NUSA TENGGARA TIMUR', '082144263464', 'L', 'O', '64', '', '7')
ERROR - 2022-05-10 13:47:24 --> Query error: Duplicate entry '003025-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('003025', 'BLASIUS CHELVYN KERA KLEDEN', 'MAGEPANDA ', '2001-10-01', 'Katholik', 'SIKKA, NUSA TENGGARA TIMUR', '082144263464', 'L', 'O', '64', '', '7')
ERROR - 2022-05-10 15:24:44 --> 404 Page Not Found: Apple-touch-iconpng/index
ERROR - 2022-05-10 15:24:44 --> 404 Page Not Found: Apple-touch-icon-precomposedpng/index
ERROR - 2022-05-10 18:58:51 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `is_deleted` =0' at line 3 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `v_transaksi_obat`
WHERE `state_index` <> 1 AND `id_klinik` = AND `is_deleted` =0
ERROR - 2022-05-10 18:58:52 --> Severity: error --> Exception: Call to a member function num_rows() on boolean /home/simraish/public_html/v2/system/database/DB_query_builder.php 1424
ERROR - 2022-05-10 19:05:47 --> Query error: Deadlock found when trying to get lock; try restarting transaction - Invalid query: UPDATE obat_stok
        INNER JOIN log_stok
        ON obat_stok.id = log_stok.id_stok
        SET obat_stok.stok_opname = obat_stok.stok_opname - log_stok.jumlah
        WHERE log_stok.id_reference = 15984 AND tipe_transaksi = 'Rawat Jalan'
ERROR - 2022-05-10 19:22:31 --> Query error: Duplicate entry '003031-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('003031', 'DWITA AMALIA RAHMADHANI', 'YOGYAKARTA', '1998-01-02', 'Islam', 'KARANGWARU LOR TR.II/306 YOGYAKARTA', '085641608903', 'P', 'A', '64', '', '7')
ERROR - 2022-05-10 19:35:49 --> Query error: Duplicate entry '003032-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('003032', 'IFFAH FITRI ANNISA', 'JAKARTA', '1997-09-05', 'Islam', 'JALAN MONJALI 003/038 NO.40B', '082187966091', 'P', 'A', '40', '', '7')
ERROR - 2022-05-10 19:35:49 --> Query error: Duplicate entry '003032-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('003032', 'IFFAH FITRI ANNISA', 'JAKARTA', '1997-09-05', 'Islam', 'JALAN MONJALI 003/038 NO.40B', '082187966091', 'P', 'A', '40', '', '7')
