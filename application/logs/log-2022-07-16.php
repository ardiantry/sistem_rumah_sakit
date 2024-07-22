<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-07-16 12:59:00 --> 404 Page Not Found: Apple-touch-icon-120x120-precomposedpng/index
ERROR - 2022-07-16 12:59:00 --> 404 Page Not Found: Apple-touch-icon-120x120png/index
ERROR - 2022-07-16 12:59:00 --> 404 Page Not Found: Apple-touch-icon-precomposedpng/index
ERROR - 2022-07-16 12:59:00 --> 404 Page Not Found: Apple-touch-iconpng/index
ERROR - 2022-07-16 12:59:00 --> 404 Page Not Found: Apple-touch-icon-120x120-precomposedpng/index
ERROR - 2022-07-16 12:59:00 --> 404 Page Not Found: Apple-touch-icon-120x120png/index
ERROR - 2022-07-16 12:59:00 --> 404 Page Not Found: Apple-touch-icon-precomposedpng/index
ERROR - 2022-07-16 12:59:00 --> 404 Page Not Found: Apple-touch-iconpng/index
ERROR - 2022-07-16 18:03:51 --> Query error: Deadlock found when trying to get lock; try restarting transaction - Invalid query: UPDATE obat_stok
        INNER JOIN log_stok
        ON obat_stok.id = log_stok.id_stok
        SET obat_stok.stok_opname = obat_stok.stok_opname - log_stok.jumlah
        WHERE log_stok.id_reference = 18412 AND tipe_transaksi = 'Rawat Jalan'
ERROR - 2022-07-16 18:31:59 --> Query error: Duplicate entry '003641-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('003641', 'MUHAMMAD AYUBI', 'BANJARNEGARA', '2008-01-23', 'Islam', 'DSN KARANG TENGAH DESA PAWUHAN RT 01 RW 04 BATUR BANJARNEGARA', '082135466478', 'L', NULL, NULL, '', '7')
ERROR - 2022-07-16 18:37:16 --> Query error: Duplicate entry '003642-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('003642', 'YUSWAN BUMI JANDU AL IKNAN', 'SLEMAN', '2005-11-19', 'Islam', 'MULUNGAN WETAN 02/15 MLATI SLEMAN YOGYAKARTA', '087738334999', 'L', NULL, '64', '', '7')
