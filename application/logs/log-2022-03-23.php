<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-03-23 17:13:43 --> Query error: Deadlock found when trying to get lock; try restarting transaction - Invalid query: UPDATE obat_stok
        INNER JOIN log_stok
        ON obat_stok.id = log_stok.id_stok
        SET obat_stok.stok_opname = obat_stok.stok_opname - log_stok.jumlah
        WHERE log_stok.id_reference = 14572 AND tipe_transaksi = 'Rawat Jalan'
ERROR - 2022-03-23 18:32:43 --> Query error: Duplicate entry '002652-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('002652', 'TRI LESTARI', 'SLEMAN', '1986-12-26', 'Islam', 'JONGKANG 004/035 NO.91 SARIHARJO, NGAGLIK, SLEMAN', '087839887929', 'P', 'B', '40', '', '7')
ERROR - 2022-03-23 19:07:51 --> Query error: Duplicate entry '002653-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('002653', 'ANNASTASYA', 'PALANGKARAYA', '2000-09-06', 'Islam', 'KOST PUTRI LESTARI, JALAN RAJAWALI NO.80 GABLAGAN, TAMANTIRTO, KASIHAN, BANTUL', '089601212828', 'P', 'A', '64', '', '7')
ERROR - 2022-03-23 19:07:51 --> Query error: Duplicate entry '002653-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('002653', 'ANNASTASYA', 'PALANGKARAYA', '2000-09-06', 'Islam', 'KOST PUTRI LESTARI, JALAN RAJAWALI NO.80 GABLAGAN, TAMANTIRTO, KASIHAN, BANTUL', '089601212828', 'P', 'A', '64', '', '7')
