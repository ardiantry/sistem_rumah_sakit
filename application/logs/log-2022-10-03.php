<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-10-03 16:03:06 --> Query error: Duplicate entry '114246-6' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('114246', 'JUWITA PERMATA SARI', 'LAWANG AGUNG', '1997-06-06', 'Islam', 'JL. A MANAF, SINAR GADING, TABIR SELATAN', '082281245455', 'P', 'A', '17', '', '6')
ERROR - 2022-10-03 16:06:46 --> Query error: Duplicate entry '114247-6' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('114247', 'YULIANASARI PULUNGAN ', 'YOGYAKARTA', '1993-07-16', 'Islam', 'NGAGLIK, SINDUHARJO, SLEMAN', '085212508909', 'P', 'B', '17', '', '6')
ERROR - 2022-10-03 16:06:47 --> Query error: Duplicate entry '114247-6' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('114247', 'YULIANASARI PULUNGAN ', 'YOGYAKARTA', '1993-07-16', 'Islam', 'NGAGLIK, SINDUHARJO, SLEMAN', '085212508909', 'P', 'B', '17', '', '6')
ERROR - 2022-10-03 18:50:26 --> Query error: Duplicate entry '114256-6' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('114256', 'ELDY BIRU SAMUDERA PUTRANANDHA', 'YOGYAKARTA', '2006-03-19', 'Islam', 'PERUMAHAN JAMBUSARI INDAH BANTUL', '087840024761', 'L', 'B', '17', '', '6')
ERROR - 2022-10-03 19:02:19 --> Query error: Cannot add or update a child row: a foreign key constraint fails (`simraish_simraisha_prod`.`transaksi_lain_detail`, CONSTRAINT `transaksi_lain_detail_ibfk_2` FOREIGN KEY (`id_akun`) REFERENCES `master_akun` (`id`) ON DELETE CASCADE ON UPDATE CASCADE) - Invalid query: INSERT INTO `transaksi_lain_detail` (`arus`, `id_akun`, `id_transaksi_header`, `nilai`) VALUES ('<font xss=removed><font xss=removed>Debet</font></font>','<font xss=removed><font xss=removed>5110</font></font>','6226','<font xss=removed><font xss=removed>294900.00</font></font>'), ('<font xss=removed><font xss=removed>Kredit</font></font>','<font xss=removed><font xss=removed>111</font></font>','6226','<font xss=removed><font xss=removed>294900.00</font></font>')
ERROR - 2022-10-03 19:03:26 --> Query error: Cannot add or update a child row: a foreign key constraint fails (`simraish_simraisha_prod`.`transaksi_lain_detail`, CONSTRAINT `transaksi_lain_detail_ibfk_2` FOREIGN KEY (`id_akun`) REFERENCES `master_akun` (`id`) ON DELETE CASCADE ON UPDATE CASCADE) - Invalid query: INSERT INTO `transaksi_lain_detail` (`arus`, `id_akun`, `id_transaksi_header`, `nilai`) VALUES ('<font xss=removed><font xss=removed>Debet</font></font>','<font xss=removed><font xss=removed>5110</font></font>','6226','<font xss=removed><font xss=removed>294000.00</font></font>'), ('<font xss=removed><font xss=removed>Kredit</font></font>','<font xss=removed><font xss=removed>111</font></font>','6226','<font xss=removed><font xss=removed>294000.00</font></font>'), ('<font xss=removed><font xss=removed>Kredit</font></font>','<font xss=removed><font xss=removed>111</font></font>','6226','<font xss=removed><font xss=removed>294900.00</font></font>')
ERROR - 2022-10-03 19:38:55 --> Query error: Cannot add or update a child row: a foreign key constraint fails (`simraish_simraisha_prod`.`transaksi_lain_detail`, CONSTRAINT `transaksi_lain_detail_ibfk_2` FOREIGN KEY (`id_akun`) REFERENCES `master_akun` (`id`) ON DELETE CASCADE ON UPDATE CASCADE) - Invalid query: INSERT INTO `transaksi_lain_detail` (`arus`, `id_akun`, `id_transaksi_header`, `nilai`) VALUES ('<font xss=removed><font xss=removed>Debet</font></font>','<font xss=removed><font xss=removed>5110</font></font>','6226','<font xss=removed><font xss=removed>294900.00</font></font>'), ('<font xss=removed><font xss=removed>Kredit</font></font>','<font xss=removed><font xss=removed>111</font></font>','6226','<font xss=removed><font xss=removed>294900.00</font></font>')
