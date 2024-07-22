<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-09-02 11:08:22 --> Query error: Duplicate entry '004022-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('004022', 'JELLY PINAULI ASTARI', 'SEI PAGAI', '2004-06-01', 'Kristen ', 'JL GATOT KACA, GANG ARIMBI, DEPOK, SLEMAN', '082171104375', 'P', NULL, '64', '', '7')
ERROR - 2022-09-02 12:32:22 --> Query error: Duplicate entry '004023-7' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('004023', 'DWI RATU', 'BATURAJA', '2005-02-05', 'Islam', 'SETURAN, SLEMAN', '085709106630', 'P', 'A', '64', '', '7')
ERROR - 2022-09-02 13:29:17 --> 404 Page Not Found: Robotstxt/index
ERROR - 2022-09-02 15:01:59 --> Severity: Warning --> mysqli::real_connect(): (HY000/1040): Too many connections /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-09-02 15:01:59 --> Unable to connect to the database
ERROR - 2022-09-02 15:01:59 --> Severity: error --> Exception: Call to a member function real_escape_string() on boolean /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 391
ERROR - 2022-09-02 19:05:09 --> Query error: Duplicate entry '114070-6' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('114070', 'HASNA MAKTIKA ALMAHYRA', 'SLEMAN', '2020-04-14', 'Islam', 'GARONGAN KEMBANG, TURI SLEMAN', '081341528956', 'P', 'AB', '17', '', '6')
ERROR - 2022-09-02 19:43:35 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '22%' ESCAPE '!'
			
				UNION ALL
				
				SELECT 1
				FROM `transaksi_lai' at line 4 - Invalid query: 
			SELECT COUNT(*) totalRecord FROM (
				SELECT 1
				FROM `jurnal_header` `h`
				WHERE `h`.is_deleted = 0 AND `h`.id_klinik = 7 AND `nama` LIKE '%TLTM BIAYA ADM KARTU ATM MANDIRI 1193 BL. AGUSTUS '22%' ESCAPE '!'
			
				UNION ALL
				
				SELECT 1
				FROM `transaksi_lain_header` `h`
				WHERE `h`.is_deleted = 0 AND `h`.id_klinik = 7 AND `nama` LIKE '%TLTM BIAYA ADM KARTU ATM MANDIRI 1193 BL. AGUSTUS '22%' ESCAPE '!'			
			)t
		
ERROR - 2022-09-02 19:43:35 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '22%' ESCAPE '!'
				GROUP BY `d`.`id_jurnal_header`
		)
		UNION ALL 
		(
		' at line 19 - Invalid query: 
		(
			SELECT 
				`d`.`created_at` AS `created_at`
				,`d`.`id_jurnal_header` AS `id_jurnal_header`
				,`h`.`tanggal` AS `tanggal`
				,`h`.`nama` AS `nama`
				,group_concat(`m`.`kode_akun` order by `d`.`id` ASC separator '<br />') AS `kode_akun`
				,group_concat(`m`.`nama_akun` order by `d`.`id` ASC separator '<br />') AS `nama_akun`
				,group_concat(if(`d`.`arus` = 'Debit',concat('Rp ',format(`d`.`nilai`,0,'de_DE'),',00'),'-') order by `d`.`id` ASC separator '<br />') AS `debit_display`
				,group_concat(if(`d`.`arus` = 'Kredit',concat('Rp ',format(`d`.`nilai`,0,'de_DE'),',00'),'-') order by `d`.`id` ASC separator '<br />') AS `kredit_display`
				,`h`.`id_klinik` AS `id_klinik`
				,`h`.`is_deleted` AS `is_deleted`
				,`h`.`id_reference` AS `id_reference`
				,`h`.`tipe_transaksi` AS `tipe_transaksi` 
				FROM `jurnal_header` `h` 
				INNER JOIN `jurnal_detail` `d` on `h`.`id` = `d`.`id_jurnal_header`
				INNER JOIN `master_akun` `m` on `m`.`id` = `d`.`id_akun`
				WHERE `h`.`id_klinik` = 7 AND `h`.`is_deleted` = 0
				 AND `nama` LIKE '%TLTM BIAYA ADM KARTU ATM MANDIRI 1193 BL. AGUSTUS '22%' ESCAPE '!'
				GROUP BY `d`.`id_jurnal_header`
		)
		UNION ALL 
		(
				SELECT 
				`h`.`created_at` AS `created_at`
				,`d`.`id_transaksi_header` AS `id_transaksi_header`
				,`h`.`tanggal` AS `tanggal`
				,`h`.`nama` AS `nama`
				,group_concat(`m`.`kode_akun` separator '<br />') AS `kode_akun`
				,group_concat(`m`.`nama_akun` separator '<br />') AS `nama_akun`
				,group_concat(if(`d`.`arus` = 'Debit',concat('Rp ',format(`d`.`nilai`,0,'de_DE'),',00'),'-') separator '<br />') AS `debit_display`
				,group_concat(if(`d`.`arus` = 'Kredit',concat('Rp ',format(`d`.`nilai`,0,'de_DE'),',00'),'-') separator '<br />') AS `kredit_display`
				,`h`.`id_klinik` AS `id_klinik`
				,`h`.`is_deleted` AS `is_deleted`
				,`d`.`id_transaksi_header` AS `id_reference`,'Transkasi Lain' AS `tipe_transaksi` 
				FROM `transaksi_lain_header` `h` 
				INNER JOIN `transaksi_lain_detail` `d` on `h`.`id` = `d`.`id_transaksi_header`
				INNER JOIN `master_akun` `m` on `m`.`id` = `d`.`id_akun` 
				WHERE `h`.`id_klinik` = 7 AND `h`.`is_deleted` = 0
				 AND `nama` LIKE '%TLTM BIAYA ADM KARTU ATM MANDIRI 1193 BL. AGUSTUS '22%' ESCAPE '!'
				GROUP BY `d`.`id_transaksi_header`
		) ORDER BY `tanggal` DESC LIMIT 10 OFFSET 0
ERROR - 2022-09-02 19:43:35 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/controllers/Pembukuan.php 199
ERROR - 2022-09-02 19:43:47 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '22%' ESCAPE '!'
			
				UNION ALL
				
				SELECT 1
				FROM `transaksi_lai' at line 4 - Invalid query: 
			SELECT COUNT(*) totalRecord FROM (
				SELECT 1
				FROM `jurnal_header` `h`
				WHERE `h`.is_deleted = 0 AND `h`.id_klinik = 7 AND `nama` LIKE '%TLTM BIAYA ADM KARTU ATM MANDIRI 1193 BL. AGUSTUS '22%' ESCAPE '!'
			
				UNION ALL
				
				SELECT 1
				FROM `transaksi_lain_header` `h`
				WHERE `h`.is_deleted = 0 AND `h`.id_klinik = 7 AND `nama` LIKE '%TLTM BIAYA ADM KARTU ATM MANDIRI 1193 BL. AGUSTUS '22%' ESCAPE '!'			
			)t
		
