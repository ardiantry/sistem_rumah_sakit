<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-08-26 16:30:38 --> Query error: Duplicate entry '003962-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('003962', 'NAFISATUR RAMADHAN', 'SUNGAI RAYA', '2001-11-20', 'Islam', 'JALAN A YANI NO.4A JAWA MUKA 1', '082272263733', 'L', 'B', '64', '', '7')
ERROR - 2022-08-26 17:04:00 --> Query error: Duplicate entry '114018-6' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('114018', 'HAFIZHAN EKAWARA PUTRA', 'SLEMAN', '2021-11-25', 'Islam', 'JL. KANTIL 41283 CONDONG CATUR', '081296814682', 'L', 'A', '17', '', '6')
ERROR - 2022-08-26 17:28:51 --> Query error: Duplicate entry '114024-6' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('114024', 'ISMI KUN NUR AZIZAH', 'WONOSOBO', '2001-10-03', 'Islam', 'DUSUN BROKOH DESA PANCURWENING RT 1 RW 2 WONOSOBO', '085748593382', 'P', NULL, NULL, '', '6')
ERROR - 2022-08-26 19:49:19 --> Query error: Deadlock found when trying to get lock; try restarting transaction - Invalid query: UPDATE obat_stok
        INNER JOIN log_stok
        ON obat_stok.id = log_stok.id_stok
        SET obat_stok.stok_opname = obat_stok.stok_opname - log_stok.jumlah
        WHERE log_stok.id_reference = 19654 AND tipe_transaksi = 'Rawat Jalan'
