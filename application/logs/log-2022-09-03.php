<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-09-03 10:18:59 --> Query error: Cannot add or update a child row: a foreign key constraint fails (`simraish_simraisha_prod`.`penerimaan`, CONSTRAINT `penerimaan_ibfk_1` FOREIGN KEY (`id_po`) REFERENCES `pemesanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE) - Invalid query: INSERT INTO `penerimaan` (`id_po`, `no_faktur`, `tanggal_faktur`, `lokasi`, `keterangan`, `id_supplier`, `id_klinik`, `modified_by`) VALUES ('0', '14/KY', '2022-09-03', 'Opname', '', '55', '23', '131')
ERROR - 2022-09-03 10:18:59 --> Query error: Cannot add or update a child row: a foreign key constraint fails (`simraish_simraisha_prod`.`penerimaan_detail`, CONSTRAINT `penerimaan_detail_ibfk_1` FOREIGN KEY (`id_faktur`) REFERENCES `penerimaan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE) - Invalid query: INSERT INTO `penerimaan_detail` (`expired_date`, `harga_beli`, `id_faktur`, `id_obat`, `jumlah`, `total`) VALUES ('2023-10-28','397347',0,'783','2',794694), ('2024-02-28','323970',0,'784','1',323970), ('2022-12-31','184182',0,'791','1',184182), ('2023-09-30','277070',0,'788','2',554140), ('2024-01-25','579890',0,'793','2',1159780), ('2024-03-31','651838',0,'790','2',1303676), ('2025-03-31','621933',0,'789','2',1243866)
ERROR - 2022-09-03 16:21:19 --> 404 Page Not Found: RawatJalan/Pasien
ERROR - 2022-09-03 17:40:10 --> Query error: Duplicate entry '114082-6' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('114082', 'PANGGITA ADISTIYAPURI', 'YOGYAKARTA', '1997-02-07', 'Islam', 'JOGOKARIYAN, MANTIJERON, YOGYAKARTA', '082134613079', 'P', 'A', '21', '', '6')