ERROR - 2022-09-02 19:43:47 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '22%' ESCAPE '!'
				GROUP BY `d`.`id_jurnal_header`
		)
		UNION ALL 
		(
		' at line 19 - Invalid query: 
		(
			SELECT 
				`d`.`created_at` AS `created_at`
				,`d`.`id_jurnal_header` AS `id_jurnal_header`
				,`h`.`tanggal` AS `tanggal`
				,`h`.`nama` AS `nama`
				,group_concat(`m`.`kode_akun` order by `d`.`id` ASC separator '<br />') AS `kode_akun`
				,group_concat(`m`.`nama_akun` order by `d`.`id` ASC separator '<br />') AS `nama_akun`
				,group_concat(if(`d`.`arus` = 'Debit',concat('Rp ',format(`d`.`nilai`,0,'de_DE'),',00'),'-') order by `d`.`id` ASC separator '<br />') AS `debit_display`
				,group_concat(if(`d`.`arus` = 'Kredit',concat('Rp ',format(`d`.`nilai`,0,'de_DE'),',00'),'-') order by `d`.`id` ASC separator '<br />') AS `kredit_display`
				,`h`.`id_klinik` AS `id_klinik`
				,`h`.`is_deleted` AS `is_deleted`
				,`h`.`id_reference` AS `id_reference`
				,`h`.`tipe_transaksi` AS `tipe_transaksi` 
				FROM `jurnal_header` `h` 
				INNER JOIN `jurnal_detail` `d` on `h`.`id` = `d`.`id_jurnal_header`
				INNER JOIN `master_akun` `m` on `m`.`id` = `d`.`id_akun`
				WHERE `h`.`id_klinik` = 7 AND `h`.`is_deleted` = 0
				 AND `nama` LIKE '%TLTM BIAYA ADM KARTU ATM MANDIRI 1193 BL. AGUSTUS '22%' ESCAPE '!'
				GROUP BY `d`.`id_jurnal_header`
		)
		UNION ALL 
		(
				SELECT 
				`h`.`created_at` AS `created_at`
				,`d`.`id_transaksi_header` AS `id_transaksi_header`
				,`h`.`tanggal` AS `tanggal`
				,`h`.`nama` AS `nama`
				,group_concat(`m`.`kode_akun` separator '<br />') AS `kode_akun`
				,group_concat(`m`.`nama_akun` separator '<br />') AS `nama_akun`
				,group_concat(if(`d`.`arus` = 'Debit',concat('Rp ',format(`d`.`nilai`,0,'de_DE'),',00'),'-') separator '<br />') AS `debit_display`
				,group_concat(if(`d`.`arus` = 'Kredit',concat('Rp ',format(`d`.`nilai`,0,'de_DE'),',00'),'-') separator '<br />') AS `kredit_display`
				,`h`.`id_klinik` AS `id_klinik`
				,`h`.`is_deleted` AS `is_deleted`
				,`d`.`id_transaksi_header` AS `id_reference`,'Transkasi Lain' AS `tipe_transaksi` 
				FROM `transaksi_lain_header` `h` 
				INNER JOIN `transaksi_lain_detail` `d` on `h`.`id` = `d`.`id_transaksi_header`
				INNER JOIN `master_akun` `m` on `m`.`id` = `d`.`id_akun` 
				WHERE `h`.`id_klinik` = 7 AND `h`.`is_deleted` = 0
				 AND `nama` LIKE '%TLTM BIAYA ADM KARTU ATM MANDIRI 1193 BL. AGUSTUS '22%' ESCAPE '!'
				GROUP BY `d`.`id_transaksi_header`
		) ORDER BY `tanggal` DESC LIMIT 10 OFFSET 0
ERROR - 2022-09-02 19:43:47 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/controllers/Pembukuan.php 199
ERROR - 2022-09-02 19:44:00 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '22%' ESCAPE '!'
			
				UNION ALL
				
				SELECT 1
				FROM `transaksi_lai' at line 4 - Invalid query: 
			SELECT COUNT(*) totalRecord FROM (
				SELECT 1
				FROM `jurnal_header` `h`
				WHERE `h`.is_deleted = 0 AND `h`.id_klinik = 7 AND `nama` LIKE '%TLTM BIAYA ADM KARTU ATM MANDIRI 1193 BL. AGUSTUS '22%' ESCAPE '!'
			
				UNION ALL
				
				SELECT 1
				FROM `transaksi_lain_header` `h`
				WHERE `h`.is_deleted = 0 AND `h`.id_klinik = 7 AND `nama` LIKE '%TLTM BIAYA ADM KARTU ATM MANDIRI 1193 BL. AGUSTUS '22%' ESCAPE '!'			
			)t
		
ERROR - 2022-09-02 19:44:00 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '22%' ESCAPE '!'
				GROUP BY `d`.`id_jurnal_header`
		)
		UNION ALL 
		(
		' at line 19 - Invalid query: 
		(
			SELECT 
				`d`.`created_at` AS `created_at`
				,`d`.`id_jurnal_header` AS `id_jurnal_header`
				,`h`.`tanggal` AS `tanggal`
				,`h`.`nama` AS `nama`
				,group_concat(`m`.`kode_akun` order by `d`.`id` ASC separator '<br />') AS `kode_akun`
				,group_concat(`m`.`nama_akun` order by `d`.`id` ASC separator '<br />') AS `nama_akun`
				,group_concat(if(`d`.`arus` = 'Debit',concat('Rp ',format(`d`.`nilai`,0,'de_DE'),',00'),'-') order by `d`.`id` ASC separator '<br />') AS `debit_display`
				,group_concat(if(`d`.`arus` = 'Kredit',concat('Rp ',format(`d`.`nilai`,0,'de_DE'),',00'),'-') order by `d`.`id` ASC separator '<br />') AS `kredit_display`
				,`h`.`id_klinik` AS `id_klinik`
				,`h`.`is_deleted` AS `is_deleted`
				,`h`.`id_reference` AS `id_reference`
				,`h`.`tipe_transaksi` AS `tipe_transaksi` 
				FROM `jurnal_header` `h` 
				INNER JOIN `jurnal_detail` `d` on `h`.`id` = `d`.`id_jurnal_header`
				INNER JOIN `master_akun` `m` on `m`.`id` = `d`.`id_akun`
				WHERE `h`.`id_klinik` = 7 AND `h`.`is_deleted` = 0
				 AND `nama` LIKE '%TLTM BIAYA ADM KARTU ATM MANDIRI 1193 BL. AGUSTUS '22%' ESCAPE '!'
				GROUP BY `d`.`id_jurnal_header`
		)
		UNION ALL 
		(
				SELECT 
				`h`.`created_at` AS `created_at`
				,`d`.`id_transaksi_header` AS `id_transaksi_header`
				,`h`.`tanggal` AS `tanggal`
				,`h`.`nama` AS `nama`
				,group_concat(`m`.`kode_akun` separator '<br />') AS `kode_akun`
				,group_concat(`m`.`nama_akun` separator '<br />') AS `nama_akun`
				,group_concat(if(`d`.`arus` = 'Debit',concat('Rp ',format(`d`.`nilai`,0,'de_DE'),',00'),'-') separator '<br />') AS `debit_display`
				,group_concat(if(`d`.`arus` = 'Kredit',concat('Rp ',format(`d`.`nilai`,0,'de_DE'),',00'),'-') separator '<br />') AS `kredit_display`
				,`h`.`id_klinik` AS `id_klinik`
				,`h`.`is_deleted` AS `is_deleted`
				,`d`.`id_transaksi_header` AS `id_reference`,'Transkasi Lain' AS `tipe_transaksi` 
				FROM `transaksi_lain_header` `h` 
				INNER JOIN `transaksi_lain_detail` `d` on `h`.`id` = `d`.`id_transaksi_header`
				INNER JOIN `master_akun` `m` on `m`.`id` = `d`.`id_akun` 
				WHERE `h`.`id_klinik` = 7 AND `h`.`is_deleted` = 0
				 AND `nama` LIKE '%TLTM BIAYA ADM KARTU ATM MANDIRI 1193 BL. AGUSTUS '22%' ESCAPE '!'
				GROUP BY `d`.`id_transaksi_header`
		) ORDER BY `tanggal` DESC LIMIT 10 OFFSET 0
ERROR - 2022-09-02 19:44:00 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/controllers/Pembukuan.php 199
