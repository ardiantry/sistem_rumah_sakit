<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-07-25 08:39:30 --> Query error: Duplicate entry '10521-16' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('10521', 'EL ABHA MALLORY W', 'BANTUL', '2021-12-21', NULL, 'PURI GARDENIA BANGUNJIWO KASIHAN BANTUL', '089633323231', 'L', NULL, NULL, '', '16')
ERROR - 2022-07-25 19:33:28 --> Query error: Deadlock found when trying to get lock; try restarting transaction - Invalid query: INSERT INTO jurnal_detail(id_jurnal_header, id_akun, arus, nilai)
        SELECT 22336 id_jurnal, id_akun, arus, jumlah FROM (
            SELECT  id_akun, 'Debit' arus, jumlah
            FROM register_pasien_pembayaran f
            INNER JOIN cara_bayar c
            ON f.id_cara_bayar = c.id
            WHERE id_register_pasien = 18664
            UNION ALL
            SELECT  id id_akun, 'Debit' arus, 0 jumlah FROM master_akun WHERE id = '211'            
            UNION ALL
            SELECT  id id_akun, 'Debit' arus, 0 jumlah FROM master_akun WHERE id = '514'
            UNION ALL
            SELECT  id id_akun, 'Kredit' arus, 300000 jumlah FROM master_akun WHERE id = '411'
            UNION ALL
            SELECT  id id_akun, 'Kredit' arus, 0 jumlah FROM master_akun WHERE id = '412'
            UNION ALL
            SELECT  id id_akun, 'Kredit' arus, 0 jumlah FROM master_akun WHERE id = '427'
            UNION ALL
            SELECT  id id_akun, 'Kredit' arus, 0 jumlah FROM master_akun WHERE id = '427'
            UNION ALL
            SELECT id id_akun, 'Debit' arus, (SELECT SUM(jumlah * harga_beli)
            FROM log_stok 
            WHERE id_reference = 18664 
            AND tipe_transaksi = 'Rawat Jalan'
            ) jumlah FROM master_akun WHERE id = '519'
            UNION ALL
            SELECT id id_akun, 'Kredit' arus, (SELECT SUM(jumlah * harga_beli)
            FROM log_stok 
            WHERE id_reference = 18664 
            AND tipe_transaksi = 'Rawat Jalan'
            ) jumlah FROM master_akun WHERE id = '116'
        )t WHERE jumlah > 0
