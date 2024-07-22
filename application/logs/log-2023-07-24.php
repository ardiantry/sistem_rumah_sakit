<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-07-24 16:37:33 --> Severity: Notice --> Undefined variable: page_title /Applications/XAMPP/xamppfiles/htdocs/simraisha/application/views/themes/adminLTE.php 229
ERROR - 2023-07-24 16:38:52 --> Severity: Notice --> Undefined variable: page_title /Applications/XAMPP/xamppfiles/htdocs/simraisha/application/views/themes/adminLTE.php 229
ERROR - 2023-07-24 16:39:26 --> Severity: Notice --> Undefined variable: data /Applications/XAMPP/xamppfiles/htdocs/simraisha/application/controllers/Pembukuan.php 92
ERROR - 2023-07-24 16:39:26 --> Severity: Notice --> Undefined variable: page_title /Applications/XAMPP/xamppfiles/htdocs/simraisha/application/views/themes/adminLTE.php 229
ERROR - 2023-07-24 17:57:47 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '` AS `id_jurnal_header`
				,`h`.`tanggal` AS `tanggal`
				,`h`.`nama` AS `nama' at line 4 - Invalid query: 
		(
			SELECT 
				`h`.`created_at` AS `created_at`
				,`d.`id_jurnal_header` AS `id_jurnal_header`
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
				WHERE `h`.`id_klinik` = 1 AND `h`.`is_deleted` = 0
				
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
				WHERE `h`.`id_klinik` = 1 AND `h`.`is_deleted` = 0
				
				GROUP BY `d`.`id_transaksi_header`
		) ORDER BY `tanggal` DESC, id_jurnal_header DESC LIMIT 10 OFFSET 0
